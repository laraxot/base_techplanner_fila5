---
title: "BMAD Architecture — migrazioni DRY"
type: rule
tags: [bmad, architecture, migrations, data, dry]
created: 2026-06-04
updated: 2026-06-05
qmd: "bmad architecture migrations data sacred one migration per model"
---

# Regola Migrazioni DRY

**1 migrazione per modello.** Mai `--force`, mai `migrate:fresh`, mai `RefreshDatabase`. I dati sono sacri.

## Congruenza

| Elemento | Conteggio |
|----------|-----------|
| Models | `Modules/{Modulo}/src/Models/*.php` |
| Migrations | 1 per model (nome `create_{table}_table.php`) |
| Seeders | file seeder separati |
| Factories | file factory separati |

## GitHub Tracking

Issue + Discussion obbligatorie in ogni story:
- Issue: `base_fixcity_fila5/issues/NNN`
- Discussion: `base_fixcity_fila5/discussions/NNN`

## Cross-repo

- `module_*_fila5` → issue/discussion su modulo
- `theme_*_fila5` → issue/discussion su tema

---

## Links

| Repo | Issue | Discussion |
|------|-------|------------|
| base | [#238](https://github.com/laraxot/base_fixcity_fila5/issues/238) | [d#239](https://github.com/laraxot/base_fixcity_fila5/discussions/239) |