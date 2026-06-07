<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\TeamUserResource\Pages;

use Filament\Actions\Action;
use Filament\Actions\CreateAction;
<<<<<<< HEAD
=======
use Modules\User\Filament\Resources\TeamUserResource;
>>>>>>> dev
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

/**
 * Class ListTeamUsers.
 */
class ListTeamUsers extends XotBaseListRecords
{
<<<<<<< HEAD
    protected static string $resource = \Modules\User\Filament\Resources\TeamUserResource::class;
=======
    protected static string $resource = TeamUserResource::class;
>>>>>>> dev

    /**
     * @return array<string, Action>
     */
    #[\Override]
    protected function getHeaderActions(): array
    {
        return [
            'create' => CreateAction::make(),
        ];
    }
}
