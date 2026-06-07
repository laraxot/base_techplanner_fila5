<?php

declare(strict_types=1);

namespace Modules\User\Models\Traits;

use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Traits\HasRoles;

trait HasSpatiePermission
{
    use HasPermissions;
    use HasRoles;
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> dev
    /*
        public function roles(): BelongsToMany
        {
            return $this->belongsToManyX(Role::class)->using(ModelHasRole::class);
        }

        public function permissions(): BelongsToMany
        {
            return $this->belongsToManyX(Permission::class);
        }
        */
<<<<<<< HEAD
>>>>>>> 4b6b99016 (first commit)
=======
>>>>>>> dev
}
