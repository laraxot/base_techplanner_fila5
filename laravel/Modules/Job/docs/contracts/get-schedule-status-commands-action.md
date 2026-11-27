---
title: "Contratto — GetScheduleStatusCommandsAction"
type: contract
action: "Modules\\Job\\Actions\\Console\\GetScheduleStatusCommandsAction"
module: Job
status: accepted
created: 2026-11-24
updated: 2026-11-26
---

# GetScheduleStatusCommandsAction

Sorgente: `app/Actions/Console/GetScheduleStatusCommandsAction.php`. Limite noto: nessun chiamante nel codice (`rg` del 2026-11-26).

## Input

- Nessun parametro.

## Output

- `list<string>`: `job:schedule-list`, `schedule:clear-cache`, `schedule:list`, `schedule:run`, `schedule:test`, `schedule:work`, `schedule-monitor:sync`, `schedule-monitor:list`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| JOB-SSTATCMD-INV-1 | L'elenco è costante e contiene solo nomi di comando esatti, senza argomenti né opzioni. | — (non dimostrato) |
## Effetti collaterali

- Nessuno.

## Errori

- Nessuna eccezione propria.

## Non fa

- Non è la whitelist applicata da `ScheduleStatusWidget`, che ha un controllo proprio (debito in ADR 0001).
- Limite noto: l'elenco di questa Action contiene `schedule:work`, che `ScheduleStatusWidget::getAllowedCommands()` non ha (7 voci contro 8): le due liste sono già divergenti.
