<?php

declare(strict_types=1);

namespace Modules\UI\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget\Stat;
use Modules\Xot\Filament\Widgets\XotBaseStatsOverviewWidget;

class HeroWidget extends XotBaseStatsOverviewWidget
{
    protected ?string $heading = 'Hero Widget';

<<<<<<< HEAD
=======
    // PHPStan L10: Protected per type safety - public properties sono viste come mixed
>>>>>>> 6ed19256f (.)
    protected string $title = '';

    protected string $icon = '';

    public function getColumns(): int
    {
        return 8;
    }

    protected function getStats(): array
    {
        return [
<<<<<<< HEAD
            Stat::make('', $this->title)->icon($this->icon),
=======
            Stat::make('', $this->title ?? '')->icon($this->icon ?? ''),
>>>>>>> 6ed19256f (.)
        ];
    }
}
