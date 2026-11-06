<?php

declare(strict_types=1);

/**
 * @see https://github.com/awcodes/overlook/blob/2.x/src/Widgets/OverlookWidget.php
 */

namespace Modules\UI\Filament\Widgets;

use Filament\Schemas\Components\Component;
<<<<<<< HEAD
use Modules\Xot\Filament\Widgets\XotBaseSchemaWidget;

abstract class RowWidget extends XotBaseSchemaWidget
=======
use Modules\Xot\Filament\Widgets\XotBaseWidget;

abstract class RowWidget extends XotBaseWidget
>>>>>>> 6ed19256f (.)
{
    /** @var array<string, int|string> */
    public array $grid = [];

    /** @var array<int, class-string> */
    public array $widgets = [];

    /** @var view-string */
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
