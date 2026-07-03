<?php

declare(strict_types=1);

/**
 * @see https://github.com/awcodes/overlook/blob/2.x/src/Widgets/OverlookWidget.php
 */

namespace Modules\UI\Filament\Widgets;

use Filament\Schemas\Components\Component;
use Filament\Widgets\Widget;
use Modules\Xot\Filament\Widgets\XotBaseSchemaWidget;

abstract class RowWidget extends XotBaseSchemaWidget
{
    /** @var array<int, Widget> */
    public array $widgets = [];

    protected string $view = 'ui::filament.widgets.row';

    protected int|string|array $columnSpan = 'full';

    /**
     * @return array<int|string, Component>
     */
    public function getFormSchema(): array
    {
        return [];
    }

    protected function getColumns(): int
    {
        return 3;
    }
}
