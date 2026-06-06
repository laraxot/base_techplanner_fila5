<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\TeamUserResource\Pages;

use Modules\User\Filament\Resources\TeamUserResource;
<<<<<<< HEAD
    protected static string $resource = TeamUserResource::class;
=======
use Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord;

/**
 * Class EditTeamUser.
 */
class EditTeamUser extends XotBaseEditRecord
{
    protected static string $resource = \Modules\User\Filament\Resources\TeamUserResource::class;
>>>>>>> 8215f950 (.)
}
