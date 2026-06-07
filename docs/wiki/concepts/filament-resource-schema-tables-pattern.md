---
title: "Filament Resource Schema/Tables Pattern"
type: concept
sources: ["https://github.com/filamentphp/demo/tree/5.x/app/Filament/Resources"]
confidence: high
created: 2026-05-07
updated: 2026-05-07
tags: [filament, resources, schemas, tables, xotbase, pattern]
related:
  - concepts/xotbase-resource-form-pattern.md
  - concepts/filament-v5-schema-pattern.md
  - rules/xot-base-resource-table-no-configure.md
---

# Filament Resource Schema/Tables Pattern

This document describes the correct pattern for organizing Filament Resource files in the Laraxot modular architecture.

## Structure

Each Resource in `Modules/*/app/Filament/Resources/<name>Resource/` should have:

```
<name>Resource/
├── Schemas/
│   ├── <name>Form.php      # Extends XotBaseResourceForm
│   └── <name>Infolist.php  # Extends XotBaseResourceInfolist
└── Tables/
    └── <name>Table.php     # Extends XotBaseResourceTable
```

## Pattern Rules

### 1. Form Schema

- Extends `Modules\Xot\Filament\Resources\Schemas\XotBaseResourceForm`
- Method: `getFormSchema(): array` (NOT `configure()`)
- Uses associative array with string keys

```php
class ArticleForm extends XotBaseResourceForm
{
    public static function getFormSchema(): array
    {
        return [
            'title' => TextInput::make('title')->required(),
            // ...
        ];
    }
}
```

### 2. Infolist Schema

- Extends `Modules\Xot\Filament\Resources\Schemas\XotBaseResourceInfolist`
- Method: `getInfolistSchema(): array`
- Uses associative array with string keys

```php
class ArticleInfolist extends XotBaseResourceInfolist
{
    public static function getInfolistSchema(): array
    {
        return [
            'title' => TextEntry::make('title'),
            // ...
        ];
    }
}
```

### 3. Table

- Extends `Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable`
- Methods: `getTableColumns(): array`, `getTableFilters(): array`, `getTableActions(): array`, `getTableBulkActions(): array`
- **Do not** add `configure(Table $table)` on subclasses — it is `final` on the base and would duplicate wiring; see [`xot-base-resource-table-no-configure.md`](../rules/xot-base-resource-table-no-configure.md).
- Uses associative array with string keys

```php
class ArticlesTable extends XotBaseResourceTable
{
    public static function getTableColumns(): array
    {
        return [
            'title' => TextColumn::make('title')->searchable(),
            // ...
        ];
    }

    public static function getTableFilters(): array
    {
        return [
            'category' => SelectFilter::make('category')->relationship('category', 'name'),
        ];
    }
}
```

## Key Points

- **DO NOT** add `configure()` method to Form/Infolist classes - XotBase handles that
- **DO NOT** add `configure()` on Table subclasses extending `XotBaseResourceTable` — use `getTableColumns()` / `getTableFilters()` / `getTableActions()` / `getTableBulkActions()` only
- **DO NOT** modify the Resource class itself - XotBaseResource auto-discovers Schemas/Tables
- **ALWAYS** use associative arrays with meaningful string keys
- **Use** TextColumn for all columns including dates (use `->date()`, `->dateTime()`)
- **Use** `badge()` for boolean/status fields instead of separate BooleanEntry

## Reference

- Filament Demo: https://github.com/filamentphp/demo/tree/5.x/app/Filament/Resources
- XotBaseResourceForm: `Modules/Xot/app/Filament/Resources/Schemas/XotBaseResourceForm.php`
- XotBaseResourceInfolist: `Modules/Xot/app/Filament/Resources/Schemas/XotBaseResourceInfolist.php`
- XotBaseResourceTable: `Modules/Xot/app/Filament/Resources/Tables/XotBaseResourceTable.php`