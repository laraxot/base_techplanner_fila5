---
title: "Contratto — FormatSmsMessageAction"
type: contract
action: "Modules\\Notify\\Actions\\SMS\\FormatSmsMessageAction"
module: Notify
status: accepted
tags: [contract, action, notify, sms, formato, sanitizzazione]
created: 2026-11-26
updated: 2026-11-26
---

# FormatSmsMessageAction

Contratto di comportamento (regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`).
Sorgente: `app/Actions/SMS/FormatSmsMessageAction.php`. Sanitizza gli accenti e calcola
conteggio caratteri e numero di SMS per un messaggio.

## Input

- `string $message`: testo grezzo.

## Output

- `[0] string`: messaggio formattato (accents sostituiti).
- `[1] int`: conteggio caratteri con i caratteri speciali contati doppio.
- `[2] int`: numero di SMS (`1` se <=160 caratteri, altrimenti `ceil(count/153)`).

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| NOTIFY-FORMAT-INV-1 | Gli accenti (`àèéìòù`, maiuscoli e `€`) sono sempre sostituiti con le varianti ASCII (`a'`, `EUR`, ...). Limite noto: asserita la sola sostituzione `à` → `a'`. | NOTIFY-FORMAT-INV-1 |
| NOTIFY-FORMAT-INV-2 | I caratteri `^ { } [ ] ~ \ |` contano doppio nel conteggio (costo GSM). | — (non dimostrato) |
| NOTIFY-FORMAT-INV-3 | Soglia SMS singolo: `<=160` → 1 SMS; oltre → concatenati da 153 con `ceil`. Limite noto: asserito 1 SMS per 13 caratteri e più di uno per 200; la soglia esatta e il calcolo con 153 non sono asserite. | NOTIFY-FORMAT-INV-3 |
| NOTIFY-FORMAT-INV-4 | È una funzione pura: nessun effetto collaterale, stesso input → stesso output. | — (non dimostrato) |

## Effetti collaterali

- Nessuno.

## Errori

- Nessuna eccezione prevista: `preg_split` su stringa qualunque.

## Non fa

- Non tronca il messaggio: restituisce conteggio e SMS, non il testo tagliato.
- Non invia: e' un utility di formattazione.
- Non gestisce encoding non-UTF8: lavora su stringhe PHP.
