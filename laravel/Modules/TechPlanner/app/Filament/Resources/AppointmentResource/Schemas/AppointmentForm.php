<?php

declare(strict_types=1);

namespace Modules\TechPlanner\Filament\Resources\AppointmentResource\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Component;
use Modules\TechPlanner\Enums\AppointmentStatusEnum;
use Modules\TechPlanner\Models\Client;
use Modules\TechPlanner\Models\Worker;
use Modules\Xot\Filament\Resources\Schemas\XotBaseResourceForm;

class AppointmentForm extends XotBaseResourceForm
{
    /**
     * @return array<string, Component>
     */
    public function getFormSchema(): array
    {
        return [
            'client_id' => Select::make('client_id')
                ->relationship('client', 'company_name')
                ->getOptionLabelFromRecordUsing(
                    static fn (Client $client): string => $client->company_name
                        ?: ($client->name ?: 'Client'),
                )
                ->searchable()
                ->preload()
                ->required(),
            'worker_id' => Select::make('worker_id')
                ->relationship('worker', 'first_name')
                ->getOptionLabelFromRecordUsing(
                    static fn (Worker $worker): string => $worker->full_name
                        ?: 'Worker',
                )
                ->searchable(),
            'date' => DateTimePicker::make('date')->required(),
            'status' => Select::make('status')
                ->options(AppointmentStatusEnum::class)
                ->default(AppointmentStatusEnum::SCHEDULED->value),
            'notes' => Textarea::make('notes')->maxLength(65535)->columnSpanFull(),
            'outcome' => Textarea::make('outcome')
                ->maxLength(65535)
                ->columnSpanFull()
                ->visibleOn('edit'),
        ];
    }
}
