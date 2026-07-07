<?php

declare(strict_types=1);

namespace Modules\Gdpr\Providers\Filament;

use Filament\Panel;
use Filament\Support\Assets\Css;
use Filament\Support\Facades\FilamentAsset;
use Modules\Xot\Providers\Filament\XotBasePanelProvider;
<<<<<<< HEAD
=======
use Override;
>>>>>>> 6ed19256f (.)

class AdminPanelProvider extends XotBasePanelProvider
{
    protected string $module = 'Gdpr';

<<<<<<< HEAD
    #[\Override]
=======
    #[Override]
>>>>>>> 6ed19256f (.)
    public function panel(Panel $panel): Panel
    {
        $panel = parent::panel($panel);
        FilamentAsset::register(
            [
                Css::make('gdpr-styles', asset('/vendor/cookie-consent/css/cookie-consent.css')),
                // Js::make('gdpr-scripts', __DIR__.'/../../resources/dist/assets/app2.js'),
            ],
            'gdpr',
        );

        return $panel;
    }
}
