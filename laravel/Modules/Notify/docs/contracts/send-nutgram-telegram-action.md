---
title: "Contratto — SendNutgramTelegramAction"
type: contract
action: "Modules\\Notify\\Actions\\Telegram\\SendNutgramTelegramAction"
module: Notify
status: accepted
tags: [contract, action, notify, telegram, nutgram]
created: 2026-11-26
updated: 2026-11-26
---

# SendNutgramTelegramAction

Contratto di comportamento (regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`).
Sorgente: `app/Actions/Telegram/SendNutgramTelegramAction.php`. Invio Telegram via Guzzle
diretto alla Bot API — **non** usa la libreria Nutgram, nonostante il nome.

## Input

- `TelegramData $telegramData`: stessi campi di `SendOfficialTelegramAction`.
- Stessa config: `services.telegram.token`, `api_url`, `telegram.*`.

## Output

- `array`: `success`+`message_id`+`response`+`vars` oppure `success=false`+`error`+
  `error_code`+`status_code`+`vars`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| NOTIFY-TGNUT-INV-1 | Token mancante → `Exception` nel costruttore. | — (non dimostrato) |
| NOTIFY-TGNUT-INV-2 | Stessa mappatura endpoint/payload di Official e Botman. | — (non dimostrato) |
| NOTIFY-TGNUT-INV-3 | `json_decode` senza fallback `?: []`: se la risposta non e' JSON, `responseData` resta `mixed`/non-array e `['ok']` non c'e' — `success` sara' `false` di fatto. | — (non dimostrato) |
| NOTIFY-TGNUT-INV-4 | `ClientException` → `success=false` con `description`/`error_code` default grezzi (meno cast difensivi di Botman). | — (non dimostrato) |

## Effetti collaterali

- POST HTTPS verso la Bot API.
- `Log::debug('Telegram Nutgram inviato con successo')` / `Log::warning('Errore invio Telegram Nutgram')`.
- `$this->vars` mutato.

## Errori

- `Exception`: token mancante.
- HTTP errors → `success=false`.

## Non fa

- Non usa Nutgram framework: e' una chiamata REST identica alle altre due Action Telegram.
- Non valida il JSON di risposta oltre a `json_decode`.
