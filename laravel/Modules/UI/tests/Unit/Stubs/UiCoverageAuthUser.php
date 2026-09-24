<?php

declare(strict_types=1);

namespace Modules\UI\Tests\Unit\Stubs;

use Illuminate\Foundation\Auth\User as AuthenticatableUser;
use Illuminate\Support\Collection;

/**
 * User in-memory per GetUserDataAction — evita Mockery property.notFound.
 */
final class UiCoverageAuthUser extends AuthenticatableUser
{
<<<<<<< HEAD
    public ?object $profile = null;

=======
    public mixed $profile = null;
>>>>>>> laraxot/dev
    public function relationLoaded($key): bool
    {
        if (! is_string($key)) {
            return false;
        }

<<<<<<< HEAD
        return 'profile' === $key && null !== $this->profile;
=======
        return $key === 'profile' && $this->profile !== null;
>>>>>>> laraxot/dev
    }

    /**
     * @return Collection<int, string>
     */
    public function getRoleNames(): Collection
    {
        return collect(['admin']);
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> laraxot/dev
