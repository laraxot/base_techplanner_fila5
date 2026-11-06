<<<<<<< .merge_file_OKkQWv
=======
# 📄 Cms Module - Content Management System

[![Laravel 12.x](https://img.shields.io/badge/Laravel-12.x-red.svg)](https://laravel.com/)
[![Filament 4.x](https://img.shields.io/badge/Filament-4.x-blue.svg)](https://filamentphp.com/)
[![PHP 8.3](https://img.shields.io/badge/PHP-8.3-blueviolet.svg)](https://www.php.net/)
[![PHPStan Level 10](https://img.shields.io/badge/PHPStan-Level%2010-brightgreen.svg)](https://phpstan.org/)

> **📄 Modulo Cms**: Sistema completo di gestione contenuti basato su Filament con sistema di blocchi modulari, gestione pagine dinamiche e Livewire components.

## 📋 Panoramica

Il modulo **Cms** fornisce:
- 📄 **Gestione Pagine** - Sistema completo per creazione e gestione pagine
- 🧱 **Sistema Blocchi** - Blocchi riutilizzabili per composizione contenuti
- ⚡ **Livewire Integration** - Componenti Volt per frontend interattivo
- 🎨 **Theming** - Sistema temi personalizzabili
- 📝 **Metatag Management** - SEO e metadata per ogni pagina
- 🌐 **Multi-lingua** - Supporto completo internazionalizzazione

---

## 🏆 PHPStan Level 10 Compliance

**Status**: ✅ **0 Errori**
**Approccio**: Fix, Don't Ignore

### Metriche Achievement
- **Pattern Applicati**: Rimozione ridondanze, Safe cast actions, PHPDoc annotations

### Documentazione Correlata
- [PHPStan Level 10 Success](../../../docs/phpstan-level-10-success.md) - Achievement generale progetto
- [Xot PHPStan Patterns](../../Xot/docs/phpstan-patterns-dec-2025.md) - Pattern comuni

---

## 🏗️ Componenti Principali

### Modelli
- **Page**: Pagine del sito con blocchi modulari
- **Metatag**: Metadata SEO per pagine
- **Block**: Blocchi riutilizzabili di contenuto
- **Appearance**: Configurazioni aspetto e temi
- **Attachment**: Gestione allegati e media

### Filament Resources
- **PageResource**: CRUD completo per pagine
- **AppearanceResource**: Gestione temi e aspetto
- **BlockResource**: Gestione blocchi riutilizzabili

### Livewire Components
- **LoginComponent**: Form login con Volt
- **RegisterComponent**: Form registrazione con Volt
- **HomePage**: Homepage dinamica
- **PageShow**: Rendering pagine pubbliche

---

## 🚀 Quick Start

### Installazione
```bash
# Abilitare il modulo
php artisan module:enable Cms

# Eseguire le migrazioni
php artisan migrate

# Pubblicare le configurazioni (opzionale)
php artisan vendor:publish --tag=cms-config
```

---

## 📚 Documentazione Completa

### Architettura
- [Content Management Strategy](./content-management-strategy.md) - Strategia gestione contenuti
- [Frontend Architecture](./frontend-architecture/struttura-homepage.md) - Architettura frontend
- [Homepage Management](./homepage-management.md) - Gestione homepage
- [Architettura XotData Pattern](./architecture-xotdata-pattern.md) - Errore Critico Risolto

### Componenti
- [Blocks System](./blocks/) - Sistema blocchi modulari
- [Components](./components/) - Componenti Blade e Livewire
- [Livewire Page Show](./livewire/page-show.md) - Rendering pagine dinamiche

### Development
- [Testing Guidelines](./tests/architecture-separation-rules.md) - Linee guida testing
- [Link Relativi Regole](./link-relativi-regole.md) - Regole link documentazione
- [Module Guidelines](./module-guidelines.md) - Linee guida modulo

---

## 🔗 Collegamenti

### Moduli Correlati
- [UI Module](../../UI/docs/README.md) - Componenti UI condivisi
- [Xot Module](../../Xot/docs/README.md) - Framework base
- [Lang Module](../../Lang/docs/README.md) - Internazionalizzazione

### Documentazione Root
- [Modules Index](../../../docs/modules-index.md) - Indice generale moduli
- [Development Rules](../../../docs/development_rules_updated.md) - Regole sviluppo

---

## 🧪 Testing

```bash
# Test del modulo
./vendor/bin/pest Modules/Cms

# PHPStan analysis
./vendor/bin/phpstan analyse Modules/Cms
```

---

## 🎯 Best Practices

### Extend XotBase Classes
```php
// ✅ CORRETTO
use Modules\Xot\Filament\Resources\XotBaseResource;

class PageResource extends XotBaseResource
{
    protected static ?string $model = Page::class;
}

// ❌ ERRATO
use Filament\Resources\Resource;

class PageResource extends Resource
{
    // Non estendere direttamente Filament
}
```

### Safe Casting
```php
// ✅ CORRETTO
use Modules\Xot\Actions\Cast\SafeStringCastAction;

$title = SafeStringCastAction::cast($attachment->title);

// ❌ ERRATO
$title = (string) $attachment->title; // Può fallire con null
```

---

## 📉 Roadmap

### Q1 2025
- [ ] Advanced block editor con drag-and-drop
- [ ] Page versioning e rollback
- [ ] A/B testing per contenuti

---

**Ultimo aggiornamento**: Marzo 2025
**Versione**: 2.0.0
**PHPStan Level**: 10 ✅
**Status**: Production Ready
<<<<<<< HEAD
>>>>>>> .merge_file_jkRFJC
---
qmd: "README"
issues: []
discussions: []
title: "Cms: README"
type: documentation
tags: [module, documentation, cms, content-management]
created: 2026-07-14
updated: 2026-10-14
status: active
---

# Modulo Cms

Modulo Laraxot `Modules\Cms` (alias `cms`, priorita' 3 in `module.json`, provider `CmsServiceProvider`, `Filament\AdminPanelProvider`, `FolioVoltServiceProvider`). Verificato sul codice il 2026-10-14. Il testo precedente di questo README (Services `PageService`/`BlockService`/`ContentService`, modello `Block`, `PublishPageAction`, `CreatePageAction`, `Page::addBlock()`, config `config/local/cms/blocks.php`, test `PageCreationTest.php`) descriveva classi e file che non esistono ed e' stato sostituito; i suoi riferimenti a `block-system.md`, `frontend-rendering.md` e `folio-integration.md` puntavano a file mai esistiti.

## Come il sito serve le pagine (verificato)

1. **Il contenuto sono file JSON per tenant.** `Models\Page` estende `BaseModelLang`, usa `HasBlocks` e il trait `SushiToJsons` del modulo Tenant: ogni riga e' un file `laravel/config/<tenant>/database/content/pages/<slug>.json` (per il tenant `local/fixcity`: 99 file al 2026-10-14; `sections/` ne ha 8). Colonne dello schema: `id`, `title` (json per lingua), `slug`, `middleware` (json), `content`, `description`, `layout`, `blocks`, `content_blocks`, `sidebar_blocks`, `footer_blocks` (json per lingua), `created_at/by`, `updated_at/by`. Come si sceglie il tenant: [Tenant](../../Tenant/docs/README.md).
2. **Le rotte sono Folio, non route Laravel.** `Providers\FolioVoltServiceProvider` monta con `Folio::path()` la cartella `resources/views/pages` del tema pubblico (`XotData::getPubThemeViewPath('pages')`, oggi Sixteen) sotto `/{locale}` per ogni lingua di `laravellocalization.supportedLocales` (a runtime `de,en,es,it`), e lo stesso per `resources/views/pages` di ogni modulo; poi `Volt::mount()` su `livewire/` e `components/blocks/` del tema. `routes/web.php` del Cms contiene solo `/` che reindirizza a `/{locale}`.
3. **Lo slug e' l'URL.** Pagina generica `pages/[container0]/[slug0]`: `Actions\ResolvePageAction` prova, in ordine, un modello dinamico (`profile`; `blog` e `events` dal modulo Blog, solo se installato; `xra.container0_model_map`; `Modules\<Container>\Models\<Singolare>`), poi la pagina `<container0>.<slug0>`, poi `<container0>.view`. Il middleware dichiarato nel JSON (`"middleware": ["auth"]`) lo applica `Http\Middleware\PageSlugMiddleware`, agganciato nelle pagine del tema `[container0]/[slug0]/index.blade.php` e `tests/[slug].blade.php`. Da URL a JSON: [DCP-41](./stories/dcp-41-url-to-json-resolver.story.md) e `bashscripts/tools/cms/page-json-for-url.sh <url>`.
4. **I blocchi sono voci JSON con un `type`.** Esempio da `home.json` (lingue `it`, `en`, `de`, `es`, 4 blocchi per lingua): `home.hero`, `ticket.map-preview`, `how-it-works`, `quick-actions`. `Models\Traits\HasBlocks::getBlocks($side)` legge `blocks` o `<side>_blocks` per la lingua primaria e produce `Datas\BlockData`; `Actions\ResolveLocalizedBlockDataAction` risolve i valori per lingua, `Actions\ResolveBlockQueryAction` esegue la query dichiarata nel blocco (`model`, `scope`/`scopes`, `orderBy`, `limit`, `wrap_in`). Il rendering sono componenti Blade in `Themes/Sixteen/resources/views/components/blocks/` (166 voci) e `Modules/Cms/resources/views/components/blocks/`.
5. **Metatag e JSON-LD.** `View\Components\Metatags` legge `Modules\Xot\Datas\MetatagData` e `Actions\BuildPageSchemaAction` costruisce lo schema della pagina. Il modulo Seo non e' coinvolto.

## Amministrazione Filament

Risorse: `PageResource`, `SectionResource`, `MenuResource`, `PageContentResource`, `AttachmentResource`. Blocchi per il Builder in `app/Filament/Blocks/` (17 classi: `HeroBlock`, `CtaBlock`, `ParagraphBlock`, `NavigationBlock`, ...). Cluster `Appearance` con pagine `Breadcrumb`, `Footer`, `Headernav` (salvano con `SaveFooterConfigAction`, `SaveHeadernavConfigAction` nella config del tenant), pagina `Themes`. Componenti Volt di autenticazione in `app/Http/Volt/` (Login, Register, Verify, Password).

## Quick start

```bash
cd laravel
ls config/local/fixcity/database/content/pages | head          # le pagine del tenant corrente
bash ../bashscripts/tools/cms/page-json-for-url.sh http://127.0.0.1:8081/it/tests   # provato: stampa 'slug: tests.index' e i due JSON (richiede il server attivo; su /it/ non trova data-slug)
```

## Debito noto (verificato 2026-10-14, non modificato qui)

- Directory estranee dentro `app/`: `app/docs/` (INDEX, wiki, raw, package.json), `app/Config/` e `app/config/` (due `xra.php`), `app/bashscripts/`, `app/App/` vuota.
- Cartelle di viste duplicate: `resources/views/Components_old3`, `components_old3`, `Composers` e `composers`.
- 576 file .md nella radice di `docs/` (`find -maxdepth 1`, 2026-10-14); consolidamento DOC-004/006 ancora aperto.

## Test

151 file PHP in `tests/` (Unit: Actions, Datas, Filament, Http, Middleware, Models, Providers, Support, View; Feature: `HomepageConfigurationGovernanceTest`, `HomepageFilamentBlocksArchitectureTest`, `HeaderNavJsonTest`, `IndividualFolioRoutesTest`, ...). Non eseguiti in questa verifica. Il `Pest.php` di un modulo non viene caricato se si lancia Pest dalla root `laravel/` (Seo: 22 falliti su 46 per questo, vedi [Seo](../../Seo/docs/README.md)); Tenant e' stato lanciato con `bash bashscripts/tools/pest-scratch-db.sh Modules/Tenant/tests/Unit/Actions` (27 passati, 5 falliti per `expectMockery`).

## Mappa dei docs

Contratto corrente per le pagine pubbliche di primo livello: [container0 index
JSON-driven pages](./wiki/concepts/container0-index-json-driven-pages.md).

Il contratto comune per la documentazione è
[DOCUMENTATION_GOVERNANCE.md](../../../../docs/DOCUMENTATION_GOVERNANCE.md).
Questo `README.md` è l'ingresso canonico del modulo; gli indici esistenti sono
mappe di navigazione e non fonti concorrenti.

### Regola operativa per le pagine di primo livello

Prima di creare una Blade sotto `resources/views/pages/`, verificare se l'URL è
già coperto da `[container0]/index.blade.php` o da `[container0]/[slug0]`. Per
`domande-frequenti.index` la risposta è sì: la view speciale
`Themes/Sixteen/resources/views/pages/domande-frequenti/index.blade.php` è vietata
perché duplica il match Folio e bypassa il JSON tenant. Se il problema è nel
markup, correggere il blocco condiviso; se è nei dati, correggere JSON/Filament;
se è nel catalogo, correggere il modulo owner.

Indice operativo: [00-INDEX.md](./00-index.md). Wiki: [wiki/index.md](./wiki/index.md); middleware e JSON: [wiki/concepts/cms-page-middleware-json-ssot.md](./wiki/concepts/cms-page-middleware-json-ssot.md); guscio Folio: [wiki/concepts/folio-page-shell-pattern.md](./wiki/concepts/folio-page-shell-pattern.md); homepage: [architecture/homepage-structure.md](./architecture/homepage-structure.md); blocchi: [blocks/README.md](./blocks/README.md); front office: [frontoffice/architecture.md](./frontoffice/architecture.md). Story: [stories/](./stories/); PHPStan: [stories/phpstan-cms-zero.story.md](./stories/phpstan-cms-zero.story.md).

## Dipendenze / Moduli Correlati

- [Xot - Framework Base](../../Xot/docs/README.md) — Always dependency
- [UI - Components](../../UI/docs/README.md) — For UI components library
- [Lang - Translations](../../Lang/docs/README.md) — For i18n support
- [Media - File Management](../../Media/docs/README.md) — For image/file handling

## Documenti Correlati

- [PHPStan Configuration](../../../phpstan.neon)

## Regole Critiche

1. **Always extend Xot base classes** — Never extend Laravel/Filament directly
2. **Use namespace `Modules\Cms`** — Never `app\Cms`
3. **Strict typing** — `declare(strict_types=1);` in all files
4. **Relative links only** — All doc links must be relative paths
5. **No placeholder text** — Remove PROJECT_NAME, [CHANGE_ME], etc
6. **JSON validation** — Validate block data structure before storage
7. **No merge conflict markers** — Ensure clean commits

## Standard Rules & Workflow

- [[BMAD Method](../../../../docs/wiki/concepts/bmad-method.md)]
- [[Context Engineering](../../../../docs/wiki/concepts/context-engineering.md)]
- [[LLM Wiki Governance](../../../../docs/wiki/concepts/llm-wiki-governance.md)]

---

**Ultima verifica**: 2026-10-14 (Laravel 13.35.0, PHP 8.4.26). Livello PHPStan e copertura non rimisurati in questa verifica.

**Sostenibilità (discovery):** [project-sustainability-content.md](./project-sustainability-content.md) — outline `/sostieni` e footer partner. Il dossier locale del modulo è la fonte mantenuta; eventuali riferimenti a `bmad-output/` sono storici.

<<<<<<< .merge_file_OKkQWv
**Note**: Documentation previously had duplications and merge conflicts. This version consolidates to single source of truth.
=======
- [On-Demand Pattern](./ON-DEMAND-PATTERN.md) — Pattern per caricamento efficiente
- [QMD Setup](./QMD-SETUP.md) — Configurazione ricerca locale
- [Performance](./PERFORMANCE-OPTIMIZATION.md) — Metriche e best practice
- [Project Structure](./PROJECT-STRUCTURE.md) — Directory layout
=======
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_jkRFJC
