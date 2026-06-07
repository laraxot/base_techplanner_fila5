<?php

declare(strict_types=1);

namespace Modules\Media\Filament\Resources\MediaResource\Pages;

<<<<<<< HEAD
=======
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
>>>>>>> dev
use Filament\Actions\DeleteAction;
use Modules\Media\Filament\Resources\MediaResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord;

class EditMedia extends XotBaseEditRecord
{
<<<<<<< HEAD
    protected static string $resource = MediaResource::class;

    /**
     * @return array<string, \Filament\Actions\Action|\Filament\Actions\ActionGroup>
=======
    public static string $resource = MediaResource::class;

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
