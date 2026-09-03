# Xot Module Test Coverage

## Overview
This module has comprehensive test coverage with various test types implemented.

## Test Results
- **Tests Passed**: 0
- **Assertions**: 0
- **Test Types**: Unit, Feature, Integration tests

## Coverage Statistics
- **Files**: 0
- **Lines of Code**: 0
- **Classes**: 0
- **Methods**: 0
- **Coverage Rate**: 0%

## Test Categories
- Unit Tests
- Feature Tests
- Integration Tests

## Status
All tests are passing and coverage is being maintained.

## PHPStan swarm fix — 2026-09-02

Sessione Claude Sonnet 5 (6748f176), claim `docs/chat/claim-phpstan-542-swarm-2026-09-02.md`.
Lista di partenza: 279 errori Xot (401 righe raw, 120 coppie file:line uniche) da
`phpstan analyse Modules/Xot` livello max.

**Fix reali applicati** (nessun `@phpstan-ignore`):
- `typeCoverage.paramTypeCoverage`/`constantTypeCoverage`: tipizzati i parametri
  di closure mancanti in ~35 file (Actions, Filament, Middleware, Provider, test).
  `mixed` usato solo dove il valore è genuinely polimorfico e già narrowed con
  `is_*()` prima dell'uso (convenzione "mixed ultima spiaggia"); altrove tipo
  concreto dedotto da come il valore è costruito/usato (es. `string`, `Model`,
  `Blueprint`, `int|string`).
- `cast.string`/`cast.int`: cast ciechi `(string)`/`(int)` su valori mixed
  sostituiti con `SafeStringCastAction::cast()`/`SafeIntCastAction::cast()`
  (pattern già esistente nel modulo) o con narrowing esplicito upstream (es.
  `FilamentMemoryMonitorMiddleware`: dato un `array{...}` shape preciso invece di
  `array<string, mixed>`, i cast a valle diventano sicuri per costruzione).
- `method.deprecated`/`deprecatedClass`: sostituiti i simboli deprecati con
  l'alternativa indicata dal messaggio phpstan — `Doctrine\DBAL` `introspectTable()`
  → `introspectTableByUnquotedName()`, `listTableIndexes()` →
  `introspectTableIndexesByUnquotedName()`; `ReflectionParameter::getClass()` →
  `getType()` + `ReflectionNamedType`; Filament `VerifyCsrfToken` →
  `PreventRequestForgery`; Filament `Navigation\MenuItem` → `Actions\Action`;
  Filament `Tables\Columns\BooleanColumn` → `IconColumn::make()->boolean()`;
  `Illuminate\Contracts\Validation\Rule` → `ValidationRule` (riscritto
  `DateTimeRule::passes()/message()` in `validate()` con `$fail`); PHPUnit
  `expectExceptionMessage()` → `expectExceptionMessageIsOrContains()` (stesso
  comportamento "contains", deprecato per ambiguità in PHPUnit 13); Mockery
  `shouldDeferMissing()` rimosso (era ridondante: `makePartial()` già presente
  nella stessa chain, `shouldDeferMissing()` è un puro alias deprecato); Spatie
  Data `DataCollection::first()` → `toCollection()->first()`;
  `MetatagData::getColors()/getLogoHeight()` → property diretta `->colors` /
  `getBrandLogoHeight()` (verificato che siano equivalenti leggendo il corpo dei
  metodi, non solo il messaggio di deprecazione).
- `class.extendsDeprecatedClass`: `XotBasePlaceholder` (estendeva
  `Filament\Forms\Components\Placeholder`, deprecata) eliminata — zero call site
  nel repo, sostituita da tempo da `XotBaseTextEntry` (`extends TextEntry`, già
  presente e documentata come rimpiazzo).
- `class.implementsDeprecatedInterface`: `DateTimeRule` migrata da `Rule` a
  `ValidationRule` (vedi sopra).
- `clone.nonObject`/`argument.type` in `HasXotTable::getGridTableColumns()` e
  `table()`: aggiunto narrowing esplicito (`instanceof Column|LayoutComponent`,
  `array_filter` sul risultato di `getTableColumns()`) prima di `clone`/
  `Stack::make()`/`TableLayoutEnum::getTableColumns()`.
- Dead code rimosso: `XotBaseTableWidget::tableOLD()` (metodo mai chiamato in
  tutto il repo, rinominato "OLD" a suo tempo e mai ripulito) chiamava
  `getTableQuery()`/`getTableColumns()` deprecati senza motivo — cancellato
  insieme agli import diventati inutili.

**Fix reale non-ignore su `HasXotTable::table()`**: `->bulkActions(...)` →
`->toolbarActions(...)` (stesso identico comportamento: `HasBulkActions::bulkActions()`
in Filament è `{ $this->toolbarActions($actions); return $this; }`, verificato nel
sorgente vendor). Ripristina parzialmente un fix già fatto e verificato oggi alle
18:03 (commit `5042a991`, "phpstan analyse Modules 0 errori") che un merge
successivo (`b0560e8f`, messaggio ".") aveva silenziosamente perso insieme alle
sue annotazioni `@phpstan-ignore` — vedi sezione "Debito architetturale" sotto,
qui non si sono ripristinate le ignore (vietate in questo task) ma solo la parte
che è un fix reale.

### Debito architetturale NON toccato (fuori scope, non un bug)

`HasXotTable::table()` e i metodi legacy che chiama (`getTableColumns()`,
`getTableFilters()`, `getTableActions()`, `getTableBulkActions()`,
`getTableHeading()`, `getTableEmptyStateActions()`, `getDefaultTableSortColumn()`,
`getDefaultTableSortDirection()`, più l'analogo in `XotBasePage::schema()` via
`getFormSchema()`) restano ~77 errori `method.deprecated`. Verificato nel sorgente
vendor (`Filament\Tables\Concerns\{HasColumns,HasFilters,HasActions,HasHeader,
HasRecords,HasEmptyState}`, `Filament\Forms\Concerns\InteractsWithForms`): Filament
ha deprecato l'intera API "vecchio stile" (override di `getTableColumns()` ecc. che
restituiscono array) in favore di configurare tutto dentro `table()`/`form()`
direttamente. `HasXotTable`/`XotBasePage` sono bridge di compatibilità deliberati
che chiamano quell'API vecchia per le tante sottoclassi (61 estendono
`XotBasePage`, altrettante `HasXotTable` via `XotBaseListRecords` e affini) che la
overridano ancora. Eliminare il bridge senza `@phpstan-ignore` richiederebbe
riscrivere `table()`/`schema()` in ogni sottoclasse across Xot e altri moduli —
esattamente il caso "fix the outlier, not the majority" descritto nello standing
order. Stessa causa per gli errori residui in `ListCaches.php`, `ListModules.php`,
`ListSessions.php` (override locali di `getTableColumns()` che richiamano se
stessi attraverso la stessa catena). Story separata raccomandata per un refactor
mirato (uno a uno, verificando ogni sottoclasse) invece di un mop-up meccanico.

**Fuori scope, segnalato dal coordinatore**: `Modules/Xot/app/Models/XotBaseModel.php`
e `Modules/Xot/app/Filament/Resources/XotBaseResource.php` — lavoro in corso di
altre sessioni sullo stesso giro (getClassName() / getTableClass()). Non toccati.
`tests/Unit/ListPageHasTableClassTest.php:53` (`staticMethod.notFound` su
`XotBaseResource::getTableClass()`) skippato per lo stesso motivo: dipende dal
contratto in-flux di quel file.

**Verifica**: `phpstan analyse -c <neon con tmpDir isolata> Modules/Xot` — 0
errori `typeCoverage.*` residui nel modulo (soglia tree-wide, contributo Xot
azzerato); tutti gli errori `cast.*`/`method.deprecated`/`*deprecatedClass*`/
`class.implements*`/`class.extends*` sui file toccati risolti, tranne il cluster
bridge sopra descritto.