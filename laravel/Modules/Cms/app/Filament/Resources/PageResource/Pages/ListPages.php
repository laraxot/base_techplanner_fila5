<?php

declare(strict_types=1);

namespace Modules\Cms\Filament\Resources\PageResource\Pages;

use Modules\Cms\Filament\Resources\PageResource;
use Modules\Lang\Filament\Resources\Pages\LangBaseListRecords;

class ListPages extends LangBaseListRecords
{
<<<<<<< HEAD
    public static string $resource = PageResource::class;
<<<<<<< .merge_file_SJZjKm
=======
=======
    protected static string $resource = PageResource::class;
>>>>>>> 6ed19256f (.)

    /**
     * @return array<string, Column>
     */
    public function getTableColumns(): array
    {
        return [
<<<<<<< HEAD
            'title' => TextColumn::make('title')->searchable(),
            'slug' => TextColumn::make('slug')->searchable(),
=======
            'id' => TextColumn::make('id'),
            'title' => TextColumn::make('title')->searchable()->sortable(),
            'lang' => TextColumn::make('lang')->searchable()->sortable(),
            'updated_at' => TextColumn::make('updated_at')->sortable()->dateTime(),
>>>>>>> 6ed19256f (.)
        ];
    }
>>>>>>> .merge_file_ztVl5Y
}
