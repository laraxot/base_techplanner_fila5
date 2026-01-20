<?php

declare(strict_types=1);

namespace Modules\TechPlanner\Filament\Resources\MailTemplateResource\Pages;

<<<<<<< HEAD
use Modules\Notify\Filament\Resources\MailTemplateResource\Pages\ListMailTemplates as NotifyListMailTemplates;
use Modules\TechPlanner\Filament\Resources\MailTemplateResource;
=======
use Modules\Lang\Filament\Resources\Pages\LangBaseListRecords;
use Modules\TechPlanner\Filament\Resources\MailTemplateResource;
use Modules\Notify\Filament\Resources\MailTemplateResource\Pages\ListMailTemplates as NotifyListMailTemplates;
>>>>>>> 4b6b99016 (first commit)

class ListMailTemplates extends NotifyListMailTemplates
{
    protected static string $resource = MailTemplateResource::class;
<<<<<<< HEAD
}
=======
}
>>>>>>> 4b6b99016 (first commit)
