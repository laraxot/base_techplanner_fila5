<?php

declare(strict_types=1);

namespace Modules\TechPlanner\Filament\Resources;

use Modules\TechPlanner\Filament\Resources\DeviceResource\Pages\CreateDevice;
use Modules\TechPlanner\Filament\Resources\DeviceResource\Pages\EditDevice;
use Modules\TechPlanner\Filament\Resources\DeviceResource\Pages\ListDevices;
use Modules\TechPlanner\Filament\Resources\DeviceResource\Pages\ViewDevice;
use Modules\TechPlanner\Filament\Resources\DeviceResource\Schemas\DeviceForm;
use Modules\TechPlanner\Filament\Resources\DeviceResource\Schemas\DeviceInfolist;
use Modules\TechPlanner\Filament\Resources\RelationManagers\DeviceVerificationsRelationManager;
use Modules\TechPlanner\Models\Device;
use Modules\Xot\Filament\Resources\XotBaseResource;
use Override;

class DeviceResource extends XotBaseResource
{
    protected static ?string $model = Device::class;

   
    #[Override]
    public static function getFormSchema(): array
    {
        return [
            'name' => TextInput::make('name')->required()->maxLength(255),
            'serial_number' => TextInput::make('serial_number')->required()->maxLength(255),
            'model' => TextInput::make('model')->required()->maxLength(255),
            'manufacturer' => TextInput::make('manufacturer')->required()->maxLength(255),
            'purchase_date' => DatePicker::make('purchase_date')->required(),
            'warranty_expiration' => DatePicker::make('warranty_expiration')->required(),
            'notes' => Textarea::make('notes')->maxLength(65535)->columnSpanFull(),
        ];
    }

    #[Override]
    public static function getPages(): array
    {
        return [
            'index' => ListDevices::route('/'),
            'create' => CreateDevice::route('/create'),
            'view' => ViewDevice::route('/{record}'),
            'edit' => EditDevice::route('/{record}/edit'),
        ];
    }

    #[Override]
    public static function getRelations(): array
    {
        return [
            DeviceVerificationsRelationManager::class,
        ];
    }
>>>>>>> .merge_file_R1dAtv
}
