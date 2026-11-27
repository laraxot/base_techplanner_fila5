---
title: "Stub — IDColumn obbligatoria (superseded)"
type: decision
status: superseded
created: 2026-11-25
updated: 2026-11-26
module: UI
decision-makers:
  - product
  - architecture
qmd: "stub superseded ADR UI id-column-mandatory → 0002-idcolumn-mandatory-on-tables"
superseded_by: ./0002-idcolumn-mandatory-on-tables.md
---

# Stub — IDColumn obbligatoria (superseded)

## Contesto

Esisteva un path kebab non numerato per la regola «IDColumn obbligatoria sulle
tabelle Filament». Il canone del modulo UI usa basename `NNNN-slug.md`.

## Driver della decisione

- Un solo ADR vivo per la stessa decisione (DRY).
- Path legacy non devono rimanere stub senza sezioni MADR (gate Pest).
- I link storici al kebab devono puntare al canone numerato.

## Decisione

Questo file è **superseded**. Canonico:
[0002-idcolumn-mandatory-on-tables.md](0002-idcolumn-mandatory-on-tables.md).
Nuovi ADR: basename `NNNN-slug.md` (vedi [README](README.md)).

## Alternative scartate

- Tenere due ADR vivi sullo stesso tema: doppia fonte di verità.
- Cancellare il file senza nota: rompe i link legacy al path kebab.
- Convertire questo path nel canone: confligge con la regola `NNNN-slug.md`.

## Conseguenze

- Pro: un solo ADR da aggiornare (`0002-…`); il kebab resta un puntatore.
- Contro: chi apre il kebab deve seguire il link al canone.

## Conferma

- Contenuto decisionale solo in `0002-idcolumn-mandatory-on-tables.md`.
- Frontmatter `status: superseded` e link relativo al canone presenti.
