---
title: "Puntatore — delega opzionale a Cms per i dati dei blocchi (superseded)"
type: decision
status: superseded
created: 2026-11-24
updated: 2026-11-26
module: UI
decision-makers: UI module owner
superseded_by: ./0004-optional-cms-delegation-for-block-data.md
---

# Puntatore — delega opzionale a Cms per i dati dei blocchi (superseded)

Stesso ADR del file canonico [0004-optional-cms-delegation-for-block-data.md](0004-optional-cms-delegation-for-block-data.md).
Questo file esiste solo per non rompere i riferimenti storici al vecchio nome senza numero.

## Contesto

Il nome storico senza numero continua a essere referenziato da documentazione precedente; il canone del modulo UI usa `NNNN-slug.md`.

## Driver della decisione

- Una sola fonte di verità per la stessa decisione.
- Non rompere i link già pubblicati.

## Alternative scartate

- Cancellare il file: romperebbe i riferimenti storici.
- Tenere il testo duplicato: due versioni della stessa decisione divergerebbero (è già successo con il nome dell'Action).

## Decisione

Il contenuto canonico è nel file numerato; questo file resta solo un puntatore compatibile. Ogni modifica si fa in 0004.

## Conseguenze

- Buono: un solo ADR da tenere aggiornato.
- Cattivo: chi apre il vecchio nome deve seguire il link.

## Conferma

Nessuna conferma automatica oggi; proposta: lasciare il file finché esistono link al vecchio nome (`cd laravel && rg -n 'optional-cms-delegation-for-block-data.md' Modules | rg -v '0004-'`) e cancellarlo quando l'elenco è vuoto.

## Riconciliazione documentale (2026-11-27)

I marker del merge sono stati rimossi preservando la decisione e i riferimenti documentali: il file storico è un puntatore superseded verso il canon numerato. Questo non certifica esecuzione di test. [Tracciamento #15](https://github.com/laraxot/base_ptvx_fila5/issues/15).

- Il ramo storico citava `UI-BLOCKDATA-INV-1` e `UI-BLOCKDATA-INV-4`; la loro copertura va verificata nel file numerato e nella suite, non in questo puntatore superseded.
