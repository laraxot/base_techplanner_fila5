<?php

declare(strict_types=1);

/**
 * ----------------------------------------------------------------.
 */

namespace Modules\Xot\Models\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
    public function viewAny(UserContract $user): Response|bool
    {
        return false;
    }
}
