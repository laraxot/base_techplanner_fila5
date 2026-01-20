<?php

/**
 * ---.
 */

declare(strict_types=1);

namespace Modules\TechPlanner\Providers\Filament;

use Filament\Panel;
use Modules\TechPlanner\Filament\Widgets\ClientMapWidget;
use Modules\TechPlanner\Filament\Widgets\CoordinatesWidget;
use Modules\Xot\Providers\Filament\XotBasePanelProvider;
use Override;
use Modules\Lang\Providers\Filament\LangBasePanelProvider;

class AdminPanelProvider extends LangBasePanelProvider
{
    protected string $module = 'TechPlanner';

   
}
