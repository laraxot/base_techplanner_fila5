---
title: "Riepilogo per riprendere il lavoro (TechPlanner / sottana.com)"
type: handoff
status: active
created: 2026-11-19
updated: 2026-11-19
tags: [handoff, riepilogo, techplanner, sottana.com, phpstan, seo, bmad]
related:
  - ../audit/RELEASE.md
  - ../audit/TEST_RESULTS.md
  - ../../laravel/Themes/Two/docs/seo/posizionamento-google.md
  - ../../laravel/Modules/Xot/docs/wiki/concepts/public-html-symlink-assets.md
---

# Riepilogo per riprendere il lavoro

Da incollare all'inizio di una nuova chat. Repository `laraxot/base_techplanner_fila5`, branch **dev**.

## 1. Obiettivo principale

Portare in produzione, «alla perfezione», il progetto Laravel modulare che gestisce il sito **sottana.com**
(Sottana Service di Marco Sottana: radioprotezione, verifiche elettromedicali e autorizzazioni sanitarie per studi
dentistici e cliniche veterinarie, Mogliano Veneto) e il pannello **TechPlanner** (clienti, apparecchi, verifiche,
appuntamenti, controlli). In parallelo: PHPStan a zero su `Modules`, qualità del codice sempre in crescita, docs di
moduli e temi organizzate, sito primo su Google per le ricerche locali del settore.

## 2. Contesto e vincoli

**Stack**: Laravel 13, Filament 5, Livewire 4, Folio/Volt, Pest, PHPStan max (+ Larastan, Safe), PHP 8.4
(`/opt/php84/bin/php`), MariaDB 10.11 in locale. Moduli `laravel/Modules/*` (convenzioni Laraxot: classi `XotBase*`,
Actions al posto dei Service, Datas al posto dei DTO), temi `laravel/Themes/*` (sito pubblico: tema **Two**).
Tenant da `SERVER_NAME` → `config/local/<host invertito>` (`techplanner.local` → `config/local/techplanner` =
sottana.com; `manuale.local` → demo del manuale).

**Regole di Marco (sempre valide)**
- Lingua: italiano. Tono diretto, nessun riempitivo.
- Correggere e migliorare subito, senza chiedere conferma; installare e configurare da soli ciò che serve; studiare
  anche online. Chiedere solo in caso di dubbio reale (es. decisioni irreversibili su lavoro altrui).
- Lavorare sempre sul branch `dev`; committare e pushare senza chiedere. **Ogni commit dell'agente cita la sua
  GitHub issue** (`Refs #n`); i commit di Marco sono esclusi. Aprire issue (e discussion quando possibile) su ciò che
  si fa.
- Prima di agire capire scopo e perché; andare alla causa, non al sintomo. DRY + KISS, clean code, `mixed` solo come
  ultima risorsa.
- Metodo: BMAD (story in `docs/stories/`, `Modules/*/docs/stories/`, `Themes/*/docs/stories/`) + second brain +
  ECC; coordinarsi con altri agenti tramite le story.
- Docs: organizzare sempre `docs/` di moduli e temi; file `.md` in kebab-case **senza date nei nomi** (date nel
  frontmatter); niente changelog nei prompt (ruolo + comportamento + regole).
- Test solo nella cartella `tests/` del modulo, mai in `laravel/tests/`.
- Manuali d'uso: screenshot, spiegati a chi parte da zero, per tipo di utente, nel repo in `.md` e `.pdf`.
- `public_html` è la document root: non va cancellata.
- Non esporre credenziali nei report; non toccare dati di produzione senza autorizzazione.

**Ambiente di questa sessione (cloud)**: proxy che blocca i download zip da GitHub (Composer: `phpstan/phpstan` si
installa seminando la cache con `git archive`), GraphQL non disponibile (`gh api` REST sì, quindi niente
discussion), niente cancellazione di branch remoti. Demo locale: `php -S manuale.local:8000` (o
`techplanner.local:8001`) da `public_html` con le voci in `/etc/hosts`; utenti demo con password in
`MANUAL_DEMO_PASSWORD` (mai nel repo). Test: MariaDB `techplanner_test`, utente `tp`.

## 3. Decisioni prese e risultati raggiunti

- **Pronto al rilascio** (issue chiuse/aperte: #61, #63, #64): policy per ruolo (`techplanner::admin` cancella,
  `techplanner::operator` lavora), cestino con cascata, scadenze verifiche e dashboard, controllo P.IVA/CF, import
  che aggiorna invece di duplicare, richieste dal sito in sola lettura, `deploy.sh` (lock, manutenzione, backup DB,
  migrazioni, cache, symlink, `seo:robots`), webhook firmato HMAC, CI TechPlanner. Manuale d'uso
  `laravel/Modules/TechPlanner/docs/manual/manuale-uso.{md,pdf}`. Procedura: `docs/audit/RELEASE.md`.
- **Asset solo via symlink relativi**: `public_html/themes/<Tema>` → `../../laravel/Themes/<Tema>/public`,
  `public_html/assets/<modulo minuscolo>` → `../../laravel/Modules/<Modulo>/public` (comandi
  `php artisan xot:theme-link` / `xot:module-link`); `.gitignore` accanto con `<nome>/` (ignora copie vere) e
  `<nome>`; link versionati con `git add -f`; `AssetAction` non copia più; niente `npm run copy`.
- **Unione con origin/dev del 2026-11-18**: residui dei merge tolti (77 file spazzatura, marcatori in 770 `.md`),
  6 migrazioni vuote che bloccavano `migrate`, 404 del sito che davano 500, fallback dei layout e-mail.
- **SEO sottana.com** (commit `3c2258215`, issue #63): `ProfessionalService` nel JSON-LD da `metatag.business` del
  tenant, `robots.txt` scritto da `php artisan seo:robots` (nginx rispondeva 404), sitemap con `lastmod`, titoli e
  pagine servizi riscritti (400–650 parole, FAQ, fonti normative), indirizzo uniforme, `@stack('styles')` nel head.
  Da fare a Marco: Google Business Profile, Search Console + sitemap, recensioni. Piano:
  `laravel/Themes/Two/docs/seo/posizionamento-google.md`.
- **Verifiche all'ultimo commit**: TechPlanner 132 test verdi, PHPStan TechPlanner 0 errori, crawl del pannello
  (admin e operatore) senza 5xx né etichette grezze.

## 4. Dati o codice chiave (punti fermi)

- Dati pubblici dell'attività (identici ovunque): «Sottana Service di Sottana Marco», Via Augusto Vanzo 86 A, 31021
  Mogliano Veneto (TV), +39 041 455552, studio@sottana.com, P.IVA 05532540266.
- Contenuti del sito: `laravel/config/local/techplanner/database/content/**.json` (copia identica in
  `Modules/TechPlanner/config/database/content`, controllata da un test); link interni sempre con
  `{{ route('container0.view', [...]) }}`, mai `/it/...` scritto a mano (test `NoHardcodedLocalizedLinksTest`).
- `TechPlannerBasePolicy`, `TechPlannerBaseTable` (cestino), `CascadesSoftDeletes`, `TestCase::useIsolatedTechPlannerConnection()`
  (le connessioni dei moduli sono alias della predefinita, `TenantServiceProvider`).
- Comandi di verifica:
  ```bash
  cd laravel
  ./vendor/bin/pest Modules/TechPlanner/tests
  ./vendor/bin/phpstan analyse -c phpstan.techplanner.neon
  ./vendor/bin/phpstan analyse Modules --memory-limit=-1
  php artisan xot:module-link --dry-run && php artisan xot:theme-link --dry-run
  php artisan seo:robots --dry-run
  ```
- `laravel/Themes/.gitignore` contiene `Two` (commit di Marco 715c2a47b): i nuovi file del tema vanno aggiunti con
  `git add -f` finché Marco non decide.

## 5. Prossimo passo

In corso (issue #64 e laraxot/bashscripts_fila5#48): `./vendor/bin/phpstan analyse Modules` a zero errori con
subagenti in parallelo per modulo (ordine casuale), andando alla causa di ogni segnalazione e aggiornando le docs dei
moduli toccati; consolidamento dei prompt di `bashscripts_fila5/docs/prompts` (168 file con duplicati). Lo stato
esatto (errori rimasti, moduli finiti) è nella issue #64 e nella sezione «Stato» qui sotto.

## Stato

- PHPStan `Modules`: misurazione in corso.
