---
title: "Contratto — SendOfficialTelegramAction"
type: contract
action: "Modules\\Notify\\Actions\\Telegram\\SendOfficialTelegramAction"
module: Notify
status: accepted
tags: [contract, action, notify, telegram]
created: 2026-11-26
updated: 2026-11-26
---

# SendOfficialTelegramAction

Contratto di comportamento (regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`).
Sorgente: `app/Actions/Telegram/SendOfficialTelegramAction.php`. Invio messaggi Telegram
Bot API ufficiale (`api.telegram.org`), implementa `TelegramProviderActionInterface`.

## Input

- `TelegramData $telegramData`: `chatId`, `type` (`text` default, `photo`, `video`,
  `document`, `audio`, `animation`), `text`, `media`, `parseMode`, `replyToMessageId`,
  `replyMarkup`, `disableNotification`, `disableWebPagePreview`.
- Costruttore richiede `services.telegram.token` e opzionali `api_url`, `telegram.parse_mode`,
  `telegram.debug`, `telegram.timeout`.

## Output

- `array`: `success`+`message_id`+`response`+`vars` su 2xx; `success=false`+`error`+
  `error_code`+`status_code`+`vars` su `ClientException`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| NOTIFY-TG-INV-1 | Token mancante in config → `Exception` nel costruttore. | — (non dimostrato) |
| NOTIFY-TG-INV-2 | L'endpoint e' `/bot{token}/send{Method}`: `sendMessage` per default e per type ignoti, `sendPhoto`/`sendVideo`/`sendDocument`/`sendAudio`/`sendAnimation` per i media. | — (non dimostrato) |
| NOTIFY-TG-INV-3 | Per `text`: `text`, `parse_mode` (data o config), `disable_web_page_preview`. Per media: `$payload[type] = media[0]`, `caption=text`, `parse_mode`. | — (non dimostrato) |
| NOTIFY-TG-INV-4 | `reply_markup` e' sempre `json_encode` della structure; `reply_to_message_id` solo se non nullo. | — (non dimostrato) |
| NOTIFY-TG-INV-5 | `success` e' `responseData['ok'] === true`, non il solo HTTP 2xx. | — (non dimostrato) |
| NOTIFY-TG-INV-6 | `ClientException` non propaga: ritorna `success=false` con `error`/`error_code`/`status_code` e logga `Log::warning`. | — (non dimostrato) |

## Effetti collaterali

- POST HTTPS verso `api.telegram.org` (o `api_url` configurato).
- `Log::debug` su successo, `Log::warning` su errore HTTP.
- `$this->vars` mutato (status_code, status_txt, response_data o error_*).

## Errori

- `Exception`: token mancante nel costruttore.
- Errori HTTP tradotti in array `success=false` (non rilanciati).

## Non fa

- Non usa SDK: Guzzle diretto.
- Non gestisce webhook in ingresso (quello e' `Console\Commands\TelegramWebhook`).
- Non e' diverso da Botman/Nutgram nel protocollo: le tre classi chiamano la stessa Bot API.
