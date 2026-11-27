---
title: "Contratto — SendNotificationAction"
type: contract
action: "Modules\\Notify\\Actions\\SendNotificationAction"
module: Notify
status: accepted
tags: [contract, action, notify, template, canali]
created: 2026-11-26
updated: 2026-11-26
---

# SendNotificationAction

Contratto di comportamento (regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`).
Sorgente: `app/Actions/SendNotificationAction.php`. Unico orchestratore di invio da template su piu'
canali (`mail`, `database`, `sms`); `NotificationManager` e i consumer lo delegano a lui.

## Input

- `Model $recipient`: destinatario Eloquent; deve esporre i metodi di routing del canale
  (`routeNotificationForMail`, `routeNotificationForSms`) per `mail`/`sms`.
- `string $templateCode`: `code` di un `NotificationTemplate` attivo.
- `array $data`: dati per compilare il template.
- `array $channels`: canali da usare; se vuoto si usano quelli del template.
- `array $options`: opzioni passate alla `GenericNotification` (per `mail` si fondono con `text_view`).

## Output

- Il primo `Notification` (modello) persistito dal canale `database`, oppure `null` se il template
  non va inviato o nessun canale ha prodotto un record.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| NOTIFY-SEND-INV-1 | Il template si risolve per `code` + `is_active = true`; se assente o inattivo parte `NotificationTemplateNotFoundException` e non si invia nulla. Limite noto: provato il template assente (`NotificationManagerTest`, classe e messaggio); il caso `is_active = false` non è coperto. | NOTIFY-SEND-INV-1 |
| NOTIFY-SEND-INV-2 | Se `NotificationTemplate::shouldSend($data)` e' falso l'Action ritorna `null` senza toccare nessun canale. Limite noto: `SendNotificationActionTest` («returns false when template should not send») si aspetta `false` ma l'Action ritorna `null`: il test è obsoleto e non prova la regola. | — (non dimostrato) |
| NOTIFY-SEND-INV-3 | Un canale che fallisce non interrompe gli altri: l'eccezione e' loggata (`Log::error`) e il ciclo continua. | — (non dimostrato) |
| NOTIFY-SEND-INV-4 | Canale sconosciuto: `sendViaChannel` lancia `Exception("Canale X non supportato")`, catturata e loggata come INV-3. | — (non dimostrato) |
| NOTIFY-SEND-INV-5 | Il canale `database` scrive sempre una riga `notifications` con `channels = ['database']`, `status = SENT`, `sent_at = now()` e `data` con subject, body, `template_code`, `template_id`, `payload`, `options`. Limite noto: `SendNotificationActionTest` («dispatches database notification») si aspetta `true` e `GenericNotification`, ma il canale `database` ritorna il modello salvato: il test è obsoleto e non prova la regola. | — (non dimostrato) |

## Effetti collaterali

- Canale `mail`: `GenericNotification` via `Notification` facade (o `$recipient->notify()` se esiste).
- Canale `sms`: idem con messaggio testuale (max 320 caratteri, troncato a 317 + `...`).
- Canale `database`: `INSERT` su `notifications`.
- `Log::error` per ogni canale fallito.

## Errori

- `NotificationTemplateNotFoundException`: template mancante o inattivo (prima di ogni invio).
- Eccezioni per canale (destinatario senza routing, email/telefono vuoto, canale non supportato):
  catturate e loggate, non rilanciate.

## Non fa

- Non risolve il destinatario: il chiamante passa il model.
- Non supporta `whatsapp`, `telegram`, `push`: solo `mail`, `database`, `sms`.
- Non e' idempotente: una seconda chiamata invia di nuovo.
