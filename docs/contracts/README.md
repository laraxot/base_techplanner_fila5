---
title: "Contratti — progetto"
type: index
tags: [contracts, progetto]
created: 2026-11-27
updated: 2026-11-27
qmd: "project behavioral contracts"
issues:
  - "https://github.com/laraxot/base_techplanner_fila5/issues/18"
discussions:
  - "https://github.com/laraxot/base_techplanner_fila5/discussions/19"
---

# Contratti del progetto

Questa cartella raccoglie solo contratti trasversali al repository: superfici che
non appartengono a un singolo modulo o tema (il guard dell'harness, procedure di
sync, gate di qualità). I contratti delle Action vivono nel `docs/contracts/`
del pacchetto owner e seguono il formato canonico di
`laravel/Modules/Xot/docs/rules/action-behavioral-contract.md`.

## Formato

Stesse sei sezioni dei contratti di modulo: `## Input`, `## Output`,
`## Invarianti`, `## Effetti collaterali`, `## Errori`, `## Non fa`.

Inventario: [index.md](index.md) · template: [_template.md](_template.md).

## Contratti

- [harness-guard.md](harness-guard.md) — contratto del guard PreToolUse.
