---
title: "Regola — 1 migrazione per modello owner"
type: rule
tags: [migrations, module, owner, bmad, dry]
created: 2026-06-06
updated: 2026-06-06
qmd: "rule one migration per model owner module N modelli N create exists unique duplicate"
issues:
  - "https://github.com/laraxot/base_techplanner_fila5/issues/23"
discussions:
  - "https://github.com/laraxot/base_techplanner_fila5/discussions/19"
related:
  - ../bmad/architecture-one-migration-per-model.md
  - ../bmad/architecture-module-model-artifact-parity.md
  - ../memories/one-migration-per-model-bump-timestamp.md
---

# 1 migrazione per modello owner

## Regola

In ogni modulo Laraxot:

```
N modelli persistibili owner  =  N file *_create_{table}_table.php
```

- **Deve esistere**: modello senza `create_*` → GAP
- **Deve essere una sola**: due `create_*` sulla stessa tabella → DUPLICATE (consolidare + `_bak/`)
- **Evoluzione**: edit file canonico + bump timestamp — mai `add_*` / `alter_*`

## Esempio

Modulo `Pippo` con 20 modelli in `app/Models/` → **20** migrazioni `create_*` in `database/migrations/`.

## Audit

```bash
bashscripts/tools/audit-module-artifact-parity.sh Pippo
bashscripts/tools/audit-duplicate-create-migrations.sh Pippo
```

## Collegamenti

- [architecture-one-migration-per-model.md](../bmad/architecture-one-migration-per-model.md)
- `.cursor/rules/one-migration-per-model.mdc`
