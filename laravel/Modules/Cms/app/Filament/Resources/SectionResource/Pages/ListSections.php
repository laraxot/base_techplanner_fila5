<?php

declare(strict_types=1);

namespace Modules\Cms\Filament\Resources\SectionResource\Pages;

use Modules\Cms\Filament\Resources\SectionResource;
use Modules\Lang\Filament\Resources\Pages\LangBaseListRecords;

class ListSections extends LangBaseListRecords
{
<<<<<<< HEAD
    public static string $resource = SectionResource::class;
<<<<<<< .merge_file_ZMFwtz
=======
=======
    protected static string $resource = SectionResource::class;
>>>>>>> 6ed19256f (.)

    /**
     * @return array<string, mixed>
     */
    public function getTableColumns(): array
    {
        return [
            'name' => TextColumn::make('name')->sortable()->searchable(),
            'slug' => TextColumn::make('slug')->sortable()->searchable(),
        ];
    }
>>>>>>> .merge_file_MlQNzR
}
