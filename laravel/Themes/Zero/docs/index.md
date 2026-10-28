---
id: zero-docs-index
slug: index
title: "Indice della documentazione — Tema Zero"
description: "Indice navigabile del tema Zero. Ingresso: README.md. Il vecchio INDEX.md e' stato assorbito qui per evitare la collisione di sola maiuscola."
document_type: index
type: index
category: documentation
theme: Zero
status: active
tags: [docs, theme, zero, index, bmad, wiki]
created: "2026-09-24"
updated: "2026-10-21"
qmd: "tema zero indice documentazione bmad wiki stories architecture blueprint inventory index canonical"
issues: []
discussions: []
related:
  - ./README.md
  - ./bmad/00-index.md
  - ./wiki/index.md
---

# Indice della documentazione — Tema Zero

Ingresso attivo: [README.md](./README.md). Questo `index.md` e' l'unico indice
della radice: `INDEX.md` e' stato assorbito qui il 2026-10-21 per evitare la
collisione di sola maiuscola su filesystem case-insensitive. Il contenuto
storico e' in [`_archive/index-legacy.md`](./_archive/index-legacy.md).

## Orientamento

- [README](./README.md) — scopo, mappa e regole
- [Inventory](./inventory.md) — conteggi verificati
- [Changelog](./changelog.md) — cronologia modifiche
- [Architettura](./architecture/README.md)
- [Scopo](./bmad/scopo.md) / [purpose](./bmad/purpose.md)

## BMAD

- [Indice BMAD](./bmad/00-index.md)
- [Mappa BMAD](./bmad/README.md)
- [Panoramica lunga](./bmad/theme-overview.md)
- [Architettura del tema](./bmad/architecture.md)
- [Filament blueprint](./bmad/filament-blueprint.md)
- [PHPStan e gate](./bmad/phpstan.md)
- [Quality gates](./bmad/php-quality-gates-rule.md)
- [Story BMAD](./bmad/stories/)

## Wiki

- [Indice wiki](./wiki/index.md)
- [README wiki](./wiki/README.md)
- [Log wiki](./wiki/log.md)
- [Concetti](./wiki/concepts/)
- [Regole](./wiki/rules/)
- [How-to](./wiki/how-to/)
- [Memorie](./wiki/memories/)

## Altre cartelle

- [Stories](./stories/README.md)
- [Concepts](./concepts/README.md)
- [Skills](./skills/readme.md)
- [Archivio](./_archive/README.md)
- [Epics](./epics/)

## Regole

1. Un solo canonico per argomento; i duplicati sono `superseded` o in `_archive/`.
2. Nomi kebab-case minuscoli, senza date.
3. Ogni `.md` ha frontmatter YAML con `qmd`.
4. Zero resta presentazione: Blade, asset, traduzioni; nessuna business logic.
