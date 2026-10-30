<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Links;

use Livewire\Livewire;

use function Safe\parse_url;
use function Safe\preg_match;

/**
 * Ancora HTML di una riga di elenco.
 */
final class RecordAnchor
{
    public const string PREFIX = 'record-';

    public const string RETURN_TO_PARAMETER = 'return_to';

    public static function id(int|string $key): string
    {
        return self::PREFIX.$key;
    }

    public static function fragment(int|string $key): string
    {
        return '#'.self::id($key);
    }

    public static function appendTo(string $url, int|string $key): string
    {
        return explode('#', $url, 2)[0].self::fragment($key);
    }

    /**
     * URL della pagina d'elenco da usare come `return_to`.
     *
     * In una richiesta Livewire (filtro, ordinamento, paginazione) `request()` e' l'endpoint di
     * aggiornamento, non la pagina: un ritorno verso quell'URL non esiste come pagina.
     */
    public static function currentUrl(): string
    {
        return Livewire::isLivewireRequest() ? Livewire::originalUrl() : request()->fullUrl();
    }

    public static function appendReturnTo(string $url, string $returnTo, int|string|null $key = null): string
    {
        if ($key !== null) {
            $returnTo = self::appendTo($returnTo, $key);
        }

        $separator = str_contains($url, '?') ? '&' : '?';

        return $url.$separator.http_build_query([
            self::RETURN_TO_PARAMETER => $returnTo,
        ], '', '&', PHP_QUERY_RFC3986);
    }

    public static function resolveReturnTo(?string $returnTo, int|string $key): ?string
    {
        if (! is_string($returnTo) || $returnTo === '') {
            return null;
        }

        $parsed = parse_url($returnTo);
        $scheme = isset($parsed['scheme']) && is_string($parsed['scheme'])
            ? strtolower($parsed['scheme'])
            : null;
        $host = isset($parsed['host']) && is_string($parsed['host']) ? $parsed['host'] : null;
        $fragment = isset($parsed['fragment']) && is_string($parsed['fragment']) ? $parsed['fragment'] : null;

        if (
            ($scheme !== null && ! in_array($scheme, ['http', 'https'], true))
            || ($host !== null && $host !== request()->getHost())
            || ($fragment !== null && preg_match('/^record-[A-Za-z0-9._~-]+$/', $fragment) !== 1)
        ) {
            return null;
        }

        return self::appendTo($returnTo, $key);
    }
}
