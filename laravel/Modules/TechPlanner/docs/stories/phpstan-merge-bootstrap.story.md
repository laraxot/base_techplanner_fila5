---
title: "PHPStan merge bootstrap — TechPlanner"
type: story
module: TechPlanner
status: done
priority: high
tags: [phpstan, merge, conflict-resolution, bootstrap, techplanner]
qmd: "techplanner phpstan merge bootstrap conflict markers Client ClientsTable lang"
related:
  - "./phpstan-cleanup-techplanner.story.md"
  - "./clients-distance-sort.story.md"
  - "../../../Job/docs/stories/phpstan-merge-bootstrap.story.md"
---

# PHPStan merge bootstrap — TechPlanner

## Scopo

Sbloccare il bootstrap PHPStan/merge del modulo eliminando i marker `<<<<<<<` residui
nei PHP di dominio (Client, tabella Filament, lang IT) senza perdere logica di business
(soft delete, ultimo appuntamento, filtri controlli, i18n umana, mappa).

## Perimetro risolto

| File | Decisione |
|------|-----------|
| `app/Models/Client.php` | **merged**: `HasOne` (per `latestAppointment`) + `SoftDeletes` |
| `app/Filament/.../ClientsTable.php` | **merged**: import `ListClients` + `TechPlannerBaseTable`; filtri keyed `last_appointment_type` + `never_controlled_type` |
| `lang/it/appointment_form.php` | **theirs-purpose**: label IT umane, no duplicato `client_id` con placeholder grezzi |
| `lang/it/client_infolist.php` | **theirs-purpose**: sezioni complete + label IT (non chiavi grezze) |
| `lang/it/client.php` | **merged**: `submit`+`geocodeCoordinates`; campi date controllo + `distance_km`; `map`/`location_map` (messages/model già presenti sopra) |

## Acceptance

- [x] Zero marker `<<<<<<<` nei PHP di TechPlanner
- [x] `php -l` verde sui file toccati
- [x] Themes: nessuno marker PHP (scan)

## Note

Forward-only: nessuna riscrittura storica; purpose-first hunk-per-hunk.
`phpstan.neon` non toccato.
