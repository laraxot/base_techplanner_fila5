<?php

declare(strict_types=1);

namespace Modules\Job\Enums;

use Modules\Xot\Traits\EnumTrait;
use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;
use Modules\Xot\Traits\EnumTrait;

/**
 * Stato di uno Schedule (colonna `status`, cast in Schedule::casts()).
 *
 * `One` e' il valore legacy '1' della colonna booleana (default della migration create_schedule_table):
 * per lo scheduler equivale a `Active`.
 */
enum Status: string implements HasColor, HasIcon, HasLabel
{
    use EnumTrait;

    case Active = 'active';
    case Inactive = 'inactive';
    case Trashed = 'trashed';
    case One = '1';

<<<<<<< .merge_file_GgYuXP
    /** Lo Schedule viene eseguito dallo scheduler. */
    public function isActive(): bool
    {
        return in_array($this, self::activeCases(), true);
    }

    /**
     * Stati che rendono uno Schedule eseguibile (usati da Schedule::scopeActive()).
     *
     * @return list<self>
     */
    public static function activeCases(): array
    {
        return [self::Active, self::One];
    }
=======
    public function getColor(): string
    {
        return match ($this) {
            self::Active => 'success',
            self::Inactive => 'warning',
            self::Trashed => 'danger',
            self::One => 'danger',
        };
    }

    public function getIcon(): string
    {
        return match ($this) {
            self::Active => 'heroicon-o-check-circle',
            self::Inactive => 'heroicon-o-document',
            self::Trashed => 'heroicon-o-x-circle',
            self::One => 'heroicon-o-x-circle',
        };
    }

    public function getLabel(): string
    {
        return match ($this) {
            self::Active => __('job::schedule.status.active'),
            self::Inactive => __('job::schedule.status.inactive'),
            self::Trashed => __('job::schedule.status.trashed'),
            self::One => __('job::schedule.status.one'),
        };
    }
>>>>>>> .merge_file_Bg1inW
}
