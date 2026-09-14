<?php

/**
 * @see https://github.com/mooxphp/jobs/blob/main/src/resources/JobsWaitingResource.php
 */

declare(strict_types=1);

namespace Modules\Job\Filament\Resources;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Modules\Job\Filament\Resources\JobsWaitingResource\Widgets\JobsWaitingOverview;
<<<<<<< HEAD
use Modules\Job\Models\JobsWaiting;
=======
<<<<<<< HEAD
use Modules\Job\Models\Job;
=======
use Modules\Job\Models\JobsWaiting;
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
use Modules\Xot\Filament\Resources\XotBaseResource;
use Override;

class JobsWaitingResource extends XotBaseResource
{
<<<<<<< HEAD
    protected static ?string $model = JobsWaiting::class;
=======
<<<<<<< HEAD
    protected static ?string $model = Job::class;
=======
    protected static ?string $model = JobsWaiting::class;
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev

    protected static bool $shouldRegisterNavigation = true;

    #[Override]

    public static function getWidgets(): array
    {
        return [
            JobsWaitingOverview::class,
        ];
    }
}
