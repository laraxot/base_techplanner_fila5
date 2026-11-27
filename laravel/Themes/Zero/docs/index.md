---
id: zero-docs-index
slug: index
title: "Indice della documentazione — Tema Zero"
<<<<<<< .merge_file_yTsXUL
description: "Indice navigabile del tema Zero. Ingresso: README.md. Il vecchio INDEX.md e' stato assorbito qui per evitare la collisione di sola maiuscola."
=======
description: "Indice navigabile del tema Zero. Ingresso: README.md. Il vecchio index.md e' stato assorbito qui per evitare la collisione di sola maiuscola."
>>>>>>> .merge_file_XW0NhK
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
<<<<<<< .merge_file_yTsXUL
della radice: `INDEX.md` e' stato assorbito qui il 2026-10-21 per evitare la
=======
della radice: `index.md` e' stato assorbito qui il 2026-10-21 per evitare la
>>>>>>> .merge_file_XW0NhK
collisione di sola maiuscola su filesystem case-insensitive. Il contenuto
storico e' in [`_archive/index-legacy.md`](./_archive/index-legacy.md).

## Orientamento

- [README](./README.md) — scopo, mappa e regole
- [Inventory](./inventory.md) — conteggi verificati
<<<<<<< .merge_file_yTsXUL
- [Changelog](./changelog.md) — cronologia modifiche
=======
- [Changelog](./CHANGELOG.md) — cronologia modifiche
>>>>>>> .merge_file_XW0NhK
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
<<<<<<< .merge_file_yTsXUL
- [README wiki](./wiki/README.md)
=======
- [README wiki](./wiki/readme.md)
>>>>>>> .merge_file_XW0NhK
- [Log wiki](./wiki/log.md)
- [Concetti](./wiki/concepts/)
- [Regole](./wiki/rules/)
- [How-to](./wiki/how-to/)
- [Memorie](./wiki/memories/)

## Altre cartelle

- [Stories](./stories/README.md)
- [Concepts](./concepts/README.md)
<<<<<<< .merge_file_yTsXUL
- [Skills](./skills/readme.md)
=======
- [Skills](./skills/README.md)
>>>>>>> .merge_file_XW0NhK
- [Archivio](./_archive/README.md)
- [Epics](./bmad/epics/)

## Regole

1. Un solo canonico per argomento; i duplicati sono `superseded` o in `_archive/`.
2. Nomi kebab-case minuscoli, senza date.
3. Ogni `.md` ha frontmatter YAML con `qmd`.
4. Zero resta presentazione: Blade, asset, traduzioni; nessuna business logic.

## Debito naming (flag)

- F1 analysis unificata (2026-11-17): canonico
  [f1-world-champion-theme-analysis.md](./wiki/comparisons/f1-world-champion-theme-analysis.md);
  il datato `wiki/comparisons/f1-world-champion-2026-theme-analysis.md` e le copie
  in `screenshots/` sono stub `status: superseded` (nessuna delete).

```bash
python3 -I bashscripts/tools/docs/md-filenames.py check --paths laravel/Themes/Zero/docs
```

## Cosa manca per completare

[completion-status.md](./completion-status.md): indicatori misurati, problemi noti e story aperte.
