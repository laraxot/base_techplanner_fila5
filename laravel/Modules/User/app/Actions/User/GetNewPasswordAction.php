<?php

declare(strict_types=1);

namespace Modules\User\Actions\User;

<<<<<<< HEAD
use Illuminate\Contracts\Hashing\Hasher;
=======
>>>>>>> 06ccbd93 (.)
use Modules\Xot\Actions\String\GetPronounceablePasswordAction;
use Modules\Xot\Contracts\UserContract;
use Spatie\QueueableAction\QueueableAction;

class GetNewPasswordAction
{
    use QueueableAction;

    public function execute(UserContract $record): string
    {
        $user = $record;

<<<<<<< HEAD
        return once(function () use ($user) {
=======
        $password = once(function () use ($user) {
>>>>>>> 06ccbd93 (.)
            $generator = new GetPronounceablePasswordAction();
            $plainPassword = $generator->execute();
            $hasher = app(\Illuminate\Contracts\Hashing\Hasher::class);
            $hashedPassword = $hasher->make($plainPassword);

            $user->forceFill([
                'password' => $hashedPassword,
            ])->save();

            return $plainPassword;
        });
<<<<<<< HEAD
=======

        return $password;
>>>>>>> 06ccbd93 (.)
    }
}
