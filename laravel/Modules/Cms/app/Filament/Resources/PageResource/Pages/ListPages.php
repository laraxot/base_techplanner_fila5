<?php

declare(strict_types=1);

namespace Modules\Cms\Filament\Resources\PageResource\Pages;

use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\TextColumn;
use Modules\Cms\Filament\Resources\PageResource;
use Modules\Lang\Filament\Resources\Pages\LangBaseListRecords;

class ListPages extends LangBaseListRecords
{
<<<<<<< HEAD
    protected static string $resource = PageResource::class;
=======
    public static string $resource = PageResource::class;
>>>>>>> dev

    /**
     * @return array<string, Column>
     */
    public function getTableColumns(): array
    {
        return [
<<<<<<< HEAD
<<<<<<< HEAD
            'title' => TextColumn::make('title')->searchable(),
            'slug' => TextColumn::make('slug')->searchable(),
=======
            'id' => TextColumn::make('id'),
            'title' => TextColumn::make('title')->searchable()->sortable(),
            'lang' => TextColumn::make('lang')->searchable()->sortable(),
            'updated_at' => TextColumn::make('updated_at')->sortable()->dateTime(),
>>>>>>> 4b6b99016 (first commit)
=======
            'title' => TextColumn::make('title')->searchable(),
            'slug' => TextColumn::make('slug')->searchable(),
>>>>>>> dev
        ];
    }
}
