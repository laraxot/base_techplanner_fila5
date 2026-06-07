---
title: Merge marker taskboard pattern
type: concept
tags: [git, merge-conflicts, multi-agent, docs]
updated: 2026-04-21
---

# Merge marker taskboard pattern

## Regola

Quando nel repository compaiono marker di merge (`<<<<<<<`, `=======`, `>>>>>>>`, `.merge_file`):

1. creare una checklist `.md` nelle docs dei moduli e dei temi;
2. assegnare i file agli agenti;
3. risolvere manualmente almeno un file per iterazione;
4. spuntare il file risolto nella checklist.

## Obiettivo

- parallelizzare il lavoro multi-agent;
- mantenere tracciabilità di avanzamento;
- evitare risoluzioni automatiche non verificate.

## Qualità attesa

- merge semantico orientato alla business logic;
- preservare ownership architetturale;
- DRY + KISS: niente duplicazioni, niente hardcode gratuiti.

## Storico (esempi)

- **2026-04-21** — `laravel/Modules/Xot/docs/wiki/README.md`: unificata guida wiki modulo (IT) con struttura raw/wiki/index/log e link QMD, allineata al pattern del modulo UI.