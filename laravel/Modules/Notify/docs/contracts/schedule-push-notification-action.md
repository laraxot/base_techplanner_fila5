---
title: "Contratto — SchedulePushNotificationAction"
type: contract
action: "Modules\\Notify\\Actions\\Push\\SchedulePushNotificationAction"
module: Notify
status: accepted
tags: [contract, action, notify, push, schedulazione, cache]
created: 2026-11-26
updated: 2026-11-26
---

# SchedulePushNotificationAction

Contratto di comportamento (regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`).
Sorgente: `app/Actions/Push/SchedulePushNotificationAction.php`. Programma un invio push
futuro: salva il payload in cache e accoda `SendScheduledPushNotificationAction` con delay.

## Input

- `array $tokens`: lista device token.
- `PushNotificationData $notification`.
- `array<string, mixed> $data`.
- `DateTime $scheduleTime`: istante di esecuzione.

## Output

- `string $jobId`: id univoco `push_{uniqid}` usato come chiave cache e argomento del job.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| NOTIFY-PUSHSCHED-INV-1 | La cache `scheduled_push:{jobId}` contiene `tokens`, `notification->toArray()`, `data`, `schedule_time` (timestamp) e scade a `$scheduleTime`. | — (non dimostrato) |
| NOTIFY-PUSHSCHED-INV-2 | Il job e' `ActionJob(SendScheduledPushNotificationAction, [$jobId])` con `->delay($scheduleTime)`: stesso istante della cache. | — (non dimostrato) |
| NOTIFY-PUSHSCHED-INV-3 | `$jobId` e' univoco per chiamata (`uniqid('push_', true)`). | — (non dimostrato) |

## Effetti collaterali

- `Cache::put` con TTL = scheduleTime.
- Dispatch di un `ActionJob` in coda ritardata.

## Errori

- Errori di cache/dispatch propagano al chiamante.

## Non fa

- Non invia subito: il push parte solo quando il job esegue `SendScheduledPushNotificationAction`.
- Non valida `$scheduleTime`: un istante nel passato produce un job immediato e cache gia' scaduta.
