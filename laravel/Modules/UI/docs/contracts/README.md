---
title: "Contratti — UI"
type: index
module: UI
tags: [contracts, actions, ui, blocchi, icone]
created: 2026-11-24
updated: 2026-11-26
owner: UI
qmd: "UI contract comportamentali blocchi icone giorni calendario dati utente invarianti pest group copertura backlog"
---

# Contratti del modulo UI

Un contratto descrive cosa **promette** un'Action (input, output, invarianti con ID stabile, effetti collaterali, errori, cosa non fa) e distingue il **promesso** dal **dimostrato**:
la colonna `Group Pest` contiene l'ID solo se esiste un test con `->group('<ID>')` (`cd laravel && vendor/bin/pest --group=<ID>`), altrimenti «— (non dimostrato)».
Regola e formato: [action-behavioral-contract](../../../Xot/docs/rules/action-behavioral-contract.md), ADR [0012](../../../Xot/docs/adr/0012-behavioral-contract-governance.md).
Un file per Action, nome in kebab-case della classe, sei sezioni nell'ordine `Input`, `Output`, `Invarianti`, `Effetti collaterali`, `Errori`, `Non fa`;
il docblock della classe contiene `@see` e `@contract docs/contracts/<file>.md`. Scheletro: [_template](_template.md). Perché le scelte di UI sono quelle: [ADR del modulo](../adr/README.md).

UI è il layer di presentazione condiviso: nessuna delle sue Action scrive su database o chiama servizi esterni (al più una riga di log), quindi nessun contratto riguarda denaro o permessi.
Il rischio che i contratti descrivono è un altro: dati personali esposti all'interfaccia (`GetUserDataAction`), blocchi che spariscono senza errore (`GetLocalizedBlockDataAction`, `GetAllIconsAction`) e comportamenti che il nome non fa indovinare (`GetDaysMappingAction` senza domenica, `ApplyCalendarToPanelAction` che non fa nulla).

## Stato di copertura (misurato il 2026-11-26)

| Misura | Valore |
|---|---|
| Action in `app/Actions` (file `.php`) | 6 |
| Action con contratto e docblock `@see`/`@contract` | 6 (tutte; 3 scritti il 2026-11-26) |
| Invarianti con ID | 24 |
| Invarianti dimostrate (group Pest) | 16 (67%) |
| Invarianti non dimostrate | 8 |
| Contratti riletti contro il sorgente e i test il 2026-11-26 | 6 su 6 |

I group sono stati aggiunti il 2026-11-26 a `tests/Unit/GetAllIconsActionTest.php` (solo annotazione, nessun test nuovo). Un group non garantisce che il test sia verde: i test non sono stati rieseguiti in questo passaggio (Pest scrive sul database di sviluppo).

## Contratti

| Contratto | Scopo | Invarianti dimostrate |
|---|---|---|
| [get-all-blocks-action](get-all-blocks-action.md) | Elenca i blocchi del page builder dalle cartelle `Filament/Blocks` dei moduli; il nome è la chiave `type` dei contenuti. | 2/2 |
| [resolve-localized-block-data-action](resolve-localized-block-data-action.md) | `GetLocalizedBlockDataAction`: delega a Cms la localizzazione dei dati di un blocco, senza dipendere da Cms. | 4/4 |
| [get-user-data-action](get-user-data-action.md) | Dati dell'utente autenticato (nome, email, avatar, ruolo, permessi) per l'interfaccia; nessun chiamante in produzione. | 5/5 (INV-4: esito dei test da riverificare) |
| [get-all-icons-action](get-all-icons-action.md) | Icone SVG di tutti i set blade-icons, lette dal filesystem per reflection. | 5/6 |
| [get-days-mapping-action](get-days-mapping-action.md) | Giorni lunedì-sabato (senza domenica) del campo orari di apertura. | 0/4 |
| [apply-calendar-to-panel-action](apply-calendar-to-panel-action.md) | Calendario sul pannello Filament: oggi restituisce il pannello invariato (disabilitato per Filament v4). | 0/3 |

Il nome del file del secondo contratto è quello storico: la classe è `GetLocalizedBlockDataAction` (vedi «Limiti noti» nel contratto).

## Backlog contract

Nessuna Action di UI scrive dati o chiama servizi esterni, e tutte e 6 hanno un contratto: niente in backlog. Da rivedere se cambiano:

- `ApplyCalendarToPanelAction`: quando il calendario viene riattivato (`ApplyCalendarToPanelAction.php.disabled` ha la versione con il plugin) il contratto va riscritto.
- `GetUserDataAction`: se viene collegata a un'API o a una vista condivisa, rivedere «Non filtra i dati per destinatario».

## Backlog test

Invarianti senza group (servono test nuovi, non scritti qui):

| Contratto | Invarianti senza group | Cosa servirebbe |
|---|---|---|
| get-days-mapping-action | UI-DAYS-INV-1..4 | un test che fissi le sei chiavi, l'ordine, la lingua delle etichette e la locale con `first_day_of_week = 0` |
| apply-calendar-to-panel-action | UI-CALENDAR-INV-1..3 | un test che passi un `Panel` e verifichi che sia la stessa istanza, e il log con `app.debug` vero/falso |
| get-all-icons-action | UI-ICONS-INV-6 | un test con una factory senza proprietà `sets` (o con valore non iterabile) che attende `[]` |

Casi particolari tra le invarianti con group:

- `UI-USERDATA-INV-4`: il contratto del 2026-11-24 dava per rossi due dei tre test con questo group; il helper dei test è stato corretto dopo. Rieseguire `cd laravel && vendor/bin/pest Modules/UI/tests/Unit/GetUserDataActionTest.php --group=UI-USERDATA-INV-4`.
- `UI-USERDATA-INV-5`: manca il ramo «profilo caricato con avatar».
- `UI-ICONS-INV-1`: manca il caso di un set senza prefisso.
- `UI-BLOCKS-INV-1`: il test non prova che nessun blocco venga da altre cartelle.

## Difetti di codice emersi (non corretti: solo documentazione)

- `app/Actions/Datetime/GetDaysMappingAction.php:46-53`: la domenica non è tra i giorni; `OpeningHoursField`, `OpeningHoursColumn` e `OpeningHoursRule` non possono gestirla. Con una locale con `first_day_of_week = 0` la mappa si sposta.
- `app/Actions/Icon/GetAllIconsAction.php:34`: legge per reflection la proprietà privata `sets` di blade-icons; un aggiornamento che la rinomina dà `[]` senza errori. Un percorso del set inesistente lancia `DirectoryNotFoundException` (riga 74).
- `app/View/Components/Render/Block.php:49-52`: `deprecated` e `view not exists` sono stringhe inglesi fisse, non chiavi nei file lingua.
- `app/Providers/UIServiceProvider.php:15-17` rinvia a `docs/geo-boundary.md`, che non esiste.

## Altri file della cartella

- [INDEX](INDEX.md): elenco dei file di contratto. [index](index.md): registro con i comandi per i group.
- [_template](_template.md): scheletro di un nuovo contratto.

## Harness minimo: ownership, evidenza e recupero (2026-11-27)

I contratti di **module_ui_fila5** restano accanto alle Action, interfacce o superfici di questo package; root e Xot definiscono lo standard, non copiano le promesse. Un contratto comportamentale esplicita **Input, Output, Invarianti, Effetti collaterali, Errori, Non fa**; ogni ID di invariante punta a un group Pest effettivo oppure segnala `non dimostrata`. Se esiste la classe, il docblock deve rimandare al file con `@contract` e `@see`; per temi senza classi PHP non inventare Action/contratti.

- [Standard Xot](https://github.com/laraxot/module_xot_fila5/blob/dev/docs/contracts/contract-authoring-standard.md) · [ownership root](https://github.com/laraxot/base_ptvx_fila5/blob/dev/docs/adr/0001-harness-minimo-e-ownership.md) · [runbook ECC/Second Brain](https://github.com/laraxot/base_ptvx_fila5/blob/dev/docs/harness/README.md).
- **BMAD**: prima di cambiare una promessa, fissa nella story owner scope, esclusioni, evidenza e approvazioni richieste.
- **ECC**: i marker di merge rendono invalido l'indice; citare una suite non significa averla eseguita. Distingui `pass`, `fail`, `non eseguito` e registra il debito in [rollout #15](https://github.com/laraxot/base_ptvx_fila5/issues/15).
