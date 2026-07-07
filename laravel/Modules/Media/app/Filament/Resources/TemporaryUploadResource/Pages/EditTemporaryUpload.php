<?php

declare(strict_types=1);

namespace Modules\Media\Filament\Resources\TemporaryUploadResource\Pages;

<<<<<<< HEAD
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
=======
>>>>>>> 6ed19256f (.)
use Filament\Actions\DeleteAction;
use Modules\Media\Filament\Resources\TemporaryUploadResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord;

class EditTemporaryUpload extends XotBaseEditRecord
{
<<<<<<< HEAD
    public static string $resource = TemporaryUploadResource::class;

    /**
     * @return array<string, Action|ActionGroup>
=======
    protected static string $resource = TemporaryUploadResource::class;

    /**
     * @return array<string, \Filament\Actions\Action|\Filament\Actions\ActionGroup>
>>>>>>> 6ed19256f (.)
     */
    protected function getHeaderActions(): array
    {
        return [
            'delete' => DeleteAction::make(),
        ];
    }
}
