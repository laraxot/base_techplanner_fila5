---
title: "Contratto — SmtpMailSendAction"
type: contract
action: "Modules\\Notify\\Actions\\SmtpMailSendAction"
module: Notify
status: accepted
tags: [contract, action, notify, mail, smtp, rimosso]
created: 2026-11-26
updated: 2026-11-26
---

# SmtpMailSendAction

Contratto di comportamento (regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`).
Sorgente: `app/Actions/SmtpMailSendAction.php`. Action **disabilitata**: il corpo e'
rimpiazzato da un `RuntimeException` dopo la rimozione di un debug `dddx`.

## Input

- `string $_to`, `string $_subject`, `string $_body`: parametri mantenuti per firma,
  non usati.

## Output

- Nessuno: lancia sempre.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| NOTIFY-SMTP-INV-1 | `execute()` lancia sempre `RuntimeException('Removed debug dddx')`: nessun invio SMTP parte da qui. | — (non dimostrato) |
| NOTIFY-SMTP-INV-2 | Il codice SMTP originale (transport `SmtpData`, `Mailer`, `Email`) e' commentato, non cancellato: e' il riferimento per un eventuale ripristino. | — (non dimostrato) |

## Effetti collaterali

- Nessuno.

## Errori

- `RuntimeException` sempre.

## Non fa

- Non invia email: e' un tombstone, non un'invio SMTP.
- Non sostituisce `SendMailAction`/`SendMailtrapMailAction`: chi deve inviare usa quelli.
