<?php

declare(strict_types=1);

namespace Modules\TechPlanner\Filament\Resources;

use Modules\TechPlanner\Filament\Resources\MedicalDirectorResource\Pages\CreateMedicalDirector;
use Modules\TechPlanner\Filament\Resources\MedicalDirectorResource\Pages\EditMedicalDirector;
use Modules\TechPlanner\Filament\Resources\MedicalDirectorResource\Pages\ListMedicalDirectors;
use Modules\TechPlanner\Filament\Resources\MedicalDirectorResource\Pages\ViewMedicalDirector;
use Modules\TechPlanner\Filament\Resources\MedicalDirectorResource\Schemas\MedicalDirectorForm;
use Modules\TechPlanner\Filament\Resources\MedicalDirectorResource\Schemas\MedicalDirectorInfolist;
use Modules\TechPlanner\Models\MedicalDirector;
use Modules\Xot\Filament\Resources\XotBaseResource;
use Override;

class MedicalDirectorResource extends XotBaseResource
{
    protected static ?string $model = MedicalDirector::class;

<<<<<<< .merge_file_FSwAGm
   
=======
    #[Override]
    public static function getFormSchema(): array
    {
        return [
            'name' => TextInput::make('name')->required()->maxLength(255),
            'license_number' => TextInput::make('license_number')->required()->maxLength(255),
            'specialization' => TextInput::make('specialization')->required()->maxLength(255),
            'email' => TextInput::make('email')
                ->email()
                ->required()
                ->maxLength(255),
            'phone' => TextInput::make('phone')
                ->tel()
                ->required()
                ->maxLength(255),
            'license_expiry' => DatePicker::make('license_expiry')->required(),
            'notes' => Textarea::make('notes')->maxLength(65535)->columnSpanFull(),
        ];
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
            'index' => ListMedicalDirectors::route('/'),
            'create' => CreateMedicalDirector::route('/create'),
            'edit' => EditMedicalDirector::route('/{record}/edit'),
        ];
    }
<<<<<<< HEAD
>>>>>>> .merge_file_DxcUgD
}
=======
}
>>>>>>> 6ed19256f (.)
