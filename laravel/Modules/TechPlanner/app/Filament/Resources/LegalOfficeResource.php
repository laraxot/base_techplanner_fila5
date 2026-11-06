<?php

declare(strict_types=1);

namespace Modules\TechPlanner\Filament\Resources;

use Modules\TechPlanner\Filament\Resources\LegalOfficeResource\Pages\CreateLegalOffice;
use Modules\TechPlanner\Filament\Resources\LegalOfficeResource\Pages\EditLegalOffice;
use Modules\TechPlanner\Filament\Resources\LegalOfficeResource\Pages\ListLegalOffices;
use Modules\TechPlanner\Filament\Resources\LegalOfficeResource\Pages\ViewLegalOffice;
use Modules\TechPlanner\Filament\Resources\LegalOfficeResource\Schemas\LegalOfficeForm;
use Modules\TechPlanner\Filament\Resources\LegalOfficeResource\Schemas\LegalOfficeInfolist;
use Modules\TechPlanner\Models\LegalOffice;
use Modules\Xot\Filament\Resources\XotBaseResource;
use Override;

class LegalOfficeResource extends XotBaseResource
{
    protected static ?string $model = LegalOffice::class;

<<<<<<< .merge_file_VcAOD4
   
=======
    #[Override]
    public static function getFormSchema(): array
    {
        return [
            'name' => TextInput::make('name')->required()->maxLength(255),
            'address' => TextInput::make('address')->required()->maxLength(255),
            'city' => TextInput::make('city')->required()->maxLength(255),
            'postal_code' => TextInput::make('postal_code')->required()->maxLength(10),
            'province' => TextInput::make('province')->required()->maxLength(2),
            'country' => TextInput::make('country')
                ->required()
                ->default('IT')
                ->maxLength(2),
            'phone' => TextInput::make('phone')->tel()->maxLength(255),
            'email' => TextInput::make('email')->email()->maxLength(255),
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
            'index' => ListLegalOffices::route('/'),
            'create' => CreateLegalOffice::route('/create'),
            'edit' => EditLegalOffice::route('/{record}/edit'),
        ];
    }
<<<<<<< HEAD
>>>>>>> .merge_file_jf6yuf
}
=======
}
>>>>>>> 6ed19256f (.)
