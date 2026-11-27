---
title: "Contratto — CreateMailjetTransportAction"
type: contract
action: "Modules\\Notify\\Actions\\Mail\\Mailjet\\CreateMailjetTransportAction"
module: Notify
status: accepted
tags: [contract, action, notify, mailjet, transport, mailer]
created: 2026-11-26
updated: 2026-11-26
---

# CreateMailjetTransportAction

Contratto di comportamento (regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`).
Sorgente: `app/Actions/Mail/Mailjet/CreateMailjetTransportAction.php`. Costruisce il
`TransportInterface` Mailjet (bridge `symfony/mailjet-mailer`) per `Mail::extend('mailjet')`.

## Input

- `string $key`: API key pubblica Mailjet (`services.mailjet.key`).
- `string $secret`: API key privata (`services.mailjet.secret`).
- `bool $sandbox = false`: modalita' sandbox Mailjet (valida senza consegnare).
- `string $scheme = 'api'`: `api` (Send API v3.1) oppure `smtp`; altro → eccezione.
- `?HttpClientInterface $client`: client HTTP iniettabile (default `HttpClient::create()`).

## Output

- `TransportInterface` pronto per il mailer `mailjet`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| NOTIFY-MAILJET-TR-INV-1 | `key`/`secret` vuoti o spazi → `InvalidArgumentException` prima di costruire il DSN. Limite noto: il test prova solo la chiave pubblica vuota; secret vuoto o fatto di soli spazi non sono coperti. | NOTIFY-MAILJET-TR-INV-1 |
| NOTIFY-MAILJET-TR-INV-2 | `$scheme` accetta solo `api` e `smtp`; qualunque altro valore → `InvalidArgumentException`. | NOTIFY-MAILJET-TR-INV-2 |
| NOTIFY-MAILJET-TR-INV-3 | Con `scheme=api` il DSN e' `mailjet+api` con opzione `sandbox=true|false`; con `smtp` nessuna opzione sandbox. Limite noto: provati `sandbox=true` con `api` e un DSN `smtp` con `in-v3.mailjet.com`; `sandbox=false` e l'assenza dell'opzione con `smtp` non sono asserite. | NOTIFY-MAILJET-TR-INV-3 |
| NOTIFY-MAILJET-TR-INV-4 | L'API scheme abilita gli header `X-MJ-CustomID`/`X-MJ-EventPayload` che tornano nei webhook (ADR 0001): e' il motivo per cui si preferisce `api` a `smtp`. | — (non dimostrato) |

## Effetti collaterali

- Nessuno: costruisce un oggetto, non invia nulla.

## Errori

- `Symfony\Component\Mailer\Exception\InvalidArgumentException`: credenziali vuote o scheme non valido.

## Non fa

- Non invia email: solo prepara il transport.
- Non legge la config: le credenziali arrivano dal chiamante (`NotifyServiceProvider`).
