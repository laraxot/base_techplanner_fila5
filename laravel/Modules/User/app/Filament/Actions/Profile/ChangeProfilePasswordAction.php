<?php

/**
 * @see https://coderflex.com/blog/create-advanced-filters-with-filament
 */

declare(strict_types=1);

namespace Modules\User\Filament\Actions\Profile;

use Filament\Actions\Action;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
<<<<<<< HEAD
=======
use Illuminate\Database\Eloquent\Model;
>>>>>>> origin/dev
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Modules\User\Datas\PasswordData;
use Modules\Xot\Contracts\ProfileContract;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Datas\XotData;

/**
 * ---.
 */
final class ChangeProfilePasswordAction extends Action
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->translateLabel()
            ->tooltip(__('user::user.actions.change_password'))
            ->icon('heroicon-o-key')
            ->action(static function (ProfileContract $record, array $data): void {
                $user = $record->user;
<<<<<<< HEAD
                $profile_data = Arr::except($record->toArray(), ['id']);
                if (null === $user) {
                    $user_class = XotData::make()->getUserClass();
=======
                $profileData = Arr::except($record->toArray(), ['id']);
                if ($user === null) {
>>>>>>> origin/dev
                    /** @var UserContract */
                    $user = XotData::make()->getUserByEmail($record->email);
                }

<<<<<<< HEAD
                if (null === $user) {
                    /** @var array<string, mixed> $profile_data */
                    $user = $record->user()->create($profile_data);
                }
                // @phpstan-ignore argument.type, method.notFound
                $user->profile()->save($record);
=======
                if ($user === null) {
                    /** @var array<string, mixed> $profileData */
                    $user = $record->user()->create($profileData);
                }

                if ($user instanceof UserContract && $record instanceof Model) {
                    $user->profile()->save($record);
                }

>>>>>>> origin/dev
                $newPassword = is_string($data['new_password'] ?? null) ? $data['new_password'] : '';
                /*
                 * @var ProfileContract $record
                 */
                $record->update([
                    'password' => Hash::make($newPassword),
                ]);
                Notification::make()->success()->title('Password changed successfully.')->send();
            })
            ->schema(function (): array {
                return [
                    /*
                     * TextInput::make('new_password')
                     * ->password()
                     * ->required()
                     * ->rule(Password::default()),
                     */
                    PasswordData::make()->getPasswordFormComponent('new_password'),
                    TextInput::make('new_password_confirmation')
                        ->password()
                        ->rule(
                            'required',
                            /**
<<<<<<< HEAD
                             * @param callable(string): mixed $get
=======
                             * @param  callable(string): mixed  $get
>>>>>>> origin/dev
                             */
                            static fn (callable $get): bool => (bool) $get('new_password')
                        )
                        ->same('new_password'),
                ];
            });
    }

    public static function getDefaultName(): string
    {
        return 'changePassword';
    }
}

/*
 * Action::make('changePassword')
 * ->action(function (UserContract $user, array $data): void {
 * $user->update([
 * 'password' => Hash::make($data['new_password']),
 * ]);
 * Notification::make()->success()->title('Password changed successfully.');
 * })
 * ->form([
 * TextInput::make('new_password')
 * ->password()
 * ->required()
 * ->rule(Password::default()),
 * TextInput::make('new_password_confirmation')
 * ->password()
 * ->rule('required', fn ($get): bool => (bool) $get('new_password'))
 * ->same('new_password'),
 * ])
 * ->icon('heroicon-o-key')
 * // ->visible(fn (User $record): bool => $record->role_id === Role::ROLE_ADMINISTRATOR)
 */
