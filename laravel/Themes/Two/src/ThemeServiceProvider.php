<?php

declare(strict_types=1);

namespace Themes\Two;

use Modules\Xot\Providers\XotBaseThemeServiceProvider;

class ThemeServiceProvider extends XotBaseThemeServiceProvider
{
    public string $name = 'Two';
<<<<<<< HEAD

    public string $nameLower = 'two';

    protected string $module_dir = __DIR__;

=======
    public string $nameLower = 'two';
    protected string $module_dir = __DIR__;
>>>>>>> 6ed19256f (.)
    protected string $module_ns = __NAMESPACE__;

    public function register(): void
    {
        parent::register();
<<<<<<< HEAD
=======
        // Aggiungi qui solo logica specifica del tema
>>>>>>> 6ed19256f (.)
    }

    public function boot(): void
    {
        parent::boot();
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'theme-two');
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/theme.php' => config_path('theme-two.php'),
            ], 'theme-two-config');
        }
    }
}
