---
title: "ADR — modulo TechPlanner"
type: index
tags: [adr, decisioni, techplanner, dominio]
created: 2026-11-24
updated: 2026-11-27
---

# ADR del modulo TechPlanner

TechPlanner è il dominio del progetto: clienti (studi), apparecchi, controlli periodici, appuntamenti dei tecnici, sito
pubblico. Qui sta il **perché** delle scelte di dominio che un agente potrebbe "semplificare": una tabella sola per i
controlli, il conflitto d'agenda nel form, il form di contatto che archivia prima di inoltrare.

Leggili prima di toccare `Control*`, `Appointment*` o `Actions/Contact/*`. Formato e regole:
`Modules/Xot/docs/rules/action-behavioral-contract.md`.

Un file per decisione, nome `NNNN-argomento-in-kebab-case.md` senza date (la data sta nella frontmatter);
eccezioni: `README.md`, `index.md`, `0000-template.md`. Ogni ADR ha le sezioni `Contesto`, `Driver della decisione`,
`Alternative scartate`, `Decisione`, `Conseguenze`, `Conferma` (o `Verifica`).

## Decisioni

- [0001](0001-techplanner-owns-planning-domain.md) — TechPlanner possiede il dominio di pianificazione (accepted).
- [0002](0002-appointment-conflict-half-open-at-form-level.md) — `[inizio, fine)`, stati terminali esclusi, filtro in PHP (accepted).
- [0003](0003-contact-form-archive-then-forward.md) — archivio prima, «inviato» solo se la mail parte; nessun default per casella e retention (accepted).
- [0004](0004-controls-single-table-parental.md) — `controls` + `control_type`, cadenza automatica di 12 mesi (accepted).

Elenco con stato e conferma: [index.md](index.md).

## Harness minimo: ownership, evidenza e recupero (2026-11-27)

Questo indice appartiene a **module_techplanner_fila5**: ogni decisione su codice, dominio o tema va nell'ADR del package owner; il root registra soltanto i vincoli di composizione. Un ADR richiede una scelta reale con alternative e conseguenze, più una **Conferma** ripetibile (oppure la dichiarazione esplicita che manca). Non creare ADR fittizi per riempire un indice.

- [Confine LaravelDay/harness Xot](https://github.com/laraxot/module_xot_fila5/blob/dev/docs/adr/0042-laravel-day-harness-adoption-boundary.md); [ownership root](https://github.com/laraxot/base_ptvx_fila5/blob/dev/docs/adr/0001-harness-minimo-e-ownership.md).
- **BMAD**: la story owner-local conserva `scope`, `must_not_change`, `evidence`, `approval_required` nei cambi rischiosi.
- **ECC**: nessun marker di merge; distinguere la prova eseguita dal semplice riferimento a un test; se la conferma non è disponibile segnare `non eseguita`.
- **Second Brain**: QMD/Graphify e `.harness/memory/{facts,lessons}.md` sono puntatori a evidenza datata, non copie degli ADR. [Runbook](https://github.com/laraxot/base_ptvx_fila5/blob/dev/docs/harness/README.md) · [Rollout #15](https://github.com/laraxot/base_ptvx_fila5/issues/15).
