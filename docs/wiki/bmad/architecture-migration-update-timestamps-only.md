---
title: "BMAD Architecture — updateTimestamps senza ridondanza"
type: architecture
tags: [bmad, migrations, timestamps, xotbase, dry]
created: 2026-06-05
updated: 2026-06-05
qmd: "bmad architecture migration updateTimestamps no timestamps softDeletes created_by redundant foreignIdFor"
story: STORY-140
issues:
  - "https://github.com/laraxot/base_techplanner_fila5/issues/270"
discussions:
  - "https://github.com/laraxot/base_techplanner_fila5/discussions/271"
related:
  - ../rules/migration-update-timestamps-only.md
  - ./architecture-one-migration-per-model.md
  - ./architecture.md
  - ../../laravel/Modules/Xot/app/Database/Migrations/XotBaseMigration.php
---

# Architecture: colonne audit in migrazione

> **Investigare** `XotBaseMigration::updateTimestamps()` — non fidarsi di esempi legacy.

## Decisione

| ✅ Solo questo (in `tableUpdate`) | ❌ Vietato se `updateTimestamps` presente |
|-----------------------------------|----------------------------------------|
| `$this->updateTimestamps(table: $table, hasSoftDeletes: true)` | `$table->timestamps()` |
| Una chiamata per tabella | `$table->softDeletes()` |
| | `$table->string('created_by'|'updated_by'|'deleted_by')` |

## Cosa fa il codice (XotBaseMigration ~306)

Aggiunge **solo colonne mancanti** (`hasColumn`):

- `created_at`, `updated_at` (timestamp nullable)
- `created_by`, `updated_by` → **`foreignIdFor(User)`** (non `string`!)
- con `hasSoftDeletes: true` → `deleted_at` + `deleted_by`

Metodo alternativo `timestamps()` sulla stessa classe fa la stessa cosa in blocco — **non** chiamare entrambi.

## Pattern corretto

```php
$this->tableCreate(static function (Blueprint $table): void {
    $table->id();
    // solo dominio
});

$this->tableUpdate(function (Blueprint $table): void {
    $this->updateTimestamps(table: $table, hasSoftDeletes: true);
});
```

## Audit codebase (2026-06-05)

```bash
bashscripts/tools/audit-migration-timestamp-redundancy.sh laravel/Modules/Fixcity/database/migrations
```

Scan globale: **~24** file con `updateTimestamps` + colonne manuali (Blog, Comment, User, Notify, Fixcity satellite, …). Fixcity owner recenti allineati; backlog moduli legacy.

Esempio corretto: `2026_06_05_090000_create_profiles_table.php` — audit solo in `tableUpdate`.

## Filosofia

| Livello | Intent |
|---------|--------|
| **DRY** | Un helper = contratto audit |
| **KISS** | Dominio in `tableCreate`, tempo in `tableUpdate` |
| **Religione** | `string created_by` + `updateTimestamps` = due verità in conflitto |

## Collegamenti

- [migration-update-timestamps-only.md](../rules/migration-update-timestamps-only.md)
- [migration-patterns.md](../agents/migration-patterns.md)
