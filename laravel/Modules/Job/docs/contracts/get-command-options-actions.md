---
title: "Contratto — GetCommandOptionsActions"
type: contract
action: "Modules\\Job\\Actions\\Command\\GetCommandOptionsActions"
module: Job
status: accepted
created: 2026-11-24
updated: 2026-11-26
---

# GetCommandOptionsActions

Sorgente: `app/Actions/Command/GetCommandOptionsActions.php`. Limite noto: nessun chiamante nel codice (`rg` del 2026-11-26).

## Input

- `Symfony\Component\Console\Command\Command $command`.

## Output

- `array{withValue: array<int, object>, withoutValue: array<int, string>}`: `withValue` contiene oggetti `{name, default, required}`; `withoutValue` i nomi dei flag.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| JOB-CMDOPTS-INV-1 | `withoutValue` parte sempre da `verbose`, `quiet`, `ansi`, `no-ansi`, anche per un comando senza opzioni. | `JOB-CMDOPTS-INV-1` |
| JOB-CMDOPTS-INV-2 | Un'opzione che non accetta valore (`acceptValue()` falso) va in `withoutValue`; una che lo accetta va in `withValue` con `name`, `default`, `required`. | — (non dimostrato) |
## Effetti collaterali

- Nessuno.

## Errori

- Nessuna eccezione propria.

## Non fa

- Non esegue il comando e non include gli argomenti (vedi `GetCommandArgumentsActions`).
- Limite noto: se l'opzione `verbose` è già nella definizione del comando compare due volte in `withoutValue` (i quattro nomi fissi più quello trovato).
