---
title: "Contratto — SendPushToAllUsersAction"
type: contract
action: "Modules\\Notify\\Actions\\Push\\SendPushToAllUsersAction"
module: Notify
status: accepted
tags: [contract, action, notify, push, broadcast]
created: 2026-11-26
updated: 2026-11-26
---

# SendPushToAllUsersAction

Contratto di comportamento (regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`).
Sorgente: `app/Actions/Push/SendPushToAllUsersAction.php`. Prova a inviare a tutti i
token attivi registrati — ma `getAllActiveTokens()` e' uno stub che ritorna `[]`.

## Input

- `PushNotificationData $notification`: titolo, body, icon, ecc.
- `array<string, mixed> $data`: dati aggiuntivi del payload.

## Output

- `array{success: bool, message: string}` se non ci sono token: sempre
  `{success:false, message:'No active tokens found'}` oggi.
- Altrimenti la mappa per piattaforma di `SendPushToDevicesAction::execute()`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| NOTIFY-PUSHALL-INV-1 | `getAllActiveTokens()` ritorna sempre `[]`: l'azione non puo' mai inviare, solo riportare "nessun token". | NOTIFY-PUSHALL-INV-1 |
| NOTIFY-PUSHALL-INV-2 | Con token (futuro), delega integralmente a `SendPushToDevicesAction`. | — (non dimostrato) |
| NOTIFY-PUSHALL-INV-3 | Nessun token attivo → `success=false` con messaggio esplicito, mai eccezione. | — (non dimostrato) |

## Effetti collaterali

- Nessuno oggi: lo stub non legge DB ne' invia.

## Errori

- Nessuna eccezione: il ramo "nessun token" e' un ritorno normale.

## Non fa

- Non registra token: non esiste uno store collegato.
- Non e' un broadcast reale: e' un wrapper pronto per quando `getAllActiveTokens()` sara' implementato.
