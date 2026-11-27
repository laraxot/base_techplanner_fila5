---
title: "Contratto — GetLocalizedBlockDataAction (UI)"
type: contract
action: "Modules\\UI\\Actions\\Block\\GetLocalizedBlockDataAction"
module: UI
status: accepted
tags: [contract, action, blocks, cms, localization]
created: 2026-11-24
updated: 2026-11-26
qmd: "GetLocalizedBlockDataAction ResolveLocalizedBlockDataAction Cms class_exists delega blocchi localizzati"
---

# GetLocalizedBlockDataAction (UI)

Sorgente: `app/Actions/Block/GetLocalizedBlockDataAction.php` (il file del contract mantiene il nome storico
`resolve-localized-…`, perché i `@contract` lo citano). Delega a `Modules\Cms\Actions\ResolveLocalizedBlockDataAction`.
Perché è fatta così:
[ADR delega opzionale a Cms](../adr/0004-optional-cms-delegation-for-block-data.md). Chiamante: `View/Components/Render/Block.php::render()`.

## Input

- `array<string, mixed> $viewParams`: il `data` del blocco, già con chiavi stringa.

## Output

- `array<string, mixed>`: i dati risolti da `Modules\Cms\Actions\ResolveLocalizedBlockDataAction::execute()`, oppure
  `$viewParams` invariato se Cms non c'è, se il resolver non ha `execute()` o se non ritorna un array.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| UI-BLOCKDATA-INV-1 | Con il resolver di Cms disponibile, l'output è il suo risultato (UI non aggiunge né toglie chiavi). Il nome del resolver è una stringa: un test controlla che la classe esista davvero quando Cms è installato. | `UI-BLOCKDATA-INV-1` |
| UI-BLOCKDATA-INV-2 | Senza resolver utilizzabile l'input esce identico: l'assenza di Cms non è un errore. | `UI-BLOCKDATA-INV-2` |
| UI-BLOCKDATA-INV-3 | Le chiavi dell'output sono sempre stringhe (diventano variabili della vista). | `UI-BLOCKDATA-INV-3` |
| UI-BLOCKDATA-INV-4 | Nessun file di `UI/app` importa una classe `Modules\Cms\`: Cms è raggiunto solo per nome stringa. | `UI-BLOCKDATA-INV-4` |

Test: `tests/Unit/Actions/Block/GetLocalizedBlockDataActionTest.php` (il resolver di Cms è sostituito nel container: si prova la delega, non la localizzazione).

## Effetti collaterali

- Nessuno proprio. Risolve dal container la classe di Cms; gli effetti sono quelli del resolver di Cms (che non scrive).

## Errori

- `UnexpectedValueException('Block view data must have string keys.')` se il resolver di Cms ritorna un array con chiavi
  non stringa. Le eccezioni del resolver di Cms risalgono invariate.

## Non fa

- Non localizza nulla da sé: la logica (URL e locale) è in `Modules/Cms/app/Actions/ResolveLocalizedBlockDataAction.php`.
- Non sceglie la vista né controlla che esista (`Render\Block`).
- Non mette in cache il risultato.
- Non va "irrobustita" con `use Modules\Cms\...` o con un `require` di Cms in `module.json`: rompe l'indipendenza di UI.

## Limiti noti

- Nome del file legacy: la classe è `GetLocalizedBlockDataAction`, il file resta `resolve-localized-block-data-action.md` perché il `@contract` del docblock, i commenti dei test e gli ADR lo citano. Rinominarlo richiede `git mv` e l'aggiornamento di quei riferimenti.
- Il nome del resolver di Cms è una stringa nel codice (`GetLocalizedBlockDataAction.php`, variabile `$cmsAction`): una rinomina in Cms lo spegne senza errori. Lo segnala solo il test `names a Cms resolver class that really exists` (saltato se Cms non è installato).

## Riconciliazione documentale (2026-11-27)

Questo file aveva un conflitto Git irrisolto. La base è la variante più recente del contratto, con il riferimento a `app/Actions/Block/GetLocalizedBlockDataAction.php` **esistente su `dev`**; la sua semantica, i group Pest citati e gli eventuali effetti non sono stati rieseguiti in questa sessione. Il confronto con il codice e i test resta il gate ECC della story owner. [Tracciamento root #15](https://github.com/laraxot/base_ptvx_fila5/issues/15).
