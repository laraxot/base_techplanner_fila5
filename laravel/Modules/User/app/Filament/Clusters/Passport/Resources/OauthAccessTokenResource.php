<?php

declare(strict_types=1);

namespace Modules\User\Filament\Clusters\Passport\Resources;

<<<<<<< HEAD
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Actions\BulkAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
=======
>>>>>>> 06ccbd93 (.)
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
<<<<<<< HEAD
use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\BaseFilter;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
=======
>>>>>>> 06ccbd93 (.)
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Modules\User\Actions\Passport\RevokeAllUserTokensAction;
use Modules\User\Actions\Passport\RevokeTokenAction;
use Modules\User\Filament\Clusters\Passport;
<<<<<<< HEAD
use Modules\User\Filament\Resources\UserResource;
use Modules\User\Models\OauthAccessToken;
use Modules\Xot\Filament\Resources\XotBaseResource;

use function Safe\json_encode;

class OauthAccessTokenResource extends XotBaseResource
{
    protected static ?string $cluster = Passport::class;

    protected static ?string $model = OauthAccessToken::class;
=======
use Modules\User\Filament\Clusters\Passport\Resources\OauthAccessTokenResource\Pages\EditOauthAccessTokens;
use Modules\User\Filament\Clusters\Passport\Resources\OauthAccessTokenResource\Pages\ListOauthAccessTokens;
use Modules\User\Filament\Clusters\Passport\Resources\OauthAccessTokenResource\Pages\ViewOauthAccessToken;
use Modules\User\Filament\Resources\UserResource;
use Modules\User\Models\OauthAccessToken;
use Modules\Xot\Filament\Resources\XotBaseResource;
>>>>>>> 06ccbd93 (.)

use function Safe\json_encode;
use Filament\Tables\Table;

class OauthAccessTokenResource extends XotBaseResource
{
    protected static ?string $cluster = Passport::class;

    protected static ?string $model = OauthAccessToken::class;

    public static function table(\Filament\Tables\Table $table): \Filament\Tables\Table
    {
        return $table
            ->columns([
                \Filament\Tables\Columns\TextColumn::make('id')
                    ->searchable()
                    ->sortable()
                    ->copyable(),

<<<<<<< HEAD
                TextColumn::make('user.name')
=======
                \Filament\Tables\Columns\TextColumn::make('user.name')
>>>>>>> 06ccbd93 (.)
                    ->searchable()
                    ->sortable()
                    ->url(function (mixed $record): ?string {
                        if (! $record instanceof OauthAccessToken) {
                            return null;
                        }
                        $user = $record->user;
<<<<<<< HEAD
                        if ($user !== null && method_exists($user, 'exists') && $user->exists) {
=======
                        if (null !== $user && method_exists($user, 'exists') && $user->exists) {
>>>>>>> 06ccbd93 (.)
                            return UserResource::getUrl('view', ['record' => $user]);
                        }

                        return null;
                    })
                    ->openUrlInNewTab(),

<<<<<<< HEAD
                TextColumn::make('client.name')
=======
                \Filament\Tables\Columns\TextColumn::make('client.name')
>>>>>>> 06ccbd93 (.)
                    ->searchable()
                    ->sortable(),

                \Filament\Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),

                \Filament\Tables\Columns\TextColumn::make('scopes')
                    ->limit(30)
                    ->tooltip(function (mixed $state): ?string {
                        if (null === $state) {
                            return null;
                        }
                        if (is_array($state)) {
                            /* @var array<string, mixed> $state */
                            return json_encode($state);
                        }

                        return is_string($state) ? $state : null;
                    }),

<<<<<<< HEAD
                IconColumn::make('revoked')
=======
                \Filament\Tables\Columns\IconColumn::make('revoked')
>>>>>>> 06ccbd93 (.)
                    ->boolean()
                    ->color(fn (bool $state): string => $state ? 'danger' : 'success'),

                \Filament\Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),

                \Filament\Tables\Columns\TextColumn::make('expires_at')
                    ->dateTime()
                    ->sortable()
                    ->formatStateUsing(function (mixed $state): string {
                        if ($state instanceof Carbon) {
                            $now = Carbon::now();
                            if ($state->lt($now)) {
                                return $state->format('Y-m-d H:i:s').' (Expired)';
                            }

                            return $state->format('Y-m-d H:i:s');
                        }

                        return 'N/A';
                    }),
            ])
            ->filters([
<<<<<<< HEAD
                Filter::make('revoked')
=======
                \Filament\Tables\Filters\Filter::make('revoked')
>>>>>>> 06ccbd93 (.)
                    ->query(fn (Builder $query) => $query->where('revoked', true)),

                \Filament\Tables\Filters\Filter::make('expired')
                    ->query(fn (Builder $query) => $query->where('expires_at', '<', now())),

                \Filament\Tables\Filters\Filter::make('valid')
                    ->query(fn (Builder $query) => $query->where('revoked', false)->where('expires_at', '>', now())),
            ])
            ->recordActions([
                \Filament\Actions\Action::make('revoke')
                    ->icon('heroicon-o-x-circle')
                    ->color('danger')
                    ->requiresConfirmation()
                    ->action(function (mixed $record) {
                        if ($record instanceof \Illuminate\Database\Eloquent\Model) {
                            if (app(RevokeTokenAction::class)->execute((string) $record->getKey())) {
                                Notification::make()
                                    ->title(static::trans('actions.revoke.success'))
                                    ->success()
                                    ->send();
                            }
                        }
                    })
                    ->visible(fn (mixed $record) => $record instanceof OauthAccessToken && ! $record->revoked),
<<<<<<< HEAD
                DeleteAction::make(),
=======
                \Filament\Actions\DeleteAction::make(),
>>>>>>> 06ccbd93 (.)
            ])
            ->bulkActions([
                \Filament\Actions\BulkAction::make('revoke_all_for_user')
                    ->icon('heroicon-o-x-circle')
                    ->color('danger')
                    ->requiresConfirmation()
                    ->action(function (Collection $records) {
                        $users = $records->pluck('user_id')->unique();
                        $count = 0;
                        foreach ($users as $userId) {
                            if (is_string($userId) || is_int($userId)) {
                                $count += app(RevokeAllUserTokensAction::class)->execute((string) $userId);
                            }
                        }
                        Notification::make()
                            ->title(static::trans('actions.revoke_all_for_user.success'))
                            ->success()
                            ->send();
                    }),
<<<<<<< HEAD
                DeleteBulkAction::make(),
=======
                \Filament\Actions\DeleteBulkAction::make(),
>>>>>>> 06ccbd93 (.)
            ])
            ->defaultSort('created_at', 'desc');
    }

    /**
<<<<<<< HEAD
     * @return array<string, Column>
=======
     * @return array<string, \Filament\Resources\Pages\PageRegistration>
>>>>>>> 06ccbd93 (.)
     */
    #[\Override]
    public static function getPages(): array
    {
        return [
            'index' => ListOauthAccessTokens::route('/'),
            'view' => ViewOauthAccessToken::route('/{record}'),
            'edit' => EditOauthAccessTokens::route('/{record}/edit'),
        ];
    }

    /**
     * @return array<string, Component>
     */
    #[\Override]
    public static function getFormSchema(): array
    {
        return [
            'oauth_access_token_info' => Section::make('OAuth Access Token Information')
                ->schema([
                    'grid_1' => Grid::make(2)
                        ->schema([
                            'user_id' => Select::make('user_id')
                                ->relationship('user', 'name')
                                ->searchable(),
                            'client_id' => Select::make('client_id')
                                ->relationship('client', 'name')
                                ->searchable()
                                ->required(),
                        ]),

                    'grid_2' => Grid::make(2)
                        ->schema([
                            'name' => TextInput::make('name')
                                ->maxLength(255),
                            'scopes' => TextInput::make('scopes'),
                        ]),
                ]),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->with(['user', 'client']);
    }
}
