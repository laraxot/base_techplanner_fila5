---
title: "Hero mobile non nascosta dall'header fisso"
type: story
theme: Two
status: implemented
updated: 2026-10-30
tags: [mobile, responsive, wcag, fixed-header, hero, css-variable, cookie-bar]
---

# Hero mobile non nascosta dall'header fisso

## Scopo

Il tema Two usa un header pubblico `fixed`: resta raggiungibile durante lo scroll, ma esce dal flusso e non occupa
spazio. Il primo contenuto (la hero della homepage) iniziava quindi sotto l'header e su mobile risultava in parte
coperto. Misura sulla home `/it` con il bundle precedente: **112 px di hero coperti**, a ogni larghezza.

## Cause radice

1. L'header (`sections/header/v1`) e' alto 7rem a inizio pagina (`py-4` + riga `h-20`) e nessun elemento riservava quello spazio.
2. Un passaggio mobile precedente aveva sostituito `h-screen` nelle hero con classi che **non esistono nel bundle compilato**:
   l'altezza minima non veniva applicata.
3. Una regola `.fixed[data-mobile-nav] { padding-top: env(safe-area-inset-top) }` azzerava il `padding-top` dell'header
   (l'header passava da 112 a 96 px) e un secondo offset da `5rem` sul `main` non bastava comunque.
4. Sulla home la hero era avvolta da un frammento Volt compilato in cache da una versione precedente della pagina
   (una scheda bianca con `p-6` su fondo grigio): 24 px di cornice attorno alla hero, a destra, a sinistra e sopra. La cache
   delle viste e' stata rigenerata; dopo aver cambiato una pagina Folio con `@volt` va ricompilata anche la vista in cache.

## Correzione (un solo punto, non hero per hero)

- `resources/css/app.css`: variabile `--site-header-h`, **5rem sotto `lg` e 7rem da `lg`** in su. Sotto `lg` l'header e' sempre
  compatto (`py-2` + riga `h-16` = 80 px, come da scrollato): meno schermo perso e nessun salto di altezza allo scroll.
  `html { scroll-padding-top: calc(var(--site-header-h) + 1rem) }` tiene ancore e focus da tastiera fuori dall'header
  (WCAG 2.4.11 / 2.4.12). Anche l'altezza massima del menu mobile usa la stessa variabile.
- `components/layouts/main.blade.php`: `<main>` riceve `pt-[var(--site-header-h)]` **solo se esiste l'header** (slot `beforeMain`).
  Senza header nessun offset.
- Hero `simple` e `fullscreen`: `min-h-[calc(100dvh-var(--site-header-h))]` (con `dvh`, la barra del browser mobile non falsa
  l'altezza). `contacts` e `internal`: il vecchio `pt-24` che compensava l'header diventa `pt-4`.
- Su telefono le hero hanno titolo `text-3xl` (da 480 px `text-4xl`), sottotitolo `text-lg` e spaziature ridotte: la prima CTA
  sale di circa 110 px e resta sopra la barra cookie. Il gradiente decorativo in fondo alla hero non intercetta piu' i tocchi
  (`pointer-events-none`).
- Rimossa la regola sul `padding-top` dell'header e il secondo offset da `5rem`. La safe-area serve solo con
  `viewport-fit=cover`, che il tema non usa.
- **Barra cookie (modulo Gdpr)**: sui telefoni e' compatta (testo 0,875rem, titolo ridondante solo per gli screen reader nella
  modalita' informativa, testo e pulsante sulla stessa riga da 360 px): 117 px a 390 px di larghezza invece di 189. Viene
  inserita nel DOM **dopo** lo skip link, non prima, cosi' lo skip link resta il primo stop di Tab. Con altezza viewport
  <= 30rem sta nel flusso, sotto l'header, e il `main` non aggiunge un secondo offset.
- **Skip link**: fisso in alto a sinistra sopra l'header (`z-index` 10000) quando riceve il focus. Prima restava nel flusso,
  sotto l'header, e il suo `clip-path` (Tailwind 4 usa `clip-path: inset(50%)` oltre a `clip`) non veniva azzerato.

Regola per le hero nuove: **non** compensare l'header dentro la hero. L'offset e' del layout; la hero usa la variabile solo
per l'altezza minima.

## Verifica (Playwright sulla home `/it`, tema Two, barra cookie visibile)

| Viewport | Hero coperta dall'header | Header | Barra cookie | Prima CTA | Seconda CTA |
|---|---|---|---|---|---|
| 390x844 | 0 px (era 112) | 80 px (era 112) | 117 px (era 189) | visibile, 0% coperta | visibile, 0% coperta |
| 390x667 | 0 px | 80 px | 117 px | visibile, 0% coperta (prima coperta del tutto) | 40% coperta |
| 320x568 | 0 px | 80 px | 149 px | sotto la barra finche' non si risponde | sotto la barra |
| 768x1024 | 0 px | 80 px | 135 px | visibile | visibile |

- Da `lg` (1024 px) l'header resta a 112 px e la hero parte subito sotto: 0 px coperti.
- Skip link: primo stop di Tab, nessun punto coperto dall'header; la barra cookie e' il secondo e il terzo stop.
- Lo zoom del browser non e' disabilitato (nessun `maximum-scale` ne' `user-scalable`).

## Limiti dichiarati

- Misurate le hero `simple` (home) e, per la geometria, `about`, `contacts` e `internal` a 1280, 1024 e 1023 px. Le varianti
  `main` e `enhanced` non sono usate da nessuna pagina e non sono state toccate.
- Non verificati con tecnologie assistive reali: lettura dello skip link e ordine di lettura con la barra cookie.
- Dopo ogni modifica a `resources/css/app.css` il bundle in `public/` va ricompilato (`npm run build` in questa cartella;
  `vite.config.js` imposta `build.emptyOutDir: false` per non svuotare `public/`).
- Questa correzione chiude il difetto geometrico; non e' una certificazione WCAG del sito. L'audit delle pagine e' descritto in
  [wcag-aaa-site-audit.story.md](wcag-aaa-site-audit.story.md); vedi anche `mobile-ux-pass.story.md`.
