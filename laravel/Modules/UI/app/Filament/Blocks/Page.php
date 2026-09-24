<?php

declare(strict_types=1);

namespace Modules\UI\Filament\Blocks;

use Filament\Forms\Components\RichEditor;
<<<<<<< HEAD
use Filament\Schemas\Components\Component;
=======
>>>>>>> laraxot/dev
use Modules\Xot\Filament\Blocks\XotBaseBlock;

final class Page extends XotBaseBlock
{
    /**
<<<<<<< HEAD
     * @return array<int, Component>
=======
     * @return array<int, \Filament\Schemas\Components\Component>
>>>>>>> laraxot/dev
     */
    public static function getFormSchema(): array
    {
        return [
            RichEditor::make('content')
                ->required()
                ->label(__('ui::blocks.page.fields.content.label'))
                ->helperText(__('ui::blocks.page.fields.content.helper_text')),
        ];
    }

    public static function getTitle(): string
    {
        return __('ui::blocks.page.title');
    }
}
