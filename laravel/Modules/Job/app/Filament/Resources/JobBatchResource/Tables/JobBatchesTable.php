<?php

declare(strict_types=1);

namespace Modules\Job\Filament\Resources\JobBatchResource\Tables;

use Filament\Actions\Action;
use Filament\Actions\DeleteBulkAction;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Facades\Artisan;
<<<<<<< HEAD
use Modules\Job\Models\JobBatch;
=======
<<<<<<< HEAD
=======
use Modules\Job\Models\JobBatch;
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;

/**
 * JobBatchesTable Schema.
 */
class JobBatchesTable extends XotBaseResourceTable
{
    /**
<<<<<<< HEAD
=======
<<<<<<< HEAD
     * @return array<int|string, Column>
=======
>>>>>>> laraxot/dev
     * @var class-string<JobBatch>
     */
    protected static string $model = JobBatch::class;

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
            TextColumn::make('id')->sortable(),
            TextColumn::make('name')->searchable()->sortable(),
            TextColumn::make('total_jobs')->sortable(),
            TextColumn::make('pending_jobs')->sortable(),
            TextColumn::make('failed_jobs')->sortable(),
            TextColumn::make('created_at')->dateTime()->sortable(),
=======
>>>>>>> laraxot/dev
            'name' => TextColumn::make('name')->searchable()->sortable(),
            'total_jobs' => TextColumn::make('total_jobs')->numeric()->sortable(),
            'pending_jobs' => TextColumn::make('pending_jobs')->numeric()->sortable(),
            'failed_jobs' => TextColumn::make('failed_jobs')->numeric()->sortable(),
            'created_at' => TextColumn::make('created_at')->dateTime()->sortable(),
            'finished_at' => TextColumn::make('finished_at')->dateTime()->sortable(),
            'cancelled_at' => TextColumn::make('cancelled_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
            'id' => TextColumn::make('id')->searchable()->sortable()->toggleable(isToggledHiddenByDefault: true),
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
        ];
    }

    /**
     * @return array<string, Action>
     */
    public function getTableHeaderActions(): array
    {
        return [
            'prune_batches' => Action::make('prune_batches')
                ->requiresConfirmation()
                ->color('danger')
                ->action(static function (): void {
                    Artisan::call('queue:prune-batches');
                    Notification::make()
                        ->title('All batches have been pruned.')
                        ->success()
                        ->send();
                }),
        ];
    }

    public function getTableBulkActions(): array
    {
        return [
            'delete' => DeleteBulkAction::make(),
        ];
    }
}
