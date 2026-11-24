---
title: "PHPStan generics cleanup 2026-07-03"
type: concept
tags: [phpstan, generics, larastan, cleanup]
created: 2026-07-03
updated: 2026-11-17
---

# PHPStan generics cleanup 2026-07-03

Larastan level 10 richiede template espliciti per Builder, Factory e relazioni Eloquent.

Regola operativa: correggere il tipo nel punto sorgente con PHPDoc `@return` / `@param` mirati, senza modificare `phpstan.neon` e senza baseline. Per trait riutilizzabili non agganciati da modelli runtime, usare un probe minimale solo se il trait deve restare disponibile.


## Wave 2026-11-17 (76 → 0)

Baseline `/tmp/phpstan-wave/TechPlanner.tsv`: **76 → 0**.

Cause radice:

1. **Pest + `new $policyClass()`** — dataset con `class-string` non stringe `object`; matrice policy riscritta con istanze tipizzate (`tpPolicyCases()`).
2. **`Migration::up()`** — la base Laravel non dichiara `up()`; dopo `instanceof Migration` PHPStan perde il metodo. Caricare come `object{up(): void}` dopo `method_exists`.
3. **Mockery → `UserContract`** — intersezione `UserContract&MockInterface` + `hasRole` senza `array_map` su mixed.
4. **Soft delete restore** — `findOrFail`/`withTrashed` inferiva `Collection|Client`; `onlyTrashed()->first()` + `assert instanceof Client`.
5. **Lang duplicate keys** — già consolidati in `lang/it/client.php` / `mail_template.php` (chiavi fields/actions).
6. **Filament filter** — `schema()` deprecato → `form()` (già allineato nel working tree).

Verifica: `phpstan analyse Modules/Notify Modules/TechPlanner --memory-limit=-1 --error-format=raw` = 0.

Related: [phpstan-cleanup-techplanner.story.md](../../stories/phpstan-cleanup-techplanner.story.md)
