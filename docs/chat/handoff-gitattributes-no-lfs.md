---
title: "Handoff gitattributes senza Git LFS"
type: handoff
status: superseded
tags: [git, gitattributes, no-lfs, ecc, bmad, second-brain]
qmd: "gitattributes no LFS marker merge binary blob check"
related:
  - ../wiki/rules/swarm-parallel-bmad-second-brain.md
  - ../../bashscripts/ai/wiki/rules/no-git-lfs.md
---

# Handoff gitattributes senza Git LFS

> **Archivio legacy.** Dal 2026-09-09 `docs/chat/` non si scrive piu' (vedi `AGENTS.md`). Stato verificato, comandi di controllo e limiti vivono ora nella story [git-collision-detection-resolution-system](../stories/git-collision-detection-resolution-system.story.md), sezione «`.gitattributes` senza Git LFS». Il testo sotto resta com'era.

> La policy esiste per evitare pointer orfani e asset rotti: gli asset piccoli restano blob Git normali.

## Stato verificato

- Tutti i `.gitattributes` versionati fuori `laravel/vendor/` sono stati normalizzati.
- Nessun marker `<<<<<<<`, `=======`, `>>>>>>>` residuo negli attributi.
- Nessuna regola attiva `filter=lfs`, `diff=lfs` o `merge=lfs`.
- I binari usano `binary !filter`; le regole `text`, `diff` ed `export-ignore` utili sono preservate.
- La sezione LFS locale del repository root è stata rimossa; la configurazione system non è stata toccata.

## Verifica

```bash
git ls-files | rg '(^|/)\.gitattributes$' | rg -v '^laravel/vendor/' | xargs -r rg -n -i 'filter=lfs|diff=lfs|merge=lfs|^<<<<<<<|^=======|^>>>>>>>'
git check-attr --all -- laravel/Modules/AI/.gitattributes laravel/Themes/Zero/.gitattributes
git diff --check -- '*.gitattributes'
```

## Fuori scope

`HEAD` storico contiene pointer LFS in asset documentali Geo; il working tree/index contiene asset reali. Convertire o riscrivere la storia è una migrazione separata e non fa parte della pulizia degli attributi.
