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
