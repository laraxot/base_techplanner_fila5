---
title: "ADR — Configurazione Notify centralizzata"
type: decision
status: accepted
created: 2026-11-23
updated: 2026-11-23
issues: []
module: Notify
---

# ADR — Configurazione Notify centralizzata

## Contesto

Provider e canali di notifica usano configurazioni sensibili e variabili per ambiente.

## Driver della decisione

- Evitare `env()` sparsi e configurazioni divergenti.

## Decisione

Notify carica la configurazione tramite il suo adapter centralizzato e lascia ai provider solo il comportamento di consegna.

## Alternative scartate

- Leggere segreti direttamente da provider o view.

## Conseguenze

La configurazione è cacheabile e verificabile; ogni nuovo canale deve passare dal contratto Notify.

## Conferma

Verificare configurazione compilata, adapter e test del canale.
