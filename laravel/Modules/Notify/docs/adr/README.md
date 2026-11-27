---
title: "ADR del modulo Notify"
type: index
tags: [adr, decisioni, notify]
created: 2026-11-18
updated: 2026-11-24
---

# ADR del modulo Notify

Il **perché** delle forme di codice di Notify che un agente rischia di "semplificare": come si autenticano i webhook dei
fornitori email e perché gli esiti delle email escono come evento invece di essere salvati dal modulo.

Quando leggerli: prima di aggiungere un webhook o un fornitore (email, SMS), o di far scrivere al modulo dati che appartengono
al progetto. Formato e regole: `Modules/Xot/docs/rules/action-behavioral-contract.md`.

## Decisioni

- [I webhook in ingresso si autenticano con un token nel percorso](webhooks-authenticate-with-a-token-in-the-path.md) — `hash_equals`, 401 se il token non è configurato, 200 a Mailjet anche per eventi sconosciuti.
- [Gli esiti delle email sono un evento Laravel](mail-delivery-outcomes-are-events.md) — `MailDeliveryEventReceived`, il progetto decide cosa farne.

## Decisioni precedenti (formato libero, non ancora ADR)

- [Consolidamento migrazioni notification_logs](../wiki/decisions/notification-logs-migration-consolidation.md) — lo schema del modello `NotificationLog` vince sulle due migrazioni duplicate.
