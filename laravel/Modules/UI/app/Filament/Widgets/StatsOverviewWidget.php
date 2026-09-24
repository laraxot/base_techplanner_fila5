<?php

declare(strict_types=1);

namespace Modules\UI\Filament\Widgets;

<<<<<<< HEAD
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

final class StatsOverviewWidget extends BaseWidget
=======
use Modules\Xot\Filament\Widgets\XotBaseStatsOverviewWidget;

final class StatsOverviewWidget extends XotBaseStatsOverviewWidget
>>>>>>> laraxot/dev
{
    protected ?string $heading = 'Stats Overview';
}
