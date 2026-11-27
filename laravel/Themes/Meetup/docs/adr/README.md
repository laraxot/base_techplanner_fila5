---
title: "ADR del tema Meetup"
type: index
tags: [adr, decisioni, meetup]
created: 2026-11-24
updated: 2026-11-24
---

# ADR del tema Meetup

Meetup e' un tema pubblico per siti di community ed eventi. Le sue decisioni tengono fuori dal tema la definizione delle
pagine (JSON del CMS) e la logica dei form (widget dei moduli).

**Quando leggerli:** prima di creare una Blade per una pagina, un controller, un resolver di contenuti o un form Livewire
nel tema. Formato: [regola del canon](../../../../Modules/Xot/docs/rules/action-behavioral-contract.md).

## Decisioni

- [Meetup delega la logica ai moduli](0001-meetup-delegates-domain-logic.md) — il tema separa presentazione e dominio; ogni integrazione ha un owner di modulo.
- [Form auth come widget dei moduli](0002-auth-forms-are-module-widgets.md) — login (User) e registrazione con consensi (Gdpr) sono widget Filament.
- [Pagine pubbliche da JSON con x-page](0003-public-pages-from-json-via-x-page.md) — le pagine Folio generiche rendono i JSON del CMS; niente Blade per pagina ne' controller.

L'indice completo e' in [index.md](index.md).
