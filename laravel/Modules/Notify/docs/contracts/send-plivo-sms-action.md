---
title: "Contratto — SendPlivoSMSAction"
type: contract
action: "Modules\\Notify\\Actions\\SMS\\SendPlivoSMSAction"
module: Notify
status: accepted
tags: [contract, action, notify, sms, plivo]
created: 2026-11-26
updated: 2026-11-26
---

# SendPlivoSMSAction

Contratto di comportamento (regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`).
Sorgente: `app/Actions/SMS/SendPlivoSMSAction.php`. Invio SMS Plivo con Basic Auth
(`auth_id`/`auth_token`).

## Input

- `SmsData $smsData`: `recipient`, `body`, `from` opzionale.
- Costruttore richiede `PlivoData` con `auth_id` e `auth_token`.

## Output

- `array{status_code: int, status_txt: string}`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| NOTIFY-PLIVO-INV-1 | `auth_id` o `auth_token` mancanti → `Exception` nel costruttore. | — (non dimostrato) |
| NOTIFY-PLIVO-INV-2 | `to`: `00`→`+39`, senza `+`→`+39`; `from` = `SmsData->from` o `sms.from` default. | — (non dimostrato) |
| NOTIFY-PLIVO-INV-3 | POST JSON a `{baseUrl}/v1/Account/{auth_id}/Message/` con `src`, `dst`, `text`; auth Basic. | — (non dimostrato) |
| NOTIFY-PLIVO-INV-4 | `ClientException` → `Exception` con `[line][class]`. | — (non dimostrato) |

## Effetti collaterali

- POST HTTPS verso api.plivo.com.
- `$this->vars` mutato.

## Errori

- `Exception`: credenziali mancanti, errore HTTP.

## Non fa

- Non usa `NormalizePhoneNumberAction`: regola `+39` duplicata.
- Non interpreta la risposta applicativa.
