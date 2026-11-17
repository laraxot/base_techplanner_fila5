<?php

declare(strict_types=1);

namespace Modules\Gdpr\Models\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Datas\XotData;

abstract class GdprBasePolicy
{
    use HandlesAuthorization;

    public function before(UserContract $user, string $_ability): ?bool
    {
<<<<<<< HEAD
        if (XotData::make()->super_admin === $user->email) {
=======
        $xotData = XotData::make();
        if ($user->hasRole('super-admin')) {
>>>>>>> 6ed19256f (.)
            return true;
        }

        return null;
    }
}
