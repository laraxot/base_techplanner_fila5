---
title: "Progress — stato sessione harness"
type: memory
created: 2026-11-27
updated: 2026-11-27
related:
  - ./lessons.md
  - ./facts.md
---

# Progress

Stato corrente del lavoro sull'harness. Una sessione nuova riprende da qui.

## In corso

- Normalizzazione `docs/adr` + `docs/contracts` di tutti i pacchetti
  (dedup ADR non numerati, indici, template) — lane parallele per gruppo di
  moduli/temi; check finale: `cd laravel && composer harness:check` e
  `./vendor/bin/pest Modules/Xot/tests/Unit/Docs/`.

## Conflicts incontrati

- <!-- divergenze trovate durante il lavoro: cosa era, cosa si è scelto -->

## Note

- Le decisioni architetturali non si scrivono qui: vanno in `docs/adr/` del
  pacchetto owner o in `docs/adr/` di root per quelle trasversali.
- Le lezioni (fallimenti → controlli) vanno in `lessons.md`.
