---
title: "Contratti — Job"
type: index
module: Job
status: active
tags: [contracts, actions, job]
created: 2026-11-18
updated: 2026-11-26
---

# Contratti del modulo Job

Cosa promettono le Action che costruiscono la riga shell del worker o dichiarano uno stub
di esecuzione task. Regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`.

## Contratti

- [AssertAllowedArtisanCommandAction](assert-allowed-artisan-command-action.md) — rifiuta ogni comando Artisan della UI che non sia identico a una voce dell'allowlist (2 invarianti, 2 dimostrate).
- [BuildQueueWorkerCommandAction](build-queue-worker-command-action.md) — costruisce la riga di shell con cui `worker:check` avvia `queue:work`, con soli interi dalle impostazioni (3 invarianti, 2 dimostrate).
- [ExecuteTaskAction](execute-task-action.md) — segnaposto: dovrebbe eseguire un task schedulato per id, oggi lancia sempre (1 invarianti, 0 dimostrate).
- [DummyAction](dummy-action.md) — segnaposto che stampa «hello»; usato dai pulsanti di prova di JobStatus (1 invarianti, 0 dimostrate).
- [Schedule\ClearScheduleCacheAction](clear-schedule-cache-action.md) — svuota la cache dei task attivi dopo una modifica agli schedule (2 invarianti, 0 dimostrate).
- [ClearScheduleCacheAction (radice, deprecata)](root-clear-schedule-cache-action.md) — duplicato flat di `Schedule\ClearScheduleCacheAction`, senza chiamanti (1 invarianti, 0 dimostrate).
- [Schedule\GetActiveSchedulesAction](get-active-schedules-action.md) — elenco dei task schedulati attivi, con cache opzionale (3 invarianti, 0 dimostrate).
- [GetActiveSchedulesAction (radice, deprecata)](root-get-active-schedules-action.md) — duplicato flat di `Schedule\GetActiveSchedulesAction`, senza chiamanti (1 invarianti, 0 dimostrate).
- [GetTaskCommandsAction](get-task-commands-action.md) — elenco ordinato dei comandi Artisan registrati (2 invarianti, 0 dimostrate).
- [GetTaskFrequenciesAction](get-task-frequencies-action.md) — restituisce le frequenze di schedulazione da `config('totem.frequencies')` (2 invarianti, 2 dimostrate).
- [GetCommandArgumentsActions](get-command-arguments-actions.md) — elenca gli argomenti di un comando Artisan (nome, default, obbligatorio) (2 invarianti, 1 dimostrate).
- [GetCommandOptionsActions](get-command-options-actions.md) — separa le opzioni di un comando Artisan in con valore e senza valore (2 invarianti, 1 dimostrate).
- [GetCommandsAction](get-commands-action.md) — elenca tutti i comandi Artisan registrati come `CommandData` per il form degli schedule (3 invarianti, 0 dimostrate).
- [GetJobStatusCommandsAction](get-job-status-commands-action.md) — elenco fisso dei comandi di coda per JobStatus (1 invarianti, 0 dimostrate).
- [GetQueueSubcommandsAction](get-queue-subcommands-action.md) — elenco fisso dei sottocomandi `queue:*` per il widget della coda (1 invarianti, 0 dimostrate).
- [GetScheduleStatusCommandsAction](get-schedule-status-commands-action.md) — elenco fisso dei comandi di schedulazione per ScheduleStatus (1 invarianti, 0 dimostrate).

- [index](index.md) — registro operativo: operazione, classe, invarianti, copertura, comando.

## Stato di copertura

Contratti: 16. Invarianti: 28, dimostrate da un test `->group('<ID>')`: 8 (conteggio del 2026-11-26 con `rg "group\(" tests`). Le altre portano «— (non dimostrato)» nella colonna Group.

## Backlog contract

Nessuno: ogni Action in `app/Actions` ha un contratto. Quelle senza chiamanti o deprecate (`ClearScheduleCacheAction` e `GetActiveSchedulesAction` nella radice, i tre elenchi `Console/*`, `GetTask*`, `GetCommandArgumentsActions`, `GetCommandOptionsActions`) sono documentate come tali: candidate a rimozione con decisione del proprietario del modulo.

## Backlog test

Invarianti senza test con group (da scrivere o da annotare quando un test esistente le prova davvero):

- `JOB-WORKER-CMD-INV-3` (build-queue-worker-command-action)
- `JOB-EXEC-INV-1` (execute-task-action)
- `JOB-DUMMY-INV-1` (dummy-action)
- `JOB-SCHEDCACHE-INV-1` (clear-schedule-cache-action)
- `JOB-SCHEDCACHE-INV-2` (clear-schedule-cache-action)
- `JOB-SCHEDCACHE-ROOT-INV-1` (root-clear-schedule-cache-action)
- `JOB-ACTIVESCHED-INV-1` (get-active-schedules-action)
- `JOB-ACTIVESCHED-INV-2` (get-active-schedules-action)
- `JOB-ACTIVESCHED-INV-3` (get-active-schedules-action)
- `JOB-ACTIVESCHED-ROOT-INV-1` (root-get-active-schedules-action)
- `JOB-TASKCMD-INV-1` (get-task-commands-action)
- `JOB-TASKCMD-INV-2` (get-task-commands-action)
- `JOB-CMDARGS-INV-1` (get-command-arguments-actions)
- `JOB-CMDOPTS-INV-2` (get-command-options-actions)
- `JOB-CMDLIST-INV-1` (get-commands-action)
- `JOB-CMDLIST-INV-2` (get-commands-action)
- `JOB-CMDLIST-INV-3` (get-commands-action)
- `JOB-JSTATCMD-INV-1` (get-job-status-commands-action)
- `JOB-QSUB-INV-1` (get-queue-subcommands-action)
- `JOB-SSTATCMD-INV-1` (get-schedule-status-commands-action)
