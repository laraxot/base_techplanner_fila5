<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Builder;
<<<<<<< HEAD
=======
use Modules\User\Database\Factories\PermissionUserFactory;
>>>>>>> 4b6b99016 (first commit)
use Modules\Xot\Contracts\ProfileContract;

/**
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 *
<<<<<<< HEAD
=======
 * @method static PermissionUserFactory          factory($count = null, $state = [])
>>>>>>> 4b6b99016 (first commit)
 * @method static Builder<static>|PermissionUser newModelQuery()
 * @method static Builder<static>|PermissionUser newQuery()
 * @method static Builder<static>|PermissionUser query()
 *
 * @mixin IdeHelperPermissionUser
 *
 * @property ProfileContract|null $deleter
 *
 * @mixin \Eloquent
 */
class PermissionUser extends ModelHasPermission
{
}
