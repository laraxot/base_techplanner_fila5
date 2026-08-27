<?php

declare(strict_types=1);

namespace Modules\User\Actions\User;

use Illuminate\Contracts\Hashing\Hasher;
use Modules\Xot\Actions\String\GetPronounceablePasswordAction;
use Modules\Xot\Contracts\UserContract;
use Spatie\QueueableAction\QueueableAction;

class GetNewPasswordAction
{
    use QueueableAction;

    public function execute(UserContract $record): string
    {
        $user = $record;

        return once(function () use ($user) {
<<<<<<< .merge_file_ZJrXlw
            $generator = new GetPronounceablePasswordAction();
=======
            $generator = new GetPronounceablePasswordAction;
>>>>>>> .merge_file_Pjvl41
            $plainPassword = $generator->execute();
            $hasher = app(Hasher::class);
            $hashedPassword = $hasher->make($plainPassword);

            $user->forceFill([
                'password' => $hashedPassword,
            ])->save();

            return $plainPassword;
        });
    }
}
