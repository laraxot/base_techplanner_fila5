---
title: "Contratti — modulo TechPlanner"
type: index
tags: [contracts, actions, techplanner]
created: 2026-11-24
updated: 2026-11-27
---

# Contratti del modulo TechPlanner

Cosa promettono le Action del dominio che scrivono dati, mandano mail o chiamano servizi esterni. Ogni invariante ha un
ID stabile; il group Pest la prova (`vendor/bin/pest Modules/TechPlanner/tests --group=<ID>`), «—» è debito dichiarato.
L'elenco dei contratti obbligatori del modulo è in `tests/Unit/Docs/ActionContractsTest.php`.

Leggili prima di chiamare, modificare o imitare un'Action del form di contatto o del geocoding. Formato:
`Modules/Xot/docs/rules/action-behavioral-contract.md`.

## Formato

Un file per Action, nome in kebab-case della classe, frontmatter `type: contract` e `action: "Modules\\TechPlanner\\Actions\\..."`,
e queste sei sezioni nell'ordine:

```markdown
## Input
## Output
## Invarianti
## Effetti collaterali
## Errori
## Non fa
```

Il docblock dell'Action rimanda al file con `@contract docs/contracts/<file>.md`. Template: [_template.md](_template.md).
Inventario machine-readable: [INDEX.md](INDEX.md); tabella di lavoro: [index.md](index.md).

## Contratti di Action

- [SubmitContactFormAction](submit-contact-form-action.md) — POST del form: honeypot, validazione, esito in sessione.
- [DeliverContactMessageAction](deliver-contact-message-action.md) — archivia, inoltra, decide l'esito `Sent`/`Received`/`Failed`.
- [SendContactMessageAction](send-contact-message-action.md) — mail sincrona alla casella del titolare, oggetto fisso.
- [PurgeExpiredContactMessagesAction](purge-expired-contact-messages-action.md) — cancella i messaggi scaduti; inerte senza retention.
- [UpdateAllClientCoordinatesAction](update-all-client-coordinates-action.md) — geocodifica con Google i clienti senza coordinate.

## Harness minimo: ownership, evidenza e recupero (2026-11-27)

I contratti di **module_techplanner_fila5** restano accanto alle Action, interfacce o superfici di questo package; root e Xot definiscono lo standard, non copiano le promesse. Un contratto comportamentale esplicita **Input, Output, Invarianti, Effetti collaterali, Errori, Non fa**; ogni ID di invariante punta a un group Pest effettivo oppure segnala `non dimostrata`. Se esiste la classe, il docblock deve rimandare al file con `@contract` e `@see`; per temi senza classi PHP non inventare Action/contratti.

- [Standard Xot](https://github.com/laraxot/module_xot_fila5/blob/dev/docs/contracts/contract-authoring-standard.md) · [ownership root](https://github.com/laraxot/base_ptvx_fila5/blob/dev/docs/adr/0001-harness-minimo-e-ownership.md) · [runbook ECC/Second Brain](https://github.com/laraxot/base_ptvx_fila5/blob/dev/docs/harness/README.md).
- **BMAD**: prima di cambiare una promessa, fissa nella story owner scope, esclusioni, evidenza e approvazioni richieste.
- **ECC**: i marker di merge rendono invalido l'indice; citare una suite non significa averla eseguita. Distingui `pass`, `fail`, `non eseguito` e registra il debito in [rollout #15](https://github.com/laraxot/base_ptvx_fila5/issues/15).
