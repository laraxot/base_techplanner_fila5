<?php

declare(strict_types=1);

namespace Modules\User\Actions\User;

use Illuminate\Contracts\Hashing\Hasher;
        return once(function () use ($user) {
            $generator = new GetPronounceablePasswordAction();
            $plainPassword = $generator->execute();
            $hasher = app(Hasher::class);
            $hashedPassword = $hasher->make($plainPassword);

            $user->forceFill([
                'password' => $hashedPassword,
            ])->save();

            return $plainPassword;
        });
return $password;
    }
}
