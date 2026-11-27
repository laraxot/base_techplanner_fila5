---
title: "Contratto — SendFacebookWhatsAppAction"
type: contract
action: "Modules\\Notify\\Actions\\WhatsApp\\SendFacebookWhatsAppAction"
module: Notify
status: accepted
tags: [contract, action, notify, whatsapp, facebook, meta]
created: 2026-11-26
updated: 2026-11-26
---

# SendFacebookWhatsAppAction

Contratto di comportamento (regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`).
Sorgente: `app/Actions/WhatsApp/SendFacebookWhatsAppAction.php`. Invio WhatsApp via Meta
Cloud API (`graph.facebook.com/v17.0/{phone_number_id}/messages`), Bearer token.

## Input

- `WhatsAppData $whatsAppData`: `recipient`, `body`, `type` (`text`, `template`, `media`).
- Costruttore richiede `services.facebook.access_token` e `phone_number_id`.

## Output

- `array`: `success`+`message_id`+`response`+`vars` oppure `success=false`+`error`+
  `status_code`+`vars`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| NOTIFY-WAFB-INV-1 | `access_token` o `phone_number_id` mancanti → `Exception` nel costruttore. | — (non dimostrato) |
| NOTIFY-WAFB-INV-2 | Payload fisso `messaging_product='whatsapp'`, `recipient_type='individual'`, `to=recipient`; `text`→`preview_url=false`+`body`; `template`→`template`; `media`→sempre `type='image'` con `image.link` (non deduce video/audio/doc). | — (non dimostrato) |
| NOTIFY-WAFB-INV-3 | `success` = HTTP 2xx; `message_id` da `messages[0].id`. | — (non dimostrato) |
| NOTIFY-WAFB-INV-4 | `ClientException` → `success=false`, `error` da `error.message`, log warning. | — (non dimostrato) |

## Effetti collaterali

- POST HTTPS verso graph.facebook.com.
- `Log::debug`/`Log::warning`; `$this->vars` mutato.

## Errori

- `Exception`: credenziali mancanti nel costruttore.
- HTTP errori → `success=false`.

## Non fa

- Non deduce il tipo media: tutto `media` va come `image`.
- Non usa `whatsapp.from`: il numero mittente e' `phone_number_id` della configurazione.
