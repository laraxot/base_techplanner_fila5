---
title: "[STORY] Passata UI/UX mobile: Filament, Employee, TechPlanner, tema Two (Sixteen: correzione di perimetro)"
type: story
status: review
priority: high
created: 2026-10-28
updated: 2026-10-29
tags: [mobile, ux, filament, tema, bmad, second-brain]
qmd: "ui ux mobile filament stackedOnMobile touch target 44px viewport zoom time clock employee techplanner tema Two Sixteen"
related:
  - ../../laravel/Modules/UI/docs/stories/mobile-ux-pass.story.md
  - ../../laravel/Modules/Employee/docs/stories/mobile-ux-pass.story.md
  - ../../laravel/Modules/TechPlanner/docs/stories/mobile-ux-pass.story.md
  - ../../laravel/Themes/Two/docs/stories/mobile-ux-pass.story.md
  - ../../laravel/Themes/Sixteen/docs/stories/mobile-ux-pass.story.md
  - ../../laravel/Themes/Sixteen/docs/mobile-live-audit.md
---

# Passata UI/UX mobile

## Richiesta

«studia e migliora la ui/ux da mobile fa tutto con bmad + ecc + second brain + filament blueprint + ponytail» (2026-10-28).

## Metodo

Tre agenti con ambiti disgiunti (chrome Filament condiviso; Employee e TechPlanner; temi Two e Sixteen), ciascuno: studio dei docs e del codice, elenco dei difetti con `file:riga`, correzioni minime, una story per modulo o tema. In parallelo un'altra sessione ha misurato Sixteen con Playwright (`bashscripts/tools/mobile-audit.mjs`, esito in `Themes/Sixteen/docs/mobile-live-audit.md`): i due filoni toccano file diversi.

## Esito per area (controllato dal diff, non solo dai report)

| Area | Difetto | Correzione |
|---|---|---|
| Xot `HasXotTable` | tabelle larghe con scroll orizzontale sotto 640 px | `->stackedOnMobile()` (esiste in Filament 5.11): ogni riga una card; da 640 px identica a prima. Vale per le 17 classi che usano il trait |
| Xot CSS | azioni di riga da 36 px, aree sovrapposte di 4 px | `mobile-touch-targets.css` (solo sotto 640 px, solo tabelle impilate): area 44 px, gap 24 px; registrato in `AdminPanelProvider`, copia in `public_html/assets/xot/css/` |
| Employee `TimeClockWidget` | tre colonne a 360 px, pulsante da ~40 px, `wire:poll.1s`, doppio tocco → due entrate | colonna unica, pulsante 56 px a tutta larghezza, `poll.15s.visible`, `clockIn/clockOut` rileggono lo stato dal DB; stringhe da chiavi `employee::widgets.time_clock.*` (it, en) |
| Employee/TechPlanner tabelle | card con 8-10 righe per colonne secondarie | colonne secondarie nascoste sotto `md` (riattivabili dal selettore colonne) |
| TechPlanner form | durata come testo libero; cliente come `client_id` grezzo | `integer()->minValue(0)`; `client.company_name` |
| Tema Two (effettivo) | menu mobile illeggibile (~1,4:1), non scorrevole, bersagli < 44 px, "Torna su" senza `x-data`, hero `h-screen` tagliato a 360x640, titoli oltre 328 px, login a 248 px di campo | pannello scuro, `max-h … dvh` + scroll, 44 px, `x-data` locale, `min-h-dvh`, `text-4xl sm:text-5xl`, campi ~288 px, `theme-color`, `prefers-reduced-motion` |
| Tema Sixteen _(fuori perimetro, vedi correzione sotto)_ | zoom bloccato nel layout `mobile`, `100vh` su mappa e header | viewport senza `user-scalable=no`, `100dvh` con fallback (solo CSS e prototipo non instradato). `loading="lazy"` su un `<img>` di `segnalazioni/layout` **annullato il 2026-10-29**: l'HTML di Sixteen resta uguale al riferimento |
| `PWAMiddleware` (Sixteen) | fallback viewport con `user-scalable=no` | tolto (classe non registrata; agisce solo se la pagina non ha già un viewport) |

## Correzione del 2026-10-29: il tema giusto e la parity di Sixteen

L'utente ha segnalato che nella passata «introdurre `data-sixteen-mobile-nav` è sbagliato» e che «il tema da modificare era il Two».

- **Perimetro sbagliato.** Il tema servito dal tenant `local/techplanner` è **Two** (`XotData::make()->pub_theme`): la UX mobile si migliora lì. Sixteen è il clone Design Comuni del progetto Fixcity: ci vanno solo correzioni di parity verificate sul riferimento, mai passate di UX generiche. L'agente dei temi ha lavorato su entrambi senza che io ponessi il vincolo.
- **Regole che esistevano già e non sono state caricate.** `docs/wiki/rules/013-design-comuni-html-match.md` (CRITICAL, 30/03/2026: l'HTML dentro `<body>` è uguale al riferimento) e `laravel/docs/wiki/concepts/public-theme-resolution-and-vite-assets.md` (06/06/2026: il tema di TechPlanner è Two, verificare `pub_theme` prima di ogni fix frontend). Nel trigger map comparivano solo come indice finale, senza una riga per i task di UI/UX o di tema.
- **`data-sixteen-*`:** non nasce oggi (`data-sixteen-mobile-nav` è nei sorgenti dal 2026-05-28, commit `8fea4370`), ma resta lo stesso difetto delle classi sul `<body>`. Causa a monte: `html-parity-workflow.md` e `block-implementation-guide.md` di Sixteen dicevano «MAI usare `data-bs-*`» (il riferimento ne ha 537), quindi chi seguiva la guida inventava un nome proprio; corrette. Nel riferimento (33 pagine) ci sono 12 nomi `data-*`, tutti funzionali (`data-element`, `data-bs-*`, `data-step`, …), nessuno col nome di un tema. Codex ha rinominato `data-sixteen-*` → `data-*` nei sorgenti (zero residui); regola in `Themes/Sixteen/docs/data-attribute-rule.md`.
- **Da questa passata:** l'unico markup alterato in Sixteen era `loading="lazy" decoding="async"` su un `<img>` di `blocks/segnalazioni/layout.blade.php` (riga 288): tolto.
- **Prevenzione:** riga nuova nel trigger map («UI/UX · mobile · header/menu · markup, classi o attributi `data-*` di un tema») che carica tema effettivo, 013, regola degli attributi e header-parity; 013 e `design-comuni-header-parity` hanno la sezione sugli attributi.
- **Lezione:** prima di toccare un tema chiedere quale tema serve il tenant e se il tema replica un riferimento esterno; in quel caso l'unità di misura è il diff col riferimento, non il giudizio estetico.

Story: `laravel/Themes/Sixteen/docs/stories/data-attribute-parity.story.md`.

## Verifica

- `phpstan analyse Modules` a cache pulita, **dopo** tutte le modifiche degli agenti → **exit 0, 0 errori**.
- 20 viste Blade modificate di Two e Sixteen ricompilate con il compilatore Blade reale e `php -l`: 17 ok; le 3 viste `mobile/**` di Sixteen non compilano per `mobile::layout` non registrato (prototipo non instradato, già così prima).
- `frontmatter-check.py check --since 150 laravel/Modules laravel/Themes docs` → 0 invalidi.
- Controllati a mano: `stackedOnMobile()` presente in `vendor/filament/tables`; `Device::client()` e `Client.company_name` esistono; le chiavi di traduzione del widget esistono in it ed en.
- **Non verificato**: la resa su un telefono (login richiesto, nessun POST al server di sviluppo che usa il DB reale); Pest non eseguito (MySQL).

## Decisioni aperte (utente)

1. **Autorizzazione (non UX, prioritaria) — chiusa:** la policy delle assenze definiva solo `viewAny` (negata ai non super-admin); `create/view/update/delete` non erano scritte e Filament le consente quando il metodo manca, mentre `before()` non viene chiamato per un metodo assente. Il server si fidava di `status` e `user_id` del form: un dipendente poteva impostare la propria richiesta «Approvata». Ora policy esplicita, campi nascosti ai non gestori e valori forzati dalle pagine: `Employee/docs/stories/absence-request-authorization.story.md`. Resta da decidere chi è il «responsabile» (oggi solo `super-admin`).
2. **Asset da ricompilare:** le classi nuove (`min-h-dvh`, `min-h-11`, `max-h-[calc(100dvh-7rem)]`, …) e il CSS di Two e Sixteen compaiono solo dopo `npm run build` in `Themes/Two`; per `Themes/Sixteen` il build serve anche per la rinomina `data-sixteen-*` → `data-*` (i bundle `public/assets/app-*.js/css` e `theme-behavior-*.js`, tracciati in git, hanno ancora i vecchi selettori: Blade nuove + bundle vecchio può rompere il menu mobile delle varianti con pannello diverso da `#nav4`).
3. **`pub_theme` triplicato** in `laravel/config/local/techplanner/xra.php` (`Two`, `Sixteen`, `Two`): vince l'ultima, il tema servito è Two. Non toccato (config del tenant).
4. **Filtri di tabella** sempre aperti sotto `lg` (4-6 filtri riempiono il primo schermo): `FiltersLayout::AboveContentCollapsible` cambia anche il desktop.
5. **Etichette vuote** su `AssociateAction` e `DeleteBulkAction` (icone senza tooltip) e posizione delle azioni di riga (`BeforeColumns`): cambiano anche il desktop.
6. **`WorkHoursPage`** è rotta a prescindere dal telefono (la vista richiede `$currentStatus`, `$workHoursToday`, `$this->table` che la pagina non definisce); il `WorkHoursBoardWidget` è montato solo lì. Eliminare o allineare a `TimeClockPage`.
7. **Viste `mobile/**` di Sixteen:** sembrano un prototipo non instradato (nessuna rotta `/mobile`, namespace `mobile::` non registrato); `x-for` annidato in `<template x-data>`.
8. **Zoom bloccato ancora presente** in `Modules/Geo/resources/views/index.html`, `contribute/index.html` e `layouts/partials/htmlheader.blade.php` (può essere voluto in una webview): non toccato.
9. **Testi hardcoded** rimasti in `TimeClockPage`, `work-hours.blade.php`, `WorkHourForm`, azione «Ordina per distanza» di `ListClients`; campi telefono/e-mail del cliente senza `tel`/`email`/`autocomplete` (vengono da `Notify/ContactTypeEnum` e `Geo/AddressItemEnum`).
10. **Risolto (2026-10-29):** `AbsenceRequestResource::getEloquentQuery()` usava `request()->is('admin/*')`, che nelle richieste Livewire (`livewire/update`) non vale. Ora filtra per ruolo (`Gate::allows('manage', …)`), in qualunque pannello. Effetto collaterale: un super-admin nel pannello `employee/admin` vede ora tutte le richieste, prima solo le proprie.

## Verifica manuale suggerita (360 / 390 / 430 px, dopo `npm run build`)

Login a 360 senza scroll orizzontale; hamburger a inizio pagina e dopo 60 px di scroll; menu in landscape 640x360; pagine `hero.simple`; footer (`tel:`, `mailto:`, «Torna su»); riga privacy del form contatti; Filament in modalità dispositivo: dashboard Employee, `time-clock`, liste ore/assenze, clienti/appuntamenti/dispositivi, tastierino sulla durata della chiamata.
