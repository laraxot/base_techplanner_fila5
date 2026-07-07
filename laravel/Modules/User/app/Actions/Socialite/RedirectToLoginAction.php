<?php

/**
 * @see https://github.com/DutchCodingCompany/filament-socialite
 */

declare(strict_types=1);

namespace Modules\User\Actions\Socialite;

// use DutchCodingCompany\FilamentSocialite\FilamentSocialite;
use Filament\Notifications\Notification;
use Illuminate\Http\RedirectResponse;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

class RedirectToLoginAction
{
    use QueueableAction;

<<<<<<< HEAD
=======
    /**
     * Execute the action.
     */
>>>>>>> 6ed19256f (.)
    public function execute(string $message): RedirectResponse
    {
        // Assert::string($route_name = config('filament-socialite.login_page_route', 'filament.admin.auth.login'));
        // Route [filament.auth.login] not defined.
<<<<<<< HEAD
        $routeName = 'login';
=======
        $route_name = 'login';
>>>>>>> 6ed19256f (.)
        Assert::string($message = __('user::'.$message));
        Notification::make()
            ->title($message)
            ->danger()
            ->persistent()
            ->send();

        // Redirect back to the login route with an error message attached
        return redirect()
<<<<<<< HEAD
            ->route($routeName)
=======
            ->route($route_name)
>>>>>>> 6ed19256f (.)
            ->withErrors([
                'email' => [
                    __($message),
                ],
            ]);
    }
}
