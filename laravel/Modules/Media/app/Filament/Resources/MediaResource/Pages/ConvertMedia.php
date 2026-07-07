<?php

declare(strict_types=1);

namespace Modules\Media\Filament\Resources\MediaResource\Pages;

use Modules\Media\Filament\Resources\MediaResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;
use Override;

class ConvertMedia extends XotBaseViewRecord
{
<<<<<<< HEAD
    public static string $resource = MediaResource::class;
=======
    protected static string $resource = MediaResource::class;
>>>>>>> 6ed19256f (.)

    #[Override]
    public function getInfolistSchema(): array
    {
        return [
            // Definire qui i componenti dell'infolist
        ];
    }
}
