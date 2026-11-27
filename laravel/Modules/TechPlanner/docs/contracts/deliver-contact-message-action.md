---
title: "Contratto — DeliverContactMessageAction"
type: contract
action: "Modules\TechPlanner\Actions\Contact\DeliverContactMessageAction"
tags: [contract, action, contatti, mail, gdpr]
created: 2026-11-24
updated: 2026-11-24
---

# DeliverContactMessageAction

Sorgente: `app/Actions/Contact/DeliverContactMessageAction.php`. Perché: [ADR](../adr/0003-contact-form-archive-then-forward.md).

## Input

- `ContactMessageData $data`: dati già validati.
- `string $locale`: lingua della pagina da cui arriva il messaggio.

## Output

- `ContactOutcomeEnum`: `Sent`, `Received` o `Failed`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| TP-CONTACT-DELIVER-INV-1 | `Sent` solo se l'inoltro e-mail è riuscito; mai `Sent` senza mail partita. | `TP-CONTACT-DELIVER-INV-1` |
| TP-CONTACT-DELIVER-INV-2 | Senza destinatario valido (`ResolveContactRecipientAction` = null) nessuna mail parte e lo stato resta `Pending`. | `TP-CONTACT-DELIVER-INV-2` |
| TP-CONTACT-DELIVER-INV-3 | Stato archiviato: `Forwarded` se inoltrato, `ForwardFailed` se l'inoltro è fallito. | `TP-CONTACT-DELIVER-INV-3` |
| TP-CONTACT-DELIVER-INV-4 | L'archivio precede l'inoltro e il guasto di uno non impedisce l'altro. | `TP-CONTACT-DELIVER-INV-4` |
| TP-CONTACT-DELIVER-INV-5 | `Failed` solo se né archivio né inoltro sono riusciti. | `TP-CONTACT-DELIVER-INV-5` |
| TP-CONTACT-DELIVER-INV-6 | Nei log solo `['exception' => <classe>]`: mai nome, email o testo del mittente. | `TP-CONTACT-DELIVER-INV-6` |

## Effetti collaterali

- Insert in `contact_messages` (via `StoreContactMessageAction`), update di `status`/`forwarded_at`
  (via `UpdateContactMessageStatusAction`).
- Una mail sincrona alla casella `techplanner.contact.recipient` (via `SendContactMessageAction`).
- `Log::error` per ogni passo fallito.

## Errori

- Nessuna eccezione verso il chiamante: ogni `Throwable` di archivio, inoltro o aggiornamento stato è catturato e
  tradotto nell'esito.

## Non fa

- Non valida i dati né controlla honeypot e throttle: lo fa `SubmitContactFormAction`.
- Non ritenta l'inoltro fallito né mette la mail in coda.
- Non manda conferme al mittente (nessuna mail verso indirizzi inseriti da anonimi).
