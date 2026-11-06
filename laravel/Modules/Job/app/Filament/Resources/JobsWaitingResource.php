<?php

declare(strict_types=1);
/**
 * @see https://github.com/mooxphp/jobs/blob/main/src/resources/JobsWaitingResource.php
 */

namespace Modules\Job\Filament\Resources;

use Modules\Job\Filament\Resources\JobsWaitingResource\Widgets\JobsWaitingOverview;
use Modules\Job\Models\Job;
use Modules\Xot\Filament\Resources\XotBaseResource;
use Override;

class JobsWaitingResource extends XotBaseResource
{
<<<<<<< HEAD
    protected static ?string $model = Job::class;
=======
    protected static null|string $model = Job::class;
>>>>>>> 6ed19256f (.)

    protected static bool $shouldRegisterNavigation = true;

    #[Override]
    public static function getWidgets(): array
    {
        return [
            JobsWaitingOverview::class,
        ];
    }
}
