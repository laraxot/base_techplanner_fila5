---
title: "Contratto — SendAgiletelecomSMSv1Action"
type: contract
action: "Modules\\Notify\\Actions\\SMS\\SendAgiletelecomSMSv1Action"
module: Notify
status: accepted
tags: [contract, action, notify, sms, agiletelecom, legacy]
created: 2026-11-26
updated: 2026-11-26
---

# SendAgiletelecomSMSv1Action

Contratto di comportamento (regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`).
Sorgente: `app/Actions/SMS/SendAgiletelecomSMSv1Action.php`. Invio SMS Agile Telecom API v1
(`securesend_v1.aspx`, form POST) — variante legacy.

## Input

- `SmsData $data`: `recipient` (normalizzato), `body`.
- Credenziali da `AgiletelecomData::make()` (`username`, `password`, `sender`).

## Output

- `array<string, mixed>`: sempre `[]` (la risposta HTTP non e' letta).

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| NOTIFY-AGILEV1-INV-1 | Endpoint fisso `https://secure.agiletelecom.com/securesend_v1.aspx`, POST `form_params`. | — (non dimostrato) |
| NOTIFY-AGILEV1-INV-2 | `smsGATEWAY` e' fisso `'H'` (qualita' alta); `smsNUMBER` e' normalizzato da `SMS\NormalizePhoneNumberAction`. | — (non dimostrato) |
| NOTIFY-AGILEV1-INV-3 | Il client Guzzle ha `timeout=2.0` e header gzip/no-cache/keep-alive. | — (non dimostrato) |
| NOTIFY-AGILEV1-INV-4 | La risposta HTTP non e' letta: il ritorno e' sempre `[]` e un 2xx con errore applicativo non viene notato. | — (non dimostrato) |

## Effetti collaterali

- POST HTTPS verso secure.agiletelecom.com.

## Errori

- Eccezioni Guzzle (`ClientException`) propagano; nessuna eccezione applicativa.

## Non fa

- Non legge la risposta: l'esito reale e' perso.
- Non e' il default: `SendAgiletelecomSMSAction` usa v2.
