<?php

declare(strict_types=1);

namespace Modules\User\Filament\Clusters\Passport\Resources;

<<<<<<< HEAD
use Filament\Actions\Action;
=======
>>>>>>> 6ed19256f (.)
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
<<<<<<< HEAD
use Filament\Notifications\Notification;
use Filament\Resources\Pages\PageRegistration;
=======
>>>>>>> 6ed19256f (.)
use Filament\Schemas\Components\Component;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
<<<<<<< HEAD
use Modules\User\Actions\Passport\RevokeRefreshTokenAction;
=======
>>>>>>> 6ed19256f (.)
use Modules\User\Filament\Clusters\Passport;
use Modules\User\Filament\Clusters\Passport\Resources\OauthRefreshTokenResource\Pages\ListOauthRefreshTokens;
use Modules\User\Filament\Clusters\Passport\Resources\OauthRefreshTokenResource\Pages\ViewOauthRefreshToken;
use Modules\User\Models\OauthRefreshToken;
use Modules\Xot\Filament\Resources\XotBaseResource;

class OauthRefreshTokenResource extends XotBaseResource
{
    protected static ?string $cluster = Passport::class;

    protected static ?string $model = OauthRefreshToken::class;

<<<<<<< HEAD
=======
    protected static ?string $recordTitleAttribute = 'id';

    /**
     * ⚠️ IMPORTANTE: NavigationIcon, ModelLabel e PluralModelLabel sono gestiti
     * automaticamente da NavigationLabelTrait e Filament v4 tramite i file di traduzione.
     * NON definire queste proprietà qui!
     */
>>>>>>> 6ed19256f (.)
    /**
     * Get the form schema for the resource.
     *
     * @return array<string, Component>
     */
    #[\Override]
    public static function getFormSchema(): array
    {
        return [
<<<<<<< HEAD
            'oauth_refresh_token_info' => Section::make(static::trans('label'))
=======
            'oauth_refresh_token_info' => Section::make('OAuth Refresh Token Information')
>>>>>>> 6ed19256f (.)
                ->schema([
                    'grid_1' => Grid::make(2)
                        ->schema([
                            'access_token_id' => Select::make('access_token_id')
                                ->relationship('accessToken', 'id')
                                ->searchable()
                                ->required(),
                            'revoked' => TextInput::make('revoked')
                                ->numeric()
                                ->required(),
                            'expires_at' => DateTimePicker::make('expires_at'),
                        ]),
                ]),
        ];
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->searchable()
<<<<<<< HEAD
                    ->sortable()
                    ->copyable(),

                TextColumn::make('access_token_id')
                    ->searchable()
                    ->sortable(),

                IconColumn::make('revoked')
                    ->boolean()
                    ->color(fn (bool $state): string => $state ? 'danger' : 'success'),

                TextColumn::make('expires_at')
                    ->dateTime()
                    ->sortable(),
=======
                    ->sortable(),
                TextColumn::make('accessToken.id')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                IconColumn::make('revoked')
                    ->boolean()
                    ->sortable(),
                TextColumn::make('expires_at')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
>>>>>>> 6ed19256f (.)
            ])
            ->filters([
                // Add filters for revoked status, expiration
            ])
            ->recordActions([
<<<<<<< HEAD
                Action::make('revoke')
                    ->icon('heroicon-o-x-circle')
                    ->color('danger')
                    ->requiresConfirmation()
                    ->action(function (mixed $record): void {
                        if ($record instanceof OauthRefreshToken && app(RevokeRefreshTokenAction::class)->execute($record)) {
                            Notification::make()
                                ->title(static::trans('actions.revoke.success'))
                                ->success()
                                ->send();
                        }
                    })
                    ->visible(fn (mixed $record) => $record instanceof OauthRefreshToken && ! (bool) $record->getAttribute('revoked')),
                DeleteAction::make(),
            ])
            ->bulkActions([
=======
                DeleteAction::make(),
            ])
            ->toolbarActions([
>>>>>>> 6ed19256f (.)
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
<<<<<<< HEAD
            ->defaultSort('expires_at', 'desc');
    }

    /**
     * @return array<string, PageRegistration>
=======
            ->defaultSort('created_at', 'desc');
    }

    /**
     * @return array<string, \Filament\Resources\Pages\PageRegistration>
>>>>>>> 6ed19256f (.)
     */
    #[\Override]
    public static function getPages(): array
    {
        return [
            'index' => ListOauthRefreshTokens::route('/'),
            'view' => ViewOauthRefreshToken::route('/{record}'),
        ];
    }

    /**
     * Modify the Eloquent query used to retrieve the records.
     */
    #[\Override]
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->with(['accessToken']);
    }
}
