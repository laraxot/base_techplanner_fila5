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

## Fix #2: DTO concrete factory `self` instead of `new static()`

### Problem

PHPStan level max reported `new.static` on config DTO factories and, after partial conversion, `return.type` when methods still declared `static` but returned `self`.

### Root Cause

These DTOs are concrete configuration data objects, not extension points. Late static binding in `make()`/`from()` creates an unnecessary constructor-safety contract.

### Solution (applicata 2026-06-07)

- Keep DTOs concrete/final where applicable.
- Use `public static function make(): self` and `return new self();`.
- Use `public static function from(...): self` and `return new self(...);` for concrete data constructors.
- Do not add `@var static` casts to force PHPStan's inferred type.
- When a DTO constructor groups flat parameters into config arrays, update `@param` tags to the real parameter names and prefer array-shape PHPDoc.

Verification:

```bash
cd laravel && ./vendor/bin/phpstan analyse Modules
# 4993 file, [OK] No errors
```
