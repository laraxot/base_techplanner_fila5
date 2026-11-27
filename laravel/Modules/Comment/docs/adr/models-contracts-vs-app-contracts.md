---
qmd: "adr models contracts vs app contracts"
discussions: []
title: "ADR — Models/Contracts vs app/Contracts nel modulo"
type: decision
module: Comment
tags: [adr, contract, eloquent, models, architecture, dry]
created: 2026-06-06
updated: 2026-11-24
status: accepted
issues:
  - "https://github.com/laraxot/module_comment_fila5/issues/4"
related:
  - ../wiki/concepts/can-comment-contract-php84.md
  - ../wiki/architecture/native-comments-engine.md
  - ../wiki/concepts/spatie-to-laraxot-namespace-map.md
  - ../../app/Models/Contracts/CanComment.php
---

# ADR: `Models/Contracts` vs `app/Contracts`

## Contesto

`CanComment` descrive le capacita' di un **commentatore Eloquent** (`getKey()`, `getMorphClass()`, `notify()`,
`commentatorProperties()`). Inizialmente era in `app/Contracts/CanComment.php`, namespace generico fuori dal dominio Model.
Nello Spatie originale era `Models\Concerns\Interfaces\CanComment`.

Domanda: dove sta un'interfaccia che solo un Model implementa?

## Decisione

| Tipo contratto | Path modulo | Namespace | Esempio |
|----------------|-------------|-----------|---------|
| Capacita' **solo Model** | `app/Models/Contracts/` | `Modules\{M}\Models\Contracts\*` | `CanComment`, `Commentable` |
| Trait comportamento Model | `app/Models/Concerns/` | `Modules\{M}\Models\Concerns\*` | `HasComments`, `InteractsWithComments` |
| Boundary **cross-modulo** | `app/Contracts/` o `Modules\Xot\Contracts\` | servizi, policy esterne, DTO boundary | `UserContract` (Xot) |

`CanComment` sta in `app/Models/Contracts/CanComment.php`. Firme native: `getKey(): mixed`, `getMorphClass(): string`;
i modelli che la implementano le ridichiarano con lo stesso tipo (docblock dell'interfaccia).

## Alternative scartate

- Lasciare `CanComment` in `app/Contracts/`: namespace generico, fuori dal dominio Model, mentre chi lo implementa e' sempre
  un Model.
- Tenere il namespace di Spatie `Models\Concerns\Interfaces`: mescola contratti e trait; la migrazione porta le interfacce
  in `Models\Contracts`, come gia' Rating e Lang.

## Conseguenze

- Import consumer: `use Modules\Comment\Models\Contracts\CanComment;`.
- **Vietato** ricreare `app/Contracts/CanComment.php` (doppio namespace per la stessa capacita').
- `BaseUser` e `User` non implementano `CanComment`: il modulo Comment resta opzionale per User.

## Verifica

- `Modules/Comment/tests/Unit/CanCommentContractTest.php`: firme di `getKey`/`getMorphClass`, User e BaseUser non
  dipendono da Comment, nessun `CanComment` rimasto nel modulo User.
- Solo revisione: la cartella `app/Contracts/` del modulo non contiene `CanComment` (l'unico file e'
  `Modules/Comment/app/Models/Contracts/CanComment.php`).
