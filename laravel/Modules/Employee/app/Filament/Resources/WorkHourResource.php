<?php

declare(strict_types=1);

namespace Modules\Employee\Filament\Resources;

use Filament\Widgets\Widget;
<<<<<<< HEAD
use Modules\Employee\Filament\Resources\WorkHourResource\Pages;
=======
>>>>>>> 6ed19256f (.)
use Modules\Employee\Models\WorkHour;
use Modules\Xot\Filament\Resources\XotBaseResource;

class WorkHourResource extends XotBaseResource
{
    protected static ?string $model = WorkHour::class;

<<<<<<< HEAD
    public static function getPages(): array
    {
        return array_merge(parent::getPages(), [
            'time-clock' => Pages\TimeClockPage::route('/time-clock'),
        ]);
    }

=======
>>>>>>> 6ed19256f (.)
    /**
     * @return array<class-string<Widget>>
     */
    public static function getHeaderWidgets(): array
    {
        return [];
    }
}
