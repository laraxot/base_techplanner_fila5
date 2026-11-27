---
title: "Comment: indice della documentazione"
type: index
status: active
module: Comment
created: 2026-10-16
updated: 2026-10-26
tags: [docs, comment, indice]
qmd: "comment indice documentazione commenti front office bmad stories fo-comments"
issues: []
discussions: []
---

# Comment: indice

Questo e' l'indice canonico. `00-index.md` rimandava qui e questa pagina rimandava a `00-INDEX.md`, che non esiste: il giro a vuoto e' chiuso il 2026-10-26.
La descrizione del modulo (identita', cosa contiene, limiti) e' in [README.md](./README.md).

## Stato (2026-10-26)

Il front office dei commenti (blog, eventi, segnalazioni) permette di pubblicare, rispondere al singolo commento, modificare ed eliminare, con il `MarkdownEditor` di Filament.
Prove, difetti trovati e decisioni aperte: [CMT-022](./stories/cmt-022.fo-comments-write-reply-markdown-editor.story.md). Decisioni che aspettano l'utente: D-CMT-1..6 in fondo alla story.

## Dove si trova cosa

| Cosa | Dove |
|---|---|
| Dossier BMAD dei commenti del front office (brief, PRD, architettura con ADR-001..008, UX, epic, registro decisioni, stato sprint) | [bmad/fo-comments/README.md](../archive/docs-legacy/bmad/fo-comments/README.md) |
| Story del modulo, `cmt-NNN.slug.story.md` (le `phpstan-*` sono storia dei lavori di qualita') | [stories/](./stories/) |
| Regole stabili (config, policy, mount del widget, sottocartelle di Actions e widget) | [concepts/](./concepts/) |
| Wiki del modulo (architettura, comandi, decisioni, entita') | [wiki/](../archive/docs-legacy/wiki/00-index.md) |
| Notifiche e commenti dei ticket | [ticket-comments.md](./ticket-comments.md) |
| Regola sul CSS di terzi nelle pagine Design Comuni (esenzione nel guard PostCSS) | [Sixteen: vendor-css-on-data-dc-pages-needs-guard-exemption](../../../Themes/Sixteen/docs/wiki/concepts/vendor-css-on-data-dc-pages-needs-guard-exemption.md) |

## Come si prova

```bash
cd laravel
bash ../bashscripts/tools/pest-scratch-db.sh Modules/Comment/tests          # mai sul DB di sviluppo
./vendor/bin/phpstan analyse Modules/Comment                                # configurazione unica laravel/phpstan.neon
# nel browser, su un'istanza con DB di prova (scrive commenti):
ORIGIN=http://127.0.0.1:8091 FO_PATH=/it/blog/<slug> FO_COOKIES=<file privato> FO_OUT=<cartella> \
  node ../bashscripts/tools/visual/fo-comment-flow-probe.mjs
```

### Configurazione
File: `config/comment.php`
- Moderation settings (auto-approve, whitelist)
- Threading settings (max depth)
- Notification channels
- Privacy & GDPR compliance

### Creazione Commento
```php
$comment = Comment::create([
    'user_id' => $user->id,
    'commentable_type' => Post::class,
    'commentable_id' => $post->id,
    'content' => 'Ottimo articolo!',
    'status' => CommentStatusEnum::APPROVED,
]);

// Risposta a commento (threading)
$reply = $comment->replies()->create([
    'user_id' => $user->id,
    'content' => 'Grazie del feedback!',
]);
```

## Best Practices

### Security
- Validate `commentable_type` contro whitelist di modelli
- Check autorizzazione prima di visibility
- Sanitize content (HTML escaping, markdown validation)
- Rate limiting su creazione commenti

### Performance
- Eager load relazioni (author, parent)
- Paginate risultati per large comment threads
- Index su `commentable_type`, `commentable_id`, `status`
- Cache conteggi commenti

### Moderation
- Auto-approve solo per utenti verificati
- Manual review per nuovi utenti
- Spam detection via keyword filters
- Appeal process per commenti rifiutati

## Related Modules

- [User Module](../../User/docs/) - Autenticazione e profili
- [Notify Module](../../Notify/docs/) - Sistema notifiche avanzato
- [Activity Module](../../Activity/docs/) - Activity logging
- [Xot Module](../../Xot/docs/) - Base classes e patterns

## Troubleshooting

**I commenti non vengono moderati automaticamente**
- Verificare configurazione `auto_approve_verified_users`
- Controllare status utente nel database
- Run `php artisan module:publish Comment`

**Notifiche non inviate**
- Controllare queue configuration
- Verificare email address configurati
- Check notification settings in config

**Problemi performance con thread lunghi**
- Verificare `max_depth` in config
- Implementare pagination su replies
- Aggiungere indexes su migration

## Documentation

Vedi anche:
- [README](README.md) - Panoramica general
- [PRD](PRD.md) - Product requirements
- [Roadmap 2025](PRODUCT_ROADMAP.md) - Piano sviluppo
- [PHPStan Fixes](phpstan-fixes.md) - Conformità statica
- [File Naming Rules](file-naming-rules.md) - Convenzioni naming
- [Structure](structure.md) - Architettura dettagliata
- [Conflict Resolution](conflict-resolution.md) - Risoluzioni merge

---

**Status**: Active Development  
**PHPStan Level**: Target Level 9  
**Translation**: IT/EN ✅  
**Last Updated**: 2026-05-13

## Mappa delle cartelle

Elenco generato dall'audit qualita' (issue #64): ogni cartella di `docs/` con il numero di file `.md`.
Le cartelle di import grezzo (`raw/`, `root-*-files/`), immagini e log sono escluse.

| Cartella | File .md |
|---|---|
| [`concepts/`](concepts/INDEX.md) | 1 |
| [`llm-wiki/`](llm-wiki/) | 1 |
| [`roadmap/`](roadmap/README.md) | 1 |
| [`wiki/`](wiki/index.md) | 28 |

## Cartelle superate

`docs/bmad/architecture-comment-enhancements.md`, `docs/bmad/brainstorming/` e `docs/bmad/planning/` sono marcate `superseded` e rimandano al dossier `bmad/fo-comments/`; restano come cronologia.
