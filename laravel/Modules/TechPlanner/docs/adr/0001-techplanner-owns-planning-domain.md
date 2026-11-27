---
title: "ADR — TechPlanner possiede il dominio di pianificazione"
type: decision
status: accepted
module: TechPlanner
created: 2026-11-27
updated: 2026-11-27
---

# TechPlanner possiede il dominio di pianificazione

## Contesto

TechPlanner coordina clienti, controlli, appuntamenti e referenti tecnici usando servizi condivisi dei moduli infrastrutturali.

## Driver della decisione

- mantenere il dominio operativo in un owner unico;
- riusare User, Geo, Notify, Media e Lang senza duplicarne la logica;
- rendere espliciti i conflitti di agenda e le relazioni parentali.

## Alternative scartate

- distribuire gli appuntamenti tra User e Geo: rende ambiguo il ciclo di vita;
- mettere la logica di dominio nei temi: lega il comportamento alla presentazione.

## Decisione

TechPlanner è owner di clienti, controlli e appuntamenti; i moduli condivisi forniscono solo contratti e integrazioni.

## Conseguenze

Le regole di disponibilità e controllo restano testabili nel modulo, mentre UI e notifiche possono evolvere indipendentemente.

## Conferma

Verificare `phpstan analyse Modules/TechPlanner` e i test Pest del modulo dopo ogni modifica al dominio.
