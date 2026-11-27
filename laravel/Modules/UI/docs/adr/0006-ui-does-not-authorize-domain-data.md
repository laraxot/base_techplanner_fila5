---
title: "ADR — UI è il layer condiviso e non possiede né autorizza il dominio"
type: decision
status: proposed
created: 2026-11-23
updated: 2026-11-26
module: UI
decision-makers: UI module owner
qmd: "ui does not authorize domain data"
---

# UI è il layer condiviso e non possiede il dominio Geo

## Contesto

UI raccoglie componenti Filament, widget, blocchi e integrazioni riusabili. Per
mappe e geocoding espone `MapServiceContract` e `GeocodingServiceContract`, con
implementazioni Null quando Geo non è installato; la documentazione descrive il
bridge verso Geo come opzionale. La decisione risponde a questa domanda: quale
responsabilità deve avere UI quando un componente visuale usa dati di dominio?

## Driver della decisione

- riuso dei componenti senza importare il dominio di un modulo;
- funzionamento anche senza Geo tramite fallback espliciti;
- rispetto delle estensioni `XotBase` per i componenti Filament;
- separazione tra presentazione, query e autorizzazione del modulo owner.

## Alternative scartate

- Duplicare form, colonne, widget e blocchi nei singoli moduli: aumenterebbe la
  divergenza tra interfacce equivalenti.
- Rendere UI proprietaria dei modelli e delle query Geo: legherebbe il layer comune
  a un dominio opzionale.
- Usare classi concrete Filament o provider Geo direttamente nei consumer:
  bypasserebbe estensioni e fallback del modulo UI.

## Decisione

UI è **il layer condiviso di presentazione e contratti**, non il proprietario dei
dati di dominio. I consumer forniscono query, policy e implementazioni concrete;
UI consuma i contratti mappa/geocoding e usa `NullMapServiceAdapter` o
`NullGeocodingServiceAdapter` quando Geo non è disponibile. Le azioni sensibili restano
soggette alle policy del modulo owner.

## Conseguenze

- Buono, perché i componenti UI restano installabili e riusabili.
- Buono, perché l'assenza di Geo ha un comportamento esplicito.
- Cattivo, perché il fallback Null non fornisce dati: il consumer deve registrare
  l'implementazione reale quando serve.
- Cattivo, perché una UI correttamente renderizzata non sostituisce autorizzazione
  e ownership delle Actions o query.

## Conferma

- Contratti presenti: [`MapServiceContract`](../../app/Contracts/MapServiceContract.php) e [`GeocodingServiceContract`](../../app/Contracts/GeocodingServiceContract.php).
- Fallback Null canonici: [`NullMapServiceAdapter`](../../app/Adapters/Map/NullMapServiceAdapter.php) e [`NullGeocodingServiceAdapter`](../../app/Adapters/Map/NullGeocodingServiceAdapter.php).
- Estensioni `XotBase`: `cd laravel && rg -l 'extends \\?Filament' Modules/UI/app` non deve trovare nulla (nessun risultato il 2026-11-26).
- Riferimento: [`docs/scope-and-boundaries.md`](../scope-and-boundaries.md).
- Nessun test sui fallback Null né sull'uso dei contratti: nessuna conferma automatica; proposta: un test che risolva i due contratti dal container e verifichi che senza Geo rispondano i Null.

## Stato attuale

Il codice non fa quello che la Decisione descrive, per questo lo stato resta `proposed`:

- `app/Providers/UIServiceProvider.php:15-17` dichiara «Nessun binding Geo/Map/Location» e rinvia a `docs/geo-boundary.md`, che **non esiste** in `docs/` (controllato il 2026-11-26). Nessun service provider lega `MapServiceContract` o `GeocodingServiceContract`.
- I due contratti di UI non hanno consumer fuori da UI (`rg` sui nomi in `Modules/`): Geo ha il proprio `GeocodingServiceContract` in `Modules/Geo/app/Contracts/`, separato.
- `app/Services/Map/NullMapService.php` e `NullGeocodingService.php` esistono ancora ma sono `@deprecated`, senza binding né chiamanti, e stanno in `tests/Arch/debt.php:22-23` finché non vengono cancellati.
- Sul confine «UI non autorizza»: `GetUserDataAction` (UI) legge e restituisce email, ruolo e permessi dell'utente autenticato senza decidere nulla; il contratto [get-user-data-action](../contracts/get-user-data-action.md) dice cosa non fa. Non ha chiamanti in produzione.
