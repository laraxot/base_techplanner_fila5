<?php

declare(strict_types=1);

namespace Modules\User\Filament\Widgets\Auth;

use Modules\User\Filament\Widgets\Auth\Schemas\UserForm;
use Modules\Xot\Filament\Widgets\XotBaseSchemaWidget;

/**
 * PasswordResetWidget — schermata di invio link reset (post-login, opzionale).
 *
 * Schema da `Schemas\UserForm::getPasswordResetFormSchema()` — SSoT.
 *
 * @property Schema $form
 */
class PasswordResetWidget extends XotBaseSchemaWidget
{
    public ?array $data = [];

    public bool $emailSent = false;

    /**
* @return class-string<UserForm>
     */
    protected static function formClass(): string
    {
        return UserForm::class;
    }

    protected static function schemaMethod(): string
    {
        return 'getPasswordResetFormSchema';
    }

    public function sendResetPasswordLink(): void
    {
        $data = $this->form->getState();
        $password_broker = Password::broker();

        $response = $password_broker->sendResetLink([
            'email' => $data['email'],
        ]);

if ($response === Password::RESET_LINK_SENT) {
            $this->emailSent = true;

            Notification::make()
                ->title(__('user::auth.password_reset.email_sent.title'))
                ->body(__('user::auth.password_reset.email_sent.message'))
                ->success()
                ->duration(10000)
                ->send();

}
    public function resetForm(): void
    {
        $this->emailSent = false;
        $this->form->fill();
    }

public function checkEmailStatus(): void
    {
        $this->redirect(route('login'));
    }
}
