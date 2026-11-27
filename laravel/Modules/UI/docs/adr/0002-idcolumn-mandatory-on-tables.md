---
title: "ADR — IDColumn obbligatoria su ogni tabella Filament"
type: decision
status: accepted
created: 2026-11-25
updated: 2026-11-26
module: UI
decision-makers:
  - product
  - architecture
qmd: "ADR UI 0002 IDColumn mandatory tables RecordAnchor self-link copyable"
---

# ADR — IDColumn obbligatoria su ogni tabella Filament

Storia collegata: [idcolumn-mandatory-filament-tables](../bmad/stories/0012-idcolumn-mandatory-filament-tables.story.md). Il percorso storico senza numero è ora il puntatore
[id-column-mandatory-on-tables](id-column-mandatory-on-tables.md); il canone è questo file.

## Contesto

Senza colonna `id` tipizzata l'operatore non può citare la riga. Gli override di `getTableColumns()` dimenticano spesso `id`
(caso d'origine: tab Servizi, scheda 11254, nel modulo Ptv). Filament non emette un `id` stabile sul `<tr>`: serve un target HTML nella cella.

## Driver della decisione

- Operabilità: citare e condividere una riga con `#record-{id}`.
- DRY: un solo tipo di colonna (`Modules\UI\Filament\Tables\Columns\IDColumn`), non `TextColumn::make('id')` ad hoc.
- Ritorno dalla modifica: `RecordAnchor::appendTo()` deve puntare all'ancora della colonna.
- Evitare buchi dovuti a override completi di `getTableColumns()`.

## Alternative scartate

- Solo `TextColumn::make('id')`: nessuna ancora, nessun comportamento copiabile coerente.
- Iniettare `id` solo nelle pagine foglia di Progressioni: ripete il buco a ogni nuova tab.
- Mettere l'ancora sul `<tr>` via JS: fragile contro `wire:key` di Livewire.

## Decisione

**`IDColumn` obbligatoria come prima colonna di ogni tabella Filament**, perché dà operabilità, DRY e allineamento con `RecordAnchor`, con un unico proprietario in UI.

1. **Mandato**: ogni `getTableColumns()` / classe Table espone `'id' => IDColumn::make()` (o `IDColumn::make('id')`) come prima colonna.
2. **Proprietario**: il modulo **UI** possiede `IDColumn`; **Xot** possiede `RecordAnchor` (`Modules/Xot/app/Filament/Links/RecordAnchor.php`).
3. **Resa**: la cella è un self-link `<a id="record-{id}" href="#record-{id}" class="scroll-mt-24 ...">…</a>` (copia-link del browser, segnalibro di riga) più `copyable()` sullo stato grezzo dell'id.
4. **Storico Sigma (Ptv)**: le foglie sovrascrivono **`getTableColumns()`** (mai `getSigmaTableColumns` / `get{Dominio}TableColumns`) e chiamano `withIdColumn([...])` di `BaseSigmaHistoryScheda` (ADR Ptv 0005).
5. **Vietato**: `->label('ID')` scritto a mano (lo fa `LangServiceProvider` via `Column::configureUsing`); hook di colonne con prefisso di dominio (`getSigmaTableColumns`, `getListTableColumns`, …).

## Conseguenze

- Buono, perché deep-link `#record-*`, copia dell'id e parità tra le tab.
- Cattivo, perché le foglie che sovrascrivevano `getTableColumns` senza id vanno rifatte.
- Neutro, perché `ColumnBuilder::id()` resta una facciata verso `IDColumn` (`Modules/Xot/app/Filament/Builders/ColumnBuilder.php:37-39`).

## Conferma

- `cd laravel && vendor/bin/pest Modules/UI/tests/Feature/IDColumnTest.php`: il self-link `<a id="record-42" href="#record-42" ...>`, l'escape dei valori testuali e la stringa vuota per uno stato non identificabile. Non prova `copyable()` né l'ordine «prima colonna».
- Nessuna conferma automatica del mandato (ogni tabella ha `IDColumn`); proposta: un test arch/source in `Modules/UI/tests/Arch/` che fallisca se una classe con `getTableColumns()` usa `TextColumn::make('id')`, con i casi attuali (vedi sotto) in `tests/Arch/debt.php`.

## Stato attuale

Il mandato non è rispettato in questo checkout e la conferma citata dalla versione precedente di questo ADR non esiste:

- Misura del 2026-11-26 (`rg -l`, fuori dai test): 148 file definiscono `getTableColumns`; 90 usano `IDColumn::make`; 20 contengono `TextColumn::make('id')`, uno dei quali è il docblock di `IDColumn`
  (per esempio `Modules/Fixcity/app/Filament/Resources/TicketResource/Tables/TicketsTable.php`, `Comment/.../CommentsTable.php`, vari `Rating/*` e `Blog/*`).
- `IDColumn` (`Modules/UI/app/Filament/Tables/Columns/IDColumn.php:22-54`) è sortable, `html()`, `copyable()` con stato grezzo e senza `label()` fisso; la resa è quella del punto 3.
- Il test `NoDomainPrefixedTableColumnsTest`, la regola `.cursor/rules/gettablecolumns-no-domain-prefix.mdc`, `BaseSigmaHistoryScheda`/`withIdColumn()` e il modulo Ptv **non sono presenti** (cercati con `rg` e `ls` il 2026-11-26): i punti 4 e 5 valgono solo dove Ptv è installato.
- Il file `id-column-record-anchor.md` citato dalla versione precedente non esiste in `docs/`.
