---
title: "Contratto — DummyAction"
type: contract
action: "Modules\\Job\\Actions\\DummyAction"
module: Job
status: accepted
created: 2026-11-24
updated: 2026-11-26
---

# DummyAction

Azione di prova per vedere un job in coda: `app/Filament/Widgets/JobStatusWidget.php` (riga 175) e `app/Http/Livewire/Job/Status.php` (riga 204) la lanciano con
`app(DummyAction::class)->onQueue()->execute()`. Sorgente: `app/Actions/DummyAction.php`.

## Input

- Nessuno.

## Output

- `void`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| JOB-DUMMY-INV-1 | `execute()` stampa `hello` più `PHP_EOL` su stdout e non fa altro: nessuna scrittura su database, cache, file o servizi esterni. | — (non dimostrato) |
## Effetti collaterali

- `echo 'hello'.PHP_EOL` sul processo che esegue l'Action (il worker, se lanciata con `onQueue()`).

## Errori

- Nessuna eccezione propria.

## Non fa

- Non è una Action di dominio: non va imitata né estesa.
- Limite noto: il worker avviato da `worker:check` ha stdout su `/dev/null` (vedi `BuildQueueWorkerCommandAction`), quindi l'`hello` di un job eseguito da quel worker non si vede da nessuna parte.
