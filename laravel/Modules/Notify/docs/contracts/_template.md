---
type: contract
status: proposed
action: <FQCN>
---

# <operazione> — contratto comportamentale

Classe o superficie: `<FQCN>`  
Sorgente: `app/<path>.php`  
Riferimento nel codice: `@contract docs/contracts/<file>.md`

## Input

- <input e validazione>

## Output

- <risultato osservabile>

## Invarianti

| ID | Regola | Verifica |
|---|---|---|
| `NOTIFY-<AREA>-INV-1` | <regola che deve restare vera> | <test o controllo ripetibile> |

Gli ID sono stabili: un test Pest li usa come `group` (`--group=NOTIFY-<AREA>-INV-1`);
senza test il group resta `—` (debito dichiarato).

## Effetti collaterali

- <scritture, eventi, chiamate esterne o nessuno>

## Errori

- `<eccezione/status>` — <condizione>

## Non fa

- <confine esplicito del contratto>
