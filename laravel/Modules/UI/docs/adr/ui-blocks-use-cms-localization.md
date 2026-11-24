---
title: "ADR — Blocchi UI localizzati dal CMS"
type: decision
status: accepted
created: 2026-11-23
updated: 2026-11-23
issues: []
module: UI
---

# ADR — Blocchi UI localizzati dal CMS

## Contesto

Un blocco può ricevere dati localizzati dal CMS oppure funzionare con default autonomi.

## Driver della decisione

- Riutilizzare i componenti senza rendere obbligatorio il CMS.

## Decisione

UI delega al CMS la localizzazione quando disponibile e mantiene fallback validi per i componenti indipendenti.

## Alternative scartate

- Hardcodare i testi nei componenti.

## Conseguenze

I blocchi restano data-driven e riusabili; il CMS non diventa una dipendenza implicita non dichiarata.

## Conferma

Verificare Action di risoluzione, fallback e test dei blocchi.
