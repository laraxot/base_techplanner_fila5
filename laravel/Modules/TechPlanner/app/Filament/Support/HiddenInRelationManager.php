<?php

declare(strict_types=1);

namespace Modules\TechPlanner\Filament\Support;

use Closure;
use Filament\Resources\RelationManagers\RelationManager;
use Livewire\Component;

/**
 * Campo `client_id` dei moduli usati sia dalla risorsa sia dalla scheda del cliente: nella scheda (RelationManager)
 * il cliente è già quello del record padre, quindi il campo si nasconde. Un solo punto invece della stessa closure
 * copiata in ogni modulo.
 */
final class HiddenInRelationManager
{
    /**
     * @return Closure(Component): bool
     */
    public static function make(): Closure
    {
        return static fn (Component $livewire): bool => $livewire instanceof RelationManager;
    }
}
