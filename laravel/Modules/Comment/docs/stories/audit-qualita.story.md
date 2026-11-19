---
title: "Audit qualita' modulo Comment"
type: story
status: in-review
module: Comment
created: 2026-11-19
updated: 2026-11-19
issues: ["laraxot/base_techplanner_fila5#64"]
tags: [audit, qualita, docs, phpstan, pest]
---

# Audit qualita' — modulo Comment

Story BMAD dell'audit di qualita' coordinato nella issue
[#64](https://github.com/laraxot/base_techplanner_fila5/issues/64).
Ambito: solo `Modules/Comment` (documentazione e `app/`).

## Baseline e risultato

| Verifica | Prima | Dopo |
|---|---|---|
| PHPStan max (`Modules/Comment`) | 0 errori | 0 errori |
| Pest (`Modules/Comment/tests`) | 2 falliti | 2 falliti |
| Occorrenze `mixed` in `app/` | 13 | 13 |

## Documentazione

- File `.md` con data/timestamp nel nome: 3 rinominati, 0 uniti al file canonico
  omonimo (contenuto unico conservato sotto "Contenuto unito da ..."), 0 rimossi perche' vuoti
  o gia' contenuti nel canonico. La data originale e' ora nel frontmatter `created:`.
- Duplicati esatti (contenuto identico) rimossi: 1; tenuta la copia meglio collocata
  (no `archive/`, `raw/`, suffissi `-1`/`_1`, maiuscole o underscore) e link interni aggiornati.
- `docs/index.md` (indice canonico): aggiunta la sezione "Mappa delle cartelle" con link relativi
  a tutte le aree; link rotti agli altri moduli corretti dove la destinazione era determinabile.

## Codice (`app/`)

- Rimosso file morto `Models/BaseModel.php.backup-20251015-092457`

## Scoperte da gestire (non risolte in questo audit)

- BUG reale fuori scope: `laravel/config/comments.php` punta a `Spatie\Comments\Support\CommentSanitizer` e `Spatie\Comments\CommentTransformers\MarkdownToHtmlTransformer`, mentre `Support/CommentConfig` richiede `Modules\Comment\Support\CommentSanitizer` e `Modules\Comment\Transformers\CommentTransformer`: e' la causa delle 2 failure di `ProcessCommentActionTest`. Va allineata la config root (o la config del modulo)
- Nell'indice restano link rotti verso file mai esistiti o di altri progetti: da rivedere a mano.
- `docs/` contiene ancora `INDEX.md`, `README.md` e `index.md` affiancati (collisione su filesystem
  case-insensitive): da consolidare in un solo indice con decisione condivisa.

## Criteri di accettazione

- [x] PHPStan max a 0 errori senza ignore/baseline
- [x] Nessun `.md` con data nel nome
- [x] Nessun duplicato esatto in `docs/`
- [x] Test Pest non peggiorati
- [ ] Punti aperti sopra risolti
