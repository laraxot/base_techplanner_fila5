---
title: "Topic 00-index"
type: digest
status: active
qmd: "digest ceiling 100 00-index"
---

# Topic 00-index

Sintesi automatica di 3 documenti (chiave `00-index`).

## Zero Theme Documentation Index

_Fonte: `00-INDEX.md`_

# Zero Theme Documentation Index

**Path**: `laravel/Themes/Zero/docs/`  
**Last updated**: 2026-06-30

## Theme Overview

Zero is a minimal theme variant providing core layout and styling structures without heavy customization.

## Documentation Structure

Zero theme documentation follows the standard theme structure with focus on:
- Minimal, semantic HTML
- Essential CSS for layout
- Cross-browser compatibility
- Progressive enhancement principles

## Key References

- [Theme Hub](../Barthelemy/docs/00-index.md) - Overview of all themes
- [Sixteen Theme](../Sixteen/docs/00-index.md) - Primary theme (Design Comuni)
- [TwentyOne Theme](../TwentyOne/docs/00-index.md) - Prediction market theme
- [Directory Structure Rules](../Barthelemy/docs/directory-structure-rules.md) - Theme organization

## Related Modules

- [UI Module](../../Modules/UI/docs/00-index.md) - Shared UI components
- [Xot Module](../../Modules/Xot/docs/00-index.md) - Core utilities

## Zero Theme - Documentation Index

_Fonte: `00-index.md`_

# Zero Theme - Documentation Index

**Last Update**: 13 Dicembre 2025  
**Status**: ✅ Available  
**Theme Version**: 1.0

## 📚 Quick Navigation

### 🎯 Essential Reading
1. [README.md](./README.md) - Theme overview
2. [model-docs-governance.md](./model-docs-governance.md) - Naming and docs hygiene rules

### ⚠️ Anti-Patterns da Evitare
- **[QuestionChartAnswersTripleChartWidget](../../Modules/docs/anti-pattern-question-chart-answers-triple-widget.md)** — Perché i widget "multi-chart" vanno evitati (vedi [filament-chart-integration.md](./filament-chart-integration.md) sezione Anti-Patterns).

### 🎨 Theme Characteristics
- **Style**: Ultra-minimalist
- **Target**: Lightweight applications
- **Framework**: Minimal CSS
- **Components**: Essential only

### 📊 Module Statistics

- **Total Docs**: 15 files
- **Status**: Available
- **Compliance**: Laraxot standards

### 🔗 Related Resources

- [Cms Module](../../Modules/Cms/docs/README.md)

## Zero Theme — indice BMAD

_Fonte: `bmad/00-index.md`_

# Zero Theme — indice BMAD

**Aggiornato**: 2026-10-20  
**Ingresso docs del tema**: [../README.md](../README.md)  
**Nome file**: `00-index.md` (lowercase). Non creare `00-INDEX.md`: collisione su FS case-insensitive e regola nomi minuscoli (eccezione solo `README.md`).

## Perche' / confini (leggere prima)

1. [scopo.md](./scopo.md) — perche' Zero esiste in questo repo (IT, misurato)
2. [purpose.md](./purpose.md) — bridge EN verso `scopo.md`
3. [../wiki/concepts/theme-zero-operating-focus.md](../wiki/concepts/theme-zero-operating-focus.md) — focus agenti
4. [../concepts/xotbase-never-extend-filament.md](../concepts/xotbase-never-extend-filament.md) — confini Filament/Xot

## Navigazione rapida

### Essenziali
1. [theme-overview.md](./theme-overview.md) — panoramica lunga
2. [architecture.md](./architecture.md) — pattern "vestito"
3. [layouts.md](./layouts.md) / [components.md](./components.md) / [customization.md](./customization.md)
4. [model-docs-governance.md](./model-docs-governance.md) — igiene nomi/docs

### Sviluppo
- [filament-chart-integration.md](./filament-chart-integration.md)
- [phpstan.md](./phpstan.md) — gate agenti su **Modules** (vietato analyse solo-tema; policy [phpstan-neon-user-only](../../../../../docs/wiki/rules/phpstan-neon-user-only.md))
- [dry-kiss-best-practices.md](./dry-kiss-best-practices.md)
- Il tema non ha PHP di dominio in `app/`: il gate Modules non lo copre.
- **Boy scout post-zero:** dopo Modules a zero continua solo igiene docs/viste/as
