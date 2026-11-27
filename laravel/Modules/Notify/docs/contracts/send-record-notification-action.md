---
title: "Contratto — SendRecordNotificationAction"
type: contract
action: "Modules\\Notify\\Actions\\SendRecordNotificationAction"
module: Notify
status: accepted
tags: [contract, action, notify, record, canali]
created: 2026-11-26
updated: 2026-11-26
---

# SendRecordNotificationAction

Contratto di comportamento (regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`).
Sorgente: `app/Actions/SendRecordNotificationAction.php`. Invia `RecordNotification`
a un singolo record su piu' canali, risolvendo il destinatario da `ChannelEnum`.

## Input

- `Model $record`: il record da notificare (es. cliente); deve esporre i campi che
  `ChannelEnum::getRecipient()` legge.
- `string $mailTemplateSlug`: slug del mail template usato da `RecordNotification`.
- `array<int, ChannelEnum|string> $channels`: canali; valori che non sono `ChannelEnum` sono saltati.

## Output

- `void`: nessun valore di ritorno; i fallimenti sono gestiti dentro i canali.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| NOTIFY-RECORD-INV-1 | La chiave di routing e' `$channelEnum->value` (es. `mail`, `sms`), mai la FQCN del canale custom: `via()` e `SmsChannel::send()` cercano il destinatario sotto quel nome. Limite noto: il test prova solo il canale `mail`. | NOTIFY-RECORD-INV-1 |
| NOTIFY-RECORD-INV-2 | Destinatario assente o vuoto per un canale: quel canale e' saltato, gli altri proseguono. | — (non dimostrato) |
| NOTIFY-RECORD-INV-3 | Elementi di `$channels` che non sono `ChannelEnum` sono ignorati (nessun dispatch). | NOTIFY-RECORD-INV-3 |
| NOTIFY-RECORD-INV-4 | Una sola istanza di `RecordNotification` per record, riusata su tutti i canali validi. | — (non dimostrato) |

## Effetti collaterali

- `Notification::route($canale, $to)->notify($notification)` per ogni canale con destinatario.
- Invii reali verso mail/SMS/etc. secondo i driver configurati.

## Errori

- Nessuna eccezione prevista per input non validi: canali e destinatari non validi sono saltati.
- Errori dei provider propagano dalla facade `Notification` (dipende dal canale).

## Non fa

- Non itera su piu' record: e' il compito di `SendRecordsNotificationAction`.
- Non risolve il mail template: lo fa `RecordNotification` a partire dallo slug.
- Non ritorna esiti: il chiamante non puo' sapere quanti canali sono partiti.
