<?php

declare(strict_types=1);

/*
 * @see https://coderflex.com/blog/create-advanced-filters-with-filament
 */

namespace Modules\User\Filament\Forms\Components;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;

class UserSection extends Section
{
public static function getDefaultName(): ?string
    {
        return 'user';
    }
}
