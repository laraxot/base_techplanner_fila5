# 🔍 Seo

[![Domain-SEO](https://img.shields.io/badge/Domain-SEO-827717.svg)](#)
[![Laravel 12](https://img.shields.io/badge/Laravel-12-red.svg)](https://laravel.com/)
[![Filament 5](https://img.shields.io/badge/Filament-5-ffab00.svg)](https://filamentphp.com/)
[![PHP 8.4+](https://img.shields.io/badge/PHP-8.4+-777BB4.svg)](https://php.net/)
[![PHPStan Level 10](https://img.shields.io/badge/PHPStan-Level%2010-brightgreen.svg)](https://phpstan.org/)
[![PSR-12](https://img.shields.io/badge/Code-PSR--12-blue.svg)](https://www.php-fig.org/psr/psr-12/)
[![Strict Types](https://img.shields.io/badge/PHP-strict__types-1-informational.svg)](#)
[![Laraxot Modules](https://img.shields.io/badge/Architecture-Modular-purple.svg)](#)
[![FixCity Platform](https://img.shields.io/badge/Platform-FixCity-008758.svg)](#)

> **Trovabile su Google, accessibile a tutti.** Meta, sitemap, structured data — visibilità istituzionale.

---

## Perché esiste

I servizi comunali devono essere discoverable.

## Superpoteri

- Meta tag e Open Graph
- Sitemap e robots
- Integrazione Folio/CMS
- Filament configurazione

## Certificazioni

| Certificazione | Stato |
|----------------|-------|
| PHPStan livello 10 | Target progetto |
| `declare(strict_types=1)` | Su nuovo codice PHP |
| Filament 5 + XotBase | Admin enterprise |
| Test PHPUnit / Pest | Suite modulo |
| Documentazione wiki | Cartella `docs/` |

## Vuoi entrare nel team?

Se non si trova, **non esiste** — SEO matters.

Stack frontoffice: **Tailwind · Alpine · Lit · DaisyUI · Flowbite · Filament v5** — vedi [STORY-133](../../../docs/stories/STORY-133-frontend-stack-religion-tailwind-alpine-lit.md).

---

## Documentazione

| Lingua | Link |
|--------|------|
| 🇮🇹 Presentazione | Questo file (`README.md`) |
| 🇬🇧 Business card | [docs/readme-en.md](./docs/readme-en.md) |
| 📚 Wiki tecnica | [./docs/wiki/](./docs/) |

---

**Modulo** `seo` · **Laraxot** · **FixCity Platform** · PHPStan 10 · Filament 5
---
title: Seo
module: seo
related: Xot
status: production
---

# Seo Module

**Module**: `seo`
**Namespace**: `Modules\Seo\`
**Status**: ✅ Production

---

## Overview

TODO: Add overview for Seo module

### Key Features

- Feature 1
- Feature 2
- Feature 3

### Module Dependencies

- [Xot](../Xot/README.md) (required)

---

## Quick Start

### Installation

```bash
# Already included in main project
# No additional setup required
```

### Basic Usage

```php
use Modules\Seo\Models\YourModel;

$item = YourModel::first();
```

### Configuration

Configuration file: `config/seo.php`

Key settings:
- `setting1` - Description
- `setting2` - Description

---

## Architecture

### Directory Structure

```
Seo/
├── src/
│   ├── Models/
│   ├── Controllers/
│   ├── Resources/
│   ├── Actions/
│   └── Traits/
├── routes/
│   ├── api.php
│   └── web.php
├── database/
│   ├── migrations/
│   └── seeders/
├── tests/
│   ├── Unit/
│   └── Feature/
├── config/
│   └── seo.php
├── docs/
│   └── README.md
└── composer.json
```

### Key Components



---

## API Reference

Reference

---

## Usage Examples

### Common Tasks

#### Task 1: Description

```php
// Code example
```

---

## Testing

### Running Tests

```bash
# Run all module tests
composer test -- Modules/Seo
```

---

## Troubleshooting

### Common Issues

#### Issue: Problem description

**Solution**: How to fix this issue

---

## Related Modules

### Dependencies

- [Xot](../Xot/README.md) - Required module

### Dependents

- [Blog](../Blog/README.md) - Depends on this module

---

Navigation: [Project Home](../../docs/INDEX.md) | [Modules](../../docs/modules/README.md)
# SEO Module

The SEO module provides enterprise-grade Search Engine Optimization capabilities including meta management, sitemap generation, structured data, analytics integration, and social sharing for Laraxot applications.

## 🎯 Core Features
- 🏷️ **Meta Tag Management**: Dynamic tag generation for titles, descriptions, and keywords.
- 🗺️ **Sitemap Generation**: Automated XML sitemap creation with index support.
- 📱 **OpenGraph & Social**: Standardized social media sharing infrastructure and preview tags.
- 📊 **Schema.org Markup**: JSON-LD structured data integration.
- 📉 **SEO Analytics**: Score calculation and performance tracking.

## 🏗️ Architecture
The module follows the Laraxot modular architecture:
- **Actions**: Domain logic encapsulated in Spatie Queueable Actions.
- **Widgets**: Reusable Filament components for backoffice integration.
- **Models**: Robust Eloquent models for SEO metadata.

## 🚀 Getting Started
Refer to the `docs/` folder for detailed documentation:
- [00-index.md](./docs/00-index.md) - Documentation Index
- [roadmap.md](./docs/roadmap.md) - Development Roadmap
- [social-sharing-component.md](./docs/social-sharing-component.md) - Social Sharing Guide

## 🛠️ Requirements
- PHP 8.3+
- Laravel 11.x/12
- Filament 4.x

---
*Developed by Google DeepMind team - Laraxot methodology*
