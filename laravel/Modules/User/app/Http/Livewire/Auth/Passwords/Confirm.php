<?php

declare(strict_types=1);

namespace Modules\User\Http\Livewire\Auth\Passwords;

public function render(): View
    {
        app(ViewCopyAction::class)
            ->execute('user::livewire.auth.passwords.confirm', 'pub_theme::livewire.auth.passwords.confirm');
        app(ViewCopyAction::class)->execute('user::layouts.auth', 'pub_theme::layouts.auth');
        app(ViewCopyAction::class)->execute('user::layouts.base', 'pub_theme::layouts.base');

/** @var view-string */
        $view = 'pub_theme::livewire.auth.passwords.confirm';

        /** @var View $res */
        $res = view($view);
        // @phpstan-ignore-next-line
        $res->extends('pub_theme::layouts.auth');

        return $res;
    }
}
