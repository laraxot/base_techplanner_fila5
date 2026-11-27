---
title: "Indice operativo dei contratti — Job"
type: index
module: Job
status: active
updated: 2026-11-26
---

# Indice operativo dei contratti — Job

Registro generato dai contratti presenti in questa cartella (ADR 0012 di Xot). Copertura = invarianti con `->group('<ID>')` in `tests/` del modulo, contate il 2026-11-26. Comandi da `laravel/`; un gruppo = una promessa: `vendor/bin/pest Modules/Job/tests --group=<ID>`.

| Operazione | Contratto | Classe | Invarianti | Copertura | Comando di esempio |
|---|---|---|---|---|---|
| AssertAllowedArtisanCommandAction | [assert-allowed-artisan-command-action](assert-allowed-artisan-command-action.md) | `Modules\Job\Actions\Console\AssertAllowedArtisanCommandAction` | JOB-ARTISAN-INV-1..2 | dimostrate 2/2 | `vendor/bin/pest Modules/Job/tests --group=JOB-ARTISAN-INV-1` |
| BuildQueueWorkerCommandAction | [build-queue-worker-command-action](build-queue-worker-command-action.md) | `Modules\Job\Actions\BuildQueueWorkerCommandAction` | JOB-WORKER-CMD-INV-1..3 | dimostrate 2/3 | `vendor/bin/pest Modules/Job/tests --group=JOB-WORKER-CMD-INV-1` |
| ExecuteTaskAction | [execute-task-action](execute-task-action.md) | `Modules\Job\Actions\ExecuteTaskAction` | JOB-EXEC-INV-1 | dimostrate 0/1 | `vendor/bin/pest Modules/Job/tests --group=JOB-EXEC-INV-1` |
| DummyAction | [dummy-action](dummy-action.md) | `Modules\Job\Actions\DummyAction` | JOB-DUMMY-INV-1 | dimostrate 0/1 | `vendor/bin/pest Modules/Job/tests --group=JOB-DUMMY-INV-1` |
| Schedule\ClearScheduleCacheAction | [clear-schedule-cache-action](clear-schedule-cache-action.md) | `Modules\Job\Actions\Schedule\ClearScheduleCacheAction` | JOB-SCHEDCACHE-INV-1..2 | dimostrate 0/2 | `vendor/bin/pest Modules/Job/tests --group=JOB-SCHEDCACHE-INV-1` |
| ClearScheduleCacheAction (radice, deprecata) | [root-clear-schedule-cache-action](root-clear-schedule-cache-action.md) | `Modules\Job\Actions\ClearScheduleCacheAction` | JOB-SCHEDCACHE-ROOT-INV-1 | dimostrate 0/1 | `vendor/bin/pest Modules/Job/tests --group=JOB-SCHEDCACHE-ROOT-INV-1` |
| Schedule\GetActiveSchedulesAction | [get-active-schedules-action](get-active-schedules-action.md) | `Modules\Job\Actions\Schedule\GetActiveSchedulesAction` | JOB-ACTIVESCHED-INV-1..3 | dimostrate 0/3 | `vendor/bin/pest Modules/Job/tests --group=JOB-ACTIVESCHED-INV-1` |
| GetActiveSchedulesAction (radice, deprecata) | [root-get-active-schedules-action](root-get-active-schedules-action.md) | `Modules\Job\Actions\GetActiveSchedulesAction` | JOB-ACTIVESCHED-ROOT-INV-1 | dimostrate 0/1 | `vendor/bin/pest Modules/Job/tests --group=JOB-ACTIVESCHED-ROOT-INV-1` |
| GetTaskCommandsAction | [get-task-commands-action](get-task-commands-action.md) | `Modules\Job\Actions\GetTaskCommandsAction` | JOB-TASKCMD-INV-1..2 | dimostrate 0/2 | `vendor/bin/pest Modules/Job/tests --group=JOB-TASKCMD-INV-1` |
| GetTaskFrequenciesAction | [get-task-frequencies-action](get-task-frequencies-action.md) | `Modules\Job\Actions\GetTaskFrequenciesAction` | JOB-FREQ-INV-1..2 | dimostrate 2/2 | `vendor/bin/pest Modules/Job/tests --group=JOB-FREQ-INV-1` |
| GetCommandArgumentsActions | [get-command-arguments-actions](get-command-arguments-actions.md) | `Modules\Job\Actions\Command\GetCommandArgumentsActions` | JOB-CMDARGS-INV-1..2 | dimostrate 1/2 | `vendor/bin/pest Modules/Job/tests --group=JOB-CMDARGS-INV-1` |
| GetCommandOptionsActions | [get-command-options-actions](get-command-options-actions.md) | `Modules\Job\Actions\Command\GetCommandOptionsActions` | JOB-CMDOPTS-INV-1..2 | dimostrate 1/2 | `vendor/bin/pest Modules/Job/tests --group=JOB-CMDOPTS-INV-1` |
| GetCommandsAction | [get-commands-action](get-commands-action.md) | `Modules\Job\Actions\Command\GetCommandsAction` | JOB-CMDLIST-INV-1..3 | dimostrate 0/3 | `vendor/bin/pest Modules/Job/tests --group=JOB-CMDLIST-INV-1` |
| GetJobStatusCommandsAction | [get-job-status-commands-action](get-job-status-commands-action.md) | `Modules\Job\Actions\Console\GetJobStatusCommandsAction` | JOB-JSTATCMD-INV-1 | dimostrate 0/1 | `vendor/bin/pest Modules/Job/tests --group=JOB-JSTATCMD-INV-1` |
| GetQueueSubcommandsAction | [get-queue-subcommands-action](get-queue-subcommands-action.md) | `Modules\Job\Actions\Console\GetQueueSubcommandsAction` | JOB-QSUB-INV-1 | dimostrate 0/1 | `vendor/bin/pest Modules/Job/tests --group=JOB-QSUB-INV-1` |
| GetScheduleStatusCommandsAction | [get-schedule-status-commands-action](get-schedule-status-commands-action.md) | `Modules\Job\Actions\Console\GetScheduleStatusCommandsAction` | JOB-SSTATCMD-INV-1 | dimostrate 0/1 | `vendor/bin/pest Modules/Job/tests --group=JOB-SSTATCMD-INV-1` |

Totale: 28 invarianti, 8 dimostrate da un test con group.
