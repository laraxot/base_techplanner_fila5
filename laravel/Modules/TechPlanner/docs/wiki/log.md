---
title: "Wiki Log — TechPlanner"
type: log
module: TechPlanner
tags: [techplanner, wiki, log, changelog]
created: 2026-06-06
updated: 2026-06-06
qmd: "techplanner wiki log changelog bootstrap business domain"
issues:
  - "https://github.com/laraxot/base_techplanner_fila5/issues/7"
discussions:
  - "https://github.com/laraxot/base_techplanner_fila5/discussions/8"
related:
  - ./index.md
  - ./concepts/techplanner-business-domain.md
---

# Wiki Log — TechPlanner

## [2026-11-06] client form sections + location map

- `AddressSection` (Geo) non renderizza più i campi contatto
  (phone/mobile/fax/pec/whatsapp/email) né `notes`: restano solo in
  `ContactSection` e nel campo note canonico del form, eliminando i binding
  duplicati sullo stesso state path.
- `ClientInfolist`: `contact_info` spezzata in `address_info` + `contacts`
  (aggiunti pec/whatsapp mancanti); label i18n it/en/de/es.
- Client edit form: mappa Leaflet singolo cliente + link Google Maps e
  ViaMichelin (empty state guidato senza coordinate) — view
  `client-location-map.blade.php`.

## [2026-11-06] appointment workflow + coordinate self-healing

- Appointment: `worker_id`, `status` (AppointmentStatusEnum), `outcome`,
  `reminder_sent_at` (migration `2026_11_06_100000`); form con client/worker/
  status, tabella con badge+filtri, infolist completa.
- `techplanner:appointments:reminders` (daily 08:00): email cliente via
  `Notification::route('mail')` + digest admin; idempotente via
  `reminder_sent_at`.
- Device: relazione `controls()` + colonna `controls_count` in DevicesTable.
- ControlForm: Repeater checklist in `metadata.checklist` (ok/ko/na).
- ClientsTable: azione "punto di partenza" icon-only e con fallback
  geocoding (`UpdateCoordinatesFromAddressAction`); stesso fallback nel popup
  mappa; header action "Aggiorna Coordinate" ora con label.
- Fix: `en/de/appointment.php` erano stub senza `<?php` — ripristinati come
  array PHP validi.

## [2026-11-06] client control recency and competitive workflow

- Added the Control entity page and linked it from the entity index.
- Documented latest RX, intraoral, electromedical and health-authorisation
  projections and the relationship-based filters on the client list.
- Added a competitive analysis covering field-service routing, asset history and
  dental/veterinary compliance products.

## [2026-06-06] frontmatter GitHub | techplanner-business-domain SSoT

- Frontmatter: `repo`, `issues` [#7](https://github.com/laraxot/base_techplanner_fila5/issues/7), `discussions` [#8](https://github.com/laraxot/base_techplanner_fila5/discussions/8)
- Body: sezione `## GitHub (tracciamento)` con tabella link
- Bootstrap agente: passo 0 frontmatter+gh in `agent-bootstrap-compact.md`

## [2026-06-06] frontmatter GitHub | issues + discussions obbligatori

- Aggiunti `issues:` e `discussions:` a tutti i `.md` wiki del modulo
- Issue dominio: [#7](https://github.com/laraxot/base_techplanner_fila5/issues/7) · Discussion [#8](https://github.com/laraxot/base_techplanner_fila5/discussions/8)
- Issue harness: [#9](https://github.com/laraxot/base_techplanner_fila5/issues/9) · Discussion [#10](https://github.com/laraxot/base_techplanner_fila5/discussions/10)
- Regola progetto: [#11](https://github.com/laraxot/base_techplanner_fila5/issues/11) · Discussion [#12](https://github.com/laraxot/base_techplanner_fila5/discussions/12)

## [2026-11-06] competitor analysis + expiry workflow

- Ricerca FSM/CMMS (Jobber, ServiceTitan, Simpro, Radix+, Romaldent, ADonePRO,
  CMMS Medical, ecc.): report `docs/research/market-fsm-competitors-research.md`
- Nuova pagina concept: [competitor-landscape.md](./concepts/competitor-landscape.md)
- Expiry workflow controlli: widget, reminder giornaliero, auto-cadenza
  `next_control_date`, filtri — story `controls-expiry-workflow.story.md`
- Fix: `control.php` lang (placeholder `control.navigation`) + icona svg
- Fix infra: cache `_components.json` comandi stantia

## [2026-06-06] bootstrap | wiki modulo dominio business

- Creato `docs/wiki/` con index, concepts, entities, harness
- Sintesi: [techplanner-business-domain.md](./concepts/techplanner-business-domain.md)
- Entità: Client, Device, Appointment
- QMD collection: `tp-mod-techplanner-wiki`
- Remote modulo: `laraxot/module_techplanner_fila5` (monorepo owner fino a repo modulo pubblicato)
