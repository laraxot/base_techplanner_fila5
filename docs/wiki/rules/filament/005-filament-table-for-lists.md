# 🔴 CRITICAL RULE: Use Filament Table Widget for Lists

**Priority**: **CRITICAL**  
**Category**: Architecture  
**Enforced**: **ALWAYS**  
**Status**: **MANDATORY**

---

## Rule Statement

> **MAI creare blade personalizzati per liste. Usa SEMPRE Filament Table Widget.**

**Perché**:
- ✅ Search già implementato (debounce 400ms)
- ✅ Sorting già implementato (multi-column)
- ✅ Filters già implementati (status, category, date)
- ✅ Pagination già implementata
- ✅ Bulk actions già pronte
- ✅ Export (CSV, Excel) già pronto
- ✅ Accessibility built-in
- ✅ Livewire reactivity
- ✅ URL synchronization

---

## DO ✅

### Outcomes List

```php
// ✅ CORRETTO: Filament Table Widget
class OutcomesTableWidget extends XotBaseTableWidget
{
    public function table(Table $table): Table
    {
        return $table
            ->searchable()      // ← Automatic search
            ->filters([         // ← Automatic filters
                SelectFilter::make('status'),
                DatePicker::make('created_at'),
            ])
            ->columns([         // ← Automatic sorting
                TextColumn::make('title')->sortable(),
                TextColumn::make('price')->sortable(),
                TextColumn::make('probability')->sortable(),
            ])
            ->contentGrid([     // ← Responsive grid
                'md' => 1,
                'lg' => 2,
                'xl' => 3,
            ]);
    }
}
```

### Blade View

```blade
{{-- ✅ CORRETTO: Usa Filament Table --}}
@livewire(OutcomesTableWidget::class)
```

---

## DON'T ❌

### Custom Blade con Foreach

```blade
{{-- ❌ SBAGLIATO: Custom blade con foreach --}}
<div class="grid grid-cols-3">
    @foreach($outcomes as $outcome)
        <div>{{ $outcome['title'] }}</div>
    @endforeach
</div>
```

**Problemi**:
- ❌ Search da implementare
- ❌ Sorting da implementare
- ❌ Filters da implementare
- ❌ Pagination da implementare
- ❌ Duplicazione codice
- ❌ Non accessibile
- ❌ Non responsive

---

## When to Use Filament Table

| Use Case | Filament Table | Custom Blade |
|----------|---------------|--------------|
| Outcomes List | ✅ YES | ❌ NO |
| Predict List | ✅ YES | ❌ NO |
| Recent Trades | ✅ YES | ❌ NO |
| Comments | ✅ YES | ❌ NO |
| Related Markets | ✅ YES | ❌ NO |
| Single Item Card | ❌ NO | ✅ YES |
| Hero Section | ❌ NO | ✅ YES |
| Chart Section | ❌ NO | ✅ YES |

---

## Examples

### Example 1: Outcomes Table

```php
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
                TextColumn::make('probability')
                    ->label(__('predict::labels.probability'))
                    ->sortable()
                    ->formatStateUsing(fn($state) => number_format($state * 100, 1) . '%'),
                TextColumn::make('sum_credit')
                    ->label(__('predict::labels.volume'))
                    ->sortable()
                    ->money(),
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

## Migration Guide

### From Custom Blade to Filament Table

**Step 1**: Create Widget
```bash
php artisan make:filament-widget OutcomesTableWidget
```

**Step 2**: Extend XotBaseTableWidget
```php
class OutcomesTableWidget extends XotBaseTableWidget
```

**Step 3**: Define columns
```php
public function table(Table $table): Table
```

**Step 4**: Replace blade
```blade
{{-- PRIMA --}}
@foreach($outcomes as $outcome)
    <div>{{ $outcome['title'] }}</div>
@endforeach

{{-- DOPO --}}
@livewire(OutcomesTableWidget::class)
```

---

## References

- [Filament Tables Documentation](https://filamentphp.com/docs/3.x/tables)
- [XotBaseTableWidget](../../../laravel/Modules/Xot/app/Filament/Widgets/XotBaseWidget.php)
- [PredictTableWidget Example](../../../laravel/Modules/Predict/Filament/Widgets/FeaturedPredictsWidget.php)

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
