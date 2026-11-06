<?php

declare(strict_types=1);

namespace Modules\UI\Filament\Widgets;

<<<<<<< .merge_file_P5kX4T
use Filament\Schemas\Components\Component;
=======
<<<<<<< HEAD
>>>>>>> .merge_file_m9aNJp
use Modules\Xot\Filament\Widgets\XotBaseSchemaWidget;

final class GroupWidget extends XotBaseSchemaWidget
{
    protected static ?string $heading = 'Group Widget';
<<<<<<< .merge_file_P5kX4T

    /**
     * @return array<string, Component>
     */
=======
=======
use Modules\Xot\Filament\Widgets\XotBaseWidget;

final class GroupWidget extends XotBaseWidget
{
    protected static ?string $heading = 'Group Widget';

    #[\Override]
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_m9aNJp
    public function getFormSchema(): array
    {
        return [];
    }
}
