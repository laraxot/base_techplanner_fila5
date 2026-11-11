---
id: DCP-251
title: Tenant, test rossi e skipped misurati a runtime
type: story
status: done
created: 2026-10-15
updated: 2026-10-15
epic: DCP-250
related: [DCP-240, DCP-250, "3.5", "2.14"]
scope: module:Tenant
owned_scope:
  - laravel/Modules/Tenant/tests/TestCase.php
  - laravel/Modules/Tenant/tests/Unit/Traits/SushiToCsvTest.php
  - laravel/Modules/Tenant/tests/Unit/Traits/SushiToJsonsTest.php
  - laravel/Modules/Tenant/tests/Unit/Actions/Translations/TranslateTenantKeyActionTest.php
  - laravel/Modules/Tenant/tests/Unit/Actions/Models/ResolveTenantModelInstanceActionTest.php
---

# DCP-251: Tenant, test rossi e skipped misurati a runtime

Fase BMAD: correzione alla sorgente e verifica. PHPStan su `Modules` era a zero (DCP-240) ma cinque file test del modulo Tenant fallivano o saltavano a runtime. Misura con il runner protetto, un file alla volta.

## Scopo di ogni test e causa radice

| File | Cosa doveva garantire | Causa radice | Condivisa? |
|---|---|---|---|
| `Unit/Traits/SushiToCsvTest.php` | `SushiToCsv` legge le righe da un CSV risolto da `GetTenantFilePathAction`, le espone a Eloquent (`where`, `find`) e lancia se il file manca | Nel `beforeEach` `CatalogSushiCsvModel::flushEventListeners()` era la prima riga, prima di installare il mock. `flushEventListeners()` fa `new static`; il boot di Sushi (`whenBooted` poi `migrate()` poi `getRows()`) legge il CSV con l'action vera e apre `laravel/config/local/fixcity/catalog.csv`, che non esiste. | Ordine nel `beforeEach` (anche Jsons) |
| `Unit/Traits/SushiToJsonsTest.php` | `SushiToJsons` unisce i `*.json` di una cartella in righe interrogabili | (1) `Mockery::allows(['execute' => $closure])` registra `andReturn($closure)`: restituisce la closure, non la esegue (`TypeError ... Closure returned`). (2) Stesso ordine sbagliato del CSV: il flush faceva leggere (glob) la cartella reale `config/local` prima del mock. | (1) con Translate; (2) con CSV |
| `Unit/Actions/Translations/TranslateTenantKeyActionTest.php` | `TranslateTenantKeyAction` traduce `messages.welcome` dal file lang del tenant, e restituisce la chiave se il file manca | Come (1) di Jsons: `allows([... => closure])`. | si |
| `Unit/Actions/Models/ResolveTenantModelInstanceActionTest.php` | Un nome di modello sconosciuto fa lanciare l'action | Aspettativa sbagliata: il test pretendeva `ReflectionException`, che nessun percorso di produzione lancia. Il comportamento reale e `\Exception('model unknown [...]')` di `ResolveTenantModelClassAction`, ma prima ci si arriva con `GetAllModelsByModuleNameAction` (Xot), che nel layout reale `Modules/<M>/app/Models` lancia `DirectoryNotFoundException` (vedi "Difetti di produzione fuori scope"). Il test non isolava le dipendenze. | no |
| `Feature/MultiTenantScopeTest.php` | I `TenantSetting` di tenant diversi restano separati per `tenant_id` | Skipped **per scelta**: `TestCase::tenantDbUnavailable()` ritorna `true` fisso (motivo scritto: SQLITE_BUSY con N pest, story 5.26, "riaprire quando [5.25] schema isolato per processo"). Interruttore globale a 7 file. | si, 7 file |

Causa condivisa piu larga, scoperta lungo la strada: `Modules\Tenant\Tests\TestCase::expectMockery()` lanciava `RuntimeException('Unexpected mockery expectation type.')` **sempre**. Faceva `$mock->allows($method)` e poi `instanceof Expectation`, ma in Mockery 1.6.15 `shouldReceive()`/`allows('x')` restituisce `CompositeExpectation` (il docblock dice `Expectation`, il runtime no). Verifica: `php -r` con `get_class(Mockery::mock(Foo::class)->allows('execute'))` stampa `Mockery\CompositeExpectation`. 15 chiamate in 6 file Tenant.

## Cosa ho fatto (diff corto)

- `tests/TestCase.php`: `expectMockery()` ora e `return $mock->shouldReceive($method);` con tipo nativo `ExpectationInterface` (comune a `Expectation` e `CompositeExpectation`) e `@return Expectation` nel docblock, che e quello che Mockery dichiara per `shouldReceive()`. Tolti l'`instanceof` e la `RuntimeException`. Aggiunto `use Mockery\ExpectationInterface`.
- `SushiToCsvTest`: `flushEventListeners()` e `clearBootedModels()` spostati in fondo al `beforeEach`, dopo il mock (stesso ordine del test verde `SushiToPhpArrayTest`). Titolo dell'ultimo test corretto: diceva "returns empty sushi rows" ma asserisce un'eccezione, ora "throws when csv file is missing".
- `SushiToJsonsTest`: stesso spostamento; `allows([... => closure])` sostituito da `TestCase::expectMockery($mock, 'execute')->andReturnUsing(closure)`.
- `TranslateTenantKeyActionTest`: stessa sostituzione `andReturnUsing`.
- `ResolveTenantModelInstanceActionTest`: mock di `ResolveTenantConfigValueAction` (null) e `Module::allEnabled() = []` come nel test verde `ResolveTenantModelClassActionTest`; `expect(fn)->toThrow(\Exception::class, 'model unknown')`. `expectExceptionMessage()` e deprecato in PHPUnit (PHPStan `method.deprecated`), quindi uso `toThrow` di Pest.
- Regola d'oro: nessun test scrive o legge piu `laravel/config/local/**`. Le fixture stanno in `storage_path('tests/...')` e `afterEach` le cancella. La lettura di `config/local/fixcity/catalog.csv` e la `glob` sulla cartella reale erano effetti del flush prima del mock, ora spariti.
- Nessun file di produzione toccato.

## Verifica (output reale, 2026-10-15, runner `pest-scratch-db.sh`, un file alla volta)

| File | Prima | Dopo |
|---|---|---|
| `SushiToCsvTest` | `Tests: 5 failed (0 assertions)` | `Tests: 5 passed (8 assertions)` |
| `SushiToJsonsTest` | `Tests: 4 failed (0 assertions)` | `Tests: 4 passed (7 assertions)` |
| `TranslateTenantKeyActionTest` | `Tests: 2 failed (0 assertions)` | `Tests: 2 passed (2 assertions)` |
| `ResolveTenantModelInstanceActionTest` | `Tests: 1 failed (1 assertions)` | `Tests: 1 passed (2 assertions)` |
| `MultiTenantScopeTest` | `Tests: 3 skipped (0 assertions)` | `Tests: 3 skipped (0 assertions)` (invariato, di proposito) |

Effetto della correzione condivisa di `expectMockery()` su file non assegnati (stessa causa):

| File | Prima | Dopo |
|---|---|---|
| `Unit/Actions/Models/ResolveTenantModelClassActionTest` | 1 failed, 2 passed | 3 passed |
| `Unit/Actions/Markdown/GetLocalizedMarkdownPathActionTest` | 2 failed, 1 passed | 3 passed |
| `Unit/Actions/Config/SaveTenantConfigActionTest` | 2 failed | 2 passed (11 assertions) |
| `Unit/TenantCoverageBoostTest` | non misurato | 1 failed, 10 passed (il rosso e altro, vedi sotto) |
| `Unit/TenantStatementCoverageTest` | non misurato | 1 failed, 18 passed (il rosso e altro, vedi sotto) |

PHPStan sui 10 file (i 5 editati e i 5 che usano `expectMockery`), da `laravel/` con la config unica: `totals {'errors': 0, 'file_errors': 0}`, exit 0. Un primo giro aveva dato 1 errore `method.deprecated` (`expectExceptionMessage`), corretto con `toThrow`.

DB di sviluppo prima e dopo: utenti 11, ticket 18. `laravel/config/local`: elenco dei 148 file identico prima e dopo. Nota: `git -C laravel status --short config/local` mostra 1 file modificato, `fixcity/database/content/sections/header.json` (mtime 14:28:06, contenuto di intestazione con link Privacy e Accessibilita): e una modifica di un'altra sessione, nessun test Tenant lo nomina e al momento della misura non girava nessun processo pest. I tre probe temporanei che ho usato (file `Dcp251*Probe*Test.php` in `tests/Feature`) sono stati cancellati; `ls` conferma.

## MultiTenantScopeTest: skipped per scelta, e cosa succederebbe senza lo skip

Lo skip e voluto e globale (`tenantDbUnavailable()`, usato anche da `TenantBusinessLogicTest`, `TenantModelsTest`, `Models/TenantTest`, `Integration/SushiToJson*`). Non l'ho tolto. Motivo: misurando una copia senza skip (scratch DB, file probe poi cancellato) il risultato e **2 failed, 1 passed**:

- `it scopes queries to tenant id`: `Failed asserting that actual size 2 matches expected size 1`.
- `it enforces isolation when filtering by tenant_id`: `-'v2' +'v1'`.

Causa, provata con un secondo probe: `Modules\Tenant\Models\Tenant` ha `incrementing=true` e `keyType=int`, ma `tenants.id` e `varchar(191)` (UUID, tabella della migration User). Dopo `create()` Eloquent sostituisce `id` con `lastInsertId()`: `PROBE ids=[0,0] stored=["4df94df0-...","dfb3552f-..."]`. Con `tenant_id = 0` per entrambi i tenant le due `TenantSetting` si confondono. Un terzo probe con una sottoclasse `incrementing=false; keyType='string'` ha dato ids UUID e `n1=1 n2=1` (isolamento corretto). Non ho applicato la correzione al model: `Tenant` non ha consumatori a runtime (solo factory, seeder, test) e togliere lo skip e una decisione sull'interruttore globale. In piu la connessione `tenant` punta a `fixcity_data`, dove la tabella `tenants` non esiste (esiste solo in `fixcity_user`): nel DB di sviluppo reale `createTenant()` darebbe `QueryException`, non skip; funziona solo col runner che collassa i DB in uno.

Decisione aperta per chi governa Tenant: (a) aggiungere `public $incrementing = false; protected $keyType = 'string';` a `Tenant`, (b) decidere dove vive `tenants` per la connessione `tenant`, (c) solo dopo, mettere `tenantDbUnavailable()` a `false` e rimisurare i 7 file. Collegata la story 3.5 (`multi-tenant-scope-isolation`, backlog).

## SENZA SORGENTE

Nessuno dei cinque test e senza sorgente: il comportamento testato esiste in `SushiToCsv`, `SushiToJsons`, `TranslateTenantKeyAction`, `ResolveTenantModelClassAction`/`InstanceAction` e `TenantSetting`. Era senza sorgente solo l'aspettativa `ReflectionException` di `ResolveTenantModelInstanceActionTest`: nessun percorso la lancia (`app($class)` su classe inesistente darebbe `BindingResolutionException`).

## Difetti di produzione fuori scope (da riportare, non toccati)

1. **Xot, `Modules/Xot/app/Actions/Model/GetAllModelsByModuleNameAction.php`**: cerca `$mod->getPath().'/Models'`, ma ogni modulo ha i model in `app/Models`. Prova: `app(GetAllModelsByModuleNameAction::class)->execute("Tenant")` in tinker lancia `DirectoryNotFoundException: The ".../Modules/Tenant/Models" directory does not exist.`; tutti i 19 moduli abilitati hanno `models=0 app/Models=1`. Conseguenza: `GetAllModelsAction` e il ripiego di `ResolveTenantModelClassAction` falliscono sempre quando il nome non e in `morph_map`. Il test `Xot/tests/Unit/ModuleServiceTest` ("gets concrete models for a module") ha lo stesso problema. File Xot, sessione DCP-243.
2. **Tenant, `Models/Tenant.php`**: chiave int su tabella con id stringa, vedi sopra.

## Rossi rimasti nel modulo, non assegnati e con causa diversa

- `Unit/TenantCoverageBoostTest`, "domain resource ...": `Failed asserting that an array has the key 'updated_at'` (riga 119).
- `Unit/TenantStatementCoverageTest`, "SushiToJson named model": `InvalidArgumentException: Expected an array. Got: NULL` in `SushiToJson.php:64` (chiamata alla riga 340 del test).

## Scorciatoie ponytail

- Ho corretto `expectMockery()` una volta (sorgente comune) invece di riscrivere i 15 punti d'uso. Limite: il tipo dichiarato nel docblock (`Expectation`) e quello di Mockery, non quello reale (`CompositeExpectation`); se Mockery correggera il docblock, il `@return` si potra togliere.
- Le fixture restano in `storage_path('tests/...')` (percorsi fissi, come negli altri test del modulo) e non in `sys_get_temp_dir()`: limite, due processi pest in parallelo sullo stesso file si pestano le cartelle. `TestCase::$testDirectory` non viene azzerata in `afterEach` (difetto preesistente, non toccato).
- `MultiTenantScopeTest` lasciato skipped, nessun codice di produzione inventato.

## Revisione con la checklist ECC code-reviewer (sul mio diff)

Sicurezza: nessun segreto, nessun percorso da input utente (cartelle fisse sotto `storage/tests`), nessuna scrittura fuori da `storage/tests`. Qualita: nessuna funzione oltre le 50 righe, nessun `dd`/`console.log`, nessun codice morto aggiunto (rimossa la `RuntimeException` irraggiungibile in pratica solo come guardia sbagliata), nessun file creato in `app/`. Test: ogni modifica a `expectMockery()` e coperta da 6 file che la usano, tutti rimisurati. Nessun `@phpstan-ignore`, baseline, `assert()`, `@var` inline o cast. Nessun Pint su cartelle di modulo, nessun comando git che scrive. Verdetto: APPROVE, zero CRITICAL/HIGH.
