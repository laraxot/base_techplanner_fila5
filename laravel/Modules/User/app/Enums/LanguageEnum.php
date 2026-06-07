<?php

declare(strict_types=1);

namespace Modules\User\Enums;

<<<<<<< HEAD
=======
use Modules\Xot\Traits\EnumTrait;
>>>>>>> dev
use Filament\Support\Contracts\HasLabel;

enum LanguageEnum: string implements HasLabel
{
<<<<<<< HEAD
=======
    use EnumTrait;

>>>>>>> dev
    case ITALIAN = 'it';
    case ENGLISH = 'en';
    case FRENCH = 'fr';
    case GERMAN = 'de';
    case SPANISH = 'es';
<<<<<<< HEAD

    public function getLabel(): string
    {
        return match ($this) {
            self::ITALIAN => 'Italiano',
            self::ENGLISH => 'English',
            self::SPANISH => 'Español',
            self::FRENCH => 'Français',
            self::GERMAN => 'Deutsch',
        };
    }
=======
>>>>>>> dev
}
