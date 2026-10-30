---
title: "Link con container0.* e namespace pub_theme nelle Blade di Two"
type: story
theme: Two
status: implemented
updated: 2026-10-30
tags: [folio, container0, routes, i18n, pub_theme, blade]
---

# Link con `container0.*` e namespace `pub_theme` nelle Blade di Two

## Scopo

Due errori ricorrenti nelle Blade dei temi: un link costruito con un nome di rotta inventato per pagina (`route('area-personale.notifiche')`)
o con un URL scritto a mano (`url('/mobile/segnalazioni')`), e una chiave di traduzione con il namespace del singolo tema
(`__('two::navigation.breadcrumb')`). Questa story fissa la regola e registra cosa e' stato corretto in Two.

## Regola

**Link a pagine CMS.** Il front-office e' CMS-driven: una pagina e' un record (`<container0>.<slug0>`) servito dalla shell Folio
`[container0]/[slug0]`. L'unica famiglia di nomi rotta e' quindi la shell:

```blade
route('container0.view', ['container0' => 'area-personale', 'slug0' => 'notifiche'])
route('container0.index', ['container0' => 'tickets'])
```

Perche': `area-personale.notifiche` e' lo slug della pagina CMS, non il nome di una rotta (nessun file Folio lo dichiara in questo
progetto); il nome generico dice l'azione e i valori passano nei parametri, quindi cambiando lo schema degli URL si cambia un punto
solo; il prefisso lingua lo mette Folio, mentre `url('/...')` e `href="/it/..."` lo perdono; un parametro mancante e' un errore
immediato, non un 404 a runtime. Il parametro si chiama `container0`.

**In Two l'indice si chiama `container0`** (non `container0.index`, che esiste in Sixteen e TwentyOne). Le pagine a un solo segmento
(`/it/about`, `/it/contatti`) passano da li'. Nomi Folio propri di Two: `home`, `login`, `blog`, `blog.show`.

**Chiavi di traduzione.** Nelle Blade dei temi si usa `pub_theme::` (tema attivo), con cinque elementi
`<namespace>::<contesto>.<collezione>.<chiave>.<tipo>`. `two::` non e' registrato; `theme::` non esiste (`theme` e' un file lingua,
quindi `pub_theme::theme.nav.home`). Dettaglio e misure: `docs/wiki/memories/translation-protocol-memory-aid.md` nel repo root.

## Cosa e' cambiato in Two

- 24 chiamate `route()` con nomi di pagina inesistenti (`pages.about`, `pages.contacts`, `pages.services`, `pages.blog`, `about`,
  `contact`, `terms`, `privacy`, `blog.search`, `profile.index`, `page.show`, `pages.view`) nei componenti `navbar`, `footer`,
  `header-main`, `header-slim`, `footer-institutional`, `page_card` e nella ricerca blog: ora `route('container0', [...])` o `route('blog')`.
  Sono componenti non montati da nessuna pagina: l'errore sarebbe comparso al primo uso.
- `navbar`: 14 chiavi `theme::nav.*` portate a `pub_theme::navigation.*` (esistono in it/en/de/es).
- Modulo User, pagina di login usata da Two: aggiunte in en/de/es le voci `login.title.label`, `login.subtitle.text`,
  `login.welcome_back.text`, `login.welcome_message.text` che mancavano (prima `/en/auth/login` mostrava l'italiano).
- Controllo statico delle chiavi sulle Blade di Two: 0 chiavi mancanti in it/en/de/es.

## Residui dichiarati

- Componenti `footer` (chiavi `theme::footer.*`, servono voci nuove) e `card`, `post_card`, `post-meta` (rotte `post.*` di un modello
  `Post` che non esiste): non montati, lasciati come sono. Il sottoalbero duplicato `resources/views/views/` ha le stesse copie.
- Altri temi (Sixteen, TwentyOne, Meetup) e moduli hanno nomi rotta di pagina o URL fissi: contati per classe dal rilevatore
  privato (`url-literal`, `route-page-name`, `route-unknown`, `ns-theme`), non corretti qui.
- `/it/cookie`, `/it/faq`, `/it/profile`, `/it/auth/register`, `/it/auth/forgot-password` e `/it/auth/reset-password` rispondevano 500 e ora rispondono 200 (`/profile` 302 al login): blocchi mancanti creati, guardia `auth`, wrapper `<x-layouts.base>`. Resta 500 `/it/auth/verify-email` (widget Livewire inesistente, flusso di verifica da decidere). Misure, cause e decisioni in [public-pages-500-faq-cookie-profile-register.story.md](public-pages-500-faq-cookie-profile-register.story.md).
- Forma delle chiavi `pub_theme` (namespace + 4 segmenti): in Two spostate 93 chiavi; vedi [la story di Lang](../../../../Modules/Lang/docs/stories/translation-key-shape-rekey.story.md).

## Verifica

- `GET /it`, `/it/about`, `/it/contatti`, `/it/services`, `/it/blog`, `/it/cookies`: 200 dopo le modifiche.
- `GET /{it,en,de,es}/auth/login`: 200 e titolo tradotto in tutte le lingue.
- Non verificato a video: i componenti non montati.

Vedi anche: [blade-i18n-no-hardcoded-text.story.md](blade-i18n-no-hardcoded-text.story.md), [cms-pages-slug-folder-prefix.story.md](cms-pages-slug-folder-prefix.story.md).
