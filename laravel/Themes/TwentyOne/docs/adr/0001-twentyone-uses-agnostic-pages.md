---
title: "ADR — TwentyOne usa pagine agnostiche"
type: decision
status: accepted
theme: TwentyOne
created: 2026-11-27
updated: 2026-11-27
---

# TwentyOne usa pagine agnostiche

## Contesto

TwentyOne visualizza contenuti configurati dal CMS e non deve conoscere i modelli concreti dei moduli.

## Driver della decisione

- mantenere le pagine riusabili;
- centralizzare la risoluzione dei contenuti nel CMS;
- evitare markup e routing duplicati.

## Alternative scartate

- una Blade per ogni modello: accoppia il tema al dominio;
- controller specifici nel tema: bypassa Folio e il resolver CMS.

## Decisione

Il tema usa entry point `container0` agnostici e riceve payload neutri (`item`/`record`) dal resolver CMS.

## Conseguenze

Il tema può cambiare senza riscrivere il dominio; il CMS deve mantenere stabile il contratto del payload.

## Conferma

Verificare le pagine Folio, il resolver CMS e i test source-level di header e blocchi.
