<?php

declare(strict_types=1);

namespace Modules\Cms\Filament\Resources\AttachmentResource\Pages;

use Modules\Cms\Filament\Resources\AttachmentResource;
use Modules\Lang\Filament\Resources\Pages\LangBaseListRecords;

class ListAttachments extends LangBaseListRecords
{
<<<<<<< HEAD
    public static string $resource = AttachmentResource::class;
<<<<<<< .merge_file_DozFu4
=======
=======
    protected static string $resource = AttachmentResource::class;
>>>>>>> 6ed19256f (.)

    /**
     * @return array<string, mixed>
     */
    public function getTableColumns(): array
    {
        return [
            'title' => TextColumn::make('title')->searchable(),
            'slug' => TextColumn::make('slug')->searchable(),
            'attachment' => TextColumn::make('attachment')->searchable(),
        ];
    }
>>>>>>> .merge_file_ZI4M9X
}
