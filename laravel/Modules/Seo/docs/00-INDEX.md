<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> c101b34 (.)
=======
>>>>>>> d0f51b6 (.)
# 📚 Indice Documentazione Modulo Seo

**Status**: 🟡 In Progress
**Module Version**: 1.0.0

## Audit over-engineering

| Documento | Scopo |
|-----------|--------|
| [ponytail-audit-over-engineering.md](./ponytail-audit-over-engineering.md) | Findings Ponytail Seo (`node_modules`, interface) |
| [Hub repo](../../../../docs/audit/ponytail-audit.md) | Audit repo-wide |

## 🎯 Lettura Essenziale
1. [README.md](./readme.md) - Panoramica del modulo SEO.
2. [roadmap.md](./roadmap.md) - Evoluzione 2026: AI Content Optimization & Schema.org.

## 🏗️ Core Features
- 🏷️ **Meta Tag Management** - Tag dinamici, canonical URLs, meta descriptions.
- 🗺️ **Sitemap Generation** - XML sitemap con multi-sitemap e ping automatico.
- 📱 **OpenGraph & Social** - Tags OpenGraph, Twitter Cards, social previews.
- 📊 **Schema.org Markup** - JSON-LD strutturato (Event, LocalBusiness, Article, Product).
- 📈 **SEO Analytics** - Score calculation, keyword analysis, recommendations.

## 🔗 Integration Cross-Module
- **[Schema.org Event Tasks](./task-schema-org-eventi.md)** - Task per implementazione Schema.org per eventi.
- **[Meetup: Event Series Actions](../../meetup/docs/tasks-schema-org-event-series-actions.md)** - Schema.org EventSeries.
- **[Geo: Place & GeoCircle](../../geo/docs/tasks-schema-org-place-geocircle.md)** - Schema.org Place.

## 🧪 Qualità e Testing
- ⚠️ Test suite da implementare (Pest)
- ⚠️ PHPStan Level 10 da completare

## 📦 Pacchetti Composer
- [Riferimento](../../../../docs/composer-packages-reference.md) | [Inventario 312 pacchetti](../../../../docs/architecture/composer-packages-full-inventory.md) - Nessuna dipendenza diretta; usa Xot

## 🔗 Moduli Correlati
- [Xot](../../xot/docs/readme.md) - Core framework e base classes.
- [Meetup](../../meetup/docs/readme.md) - Schema.org Event integration.
- [Geo](../../geo/docs/readme.md) - Schema.org Place integration.

---
*Documentazione conforme agli standard Laraxot - DRY + KISS + SOLID*

## Dependency Intelligence

- [Dependency intelligence](dependency-intelligence.md)
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> d20252d (.)
=======
>>>>>>> fc52fe0 (.)
# 📚 Seo Module - Documentation Index

**Path**: `laravel/Modules/Seo/docs/`  
**Modulo**: @Modules/Seo

## 🎯 Scopo

Enterprise-grade Search Engine Optimization: meta tag management, sitemap generation, structured data (JSON-LD), OpenGraph/social sharing, analytics integration.

## 📦 Struttura

```
docs/
├── 00-INDEX.md          # Questo indice
├── README.md            # Panoramica modulo
├── 00-index.md          # Indice precedente (legacy)
└── [categoria]/         # Sottocartelle tematiche
```

## 📄 Documenti

### Product
| File | Scopo |
|------|-------|
| README.md | Panoramica modulo |
| roadmap.md | Development roadmap |

### Core Features
| File | Scopo |
|------|-------|
| meta-tag-management.md | Gestione meta tag |
| sitemap-generation.md | Generazione sitemap XML |
| structured-data.md | Schema.org JSON-LD |
| social-sharing.md | OpenGraph e condivisione social |

### Integration
| File | Scopo |
|------|-------|
| analytics-integration.md | Integrazione analytics |
| performance-tracking.md | Tracking performance SEO |

## 🔗 Riferimenti

- [Xot Module](../Xot/docs/00-INDEX.md) - Base classes
- [AGENTS.md](../../../../AGENTS.md) - Project guidelines

## 🚀 Quick Start

```bash
php artisan module:enable Seo
php artisan seo:generate-sitemap
```

---

**Ultimo Aggiornamento**: 2026-03-24
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 7ec200b (.)
=======
>>>>>>> d20252d (.)
=======
# Documentation Index
>>>>>>> 77e0353 (.)
=======
>>>>>>> fc52fe0 (.)
=======
>>>>>>> c101b34 (.)
=======
>>>>>>> d0f51b6 (.)
