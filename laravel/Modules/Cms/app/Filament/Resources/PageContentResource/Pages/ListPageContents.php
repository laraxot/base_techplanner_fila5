<?php

declare(strict_types=1);

namespace Modules\Cms\Filament\Resources\PageContentResource\Pages;

use Modules\Lang\Filament\Resources\Pages\LangBaseListRecords;

class ListPageContents extends LangBaseListRecords
{
    // use ListRecords\Concerns\Translatable;
<<<<<<< HEAD
    // public static string $resource = PageContentResource::class;
<<<<<<< .merge_file_JfrACA
=======
=======
    // protected static string $resource = PageContentResource::class;
>>>>>>> 6ed19256f (.)
    /**
     * @return array<int, Column|Stack>
     */
    public function getGridTableColumns(): array
    {
        /** @var array<int, Column> $columns */
        $columns = $this->getTableColumns();

        return [
            Stack::make($columns),
        ];
    }

    /**
     * @return array<int, TextColumn>
     */
    public function getTableColumns(): array
    {
        return [
            TextColumn::make('name')->sortable()->searchable(),
            TextColumn::make('slug')->sortable()->searchable(),
        ];
    }
>>>>>>> .merge_file_b6nbdI

    /*
     * protected function getHeaderActions(): array
     * {
     * return [
     * CreateAction::make(),
     * Actions\LocaleSwitcher::make(),
     * ];
     * }
     */
}
