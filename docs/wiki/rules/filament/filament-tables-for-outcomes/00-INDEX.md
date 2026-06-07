# 📊 Filament Tables for Outcomes Rule

**Priority**: 🔴 CRITICAL  
**Date**: 2026-03-26  
**Version**: 1.0  
**Status**: ✅ Active

---

## 🎯 Fundamental Principle

> **NEVER use custom blade grid for outcomes**
>
> ALWAYS use Filament Widget Table for outcomes display.
> Filament Tables provide search, sorting, filters, pagination out-of-the-box.

---

## ❌ WRONG (NEVER DO THIS)

```blade
{{-- ❌ Custom blade grid with manual logic --}}
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($outcomes as $outcome)
        <div class="outcome-card">
            <h3>{{ $outcome['title'] }}</h3>
            <span>{{ number_format($outcome['probability'] * 100, 1) }}%</span>
            <button>Buy</button>
            <button>Sell</button>
        </div>
    @endforeach
</div>
```

**Problems**:
- ❌ Manual search implementation needed
- ❌ Manual sorting implementation needed
- ❌ Manual filters implementation needed
- ❌ Manual pagination implementation needed
- ❌ No bulk actions
- ❌ No export functionality
- ❌ Accessibility not guaranteed
- ❌ Violates DRY principle
- ❌ Violates KISS principle

---

## ✅ CORRECT (ALWAYS DO THIS)

### 1. Create Filament Widget

```php
// Modules/Predict/Filament/Widgets/OutcomesTableWidget.php
class OutcomesTableWidget extends Tables\Concerns\InteractsWithTable 
    implements Tables\Contracts\HasTable
{
    use Tables\Concerns\HasTable;

    public function table(Table $table): Table
    {
        return $table
            ->query($this->getOutcomesQuery())
            ->columns([
                TextColumn::make('rating.title')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('percentage')
                    ->sortable()
                    ->suffix('%'),
                // ... more columns
            ])
            ->filters([
                TernaryFilter::make('is_winner'),
                // ... more filters
            ])
            ->actions([
                Action::make('buy')
                    ->label('Buy')
                    ->icon('heroicon-s-arrow-trending-up'),
                Action::make('sell')
                    ->label('Sell')
                    ->icon('heroicon-s-arrow-trending-down'),
            ]);
    }
}
```

### 2. Use Widget in Blade

```blade
{{-- Modules/Predict/resources/views/partials/detail/outcomes-grid.blade.php --}}
<div class="bg-white rounded-3xl shadow-sm border border-gray-200">
    <div class="px-6 py-5 border-b">
        <h2>{{ __('predict::labels.outcomes', 'Outcomes') }}</h2>
    </div>
    
    <div class="p-6">
        {{-- Filament Outcomes Table Widget --}}
        @livewire(\Modules\Predict\Filament\Widgets\OutcomesTableWidget::class, [
            'predict' => $predict,
        ])
    </div>
</div>
```

**Benefits**:
- ✅ Automatic search (debounce 400ms)
- ✅ Automatic sorting (multi-column)
- ✅ Automatic filters (status, category, date)
- ✅ Automatic pagination (12/24/48)
- ✅ Bulk actions ready
- ✅ Export ready (CSV, Excel)
- ✅ Accessibility built-in (WCAG 2.2)
- ✅ DRY - No custom logic
- ✅ KISS - Use framework features

---

## 📋 Implementation Checklist

### Widget Creation
- [ ] Create `OutcomesTableWidget.php`
- [ ] Extend `Tables\Concerns\InteractsWithTable`
- [ ] Implement `HasTable` interface
- [ ] Define `table()` method
- [ ] Add searchable columns
- [ ] Add sortable columns
- [ ] Add filters
- [ ] Add actions (buy/sell)

### Blade Integration
- [ ] Remove custom blade grid
- [ ] Remove `@foreach` loop
- [ ] Add `@livewire` widget call
- [ ] Keep only wrapper styling
- [ ] Add proper i18n labels

### Testing
- [ ] Search works
- [ ] Sorting works
- [ ] Filters work
- [ ] Pagination works
- [ ] Actions work
- [ ] Export works
- [ ] Accessibility test passed

---

## 🎨 Styling Guidelines

### Wrapper Only
```blade
{{-- ✅ CORRECT - Wrapper provides structure only --}}
<div class="bg-white rounded-3xl shadow-sm">
    <div class="px-6 py-5 border-b">
        <h2>Outcomes</h2>
    </div>
    <div class="p-6">
        @livewire(OutcomesTableWidget::class)
    </div>
</div>
```

### NO Custom Styling
```blade
{{-- ❌ WRONG - Don't style individual outcomes --}}
<div class="outcome-card bg-gradient-to-r from-emerald-500">
    {{-- Let Filament handle styling --}}
</div>
```

---

## 📊 When to Use Filament Tables

| Use Case | Filament Table | Custom Blade |
|----------|----------------|--------------|
| Outcomes Display | ✅ YES | ❌ NO |
| Predict List | ✅ YES | ❌ NO |
| Transaction History | ✅ YES | ❌ NO |
| User Leaderboard | ✅ YES | ❌ NO |
| Comments List | ✅ YES | ❌ NO |
| Hero Section | ❌ NO | ✅ YES |
| Marketing Content | ❌ NO | ✅ YES |
| CMS Blocks | ❌ NO | ✅ YES |

**Rule**: If it's a **list of data** → Use Filament Table

---

## 🔗 Related Documentation

- [Filament Tables Documentation](https://filamentphp.com/docs/3.x/tables)
- [Filament Widgets Documentation](https://filamentphp.com/docs/3.x/widgets)
- [OutcomesTableWidget.php](../../../Modules/Predict/Filament/Widgets/OutcomesTableWidget.php)
- [outcomes-grid.blade.php](../../../Modules/Predict/resources/views/partials/detail/outcomes-grid.blade.php)

---

## 🚫 Common Mistakes

### 1. Manual Search Implementation
```blade
{{-- ❌ WRONG --}}
<input type="text" wire:model.live.debounce.400ms="search" />
@foreach($outcomes->filter(fn($o) => str_contains($o['title'], $search)) as $outcome)
    {{-- ... --}}
@endforeach

{{-- ✅ CORRECT --}}
TextColumn::make('rating.title')->searchable()
```

### 2. Manual Sorting Implementation
```blade
{{-- ❌ WRONG --}}
<button wire:click="sortBy('probability')">Probability</button>
@php $outcomes = $outcomes->sortBy($sortField); @endphp

{{-- ✅ CORRECT --}}
TextColumn::make('percentage')->sortable()
```

### 3. Manual Pagination Implementation
```blade
{{-- ❌ WRONG --}}
@php $paginated = $outcomes->slice($offset, $limit); @endphp

{{-- ✅ CORRECT --}}
Table::make()->paginationPageOptions([12, 24, 48])
```

---

## 💡 Philosophy

### Why Filament Tables?

1. **DRY (Don't Repeat Yourself)**
   - Search/sort/filter/pagination implemented ONCE in Filament
   - Reused across ALL outcome displays
   - No duplicate code

2. **KISS (Keep It Simple, Stupid)**
   - Use framework features
   - Don't reinvent the wheel
   - Less code = less bugs

3. **Accessibility**
   - Filament tables are WCAG 2.2 compliant
   - Keyboard navigation built-in
   - Screen reader friendly

4. **Maintainability**
   - One place to fix bugs
   - One place to add features
   - Consistent UX across app

5. **Performance**
   - Optimized queries
   - Lazy loading
   - Efficient rendering

---

## ✅ Quality Checklist

Before committing outcomes display:

- [ ] Using Filament Widget Table
- [ ] NO custom blade grid
- [ ] NO `@foreach` loop for outcomes
- [ ] Search enabled on title column
- [ ] Sorting enabled on percentage column
- [ ] Filters for winner status
- [ ] Buy/Sell actions defined
- [ ] Pagination configured
- [ ] Export enabled
- [ ] Accessibility tested
- [ ] i18n labels used

**If ANY check fails → DO NOT COMMIT**

---

**Maintained By**: AI Agents Team  
**Last Review**: 2026-03-26  
**Next Review**: 2026-04-02  
**Status**: ✅ Active - **MANDATORY**
