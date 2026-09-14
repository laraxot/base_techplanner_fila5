<?php

declare(strict_types=1);

namespace Modules\Job\Filament\Resources\FailedImportRowResource\Tables;

<<<<<<< HEAD
use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\TextColumn;
use Modules\Job\Models\FailedImportRow;
=======
<<<<<<< HEAD
use Filament\Tables\Columns\TextColumn;
=======
use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\TextColumn;
use Modules\Job\Models\FailedImportRow;
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;

class FailedImportRowsTable extends XotBaseResourceTable
{
    /**
<<<<<<< HEAD
=======
<<<<<<< HEAD
     * @return array<string, mixed>
=======
>>>>>>> laraxot/dev
     * @var class-string<FailedImportRow>
     */
    protected static string $model = FailedImportRow::class;

    /**
     * @return array<string, Column>
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
     */
    public function getTableColumns(): array
    {
        return [
<<<<<<< HEAD
            'import_id' => TextColumn::make('import_id')->searchable()->sortable(),
            'validation_error' => TextColumn::make('validation_error')->searchable()->wrap()->limit(120),
            'created_at' => TextColumn::make('created_at')->dateTime()->sortable(),
=======
<<<<<<< HEAD
            'id' => TextColumn::make('id')->searchable()->sortable(),
            'created_at' => TextColumn::make('created_at')->dateTime(),
            'updated_at' => TextColumn::make('updated_at')->dateTime(),
=======
            'import_id' => TextColumn::make('import_id')->searchable()->sortable(),
            'validation_error' => TextColumn::make('validation_error')->searchable()->wrap()->limit(120),
            'created_at' => TextColumn::make('created_at')->dateTime()->sortable(),
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
        ];
    }
}
