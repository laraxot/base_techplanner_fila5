# PHPStan Fixes Log - Story 8-121

> **Story**: 8-121 - PHPStan Full Compliance (Zero Errors, No Ignoring)
> **Started**: 2026-05-05
> **Philosophy**: Zero tolerance per shortcut - correggere sempre la root cause

## Fix #1: spatie/laravel-model-states Missing Package

### Problem
```
Class Modules\Xot\States\XotBaseState extends unknown class Spatie\ModelStates\State
Class Modules\Xot\States\Transitions\XotBaseTransition extends unknown class Spatie\ModelStates\Transition
```

### Root Cause (aggiornato 2026-05-21)

- Dichiarato in `Modules/Xot/composer.json` (`^2.14`) e root `laravel/composer.json`, ma **non installato** (assente da `composer.lock` / `vendor/`).
- `spatie/laravel-model-states` **2.14** richiede **`php: ^8.4`** ([composer.json upstream](https://github.com/spatie/laravel-model-states/blob/main/composer.json)); runtime progetto **PHP 8.3.30**.
- La linea **2.12.1** supporta PHP 8.3 ma solo **Laravel 10–12**, incompatibile con **Laravel 13** del modulo.
- Errore PHPStan è effetto del vendor mancante, non di codice errato in `XotBaseTransition`.

### Solution (applicata 2026-05-21)

1. Runtime **PHP 8.4.17** (`php8.4` esplicito o default via `update-alternatives`). Estensioni già allineate a 8.3 su questo host.
2. `rm -f laravel/Modules/Xot/composer.lock` (lock modulo non serve al merge root se non usi install standalone).
3. Da **`laravel/`**: `php8.4 "$(command -v composer)" update -W` — installa **`spatie/laravel-model-states` 2.14.1** + rigenera lock condiviso (il file `laravel/composer.lock` in questo repo è **gitignored** da `*.lock`).
4. `Modules/Xot/composer.json` resta `"php": "^8.3"` (minimo modulo Laraxot); il vincolo `^8.4` è solo nella dipendenza `spatie/laravel-model-states`.
5. `php8.4 ./vendor/bin/phpstan clear-result-cache` poi analisi `Modules/Xot/app/States/` → **OK**.

Nota: **`composer run go`** non eseguito in questa sessione: contiene `rm -rf database/migrations/*` e `migrate` — da valutare solo su clone/ambiente dedicato.

### Riferimenti

- [php84-upgrade-extension-checklist.md](php84-upgrade-extension-checklist.md)
- [laravel13-modular-package-compatibility-matrix.md](laravel13-modular-package-compatibility-matrix.md)

<<<<<<< HEAD
## Re-verifica post-merge Git (2026-06-06)

Dopo risoluzione marker conflitto su branch `dev`:

```bash
cd laravel && ./vendor/bin/phpstan analyse Modules --memory-limit=-1
# [OK] No errors — 4822 file
```

### Fix #2: XotBaseServiceProvider — marker Git residui

- **Sintomo**: bootstrap Larastan fallisce con `unexpected token "<<"` durante autoload `ActivityServiceProvider` → parent `XotBaseServiceProvider`
- **Fix**: ripristino file da commit `ce96248f` (versione senza `<<<<<<<`)

### Fix #3: Migrazioni corrotte (logica CREATE/UPDATE mescolata)

- `User/database/migrations/2026_01_12_114416_create_team_user_table.php` — `$this` usato dentro closure `static function` di `tableCreate`
- `TechPlanner/database/migrations/2026_02_22_000000_create_profiles_table.php` — PHPDoc e `Schema::getColumnListing` rimossi dal merge
- **Fix**: ripristino `ce96248f` per entrambe

### Fix #4: AddressItemEnum API

- `TechPlanner/.../create_client_table.php` chiamava `columns($table, null, true)` (3 argomenti)
- API attuale: `columnsWithLegacy($table, ?XotBaseMigration $migration)`

### Fix #5: XotBaseWizardWidget view-string

- Filament `view()` richiede `view-string|null`
- Pattern: `@var view-string $publicWizardView` prima di `->view($publicWizardView)`

### Collegamenti

- Memoria root: [docs/wiki/memories/phpstan-modules-zero-2026-06-06.md](../../../../../../docs/wiki/memories/phpstan-modules-zero-2026-06-06.md)
- Repair script: [bashscripts/tools/git/repair-php-after-conflict-resolution.sh](../../../../../../bashscripts/tools/git/repair-php-after-conflict-resolution.sh)
=======
## Fix #2: alias `Builder` duplicato (post-merge Git)

### Problem

```
Cannot use Illuminate\Database\Eloquent\Builder as Builder because the name is already in use
🪪 phpstan.parse (non-ignorable)
```

PHPStan analizza **4800 file** ma si ferma al primo parse error; l'errore può apparire su file consumer (migration, seeder) mentre la causa è in un parent/contract.

### Root cause

Collisioni merge hanno lasciato **due `use …\Builder`** con lo stesso alias nel medesimo namespace:

| Coppia conflittuale | Contesto |
|---------------------|----------|
| `Schema\Builder` + `Eloquent\Builder` | `XotBaseMigration::getConn()` |
| `Query\Builder` + `Eloquent\Builder` | `HasRecursiveRelationshipsContract`, `Result` |
| `Filament\Forms\Builder` + `Eloquent\Builder` | campi `ArticleContent`, `PageContent` |
| `Query\Builder` + `Eloquent\Builder` (import) | `SetDefaultRolesBySocialiteUserAction` |

### Solution

1. Un solo `use …\Builder` per short name; il secondo tipo → alias (`as QueryBuilder`) o FQCN in PHPDoc.
2. `XotBaseMigration`: solo `Illuminate\Database\Schema\Builder` (come `origin/master`).
3. Campi Filament Builder: **mai** importare `Eloquent\Builder`.
4. Dopo fix: `phpstan clear-result-cache` + `phpstan analyse Modules`.

### Verifica sessione 2026-06-06

- Prima: analisi incompleta (fatal/parse)
- Dopo Fix #2: **413 errori tipizzati**, 0 parse blocker

### Riferimenti

- [git-merge-marker-sweep](../../../../docs/wiki/how-to/git-merge-marker-sweep.md)
- [phpstan-modules-zero-2026-06-06](../../../../docs/wiki/memories/phpstan-modules-zero-2026-06-06.md)
>>>>>>> 06ccbd93 (.)
