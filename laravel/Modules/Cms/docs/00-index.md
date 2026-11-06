<<<<<<< .merge_file_5ShVTR
---
title: "Cms: indice operativo di docs/ (a cosa serve ogni gruppo)"
type: index
status: active
module: Cms
created: 2026-10-20
updated: 2026-10-27
tags: [docs, cms, indice, scopo]
qmd: "cms docs indice operativo scopo gruppi cartelle radice stub superseded raw stories json pagine blocchi sito"
related:
  - ./README.md
  - ./scopo.md
  - ./index.md
  - ./stories/dcp-443-ordine-dei-docs-del-modulo-cms-link-nomi-e-scopo.story.md
  - ./stories/docs-organization-cms.story.md
---

# Cms: indice operativo di docs/

Questo e' l'ingresso per chi deve capire **dove cercare** nei docs del modulo e **quanto fidarsi** di quello che trova. Non elenca tutti i file: per l'elenco per argomento c'e' [index.md](./index.md) (catalogo, 73 KB). Per lo stato verificato del codice c'e' [README.md](./README.md). Per il perche' del modulo c'e' [scopo.md](./scopo.md).

Conteggi misurati il 2026-10-27 con `find docs -name '*.md'`: **933 file** (529 nella radice, 404 nelle sottocartelle), di cui 38 in `raw/` e 35 in `stories/`.

## Come si legge lo `status`

Su 860 file fuori da `raw/` e `stories/`: 661 `draft`, 124 `stub`, 49 `superseded`, 13 `active`, 13 altri (`done`, `decision-input`, `merged`, ...). `draft` vuol dire **non rivisto**, non falso: e' il valore messo dai passaggi meccanici di riordino. Un documento e' affidabile solo se e' `active` o se si controlla sul codice. Un `stub` ha meno di 500 caratteri e di solito rinvia a un canone; un `superseded` ha `superseded_by` col file da leggere al suo posto.

## Cosa descrive davvero il sito

Il sito legge JSON per tenant: per `local/fixcity` ci sono 113 file in `laravel/config/local/fixcity/database/content/pages/` (cartelle comprese) e 8 in `sections/`. Questi sono i documenti che descrivono quel meccanismo e che sono `active`:

| Domanda | Documento |
|---|---|
| Come si passa da URL a pagina e a blocchi | [README.md](./README.md), [actions/page-resolution-pipeline.md](./actions/page-resolution-pipeline.md) |
| Perche' esiste il modulo e dove finiscono i suoi confini | [scopo.md](./scopo.md) |
| Come e' fatto un blocco (`BlockData`, query, lingue) | [content-blocks-architecture.md](./content-blocks-architecture.md), [data/block-data.md](./data/block-data.md) |
| Quali pagine di primo livello sono guidate dal JSON | [wiki/concepts/container0-index-json-driven-pages.md](./wiki/concepts/container0-index-json-driven-pages.md), [wiki/concepts/folio-page-shell-pattern.md](./wiki/concepts/folio-page-shell-pattern.md) |
| Middleware e slug dichiarati nel JSON | [wiki/concepts/cms-page-middleware-json-ssot.md](./wiki/concepts/cms-page-middleware-json-ssot.md), [json-content-slug-uniqueness.md](./json-content-slug-uniqueness.md) |
| Il JSON del tenant e' contenuto del front office | [wiki/concepts/tenant-json-is-fo-content.md](./wiki/concepts/tenant-json-is-fo-content.md) |
| Header e navigazione da Builder a JSON | [wiki/concepts/header-nav-block-architecture.md](./wiki/concepts/header-nav-block-architecture.md), [wiki/concepts/headernavblock-filament-builder.md](./wiki/concepts/headernavblock-filament-builder.md) |
| Come si verifica un URL | [stories/dcp-41-url-to-json-resolver.story.md](./stories/dcp-41-url-to-json-resolver.story.md) |
| Come si scrive un testo in una Blade (quattro lingue) | [stories/blade-i18n-no-hardcoded-text.story.md](./stories/blade-i18n-no-hardcoded-text.story.md) |

Lacuna da sapere: i tipi di blocco che le pagine usano di piu' (ad esempio `service-flow`, presente in 44 dei 113 JSON) non compaiono in nessun documento di questa cartella. I file di [blocks/](./blocks/README.md) descrivono le 16 classi `*Block.php` del Builder di amministrazione (`app/Filament/Blocks`), non i tipi che il front office rende: quelli sono componenti Blade del tema Sixteen (`Themes/Sixteen/resources/views/components/blocks/`, 168 voci). Per i blocchi del sito si legge il tema, non `blocks/`.

## A cosa serve ogni gruppo

La radice di `docs/` e' piatta (529 file) e non si sposta senza una migration map (regola DOC-006): si naviga per prefisso del nome. Le cartelle sono raccolte per scopo:

| Gruppo | File | Scopo | Affidabilita' |
|---|---:|---|---|
| radice, prefisso `phpstan*` | 42 | cronaca delle correzioni PHPStan fatte sul modulo | storica: i numeri sono di quel giorno |
| radice, prefisso `filament*` | 35 | uso di Filament e dei suoi componenti nel modulo | da verificare sul codice |
| radice, prefissi `homepage*`, `page*`, `design-comuni*` | 41 | come si costruisce la homepage e le pagine, parita' con Design Comuni | in parte superata dai JSON |
| radice, prefissi `volt*`, `folio*` | 19 | esempi e regole Folio/Volt | riferimento |
| [wiki/](./wiki/README.md) | 50 | wiki del modulo: concetti, decisioni, regole, registro | la parte piu' curata (contiene 3 dei documenti `active`) |
| [components/](./components/README.md) | 43 | componenti Blade e di pagina | riferimento |
| [roadmap/](./roadmap/README.md) | 38 | piani e scadenze | 26 dei 38 file hanno meno di 700 byte: promemoria, non piani |
| [blocks/](./blocks/README.md) | 27 | blocchi del Builder di amministrazione | vedi la lacuna sopra |
| [sections/](./sections/index.md) | 22 | sezioni (header, footer, selettore lingua) e relativo archivio | riferimento |
| [bmad/](./bmad/README.md) | 22 | decisioni, inventari e contesto di progetto | riferimento, include `decision-log.md` (`active`) |
| [frontoffice/](./frontoffice/README.md) | 21 | come creare e agganciare un tema | riferimento |
| `themes/`, `tests/`, `migrations/`, `errors/`, `development/`, `best-practices/`, `architecture/` | 12, 11, 8, 8, 7, 7, 6 | un argomento ciascuna | riferimento |
| 6 cartelle da 2 file e 19 cartelle da 1 file | 12 + 19 | argomenti singoli (`data/`, `actions/`, `filament/`, `folio/`, `livewire/`, ...) | riferimento |
| [stories/](./stories/) | 35 | cronologia del lavoro (BMAD) | storico: non si rinomina ne' si cancella |
| `raw/` | 38 | import originali immutabili | storico, non si tocca |

Per sapere se un documento e' ancora vero, la prova rapida e' cercare nel testo le classi che cita. `PageService`, `BlockService`, `ContentService`, `PublishPageAction`, `CreatePageAction` e `Page::addBlock()` non esistono nel codice. Sette documenti li citano come se esistessero e sono prove vecchie da non seguire: `module-implementation-roadmap.md`, `roadmap-.md`, `roadmap-complete.md`, `roadmap/legacy/legacy-roadmap.md`, `roadmap/legacy/legacy-roadmap-complete.md`, `wiki/log.md`, `wiki/content-architecture.md`. Altri quattro li nominano per dire che non esistono: [README.md](./README.md), [scopo.md](./scopo.md), [index.md](./index.md) e questo indice.

## Residui noti, da non copiare

- 124 `stub` e 49 `superseded`: puntatori, non contenuto.
- 44 file `*.md.old` (35 nella radice): copie di backup, non sono `.md` e gli strumenti di riordino non li vedono.
- 85 sezioni «Collegamenti tra versioni di ...» in 83 file, generate da uno script: elencano copie dello stesso file in altri moduli e hanno 758 link, di cui 445 non risolvono. Non sono contenuto.
- Nomi sporchi nella radice e nelle sottocartelle (esclusi `raw/` e `stories/`): 7 con `-renamed`, 11 con trattino finale (`roadmap-.md`), 105 con underscore, 15 con maiuscole, 7 con mese o anno (`quality-status-2025.md`, `phpstan-fixes-gennaio.md`, ...). La regola e' nomi senza date, le date stanno nel frontmatter. Quelli con mese o anno sono tutti stub, vuoti o `superseded`: restano finche' l'utente non decide la rimozione (vedi la story DCP-443).

## Se aggiungi un documento

1. Controlla il nome: `python3 -I bashscripts/tools/docs/md-filenames.py name <percorso>`.
2. Cerca prima se esiste: `qmd search "<argomento>"`. Un documento in piu' sullo stesso argomento e' il difetto principale di questa cartella.
3. Frontmatter completo (`title`, `type`, `status`, `updated`, `tags`, `qmd`) e link relativi che esistono su disco: `python3 bashscripts/tools/docs/docs-organizer.py links laravel/Modules/Cms/docs` (senza `--fix` e' una simulazione).
4. Un nuovo documento che sostituisce uno vecchio lo dichiara con `status: superseded` e `superseded_by` nel vecchio; non si cancella.

## Storia del riordino

[docs-organization-cms](./stories/docs-organization-cms.story.md) (maiuscole, frontmatter, rinomine) e [DCP-443](./stories/dcp-443-ordine-dei-docs-del-modulo-cms-link-nomi-e-scopo.story.md) (link, nomi con mese, scopo e questo indice).
=======
<<<<<<< HEAD
# Cms Module Documentation

## Overview

=======
>>>>>>> 6ed19256f (.)
# Cms Module Documentation Index

## Core Concepts
- [Project Purpose](../Meetup/docs/project-purpose.md) - Purpose of the CMS system
- [Business Logic](../Meetup/docs/business-logic.md) - Core business requirements
- [Architecture Overview](../Meetup/docs/architecture-overview.md) - Module architecture patterns

## Development Guides
- [Implementation Plan](../Meetup/docs/implementation-plan.md) - Development roadmap
- [Services Guide](../Meetup/docs/services-guide.md) - Service layer documentation

## Code Quality
- [Common PHPStan Errors](common-phpstan-errors.md) - Documentation about common PHPStan issues and their solutions

## Frontend Assets
- [Development Workflow CSS/JS Changes](../Meetup/docs/development-workflow-css-js-changes.md) - Asset management
- [Build and Copy Workflow](../Meetup/docs/build-and-copy-workflow.md) - Build process

## Missing Features & Gaps
- [Missing Features](../Meetup/docs/missing-features.md) - Identified missing functionality
- [Gap Analysis](../Meetup/docs/gap-analysis.md) - Gap analysis between current and desired state
# Cms Module Documentation Index

## Core Concepts
- [Project Purpose](../Meetup/docs/project-purpose.md) - Purpose of the CMS system
- [Business Logic](../Meetup/docs/business-logic.md) - Core business requirements
- [Architecture Overview](../Meetup/docs/architecture-overview.md) - Module architecture patterns

## Development Guides
- [Implementation Plan](../Meetup/docs/implementation-plan.md) - Development roadmap
- [Services Guide](../Meetup/docs/services-guide.md) - Service layer documentation

## Code Quality
- [Common PHPStan Errors](common-phpstan-errors.md) - Documentation about common PHPStan issues and their solutions

## Frontend Assets
- [Development Workflow CSS/JS Changes](../Meetup/docs/development-workflow-css-js-changes.md) - Asset management
- [Build and Copy Workflow](../Meetup/docs/build-and-copy-workflow.md) - Build process

## Missing Features & Gaps
- [Missing Features](../Meetup/docs/missing-features.md) - Identified missing functionality
- [Gap Analysis](../Meetup/docs/gap-analysis.md) - Gap analysis between current and desired state
<<<<<<< HEAD
Il modulo Cms gestisce contenuti, composizione pagina e rendering CMS-driven dei blocchi. Nel lavoro corrente sulla parity Design Comuni, il Cms governa la struttura della homepage di test, mentre la resa visuale viene rifinita nel tema Sixteen.

## 📚 Design Comuni - Index Completo

- **[DESIGN_COMUNI_INDEX.md](./DESIGN_COMUNI_INDEX.md)** - **INDEX COMPLETO** con tutti i link bidirezionali

## Active design-comuni references

- [design-comuni-homepage.md](./design-comuni-homepage.md) - Coordinamento Cms per la homepage parity
- [design-comuni-faq.md](./design-comuni-faq.md) - Pagina FAQ ✅ 90%
- [design-comuni-argomenti.md](./design-comuni-argomenti.md) - Pagina argomenti
- [design-comuni-risultati-ricerca.md](./design-comuni-risultati-ricerca.md) - Pagina risultati ricerca
- [design-comuni-page-census.md](./design-comuni-page-census.md) - Censimento 38 pagine
- [design-comuni-services-implementation.md](./design-comuni-services-implementation.md) - Implementazione servizi
- [design-comuni-batch-audit.md](./design-comuni-batch-audit.md) - Audit batch pagine
- [design-comuni-batch-parity.md](./design-comuni-batch-parity.md) - Verifica parity
- [architecture/homepage-structure.md](./architecture/homepage-structure.md) - Flusso runtime aggiornato della homepage di test
- [PAGE_COMPONENT_ARCHITECTURE.md](./PAGE_COMPONENT_ARCHITECTURE.md) - Architettura generale componenti pagina

## Theme cross links

- [../../../Themes/Sixteen/docs/00-index.md](../../../Themes/Sixteen/docs/00-index.md) - Indice docs del tema
- [../../../Themes/Sixteen/docs/design-comuni/00-index.md](../../../Themes/Sixteen/docs/design-comuni/00-index.md) - Workspace attivo parity homepage
- [../../../Themes/Sixteen/docs/design-comuni/ALL_PAGES_ANALYSIS.md](../../../Themes/Sixteen/docs/design-comuni/ALL_PAGES_ANALYSIS.md) - Analisi 54 pagine
- [../../../Themes/Sixteen/docs/design-comuni/PROGRESS_REPORT.md](../../../Themes/Sixteen/docs/design-comuni/PROGRESS_REPORT.md) - Report progresso
- [../../../docs/design-comuni/MASTER_INDEX.md](../../../docs/design-comuni/MASTER_INDEX.md) - Master Index globale

## Runtime architecture

- La pagina di test e' servita da `Themes/Sixteen/resources/views/pages/tests/[slug].blade.php`.
- Il contenuto locale della homepage arriva da `config/local/fixcity/database/content/pages/tests.homepage.json`.
- Il Cms mantiene il contratto dati e la struttura dei blocchi.
- Il tema Sixteen mantiene layout, CSS e JS di parity visuale.

## Operational rule for this workstream

- Se il problema e' strutturale, verificare prima Cms JSON + routing.
- Se il problema e' visivo, lavorare nel tema e documentare i risultati anche qui.
- Mantenere collegamenti bidirezionali tra docs di modulo e docs di tema.
=======
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_QrYZ1g
