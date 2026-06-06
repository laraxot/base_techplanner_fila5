<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources;

use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\Placeholder;
            'env_guide' => Placeholder::make('env_guide')
                ->hiddenLabel()
                ->content(__('fields.env_guide.content'))
                ->columnSpanFull(),
            'name' => TextInput::make('name')
                ->required()
                ->maxLength(255),
            'scopes' => KeyValue::make('scopes')
                // ->placeholder(static::trans('fields.scopes.placeholder'))
                ->helperText(__('fields.scopes.helper_text')),
            'client_id' => TextInput::make('client_id')
                ->required()
                ->maxLength(255)
                ->placeholder(__('fields.client_id.placeholder'))
                ->helperText(__('fields.client_id.helper_text')),
            'client_secret' => TextInput::make('client_secret')
                ->required()
                ->maxLength(1024)
                ->placeholder(__('fields.client_secret.placeholder'))
                ->helperText(__('fields.client_secret.helper_text')),
            'redirect' => TextInput::make('redirect')
                ->required()
                ->maxLength(255)
                ->placeholder(__('fields.redirect.placeholder'))
                ->helperText(__('fields.redirect.helper_text')),
            'parameters' => KeyValue::make('parameters')
                // ->placeholder(static::trans('fields.parameters.placeholder'))
                ->helperText(__('fields.parameters.helper_text')),
            'additional_params' => Textarea::make('additional_params'),
            'stateless' => Toggle::make('stateless')->helperText(__('fields.stateless.helper_text')),
            'active' => Toggle::make('active')->helperText(__('fields.active.helper_text')),
            'socialite' => Toggle::make('socialite')->helperText(__('fields.socialite.helper_text')),
            'enabled' => Toggle::make('enabled'),
            'svg' => Textarea::make('svg')
                ->columnSpanFull()
                ->placeholder(__('fields.svg.placeholder'))
                ->helperText(__('fields.svg.helper_text')),
        ];
    }

    #[\Override]
    public static function getRelations(): array
    {
        return [];
    }

    #[\Override]
    public static function getPages(): array
    {
        return [
            'index' => ListSocialProviders::route('/'),
            'create' => CreateSocialProvider::route('/create'),
            'view' => ViewSocialProvider::route('/{record}'),
            'edit' => EditSocialProvider::route('/{record}/edit'),
        ];
    }
}
