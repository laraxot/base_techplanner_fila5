---
title: "Contratto — SendSmsFactorSMSAction"
type: contract
action: "Modules\\Notify\\Actions\\SMS\\SendSmsFactorSMSAction"
module: Notify
status: accepted
tags: [contract, action, notify, sms, smsfactor]
created: 2026-11-26
updated: 2026-11-26
---

# SendSmsFactorSMSAction

Contratto di comportamento (regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`).
Sorgente: `app/Actions/SMS/SendSmsFactorSMSAction.php`. Invio SMS SMSFactor con token
auth (`SmsFactorData::getAuthHeaders()`).

## Input

- `SmsData $smsData`: `recipient`, `body`, `from` opzionale.
- Costruttore richiede `SmsFactorData` con `token` configurato.

## Output

- `array{status_code: int, status_txt: string}`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| NOTIFY-SMSFACTOR-INV-1 | `token` mancante → `Exception` nel costruttore. | — (non dimostrato) |
| NOTIFY-SMSFACTOR-INV-2 | `to`: `00`→`+39`, senza `+`→`+39`; `sender` = `SmsData->from` o `sms.from`. | — (non dimostrato) |
| NOTIFY-SMSFACTOR-INV-3 | POST JSON a `{baseUrl}/messages` con `text`, `sender`, `recipients[0].phone`, `type='sms'`; header da `getAuthHeaders()`. | — (non dimostrato) |
| NOTIFY-SMSFACTOR-INV-4 | `ClientException` → `Exception` con `[line][class]`. | — (non dimostrato) |

## Effetti collaterali

- POST HTTPS verso l'API SMSFactor.
- `$this->vars` mutato.

## Errori

- `Exception`: token mancante, errore HTTP.

## Non fa

- Non usa `NormalizePhoneNumberAction`: regola `+39` duplicata.
- Non interpreta la risposta.
