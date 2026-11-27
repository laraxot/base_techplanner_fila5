---
qmd: "adr internalize spatie comments"
discussions: []
title: "ADR — Internalizzare Spatie comments nel modulo Comment"
type: decision
module: Comment
tags: [adr, comment, spatie, internalization]
created: 2026-06-06
updated: 2026-11-26
status: accepted
decision-makers: [team Laraxot]
issues:
  - "https://github.com/laraxot/module_comment_fila5/issues/4"
related:
  - 0004-models-contracts-vs-app-contracts.md
  - ../wiki/concepts/native-comments-architecture.md
  - ../wiki/concepts/spatie-package-inventory.md
---

# ADR: Internalizzare Spatie Laravel Comments

## Contesto

Il modulo Comment vendorizzava un fork in `packages/spatie/` (namespace `Spatie\Comments`, `Spatie\LivewireComments`) con
dipendenze composer di tipo path. I commenti sui contenuti (segnalazioni, articoli del Blog) e il contratto del commentatore
dipendevano da quello stack.

Domanda: tenere il fork esterno o portare il motore dentro il modulo?

## Driver della decisione

- Un fork vendorizzato con namespace esterno (`Spatie\Comments`) non segue le convenzioni Laraxot (`XotBase*`, Action
  `QueueableAction`, test nel modulo owner).
- Moderazione, tema e notifiche devono cambiare nel modulo, senza patch a un pacchetto di terzi.
- Lo schema DB e l'alias Livewire `<livewire:comments>` esistenti non vanno rotti.
- Il rischio di regressione deve restare misurabile: il comportamento del motore e' coperto da un test di parita'.

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
- Debito misurato il 2026-11-24 (poi chiuso, vedi «Stato attuale»): `laravel/composer.lock` e `vendor/composer/installed.json`
  elencavano ancora `spatiex/laravel-comments` e `spatiex/laravel-comments-livewire`; `php artisan package:discover` rimetteva
  in `bootstrap/cache/packages.php` il provider `Spatie\Comments\CommentsServiceProvider` e l'app non partiva.
- Il namespace `Spatie\Comments` non va reintrodotto: chi trova codice o docs che lo citano lo porta su `Modules\Comment`.

## Stato attuale

Misurato il 2026-11-26 da `laravel/`: `grep -c 'spatiex/laravel-comments' composer.lock vendor/composer/installed.json` risponde 0 per entrambi,
e `Modules/Comment/packages` non esiste: il debito del lock e' chiuso, il fork non e' tornato. Restano citazioni del
namespace `Spatie\Comments` solo in commenti: `Modules/Comment/app/Policies/CommentPolicy.php` riga 13 (docblock) e
`Modules/Fixcity/config/comments.php` righe 76, 82, 88 (testo di commento che descrive le chiavi `models.*`), nessuna in codice
eseguibile.

## Conferma

- `test ! -d laravel/Modules/Comment/packages` (il fork non torna).
- `Modules/Comment/tests/Unit/CommentEngineParityTest.php`: risposte annidate, reazioni, approvazione, notifiche e
  iscrizioni del motore nativo.
- Comando da `laravel/`: `rg -n 'Spatie\\Comments' Modules --glob '*.php' --glob '!**/docs/**'` deve citare solo commenti (oggi 4 righe,
  tutte docblock o commenti di config, vedi «Stato attuale»); un `use Spatie\Comments\...` in codice e' una violazione.
