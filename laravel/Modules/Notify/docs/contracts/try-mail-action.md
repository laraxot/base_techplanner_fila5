---
title: "Contratto — TryMailAction"
type: contract
action: "Modules\\Notify\\Actions\\Mail\\TryMailAction"
module: Notify
status: accepted
tags: [contract, action, notify, mail, engine, imap]
created: 2026-11-26
updated: 2026-11-26
---

# TryMailAction

Contratto di comportamento (regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`).
Sorgente: `app/Actions/Mail/TryMailAction.php`. Gemello di `SendMailAction` per gli engine
`Engines\{Driver}\Try{Driver}MailAction` (lettura IMAP dei messaggi).

## Input

- `string $to = ''`: filtri/variabili per l'engine.
- `?string $body`, `array<string, mixed> $vars`, `?string $from`, `string $driver = 'duocircle'`.
- Le chiavi stringa di `$vars` diventano proprieta' pubbliche dell'Action.

## Output

- `void` a livello di dispatcher: l'array dei messaggi letto e' prodotto dall'engine
  (`TryDuocircleMailAction::execute` ritorna `list<{subject, attachments, body, moved}>`).

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| NOTIFY-TRYMAIL-INV-1 | Stessa derivazione del nome engine di `SendMailAction`, con prefisso `Try`. | — (non dimostrato) |
| NOTIFY-TRYMAIL-INV-2 | Engine mancante o senza `execute()` → `Assert::classExists` / `RuntimeException`. | — (non dimostrato) |
| NOTIFY-TRYMAIL-INV-3 | `TryDuocircleMailAction` muove ogni messaggio in `INBOX.read`: e' una lettura con side effect, non una sola consultazione. | — (non dimostrato) |

## Effetti collaterali

- Connessione IMAP via Webklex PHPIMAP e spostamento messaggi in `INBOX.read` (engine Duocircle).

## Errori

- `RuntimeException` se l'engine non esiste o non ha `execute()`.
- `Exception` se `webklex/php-imap` non e' installato; `UnexpectedValueException` se le API
  Webklex non rispondono coi tipi attesi.

## Non fa

- Non invia email: e' il lato di lettura/verifica.
- Non filtra i messaggi: ritorna tutto cio' che trova nelle cartelle.
