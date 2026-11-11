---
title: TechPlanner client control recency and field workflow
type: bmad-tech-spec
status: implementation-in-progress
owner: TechPlanner
updated: 2026-11-06
---

# Technical specification

## Problem and outcome

The field technician needs to decide which client to visit next and whether a
client is due for RX, electromedical, or health-authorisation work. A client
list that shows only an address hides the two decisions that matter most:
proximity and inspection recency.

## Requirements

- **MUST** show the latest RX, intraoral, electromedical and health-authorisation dates.
- **MUST** provide presence/absence filters for RX, electromedical and health authorisation.
- **MUST** keep the list sortable and compatible with the distance origin workflow.
- **MUST** remain safe before the `controls` migration is applied.
- **SHOULD** expose the same client actions from the map popup and table row.
- **SHOULD** leave empty dates explicit (`—`) instead of inventing a date.

## Technical approach

`Client::withLatestControlDates()` adds correlated `MAX(control_date)`
subqueries. `ListClients` applies the scope only when the table exists. The
Filament table renders those aliases as sortable date columns; filters query
the `controls` relationship with `whereHas`/`whereDoesntHave`.

The existing Parental STI model remains the source of truth: one `controls`
table, `control_type` as discriminator, and `ElectromedicalControl` as a
concrete child. No duplicate per-type tables or resources are introduced.

## Acceptance and verification

1. A client with multiple records shows the maximum date for each type.
2. A client without a type shows `—` and is selectable by the negative filter.
3. Distance ordering, pagination, map markers and actions continue to work.
4. `php -l`, focused PHPStan, migration `--pretend`, composer autoload and
   `git diff --check` pass; full-suite blockers are reported separately.

## Explicit non-goals

No automatic legal advice, automatic compliance deadlines, route optimisation
engine, external map API key, or legacy `DeviceVerification` migration is part
of this slice.
