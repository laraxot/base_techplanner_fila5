---
title: "ADR del tema TwentyOne"
type: index
tags: [adr, decisioni, twentyone]
created: 2026-11-24
updated: 2026-11-24
---

# ADR del tema TwentyOne

TwentyOne e' un tema pubblico "agnostico" guidato dai JSON del CMS: le sue decisioni fissano i nomi delle pagine Folio
generiche e il fatto che le sezioni (l'header per primo) siano solo orchestratori di blocchi.

**Quando leggerli:** prima di creare una pagina Folio per un tipo di contenuto, rinominare slug/rotte `container0.*`, o
scrivere markup fisso in una sezione. Formato: [regola del canon](../../../../Modules/Xot/docs/rules/action-behavioral-contract.md).

## Decisioni

- [TwentyOne usa pagine agnostiche](0001-twentyone-uses-agnostic-pages.md) — entry point `container0` agnostici e payload neutri dal resolver CMS.
- [Pagine container0 agnostiche](0002-agnostic-container0-pages.md) — `container0.index` / `container0.view`, payload neutro `item`/`record`, risoluzione in `Modules/Cms` (approfondimento dell'ADR 0001).
- [Header come blocchi per posizione](0003-header-blocks-grouped-by-position.md) — l'header rende i blocchi JSON raggruppati per `data.position`, senza markup proprio.

L'indice completo e' in [index.md](index.md).

## Harness minimo: ownership, evidenza e recupero (2026-11-27)

Questo indice appartiene a **theme_twentyone_fila5**: ogni decisione su codice, dominio o tema va nell'ADR del package owner; il root registra soltanto i vincoli di composizione. Un ADR richiede una scelta reale con alternative e conseguenze, più una **Conferma** ripetibile (oppure la dichiarazione esplicita che manca). Non creare ADR fittizi per riempire un indice.

- [Confine LaravelDay/harness Xot](https://github.com/laraxot/module_xot_fila5/blob/dev/docs/adr/0042-laravel-day-harness-adoption-boundary.md); [ownership root](https://github.com/laraxot/base_ptvx_fila5/blob/dev/docs/adr/0001-harness-minimo-e-ownership.md).
- **BMAD**: la story owner-local conserva `scope`, `must_not_change`, `evidence`, `approval_required` nei cambi rischiosi.
- **ECC**: nessun marker di merge; distinguere la prova eseguita dal semplice riferimento a un test; se la conferma non è disponibile segnare `non eseguita`.
- **Second Brain**: QMD/Graphify e `.harness/memory/{facts,lessons}.md` sono puntatori a evidenza datata, non copie degli ADR. [Runbook](https://github.com/laraxot/base_ptvx_fila5/blob/dev/docs/harness/README.md) · [Rollout #15](https://github.com/laraxot/base_ptvx_fila5/issues/15).
