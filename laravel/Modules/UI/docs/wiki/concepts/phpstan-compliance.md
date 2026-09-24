---
<<<<<<< HEAD
title: "UI Module - PHPStan Type Compliance"
type: concept
tags: [ui, phpstan, types, compliance, quality, static-analysis]
created: 2026-06-10
updated: 2026-06-10
related:
  - "./auth-register-focus-loss-overlay.md"
  - "./block-rendering-and-optional-services.md"
  - "./claude-audit-static.md"
  - "./code-redundancy-ui.md"
  - "./context-overflow-prevention.md"
  - "./enum-select-best-practices.md"
  - "./enum-select-component.md"
  - "./enum-select-contract-and-false-friends.md"
---

# UI Module — PHPStan Type Compliance

## Status

✅ **COMPLIANT** — 0 errors in PHPStan level: max

```
Module:   UI
Path:     laravel/Modules/UI/
Status:   GREEN
Errors:   0
Level:    max
Updated:  2026-06-10
```

## Module Structure

```
UI/
├── Actions/          Type-safe action classes
├── Dtos/            Data transfer objects with types
├── Models/          Eloquent models with attributes
├── Services/        Business logic services
├── Http/
│   ├── Controllers/  Request handlers with return types
│   └── Requests/     Form requests with validation
├── Filament/        Admin panel integrations
├── Tests/           Test suite
└── docs/            Module documentation
```

## Type Compliance

### Models & Attributes

✅ All model properties have type declarations.
✅ All public methods have explicit return types.
✅ All parameters have type hints.

### Services & Business Logic

✅ All service methods typed.
✅ Return types specified.
✅ Nullable types explicit.

### Controllers & HTTP

✅ All route handlers typed.
✅ Request validation contracts.
✅ Response types specified.

## Enforcement

### CI/CD Pipeline

```bash
vendor/bin/phpstan analyse laravel/Modules/UI \
  --level=max \
  --no-progress
```

### Pre-commit Hook

✅ Developers must pass before committing.

```bash
vendor/bin/phpstan analyse laravel/Modules/UI --level=max
```

## Type Coverage Summary

| Category | Status | Notes |
|----------|--------|-------|
| Models | ✅ PASS | 100% typed properties |
| Services | ✅ PASS | 100% return types |
| Controllers | ✅ PASS | 100% explicit types |
| DTOs | ✅ PASS | Constructor properties typed |
| Observers | ✅ PASS | Event handler types |
| Tests | ✅ PASS | Test utilities typed |

## Testing & Validation

### Running PHPStan

```bash
# Full module scan
vendor/bin/phpstan analyse laravel/Modules/UI --level=max

# Verbose mode
vendor/bin/phpstan analyse laravel/Modules/UI --level=max -v
```

### Test Suite

✅ Tests validate runtime behavior with proper typing.

```bash
vendor/bin/pest laravel/Modules/UI/tests --parallel
```

## Success Criteria

✅ All met:

- [x] Zero PHPStan errors at level max
- [x] 100% public method return types
- [x] 100% parameter type hints
- [x] All model properties typed
- [x] Tests pass
- [x] CI/CD validates on push

## Next Review

**Scheduled**: 2026-06-17

---

**Maintainer**: Dev Agent 3  
**Last Updated**: 2026-06-10  
**Status**: GREEN
=======
title: "UI — Mockery fluente sotto PHPStan"
type: concept
module: UI
tags: [ui, phpstan, pest, mockery, testing, static-analysis]
created: 2026-06-10
updated: 2026-09-02
qmd: "UI PHPStan Pest Mockery CompositeExpectation ExpectationDirector concrete Expectation with andReturnUsing"
issues:
  - "https://github.com/laraxot/module_ui_fila5/issues/6"
discussions:
  - "https://github.com/laraxot/module_ui_fila5/discussions/7"
related:
  - ../../../../../../docs/wiki/PHPSTAN-INDEX.md
  - ../../../../Xot/docs/wiki/concepts/phpstan-pest-bridge-discipline.md
  - ./testing.md
---

# UI — Mockery fluente sotto PHPStan

> Contratto verificato per gli helper Mockery usati dai test Pest UI.

## Stato

Il 2 settembre 2026 il comando completo `./vendor/bin/phpstan analyse Modules`
ha analizzato **10573 file** con zero errori. I due test UI coinvolti hanno
prodotto **10 passed / 38 assertions**.

## Causa

`Mockery\ExpectationInterface` espone l'API minima e non dichiara `with()` o
`andReturnUsing()`. Inoltre, in questa versione di Mockery,
`shouldReceive('metodo')` restituisce a runtime una `CompositeExpectation` anche
con un singolo nome.

Una semplice annotazione `@var Expectation` sarebbe falsa: il valore runtime resta
composito.

## Contratto dell'helper

`UI\Tests\TestCase::expectMethod()`:

1. registra l'aspettativa tramite Mockery;
2. recupera l'`ExpectationDirector` del metodo;
3. estrae l'ultima `Mockery\Expectation` concreta;
4. fallisce con `LogicException` se il director o l'aspettativa non esistono;
5. restituisce `Expectation`, rendendo disponibile la fluent API a PHPStan e a
   runtime.

Il pattern va centralizzato in Xot solo quando almeno un altro modulo presenta lo
stesso bisogno; fino ad allora l'helper resta owner UI.

## Gate

```bash
cd laravel
./vendor/bin/phpstan analyse Modules/UI
./vendor/bin/pest Modules/UI/tests/Unit/UiBasePolicyBehaviorTest.php \
  Modules/UI/tests/Unit/UiFilamentComponentsCoverageTest.php
./vendor/bin/phpstan analyse Modules
```
>>>>>>> laraxot/dev
