---
title: "BMAD Architecture — parità modello / migrazione / factory / seeder"
type: architecture
tags: [bmad, module, models, migrations, factories, seeders, dry, kiss]
created: 2026-06-05
updated: 2026-06-06
qmd: "bmad architecture module model migration factory seeder parity audit N models N migrations pippo"
story: STORY-135
issues:
  - "https://github.com/laraxot/base_techplanner_fila5/issues/23"
discussions:
  - "https://github.com/laraxot/base_techplanner_fila5/discussions/19"
related:
  - ./architecture.md
  - ../rules/module-model-artifact-parity.md
  - ../concepts/module-artifact-parity-snapshot.md
  - ../../../bashscripts/docs/wiki/concepts/module-artifact-parity-audit-tools.md
---

# Parità artefatti per modulo

> `/bmad/architecture` — controllo obbligatorio **per ogni modulo** prima di chiudere feature DB o PR.

## Regola

Per ogni modulo Laraxot (es. **Pippo** con 20 modelli owner):

```
20 modelli persistibili owner
  = 20 migrazioni create_*   ← obbligatorio 1:1
  = 20 factory
  = 20 seeder entità
```

| Artefatto | Pattern | Cartella |
|-----------|---------|----------|
| Migrazione canonica | `*_create_{table}_table.php` (una sola per modello/tabella) | `database/migrations/` |
| Factory | `{Model}Factory.php` | `database/factories/` |
| Seeder entità | `{Model}Seeder.php` | `database/seeders/` |

Più **al massimo uno** orchestrator: `{Module}DatabaseSeeder.php` (non conta in N).

**Bidirezionale:** se manca la migrazione per un modello owner, o se esistono più `create_*` sulla stessa tabella, il modulo è in **GAP** finché non allineato o documentata l’esclusione nel wiki del modulo.

## Cosa conta come “modello” (N)

| ✅ Conta | ❌ Non conta |
|----------|-------------|
| Classe concreta in `app/Models/` con tabella dedicata nel modulo | `BaseModel`, `BasePivot` (astratti) |
| Modello owner della tabella su connection del modulo | Sottoclasse STI che **condivide** tabella del parent |
| | Thin wrapper di altro modulo (es. `Fixcity\Models\User` → owner `User`) |
| | Modello solo lettura / view / DTO senza tabella |

## Filosofia

| Livello | Intent |
|---------|--------|
| **DRY** | Un modello = un posto per schema, dati fake, seed |
| **KISS** | Apri il modulo e vedi subito cosa manca (no caccia al file) |
| **Zen** | Il modulo è un organismo: modello anima, migrazione scheletro, factory respiro, seeder seme |
| **Politica** | Owner modulo = responsabilità completa del ciclo vita tabella |
| **Religione** | Aggiungere un modello senza factory/seeder/migrazione è incompletezza sacrilega |

## Workflow agente (ogni modulo)

```bash
bashscripts/tools/audit-module-artifact-parity.sh Fixcity
bashscripts/tools/audit-all-modules-artifact-parity.sh
```

Snapshot multi-modulo: [module-artifact-parity-snapshot.md](../concepts/module-artifact-parity-snapshot.md).

1. Leggere report (OK / GAP).
2. Per ogni GAP: creare artefatto mancante **o** documentare esclusione nel wiki del modulo.
3. Mai seconda migrazione `create_*` sulla stessa tabella (vedi [architecture-one-migration-per-model.md](./architecture-one-migration-per-model.md)).
4. Migrazioni: solo `php artisan migrate` — [architecture-data-sacred-no-destructive-db.md](./architecture-data-sacred-no-destructive-db.md).

## Esempio Fixcity (snapshot 2026-06-05)

```bash
bashscripts/tools/audit-module-artifact-parity.sh Fixcity
```

- **N modelli owner:** 9 (escluso `User` wrapper)
- **N migrazioni:** 10 — **+1 orphan** `create_exports` (senza modello `Export`)
- **N factory:** 9 — OK
- **N seeder entità:** 6 — **GAP** (mancano `TicketHourSeeder`, `TicketRelationSeeder`, `TicketSubscriberSeeder`)
- Snapshot live: [module-artifact-parity-snapshot.md](../concepts/module-artifact-parity-snapshot.md)

## Collegamenti

- [architecture.md](./architecture.md)
- [module-model-artifact-parity.md](../rules/module-model-artifact-parity.md)
- [module-model-migration-factory-seeder-parity.md](../memories/module-model-migration-factory-seeder-parity.md)
- [module-artifact-parity-audit.md](../../../laravel/Modules/Xot/docs/wiki/concepts/module-model-artifact-parity.md)
