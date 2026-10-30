<?php

declare(strict_types=1);

namespace Modules\Seo\Actions\Sitemap;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Response;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Modules\Cms\Actions\Head\ResolveRobotsPolicyAction;
use Modules\Cms\Models\Page;
use Modules\Seo\Contracts\SitemapPathsContract;
use Modules\Xot\Actions\Cast\SafeStringCastAction;
use Safe\Exceptions\JsonException;
use Spatie\QueueableAction\QueueableAction;

use function Safe\json_decode;
use function Safe\preg_replace;

/**
 * sitemap.xml delle pagine pubbliche in tutte le lingue (Linee guida di design 4.3.9, DCP-166).
 *
 * Le pagine vengono dal CMS (JSON del tenant). Restano fuori: le pagine di prova (`tests.`), quelle dietro `auth`
 * (non indicizzabili) e quelle che hanno senso solo con un parametro (`tickets.confirmation` usa `?code`, un dato personale;
 * `segnalazione-dettaglio` e' uno schema). Niente `lastmod`: non c'e' una data affidabile per pagina (DCP-167).
 *
 * Le pagine di dettaglio (un articolo, un evento, una segnalazione) non sono pagine del CMS: le elencano i moduli che le possiedono
 * tramite `SitemapPathsContract` (DCP-273), registrati sotto il tag `SitemapPathsContract::TAG`. Seo non conosce i loro modelli.
 */
final class BuildSitemapAction
{
    use QueueableAction;

    /**
     * `segnalazioni.index` e' l'alias Design Comuni di `tickets` (301 a /{lang}/tickets, FrontofficeContainerAliases del tema):
     * in sitemap va solo l'URL finale, un reindirizzamento e' un «URL non seguito» per Search Console (DCP-272).
     *
     * @var list<string>
     */
    private const array NOT_INDEXABLE = ['tickets.confirmation', 'segnalazione-dettaglio', 'segnalazioni.index'];

    /** Risposta HTTP della rotta `/sitemap.xml` (invokable: `route:cache` non ammette closure). */
    public function __invoke(): Response
    {
        return response($this->execute(), 200, ['Content-Type' => 'application/xml; charset=UTF-8']);
    }

    public function execute(): string
    {
        $locales = array_keys(LaravelLocalization::getSupportedLocales());
        $default = LaravelLocalization::getDefaultLocale();
        $default = is_string($default) ? $default : 'it';

        $xml = '<?xml version="1.0" encoding="UTF-8"?>'."\n"
            .'<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xhtml="http://www.w3.org/1999/xhtml">'."\n";

        // Stessa regola del <head> (Cms `ResolveRobotsPolicyAction`): una URL `noindex` non va in sitemap e gli hreflang
        // collegano solo le lingue in cui la pagina esiste davvero.
        $policy = app(ResolveRobotsPolicyAction::class);
        foreach ($this->indexableEntries() as $entry) {
            $pageLocales = array_values(array_filter(
                $locales,
                static fn (string $locale): bool => ($entry['written'] === null || in_array($locale, $entry['written'], true))
                    && $policy->isIndexable('/'.$locale.'/'.$entry['path'], $locales),
            ));
            foreach ($pageLocales as $locale) {
                $xml .= "  <url>\n    <loc>".$this->url($locale, $entry['path'])."</loc>\n";
                if (count($pageLocales) > 1) {
                    foreach ($pageLocales as $alternate) {
                        $xml .= '    <xhtml:link rel="alternate" hreflang="'.$alternate.'" href="'.$this->url($alternate, $entry['path'])."\"/>\n";
                    }
                    if (in_array($default, $pageLocales, true)) {
                        $xml .= '    <xhtml:link rel="alternate" hreflang="x-default" href="'.$this->url($default, $entry['path'])."\"/>\n";
                    }
                }
                $xml .= "  </url>\n";
            }
        }

        return $xml.'</urlset>'."\n";
    }

    /**
     * `path`: percorso senza lingua ('' per la home, 'privacy', 'tickets/track', 'blog/{slug}', 'tickets/{id}').
     * `written`: lingue in cui la pagina CMS ha un titolo scritto; `null` = nessuna restrizione (URL di dettaglio dei moduli).
     *
     * @return list<array{path: string, written: list<string>|null}>
     */
    private function indexableEntries(): array
    {
        // La chiave comincia con '/': un percorso numerico ('2024') non diventi un indice intero di PHP.
        $entries = [];
        foreach ($this->indexableCmsPages() as $page) {
            $slug = app(SafeStringCastAction::class)->execute($page->getAttribute('slug'));
            $middleware = $page->getAttribute('middleware');
            // `auth.login` e `auth.register` sono pagine per ospiti (senza middleware `auth`) ma robots.txt chiude /{lang}/auth.
            // `<contenitore>.view` (blog.view, events.view, services.view) e' il modello del dettaglio: /blog/view risponde 200 senza contenuto.
            if ($slug === '' || $slug === 'tests' || str_starts_with($slug, 'tests.') || str_starts_with($slug, 'auth.') || str_ends_with($slug, '.view') || in_array($slug, self::NOT_INDEXABLE, true)) {
                continue;
            }
            if (is_array($middleware) && in_array('auth', $middleware, true)) {
                continue;
            }
            $path = $this->pathOf($slug);
            $entries['/'.$path] = ['path' => $path, 'written' => $this->writtenLocales($page)];
        }

        foreach (app()->tagged(SitemapPathsContract::TAG) as $source) {
            if ($source instanceof SitemapPathsContract) {
                foreach ($source->execute() as $path) {
                    if (! str_starts_with(trim($path, '/'), 'tests/') && trim($path, '/') !== 'tests') {
                        // Una pagina CMS gia' vista conserva le sue lingue: il modulo che la elenca non ne sa nulla.
                        $entries['/'.$path] ??= ['path' => $path, 'written' => null];
                    }
                }
            }
        }

        ksort($entries, SORT_STRING);

        return array_values($entries);
    }

    /**
     * Lingue in cui la pagina ha un titolo scritto davvero: le altre ripiegano sulla lingua predefinita e il `<head>` le marca `noindex`
     * (stessa regola di `Modules\Cms\View\Components\Head`). `null` se il titolo non e' leggibile: nessuna restrizione.
     *
     * @return list<string>|null
     */
    private function writtenLocales(Page $page): ?array
    {
        $raw = $page->getRawOriginal('title');
        try {
            $titles = is_string($raw) && str_starts_with(ltrim($raw), '{') ? json_decode($raw, true) : $raw;
        } catch (JsonException) {
            return null;
        }
        if (! is_array($titles)) {
            return null;
        }

        // Valori di un JSON decodificato: non c'e' un tipo piu' stretto di `mixed` da dichiarare.
        $written = array_filter($titles, static fn (mixed $text): bool => is_string($text) && trim($text) !== '');

        return array_values(array_map(strval(...), array_keys($written)));
    }

    /**
     * @return Collection<int, Page>
     */
    private function indexableCmsPages(): Collection
    {
        return Page::query()->get();
    }

    private function pathOf(string $slug): string
    {
        $slug = preg_replace('/\.index$/', '', $slug);

        return $slug === 'home' ? '' : str_replace('.', '/', $slug);
    }

    private function url(string $locale, string $path): string
    {
        return htmlspecialchars(url('/'.$locale.($path === '' ? '' : '/'.$path)), ENT_XML1 | ENT_QUOTES, 'UTF-8');
    }
}
