---
title: "Contratto — NotificationManager"
type: contract
action: "Modules\\Notify\\Actions\\NotificationManager"
module: Notify
status: accepted
tags: [contract, action, notify, orchestrazione, template]
created: 2026-11-26
updated: 2026-11-26
---

# NotificationManager

Contratto di comportamento (regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`).
Sorgente: `app/Actions/NotificationManager.php`. Facade di convenienza sopra
`SendNotificationAction`: non risolve piu' il template da se' (una sola query, nell'Action).

## Input

- `Model $recipient`: destinatario Eloquent.
- `string $templateCode`: `code` di un `NotificationTemplate` attivo.
- `array $data`: dati per il template.
- `list<string> $channels`: canali; vuoto = quelli del template.
- `array $options`: opzioni di invio.

`sendMultiple()` accetta `array<int, Model> $recipients` oltre agli stessi parametri.

## Output

- `send()`/`execute()`: il `Notification` persistito dal canale `database` o `null`
  (template soppresso da `shouldSend` o nessun record).
- `sendMultiple()`: `list<Notification>` coi soli invii che hanno prodotto un record;
  i non-`Model` in input sono ignorati in silenzio.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| NOTIFY-MANAGER-INV-1 | La risoluzione del template avviene una volta sola, dentro `SendNotificationAction`: `NotificationManager` non esegue query sul template. | — (non dimostrato) |
| NOTIFY-MANAGER-INV-2 | `execute()` e' delega esatta di `send()` con gli stessi argomenti (entry point QueueableAction). | — (non dimostrato) |
| NOTIFY-MANAGER-INV-3 | `sendMultiple()` non si ferma su un destinatario fallito: continua con i restanti e raccoglie solo i `Notification` prodotti. | — (non dimostrato) |
| NOTIFY-MANAGER-INV-4 | I metodi di sola lettura (`getTemplate`, `getTemplatesByCategory`, `getTemplatesByChannel`) filtrano sempre `is_active = true`. | — (non dimostrato) |

## Effetti collaterali

- Quelli di `SendNotificationAction` per ogni destinatario (invii, insert `notifications`, log).

## Errori

- `NotificationTemplateNotFoundException` (da `SendNotificationAction`) se il template manca o e' inattivo.
- Le eccezioni per-canale restano dentro `SendNotificationAction` (loggate, non rilanciate).

## Non fa

- Non invia da solo: orchestra `SendNotificationAction`.
- Non aggrega statistiche: `getTemplateStats()`/`getRecipientStats()` sono stati rimossi.
- Non valida i destinatari di `sendMultiple()` oltre al check `instanceof Model`.
