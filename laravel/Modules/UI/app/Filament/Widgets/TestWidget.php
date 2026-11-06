<?php

declare(strict_types=1);

namespace Modules\UI\Filament\Widgets;

<<<<<<< .merge_file_HGgxMZ
use Filament\Schemas\Components\Component;
=======
<<<<<<< HEAD
>>>>>>> .merge_file_0JYOSD
use Modules\Xot\Filament\Widgets\XotBaseSchemaWidget;

final class TestWidget extends XotBaseSchemaWidget
=======
use Modules\Xot\Filament\Widgets\XotBaseWidget;

final class TestWidget extends XotBaseWidget
>>>>>>> 6ed19256f (.)
{
    protected ?string $heading = 'Test Widget';

    /**
     * @return array<string, Component>
     */
    public function getFormSchema(): array
    {
        return [];
    }
}
