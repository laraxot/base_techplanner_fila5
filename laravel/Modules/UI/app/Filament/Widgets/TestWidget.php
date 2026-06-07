<?php

declare(strict_types=1);

namespace Modules\UI\Filament\Widgets;

<<<<<<< HEAD
use Modules\Xot\Filament\Widgets\XotBaseWidget;

final class TestWidget extends XotBaseWidget
=======
use Modules\Xot\Filament\Widgets\XotBaseSchemaWidget;

final class TestWidget extends XotBaseSchemaWidget
>>>>>>> dev
{
    protected ?string $heading = 'Test Widget';

    public function getFormSchema(): array
    {
        return [];
    }
}
