---
title: "Contratto — SendNexmoSMSAction"
type: contract
action: "Modules\\Notify\\Actions\\SMS\\SendNexmoSMSAction"
module: Notify
status: accepted
tags: [contract, action, notify, sms, nexmo]
created: 2026-11-26
updated: 2026-11-26
---

# SendNexmoSMSAction

Contratto di comportamento (regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`).
Sorgente: `app/Actions/SMS/SendNexmoSMSAction.php`. Invio SMS Nexmo (`/sms/json`,
Vonage API) con chiavi `NexmoData`.

## Input

- `SmsData $smsData`: `recipient`, `body`, `from` opzionale.
- Costruttore richiede `NexmoData` con `key` e `secret` configurati.

## Output

- `array{status_code: int, status_txt: string}`: HTTP status e body grezzo.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| NOTIFY-NEXMO-INV-1 | `key` o `secret` mancanti → `Exception` nel costruttore. | — (non dimostrato) |
| NOTIFY-NEXMO-INV-2 | `to`: `00`→`+39...`, senza `+`→`+39...` (prefisso italiano hardcoded). | — (non dimostrato) |
| NOTIFY-NEXMO-INV-3 | POST form a `{baseUrl}/sms/json` con `api_key`, `api_secret`, `to`, `from` (o `sms.from` default), `text`, `type='unicode'`. | — (non dimostrato) |
| NOTIFY-NEXMO-INV-4 | Timeout da `NexmoData::getTimeout()`; `ClientException` → `Exception` con `[line][class]`. | — (non dimostrato) |

## Effetti collaterali

- POST HTTPS verso l'API Nexmo.
- `$this->vars` mutato.

## Errori

- `Exception`: credenziali mancanti, errore HTTP client.

## Non fa

- Non usa `NormalizePhoneNumberAction`: la regola `+39` e' duplicata nel metodo.
- Non interpreta il body JSON di risposta (Nexmo risponde 200 anche con errori applicativi).
