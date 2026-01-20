<?php

declare(strict_types=1);

namespace Modules\User\Actions\User;

<<<<<<< HEAD
=======
use Illuminate\Support\Facades\Hash;
>>>>>>> 4b6b99016 (first commit)
use Modules\Xot\Actions\String\GetPronounceablePasswordAction;
use Modules\Xot\Contracts\UserContract;
use Spatie\QueueableAction\QueueableAction;

class GetNewPasswordAction
{
    use QueueableAction;

    public function execute(UserContract $record): string
    {
<<<<<<< HEAD
        $user = $record;

        $password = once(function () use ($user) {
            $generator = new GetPronounceablePasswordAction();
            $plainPassword = $generator->execute();
            $hasher = app(\Illuminate\Contracts\Hashing\Hasher::class);
            $hashedPassword = $hasher->make($plainPassword);

            $user->forceFill([
                'password' => $hashedPassword,
            ])->save();

            return $plainPassword;
        });

=======
        // $user = XotData::make()->getUserByEmail($record->email);
        $user = $record;

        // $password=trim(Str::random(10));
        // $password='Pgn7T8Bppf';
        [$password, $password_hash] = once(function () {
            // $password=trim(Str::password(10));
            $password = app(GetPronounceablePasswordAction::class)->execute();
            $password_hash = Hash::make($password);

            return [$password, $password_hash];
        });

        $user->forceFill([
            // 'password' => Hash::make($password),
            // 'password' => '$2y$12$mFdQg0jwDMG2FjemQo9y5u2SbC1G0xSNKS3gQnFO5CQ109YWHTAtG',
            'password' => $password_hash,
        ])->save();
        /*
         * $user->update([
         * 'password' => $password,
         * ]);
         */

>>>>>>> 4b6b99016 (first commit)
        return $password;
    }
}
