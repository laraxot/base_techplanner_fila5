<?php

declare(strict_types=1);

namespace Modules\UI\Filament\Widgets;

use Filament\Schemas\Components\Component;
use Modules\Xot\Filament\Widgets\XotBaseSchemaWidget;

final class GroupWidget extends XotBaseSchemaWidget
{
    protected static ?string $heading = 'Group Widget';

    /**
<<<<<<< HEAD
     * @return array<int|string, Component>
=======
     * @return array<string, Component>
>>>>>>> laraxot/dev
     */
    public function getFormSchema(): array
    {
        return [];
    }
}
