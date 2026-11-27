---
title: "Contratto — PurgeExpiredContactMessagesAction"
type: contract
action: "Modules\TechPlanner\Actions\Contact\PurgeExpiredContactMessagesAction"
tags: [contract, action, contatti, retention, gdpr]
created: 2026-11-24
updated: 2026-11-24
---

# PurgeExpiredContactMessagesAction

Sorgente: `app/Actions/Contact/PurgeExpiredContactMessagesAction.php`. Comando: `techplanner:contact-messages:purge {--dry-run}`.
Perché: [ADR](../adr/contact-form-archive-then-forward.md).

## Input

- `bool $dryRun`: conta senza cancellare.
- Config `techplanner.contact.retention_days` (variabile `TECHPLANNER_CONTACT_RETENTION_DAYS`).

## Output

- `?int`: messaggi scaduti cancellati (o contati con `$dryRun`); `null` se la retention non è configurata.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| TP-CONTACT-PURGE-INV-1 | Retention vuota, non numerica o < 1 = inerte: ritorna `null` e non cancella nulla. | `TP-CONTACT-PURGE-INV-1` |
| TP-CONTACT-PURGE-INV-2 | Una retention numerica positiva si legge come intero di giorni. | `TP-CONTACT-PURGE-INV-2` |
| TP-CONTACT-PURGE-INV-3 | Cancella solo i messaggi con `created_at` più vecchio di `now() - retention_days`. | — |

## Effetti collaterali

- `DELETE` su `contact_messages` (solo senza `$dryRun`).

## Errori

- Errori del database si propagano al comando.

## Non fa

- Non è schedulata: si pianifica solo dopo la decisione del titolare sul periodo.
- Non ha un default di retention, volutamente.
- Non anonimizza: cancella.
