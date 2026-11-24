---
<<<<<<< .merge_file_Hq2zvI
id: User/module-bmad-audit-20260928
title: "User: baseline BMAD e analisi completa"
status: ready-for-dev
module: User
epic: module-governance
priority: P1
created: 2026-09-28
references:
  - ../architecture/module-boundary.md
  - ../brainstorming/module-opportunities.md
  - ../epics/module-roadmap.md
type: story
updated: 2026-10-07
tags: [docs, user, bmad]
qmd: "story   user: baseline bmad user"
=======
title: "Module BMAD audit — User"
type: story
status: review
updated: 2026-11-16
module: User
bmad: true
qmd: "story BMAD audit modulo User inventario gate finding P0 P1"
>>>>>>> .merge_file_hQffGJ
---
# Story: User: baseline BMAD

Come manutentore del modulo User, voglio una baseline BMAD verificabile, così da poter pianificare lavoro senza confondere ipotesi, WIP e comportamento osservato.

<<<<<<< .merge_file_Hq2zvI
## Acceptance criteria
=======
- [x] Inventario source-first misurato (2026-11-16).
- [x] Audit approfondito con finding P0/P1/P2 e path: [audits/user-audit.md](../audits/user-audit.md).
- [x] Pack: [audit](../audit.md), [decision-log](../decision-log.md), [epics](../epics.md), [brainstorming](../brainstorming.md), [ECC](../../ecc/user-ecc-audit.md).
- [x] PHPStan `Modules/User`: 0 errori.
- [ ] Pest modulo eseguito su DB `*_test` raggiungibile (oggi: skip documentato).
- [ ] Finding P0-U1, P0-U2 chiusi con regressione Pest.
- [x] Finding P1 «Cms phantom imports User FO pages» chiuso (2026-11-16): niente `Modules\Cms` nelle Folio pages; rimossa `pages/pages/`; Pest `NoCmsPhantomFolioImportsTest`. Vedi [decision-log](../decision-log.md).

## Riferimenti

- [audit](../audit.md)
- [piano](../piano-miglioramento.md)
- [ECC](../../ecc/user-ecc-audit.md)
>>>>>>> .merge_file_hQffGJ

- [ ] Confermare API pubblica e confini con riferimenti a codice reale.
- [ ] Inventariare i flussi critici e collegarli a test Pest.
- [ ] Misurare PHPStan/Pest nel contesto stabile del modulo.
- [ ] Registrare dipendenze, rischi e decisioni nel modulo.
- [ ] Aggiornare lo stato reale in `docs/sprint-status.yaml`.

## Task

- [ ] Revisione architettura.
- [ ] Brainstorming con stakeholder.
- [ ] Decomposizione epic in story più piccole.
- [ ] Quality gate e second-brain write-back.

<<<<<<< .merge_file_Hq2zvI
=======
Baseline aggiornata, nessun codice applicativo modificato. Fix e Pest restano aperti (gate DB test).
>>>>>>> .merge_file_hQffGJ
