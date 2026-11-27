---
id: zero-docs-index
slug: index
title: "Indice della documentazione — Tema Zero"
description: "Indice navigabile del tema Zero. Ingresso: README.md. Il vecchio index.md e' stato assorbito qui per evitare la collisione di sola maiuscola."
document_type: index
type: index
category: documentation
theme: Zero
status: active
tags: [docs, theme, zero, index, bmad, wiki]
created: "2026-09-24"
updated: "2026-11-16"
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
della radice: `index.md` e' stato assorbito qui il 2026-10-21 per evitare la
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
- [README wiki](./wiki/readme.md)
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
- [Epics](./bmad/epics/)

## Regole

1. Un solo canonico per argomento; i duplicati sono `superseded` o in `_archive/`.
2. Nomi kebab-case minuscoli, senza date.
3. Ogni `.md` ha frontmatter YAML con `qmd`.
4. Zero resta presentazione: Blade, asset, traduzioni; nessuna business logic.

## Debito naming (flag)

<!-- GateGuard: edit existing index.md (not create). Does not supersede another Zero index — append only to Debito naming. Linked from: Xot docs-md-filename-date-debt story + sprint-status Xot/docs-md-filename-date-debt. User: "Organizza meglio indici (00-index / README) dove mancano backlink" + wave rename Themes Zero. -->

- F1 analysis unificata (2026-11-17): canonico
  [f1-world-champion-theme-analysis.md](./wiki/comparisons/f1-world-champion-theme-analysis.md);
  il datato `wiki/comparisons/f1-world-champion-2026-theme-analysis.md` resta stub
  `status: superseded` (nessuna delete).
- Wave 2026-11-24: `dry-kiss-best-practices-2025-10-15` /
  `phpstan-dry-kiss-theme-guidelines-2025-10-17` → `*-historical` + stub verso
  canonici senza data; `METODI_DUPLICATI_ANALISI` →
  [metodi-duplicati-analisi.md](./bmad/duplicate-methods.md);
  `CONFLICT_RESOLUTION_SUMMARY` → stub verso
  [conflict-resolution-summary.md](./bmad/conflict-resolution-summary.md).
  Residuo date ISO/year attive in Zero docs: **0**.

```bash
python3 -I bashscripts/tools/docs/md-filenames.py check --paths laravel/Themes/Zero/docs
```

## Cosa manca per completare

[completion-status.md](./completion-status.md): indicatori misurati, problemi noti e story aperte.
