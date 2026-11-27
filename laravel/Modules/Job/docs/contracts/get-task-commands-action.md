---
title: "Contratto — GetTaskCommandsAction"
type: contract
action: "Modules\\Job\\Actions\\GetTaskCommandsAction"
module: Job
status: accepted
created: 2026-11-24
updated: 2026-11-26
---

# GetTaskCommandsAction

Sorgente: `app/Actions/GetTaskCommandsAction.php`. Limite noto: nessun chiamante nel codice (solo `Modules/Job/README.md` la cita; `rg` del 2026-11-26).

## Input

- Nessun parametro. Legge `Artisan::all()`.

## Output

- `Collection<int, Command>`: tutti i comandi registrati, ordinati per nome, con indici rinumerati.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| JOB-TASKCMD-INV-1 | I comandi senza `:` nel nome vengono prima, poi quelli con namespace, tutti in ordine di nome (chiave di ordinamento `':'.$name` per i primi). | — (non dimostrato) |
| JOB-TASKCMD-INV-2 | Un elemento che non è un `Command` o senza nome fa lanciare `Assert`. | — (non dimostrato) |
## Effetti collaterali

- Nessuno: legge solo il registro dei comandi.

## Errori

- `InvalidArgumentException` di `Webmozart\Assert` (INV-2).

## Non fa

- Non filtra i comandi pericolosi e non è l'allowlist della UI: quella è `AssertAllowedArtisanCommandAction`.
