---
title: "Contratto — SendNetfunSMSAction"
type: contract
action: "Modules\\Notify\\Actions\\SMS\\SendNetfunSMSAction"
module: Notify
status: accepted
tags: [contract, action, notify, sms, netfun]
created: 2026-11-26
updated: 2026-11-26
---

# SendNetfunSMSAction

Contratto di comportamento (regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`).
Sorgente: `app/Actions/SMS/SendNetfunSMSAction.php`. Invio SMS Netfun via
`smsviainternet.it` con `NormalizePhoneNumberAction`, log dei fallimenti e
detezione dell'esito nel campo `error` del body JSON.

## Input

- `SmsData $smsData`: `recipient`, `body`, `from` opzionale.
- Costruttore richiede `sms.drivers.netfun.token` (stringa), `api_url` opzionale,
  `sms.from`, `sms.debug`, `sms.timeout`.

## Output

- `array{status_code: int, status_txt: string}`: HTTP status e body grezzo.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| NOTIFY-NETFUNSMS-INV-1 | `token` mancante → `Exception` nel costruttore. | — (non dimostrato) |
| NOTIFY-NETFUNSMS-INV-2 | `recipient` passa sempre da `SMS\NormalizePhoneNumberAction` (prefisso 39 se non internazionale). | — (non dimostrato) |
| NOTIFY-NETFUNSMS-INV-3 | Body JSON: `api_token`, `sender`, `text_template` (body senza HTML, UTF-8), `async=true`, `utf8_enabled=true`, `destinations[0].number`. | — (non dimostrato) |
| NOTIFY-NETFUNSMS-INV-4 | Netfun risponde HTTP 200 anche su errore applicativo: l'esito e' `error` assente/`0`/`'0'`/`false` nel body; se diverso → `Log::channel('daily')->error` con request redacted (`api_token` → `***redacted***`). Limite noto: provata la classificazione dell'esito (`error` 0 → ok; `error` diverso, HTTP 500, corpo non JSON → fallimento); il log con `api_token` oscurato e `error` assente non sono asserite. | NOTIFY-NETFUNSMS-INV-4 |
| NOTIFY-NETFUNSMS-INV-5 | `ClientException` Guzzle → `Exception` con suffisso `[line][class]`. | — (non dimostrato) |

## Effetti collaterali

- POST HTTPS verso l'endpoint Netfun.
- `Log::channel('daily')->error` sulle risposte non riuscite.
- `$this->vars` mutato.

## Errori

- `Exception`: token mancante, errore HTTP client.

## Non fa

- Non implementa `SmsData->reference`/`placeholders`: la API batch e' usata per un solo destinatario.
- Non e' `NetfunSendAction` (quello e' la variante in `Actions/` senza log e con normalizzazione `+39` interna).
