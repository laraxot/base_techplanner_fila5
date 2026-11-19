<?php

declare(strict_types=1);

namespace Themes\Two\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Service provider del tema Two.
 *
 * Nota: a runtime le viste del tema sono servite dal namespace `pub_theme` (registrato da Xot/Cms),
 * non da questo provider. Il namespace `two` resta come alias per eventuali usi espliciti.
 * Il vecchio `Volt::mount()` su `blog-search-filters` è stato rimosso: puntava a
 * `resource_path()` (cartella dell'app, non del tema) e il componente non era usato da nessuna pagina.
 */
class ThemeServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'two');
        $this->loadTranslationsFrom(__DIR__.'/../../lang', 'two');
    }
}
