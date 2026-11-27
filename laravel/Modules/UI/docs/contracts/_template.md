---
title: "Contratto — <Classe>"
type: contract
status: proposed
action: <FQCN>
module: UI
updated: YYYY-MM-DD
---

# <operazione> — contratto comportamentale

Regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`. Classe: `<FQCN>`. Riferimento nel codice: `@see docs/contracts/<file>.md` e `@contract docs/contracts/<file>.md` nel docblock della classe.

## Input

- <input e validazione>

## Output

- <risultato osservabile>

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| `<SCOPE>-INV-1` | <regola che deve restare vera> | `<SCOPE>-INV-1` se un test Pest ha `->group('<SCOPE>-INV-1')`, altrimenti «— (non dimostrato)» |

Gli ID sono stabili: un test Pest li usa come `group` (`vendor/bin/pest --group=<SCOPE>-INV-1`).

## Effetti collaterali

- <scritture, eventi, chiamate esterne o nessuno, nell'ordine in cui avvengono>

## Errori

- `<eccezione/status>`: <condizione>

## Non fa

- <confine esplicito del contratto>
