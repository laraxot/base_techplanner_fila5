<?php

declare(strict_types=1);

namespace Modules\Lang\Filament\Resources\TranslationFileResource\Pages;

use Filament\Actions\Action;
<<<<<<< HEAD
use Filament\Actions\ActionGroup;
=======
>>>>>>> 6ed19256f (.)
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
            'key' => TextColumn::make('key')->searchable(['key', 'content']),
=======
            TextColumn::make('key')->searchable(['key', 'content']),
>>>>>>> 6ed19256f (.)
        ];
    }

    /**
<<<<<<< HEAD
     * @return array<string, Action|ActionGroup>
=======
     * @return array<string, Action>
>>>>>>> 6ed19256f (.)
     */
    #[\Override]
    protected function getHeaderActions(): array
    {
        $parentActions = parent::getHeaderActions();

        // Assicurarsi che tutte le azioni abbiano chiavi stringa
<<<<<<< HEAD
        /** @var array<string, Action|ActionGroup> $actions */
=======
>>>>>>> 6ed19256f (.)
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
