<?php

declare(strict_types=1);

namespace Modules\UI\Filament\Traits;

use Modules\UI\Enums\TableLayoutEnum;
use Modules\UI\Filament\Actions\Table\TableLayoutTrait;

/**
 * Sincronizza la proprietà Livewire layoutView con la preferenza in sessione.
 *
 * @property TableLayoutEnum $layoutView
 */
trait HasTableLayoutPage
{
    use TableLayoutTrait;

    public function mountTableLayoutFromSession(string $identifier = 'default'): void
    {
        $this->layoutView = $this->getCurrentLayout($identifier);
    }

    public function setLayoutView(TableLayoutEnum $layout): void
    {
        $this->layoutView = $layout;
    }

    public static function isLayoutCapable(object $livewire): bool
    {
        return in_array(self::class, class_uses_recursive($livewire::class), true);
    }

    public static function readLayoutFrom(object $livewire): ?TableLayoutEnum
    {
        if (! self::isLayoutCapable($livewire)) {
            return null;
        }

        if (! property_exists($livewire, 'layoutView')) {
            return null;
        }

        $layout = $livewire->layoutView;

        return $layout instanceof TableLayoutEnum ? $layout : null;
    }

    public static function applyLayoutTo(object $livewire, TableLayoutEnum $layout): void
    {
        if (! self::isLayoutCapable($livewire)) {
            return;
        }

        if (! property_exists($livewire, 'layoutView')) {
            return;
        }

        $livewire->layoutView = $layout;
    }
}
