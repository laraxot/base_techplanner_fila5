---
title: "ADR — Barthelemy resta uno stub inattivo"
type: decision
status: accepted
theme: Barthelemy
created: 2026-11-27
updated: 2026-11-27
---

# Barthelemy resta uno stub inattivo

## Contesto

Il tema Barthelemy è dichiarato inattivo e contiene solo configurazione e documentazione.

## Driver della decisione

- evitare una falsa superficie pubblica;
- non duplicare viste o asset di altri temi;
- rendere esplicita la decisione nel manifesto del tema.

## Alternative scartate

- attivare il tema senza viste: produrrebbe un tema non utilizzabile;
- copiare un tema esistente: nasconderebbe l'owner reale della presentazione.

## Decisione

Barthelemy resta inattivo finché non esiste un requisito concreto e un'architettura di presentazione approvata.

## Conseguenze

Non si aggiunge codice applicativo prematuro; il tema può essere attivato solo insieme a viste, asset e test coerenti.

## Conferma

Controllare `theme.json` (`active: false`) e mantenere il tema fuori dalle rotte attive.
