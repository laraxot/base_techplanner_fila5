<?php

declare(strict_types=1);

namespace Modules\User\Models\Traits;

use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Traits\HasRoles;

trait HasSpatiePermission
{
    use HasPermissions;
    use HasRoles;
}
