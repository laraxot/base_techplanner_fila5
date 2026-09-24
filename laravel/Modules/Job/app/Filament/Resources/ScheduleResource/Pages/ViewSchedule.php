<?php

declare(strict_types=1);

namespace Modules\Job\Filament\Resources\ScheduleResource\Pages;

use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Livewire\Attributes\Url;
use Modules\Job\Filament\Resources\ScheduleResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseResourcePage;

class ViewSchedule extends XotBaseResourcePage implements HasTable
{
    use InteractsWithForms;
    use InteractsWithTable {
        makeTable as makeBaseTable;
    }

    #[Url]
    public ?string $activeTab = null;

    protected static string $resource = ScheduleResource::class;

    protected string $view = 'filament-panels::resources.pages.list-records';

    public function getTitle(): string
    {
        return __('job::schedule.resource.history');
    }

    protected function getHeaderActions(): array
    {
        return [];
    }
}
