---
title: "BMAD Architecture — one migration per model"
type: architecture
tags: [bmad, architecture, migrations, dry, kiss, schema]
created: 2026-06-05
updated: 2026-06-06
qmd: "bmad architecture one migration per model N models N migrations pippo owner module bump timestamp"
story: STORY-135
issues:
  - "https://github.com/laraxot/base_techplanner_fila5/issues/23"
discussions:
  - "https://github.com/laraxot/base_techplanner_fila5/discussions/19"
related:
  - ./architecture.md
  - ./architecture-module-model-artifact-parity.md
  - ../rules/one-migration-per-model.md
  - ../memories/one-migration-per-model-bump-timestamp.md
  - ../concepts/module-artifact-parity-snapshot.md
---

# BMAD Architecture — 1 modello = 1 migrazione (N = N)

> Comando: `/bmad/architecture` — prima di creare o modificare file in `Modules/*/database/migrations/`.

## Regola cardine (bidirezionale)

| Enunciato | Significato operativo |
|-----------|------------------------|
| **1 modello → 1 migrazione** | Ogni modello persistibile **owner** del modulo ha **esattamente un** file `*_create_{table}_table.php` |
| **N modelli → N migrazioni** | Se il modulo **Pippo** contiene **20** modelli owner, in `Modules/Pippo/database/migrations/` devono esistere **20** migrazioni `create_*` — né 19, né 21 |
| **1 tabella → 1 create_*** | Mai due file `create_*` sulla stessa tabella (owner unico) |
| **1 create_* → 1 modello** | Migrazione orphan senza modello owner nel modulo = debito da risolvere o esclusione documentata |

```
Modules/Pippo/
  app/Models/          → 20 classi owner (esclusi Base*, abstract, wrapper cross-modulo)
  database/migrations/ → 20 file *_create_{table}_table.php
```

## Visione

Il database è **memoria persistente** del dominio. La migrazione `create_{table}_table` nel modulo **owner** è la **frase canonica** del contratto schema. Duplicare file = due narrazioni in conflitto → 500, drift, debito.

## Operazioni consentite / vietate

| ✅ Consentito | ❌ Vietato |
|-------------|-----------|
| Un solo `create_{table}_table.php` per tabella owner | Secondo `create_*` sulla stessa tabella |
| Evoluzione via `tableCreate` + `tableUpdate` idempotente nel file owner | `add_*`, `alter_*`, `repair_*` separati |
| Bump timestamp nel filename + `php artisan migrate` | `migrate --force`, `migrate --path` singolo file |
| Esclusione documentata nel wiki modulo (modello non persistibile) | Modello owner senza migrazione |

## Filosofia (perché)

- **DRY**: un punto di lettura del contratto schema
- **KISS**: apri il modulo — conti modelli e conti `create_*`, devono coincidere
- **Politica**: il modulo owner risponde della tabella e della sua migrazione
- **Religione**: N ≠ N rompe il contratto tra modello Eloquent e SQLite/MySQL reale

## Checklist agente

1. `bashscripts/tools/audit-module-artifact-parity.sh Pippo` → VERDICT OK (N modelli = N create_*)
2. `bashscripts/tools/audit-duplicate-create-migrations.sh Pippo` → zero DUPLICATE per tabella
3. `ls Modules/{Owner}/database/migrations/*create_{table}*` → **un** file per tabella
4. Nuova colonna → edit owner + bump timestamp
5. Aggiornare wiki modulo + `docs/wiki/log.md` + issue [#23](https://github.com/laraxot/base_techplanner_fila5/issues/23)
6. `bashscripts/docs/llm-wiki-qmd.sh update` dopo edit wiki

## Migrazioni — comando unico

```bash
cd laravel
php artisan migrate
php artisan migrate --database=user
```

**Mai** `migrate --path=.../create_profiles_table.php` né `--force` — vedi [architecture-data-sacred-no-destructive-db.md](architecture-data-sacred-no-destructive-db.md).

## Parità estesa (factory + seeder)

Oltre alle migrazioni, **N** modelli owner implicano **N** factory e **N** seeder entità — vedi [architecture-module-model-artifact-parity.md](./architecture-module-model-artifact-parity.md).

## Stato progetto (2026-06-06)

Audit globale: **16 moduli in GAP**, solo **Seo** OK — backlog di allineamento. Duplicati `create_*` rilevati in Activity, Employee, Gdpr, Media, Notify, User, … — script `audit-duplicate-create-migrations.sh`. Snapshot: [module-artifact-parity-snapshot.md](../concepts/module-artifact-parity-snapshot.md). Issue: [#23](https://github.com/laraxot/base_techplanner_fila5/issues/23).

## GitHub (tracciamento)

| Tipo | URL |
|------|-----|
| Issue | [#23](https://github.com/laraxot/base_techplanner_fila5/issues/23) |
| Discussion | [#19](https://github.com/laraxot/base_techplanner_fila5/discussions/19) |

## Collegamenti

- [architecture.md](./architecture.md) — indice `/bmad/architecture`
- [one-migration-per-model.md](../rules/one-migration-per-model.md)
- [one-migration-per-model-bump-timestamp.md](../memories/one-migration-per-model-bump-timestamp.md)
- [architecture-data-sacred-no-destructive-db.md](architecture-data-sacred-no-destructive-db.md)
