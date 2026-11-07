<?php

declare(strict_types=1);

namespace Modules\TechPlanner\Filament\Resources\ClientResource\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Components\View;
use Modules\Geo\Filament\Forms\Components\AddressSection;
use Modules\Notify\Filament\Forms\Components\ContactSection;
use Modules\TechPlanner\Filament\Forms\Components\CompanySection;
use Modules\Xot\Filament\Resources\Schemas\XotBaseResourceForm;

class ClientForm extends XotBaseResourceForm
{
    /**
     * @return array<string, Component>
     */
    public function getFormSchema(): array
    {
        return [
            'company' => CompanySection::make('company'),
            'address' => AddressSection::make('address'),
            'location_map' => View::make('techplanner::filament.forms.client-location-map')
                ->viewData(static fn (mixed $record): array => [
                    'client' => $record,
                    'asset_base' => asset('assets/geo/assets'),
                ])
                ->columnSpanFull(),
            'contacts' => ContactSection::make('contacts'),
            'competent_health_unit' => TextInput::make('competent_health_unit'),
            'notes' => Textarea::make('notes'),
        ];
    }
}
