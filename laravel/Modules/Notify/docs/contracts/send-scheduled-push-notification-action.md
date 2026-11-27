---
title: "Contratto — SendScheduledPushNotificationAction"
type: contract
action: "Modules\\Notify\\Actions\\Push\\SendScheduledPushNotificationAction"
module: Notify
status: accepted
tags: [contract, action, notify, push, schedulazione]
created: 2026-11-26
updated: 2026-11-26
---

# SendScheduledPushNotificationAction

Contratto di comportamento (regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`).
Sorgente: `app/Actions/Push/SendScheduledPushNotificationAction.php`. Esegue l'invio di un
push schedulato: legge `scheduled_push:{jobId}` dalla cache e delega a
`SendPushToDevicesAction`. Coppia di `SchedulePushNotificationAction`.

## Input

- `string $jobId`: chiave della entry cache scritta dallo scheduler.

## Output

- `void`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| NOTIFY-SCHEDSEND-INV-1 | Cache mancante → `Log::warning('Scheduled push notification not found')` e ritorno normale, nessun invio. | — (non dimostrato) |
| NOTIFY-SCHEDSEND-INV-2 | Payload malformato (non array, `tokens`/`notification`/`data` non array) → `Assert` fallisce → `Log::error` + `Cache::forget` + rilancio. | — (non dimostrato) |
| NOTIFY-SCHEDSEND-INV-3 | La cache `scheduled_push:{jobId}` e' **sempre** cancellata dopo l'esecuzione, sia in successo sia in errore (una sola esecuzione). | — (non dimostrato) |
| NOTIFY-SCHEDSEND-INV-4 | `tokens` e' filtrato a sole stringhe prima dell'invio; `notification` e' ricostruita via `PushNotificationData::from`. | — (non dimostrato) |
| NOTIFY-SCHEDSEND-INV-5 | `failed()` (hook QueueableAction su fallimento definitivo) logga `Log::error` senza toccare la cache (gia' pulita). | — (non dimostrato) |

## Effetti collaterali

- `Cache::get`/`Cache::forget` su `scheduled_push:{jobId}`.
- Invio push reale via `SendPushToDevicesAction`.
- `Log::debug`/`warning`/`error`.

## Errori

- Eccezione su payload o invio → loggata, cache pulita, eccezione rilanciata
  (il job puo' ritentare secondo la configurazione coda).

## Non fa

- Non schedula: e' solo l'esecutore.
- Non ritenta su cache mancante: un job senza payload e' solo un warning.
