---
id: module-seo-readme
title: "SEO — Metadati, Sitemap e Dati Strutturati"
type: module-readme
category: module-documentation
module: Seo
status: active
tags: [seo, metadata, sitemap, opengraph, schema]
created: 2026-09-14
updated: 2026-09-14
qmd: "seo metadata sitemap opengraph schema structured data module documentation"
issues:
  - "https://github.com/laraxot/module_seo_fila5/issues/13"
discussions:
  - "https://github.com/laraxot/module_seo_fila5/discussions/14"
related:
  - "./docs/"
sources: []
---

# 🔍 SEO

> **Metadati, sitemap e dati strutturati.**

Pagine pubbliche trovabili, condivisibili e semanticamente leggibili.

## Cosa offre

- **Meta/canonical** – ottimizzazione SEO
- **Open Graph** – social sharing
- **Sitemap/robots** – crawling efficiency
- **Schema.org/CMS** – structured data

## Confini architetturali

This module publishes contracts usable by other modules. Logic lives in `Actions`; admin UI follows Laraxot/XotBase.

## Integrazione rapida

```bash
cd laravel
php artisan module:list
./vendor/bin/phpstan analyse Modules/Seo
```

See local docs for integration patterns.

## Documentazione

The technical map is in [docs/README.md](./docs/README.md).

- [Story BMAD del modulo](./docs/stories/)
- [Regole del progetto](../../../docs/wiki/)
- [README del progetto](../../README.md)

## Qualità e manutenzione

Maintain `declare(strict_types=1);` in PHP, adhere to project PHPStan config, and update docs when contracts evolve.

---

**Modulo** `seo` · **Laraxot ecosystem** · **Project-agnostic**
