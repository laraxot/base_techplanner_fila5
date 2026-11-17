---
title: "Dati sacri — no --force migrate, no RefreshDatabase"
type: rule
tags: [migrations, tests, data, forward-only, laraxot]
created: 2026-06-05
updated: 2026-06-05
qmd: "data sacred migrate force RefreshDatabase never wipe forward only no migrate path"
story: STORY-140
issues:
  - "https://github.com/laraxot/base_fixcity_fila5/issues/266"
discussions:
  - "https://github.com/laraxot/base_fixcity_fila5/discussions/267"
related:
  - ../bmad/architecture-data-sacred-no-destructive-db.md
  - ../memories/data-sacred-no-destructive-db.md
---

# Dati sacri — migrazioni e test

## Regola (religione)

**I dati del progetto e del cliente non si distruggono per comodità degli agenti, degli script o della documentazione.**

| Vietato | Consentito |
|---------|------------|
| `php artisan migrate --force` | `php artisan migrate` |
| `php artisan migrate --path=... --force` | `php artisan migrate --database=fixcity` (se serve connessione) |
| `php artisan migrate --path=Modules/.../ONE_FILE.php` negli esempi agente | Coda completa: solo `migrate` senza `--path` |
| `php artisan migrate:fresh` / `refresh` | Edit migrazione owner + bump timestamp + `migrate` |
| `php artisan db:wipe` / `db:fresh` | `tableUpdate()` idempotente in `XotBaseMigration` |
| `RefreshDatabase` nei test | `DatabaseTransactions` o DB `:memory:` isolato |

## Perché (filosofia)

| Livello | Intent |
|---------|--------|
| **Religione** | Il DB è memoria viva del dominio — non si brucia per “sistemare” |
| **Politica** | `--force` e `migrate:fresh` in dev → incidente in staging/prod |
| **Zen** | Una migrazione alla volta, in ordine, senza scorciatoie |
| **KISS** | Un comando (`migrate`) invece di path+force che mascherano errori |
| **DRY** | Stessa regola in CLI, doc, test, CI, esempi chat |

`migrate --path` su **un solo file** salta dipendenze e normalizza cherry-pick; con `--force` è il pattern peggiore (es. `.../2026_06_04_211500_create_profiles_table.php --force`).

## Migrazioni — workflow corretto

```bash
cd laravel
php artisan migrate
# opzionale, stessa regola: mai --force
php artisan migrate --database=fixcity
```

Nuova colonna: modifica **unico** `create_{table}_table.php` owner → **bump timestamp** nel filename → di nuovo `php artisan migrate` (vedi [one-migration-per-model.md](one-migration-per-model.md)).

## Test — workflow corretto

```php
// ❌ vietato
use Illuminate\Foundation\Testing\RefreshDatabase;

// ✅ preferito
use Illuminate\Foundation\Testing\DatabaseTransactions;
```

Vedi [NO-REFRESH-DATABASE-ABSOLUTE.md](../guidelines/NO-REFRESH-DATABASE-ABSOLUTE.md), [never-use-migrate-fresh.md](../memories/never-use-migrate-fresh.md).

## Agenti e documentazione

- **Mai** `--force` in comandi o esempi migrate.
- **Mai** `migrate --path=.../singolo_file.php` negli snippet per agenti — solo `php artisan migrate`.
- In produzione: migrate solo con processo umano esplicito; agenti non forzano.

## Collegamenti

- [architecture-data-sacred-no-destructive-db.md](../bmad/architecture-data-sacred-no-destructive-db.md)
- [never-use-migrate-fresh.md](../memories/never-use-migrate-fresh.md)
- [git-forward-only.md](git-forward-only.md)
- [one-migration-per-model.md](one-migration-per-model.md)
- `.cursor/rules/data-sacred-no-destructive-db.mdc`
