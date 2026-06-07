---
title: "Header section owner rule"
type: concept
confidence: high
updated: 2026-04-20
tags: [header, section, theme, ownership, six]
sources:
  - ../../laravel/Themes/Sixteen/resources/views/components/sections/header/v1.blade.php
  - ../../laravel/Themes/Sixteen/docs/wiki/concepts/header-authenticated-state.md
  - ../../_bmad-output/implementation-artifacts/8-35-header-section-v1-source-of-truth-governance.md
---

# Header section owner rule

## Regola permanente (normativa)

Per il tema **Sixteen**, l’header pubblico **è** e **deve restare** definito nel file:

- `laravel/Themes/Sixteen/resources/views/components/sections/header/v1.blade.php`

Quando una pagina renderizza:

- `<x-section slug="header" />`

questo è l’**unico** blade da trattare come **fonte di verità** per markup, slim bar, dropdown lingua/utente e stato guest/autenticato, salvo evidenza contraria nel codice del resolver section (tpl diversi da `v1`).

## Conseguenze operative

- prima si legge `components/sections/header/v1.blade.php`
- solo dopo si controllano blade secondari, partial o file storici
- `bootstrap-italia/header.blade.php` non va trattato come owner automatico di `segnalazione-crea`
- story, docs, review e debug devono citare il section owner reale
- per ridurre complessita si possono estrarre sottocomponenti locali sotto `components/sections/header/partials/`
- anche dopo l'estrazione, `v1.blade.php` resta l'orchestratore e fonte di verita dell'header

## Composizione (sottocomponenti)

L’owner **non** è un monolite obbligatorio: blocchi interni (language switcher, user dropdown, CTA guest, ecc.) possono essere **estratti** come partial sotto `components/sections/header/partials/`, purché `v1.blade.php` resti l’unico orchestratore. Vedi [sixteen-header-composition-rule](./sixteen-header-composition-rule.md) e story **8-37**.

## Parità colori (flusso segnalazione / Design Comuni)

Sull’owner `v1.blade.php` non introdurre `<style>` inline duplicati nel layout: regole e riferimento kit in [header-color-parity](../../../laravel/Themes/Sixteen/docs/wiki/concepts/header-color-parity.md) (tema Sixteen).

## Anti-pattern

- partire dal blade sbagliato solo per nome simile
- applicare fix al file secondario senza verificare il path di `<x-section slug="header" />`
- documentare l'header come se fosse gestito da un componente diverso dal section owner
- trattare un partial estratto come nuova fonte di verità al posto di `v1.blade.php`
- usare la DRY per spostare fuori la source of truth dell'header invece di alleggerire il section owner
