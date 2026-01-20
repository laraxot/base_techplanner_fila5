<?php

declare(strict_types=1);

namespace Modules\Employee\Filament\Resources;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Components\Section;
use Filament\Widgets\Widget;
<<<<<<< HEAD
use Modules\Employee\Filament\Resources\WorkHourResource\Pages;
=======
>>>>>>> 4b6b99016 (first commit)
use Modules\Employee\Models\WorkHour;
use Modules\Xot\Filament\Resources\XotBaseResource;
use Override;

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
>>>>>>> 4b6b99016 (first commit)
    /**
     * @return array<string|int, Component>
     */
    #[Override]
    public static function getFormSchema(): array
    {
        return [
            Section::make('Time Entry Details')
                ->schema([
                    Select::make('employee_id')->relationship('employee', 'name')->required(),
                    DateTimePicker::make('clock_in')->required(),
                    DateTimePicker::make('clock_out'),
                    Textarea::make('notes')->maxLength(65535),
                ])
                ->columns(2),
        ];
    }

    /**
     * @return array<class-string<Widget>>
     */
    public static function getHeaderWidgets(): array
    {
        return [];
    }
}
