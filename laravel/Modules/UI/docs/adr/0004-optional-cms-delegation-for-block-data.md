---
title: "ADR — UI delega la localizzazione dei blocchi a Cms solo se presente, senza dipendere da Cms"
type: decision
status: accepted
created: 2026-11-24
updated: 2026-11-26
module: UI
decision-makers: UI module owner
tags: [adr, blocks, cms, dependencies, localization]
related:
  - ../contracts/resolve-localized-block-data-action.md
qmd: "optional cms delegation for block data"
---

# ADR: delega opzionale a Cms per i dati dei blocchi

## Contesto

`app/View/Components/Render/Block.php` (componente Blade `x-ui::render.block`) disegna un blocco di contenuto con
la vista indicata in `data.view`. Le URL e i testi dei blocchi vanno localizzati, e chi sa farlo è
`Modules\Cms\Actions\ResolveLocalizedBlockDataAction` (usa `mcamara/laravel-localization`). Ma `module.json` di UI
richiede solo `Xot` e `User`: UI è un modulo di base che gira anche dove Cms non c'è, e Cms dipende da UI
(`Cms/app/Filament/Fields/PageContent.php` usa `GetAllBlocksAction` di UI). Un `use Modules\Cms\...` in UI creerebbe
una dipendenza circolare e romperebbe le installazioni senza Cms. Come localizza UI i dati dei blocchi senza
dipendere da Cms?

## Driver della decisione

- UI deve restare installabile e funzionante senza Cms (`module.json` richiede solo `Xot` e `User`).
- Nessuna dipendenza circolare: Cms dipende già da UI.
- Con Cms presente i blocchi devono uscire localizzati senza configurazione.
- La logica delle URL di pagina e della lingua è dominio di Cms, non di UI.

## Alternative scartate

- **`use` diretto della classe Cms**: dipendenza circolare UI ↔ Cms, errore fatale dove Cms non è installato.
- **Interfaccia in UI implementata da Cms e bindata nel provider di Cms**: più pulita sul piano dei tipi; non fatta
  perché c'è un solo implementatore e un solo chiamante. Resta la strada se nasce un secondo resolver.
- **Spostare la localizzazione dentro UI**: porterebbe in UI la dipendenza da `laravel-localization` e la logica
  delle URL di pagina, che è dominio di Cms.

## Decisione

- `app/Actions/Block/GetLocalizedBlockDataAction.php` nomina il resolver di Cms **come stringa**
  (`'Modules\Cms\Actions\ResolveLocalizedBlockDataAction'`), controlla `class_exists`, lo risolve dal container e
  chiama `execute()` se esiste; altrimenti ritorna i dati invariati.
- Il risultato di Cms passa per `normalizeViewData()`: le chiavi devono essere stringhe (diventano variabili della vista).
- Nessun file in `Modules/UI/app` importa (`use`) una classe di `Modules\Cms`.

## Conseguenze

- Buono: UI funziona da solo; con Cms installato i blocchi escono localizzati senza configurazione.
- Cattivo: il nome della classe è una stringa, PHPStan e il rename dell'IDE non la vedono: chi rinomina l'Action di
  Cms deve aggiornare la stringa. Il rischio si è avverato: Cms ha rinominato la classe in `ResolveLocalizedBlockDataAction`
  e la stringa è rimasta `GetLocalizedBlockDataAction`, quindi `class_exists` era false e i blocchi non venivano localizzati,
  senza errori (corretto il 2026-11-25, come scrive il docblock di `GetLocalizedBlockDataAction.php`).
  Lo rileva ora il test «names a Cms resolver class that really exists» (group `UI-BLOCKDATA-INV-1`), saltato se Cms non è installato.
- Il pattern vale per ogni nuova delega da UI verso un modulo che dipende da UI.

## Conferma

- `cd laravel && vendor/bin/pest Modules/UI/tests/Unit/Actions/Block/GetLocalizedBlockDataActionTest.php`
  (group `UI-BLOCKDATA-INV-1..4`): delega, ritorno invariato senza resolver valido, rifiuto delle chiavi non stringa,
  esistenza della classe di Cms e assenza di `use Modules\Cms\` in `UI/app`.
- `cd laravel && rg -n '^use Modules\\Cms\\' Modules/UI/app` non trova nulla (controllato il 2026-11-26).
- `module.json` di UI richiede solo `Xot` e `User`: revisione a ogni modifica del file.

## Stato attuale

Il nome dell'Action UI è cambiato rispetto alla versione precedente di questo ADR: la classe è `GetLocalizedBlockDataAction` (convenzione `Get*`,
ADR Xot [0016](../../../Xot/docs/adr/0016-action-names-get-not-resolve.md)), non `ResolveLocalizedBlockDataAction`; quest'ultimo è il nome della classe di **Cms**.
Il contratto conserva il nome file storico `resolve-localized-block-data-action.md` perché il docblock e i test lo citano.
