---
title: "Contratti — modulo TechPlanner"
type: index
tags: [contracts, actions, techplanner]
created: 2026-11-24
updated: 2026-11-24
---

# Contratti del modulo TechPlanner

Cosa promettono le Action del dominio che scrivono dati, mandano mail o chiamano servizi esterni. Ogni invariante ha un
ID stabile; il group Pest la prova (`vendor/bin/pest Modules/TechPlanner/tests --group=<ID>`), «—» è debito dichiarato.
L'elenco dei contratti obbligatori del modulo è in `tests/Unit/Docs/ActionContractsTest.php`.

Leggili prima di chiamare, modificare o imitare un'Action del form di contatto o del geocoding. Formato:
`Modules/Xot/docs/rules/action-behavioral-contract.md`.

## Contratti di Action

- [SubmitContactFormAction](submit-contact-form-action.md) — POST del form: honeypot, validazione, esito in sessione.
- [DeliverContactMessageAction](deliver-contact-message-action.md) — archivia, inoltra, decide l'esito `Sent`/`Received`/`Failed`.
- [SendContactMessageAction](send-contact-message-action.md) — mail sincrona alla casella del titolare, oggetto fisso.
- [PurgeExpiredContactMessagesAction](purge-expired-contact-messages-action.md) — cancella i messaggi scaduti; inerte senza retention.
- [UpdateAllClientCoordinatesAction](update-all-client-coordinates-action.md) — geocodifica con Google i clienti senza coordinate.
