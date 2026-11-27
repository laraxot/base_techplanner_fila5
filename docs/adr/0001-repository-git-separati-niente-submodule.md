---
title: "ADR — repository git separati per modulo e tema, niente submodule"
type: decision
status: accepted
created: 2026-11-27
updated: 2026-11-27
decision-makers: [marco76tv]
tags: [adr, git, monorepo, gitmodules, repository-hygiene]
qmd: "adr gitmodules repository separati nessun submodule git rev-list oggetti report"
---

# Repository git separati per modulo e tema, niente submodule

## Contesto

Il checkout `base_techplanner_fila5` contiene 27 path di lavoro (root,
`bashscripts`, 19 moduli in `laravel/Modules`, 6 temi in `laravel/Themes`) elencati
in `gitmodules.ini`. Ognuno ha il proprio `.git` e il proprio remote
(`git@github.com:laraxot/<repo>_fila5.git`), ma **non** è registrato come git
submodule: `git submodule` non li conosce e il repo root non li traccia come
gitlink.

## Driver della decisione

- Ogni modulo/tema ha il proprio ciclo di vita: commit, tag e release sul proprio
  remote, senza going through il repo root.
- Il working tree condiviso serve a far girare l'applicazione intera (tutti i
  path presenti insieme), non a versionare un'unica storia.
- Evitare la fragile meccanica dei submodule (stato disallineato, `gitlink` nel
  repo root, checkout a metà).

## Considered Options

- Git submodule registrati: versioning centralizzato ma stato fragile e attrito
  operativo reale (checkout incompleti, merge di gitlink).
- Un solo repo monolitico: perde i remote e la storia separata per modulo.
- Repository separati non registrati (scelto): ogni path è una repo
  indipendente; `gitmodules.ini` è solo l'inventario dei path.

## Decisione

I path di `gitmodules.ini` restano repository git indipendenti, non submodule.
Le operazioni git si eseguono dentro il path (`git -C <path>`) e i commit vanno
sui remote dei singoli repo. Il repo root versiona solo i file che gli
appartengono (config, docs radice, `.harness/`).

### Conseguenze

- Buono: storia e release indipendenti per modulo/tema; nessun gitlink da
  sincronizzare.
- Cattivo: ogni task che tocca più pacchetti produce più commit/push; la
  pulizia `.git` va fatta per repo (soglia 30k oggetti, `git gc`).

## Conferma

- `git -C laravel/Modules/<M> rev-parse --show-toplevel` restituisce il path del
  modulo, non la root.
- `git submodule status` alla root non elenca i moduli.
- Report oggetti: `docs/git-repositories-object-report.md`.
