---
title: "Contratto — NetfunSendAction"
type: contract
action: "Modules\\Notify\\Actions\\NetfunSendAction"
module: Notify
status: accepted
tags: [contract, action, notify, sms, netfun, http]
created: 2026-11-26
updated: 2026-11-26
---

# NetfunSendAction

Contratto di comportamento (regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`).
Sorgente: `app/Actions/NetfunSendAction.php`. Invio SMS Netfun via `smsviainternet.it`
(Guzzle), con normalizzazione del destinatario a `+39...`.

## Input

- `SmsData $smsData`: `recipient`, `body`, `from` (sender).
- Costruttore richiede `services.netfun.token` stringa.

## Output

- `array{status_code: int, status_txt: string}`: HTTP status e body grezzo della risposta.
- `$this->vars` e' riempito con le stesse chiavi.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| NOTIFY-NETFUN-INV-1 | `token` mancante o non-stringa in config → `Exception` nel costruttore (l'Action non si costruisce). | — (non dimostrato) |
| NOTIFY-NETFUN-INV-2 | Il destinatario e' normalizzato: `00...` → `+39...`, senza `+` → anteposto `+39`; il payload usa `api_token`, `async=true`, `utf8_enabled=true`. | — (non dimostrato) |
| NOTIFY-NETFUN-INV-3 | Endpoint fisso `https://v2.smsviainternet.it/api/rest/v1/sms-batch.json`, POST JSON. | — (non dimostrato) |
| NOTIFY-NETFUN-INV-4 | `ClientException` Guzzle → `Exception` con messaggio concatenato a `[line][class]`. | — (non dimostrato) |

## Effetti collaterali

- POST HTTPS verso smsviainternet.it.
- `$this->vars` mutato (status_code, status_txt).

## Errori

- `Exception`: token mancante, errore HTTP client.

## Non fa

- Non controlla il campo `error` del body JSON: a differenza di `SendNetfunSMSAction`,
  qui lo status e' solo HTTP (l'esito applicativo resta nel body).
- Non logga: nessun `Log` in questa classe.
- Non e' l'unico invio Netfun: `SMS\SendNetfunSMSAction` e' la variante con `NormalizePhoneNumberAction` e log.
