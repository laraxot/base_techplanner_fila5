<?php

declare(strict_types=1);

namespace Modules\UI\Filament\Widgets;

use Illuminate\Contracts\Support\Htmlable;
<<<<<<< HEAD
use Modules\Xot\Filament\Widgets\XotBaseWidget;

final class StatWithIconWidget extends XotBaseWidget
=======
use Modules\Xot\Filament\Widgets\XotBaseSchemaWidget;

final class StatWithIconWidget extends XotBaseSchemaWidget
>>>>>>> dev
{
    protected ?string $heading = 'Stat With Icon';

    protected string|Htmlable $label;

<<<<<<< HEAD
    /**
     * @var scalar|Htmlable|\Closure
     */
    protected $value;
=======
    protected string|int|float|bool|Htmlable|\Closure $value;
>>>>>>> dev

    public function getFormSchema(): array
    {
        return [];
    }

    protected function getData(): array
    {
        dddx($this->label);

        return [];
    }
}
