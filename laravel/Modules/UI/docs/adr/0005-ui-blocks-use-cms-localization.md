---
title: "ADR — Blocchi UI localizzati dal CMS"
type: decision
status: accepted
created: 2026-11-23
updated: 2026-11-26
module: UI
decision-makers: UI module owner
issues: []
qmd: "ui blocks use cms localization blocchi"
---

# ADR — Blocchi UI localizzati dal CMS

## Contesto

Un blocco può ricevere dati localizzati dal CMS oppure funzionare con default autonomi. Questo ADR fissa il **principio** (testi e URL arrivano dai dati, non dai componenti);
il **meccanismo** senza dipendenza da Cms è in [0004](0004-optional-cms-delegation-for-block-data.md).

## Driver della decisione

- Riutilizzare i componenti senza rendere obbligatorio il CMS.
- Blocchi data-driven: etichette e URL specifici della pagina arrivano dal JSON del CMS, i default sicuri dalla configurazione del tema.

## Alternative scartate

- Scrivere i testi direttamente nei componenti: ogni lingua e ogni sito richiederebbe un componente diverso.

## Decisione

UI delega al CMS la localizzazione quando disponibile e mantiene fallback validi per i componenti indipendenti.

## Conseguenze

I blocchi restano data-driven e riusabili; il CMS non diventa una dipendenza implicita non dichiarata.

## Conferma

- `Modules/UI/app/Actions/Block/GetLocalizedBlockDataAction.php`: delega al resolver di Cms solo se la classe esiste, altrimenti restituisce i dati invariati (fallback autonomo).
- `cd laravel && vendor/bin/pest Modules/UI/tests/Unit/Actions/Block/GetLocalizedBlockDataActionTest.php`: delega, ritorno invariato senza resolver valido, rifiuto delle chiavi non stringa.
- Nessuna conferma automatica che i testi dei componenti non siano scritti nel codice: resta la revisione. Proposta: un test arch che cerchi stringhe letterali nelle viste `components/blocks/*`.

## Stato attuale

`Modules/UI/app/View/Components/Render/Block.php:49-52` scrive nel codice `'deprecated'` e `'view not exists'` per l'avviso di vista mancante (vedi [0003](0003-missing-block-view-shows-type-not-content.md)): è testo di diagnostica, non di un blocco, ma non passa dai file lingua.
