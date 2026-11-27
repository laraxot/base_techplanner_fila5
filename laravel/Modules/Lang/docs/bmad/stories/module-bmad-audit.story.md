---
title: "Module BMAD audit — Lang"
type: story
status: review
updated: 2026-11-16
module: Lang
bmad: true
qmd: "story BMAD audit modulo Lang inventario gate pest phpstan finding tracker chiavi mancanti test schema user_id"
related:
  - ../audits/lang-audit.md
  - ../epics.md
  - ../piano-miglioramento.md
---

# Story: audit BMAD profondo del modulo Lang

## Contesto

Audit source-first del modulo che deve tenere fuori dal codice ogni parola che l'utente legge ([purpose](../purpose.md)).

## Acceptance

- [x] Inventario misurato e finding con `path:line` ([audit profondo](../audits/lang-audit.md)).
- [x] Sintesi + gate ([audit](../audit.md)), checklist ([ECC](../../ecc/lang-ecc-audit.md)).
- [x] Gap-fill: [purpose](../purpose.md), [architecture](../architecture.md) (riscritta), [decision-log](../decision-log.md), [epics](../epics.md), [brainstorming](../brainstorming.md).
- [x] PHPStan `Modules/Lang`: 0 errori.
- [ ] Pest `Modules/Lang`: `tests/Feature` 10 pass / 13 fail (schema `user_id`, E2); `tests/Unit` non eseguito.
- [ ] E1–E5 chiuse con test di comportamento.

## Riferimenti

1. Lock dei file di `docs/` del modulo (`bashscripts/lock/`), unlock a fine lavoro.
2. Audit codice → docs; nessun PHP toccato.
3. Pack ECC e indici aggiornati; `qmd update`.

## Esito

Baseline consegnata: 0 P0, 3 P1, P2 elencati. Nota: esiste anche `module-bmad-audit.story.md` (storica, nome datato: da migrare a una story senza data).


## Storico unito da `module-bmad-audit.story.md` (creato 2026-09-28)

### Story — Lang: baseline BMAD

Come manutentore del modulo Lang, voglio una baseline BMAD verificabile, così da poter pianificare lavoro senza confondere ipotesi, WIP e comportamento osservato.

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
