<?php

declare(strict_types=1);

namespace Modules\TechPlanner\Filament\Resources;

use Illuminate\Database\Eloquent\Model;
<<<<<<< .merge_file_zDPcAR
use Modules\TechPlanner\Filament\Resources\AppointmentResource\Pages\CreateAppointment;
use Modules\TechPlanner\Filament\Resources\AppointmentResource\Pages\EditAppointment;
use Modules\TechPlanner\Filament\Resources\AppointmentResource\Pages\ListAppointments;
use Modules\TechPlanner\Filament\Resources\AppointmentResource\Pages\ViewAppointment;
use Modules\TechPlanner\Filament\Resources\AppointmentResource\Schemas\AppointmentForm;
use Modules\TechPlanner\Filament\Resources\AppointmentResource\Schemas\AppointmentInfolist;
=======
<<<<<<< HEAD
=======
use Modules\TechPlanner\Filament\Resources\AppointmentResource\Pages\CreateAppointment;
use Modules\TechPlanner\Filament\Resources\AppointmentResource\Pages\EditAppointment;
use Modules\TechPlanner\Filament\Resources\AppointmentResource\Pages\ListAppointments;
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_iNrPjG
use Modules\TechPlanner\Models\Appointment;
use Modules\Xot\Filament\Resources\XotBaseResource;
use Override;

class AppointmentResource extends XotBaseResource
{
    protected static ?string $model = Appointment::class;

<<<<<<< .merge_file_zDPcAR
   
=======
    #[Override]
    public static function getFormSchema(): array
    {
        return [
            /*
             * 'client_id' => Forms\Components\Select::make('client_id')
             * ->relationship('client', 'name')
             * ->required(),
             */
            'date' => DateTimePicker::make('date')->required(),
            /*
             * 'time' => Forms\Components\TimePicker::make('time')
             * ->required(),
             */
            /*
             * 'status' => Forms\Components\Select::make('status')
             * ->options([
             * 'scheduled' => 'Scheduled',
             * 'confirmed' => 'Confirmed',
             * 'completed' => 'Completed',
             * 'cancelled' => 'Cancelled',
             * ])
             * ->required(),
             */
            'notes' => Textarea::make('notes')->maxLength(65535)->columnSpanFull(),
        ];
    }

<<<<<<< HEAD
=======


>>>>>>> 6ed19256f (.)
    public static function canEdit(Model $record): bool
    {
        return true;
    }

    public static function canDetach(): bool
    {
        return false;
    }

    public static function canDelete(Model $record): bool
    {
        return true;
    }
>>>>>>> .merge_file_iNrPjG
}
