---
title: "Contratto — Send360dialogWhatsAppAction"
type: contract
action: "Modules\\Notify\\Actions\\WhatsApp\\Send360dialogWhatsAppAction"
module: Notify
status: accepted
tags: [contract, action, notify, whatsapp, 360dialog]
created: 2026-11-26
updated: 2026-11-26
---

# Send360dialogWhatsAppAction

Contratto di comportamento (regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`).
Sorgente: `app/Actions/WhatsApp/Send360dialogWhatsAppAction.php`. Invio WhatsApp via
360dialog (`waba.360dialog.io/v1/messages`), header `D360-API-KEY`.

## Input

- `WhatsAppData $whatsAppData`: `recipient`, `body`, `from` (non usato), `type`
  (`text`, `template`, `media`), `template`, `media`.
- Costruttore richiede `services.360dialog.api_key`.

## Output

- `array`: `success`+`message_id`+`response`+`vars` oppure `success=false`+`error`+
  `status_code`+`vars`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| NOTIFY-WA360-INV-1 | `api_key` mancante → `Exception` nel costruttore. | — (non dimostrato) |
| NOTIFY-WA360-INV-2 | Payload: `to=recipient`; `text`→`{type:'text', text:{body}}`; `template`→`{type:'template', template}`; `media`→tipo dedotto dall'estensione (`image`/`video`/`audio`/`document`) con `link`+`caption`. | — (non dimostrato) |
| NOTIFY-WA360-INV-3 | `success` = HTTP 2xx; `message_id` da `messages[0].id`. | — (non dimostrato) |
| NOTIFY-WA360-INV-4 | `ClientException` → `success=false`, `error` da `errors[0].message`, log warning. | — (non dimostrato) |

## Effetti collaterali

- POST HTTPS verso `waba.360dialog.io/v1/messages`.
- `Log::debug`/`Log::warning`; `$this->vars` mutato.

## Errori

- `Exception`: api_key mancante nel costruttore.
- HTTP errori → `success=false` (non rilanciati).

## Non fa

- Non usa `whatsapp.from`: il sender e' configurato lato provider.
- Non gestisce `type` ignoti: il payload resta `{to}` soltanto.
