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

## Harness minimo: ownership, evidenza e recupero (2026-11-27)

Questo indice appartiene a **theme_meetup_fila5**: ogni decisione su codice, dominio o tema va nell'ADR del package owner; il root registra soltanto i vincoli di composizione. Un ADR richiede una scelta reale con alternative e conseguenze, più una **Conferma** ripetibile (oppure la dichiarazione esplicita che manca). Non creare ADR fittizi per riempire un indice.

- [Confine LaravelDay/harness Xot](https://github.com/laraxot/module_xot_fila5/blob/dev/docs/adr/0042-laravel-day-harness-adoption-boundary.md); [ownership root](https://github.com/laraxot/base_ptvx_fila5/blob/dev/docs/adr/0001-harness-minimo-e-ownership.md).
- **BMAD**: la story owner-local conserva `scope`, `must_not_change`, `evidence`, `approval_required` nei cambi rischiosi.
- **ECC**: nessun marker di merge; distinguere la prova eseguita dal semplice riferimento a un test; se la conferma non è disponibile segnare `non eseguita`.
- **Second Brain**: QMD/Graphify e `.harness/memory/{facts,lessons}.md` sono puntatori a evidenza datata, non copie degli ADR. [Runbook](https://github.com/laraxot/base_ptvx_fila5/blob/dev/docs/harness/README.md) · [Rollout #15](https://github.com/laraxot/base_ptvx_fila5/issues/15).
