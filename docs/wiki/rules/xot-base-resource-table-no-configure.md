---
title: "XotBaseResourceTable — vietato configure nelle sottoclassi"
type: rule
confidence: high
created: 2026-05-13
updated: 2026-05-13
tags: [filament, xot, tables, laraxot, dry]
related:
  - concepts/xotbase-table-columns-enforcement.md
  - filament-table-columns-array-keys.md
  - skills/xot-base-resource-table.md
---

# XotBaseResourceTable: niente `configure()` nelle sottoclassi

## Scopo

`Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable` espone **`configure(Table $table): Table` come `final`**: orchestra colonne, filtri, azioni riga e bulk chiamando i metodi statici dedicati. Le classi che estendono la base **non devono** dichiarare un proprio `configure()` (né duplicare la catena `->columns()->filters()->…`).

## Perché (business logic)

- **Un solo punto di wiring**: evita due fonti di verità (es. `getTableColumns()` pieno ma `configure()` che ignora tutto e ridefinisce le colonne).
- **Coerenza Filament v5**: la base usa `recordActions` / `toolbarActions` come da convenzione progetto; copiare snippet legacy con `->actions()` / `->bulkActions()` disallinea il comportamento.
- **Enforcement**: la base valida colonne non vuote e applica sempre lo stesso contratto.

## Cosa fare al posto di `configure()`

| Esigenza | Metodo da implementare / estendere |
|----------|-----------------------------------|
| Colonne | `getTableColumns(): array` (chiavi stringa obbligatorie) |
| Filtri | `getTableFilters(): array` |
| Azioni riga | `getTableActions(): array` |
| Azioni bulk | `getTableBulkActions(): array` |

## Anti-pattern

```php
// SBAGLIATO: ridondante, conflitto con final, o doppia definizione
class MyTable extends XotBaseResourceTable
{
    public static function configure(Table $table): Table
    {
        return $table->columns([...]);
    }
}
```

## Riferimenti codice

- Classe base: `laravel/Modules/Xot/app/Filament/Resources/Tables/XotBaseResourceTable.php`
