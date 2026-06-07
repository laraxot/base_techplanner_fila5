<?php

/**
 * @see https://github.com/DutchCodingCompany/filament-socialite
 */

declare(strict_types=1);

namespace Modules\User\Actions\Socialite;

// use DutchCodingCompany\FilamentSocialite\FilamentSocialite;
use Filament\Facades\Filament;
use Illuminate\Contracts\Auth\Authenticatable;
<<<<<<< HEAD
<<<<<<< HEAD
use Illuminate\Contracts\Events\Dispatcher;
=======
>>>>>>> 4b6b99016 (first commit)
=======
use Illuminate\Contracts\Events\Dispatcher;
>>>>>>> dev
use Illuminate\Http\RedirectResponse;
use Modules\User\Events\SocialiteUserConnected;
use Modules\User\Models\SocialiteUser;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

class LoginUserAction
{
    use QueueableAction;

    /**
     * Execute the action.
     */
    public function execute(SocialiteUser $socialiteUser): RedirectResponse
    {
        Assert::notNull($user = $socialiteUser->user, '['.__FILE__.']['.__LINE__.']');

        if (! $user instanceof Authenticatable) {
            throw new \LogicException('User instance must implement Authenticatable.');
        }

        // PHPStan: assicuriamoci che l'utente sia Authenticatable per il login
        /** @var Authenticatable $authenticatableUser */
        $authenticatableUser = $user;
        Filament::auth()->login($authenticatableUser);
<<<<<<< HEAD
<<<<<<< HEAD
        app(Dispatcher::class)->dispatch(new SocialiteUserConnected($socialiteUser));
=======
        SocialiteUserConnected::dispatch($socialiteUser);
>>>>>>> 4b6b99016 (first commit)
=======
        app(Dispatcher::class)->dispatch(new SocialiteUserConnected($socialiteUser));
>>>>>>> dev
        // session()->regenerate();

        // return redirect()->intended(Filament::getUrl());
        return redirect()->intended('/');
    }
}
