---
title: "Contratto — Schedule\ClearScheduleCacheAction"
type: contract
action: "Modules\\Job\\Actions\\Schedule\\ClearScheduleCacheAction"
module: Job
status: accepted
created: 2026-11-23
updated: 2026-11-26
---

# Schedule\ClearScheduleCacheAction

Invalida la chiave di cache che `Schedule\GetActiveSchedulesAction` riempie con `rememberForever`. Chiamanti: `app/Observers/ScheduleObserver.php` (riga 65) e `app/Console/Commands/ScheduleClearCacheCommand.php` (riga 30).
È la versione viva; quella nella radice di `app/Actions` è deprecata: [root-clear-schedule-cache-action](root-clear-schedule-cache-action.md). Sorgente: `app/Actions/Schedule/ClearScheduleCacheAction.php`.

## Input

- Nessun parametro. Legge `config('job::cache.store')` e `config('job::cache.key')`.

## Output

- `void`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| JOB-SCHEDCACHE-INV-1 | Cancella solo la chiave `job::cache.key` nello store `job::cache.store` (`Cache::store($store)->forget($key)`), mai `flush`. | — (non dimostrato) |
| JOB-SCHEDCACHE-INV-2 | Se `store` o `key` non sono stringhe in config, `Assert::string` lancia prima di toccare la cache. | — (non dimostrato) |
## Effetti collaterali

- Un `forget` sullo store di cache configurato. Nessun evento, coda o scrittura su database.

## Errori

- `InvalidArgumentException` di `Webmozart\Assert` con messaggio `[riga][classe]` per config non stringa (INV-2).

## Non fa

- Non verifica che il cache store esista e non ricostruisce la cache: al prossimo `GetActiveSchedulesAction` la ricalcola.
- Non dipende da `job::cache.enabled`: svuota anche se la cache è spenta.

## Riconciliazione documentale (2026-11-27)

Questo file aveva un conflitto Git irrisolto. La base è la variante più recente del contratto, con il riferimento a `app/Actions/Schedule/ClearScheduleCacheAction.php` **esistente su `dev`**; la sua semantica, i group Pest citati e gli eventuali effetti non sono stati rieseguiti in questa sessione. Il confronto con il codice e i test resta il gate ECC della story owner. [Tracciamento root #15](https://github.com/laraxot/base_ptvx_fila5/issues/15).

- ID storici nella variante precedente: `JOB-SCHED-CACHE-INV-1` e `JOB-SCHED-CACHE-INV-2`. La nuova variante usa `JOB-SCHEDCACHE-INV-1/2`; verificare la migrazione degli eventuali group di test, non trattare i vecchi ID come prove attive.
