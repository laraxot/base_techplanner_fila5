<?php

declare(strict_types=1);

namespace Modules\Cms\Providers;

use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;
use Laravel\Folio\Folio;
use Livewire\Volt\Volt;
<<<<<<< HEAD
use Mcamara\LaravelLocalization\Middleware\LaravelLocalizationRedirectFilter;
use Mcamara\LaravelLocalization\Middleware\LaravelLocalizationRoutes;
use Mcamara\LaravelLocalization\Middleware\LocaleSessionRedirect;
use Modules\Cms\Http\Middleware\SetFolioLocale;
=======
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Mcamara\LaravelLocalization\Middleware\LaravelLocalizationRedirectFilter;
use Mcamara\LaravelLocalization\Middleware\LocaleSessionRedirect;
>>>>>>> 6ed19256f (.)
use Modules\Tenant\Services\TenantService;
use Modules\Xot\Datas\XotData;
use Nwidart\Modules\Facades\Module;

<<<<<<< HEAD
use function Safe\realpath;

use Webmozart\Assert\Assert;

=======
>>>>>>> 6ed19256f (.)
class FolioVoltServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        /*
         * Folio::path(resource_path('views/pages'))->middleware([
         * '*' => [
         * //
         * ],
         * ]);
         */
        // Gestione sicura della configurazione middleware per evitare errori durante bootstrap
        $base_middleware = [];
        try {
            // Verifica se siamo in ambiente console e se il problema "env" è presente
            // In questo caso, usa array vuoto per permettere al server di partire
<<<<<<< HEAD
            if (app()->runningInConsole() && ! app()->environment('testing')) {
=======
            if (app()->runningInConsole()) {
>>>>>>> 6ed19256f (.)
                // Durante il bootstrap dei comandi artisan, potrebbe esserci un problema
                // con la risoluzione di "env" come classe. Usiamo array vuoto come fallback.
                $base_middleware = [];
            } else {
                $middleware = TenantService::config('middleware');
                if (is_array($middleware)) {
                    $base_middleware = Arr::get($middleware, 'base', []);
                    if (! is_array($base_middleware)) {
                        $base_middleware = [];
                    }
                }
            }
<<<<<<< HEAD

            // Assicuriamoci che 'web' sia presente se non siamo in console (o siamo in testing)
            if (! \in_array('web', $base_middleware, true)) {
                array_unshift($base_middleware, 'web');
            }
=======
>>>>>>> 6ed19256f (.)
        } catch (\Exception $e) {
            // Se c'è un errore nel caricamento della configurazione middleware, usa array vuoto
            // Questo evita errori durante il bootstrap quando la configurazione non è disponibile
            $base_middleware = [];
        }

<<<<<<< HEAD
        $base_middleware[] = LaravelLocalizationRoutes::class;
=======
        // $base_middleware[]=\Mcamara\LaravelLocalization\Middleware\LaravelLocalizationRoutes::class;
>>>>>>> 6ed19256f (.)
        $base_middleware[] = LocaleSessionRedirect::class;
        $base_middleware[] = LaravelLocalizationRedirectFilter::class;
        // $base_middleware[]=\Mcamara\LaravelLocalization\Middleware\LocaleCookieRedirect::class;
        // $base_middleware[]=\Mcamara\LaravelLocalization\Middleware\LaravelLocalizationViewPath::class;

        $theme_path = XotData::make()->getPubThemeViewPath('pages');

        // Ottieni tutte le lingue supportate
<<<<<<< HEAD
        $supportedLocalesConfig = config('laravellocalization.supportedLocales', ['it' => []]);
        Assert::isArray($supportedLocalesConfig);
        /** @var array<string, mixed> $supportedLocalesConfig */
        $supportedLocales = array_map('strval', array_keys($supportedLocalesConfig));
=======
        $supportedLocales = array_keys(config('laravellocalization.supportedLocales', ['it' => []]));
>>>>>>> 6ed19256f (.)
        $defaultLocale = config('app.locale', 'it');

        /**
         * @var Collection<int, \Nwidart\Modules\Module> $modules
         */
        $modules = Module::all();
        $paths = [];

        // Verifica che il percorso tema esista e sia una directory prima di passarlo a Folio
        if (File::exists($theme_path) && File::isDirectory($theme_path)) {
<<<<<<< HEAD
=======
            // Registra Folio per ogni lingua supportata
>>>>>>> 6ed19256f (.)
            foreach ($supportedLocales as $locale) {
                Folio::path($theme_path)
                    ->uri($locale)
                    ->middleware([
<<<<<<< HEAD
                        '*' => [
                            SetFolioLocale::class,
                            ...$base_middleware,
                        ],
=======
                        '*' => array_merge($base_middleware, [
                            function ($request, $next) use ($locale) {
                                app()->setLocale($locale);
                                return $next($request);
                            },
                        ]),
>>>>>>> 6ed19256f (.)
                    ]);
            }
            $paths[] = $theme_path;
        }

<<<<<<< HEAD
        // Theme Livewire block components: livewire/ → blocks.events.detail, components/blocks → events.detail
        $theme_views = \dirname($theme_path);
        $theme_livewire = $theme_views.\DIRECTORY_SEPARATOR.'livewire';
        if (File::exists($theme_livewire) && File::isDirectory($theme_livewire)) {
            $paths[] = realpath($theme_livewire);
        }
        $theme_components_blocks = $theme_views.\DIRECTORY_SEPARATOR.'components'.\DIRECTORY_SEPARATOR.'blocks';
        if (File::exists($theme_components_blocks) && File::isDirectory($theme_components_blocks)) {
            $paths[] = realpath($theme_components_blocks);
        }

=======
>>>>>>> 6ed19256f (.)
        foreach ($modules as $module) {
            $path = $module->getPath().'/resources/views/pages';
            if (! File::exists($path) || ! File::isDirectory($path)) {
                continue;
            }
            $paths[] = $path;
<<<<<<< HEAD
=======
            // Registra Folio per ogni lingua supportata
>>>>>>> 6ed19256f (.)
            foreach ($supportedLocales as $locale) {
                Folio::path($path)
                    ->uri($locale)
                    ->middleware([
<<<<<<< HEAD
                        '*' => [
                            SetFolioLocale::class,
                            ...$base_middleware,
                        ],
=======
                        '*' => array_merge($base_middleware, [
                            function ($request, $next) use ($locale) {
                                app()->setLocale($locale);
                                return $next($request);
                            },
                        ]),
>>>>>>> 6ed19256f (.)
                    ]);
            }
        }

        if (! empty($paths)) {
            Volt::mount($paths);
        }
    }
}
