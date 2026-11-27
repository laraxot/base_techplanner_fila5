---
title: "ADR — documentazione del progetto"
type: index
tags: [adr, decisioni, progetto]
created: 2026-11-27
updated: 2026-11-27
qmd: "project ADR decision records"
issues:
  - "https://github.com/laraxot/base_techplanner_fila5/issues/18"
discussions:
  - "https://github.com/laraxot/base_techplanner_fila5/discussions/19"
---

# ADR del progetto

Questa cartella raccoglie le decisioni architetturali trasversali al repository.
Le decisioni specifiche di un modulo o tema restano nel relativo pacchetto
(`laravel/Modules/<M>/docs/adr/`, `laravel/Themes/<T>/docs/adr/`).

## Formato

Un file per decisione, nome `NNNN-slug.md` (n. progressivo, niente date nel
nome: la data sta nella frontmatter). Sezioni obbligatorie: `## Contesto`,
`## Driver della decisione`, `## Alternative considerate`, `## Decisione`,
`## Conseguenze`, `## Verifica`. Le decisioni superate non si cancellano: si
marcano `status: superseded` con `superseded_by:`.

Inventario: [index.md](index.md).

## Decisioni

- [0001 — Repository git separati per modulo e tema, niente submodule](0001-repository-git-separati-niente-submodule.md)
- [0002 — Confine di compatibilità dell'harness](0002-harness-compatibility-boundary.md)
