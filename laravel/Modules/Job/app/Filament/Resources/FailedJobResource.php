<?php

declare(strict_types=1);
/**
 * @see https://gitlab.com/amvisor/filament-failed-jobs/-/blob/master/src/resources/FailedJobsResource.php
 */

namespace Modules\Job\Filament\Resources;

use Modules\Job\Filament\Resources\FailedJobResource\Pages\ListFailedJobs;
use Modules\Job\Models\FailedJob;
use Modules\Xot\Filament\Resources\XotBaseResource;
use Override;

class FailedJobResource extends XotBaseResource
{
<<<<<<< HEAD
    protected static ?string $model = FailedJob::class;
=======
    protected static null|string $model = FailedJob::class;
>>>>>>> 6ed19256f (.)

    #[Override]
    public function getFormSchemaOld(): array
    {
<<<<<<< HEAD
        return [];
=======
        return [
            'uuid' => TextInput::make('uuid')->disabled()->columnSpan(4),
            'failed_at' => TextInput::make('failed_at')->disabled(),
            'id' => TextInput::make('id')->disabled(),
            'connection' => TextInput::make('connection')->disabled(),
            'queue' => TextInput::make('queue')->disabled(),
            'exception' => Textarea::make('exception')
                ->disabled()
                ->columnSpan(4)
                ->extraInputAttributes(['style' => 'font-size: 80%;']),
            'payload' => Textarea::make('payload')
                ->disabled()
                ->columnSpan(4)
                ->extraInputAttributes(['style' => 'font-size: 80%;']),
        ];
>>>>>>> 6ed19256f (.)
    }

    #[Override]
    public static function getRelations(): array
    {
        return [];
    }

    #[Override]
    public static function getPages(): array
    {
        return [
            'index' => ListFailedJobs::route('/'),
        ];
    }
}
