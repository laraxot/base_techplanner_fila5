<?php

declare(strict_types=1);

namespace Modules\User\Filament\Widgets\Auth;

<<<<<<< HEAD
use Modules\User\Filament\Widgets\Auth\Schemas\UserForm;
use Modules\Xot\Filament\Widgets\XotBaseSchemaWidget;

/**
 * ResetPasswordWidget — token + nuova password (click sul link email).
 *
 * Schema da `Schemas\UserForm::getResetPasswordFormSchema()` — SSoT.
 *
 * @property Schema $form
 */
class ResetPasswordWidget extends XotBaseSchemaWidget
{
    protected string $view = 'user::widgets.auth.reset-password-widget';

    /**
     * @return class-string<UserForm>
     */
    protected static function formClass(): string
    {
        return UserForm::class;
    }

    protected static function schemaMethod(): string
    {
        return 'getResetPasswordFormSchema';
    }
    public function mount(): void
=======
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Component;    public function mount(): void
>>>>>>> 8215f950 (.)
    {
        $this->form->fill();
    }

    /**
<<<<<<< HEAD
if (! $user instanceof Model) {
                return;
            }
            $user->forceFill([
=======
     * Configure the form for this widget.
     */

    /**
     * Handle password reset with proper security and error handling.
     *
     * Implements Laravel's password reset functionality with explicit
     * type casting for security and proper error feedback.
     *            $user->forceFill([
>>>>>>> 8215f950 (.)
                'password' => Hash::make($password),
                'remember_token' => Str::random(60),
            ])->save();
        });

<<<<<<< HEAD
if ($status === Password::PASSWORD_RESET) {
            session()->flash('status', __($status));

            return redirect()->route('login');
        }
$this->addError('email', __(is_string($status) ? $status : 'passwords.generic_error'));
    }
=======
        if (Password::PASSWORD_RESET === $status) {            session()->flash('status', __($status));

            return redirect()->route('login');
        }
        /* @phpstan-ignore-next-line */
        $this->addError('email', __($status));    }
>>>>>>> 8215f950 (.)
}
