<?php

declare(strict_types=1);

namespace Modules\User\Filament\Clusters\Appearance\Pages;

use Filament\Actions\Action;
use Filament\Forms\Components\ColorPicker;
use Filament\Schemas\Schema;
use Filament\Support\Exceptions\Halt;
use Illuminate\Database\Eloquent\Model;
use Modules\User\Filament\Clusters\Appearance;
use Modules\Xot\Filament\Pages\XotBasePage;

/**
 * Pagina Colors nel Cluster Appearance.
 *
 * ⚠️ IMPORTANTE: Estende XotBasePage (Standalone), MAI Filament\Pages\Page!
 *
 * @property Schema $form
 *
 * @see XotBasePage
 * @see \Modules\User\docs\errori\class-page-not-found.md
 */
class Colors extends XotBasePage
{
    // $data è già definita in XotBasePage, non ridichiarare!
* @param  array<string, mixed>  $data
     */
    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        $record->update($data);

        return $record;
    }
}
