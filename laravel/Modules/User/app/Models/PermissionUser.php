<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Builder;
<<<<<<< HEAD
=======
use Modules\User\Database\Factories\PermissionUserFactory;
>>>>>>> 6ed19256f (.)
use Modules\Xot\Contracts\ProfileContract;

/**
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 *
<<<<<<< HEAD
=======
 * @method static PermissionUserFactory          factory($count = null, $state = [])
>>>>>>> 6ed19256f (.)
 * @method static Builder<static>|PermissionUser newModelQuery()
 * @method static Builder<static>|PermissionUser newQuery()
 * @method static Builder<static>|PermissionUser query()
 *
 * @mixin IdeHelperPermissionUser
 *
 * @property ProfileContract|null $deleter
 *
<<<<<<< HEAD
 * @method static \Modules\User\Database\Factories\PermissionUserFactory factory($count = null, $state = [])
 *
=======
>>>>>>> 6ed19256f (.)
 * @mixin \Eloquent
 */
class PermissionUser extends ModelHasPermission
{
}
