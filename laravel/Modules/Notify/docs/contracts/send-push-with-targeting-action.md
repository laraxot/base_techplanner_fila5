---
title: "Contratto — SendPushWithTargetingAction"
type: contract
action: "Modules\\Notify\\Actions\\Push\\SendPushWithTargetingAction"
module: Notify
status: accepted
tags: [contract, action, notify, push, targeting, stub]
created: 2026-11-26
updated: 2026-11-26
---

# SendPushWithTargetingAction

Contratto di comportamento (regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`).
Sorgente: `app/Actions/Push/SendPushWithTargetingAction.php`. Invio push ai token che
soddisfano `PushCriteriaData` — la risoluzione e' un **stub**: ritorna sempre `[]`.

## Input

- `PushCriteriaData $criteria`: criteri di targeting (`platform` ecc.).
- `PushNotificationData $notification`.
- `array<string, mixed> $data`.

## Output

- `array{success:false, message:'No tokens found matching criteria'}` sempre oggi.
- Altrimenti la mappa di `SendPushToDevicesAction` (se i criteri risolvessero token).

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| NOTIFY-PUSHTGT-INV-1 | `getTokensByCriteria()` ritorna sempre `[]`: nessun token viene mai risolto, nessun invio parte. | NOTIFY-PUSHTGT-INV-1 |
| NOTIFY-PUSHTGT-INV-2 | `platform` non in `fcm|apns|webpush` → `Log::warning` "piattaforma non supportata"; altrimenti `Log::notice` "nessuno store collegato". | NOTIFY-PUSHTGT-INV-2 |
| NOTIFY-PUSHTGT-INV-3 | Se un giorno risolvesse token, delega a `SendPushToDevicesAction` (raggruppamento per piattaforma). | — (non dimostrato) |

## Effetti collaterali

- Solo log (`warning`/`notice`): nessuna scrittura, nessun invio.

## Errori

- Nessuna eccezione: il ramo "nessun token" e' un ritorno normale.

## Non fa

- Non esiste uno store device-token collegato: e' un placeholder dichiarato.
- Non distingue i due motivi di insuccesso per il chiamante (solo per il log).
