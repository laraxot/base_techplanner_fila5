---
title: "Overflow history (ceiling 100)"
type: digest
status: active
qmd: "digest ceiling 100 overflow-history"
---

# Overflow history (ceiling 100)

Overflow force-cap: 140 file oltre target 100.

### `accessor-delegation-pattern.md` — 🧘 Accessor Delegation Pattern - Zero Theme

# 🧘 Accessor Delegation Pattern - Zero Theme

> **Pattern per accessor nel Zero Theme**
> **Aggiornato**: 2026-04-01
> **Versione**: 1.0

---

## 🎯 Panoramica

Questo documento applica il **pattern di delega accessor** al Zero Theme, basato sul lavoro completato nel modulo Sigma (22/22 accessor refactorizzati).

**Regola SACRA**: 
> Il metodo puro `get<Nome>()` deve vivere **VICINO** all'accessor `get<Nome>Attribute()`, idealmente nelle stesse 50 righe di codice.

---

## 📊 Riferimenti

La documentazione completa si trova nel modulo Sigma:

### `agent-edit-discipline.md` — Disciplina edit e qualità (puntatore)


# Disciplina edit e qualità (puntatore)

Stub **DRY**: policy nella wiki di progetto; discussioni GitHub issue [#124](https://github.com/provtv/base_ptv_fila5/issues/124) e [#138](https://github.com/provtv/base_ptv_fila5/issues/138).

## Link operativi

- Regola canonica: [../../../../docs/wiki/rules/validation-post-edit-rule.md](../../../../docs/wiki/rules/validation-post-edit-rule.md)
- How-to issue ↔ wiki: [../../../../bashscripts/ai/wiki/how-to/git-github.md#github-issue-agent-discipline](../../../../bashscripts/ai/wiki/how-to/git-github.md#github-issue-agent-discipline)
- Context overflow / Autocompact: [../../../../bashscripts/ai/wiki/how-to/agents-context-tooling.md#autocompact-thrashing-recovery](../../../../bashscripts/ai/wiki/how-to/agents-context-tooling.md#autocompact-thrashin

### `ai-development-guide.md` — AI-Assisted Development Guide - Zero Theme

# AI-Assisted Development Guide - Zero Theme

## Overview

This guide explains how to leverage AI assistants (Claude Code, Cursor, Windsurf) when developing with the **Zero Theme** in the healthcare_app Fila4 Mono project.

Zero is a flexible, modern Laravel theme system built on Filament 4, Livewire 3, and Volt. Understanding how to configure AI assistants for theme development ensures faster, more consistent development.
## Why AI Configuration Matters for Theme Development

### Theme-Specific Patterns

The Zero theme has unique conventions that differ from standard Laravel/Filament:

1. **Blade Component Organization**: Components in `Resources/views/components/`
2. **Livewire Volt Pages**: Functional Livewire pages in `Resources/views/pages/`
3. **Layout System**: Multi-purpose layouts

### `ai-handoff.md` — ai handoff

# ai handoff

## regole non negoziabili

- tests solo pest
- nei tests MAI RefreshDatabase
- i tests devono leggere `.env.testing`

## stato lavori (ultimo)

- `laravel/.env.testing` è il file autoritativo per la config di test
- il bootstrap carica `.env.testing` via `Modules/Xot/tests/CreatesApplication.php`
- `laravel/tests/TestCase.php` usa `Modules\\Xot\\Tests\\CreatesApplication`

## dove scambiarci le informazioni

- questo file (`Themes/Zero/docs/ai-handoff.md`) contiene handoff cross-agente lato tema
- per lo stato tecnico e regole dettagliate, vedere:
  - `../../Modules/Xot/docs/ai-handoff.md`


### `analisi-completa-tema.md` — Analisi Completa Tema Zero - Tema Minimalista Laravel

# Analisi Completa Tema Zero - Tema Minimalista Laravel

## 🎯 Panoramica Generale

Il tema **Zero** rappresenta un tema **minimalista e pulito** per Laravel, progettato come **base di partenza** per applicazioni moderne. È caratterizzato da un design semplice, elegante e altamente personalizzabile, con focus su **performance** e **accessibilità**.

## 📊 Stato Attuale dell'Implementazione

### ✅ Punti di Forza

1. **Design Minimalista Eccellente**
   - Interfaccia pulita e moderna
   - Focus su contenuto e usabilità
   - Design system coerente
   - Tipografia ottimizzata

2. **Architettura Tecnica Solida**
   - Build system Vite ottimizzato
   - Tailwind CSS ben configurato
   - Indipendenza da Filament

### `architecture-rules.md` — Architecture rules (puntatore)


# Architecture rules (puntatore)

Regole globali: [../../../../../docs/wiki/rules/00-TRIGGER_MAP.md](../../../../../docs/wiki/rules/00-TRIGGER_MAP.md).

### `architecture.md` — Theme Zero — architettura delle viste


# Theme Zero — architettura delle viste

## Scopo

Descrivere come sono fatte le viste del tema e come vengono risolte, cosi' che una modifica
tocchi il file giusto. Per i confini con i moduli: [theme-boundaries](./theme-boundaries.md).

## Risoluzione del tema

Il nome del tema viene da `XotData::make()->pub_theme` (config `xra.php` per host). Le viste
si risolvono in `Themes/<pub_theme>/resources/views`, le traduzioni nel namespace
`pub_theme::`. Se il tema non e' registrabile (manca la cartella) la prima view fallisce su
`realpath`.

## Layout

| Componente | Uso | Note |
|---|---|---|
| `<x-layouts.main>` | pagine pubbliche (`home`, `auth/login`) | slot `title`, `description`; meta OG; `@livewireStyles`, `@filamentStyles`, `@filamentScripts(withCore: true)`; `@vite(..., 'themes/Zero')

### `auth-examples.md` — Esempi di Autenticazione - Tema Zero

# Esempi di Autenticazione - Tema Zero

## Panoramica

Questo documento fornisce esempi pratici di come utilizzare le pagine di autenticazione del tema Zero, inclusi casi d'uso comuni e personalizzazioni.

## Pagina di Login

### Utilizzo Base

La pagina di login è accessibile tramite il routing Folio automatico:

```bash
# URL della pagina di login
/auth/login
```

### Personalizzazione del Design

#### 1. Cambio Colori

### `authentication.md` — Theme Zero — pagine di autenticazione


# Theme Zero — pagine di autenticazione

## Scopo

Il login del front office ha la grafica del tema ma la logica (validazione, rate limit,
autenticazione) del modulo User. Decisione:
[ADR auth-pages-render-module-widgets-with-panel-css](./adr/0001-auth-pages-render-module-widgets-with-panel-css.md).

## Come funziona

- Route Folio: `resources/views/pages/auth/login.blade.php` → `/auth/login`.
- La pagina usa `<x-layouts.main>` (slot `title`/`description`) e monta
  `@livewire(\Modules\User\Filament\Widgets\Auth\LoginWidget::class)`. Il tema non ha un form proprio.
- La vista del widget e' sovrascritta in `resources/views/filament/widgets/auth/login.blade.php`.
- Testi: `lang/<locale>/auth.php` (`pub_theme::auth.login.heading.title`,
  `auth.actions.login.label`, `auth.consent.*`).
- `<x-

### `bmad/accessor-delegation-pattern.md` — 🧘 Accessor Delegation Pattern - Zero Theme


> Nota di verifica 2026-10-20 (docs-temi): questa pagina cita il modulo `Sigma`, che non esiste in `laravel/Modules` di questo repository (controllato con `ls`). Il contenuto viene da un altro progetto della famiglia Laraxot e non e' stato riscritto: leggilo come pattern di riferimento, non come descrizione di codice presente. I link verso quei moduli non risolvono.

# 🧘 Accessor Delegation Pattern - Zero Theme

> **Pattern per accessor nel Zero Theme**
> **Aggiornato**: 2026-04-01
> **Versione**: 1.0

---

## 🎯 Panoramica

Questo documento applica il **pattern di delega accessor** al Zero Theme, basato sul lavoro completato nel modulo Sigma (22/22 accessor refactorizzati).

**Regola SACRA**: 
> Il metodo puro `get<Nome>()` deve vivere **VICINO** all'accessor `get<Nome>Attribute()`, ideal

### `bmad/ai-development-guide.md` — AI-Assisted Development Guide - Zero Theme


# AI-Assisted Development Guide - Zero Theme

## Overview

This guide explains how to leverage AI assistants (Claude Code, Cursor, Windsurf) when developing with the **Zero Theme** in the healthcare_app Fila4 Mono project.
This guide explains how to leverage AI assistants (Claude Code, Cursor, Windsurf) when developing with the **Zero Theme** in the ModuloEsempio Fila4 Mono project.
This guide explains how to leverage AI assistants (Claude Code, Cursor, Windsurf) when developing with the **Zero Theme** in the healthcare_app Fila4 Mono project.

Zero is a flexible, modern Laravel theme system built on Filament 5, Livewire 4, and Volt. Understanding how to configure AI assistants for theme development ensures faster, more consistent development.

## Why AI Configuration Matters for Theme De

### `bmad/architecture.md` — Zero Theme — Architecture


> Nota di verifica 2026-10-20 (docs-temi): `laravel/Themes/Zero/app/` contiene solo `.gitkeep` e nessuna classe `*ThemeServiceProvider` vive nel tema (`rg ThemeServiceProvider` trova solo `XotBaseThemeServiceProvider` e un test nel modulo Xot). Le righe su `ThemeServiceProvider` e `ZeroThemeServiceProvider` descrivono quindi il modulo base, non codice del tema. La pagina inoltre fonde tre bozze (due scheletri in inglese e la guida italiana): contenuto non riscritto.

# Zero Theme — Architecture

## Purpose
Zero theme architecture and design patterns for Laraxot PTVX.

## Core Components

**Views:**
- Blade templates for base layouts
- Component-based structure

**Assets:**
- Vite build pipeline
- Tailwind CSS compilation

**Providers:**
- ThemeServiceProvider registration

### `bmad/auth-examples.md` — Esempi di Autenticazione - Tema Zero


# Esempi di Autenticazione - Tema Zero

## Panoramica

Questo documento fornisce esempi pratici di come utilizzare le pagine di autenticazione del tema Zero, inclusi casi d'uso comuni e personalizzazioni.

## Pagina di Login

### Utilizzo Base

La pagina di login è accessibile tramite il routing Folio automatico:

```bash
# URL della pagina di login
/auth/login
```

### Personalizzazione del Design


### `bmad/auth-login-ui-ux.md` — UI/UX della pagina di accesso Restaurant


# UI/UX della pagina di accesso Restaurant

## Direzione visiva

La pagina usa una direzione **hospitality premium**: fondo caldo, accento
ambra, tipografia serif per la gerarchia editoriale e una card chiara per il
compito principale. Su desktop il pannello narrativo accompagna il form; su
mobile scompare per lasciare spazio all'accesso.

## Contratto di interazione

- il form mantiene label visibili, autocomplete e target touch di almeno 44px;
- il focus resta sempre visibile e gli errori restano vicino al campo;
- GSAP anima soltanto `opacity`, `transform` e feedback di pressione;
- l'entrata è una stagger breve (400ms, `power2.out`), mentre il movimento
  decorativo CSS viene disattivato con `prefers-reduced-motion`;
- Three.js/WebGL non è usato nella pagina di login: un effetto 3D no

### `bmad/authentication.md` — Autenticazione - Tema Zero


# Autenticazione - Tema Zero

## Panoramica

Il tema Zero fornisce un sistema completo di autenticazione seguendo le convenzioni del progetto e le best practices di UX/UI. Le pagine di autenticazione sono progettate per essere accessibili, sicure e user-friendly.

## Struttura delle Pagine

### Routing Folio

Il tema Zero utilizza Laravel Folio per il routing automatico delle pagine di autenticazione:

```
resources/views/pages/auth/
├── login.blade.php      # /auth/login
├── register.blade.php   # /auth/register
├── logout.blade.php     # /auth/logout
├── password/
│   ├── reset.blade.php  # /auth/password/reset

### `bmad/chartjs-plugin-datalabels-filament5.md` — chartjs-plugin-datalabels with Filament 5 ChartWidget (multiple labels)


# chartjs-plugin-datalabels with Filament 5 ChartWidget (multiple labels)

## Scope

This guide explains how to use `chartjs-plugin-datalabels` with Filament v5 chart widgets in the **Zero theme** context.

Reference samples:

- [chartjs-plugin-datalabels – multiple labels sample](https://chartjs-plugin-datalabels.netlify.app/samples/advanced/multiple-labels.html)
- [chartjs-plugin-datalabels – Doughnut (sorgente)](https://github.com/chartjs/chartjs-plugin-datalabels/blob/master/docs/samples/charts/doughnut.md) / [Demo Doughnut](https://chartjs-plugin-datalabels.netlify.app/samples/charts/doughnut.html) – per grafici radiali (anchor, display, formatter globale)

## Golden rules (Filament v5)

- Register plugins via `window.filamentChartJsPlugins` (or `window.filamentChartJsGlobalPlugins`)

### `bmad/composer-modules-not-themes.md` — Composer — moduli sì, temi no (Zero)


# Composer — moduli sì, temi no (Zero)

Canon: [composer-modules-not-themes.md](./composer-modules-not-themes.md).

### `bmad/comprehensive-theme-analysis.md` — Analisi Completa Tema Zero - Tema Minimalista Laravel


# Analisi Completa Tema Zero - Tema Minimalista Laravel

## 🎯 Panoramica Generale

Il tema **Zero** rappresenta un tema **minimalista e pulito** per Laravel, progettato come **base di partenza** per applicazioni moderne. È caratterizzato da un design semplice, elegante e altamente personalizzabile, con focus su **performance** e **accessibilità**.

## 📊 Stato Attuale dell'Implementazione

### ✅ Punti di Forza

1. **Design Minimalista Eccellente**
   - Interfaccia pulita e moderna
   - Focus su contenuto e usabilità
   - Design system coerente
   - Tipografia ottimizzata

2. **Architettura Tecnica Solida**
   - Build system Vite ottimizzato
   - Tailwind CSS ben configurato

### `bmad/docs-archive-policy.md` — Docs archive policy (puntatore)


# Docs archive policy (puntatore)

Policy globale: [../../../../../bashscripts/ai/wiki/concepts/second-brain-llm-wiki.md#second-brain-continuous-improvement](../../../../../bashscripts/ai/wiki/concepts/second-brain-llm-wiki.md#second-brain-continuous-improvement).

`docs/legacy/` è solo scratch locale; non fonte canonica. Vedi [module-docs-deduplication](../../../../../bashscripts/ai/wiki/how-to/modules-ops.md#module-docs-deduplication).
Policy globale: [../../../../../bashscripts/ai/wiki/concepts/second-brain-llm-wiki.md#second-brain-continuous-improvement](../../../../../bashscripts/ai/wiki/concepts/second-brain-llm-wiki.md#second-brain-continuous-improvement).

`docs/legacy/` è solo scratch locale; non fonte canonica. Vedi [module-docs-deduplication](../../../../../bashscripts/ai/wiki/

### `bmad/docs-deduplication.md` — Deduplica docs (tema Zero)


# Deduplica docs (tema Zero)

I temi mantengono **stub** verso wiki progetto, Xot (`docs/wiki/concepts/`) e Media (`html2pdf`).

- How-to: [../../../../../bashscripts/ai/wiki/how-to/modules-ops.md#module-docs-deduplication](../../../../../bashscripts/ai/wiki/how-to/modules-ops.md#module-docs-deduplication)
- Issue [#124](https://github.com/provtv/<repo progetto>/issues/124)

### `bmad/document-root-public-html.md` — Document root: `public_html`, non `laravel/public`


# Document root: `public_html`, non `laravel/public`

**Regola canonica**: [Modules/Xot/docs/wiki/rules/public-path-public-html.md](../wiki/memories/public-path-public-html.md)

## In una riga

`public_path()` risolve `{repo}/public_html/`. **Mai** `{repo}/laravel/public/`.

L'applicazione sta in `laravel/`, ma il web server serve `public_html/` un livello sopra.
`App\Application::publicPath()` lo garantisce, e `laravel/bootstrap/app.php` istanzia quella
classe e non quella stock di Laravel.

## Cosa significa per questo tema

Il `vite.config.js` del tema ha `outDir: './public'`: e' la build **locale al tema**, non la radice pubblica. Da li' gli asset vengono pubblicati sotto `public_path()` — vedi `docs/themes-system-complete-guide.md`, dove il publish mappa `resources/css` su `public_pa

### `bmad/duplicate-methods.md` — Metodi duplicati — Zero


# Metodi duplicati — Zero

Analisi sintetica dei metodi PHP con lo stesso nome all'interno di questo tema.

> **Nota 2026-09-17**: questo file consolida `duplicate_methods.md`, `metodi-duplicati-analisi.md`,
> `METODI-DUPLICATI-ANALISI.md`, `METODI_DUPLICATI_ANALISI.md` (tutti contenuto identico o stub di
> redirect) rimossi in questa pass di dedup. Vedi anche `duplicate-methods-report.md` per l'analisi
> cross-modulo/tema più ampia e `wiki/concepts/duplicate-method-bodies.md` per l'analisi sui *corpi*
> di metodo duplicati (angolo diverso: implementazione, non solo nome).

- File PHP analizzati (alla data 2026-06-15): **33**
- Metodi duplicati trovati (alla data 2026-06-15): **1**

## Metodi duplicati (stato storico 2026-06-15)
Analisi sintetica dei metodi PHP con lo stesso nome all’inte

### `bmad/env-development-configuration.md` — Configurazione .env.development - Ambiente di Sviluppo


# Configurazione .env.development - Ambiente di Sviluppo

## Panoramica

Il file `.env.development` è la configurazione di sviluppo standard per l'ambiente locale di healthcare_app fila5. Questa configurazione è ottimizzata per lo sviluppo rapido e zero-setup, differenziandosi significativamente dalla configurazione di produzione.

## Differenze Chiave con .env.example

### 1. Database Configuration

#### SQLite per Sviluppo (`.env.development`)
```bash
# SQLite per development - Zero setup required
DB_CONNECTION=sqlite
DB_DATABASE=$PROJECT_ROOT/database/database.sqlite
```

#### MySQL per Produzione (`.env.example`)
```bash

### `bmad/epics/zero-epics-and-stories.md` — Zero Theme Epics and User Stories

# Zero Theme Epics and User Stories

## Epic 1: Base Theme Structure
As a Developer, I want a clean theme base so that I can extend it consistently.

### Story 1.1: Layout Structure
**Acceptance Criteria**:
- [ ] Master layout file created
- [ ] Common header/footer components
- [ ] Asset pipeline configured
- [ ] Build commands working

## Epic 2: Component Library
As a Designer, I want consistent components so that the UI looks unified.

### Story 2.1: Button Styles
**Acceptance Criteria**:
- [ ] Primary button style
- [ ] Secondary button style
- [ ] Disabled state

### `bmad/filament-5-nested-resources-complete-guide.md` — 🎯 Filament 5.x Nested Resources - Guida Completa 2024


# 🎯 Filament 5.x Nested Resources - Guida Completa 2024

## 📋 **Introduzione a Nested Resources**

I Nested Resources in Filament 5.x forniscono un modo potente per creare relazioni gerarchiche tra le risorse, permettendo di gestire entità figlio come risorse complete con le loro proprie pagine di lista, creazione e modifica.

## 🎯 **Caso d'Uso Principale**

### **Esempio: Course e Lessons**
- **CourseResource**: Risorsa principale per corsi
- **LessonResource**: Nested resource per lezioni
- **Relazione**: Un corso può avere molte lezioni
- **Flusso**: Gestire lezioni direttamente dalla pagina del corso

## 🚀 **Creazione di un Nested Resource**

### **Passo 1: Creare la Nested Resource**

```bash

### `bmad/filament-admin-sub-navigation.md` — Sub navigation del pannello admin


# Sub navigation del pannello admin

## Il tema non possiede la chrome del pannello

Le tab che compaiono sopra una pagina di record (Modifica, Compila, Assenze e simili) sono
sub navigation di Filament. Non passano dal tema: Zero sovrascrive solo
`resources/views/filament/widgets/auth/login.blade.php` e non ridefinisce il layout delle
pagine del pannello.

Chi cerca dove togliere, aggiungere o rinominare una tab non deve cercare qui. I punti di
intervento sono tre e stanno nei moduli:

1. la risorsa, con `getRecordSubNavigation()`, decide quali pagine diventano tab;
2. la pagina, con `getSubNavigation()`, decide se mostrarle o nasconderle;
3. il file di lingua del modulo fornisce etichetta e icona della voce.

La posizione delle tab arriva da `XotBaseResource`, che imposta
`SubNavigation

### `bmad/filament-blueprint.md` — Scopo


# Scopo

Contratto Filament del tema **Zero**, unico tema frontend attivo (`pub` in
`theme.json`). Zero possiede viste, asset e traduzioni; **non** possiede PHP di
dominio (`app/` vuota). Il blueprint vale per ogni override o widget che verra'
aggiunto e impedisce di spostare logica dai moduli al tema.

## Regole non negoziabili

1. Estendere solo `XotBaseResource`, `XotBaseWidget`, `XotBasePage` o le altre basi
   Xot; mai le classi Filament dirette.
2. Nessuna label hardcoded: niente `->label('...')`; le stringhe stanno nei file
   `lang/<locale>/` del tema o del modulo owner.
3. Logica di business nelle Queueable Action del modulo owner; il tema compone
   solo la vista.
4. Nessun modello, migration, policy o query di dominio nel tema.

## Resource e widget


### `bmad/filament-chart-integration.md` — Filament Installation and Chart Widget Integration Guide for Zero Theme


# Filament Installation and Chart Widget Integration Guide for Zero Theme

## Overview

This document provides comprehensive guidance on integrating Filament 5.x components and ChartWidgets with the Zero theme, following Laraxot architectural patterns and best practices for frontend asset management.

## Filament Installation Requirements

The Zero theme supports Filament 5.x integration with:
- PHP 8.2+
- Laravel v11.28+
- Tailwind CSS v4.1+
- Filament v5.0+
- Chart.js v4.4.0+

### Required Dependencies

Install core Filament components:
```bash

### `bmad/filament-infolist-pattern.md` — Pattern Infolist Filament (Theme Zero)


> Nota di verifica 2026-10-20 (docs-temi): questa pagina cita i moduli `Performance`, `Progressioni`, che non esistono in `laravel/Modules` di questo repository (controllato con `ls`). Il contenuto viene da un altro progetto della famiglia Laraxot e non e' stato riscritto: leggilo come pattern di riferimento, non come descrizione di codice presente. I link verso quei moduli non risolvono.

# Pattern Infolist Filament (Theme Zero)

## Overview

Il tema Zero utilizza il pattern **Infolist dedicato** per le risorse Filament che estendono `XotBaseResource`.

## Come Funziona

Quando una risorsa Filament chiama il metodo `infolist()`, `XotBaseResource` cerca automaticamente una classe dedicata seguendo la convenzione di naming:

```
{ResourceNamespace}\Schemas\{ModelName}Infolist
```

### Patt

### `bmad/filament-resource-schemas-tables.md` — Filament Resource: Schemas e Tables (tema Zero)


> Nota di verifica 2026-10-20 (docs-temi): questa pagina cita i moduli `IndennitaResponsabilita`, `Progressioni`, `Ptv`, che non esistono in `laravel/Modules` di questo repository (controllato con `ls`). Il contenuto viene da un altro progetto della famiglia Laraxot e non e' stato riscritto: leggilo come pattern di riferimento, non come descrizione di codice presente. I link verso quei moduli non risolvono.

# Filament Resource: Schemas e Tables (tema Zero)

## Scopo

Risorse Filament nel tema Zero (o che estendono classi del tema) devono separare form, infolist e tabella in classi dedicate sotto `Schemas/` e `Tables/`, come nel [demo Filament 5](https://github.com/filamentphp/demo/tree/5.x/app/Filament/Resources/Blog/Categories).

## Struttura

```
Themes/Zero/app/Filament/Resources/{Res

### `bmad/filament-table-architecture.md` — La tabella si configura nella Table class, non nella pagina


# La tabella si configura nella Table class, non nella pagina

## Allineamento User (2026-09-29)

Il modulo User applica questa regola anche alle Resource di identità: le pagine
`List*` non dichiarano più hook `getTable*`; `BaseUsersTable` e `UsersTable` sono
la catena riusabile. Le traduzioni di navigazione restano responsabilità del modulo
User, mentre il tema consuma chiavi già localizzate e accessibili.

Vale per ogni Resource di questo tema.

## La regola

Colonne, filtri e azioni di una Resource stanno in
`app/Filament/Resources/<Nome>Resource/Tables/<Plurale>Table.php`, che estende
`Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable`.

**Non** nella pagina `Pages/List<Plurale>.php`. Li' dentro un hook `getTable*` e' un
difetto, e il tipo di difetto dipende dal nome:

### `bmad/folio-pages-structure.md` — Folio pages — Theme Zero (ptvx)


# Folio pages — Theme Zero (ptvx)

## Scopo

Stesso contratto FO di Theme One su ptvx: `pages/` = shell tema, non albero di domini editoriali.

## Layout attuale

```text
resources/views/pages/
├── auth/login.blade.php
├── home.blade.php
└── index.blade.php
```

## Perché

- **DRY:** login/home restano nel tema; business logic nei moduli.
- **KISS:** niente `pages/dashboard` / `pages/profile` come cartelle — esempi storici nei docs Zero non sono licenza a crearli.

### `bmad/frameworks.md` — Zero — Framework Integration Notes

# Zero — Framework Integration Notes

Integration guidelines for caveman, graphify, bmad-method, headroom, ponytail.

**Status:** Awaiting Phase 3 framework research results

## Component Review (caveman)

UI component patterns:
- Component edits: [TBD]
- Style updates: [TBD]

## Theme Architecture (graphify)

Dependency visualization:
- Component hierarchy: [TBD]
- Asset dependencies: [TBD]

## Feature Planning (bmad-method + headroom)


### `bmad/gestionale-panels-vs-themes.md` — Panels SRC vs Themes Zero


# Panels SRC vs Themes Zero

> **Nota 2026-09-17**: contenuto verosimilmente cross-org (issue/discussion citati sono su
> `laraxot/base_workorder_fila5`, non su questo repo). In questo checkout (`base_restaurant_fila5`)
> il tema `Sixteen` citato sotto non esiste (`Themes/` contiene solo `Meetup`, `Trattoria`,
> `TwentyOne`, `Zero`) e `Themes/Zero/theme.json` dichiara `"active": true`, quindi l'affermazione
> "FO attivo = Sixteen, non Zero" non è verificabile/valida qui. I link verso `../../docs/gc-modules-runtime-matrix.md`
> e `../../docs/gestionale-docs-index.md` non risolvono in questo repo. Contenuto originale
> conservato sotto senza modifiche per non perdere lo storico.

> Zero è tema alternativo/sperimentale. La BL gestionale resta nei moduli; enable = [matrice](../../docs/gc-modu

### `bmad/git-collision-audit-bashscripts.md` — Audit collisioni Git committate in bashscripts

# Audit collisioni Git committate in bashscripts

Risoluzione deterministica per singolo blocco: lato non vuoto, superset, metadata `updated` più recente, quindi HEAD come spareggio conservativo.

| File | Blocchi | Decisioni | SHA-256 prima → dopo |
|---|---:|---|---|
| `laravel/Themes/Zero/docs/code-quality-improvement-report.md` | 1 | shorter_tiebreak=1 | `fe612360cefa` → `102f43cb09f7` |

### `bmad/git-multi-org-sync-handoff.md` — Handoff — multi-org sync (STORY-003)


# Handoff — multi-org sync (STORY-003)

## Scopo

Allineare questo owner ai remote raggiungibili (**0 0**, working tree clean) e documentare decisioni di sessione 2026-07-21.

## Perché

Un tree dirty o un remote dietro/avanti **non** è sincronizzato, anche se l’altro org è a posto. Su PTVX i path vivono in `gitmodules.ini` con org `provtv` (+ `laraxot` se esiste).

## Link

| Tipo | URL |
|------|-----|
| Issue owner | https://github.com/provtv/theme_zero_fila5/issues/12 |
| Discussion | https://github.com/provtv/<repo progetto>/discussions/204 |
| Hub base issue | https://github.com/provtv/<repo progetto>/issues/203 |
| Hub base discussion | https://github.com/provtv/<repo progetto>/discussions/204 |
| Story monorepo | `docs/stories/STORY-003-multi-org-sync-geo-boundary-bashscripts.md` 

### `bmad/graphify-map.md` — Zero Theme — Mappa Graphify

# Zero Theme — Mappa Graphify

**Versione:** 1.0.0 | **Tema:** Zero | **Data:** 2026-08-02

---

## 📌 Cosa fa il tema Zero

Il tema **Zero** fornisce:
- Tema UI base/minimalista di sistema con Vite, Tailwind CSS, layouts guest ed app

---

## 🏗️ Architettura Essenziale Tema

### Entry Points Visivi

| Tipo | File | Path |
|------|------|------|
| **View Layout** | `layouts/app.blade.php` | `resources/views/layouts/app.blade.php` |

### `bmad/ide-helper-phpdoc-boundary.md` — ide helper — confine PHPDoc tema Zero


# ide helper — confine PHPDoc tema Zero

## Scopo

Zero è il tema operativo principale (Tailwind, Filament, Performance UI). Le view e le Folio page **leggono** model di Progressioni, Ptv, User, Sigma. `ide-helper:models` sui moduli definisce il contratto tipizzato che PHPStan livello 10 usa anche quando analizza `Themes/Zero/app` e pagine con logica PHP.

## Perché non rigenerare PHPDoc nel tema

- I model vivono nei **moduli** — unica fonte di verità schema DB
- Duplicare `@property` nel tema violerebbe DRY e [phpstan dry kiss theme guidelines](./phpstan-dry-kiss-theme-guidelines.md)
- La **religione** qualità del progetto: un contratto, un posto

## Politica tema ↔ moduli

| Layer | Responsabilità ide-helper |
|-------|---------------------------|
| Modulo dominio | Eseguire wave, fix 

### `bmad/jpgraph-class-reference-comprehensive-analysis.md` — 📚 JpGraph Class Reference - Analisi Completta 2024


# 📚 JpGraph Class Reference - Analisi Completta 2024

## 🎯 **Introduzione alla Documentazione JpGraph**

La documentazione ufficiale JpGraph Class Reference (https://jpgraph.net/download/manuals/classref/) è una risorsa estremamente dettagliata che copre tutte le classi principali, metodi disponibili e funzionalità avanzate della libreria grafica PHP.

## 📋 **Struttura della Documentazione**

### **1. Classi Principali**

#### **Graph Class**
La classe `Graph` è la classe base per tutti i grafici in JpGraph. Fornisce metodi per:
- Creazione e configurazione del contesto grafico
- Impostazione delle dimensioni e del formato
- Configurazione delle scale e degli assi
- Aggiunta di plot e elementi grafici

**Metodi Principali:**
```php

### `bmad/jpgraph-integration-guide.md` — JpGraph Integration Guide - Zero Theme


# JpGraph Integration Guide - Zero Theme

---

## Table of Contents

1. [Overview](#overview)
2. [Theme Responsibilities](#theme-responsibilities)
3. [PDF Template Structure](#pdf-template-structure)
4. [Chart Image Embedding](#chart-image-embedding)
5. [Blade Components for Charts](#blade-components-for-charts)
6. [Print CSS Optimization](#print-css-optimization)
7. [Best Practices](#best-practices)

---

## Overview

This guide describes how the Zero theme integrates JpGraph-generated chart images into PDF reports. The theme provides PDF templates, Blade components, and print-optimized CSS for professional chart presentation.

### `bmad/limesurvey-charts-pdf-integration.md` — LimeSurvey Charts PDF Integration - Zero Theme


# LimeSurvey Charts PDF Integration - Zero Theme

**Created:** January 2026
**Author:** Claude Opus 4.5 (claude-opus-4-5-20251101)
**Version:** 1.0.0
**Status:** Production Ready

> Update 2026-03-09: this project follows a docs-first rule.
> Before code changes on PDF/chart flows, module and theme docs must be reviewed and improved.

---

## Table of Contents

1. [Overview](#overview)
2. [Architecture](#architecture)
3. [Theme Responsibilities](#theme-responsibilities)
4. [PDF Template Structure](#pdf-template-structure)
5. [Chart Styling for PDF](#chart-styling-for-pdf)

### `bmad/mail-layouts.md` — Tema Zero - Mail Layouts


# Tema Zero - Mail Layouts

## Panoramica

Il tema Zero utilizza un layout email basato sul **Design System Italiano** ([italia/design-comuni-pagine-statiche](https://github.com/italia/design-comuni-pagine-statiche)) e integrato con **spatie/laravel-database-mail-templates** per garantire accessibilità, coerenza e professionalità nelle comunicazioni email.

## Struttura Layout

### File Layout

```
Themes/Zero/resources/mail-layouts/
└── base.html          # Layout principale con design italiano
```

### Caratteristiche Principali

1. **Design Italiano**: Colori istituzionali italiani (Blu Italia #0066CC, Verde #00AA66)
2. **Accessibilità WCAG**: Contrasto, semantic HTML, skip links

### `bmad/model-usage-in-themes.md` — Model Usage in Themes - Best Practices


# Model Usage in Themes - Best Practices

## Executive Summary

Themes in this application follow the **"Theme as Dress"** philosophy - they provide only visual presentation while business logic (including model access) remains in modules. This document explains how themes should interact with models from modules following DRY and KISS principles.

---

## Core Principle: Themes Don't Own Models

### ✅ CORRECT Architecture

```
┌──────────────────────────────────────────┐
│           THEME (Zero)                   │
│  • Views, layouts, styling               │
│  • NO direct model instantiation         │
│  • NO business logic                     │
└──────────────────────────────────────────┘

### `bmad/modern-theme-architecture.md` — Architettura Moderna dei Temi - Zero Theme


# Architettura Moderna dei Temi - Zero Theme

Il tema Zero segue i principi di modularità e performance introdotti con Laravel 13 e Filament 5.

## 1. Asset Management (Vite + Tailwind CSS v4)
Il tema utilizza Vite per il build degli asset e Tailwind CSS v4 per il design system.
- **Vantaggio**: Build ultra-veloci e runtime ridotto.
- **Integrazione**: Gli asset sono registrati tramite `XotBaseThemeServiceProvider`.

## 2. Integrazione Livewire 4 & Volt
Il tema favorisce l'uso di Livewire Volt per i componenti UI del frontend.
- **Best Practice**: Mantenere la logica di presentazione dentro i file Volt per una manutenzione "colocated".

## 3. Flux UI Integration
Zero integra Flux UI per componenti base (button, modals, inputs) garantendo:
- Accessibilità WCAG out-of-the-box.
- Stile coere

### `bmad/multi-org-sync-laraxot-provtv.md` — Sincronizzazione multi-organizzazione (laraxot + provtv)


# Sincronizzazione multi-organizzazione (laraxot + provtv)

## Cosa è stato fatto

Questo repository è tracciato da due remote GitHub (`laraxot` = org upstream canonica,
`provtv` = org operativa del progetto ptvx). Il 2026-07-21 è stata eseguita una
sincronizzazione completa seguendo `bashscripts/tools/prompts/02-gitmodules-sync.md`:
fetch di tutti i remote, quality gates (PHPStan L10, PHPMD), risincronizzazione dopo ogni modifica.

## Problemi riscontrati e risolti

- **Clone shallow**: il repo era stato clonato con storia troncata, causando push
  respinti (`did not receive expected object`). Fix: `git fetch --unshallow` su tutti i remote.
- **Storie scollegate ("unrelated histories")**: alcuni repo avevano un branch `dev`
  remoto rigenerato senza antenato comune con la storia locale. 

### `bmad/naming-conventions.md` — Naming Conventions — Zero Theme


# Naming Conventions — Zero Theme

Convenzioni di naming per mantenere coerenza e leggibilità del tema Zero in Laraxot PTVX.

## File Naming

### Blade Components
- **Format**: `kebab-case.blade.php`
- **Example**: `nav-link.blade.php`, `hero-section.blade.php`, `responsive-nav-link.blade.php`
- **Reason**: Matches Blade component naming (`<x-nav-link>`, `<x-hero-section>`)
- **No plurals**: Use singular form (e.g., `nav-link` not `nav-links`)

### Directories
```
resources/views/
├── layouts/              # Global layout templates
│   ├── app.blade.php
│   └── guest.blade.php
├── pages/                # Page templates

### `bmad/navigation-integration.md` — Contratto di navigazione del tema Zero


# Contratto di navigazione del tema Zero

Zero è un tema infrastrutturale: non contiene traduzioni dominio e non
introduce fallback come `resource.navigation`. Le label e i gruppi arrivano
dai file di lingua del modulo proprietario; il tema si occupa solo della
presentazione responsive e accessibile.

Ogni nuova risorsa deve quindi correggere prima il file `lang/it` del modulo,
usare un'icona Heroicon valida e verificare la navigazione nel pannello.

### `bmad/navigation-translations.md` — Navigazione e traduzioni del tema Zero


# Navigazione e traduzioni del tema Zero

Il tema Zero non possiede attualmente cataloghi con valori `.navigation`.
Le voci Filament appartengono ai moduli che possiedono le Resource e non vanno
duplicate nel tema.

Per eventuali cataloghi futuri: `label` e `group` devono essere testi
localizzati, `icon` un nome Heroicon reale e mai `nome-risorsa.navigation`.

### `bmad/no-ai-tool-scaffold-dirs.md` — Perché queste cartelle non devono esistere qui


# Perché queste cartelle non devono esistere qui

Regola canonica: [module-theme-root-cleanup.md — Rule 5](../../../../docs/wiki/rules/module-theme-root-cleanup.md).

Rimosse in questo tema (dove presenti): `scripts/`, `bashscripts/`, `test-results/`, `docs/archive/`, `.devcontainer/`. Aggiunte al `.gitignore` del tema.

**Perché**: come i moduli, ogni tema vive anche come repo Git indipendente; strumenti/agenti AI o CI che girano in quella root scrivono lì la propria cache/scaffold locale, ignorando che è un sotto-albero del monorepo con le proprie convenzioni (`docs/` unica, `bashscripts/` unica alla root, `build/` per gli artefatti generati). Duplicare la stessa categoria di contenuto in un secondo posto è entropia, non struttura.

### `bmad/no-git-lfs.md` — Git LFS non si usa in questo progetto


# Git LFS non si usa in questo progetto

Vale per il repo root, per `bashscripts/` e per ogni modulo e tema. Questo tema non fa
eccezione.

## La regola

I binari — immagini, font, PDF, archivi — si versionano come **blob git normali**.

Vietato:

- aggiungere `filter=lfs diff=lfs merge=lfs` in un qualunque `.gitattributes`;
- eseguire `git lfs install` o `git lfs track` dentro questo repo;
- committare come contenuto di un file il testo `version https://git-lfs.github.com/spec/v1`.

## Perche'

Non e' una preferenza di stile, e' il risultato di incidenti ripetuti.


### `bmad/no-phpstan-probe-policy.md` — No PHPStan probe files in themes


# No PHPStan probe files in themes

## Regola

Nei temi (a partire da `Themes/Zero`) non devono esistere:

- directory `app/Phpstan`
- file che finiscono per `PhpstanProbeModel.php`
- file che finiscono per `PhpstanTraitProbe.php` o nomi simili (probe fittizi)

## Motivazione

I file probe sono scorciatoie artificiali per silenziare PHPStan. La regola del progetto richiede di risolvere il problema a monte: correggere i docblock, usare `@phpstan-ignore` giustificato o scrivere test reali con `XotBaseTestCase`.

Il ragionamento completo (logica/politica/filosofia/religione/zen di questo divieto) è
in `Modules/Xot/docs/wiki/concepts/phpstan-trait-probes.md`.

## Riferimento


### `bmad/one-migration-themes-boundary.md` — Temi e migrazioni


# Temi e migrazioni

I temi (`Themes/One`, `Zero`, `Three`) **non** possiedono modelli Eloquent né
`database/migrations/`. La regola «1 modello = 1 migrazione» vive nei moduli under
`laravel/Modules/`.

UI/tema: asset e view; schema DB: solo modulo owner della tabella.

### `bmad/pandoc-guide.md` — Pandoc Documentation Generation — Theme


# Pandoc Documentation Generation — Theme

This guide explains how to generate distributable theme documentation using Pandoc.

## Installation

Pandoc is installed at `~/.local/bin/pandoc`. Verify:

```bash
pandoc --version
# pandoc 3.10.1
# Features: +server +lua
```

## Generate HTML

Convert theme documentation to standalone HTML:

```bash

### `bmad/performance-actions-reference.md` — Performance actions reference


> Nota di verifica 2026-10-20 (docs-temi): questa pagina cita il modulo `Performance`, che non esiste in `laravel/Modules` di questo repository (controllato con `ls`). Il contenuto viene da un altro progetto della famiglia Laraxot e non e' stato riscritto: leggilo come pattern di riferimento, non come descrizione di codice presente. I link verso quei moduli non risolvono.

# Performance actions reference

## UpdateGgPresenzaDalalAction

Questo documento spiega cosa deve sapere il tema Zero dell'action
`UpdateGgPresenzaDalalAction`.

La regola fondamentale e' semplice:

- il tema **non** calcola `gg_presenza_dalal`
- il tema **non** replica query Sigma
- il tema consuma un dato gia' materializzato dal modulo `Performance`

## Dove vive la logica reale

La logica reale non appartiene al tem

### `bmad/performance-calcolo-quota-troubleshooting.md` — Troubleshooting Calcolo Quota Performance


> Nota di verifica 2026-10-20 (docs-temi): questa pagina cita il modulo `Performance`, che non esiste in `laravel/Modules` di questo repository (controllato con `ls`). Il contenuto viene da un altro progetto della famiglia Laraxot e non e' stato riscritto: leggilo come pattern di riferimento, non come descrizione di codice presente. I link verso quei moduli non risolvono.

# Troubleshooting Calcolo Quota Performance

## Problema: Discrepanza Quota Distribuita

### Sintomo

Nel report calcolo quota appare una discrepanza tra:
- **Quota totale** (es: 285.209,90)
- **Quota distribuita** (es: 278.542,20)
- **Diff** (es: 6.667,70 ≈ 2,34%)

## Cause Probabilistiche (in ordine di frequenza)

### 1. Campi Non Materializzati (90% dei casi)

Il calcolo SQL usa campi che potrebbero essere NULL:


### `bmad/philosophy.md` — Zero Theme - Filosofia Completa


# Zero Theme - Filosofia Completa

**Data Creazione**: 2025-01-18  
**Status**: Documentazione Filosofica Completa  
**Versione**: 1.0.0

---

## Panoramica

Il tema **Zero** è il tema baseline di healthcare_app, implementando la filosofia "Vestito" di Laraxot. Zero fornisce presentazione visiva minimale, lasciando che la logica business rimanga completamente nei moduli.
Il tema **Zero** è il tema baseline di ModuloEsempio, implementando la filosofia "Vestito" di Laraxot. Zero fornisce presentazione visiva minimale, lasciando che la logica business rimanga completamente nei moduli.
Il tema **Zero** è il tema baseline di healthcare_app, implementando la filosofia "Vestito" di Laraxot. Zero fornisce presentazione visiva minimale, lasciando che la logica business rimanga completamente nei mo

### `bmad/php-quality-gates-rule.md` — Theme Zero - PHP Quality Gates Rule


# Theme Zero - PHP Quality Gates Rule

## Regola tema
- Ogni `.php` / `.blade.php` apre con `<?php` poi `declare(strict_types=1);` (mai prima del tag). Blade: prepend del blocco, non replace dei primi byte. `mixed` solo JSON/config/firma vendor.
- Campagna: [strict-types-mixed-campaign](../../../../../docs/chat/strict-types-mixed-campaign.md) · [Xot php-strict-types](../../../../Modules/Xot/docs/php-strict-types.md)
- Ogni modifica PHP nel tema deve passare:
  - `phpstan`
  - `phpmd`
  - `phpinsights`

## Test
- Quando testabile, coprire con test Pest o aggiornare test esistenti.

### `bmad/phpstan-dry-kiss-theme-guidelines.md` — PHPStan Level 10 + DRY/KISS Guidelines for Themes


# PHPStan Level 10 + DRY/KISS Guidelines for Themes

> **Stato aggiornato al 18 novembre 2025**  
> Il [modulo User](../../../Modules/User/docs/phpstan-level10-fixes.md) è stato validato con PHPStan livello 10 (nessun errore). Il tema Zero resta pianificato per il prossimo giro di verifica, per garantire continuità tra presentation layer e business layer: schedulare una run dedicata non appena vengono finalizzate le modifiche ai componenti condivisi.  
> Inoltre, il modulo Activity ha riallineato le proprie risorse Filament alla regola “`getFormSchema()` con chiavi stringhe” documentata in [filament-form-schema-conventions](../../../Modules/Xot/docs/filament-form-schema-conventions.md); i layout del tema che consumano componenti modulare devono assumere lo stesso contract (niente `array_v

### `bmad/phpstan-merge-conflicts.md` — phpstan-merge-conflicts


  - "./00-index.md"
  - "./00-index.md"
---


### `bmad/phpstan.md` — PHPStan — Theme Zero


<!-- gateguard: update existing Theme Zero phpstan guide; linked from README/bmad; user: "devi utilizzare laravel/phpstan.neon e solo io posso modificarlo, non puoi creare altri .neon" -->

# PHPStan — Theme Zero

## Perché

Il tema serve il FO (login, layout). PHPStan **non** è il Job dell'utente: è il gate degli agenti. `laravel/phpstan.neon` ha `paths: Modules/` — analizzare **solo** il tema produce ignore unmatched e rumore. Il gate verde è:

```bash
cd laravel
./vendor/bin/phpstan analyse Modules --memory-limit=-1 --no-progress
```

**Solo** `laravel/phpstan.neon`, con il suo `level: max`. Solo l'**umano** lo
modifica. Agenti: niente neon temp, niente creazione di altri `.neon`, niente
`-c`, `--level`, baseline, esclusioni o `@phpstan-ignore`. I test fanno parte
del gate. Memoria:
[p

### `bmad/prd.md` — PRD: Zero Theme


# PRD: Zero Theme

## 📋 Overview
- **Author:** Gemini CLI
- **Status:** Draft
- **Target Release:** 1.0.0

## ❓ Problem Statement
Specialized logic for Zero needs a dedicated, type-safe Theme to ensure maintainability.

## 🎯 Goals & Success Metrics
- **Goal 1:** 100% PHPStan L10 compliance.
- **Goal 2:** Seamless integration with XotBase.
# PRD: Zero Theme

## 📋 Executive Summary
Theme Zero is the lightweight, performance-first foundation theme for the PTVX system. It serves as the baseline for all other themes and offers a minimal-overhead interface for systems where rapid data entry and low-latency interaction are prioritized over complex visual aesthetics.

## 👥 Target Personas

### `bmad/product-requirements.md` — Product Requirements Document (PRD)


# Product Requirements Document (PRD)

## Metadata

| Campo | Valore |
|-------|--------|
| **Version** | 1.0.0 |
| **Status** | Approved |
| **Last Updated** | 2026-03-03 |
| **Owner** | Frontend Team |
| **Theme** | Zero |
| **Repository** | laraxot/theme_zero |

---

## 1. Panoramica del Prodotto

### Descrizione Breve
Zero è il **tema frontend principale** per l'applicazione Laraxot PTVX. Fornisce un'interfaccia moderna, responsive e accessibile utilizzando Tailwind CSS, Vite, Flowbite e Alpine.js.

### `bmad/purpose.md` — Zero — why it exists


# Zero — why it exists

**Canonical (IT, measured against this repo):** [scopo.md](./scopo.md).

## One sentence

Theme Zero is the **public presentation shell** for <nome progetto>: Blade layouts, UI tokens, Vite/Tailwind build. It does **not** own page resolution, domain data, or Filament base classes.

## Why (business)

- Operators need one predictable FO skin across <nome progetto> hosts (`pub_theme => Zero`).
- Survey/auth/domain logic stays in modules so the theme can change without rewriting business rules.
- Cms owns *what* a page is; Zero owns *how it looks* when rendered.

## Boundaries (do not duplicate)

| Concern | Owner |
|---|---|
| Page/block JSON resolution | [Cms scopo](./scopo.md) |

### `bmad/quality-audit.md` — Audit di qualita — tema Zero


# Audit di qualita — tema Zero

Misurato il 1 settembre 2026 a tree fermo. Ogni numero viene da un comando
eseguito, non da una stima; i comandi sono in fondo, cosi la misura si puo
rifare e contestare.

## Stato misurato

| Metrica | Valore |
|---|---:|
| File PHP | 28 |
| Righe di codice | 1210 |
| File di test `*Test.php` | 0 |
| Casi di test | 0 |
| Casi di test per file PHP | 0.00 |
| `@phpstan-ignore` nel codice | 0 |
| Rilievi PHPMD su `app/` | 0 |
| PHPInsights — Code | 100.0 % |
| PHPInsights — Complexity | 100.0 % |

### `bmad/quality-roadmap.md` — Quality roadmap — Theme Zero


# Quality roadmap — Theme Zero

## Stato (2026-08-31)

Tema **modello Folio minimo**: `auth/` + home/index documentati in [folio-pages-structure.md](./folio-pages-structure.md).

| Area | Stato |
|------|-------|
| Folio | **OK** |
| PHPStan | Da misurare |
| Test Pest | **Mancanti** |

## Azioni

1. Aggiungere test contract Folio (pattern TwentyOne/Sixteen).
2. Misurazione PHPStan baseline.
3. Usare come riferimento per migrazione Sixteen/TwentyOne.

### `bmad/readme-en.md` — About Laravel

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https

### `bmad/readonly-field-styling.md` — Readonly Field Styling - UI/UX Pattern


> Nota di verifica 2026-10-20 (docs-temi): questa pagina cita il modulo `IndennitaResponsabilita`, che non esiste in `laravel/Modules` di questo repository (controllato con `ls`). Il contenuto viene da un altro progetto della famiglia Laraxot e non e' stato riscritto: leggilo come pattern di riferimento, non come descrizione di codice presente. I link verso quei moduli non risolvono.

# Readonly Field Styling - UI/UX Pattern

**Theme**: Zero  
**Date**: 2026-02-11  
**Status**: Standard attivo

---

## Panoramica

Questo documento definisce il pattern standard per lo stile visivo dei campi readonly (calcolati/computati) nei form Filament. L'obiettivo è garantire una chiara gerarchia visiva tra campi editabili e campi di sola lettura.

## Pattern Standard

### Classi Tailwind CSS

```php

### `bmad/release-marketing-standard.md` — Release e README marketing — Zero


# Release e README marketing — Zero

## Scopo

Ogni modulo/tema deve essere pubblicabile, comprensibile e desiderabile: workflow release, changelog automatico e README vetrina.

## File canonici locali

- `../readme.md`
- `../.github/workflows/semantic-release.yml`
- `../.releaserc.json`
- `../changelog.md`

- `../changelog.md`

## Confidenza

La configurazione usa semantic-release con Conventional Commits, changelog, GitHub release e commit automatico del changelog.

### `bmad/schemaless-attributes.md` — 🧬 Schemaless Attributes in Themes


> Nota di verifica 2026-10-20 (docs-temi): questa pagina cita il modulo `Rating`, che non esiste in `laravel/Modules` di questo repository (controllato con `ls`). Il contenuto viene da un altro progetto della famiglia Laraxot e non e' stato riscritto: leggilo come pattern di riferimento, non come descrizione di codice presente. I link verso quei moduli non risolvono.

# 🧬 Schemaless Attributes in Themes

**Status:** ✅ STANDARD
**Central Reference:** [Xot Schemaless Guide](../../../laravel/Modules/Xot/docs/spatie-schemaless-attributes.md)
# 🧬 Schemaless Attributes in Themes

**Status:** ✅ STANDARD
**Central Reference:** [Xot Schemaless Guide](../../Modules/Xot/docs/spatie-schemaless-attributes.md)
# 🧬 Schemaless Attributes in Themes

**Status:** ✅ STANDARD
**Central Reference:** [Xot Schem

### `bmad/scopo.md` — Zero — scopo, confini e perche'


# Zero — scopo, confini e perche'

Ingresso docs: [../README.md](../README.md). Alias EN: [purpose.md](./purpose.md).

## Perche esiste

> **Zero e' il vestito pubblico del monorepo <nome progetto>: markup Blade, token di stile e pipeline Vite. Non decide cosa e' una pagina ne' quale dato mostrare.**

In questo checkout (`base_<nome progetto>_fila5`) e' l'unico tema **attivo** sotto `laravel/Themes/`; One e Three sono skeleton. `theme.json` lo dichiara `type: pub`, `active: true`. Gli host <nome progetto> impostano `pub_theme => Zero` (es. `config/local/<nome progetto>/xra.php`, `config/localhost/xra.php`); l'admin resta su temi/pannelli di altri stack (`adm_theme` tipicamente `AdminLTE`).

## Evidenza dal codice (2026-10-20)

| Fatto | Misura |
|---|---|
| Nessuna logica PHP di dominio |

### `bmad/simplechartwidget-quality-analysis.md` — SimpleChartWidget - Analisi Qualità del Codice e Best Practices


# SimpleChartWidget - Analisi Qualità del Codice e Best Practices

## Panoramica

Questo documento fornisce un'analisi approfondita della qualità del codice del widget `SimpleChartWidget`, identificando pattern di codice debole, violazioni di principi DRY+KISS e proposte di miglioramento per raggiungere la qualità di codice di livello enterprise.

## Analisi Statica del Codice

### 1. Violazioni di Principi DRY+KISS

#### **Violazione 1: Codice JavaScript Inline**
```php
// PROBLEMA: Codice JavaScript inline non riutilizzabile
'formatter' => 'function(v, ctx) {
    var avg = Number(v) || 0;
    var voters = ctx.dataset.voteCounts[ctx.dataIndex] || 0;
    return avg.toFixed(1) + "/10\n" + voters + " voti";
}'
```

### `bmad/tech-spec.md` — Technical Specification - Zero Theme

# Technical Specification - Zero Theme

## Overview
Frontend theme implementation using Blade, Tailwind CSS, and Vite.

## Assets Pipeline

### Build Commands
```bash
npm install          # Install dependencies
npm run dev          # Development server with HMR
npm run build        # Production build
npm run lint         # Tailwind linting
```

### Entry Points
- `resources/css/app.css` — Main stylesheet
- `resources/js/app.js` — Main JavaScript
- `resources/views/components/` — Blade components


### `bmad/theme-overview.md` — Tema Zero - Documentazione


# Tema Zero - Documentazione

## Gestionale / replica

Tema alternativo/sperimentale. Hub: [gestionale-docs-index.md](../../docs/gestionale-docs-index.md) · [tenant-modules-navigation-discipline.md](../../docs/tenant-modules-navigation-discipline.md) · [panels vs Zero](./gestionale-panels-vs-themes.md).

## Overview

Il tema **Zero** è il tema principale di default per l'applicazione Laraxot PTVX.

## Scopo (business)

- **Frontoffice**: layout e pagine base, con convenzioni condivise.
- **Coerenza**: integrazione con `UI` per componenti, e con `Xot` per regole architetturali.

## Struttura

```
Zero/

### `bmad/themes-system-complete-guide.md` — 🎨 THEMES SYSTEM - IL VESTITO DI LARAXOT


# 🎨 THEMES SYSTEM - IL VESTITO DI LARAXOT

## 📋 INDICE
1. [Filosofia Themes](#-filosofia-themes)
2. [Architettura Theme](#-architettura-theme)
3. **Tema Zero: Il Template Perfetto**
4. [Customizzazione Avanzata](#-customizzazione-avanzata)
5. [Asset Management](#-asset-management)
6. [Future Enhancements](#-future-enhancements)

---

## 🧠 FILOSOFIA THEMES (The Theme Philosophy)

### **Principio Fondamentale: Il Tema è un "Vestito", non la "Pelle"**
I temi in Laraxot seguono una filosofia radicale:
- **I temi forniscono SOLO presentazione visiva**
- **La logica business rimane SEMPRE nei moduli**
- **Nessuna dipendenza business nei temi**

### `bmad/translations.md` — Traduzioni del tema Zero


# Traduzioni del tema Zero

## Cosa vive qui

`Themes/Zero/lang/{locale}/` contiene solo le stringhe del front-office che appartengono al
tema: voci del menu pubblico, etichette di layout, testi di interfaccia non legati a un
modulo. Lingue presenti: `it`, `en`, `de`.

| File | Contenuto |
|---|---|
| `navigation.php` | Voci del menu pubblico (home, chi siamo, contatti, servizi, ...) |
| `ui.php` | Etichette di interfaccia condivise dai componenti del tema |

## Confine con le traduzioni dei moduli

`Themes/*/lang/*/navigation.php` riguarda la **navigazione del sito pubblico**. Non ha
nulla a che vedere con `navigation.group` dei file di traduzione dei moduli, che governa i
gruppi del menu Filament (vedi
[gruppi di navigazione del modulo User](../../../../Modules/User/docs/navigation-grou

### `chartjs-export-theme-integration.md` — 🎨 CHART.JS EXPORT INTEGRATION - TEMA ZERO

# 🎨 CHART.JS EXPORT INTEGRATION - TEMA ZERO

## 📋 INDICE
1. [Integrazione Tema Zero](#-integrazione-tema-zero)
2. [Stili Chart Export](#-stili-chart-export)
3. [Componenti Tema Personalizzati](#-componenti-tema-personalizzati)
4. [Asset Management](#-asset-management)
5. [Configurazione Vite Tema](#-configurazione-vite-tema)

---

## 🎯 INTEGRAZIONE TEMA ZERO (Tema Zero Integration)

### **1. Struttura File Tema per Chart Export**
```
Themes/Zero/
├── resources/
│   ├── views/
│   │   ├── components/
│   │   │   ├── chart-export.blade.php          # Componente base

### `chartjs-plugin-datalabels-filament5.md` — chartjs-plugin-datalabels with Filament 5 ChartWidget (multiple labels)

# chartjs-plugin-datalabels with Filament 5 ChartWidget (multiple labels)

## Scope

This guide explains how to use `chartjs-plugin-datalabels` with Filament v5 chart widgets in the **Zero theme** context.

Reference samples:

- [chartjs-plugin-datalabels – multiple labels sample](https://chartjs-plugin-datalabels.netlify.app/samples/advanced/multiple-labels.html)
- [chartjs-plugin-datalabels – Doughnut (sorgente)](https://github.com/chartjs/chartjs-plugin-datalabels/blob/master/docs/samples/charts/doughnut.md) / [Demo Doughnut](https://chartjs-plugin-datalabels.netlify.app/samples/charts/doughnut.html) – per grafici radiali (anchor, display, formatter globale)

## Golden rules (Filament v5)

- Register plugins via `window.filamentChartJsPlugins` (or `window.filamentChartJsGlobalPlugins`).

### `completion-status.md` — Zero: cosa manca per completare


# Zero: cosa manca per completare

Fotografia misurata il 2026-10-28 (sola lettura). Si rigenera con gli stessi controlli: story nel frontmatter,
PHPStan livello 10, blade troncate, traduzioni, test. Riepilogo di progetto: `Modules/Xot/docs/project-completion-status.md`.

## Indicatori

| Indicatore | Valore |
|---|---|
| File PHP in `app/` | 0 |
| Errori PHPStan livello 10 | 0 |
| Blade (troncate in testa) | 23 (0) |
| File di test (`*Test.php`) | 0 |
| TODO/FIXME nel codice | 0 |
| Traduzioni it / en (solo in it) | 2 / 2 (0) |
| Story/epic BMAD (aperte) | 10 (1) |

## Problemi noti e prossimi passi


### `components.md` — Componenti del Tema Zero

# Componenti del Tema Zero

## Panoramica

Il tema Zero fornisce una serie di componenti Blade riutilizzabili per costruire interfacce consistenti e moderne. Tutti i componenti sono progettati per essere accessibili, responsive e facilmente personalizzabili.

## Componenti Disponibili

### 1. Navigation Component

**File**: `resources/views/components/navigation.blade.php`

Componente per la navigazione principale dell'applicazione.

#### Caratteristiche

- Logo personalizzabile
- Menu di navigazione responsive
- Supporto per link attivi
- Design pulito e moderno

### `concepts/xotbase-never-extend-filament.md` — Mai `Filament\*` — sempre `Modules\Xot\Filament\...\XotBase*`


# Mai `Filament\*` — sempre `Modules\Xot\Filament\...\XotBase*`

Bridge on-demand. Contenuto canonico: [bashscripts/ai/wiki/rules/xotbase-inheritance.md](../../../../../bashscripts/ai/wiki/rules/xotbase-inheritance.md).

## Zen (riassunto)

Nessuna classe nel tema `Themes/Zero` estende una classe `Filament\...` direttamente.
Si estende sempre lo "specchio" in `Modules\Xot\Filament\...` allo stesso
percorso relativo (es. `Filament\Tables\Columns\ViewColumn` ->
`Modules\Xot\Filament\Tables\Columns\XotBaseViewColumn`). Se manca il
mirror, va creato in Xot prima di usarlo qui, mai come scorciatoia nel tema.

Non pre-caricare questo file: leggi la fonte canonica solo quando il task lo richiede.

### `customization.md` — Personalizzazione del Tema Zero

# Personalizzazione del Tema Zero

## Panoramica

Il tema Zero è progettato per essere altamente personalizzabile. Questa guida ti aiuterà a personalizzare l'aspetto e il comportamento del tema secondo le tue esigenze.

## Personalizzazione dei Colori

### Palette di Colori Predefinita

Il tema Zero utilizza una palette di colori moderna e accessibile:

```css
/* Colori principali */
--primary-color: #3b82f6;      /* Blu */
--secondary-color: #64748b;     /* Grigio */
--accent-color: #f59e0b;        /* Arancione */
--success-color: #10b981;       /* Verde */
--warning-color: #f59e0b;       /* Giallo */
--error-color: #ef4444;         /* Rosso */

### `database-governance.md` — migrazioni allineate con laraxot

## migrazioni allineate con laraxot

- ogni tabella del dominio utente deve essere creata/manutenuta da **una sola** migration per modulo  
- duplicare migrazioni per la stessa tabella (`roles`, `permissions`, ecc.) genera drift tra gli ambienti e viola la regola *forward-only* di Laraxot  
- eventuali nuove colonne devono essere gestite con `tableUpdate()` nella stessa migration base (es. `2024_01_01_000011_create_roles_table.php` per `roles`)

### cosa fare
- se serve evolvere la tabella: aggiungere step in `tableUpdate()` oppure creare una migration di *alter* con naming esplicito (`add_display_name_to_roles_table`), mai una nuova `create_roles_table`  
- verificare sempre `Modules/User/docs/roles_permissions.md` prima di toccare ruoli/permessi  
- aggiornare la documentazione del tema 

### `doc-first-workflow.md` — Theme Zero - Doc-First Workflow

# Theme Zero - Doc-First Workflow

## Regola
- Qualsiasi modifica tema parte da studio + aggiornamento docs in `Themes/Zero/docs/`.
- Nessuna modifica a template/componenti senza prima allineare la documentazione.
- Prima dell'implementazione va esplicitato anche il perche' del task: scopo, ragione, vincoli, policy, visione e filosofia della scelta.
- I docs del tema sono anche uno spazio di handoff tra agenti AI che lavorano sullo stesso obiettivo.
- Se il tema consuma dati o cast provenienti dai moduli, evitare helper locali duplicati: la policy di riuso va verificata prima in `Modules/Xot/app/Actions/`.

## Checklist rapida
1. Leggere docs tema pertinenti.
2. Scrivere nei docs tema il contesto intenzionale del task e la motivazione della direzione scelta.
3. Aggiornare docs tema con vin

### `docs-archive-policy.md` — Docs archive policy (puntatore)


# Docs archive policy (puntatore)

Policy globale: [../../../../bashscripts/ai/wiki/concepts/second-brain-llm-wiki.md#second-brain-continuous-improvement](../../../../bashscripts/ai/wiki/concepts/second-brain-llm-wiki.md#second-brain-continuous-improvement).

`docs/legacy/` è solo scratch locale; non fonte canonica. Vedi [module-docs-deduplication](../../../../bashscripts/ai/wiki/how-to/modules-ops.md#module-docs-deduplication).

### `docs-confidence-audit.md` — Zero Theme Docs Confidence Audit - 2026-03-07

# Zero Theme Docs Confidence Audit - 2026-03-07

## Sintesi

Audit della documentazione tema `Zero` con focus su coerenza e affidabilita operativa.

## Metriche (snapshot)

- Documenti markdown: **69**
- File con marker merge: **22**
- Marker totali rilevati: **168**

## Impatto

- rischio elevato di informazione contraddittoria
- onboarding lento su sviluppo tema
- difficolta nel distinguere linee guida correnti da materiale storico

## File ad alta priorita (merge conflict)


### `docs-deduplication.md` — Deduplica docs (tema Zero)


# Deduplica docs (tema Zero)

I temi mantengono **stub** verso wiki progetto, Xot (`docs/wiki/concepts/`) e Media (`html2pdf`).

- How-to: [../../../../bashscripts/ai/wiki/how-to/modules-ops.md#module-docs-deduplication](../../../../bashscripts/ai/wiki/how-to/modules-ops.md#module-docs-deduplication)
- Issue [#124](https://github.com/provtv/base_ptv_fila5/issues/124)

### `dry-kiss-analysis.md` — 🎨 DRY & KISS Analysis - Theme Zero

# 🎨 DRY & KISS Analysis - Theme Zero

**Data Analisi:** 2025-12-02
**Status:** 🟢 CONFORME (Preliminare)

---

## 📊 Struttura Tema

| Categoria | Stato | Note |
|-----------|-------|------|
| **Struttura** | ✅ Standard | Segue convenzioni Laraxot |
| **Docs** | ✅ Presente | Buona copertura |
| **Risorse** | ❓ Da verificare | Controllare duplicazione Blade |

---

## 🎯 VALUTAZIONE

Il tema sembra seguire le best practices definite in .

### `dry-kiss-best-practices.md` — DRY & KISS Best Practices - Tema Zero


# DRY & KISS Best Practices - Tema Zero

**Data:** 15 Ottobre 2025
**Tipo:** Best Practices & Guidelines
**Stato:** ✅ Completato

## 📚 Principi Fondamentali

### DRY (Don't Repeat Yourself)
- Non duplicare codice tra componenti
- Riutilizzare componenti esistenti
- Centralizzare logica comune nei layouts

### KISS (Keep It Simple, Stupid)
- Preferire semplicità a complessità
- Un componente = una responsabilità
- Evitare over-engineering

## 🎨 Struttura del Tema

### `env-development-configuration.md` — Configurazione .env.development - Ambiente di Sviluppo

# Configurazione .env.development - Ambiente di Sviluppo

## Panoramica

Il file `.env.development` è la configurazione di sviluppo standard per l'ambiente locale di healthcare_app fila5. Questa configurazione è ottimizzata per lo sviluppo rapido e zero-setup, differenziandosi significativamente dalla configurazione di produzione.

## Differenze Chiave con .env.example

### 1. Database Configuration

#### SQLite per Sviluppo (`.env.development`)
```bash
# SQLite per development - Zero setup required
DB_CONNECTION=sqlite
DB_DATABASE=$PROJECT_ROOT/database/database.sqlite
```

#### MySQL per Produzione (`.env.example`)
```bash
# MySQL per produzione

### `examples.md` — Esempi di Utilizzo - Tema Zero

# Esempi di Utilizzo - Tema Zero

## Panoramica

Questa sezione fornisce esempi pratici di come utilizzare il Tema Zero in diverse situazioni. Tutti gli esempi sono funzionanti e possono essere utilizzati come punto di partenza per i tuoi progetti.

## Pagina Home Completa

### File: `resources/views/pages/home.blade.php`

```blade
<x-layouts.main>
    <x-slot name="title">
        Home - {{ config('app.name', 'Laravel') }}
    </x-slot>
    
    <x-slot name="description">
        Benvenuto nella nostra applicazione. Scopri le nostre funzionalità e servizi.
    </x-slot>
    

### `filament-5-nested-resources-complete-guide.md` — 🎯 Filament 5.x Nested Resources - Guida Completa 2024

# 🎯 Filament 5.x Nested Resources - Guida Completa 2024

## 📋 **Introduzione a Nested Resources**

I Nested Resources in Filament 5.x forniscono un modo potente per creare relazioni gerarchiche tra le risorse, permettendo di gestire entità figlio come risorse complete con le loro proprie pagine di lista, creazione e modifica.

## 🎯 **Caso d'Uso Principale**

### **Esempio: Course e Lessons**
- **CourseResource**: Risorsa principale per corsi
- **LessonResource**: Nested resource per lezioni
- **Relazione**: Un corso può avere molte lezioni
- **Flusso**: Gestire lezioni direttamente dalla pagina del corso

## 🚀 **Creazione di un Nested Resource**

### **Passo 1: Creare la Nested Resource**

```bash
# Creare la nested resource usando artisan

### `filament-chart-integration.md` — Filament Installation and Chart Widget Integration Guide for Zero Theme

# Filament Installation and Chart Widget Integration Guide for Zero Theme

## Overview

This document provides comprehensive guidance on integrating Filament 5.x components and ChartWidgets with the Zero theme, following Laraxot architectural patterns and best practices for frontend asset management.

## Filament Installation Requirements

The Zero theme supports Filament 5.x integration with:
- PHP 8.2+
- Laravel v11.28+
- Tailwind CSS v4.1+
- Filament v5.0+
- Chart.js v4.4.0+

### Required Dependencies

Install core Filament components:
```bash
composer require filament/filament:"^5.0"

### `filament-infolist-pattern.md` — Pattern Infolist Filament (Theme Zero)

# Pattern Infolist Filament (Theme Zero)

## Overview

Il tema Zero utilizza il pattern **Infolist dedicato** per le risorse Filament che estendono `XotBaseResource`.

## Come Funziona

Quando una risorsa Filament chiama il metodo `infolist()`, `XotBaseResource` cerca automaticamente una classe dedicata seguendo la convenzione di naming:

```
{ResourceNamespace}\Schemas\{ModelName}Infolist
```

### Pattern nel Tema

Per risorse del tema che estendono classi base:

- **Resource:** `Themes\Zero\Filament\Resources\{Model}Resource`
- **Infolist:** `Themes\Zero\Filament\Resources\{Model}Resource\Schemas\{Model}Infolist`

### `filament-version.md` — Filament Version Declaration — Zero

# Filament Version Declaration — Zero

**Current Version**: Filament v5 (Livewire v4 + Schemas)

This module/theme is developed against **Filament v5**.

All resources, forms, tables, infolists, widgets and actions must follow the v5 + XotBase patterns documented in:

- `docs/wiki/rules/filament-rules-summary.md`
- `docs/wiki/memories/filament-version-policy.md`
- `laravel/Modules/Xot/docs/filament-5-laraxot-rules.md`

**Legacy v4 documents** in this folder (if any) are historical only and must not be used as current reference.

**Last verified**: 2026-05-21

**Firmato:** Cursor Agent (Composer) — template propagato ai package `docs/`

### `filament.md` — Theme Zero — Filament nel tema


# Theme Zero — Filament nel tema

## Scopo

Zero non ha Resource, pagine o widget PHP. Tocca Filament solo in due modi: **override di viste**
in `resources/views/filament/` (oggi `widgets/auth/login.blade.php`) e **montaggio** di widget dei
moduli nelle pagine Folio (`@livewire(...)`). Stack: Filament 5, Livewire 4.

## Regole

- Ogni classe Filament nuova nasce in un modulo ed estende il mirror Xot
  (`XotBaseResource`, `XotBasePage`, `XotBaseWidget`, `XotBaseSchemaWidget`,
  `XotBaseInfolistWidget`...), mai `Filament\...` diretto. Canon:
  `bashscripts/ai/wiki/rules/xotbase-inheritance.md`.
- Filament 5: il tipo e' `Filament\Schemas\Schema`, non `Filament\Forms\Form`.
- Resource: form/infolist/tabella in classi dedicate (`Schemas/*Form`, `*Infolist`,
  `Tables/<Plurale>Table` che estend

### `frontend-build.md` — Theme Zero — build frontend e asset


# Theme Zero — build frontend e asset

## Scopo

Come si compilano CSS/JS del tema e come arrivano al browser. Decisione registrata:
[ADR theme-assets-are-built-in-theme-and-served-by-symlink](./adr/0003-theme-assets-are-built-in-theme-and-served-by-symlink.md).

## Stack (da `package.json`)

| Pacchetto | Versione |
|---|---|
| `vite` | ^6.3 |
| `laravel-vite-plugin` | ^1.0 |
| `tailwindcss` | ^3.4 (+ `@tailwindcss/forms`, `@tailwindcss/typography`) |
| `postcss` | ^8.5 (+ `postcss-import`, `postcss-nesting`, `autoprefixer`) |
| `alpinejs` | ^3.13 (+ `@alpinejs/collapse`, `@alpinejs/focus`) |
| `flowbite` | ^1.8 |
| `axios` | ^1.9 |


### `glossary.md` — Glossario di dominio Theme Zero


# Glossario di dominio Theme Zero

Termini di presentazione verificati. Se glossario e codice divergono vale il codice. Percorsi relativi a `laravel/Themes/Zero/`. I termini di dominio (survey, contatto, Pulse) stanno nei glossari dei moduli.

| Termine | Significato | Nel codice |
|---|---|---|
| Tema pubblico (`pub_theme`) | Nome del tema usato dal front office; Zero è il valore in `config/local/ptvx/xra.php`. Le view si risolvono in `Themes/<pub_theme>/resources/views`. | `laravel/config/local/ptvx/xra.php:14`, `Modules/Xot/app/Datas/XotData.php:350` |
| `theme.json` | Descrittore del tema: nome, tipo `pub`, `active`, `order`. | `theme.json` |
| Layout | Shell Blade delle pagine: `app`, `auth`, `guest`, `main`. | `resources/views/components/layouts/` |
| Layout principale | Layout HTML

### `index-consolidated.md` — Theme Zero Documentation Index

# Theme Zero Documentation Index

**Status**: Theme implementation for Laraxot monolith  
**Last Updated**: January 2026

## Quick Start

1. **New to the theme?** Start with [README.md](README.md)
2. **Understanding architecture?** Read [architecture.md](architecture.md)
3. **Working with components?** See [components.md](components.md)
4. **Customizing the theme?** Check [customization.md](customization.md)

## Core Documentation

### README.md
High-level overview of Theme Zero, its structure, and customization approach.

### architecture.md
Theme architecture and design patterns:
- Component structure

### `inventory.md` — Inventario della documentazione - Tema Zero


# Inventario della documentazione - Tema Zero

Questa nota descrive la struttura reale di `laravel/Themes/Zero/docs/` al
2026-10-20 (aggiornata dalla story [docs-temi-audit-organizzazione](./stories/docs-temi-audit-organizzazione.story.md); i conteggi del 2026-10-08 sono nella story [zero-docs-health](./stories/zero-docs-health.story.md)). È un riferimento operativo: non sposta, rinomina o sostituisce i
documenti storici.

## Punti di ingresso

- [README](./README.md): entrypoint mantenuto per la navigazione umana.
- [Wiki index](./wiki/index.md): catalogo della conoscenza curata e caricata
  on-demand.
- [BMAD index](./bmad/00-index.md): guide, decisioni e artefatti di
  pianificazione del tema.
- [Changelog](./CHANGELOG.md): cronologia documentata.
- [Stories](./stories/): attività e au

### `jpgraph-chartjs-theme-integration.md` — Integrazione JpGraph e Chart.js nel Tema Zero

# Integrazione JpGraph e Chart.js nel Tema Zero

## Panoramica

Il tema Zero funge da "vestito" per l'applicazione healthcare_app, fornendo la presentazione visiva senza logica di business. Questo documento descrive come il tema Zero può supportare l'integrazione di JpGraph e Chart.js per la visualizzazione dei dati.

## Principi del Tema "Vestito"

Come definito nell'architettura Laraxot, il tema Zero deve fornire:
- Presentazione visiva
- Stile e design
- Interfaccia utente
- Nessuna logica di business

## Supporto per Differenti Tipi di Grafici

### Grafici Server-side (JpGraph)

Il tema Zero può supportare grafici generati server-side come:


### `jpgraph-class-reference-comprehensive-analysis.md` — 📚 JpGraph Class Reference - Analisi Completta 2024

# 📚 JpGraph Class Reference - Analisi Completta 2024

## 🎯 **Introduzione alla Documentazione JpGraph**

La documentazione ufficiale JpGraph Class Reference (https://jpgraph.net/download/manuals/classref/) è una risorsa estremamente dettagliata che copre tutte le classi principali, metodi disponibili e funzionalità avanzate della libreria grafica PHP.

## 📋 **Struttura della Documentazione**

### **1. Classi Principali**

#### **Graph Class**
La classe `Graph` è la classe base per tutti i grafici in JpGraph. Fornisce metodi per:
- Creazione e configurazione del contesto grafico
- Impostazione delle dimensioni e del formato
- Configurazione delle scale e degli assi
- Aggiunta di plot e elementi grafici

**Metodi Principali:**
```php
// Creazione istanza

### `jpgraph-integration-guide.md` — JpGraph Integration Guide - Zero Theme

# JpGraph Integration Guide - Zero Theme

---

## Table of Contents

1. [Overview](#overview)
2. [Theme Responsibilities](#theme-responsibilities)
3. [PDF Template Structure](#pdf-template-structure)
4. [Chart Image Embedding](#chart-image-embedding)
5. [Blade Components for Charts](#blade-components-for-charts)
6. [Print CSS Optimization](#print-css-optimization)
7. [Best Practices](#best-practices)

---

## Overview

This guide describes how the Zero theme integrates JpGraph-generated chart images into PDF reports. The theme provides PDF templates, Blade components, and print-optimized CSS for professional chart presentation.


### `layouts.md` — Layout del Tema Zero

# Layout del Tema Zero

## Panoramica

Il tema Zero fornisce due layout principali per gestire la struttura delle pagine dell'applicazione:

1. **Layout Principale (main.blade.php)**: Layout completo per pagine pubbliche
2. **Layout App (app.blade.php)**: Layout semplificato per componenti interni

## Layout Principale (main.blade.php)

### Caratteristiche

- **HTML5 Semantico**: Utilizza tag semantici per una migliore accessibilità
- **Meta Tag Dinamici**: Supporto per SEO e social media
- **Responsive Design**: Ottimizzato per tutti i dispositivi
- **Integrazione Vite**: Caricamento ottimizzato degli asset
- **Navigazione**: Header con menu di navigazione
- **Footer**: Area footer personalizzabile


### `limesurvey-charts-pdf-integration.md` — LimeSurvey Charts PDF Integration - Zero Theme

# LimeSurvey Charts PDF Integration - Zero Theme

**Created:** January 2026
**Author:** Claude Opus 4.5 (claude-opus-4-5-20251101)
**Version:** 1.0.0
**Status:** Production Ready

> Update 2026-03-09: this project follows a docs-first rule.
> Before code changes on PDF/chart flows, module and theme docs must be reviewed and improved.

---

## Table of Contents

1. [Overview](#overview)
2. [Architecture](#architecture)
3. [Theme Responsibilities](#theme-responsibilities)
4. [PDF Template Structure](#pdf-template-structure)
5. [Chart Styling for PDF](#chart-styling-for-pdf)
6. [Blade Components](#blade-components)

### `mail-layouts.md` — Theme Zero — layout email


# Theme Zero — layout email

## Scopo

Il tema fornisce l'involucro HTML delle email; il contenuto arriva dal database
(`spatie/laravel-database-mail-templates`, tabella `mail_templates`) tramite il modulo Notify.

## Come funziona

- File: `resources/mail-layouts/base.html` (layout istituzionale) e
  `resources/mail-layouts/christmas-professional.html` (variante stagionale).
- `Modules/Notify/app/Actions/Mail/GetMailLayoutAction.php` risolve
  `base_path('Themes/'.$pub_theme.'/resources/mail-layouts')`: il layout segue il `pub_theme`.
- Segnaposto Mustache presenti in `base.html`: `{{{ body }}}` (**obbligatorio**, contenuto del
  template), `{{ subject }}`, `{{ preheader_text }}`, `{{ logo_header }}`, `{{ logo_svg }}`,
  `{{ company_name }}`, `{{ company_address }}`, `{{ site_url }}`, `{

### `manage-related-records.md` — ManageRelatedRecords Styling - Zero Theme

# ManageRelatedRecords Styling - Zero Theme

## Focus
The 'Zero' theme provides the clean, standard foundations for the Laraxot ecosystem. For related record pages, it focuses on clarity, readability, and semantic structure.

## Layout Guidelines
- **Master-Detail Pattern**: Related record pages SHOULD optionally render a "Master Context Infolist" at the top. This provides the user with the necessary context of the parent record without navigating away.
- **Header**: Large title with a clear relation to the parent record, positioned below the Master Infolist.
- **Table**: Striped rows with a primary color border on the active row.
- **Actions**: Simple icon + text buttons for header actions, icon-only buttons for record actions.

## Master Context Infolist
- **Background**: Light gray (`gr

### `model-docs-governance.md` — Theme Zero Docs Governance

# Theme Zero Docs Governance

## Objectives

1. Avoid ambiguous references between singular model names and plural table names.
2. Keep documentation indexes accurate across modules and themes.

## Rules

1. Model names in docs must be singular (`Scheda`, `User`, `Valutatore`).
2. Table names in docs remain plural (`schede`, `users`, `valutatori`).
3. Prefer canonical `kebab-case` docs filenames.
4. When introducing a new docs topic, add a link in `00-index.md` or `README.md`.

### `model-usage-in-themes.md` — Model Usage in Themes - Best Practices

# Model Usage in Themes - Best Practices

## Executive Summary

Themes in this application follow the **"Theme as Dress"** philosophy - they provide only visual presentation while business logic (including model access) remains in modules. This document explains how themes should interact with models from modules following DRY and KISS principles.

---

## Core Principle: Themes Don't Own Models

### ✅ CORRECT Architecture

```
┌──────────────────────────────────────────┐
│           THEME (Zero)                   │
│  • Views, layouts, styling               │
│  • NO direct model instantiation         │
│  • NO business logic                     │
└──────────────────────────────────────────┘
                  │

### `modern-theme-architecture.md` — Architettura Moderna dei Temi - Zero Theme

# Architettura Moderna dei Temi - Zero Theme

Il tema Zero segue i principi di modularità e performance introdotti con Laravel 12 e Filament 5.

## 1. Asset Management (Vite + Tailwind CSS v4)
Il tema utilizza Vite per il build degli asset e Tailwind CSS v4 per il design system.
- **Vantaggio**: Build ultra-veloci e runtime ridotto.
- **Integrazione**: Gli asset sono registrati tramite `XotBaseThemeServiceProvider`.

## 2. Integrazione Livewire 4 & Volt
Il tema favorisce l'uso di Livewire Volt per i componenti UI del frontend.
- **Best Practice**: Mantenere la logica di presentazione dentro i file Volt per una manutenzione "colocated".

## 3. Flux UI Integration
Zero integra Flux UI per componenti base (button, modals, inputs) garantendo:
- Accessibilità WCAG out-of-the-box.
- Stile coeren

### `no-phpstan-probe-policy.md` — No PHPStan probe files in themes


# No PHPStan probe files in themes

## Regola

Nei temi (a partire da `Themes/Zero`) non devono esistere:

- directory `app/Phpstan`
- file che finiscono per `PhpstanProbeModel.php`
- file che finiscono per `PhpstanTraitProbe.php` o nomi simili (probe fittizi)

## Motivazione

I file probe sono scorciatoie artificiali per silenziare PHPStan. La regola del progetto richiede di risolvere il problema a monte: correggere i docblock, usare `@phpstan-ignore` giustificato o scrivere test reali con `XotBaseTestCase`.

## Riferimento

Vedi anche:

- `@/var/www/_bases/base_ptvx_fila5/.windsurf/rules/phpstan.md`

### `packages-integration.md` — Integrazione Pacchetti nel Tema Zero

# Integrazione Pacchetti nel Tema Zero

Il tema Zero utilizza le ultime tecnologie dell'ecosistema Laravel per offrire un'esperienza utente moderna e accessibile.

## 1. UI & Componenti
- **Flux UI**: La libreria principale per i componenti frontend. Garantisce che tutti gli elementi (bottoni, form, modali) siano accessibili e seguano lo stile del progetto.
- **Livewire Volt**: Utilizzato per rendere i componenti del tema reattivi senza la necessità di classi PHP separate quando non necessario.

## 2. Asset Management
- **Vite & Tailwind v4**: Il build system è ottimizzato per Tailwind CSS v4, eliminando la necessità di configurazioni JS complesse e migliorando le performance di caricamento.

## 3. Media & Grafici
- **Spatie MediaLibrary**: Gestisce gli asset del tema (loghi, background, i

### `performance-actions-reference.md` — Performance actions reference

# Performance actions reference

## UpdateGgPresenzaDalalAction

Questo documento spiega cosa deve sapere il tema Zero dell'action
`UpdateGgPresenzaDalalAction`.

La regola fondamentale e' semplice:

- il tema **non** calcola `gg_presenza_dalal`
- il tema **non** replica query Sigma
- il tema consuma un dato gia' materializzato dal modulo `Performance`

## Dove vive la logica reale

La logica reale non appartiene al tema.

Appartiene a:

- `Modules\Performance\Actions\Organizzativa\UpdateGgPresenzaDalalAction`

### `performance-calcolo-quota-troubleshooting.md` — Troubleshooting Calcolo Quota Performance

# Troubleshooting Calcolo Quota Performance

## Problema: Discrepanza Quota Distribuita

### Sintomo

Nel report calcolo quota appare una discrepanza tra:
- **Quota totale** (es: 285.209,90)
- **Quota distribuita** (es: 278.542,20)
- **Diff** (es: 6.667,70 ≈ 2,34%)

## Cause Probabilistiche (in ordine di frequenza)

### 1. Campi Non Materializzati (90% dei casi)

Il calcolo SQL usa campi che potrebbero essere NULL:

```sql
-- Questi campi DEVONO essere valorizzati prima del calcolo
- gg_presenza_dalal

### `philosophy.md` — Zero Theme - Filosofia Completa

# Zero Theme - Filosofia Completa

**Data Creazione**: 2025-01-18  
**Status**: Documentazione Filosofica Completa  
**Versione**: 1.0.0

---

## Panoramica

Il tema **Zero** è il tema baseline di healthcare_app, implementando la filosofia "Vestito" di Laraxot. Zero fornisce presentazione visiva minimale, lasciando che la logica business rimanga completamente nei moduli.

## Filosofia "Vestito"

### Principio Fondamentale

> *Themes are like clothes - they cover the application and provide visual presentation, but they do not change the core functionality or structure of the underlying system.*

### Separazione Sacra


### `php-quality-gates-rule.md` — Theme Zero - PHP Quality Gates Rule

# Theme Zero - PHP Quality Gates Rule

## Regola tema
- Ogni modifica PHP nel tema deve passare:
  - `phpstan`
  - `phpmd`
  - `phpinsights`

## Test
- Quando testabile, coprire con test Pest o aggiornare test esistenti.

### `phpstan-compliance-status.md` — PHPStan Level 10 Compliance Status

# PHPStan Level 10 Compliance Status

**Last Updated**: 2025-12-10  
**Status**: ✅ NOT APPLICABLE (Theme)

## Summary
The Zero theme is a frontend theme and doesn't contain PHP code that requires PHPStan analysis. However, the theme follows best practices for:

1. **File Organization**: Clear structure for components, layouts, and assets
2. **Naming Conventions**: Consistent lowercase naming with dashes
3. **Documentation**: Comprehensive documentation in the docs folder
4. **Integration**: Proper integration with Laravel modules

## Theme Overview

The Zero theme provides:
- Base theme structure
- Component library
- Layout templates
- Asset management

### `phpstan-dry-kiss-guidelines.md` — PHPStan Level 10 + DRY/KISS Guidelines for Themes

# PHPStan Level 10 + DRY/KISS Guidelines for Themes

## Theme Code Quality Standards

Il tema Zero segue gli stessi standard di qualità del codice applicati ai moduli, con alcune specifiche per i temi.

---

## PHPStan Level 10 for Themes

### What to Check in Themes

Anche se i temi sono principalmente presentation layer, alcune parti contengono codice PHP che deve essere PHPStan compliant:

1. **Folio Pages con logic**
2. **View Composers**
3. **Service Providers**
4. **Custom Components (se presenti)**

### Running PHPStan on Themes

### `phpstan-merge-conflicts.md` — phpstan merge conflicts


# phpstan merge conflicts

Placeholder vuoto: nessun contenuto disponibile. File preservato per compatibilita' dei link storici; se il documento serve, ripopolare o consolidare nel canonico di competenza.

### `phpstan.md` — PHPStan Configuration - Theme Zero

# PHPStan Configuration - Theme Zero

## Regola Fondamentale

**SOLO `laravel/phpstan.neon` è la configurazione valida.**

### ❌ VIETATO
- Creare file `phpstan*.json` nei temi
- Creare configurazioni alternative `phpstan.neon.dist`
- Committare file di output PHPStan

### ✅ PERMESSO
- Usare `laravel/phpstan.neon` (configurazione centralizzata)
- File di output temporanei (esclusi da .gitignore)

## Configurazione Centralizzata

```
laravel/
└── phpstan.neon          # UNICA configurazione valida

### `project-completion-gaps.md` — Lacune di completamento — Zero


# Lacune di completamento — Zero

## Esito

Questo censimento documentale non certifica il completamento funzionale del theme.
Il completamento resta **non dimostrato** finché non sono chiusi e verificati i criteri
sotto elencati e le story aperte del modulo/tema in `docs/sprint-status.yaml`.

## Evidenza documentale rilevata

- Markdown sotto `docs/`: **221**.
- Story BMAD trovate (`*.story.md`): **10**; il conteggio non implica che siano
  concluse né che coprano tutti i requisiti.
- Frontmatter iniziale presente: **221/221**.
- README/purpose mancanti: `purpose.md`
- Controllo frontmatter: Tutti i Markdown censiti iniziano con frontmatter; validità semantica completa non controllata per ciascun documento.

## Lavoro necessario per poter chiudere


### `quality-status.md` — Theme Zero — stato qualita' e gate


# Theme Zero — stato qualita' e gate

## Misura (2026-11-25)

| Indicatore | Valore |
|---|---:|
| Blade (fuori `docs/`) | 25 |
| PHP in `app/` | 0 (solo `.gitkeep`) |
| File lingua PHP | 26 |
| Test | 1 file: `tests/Unit/ThemeBoundariesTest.php` (2 casi, sorgente senza app) |
| TODO/FIXME in `resources/`, `lang/` | 0 |
| Metodi duplicati / omonimi | 0 (nessuna classe) |

Le note storiche "PHPStan level 10, 0 errori, PHPInsights 100%" sono vere ma non misurano nulla:
il tema non ha classi.

## Gate

```bash

### `readonly-field-styling.md` — Readonly Field Styling - UI/UX Pattern

# Readonly Field Styling - UI/UX Pattern

**Theme**: Zero  
**Date**: 2026-02-11  
**Status**: Standard attivo

---

## Panoramica

Questo documento definisce il pattern standard per lo stile visivo dei campi readonly (calcolati/computati) nei form Filament. L'obiettivo è garantire una chiara gerarchia visiva tra campi editabili e campi di sola lettura.

## Pattern Standard

### Classi Tailwind CSS

```php
->readOnly()
->extraInputAttributes([
    'class' => 'bg-blue-50 dark:bg-blue-950/30 border-l-4 border-l-blue-400 dark:border-l-blue-500 text-blue-900 dark:text-blue-100 cursor-not-allowed',

### `release-marketing-standard.md` — Release e README marketing — Zero


# Release e README marketing — Zero

## Scopo

Ogni modulo/tema deve essere pubblicabile, comprensibile e desiderabile: workflow release, changelog automatico e README vetrina.

## File canonici locali

- `../README.md`
- `../.github/workflows/semantic-release.yml`
- `../.releaserc.json`
- `../CHANGELOG.md`

## Confidenza

La configurazione usa semantic-release con Conventional Commits, changelog, GitHub release e commit automatico del changelog.

### `repo-operations.md` — Theme Zero — operazioni sul repo


# Theme Zero — operazioni sul repo

## Sync multi-organizzazione

Remote: `laraxot` (`git@github.com:laraxot/theme_zero_fila5.git`, upstream) e `provtv`, branch
`dev`. Prompt di progetto: `bashscripts/tools/prompts/02-gitmodules-sync.md`.

1. `git remote -v` sempre: in un conflitto fra URL `base_<a>_*` e `base_<b>_*` possono essere
   false entrambe le parti.
2. `git fetch --all --prune`; modifiche locali committate prima del merge (mai
   stash/reset/restore/checkout/force).
3. `git rev-list --left-right --count HEAD...<remote>/dev`: `N 0` push; secondo > 0 merge
   forward-only; chiusura `0 0` su ogni remote e tree pulito.
4. `did not receive expected object` / `unpack failed` → `git fetch --unshallow` o
   `git push --no-thin`. Storie scollegate → `--allow-unrelated-histories` con revi

### `roadmap/accessibility-standards.md` — Accessibilita e standard cross-browser


# Accessibilita e standard cross-browser

## Obiettivo

Rendere il tema conforme agli standard di accessibilita e compatibile con i principali browser.

## Passi operativi

1. Definire requisiti minimi di accessibilita.
2. Verificare layout e componenti con checklist WCAG.
3. Introdurre supporto completo per tastiera.
4. Verificare contrasti e semantica HTML.
5. Testare sui browser di riferimento.

## Criticita

- Componenti non ottimizzati per screen reader.
- Contrasti non uniformi tra pagine.


### `roadmap/advanced-features.md` — Funzionalita avanzate (dark mode, export)


# Funzionalita avanzate (dark mode, export)

## Obiettivo

Introdurre funzionalita avanzate mantenendo coerenza visiva e controllo delle dipendenze.

## Passi operativi

1. Definire il set minimo di feature avanzate.
2. Progettare dark mode basata sui token.
3. Introdurre strumenti di export/import tema.
4. Aggiungere linee guida per animazioni.
5. Documentare compatibilita e limiti.

## Criticita

- Rischio di duplicare stili per dark mode.
- Dipendenze extra non standardizzate.


### `roadmap/component-library.md` — Libreria componenti e integrazione UI


# Libreria componenti e integrazione UI

## Obiettivo

Costruire una libreria componenti coerente con il tema e allineata alle componenti UI esistenti.

## Passi operativi

1. Inventariare i componenti gia usati nei layout.
2. Definire naming e varianti supportate.
3. Consolidare stili e ridurre duplicazioni.
4. Documentare esempi di utilizzo.
5. Verificare accessibilita per i componenti base.

## Criticita

- Componenti duplicati con stili diversi.
- Varianti non documentate o incoerenti.


### `roadmap/performance-optimization.md` — Performance e ottimizzazione asset


# Performance e ottimizzazione asset

## Obiettivo

Ridurre i tempi di caricamento e standardizzare la pipeline di asset del tema.

## Passi operativi

1. Analizzare bundle e asset principali.
2. Eliminare asset duplicati o non utilizzati.
3. Applicare lazy loading dove possibile.
4. Definire regole di caching per asset statici.
5. Misurare regressioni con metriche semplici.

## Criticita

- Asset storici non versionati.
- Caricamento di risorse non necessarie.


### `roadmap/responsive-system.md` — Sistema responsive e grid


# Sistema responsive e grid

## Obiettivo

Definire un sistema responsive coerente con griglie, breakpoint e layout riutilizzabili.

## Passi operativi

1. Mappare i layout correnti e individuare i breakpoint reali.
2. Definire una scala di breakpoint con naming consistente.
3. Introdurre una griglia base con varianti per contenuto e sidebar.
4. Aggiornare i layout principali con classi comuni.
5. Validare su dispositivi rappresentativi.

## Criticita

- Layout storici non allineati ai breakpoint moderni.
- Componenti con stili inline non riutilizzabili.


### `roadmap/theme-customization.md` — Personalizzazione tema e varianti


# Personalizzazione tema e varianti

## Obiettivo

Introdurre un sistema di personalizzazione con varianti di colore, tipografia e layout.

## Passi operativi

1. Identificare i token di design (colori, spaziature, tipografia).
2. Definire un set minimo di varianti supportate.
3. Separare i token in file dedicati.
4. Introdurre override per moduli o contesti specifici.
5. Documentare le regole di estensione.

## Criticita

- Stili attuali non basati su token.
- Rischio di divergenza tra moduli.


### `roadmap.md` — Product Roadmap - Zero Theme

# Product Roadmap - Zero Theme

## 🎯 Vision & Strategy
Develop the Zero Theme as a high-performance, specialized component of the Laraxot ecosystem.

## 🗓️ Timeline
### Q1 2026: Foundation
- Standardize Zero Theme Documentation - *Status: Shipped*
- PHPStan Level 10 Audit - *Status: In Progress*

### `schemaless-attributes.md` — 🧬 Schemaless Attributes in Themes

# 🧬 Schemaless Attributes in Themes

**Status:** ✅ STANDARD
**Central Reference:** [Xot Schemaless Guide](../../Modules/Xot/docs/spatie-schemaless-attributes.md)

---

## 🎨 Usage in Themes

Themes can use models that implement Schemaless Attributes (e.g., `Profile`, `Extra`).

### Safe Access in Blade Views

```blade
{{-- ✅ CORRECT — with default value --}}
{{ $model->extra_attributes->get('color', 'default-blue') }}

{{-- ✅ CORRECT — null-safe check --}}
@if($model->extra_attributes?->get('show_banner'))
    <div class="banner">...</div>

### `simplechartwidget-problems-analysis.md` — SimpleChartWidget - Analisi Problemi e Miglioramenti UI/UX

# SimpleChartWidget - Analisi Problemi e Miglioramenti UI/UX

## Panoramica

Questo documento analizza le problematiche identificate nel widget `SimpleChartWidget` e propone soluzioni per migliorare l'esperienza utente e l'esperienza visiva. L'analisi si basa sulle osservazioni della chart mostrata nell'immagine fornita e sulle best practices di design moderno.

## Problemi Identificati

### 1. **Problemi di Rendering e Layout**

#### **Issue 1: Testo Anomalo nei Datalabels**
- **Descrizione**: Il testo "R 8", "Q 1", "R 0" ecc. nei datalabels indica problemi di rendering o template variables non sostituite
- **Impatto**: Distrazione visiva, riduce professionalità
- **Esempio**: Febbraio mostra "R 1" invece di "8.1"

#### **Issue 2: Spaziatura Inconsistente**
- **Descrizione**: La spaziatur

### `simplechartwidget-quality-analysis.md` — SimpleChartWidget - Analisi Qualità del Codice e Best Practices

# SimpleChartWidget - Analisi Qualità del Codice e Best Practices

## Panoramica

Questo documento fornisce un'analisi approfondita della qualità del codice del widget `SimpleChartWidget`, identificando pattern di codice debole, violazioni di principi DRY+KISS e proposte di miglioramento per raggiungere la qualità di codice di livello enterprise.

## Analisi Statica del Codice

### 1. Violazioni di Principi DRY+KISS

#### **Violazione 1: Codice JavaScript Inline**
```php
// PROBLEMA: Codice JavaScript inline non riutilizzabile
'formatter' => 'function(v, ctx) {
    var avg = Number(v) || 0;
    var voters = ctx.dataset.voteCounts[ctx.dataIndex] || 0;
    return avg.toFixed(1) + "/10\n" + voters + " voti";
}'
```


### `strategy.md` — Product Strategy: Zero Theme

# Product Strategy: Zero Theme

## 🌍 Market Context
Specialized requirement for Zero within the Public Administration sector.

## 💎 Unique Value Proposition
Agnostic, modular, and type-safe implementation of Zero logic.

### `theme-architecture-best-practices.md` — Theme Architecture and Best Practices

# Theme Architecture and Best Practices

## Overview

This document outlines the architectural improvements and best practices implemented for theme development, focusing on the Zero theme and its integration with the modular Laravel application.

## Theme Architecture Principles

### "Tema come Vestito" Philosophy

The theme system follows the "Tema come Vestito" (Theme as Garment) philosophy:
- Themes provide only visual presentation
- Business logic remains in modules
- Themes are "garments" worn by the core application
- Separation of concerns between presentation and functionality

### Integration with Modular Architecture

- Themes interact with modules through defined contracts
- User authentication and data management handled by modules

### `theme-boundaries.md` — Theme Zero — confini tema/moduli


# Theme Zero — confini tema/moduli

## Perche'

Lo stesso tema serve installazioni diverse (One ne riusa la build): cio' che porta logica di
dominio non si trasferisce e non si testa nelle Blade. Decisione:
[ADR theme-as-dress-no-php](./adr/0002-theme-as-dress-no-php.md).

## Regole

- **Niente PHP in `app/`** (`.gitkeep` soltanto) — test `the theme ships no PHP classes`.
- **Niente modelli, migration, policy, Action** nel tema: "1 modello = 1 migrazione" vive nel
  modulo owner; colonne nuove con `tableUpdate()` + `hasColumn()` nella migration del modulo.
- **Dati nelle viste**: via widget Filament del modulo, dati passati dalla pagina o view composer
  registrato dal modulo. Mai query o `Model::` nelle Blade.
- **Direzione dipendenze**: Xot → Ptv → leaf (Progressioni, Indennita*, Perfor

### `themes-system-complete-guide.md` — 🎨 THEMES SYSTEM - IL VESTITO DI LARAXOT

# 🎨 THEMES SYSTEM - IL VESTITO DI LARAXOT

## 📋 INDICE
1. [Filosofia Themes](#-filosofia-themes)
2. [Architettura Theme](#-architettura-theme)
3. **Tema Zero: Il Template Perfetto**
4. [Customizzazione Avanzata](#-customizzazione-avanzata)
5. [Asset Management](#-asset-management)
6. [Future Enhancements](#-future-enhancements)

---

## 🧠 FILOSOFIA THEMES (The Theme Philosophy)

### **Principio Fondamentale: Il Tema è un "Vestito", non la "Pelle"**
I temi in Laraxot seguono una filosofia radicale:
- **I temi forniscono SOLO presentazione visiva**
- **La logica business rimane SEMPRE nei moduli**
- **Nessuna dipendenza business nei temi**
- **Zero accoppiamento tra UI e business logic**

### `translations.md` — Theme Zero — traduzioni


# Theme Zero — traduzioni

## Cosa vive qui

`lang/<locale>/` contiene solo stringhe che esistono perche' il tema le disegna. Namespace
nelle Blade: `__('pub_theme::<file>.<chiave>')`.

| File | Contenuto | Lingue |
|---|---|---|
| `auth.php` | pagina di login | it, en, de, es |
| `home.php` | home pubblica | it, en, de, es |
| `welcome.php` | pagina `index` | it, en, de, es |
| `blocks.php` | testi dei blocchi | it, en, de, es |
| `layout.php` | header/footer/meta | it, en, de, es |
| `navigation.php` | menu pubblico, `site_title` | it, en, de |
| `ui.php` | etichette condivise | it, en, de |

## Regole


### `troubleshooting.md` — Zero Theme Troubleshooting Guide

# Zero Theme Troubleshooting Guide

## Advanced Charting Libraries

### JpGraph 4.4.2 (Recommended)
JpGraph is the primary PHP charting library for PDF generation in Zero theme:

**Key Features:**
- ✅ PHP 8.2+ support (latest version 4.4.2)
- ✅ 200+ built-in functions for chart generation
- ✅ 400+ named colors and 200+ country flags
- ✅ Advanced interpolation with cubic splines
- ✅ Multi-Y-axis support and background image support
- ✅ Image map generation for drill-down charts
- ✅ Built-in caching system for performance optimization
- ✅ Open source and free for personal use

**Supported Chart Types:**
- **Line Charts**: Line, filled line, step line, line with markers
- **Bar Charts**: Standard, horizontal, grouped, stacked, accumulated
