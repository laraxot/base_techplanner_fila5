---
title: "Contratti del modulo Gdpr"
type: index
tags: [contracts, actions, gdpr]
created: 2026-11-18
updated: 2026-11-26
---

# Contratti del modulo Gdpr

Cosa promettono le Action del modulo Gdpr che scrivono dati personali o hanno effetti sulla sessione: salvataggio e revoca dei
consensi, cancellazione dell'account, esiti della registrazione. Ogni invariante ha un ID `GDPR-<OPERAZIONE>-INV-<N>`; con un
group Pest si lancia `cd laravel && vendor/bin/pest Modules/Gdpr/tests --group=<ID>`, «— (non dimostrato)» è debito dichiarato.

Quando leggerli: prima di chiamare, modificare o imitare una di queste Action, e prima di aggiungere «per completezza» un
comportamento che la sezione «Non fa» esclude. Formato: `Modules/Xot/docs/rules/action-behavioral-contract.md`; il test
`Modules/Xot/tests/Unit/Docs/ActionContractsAreCompleteTest.php` controlla sezioni e `@contract` nel docblock.

## Formato

Un file per Action, nome in kebab-case della classe, frontmatter `type: contract` e `action: "<FQCN>"`, sei sezioni nell'ordine:
`Input`, `Output`, `Invarianti` (tabella `ID | Regola | Group Pest`), `Effetti collaterali`, `Errori`, `Non fa`. Il docblock
dell'Action contiene `@see docs/contracts/<file>.md` e `@contract docs/contracts/<file>.md`. Chi cambia il comportamento aggiorna
il contratto nello stesso commit.

## Contratti

- [SaveGdprConsentsAction](save-gdpr-consents-action.md) — prova dei tre consensi della registrazione, solo INSERT; 5 invarianti, tutte con group.
- [RevokeGdprConsentsAction](revoke-gdpr-consents-action.md) — revoca di tutti i consensi senza cancellare righe; 5 invarianti, con group ma test rosso nell'ultimo esito noto.
- [DeleteAccountAction](delete-account-action.md) — art. 17: disattiva l'account, revoca consensi e token, conserva la prova; 5 invarianti, nessun group.
- [UpdateGdprConsentsAction](update-gdpr-consents-action.md) — cambio di consenso dal profilo: delega a Save e aggiunge righe; 1 invariante, nessun group. Nessun chiamante nel repository.
- [SaveRegistrationConsentsAction](save-registration-consents-action.md) — percorso legacy del listener `UserRegistered` (sette trattamenti, salta in silenzio i mancanti); 3 invarianti, nessun group. Nessun codice emette l'evento.
- [HandleSuccessfulRegistrationAction](handle-successful-registration-action.md) — login, mail di verifica non bloccante, notifica, redirect; 4 invarianti, nessun group.
- [HandleRegistrationErrorAction](handle-registration-error-action.md) — log dell'errore e avviso generico; 2 invarianti, nessun group. Nessun chiamante nel repository; log con IP e messaggio d'eccezione.

## Stato di copertura (2026-11-26)

| Misura | Valore |
|---|---|
| Contratti completi (sei sezioni, `action` esistente, `@contract` nel docblock) | 7 |
| Invarianti dichiarate | 25 |
| Con group Pest e test non rosso nell'ultimo esito noto | 5 (`GDPR-SAVE-INV-1`…`5`) |
| Con group Pest ma test rosso nell'ultimo esito noto (2026-11-24, non rieseguito) | 5 (`GDPR-REVOKE-INV-1`…`5`) |
| Non dimostrate | 15 (`GDPR-DELETE-INV-1`…`5`, `GDPR-UPDATE-INV-1`, `GDPR-REGCONS-INV-1`…`3`, `GDPR-REGOK-INV-1`…`4`, `GDPR-REGERR-INV-1`…`2`) |

Il 2026-11-26 i tre contratti di Save, Revoke e Delete, già presenti il 2026-11-25, risultavano cancellati dal commit `bb71164f`
(riordino «ceiling 100» dei docs) pur essendo richiesti dal docblock, dall'ADR e dai test: sono stati ripristinati e allineati al
codice. Se quel riordino ricapita, `ActionContractsAreCompleteTest` non lo segnala (controlla solo i file che esistono).

## Backlog contract

Nessuna Action che scrive dati personali o chiama servizi esterni è senza contratto. Restano senza, di proposito:

- `Consent\CollectGdprConsentsAction`: funzione pura (tre booleani in un array), nessun effetto.
- `Validation\ValidateGdprConsentAction`: solo validazione, nessuna scrittura.
- `Validation\ValidateUserDataAction`: sola lettura di `users` per rifiutare un'email già registrata; il messaggio rivela che
  l'email esiste (enumerazione degli account), compromesso da decidere con la privacy del progetto ospite.
- `Cookie\GetCookieInventoryAction`: legge la configurazione, nessuna scrittura (il perché del banner è nell'ADR del cookie banner).

## Backlog test

Invarianti senza group Pest, in ordine di rischio per la privacy:

- `GDPR-DELETE-INV-1`…`5`: nessun test del modulo esercita `DeleteAccountAction`. Prova indiretta fuori pacchetto:
  `Modules/Fixcity/tests/Feature/Privacy/AccountDeletionFromSettingsTest.php` (copre INV-3, INV-4 in parte, INV-5 in parte; senza
  group). Serve un test nel modulo Gdpr su transazione, ability `deleteOwnAccount`, `metadata.reason` e token revocati.
- `GDPR-REVOKE-INV-1`…`5`: riportare verde `tests/Unit/Actions/RevokeGdprConsentsActionTest.php` (la `UserFactory` scrive
  `users.state`, assente nel DB di prova condiviso) e convertirlo in Pest.
- `GDPR-REGOK-INV-1`…`4`, `GDPR-REGERR-INV-1`…`2`: i test esistenti controllano solo la firma per riflessione.
- `GDPR-REGCONS-INV-1`…`3`, `GDPR-UPDATE-INV-1`: il test del listener usa un'Action finta.
