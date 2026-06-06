<?php

declare(strict_types=1);

namespace Modules\User\Actions\User;

use Illuminate\Contracts\Hashing\Hasher;
<<<<<<< HEAD
        return once(function () use ($user) {
            $generator = new GetPronounceablePasswordAction();
            $plainPassword = $generator->execute();
            $hasher = app(Hasher::class);
=======
use Modules\Xot\Actions\String\GetPronounceablePasswordAction;
use Modules\Xot\Contracts\UserContract;
use Spatie\QueueableAction\QueueableAction;

class GetNewPasswordAction
{
    use QueueableAction;

    public function execute(UserContract $record): string
    {
        $user = $record;

        $password = once(function () use ($user) {
            $generator = new GetPronounceablePasswordAction();
            $plainPassword = $generator->execute();
            $hasher = app(\Illuminate\Contracts\Hashing\Hasher::class);
>>>>>>> 8215f950 (.)
            $hashedPassword = $hasher->make($plainPassword);

            $user->forceFill([
                'password' => $hashedPassword,
            ])->save();

            return $plainPassword;
        });
<<<<<<< HEAD
return $password;
=======

        return $password;
>>>>>>> 8215f950 (.)
    }
}
