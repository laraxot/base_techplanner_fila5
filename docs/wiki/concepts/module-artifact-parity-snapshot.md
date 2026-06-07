---
title: "Snapshot parità modelli / migrazioni"
type: concept
tags: [audit, migrations, module, parity, techplanner]
created: 2026-06-06
updated: 2026-06-06
qmd: "module artifact parity snapshot audit N models N migrations gap duplicate techplanner"
issues:
  - "https://github.com/laraxot/base_techplanner_fila5/issues/23"
discussions:
  - "https://github.com/laraxot/base_techplanner_fila5/discussions/19"
related:
  - ../bmad/architecture-one-migration-per-model.md
  - ../bmad/architecture-module-model-artifact-parity.md
  - ../rules/one-migration-per-model.md
---

# Snapshot parità modelli / migrazioni

> Rigenerare con `bashscripts/tools/audit-all-modules-artifact-parity.sh` e `audit-duplicate-create-migrations.sh`.

## Regola target

```
N modelli owner = N migrazioni create_*   (per modulo, es. Pippo: 20 = 20)
1 tabella = 1 file create_*               (zero duplicati)
```

## Stato TechPlanner (2026-06-06)

| Metrica | Valore |
|---------|--------|
| Modelli owner | 14 |
| Migrazioni `create_*` | 13 |
| VERDICT | **GAP** |

Modelli **senza** migrazione `create_*`: Client, Device, DeviceVerification, Event, LegalOffice, LegalRepresentative, Location, MedicalDirector, Participant.

Duplicati cross-repo rilevanti: `create_profiles_table` (6 file), `create_team_user_table` (4), `create_users_table` (6).

## Riepilogo globale moduli

| Modulo | VERDICT |
|--------|---------|
| Seo | OK |
| Activity, Blog, Cms, Employee, Gdpr, Geo, Job, Lang, Media, Notify, Rating, TechPlanner, Tenant, UI, User, Xot | GAP |

## Script audit

```bash
bashscripts/tools/audit-module-artifact-parity.sh TechPlanner
bashscripts/tools/audit-all-modules-artifact-parity.sh
bashscripts/tools/audit-duplicate-create-migrations.sh
```

## Collegamenti

- [architecture-one-migration-per-model.md](../bmad/architecture-one-migration-per-model.md)
- [MIGRATION_PHILOSOPHY.md](../../../laravel/Modules/Xot/docs/MIGRATION_PHILOSOPHY.md)
