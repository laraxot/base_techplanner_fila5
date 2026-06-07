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
<<<<<<< HEAD
=======
    /**
     * Execute the action.
     */
>>>>>>> 4b6b99016 (first commit)
=======
>>>>>>> dev
    public function execute(string $message): RedirectResponse
    {
        // Assert::string($route_name = config('filament-socialite.login_page_route', 'filament.admin.auth.login'));
        // Route [filament.auth.login] not defined.
<<<<<<< HEAD
<<<<<<< HEAD
        $routeName = 'login';
=======
        $route_name = 'login';
>>>>>>> 4b6b99016 (first commit)
=======
        $routeName = 'login';
>>>>>>> dev
        Assert::string($message = __('user::'.$message));
        Notification::make()
            ->title($message)
            ->danger()
            ->persistent()
            ->send();

        // Redirect back to the login route with an error message attached
        return redirect()
<<<<<<< HEAD
<<<<<<< HEAD
            ->route($routeName)
=======
            ->route($route_name)
>>>>>>> 4b6b99016 (first commit)
=======
            ->route($routeName)
>>>>>>> dev
            ->withErrors([
                'email' => [
                    __($message),
                ],
            ]);
    }
}
