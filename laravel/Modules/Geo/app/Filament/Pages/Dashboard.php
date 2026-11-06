<?php

declare(strict_types=1);

namespace Modules\Geo\Filament\Pages;

<<<<<<< HEAD
use Modules\Geo\Filament\Widgets\GeoMapWidget;
use Modules\Xot\Filament\Pages\XotBaseDashboard;

final class Dashboard extends XotBaseDashboard
{
    /**
     * @return array<string, mixed>
     */
    public function getWidgets(): array
    {
        return [
            'geo_map' => GeoMapWidget::class,
        ];
    }

    public function getColumns(): int
    {
        return 1;
    }
=======
use Modules\Xot\Filament\Pages\XotBaseDashboard;

class Dashboard extends XotBaseDashboard
{
    // protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-home';

    // protected string $view = 'geo::filament.pages.dashboard';

    // public function mount(): void {
    //     $user = auth()->user();
    //     if(!$user->hasRole('super-admin')){
    //         redirect('/admin');
    //     }
    // }
>>>>>>> 6ed19256f (.)
}
