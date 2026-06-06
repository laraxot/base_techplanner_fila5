<?php

declare(strict_types=1);

namespace Modules\User\Actions\User;

<<<<<<< HEAD
=======
use Illuminate\Contracts\Hashing\Hasher;
>>>>>>> origin/dev
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
        $password = once(function () use ($user) {
            $generator = new GetPronounceablePasswordAction();
            $plainPassword = $generator->execute();
            $hasher = app(\Illuminate\Contracts\Hashing\Hasher::class);
=======
        return once(function () use ($user) {
            $generator = new GetPronounceablePasswordAction();
            $plainPassword = $generator->execute();
            $hasher = app(Hasher::class);
>>>>>>> origin/dev
            $hashedPassword = $hasher->make($plainPassword);

            $user->forceFill([
                'password' => $hashedPassword,
            ])->save();

            return $plainPassword;
        });
<<<<<<< HEAD

        return $password;
=======
>>>>>>> origin/dev
    }
}
