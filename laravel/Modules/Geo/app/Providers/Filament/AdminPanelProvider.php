<?php

declare(strict_types=1);

namespace Modules\Geo\Providers\Filament;

<<<<<<< HEAD
=======
use Filament\Panel;
use Filament\Support\Assets\Css;
use Filament\Support\Assets\Js;
use Filament\Support\Facades\FilamentAsset;
use Illuminate\Support\Facades\Vite;
>>>>>>> dev
use Modules\Xot\Providers\Filament\XotBasePanelProvider;

/**
 * Undocumented class.
 */
class AdminPanelProvider extends XotBasePanelProvider
{
    protected string $module = 'Geo';
<<<<<<< HEAD
=======

    #[\Override]
    public function panel(Panel $panel): Panel
    {
        $panel = parent::panel($panel);

        if (! inAdmin()) {
            return $panel;
        }

        FilamentAsset::register([
            Js::make('coordinate-picker', Vite::asset('resources/js/components/coordinate-picker-lit.js', 'assets/geo'))->module(),
            Css::make('coordinate-picker', Vite::asset('resources/css/app.css', 'assets/geo')),
        ]);

        return $panel;
    }
>>>>>>> dev
}
