<?php

/**
 * @see https://github.com/ryangjchandler/filament-user-resource/blob/main/src/resources/UserResource.php
 * @see https://github.com/3x1io/filament-user/blob/main/src/resources/UserResource.php
 */

declare(strict_types=1);

namespace Modules\User\Filament\Resources;

<<<<<<< HEAD
use Carbon\Carbon;
use Carbon\CarbonInterface;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\TextInput;
<<<<<<< HEAD
=======
use Filament\Resources\RelationManagers\RelationManager;
>>>>>>> 4b6b99016 (first commit)
use Filament\Schemas\Components\Section;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\HtmlString;
<<<<<<< HEAD
use Modules\User\Filament\Forms\Components\UserSection;
use Modules\User\Filament\Resources\UserResource\Pages\CreateUser;
=======
use Modules\User\Filament\Resources\UserResource\Pages\CreateUser;
use Modules\User\Filament\Resources\UserResource\RelationManagers\AuthenticationLogsRelationManager;
use Modules\User\Filament\Resources\UserResource\RelationManagers\ClientsRelationManager;
use Modules\User\Filament\Resources\UserResource\RelationManagers\OauthTokensRelationManager;
use Modules\User\Filament\Resources\UserResource\RelationManagers\SocialiteUsersRelationManager;
use Modules\User\Filament\Resources\UserResource\RelationManagers\TenantsRelationManager;
>>>>>>> 4b6b99016 (first commit)
=======
use Modules\User\Filament\Resources\UserResource\Schemas\UserForm;
>>>>>>> dev
use Modules\User\Filament\Resources\UserResource\Widgets\UserOverview;
use Modules\Xot\Datas\XotData;
use Modules\Xot\Filament\Resources\XotBaseResource;

class UserResource extends XotBaseResource
{
    public static function getWidgets(): array
    {
        return [
            UserOverview::class,
        ];
    }

    // public static function extendForm(\Closure $callback): void
    // {
    //    static::$extendFormCallback = $callback;
    // }

    #[\Override]
    public static function getFormSchema(): array
    {
<<<<<<< HEAD
        return [
<<<<<<< HEAD
            'worker' => UserSection::make('worker'),
            'section01' => Section::make([
                'name' => TextInput::make('name')->required(),
                // 'email' => TextInput::make('email')->required()->unique(ignoreRecord: true),
=======
            'section01' => Section::make([
                'name' => TextInput::make('name')->required(),
                'email' => TextInput::make('email')->required()->unique(ignoreRecord: true),
>>>>>>> 4b6b99016 (first commit)
                'password' => TextInput::make('password')
                    ->password()
                    ->dehydrateStateUsing(function ($state): ?string {
                        // Type narrowing for PHPStan Level 10
                        if (! is_string($state) || empty($state)) {
                            return null;
                        }

                        return Hash::make($state);
                    })
                    ->required(fn ($livewire) => $livewire instanceof CreateUser),
            ])->columnSpan(8),
            'section02' => Section::make([
                'created_at' => Placeholder::make('created_at')->content(static function ($record) {
                    // Type narrowing for PHPStan Level 10
                    if (! $record instanceof Model) {
                        return new HtmlString('&mdash;');
                    }

                    // PHPStan Level 10: hasAttribute() invece di property_exists() per Eloquent
                    if (! $record->hasAttribute('created_at')) {
                        return new HtmlString('&mdash;');
                    }

                    /** @var Carbon|null $createdAt */
                    $createdAt = $record->getAttribute('created_at');

                    if (null === $createdAt) {
                        return new HtmlString('&mdash;');
                    }
                    if ($createdAt instanceof CarbonInterface) {
                        return $createdAt->diffForHumans();
                    }
                    if ($createdAt instanceof \DateTimeInterface) {
                        return $createdAt->format('Y-m-d H:i:s');
                    }

                    return new HtmlString('&mdash;');
                }),
            ])->columnSpan(4),
        ];
=======
        /** @var array<int|string, \Filament\Schemas\Components\Component> */
        return UserForm::getFormSchema();
>>>>>>> dev
    }

    // public static function enablePasswordUpdates(bool|Closure $condition = true): void
    // {
    //     static::$enablePasswordUpdates = $condition;
    // }

    /*
     * public static function getModel(): string
     * {
     * return config('filament-user-resource.model');
     * }
     */

    #[\Override]
    public function hasCombinedRelationManagerTabsWithContent(): bool
    {
        return true;
    }

    /**
     * Get the model class name for this resource.
     *
<<<<<<< HEAD
     * @return class-string<Model>
=======
     * @return class-string
>>>>>>> dev
     */
    #[\Override]
    public static function getModel(): string
    {
        $xot = XotData::make();

<<<<<<< HEAD
        /* @var class-string<Model> */
        return $xot->getUserClass();
    }
<<<<<<< HEAD
=======

    /**
     * Get the relations available for the resource.
     *
     * @return array<int, class-string<RelationManager>>
     */
    #[\Override]
    public static function getRelations(): array
    {
        return [
            AuthenticationLogsRelationManager::class,
            OauthTokensRelationManager::class,
            SocialiteUsersRelationManager::class,
            ClientsRelationManager::class,
            TenantsRelationManager::class,
        ];
    }
>>>>>>> 4b6b99016 (first commit)
=======
        return $xot->getUserClass();
    }
>>>>>>> dev
}
