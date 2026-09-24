<?php

declare(strict_types=1);
/**
 * @see https://github.com/husam-tariq/filament-database-schedule/blob/main/src/Filament/resources/ScheduleResource.php
 */

namespace Modules\Job\Filament\Resources;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Modules\Job\Datas\CommandData;
use Modules\Job\Filament\Resources\ScheduleResource\Pages\CreateSchedule;
use Modules\Job\Filament\Resources\ScheduleResource\Pages\EditSchedule;
use Modules\Job\Filament\Resources\ScheduleResource\Pages\ListSchedules;
use Modules\Job\Filament\Resources\ScheduleResource\Pages\ViewSchedule;
use Modules\Job\Models\Schedule;
use Modules\Xot\Filament\Resources\XotBaseResource;
use Override;
use Spatie\LaravelData\DataCollection;

class ScheduleResource extends XotBaseResource
{
    protected static ?string $model = Schedule::class;

    protected static bool $shouldRegisterNavigation = true;

    /** @var DataCollection<int, CommandData> */
    protected static DataCollection $commands;

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }

    #[Override]
    public static function getPages(): array
    {
        return [
            'index' => ListSchedules::route('/'),
            'create' => CreateSchedule::route('/create'),
            'edit' => EditSchedule::route('/{record}/edit'),
            'view' => ViewSchedule::route('/{record}'),
        ];
    }

    #[Override]
    public static function getRelations(): array
    {
        return [

        ];
    }
}
