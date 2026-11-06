<?php

declare(strict_types=1);

namespace Modules\Job\Models\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\Xot\Contracts\UserContract;

abstract class JobBasePolicy
{
    use HandlesAuthorization;

<<<<<<< HEAD
    public function before(UserContract $user, string $_ability): ?bool
=======
    public function before(UserContract $user, string $_ability): null|bool
>>>>>>> 6ed19256f (.)
    {
        if ($user->hasRole('super-admin')) {
            return true;
        }

        return null;
    }
}
