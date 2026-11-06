---
title: "Two: schema colore chiaro forzato e contrasti dei blocchi (re-audit accessibilita')"
type: story
theme: Two
status: review
priority: high
created: 2026-11-01
updated: 2026-11-01
tags: [accessibility, wcag, color-scheme, contrast, theme-two, daisyui]
qmd: "theme two data-theme light prefers-color-scheme dark daisyui contrasto eyebrow banner cta hero statistiche login logo particelle reduced-motion mappa contatti"
related:
  - ../../../../../docs/stories/seo-head-maximum-schema-org-hreflang.story.md
  - ./blocks-json-contract-and-share.story.md
  - ./wcag-aaa-site-audit.story.md
---

# Schema colore chiaro forzato e contrasti dei blocchi

## Contesto

Il re-audit del sito (accessibilita' e responsive/visuale) ha trovato difetti di contrasto e di comportamento con una causa comune e locale al tema. La correzione sta solo in viste Blade con classi gia' presenti nel CSS compilato: nessuna ricompilazione degli asset.

## Causa radice del modo scuro

Il CSS del tema contiene, dentro `prefers-color-scheme: dark`, la regola daisyUI `:root:not([data-theme])`, che ribalta i token (`base-100`, `base-content`, ...). Header, hero, footer e blocchi usano invece colori fissi: con un sistema operativo in modo scuro i titoli delle schede (`h3`) diventavano `#18181b` su `#191e24` (1,06:1) e i titoli delle pagine di accesso quasi bianchi su bianco (1,07:1). `[data-theme=light]` e' gia' compilato: basta dichiararlo su `<html>`.

## Cosa e' stato fatto

| Difetto | Correzione | Dove |
|---|---|---|
| Titoli quasi invisibili con `prefers-color-scheme: dark` | `data-theme="light"` su `<html>` | `components/layouts/main`, `components/layouts/base` (pagine pubbliche e accesso) |
| Statistiche dell'hero sotto la dissolvenza chiara (1,5-2,8:1) | `pb-16` al contenitore quando ci sono statistiche | `blocks/hero/fullscreen`, `blocks/hero/simple` |
| Eyebrow «Sicurezza e compliance» 1,96:1 | `text-green-400` (come le icone dello stesso blocco) | `blocks/why-critical/grid` |
| Banner CTA dei servizi 2,4-3,0:1 (gradiente viola-rosa fuori palette) | gradiente di brand predefinito, lo stesso di `cta/consultation` | `blocks/cta/banner` |
| Logo del login: rettangolo bianco | tolto il filtro `color="white"` | `pages/auth/login` |
| Didascalie del pannello di accesso 3,2-3,5:1 | opacita' da 0,6 a 0,85 | `pages/auth/login` |
| Particelle del login sempre in movimento | un solo fotogramma con `prefers-reduced-motion: reduce` | `components/ui/particles` |
| Mappa dei contatti: didascalia e link ritagliati ma focalizzabili | tolta l'altezza fissa del riquadro | `blocks/contact/info` |
| Link «Torna al login» 3,51:1 | `text-primary-700` (5,0:1), hover `text-primary-800` | modulo User, widget `forgot-password` |

## Misure (server di sviluppo, solo GET)

- Modo scuro: confronto pixel per pixel tra schema scuro e chiaro su `/en/chi-siamo` e sulla pagina di recupero password: 0 pixel diversi. Colore calcolato dei titoli delle schede uguale nei due schemi. Home: differenza di 1,3% dei pixel, solo la transizione dell'ombra dell'header.
- Statistiche dell'hero `/en`: ora sopra la dissolvenza, leggibili a 1280 px (screenshot).
- Banner dei servizi `/en/services` e eyebrow dell'home: leggibili (screenshot).
- Login: logo visibile; con `reducedMotion: reduce` il canvas resta a 1 fotogramma distinto in 2,4 s (prima 4); con preferenza normale 4.
- Mappa dei contatti: link «Ottieni Indicazioni» dentro il riquadro a 1280 e 390 px, overflow orizzontale 0.
- Link di recupero password: 5,0:1 su bianco.
- Compilazione Blade: 11 viste, 0 errori. Controllo a campione: 22 pagine pubbliche 200 con `data-theme="light"`.

## Criteri di accettazione

- [x] Con `prefers-color-scheme: dark` le pagine pubbliche e di accesso coincidono con quelle chiare.
- [x] Ogni difetto della tabella corretto e misurato.
- [x] Nessuna classe nuova fuori dal CSS compilato (nessuna ricompilazione).
- [x] Nessun testo fisso nuovo nelle viste.

## Fuori perimetro e decisioni

- Layout legacy `layouts/base`, `layouts/app`, `layouts/guest` (pagine che li estendono): non toccati.
- Un vero tema scuro (varianti `dark:` su blocchi e login) e' un lavoro a parte; il riquadro che `localStorage.dark_mode` attiva con la classe `dark` resta una scelta di prodotto.
- `@tailwindcss/typography` non e' caricato nel CSS del tema: le pagine legali non hanno stile tipografico. Serve una ricompilazione degli asset; la decisione di eseguirla e' dell'utente per il precedente dell'incidente sulla cartella `public/`.
- Banner cookie che copre i pulsanti dell'hero a schermi piccoli e con testo ingrandito; pagina di errore 404 non tematizzata; bordi dei campi Filament nell'accesso; ID di struttura (registrazione con widget astratto, form di `contacts` senza campi): sono nel report riservato dell'audit e richiedono scelte di prodotto.
- Claim fissi nella vista di accesso (certificazione) e logo di un dominio diverso da quello del sito: contenuto, decide il titolare.
