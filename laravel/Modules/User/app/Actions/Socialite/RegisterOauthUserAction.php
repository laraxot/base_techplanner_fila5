<?php

/**
 * @see https://github.com/DutchCodingCompany/filament-socialite
 */

declare(strict_types=1);

namespace Modules\User\Actions\Socialite;

<<<<<<< HEAD
<<<<<<< HEAD
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Database\DatabaseManager;
=======
use Illuminate\Support\Facades\DB;
>>>>>>> 4b6b99016 (first commit)
=======
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Database\DatabaseManager;
>>>>>>> dev
use Laravel\Socialite\Contracts\User as SocialiteUserContract;
use Modules\User\Events\Registered;
use Modules\User\Models\SocialiteUser;
use Spatie\QueueableAction\QueueableAction;

class RegisterOauthUserAction
{
    use QueueableAction;

    public function execute(string $provider, SocialiteUserContract $oauthUser): SocialiteUser
    {
<<<<<<< HEAD
<<<<<<< HEAD
        /** @var SocialiteUser $socialiteUser */
        $socialiteUser = app(DatabaseManager::class)->transaction(static function () use ($provider, $oauthUser): SocialiteUser {
=======
        $socialiteUser = DB::transaction(static function () use ($provider, $oauthUser) {
>>>>>>> 4b6b99016 (first commit)
=======
        /** @var SocialiteUser $socialiteUser */
        $socialiteUser = app(DatabaseManager::class)->transaction(static function () use ($provider, $oauthUser): SocialiteUser {
>>>>>>> dev
            // Create a user
            $user = app(CreateUserAction::class)->execute(
                provider: $provider,
                oauthUser: $oauthUser,
            );

            // Create a new socialite user instance
            return app(CreateSocialiteUserAction::class)->execute(
                provider: $provider,
                oauthUser: $oauthUser,
                user: $user,
            );
        });
        // Dispatch the registered event
<<<<<<< HEAD
<<<<<<< HEAD
        app(Dispatcher::class)->dispatch(new Registered($socialiteUser));
=======
        Registered::dispatch($socialiteUser);
>>>>>>> 4b6b99016 (first commit)
=======
        app(Dispatcher::class)->dispatch(new Registered($socialiteUser));
>>>>>>> dev

        // Login the user
        // return app(LoginUserAction::class)->execute($socialiteUser);
        return $socialiteUser;
    }
}
