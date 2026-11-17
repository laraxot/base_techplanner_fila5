---
title: "BMAD Architecture — Dati sacri (migrazioni e test)"
type: architecture
tags: [bmad, migrations, data, laraxot]
created: 2026-06-05
updated: 2026-06-05
qmd: "bmad architecture data sacred migrate force RefreshDatabase never path cherry pick"
story: STORY-140
issues:
  - "https://github.com/laraxot/base_techplanner_fila5/issues/266"
discussions:
  - "https://github.com/laraxot/base_techplanner_fila5/discussions/267"
related:
  - ./architecture.md
  - ../rules/data-sacred-no-destructive-db.md
  - ../memories/never-use-migrate-fresh.md
---

# Architecture: i dati sono sacri

> `/bmad/architecture` — prima di proporre comandi DB o test che toccano schema/dati.

## Decisione

Gli agenti **non** eseguono né documentano comandi che resettano, forzano o cherry-pickano migrazioni. I dati locali, di test condivisi e di staging sono **sacri** come in produzione.

## Vietato

```bash
php artisan migrate --force
php artisan migrate --path=Modules/Fixcity/database/migrations/2026_06_04_211500_create_profiles_table.php --force
php artisan migrate --path=.../singolo_create_*_table.php
php artisan migrate:fresh
php artisan migrate:refresh
php artisan db:wipe
```

```php
RefreshDatabase  // trait o uses()
```

## Consentito

```bash
cd laravel
php artisan migrate
php artisan migrate --database=fixcity
```

Evoluzione schema: **un** `create_{table}_table.php` owner → `tableUpdate()` → bump timestamp filename → di nuovo `php artisan migrate`.

Test: `DatabaseTransactions` (modulo owner), DB dedicato `:memory:` se isolamento totale.

## Religione Laraxot

| Principio | Significato |
|-----------|-------------|
| Forward-only | Schema e dati avanzano; non si cancella per comodità |
| Muscle memory | `--force` oggi → incidente domani |
| Zen | Il DB è memoria; le migrazioni sono promesse in sequenza |
| Politica | Cherry-pick `--path` salta ordine e dipendenze |

## Anti-pattern citato (2026-06)

Documentazione e chat che suggerivano:

`migrate --path=Modules/Fixcity/database/migrations/..._create_profiles_table.php --force`

**Sostituito** con: `php artisan migrate` (senza flag).

## Second brain

- Rule: [data-sacred-no-destructive-db.md](../rules/data-sacred-no-destructive-db.md)
- Cursor: `.cursor/rules/data-sacred-no-destructive-db.mdc` (alwaysApply)
- Memoria: [data-sacred-no-destructive-db.md](../memories/data-sacred-no-destructive-db.md)
- Migrazioni owner: [architecture-one-migration-per-model.md](architecture-one-migration-per-model.md)

## Collegamenti

- [git-forward-only.md](../rules/git-forward-only.md)
- [never-use-migrate-fresh.md](../memories/never-use-migrate-fresh.md)
