---
title: "INDEX contratti — Job"
type: index
module: Job
status: active
created: 2026-11-26
updated: 2026-11-26
qmd: "job contracts index machine readable"
---

# Job behavioral contract index

Inventario machine-readable dei contratti di comportamento del modulo **Job**.
La tabella di lavoro italiana (invarianti, copertura Pest, comandi) e' in
[index.md](index.md); il formato e' descritto in [README.md](README.md).

## Contratti

- [assert-allowed-artisan-command-action](assert-allowed-artisan-command-action.md)
- [build-queue-worker-command-action](build-queue-worker-command-action.md)
- [clear-schedule-cache-action](clear-schedule-cache-action.md)
- [dummy-action](dummy-action.md)
- [execute-task-action](execute-task-action.md)
- [get-active-schedules-action](get-active-schedules-action.md)
- [get-command-arguments-actions](get-command-arguments-actions.md)
- [get-command-options-actions](get-command-options-actions.md)
- [get-commands-action](get-commands-action.md)
- [get-job-status-commands-action](get-job-status-commands-action.md)
- [get-queue-subcommands-action](get-queue-subcommands-action.md)
- [get-schedule-status-commands-action](get-schedule-status-commands-action.md)
- [get-task-commands-action](get-task-commands-action.md)
- [get-task-frequencies-action](get-task-frequencies-action.md)
- [root-clear-schedule-cache-action](root-clear-schedule-cache-action.md)
- [root-get-active-schedules-action](root-get-active-schedules-action.md)

## Autore

Usa lo standard di authoring Xot `Modules/Xot/docs/contracts/contract-authoring-standard.md`
e il template [_template.md](_template.md). Il comportamento legacy e' documentato cosi'
com'e' e non e' un modello per codice nuovo.
