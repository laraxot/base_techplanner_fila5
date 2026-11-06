---
title: "Audit WCAG 2.2 AAA del sito pubblico (tema Two)"
type: story
theme: Two
status: done
created: 2026-10-30
updated: 2026-10-30
tags: [docs, two, accessibility, wcag, aaa, audit, bmad]
---

# Audit WCAG 2.2 AAA del sito pubblico — tema Two

**Fase BMAD**: Dev + QA (diff minimo, ponytail). **Richiesta utente**: «controlla anche tutto il sito che sia a posto anche con il livello massimo di WCAG, fa tutto».

## Perche'

Il livello massimo di WCAG 2.2 e' AAA. L'audit misura tutte le pagine pubbliche del tema (non solo la home) e corregge quello che sta nei blocchi e nel footer. I difetti che dipendono dal layout, dall'header, dall'hero, dalla barra cookie e dal foglio di stile compilato sono seguiti a parte, perche' toccano file di un'altra sessione e richiedono una ricompilazione.

## Metodo

- Censimento: crawl GET della stessa origine (profondita' 2) da `/it` e `/en`, 29 pagine auditate (IT, EN, DE, ES, legali, login, pagina 404, articolo).
- Larghezze: 320, 390, 768, 1280 px.
- axe-core con i tag `wcag2a`, `wcag2aa`, `wcag2aaa`, `wcag21a`, `wcag21aa`, `wcag22aa`, `best-practice`.
- Prove proprie con Playwright per i criteri che axe non copre: Tab reale su tutta la pagina e focus coperto dall'header o dalla barra cookie (2.4.11/2.4.12), contrasto dell'anello di focus a pixel (1.4.11, 2.4.13), contrasto in hover (1.4.6), bersagli 24/44 px (2.5.8, 2.5.5), reflow e zoom 200% (1.4.4, 1.4.10), spaziatura del testo (1.4.12), caratteri per riga e interlinea (1.4.8), animazioni e `prefers-reduced-motion` (2.2.2, 2.3.3), semantica (alt, link, form, intestazioni, lingua, abbreviazioni) e livello di lettura (3.1.5).
- Solo richieste GET: nessun submit, nessun login, nessun test Pest.

## Esito (solo tema Two, escluse login del modulo User e la pagina che risponde 500)

Violazioni axe, nodi per livello `A / AA / AAA`:

| Larghezza | Prima | Dopo |
|---|---|---|
| 320 | 0 / 9 / 123 | 0 / 0 / 91 |
| 390 | 0 / 9 / 122 | 0 / 0 / 90 |
| 768 | 0 / 9 / 139 | 0 / 0 / 107 |
| 1280 | 0 / 9 / 139 | 0 / 0 / 107 |

- Livello AA: dalle 9 violazioni di contrasto a **0** su tutte le pagine del tema in tutte le larghezze.
- Bersagli sotto i 44 px: a 390 da 93 a 42; sotto i 24 px da 53 a 10.
- Nessuna trappola da tastiera, nessuno scroll orizzontale a 320 px, nessuna animazione infinita, `lang` e viewport corretti nel tema.
- Il residuo AAA e' quasi tutto il contrasto 7:1 (`color-contrast-enhanced`), che dipende dai colori di marca.

## Cosa e' stato corretto (in modo generico)

- **Contrasto**: testo scuro sui bottoni arancioni (da 2,85:1 a 7,37:1), testi secondari e orari piu' scuri, bordi dei campi del form contatti a 3:1 o piu', colori di marca presi dai token invece che da esadecimali fissi.
- **Nomi accessibili e contesto dei link**: "Scopri di piu'" e "Leggi" annunciano il titolo della scheda; i link senza destinazione reale non vengono piu' renderizzati; le icone decorative sono nascoste agli screen reader; le immagini decorative hanno `alt` vuoto; i link che aprono una nuova finestra lo dicono.
- **Struttura**: livelli di intestazione senza salti nelle card dei servizi; accordion FAQ con il pattern ARIA corretto (pulsante dentro l'intestazione, stato espanso, pannello collegato); campo di ricerca del blog con nome accessibile.
- **Form contatti**: esito e errori in regioni `status`/`alert`, nota sui campi obbligatori, asterisco con colore accessibile.
- **Bersagli e riflusso**: link di contatto, "Scopri di piu'", "Leggi" e social del footer a 44 px; niente piu' testo tagliato da `line-clamp`, parole lunghe che vanno a capo.
- **Leggibilita'**: pagine legali da oltre 130 a circa 78 caratteri per riga (limite AAA 80).
- **Footer**: nome del link alla mappa coerente con il testo visibile (2.5.3), sigle P.IVA e REA espanse.

## Passata 2: layout, header, hero, barra cookie e foglio di stile

Seconda sessione sul perimetro che richiedeva CSS e ricompilazione. Misura: 7 pagine (`/it`, `/it/about`, `/it/contacts`, `/it/services`, `/it/blog`, `/it/faqs`, `/it/privacy`) a 320, 390, 768, 1280 px, bundle ricompilato.

| Larghezza | Prima (dopo passata 1) A / AA / AAA / best-practice | Dopo |
|---|---|---|
| 320 | 0 / 0 / 34 / 7 | 0 / 0 / 0 / 0 |
| 390 | 0 / 0 / 33 / 7 | 0 / 0 / 0 / 0 |
| 768 | 0 / 0 / 40 / 7 | 0 / 0 / 0 / 0 |
| 1280 | 0 / 0 / 40 / 7 | 0 / 0 / 0 / 0 |

- Bersagli sotto i 44 px, per larghezza: a 390 da 13 a 1, a 1280 da 63 a 1 (resta la casella di consenso del form contatti, 24 px); sotto i 24 px: da 5 a 0 a 390.
- **Focus**: anello a due toni (blu 3 px + alone bianco) con contrasto >= 3:1 su sfondi chiari e scuri; skip link visibile, sopra l'header e primo stop di Tab; `scroll-padding-top` legato all'altezza dell'header; nessun elemento focalizzato coperto del tutto.
- **Contrasto 7:1**: token di marca (blu, verde, verde scuro in hover, arancione scuro) e testi bianchi/grigi pieni invece di trasparenze; placeholder e bordi dei campi di ricerca a contrasto pieno; barra cookie `#0057ad`.
- **Header**: bersagli da 44 px su navigazione, logo, Accedi e CTA; logo con larghezza massima in `vw` (a testo ingrandito il menu resta raggiungibile); Esc chiude il menu lingua e il menu utente e riporta il focus sul pulsante; altezza mobile 80 px.
- **Hero e breadcrumb**: spaziature compatte su telefono, home del breadcrumb 44x44, separatori nascosti agli screen reader, pagina corrente con `aria-current`, campo di ricerca di blog e FAQ con nome accessibile e senza icona che copre il tocco, testi di default tradotti in it/en/de/es.
- **Titolo pagina**: ogni pagina ha un titolo proprio nel formato "Pagina — Brand" (prima era uguale per tutte); le pagine CMS lo ricavano dal titolo della pagina.
- **Barra cookie**: il link alla cookie policy segue la lingua corrente e la rotta configurata (`gdpr.config.cookie.policy_path`); sui telefoni e' compatta e non copre piu' la prima CTA a 390x667.
- Strumento: `bashscripts/tools/wcag-audit.mjs` misura ora anche l'anello a due toni (prima segnalava falsi positivi).

Limiti di questa passata: nessuna prova con screen reader, nessun POST, nessuno zoom reale del browser. Le correzioni di contenuto (testi CMS in tedesco e spagnolo, riassunti in linguaggio semplice, sigle espanse) restano al redattore.

## Come rieseguire

```bash
# controllare PRIMA di quale progetto e' il server: ss -ltnp | grep :8000 ; readlink /proc/<pid>/cwd
AUDIT_BASE=http://192.168.1.40:8000 node bashscripts/tools/wcag-audit.mjs <cartella-output> /it,/it/about,/it/blog
```

`AUDIT_BASE` e' obbligatorio e non ha default (sulla stessa macchina girano piu' progetti). Opzioni: `AUDIT_WIDTHS`, `AUDIT_PHASES`. Il JSON grezzo finisce in `<cartella-output>/audit-raw.json`.

## Cosa non e' automatizzabile

Lettura con screen reader reali, parole inusuali e pronuncia (3.1.3, 3.1.6), riassunto in linguaggio semplice (3.1.5), esiti dei form dopo l'invio (richiedono POST), scadenza della sessione (2.2.1), contrasto su immagini e gradienti (axe lo segna "da rivedere") e zoom reale del testo nel browser.

## Dove sono i dettagli

L'elenco completo dei difetti per criterio, con evidenze, responsabile e correzione proposta, sta nel report privato `bashscripts/docs/audit/wcag-aaa-two.md` (repo annidato `bashscripts`, non pubblico). Le correzioni che richiedono CSS o ricompilazione sono li' con i valori esatti.

Vedi anche: [mobile-ux-pass.story.md](mobile-ux-pass.story.md), [mobile-hero-header-offset.story.md](mobile-hero-header-offset.story.md).
