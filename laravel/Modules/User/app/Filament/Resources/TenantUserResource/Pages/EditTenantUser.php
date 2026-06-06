<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\TenantUserResource\Pages;

use Modules\User\Filament\Resources\TenantUserResource;
<<<<<<< HEAD
    protected static string $resource = TenantUserResource::class;
=======
use Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord;

/**
 * Class EditTenantUser.
 */
class EditTenantUser extends XotBaseEditRecord
{
    protected static string $resource = \Modules\User\Filament\Resources\TenantUserResource::class;
>>>>>>> 8215f950 (.)
}
