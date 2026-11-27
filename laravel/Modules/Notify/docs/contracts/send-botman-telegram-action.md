---
title: "Contratto — SendBotmanTelegramAction"
type: contract
action: "Modules\\Notify\\Actions\\Telegram\\SendBotmanTelegramAction"
module: Notify
status: accepted
tags: [contract, action, notify, telegram, botman]
created: 2026-11-26
updated: 2026-11-26
---

# SendBotmanTelegramAction

Contratto di comportamento (regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`).
Sorgente: `app/Actions/Telegram/SendBotmanTelegramAction.php`. Invio Telegram via Guzzle
diretto alla Bot API — **non** usa la libreria BotMan, nonostante il nome.

## Input

- `TelegramData $telegramData`: stessi campi di `SendOfficialTelegramAction`.
- Stessa config: `services.telegram.token`, `api_url`, `telegram.*`.

## Output

- `array`: come `SendOfficialTelegramAction` — `success`+`message_id`+`response`+`vars`
  oppure `success=false`+`error`+`error_code`+`status_code`+`vars`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| NOTIFY-TGBOT-INV-1 | Token mancante → `Exception` nel costruttore. | — (non dimostrato) |
| NOTIFY-TGBOT-INV-2 | Stessa mappatura endpoint/payload di Official (`sendMessage` default, media → `sendPhoto`/`sendVideo`/`sendDocument`/`sendAudio`/`sendAnimation`). | — (non dimostrato) |
| NOTIFY-TGBOT-INV-3 | `success = responseData['ok'] === true`; `ClientException` → array `success=false` + warning log. | — (non dimostrato) |
| NOTIFY-TGBOT-INV-4 | Differenza dal gemello: `json_decode` con fallback `?: []` e `??`/`isset` piu' difensivi sui campi `result.message_id`/`description`/`error_code`. | — (non dimostrato) |

## Effetti collaterali

- POST HTTPS verso la Bot API.
- `Log::debug('Telegram BotMan inviato con successo')` / `Log::warning('Errore invio Telegram BotMan')`.
- `$this->vars` mutato.

## Errori

- `Exception`: token mancante.
- HTTP errors → `success=false` (non rilanciati).

## Non fa

- Non usa BotMan framework: e' una chiamata REST identica alle altre due Action Telegram.
- Non ha logica di retry o code.
