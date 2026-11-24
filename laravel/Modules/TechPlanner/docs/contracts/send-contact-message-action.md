---
title: "Contratto — SendContactMessageAction"
type: contract
action: "Modules\TechPlanner\Actions\Contact\SendContactMessageAction"
tags: [contract, action, contatti, mail]
created: 2026-11-24
updated: 2026-11-24
---

# SendContactMessageAction

Sorgente: `app/Actions/Contact/SendContactMessageAction.php`. Chiamata solo da `DeliverContactMessageAction`.

## Input

- `ContactMessageData $data`, `string $recipient` (già validato), `string $pageLocale`.

## Output

- `void`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| TP-CONTACT-SEND-INV-1 | Oggetto fisso da traduzione (`techplanner::contact_message.mail.subject.label`): nessun testo dell'utente nelle intestazioni. | `TP-CONTACT-SEND-INV-1` |
| TP-CONTACT-SEND-INV-2 | `Reply-To` = email del mittente, nome ripulito dai caratteri di controllo (nessuna intestazione iniettata, nessun `Bcc`). | `TP-CONTACT-SEND-INV-2` |
| TP-CONTACT-SEND-INV-3 | Corpo in testo semplice con i campi compilati, lingua della pagina, istante di presa visione dell'informativa e messaggio. | `TP-CONTACT-SEND-INV-3` |

## Effetti collaterali

- Una mail sincrona (`Mail::raw`) al destinatario.

## Errori

- Lancia l'eccezione del trasporto se l'invio fallisce (la cattura `DeliverContactMessageAction`).

## Non fa

- Non scrive nel database: l'archivio è di `StoreContactMessageAction`.
- Non usa code né template HTML.
