<?php

declare(strict_types=1);

namespace Modules\TechPlanner\Filament\Resources\MedicalDirectorResource\Pages;

<<<<<<< HEAD
=======
use Modules\TechPlanner\Models\MedicalDirector;
>>>>>>> 4b6b99016 (first commit)
use Filament\Actions\Action;
use Filament\Actions\ImportAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Modules\TechPlanner\Filament\Imports\MedicalDirectorImporter;
use Modules\TechPlanner\Filament\Resources\MedicalDirectorResource;
<<<<<<< HEAD
use Modules\TechPlanner\Models\MedicalDirector;
=======
>>>>>>> 4b6b99016 (first commit)
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;
use Override;

class ListMedicalDirectors extends XotBaseListRecords
{
    protected static string $resource = MedicalDirectorResource::class;

    public function getTableColumns(): array
    {
        return [
            'id' => TextColumn::make('id')->sortable()->searchable(),
            'name' => TextColumn::make('name')->sortable()->searchable(),
            'email' => TextColumn::make('email')->sortable()->searchable(),
            'phone' => TextColumn::make('phone')->sortable()->searchable(),
            'created_at' => TextColumn::make('created_at')->dateTime()->sortable(),
            'updated_at' => TextColumn::make('updated_at')->dateTime()->sortable(),
        ];
    }

    public function getTableFilters(): array
    {
        return [
            SelectFilter::make('created_at')->options(
                function () {
                    $dates = MedicalDirector::selectRaw('DATE(created_at) as date')
                        ->distinct()
                        ->pluck('date', 'date');
<<<<<<< HEAD

                    if (is_object($dates) && method_exists($dates, 'toArray')) {
                        return $dates->toArray();
                    }

=======
                    
                    if (is_object($dates) && method_exists($dates, 'toArray')) {
                        return $dates->toArray();
                    }
                    
>>>>>>> 4b6b99016 (first commit)
                    return [];
                },
            ),
        ];
    }

    #[Override]
    protected function getHeaderActions(): array
    {
        /** @var array<string, Action> $actions */
        $actions = [
            ...parent::getHeaderActions(),
            ImportAction::make('importMedicalDirector')->importer(MedicalDirectorImporter::class),
        ];

        return $actions;
    }
}
