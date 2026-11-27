---
title: "Contratto — GetCommandArgumentsActions"
type: contract
action: "Modules\\Job\\Actions\\Command\\GetCommandArgumentsActions"
module: Job
status: accepted
created: 2026-11-24
updated: 2026-11-26
---

# GetCommandArgumentsActions

Sorgente: `app/Actions/Command/GetCommandArgumentsActions.php`. Nome della classe al plurale (`...Actions`): è quello vero, il file del contratto lo segue. Limite noto: nessun chiamante nel codice (`rg` del 2026-11-26).

## Input

- `Symfony\Component\Console\Command\Command $command`.

## Output

- `array<int, array{name: string, default: mixed, required: bool}>`: un elemento per argomento, nell'ordine della definizione.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| JOB-CMDARGS-INV-1 | Un elemento per ogni argomento di `$command->getDefinition()`, con `name`, `default` e `required` presi dall'argomento. | — (non dimostrato) |
| JOB-CMDARGS-INV-2 | Un comando senza argomenti dà `[]`. | `JOB-CMDARGS-INV-2` |
## Effetti collaterali

- Nessuno.

## Errori

- Nessuna eccezione propria.

## Non fa

- Non esegue il comando e non include le opzioni (vedi `GetCommandOptionsActions`).
- Limite noto: il valore `default` è `mixed` perché riflette quello dichiarato dal comando.
