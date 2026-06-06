<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources;

use Filament\Forms\Components\Field;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Model;
        /* @var array<string, Field> $components */
        return $components;
    }

    /**
     * Get the model class for the resource from Passport.
     *
* @return class-string<Model>
     */
    /**
     * @return class-string<Model>
     */
    public static function getModel(): string
    {
        $model = Passport::clientModel();
        if (! class_exists($model)) {
            return Client::class;
        }

Assert::subclassOf($model, Model::class);

        /* @var class-string<Model> $model */
        return $model;
    }

    public static function getPages(): array
    {
        return [
            'index' => ListClients::route('/'),
            'view' => ViewClient::route('/{record}'),
            'edit' => EditClient::route('/{record}/edit'),
            'create' => CreateClient::route('/create'),
        ];
    }

    /**
     * Check if resource form components are enabled.
     */
    protected static function isResourceFormComponentsEnabled(): bool
    {
        return false;
    }

    /**
     * Get resource form components.
     */
    protected static function getResourceFormComponents(): array
    {
        return [];
    }
}
