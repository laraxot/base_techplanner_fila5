<?php

declare(strict_types=1);

namespace Modules\Job\Filament\Resources\ScheduleResource\Tables;

use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\ViewAction;
<<<<<<< HEAD
use Filament\Tables\Columns\Column;
=======
<<<<<<< HEAD
=======
use Filament\Tables\Columns\Column;
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
use Filament\Tables\Columns\TextColumn;
use Modules\Job\Filament\Resources\ScheduleResource;
use Modules\Job\Models\Schedule;
use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;

class SchedulesTable extends XotBaseResourceTable
{
    /**
<<<<<<< HEAD
=======
<<<<<<< HEAD
     * @return array<string, mixed>
=======
>>>>>>> laraxot/dev
     * @var class-string<Schedule>
     */
    protected static string $model = Schedule::class;

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
=======
<<<<<<< HEAD
            'id' => TextColumn::make('id')->searchable()->sortable(),
            'created_at' => TextColumn::make('created_at')->dateTime(),
            'updated_at' => TextColumn::make('updated_at')->dateTime(),
=======
>>>>>>> laraxot/dev
            'command' => TextColumn::make('command')->searchable()->sortable()->wrap(),
            'expression' => TextColumn::make('expression')->searchable()->sortable(),
            'status' => TextColumn::make('status')->badge()->sortable(),
            'command_custom' => TextColumn::make('command_custom')->searchable()->sortable()->toggleable(isToggledHiddenByDefault: true),
            'created_at' => TextColumn::make('created_at')->dateTime()->sortable(),
            'updated_at' => TextColumn::make('updated_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
        ];
    }

    /**
     * @return array<string, mixed>
     */
    public function getTableActions(): array
    {
        return [
            'edit' => EditAction::make()
                ->hidden(static fn (Schedule $record): bool => $record->deleted_at !== null)
                ->tooltip(__('filament-support::actions/edit.single.label')),
            'restore' => RestoreAction::make()->tooltip(__('filament-support::actions/restore.single.label')),
            'delete' => DeleteAction::make()->tooltip(__('filament-support::actions/delete.single.label')),
            'forceDelete' => ForceDeleteAction::make()->tooltip(__(
                'filament-support::actions/force-delete.single.label',
            )),
            'history' => ViewAction::make()
                ->icon('history')
                ->color('gray')
                ->tooltip(ScheduleResource::trans('buttons.history')),
        ];
    }

    /**
     * @return array<string, mixed>
     */
    public function getTableBulkActions(): array
    {
        return [
            'delete' => DeleteBulkAction::make(),
        ];
    }
}
