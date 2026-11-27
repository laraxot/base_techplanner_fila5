---
title: "Contratto — Schedule\GetActiveSchedulesAction"
type: contract
action: "Modules\\Job\\Actions\\Schedule\\GetActiveSchedulesAction"
module: Job
status: accepted
created: 2026-11-24
updated: 2026-11-26
---

# Schedule\GetActiveSchedulesAction

Versione viva; quella nella radice è deprecata: [root-get-active-schedules-action](root-get-active-schedules-action.md). Sorgente: `app/Actions/Schedule/GetActiveSchedulesAction.php`.
Limite noto: nessun chiamante in `Modules` o `Themes` fuori dalle Action stesse (`rg` del 2026-11-26).

## Input

- Nessun parametro. Legge `config('job::cache.enabled')`, `config('job::cache.store')`, `config('job::cache.key')` e `config('job::model')`.

## Output

- `Collection<int, Schedule>`: i record con scope `active()`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| JOB-ACTIVESCHED-INV-1 | Con `job::cache.enabled` falso fa sempre la query `active()->get()` sul model configurato. | — (non dimostrato) |
| JOB-ACTIVESCHED-INV-2 | Con la cache accesa il risultato è memorizzato per sempre (`rememberForever`) sotto `job::cache.key`; resta valido finché `ClearScheduleCacheAction` non lo cancella. Se la cancellazione manca, un task disattivato resta in elenco. | — (non dimostrato) |
| JOB-ACTIVESCHED-INV-3 | `config('job::model')` deve essere una stringa che risolve a un `Schedule`, altrimenti `Assert` lancia (nessun valore di ripiego). | — (non dimostrato) |
## Effetti collaterali

- Con la cache accesa: lettura e, al primo uso, scrittura della chiave nello store di cache. Con la cache spenta: una query sul database. Nessun evento o coda.

## Errori

- `InvalidArgumentException` di `Webmozart\Assert` per `job::model`, store o key non validi (INV-3).

## Non fa

- Non filtra per orario né esegue i task.
- Non invalida la cache: lo fa `Schedule\ClearScheduleCacheAction`, chiamata da `ScheduleObserver`.
