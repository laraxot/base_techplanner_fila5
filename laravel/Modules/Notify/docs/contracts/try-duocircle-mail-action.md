---
title: "Contratto — TryDuocircleMailAction"
type: contract
action: "Modules\\Notify\\Actions\\Mail\\Engines\\Duocircle\\TryDuocircleMailAction"
module: Notify
status: accepted
tags: [contract, action, notify, mail, duocircle, imap]
created: 2026-11-26
updated: 2026-11-26
---

# TryDuocircleMailAction

Contratto di comportamento (regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`).
Sorgente: `app/Actions/Mail/Engines/Duocircle/TryDuocircleMailAction.php`. Engine di lettura
IMAP Duocircle via Webklex PHPIMAP: scarica i messaggi e li sposta in `INBOX.read`.

## Input

- `array<string, mixed> $vars`: chiavi stringa → proprieta' pubbliche (stessa convenzione
  di `SendMailAction`/`SendDuocircleMailAction`).

## Output

- `list<{subject: string, attachments: int, body: string, moved: bool}>`: una riga per
  messaggio, in ordine di scansione delle cartelle IMAP.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| NOTIFY-TRYDUOCIRCLE-INV-1 | Ogni messaggio viene spostato in `INBOX.read` (`moved=true`): la lettura consuma la casella, non e' una preview. | — (non dimostrato) |
| NOTIFY-TRYDUOCIRCLE-INV-2 | `webklex/php-imap` assente → `Exception('Webklex PHPIMAP is not installed')`. | — (non dimostrato) |
| NOTIFY-TRYDUOCIRCLE-INV-3 | Ogni oggetto Webklex che non ha il tipo atteso (client, folders, query, message) → `UnexpectedValueException`, mai un `mixed` silenzioso. | — (non dimostrato) |
| NOTIFY-TRYDUOCIRCLE-INV-4 | La scansione copre **tutte** le cartelle dell'account `default`, non solo `INBOX`. | — (non dimostrato) |

## Effetti collaterali

- Connessione IMAP e `MOVE` dei messaggi verso `INBOX.read` sul server di posta.

## Errori

- `Exception`: libreria IMAP mancante.
- `UnexpectedValueException`: risposte Webklex non conforme alle attese.

## Non fa

- Non invia email.
- Non filtra per mittente/data: restituisce tutto.
- Non conserva il raw MIME: solo subject, numero allegati, body HTML e flag `moved`.
