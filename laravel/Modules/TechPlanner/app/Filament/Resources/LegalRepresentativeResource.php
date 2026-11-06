<?php

declare(strict_types=1);

namespace Modules\TechPlanner\Filament\Resources;

use Modules\TechPlanner\Filament\Resources\LegalRepresentativeResource\Pages\CreateLegalRepresentative;
use Modules\TechPlanner\Filament\Resources\LegalRepresentativeResource\Pages\EditLegalRepresentative;
use Modules\TechPlanner\Filament\Resources\LegalRepresentativeResource\Pages\ListLegalRepresentatives;
use Modules\TechPlanner\Filament\Resources\LegalRepresentativeResource\Pages\ViewLegalRepresentative;
use Modules\TechPlanner\Filament\Resources\LegalRepresentativeResource\Schemas\LegalRepresentativeForm;
use Modules\TechPlanner\Filament\Resources\LegalRepresentativeResource\Schemas\LegalRepresentativeInfolist;
use Modules\TechPlanner\Models\LegalRepresentative;
use Modules\Xot\Filament\Resources\XotBaseResource;
use Override;

class LegalRepresentativeResource extends XotBaseResource
{
    protected static ?string $model = LegalRepresentative::class;

<<<<<<< .merge_file_E269RA
 
=======
    #[Override]
    public static function getFormSchema(): array
    {
        return [
            'name' => TextInput::make('name')->required()->maxLength(255),
            'surname' => TextInput::make('surname')->required()->maxLength(255),
            'email' => TextInput::make('email')
                ->email()
                ->required()
                ->maxLength(255),
            'phone' => TextInput::make('phone')->tel()->maxLength(255),
            'tax_code' => TextInput::make('tax_code')->maxLength(16),
            'role' => TextInput::make('role')->maxLength(255),
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
            'index' => ListLegalRepresentatives::route('/'),
            'create' => CreateLegalRepresentative::route('/create'),
            'edit' => EditLegalRepresentative::route('/{record}/edit'),
        ];
    }
<<<<<<< HEAD
>>>>>>> .merge_file_c4zhQ7
}
=======
}
>>>>>>> 6ed19256f (.)
