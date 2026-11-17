---
title: "phpstan-fixes"
type: note
tags: [comment, phpstan, quality]
updated: 2026-11-17
qmd: "comment phpstan generics auth view-string pest assert interacts-with-comments"
module: Comment
status: active
---

# PHPStan Fixes — Modulo Comment

Gate: **0 errori** a `level: max` (wave 123 → 0).

## Perche'

Il motore commenti espone contratti (`CanComment` / `Commentable`), trait consumer-side e Livewire UI. PHPStan L10 deve capire generics Eloquent, `Auth::user()` tipizzato e le view Blade senza cast ciechi o ignore.

## Cause radice chiuse

1. **`missingType.generics` su Model/@method** — PHPDoc `Builder|X` senza `TModel`; relazioni `MorphTo`/`HasMany` senza template. Allineati a `Builder<static>` e `MorphMany<TRelated, Model>`.
2. **`auth()->user()` → Factory** — Larastan vede `Auth\Factory` senza `user()`. Fix: `Auth::user()` + narrow `instanceof CanComment`.
3. **`cast.string` / `cast.int` su `config()` / `__()`** — `SafeStringCastAction` / `SafeIntCastAction`.
4. **`view()` vs `view-string`** — `View::make($viewName)` con `@phpstan-var view-string`.
5. **Pest `method.internalClass`** — `Assert::` al posto di `expect()`; `tests/Pest.php` senza `pest()->extend()->in()`.
6. **Trait morti** — rimossi `InteractsWithCommenti` (naming IT rotto) e alias deprecato `InteractsWithSpatieComments`. `InteractsWithComments` resta SSOT consumer-side, tenuto vivo da `tests/Support/CanCommentStub`.

## Verifica

```bash
cd laravel && ./vendor/bin/phpstan analyse Modules/Seo Modules/Comment --memory-limit=-1 --error-format=raw
```

## Collegamenti

- [native-comments-architecture.md](wiki/concepts/native-comments-architecture.md)
- [migrate-spatie-comments-to-custom.md](migrate-spatie-comments-to-custom.md)

## Wave Comment+Employee (2026-11-17)

**Baseline**: Comment 55 → **0**.

Generic Eloquent PHPDoc (`Builder<static>`, relation generics), `SafeStringCastAction`/`SafeIntCastAction` for config, factory `@extends`, trait analysis cleanup, and restored `module.json` for discovery. Verify with sibling Employee module in the same `phpstan analyse` command.

### Related
- [native-comments-engine.md](./native-comments-engine.md)
