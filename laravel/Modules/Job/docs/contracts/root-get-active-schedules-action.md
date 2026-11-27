---
title: "Contratto — GetActiveSchedulesAction (radice, deprecata)"
type: contract
action: "Modules\\Job\\Actions\\GetActiveSchedulesAction"
module: Job
status: accepted
created: 2026-11-24
updated: 2026-11-26
---

# GetActiveSchedulesAction (radice, deprecata)

Doppione di [get-active-schedules-action](get-active-schedules-action.md) in `app/Actions/GetActiveSchedulesAction.php`, marcato `@deprecated`. Nessun chiamante in `Modules` o `Themes` (`rg` del 2026-11-26). Sorgente: `app/Actions/GetActiveSchedulesAction.php`.

## Input

- Nessun parametro di `execute()`. Il model si risolve nel costruttore da `config('job::model', Schedule::class)`.

## Output

- `Collection<int, Schedule>`: i record con scope `active()`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| JOB-ACTIVESCHED-ROOT-INV-1 | Stesso comportamento della versione `Schedule\` (cache `rememberForever` se `job::cache.enabled`, altrimenti query `active()`), ma con `Schedule::class` come ripiego per `job::model`. | — (non dimostrato) |
## Effetti collaterali

- Con la cache accesa: lettura/scrittura della chiave nello store. Con la cache spenta: una query. Il costruttore risolve il model dal container a ogni istanza.

## Errori

- `InvalidArgumentException` di `Webmozart\Assert` per config o model non validi.

## Non fa

- Non usarla in codice nuovo: la versione viva è `Actions\Schedule\GetActiveSchedulesAction`.
