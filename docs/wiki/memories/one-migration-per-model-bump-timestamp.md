---
title: "Memoria — bump timestamp migrazione owner"
type: memory
tags: [migrations, bump, timestamp, bmad, standing]
created: 2026-06-06
updated: 2026-06-06
qmd: "memory one migration per model bump timestamp rename file migrate never force path"
issues:
  - "https://github.com/laraxot/base_techplanner_fila5/issues/23"
discussions:
  - "https://github.com/laraxot/base_techplanner_fila5/discussions/19"
related:
  - ../rules/one-migration-per-model.md
  - ../bmad/architecture-one-migration-per-model.md
---

# Standing memory — bump timestamp

Quando lo schema di una tabella owner cambia:

1. **Non** creare `add_*` / `alter_*` / secondo `create_*`
2. Edit del file canonico `*_create_{table}_table.php` (`tableCreate` + `tableUpdate` idempotente)
3. **Rinomina** il file con timestamp più recente (bump)
4. Solo `php artisan migrate`

Conteggio modulo: **N modelli owner = N migrazioni `create_*`** — vedi [#23](https://github.com/laraxot/base_techplanner_fila5/issues/23).
