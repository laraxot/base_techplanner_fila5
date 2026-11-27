---
title: "Indice degli ADR — TechPlanner"
type: index
module: TechPlanner
status: active
updated: 2026-11-27
---

# Indice degli ADR — TechPlanner

| ADR | Stato | Perché | Conferma |
|---|---|---|---|
| [0001-techplanner-owns-planning-domain](0001-techplanner-owns-planning-domain.md) | accepted | TechPlanner è l'owner di clienti, controlli e appuntamenti; i moduli condivisi forniscono solo contratti e integrazioni. | `phpstan analyse Modules/TechPlanner` e i test Pest del modulo |
| [0002-appointment-conflict-half-open-at-form-level](0002-appointment-conflict-half-open-at-form-level.md) | accepted | Il doppio appuntamento del tecnico si blocca nel form, con intervallo semiaperto `[inizio, fine)`. | Sì: `CheckAppointmentConflictActionTest.php`, 6 casi |
| [0003-contact-form-archive-then-forward](0003-contact-form-archive-then-forward.md) | accepted | Il form archivia prima e dice «inviato» solo se la mail è partita; nessun default per casella e retention. | Sì: `--group=TP-CONTACT-DELIVER-INV-*`, `TP-CONTACT-SUBMIT-INV-*`, `TP-CONTACT-PURGE-INV-*` |
| [0004-controls-single-table-parental](0004-controls-single-table-parental.md) | accepted | I controlli periodici sono una tabella sola con figli Parental per tipo (`controls` + `control_type`). | Sì: `ControlTest.php` |

Formato e regole: [README](README.md).
