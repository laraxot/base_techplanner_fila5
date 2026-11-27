---
title: "Contratto — SendAppointmentNotificationAction"
type: contract
action: "Modules\\Notify\\Actions\\SendAppointmentNotificationAction"
module: Notify
status: accepted
tags: [contract, action, notify, appointment, stub]
created: 2026-11-26
updated: 2026-11-26
---

# SendAppointmentNotificationAction

Contratto di comportamento (regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`).
Sorgente: `app/Actions/SendAppointmentNotificationAction.php`. Action **non implementata**:
i modelli del dominio appuntamenti (`Patient`, `Appointment` del progetto ospite) non esistono
in questo modulo, quindi non invia nulla.

## Input

- `Model $appointment`: il record appuntamento (generico `Model`, nessun tipo specifico).
- `string $type`: tipo di notifica (`confermato`, `annullato`, `promemoria`, ...).
- `array<string, mixed> $additionalData`: dati aggiuntivi.

## Output

- `false` sempre: il metodo esce presto perche' i modelli paziente non sono disponibili.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| NOTIFY-APPT-INV-1 | Nessun invio parte da questa Action: il corpo prova a risolvere `Patient::with('user')` (commentato) e ritorna `false` dopo un `Log::debug`. | NOTIFY-APPT-INV-1 |
| NOTIFY-APPT-INV-2 | `$tries = 3` e' dichiarato per la coda, ma senza invio non ha effetto osservabile. | — (non dimostrato) |
| NOTIFY-APPT-INV-3 | Un'eccezione interna non propaga: e' catturata, loggata come `error` e il metodo ritorna `false`. | — (non dimostrato) |

## Effetti collaterali

- `Log::debug('Notification service not fully implemented ...')` a ogni chiamata.
- `Log::error` se l'esecuzione lancia.

## Errori

- Nessuna eccezione esce: tutti gli errori diventano `false` + log.

## Non fa

- Non invia notifiche: e' uno stub dichiarato in attesa dei modelli del progetto ospite.
- Non scrive dati.
- Non e' il punto di invio degli appuntamenti: chi deve notificare usa le Action di `SendNotification*`.
