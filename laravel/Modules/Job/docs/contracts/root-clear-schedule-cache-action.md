---
title: "Contratto — ClearScheduleCacheAction (radice, deprecata)"
type: contract
action: "Modules\\Job\\Actions\\ClearScheduleCacheAction"
module: Job
status: accepted
created: 2026-11-24
updated: 2026-11-26
---

# ClearScheduleCacheAction (radice, deprecata)

Doppione di [clear-schedule-cache-action](clear-schedule-cache-action.md) in `app/Actions/ClearScheduleCacheAction.php`, marcato `@deprecated` nel docblock. Nessun chiamante di produzione
(`ScheduleObserver` e `ScheduleClearCacheCommand` usano la versione `Actions\Schedule`, verificato con `rg` il 2026-11-26): resta su disco in attesa di autorizzazione a cancellarlo.

## Input

- Nessun parametro. Legge `config('job::cache.store')` e `config('job::cache.key')`.

## Output

- `void`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| JOB-SCHEDCACHE-ROOT-INV-1 | Stesso comportamento della versione `Schedule\`: `forget` della chiave `job::cache.key` sullo store `job::cache.store`, `Assert::string` su entrambi. | — (non dimostrato) |
## Effetti collaterali

- Un `forget` sullo store di cache configurato.

## Errori

- `InvalidArgumentException` di `Webmozart\Assert` per config non stringa.

## Non fa

- Non usarla in codice nuovo: i chiamanti vanno su `Actions\Schedule\ClearScheduleCacheAction`.
