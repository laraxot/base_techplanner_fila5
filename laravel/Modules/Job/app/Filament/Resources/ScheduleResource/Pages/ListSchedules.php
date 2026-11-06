<?php

declare(strict_types=1);

namespace Modules\Job\Filament\Resources\ScheduleResource\Pages;

use Modules\Job\Filament\Resources\ScheduleResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

class ListSchedules extends XotBaseListRecords
{
    protected static string $resource = ScheduleResource::class;
<<<<<<< .merge_file_9DIs7e
=======

    public function getTableColumns(): array
    {
        return [
            'id' => TextColumn::make('id')
                ->numeric()
                ->sortable()
                ->searchable(),
            'command' => TextColumn::make('command')->sortable()->searchable(),
            'params' => TextColumn::make('params')->wrap()->searchable(),
            'expression' => TextColumn::make('expression')->sortable()->searchable(),
            'timezone' => TextColumn::make('timezone')->sortable()->searchable(),
            'is_active' => IconColumn::make('is_active')->boolean()->sortable(),
            'without_overlapping' => IconColumn::make('without_overlapping')->boolean()->sortable(),
            'on_one_server' => IconColumn::make('on_one_server')->boolean()->sortable(),
            'created_at' => TextColumn::make('created_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            'updated_at' => TextColumn::make('updated_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
        ];
    }

    public function getListTableActions(): array
    {
        return [
            EditAction::make()
                ->hidden(static fn (Schedule $record): bool => $record->deleted_at !== null)
                ->tooltip(__('filament-support::actions/edit.single.label')),
            RestoreAction::make()->tooltip(__('filament-support::actions/restore.single.label')),
            DeleteAction::make()->tooltip(__('filament-support::actions/delete.single.label')),
            ForceDeleteAction::make()->tooltip(__(
                'filament-support::actions/force-delete.single.label',
            )),
            ViewAction::make()
                ->icon('history')
                ->color('gray')
                ->tooltip(static::trans('buttons.history')),
        ];
    }

    public function getListTableBulkActions(): array
    {
        return [
            DeleteBulkAction::make(),
        ];
    }

<<<<<<< HEAD
    protected function getTableRecordUrlUsing(): ?Closure
    {
        return static fn (): ?string => null;
=======
    protected function getTableRecordUrlUsing(): null|Closure
    {
        return static fn (): null|string => null;
>>>>>>> 6ed19256f (.)
    }
>>>>>>> .merge_file_Uy6vi3
}
