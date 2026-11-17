---
title: "Sixteen header composition rule"
type: concept
confidence: high
updated: 2026-04-21
tags: [header, theme, sixteen, dry, kiss, composition, blade]
sources:
  - ../../../laravel/Themes/Sixteen/resources/views/components/sections/header/v1.blade.php
  - ./header-section-owner-rule.md
  - ../../../_bmad-output/implementation-artifacts/8-36-header-section-v1-subcomponents-extraction-dry-kiss.md
  - ../../../.planning/stories/8-36-header-section-v1-subcomponents-extraction-dry-kiss.story.md
---

# Sixteen header composition rule

## Scopo

Definire come **comporre** l’header del tema Sixteen usando **sottocomponenti Blade** senza violare la [header section owner rule](./header-section-owner-rule.md): il file `v1.blade.php` resta l’unico **entrypoint** e la **fonte di verità** per la section `header`.

Questa pagina e' l'applicazione header-specific della regola generale [blade-component-extraction-governance](./blade-component-extraction-governance.md): cercare componenti riusabili in tutte le Blade, poi scegliere il livello piu semplice coerente con ownership e runtime.

## Regola (normativa)

1. **Owner unico:** `laravel/Themes/Sixteen/resources/views/components/sections/header/v1.blade.php` orchestra layout, stato guest/autenticato e include dei blocchi.
2. **Estrazione ammessa:** blocchi autonomi locali all'header (es. language switcher, user dropdown, CTA area personale guest) devono essere **partial separati** sotto:
   - `laravel/Themes/Sixteen/resources/views/components/sections/header/partials/`
3. **Namespace:** `pub_theme::components.sections.header.<nome>` (o class Blade `<x-sections.header.*>` se il tema registra i tag).
4. **Vietato:** spostare la “source of truth” su un altro header globale (es. dichiarare owner `bootstrap-italia/header.blade.php` per le pagine che usano `<x-section slug="header" />`).
5. **Vietato:** lasciare partial locali allo stesso livello di `v1.blade.php`; quel livello contiene entrypoint/versioni di section, non i pezzi interni.
6. **Vietato:** creare un secondo albero di componenti concorrente fuori da `sections/header/partials/` per lo stesso chrome, salvo riuso già condiviso e documentato.

## Regola generale Blade

Questa regola si applica oltre l'header:

- cercare sempre blocchi riusabili in tutte le Blade;
- se il blocco e' cross-section/cross-page, estrarlo come componente riusabile nella tassonomia esistente del tema/modulo;
- se il blocco e' locale a un owner specifico, estrarlo in `partials/` sotto quella directory owner;
- prima capire ownership e runtime, poi refactor.

## Principi DRY + KISS

- Estrarre solo dove il blocco ha **responsabilità chiara** e riduce duplicazione reale.
- Evitare componentizzazione cerimoniale (troppi layer per un solo uso).
- Mantenere **un solo posto** per policy dropdown: `data-bs-toggle` + JS tema (`app.js`), coerente con [header slim dropdown behavior](../../../laravel/Themes/Sixteen/docs/wiki/concepts/header-slim-dropdown-behavior.md).

## Collegamenti

- [header-section-owner-rule](./header-section-owner-rule.md) — file owner della section
- [blade-component-extraction-governance](./blade-component-extraction-governance.md) — regola generale per tutte le Blade
- [header-authenticated-state](../../../laravel/Themes/Sixteen/docs/wiki/concepts/header-authenticated-state.md) — comportamento guest vs autenticato
- Story BMAD: [8-36 artifact](../../../_bmad-output/implementation-artifacts/8-36-header-section-v1-subcomponents-extraction-dry-kiss.md)
- Story BMAD: [8-37 artifact](../../../_bmad-output/implementation-artifacts/8-37-blade-reusable-components-extraction-and-header-partials-governance.md)
- Planning: [8-36 story](../../../.planning/stories/8-36-header-section-v1-subcomponents-extraction-dry-kiss.story.md)
