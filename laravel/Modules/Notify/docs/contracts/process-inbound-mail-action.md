---
title: "Contratto — ProcessInboundMailAction"
type: contract
action: "Modules\\Notify\\Actions\\Mail\\ProcessInboundMailAction"
module: Notify
status: accepted
tags: [contract, action, notify, mail, inbound, webhook]
created: 2026-11-26
updated: 2026-11-26
related:
  - ../adr/0004-webhooks-authenticate-with-a-token-in-the-path.md
---

# ProcessInboundMailAction

Contratto di comportamento (regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`).
Sorgente: `app/Actions/Mail/ProcessInboundMailAction.php`. Webhook della posta in arrivo
(`POST /api/inbound/{provider}/{token}`): salva in `inbound_emails` il messaggio e il raw `.eml`.

## Input

- `Request $request`: payload Postmark (JSON), Mailgun (form) oppure MIME grezzo
  (`Content-Type: message/rfc822` o body che inizia con `From:`).
- `string $provider`: segmento del percorso (`postmark`, `mailgun`, ...), usato come chiave di dedup.
- Token nel percorso confrontato con `notify.notify.inbound_token`.

## Output

- `401` se il token non coincide o non e' configurato.
- `422 {"error":"unparseable"}` se il payload non e' riconosciuto da nessun parser.
- `200 {"ok":true}` dopo `updateOrCreate` su `inbound_emails`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| NOTIFY-INBOUND-INV-1 | Token assente o errato → 401, nessuna scrittura. | NOTIFY-INBOUND-INV-1 |
| NOTIFY-INBOUND-INV-2 | Dedup per `(provider, message_id)` via `updateOrCreate`: un reinvio aggiorna la stessa riga e `received_at`/`status='received'`. Limite noto: il test prova una sola riga dopo due invii, non l'aggiornamento di `received_at` e `status`. | NOTIFY-INBOUND-INV-2 |
| NOTIFY-INBOUND-INV-3 | Il raw MIME e' salvato su `Storage::disk('local')` in `inbound/{provider}/Y/m/d/{uuid}.eml` e il path finisce in `raw_path`; body vuoto → `raw_path` null. | — (non dimostrato) |
| NOTIFY-INBOUND-INV-4 | Payload non riconosciuto (non Postmark/Mailgun/MIME) → 422 e nessuna riga creata. | — (non dimostrato) |

## Effetti collaterali

- `INSERT`/`UPDATE` su `inbound_emails`.
- Scrittura file su disco locale (`inbound/...`).
- `Log::warning('notify.inbound.parse_failed')` sui payload non parsabili.

## Errori

- `401` — token errato o `inbound_token` non configurato.
- `422` — payload non interpretabile.

## Non fa

- Non instrada la posta verso altri moduli: salva e basta (l'eventuale smistamento e' del progetto).
- Non pulisce gli `.eml`: la retention e' una policy esterna.
- Non invia email: e' solo il lato in ingresso.

## Riconciliazione documentale (2026-11-27)

Questo file aveva un conflitto Git irrisolto. La base è la variante più recente del contratto, con il riferimento a `app/Actions/Mail/ProcessInboundMailAction.php` **esistente su `dev`**; la sua semantica, i group Pest citati e gli eventuali effetti non sono stati rieseguiti in questa sessione. Il confronto con il codice e i test resta il gate ECC della story owner. [Tracciamento root #15](https://github.com/laraxot/base_ptvx_fila5/issues/15).
