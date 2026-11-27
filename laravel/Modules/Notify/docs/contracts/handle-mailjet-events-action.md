---
title: "Contratto — HandleMailjetEventsAction"
type: contract
action: "Modules\\Notify\\Actions\\Mail\\Mailjet\\HandleMailjetEventsAction"
module: Notify
status: accepted
tags: [contract, action, notify, mailjet, webhook, eventi]
created: 2026-11-26
updated: 2026-11-26
related:
  - ../adr/0001-mail-delivery-outcomes-are-events.md
  - ../adr/0004-webhooks-authenticate-with-a-token-in-the-path.md
---

# HandleMailjetEventsAction

Contratto di comportamento (regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`).
Sorgente: `app/Actions/Mail/Mailjet/HandleMailjetEventsAction.php`. Webhook degli esiti Mailjet
(`POST /api/notify/mailjet/events/{token}`): traduce ogni evento in `MailDeliveryEventData` e
lancia `MailDeliveryEventReceived`; non scrive nulla.

## Input

- `Request $request`: body JSON, un evento singolo oppure una lista (raggruppamento Mailjet).
- `string $token`: segmento del percorso, confrontato con `notify.notify.mailjet_webhook_token`.

## Output

- `JsonResponse`: `401 {"error":"unauthorized"}` se il token non coincide o non e' configurato;
  `200 {"handled": N}` altrimenti, con `N` = eventi validi gestiti (quelli ignoti non contano).

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| NOTIFY-MAILJET-INV-1 | Token errato, mancante o non configurato → 401 per tutti (`hash_equals`, niente fallback). | NOTIFY-MAILJET-INV-1 |
| NOTIFY-MAILJET-INV-2 | Ogni evento con `event` in `sent,delivered,open,click,bounce,blocked,spam,unsub` e `email` non vuota produce esattamente un `MailDeliveryEventReceived` con `provider='mailjet'`. | NOTIFY-MAILJET-INV-2 |
| NOTIFY-MAILJET-INV-3 | `permanent` e' vero solo per `blocked`, `spam`, `unsub` e per `bounce` con `hard_bounce === true`; i permanenti finiscono anche in `Log::warning('notify.mailjet.permanent_failure')`. | NOTIFY-MAILJET-INV-3 |
| NOTIFY-MAILJET-INV-4 | Eventi sconosciuti, malformati o non-array → 200 lo stesso: Mailjet sospende l'URL se riceve errori. | NOTIFY-MAILJET-INV-4 |

## Effetti collaterali

- `MailDeliveryEventReceived::dispatch($event)` per evento valido (il progetto ascolta).
- `Log::warning` per gli esiti permanenti.
- Nessuna scrittura su database.

## Errori

- `401` — token assente/invalido o `mailjet_webhook_token` non configurato.
- Nessun altro errore HTTP: i payload non interpretabili sono saltati.

## Non fa

- Non scrive tabelle: il modulo e' agnostico (vedi ADR 0001).
- Non deduplica eventi ritrasmessi da Mailjet.
- Non valida la firma del fornitore: l'autenticazione e' il token nel percorso (ADR 0004).
