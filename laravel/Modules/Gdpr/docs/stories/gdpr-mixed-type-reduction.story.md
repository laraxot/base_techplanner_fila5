# Story: Reduce mixed type usage — Gdpr

**Fase BMAD**: Qualita del codice (type-safety). Nessun PrivacyPolicyWidget. Nessun tocco a User 10.4.

**Contesto**: convenzione di progetto ("cerchiamo di non usare mixed, quando lo troviamo cerchiamo di
sostituirlo con qualcosa di adeguato"). Scope di questo passaggio: `app/` (ultima spiaggia =
JSON / metadata / config) + `declare(strict_types=1)` su ogni `.php` / `.blade.php` del modulo
che ne era sprovvisto nelle prime 25 righe.

**Perche'**: il tipo dice il contratto. `mixed` nasconde la forma reale dei dati di registrazione
e rende PHPStan cieco. Dove il valore e' un payload JSON/config polimorfo, `mixed` resta
l'unica descrizione onesta.

**Modifiche applicate**:
- `app/Actions/Validation/ValidateUserDataAction.php`: `@return array<string, mixed>` sostituito
  con lo shape reale costruito nel `return` letterale
  (`first_name`/`last_name`/`email`/`password`/`type`/`lang`: string;
  `email_verified_at`: `Carbon`). Il passo precedente aveva revertito questo narrowing per
  6 errori PHPStan nei test che leggono `$validatedData['state']` (chiave **mai** presente
  nel ritorno). Qui lo shape torna: e' evidente, non e' JSON/metadata/config.
  I test che pretendevano `state` (chiave mai presente nel ritorno) sono allineati
  allo shape: rimossa l'asserzione su `state` e i `?? null` ridondanti su `password`.
- `app/Models/Traits/HasGdpr.php`: rimosso `@param array<string, mixed> $metadata` duplicato;
  il tipo resta `mixed` — metadata di audit JSON polimorfo, nessun chiamante nel modulo
  vincola la forma.
- `resources/views/components/already-registered.blade.php` e `consent-label.blade.php`:
  aggiunto `declare(strict_types=1)` (unici file del modulo che ne erano sprovvisti).

**Lasciato `mixed` (motivato, ultima spiaggia)**:
- `app/Datas/GdprData.php` (`@var array<string, mixed> $data`): arriva da
  `GetTenantConfigArrayAction::execute()` che legge un file di config PHP arbitrario.
- `app/Models/Profile.php` (`childrenWith` / `childrenWithCount`): IDE-helper che rispecchia
  la firma vendor Eloquent, non va ristretta.
- `app/Models/Traits/HasGdpr.php` (`giveConsent` metadata): JSON di audit estensibile.
- `tests/TestCase.php`, `tests/PestHelpers.php`: helper di test polimorfici, fuori da `app/`.

**Fuori scope (esplicito)**: nessun `PrivacyPolicyWidget` creato o modificato; User 10.4 non toccato.

**Verifica**: PHPStan senza `--level` (livello da `phpstan.neon`) e PHPMD sul modulo, dopo lock/unlock.
**Fase BMAD**: Qualita del codice (type-safety), nessuna modifica di comportamento applicativo.

sostituirlo con qualcosa di adeguato"). Il modulo Gdpr aveva 21 occorrenze di `mixed` in 11 file, tutte
in PHPDoc (nessun type-hint nativo `mixed` in firma di metodo).

**Analisi**: per ciascuna occorrenza e' stato verificato l'uso reale del valore nel codice circostante
(construction letterale dell'array nei chiamanti, forma dei dati ritornati da una Action).

**Modifiche applicate** (solo PHPDoc, zero modifica a codice eseguibile):
- `app/Actions/Validation/ValidateUserDataAction.php`: `@param array<string, mixed> $formData`
  (ripetuto 3 volte per errore) unificato in un solo `@param array<string, string> $formData` — i due
  chiamanti (`RegisterWidget::submit()`, `GdprConsentForm::submit()`) costruiscono sempre l'array con
  valori stringa letterali. Il `@return` resta `array<string, mixed>`: e' stato tentato uno shape
  `array{first_name: string, ..., email_verified_at: Carbon}` ma introduceva 6 nuovi errori PHPStan nei
  test (`offsetAccess.notFound` su `$validatedData['state']`, mai presente nel valore di ritorno reale —
  bug pre-esistente nei test, non nel diff; `nullCoalesce.unnecessary` su `?? null` ridondanti). Cambio
  di ritorno **revertito** per non introdurre errori e non toccare test fuori scope.
- `app/Filament/Widgets/Auth/RegisterWidget.php` e `GdprConsentForm.php`:
  `logRegistrationAttempt(array $formData)` → `@param array<string, string> $formData` (stessa
  evidenza: costruzione letterale con soli valori stringa).
- `database/factories/ConsentFactory.php`, `EventFactory.php`: `definition(): array` →
  `@return array<string, string>` (tutti i valori letterali nell'array sono stringhe).
- `database/factories/TreatmentFactory.php`: `definition(): array` →
  `@return array<string, bool|int|string>` (name/description stringa, weight int, active/required bool).

**Lasciato `mixed` (motivato)**:
- `tests/TestCase.php` (`assertDatabaseHasRow`/`assertDatabaseMissingRow`), `tests/PestHelpers.php`
  (`gdprPost`, `gdprArtisan`, `assertGdprTableHas/Missing`, `createGdprConsent`): helper di test
  generici, riusati con shape diverse in ogni test — payload volutamente polimorfico.
- `app/Models/Profile.php` (`@method childrenWith/childrenWithCount(array<int|string, mixed> $relations)`):
  docblock IDE-helper che rispecchia la firma vendor Eloquent `with()`/`withCount()` — mimica di
  contratto di framework, non va ristretta.
- `app/Models/Traits/HasGdpr.php` (`giveConsent(..., array $metadata = [])`): nessun chiamante nel
  modulo passa metadata concreti (verificato via grep su app/ e tests/); e' un payload di audit
  volutamente estensibile per chi usa il trait — polimorfico per design.
- `app/Datas/GdprData.php` (`@var array<string, mixed> $data`): il valore arriva da
  `Modules\Tenant\Actions\Config\GetTenantConfigArrayAction::execute()`, che dichiara essa stessa
  `array<string, mixed>` perche' legge un file di config PHP arbitrario — corrisponde esattamente al
  tipo della Action esterna chiamata.

**Fix collaterale necessario per la verifica**: `phpunit.xml` del modulo aveva
`bootstrap="vendor/autoload.php"` (percorso relativo al file, ma `Modules/Gdpr/vendor/` non esiste in
questo monorepo) — la suite non partiva affatto. Corretto in `bootstrap="../../vendor/autoload.php"`,
stesso pattern gia' documentato e verificato in `Modules/Notify/phpunit.xml`.

**Verifica**:
- PHPStan (`./vendor/bin/phpstan analyse Modules/Gdpr --no-progress --error-format=table`): 0 errori
  prima, 0 errori dopo.
- PHPMD (`./tools/phpmd.sh Modules/Gdpr text ../docs/phpmd.ruleset.xml`): crash noto
  (`No node to visit provided for visitAnonymousClass`), non imputabile a questo diff (nessuna
  anonymous class toccata).
- Pest (`./vendor/bin/pest Modules/Gdpr/tests -c Modules/Gdpr/phpunit.xml --no-coverage`, dopo il fix
  del bootstrap): 167 passed, 69 failed, 3 risky, 10 skipped (639 assertions). Tutti i 6 file PHP con
  modifiche applicative in questa story contengono **solo** cambi di PHPDoc (verificato via `git diff`),
  quindi nessuno dei 69 fallimenti puo' essere causato da questo diff. Cause osservate: bug
  pre-esistente (`$validatedData['state']` mai impostato da `ValidateUserDataAction::execute()` ma
  atteso dai test), collisioni su vincoli unique nel DB MySQL condiviso di test (`treatments_name_unique`),
  risposte 500 su rotte di registrazione — coerenti con l'ambiente di test noto e non deterministico
  (vedi memoria `env-sqlite-manca-suite-non-eseguibile`).

**Dettaglio numerico**: 21 occorrenze di `mixed` trovate in 11 file; 8 sostituite/ristrette in 6 file
(1 param narrowing consolidato da 3 righe duplicate a 1); 13 lasciate invariate con motivazione in 5 file.
