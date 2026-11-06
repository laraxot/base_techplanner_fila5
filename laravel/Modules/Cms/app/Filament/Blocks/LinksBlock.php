<?php

declare(strict_types=1);

namespace Modules\Cms\Filament\Blocks;

use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Modules\Xot\Filament\Blocks\XotBaseBlock;

final class LinksBlock extends XotBaseBlock
{
    public static function getBlockSchema(): array
    {
        return [
            TextInput::make('title')->required(),
            Repeater::make('links')
                ->schema([
                    TextInput::make('label')->required(),
                    TextInput::make('url')->required()->url(),
                    TextInput::make('icon'),
                ])
                ->collapsible()
                ->itemLabel(fn (array $state): ?string => isset($state['label']) && is_string($state['label']) ? $state['label'] : null),
        ];
    }

    public static function getBlockLabel(): string
    {
<<<<<<< .merge_file_PJ4GHy
        return \trans_string('cms::filament.blocks.footer.links.label') ?: 'Footer Links Block';
=======
<<<<<<< HEAD
        return \trans_string('cms::filament.blocks.footer.links.label');
=======
        return \trans_string('cms::filament.blocks.footer.links.label') ?? 'Links';
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_9ikq0x
    }
}
