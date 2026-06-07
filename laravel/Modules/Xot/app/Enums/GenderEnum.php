<?php

declare(strict_types=1);

namespace Modules\Xot\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> dev
use Modules\Xot\Traits\EnumTrait;

enum GenderEnum: string implements HasColor, HasIcon, HasLabel
{
    use EnumTrait;

    case FEMALE = 'f';
    case MALE = 'm';
<<<<<<< HEAD
=======

enum GenderEnum: string implements HasColor, HasIcon, HasLabel
{
    case FEMALE = 'f';
    case MALE = 'm';

    public function getLabel(): string
    {
        return match ($this) {
            self::FEMALE => 'Donna',
            self::MALE => 'Uomo',
        };
    }

    public function getColor(): string
    {
        return match ($this) {
            self::FEMALE => 'danger',
            self::MALE => 'info',
        };
    }

    public function getIcon(): string
    {
        return match ($this) {
            self::FEMALE => 'fas-female',
            self::MALE => 'fas-male',
        };
    }
>>>>>>> 4b6b99016 (first commit)
=======
>>>>>>> dev
}
