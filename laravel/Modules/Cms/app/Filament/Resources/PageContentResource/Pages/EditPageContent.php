<?php

declare(strict_types=1);

namespace Modules\Cms\Filament\Resources\PageContentResource\Pages;

use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
<<<<<<< HEAD
// use LaraZeus\SpatieTranslatable\Actions\LocaleSwitcher;
=======
use LaraZeus\SpatieTranslatable\Actions\LocaleSwitcher;
>>>>>>> 4b6b99016 (first commit)
use Modules\Cms\Filament\Resources\PageContentResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord;

class EditPageContent extends XotBaseEditRecord
{
    // use Translatable; // Temporaneamente commentato per compatibilità Filament 4.x

    protected static string $resource = PageContentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            'view' => ViewAction::make(),
            'delete' => DeleteAction::make(),
<<<<<<< HEAD
            // 'locale-switcher' => LocaleSwitcher::make(), // Temporarily disabled until lara-zeus package is working
=======
            'locale-switcher' => LocaleSwitcher::make(),
>>>>>>> 4b6b99016 (first commit)
        ];
    }
}
