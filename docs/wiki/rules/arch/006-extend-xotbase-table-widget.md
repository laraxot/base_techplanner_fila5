# 🔴 CRITICAL RULE: Extend XotBaseTableWidget

**Priority**: **CRITICAL**  
**Category**: Architecture  
**Enforced**: **ALWAYS**  
**Status**: **MANDATORY**

---

## Rule Statement

> **TUTTI i Filament Table Widget DEVONO estendere XotBaseTableWidget.**

**Perché**:
- ✅ Consistenza architetturale
- ✅ Ereditarietà di configurazioni comuni
- ✅ Condivisione di metodi helper
- ✅ Respect della Laraxot architecture
- ✅ Module-agnostic design pattern

---

## DO ✅

### Correct Extension

```php
<?php

declare(strict_types=1);

namespace Modules\Predict\Filament\Widgets;

use Filament\Tables\Table;
use Modules\Predict\Filament\Resources\PredictResource;

class OutcomesTableWidget extends XotBaseTableWidget  // ✅ CORRETTO
{
    protected int|string|array $columnSpan = 'full';

    public function getModelClass(): string
    {
        return \Modules\Rating\Models\Rating::class;
    }

    public function getResource(): string
    {
        return PredictResource::class;
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(fn() => \Modules\Rating\Models\Rating::query()
                ->where('rateable_type', \Modules\Predict\Models\Predict::class)
                ->where('rateable_id', $this->predict->id)
            )
            ->columns([...])
            ->filters([...])
            ->contentGrid([...]);
    }
}
```

---

## DON'T ❌

### Wrong Extension

```php
// ❌ SBAGLIATO: Estende Widget invece di XotBaseTableWidget
class OutcomesTableWidget extends Widget
{
    // ❌ Manca getModelClass()
    // ❌ Manca getResource()
    // ❌ Devi implementare tutto da zero
}

// ❌ SBAGLIATO: Estende TableWidget invece di XotBaseTableWidget
class OutcomesTableWidget extends TableWidget
{
    // ❌ Non rispetta Laraxot architecture
    // ❌ Non eredita configurazioni comuni
}
```

---

## Philosophy

### Why XotBaseTableWidget?

**XotBaseTableWidget** è il base class per TUTTI i widget Filament nel progetto Laraxot.

**Eredita**:
- ✅ `getModelClass()` - Definisce il model
- ✅ `getResource()` - Definisce la resource
- ✅ `table()` - Configura la table
- ✅ Common configurations
- ✅ Helper methods
- ✅ Module-agnostic patterns

**Rispetta**:
- ✅ DRY (Don't Repeat Yourself)
- ✅ KISS (Keep It Simple, Stupid)
- ✅ SOLID (Single Responsibility)
- ✅ Laraxot Architecture

---

## Architecture Context

### Widget Hierarchy

```
Filament\Widgets\Widget (Base)
└── XotBaseWidget (Laraxot Base)
    ├── XotBaseTableWidget (Per le tabelle)
    │   ├── OutcomesTableWidget
    │   ├── PredictTableWidget
    │   └── ...
    ├── XotBaseStatsWidget (Per le stats)
    └── XotBaseChartWidget (Per i chart)
```

**Perché questa gerarchia**:
- ✅ Separation of concerns
- ✅ Reusability
- ✅ Consistency
- ✅ Module-agnostic

---

## Migration Guide

### From Widget to XotBaseTableWidget

**Step 1**: Change extension
```php
// PRIMA
class OutcomesTableWidget extends Widget

// DOPO
class OutcomesTableWidget extends XotBaseTableWidget
```

**Step 2**: Add required methods
```php
public function getModelClass(): string
{
    return \Modules\Rating\Models\Rating::class;
}

public function getResource(): string
{
    return PredictResource::class;
}
```

**Step 3**: Remove duplicate code
```php
// RIMUOVI: Configurazioni già in XotBaseTableWidget
protected function getType(): string
{
    return 'table'; // ← Già in XotBaseTableWidget
}
```

---

## Examples

### Example 1: OutcomesTableWidget

```php
<?php

declare(strict_types=1);

namespace Modules\Predict\Filament\Widgets;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Modules\Predict\Filament\Resources\PredictResource;

class OutcomesTableWidget extends XotBaseTableWidget
{
    protected int|string|array $columnSpan = 'full';

    public function getModelClass(): string
    {
        return \Modules\Rating\Models\Rating::class;
    }

    public function getResource(): string
    {
        return PredictResource::class;
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(fn() => \Modules\Rating\Models\Rating::query()
                ->where('rateable_type', \Modules\Predict\Models\Predict::class)
                ->where('rateable_id', $this->predict->id)
            )
            ->columns([
                TextColumn::make('title')
                    ->label(__('predict::labels.outcome'))
                    ->sortable()
                    ->searchable(),
                TextColumn::make('price')
                    ->label(__('predict::labels.price'))
                    ->sortable()
                    ->formatStateUsing(fn($state) => "{$state}¢"),
            ])
            ->filters([
                SelectFilter::make('confidence_level')
                    ->options([
                        'HIGH' => 'High',
                        'MEDIUM' => 'Medium',
                        'LOW' => 'Low',
                    ]),
            ])
            ->contentGrid([
                'md' => 1,
                'lg' => 2,
                'xl' => 3,
            ]);
    }
}
```

---

## References

- [XotBaseWidget Source](../../../laravel/Modules/Xot/app/Filament/Widgets/XotBaseWidget.php)
- [XotBaseTableWidget Source](../../../laravel/Modules/Xot/app/Filament/Widgets/XotBaseTableWidget.php)
- [PredictTableWidget Example](../../../laravel/Modules/Predict/Filament/Widgets/FeaturedPredictsWidget.php)
- [Laraxot Architecture](../../../laravel/Modules/Xot/docs/ARCHITECTURE.md)

---

## Changelog

- **2026-03-26**: Created rule - CRITICAL
- **2026-03-26**: Added migration guide
- **2026-03-26**: Added examples

---

**Enforced By**: AI Agents, Code Review  
**Violations**: 0 (must remain 0)  
**Last Review**: 2026-03-26  
**Next Review**: 2026-04-01
