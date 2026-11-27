---
title: "Indice degli ADR — Notify"
type: index
module: Notify
status: active
updated: 2026-11-26
---

# Indice degli ADR — Notify

| ADR | Stato | Perché | Conferma |
|---|---|---|---|
| [0001-mail-delivery-outcomes-are-events](0001-mail-delivery-outcomes-are-events.md) | accepted | Gli esiti delle email sono un evento Laravel (`MailDeliveryEventReceived`): il modulo non scrive nulla. | Sì: `--group=NOTIFY-MAILJET-INV-2`, `-3` |
| [0002-notify-config-is-centralized](0002-notify-config-is-centralized.md) | accepted | `env()` solo in `laravel/config`; il config del modulo è `notify.notify.<chiave>`; impostazioni per tenant in `NotifyConfigData`. | Sì: `NotifyConfigDataTest.php` e review con `rg`; Stato attuale con 3 scarti |
| [0003-notify-owns-delivery-contract](0003-notify-owns-delivery-contract.md) | proposed | Notify possiede l'orchestrazione della consegna (template, canali, errori); le rotte web non hanno UI. | Parziale: `--group=NOTIFY-SEND-INV-1`, `NOTIFY-RECIPIENT-INV-1..3`; due test obsoleti (Stato attuale) |
| [0004-webhooks-authenticate-with-a-token-in-the-path](0004-webhooks-authenticate-with-a-token-in-the-path.md) | accepted | I webhook in ingresso si autenticano con un token segreto nel percorso (fail-closed). | Sì: `--group=NOTIFY-MAILJET-INV-1`, `-4`, `NOTIFY-INBOUND-INV-1` |

Formato e regole: [README](README.md).
