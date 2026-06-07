<?php

declare(strict_types=1);

namespace Modules\Lang\Filament\Resources\TranslationFileResource\Pages;

use Filament\Actions\Action;
<<<<<<< HEAD
=======
use Filament\Actions\ActionGroup;
>>>>>>> dev
use Filament\Tables\Columns\TextColumn;
use Modules\Lang\Filament\Actions\LocaleSwitcherRefresh;
use Modules\Lang\Filament\Resources\TranslationFileResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

class ListTranslationFiles extends XotBaseListRecords
{
    protected static string $resource = TranslationFileResource::class;

    #[\Override]
    public function getTableColumns(): array
    {
        return [
<<<<<<< HEAD
<<<<<<< HEAD
            'key' => TextColumn::make('key')->searchable(['key', 'content']),
=======
            TextColumn::make('key')->searchable(['key', 'content']),
>>>>>>> 4b6b99016 (first commit)
=======
            'key' => TextColumn::make('key')->searchable(['key', 'content']),
>>>>>>> dev
        ];
    }

    /**
<<<<<<< HEAD
     * @return array<string, Action>
=======
     * @return array<string, Action|ActionGroup>
>>>>>>> dev
     */
    #[\Override]
    protected function getHeaderActions(): array
    {
        $parentActions = parent::getHeaderActions();

        // Assicurarsi che tutte le azioni abbiano chiavi stringa
<<<<<<< HEAD
=======
        /** @var array<string, Action|ActionGroup> $actions */
>>>>>>> dev
        $actions = [
            'locale_switcher' => LocaleSwitcherRefresh::make('lang'),
        ];

        // Aggiungere le azioni parent con chiavi stringa
        foreach ($parentActions as $key => $action) {
            $actions['parent_'.(is_string($key) ? $key : ((string) $key))] = $action;
        }

        return $actions;
    }
}
