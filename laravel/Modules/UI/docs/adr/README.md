---
title: "ADR — UI"
type: index
module: UI
tags: [adr, decisioni, ui, blocchi, filament]
created: 2026-11-23
updated: 2026-11-26
owner: UI
qmd: "UI ADR architecture decision record MADR NNNN-slug IDColumn blocchi CMS conferma copertura"
---

# ADR del modulo UI

Il **perché** delle scelte sul layer di presentazione condiviso: come si scoprono i blocchi del page builder, cosa mostra un blocco rotto, come UI localizza i blocchi senza dipendere da Cms,
perché ogni tabella Filament ha una colonna `id` con ancora, e fin dove arriva la responsabilità di UI sui dati di dominio.

Leggili prima di cambiare `GetAllBlocksAction`, `Render/Block.php`, `IDColumn` o i contratti Map/Geocoding. Cosa promettono le singole Action: [contratti](../contracts/README.md).

## Metodo

Un ADR solo per una scelta difficile da invertire, sorprendente o frutto di un trade-off reale. Non è un diario. Una modifica sostanziale crea un nuovo ADR e segna il vecchio `superseded` (con `superseded_by`).
Il nome del file è `NNNN-argomento-in-kebab-case.md`, senza date (la data sta nella frontmatter): lo impone `Modules/Xot/tests/Unit/Docs/AdrFilenamesAreNumberedTest.php`.
Eccezioni: `README.md`, `INDEX.md`/`index.md`, `0000-template.md` e i puntatori `status: superseded`.
Regola canonica: [action-behavioral-contract](../../../Xot/docs/rules/action-behavioral-contract.md); standard condivisi: [Xot ADR](../../../Xot/docs/adr/README.md); template: [0000-template](0000-template.md).

## Formato

Frontmatter: `title`, `type: decision`, `status` (`proposed`, `accepted`, `deprecated`, `superseded`), `superseded_by` se superato, `created`, `updated`, `module`, `decision-makers`. Sezioni `##` in italiano, in quest'ordine:

1. `Contesto`: fatti, vincoli e la domanda.
2. `Driver della decisione`.
3. `Alternative scartate`: ogni alternativa seria con il motivo.
4. `Decisione`: cosa si fa e dove sta nel codice.
5. `Conseguenze`: buone e cattive.
6. `Conferma`: come si controlla che il codice rispetti la decisione (test con percorso che esiste, comando eseguibile da `laravel/`, o regola di revisione). Se non c'è un controllo automatico lo dice: «Nessuna conferma automatica oggi; proposta: …».

Se il codice di oggi contraddice l'ADR si aggiunge `## Stato attuale` con ciò che il codice fa davvero (file e riga); la storia non si riscrive.

## Decisioni

| ADR | Stato | Decisione in una riga | Conferma |
|---|---|---|---|
| [0001](0001-block-discovery-by-filament-blocks-folder.md) | accepted | I blocchi si scoprono da `Modules/*/app/Filament/Blocks/*.php`; il nome della classe è la chiave `type` dei contenuti. | test con group `UI-BLOCKS-INV-1`, `-2`; test Cms `FilamentBuilderBlocksTest` |
| [0002](0002-idcolumn-mandatory-on-tables.md) | accepted (mandato non rispettato) | Ogni tabella Filament ha `IDColumn` come prima colonna (self-link `#record-{id}`, copiabile). | `IDColumnTest` prova solo la resa; il mandato non ha conferma |
| [0003](0003-missing-block-view-shows-type-not-content.md) | accepted | Vista mancante: avviso con vista e tipo, mai il contenuto del blocco. | `RenderBlockMissingViewTest` (un caso, senza group) |
| [0004](0004-optional-cms-delegation-for-block-data.md) | accepted | UI nomina il resolver di Cms come stringa e lo usa solo se la classe esiste; mai un `use` di Cms. | test con group `UI-BLOCKDATA-INV-1..4` |
| [0005](0005-ui-blocks-use-cms-localization.md) | accepted | Testi e URL dei blocchi arrivano dai dati del CMS, con ripiego autonomo. | stessi test di 0004; il divieto di testi nel codice è solo revisione |
| [0006](0006-ui-does-not-authorize-domain-data.md) | proposed | UI è il layer di presentazione e contratti; non possiede né autorizza i dati di dominio (Geo). | nessun test; i contratti e i Null esistono ma nessuno li usa |

Puntatori (`superseded`, senza numero): [id-column-mandatory-on-tables](id-column-mandatory-on-tables.md) → 0002; [optional-cms-delegation-for-block-data](optional-cms-delegation-for-block-data.md) → 0004.

## Stato di copertura (misurato il 2026-11-26)

- 6 ADR numerati (5 `accepted`, 1 `proposed`) e 2 puntatori `superseded`. Tutti hanno le sei sezioni nell'ordine, `created`, `updated` e intestazioni in italiano; l'audit dei documenti non riporta gap su `docs/adr`.
- Conferma con un test Pest esistente: 0001, 0003, 0004, 0005 (0003 senza group). Conferma parziale: 0002. Nessuna conferma automatica: 0006.
- ADR con `## Stato attuale` (il codice dice altro): 0002, 0003, 0004, 0005, 0006.
- I test citati non sono stati rieseguiti in questo passaggio (Pest scrive sul database di sviluppo): i percorsi esistono, l'esito va riverificato con i comandi nelle sezioni `Conferma`.

## Decisioni aperte (servono un umano)

- **0002**: l'ADR dice «obbligatoria» ma 19 file usano ancora `TextColumn::make('id')` e la conferma originale (`NoDomainPrefixedTableColumnsTest`, regola `.cursor`) non esiste. Aggiungere il test arch con il debito in `tests/Arch/debt.php`, oppure declassare il mandato a «consigliata».
- **0006**: nessun consumer dei contratti Map/Geocoding di UI e nessun binding (`UIServiceProvider.php:15-17`). Accettare (e collegare Geo), oppure togliere contratti e adapter e chiudere l'ADR come `deprecated`. Il file `docs/geo-boundary.md`, citato nel provider, non esiste.
- **0003 / 0005**: `title` e `message` dell'avviso di vista mancante sono stringhe inglesi fisse in `Block.php:49-52`; vanno spostate nei file lingua (modifica di codice, non fatta qui).
- Il contratto della localizzazione ha nome file legacy (`resolve-localized-block-data-action.md`, classe `GetLocalizedBlockDataAction`): rinominarlo richiede `git mv`.

## Riferimenti

- Policy trasversale su dati sacri e test isolati: [0013-dati-sacri-migrazioni-e-test](../../../Xot/docs/adr/0013-dati-sacri-migrazioni-e-test.md).
- Stato di ciascun ADR: [index.md](index.md).

## Harness minimo: ownership, evidenza e recupero (2026-11-27)

Questo indice appartiene a **module_ui_fila5**: ogni decisione su codice, dominio o tema va nell'ADR del package owner; il root registra soltanto i vincoli di composizione. Un ADR richiede una scelta reale con alternative e conseguenze, più una **Conferma** ripetibile (oppure la dichiarazione esplicita che manca). Non creare ADR fittizi per riempire un indice.

- [Confine LaravelDay/harness Xot](https://github.com/laraxot/module_xot_fila5/blob/dev/docs/adr/0042-laravel-day-harness-adoption-boundary.md); [ownership root](https://github.com/laraxot/base_ptvx_fila5/blob/dev/docs/adr/0001-harness-minimo-e-ownership.md).
- **BMAD**: la story owner-local conserva `scope`, `must_not_change`, `evidence`, `approval_required` nei cambi rischiosi.
- **ECC**: nessun marker di merge; distinguere la prova eseguita dal semplice riferimento a un test; se la conferma non è disponibile segnare `non eseguita`.
- **Second Brain**: QMD/Graphify e `.harness/memory/{facts,lessons}.md` sono puntatori a evidenza datata, non copie degli ADR. [Runbook](https://github.com/laraxot/base_ptvx_fila5/blob/dev/docs/harness/README.md) · [Rollout #15](https://github.com/laraxot/base_ptvx_fila5/issues/15).
