---
issues: []
discussions: []
title: "Job — ScheduleService → Actions"
type: concept
tags: [job, actions, queueable-action, schedule, migration]
created: 2026-07-13
updated: 2026-11-23
qmd: "Job module ScheduleService to QueueableAction schedule cache active schedules"
related:
  - ../../../Xot/docs/wiki/concepts/queueable-action-trait-mandatory.md
  - ../../../User/docs/wiki/concepts/no-app-support-queueable-actions.md
  - ../../stories/job-services-to-actions.story.md
  - ../../stories/services-to-actions-job.story.md
---

# Job — `ScheduleService` → Actions

## Mapping (canonico)

| Legacy | Action | Pattern |
|---|---|---|
| `getActives()` (+ `getFromCache()`) | `Modules\Job\Actions\Schedule\GetActiveSchedulesAction::execute()` | `QueueableAction` + `rememberForever` |
| `clearCache()` | `Modules\Job\Actions\Schedule\ClearScheduleCacheAction::execute()` | `QueueableAction` + `forget` |

Le copie flat in `app/Actions/*` sono SUPERSEDED (stesso corpo, namespace errato).

## Callers (2026-11-23)

- `ScheduleObserver::clearCache()` → `Actions\Schedule\ClearScheduleCacheAction`
- `ScheduleClearCacheCommand::handle()` → idem
- `ScheduleService`: zero caller produzione; file ridotto a stub `@deprecated` (no-delete)

## Residuo aperto

- `app/Services/ScheduleService.php` (+ `.bak`) e doppioni flat in `Actions/` restano on-disk finché non c'è autorizzazione a cancellare.
- `GetActiveSchedulesAction` non ha ancora caller di produzione.
