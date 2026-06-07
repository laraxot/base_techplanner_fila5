---
title: "Parità modello / migrazione / factory / seeder per modulo"
type: rule
tags: [modules, models, migrations, factories, seeders]
created: 2026-06-05
updated: 2026-06-05
qmd: "rule module model migration factory seeder parity count audit"
story: STORY-135
issues:
  - "https://github.com/laraxot/base_fixcity_fila5/issues/239"
discussions:
  - "https://github.com/laraxot/base_fixcity_fila5/discussions/242"
related:
  - ../bmad/architecture-module-model-artifact-parity.md
  - ../concepts/module-artifact-parity-snapshot.md
---

# Parità artefatti modulo

## Regola

**N** modelli persistibili owner nel modulo ⇒ **N** migrazioni `create_{table}_table`, **N** factory, **N** seeder entità.

## Esclusi dal conteggio N

- `BaseModel`, `BasePivot`
- `{Module}DatabaseSeeder`, `DatabaseSeeder` (orchestrator)
- Modelli che estendono entità di altro modulo senza tabella propria
- STI: un solo `create_*` per tabella condivisa

## Audit

```bash
bashscripts/tools/audit-module-artifact-parity.sh <ModuleName>
bashscripts/tools/audit-all-modules-artifact-parity.sh
```

Tool doc: [module-artifact-parity-audit-tools.md](../../../bashscripts/docs/wiki/concepts/module-artifact-parity-audit-tools.md)

## Collegamenti

- [architecture-module-model-artifact-parity.md](../../../docs/wiki/bmad/architecture-module-model-artifact-parity.md)
- [one-migration-per-model.md](../../../docs/wiki/rules/one-migration-per-model.md)
- [data-sacred-no-destructive-db.md](../../../docs/wiki/rules/data-sacred-no-destructive-db.md)
