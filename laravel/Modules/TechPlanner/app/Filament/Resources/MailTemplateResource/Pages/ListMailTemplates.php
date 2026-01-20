<?php

declare(strict_types=1);

namespace Modules\TechPlanner\Filament\Resources\MailTemplateResource\Pages;

use Modules\Lang\Filament\Resources\Pages\LangBaseListRecords;
use Modules\TechPlanner\Filament\Resources\MailTemplateResource;
use Modules\Notify\Filament\Resources\MailTemplateResource\Pages\ListMailTemplates as NotifyListMailTemplates;

class ListMailTemplates extends NotifyListMailTemplates
{
    protected static string $resource = MailTemplateResource::class;
}