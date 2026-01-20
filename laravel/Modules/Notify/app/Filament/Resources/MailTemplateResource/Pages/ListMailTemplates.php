<?php

declare(strict_types=1);

namespace Modules\Notify\Filament\Resources\MailTemplateResource\Pages;

use Filament\Tables\Columns\TextColumn;
use Modules\Lang\Filament\Resources\Pages\LangBaseListRecords;
use Modules\Notify\Filament\Resources\MailTemplateResource;
use Override;

class ListMailTemplates extends LangBaseListRecords
{
    protected static string $resource = MailTemplateResource::class;

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
            // TextColumn::make('mailable')->searchable()->sortable(),
            TextColumn::make('subject')->searchable()->sortable(),
            TextColumn::make('counter')->searchable()->sortable(),
>>>>>>> 4b6b99016 (first commit)
        ];
    }
}
