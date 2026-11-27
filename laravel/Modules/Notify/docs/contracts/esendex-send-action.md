---
title: "Contratto — EsendexSendAction"
type: contract
action: "Modules\\Notify\\Actions\\EsendexSendAction"
module: Notify
status: accepted
tags: [contract, action, notify, sms, esendex, http]
created: 2026-11-26
updated: 2026-11-26
---

# EsendexSendAction

Contratto di comportamento (regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`).
Sorgente: `app/Actions/EsendexSendAction.php`. Invio SMS via API REST Esendex
(`app.messaggissima.it`) con login preventivo per `user_key`/`Session_key`.

## Input

- `SmsData $smsData`: `recipient`, `body` (`from` non e' usato nel payload: il sender
  viene da `config('esendex.sender')`).

## Output

- `array<string, mixed>`: body JSON della risposta Esendex decodificato.
- `[]` se la POST sms risponde con HTTP diverso da 201.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| NOTIFY-ESENDEX-INV-1 | Prima dell'invio esegue sempre `login()` su `.../login?username=...&password=...`: senza `user_key`/`Session_key` non c'e' send. | — (non dimostrato) |
| NOTIFY-ESENDEX-INV-2 | Login HTTP != 200 → `login()` ritorna `null` e `execute()` lancia `Exception`. | — (non dimostrato) |
| NOTIFY-ESENDEX-INV-3 | `message_type` e' fisso `'N'`, `returnCredits=false`, `recipient` e' sempre un array con un solo numero. | — (non dimostrato) |
| NOTIFY-ESENDEX-INV-4 | HTTP != 201 sul send → ritorna `[]` (non lancia): il chiamante vede una lista vuota. | — (non dimostrato) |

## Effetti collaterali

- Due chiamate HTTPS (login + send) verso `app.messaggissima.it`.
- `CURLOPT_SSL_VERIFYPEER=false`: il certificato non e' verificato.

## Errori

- `Exception`: login fallito o risposta send non-JSON.
- `JsonException` se il body non e' JSON valido.
- `Assert` fallisce se `esendex.username`/`password` non sono stringhe.

## Non fa

- Non usa `SmsData->from`: il sender e' solo `config('esendex.sender')`.
- Non normalizza il numero: usa `recipient` così com'e'.
- Non tiene la sessione: ogni `execute()` fa un login nuovo.
