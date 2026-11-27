---
title: "Contratto — SendPushToPlatformAction"
type: contract
action: "Modules\\Notify\\Actions\\Push\\SendPushToPlatformAction"
module: Notify
status: accepted
tags: [contract, action, notify, push, fcm, apns, webpush]
created: 2026-11-26
updated: 2026-11-26
---

# SendPushToPlatformAction

Contratto di comportamento (regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`).
Sorgente: `app/Actions/Push/SendPushToPlatformAction.php`. Invio push su una piattaforma
(`fcm`, `apns`, `webpush`) per un singolo token.

## Input

- `string $platform`: `fcm` | `apns` | `webpush`.
- `string $token`: device token o topic.
- `PushNotificationData $notification`.
- `array<string, mixed> $data`.

## Output

- `array`: FCM → `{success, message_id, response}`; APNs/WebPush → `{success, message, platform}`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| NOTIFY-PUSHPLAT-INV-1 | Piattaforma sconosciuta → `Exception("Unsupported platform")`. | — (non dimostrato) |
| NOTIFY-PUSHPLAT-INV-2 | FCM: POST a `NotifyConfigData->fcm_url` con `Authorization: key={notify.fcm.server_key}`; `to`, `notification{title,body,icon,sound,badge}`, `data`, `priority`, `ttl` (default `high`/3600). | — (non dimostrato) |
| NOTIFY-PUSHPLAT-INV-3 | FCM risponde 200 con `failure > 0` → `Exception` (il legacy API conferma l'invio anche se rifiutato): `success` e' vero solo se `failure` assente/0. | NOTIFY-PUSHPLAT-INV-3 |
| NOTIFY-PUSHPLAT-INV-4 | `PromiseInterface` in risposta → `->wait()`: mai un promise nudo. | — (non dimostrato) |
| NOTIFY-PUSHPLAT-INV-5 | `apns`/`webpush` non hanno transport: delegano a `LogSimulatedPushDeliveryAction` e ritornano `success:true` con messaggio "simulated". Limite noto: il test prova `success: true`, non il messaggio «simulated». | NOTIFY-PUSHPLAT-INV-5 |

## Effetti collaterali

- FCM: POST HTTP reale. APNs/WebPush: `Log::notice` simulato.

## Errori

- `Exception`: piattaforma sconosciuta, risposta FCM non-`Response`, HTTP non 2xx, `failure > 0`.

## Non fa

- Non aggrega: un solo token, una piattaforma.
- Non invia davvero ad APNs/WebPush: e' simulazione cosciente.
