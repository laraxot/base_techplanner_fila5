---
title: "Contratto — SendMailtrapMailAction"
type: contract
action: "Modules\\Notify\\Actions\\Mail\\SendMailtrapMailAction"
module: Notify
status: accepted
tags: [contract, action, notify, mail, raw, test]
created: 2026-11-26
updated: 2026-11-26
---

# SendMailtrapMailAction

Contratto di comportamento (regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`).
Sorgente: `app/Actions/Mail/SendMailtrapMailAction.php`. Invio email **raw** (`Mail::raw`)
tramite il mailer/driver configurato (es. Mailtrap in sandbox).

## Input

- `string $to`: destinatario; deve essere non vuoto.
- `string $body`: corpo testuale (verificato `Assert::string`, non vuoto).
- `array<string, mixed> $vars`: chiavi stringa → proprieta' pubbliche (include `$from` se passato).
- `?string $from`: mittente (assegnato alla proprieta', non applicato al `Message`).

## Output

- `void`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| NOTIFY-MAILTRAP-INV-1 | Ogni invio ha subject fisso `'Test Email'`: non e' un template, e' un test/manuale. | — (non dimostrato) |
| NOTIFY-MAILTRAP-INV-2 | `$to` vuoto dentro la closure `Mail::raw` lancia `InvalidArgumentException` prima del send. | — (non dimostrato) |
| NOTIFY-MAILTRAP-INV-3 | `$body` deve essere stringa non vuota: `Assert::string` fallisce altrimenti. | — (non dimostrato) |

## Effetti collaterali

- `Mail::raw` → invio reale sul driver `mail.default` configurato (in test: Mailtrap/sandbox).

## Errori

- `InvalidArgumentException`: destinatario vuoto.
- `AssertionFailedException`: `$body` non stringa.
- Eccezioni del transport SMTP propagano.

## Non fa

- Non usa template ne' HTML: solo testo raw.
- Non imposta `From`: il mittente resta quello del mailer configurato.
- Non e' per produzione: e' lo strumento di verifica (cluster Filament `Test`).
