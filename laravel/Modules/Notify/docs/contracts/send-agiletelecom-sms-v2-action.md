---
title: "Contratto — SendAgiletelecomSMSv2Action"
type: contract
action: "Modules\\Notify\\Actions\\SMS\\SendAgiletelecomSMSv2Action"
module: Notify
status: accepted
tags: [contract, action, notify, sms, agiletelecom]
created: 2026-11-26
updated: 2026-11-26
---

# SendAgiletelecomSMSv2Action

Contratto di comportamento (regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`).
Sorgente: `app/Actions/SMS/SendAgiletelecomSMSv2Action.php`. Invio SMS Agile Telecom API
JSON (`/services/sms/send`) — variante corrente, usata da `SendAgiletelecomSMSAction`.

## Input

- `SmsData $data`: `recipient` (normalizzato), `body`.
- `AgiletelecomData::make()` per `sender` e `getAuthHeaders()`.

## Output

- `array<string, mixed>`: sempre `[]` (la risposta non e' letta ne' loggata).

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| NOTIFY-AGILEV2-INV-1 | Endpoint fisso `https://secure.agiletelecom.com/services/sms/send`, POST JSON via `Http` facade. | — (non dimostrato) |
| NOTIFY-AGILEV2-INV-2 | Payload: `messages[0].destinations=[normalized]`, `sender` da config, `body` = `SmsData->body`. | — (non dimostrato) |
| NOTIFY-AGILEV2-INV-3 | `smsNUMBER` normalizzato da `SMS\NormalizePhoneNumberAction` prima dell'invio. | — (non dimostrato) |
| NOTIFY-AGILEV2-INV-4 | Header auth e timeout vengono da `AgiletelecomData` (`getAuthHeaders()`, `timeout`). | — (non dimostrato) |

## Effetti collaterali

- POST HTTPS verso secure.agiletelecom.com.

## Errori

- Eccezioni `Http` propagano; nessuna gestione dell'esito applicativo.

## Non fa

- Non legge la risposta: `credit`/`processedMessages` della API sono ignorati.
- Non e' l'unico punto di invio Agile: `SendAgiletelecomSMSAction` e' l'alias pubblico.
