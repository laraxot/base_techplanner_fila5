<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources;

<<<<<<< HEAD
use Filament\Forms\Components\Field;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
=======
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Components\Grid;
use Filament\Tables;
>>>>>>> 6ed19256f (.)
use Illuminate\Database\Eloquent\Builder;
use Laravel\Passport\Client;
use Modules\Xot\Filament\Resources\XotBaseResource;

/**
 * OAuth Client Resource.
 *
 * ⚠️ IMPORTANTE: Estende XotBaseResource, MAI Filament\Resources\Resource
 * direttamente! Segue il pattern DRY: solo getFormSchema() necessario,
 * table() e metodi table* gestiti automaticamente.
 */
<<<<<<< HEAD
class OauthClientResource extends XotBaseResource
{
    protected static ?string $model = Client::class;

    /**
     * Schema del form per la risorsa.
     *
     * @return array<string, Field>
     */
    public static function getFormSchema(): array
    {
        return [
            'name' => TextInput::make('name')
                ->required()
                ->maxLength(255),
            'user_id' => Select::make('user_id')
                ->relationship('user', 'name')
                ->searchable(),
            'redirect' => TextInput::make('redirect')
                ->maxLength(2000),
            'secret' => TextInput::make('secret')
                ->password()
                ->maxLength(100),
            'provider' => Select::make('provider')
                ->options([
                    'users' => 'Users',
                ]),
            'personal_access_client' => TextInput::make('personal_access_client')
                ->numeric(),
            'password_client' => TextInput::make('password_client')
                ->numeric(),
=======
final class OauthClientResource extends XotBaseResource
{
    protected static ?string $model = Client::class;

    protected static ?string $recordTitleAttribute = 'name';

    /**
     * Schema del form per la creazione e modifica.
     *
     * @return array<string, Component>
     */
    #[\Override]
    public static function getFormSchema(): array
    {
        return [
            'grid' => Grid::make(2)->schema([
                'name' => TextInput::make('name')
                    ->label('Client Name')
                    ->required()
                    ->maxLength(255),
                'user_id' => Select::make('user_id')
                    ->relationship('user', 'name')
                    ->searchable(),
                'redirect' => TextInput::make('redirect')
                    ->label('Redirect URL')
                    ->maxLength(2000)
                    ->helperText('URL to redirect after authentication'),
                'personal_access_client' => Toggle::make(
                    'personal_access_client'
                )
                    ->label('Personal Access Client'),
                'password_client' => Toggle::make('password_client')
                    ->label('Password Client'),
            ]),
        ];
    }

    /**
     * Get the table columns.
     *
     * @return array<string, Tables\Columns\Column>
     */
    public static function getTableColumns(): array
    {
        return [
            'name' => Tables\Columns\TextColumn::make('name')
                ->label('Client Name')
                ->searchable()
                ->sortable(),
            'user.name' => Tables\Columns\TextColumn::make('user.name')
                ->label('User')
                ->searchable()
                ->sortable(),
            'personal_access_client' => Tables\Columns\IconColumn::make('personal_access_client')
                ->label('Personal Access Client')
                ->boolean(),
            'password_client' => Tables\Columns\IconColumn::make('password_client')
                ->label('Password Client')
                ->boolean(),
            'revoked' => Tables\Columns\IconColumn::make('revoked')
                ->boolean(),
>>>>>>> 6ed19256f (.)
        ];
    }

    /**
     * Configure the model query.
     */
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->with(['user']);
    }
}
