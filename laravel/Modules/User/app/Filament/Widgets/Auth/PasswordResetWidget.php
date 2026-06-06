<?php

declare(strict_types=1);

namespace Modules\User\Filament\Widgets\Auth;

<<<<<<< HEAD
=======
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\TextInput;
>>>>>>> 06ccbd93 (.)
use Filament\Notifications\Notification;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Session;
<<<<<<< HEAD
use Modules\User\Filament\Widgets\Auth\Schemas\UserForm;
use Modules\Xot\Filament\Widgets\XotBaseSchemaWidget;
=======
use Illuminate\Support\HtmlString;
use Modules\Xot\Filament\Widgets\XotBaseWidget;
>>>>>>> 06ccbd93 (.)

/**
 * Password Reset Widget .
 *
 * Handles password reset request flow using Filament forms
 * with improved UX and validation.
 *
 * @property Schema $form
 */
class PasswordResetWidget extends XotBaseWidget
{
    public ?array $data = [];

    public bool $emailSent = false;

    /**
<<<<<<< HEAD
     * @return class-string<UserForm>
=======
     * @phpstan-ignore-next-line
>>>>>>> 06ccbd93 (.)
     */
    protected string $view = 'pub_theme::filament.widgets.auth.password.reset';

    /**
     * Get the form schema for password reset.
     */
    #[\Override]
    public function getFormSchema(): array
    {
        return [
            'email' => TextInput::make('email')
                ->email()
                ->required()
                ->autocomplete('email')
                ->maxLength(255)
                ->extraInputAttributes(['class' => 'text-center']),
            'error_display' => Placeholder::make('error_display')
                ->hiddenLabel()
                ->content(function ($_get) {
                    $error = Session::get('error');

                    if ($error && is_string($error)) {
                        $str =
                            '<div class="text-red-600 font-medium bg-red-50 p-3 rounded-md border border-red-200">'.
                            $error.
                            '</div>';

                        return new HtmlString($str);
                    }
                })
                ->reactive(),
        ];
    }

    /**
     * Handle password reset link sending.
     */
    public function sendResetPasswordLink(): void
    {
        // try {
        $data = $this->form->getState();
        $password_broker = Password::broker();

        $response = $password_broker->sendResetLink([
            'email' => $data['email'],
        ]);

<<<<<<< HEAD
        if ($response === Password::RESET_LINK_SENT) {
=======
        if (Password::RESET_LINK_SENT === $response) {
>>>>>>> 06ccbd93 (.)
            $this->emailSent = true;

            Notification::make()
                ->title(__('user::auth.password_reset.email_sent.title'))
                ->body(__('user::auth.password_reset.email_sent.message'))
                ->success()
                ->duration(10000)
                ->send();

<<<<<<< HEAD
=======
            // Clear the form
>>>>>>> 06ccbd93 (.)
            $this->form->fill();
        } else {
            Session::flash('error', trans('user::errors.'.$response.'.label'));
            Notification::make()
                ->title(__('user::auth.password_reset.email_failed.title'))
                ->body(trans($response))
                ->danger()
                ->send();
        }
<<<<<<< HEAD
    }

=======

        /*} catch (\Exception $e) {
         * Notification::make()
         * ->title(__('user::auth.password_reset.email_failed.title'))
         * ->body(__('user::auth.password_reset.email_failed.generic'))
         * ->danger()
         * ->send();
         * }
         */
    }

    /**
     * Reset the widget state to show form again.
     */
>>>>>>> 06ccbd93 (.)
    public function resetForm(): void
    {
        $this->emailSent = false;
        $this->form->fill();
    }

<<<<<<< HEAD
    public function sendAnotherLink(): void
    {
        $this->emailSent = false;
        $this->form->fill(['email' => '']);
    }

    public function checkEmailStatus(): void
=======
    /**
     * Send another reset link.
     */
    public function sendAnotherLink(): void
>>>>>>> 06ccbd93 (.)
    {
        $this->emailSent = false;
        $this->form->fill(['email' => '']);
    }

    /**
     * Check email status (for compatibility with old view).
     */
    public function checkEmailStatus(): void
    {
        // This method is kept for compatibility but redirects to login
        $this->redirect(route('login'));
    }
}
