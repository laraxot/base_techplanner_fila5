---
title: "Two: verifica visiva e funzionale dopo il nuovo <head> SEO"
type: story
theme: Two
status: review
priority: high
created: 2026-10-30
updated: 2026-10-30
tags: [seo, head, theme-two, playwright, screenshots, regression, wcag, dark-mode]
qmd: "theme two head seo regression screenshots playwright mobile dark mode console hero header x-cms::head"
related:
  - ../../../../../docs/stories/seo-head-maximum-schema-org-hreflang.story.md
  - ./mobile-hero-header-offset.story.md
  - ./wcag-aaa-site-audit.story.md
---

# Two: verifica visiva e funzionale dopo il nuovo `<head>` SEO

Corsia C della story [SEO al massimo del front office](../../../../../docs/stories/seo-head-maximum-schema-org-hreflang.story.md).
Il cambio del `<head>` tocca ogni pagina: font, CSS, anti-FOUC, Alpine/Livewire, `theme-color`, cookie bar. Qui si dimostra, con misure e
screenshot, che Two continua a funzionare e a sembrare uguale.

## Scopo

Come mantenitore voglio un confronto ripetibile prima/dopo sul tema servito (Two), così che una regressione del `<head>` si veda subito
(layout spostato, stile mancante, errore in console, anteprima rotta) e non dopo la pubblicazione.

## Cosa può rompersi cambiando il `<head>`

- Ordine e presenza di `@livewireStyles`, `@filamentStyles`, `@vite` e dei CSS del modulo Xot (`header-actions-wrap`, `mobile-touch-targets`,
  `record-anchor-highlight`): un CSS fuori ordine cambia la cascata.
- Anti-FOUC del tema scuro (`dark_mode` in `localStorage`) e `[x-cloak]`: se arrivano dopo il primo paint si vede un lampo.
- `theme-color` (`#0f2b46`) e viewport: barra del browser mobile e zoom.
- Offset della hero sotto l'header fisso (`--site-header-h`): la story `mobile-hero-header-offset` ha fissato 112 px di hero coperti, da non riaprire.
- Barra dei cookie e `wire:navigate`: navigando con Livewire il `<head>` non viene ricaricato, quindi titolo e meta devono aggiornarsi.
- Lingue `it`, `en`, `de`, `es`: titolo e descrizione devono essere nella lingua della pagina.

## Acceptance criteria

- [x] Per `/it`, `/it/faq`, `/it/cookie`, `/it/auth/login`, `/en`, `/de`, `/es` e un 404: HTTP atteso, un solo `<head>`, un solo `<title>`,
      una sola `description` (dove la pagina è indicizzabile), nessun errore né avviso in console, nessuna risorsa mancante (4xx/5xx).
      Misurato sull'HTML grezzo della risposta, non sul DOM. Non coperta: una pagina CMS interna diversa da `/it/faq` e `/it/cookie`.
- [~] Screenshot a 390×844 e 1280×800, tema chiaro e scuro: fatti e guardati (home 1280 e 390 chiaro, login 390 scuro). Il confronto di pixel
      con il "prima" non si fa: il «prima» non è ricostruibile (git forward-only) e due misure erano invalide (una pagina 500 di un'altra sessione,
      e l'header che anima da 80 a 112 px dopo il caricamento). Ora lo strumento attende ~1,2 s prima di scattare.
- [x] Hero non coperta dall'header a 390 e 1280 px (header 80/112 px a regime, hero visibile); CLS massimo 0,022 su tutte le pagine misurate.
- [~] axe-core: 0 violazioni su 4 pagine su 5. `/it/auth/login` ne ha 5 che non vengono dal `<head>` (contrasto, landmark `main`, titolo di primo
      livello, regioni, dimensione dei bersagli) più le etichette poco leggibili in tema scuro: vanno in una story propria del login.
- [ ] Navigazione `wire:navigate` fra due pagine: titolo, canonical e JSON-LD aggiornati nel DOM. Non misurata; nota di progetto: `wire:navigate`
      sostituisce titolo e meta ma non rimuove gli `<script>`, quindi i JSON-LD delle pagine visitate si accumulano nel DOM del browser.
- [ ] Lighthouse SEO ≥ 95 e Best Practices senza nuovi avvisi. Non eseguito: nessun display in questo ambiente, solo Playwright headless.

## Revisione WCAG profonda

Il layout base di autenticazione ora espone un landmark `main#main-content` con
skip-link tastiera. Playwright ha verificato `/it/auth/login` a HTTP 200 con un
`main`, un skip-link e un `h1`; resta da ripetere axe dopo la chiusura del
contrasto in tema scuro e dei target touch.

## Tasks

- [x] Eseguire lo strumento `head-audit.mjs` (repo `bashscripts`) con `AUDIT_BASE=http://192.168.1.40:8000` (mai `127.0.0.1:8000`: è FixCity).
- [x] Screenshot e JSON restano fuori dai repo pubblici; qui solo i numeri riassunti, senza `file:riga` né debolezze aperte.
- [x] Confrontare con la baseline HTML salvata prima della corsia A: il `<head>` annidato (due `<head>` nell'HTML grezzo) era il difetto principale.
- [x] Playwright headless (nessun display per `chrome-devtools`).

## Owned File/Module Scope

Documentazione in `laravel/Themes/Two/docs/`. Le uniche modifiche a Two fatte dalla sessione, con la story hub come riferimento: i due layout
`components/layouts/main.blade.php` e `base.blade.php` (ora montano `<x-cms::head>` senza avvolgerlo in un `<head>`), il titolo della pagina di accesso
e i file `lang/{it,en,de,es}/seo.php` con la descrizione del sito. Nessun CSS toccato.

## Claim

| Chi | Scope | Stato |
|---|---|---|
| sessione 56da8100 (claude) | misure, layout `main`/`base`, `lang/*/seo.php` | fatto, in `review`; lock rilasciati |

## Dev Agent Record

Misura finale (`head-audit.mjs`, 8 pagine × 390/1280 px × chiaro/scuro = 32 misure, solo GET su `192.168.1.40:8000`):

| Indicatore | Prima | Dopo |
|---|---|---|
| Controlli falliti | 254 (19 tipi) | 28 (1 tipo: `og-completo`, manca l'asset `og:image`) |
| `<head>` nell'HTML grezzo | 2 | 1 |
| Titolo accesso | «Sottana Service» uguale a ogni pagina | «Accedi al tuo account — Sottana Service» |
| CLS massimo | non misurato | 0,022 |
| Sitemap `/sitemap.xml` | 200 | 200, 36 URL (solo `it` e `en`) |

- `/de` e `/es` rispondono 200 ma sono `noindex` e senza hreflang finché il contenuto CMS non è tradotto (scelta, non difetto).
- Baseline HTML del `<head>` prima della modifica salvata nello scratchpad della sessione; gli screenshot restano fuori dai repo pubblici.
- Il layout `main` aveva anche un secondo meta CSRF duplicato: tolto insieme al `<head>` annidato.

## Non verificato

- Differenza visiva pixel per pixel prima/dopo (vedi acceptance criteria): il "prima" non è ricostruibile.
- `verify-email`: il titolo e' impostato, ma la pagina non risponde 200 per un difetto fuori dal `<head>` (nota riservata): non misurabile.
- Etichette del modulo di accesso in tema scuro e violazioni axe della pagina di accesso: story propria, non causate dal `<head>`.

## Ripartenza

Rilanciare `AUDIT_BASE=http://192.168.1.40:8000 node bashscripts/tools/head-audit.mjs <cartella>` dopo ogni modifica al `<head>` o ai layout di Two;
poi coprire `wire:navigate` e il titolo delle altre pagine di autenticazione.

## Secondo giro (2026-10-30)

- **Titoli delle pagine di autenticazione**: il layout `components/layouts/base` accetta `title` oppure `title-key` (chiave di traduzione, usata solo se esiste nella lingua corrente: niente chiave grezza ne' titolo in un'altra lingua). Registrazione, password dimenticata e reimposta usano `user::auth.*.title.*`: «Crea un nuovo account — Sottana Service», «Password dimenticata? — Sottana Service», «Reimposta password — Sottana Service». In `en`/`de`/`es` dove manca la chiave resta «Sottana Service».
- **Audit su tutta la sitemap** (42 percorsi, 1280 px) e su 8 pagine × 390/1280 × chiaro/scuro: unico controllo ricorrente fallito `og:image` (serve `public/themes/Two/images/social-share.jpg` 1200×630). Schermate `it-1280-light` e `it-390-dark` controllate a occhio: intestazione, hero e barra cookie a posto.
- **Lighthouse mobile** (dev, con debugbar): SEO 92 su `/it`, `/it/faq`, `/it/cookie`, `/en`; l'unica regola fallita viene dalla barra di debug (`crawlable-anchors`). Accessibilita' 96–97. Da correggere (storia a parte, non del `<head>`): il CSS di `app-*.css` pesa ~970 KB con grande parte inutilizzata, l'immagine hero e' di alcuni MB, `/en` carica un'immagine esterna da ~650 KB, `/it/faq` ha LCP alto in dev; il pulsante del cambio lingua ha un nome accessibile diverso dall'etichetta visibile (`label-content-name-mismatch`).
- **`wire:navigate`**: nessun link del tema lo usa. Con `Livewire.navigate()` da script titolo, canonical, descrizione, `og:*`, hreflang, robots e `lang` si aggiornano e il tasto Indietro li ripristina; i blocchi JSON-LD si accumulano nel DOM.
