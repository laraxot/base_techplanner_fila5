---
title: "Indice operativo dei contratti — TechPlanner"
type: index
module: TechPlanner
status: active
updated: 2026-11-27
---

# Indice operativo dei contratti — TechPlanner

Registro dei contratti `type: contract` presenti in questa cartella (ADR 0012 di Xot). Ogni file ha le sei sezioni
canoniche (`Input`, `Output`, `Invarianti`, `Effetti collaterali`, `Errori`, `Non fa`) e il marker `action:`; la classe
implementatrice rimanda al file con `@contract docs/contracts/<file>.md`. Copertura = invarianti il cui group Pest
esiste davvero in `tests/` del modulo. Comandi da `laravel/`; un gruppo = una promessa:
`vendor/bin/pest Modules/TechPlanner/tests --group=<ID>`.

## Form di contatto

| Operazione | Contratto | Classe | Invarianti | Copertura | Comando di esempio |
|---|---|---|---|---|---|
| SubmitContactFormAction | [submit-contact-form-action](submit-contact-form-action.md) | `Modules\TechPlanner\Actions\Contact\SubmitContactFormAction` | `TP-CONTACT-SUBMIT-INV-1..4` | 4/4 | `vendor/bin/pest Modules/TechPlanner/tests --group=TP-CONTACT-SUBMIT-INV-1` |
| DeliverContactMessageAction | [deliver-contact-message-action](deliver-contact-message-action.md) | `Modules\TechPlanner\Actions\Contact\DeliverContactMessageAction` | `TP-CONTACT-DELIVER-INV-1..6` | 6/6 | `vendor/bin/pest Modules/TechPlanner/tests --group=TP-CONTACT-DELIVER-INV-1` |
| SendContactMessageAction | [send-contact-message-action](send-contact-message-action.md) | `Modules\TechPlanner\Actions\Contact\SendContactMessageAction` | `TP-CONTACT-SEND-INV-1..3` | 3/3 | `vendor/bin/pest Modules/TechPlanner/tests --group=TP-CONTACT-SEND-INV-1` |
| PurgeExpiredContactMessagesAction | [purge-expired-contact-messages-action](purge-expired-contact-messages-action.md) | `Modules\TechPlanner\Actions\Contact\PurgeExpiredContactMessagesAction` | `TP-CONTACT-PURGE-INV-1..3` | 2/3 | `vendor/bin/pest Modules/TechPlanner/tests --group=TP-CONTACT-PURGE-INV-1` |

## Clienti

| Operazione | Contratto | Classe | Invarianti | Copertura | Comando di esempio |
|---|---|---|---|---|---|
| UpdateAllClientCoordinatesAction | [update-all-client-coordinates-action](update-all-client-coordinates-action.md) | `Modules\TechPlanner\Actions\UpdateAllClientCoordinatesAction` | `TP-CLIENT-GEOCODE-INV-1..2` | 0/2 | — |

## Note

- L'inventario machine-readable e' [INDEX.md](INDEX.md); il formato e' descritto in [README.md](README.md) e il template in [_template.md](_template.md).
- Le decisioni dietro i contratti stanno in [../adr/](../adr/index.md) (soprattutto 0003 per il form di contatto).
