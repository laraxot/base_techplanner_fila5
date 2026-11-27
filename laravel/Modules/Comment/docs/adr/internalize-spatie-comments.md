---
qmd: "adr internalize spatie comments"
discussions: []
title: "ADR — Internalizzare Spatie comments nel modulo Comment"
type: decision
module: Comment
tags: [adr, comment, spatie, internalization]
created: 2026-06-06
updated: 2026-11-24
status: accepted
issues:
  - "https://github.com/laraxot/module_comment_fila5/issues/4"
related:
  - models-contracts-vs-app-contracts.md
  - ../wiki/concepts/native-comments-architecture.md
  - ../wiki/concepts/spatie-package-inventory.md
---

# ADR: Internalizzare Spatie Laravel Comments

## Contesto

Il modulo Comment vendorizzava un fork in `packages/spatie/` (namespace `Spatie\Comments`, `Spatie\LivewireComments`) con
dipendenze composer di tipo path. I commenti sui contenuti (segnalazioni, articoli del Blog) e il contratto del commentatore
dipendevano da quello stack.

Domanda: tenere il fork esterno o portare il motore dentro il modulo?

## Decisione

**Portare** il codice necessario in `Modules\Comment` con namespace nativo (`app/Models/Comment.php`, `app/Actions/**`,
`app/Models/Concerns/HasComments.php`, `app/Models/Contracts/CanComment.php`), **eliminare** `packages/spatie/`, mantenere
schema DB e alias Livewire `<livewire:comments>` per compatibilita'. Le Action usano `QueueableAction`, non Service.

## Alternative considerate

| Opzione | Pro | Contro |
|---------|-----|--------|
| Restare su fork Spatie | Zero lavoro | Debito, namespace esterno, UI disallineata |
| Composer packagist Spatie ufficiale | Upstream | Stesso namespace, meno controllo tenant |
| **Internalizzazione nativa** | Controllo, convenzioni Laraxot, UI | Effort multi-sprint |
| Comment system from scratch | Design pulito | Rischio regressioni, reinvent wheel |

## Conseguenze

- Epic STORY-158 multi-fase; i consumer importano trait e modelli da `Modules\Comment`.
- Moderazione Filament, tema e notifiche si cambiano nel modulo, senza patch a un fork.
- Debito misurato (2026-11-24): `packages/spatie/` non c'e' piu', ma `laravel/composer.lock` e
  `vendor/composer/installed.json` elencano ancora `spatiex/laravel-comments` e `spatiex/laravel-comments-livewire` (path
  `Modules/Comment/./packages/spatie/...`). Finche' non si rigenera il lock, `php artisan package:discover` rimette in
  `bootstrap/cache/packages.php` il provider `Spatie\Comments\CommentsServiceProvider` e l'app non parte (file inesistente).
- Il namespace `Spatie\Comments` non va reintrodotto: chi trova codice o docs che lo citano lo porta su `Modules\Comment`.

## Verifica

- `test ! -d laravel/Modules/Comment/packages` (il fork non torna).
- `Modules/Comment/tests/Unit/CommentEngineParityTest.php`: risposte annidate, reazioni, approvazione, notifiche e
  iscrizioni del motore nativo.
- Solo revisione: `grep -rn 'Spatie\\\\Comments' laravel/Modules laravel/composer.lock` deve restare vuoto quando il debito
  del lock e' chiuso.
