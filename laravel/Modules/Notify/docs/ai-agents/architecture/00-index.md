---
title: "00 index"
type: note
tags: [documentation]
created: 2026-09-26
updated: 2026-11-23
qmd: "00 index"
issues: []
discussions: []
---

# Architecture Documentation Index

**Path**: `.agents/docs/architecture/`
**Purpose**: Architectural decisions, patterns, and guidelines
**Last Updated**: 2026-03-26

## Documents

| File | Description | Priority |
|------|-------------|----------|
| [filament-table-vs-blade-component.md](./filament-table-vs-blade-component.md) | LIST-like = Filament table, shell/detail = Blade | CRITICAL |

## Metodologia esecutiva collegata

- [../../../../docs/project/gsd-and-bmad-workflow.md](../../../../docs/project/gsd-and-bmad-workflow.md) — ordine canonico BMAD -> GSD -> Ralph
<<<<<<< .merge_file_u7y4Pa
<<<<<<< .merge_file_aepyBB
- [../../ralph/00-INDEX.md](../../ralph/00-index.md) — albero Ralph locale, senza duplicare template nel root del repository
=======
- [../../ralph/00-index.md](../../ralph/00-index.md) — albero Ralph locale, senza duplicare template nel root del repository
>>>>>>> .merge_file_CI0mrF
=======
- [../../ralph/00-index.md](../../ralph/00-index.md) — albero Ralph locale, senza duplicare template nel root del repository
>>>>>>> .merge_file_lL2m5P

## Quick Decision Guide

### Building a LIST-like public surface?
-> Use **Filament Table Widget**
-> See: [Filament Table vs Blade Component](./filament-table-vs-blade-component.md)

### Building a DETAIL page?
-> Use **Blade shell + Filament Table dove la sezione e list-like**
-> See: [Filament Table vs Blade Component](./filament-table-vs-blade-component.md)

## Navigation

- [../00-index.md](../00-index.md)
<<<<<<< .merge_file_u7y4Pa
<<<<<<< .merge_file_aepyBB
- [../../../../AGENTS.md](../../../../agents.md)
=======
- [../../../../AGENTS.md](../../../../AGENTS.md)
>>>>>>> .merge_file_CI0mrF
=======
- [../../../../AGENTS.md](../../../../AGENTS.md)
>>>>>>> .merge_file_lL2m5P
