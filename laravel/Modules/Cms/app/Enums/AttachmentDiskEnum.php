<?php

declare(strict_types=1);

namespace Modules\Cms\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;
<<<<<<< HEAD
use Modules\Xot\Traits\EnumTrait;

enum AttachmentDiskEnum: string implements HasColor, HasIcon, HasLabel
{
    use EnumTrait;
=======
use Modules\Xot\Filament\Traits\TransTrait;

enum AttachmentDiskEnum: string implements HasColor, HasIcon, HasLabel
{
    use TransTrait;
>>>>>>> 6ed19256f (.)

    case public_html = 'public_html';
    case videos = 'videos';
    case local = 'local';
<<<<<<< HEAD
=======

    public function getLabel(): string
    {
        return $this->transClass(self::class, $this->value.'.label');
    }

    public function getColor(): string
    {
        return $this->transClass(self::class, $this->value.'.color');
    }

    public function getIcon(): string
    {
        return $this->transClass(self::class, $this->value.'.icon');
    }

    public function getDescription(): string
    {
        return $this->transClass(self::class, $this->value.'.description');
    }
>>>>>>> 6ed19256f (.)
}
