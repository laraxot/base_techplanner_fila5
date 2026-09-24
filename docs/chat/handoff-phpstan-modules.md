---
title: "Handoff — PHPStan Modules zero errors"
type: handoff
tags: [phpstan, modules, quality-gates]
created: 2026-07-24
updated: 2026-07-24
related:
  - ./INDEX.md
  - ../wiki/rules/no-phpstan-probe-models.md
  - ../../bashscripts/docs/lock-system.md
---

# Handoff — `phpstan analyse Modules`

## Verifica

```bash
cd laravel && php -d memory_limit=-1 ./vendor/bin/phpstan analyse Modules --memory-limit=-1 --no-progress
# → [OK] No errors  (2026-07-24, EXIT 0)
```

Report: `laravel/build/phpstan/modules-final.log`

## Prima → dopo

| Stato | Errori |
|-------|--------|
| Prima | **55** |
| Dopo | **0** |

## Fix (con lock)

| Area | Azione |
|------|--------|
| AI `CompletionActionTest` | `$action = new CompletionAction` nei test che lo usavano senza dichiarazione |
| Media `tests/unit/` | rimossa cartella lowercase (dupe di `Unit/` già OK) |
| Notify `mockExpectation` | return type `\Mockery\Expectation` (non `CompositeExpectation`) |
| Notify Actions `NotificationManagerTest` | riscritto senza `->__call(...)` |
| Tenant `domaintest` | `Mockery::mock` + `app()->instance` (no `$this->mock` protected) |
| Xot `RegisterBladeComponentsActionTest` | stesso pattern Mockery tipizzato |
| User migration syntax | `list<string>` via loop + cast |
| Employee `Admin` | rimosso `@mixin IdeHelperAdmin` inesistente |
| Gdpr | eliminati `GdprPhpstanTraitProbe` + factory (regola no-probe) |
| Xot `PestFunctionBridge.php` | rigenerato: 5 blocchi stale `Modules\Comment\Tests(\Support)?` (modulo rimosso interamente dal codebase) → 25 `class.notFound` (28% dello sweep di partenza, 90 errori su una baseline precedente a questa). Generatore `bashscripts/tools/generate-pest-phpstan-bridge.php` aggiornato per auto-formattare l'output con `pint` a fine scrittura (niente più fixup manuale). Dettagli: [phpstan-modules-fix.md](../../laravel/Modules/Xot/docs/wiki/troubleshooting/phpstan-modules-fix.md). |

## ⚠️ Trappola osservata: `ide-helper:models --nowrite --write-mixin`

`--write-mixin` scrive `@mixin IdeHelper{Model}` nei file modello reali **anche con `--nowrite`** (i due flag sono in conflitto logico — `--nowrite` non lo sovrascrive). Un tentativo di rigenerare solo `_ide_helper_models.php` con questa combinazione ha toccato 142 file reali in Employee/User/Xot (poi `git checkout --` per tutti); il fix corretto per l'errore Admin.php era già in `Admin.php` stesso (tag orfano rimosso), non richiedeva alcuna rigenerazione ide-helper. Usare solo `ide-helper:models --nowrite` (senza `-M`) se serve rigenerare il companion file.

## Follow-up aperto (non PHPStan)

`./vendor/bin/pest Modules/Xot` (modulo intero) → **68 failed / 28 risky** su `HasCommonScopesTest.php` (`LogicException: bootIfNotBooted ... while it is being booted` su `HasCommonScopesProbe`). File non toccato in questa sessione, quindi preesistente — probabile fallout Eloquent del bump Laravel v12→v13. Da investigare separatamente.

## Lock

Usato `bashscripts/lock/{check,lock,unlock}.sh` su ogni file; unlock a fine task.
