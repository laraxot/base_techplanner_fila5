---
title: "Contratto — GetUserDataAction"
type: contract
action: "Modules\\UI\\Actions\\GetUserDataAction"
module: UI
status: accepted
tags: [contract, action, user, personal-data]
created: 2026-11-24
updated: 2026-11-26
qmd: "GetUserDataAction dati utente autenticato nome email avatar ruolo permessi profile extra UserData"
---

# GetUserDataAction

Regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`. Sorgente: `app/Actions/GetUserDataAction.php`. Espone dati personali dell'utente autenticato (nome, email, avatar,
ruolo, permessi, `profile.extra`) come `Modules\UI\Datas\UserData`. Nel checkout attuale non ha chiamanti in
produzione, solo test (`rg GetUserDataAction Modules --glob '*.php'` fuori da `UI/tests` trova solo un commento in `app/Data/UserData.php`): chi la collega a una vista o a un'API legge prima «Non fa».

## Input

- Nessun parametro. Legge `Auth::user()` (guard di default).

## Output

- `UserData|null`: `null` se nessuno è autenticato o se l'autenticato non implementa `Modules\Xot\Contracts\UserContract`.
- Altrimenti `id`, `name`, `email` (`getAttribute`, `''` se non stringa), `avatar` (URL del profilo caricato, poi
  `profile_photo_path`, poi `null`), `role` (il **primo** nome di ruolo), `permissions` (nomi di tutti i permessi,
  anche via ruolo), `settings` (`profile.extra` se array).

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| UI-USERDATA-INV-1 | Senza utente autenticato del dominio (`UserContract`) ritorna `null`, mai dati parziali (righe 29-33). | `UI-USERDATA-INV-1` |
| UI-USERDATA-INV-2 | Descrive solo l'utente autenticato: id, nome ed email sono i suoi attributi, non di altri (righe 72-78). | `UI-USERDATA-INV-2` |
| UI-USERDATA-INV-3 | Non carica relazioni: il profilo si usa solo se già caricato (`relationLoaded('profile')`), altrimenti `settings = []` (righe 36, 56-63). | `UI-USERDATA-INV-3` |
| UI-USERDATA-INV-4 | `role` è il primo ruolo (o `null` senza ruoli), `permissions` sono nomi (stringhe) (righe 49-52, 65-68). | `UI-USERDATA-INV-4` (3 test con questo group; esito non verificato qui, vedi sotto) |
| UI-USERDATA-INV-5 | `avatar` è l'URL del profilo se il profilo è caricato e ne ha uno; altrimenti `profile_photo_path` se è una stringa non vuota; altrimenti `null` (righe 35-47). | `UI-USERDATA-INV-5` (prova `profile_photo_path` e il caso `null`; il ramo «profilo caricato» non è provato) |

Test: `tests/Unit/GetUserDataActionTest.php`. L'utente è in memoria, con le relazioni `roles` e `permissions` impostate via `setRelation()`: si prova la logica dell'Action, non il database.
Il contratto del 2026-11-24 dava rossi `prende il primo ruolo, non tutti` ed `elenca i permessi per nome` (ruolo `null`, permessi vuoti). Da allora il helper `uiAuthUser()` sovrascrive `relationLoaded()` proprio per quel caso
(commento nel file); in questo passaggio i test non sono stati rieseguiti (Pest scrive sul database di sviluppo): `cd laravel && vendor/bin/pest Modules/UI/tests/Unit/GetUserDataActionTest.php --group=UI-USERDATA-INV-4` dice se il debito è chiuso.

## Effetti collaterali

- Nessuna scrittura. Legge ruoli e permessi tramite Spatie Permission (`getRoleNames()`, `getAllPermissions()`), che
  può interrogare il database se le relazioni non sono caricate.

## Errori

- Nessuna eccezione propria; errori del database su ruoli/permessi risalgono.

## Non fa

- Non accetta un utente come parametro: non usarla per descrivere un utente diverso da quello autenticato.
- Non filtra i dati per destinatario: il risultato contiene email, permessi e `profile.extra`; non va serializzato
  verso il browser o un'API pubblica senza scegliere i campi.
- Non decide cosa l'utente può fare: elenca i permessi, l'autorizzazione resta delle policy del modulo owner (ADR [0006](../adr/0006-ui-does-not-authorize-domain-data.md)).
- Non mette in cache.

## Limiti noti

- Limite noto: nessun chiamante in produzione; se verrà collegata a un'API o a una vista condivisa, il contratto va rivisto sul punto «Non filtra i dati per destinatario».
- `avatar` può essere un percorso relativo (`profile_photo_path`) e non un URL: dipende da come lo riempie il modello.

## Riconciliazione documentale (2026-11-27)

Questo file aveva un conflitto Git irrisolto. La base è la variante più recente del contratto, con il riferimento a `app/Actions/GetUserDataAction.php` **esistente su `dev`**; la sua semantica, i group Pest citati e gli eventuali effetti non sono stati rieseguiti in questa sessione. Il confronto con il codice e i test resta il gate ECC della story owner. [Tracciamento root #15](https://github.com/laraxot/base_ptvx_fila5/issues/15).
