<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> dev
# Cms Module Documentation

## Overview

<<<<<<< HEAD
The Cms module handles content management, page rendering, and multi-language support through a flexible block-based system.

## Key Components

### Page Model
- **Location**: `app/Models/Page.php`
- **Purpose**: Manages page content with multi-language JSON fields
- **Fields**: `title`, `content_blocks`, `sidebar_blocks`, `footer_blocks`

### Page Component
- **Location**: `app/View/Components/Page.php`
- **Purpose**: Renders pages using block-based architecture
- **Features**: Multi-language support, block processing, component resolution

### BlockData System
- **Location**: `app/Datas/BlockData.php`
- **Purpose**: Manages individual block data and view resolution
- **Features**: Type safety, view existence validation, data merging

## Multi-Language Support

### Language Detection Logic
```php
// In Page component
$current_lang = app()->getLocale();
if (in_array($current_lang, $locales)) {
    $blocks = $blocks[$current_lang];
} elseif (in_array('it', $locales)) {
    $blocks = $blocks['it']; // Fallback to Italian
}
```

### Content Structure
```json
{
  "title": {
    "it": "Titolo Italiano",
    "en": "English Title"
  },
  "content_blocks": {
    "it": [...],
    "en": [...]
  }
}
```

## Block System Architecture

### Block Types
- **Hero**: Page header sections
- **Services**: Service listings and grids
- **Content**: General content sections
- **Forms**: Contact and interaction forms
- **Testimonials**: Customer reviews
- **Resources**: Downloads and guides

### Component Resolution
Blocks use view paths like:
- `pub_theme::components.blocks.hero.simple`
- `pub_theme::components.blocks.services.grid`
- `pub_theme::components.blocks.newsletter.simple`

## Important Notes

### Critical Issues Identified ([DATE])
1. **Missing Component**: `hero.fullscreen.blade.php` referenced but non-existent
2. **Content Disparity**: Italian version has 9 blocks vs English 3 blocks
3. **Component Duplication**: 32+ hero variants across themes

### Recommendations
1. **Audit Component References**: Ensure all referenced views exist
2. **Standardize Content**: Maintain parity between language versions
3. **Consolidate Components**: Reduce redundant hero component variants

## File Structure

```
Modules/Cms/
├── app/
│   ├── Models/Page.php
│   ├── View/Components/
│   │   ├── Page.php
│   │   └── PageContent.php
│   └── Datas/BlockData.php
├── resources/views/
│   └── components/
│       ├── page.blade.php
│       └── page-content.blade.php
└── docs/
    ├── 00-index.md (this file)
    ├── page-translation-strategy.md
    ├── block-component-guidelines.md
    └── multi-language-content-management.md
```

## Filament

- **Compatibilità 5.x**: [filament-5x-compatibility.md](filament-5x-compatibility.md) — progetto su Filament 5.x; pattern e riferimenti per il modulo Cms.

## Dependencies

- **Xot Module**: Base functionality and data structures
- **Lang Module**: Multi-language support (if available)
- **Themes**: Component rendering (active: "Two")

## Best Practices

1. **Always verify component existence** before referencing in page data
2. **Maintain content parity** across all supported languages
3. **Use consistent data structures** for similar block types
4. **Test multi-language functionality** thoroughly
5. **Document custom block types** and their required data structure

## Testing

- Use Pest testing framework
- Test multi-language scenarios
- Verify component rendering
- Test data validation and fallbacks

## Recent Changes

### [DATE]
- Identified critical missing component issue
- Documented content disparity between languages
- Created comprehensive duplicate content analysis
=======
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
>>>>>>> 4b6b99016 (first commit)
=======
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
>>>>>>> dev
