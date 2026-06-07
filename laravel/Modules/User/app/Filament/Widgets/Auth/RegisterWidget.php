<?php

declare(strict_types=1);

namespace Modules\User\Filament\Widgets\Auth;

<<<<<<< HEAD
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Modules\User\Models\User;
use Modules\Xot\Actions\Cast\SafeStringCastAction;
use Modules\Xot\Filament\Widgets\XotBaseWidget;

class RegisterWidget extends XotBaseWidget
{
    protected string $view = 'user::widgets.auth.register-widget';

=======
use Filament\Notifications\Notification;
use Illuminate\Contracts\Auth\Authenticatable;
use Webmozart\Assert\Assert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Modules\User\Filament\Widgets\Auth\Schemas\UserForm;
use Modules\Xot\Datas\XotData;
use Modules\Xot\Filament\Widgets\XotBaseSchemaWidget;

/**
 * Register FO — schema SSoT in `Schemas\UserForm::getRegisterFormSchema()`.
 *
 * Religione R1 (form-fields-self-validate): NIENTE `validateForm()`, NIENTE
 *  `Hash::make`, NIENTE `SafeStringCast` qui dentro. Il form ha già
 *  `->dehydrateStateUsing(Hash::make)` sul campo `password`, quindi
 *  `$this->form->getState()` ritorna la password GIÀ hashata.
 *
 * Religione R3 (no wrapper Action): `$user = $userClass::create($data + defaults)`
 *  direttamente. Non creare `RegisterFoUserAction` per wrapping un create().
 *
 * Widget è il direttore d'orchestra sottile: lifecycle (mount, submit),
 *  side effects (activity log opzionale, email verify, Auth::login, redirect).
 *
 * NOTA GDPR: per conformità Garante Italiano, usare `Modules\Gdpr\Filament\Widgets\Auth\RegisterWidget`
 *  (con `privacy_accepted`/`terms_accepted`/`marketing_consent`). Questo widget
 *  è un fallback non-GDPR (es. dev locale senza modulo Gdpr attivo).
 */
class RegisterWidget extends XotBaseSchemaWidget
{
>>>>>>> dev
    protected static ?int $sort = 2;

    protected static ?string $maxHeight = '600px';

<<<<<<< HEAD
=======
    protected static function formClass(): string
    {
        return UserForm::class;
    }

    protected static function schemaMethod(): string
    {
        return 'getRegisterFormSchema';
    }

>>>>>>> dev
    public static function canView(): bool
    {
        return ! Auth::check();
    }

<<<<<<< HEAD
    public function mount(): void
    {
        $this->form->fill([]);
        Log::debug('Registration form initialized', [
            'ip' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);
    }

    #[\Override]
    public function getFormSchema(): array
    {
        return [
            'user_info' => Section::make()->schema([
                'first_name' => TextInput::make('first_name')
<<<<<<< HEAD
=======
                    ->label(__('user::auth.fields.first_name'))
>>>>>>> 4b6b99016 (first commit)
                    ->required()
                    ->string()
                    ->minLength(2)
                    ->maxLength(255)
<<<<<<< HEAD
                    ->autocomplete('given-name'),
                'last_name' => TextInput::make('last_name')
=======
                    ->autocomplete('given-name')
                    ->validationAttribute(__('user::auth.fields.first_name')),
                'last_name' => TextInput::make('last_name')
                    ->label(__('user::auth.fields.last_name'))
>>>>>>> 4b6b99016 (first commit)
                    ->required()
                    ->string()
                    ->minLength(2)
                    ->maxLength(255)
<<<<<<< HEAD
                    ->autocomplete('family-name'),
                'email' => TextInput::make('email')
=======
                    ->autocomplete('family-name')
                    ->validationAttribute(__('user::auth.fields.last_name')),
                'email' => TextInput::make('email')
                    ->label(__('user::auth.fields.email'))
>>>>>>> 4b6b99016 (first commit)
                    ->required()
                    ->email()
                    ->maxLength(255)
                    ->unique(User::class, 'email')
<<<<<<< HEAD
                    ->autocomplete('email'),
                'password_grid' => Grid::make(2)->schema([
                    'password' => TextInput::make('password')
=======
                    ->autocomplete('email')
                    ->validationAttribute(__('user::auth.fields.email'))
                    ->helperText(__('user::auth.help.email')),
                'password_grid' => Grid::make(2)->schema([
                    'password' => TextInput::make('password')
                        ->label(__('user::auth.fields.password'))
>>>>>>> 4b6b99016 (first commit)
                        ->password()
                        ->required()
                        ->string()
                        ->minLength(12)
                        ->maxLength(255)
                        ->rules([
                            'required',
                            'string',
                            'min:12',
                            'regex:/[A-Z]/',
                            'regex:/[a-z]/',
                            'regex:/[0-9]/',
                            'regex:/[^A-Za-z0-9]/',
                        ])
                        ->validationMessages([
                            'password.regex' => __('user::auth.validation.password.complexity'),
                        ])
                        ->autocomplete('new-password')
<<<<<<< HEAD
                        ->confirmed(),
                    'password_confirmation' => TextInput::make('password_confirmation')
=======
                        ->validationAttribute(__('user::auth.fields.password'))
                        ->helperText(__('user::auth.help.password'))
                        ->confirmed(),
                    'password_confirmation' => TextInput::make('password_confirmation')
                        ->label(__('user::auth.fields.password_confirmation'))
>>>>>>> 4b6b99016 (first commit)
                        ->password()
                        ->required()
                        ->string()
                        ->minLength(12)
                        ->maxLength(255)
                        ->autocomplete('new-password')
<<<<<<< HEAD
=======
                        ->validationAttribute(__('user::auth.fields.password_confirmation'))
>>>>>>> 4b6b99016 (first commit)
                        ->dehydrated(false)
                        ->same('password'),
                ]),
            ]),
        ];
=======
    /**
     * Compat: il template tema usa `wire:submit="save"`.
     */
    public function save(): void
    {
        $this->submit();
>>>>>>> dev
    }

    public function submit(): void
    {
<<<<<<< HEAD
        try {
            $validatedData = $this->validateForm();
            $this->logRegistrationAttempt($validatedData);

            $user = DB::transaction(function () use ($validatedData) {
                $user = $this->createUser($validatedData);
                $this->afterUserCreated($user);

                return $user;
            });

            $this->handleSuccessfulRegistration($user);
        } catch (ValidationException $e) {
            throw $e;
        } catch (\Exception $e) {
            $this->handleRegistrationError($e);
        }
    }

    /**
     * @return array<string, mixed>
     */
    protected function validateForm(): array
    {
        $data = $this->form->getState();

        return [
            'first_name' => app(SafeStringCastAction::class)->execute($data['first_name']),
            'last_name' => app(SafeStringCastAction::class)->execute($data['last_name']),
            'email' => app(SafeStringCastAction::class)->execute($data['email']),
            'password' => Hash::make(
                app(SafeStringCastAction::class)->execute($data['password']),
            ),
            'type' => 'standard',
            'state' => 'pending',
            'email_verified_at' => null,
        ];
    }

    /**
     * @param array<string, mixed> $data
     */
    protected function logRegistrationAttempt(array $data): void
    {
        $email = app(SafeStringCastAction::class)->execute($data['email']);
        Log::info('Registration attempt', [
            'email_hash' => hash('sha256', $email),
            'ip' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);
    }

    /**
     * @param array<string, mixed> $data
     */
    protected function createUser(array $data): User
    {
        return User::create($data);
    }

    protected function afterUserCreated(User $user): void
    {
        activity()
            ->causedBy($user)
            ->performedOn($user)
            ->withProperties([
                'type' => $user->type,
                'ip_address' => request()->ip(),
                'user_agent' => request()->userAgent(),
            ])
            ->log('User registered via RegisterWidget');
    }

    protected function handleSuccessfulRegistration(User $user): void
    {
        if (config('auth.must_verify_email')) {
=======
        /** @var array<string, mixed> $data */
        $data = $this->form->getState();

        $userClass = XotData::make()->getUserClass();

        $user = DB::transaction(function () use ($data, $userClass): Authenticatable {
            $firstName = is_string($data['first_name'] ?? null) ? trim($data['first_name']) : '';
            $lastName = is_string($data['last_name'] ?? null) ? trim($data['last_name']) : '';
            $name = trim($firstName.' '.$lastName);
            $email = is_string($data['email'] ?? null) ? trim($data['email']) : '';

            $user = $userClass::create(array_merge($data, [
                'name' => '' !== $name ? $name : $email,
                'email_verified_at' => null,
            ]));

            if (Schema::hasTable('activity_log')) {
                activity()
                    ->causedBy($user)
                    ->performedOn($user)
                    ->withProperties([
                        'ip_address' => request()->ip(),
                        'user_agent' => request()->userAgent(),
                    ])
                    ->log('User registered via RegisterWidget');
            }

            Assert::isInstanceOf($user, Authenticatable::class);

            return $user;
        });

        $this->handleSuccessfulRegistration($user);
    }

    protected function handleSuccessfulRegistration(Authenticatable $user): void
    {
        if (config('auth.must_verify_email') && method_exists($user, 'sendEmailVerificationNotification')) {
>>>>>>> dev
            $user->sendEmailVerificationNotification();
        }

        Auth::login($user);

        Notification::make()
<<<<<<< HEAD
            ->title(__('user::auth.registration.success'))
            ->success()
            ->send();

        $this->redirect(route('dashboard'));
    }

    protected function handleRegistrationError(\Exception $e): void
    {
        Log::error('Registration failed: '.$e->getMessage(), [
            'exception' => $e,
            'trace' => $e->getTraceAsString(),
            'ip' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);

        throw new \RuntimeException(__('user::auth.registration.error_occurred'));
    }
}
=======
            ->title(__('user::auth.register.success.text'))
            ->success()
            ->send();

        $redirectUrl = \Illuminate\Support\Facades\Route::has('dashboard')
            ? route('dashboard')
            : url('/'.app()->getLocale());

        $this->redirect($redirectUrl);
    }
}
>>>>>>> dev
