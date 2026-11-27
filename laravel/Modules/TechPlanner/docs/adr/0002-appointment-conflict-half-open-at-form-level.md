---
title: "ADR — Il doppio appuntamento del tecnico si blocca nel form, con intervallo semiaperto"
type: decision
status: accepted
created: 2026-11-24
updated: 2026-11-24
related:
  - ../../app/Actions/CheckAppointmentConflictAction.php
  - ../../app/Filament/Resources/AppointmentResource/Schemas/AppointmentForm.php
  - ../stories/appointment-conflict-detection.story.md
---

# ADR: il doppio appuntamento del tecnico si blocca nel form, con intervallo semiaperto

## Contesto

- Un tecnico non può essere da due clienti alla stessa ora: la prenotazione doppia è il difetto più costoso per chi
  lavora sul campo (story `appointment-conflict-detection`).
- Gli appuntamenti hanno `date` (inizio) e `duration_minutes` (default 60, migrazione
  `2026_11_19_000000_add_duration_minutes_to_appointments_table.php`); `Appointment::endAt()` = inizio + durata.
- I test girano su SQLite, la produzione su MySQL: `DATE_ADD` non è portabile.
- Domanda: cosa conta come conflitto e dove si controlla?

## Driver della decisione

- Costo operativo: un tecnico da due clienti alla stessa ora è il difetto più costoso per chi lavora sul campo.
- Semantica corretta degli intervalli: appuntamenti adiacenti non devono risultare in conflitto.
- Portabilità: i test girano su SQLite e la produzione su MySQL, niente SQL non portabile.
- Feedback immediato all'operatore senza bloccare import, seed o API.

## Decisione

- `CheckAppointmentConflictAction::execute(workerId, start, duration, excludeId)`: intervallo `[inizio, fine)`, quindi
  due appuntamenti adiacenti non sono in conflitto; gli stati terminali (`completed`, `cancelled`, `no_show`) non
  occupano l'agenda; l'appuntamento in modifica si esclude.
- La query filtra solo `date < fine` e il tecnico; la condizione `endAt() > inizio` si valuta in PHP sui candidati.
- Il controllo è una regola di validazione di `AppointmentForm` su `worker_id`, `date`, `duration_minutes`.

## Alternative scartate

- Intervallo chiuso `[inizio, fine]`: 9:00-10:00 e 10:00-11:00 risulterebbero in conflitto.
- Calcolo della fine in SQL: diverso tra SQLite e MySQL.
- Observer `saving` che lancia eccezione: blocca anche import e seed, che oggi possono avere sovrapposizioni storiche.

## Conseguenze

- Pro: l'operatore vede il conflitto con nome del tecnico e orario prima di salvare.
- Contro: insert da import, seed o API non sono controllati; nessun tempo di trasferimento tra appuntamenti; `date` è
  senza fuso orario.

## Verifica

`Modules/TechPlanner/tests/Unit/Actions/CheckAppointmentConflictActionTest.php`: 6 casi (vuoto, sovrapposizione,
adiacenza, altro tecnico, stati terminali, esclusione di sé), verdi.
