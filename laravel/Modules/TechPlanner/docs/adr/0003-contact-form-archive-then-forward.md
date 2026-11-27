---
title: "ADR — Il form di contatto archivia prima e dice «inviato» solo se la mail è partita"
type: decision
status: accepted
created: 2026-11-24
updated: 2026-11-24
related:
  - ../../app/Actions/Contact/DeliverContactMessageAction.php
  - ../../app/Actions/Contact/SubmitContactFormAction.php
  - ../../config/contact.php
  - ../stories/privacy-gdpr-remediation.story.md
---

# ADR: il form di contatto archivia prima e dice «inviato» solo se la mail è partita

## Contesto

- Il sito TechPlanner riceve richieste di preventivo da studi odontoiatrici e medici: un messaggio perso è un cliente perso.
- La story `privacy-gdpr-remediation` chiede un form con endpoint reale, validazione, CSRF, rate limit/antispam,
  retention e un messaggio non rivelatore; la casella che riceve e il periodo di conservazione sono decisioni del
  titolare ancora `DA CONFERMARE`, e non si scelgono "per inferenza".
- Il trasporto e-mail può fallire; anche il database.
- Domanda: in che ordine archiviare e inoltrare, e cosa dire all'utente in ogni caso?

## Decisione

- `SubmitContactFormAction` (rotta `techplanner.contact.submit`, gruppo `web`, `throttle:5,10`): honeypot `website` →
  validazione (`ContactMessageData::formRules()`) → `DeliverContactMessageAction`.
- `DeliverContactMessageAction`: **archivio prima** (`StoreContactMessageAction`, stato `Pending`, `privacy_accepted_at`),
  poi inoltro sincrono (`SendContactMessageAction`) solo se `ResolveContactRecipientAction` trova un indirizzo valido.
- Esito: `Sent` solo se la mail è partita; `Received` se archiviato ma non inoltrato; `Failed` se non è riuscito nulla.
  Stato archiviato: `Forwarded` / `ForwardFailed` / resta `Pending` senza destinatario.
- `config/contact.php` non ha default: `recipient` vuoto = nessun inoltro; `retention_days` vuoto = nessuna cancellazione
  (`PurgeExpiredContactMessagesAction` inerte, comando non schedulato).
- Nei log solo la classe dell'eccezione, mai dati del mittente.

## Alternative scartate

- Solo mail, nessun archivio: un guasto SMTP perde il messaggio e l'utente legge "inviato".
- Mail in coda: l'esito mostrato sarebbe una promessa, non un fatto.
- Indirizzo di destinazione di default (es. quello in pagina contatti): la casella canonica la sceglie il titolare.
- Retention di default (es. 12 mesi): è una decisione del titolare; un default cancellerebbe dati senza base.

## Conseguenze

- Pro: nessun messaggio perso finché il database risponde; l'utente non legge mai un falso "inviato".
- Contro: i messaggi si accumulano in `contact_messages` finché il titolare non fissa la retention.
- Chi aggiunge campi al form li aggiunge a `ContactMessageData`, alla migrazione e al corpo della mail.

## Verifica

- `Modules/TechPlanner/tests/Unit/Actions/Contact/DeliverContactMessageActionTest.php` (groups `TP-CONTACT-DELIVER-INV-1..6`,
  `TP-CONTACT-SEND-INV-1..3`).
- `Modules/TechPlanner/tests/Unit/Actions/Contact/SubmitContactFormActionTest.php` (groups `TP-CONTACT-SUBMIT-INV-1..4`,
  `TP-CONTACT-PURGE-INV-1..2`).
