---
title: "Passata UX mobile del tema Two (login, header, footer, hero, form)"
type: story
theme: Two
status: done
created: 2026-10-28
tags: [docs, two, mobile, accessibility, bmad]
---

# Passata UX mobile — tema Two

**Fase BMAD**: Dev (diff minimo, ponytail). **Richiesta utente**: «studia e migliora la ui/ux da mobile fa tutto con bmad + ecc + second brain + filament blueprint + ponytail».

## Perche'

Il front-office pubblico (login, pagine CMS, form di contatto) si apre da telefono. Lo scopo dell'utente e' accedere, leggere e compilare un form col pollice, non superare un controllo. Il tema effettivo del tenant `local/techplanner` e' **Two**: in `laravel/config/local/techplanner/xra.php` le righe 10-12 hanno tre chiavi `'pub_theme'` (`Two`, `Sixteen`, `Two`) e in un array PHP vince l'ultima. Il file e' configurazione del tenant e **non e' stato toccato**: va ripulito dall'utente (vedi Sixteen: [mobile-ux-pass](../../../Sixteen/docs/stories/mobile-ux-pass.story.md)).

## Difetti e correzioni (principio mobile -> file:riga prima della modifica)

| # | Principio | Difetto (file:riga) | Correzione |
|---|---|---|---|
| 1 | Leggibilita' del menu | `components/sections/header/v1.blade.php:349,360`: pannello mobile bianco da `scrolled` ma link e sezione Accedi in `text-white`; a inizio pagina link `text-gray-700` su `#0f2b46` (circa 1,4:1). Un lato era sempre illeggibile. | Pannello sempre `bg-[#0f2b46]`, link chiari, focus ring con offset scuro. |
| 2 | Raggiungibilita' | stesso file `:349`: menu senza altezza massima, CTA e Accedi fuori schermo su telefoni bassi o in landscape (header `fixed`). | `max-h-[calc(100dvh-7rem)] overflow-y-auto overscroll-contain`. |
| 3 | Contrasto legato allo stato | `header/v1.blade.php:278`: bottone lingua mobile `text-white/80` fisso, invisibile a header bianco (dopo 50 px di scroll). | `:class` su `scrolled`, come la versione desktop. |
| 4 | Bersaglio di tocco 44 px | `header/v1.blade.php:278` (lingua `px-2 py-1`), `:294` (voci lingua `py-2`), `:306` (hamburger `p-2` = 40 px), `:377,379,383` (Dashboard/Profilo/Esci `py-2`). | `min-h-11 min-w-11`, `py-3`, `p-2.5`. |
| 5 | Pulsante che funziona | `footer/v1.blade.php:302-304`: "Torna su" usa `@click` ma il footer e' fuori da ogni `x-data` (nessun `x-data` in `main.blade.php`, `app.blade.php`, `resources/js/app.js`): Alpine non lo inizializza, il pulsante non faceva nulla. | `x-data` locale, 44x44, scroll animato solo se `prefers-reduced-motion` non e' attivo. |
| 6 | Telefono e e-mail tappabili | `footer/v1.blade.php:250`: numeri e e-mail stampati come testo, niente `tel:`/`mailto:` (Android Chrome non li rende cliccabili). | `tel:` (solo cifre e `+`) e `mailto:` per i tipi `phone`, `mobile`, `phone_mobile`, `email`; `py-3 -my-3`, lista a `space-y-6`. |
| 7 | Bersaglio 44 px nel footer | `footer/v1.blade.php:144,154,164` (social `w-10 h-10`), `:294` (link legali `px-1`, riga `gap-6` senza wrap). | `w-11 h-11`; link `px-2 py-3` in `flex-wrap justify-center`. |
| 8 | Immagini sotto la piega | `footer/v1.blade.php:273`: mappa senza `loading`/dimensioni. | `loading="lazy" decoding="async" width/height`. |
| 9 | Altezza dinamica (`dvh`) e contenuto non tagliato | `components/blocks/hero/simple.blade.php:12` (13 pagine): `h-screen overflow-hidden` con titolo, sottotitolo, 2 CTA e statistiche. A 360x640 il contenuto supera l'altezza fissa e CTA/stats vengono tagliati senza scroll; `100vh` eccede inoltre l'area visibile con la barra URL. Stesso schema in `hero/fullscreen.blade.php:12` (`min-h-screen`). | `min-h-dvh pt-28 pb-16` (112 px = header fixed non scrolled). |
| 10 | Titoli che non traboccano | `hero/simple.blade.php:26`, `hero/internal.blade.php:23` (8 pagine), `hero/contacts.blade.php:22`, `hero/about.blade.php:31`, `hero/fullscreen.blade.php:22`: base `text-5xl` (48 px); "Radioprotezione" supera i 328 px utili a 360 px. | Base `text-4xl sm:text-5xl ...` + `break-words`. |
| 11 | Login a 360 px | `pages/auth/login.blade.php:74,90`: `px-6` + card `px-8` lasciano 248 px ai campi. `:26` `min-h-screen`. `:104-108` link "Torna alla home" `text-xs`, colore `#9ca3af` (circa 2,5:1), hover via `onmouseover` inline, bersaglio circa 16 px. | `px-4` + card `px-5 py-8 sm:px-8 sm:py-10` (circa 288 px ai campi), `min-h-dvh`, link `text-sm text-gray-600 min-h-11` con hover CSS. |
| 12 | Tema del browser | `components/layouts/main.blade.php:13`, `components/layouts/base.blade.php:5`: nessun `theme-color`. Il viewport era corretto (nessun `maximum-scale`/`user-scalable`). | `<meta name="theme-color" content="#0f2b46">`. |
| 13 | Form di contatto | `components/blocks/contact/form.blade.php:131`: `autocomplete="organization-title"` su un select "tipo di studio" (campo ruolo, il browser puo' precompilarlo male). `:177` checkbox privacy 16 px con label da 21 px. | `autocomplete="off"`; checkbox 24 px, label `py-3` (riga cliccabile >= 44 px). |
| 14 | Tastiera e nomi accessibili | `components/blocks/newsletter/simple.blade.php:38`: input e-mail senza `autocomplete` ne' nome accessibile (solo placeholder); card `p-10` (248 px interni a 360). `components/blocks/hero/faq.blade.php:33`: ricerca senza `enterkeyhint`/`aria-label`. | `autocomplete="email" enterkeyhint="send" aria-label`, card `p-6 sm:p-10`; `inputmode="search" enterkeyhint="search" aria-label`. |
| 15 | Movimento ridotto | `resources/css/app.css`: nessuna regola `prefers-reduced-motion` (footer con `animate-bounce`, hover `scale`). | Regola globale a fine file. |
| 16 | Bersaglio del componente base | `components/button.blade.php:5`: `py-2 text-sm` = 36 px. | `min-h-11 items-center`. |

## Cosa NON e' stato fatto e perche'

- `config/local/techplanner/xra.php` (`pub_theme` triplicato): configurazione del tenant, decide l'utente.
- `npm run build` del tema: le classi nuove (`min-h-dvh`, `min-h-11`, `max-h-[calc(100dvh-7rem)]`, `p-2.5`, ...) e la regola in `app.css` compaiono sul sito solo dopo la ricompilazione, decisione dell'utente. Nessuna dipendenza aggiunta.
- `autocomplete`/`inputmode` dei campi di login e registrazione: i campi sono renderizzati dai widget Filament `LoginWidget` e `RegisterWidget` nel modulo User, fuori dall'ambito di questo tema.
- `components/sections/footer/v2.blade.php` e `components/blocks/services/booking.blade.php`: non referenziati dai JSON del tenant (`footer.json` usa `footer.v1`), non modificati.
- Cartelle duplicate `resources/views/views/**` e `resources/views/layouts/*` (legacy), `pages_old*`, `*.fabri`: ignorate.
- Altezza dell'header (`h-20` forzato da `:class` anche su mobile, 112 px non scrolled): ridurla cambia il disegno; resta una decisione di design.
- `lang`, viewport e `theme-color` dei layout non in uso (`layouts/*`): non toccati.

## Verifica manuale suggerita (360 / 390 / 430 px, anche landscape 640x360)

1. `/it/auth/login` a 360: nessuno scroll orizzontale, campi larghi circa 288 px, link "Torna alla home" ben leggibile e tappabile.
2. Home a 360 senza scroll: aprire l'hamburger, le voci devono essere chiare su blu scuro; fare scroll di 60 px e riaprire: ancora leggibili; il codice lingua e' scuro sull'header bianco.
3. Landscape 640x360: il menu scorre al suo interno e "Accedi/Registrati/CTA" si raggiungono.
4. Pagine con `hero.simple`: titolo non tagliato a 360, CTA visibili, scroll della pagina possibile; con la barra URL di Safari iOS non c'e' vuoto in fondo.
5. Footer: tocco su telefono, e-mail, "Torna su" (ora funziona), link Privacy.
6. Con "Riduci movimento" attivo (iOS Accessibilita'/Android Rimuovi animazioni): niente scroll animato ne' bounce.
7. Contact form: tocco sulla riga della privacy spunta la casella; il select non viene precompilato dal browser.

## Evidenza di verifica (statica, nessun server avviato)

- `git diff` limitato a `Themes/Two`: solo Blade e `resources/css/app.css`.
- Rilettura di ogni Blade modificato: tag e `@if/@else/@endif`, `@php/@endphp`, `{{ }}` bilanciati; i commenti `{{-- --}}` sono compilati via anche dentro i tag.
- Nessun Pest/migrate/build eseguito (dati sacri).
