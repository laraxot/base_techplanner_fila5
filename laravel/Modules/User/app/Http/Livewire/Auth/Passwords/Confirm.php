<?php

declare(strict_types=1);

namespace Modules\User\Http\Livewire\Auth\Passwords;

<<<<<<< HEAD
=======
use Illuminate\Contracts\View\Factory;
>>>>>>> 06ccbd93 (.)
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Livewire\Component;
use Modules\Xot\Actions\File\ViewCopyAction;

class Confirm extends Component
{
    public string $password = '';

    public function confirm(): RedirectResponse
    {
        $this->validate([
            'password' => 'required|current_password',
        ]);

        session()->put('auth.password_confirmed_at', time());

        return redirect()->intended(route('home'));
    }

<<<<<<< HEAD
    public function render(): View
=======
    public function render(): View|Factory
>>>>>>> 06ccbd93 (.)
    {
        app(ViewCopyAction::class)
            ->execute('user::livewire.auth.passwords.confirm', 'pub_theme::livewire.auth.passwords.confirm');
        app(ViewCopyAction::class)->execute('user::layouts.auth', 'pub_theme::layouts.auth');
        app(ViewCopyAction::class)->execute('user::layouts.base', 'pub_theme::layouts.base');

<<<<<<< HEAD
        /** @var view-string */
=======
        /**
         * @phpstan-var view-string
         */
>>>>>>> 06ccbd93 (.)
        $view = 'pub_theme::livewire.auth.passwords.confirm';

        /** @var View $result */
        $result = view($view)->extends('pub_theme::layouts.auth');

        return $result;
    }
}
