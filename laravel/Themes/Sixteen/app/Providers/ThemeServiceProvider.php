<?php

declare(strict_types=1);

namespace Themes\Sixteen\Providers;

<<<<<<< HEAD
use Modules\Xot\Providers\XotBaseThemeServiceProvider;
use Themes\Sixteen\Console\Commands\SixteenInstallCommand;
use Themes\Sixteen\Console\Commands\SixteenPublishCommand;
use Themes\Sixteen\Contracts\MenuFilterInterface;
use Themes\Sixteen\Filters\ActiveMenuFilter;
use Themes\Sixteen\Filters\GateMenuFilter;
use Themes\Sixteen\Filters\HrefMenuFilter;
use Themes\Sixteen\Services\MenuBuilder;
use Themes\Sixteen\Services\ThemeService;
use Themes\Sixteen\View\Composers\SixteenComposer;

/**
 * Enhanced Service Provider per il tema Sixteen.
 *
 * Questo provider gestisce la registrazione e configurazione
 * del tema Sixteen nell'applicazione Laravel, integrando il
 * nuovo Menu Builder System e le funzionalità avanzate.
 *
=======
use Themes\Sixteen\Services\SpidAuthService;
use Themes\Sixteen\Services\CieAuthService;
use Themes\Sixteen\Services\MenuBuilder;
use Themes\Sixteen\Services\ThemeService;
use Themes\Sixteen\View\Composers\SixteenComposer;
use Themes\Sixteen\Console\Commands\SixteenInstallCommand;
use Themes\Sixteen\Console\Commands\SixteenPublishCommand;
use Themes\Sixteen\Contracts\MenuFilterInterface;
use Themes\Sixteen\Filters\{HrefMenuFilter, ActiveMenuFilter, GateMenuFilter};
use Modules\Xot\Providers\XotBaseThemeServiceProvider;

/**
 * Enhanced Service Provider per il tema Sixteen.
 * 
 * Questo provider gestisce la registrazione e configurazione
 * del tema Sixteen nell'applicazione Laravel, integrando il
 * nuovo Menu Builder System e le funzionalità avanzate.
 * 
>>>>>>> 4b6b99016 (first commit)
 * IMPORTANTE: Il tema Sixteen usa il namespace 'pub_theme' per le viste,
 * non 'sixteen', per essere compatibile con il sistema di temi.
 */
class ThemeServiceProvider extends XotBaseThemeServiceProvider
{
    public string $name = 'Sixteen';
<<<<<<< HEAD

    public string $nameLower = 'sixteen';

    protected string $module_dir = __DIR__.'/../../';

=======
    public string $nameLower = 'sixteen';
    protected string $module_dir = __DIR__ . '/../../';
>>>>>>> 4b6b99016 (first commit)
    protected string $module_ns = __NAMESPACE__;

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
<<<<<<< HEAD
        // Load theme resources BEFORE parent to ensure pub_theme namespace is registered first
        $this->loadCoreThemeResources();

        parent::boot();

        // Menu system registration
        $this->registerMenuSystem();

        // View composers
        $this->registerViewComposers();

        // Artisan commands
        $this->registerCommands();

        // Publishing configurations
        $this->registerPublishing();

        // Authentication routes
        $this->registerAuthRoutes();

=======
        parent::boot();
        
        // Core theme loading
        $this->loadCoreThemeResources();
        
        // Menu system registration
        $this->registerMenuSystem();
        
        // View composers
        $this->registerViewComposers();
        
        // Artisan commands
        $this->registerCommands();
        
        // Publishing configurations
        $this->registerPublishing();
        
        // Authentication routes
        $this->registerAuthRoutes();
        
>>>>>>> 4b6b99016 (first commit)
        // Layout shortcuts (legacy compatibility)
        $this->registerLayoutShortcuts();
    }

    /**
     * Register any application services.
     */
    public function register(): void
    {
        parent::register();
<<<<<<< HEAD

        // Register core services
        $this->registerCoreServices();

        // Register menu filters
        $this->registerMenuFilters();

=======
        
        // Register core services
        $this->registerCoreServices();
        
        // Register menu filters
        $this->registerMenuFilters();
        
>>>>>>> 4b6b99016 (first commit)
        // Register SPID/CIE services
        $this->registerAuthServices();
    }

    /**
     * Load core theme resources
     */
    protected function loadCoreThemeResources(): void
    {
        // IMPORTANTE: pub_theme è il namespace standard per i temi
<<<<<<< HEAD
        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'pub_theme');
        $this->loadTranslationsFrom(__DIR__.'/../../lang', 'pub_theme');

        // Caricamento delle configurazioni del tema
        $this->loadConfigFrom(__DIR__.'/../../config', 'sixteen');
=======
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'pub_theme');
        $this->loadTranslationsFrom(__DIR__ . '/../../lang', 'pub_theme');
        
        // Caricamento delle configurazioni del tema
        $this->loadConfigFrom(__DIR__ . '/../../config', 'sixteen');
>>>>>>> 4b6b99016 (first commit)
    }

    /**
     * Register the Menu Builder system
     */
    protected function registerMenuSystem(): void
    {
        // Singleton per il Menu Builder
        $this->app->singleton(MenuBuilder::class, function ($app) {
            $filters = $app->tagged('sixteen.menu.filters');
<<<<<<< HEAD

            return new MenuBuilder($filters);
        });

=======
            return new MenuBuilder($filters);
        });
        
>>>>>>> 4b6b99016 (first commit)
        // Alias per backward compatibility
        $this->app->alias(MenuBuilder::class, 'sixteen.menu');
    }

    /**
     * Register core services
     */
    protected function registerCoreServices(): void
    {
        // Theme Service con dependency injection del MenuBuilder
        $this->app->singleton('sixteen.theme', function ($app) {
            return new ThemeService($app[MenuBuilder::class]);
        });
<<<<<<< HEAD

=======
        
>>>>>>> 4b6b99016 (first commit)
        // Alias per il ThemeService
        $this->app->alias('sixteen.theme', ThemeService::class);
    }

    /**
     * Register menu filters
     */
    protected function registerMenuFilters(): void
    {
        // Register default menu filters
        $this->app->singleton(HrefMenuFilter::class);
        $this->app->singleton(ActiveMenuFilter::class);
        $this->app->singleton(GateMenuFilter::class);
<<<<<<< HEAD

=======
        
>>>>>>> 4b6b99016 (first commit)
        // Tag them for the menu builder
        $this->app->tag([
            HrefMenuFilter::class,
            ActiveMenuFilter::class,
            GateMenuFilter::class,
        ], 'sixteen.menu.filters');
<<<<<<< HEAD

=======
        
>>>>>>> 4b6b99016 (first commit)
        // Register the interface binding for extension
        $this->app->bind(MenuFilterInterface::class, HrefMenuFilter::class);
    }

    /**
     * Register SPID/CIE authentication services
     */
    protected function registerAuthServices(): void
    {
        // Register SPID Auth Service
        $this->app->singleton(\Themes\Sixteen\Services\SpidAuthService::class, function ($app) {
            return new \Themes\Sixteen\Services\SpidAuthService();
        });
<<<<<<< HEAD

        // Register CIE Auth Service
        $this->app->singleton(\Themes\Sixteen\Services\CieAuthService::class, function ($app) {
            return new \Themes\Sixteen\Services\CieAuthService();
        });

=======
        
        // Register CIE Auth Service  
        $this->app->singleton(\Themes\Sixteen\Services\CieAuthService::class, function ($app) {
            return new \Themes\Sixteen\Services\CieAuthService();
        });
        
>>>>>>> 4b6b99016 (first commit)
        // Aliases for easier access
        $this->app->alias(\Themes\Sixteen\Services\SpidAuthService::class, 'sixteen.spid');
        $this->app->alias(\Themes\Sixteen\Services\CieAuthService::class, 'sixteen.cie');
    }

    /**
     * Register view composers
     */
    protected function registerViewComposers(): void
    {
        // Composer per layout principali
        $this->app['view']->composer([
            'pub_theme::layouts.app',
            'pub_theme::layouts.guest',
            'pub_theme::layouts.guest-agid',
            'pub_theme::components.layout.header',
            'pub_theme::components.layout.footer',
        ], SixteenComposer::class);
    }

    /**
     * Register Artisan commands
     */
    protected function registerCommands(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                SixteenInstallCommand::class,
                SixteenPublishCommand::class,
            ]);
        }
    }

    /**
     * Register publishing configurations
     */
    protected function registerPublishing(): void
    {
        // Pubblicazione degli assets del tema
        $this->publishes([
<<<<<<< HEAD
            __DIR__.'/../../resources/assets' => public_path('themes/sixteen/assets'),
            __DIR__.'/../../public' => public_path('themes/sixteen'),
        ], 'sixteen-assets');

        // Pubblicazione delle configurazioni del tema
        $this->publishes([
            __DIR__.'/../../config' => config_path('themes/sixteen'),
        ], 'sixteen-config');

        // Pubblicazione delle viste (opzionale per personalizzazioni)
        $this->publishes([
            __DIR__.'/../../resources/views' => resource_path('views/themes/sixteen'),
=======
            __DIR__ . '/../../resources/assets' => public_path('themes/sixteen/assets'),
            __DIR__ . '/../../public' => public_path('themes/sixteen'),
        ], 'sixteen-assets');
        
        // Pubblicazione delle configurazioni del tema
        $this->publishes([
            __DIR__ . '/../../config' => config_path('themes/sixteen'),
        ], 'sixteen-config');
        
        // Pubblicazione delle viste (opzionale per personalizzazioni)
        $this->publishes([
            __DIR__ . '/../../resources/views' => resource_path('views/themes/sixteen'),
>>>>>>> 4b6b99016 (first commit)
        ], 'sixteen-views');
    }

    /**
<<<<<<< HEAD
     * Register anonymous components for pub_theme namespace.
     */
    /**
     * Register Blade components for both sixteen and pub_theme namespaces.
     */
    protected function registerBladeComponents(): void
    {
        $componentNamespace = $this->module_ns.'\View\Components';

        // Register with sixteen namespace (parent)
        \Illuminate\Support\Facades\Blade::componentNamespace($componentNamespace, 'sixteen');

        // Register with pub_theme namespace (for theme compatibility)
        \Illuminate\Support\Facades\Blade::componentNamespace($componentNamespace, 'pub_theme');

        // Register anonymous components for pub_theme
        $componentsPath = realpath(__DIR__.'/../../resources/views/components');
        if ($componentsPath !== false) {
            \Illuminate\Support\Facades\Blade::anonymousComponentPath($componentsPath, 'pub_theme');
        }

        // Register class-based components
        app(\Modules\Xot\Actions\Blade\RegisterBladeComponentsAction::class)
            ->execute($this->module_dir.'/../View/Components', $this->module_ns);
    }

    /**
=======
>>>>>>> 4b6b99016 (first commit)
     * Register authentication routes
     */
    protected function registerAuthRoutes(): void
    {
<<<<<<< HEAD
        if (! $this->app->routesAreCached()) {
            $this->loadRoutesFrom(__DIR__.'/../../routes/auth.php');
=======
        if (!$this->app->routesAreCached()) {
            $this->loadRoutesFrom(__DIR__ . '/../../routes/auth.php');
>>>>>>> 4b6b99016 (first commit)
        }
    }

    /**
     * Registra i layout shortcuts AGID per il tema (legacy compatibility).
     */
    protected function registerLayoutShortcuts(): void
    {
        // Registrazione dei layout shortcuts per facilitare l'uso
<<<<<<< HEAD
        $this->app['view']->addNamespace('layouts', __DIR__.'/../../resources/views/layouts');

        // Enhanced composer per layout AGID-compliant
        $this->app['view']->composer('layouts.guest-agid', function ($view) {
            $themeService = app('sixteen.theme');

=======
        $this->app['view']->addNamespace('layouts', __DIR__ . '/../../resources/views/layouts');
        
        // Enhanced composer per layout AGID-compliant
        $this->app['view']->composer('layouts.guest-agid', function ($view) {
            $themeService = app('sixteen.theme');
            
>>>>>>> 4b6b99016 (first commit)
            $view->with([
                'theme_name' => 'Sixteen',
                'theme_info' => $themeService->getInfo(),
                'agid_compliant' => true,
                'accessibility_level' => 'WCAG 2.1 AA',
                'compliance_check' => $themeService->checkAgidCompliance(),
            ]);
        });
    }
<<<<<<< HEAD

=======
    
>>>>>>> 4b6b99016 (first commit)
    /**
     * Carica le configurazioni del tema.
     */
    protected function loadConfigFrom(string $path, string $namespace): void
    {
        if (is_dir($path)) {
<<<<<<< HEAD
            foreach (glob($path.'/*.php') as $file) {
                $name = basename($file, '.php');
                $this->mergeConfigFrom($file, $namespace.'.'.$name);
=======
            foreach (glob($path . '/*.php') as $file) {
                $name = basename($file, '.php');
                $this->mergeConfigFrom($file, $namespace . '.' . $name);
>>>>>>> 4b6b99016 (first commit)
            }
        }
    }
}
