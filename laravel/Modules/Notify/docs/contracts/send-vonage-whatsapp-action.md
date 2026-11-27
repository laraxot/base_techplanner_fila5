---
title: "Contratto — SendVonageWhatsAppAction"
type: contract
action: "Modules\\Notify\\Actions\\WhatsApp\\SendVonageWhatsAppAction"
module: Notify
status: accepted
tags: [contract, action, notify, whatsapp, vonage]
created: 2026-11-26
updated: 2026-11-26
---

# SendVonageWhatsAppAction

Contratto di comportamento (regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`).
Sorgente: `app/Actions/WhatsApp/SendVonageWhatsAppAction.php`. Invio WhatsApp via Vonage
Messages API (`api.nexmo.com/v1/messages`) con Basic Auth `api_key`/`api_secret`.

## Input

- `WhatsAppData $whatsAppData`: `recipient`, `body`, `from` opzionale, `type`
  (`text`, `media`, `template`), `template`, `media`.
- Costruttore richiede `services.vonage.api_key` e `api_secret`.

## Output

- `array`: `success`+`message_id`+`response`+`vars` oppure `success=false`+`error`+
  `status_code`+`vars`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| NOTIFY-WAVON-INV-1 | `api_key` o `api_secret` mancanti → `Exception` nel costruttore. | — (non dimostrato) |
| NOTIFY-WAVON-INV-2 | `from`/`to` sono oggetti `{type:'whatsapp', number}`; default `text` con `content:{type:'text', text:body}`. | — (non dimostrato) |
| NOTIFY-WAVON-INV-3 | `media` → `content:{type:<image|video|audio|file>, <type>:{url, caption}}` con tipo dedotto dall'estensione; `template` → `content:{type:'template', template}`. | — (non dimostrato) |
| NOTIFY-WAVON-INV-4 | `message_id` = `message_uuid`; `ClientException` → `success=false` con `error` da `title`. | — (non dimostrato) |

## Effetti collaterali

- POST HTTPS verso api.nexmo.com.
- `Log::debug`/`Log::warning`; `$this->vars` mutato.

## Errori

- `Exception`: credenziali mancanti.
- HTTP errori → `success=false`.

## Non fa

- Non antepone `whatsapp:` ai numeri: il `type` e' nel payload JSON.
- Non valida la `template`: la passa cosi' com'e' al provider.
