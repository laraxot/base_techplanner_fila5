<?php

declare(strict_types=1);

namespace Modules\UI\Filament\Actions\Table;

use Filament\Actions\Action;

final class TableLayoutToggleTableAction extends Action implements HasTableLayout
{
    use TableLayoutTrait;

    protected function setUp(): void
    {
        parent::setUp();

        $this->action(function (object $livewire): void {
            if (! isset($livewire->layoutView)) {
                return;
            }

            $layoutViewRaw = $livewire->layoutView;
            $layoutView = is_string($layoutViewRaw) ? $layoutViewRaw : '';

            $livewire->layoutView = $layoutView === 'grid' ? 'list' : 'grid';
        });
    }

    public static function getDefaultName(): string
    {
        return 'table_layout_toggle';
    }
}
