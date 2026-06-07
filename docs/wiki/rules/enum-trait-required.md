---
title: "EnumTrait obbligatorio per enum proprietari"
type: rule
confidence: high
created: 2026-05-28
updated: 2026-05-28
tags: [php, enum, xot, filament, translations, governance]
related:
  - laravel/Modules/Xot/docs/enum-trait-pattern.md
  - rules/trans-trait-pattern.md
  - rules/00-TRIGGER_MAP.md
---

# EnumTrait obbligatorio

## Regola

Tutti gli enum PHP backed proprietari dentro `laravel/Modules` devono usare:

```php
use Modules\Xot\Traits\EnumTrait;

enum ExampleEnum: string
{
    use EnumTrait;
}
```

La regola vale anche quando l'enum non implementa ancora `HasLabel`, `HasColor`, `HasIcon` o `HasDescription`: il trait rende disponibile lo stesso contratto Laraxot per traduzioni, opzioni, form schema e colonne derivate dagli enum.

Sono esclusi solo codice vendor, package terzi vendorizzati e fixture di test non applicative.

## Perche

- **Logica**: un enum non deve reinventare `getLabel()`, `getColor()`, `getIcon()` e `getDescription()` con `match` locali o chiavi traduzione arbitrarie. Il comportamento comune vive in Xot.
- **Politica architetturale**: Xot governa i contratti cross-module. Ogni modulo possiede i propri casi e traduzioni, ma non riscrive il protocollo.
- **Religione del progetto**: DRY, coerenza Laraxot, type safety e single source of truth sono piu importanti della scorciatoia locale.
- **Bellezza**: un enum deve mostrare i casi di dominio; la decorazione UI resta nei file lang, non nel codice.
- **Zen operativo**: stesso gesto per ogni enum: import del trait, `use EnumTrait;`, traduzioni in `values.{value}.{key}`. Meno eccezioni, meno attrito mentale.

## Traduzioni canoniche

`EnumTrait` legge le traduzioni tramite:

```text
{module}::{enum_snake}.values.{enum_value}.label
{module}::{enum_snake}.values.{enum_value}.color
{module}::{enum_snake}.values.{enum_value}.icon
{module}::{enum_snake}.values.{enum_value}.description
```

Esempio:

```php
return [
    'values' => [
        'open' => [
            'label' => 'Aperto',
            'color' => 'warning',
            'icon' => 'heroicon-o-exclamation-circle',
            'description' => 'Segnalazione aperta',
        ],
    ],
];
```

## Migrazione legacy

Quando un enum usa `TransTrait` direttamente o metodi manuali:

1. aggiungere `Modules\Xot\Traits\EnumTrait`;
2. sostituire `use TransTrait;` con `use EnumTrait;`;
3. spostare progressivamente le traduzioni legacy da `{value}.label` o `options.{value}` a `values.{value}.label`;
4. rimuovere metodi manuali solo quando la struttura `values` copre tutte le chiavi necessarie;
5. mantenere temporaneamente eventuali metodi di dominio non standard (`label()`, `color()`, `options()`, `getDefault()`) se usati da chiamanti esistenti.

## Controllo rapido

```bash
rg -n "^enum " laravel/Modules --glob "*.php" --glob "!**/vendor/**" --glob "!**/packages/**" --glob "!**/tests/**"
rg -L "use EnumTrait;" laravel/Modules/*/app/Enums/*.php
```

Ogni modifica agli enum deve essere tracciata nella GitHub issue del modulo owner e, quando il tema e' architetturale, anche in una GitHub Discussion del medesimo repository.
