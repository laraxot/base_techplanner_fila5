---
title: "Contratto — SendPushToDeviceAction"
type: contract
action: "Modules\\Notify\\Actions\\Push\\SendPushToDeviceAction"
module: Notify
status: accepted
tags: [contract, action, notify, push, token]
created: 2026-11-26
updated: 2026-11-26
---

# SendPushToDeviceAction

Contratto di comportamento (regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`).
Sorgente: `app/Actions/Push/SendPushToDeviceAction.php`. Invia a un singolo token su
**tutte** le piattaforme (`fcm`, `apns`, `webpush`) — non deduce la piattaforma.

## Input

- `string $token`: device token.
- `PushNotificationData $notification`.
- `array<string, mixed> $data`.

## Output

- `array<string, array>`: chiave = piattaforma; valore = esito di
  `SendPushToPlatformAction` o `{success:false, error}` su eccezione.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| NOTIFY-PUSHDEV-INV-1 | Prova sempre tutte e 3 le piattaforme (`fcm`, `apns`, `webpush`): non c'e' rilevamento del token. | NOTIFY-PUSHDEV-INV-1 |
| NOTIFY-PUSHDEV-INV-2 | Eccezione su una piattaforma → `{success:false, error}` in quella chiave + `Log::error`; le altre proseguono. | — (non dimostrato) |
| NOTIFY-PUSHDEV-INV-3 | `apns`/`webpush` ritornano sempre `success:true` simulato (nessun transport reale). Limite noto: asserito `success: true` per apns e webpush, non la natura simulata. | NOTIFY-PUSHDEV-INV-3 |

## Effetti collaterali

- FCM: POST HTTP reale. APNs/WebPush: `Log::notice` simulato.
- `Log::error` per piattaforma fallita.

## Errori

- Eccezioni per-piattaforma catturate: non escono mai dall'Action.

## Non fa

- Non deduce la piattaforma dal token (lo fa `SendPushToDevicesAction`).
- Non restituisce un singolo esito: e' una mappa per piattaforma.
