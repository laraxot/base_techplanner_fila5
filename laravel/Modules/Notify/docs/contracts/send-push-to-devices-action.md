---
title: "Contratto — SendPushToDevicesAction"
type: contract
action: "Modules\\Notify\\Actions\\Push\\SendPushToDevicesAction"
module: Notify
status: accepted
tags: [contract, action, notify, push, batch]
created: 2026-11-26
updated: 2026-11-26
---

# SendPushToDevicesAction

Contratto di comportamento (regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`).
Sorgente: `app/Actions/Push/SendPushToDevicesAction.php`. Invia a piu' token raggruppati
per piattaforma (rilevata dal formato del token) e li processa uno a uno.

## Input

- `array $tokens`: lista di device token.
- `PushNotificationData $notification`.
- `array<string, mixed> $data`.

## Output

- `array<string, array>`: chiave = piattaforma; valore = `{success, sent, failed, total,
  results}` o `{success:false, error, sent:0, failed:N}` su eccezione batch.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| NOTIFY-PUSHBATCH-INV-1 | Piattaforma dedotta da `detectPlatform`: 64 char hex → `apns`; >100 char con `:` → `fcm`; altrimenti `webpush`. | — (non dimostrato) |
| NOTIFY-PUSHBATCH-INV-2 | I token sono inviati **uno a uno** via `SendPushToPlatformAction` (non c'e' multicast HTTP): `sent`/`failed` contano i risultati. | — (non dimostrato) |
| NOTIFY-PUSHBATCH-INV-3 | `success` di piattaforma = `failed === 0`; un token fallito non ferma gli altri. | — (non dimostrato) |
| NOTIFY-PUSHBATCH-INV-4 | Eccezione a livello batch → `{success:false, sent:0, failed:count(tokens)}` + `Log::error`. | — (non dimostrato) |

## Effetti collaterali

- Chiamate HTTP FCM per ogni token `fcm`; log simulato per `apns`/`webpush`.
- `Log::error` su fallimenti.

## Errori

- Eccezioni per-token catturate in `results[]`; eccezione batch catturata in piattaforma.

## Non fa

- Non usa multicast FCM: e' N richieste HTTP.
- Non valida i token: un token malformato va a `webpush` di default.
