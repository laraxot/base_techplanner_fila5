---
title: "ADR — modulo TechPlanner"
type: index
tags: [adr, decisioni, techplanner, dominio]
created: 2026-11-24
updated: 2026-11-24
---

# ADR del modulo TechPlanner

TechPlanner è il dominio del progetto: clienti (studi), apparecchi, controlli periodici, appuntamenti dei tecnici, sito
pubblico. Qui sta il **perché** delle scelte di dominio che un agente potrebbe "semplificare": una tabella sola per i
controlli, il conflitto d'agenda nel form, il form di contatto che archivia prima di inoltrare.

Leggili prima di toccare `Control*`, `Appointment*` o `Actions/Contact/*`. Formato e regole:
`Modules/Xot/docs/rules/action-behavioral-contract.md`.

## Decisioni

- [Controlli in una tabella con figli Parental](controls-single-table-parental.md) — `controls` + `control_type`, cadenza automatica di 12 mesi.
- [Conflitto d'agenda nel form, intervallo semiaperto](appointment-conflict-half-open-at-form-level.md) — `[inizio, fine)`, stati terminali esclusi, filtro in PHP.
- [Form di contatto: archivio prima, «inviato» solo se la mail parte](contact-form-archive-then-forward.md) — nessun default per casella e retention.
