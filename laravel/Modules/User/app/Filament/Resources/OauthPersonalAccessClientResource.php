<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources;

use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
     * Get the table columns for the resource.
     *
     * @return array<string, Tables\Columns\Column>
     */
    public static function getTableColumns(): array
    {
        return [
            'id' => Tables\Columns\TextColumn::make('id')
                ->label('ID')
                ->sortable()
                ->searchable(),
            'client' => Tables\Columns\TextColumn::make('client.name')
                ->label('Client')
                ->sortable()
                ->searchable(),
            'created_at' => Tables\Columns\TextColumn::make('created_at')
                ->label('Created At')
                ->dateTime()
                ->sortable(),
            'updated_at' => Tables\Columns\TextColumn::make('updated_at')
                ->label('Updated At')
                ->dateTime()
                ->sortable(),
        ];
    }

    /**
     * Get the table filters for the resource.
     *
     * @return array<string, Tables\Filters\BaseFilter>
     */
    public static function getTableFilters(): array
    {
        return [
            'client_id' => Tables\Filters\SelectFilter::make('client_id')
                ->label('Client')
                ->relationship('client', 'name'),
        ];
    }

    /**
     * Get the table actions for the resource.
     *
* @return array<string, Action>
     */
    public static function getTableActions(): array
    {
        return [
            'edit' => EditAction::make(),
            'delete' => DeleteAction::make(),
        ];
    }

    /**
     * Get the table bulk actions for the resource.
     *
* @return array<string, Action|ActionGroup>
     */
    public static function getTableBulkActions(): array
    {
        return [
            'delete' => BulkActionGroup::make([
                DeleteBulkAction::make(),
            ]),
        ];
    }

    /**
     * Configure the model query.
     */
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->with(['client']);
    }
}
