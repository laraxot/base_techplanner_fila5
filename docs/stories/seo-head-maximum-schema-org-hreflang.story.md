---
title: "SEO al massimo del front office: <x-cms::head>, laravel/head, schema.org e hreflang"
type: story
status: in-progress
priority: high
created: 2026-10-30
updated: 2026-10-30
tags: [seo, head, laravel-head, schema-org, hreflang, canonical, open-graph, theme-two, multilingual, playwright, bmad]
qmd: "seo head laravel/head schema.org hreflang canonical open graph theme two x-cms::head seo cms defaults precedence"
related:
  - ../../laravel/Modules/Cms/docs/stories/seo-head-component.story.md
  - ../../laravel/Modules/Cms/docs/seo-head-architecture.md
  - ../../laravel/Modules/Seo/docs/stories/seo-site-defaults-hreflang-schema.story.md
  - ../../laravel/Modules/Seo/docs/stories/inbound-article-event-schema.story.md
  - ../../laravel/Themes/Two/docs/stories/head-seo-visual-verification.story.md
---

# SEO al massimo del front office

## Richiesta

Un componente Blade class-based `Head` nel modulo Cms o Seo (o in entrambi) che contenga tutto il `<head>`, con
integrazione di `laravel/head` e di schema.org, portando la SEO "al massimo" sul tema **Two** senza regressioni, verificato
con Playwright/Puppeteer e screenshot. Prima i documenti (ECC + BMAD), poi il codice.

## Stato di partenza (misurato 2026-10-30, solo GET su `192.168.1.40:8000`)

- `laravel/head` v0.2.2 e `laravel/framework` v13.39.0 sono in `composer.lock`; il pacchetto non era usato da nessuna parte.
- `<head>` di Two prima dell'intervento: nessun canonical, nessun Open Graph, nessun hreflang, nessun JSON-LD, `robots` assente;
  `description` = segnaposto «Gestione meta tag e SEO del sito web» (default di `MetatagData`) su ogni pagina.
- Esisteva già `<x-cms::metatags>` (Cms, usato dai temi che lo montano) con canonical/OG/Twitter/JSON-LD, ma il layout `main` di Two
  non lo montava.
- Sito: «Sottana Service», consulenza sulla sicurezza per studi professionali; lingue `it`, `en`, `de`, `es` con prefisso `/{locale}/`.

## Collisione con un altro agente (corsia A)

Alle 15:28 UTC un agente (identità e sessione `unknown`) ha preso lo stesso compito («implement reusable SEO Head component for
Theme Two») e ha in lock: `Cms/app/View/Components/Head.php`, `Cms/resources/views/components/head.blade.php`,
`Cms/tests/Unit/View/Components/HeadTest.php`, `Cms/app/Providers/CmsServiceProvider.php`, i layout `main` e `base` di Two e la
sua story/architettura in `Cms/docs/`. Ha già migrato i due layout a `<x-cms::head>`.

Regola applicata: non si toccano file in lock altrui, non si duplica. La corsia A resta sua; questa story copre il resto
(politica SEO, dati, schema, hreflang, verifica) e, **solo dopo che i suoi lock cadono**, rivede e completa il componente.

## Difetti misurati nell'output della corsia A (da discutere, non corretti da me)

Pagine `/it`, `/it/faq`, `/it/auth/login`, `/en` servite alle ~15:35 UTC. Estrazione in `scratchpad` della sessione; rimisurare
con lo strumento di audit prima di dichiarare chiuso qualcosa.

| # | Difetto | Dove si vede | Causa probabile |
|---|---|---|---|
| 1 | `og:site_name`, `keywords`, `author` valgono `metatag.sitename`, `metatag.keywords`, `metatag.author` (chiave grezza) | tutte le pagine | traduzione/config non risolta in `MetatagData` |
| 2 | `description` è il segnaposto «Gestione meta tag e SEO del sito web» | tutte le pagine | default del DTO, nessun fallback sul sito del tenant |
| 3 | Pagina di login indicizzabile (`robots: index, follow`) con titolo «Sottana — Sottana Service» | `/it/auth/login` | nessuna politica robots per le aree riservate; titolo senza pagina |
| 4 | `canonical` `https://…` e `og:url` `http://…` | tutte | `canonical()` ha `forceHttps` attivo di default; le due URL hanno fonti diverse |
| 5 | `og:locale` = `it`/`en` (atteso `it_IT`/`en_GB`), nessun `og:locale:alternate`, nessun hreflang | tutte | locale passato grezzo |
| 6 | Brand incoerente: `application-name` e JSON-LD «Sottana», titolo «Sottana Service» | tutte | due fonti per il nome |
| 7 | JSON-LD solo `WebSite`/`WebPage` con name/description segnaposto; nessuna `Organization`; `/it/faq` è `WebPage`, non `FAQPage` | home, faq | schema ridotto a un array minimo |
| 8 | `og:image` = `/images/logo.png`, senza larghezza/altezza/alt | tutte | immagine di ripiego, non una card 1200×630 |
| 9 | `HeadManager::flush()` dentro `render()` azzera i metadati impostati prima da controller/pagine; tutto è scritto a livello *runtime*, quindi batte `Route::withHead()` e i defaults | codice | contro la precedenza del pacchetto (vedi D2) |
| 10 | `theme-color` `#0f2b46` fisso nella classe | `Head.php` | il componente non è agnostico dal tema |

Da verificare: `/en` e `/it/faq` contengono due occorrenze di `<title` (probabile `<title>` di un SVG); lo dirà l'audit.

## Decisioni di architettura (proposte, da confermare con la corsia A)

- **D1 Ownership.** Cms possiede il componente `<x-cms::head>` (composizione del documento: charset, `@head`, asset, stack,
  anti-FOUC). Seo possiede la politica e i dati SEO (defaults, hreflang, robots, schema). È la stessa divisione dichiarata dalla
  corsia A.
- **D2 Strati di `laravel/head`.** Precedenza: *defaults < gruppo rotte < rotta < runtime < errore*. Il componente **non** fa
  `flush()` e non scrive i valori di sito a runtime: i valori di sito vanno in `Head::defaults()`, quelli di una pagina CMS a runtime,
  le eccezioni fisse in `->withHead()`. Così una pagina può cambiare solo il titolo senza perdere la descrizione.
- **D3 Una fonte per brand, titolo e descrizione.** `MetatagData` risolto dalla config del tenant; niente segnaposto né chiavi grezze
  nell'output; se manca la descrizione di pagina si usa quella del sito, mai il segnaposto.
- **D4 hreflang.** `alternates()` per `it`/`en`/`de`/`es` più `x-default`, con auto-riferimento, URL assolute e reciproche, solo
  sulle pagine indicizzabili. Lo schema dell'URL (`http`/`https`) viene dalla configurazione dell'ambiente, non da un default fisso.
- **D5 Robots.** Aree riservate (login, registrazione, profilo, area personale) ed errori: `noindex, follow`, definito in un solo punto
  (defaults per gruppo di rotte), mai nel layout. Le stesse pagine fuori dalla sitemap.
- **D6 Schema.org con `Laravel\Head\Facades\Schema`.** `Organization` (tipo più specifico solo se la ricerca lo conferma) e `WebSite` sulla
  home, `BreadcrumbList` sulle pagine interne, `FAQPage` su `/faq`, `Article`/`BlogPosting` sui post (story `IM-SEO-001`), `WebPage`
  di ripiego. Un'unica Action sostituisce gradualmente `BuildPageSchemaAction` (oggi array); i temi che ancora montano `metatags`
  restano sul percorso vecchio finché non migrano.
- **D7 Temi.** Il componente è agnostico: `theme-color`, entry Vite, regole anti-FOUC e stack arrivano da config o da slot. Il `<head>` di
  Sixteen incollato nella richiesta (`#head-section`, `sixteen-critical-fouc`, verde `#007a52`, Vite `themes/Sixteen`) resta contenuto
  del tema Sixteen e non entra in Two.
- **D8 Verifica.** Strumento di audit Playwright (repo `bashscripts`, privato) che per ogni pagina e viewport conta i tag, valida il JSON-LD,
  controlla canonical e reciprocità hreflang, legge la console e salva gli screenshot; chrome-devtools per i controlli puntuali.

## Acceptance criteria

- [ ] Ogni pagina pubblica indicizzabile ha: un solo `<title>` e una sola `description` univoci e senza segnaposto; un `canonical`
      assoluto con lo schema realmente servito; `og:*` e `twitter:*` completi; `og:locale` nel formato `ll_RR`.
- [ ] hreflang per le 4 lingue più `x-default`, auto-riferito e reciproco su tutte le pagine che hanno una traduzione.
- [ ] JSON-LD valido (parse + vocabolario schema.org): `Organization` e `WebSite` sulla home, `BreadcrumbList` sulle pagine interne,
      `FAQPage` su `/faq`.
- [ ] Login, registrazione, profilo e pagine di errore sono `noindex, follow` e non compaiono nella sitemap.
- [ ] Nessuna chiave grezza (`metatag.*`) né segnaposto nell'HTML, in nessuna lingua.
- [ ] Una pagina può sovrascrivere un solo campo (`Head::title()`, `->withHead()`) senza perdere gli altri (test del pacchetto + del componente).
- [ ] Nessuna regressione visiva e funzionale su Two: screenshot prima/dopo a 390×844 e 1280×800, chiaro e scuro, console senza errori, axe 0
      violazioni, hero non coperta dall'header.
- [ ] `phpstan analyse Modules` a 0 errori, nessun `@phpstan-ignore`, nessuna baseline.

## Claim

| Chi | Scope | Stato |
|---|---|---|
| agente `unknown` (task «implement reusable SEO Head component for Theme Two») | corsia A: `Cms` `Head.php`, view, test, provider, layout `main`/`base` di Two, story Cms | in lock, in corso |
| sessione 56da8100 (claude) | documenti, ricerca web, strumento di audit, politica/dati/schema in Seo (file nuovi), revisione di A a lock caduti | in corso |
| sessione 97f16a39 (claude) — corsia C | solo raggiungibilita' di `/sitemap.xml` e `/robots.txt` su Two (rotte in `Seo/routes/web.php`, `BuildSitemapAction` esiste gia'); nessun file di A o B; non scrive un secondo audit ne' una seconda story | chiusa alle 15:55 UTC (esiti nella sezione «Esiti della corsia C») |

Nota della corsia C (2026-10-30): la sessione 97f16a39 ha ricevuto la stessa richiesta, ha riconosciuto le corsie A e B, **ha ritirato** la propria story e il proprio strumento di audit per non duplicarli (il lock sul file della sua story e' stato rilasciato, il file non e' mai stato scritto). Le sue misure indipendenti (stesse di B: `metatag.*` grezzo, descrizione segnaposto, `og:locale` senza paese, nessun hreflang, JSON-LD minimo) confermano i difetti 1-8. Misure in piu': `/sitemap.xml` e `/robots.txt` rispondono 404 (la rotta di Xot `web_seo.php` ha il `@require` commentato in `Xot/routes/web.php`, `Seo/routes/web.php` e' vuoto); `og:image` `/images/logo.png`, `favicon.ico`, `site.webmanifest` e `favicon-180x180.png` del tema rispondono 404 (in `public/themes/Two/` c'e' solo `images/`). Una ricerca web indipendente e' in corso nella stessa sessione: il suo rapporto serve da secondo parere per quello di B, non da documento parallelo.

## Verifica prevista

1. Baseline HTML già salvata (prima e dopo la corsia A) nello scratchpad della sessione; screenshot "prima" non più possibili perché
   la corsia A ha già cambiato i layout (niente ripristino: git forward-only).
2. Audit su `/it`, `/it/faq`, `/it/cookie`, `/it/auth/login`, `/en`, `/de`, `/es`, una pagina CMS interna e un 404, a 390×844 e 1280×800, chiaro/scuro.
3. Schema Markup Validator e, dove la rete lo consente, Rich Results Test; Lighthouse SEO.
4. `phpstan analyse Modules` e test mirati senza toccare MySQL (`.env.testing` ha dati veri): Pest solo con DB isolato o con test senza database.

## Non verificato / decisioni aperte

- Identità dell'agente di A: non raggiungibile se non tramite story. Se l'utente lancia due volte lo stesso prompt in due sessioni, va deciso chi
  tiene la corsia A.
- Tipo schema dell'organizzazione (`Organization` vs `ProfessionalService`/`LocalBusiness`): dipende dalla ricerca e dai dati reali del tenant (indirizzo, telefono, P.IVA).
- Immagine social 1200×630: serve un asset (o una generazione) che non esiste.
- `og:locale:alternate` ripetuto: in `laravel/head` `meta()` aggiorna la voce con la stessa chiave, quindi più alternate potrebbero collassare; da provare.
- Pest sul modulo Cms: richiede un database di test isolato.

## Esiti della corsia C (sessione 97f16a39, 2026-10-30)

Fatto e misurato su Two (solo GET):

- `GET /sitemap.xml` 200 e `GET /robots.txt` 200. Causa dei 404: `SeoServiceProvider` e `Seo\Providers\RouteServiceProvider` non ridefinivano `$module_dir`/`$module_ns`,
  quindi `Modules/Seo/routes/web.php` non veniva mai caricato (lo faceva solo il modulo Fixcity, assente qui). Corretto; dettagli e numeri in
  `Modules/Seo/docs/stories/dcp-274-sitemap-completeness-verification.story.md`. **La corsia B, che deve toccare `SeoServiceProvider`, trovera' le due proprieta' gia' aggiunte.**
- Nuovo `Modules/Seo/app/Actions/Robots/BuildRobotsTxtAction.php` (costante pubblica `PRIVATE_SEGMENTS`: la politica robots della corsia B, D5, puo' leggerla o sostituirla;
  oggi l'elenco e' auth, area-personale, dashboard, notifications, profile in ogni lingua, piu' `/admin` e `/*/admin`). Test scritto e non eseguito.
- Sitemap: 76 URL, hreflang reciproco con `x-default`, le 19 URL in `it` rispondono 200. Da decidere con la corsia B: `/it/profile` e' in sitemap ma e' riservata;
  alias duplicati `cookie`/`cookies`, `faq`/`faqs`, `contacts`/`contatti`, `about`/`chi-siamo`.
- Ricerca web indipendente: `Modules/Seo/docs/seo-head-research-laravel-head-schema-org.md`. Corregge tre punti del piano: **`FAQPage` su `/faq` (D6) non produce piu' nulla** (rich result FAQ terminato il 7-5-2026),
  `ProfessionalService` e' deprecato su schema.org e `Dentist` e' sbagliato (il dentista e' il cliente), e `@graph` + `og:locale:alternate` ripetuto **non passano** dal pacchetto
  (il validatore pretende `@type` alla radice; i meta con la stessa chiave si sovrascrivono): servono un nodo `WebPage` radice con `@id` annidati oppure un builder `Head::extend()`.
- Per la corsia A, a lock caduti (la misura delle ~15:43 mostrava ancora due `<head>` e due `<title>` nella home; dopo i lock non rimisurata): `@vite` e' ancora a fine `<body>` in `main.blade.php` (da misurare se va nell'head),
  e il default `index, follow` arriva da `MetatagData` senza politica per le pagine riservate.

Errore mio da sapere: la prima versione delle rotte (classe senza array dentro un gruppo con `namespace()`) ha fatto rispondere 500 «Invalid route action» a `/sitemap.xml` e `/robots.txt`
(probabilmente a tutto il sito di sviluppo per qualche minuto, non misurato). Corretto e rimisurato: `/it` e `/en` 200.

Non fatto da questa corsia, di proposito: nessun secondo strumento di audit, nessuna modifica a `Head.php`, `head.blade.php` o ai layout di Two, nessuna asset (logo, favicon, manifest: servono file veri).

## Ripartenza

Leggere `claims-open.py`; se i lock di A sono caduti, rimisurare l'output con l'audit e aprire la revisione dei difetti 1–10; altrimenti procedere
con le sole parti in file nuovi di Seo e con lo strumento di audit.
