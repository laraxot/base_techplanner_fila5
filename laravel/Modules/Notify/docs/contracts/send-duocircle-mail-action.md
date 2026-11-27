---
title: "Contratto — SendDuocircleMailAction"
type: contract
action: "Modules\\Notify\\Actions\\Mail\\Engines\\Duocircle\\SendDuocircleMailAction"
module: Notify
status: accepted
tags: [contract, action, notify, mail, duocircle, stub]
created: 2026-11-26
updated: 2026-11-26
---

# SendDuocircleMailAction

Contratto di comportamento (regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`).
Sorgente: `app/Actions/Mail/Engines/Duocircle/SendDuocircleMailAction.php`. Engine mail
Duocircle **non implementato** (WIP): usato dal dispatcher `SendMailAction` con driver `duocircle`.

## Input

- `array<string, mixed> $vars`: le chiavi stringa diventano proprieta' pubbliche
  (`from`, `to`, `body`, `vars` unite a `$this->vars`).

## Output

- Nessuno: il metodo non ritorna mai un valore utile.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| NOTIFY-DUOCIRCLE-INV-1 | L'esecuzione finisce sempre con `RuntimeException('WIP ...')`: nessuna email parte da questo engine. | — (non dimostrato) |
| NOTIFY-DUOCIRCLE-INV-2 | Le proprieta' pubbliche vengono popolate da `$vars` prima del throw (stessa convenzione degli altri engine). | — (non dimostrato) |

## Effetti collaterali

- Nessuno: nessuna chiamata di rete, nessuna scrittura.

## Errori

- `RuntimeException` sempre: e' il comportamento attuale del WIP.

## Non fa

- Non invia email: e' un segnaposto in attesa dell'implementazione Duocircle.
- Non usa la configurazione SMTP: nessun transport viene costruito.
