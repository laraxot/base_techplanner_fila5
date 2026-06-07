<?php

declare(strict_types=1);

namespace Modules\User\Filament\Clusters\Passport\Resources\OauthClientResource\Pages;

use Filament\Actions\Action;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
<<<<<<< HEAD
<<<<<<< HEAD
use Modules\User\Actions\Passport\CreateGenericClientAction;
use Modules\User\Actions\Passport\CreatePasswordClientAction;
use Modules\User\Actions\Passport\CreatePersonalAccessClientAction;
=======
use Modules\User\Actions\Passport\CreateClientAction;
>>>>>>> 4b6b99016 (first commit)
=======
use Modules\User\Actions\Passport\CreateGenericClientAction;
use Modules\User\Actions\Passport\CreatePasswordClientAction;
use Modules\User\Actions\Passport\CreatePersonalAccessClientAction;
>>>>>>> dev
use Modules\User\Filament\Clusters\Passport\Resources\OauthClientResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

class ListOauthClients extends XotBaseListRecords
{
    protected static string $resource = OauthClientResource::class;

    /**
     * @return array<string, Action>
     */
    protected function getHeaderActions(): array
    {
        return [
            'create_personal_access_client' => Action::make('create_personal_access_client')
                ->label(static::trans('actions.create_personal.label'))
                ->icon('heroicon-o-key')
                ->form([
                    TextInput::make('name')
                        ->default((string) config('app.name').' '.static::trans('actions.create_personal.label'))
                        ->required()
                        ->maxLength(255),
                ])
<<<<<<< HEAD
                ->action(function (array $data) {
<<<<<<< HEAD
=======
                ->action(function (array $data): void {
>>>>>>> dev
                    app(CreatePersonalAccessClientAction::class)->execute(
                        name: (string) $data['name'],
                        redirect: (string) config('app.url'),
                        user: null,
                        provider: null,
<<<<<<< HEAD
=======
                    app(CreateClientAction::class)->execute(
                        name: (string) $data['name'],
                        redirect: (string) config('app.url'),
                        personalAccess: true,
>>>>>>> 4b6b99016 (first commit)
=======
>>>>>>> dev
                    );
                    Notification::make()
                        ->title(static::trans('actions.create_personal.success'))
                        ->success()
                        ->send();
                }),

            'create_password_grant_client' => Action::make('create_password_grant_client')
                ->label(static::trans('actions.create_password.label'))
                ->icon('heroicon-o-lock-closed')
                ->form([
                    TextInput::make('name')
                        ->default((string) config('app.name').' '.static::trans('actions.create_password.label'))
                        ->required()
                        ->maxLength(255),
                    TextInput::make('provider')
                        ->default('users')
                        ->required()
                        ->maxLength(255),
                ])
<<<<<<< HEAD
                ->action(function (array $data) {
<<<<<<< HEAD
=======
                ->action(function (array $data): void {
>>>>>>> dev
                    app(CreatePasswordClientAction::class)->execute(
                        name: (string) $data['name'],
                        redirect: (string) config('app.url'),
                        user: null,
<<<<<<< HEAD
=======
                    app(CreateClientAction::class)->execute(
                        name: (string) $data['name'],
                        redirect: (string) config('app.url'),
                        password: true,
>>>>>>> 4b6b99016 (first commit)
=======
>>>>>>> dev
                        provider: (string) $data['provider'],
                    );
                    Notification::make()
                        ->title(static::trans('actions.create_password.success'))
                        ->success()
                        ->send();
                }),

            'create_client_credentials_client' => Action::make('create_client_credentials_client')
                ->label(static::trans('actions.create_client_credentials.label'))
                ->icon('heroicon-o-server')
                ->form([
                    TextInput::make('name')
                        ->default((string) config('app.name').' '.static::trans('actions.create_client_credentials.label'))
                        ->required()
                        ->maxLength(255),
                ])
<<<<<<< HEAD
                ->action(function (array $data) {
<<<<<<< HEAD
=======
                ->action(function (array $data): void {
>>>>>>> dev
                    app(CreateGenericClientAction::class)->execute(
                        name: (string) $data['name'],
                        redirect: (string) config('app.url'),
                        personalAccess: false,
                        password: false,
                        user: null,
                        provider: 'users',
<<<<<<< HEAD
=======
                    app(CreateClientAction::class)->execute(
                        name: (string) $data['name'],
                        redirect: (string) config('app.url'),
>>>>>>> 4b6b99016 (first commit)
=======
>>>>>>> dev
                    );
                    Notification::make()
                        ->title(static::trans('actions.create_client_credentials.success'))
                        ->success()
                        ->send();
                }),
        ];
    }
}
