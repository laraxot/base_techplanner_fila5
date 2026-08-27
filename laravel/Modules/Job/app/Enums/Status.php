<?php

declare(strict_types=1);

namespace Modules\Job\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;
use Modules\Xot\Traits\EnumTrait;

enum Status: string implements HasColor, HasIcon, HasLabel
{
    use EnumTrait;

    case Active = 'active';
    case Inactive = 'inactive';
    case Trashed = 'trashed';
    case One = '1';
}
