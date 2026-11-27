---
title: "Contratto — GetJobStatusCommandsAction"
type: contract
action: "Modules\\Job\\Actions\\Console\\GetJobStatusCommandsAction"
module: Job
status: accepted
created: 2026-11-24
updated: 2026-11-26
---

# GetJobStatusCommandsAction

Sorgente: `app/Actions/Console/GetJobStatusCommandsAction.php`. Limite noto: nessun chiamante nel codice (`rg` del 2026-11-26): l'allowlist vera di `JobStatus` è derivata dai pulsanti (`getActs()`, ADR 0001).

## Input

- Nessun parametro.

## Output

- `list<string>`: `queue:clear`, `queue:failed`, `queue:flush`, `queue:prune-batches`, `queue:prune-failed`, `queue:restart`, `queue:retry`, `worker:check`, `route:list`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| JOB-JSTATCMD-INV-1 | L'elenco è costante e contiene solo nomi di comando esatti, senza argomenti né opzioni. | — (non dimostrato) |
## Effetti collaterali

- Nessuno.

## Errori

- Nessuna eccezione propria.

## Non fa

- Non è la whitelist applicata: aggiungere un comando qui non lo abilita nella UI.
