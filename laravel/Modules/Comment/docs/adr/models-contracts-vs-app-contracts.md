---
qmd: "adr models contracts vs app contracts"
discussions: []
title: "ADR — Models/Contracts vs app/Contracts nel modulo"
type: decision
module: Comment
tags: [adr, contract, eloquent, models, architecture, dry]
created: 2026-06-06
updated: 2026-06-06
status: accepted
issues:
  - "https://github.com/laraxot/module_comment_fila5/issues/4"
  - "https://github.com/laraxot/base_fixcity_fila5/issues/297"
related:
  - ../wiki/concepts/can-comment-contract-php84.md
  - ../wiki/architecture/native-comments-engine.md
  - ../wiki/concepts/spatie-to-laraxot-namespace-map.md
  - ../../../../../docs/wiki/memories/models-contracts-vs-app-contracts.md
---

# ADR: `Models/Contracts` vs `app/Contracts`

## Contesto

`CanComment` descrive capacità di un **commentator Eloquent** (`MorphMany`, `getKey()`, `getMorphClass()`, notifiche). Inizialmente era in `app/Contracts/CanComment.php` — namespace generico, fuori dal dominio Model.

Spatie originale: `Models\Concerns\Interfaces\CanComment`.

## Decisione

| Tipo contratto | Path modulo | Namespace | Esempio |
|----------------|-------------|-----------|---------|
| Capacità **solo Model** | `app/Models/Contracts/` | `Modules\{M}\Models\Contracts\*` | `CanComment`, `HasRatingContract` |
| Trait comportamento Model | `app/Models/Concerns/` | `Modules\{M}\Models\Concerns\*` | `HasComments`, `InteractsWithComments` |
| Boundary **cross-modulo** | `app/Contracts/` o `Modules\Xot\Contracts\` | servizi, policy esterne, DTO boundary | `UserContract` (Xot) |

**`CanComment`** → `app/Models/Contracts/CanComment.php` (`Modules\Comment\Models\Contracts\CanComment`).

## Perché

1. **Semantica** — chi implementa `CanComment` è sempre un `Model`/`Authenticatable`, mai un Action o Provider.
2. **Precedenti** — `Rating\Models\Contracts\HasRatingContract`, `Lang\Models\Contracts\HasTranslationsContract`.
3. **DRY** — `app/Contracts/` resta vuoto nel modulo Comment finché non serve un vero boundary non-Model.
4. **KISS** — allineamento diretto alla migrazione Spatie `Models\Concerns\Interfaces` → `Models\Contracts`.

## Alternative scartate

- Lasciare `CanComment` in `app/Contracts/` (la posizione iniziale): namespace generico, fuori dal dominio Model, mentre chi
  lo implementa e' sempre un Model.
- Tenere il namespace di Spatie `Models\Concerns\Interfaces`: mescola contratti e trait; la migrazione da Spatie porta le
  interfacce in `Models\Contracts`, come gia' Rating e Lang.

## Conseguenze

- Import consumer: `use Modules\Comment\Models\Contracts\CanComment;`
- **Vietato** ricreare `app/Contracts/CanComment.php` (duplicato namespace).
- Nuove capability model-only nel modulo Comment → `Models/Contracts/` + trait in `Models/Concerns/` se serve.

## PHP 8.4

Firme **loose** su metodi Eloquent (`getKey();` senza `: mixed`). Vedi [can-comment-contract-php84.md](../wiki/concepts/can-comment-contract-php84.md).

## Verifica

```bash
test ! -f laravel/Modules/Comment/app/Contracts/CanComment.php
./vendor/bin/pest tests/Unit/Modules/Comment/CanCommentContractTest.php
```

## Collegamenti

- [STORY-158](../../../../../docs/stories/STORY-158-native-comments-internalization.md)
- Memory root: [models-contracts-vs-app-contracts.md](../../../../../docs/wiki/memories/models-contracts-vs-app-contracts.md)
