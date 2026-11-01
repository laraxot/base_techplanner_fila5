---
title: "Two: contratto tra JSON e viste dei blocchi, e blocco di condivisione degli articoli"
type: story
theme: Two
status: review
priority: high
created: 2026-11-01
updated: 2026-11-01
tags: [blocks, cms-json, contract, share, wcag, theme-two]
qmd: "theme two blocchi json vista chiavi ignorate contratto cta banner why-critical share condivisione articolo social-share wcag 44px"
related:
  - ../../../../../docs/stories/seo-head-maximum-schema-org-hreflang.story.md
  - ./head-seo-visual-verification.story.md
  - ./wcag-aaa-site-audit.story.md
---

# Contratto JSON <-> vista dei blocchi e condivisione degli articoli

## Contesto

Una pagina del CMS e' una lista di blocchi `{type, slug, data}`; `data.view` indica la vista del tema e il resto di `data` diventa le sue proprieta'. Se il JSON usa un nome che la vista non dichiara in `@props`, il valore sparisce senza errori e il blocco si vede svuotato. Il re-audit del sito ha trovato lo stesso difetto in tre blocchi.

## Cosa e' stato fatto

| Blocco | Il JSON usava | La vista legge | Esito |
|---|---|---|---|
| `why-critical.grid` (home) | `cards` | `points` | quattro schede visibili |
| `cta.banner` (servizi, it e en) | `subtitle`, `cta_label`, `cta_url` | `description`, `cta_primary {label, url}` | testo e pulsante visibili |
| `cta.simple` (4 pagine, terzo giro) | `subtitle`, `cta_label`, `cta_url` | `description`, `primary_cta_label`, `primary_cta_url` | gia' corretto |

Correzione sempre lato JSON, in entrambe le copie (modulo e tenant), mai aggiungendo alias alla vista: il contratto e' quello della vista.

**Guardia.** `Modules/TechPlanner/tests/Unit/Content/PageBlockContractTest.php` (test puro, senza database) controlla che ogni chiave di primo livello di un blocco compaia nella vista e che le copie tenant e modulo siano identiche. Il debito residuo (11 voci) e' elencato per nome e puo' solo ridursi.

**Condivisione.** Nuovo blocco `blocks/share/links.blade.php`: titolo visibile (`pub_theme::blocks.share.links.title`, in `it`, `en`, `de`, `es`) e il componente `x-seo::social-share` del modulo Seo con LinkedIn, Facebook, WhatsApp e «Copia link». Nessuno script di terzi. Aggiunto in fondo ai due articoli del blog (JSON `share` con `view` e `text`).

## Criteri di accettazione e misure

- [x] Home: le quattro schede compaiono (`/it` contiene i quattro titoli).
- [x] Servizi: il banner finale mostra descrizione e pulsante verso i contatti, in italiano e in inglese.
- [x] Articoli: sezione «Condividi questo articolo» con 4 controlli nominati; link con URL codificato; pagina ancora `index`.
- [x] WCAG: axe 0 violazioni a 390 e 1280 px sui due articoli; nessun bersaglio sotto 44 px (prima 3 a 40 px: portati a 44 con `p-2.5` nel componente Seo); nessun overflow.
- [x] La guardia fallisce su un difetto nuovo (verificato con l'elenco del debito vuoto: 11 voci) e passa con l'elenco corrente.

## Fuori perimetro e decisioni

- `chi-siamo` (sottotitolo e colore di fondo di due blocchi): file in lavorazione in un'altra sessione; nel debito noto finche' non e' libero.
- Form dei contatti e newsletter dell'home: nessuna rotta di destinazione. Prima servono le decisioni del titolare (casella di destinazione, conservazione dei messaggi, informativa); non si cabla un «grazie» che perde il messaggio.
- Il blocco `share` non e' nelle versioni inglesi degli articoli perche' non esistono (solo contenuto italiano).
