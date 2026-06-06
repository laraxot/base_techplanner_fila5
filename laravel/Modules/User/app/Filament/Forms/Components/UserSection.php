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
<<<<<<< HEAD
    public static function getDefaultName(): ?string
    {
        return 'user';
    }

=======
>>>>>>> origin/dev
    protected function setUp(): void
    {
        parent::setUp();

        $this->schema([
            Grid::make(4)->schema([
                // TextInput::make('ente'),
                // TextInput::make('matr'),
                TextInput::make('first_name'),
                TextInput::make('last_name'),
                TextInput::make('email'),
            ]),
        ]);
    }
<<<<<<< HEAD
=======

    public static function getDefaultName(): ?string
    {
        return 'user';
    }
>>>>>>> origin/dev
}
