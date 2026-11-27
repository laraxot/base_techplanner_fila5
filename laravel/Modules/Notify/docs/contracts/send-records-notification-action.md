---
title: "Contratto — SendRecordsNotificationAction"
type: contract
action: "Modules\\Notify\\Actions\\SendRecordsNotificationAction"
module: Notify
status: accepted
tags: [contract, action, notify, bulk, record]
created: 2026-11-26
updated: 2026-11-26
---

# SendRecordsNotificationAction

Contratto di comportamento (regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`).
Sorgente: `app/Actions/SendRecordsNotificationAction.php`. Versione bulk di
`SendRecordNotificationAction`: compone l'Action singola per ogni record della collection.

## Input

- `Collection<int, Model> $records`: record da notificare (es. clienti selezionati).
- `string $templateSlug`: slug del mail template.
- `array<int, string> $channels`: canali (`mail`, `sms`, `whatsapp`, ...).

## Output

- `SendNotificationBulkResultData` con `successCount`, `errorCount`, `errors`
  (`{record, channel, error}`), `totalProcessed = count($records) * count($channels)`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| NOTIFY-BULK-INV-1 | Ogni record passa da `SendRecordNotificationAction`: nessun invio duplicato o bypass della logica per-canale. | NOTIFY-BULK-INV-1 |
| NOTIFY-BULK-INV-2 | Un record che lancia non ferma il batch: i suoi canali contano tutti come falliti e si prosegue col successivo. | NOTIFY-BULK-INV-2 |
| NOTIFY-BULK-INV-3 | `successCount` cresce di `count($channels)` per record completato senza eccezioni; `errorCount` della stessa quantita' per record fallito. | NOTIFY-BULK-INV-3 |
| NOTIFY-BULK-INV-4 | Il nome del record nei messaggi di errore viene da `name`, poi `company_name`, poi `title`, poi la chiave primaria. Limite noto: i test coprono `name` e la chiave primaria, non `company_name` e `title`. | NOTIFY-BULK-INV-4 |
| NOTIFY-BULK-INV-5 | E' possibile accodarla con `->onQueue(...)`: usa `QueueableAction`. | — (non dimostrato) |

## Effetti collaterali

- Un round di `Notification::route()->notify()` per record e canale con destinatario.
- Invii reali verso i provider configurati.

## Errori

- Eccezione di `SendRecordNotificationAction::execute()` su un record: conteggiata per tutti i
  canali del record, registrata in `errors`, non rilanciata.

## Non fa

- Non valida i canali: un canale senza destinatario viene saltato dentro l'Action singola.
- Non deduplica record: la collection e' iterata cosi' com'e'.
- Non e' atomica: i record precedenti a un fallimento restano inviati.
