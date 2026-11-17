<?php

declare(strict_types=1);

namespace Modules\User\Filament\Widgets\Auth;

<<<<<<< HEAD
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Password;
use Modules\User\Filament\Widgets\Auth\Schemas\UserForm;
use Modules\Xot\Filament\Widgets\XotBaseSchemaWidget;

/**
 * ForgotPasswordWidget — invio link reset via email.
 *
 * Schema da `Schemas\UserForm::getForgotPasswordFormSchema()` — SSoT.
 *
 * @property Schema $form
 */
class ForgotPasswordWidget extends XotBaseSchemaWidget
=======
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Password;
// use Filament\Forms\Components\TextInput as FormsTextInput;
use Modules\Xot\Filament\Widgets\XotBaseWidget;

/**
 * @property Schema $form
 */
class ForgotPasswordWidget extends XotBaseWidget
>>>>>>> 6ed19256f (.)
{
    protected string $view = 'user::widgets.auth.forgot-password-widget';

    /**
<<<<<<< HEAD
     * @return class-string<Schemas\UserForm>
     */
    protected static function formClass(): string
    {
        return Schemas\UserForm::class;
    }

    protected static function schemaMethod(): string
    {
        return 'getForgotPasswordFormSchema';
=======
     * Get the form schema for this widget.
     *
     * @return array<string, Component>
     */
    #[\Override]
    public function getFormSchema(): array
    {
        return [
            'email' => TextInput::make('email')
                ->email()
                ->required()
                ->maxLength(255),
        ];
>>>>>>> 6ed19256f (.)
    }

    public function sendResetLink(): void
    {
        $data = $this->form->getState();

        $status = Password::sendResetLink(['email' => $data['email']]);

        if (Password::RESET_LINK_SENT === $status) {
            session()->flash('status', __($status));
        } else {
            $this->addError('email', __($status));
        }
    }
}
