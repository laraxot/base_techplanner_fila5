---
title: "Contratto — SendTwilioWhatsAppAction"
type: contract
action: "Modules\\Notify\\Actions\\WhatsApp\\SendTwilioWhatsAppAction"
module: Notify
status: accepted
tags: [contract, action, notify, whatsapp, twilio]
created: 2026-11-26
updated: 2026-11-26
---

# SendTwilioWhatsAppAction

Contratto di comportamento (regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`).
Sorgente: `app/Actions/WhatsApp/SendTwilioWhatsAppAction.php`. Invio WhatsApp via Twilio
(`Messages.json`) con prefisso `whatsapp:` su `To`/`From` e Basic Auth.

## Input

- `WhatsAppData $whatsAppData`: `recipient`, `body`, `from` opzionale, `media`.
- Costruttore richiede `services.twilio.account_sid` e `auth_token`; `whatsapp.from` opzionale.

## Output

- `array`: `success`+`message_id`+`response`+`vars` oppure `success=false`+`error`+
  `status_code`+`vars`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| NOTIFY-WATW-INV-1 | `account_sid` o `auth_token` mancanti → `Exception` nel costruttore. | — (non dimostrato) |
| NOTIFY-WATW-INV-2 | `To`/`From` sono sempre `'whatsapp:'.$numero`: il prefisso e' aggiunto qui, non nel Data. | — (non dimostrato) |
| NOTIFY-WATW-INV-3 | Payload form: `To`, `From`, `Body`, `MediaUrl` (solo `media[0]` se presente). | — (non dimostrato) |
| NOTIFY-WATW-INV-4 | `message_id` = `responseData['sid']`; `ClientException` → `success=false` con `error` da `message`. | — (non dimostrato) |

## Effetti collaterali

- POST HTTPS verso api.twilio.com.
- `Log::debug`/`Log::warning`; `$this->vars` mutato.

## Errori

- `Exception`: credenziali mancanti.
- HTTP errori → `success=false`.

## Non fa

- Non supporta template WhatsApp: solo `Body`/`MediaUrl`.
- Non normalizza il numero: si affida al formato `whatsapp:+...` del chiamante.
