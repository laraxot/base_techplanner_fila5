<?php

declare(strict_types=1);

namespace Modules\User\Filament\Widgets\Auth;

<<<<<<< HEAD
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Field;
use Filament\Forms\Components\TextInput;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Modules\Xot\Datas\XotData;
use Modules\Xot\Filament\Widgets\XotBaseWidget;

/**
 * LoginWidget: Widget di login conforme alle regole Windsurf/Xot.
 * - Estende XotBaseWidget
 * - Usa solo componenti Filament importati
 * - Validazione e sicurezza integrate
 * - Facilmente estendibile (2FA, captcha, login social).
<<<<<<< HEAD
 *
 * VIETATO: ->label(), ->placeholder(), ->helperText(). Le traduzioni sono gestite
 * automaticamente da LangServiceProvider tramite i file in Modules/User/lang/.
 * Vedi .cursor/rules/no-filament-labels.mdc
 * Traduzioni: LangServiceProvider risolve automaticamente da user::login_widget
 * (lang/it/login_widget.php). MAI usare ->label(), ->placeholder(), ->helperText().
 */
class LoginWidget extends XotBaseWidget
{
    /** Vista del widget (evita lookup da GetViewByClassAction che cerca login-widget). */
    protected string $view = 'user::filament.widgets.auth.login';

=======
 */
class LoginWidget extends XotBaseWidget
{
>>>>>>> 4b6b99016 (first commit)
    /**
     * @return array<string, Field>
     */
    #[\Override]
    public function getFormSchema(): array
    {
        return [
            'email' => TextInput::make('email')
                ->email()
                ->required()
                ->autofocus(),
            'password' => TextInput::make('password')
                ->password()
                ->required(),
            'remember' => Checkbox::make('remember'),
        ];
=======
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Auth;
use Modules\User\Filament\Widgets\Auth\Schemas\UserForm;
use Modules\Xot\Filament\Widgets\XotBaseSchemaWidget;

/**
 * LoginWidget: widget login con form Filament e "vestito" demandato al template tema.
 *
 * Religione Schema!=Widget: schema da `UserForm::getLoginFormSchema()` (SSoT).
 * Submit: `$this->form->getState()` — no `validateForm()`.
 * il widget resta "thin": solo orchestrazione submit + Auth::attempt.
 *
 * MAI: ->label(), ->placeholder(), ->helperText() — traduzioni automatiche
 * da LangServiceProvider tramite `user::login_widget` (lang/it/login_widget.php).
 *
 * @property Schema $form
 */
class LoginWidget extends XotBaseSchemaWidget
{
    /**
     * @return class-string<UserForm>
     */
    protected static function formClass(): string
    {
        return UserForm::class;
    }

    protected static function schemaMethod(): string
    {
        return 'getLoginFormSchema';
>>>>>>> dev
    }

    public function login(): void
    {
<<<<<<< HEAD
        // try {
=======
>>>>>>> dev
        /** @var array<string, mixed> $data */
        $data = $this->form->getState();

        $credentials = [
            'email' => is_string($data['email'] ?? null) ? $data['email'] : '',
            'password' => is_string($data['password'] ?? null) ? $data['password'] : '',
        ];

        $remember = isset($data['remember']) && true === $data['remember'];

        if (Auth::attempt($credentials, $remember)) {
            session()->regenerate();
<<<<<<< HEAD
            redirect()->intended('/');
        }

        $userClass = XotData::make()->getUserClass();
        $user = $userClass::where('email', $credentials['email'])->first();

        $this->addError('data.email', __('auth.failed'));
        // } catch (ValidationException $e) {
        // dddx([
        //    'credentials' => $credentials,
        //    'remember' => $remember,
        //    'e' => $e,
        // ]);
        // La validazione Filament gestisce automaticamente gli errori
        // throw $e;
        // }
    }
<<<<<<< HEAD

    /**
     * Invocato dal form della view (wire:submit.prevent="save"); delega a login().
=======
            $redirectUrl = \Illuminate\Support\Facades\Route::has('dashboard')
                ? route('dashboard')
                : url('/'.app()->getLocale());
            $this->redirect($redirectUrl);
        }

        $this->addError('data.email', __('user::login.actions.login.error'));
    }

    /**
     * Compat: il template tema usa `wire:submit.prevent="save"`.
>>>>>>> dev
     */
    public function save(): void
    {
        $this->login();
    }
<<<<<<< HEAD
=======
>>>>>>> 4b6b99016 (first commit)
=======
>>>>>>> dev
}
