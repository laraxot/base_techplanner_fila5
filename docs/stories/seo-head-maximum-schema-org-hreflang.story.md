---
title: "SEO al massimo del front office: <x-cms::head>, laravel/head, schema.org e hreflang"
type: story
status: review
priority: high
created: 2026-10-30
updated: 2026-10-30
tags: [seo, head, laravel-head, schema-org, hreflang, canonical, open-graph, theme-two, multilingual, playwright, bmad]
qmd: "seo head laravel/head schema.org hreflang canonical open graph theme two x-cms::head seo cms defaults precedence"
related:
  - ../wiki/concepts/laravel-head-layers-and-seo-checklist.md
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

- [~] Ogni pagina pubblica indicizzabile ha: un solo `<title>` e una sola `description` univoci e senza segnaposto; un `canonical`
      assoluto con lo schema realmente servito; `og:*` e `twitter:*` completi; `og:locale` nel formato `ll_RR`.
      Misurato tutto tranne `og:image` (manca l'asset); le descrizioni non sono univoche per pagina (vedi «Aperto» 3).
- [x] hreflang per le lingue scritte (`it`, `en`) più `x-default`, auto-riferito e reciproco su tutte le pagine che hanno una traduzione (misurato con GET).
- [x] JSON-LD valido (parse + vocabolario schema.org): `Organization` e `WebSite` sulla home, `BreadcrumbList` sulle pagine interne.
      `FAQPage` tolto dai requisiti (Google non lo mostra più dal 7-5-2026).
- [x] Login, registrazione, profilo e pagine di errore sono `noindex, follow`; la sitemap esclude le stesse pagine (36 URL, solo `it` ed `en`).
- [x] Nessuna chiave grezza (`metatag.*`) né segnaposto nell'HTML, in nessuna lingua.
- [~] Una pagina può sovrascrivere un solo campo (`Head::title()`, `->withHead()`) senza perdere gli altri: `flush()` rimosso, ma manca un test che lo provi.
- [~] Nessuna regressione visiva e funzionale su Two: screenshot a 390×844 e 1280×800, chiaro e scuro, console pulita, hero non coperta (header a 112/80 px,
      stato finale identico alla misura precedente). axe: 0 violazioni su 4 pagine su 5; il login ha 5 regole preesistenti. Il confronto pixel «prima/dopo» non è possibile:
      lo screenshot scuro di prima era una pagina 500 causata da un'altra sessione.
- [x] `phpstan analyse Modules` a 0 errori, nessun `@phpstan-ignore`, nessuna baseline.

## Claim

| Chi | Scope | Stato |
|---|---|---|
| agente `unknown` (task «implement reusable SEO Head component for Theme Two») | corsia A: `Cms` `Head.php`, view, test, provider, layout `main`/`base` di Two, story Cms | chiusa alle ~16:00 UTC (story `implemented`, lock caduti) |
| sessione 56da8100 (claude) | documenti, ricerca web, strumento di audit, Action in `Cms/Actions/Head/`, revisione del componente e dei layout `main`/`base`/login di Two, `errors/minimal`, `Seo` `BuildSitemapAction` (solo la regola delle lingue scritte) | fatto, in `review`; lock rilasciati |
| sessione 56da8100 (claude) — secondo giro «va piu' a fondo» | dopo due revisioni indipendenti (codice e SEO) e l'audit su tutte le 36 URL della sitemap: `Cms/Actions/Head/*` (policy robots: maiuscole/percent-encoding e regole pagina condivise con la sitemap; lingue scritte = titolo **e** blocchi; risoluzione della `Page` dal percorso; titolo senza doppio brand; descrizione per pagina dal `subtitle` dell'hero), `Head.php` (canonical unico, nessun canonical sui `noindex`), `BuildHeadSchemaAction` (`@id`, breadcrumb brevi), `Seo` `BuildSitemapAction` (stessa policy), titoli delle pagine di autenticazione di Two, test puri | fatto, in `review` (esiti in «Secondo giro»); lock rilasciati a fine giro |
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

**Aggiornamento 16:10 UTC (sitemap coerente con il `<head>`).** Rileggendo l'audit: i titoli CMS esistono solo in `it`/`en`, quindi `/de` e `/es` sono `noindex` (giusto) ma la sitemap li elencava (38 URL su 76).
`Seo\Actions\Sitemap\BuildSitemapAction` ora elenca solo le lingue con titolo scritto e scarta le URL che `Cms\Actions\Head\ResolveRobotsPolicyAction::isIndexable()` esclude.
Misurato: 36 URL (18 `it`, 18 `en`), hreflang reciproco, tutte 200 con `index, follow, max-image-preview:large`; PHPStan `Modules/Seo` a 0 errori.
**Dipendenza per la corsia A:** `BuildSitemapAction` chiama `ResolveRobotsPolicyAction::isIndexable($path, $localeCodes)`; se la firma o il nome cambiano, `/sitemap.xml` va in 500.
La regola «lingue con titolo scritto» e' duplicata (privata in `Head::translatedLocales()` e in `BuildSitemapAction::writtenLocales()`): quando A ha finito conviene estrarla in una Action di Cms e farla usare a entrambi.
Per A: `ResolveRobotsPolicyAction::HIDDEN_SEGMENTS` non contiene `area-personale` ne' `notifications`, che `robots.txt` chiude (`BuildRobotsTxtAction::PRIVATE_SEGMENTS`): i due elenchi vanno unificati (pagine dietro login, quindi anche `noindex`).
Durante la verifica, dalle 16:05 alle 16:06 UTC tredici pagine (`/it/services`, `/it/privacy`, `/it/terms`, ...) hanno risposto 500 per `Modules/Seo/app/View/Components/Head.php` con un import errato (`Illuminate\View\Components\Component`); il file e' sparito subito dopo (bozza di un'altra sessione) e le pagine sono tornate 200. La scansione automatica dei componenti Blade di un modulo carica ogni classe in `app/View/Components`: una bozza con un import sbagliato rompe le pagine che risolvono un componente.

Errore mio da sapere: la prima versione delle rotte (classe senza array dentro un gruppo con `namespace()`) ha fatto rispondere 500 «Invalid route action» a `/sitemap.xml` e `/robots.txt`
(probabilmente a tutto il sito di sviluppo per qualche minuto, non misurato). Corretto e rimisurato: `/it` e `/en` 200.

Non fatto da questa corsia, di proposito: nessun secondo strumento di audit, nessuna modifica a `Head.php`, `head.blade.php` o ai layout di Two, nessuna asset (logo, favicon, manifest: servono file veri).

## Esiti della revisione del componente (sessione 56da8100, 2026-10-30, lock di A caduti)

Misurato con `bashscripts/tools/head-audit.mjs` su Two (`192.168.1.40:8000`, solo GET): 8 pagine × 390/1280 px × chiaro/scuro = 32 misure.

| Misura | Controlli falliti | Tipi | Note |
|---|---|---|---|
| prima (componente di A, run 2) | 254 | 19 | `<head>` annidato, descrizione segnaposto, chiavi `metatag.*`, nessun hreflang/Organization/BreadcrumbList |
| dopo (run 7) | 28 | 1 | solo `og:image` mancante (serve l'asset 1200×630) |

CLS massimo 0,022 (pagina di login), console pulita e nessuna risorsa fallita su tutte le pagine; `phpstan analyse Modules` 0 errori;
Pest isolato (senza avviare Laravel né toccare MySQL) 6 test / 24 asserzioni verdi sulle quattro Action.
Le misure 4 e 6 sono state falsate da 500 transitori di un'altra sessione (rotta sitemap e un `Seo/View/Components/Head.php` con un import inesistente, poi
rimosso): sono state ripetute a server stabile.

Difetti 1–10: tutti chiusi tranne il numero 8.

| # | Esito |
|---|---|
| 1 | `keywords`/`author` tolti (Google li ignora); `og:site_name` e `application-name` dal brand `pub_theme::header.brand.name` |
| 2 | descrizione del sito dal tema (`pub_theme::seo.site.description`, 4 lingue); se manca il tag si omette |
| 3 | `/auth/*`, `profile`, `dashboard`, `area-personale`, `notifications`, `coming-soon`, `preview-content` sono `noindex, follow`; titolo del login «Accedi al tuo account — Sottana Service» |
| 4 | canonical con `forceHttps: false`: stesso schema della URL servita, uguale a `og:url` |
| 5 | `og:locale` `it_IT`/`en_GB` da `LaravelLocalization`; hreflang `it`, `en` e `x-default` con auto-riferimento, URL assolute, reciprocità verificata con GET |
| 6 | un solo brand («Sottana Service») |
| 7 | home: `Organization` + `WebSite`; interne: `WebPage` + `BreadcrumbList`; nessun `FAQPage` (vedi D6) |
| 8 | **aperto**: `og:image` omessa perché `/images/logo.png` dava 404; serve `public/themes/Two/images/social-share.jpg` 1200×630 |
| 9 | `flush()` tolto; i valori di pagina restano a runtime |
| 10 | `theme-color` passato dal layout (`theme-color="#0f2b46"`); qualcuno ha lasciato in classe un valore di ripiego uguale, accettato per i layout che non lo passano |

Altre correzioni nate dalla misura:

- **`<head>` annidato**: i layout `components/layouts/main` e `base` di Two avvolgevano `<x-cms::head>` in un `<head>`, e la vista ne emette uno proprio, quindi
  l'HTML grezzo aveva `<head><head>`, due `</head>` e due `csrf-token` (il DOM li unisce: per questo il controllo in browser di A non lo vedeva). Ora è il componente a possedere `<head>`.
- **Pagine di errore**: `laravel/resources/views/errors/minimal.blade.php` aveva `<html lang="en">` fisso con testo italiano e nessun `robots`; ora lingua corrente e `noindex, follow`.
- **Lingue non tradotte**: `/de` e `/es` servono contenuto italiano (i titoli CMS esistono solo in `it` e `en`). Sono `noindex`, senza hreflang e fuori dalla sitemap; quando si
  scrive il titolo in quella lingua diventano indicizzabili da sole. La regola è in `Cms/Actions/Head/ResolveWrittenLocalesAction`, usata da `<x-cms::head>` e dalla sitemap.
- Elenco dei segmenti riservati unico: `ResolveRobotsPolicyAction::HIDDEN_SEGMENTS` (letto da `<head>` e sitemap).

### Decisioni riviste dopo la ricerca e il sorgente

- **D2 corretta**: `Head::defaults()` è eager (gira al boot), quindi **non** può contenere nulla che dipenda da lingua o richiesta. I valori di sito dipendenti dalla lingua
  si scrivono a runtime dal componente; in `defaults()` si può mettere solo ciò che è fisso. Per ora non si usa `defaults()`.
- **D1 spostata**: le Action (robots, hreflang, schema, lingue scritte) stanno in `Cms/app/Actions/Head/`, non in `Seo`: `Seo` dipende già da `Cms`
  (sitemap) e una dipendenza inversa sarebbe circolare. `Seo` le legge.
- **D6 corretta**: niente `FAQPage` (rich result terminato il 7-5-2026), niente `SearchAction`, niente `ProfessionalService`. `Organization` finché non ci sono indirizzo e telefono reali.
- **Nuova D9**: lingua non scritta ⇒ `noindex`, niente hreflang, fuori sitemap.
- **Nuova D10**: gli asset (favicon, manifest, icona Apple, immagine social) si emettono solo se il file esiste.

### Aperto, per l'utente o per altre corsie

1. **Asset mancanti** in `public/themes/Two/`: `images/social-share.jpg` (1200×630), `favicon.ico` (quello in radice è vuoto, 0 byte), `favicon-180x180.png`, `site.webmanifest`. Senza, `og:image` e le icone restano omessi.
2. **`robots.txt`** (corsia C, `Seo/Actions/Robots/BuildRobotsTxtAction`): chiude con `Disallow` le stesse aree che il `<head>` marca `noindex`. Con `Disallow` il crawler non legge il `noindex` e l'URL
   può restare in indice: conviene togliere dal `robots.txt` le aree già `noindex` e tenere `Disallow` solo per i pannelli `/admin`. L'elenco unico è `ResolveRobotsPolicyAction::HIDDEN_SEGMENTS`.
3. **Descrizione per pagina**: le pagine CMS non hanno un campo `description`, quindi tutte le pagine pubbliche ripetono la descrizione del sito. Serve un campo (o un estratto) per pagina.
4. **Login in tema scuro** (difetto preesistente, non del `<head>`): le etichette dei campi sono invisibili (testo chiaro su scheda bianca) e axe segnala 5 regole (`landmark-one-main`,
   `page-has-heading-one`, `region`, `color-contrast-enhanced`, `target-size`). Le altre quattro pagine misurate: 0 violazioni. Gli altri titoli delle pagine `auth` (registrazione, password) restano «Sottana Service».
5. **Contenuto `de`/`es`**: da tradurre (titoli CMS, poi contenuto) per entrare in indice.
6. **`wire:navigate`**: Livewire non rimuove gli `<script>`, quindi i JSON-LD delle pagine visitate si accumulano nel DOM del browser; ai crawler non importa. Non coperto dall'audit.
7. **Non eseguiti**: Lighthouse, Rich Results Test e Schema Markup Validator (richiedono una URL pubblica), `og:locale:alternate` (la libreria sovrascrive i meta con la stessa chiave).
8. **Tipo schema dell'organizzazione**: `Organization`; `LocalBusiness`/sottotipo solo con indirizzo e telefono reali del tenant (decisione dell'utente).

## Ripartenza

`AUDIT_BASE=http://192.168.1.40:8000 node bashscripts/tools/head-audit.mjs <cartella>` deve dare 1 tipo di controllo fallito (`og-completo`) finché manca l'immagine social. Se un altro tema monta
`<x-cms::head>`: non avvolgerlo in `<head>`, passare `theme-color` e creare `lang/<lingua>/seo.php` con `site.description`. Conoscenza durevole:
[laravel-head-layers-and-seo-checklist](../wiki/concepts/laravel-head-layers-and-seo-checklist.md).

## Revisione profonda successiva

- Il fallback della description ora normalizza anche una traduzione vuota usando `MetatagData`, evitando OG/Twitter vuoti.
- Il canonical forza HTTPS solo in produzione; in sviluppo mantiene lo schema realmente servito.
- `BuildPageSchemaAction` riceve il canonical già renderizzato dal componente e localizza gli URL di `Event` e `Person`.
- Il layout base di Two espone skip-link e landmark `main`; il componente Head espone anche `@stack('head')`.
- Verificato con Playwright: login 200, un solo `main#main-content`, un solo skip-link e un solo `h1`.
- Il run globale PHPStan è temporaneamente bloccato da file Fixcity non ancora completati da un altro agente (154 errori su classi/factory/migration mancanti); PHPStan mirato Cms+Seo resta verde.

## Secondo giro «va piu' a fondo» (sessione 56da8100, 2026-10-30)

Metodo: revisione di codice indipendente, ricerca SEO indipendente, Lighthouse e prova di `wire:navigate` da sotto-agenti, audit su **tutte** le URL della sitemap (non solo 8 pagine). Dettagli sensibili solo in `bashscripts/docs/audit/` (repo riservato).

| Misura | Prima | Dopo |
|---|---|---|
| Sitemap | 36 URL | 32 URL (fuori le 4 pagine con titolo inglese ma corpo solo italiano) |
| Audit su tutta la sitemap (42 percorsi) | 50 controlli falliti / 7 tipi | 41 / 3 tipi; i residui sono `og:image` mancante (asset) e il 500 preesistente di una pagina non del `<head>` |
| Audit 8 pagine × 390/1280 × chiaro/scuro | 28 / 1 tipo | 28 / 1 tipo (`og:image`) |
| Pest isolato (senza Laravel, senza MySQL) | 6 test | 63 test / 119 asserzioni + 1 test `Seo` |
| `phpstan analyse Modules` | 0 | 0 |

Cosa e' cambiato:

- **Policy robots**: il percorso si normalizza (minuscole, percent-encoding, prefisso lingua) prima del confronto, quindi `/IT/Dashboard` o `/it/%61uth` non aggirano piu' il `noindex`. Le regole *per pagina* (slug `tests.*`, `auth.*`, `*.view`, middleware `auth`, slug riservati) stanno in `ResolveRobotsPolicyAction::isPageIndexable()` e le usano **sia** `<x-cms::head>` **sia** `BuildSitemapAction`: pagina nel `<head>` indicizzabile ⇔ pagina in sitemap (controllo dell'audit).
- **Lingua scritta = titolo *e* contenuto** (`ResolveWrittenLocalesAction::fromRaw`): una pagina con titolo inglese ma senza blocchi inglesi serviva testo italiano sotto `/en/`; ora e' `noindex`, senza canonical, hreflang e JSON-LD, ed e' fuori sitemap.
- **`noindex` ⇒ nessun canonical, nessun hreflang, nessun JSON-LD** (segnali contraddittori eliminati).
- **Titolo**: `ComposeDocumentTitleAction` produce sempre `Pagina — Brand`, brand una sola volta anche se il titolo CMS lo contiene gia' (`Contatti - SOTTANA SERVICE` ⇒ `Contatti — Sottana Service`). Le pagine di autenticazione di Two (registrazione, password dimenticata, reimposta, verifica e-mail) usano `title-key` sul layout `base`, senza ripiego su un'altra lingua.
- **Descrizione per pagina**: `ResolvePageDescriptionAction` ricava il testo dal `subtitle`/`description` del primo blocco della lingua corrente (20–160 caratteri, parola intera); la home mantiene la descrizione curata del sito. Controllo dell'audit: nessuna descrizione ripetuta tra pagine.
- **Pagina CMS dal percorso**: `ResolveCmsPageAction` risolve come il middleware delle pagine (`home`, `a.b`, `.index`, nome rotta) e non fa cadere la pagina su slug duplicati.
- **Schema**: `Organization` con `@id` `…/#organization` e `WebSite` con `@id` `…/#website` e `inLanguage` (stringa o elenco delle lingue scritte); le pagine interne hanno `isPartOf` verso il `WebSite` e briciole brevi (`Home` / titolo breve, non il brand lungo). Il JSON-LD non riceve **mai** l'utente della sessione (un'intera classe di fughe di dati personali e' chiusa per costruzione) e un errore di schema non toglie piu' la pagina (`try/catch` + `report()`).
- **Canonical unico**: una sola stringa per `rel=canonical`, `og:url` e JSON-LD.
- Lo strumento `bashscripts/tools/head-audit.mjs` legge `/sitemap.xml` e controlla: indicizzabile ⇔ in sitemap, hreflang del `<head>` = hreflang della sitemap, `x-default`, `noindex` senza canonical/hreflang, brand una volta nel titolo, descrizione unica.

Lighthouse mobile (dev, con debugbar): SEO 92 su 4 pagine; l'unica regola fallita (`crawlable-anchors`) viene dalla barra di debug, quindi in produzione e' atteso 100. Nessun link del sito usa `wire:navigate` (navigazione a pagina intera); provando `Livewire.navigate()` a mano titolo, canonical, descrizione, og, hreflang, robots e `lang` si aggiornano e il Back li ripristina; i blocchi JSON-LD si accumulano nel DOM (basso rischio, i crawler non eseguono la navigazione SPA).

### Aperto, per l'utente (non inventato da me)

1. **Alias duplicati** (`faq`/`faqs`, `cookie`/`cookies`, `contatti`/`contacts`, `about`/`chi-siamo`, in entrambe le lingue): URL distinti, tutti indicizzabili con canonical su se stessi. Serve una scelta: uno slug canonico + 301 e fuori dalla sitemap/navigazione.
2. **Titolo della home** diverso dall'`h1`: proposta del SEO specialist «Radioprotezione per Studi Dentistici e Veterinari | Sottana Service» (testo, decisione di contenuto).
3. **Corpo inglese mancante** per blog e due servizi (oggi `noindex` per regola, non indicizzati): tradurre per farli entrare in indice; idem contenuto `de`/`es`.
4. **Asset**: immagine social 1200×630, favicon/manifest, logo raster quadrato ≥ 512×512 per `Organization` (oggi SVG 200×50, sotto il minimo di Google).
5. **Schema**: `sameAs` dell'organizzazione e `LocalBusiness` con indirizzo/telefono reali (nel footer ci sono profili personali: non li ho pubblicati come `sameAs`); `Article` per il blog (autore, data).
6. **Host attendibili in produzione** e `robots.txt` (`Disallow` + `noindex` si annullano): dettagli nella nota riservata.
7. **Prestazioni** (fuori dal `<head>`, storia a parte): CSS del tema pesante (~970 KB, in gran parte inutilizzato), immagine hero di alcuni MB, LCP alto in dev.
8. Difetti preesistenti non del `<head>` trovati durante l'audit: nota riservata.

## Terzo giro «piu a fondo» (corsia C, sessione 97f16a39, 2026-10-31)

Scansione dei link interni e delle risorse di tutte le pagine della sitemap (32 URL, solo GET su Two): 75 link unici, 53 risorse; nessuna risorsa non 2xx, nessuna `<img>` senza `alt`, nessun `target="_blank"` senza `noopener`.

**Corretti (dati dei contenuti, non codice).** Il pulsante principale dell'intestazione in inglese e in tedesco puntava a pagine inesistenti (`/en/contact`, `/de/kontakt`, 404 su ogni pagina), come altri sei link in `services.json` e quattro `/contacts` senza lingua in `about.json` e `faqs.json`. Ora puntano a `/en/contacts`, `/de/contacts`, `/it/contacts`: le pagine che il menu della stessa lingua gia' usa. Corretti i JSON del tenant letto dal sito (`config/local/techplanner/database/content`) e la copia identica in `Modules/TechPlanner/config/database/content`, che restano uguali; corretto anche `Themes/Two/docs/header-multilingual-implementation.md`, che dava gli URL sbagliati come previsti. Dopo la correzione i link interni non 200 sono 1.

**Aperto, contenuti da fornire (non inventati):**
- La card inglese del blog «Safety in Dental Practices: Complete Guide 2026» punta a un articolo che non esiste: scrivere l'articolo o togliere la card.
- Lingua `es`: l'intestazione ha blocchi solo per `it`, `en`, `de`, quindi `/es` mostra menu e pulsanti italiani verso `/it/...`; `/de` ha un link a `/it/contatti` nel corpo.
- Immagine esterna (`images.unsplash.com`) negli articoli: meglio una copia locale.

**Verificato senza difetti:** canonical senza query string, slash finale e maiuscole nella lingua con 301 all'URL canonico, 404 reali con `noindex, follow`, description ora per pagina (la misura precedente «tutte uguali» non vale piu'), sitemap coerente con la politica del `<head>` (36 -> 32 URL: tolte da sola quattro pagine inglesi senza testo inglese).

Dettagli e misure: audit del modulo TechPlanner in `laravel/Modules/TechPlanner/docs/wiki/audits/seo-head-deep-verification.md` (sezioni 2 e 6).

## Terzo giro «piu a fondo» (sessione 56da8100, 2026-10-31)

Metodo: sonde GET sulle varianti dello stesso URL (slash finale, query, maiuscole, doppio slash, segmenti-punto, percent-encoding, `index.php` nel percorso) e crawl di tutti i link interni delle 32 pagine in sitemap (stato, redirect, `noindex`, fuori sitemap, orfane, `alt`, `h1`, `rel`).

- **Una sola forma del percorso**: nuova `Cms\Actions\Head\CollapsePathSegmentsAction` (senza segmenti vuoti né punto, `..` risale). La usano la policy robots (`pathSegments`, quindi anche `ResolveCmsPageAction`) e il canonical: due URL che il router serve come la stessa pagina hanno la stessa decisione di indicizzazione e lo stesso canonical. Prima la policy guardava il solo primo segmento *grezzo*.
- **Canonical, `og:url` e `@id` dello schema nascono da una sola radice** (`Head::siteRoot()`): senza `index.php` (come `asset()`), https in produzione. Prima `rootUrl`/`homeUrl` non seguivano l'upgrade a https del canonical.
- **hreflang solo dalla forma canonica**: le alternative linguistiche derivano dall'URL richiesto, quindi su una variante non canonica le dichiara solo l'URL pulito a cui punta il canonical.
- **Crawl dei link interni**: 0 pagine orfane, 1 `h1` per pagina, nessuna immagine senza `alt`, nessun `target=_blank` senza `noopener`, nessun link verso pagine fuori sitemap (le alias sono in sitemap, vedi «Aperto»). Trovati e chiusi:
  - blocco `cta.simple` di 4 pagine (articolo del blog e 3 servizi): il contenuto usava `subtitle`/`cta_label`/`cta_url`, la vista legge `description`/`primary_cta_label`/`primary_cta_url` (come `chi-siamo`). Risultato: pulsante verde senza testo e `href="#"`, sottotitolo vuoto, nessun link interno ai contatti. Allineati i dati (8 file JSON: modulo TechPlanner e copia del tenant) e la vista Two omette ora pulsante e sottotitolo se non hanno un valore reale.
  - il link dell'intestazione a `/en/contact` (404, 14 pagine) e un `/contacts` senza lingua (404) li sta correggendo un'altra sessione (task `cta-links-404`): non toccati qui.
- **Misure**: Pest isolato 77 test / 133 asserzioni (14 nuovi); `phpstan analyse Modules/Cms/app Modules/Seo/app` 0 errori; varianti di URL e CTA verificate con GET sul server.

Aperto (oltre al secondo giro): la lista dei difetti di contenuto con URL e file e' nella nota riservata; il contenuto inglese del blog e' da decidere con chi scrive i testi.

**Esito finale del terzo giro:** `head-audit` su 8 pagine × 390/1280 × chiaro/scuro = 32 misure: **0 controlli falliti** (prima `og:image` mancante). Gli asset li ha aggiunti un'altra sessione come file **non tracciati** (`public/themes/Two/images/social-share.jpg` 1200×630, `site.webmanifest`, `apple-touch-icon.png` e le copie in `laravel/Themes/Two/resources/` e `resources/`): vanno rivisti e versionati dall'utente. Il resto di «Aperto, per l'utente» del secondo giro non cambia, tolti l'immagine social e il manifest.

## Quarto giro: re-audit del sito su 12 aspetti (sessione 56da8100, 2026-11-01)

Metodo: un agente per aspetto (accessibilita', responsive/visuale, markup e dati strutturati, codice del front office, resilienza, regressioni sul baseline, i18n e link, documentazione, sicurezza, produzione, dipendenze, privacy), solo GET su un server di sviluppo. Sintesi pubblica e piano: `laravel/Modules/TechPlanner/docs/wiki/audits/site-reaudit.md`; il dettaglio resta nei rapporti riservati.

- **Una lingua e' «scritta»** solo con titolo e almeno un blocco non `hero`: cinque pagine inglesi vuote fuori dalla sitemap (32 a 27), `noindex`, nessun hreflang. Test isolati 79, PHPStan 0.
- **Chiavi JSON ignorate dalla vista** (home, banner dei servizi) corrette lato JSON; guardia `PageBlockContractTest` (debito noto, solo in calo). Storia: `laravel/Themes/Two/docs/stories/blocks-json-contract-and-share.story.md`.
- **Condivisione degli articoli**: blocco `share` in Two sul componente `x-seo::social-share`, 4 lingue, bersagli a 44 px, axe 0.
- **Modo scuro del sistema e contrasti** (`data-theme="light"`, eyebrow, hero, banner, login, link di recupero, mappa dei contatti): storia `laravel/Themes/Two/docs/stories/a11y-color-scheme-and-contrast.story.md`.
- **Fixcity**: la storia che chiedeva di «riparare» il modulo e' chiusa `superseded` (premessa errata: questo sito non lo usa).
- **Misure**: `phpstan analyse Modules` 0 errori; compilazione Blade 11 viste senza errori; 22 pagine pubbliche 200.

Aperto per il titolare: invio di form contatti e newsletter (destinazione, conservazione, informativa), e-mail unica, testi cookie e privacy, alias duplicati, de/es, plugin tipografico (ricompilazione degli asset), azioni su esposizioni e credenziali nei rapporti riservati. Prestazioni (Core Web Vitals) da misurare su server tranquillo.

## GitHub (tracciamento)

- Issue: https://github.com/laraxot/base_techplanner_fila5/issues/18 (coordinamento multi-agente del repo base)
- Discussion: https://github.com/laraxot/base_techplanner_fila5/discussions/54
- Nota: riusate le due di coordinamento del repo base; nessuna issue o discussion nuova creata da questa passata (decisione dell'utente se aprirne una per modulo/tema owner).
