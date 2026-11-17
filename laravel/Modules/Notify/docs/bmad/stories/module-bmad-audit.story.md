---
<<<<<<< HEAD
id: Notify/module-bmad-audit-20260928
title: "Notify: baseline BMAD e analisi completa"
status: ready-for-dev
module: Notify
epic: module-governance
priority: P1
created: 2026-09-28
references:
  - ../architecture/module-boundary.md
  - ../brainstorming/module-opportunities.md
  - ../epics/module-roadmap.md
type: story
updated: 2026-10-07
tags: [docs, notify, bmad]
qmd: "story   notify: baseline bmad notify"
---
# Story: Notify: baseline BMAD

Come manutentore del modulo Notify, voglio una baseline BMAD verificabile, così da poter pianificare lavoro senza confondere ipotesi, WIP e comportamento osservato.

## Acceptance criteria

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

=======
title: "Module BMAD audit — Notify"
type: story
status: review
updated: 2026-11-16
module: Notify
bmad: true
qmd: "story BMAD audit modulo Notify inventario finding P1 gate PHPStan Pest"
---

# Story: audit BMAD del modulo Notify

## Perché

Notify è il canale con cui la piattaforma raggiunge le persone. Va verificato che
non esponga dati dei destinatari e che nessun canale fallisca in silenzio.

## Acceptance

- [x] Inventario source-first misurato (2026-11-16), incluso `Gate::getPolicyFor` a runtime.
- [x] Audit approfondito + sintesi in `docs/bmad/`.
- [x] Pack ECC in `docs/ecc/`.
- [x] PHPStan `Modules/Notify`: 0 errori.
- [ ] P1-1 `NotificationLogPolicy` + test negativo.
- [ ] P1-2 webhook inbound: firma/throttle/whitelist provider + test.
- [ ] P1-3 matrice capability canali; stub con eccezione esplicita.
- [ ] Pest modulo verde (richiede DB testing raggiungibile; MySQL `10.100.200.53` oggi no).

## Riferimenti

- [audit sintesi](../audit.md) · [audit approfondito](../audits/notify-audit.md)
- [ECC](../../ecc/notify-ecc-audit.md) · [piano](../piano-miglioramento.md)

## Esito

Baseline 2026-11-16: 0 finding P0, 3 P1, 4 P2. Nessun codice applicativo modificato
da questo audit; i fix partono da story figlie con lock.
>>>>>>> laraxot/dev
