---
title: "Contratto — SendPushToTopicAction"
type: contract
action: "Modules\\Notify\\Actions\\Push\\SendPushToTopicAction"
module: Notify
status: accepted
tags: [contract, action, notify, push, topic]
created: 2026-11-26
updated: 2026-11-26
---

# SendPushToTopicAction

Contratto di comportamento (regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`).
Sorgente: `app/Actions/Push/SendPushToTopicAction.php`. Invia a un topic su tutte le
piattaforme; solo FCM ha topic reale, APNs/WebPush sono simulati.

## Input

- `string $topic`: nome del topic FCM.
- `PushNotificationData $notification`.
- `array<string, mixed> $data`.

## Output

- `array<string, array>`: chiave = piattaforma; FCM → `{success, message_id, topic}`;
  APNs/WebPush → `{success, message, topic, platform}` simulati.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| NOTIFY-PUSHTOPIC-INV-1 | Prova sempre `fcm`, `apns`, `webpush`: eccezione su una → `{success:false, error}` + log, le altre proseguono. | — (non dimostrato) |
| NOTIFY-PUSHTOPIC-INV-2 | FCM usa `to: "/topics/{topic}"` sullo stesso endpoint/key di `SendPushToPlatformAction`. | — (non dimostrato) |
| NOTIFY-PUSHTOPIC-INV-3 | APNs/WebPush non hanno pub/sub: la consegna e' simulata via `LogSimulatedPushDeliveryAction` (nessuna tabella sottoscrizioni esiste). | NOTIFY-PUSHTOPIC-INV-3 |
| NOTIFY-PUSHTOPIC-INV-4 | Piattaforma sconosciuta nel match → `Exception` (mai raggiunta: lista fissa). | — (non dimostrato) |

## Effetti collaterali

- FCM: POST HTTP reale. APNs/WebPush: `Log::notice` simulato.
- `Log::error` su fallimento per piattaforma.

## Errori

- Eccezioni per-piattaforma catturate in `results[platform]`; HTTP FCM errato → eccezione gestita.

## Non fa

- Non gestisce sottoscrizioni: FCM topic e' solo un alias server-side.
- Non valida il nome del topic.
