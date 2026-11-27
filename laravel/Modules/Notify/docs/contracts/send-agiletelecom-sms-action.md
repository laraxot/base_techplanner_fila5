---
title: "Contratto — SendAgiletelecomSMSAction"
type: contract
action: "Modules\\Notify\\Actions\\SMS\\SendAgiletelecomSMSAction"
module: Notify
status: accepted
tags: [contract, action, notify, sms, agiletelecom]
created: 2026-11-26
updated: 2026-11-26
---

# SendAgiletelecomSMSAction

Contratto di comportamento (regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`).
Sorgente: `app/Actions/SMS/SendAgiletelecomSMSAction.php`. Implementa `SmsActionContract`:
delega integralmente a `SendAgiletelecomSMSv2Action` (API JSON).

## Input

- `SmsData $data`: `recipient`, `body`, `from` opzionale.

## Output

- `array<string, mixed>`: identico a quello di `SendAgiletelecomSMSv2Action` ( oggi `[]`).

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| NOTIFY-AGILE-INV-1 | L'esecuzione e' sempre quella di `SendAgiletelecomSMSv2Action`: nessuna logica propria. | — (non dimostrato) |
| NOTIFY-AGILE-INV-2 | Implementa `Modules\Notify\Models\Contracts\SmsActionContract` (firma `execute(SmsData): array`). | — (non dimostrato) |
| NOTIFY-AGILE-INV-3 | Queueable (`QueueableAction`). | — (non dimostrato) |

## Effetti collaterali

- Quelli di `SendAgiletelecomSMSv2Action` (POST HTTPS a `secure.agiletelecom.com`).

## Errori

- Quelle dell'engine v2 (Http client errors propagano).

## Non fa

- Non usa l'API v1: e' solo un alias verso v2.
- Non valida `SmsData`: lo fa il chiamante o il Data object.
