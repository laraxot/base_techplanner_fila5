<?php

declare(strict_types=1);

namespace Modules\Notify\Filament\Resources\MailTemplateResource\Pages;

use Modules\Lang\Filament\Resources\Pages\LangBaseListRecords;
use Modules\Notify\Filament\Resources\MailTemplateResource;

class ListMailTemplates extends LangBaseListRecords
{
    protected static string $resource = MailTemplateResource::class;
<<<<<<< .merge_file_4lZLOY
=======

    #[Override]
    public function getTableColumns(): array
    {
        return [
<<<<<<< HEAD
            'slug' => TextColumn::make('slug')->searchable()->sortable(),
            // TextColumn::make('mailable')->searchable()->sortable(),
            'subject' => TextColumn::make('subject')->searchable()->sortable(),
            'counter' => TextColumn::make('counter')->searchable()->sortable(),
=======
            TextColumn::make('slug')->searchable()->sortable(),
            //TextColumn::make('mailable')->searchable()->sortable(),
            TextColumn::make('subject')->searchable()->sortable(),
            TextColumn::make('counter')->searchable()->sortable(),
>>>>>>> 6ed19256f (.)
        ];
    }
>>>>>>> .merge_file_xS1cc9
}
