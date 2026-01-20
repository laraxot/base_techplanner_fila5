<?php

declare(strict_types=1);

namespace Modules\TechPlanner\Filament\Resources\MailTemplateResource\Pages;

use Modules\Lang\Filament\Resources\Pages\LangBaseEditRecord;
use Modules\TechPlanner\Filament\Resources\MailTemplateResource;
use Modules\Notify\Filament\Resources\MailTemplateResource\Pages\EditMailTemplate as NotifyEditMailTemplate;

class EditMailTemplate extends NotifyEditMailTemplate
{
    protected static string $resource = MailTemplateResource::class;
}