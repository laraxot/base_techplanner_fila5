---
title: "Contratti del modulo Notify"
type: index
tags: [contracts, actions, notify]
created: 2026-11-18
updated: 2026-11-24
---

# Contratti del modulo Notify

Cosa promettono le Action di Notify che parlano con l'esterno o scrivono dati: i due webhook dei fornitori email (esiti Mailjet,
posta in arrivo) e l'invio multicanale da template. Ogni invariante ha un ID `NOTIFY-<OPERAZIONE>-INV-<N>`; con un group Pest
si lancia `vendor/bin/pest Modules/Notify/tests --group=<ID>`, `—` è debito dichiarato.

Quando leggerli: prima di chiamare, modificare o imitare una di queste Action, e prima di aggiungere un fornitore o un canale.
Le interfacce di `app/Contracts` (SMS, Telegram, WhatsApp, push) non hanno ancora un documento qui.
Formato: `Modules/Xot/docs/rules/action-behavioral-contract.md`.

## Contratti

- [HandleMailjetEventsAction](handle-mailjet-events-action.md) — webhook degli esiti Mailjet → evento `MailDeliveryEventReceived`; 4 invarianti, tutte con group.
- [ProcessInboundMailAction](process-inbound-mail-action.md) — webhook della posta in arrivo → `inbound_emails` + `.eml` su disco; 4 invarianti, 1 con group.
- [SendNotificationAction](send-notification-action.md) — invio da template su `mail`, `database`, `sms`; 4 invarianti, debito (test da correggere).
