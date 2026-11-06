<?php

declare(strict_types=1);

namespace Modules\Job\Filament\Resources;

use Modules\Job\Models\Export;
use Modules\Xot\Filament\Resources\XotBaseResource;

class ExportResource extends XotBaseResource
{
<<<<<<< HEAD
    protected static ?string $model = Export::class;
<<<<<<< .merge_file_TGu2zj
=======
=======
    protected static null|string $model = Export::class;


>>>>>>> 6ed19256f (.)

    #[Override]
    public static function getFormSchema(): array
    {
        return [
            'name' => TextInput::make('name')->required()->maxLength(255),
            'type' => Select::make('type')
                ->required()
                ->options([
                    'csv' => 'CSV',
                    'excel' => 'Excel',
                    'pdf' => 'PDF',
                ])
                ->default('csv'),
            'status' => Select::make('status')
                ->required()
                ->options([
                    'pending' => 'Pending',
                    'processing' => 'Processing',
                    'completed' => 'Completed',
                    'failed' => 'Failed',
                ])
                ->default('pending'),
            'error_message' => Textarea::make('error_message')
                ->maxLength(65535)
                ->columnSpanFull(),
            'created_at' => DateTimePicker::make('created_at')->disabled(),
            'updated_at' => DateTimePicker::make('updated_at')->disabled(),
        ];
    }
>>>>>>> .merge_file_NMCpfW
}
