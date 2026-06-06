<?php

declare(strict_types=1);

namespace Modules\User\Filament\Widgets\Auth;

<<<<<<< HEAD
use Filament\Notifications\Notification;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use Modules\User\Filament\Widgets\Auth\Schemas\UserForm;
use Modules\Xot\Datas\XotData;
use Modules\Xot\Filament\Widgets\XotBaseSchemaWidget;
use Webmozart\Assert\Assert;

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
=======
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Modules\User\Models\User;
use Modules\Xot\Actions\Cast\SafeStringCastAction;
use Modules\Xot\Filament\Widgets\XotBaseWidget;

class RegisterWidget extends XotBaseWidget
{
    protected string $view = 'user::widgets.auth.register-widget';

>>>>>>> 8215f950 (.)
    protected static ?int $sort = 2;

    protected static ?string $maxHeight = '600px';

<<<<<<< HEAD
protected static function formClass(): string
=======
    protected static function formClass(): string
>>>>>>> 8215f950 (.)
    {
        return UserForm::class;
    }

    protected static function schemaMethod(): string
    {
        return 'getRegisterFormSchema';
    }

<<<<<<< HEAD
    /**
     * Compat: il template tema usa `wire:submit="save"`.
     */
    public function save(): void
    {
        $this->submit();
=======
    public static function canView(): bool
    {
        return ! Auth::check();
    }

    public function mount(): void
    {
        $this->form->fill([]);
    }

    #[\Override]
    public function getFormSchema(): array
    {
        return [
            'user_info' => Section::make()->schema([
                'first_name' => TextInput::make('first_name')
                    ->required()
                    ->string()
                    ->minLength(2)
                    ->maxLength(255)
                    ->autocomplete('given-name'),
                'last_name' => TextInput::make('last_name')
                    ->required()
                    ->string()
                    ->minLength(2)
                    ->maxLength(255)
                    ->autocomplete('family-name'),
                'email' => TextInput::make('email')
                    ->required()
                    ->email()
                    ->maxLength(255)
                    ->unique(User::class, 'email')
                    ->autocomplete('email'),
                'password_grid' => Grid::make(2)->schema([
                    'password' => TextInput::make('password')
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
                        ->confirmed(),
                    'password_confirmation' => TextInput::make('password_confirmation')
                        ->password()
                        ->required()
                        ->string()
                        ->minLength(12)
                        ->maxLength(255)
                        ->autocomplete('new-password')
                        ->dehydrated(false)
                        ->same('password'),
                ]),
            ]),
        ];
>>>>>>> 8215f950 (.)
    }

    public function submit(): void
    {
<<<<<<< HEAD
/** @var array<string, mixed> $data */
        $data = $this->form->getState();

        $userClass = XotData::make()->getUserClass();

        $user = DB::transaction(function () use ($data, $userClass): Authenticatable {
            $firstName = is_string($data['first_name'] ?? null) ? trim($data['first_name']) : '';
            $lastName = is_string($data['last_name'] ?? null) ? trim($data['last_name']) : '';
            $name = trim($firstName.' '.$lastName);
            $email = is_string($data['email'] ?? null) ? trim($data['email']) : '';

            $user = $userClass::create(array_merge($data, [
                'name' => $name !== '' ? $name : $email,
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
=======
        try {
            $validatedData = $this->validateForm();

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
>>>>>>> 8215f950 (.)
            $user->sendEmailVerificationNotification();
        }

        Auth::login($user);

        Notification::make()
<<<<<<< HEAD
->title(__('user::auth.register.success.text'))
            ->success()
            ->send();

        $redirectUrl = Route::has('dashboard')
            ? route('dashboard')
            : url('/'.app()->getLocale());

        $this->redirect($redirectUrl);
=======
            ->title(__('user::auth.registration.success'))
            ->success()
            ->send();

        $this->redirect(route('dashboard'));
    }

    protected function handleRegistrationError(\Exception $e): void
    {
        throw new \RuntimeException(__('user::auth.registration.error_occurred'), 0, $e);
>>>>>>> 8215f950 (.)
    }
}
