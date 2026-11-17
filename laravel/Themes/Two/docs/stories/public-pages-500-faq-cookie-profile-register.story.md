---
title: "Two: quattro pagine pubbliche rispondono 500 (faq, cookie, profile, auth/register)"
type: story
status: review
theme: Two
epic: public-pages-health
updated: 2026-10-30
tags: [two, folio, blocks, 500, profile, auth, filament, cms]
related:
  - container0-routes-and-pub-theme-namespace.story.md
  - wcag-aaa-site-audit.story.md
  - mobile-hero-header-offset.story.md
---

# Two: quattro pagine pubbliche con errore 500

**Story ID:** public-pages-health.two-500
**Status:** review   <!-- backlog -> ready-for-dev -> in-progress -> review -> done -->

## Story

Come **visitatore del sito**, voglio che `/it/faq`, `/it/cookie`, `/it/profile` e `/it/auth/register` rispondano con una pagina (o con il reindirizzamento al login), cosi' che nessun link del sito porti a una pagina di errore.

## Acceptance Criteria

<!-- LOCKED. -->

1. `GET /it/faq` risponde 200: il blocco richiesto dal contenuto esiste nel tema oppure il contenuto usa un blocco esistente.
2. `GET /it/cookie` risponde 200 con la stessa regola (oggi manca la vista `hero.page`).
3. `GET /it/profile` da ospite risponde 302 verso il login e non 500; da utente autenticato mostra nome ed email.
4. `GET /it/auth/register` risponde 200 e il modulo di registrazione si vede.
5. Le quattro pagine rispondono 200/302 in `it`, `en`, `de`, `es`, senza chiavi grezze nel testo.
6. Nessuna correzione cancella file: le Blade mancanti si creano o i contenuti si riallineano.

## Tasks / Subtasks

- [x] Trovare dove il contenuto CMS di `faq` e `cookie` nomina i blocchi: sta in `laravel/Modules/TechPlanner/config/database/content/pages/*.json` (AC: #1, #2)
- [x] Scegliere: i blocchi mancanti erano sei, non due, e nessun altro tema li ha; creati in Two a partire dai dati del JSON (non si toccano i JSON ne' il database) (AC: #1, #2)
- [x] `pages/profile/index.blade.php`: aggiunto `middleware(['auth'])` di Folio; il `mount()` non cambia perche' l'utente ora esiste sempre (AC: #3)
- [x] `auth/register`: la causa e' `<x-filament::page>` usato come wrapper in una pagina Folio; sostituito con `<x-layouts.base>` come in `login` (AC: #4)
- [x] Rimisurare gli URL nelle quattro lingue (AC: #5)
- [ ] `auth/verify-email`: vedi Dev Agent Record, decisione sul flusso di verifica email

## Dev Notes

<!-- LOCKED. -->

- **Cause lette dal log di Laravel (2026-10-30):**

| URL | Errore | Dove |
|---|---|---|
| `/it/faq` | `view not found: pub_theme::components.blocks.faq.categories` | in `components/blocks/faq/` esiste solo `grid.blade.php` |
| `/it/cookie` | `view not found: pub_theme::components.blocks.hero.page` | in `components/blocks/hero/` esistono `about`, `blog`, `contacts`, `enhanced`, `faq`, `fullscreen`, `internal`, `main`, `simple` |
| `/it/profile` | `Attempt to read property "name" on null` | `pages/profile/index.blade.php`, `mount()` legge `Auth::user()->name` senza utente |
| `/it/auth/register` | `Using $this when not in object context` | `laravel/resources/views/vendor/filament-panels/components/page/index.blade.php` (vista Filament pubblicata a livello applicazione) |

- `/it/cookies` (con la s) risponde 200 e `/it/cookie-policy` risponde 404: sono pagine diverse; `cookie` e' quella con il blocco mancante.
- Il front-office e' guidato dal CMS: una pagina e' un record `<container0>.<slug0>` con una lista di blocchi; un blocco che non esiste nel tema e' un 500 al render, non un buco silenzioso. [Source: `container0-routes-and-pub-theme-namespace.story.md`]
- `/it/profile` e' un problema di guardia, non di sicurezza dei dati: l'ospite non vede dati altrui, la pagina esplode. Resta comunque da proteggere con `middleware('auth')` (Folio) e non con un controllo nel `mount()`.
- [Inference] Il blocco `faq.categories` e la hero `page` potrebbero provenire da un'altra versione del contenuto (Sixteen ha blocchi con quei nomi?): verificare prima di crearli, per non duplicare.
- Dalla story `mobile-hero-header-offset` restano misure aperte, non rimisurate ora: seconda CTA coperta al 40% dalla barra cookie a 390x667 e CTA sotto la barra a 320x568; dall'audit precedente: dimensioni dei bersagli nella pagina di login e immagini hero della 404 (non ri-verificate in questa passata).

## Testing

<!-- LOCKED. -->

- **Approccio:** richieste HTTP pubbliche (solo GET, nessun login, nessun POST) e lettura del log di Laravel per ogni 500; compilazione Blade dei file toccati.
- **Per AC:** #1-#4 -> `curl -s -o /dev/null -w '%{http_code}' http://192.168.1.40:8000/it/<pagina>`; #3 da autenticato richiede un login che l'agente non ha: va chiesto all'utente; #5 -> stesso controllo con `/en`, `/de`, `/es` e la scansione delle chiavi grezze; #6 -> `git status` del tema.
- **Casi limite:** pagina con cache di viste compilate da una versione precedente (`php artisan view:clear` dopo aver cambiato una pagina Folio con `@volt`), richiesta ospite e autenticata, lingua senza traduzione.
- **Vincolo:** nessuna scrittura sul database; il test Pest non e' eseguibile (guardia sul database di test).

## Dependency Maps

- **Blocked by:** nessuna.
- **Blocks:** `wcag-aaa-site-audit` (le quattro pagine non sono ancora misurabili).
- **External:** contenuto CMS (JSON o database), vista Filament pubblicata.

## Owned File/Module Scope

- `laravel/Themes/Two/resources/views/components/blocks/faq/**`
- `laravel/Themes/Two/resources/views/components/blocks/hero/**`
- `laravel/Themes/Two/resources/views/pages/profile/index.blade.php`
- `laravel/resources/views/vendor/filament-panels/components/page/index.blade.php` (fuori dal tema: confermare il proprietario prima di toccarlo)
- Condiviso con altre sessioni: layout, header, hero, barra cookie e `resources/css/app.css` di Two; lock `bash bashscripts/lock/check.sh <file>`.

## Learnings from Previous Stories

- Dopo aver cambiato una pagina Folio con `@volt` va ricompilata anche la vista in cache (`mobile-hero-header-offset`).
- Un `curl` con codice 200 non basta: leggere il log per le pagine che rispondono 500 e per quelle che mostrano chiavi grezze.

## GitHub (tracciamento)

| Tipo | Repo | # | URL |
|------|------|---|-----|
| Issue (coordinamento) | laraxot/base_techplanner_fila5 | 18 | https://github.com/laraxot/base_techplanner_fila5/issues/18 |
| **Discussion** (canon) | laraxot/base_techplanner_fila5 | 54 | https://github.com/laraxot/base_techplanner_fila5/discussions/54 |

`theme_two_fila5` ha una sola issue aperta (#1, audit Ponytail dei file `Main_files`), non pertinente: nessuna issue dedicata e nessun commento pubblicato; da aprire su conferma dell'utente.

## Dev Agent Record

**Sessione 97f16a39, 2026-10-30.**

Esito (stesso host, `http://192.168.1.40:8000`, solo GET da ospite, dopo `php artisan view:clear`), uguale in `it`, `en`, `de`, `es`:

| URL | Prima | Dopo |
|---|---|---|
| `/faq` | 500 | 200 |
| `/cookie` | 500 | 200 |
| `/profile` | 500 | 302 verso `/auth/login` |
| `/auth/register` | 500 | 200 |
| `/auth/forgot-password` | 500 | 200 |
| `/auth/reset-password` | 500 | 200 |
| `/auth/verify-email` | 500 | 500 |

- **Blocchi creati** in `Themes/Two/resources/views/components/blocks/`: `hero/page`, `content/legal`, `faq/categories`, `faq/accordion`, `contact/cta`, `sidebar/quick-response` (tutti usati dai JSON di `faq`, `cookie`, `contacts`). Classi Tailwind gia' presenti nel CSS compilato, quindi nessuna ricompilazione. Chiavi nuove in `lang/{it,en,de,es}/block_pages.php` (4: conteggio `trans_choice`, tre etichette di contatto); `check-blade-keys.php --only=Themes/Two` 0 mancanti.
- **Auth: sono quattro pagine, non una.** `register`, `forgot-password`, `reset-password` e `verify-email` usavano tutte `<x-filament::page>`; le prime tre ora usano `<x-layouts.base>`. La vista Filament pubblicata `laravel/resources/views/vendor/filament-panels/components/page/index.blade.php` e' identica a quella del vendor e non e' stata toccata.
- **`verify-email` resta 500 per un'altra causa:** la pagina `Themes/Two/.../pages/auth/verify-email.blade.php` rende `<livewire:user::auth.verify-email-widget />` e quel componente non esiste (`Modules/User/app/Filament/Widgets/Auth/` non ha un widget di verifica); nessun codice richiama quella pagina per nome. Il flusso di verifica esiste altrove ed e' raggiunto da due strade: la pagina Folio del modulo `Modules/User/resources/views/pages/auth/verify.blade.php` (URL `/auth/verify`, `name('verification.notice')`, `middleware(['auth','throttle:6,1'])`, usa `ResendEmailVerificationAction`; da ospite risponde 302 al login) e `Modules/User/routes/auth.php` riga 21, `Volt::route('verify-email', 'pages.auth.verify-email')->name('verification.notice')`, cioe' lo stesso nome rotta dichiarato due volte. Un test di Cms (`EmailVerificationTest.pest.php`) chiama `/{lang}/verify-email`. Opzioni: **A** si toglie la pagina di Two dal percorso (il percorso `/auth/verify-email` ricade sul flusso del modulo); **B** si crea `VerifyEmailWidget` come gli altri widget `Auth/`. Raccomandazione [Inference]: A, perche' il reinvio con throttle e' gia' scritto e B lo duplicherebbe; prima va deciso quale delle due dichiarazioni di `verification.notice` resta. E' un flusso di autenticazione: serve la revisione di sicurezza prima di cambiarlo, quindi non e' stato toccato.
- **Non verificato:** profilo da utente autenticato (l'agente non ha un login), blocco `sidebar/quick-response` dentro `/contacts` (il layout di Two non stampa le `sidebar_blocks`; provato solo con render diretto), contrasto automatico e 320 px nel browser per i sei blocchi nuovi.

## Audit incrementale dei blocchi pubblici

- Verificate le Blade nuove `hero/page`, `content/legal`, `faq/categories`, `faq/accordion`, `contact/cta` e `sidebar/quick-response`.
- Verificate le chiavi usate dal codice in `lang/{it,en,de,es}/block_pages.php`: struttura identica e nessuna chiave mancante.
- Il blocco `contact/cta` ora rende un link solo quando esistono sia `label` sia `url`; non usa più `#`, perché un fallback locale non è una destinazione valida e nasconde un dato CMS incompleto.
- I testi editoriali dei blocchi restano dati CMS localizzati; le etichette tecniche del componente usano il namespace canonico `pub_theme::block_pages`.
- **Segnalato dall'agente sul guscio di Two e non riprodotto:** `/it/blog/safety-dental-practices` risponde ora 404 (l'agente aveva visto un 500 `Class "Carbon\Unit" not found`); `lang/it/navigation.php` ha una chiave ripetuta (conteggio per riga, da confermare). Non toccati.

Misura di partenza (sessione 97f16a39, 2026-10-30, `http://192.168.1.40:8000`): `/it` 200, `/it/about` 200, `/it/contatti` 200, `/it/services` 200, `/it/blog` 200, `/it/cookies` 200, `/it/auth/login` 200; `/it/faq` 500, `/it/cookie` 500, `/it/profile` 500, `/it/auth/register` 500, `/it/cookie-policy` 404.
