---
title: "HandleMailjetEventsAction — contratto"
type: contract
owner: Notify
status: accepted
updated: 2026-11-24
action: "Modules\\Notify\\Actions\\Mail\\Mailjet\\HandleMailjetEventsAction"
qmd: "HandleMailjetEventsAction webhook Mailjet eventi bounce click open spam unsub MailDeliveryEventReceived token"
---

# HandleMailjetEventsAction

Webhook Mailjet: valida il token nel path, normalizza gli eventi e li rilancia come `MailDeliveryEventReceived`.

## Input

- `Request $request`: JSON con uno o piu' eventi.
- `string $token`: dal path, confrontato con `config('notify.notify.mailjet_webhook_token')`.

## Output

- `JsonResponse`: `401 {error: unauthorized}` oppure `200 {handled: n}`.

## Invarianti

- `NOTIFY-MJEVENTS-INV-1`: token mancante in config, vuoto o diverso risponde `401`. Test: nessuno dedicato verificato.
- `NOTIFY-MJEVENTS-INV-2`: sono accettati solo i tipi `sent`, `delivered`, `open`, `click`, `bounce`, `blocked`, `spam`, `unsub`; gli altri e gli item senza `email` vengono saltati. Test: nessuno.
- `NOTIFY-MJEVENTS-INV-3`: `permanent` vale `true` per `blocked`, `spam`, `unsub` e per `bounce` con `hard_bounce = true`. Per `permanent` si logga `notify.mailjet.permanent_failure`. Test: nessuno.
- `NOTIFY-MJEVENTS-INV-4`: `time` numerico (o stringa di sole cifre) diventa la data dell'evento, altrimenti `now()`. Test: nessuno.
- `NOTIFY-MJEVENTS-INV-5`: `handled` conta gli eventi per cui e' stato lanciato `MailDeliveryEventReceived::dispatch`.

## Effetti collaterali

- `Log::warning` per eventi permanenti.
- `MailDeliveryEventReceived::dispatch` per ogni evento valido (i listener decidono le scritture).

## Errori

- Nessuna eccezione propria: payload non valido viene ignorato silenziosamente.

## Non fa

- Non verifica la firma dei webhook Mailjet: solo il token nel path.
- Non scrive direttamente su DB (lo fanno i listener, non letti qui).
