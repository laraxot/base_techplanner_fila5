<?php

declare(strict_types=1);

/**
 * @see Jeffgreco13\FilamentBreezy\Pages
 * @see https://www.filamentcomponents.com/blog/how-to-create-a-custom-profile-page-with-filamentphp
 */

namespace Modules\User\Filament\Pages;

use Filament\Actions\Action;
use Filament\Facades\Filament;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Schemas\Components\Section;
<<<<<<< HEAD
<<<<<<< HEAD
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Filament\Schemas\Contracts\HasSchemas;
=======
>>>>>>> 4b6b99016 (first commit)
=======
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Filament\Schemas\Contracts\HasSchemas;
>>>>>>> dev
use Filament\Schemas\Schema;
use Filament\Support\Exceptions\Halt;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Modules\User\Datas\PasswordData;
use Modules\Xot\Filament\Pages\XotBasePage;

/**
 * @property Schema $form
 * @property Schema $editProfileForm
 * @property Schema $editPasswordForm
 */
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> dev
class MyProfilePage extends XotBasePage implements HasSchemas
{
    use InteractsWithSchemas;

<<<<<<< HEAD
=======
class MyProfilePage extends XotBasePage
{
>>>>>>> 4b6b99016 (first commit)
=======
>>>>>>> dev
    public ?array $profileData = [];

    public ?array $passwordData = [];

    protected string $view = 'user::filament.pages.my-profile';

    protected static bool $shouldRegisterNavigation = false;

    // public static function getSlug(): string
    // {
    //     return filament('filament-breezy')->slug();
    // }

    public function mount(): void
    {
        $this->fillForms();
    }

    public function editProfileForm(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Profile Information')
                    ->aside()
                    ->description('Update your account\'s profile information and email address.')
                    ->schema([
                        TextInput::make('name')->required(),
                        TextInput::make('email')
                            ->email()
                            ->required()
                            ->unique(ignoreRecord: true),
                    ]),
            ])
            ->model($this->getUser())
            ->statePath('profileData');
    }

    public function editPasswordForm(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Update Password')
                    ->aside()
                    ->description('Ensure your account is using long, random password to stay secure.')
                    ->schema([
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> dev
                        TextInput::make('current_password')
                            ->password()
                            ->required()
                            ->currentPassword()
                            ->validationMessages([
                                'current_password' => 'current_password',
                            ]),
<<<<<<< HEAD
=======
                        TextInput::make('Current password')
                            ->password()
                            ->required()
                            ->currentPassword(),
>>>>>>> 4b6b99016 (first commit)
=======
>>>>>>> dev
                        PasswordData::make()
                            ->getPasswordFormComponent('new_password')
                            ->dehydrateStateUsing(fn (string $state): string => Hash::make($state))
                            ->live(debounce: 500),
<<<<<<< HEAD
<<<<<<< HEAD
                        // ->same('password_confirmation')
=======
                        // ->same('passwordConfirmation')
>>>>>>> 4b6b99016 (first commit)
=======
                        // ->same('password_confirmation')
>>>>>>> dev
                        /*
                         * Forms\Components\TextInput::make('password')
                         * ->password()
                         * ->required()
                         * ->rule(Password::default())
                         * ->autocomplete('new-password')
                         * ->dehydrateStateUsing(fn ($state): string => Hash::make($state))
                         * ->live(debounce: 500)
<<<<<<< HEAD
<<<<<<< HEAD
                         * ->same('password_confirmation'),
                         */
                        TextInput::make('password_confirmation')
=======
                         * ->same('passwordConfirmation'),
                         */
                        TextInput::make('passwordConfirmation')
>>>>>>> 4b6b99016 (first commit)
=======
                         * ->same('password_confirmation'),
                         */
                        TextInput::make('password_confirmation')
>>>>>>> dev
                            ->password()
                            ->required()
                            ->dehydrated(false)
                            ->same('new_password'),
                    ]),
            ])
            ->model($this->getUser())
            ->statePath('passwordData');
    }

    public function getUser(): Authenticatable&Model
    {
        $user = Filament::auth()->user();

<<<<<<< HEAD
<<<<<<< HEAD
        if (! $user instanceof Model) {
=======
        if (! ($user instanceof Model)) {
>>>>>>> 4b6b99016 (first commit)
=======
        if (! $user instanceof Model) {
>>>>>>> dev
            throw new \Exception('The authenticated user object must be an Eloquent model to allow the profile page to update it.');
        }

        return $user;
    }

    public function getTitle(): string
    {
        return __('user::profile.my_profile');
    }

    public function getHeading(): string
    {
        return __('user::profile.my_profile');
    }

    public function getSubheading(): ?string
    {
        return __('user::profile.subheading') ?? null;
    }

    // public static function shouldRegisterNavigation(): bool
    // {
    //     return filament('filament-breezy')->shouldRegisterNavigation('myProfile');
    // }

    // public static function getNavigationGroup(): ?string
    // {
    //     return filament('filament-breezy')->getNavigationGroup('myProfile');
    // }

    // public function getRegisteredMyProfileComponents(): array
    // {
    //     return filament('filament-breezy')->getRegisteredMyProfileComponents();
    // }
    public function getFormSchema(): array
    {
        return [
            TextInput::make('name')->autofocus()->required(),
            TextInput::make('email')->required(),
        ];

        // Nota: i seguenti commenti sono stati rimossi perché non sono applicabili al metodo getFormSchema()
        // ->statePath('data')
        // ->model(auth()->user());
    }

    public function updateProfile(): void
    {
        try {
            $data = $this->editProfileForm->getState();

            $this->handleRecordUpdate($this->getUser(), $data);
        } catch (Halt $exception) {
            return;
        }

        $this->sendSuccessNotification();
    }

    public function updatePassword(): void
    {
        try {
            $data = $this->editPasswordForm->getState();

            if (isset($data['new_password'])) {
                $data['password'] = $data['new_password'];
                unset($data['new_password']);
            }

<<<<<<< HEAD
<<<<<<< HEAD
            if (isset($data['password_confirmation'])) {
                unset($data['password_confirmation']);
=======
            if (isset($data['passwordConfirmation'])) {
                unset($data['passwordConfirmation']);
>>>>>>> 4b6b99016 (first commit)
=======
            if (isset($data['password_confirmation'])) {
                unset($data['password_confirmation']);
>>>>>>> dev
            }

            $this->handleRecordUpdate($this->getUser(), $data);
        } catch (Halt $exception) {
            return;
        }

        if (request()->hasSession() && array_key_exists('password', $data)) {
            request()
                ->session()
                ->put([
                    'password_hash_'.Filament::getAuthGuard() => $data['password'],
                ]);
        }

        $this->editPasswordForm->fill();

        $this->sendSuccessNotification();
    }

    protected function getForms(): array
    {
        return [
            'editProfileForm',
            'editPasswordForm',
        ];
    }

    protected function fillForms(): void
    {
<<<<<<< HEAD
<<<<<<< HEAD
        /** @var array<string, mixed> $data */
=======
>>>>>>> 4b6b99016 (first commit)
=======
        /** @var array<string, mixed> $data */
>>>>>>> dev
        $data = $this->getUser()->attributesToArray();

        $this->editProfileForm->fill($data);
        $this->editPasswordForm->fill();
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('Update')->color('primary')->submit('Update'),
        ];
    }

    /*
     * public function update()
     * {
     * auth()->user()->update(
     * $this->form->getState()
     * );
     *
     * Notification::make()
     * ->title('Profile updated!')
     * ->success()
     * ->send();
     * }
     */

    protected function getUpdateProfileFormActions(): array
    {
        return [
            Action::make('updateProfileAction')->submit('editProfileForm'),
        ];
    }

    protected function getUpdatePasswordFormActions(): array
    {
        return [
            Action::make('updatePasswordAction')->submit('editPasswordForm'),
        ];
    }

    // ...

    /**
     * @param array<string, mixed> $data
     */
    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        $record->update($data);

        return $record;
    }

    private function sendSuccessNotification(): void
    {
        Notification::make()
            ->success()
            ->title(__('filament-panels::pages/auth/edit-profile.notifications.saved.title'))
            ->send();
    }
}
