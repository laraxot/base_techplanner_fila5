<?php

declare(strict_types=1);

namespace Modules\TechPlanner\Filament\Resources\MailTemplateResource\Pages;

use Modules\Lang\Filament\Resources\Pages\LangBaseCreateRecord;
use Modules\TechPlanner\Filament\Resources\MailTemplateResource;
use Modules\Notify\Filament\Resources\MailTemplateResource\Pages\CreateMailTemplate as NotifyCreateMailTemplate;

class CreateMailTemplate extends NotifyCreateMailTemplate
{
    protected static string $resource = MailTemplateResource::class;
}