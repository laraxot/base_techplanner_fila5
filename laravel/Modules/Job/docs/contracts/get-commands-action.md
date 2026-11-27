---
title: "Contratto — GetCommandsAction"
type: contract
action: "Modules\\Job\\Actions\\Command\\GetCommandsAction"
module: Job
status: accepted
created: 2026-11-24
updated: 2026-11-26
---

# GetCommandsAction

Alimenta il campo comando di `ScheduleForm` (`app/Filament/Resources/ScheduleResource/Schemas/ScheduleForm.php`, righe 40 e 55) e `ScheduleResource`. Sorgente: `app/Actions/Command/GetCommandsAction.php`.

## Input

- Nessun parametro. Legge `Illuminate\Contracts\Console\Kernel::all()`.

## Output

- `DataCollection<int, CommandData>`: un `CommandData` per comando, con `name`, `description`, `signature`, `full_name`, `arguments` e `options`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| JOB-CMDLIST-INV-1 | Un `CommandData` per ogni comando restituito da `kernel->all()`, con indici rinumerati. | — (non dimostrato) |
| JOB-CMDLIST-INV-2 | `options.withValue` contiene tutte le opzioni del comando, flag inclusi: manca il filtro `acceptValue()`. Il nome della chiave è fuorviante. | — (non dimostrato) |
| JOB-CMDLIST-INV-3 | `signature` è uguale a `name`: non include argomenti né opzioni. | — (non dimostrato) |
## Effetti collaterali

- Nessuno: legge il registro dei comandi. Nessuna scrittura o cache.

## Errori

- Nessuna eccezione propria.

## Non fa

- Non filtra i comandi: l'elenco include anche quelli distruttivi. Non è l'allowlist della UI di `JobStatus` (ADR 0001).
- Limite noto: la lista serve a scegliere il comando di uno schedule, quindi un super-admin può programmare qualunque comando registrato; il vincolo sta nei permessi della risorsa, non qui.
