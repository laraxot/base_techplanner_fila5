<?php

declare(strict_types=1);

namespace Modules\TechPlanner\Filament\Resources\AppointmentResource\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Component;
use Modules\Xot\Filament\Resources\Schemas\XotBaseResourceInfolist;

class AppointmentInfolist extends XotBaseResourceInfolist
{
    /**
     * @return array<string, Component>
     */
    public function getInfolistSchema(): array
    {
        return [
            'id' => TextEntry::make('id'),
            'client.name' => TextEntry::make('client.name'),
            'worker.full_name' => TextEntry::make('worker.full_name')->placeholder('—'),
            'date' => TextEntry::make('date')->dateTime(),
            'status' => TextEntry::make('status')->badge(),
            'notes' => TextEntry::make('notes'),
            'outcome' => TextEntry::make('outcome')->placeholder('—'),
            'reminder_sent_at' => TextEntry::make('reminder_sent_at')->dateTime()->placeholder('—'),
            'created_at' => TextEntry::make('created_at')->dateTime(),
            'updated_at' => TextEntry::make('updated_at')->dateTime(),
        ];
    }
}
