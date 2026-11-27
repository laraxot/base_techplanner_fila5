---
title: "ADR — La cancellazione dell'account (art. 17) disattiva l'utente e conserva la prova"
type: decision
status: accepted
module: Gdpr
tags: [adr, gdpr, art-17, cancellazione, account]
created: 2026-11-24
updated: 2026-11-26
decision-makers: Gdpr module owner
related:
  - ../contracts/delete-account-action.md
  - ../../database/migrations/2026_11_12_000002_add_revocation_columns_to_consents_table.php
---

# ADR: la cancellazione dell'account disattiva l'utente e conserva la prova

## Contesto

- L'interessato può chiedere la cancellazione (GDPR art. 17); il titolare deve però poter dimostrare consensi e revoche (art. 7
  par. 1, art. 30) e, per alcuni progetti, conservare dati per obblighi di legge.
- `BaseUser` non usa `SoftDeletes` né uno scope globale: la purga differita e il back office devono continuare a vedere gli utenti
  cancellati (`Modules/User/app/Actions/Auth/BuildActiveUserProviderAction.php`, docblock).
- Il 12/11/2026 "elimina account" dava 500: `revoked_at`, `revoked_ip_address`, `metadata` non esistevano in `consents`
  (causa e rimedio nel commento di `database/migrations/2026_11_12_000002_add_revocation_columns_to_consents_table.php`; il
  documento `docs/account-deletion-consents-columns.md` è stato tolto dal riordino dei docs del 2026-11-25).
- Domanda: cosa fa, nel modulo condiviso, "cancella il mio account", e cosa resta al progetto?

## Driver della decisione

- Prova: consensi, revoche e richiesta di cancellazione devono restare dimostrabili (art. 7 par. 1, art. 30) anche dopo la chiusura
  dell'account.
- Effetto immediato: dopo «elimina il mio account» nessun accesso (web, API, «ricordami») deve funzionare.
- Agnosticismo: il modulo è condiviso e non conosce i dati personali degli altri moduli (profili, prenotazioni, segnalazioni),
  quindi non può decidere cosa anonimizzare.
- Compatibilità: purga differita e back office devono continuare a vedere gli utenti cancellati; nessuno scope globale sull'utente.
- Atomicità: i passi del modulo devono riuscire o fallire insieme.

## Decisione

`Account\DeleteAccountAction::execute()` (rotta `account.delete`, ability `deleteOwnAccount`):

1. revoca tutti i consensi (`Consent\RevokeGdprConsentsAction`);
2. registra la richiesta come riga `consents` di tipo `account_deletion`, con motivo in `metadata.reason`;
3. valorizza `deleted_at`/`deleted_by` sull'utente (nessun DELETE fisico);
4. revoca token Passport, refresh token e "ricordami" (`Modules\User\Actions\Auth\RevokeUserAccessAction`);
5. segna `deleted_at` sulle activity dell'utente, se il modulo Activity è installato;
6. chiude e invalida la sessione.

L'esclusione dal login sta nel provider utenti del modulo User (`BuildActiveUserProviderAction`), non qui. Nome ed email **non**
vengono toccati: anonimizzare è compito del progetto, che conosce la propria informativa.

## Alternative scartate

- DELETE fisico dell'utente: cancella a cascata anche la prova dei consensi e rompe le chiavi esterne degli altri moduli.
- `SoftDeletes` su `BaseUser`: lo scope globale nasconderebbe gli utenti a back office e purga; il filtro serve solo al login.
- Anonimizzazione nel modulo Gdpr: quali campi anonimizzare dipende dal progetto (profili, prenotazioni, segnalazioni) e il modulo
  non li conosce.

## Conseguenze

- Pro: l'account è chiuso subito ovunque (web, API, "ricordami") e la prova di consensi, revoca e richiesta resta.
- Contro: i dati personali restano finché il progetto non li anonimizza; serve una purga periodica (non esiste).
- Debito: la transazione è sulla connessione `user`, mentre `Consent` è su `gdpr` e `Activity` su `activity`: l'atomicità vale solo
  se le connessioni puntano allo stesso database.

## Conferma

- A valle, nel modulo User: `cd laravel && vendor/bin/pest Modules/User/tests/Feature/Auth/DeletedAccountAccessTest.php` fallisce se un
  utente con `deleted_at` entra ancora.
- Percorso HTTP completo, nel modulo Fixcity: `vendor/bin/pest Modules/Fixcity/tests/Feature/Privacy/AccountDeletionFromSettingsTest.php`
  (POST `/it/account/delete`: `deleted_at` valorizzato, riga `account_deletion` in `consents`, ospite dopo la risposta; senza
  `confirm` l'account resta). Non prova revoca dei consensi, token e activity.
- Nel modulo Gdpr nessun test esercita `DeleteAccountAction`: solo regola di review. Nessun `forceDelete()` né `delete()` dell'utente
  nell'Action, ability `deleteOwnAccount` e non `delete`; invarianti `GDPR-DELETE-INV-1`…`5` nel
  [contratto](../contracts/delete-account-action.md), tutte senza group.
