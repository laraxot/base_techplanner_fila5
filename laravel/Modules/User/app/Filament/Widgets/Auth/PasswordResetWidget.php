<?php

declare(strict_types=1);

namespace Modules\User\Filament\Widgets\Auth;

<<<<<<< HEAD
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
=======
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\TextInput;{
>>>>>>> 8215f950 (.)
    public ?array $data = [];

    public bool $emailSent = false;

    /**
<<<<<<< HEAD
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
=======
     * @phpstan-ignore-next-line
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
        // try {        $data = $this->form->getState();
>>>>>>> 8215f950 (.)
        $password_broker = Password::broker();

        $response = $password_broker->sendResetLink([
            'email' => $data['email'],
        ]);

<<<<<<< HEAD
if ($response === Password::RESET_LINK_SENT) {
            $this->emailSent = true;
=======
        if (Password::RESET_LINK_SENT === $response) {            $this->emailSent = true;
>>>>>>> 8215f950 (.)

            Notification::make()
                ->title(__('user::auth.password_reset.email_sent.title'))
                ->body(__('user::auth.password_reset.email_sent.message'))
                ->success()
                ->duration(10000)
                ->send();

<<<<<<< HEAD
}
    public function resetForm(): void
=======
            // Clear the form    public function resetForm(): void
>>>>>>> 8215f950 (.)
    {
        $this->emailSent = false;
        $this->form->fill();
    }

<<<<<<< HEAD
public function checkEmailStatus(): void
    {
        $this->redirect(route('login'));
=======
    /**
     * Send another reset link.
     */        $this->redirect(route('login'));
>>>>>>> 8215f950 (.)
    }
}
