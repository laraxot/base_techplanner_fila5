<?php

declare(strict_types=1);

namespace Modules\Media\Filament\Resources\TemporaryUploadResource\Pages;

<<<<<<< HEAD
=======
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
>>>>>>> dev
use Filament\Actions\DeleteAction;
use Modules\Media\Filament\Resources\TemporaryUploadResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord;

class EditTemporaryUpload extends XotBaseEditRecord
{
<<<<<<< HEAD
    protected static string $resource = TemporaryUploadResource::class;

    /**
     * @return array<string, \Filament\Actions\Action|\Filament\Actions\ActionGroup>
=======
    public static string $resource = TemporaryUploadResource::class;

    /**
     * @return array<string, Action|ActionGroup>
>>>>>>> dev
     */
    protected function getHeaderActions(): array
    {
        return [
            'delete' => DeleteAction::make(),
        ];
    }
}
