---
title: "Contratto — SendTwilioSMSAction"
type: contract
action: "Modules\\Notify\\Actions\\SMS\\SendTwilioSMSAction"
module: Notify
status: accepted
tags: [contract, action, notify, sms, twilio]
created: 2026-11-26
updated: 2026-11-26
---

# SendTwilioSMSAction

Contratto di comportamento (regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`).
Sorgente: `app/Actions/SMS/SendTwilioSMSAction.php`. Invio SMS Twilio (`Messages.json`,
REST 2010-04-01) con Basic Auth `account_sid`/`auth_token`.

## Input

- `SmsData $smsData`: `recipient`, `body`, `from` opzionale.
- Costruttore richiede `TwilioData` con `account_sid` e `auth_token`.

## Output

- `array{status_code: int, status_txt: string}`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| NOTIFY-TWILIO-INV-1 | `account_sid` o `auth_token` mancanti → `Exception` nel costruttore. | — (non dimostrato) |
| NOTIFY-TWILIO-INV-2 | `to`: `00`→`+39` (via `mb_substr`), senza `+`→`+39`; `From` = `SmsData->from` o `sms.from`. | — (non dimostrato) |
| NOTIFY-TWILIO-INV-3 | POST form a `{baseUrl}/2010-04-01/Accounts/{sid}/Messages.json` con `To`, `From`, `Body`. | — (non dimostrato) |
| NOTIFY-TWILIO-INV-4 | `ClientException` → `Exception` con `[line][class]`. | — (non dimostrato) |

## Effetti collaterali

- POST HTTPS verso api.twilio.com.
- `$this->vars` mutato.

## Errori

- `Exception`: credenziali mancanti, errore HTTP.

## Non fa

- Non usa `NormalizePhoneNumberAction`: regola `+39` duplicata.
- Non interpreta la risposta (il `sid` del messaggio resta nel body).
