---
title: "Topic theme-documentation"
type: digest
status: active
qmd: "digest ceiling 100 theme-documentation"
---

# Topic theme-documentation

Sintesi automatica di 3 documenti (chiave `theme-documentation`).

## Zero Theme Documentation

_Fonte: `bmad/theme-documentation.md`_

# Zero Theme Documentation

> Nota di verifica 2026-10-28 (docs-temi): guida generica, non descrive solo il codice presente. In Zero non esistono `components/ui/card.blade.php`, `<x-zero.navigation>` (il componente reale e' `<x-navigation>`), `resources/js/components/navigation.js`, la cartella `tests/` ne' vitest. Per i componenti reali vedi [components.md](./components.md) e [layouts.md](./layouts.md).

## Overview

The Zero theme is the foundational theme for the Laraxot ecosystem, providing a clean, minimal starting point for custom theme development.

## Purpose

This theme serves as:
- **Base Template**: Minimal structure for custom themes
- **Development Reference**: Implementation patterns for theme development
- **Production Ready**: Lightweight theme for simple applications

## Theme Structure

```
Themes/Zero/
├── resources/
│   ├── views/
│   │   ├── components/     # Reusable blade components
│   │   ├── layouts/        # Page layout templates
│   │   └── pages/          # Specific page templates
│   ├── css/               # Stylesheet files
│   ├── js/                # JavaScript files
│   └── assets/            # Static assets (images, fonts)
├── docs/                  # Theme documentation
└── theme.json            # Theme configuration

## Theme Documentation Standard

_Fonte: `theme-documentation-standard.md`_

# Theme Documentation Standard

Standard per la documentazione dei temi nell'architettura Laraxot.

## Struttura Documentazione Tema

Ogni tema deve seguire questa struttura di documentazione:

```
Themes/{ThemeName}/docs/
├── README.md                    # Panoramica e quick start
├── architecture.md             # Architettura tecnica
├── components.md               # Documentazione componenti
├── customization.md            # Personalizzazione e configurazione
├── integration.md              # Integrazione con moduli
├── performance.md              # Ottimizzazioni performance
└── best-practices.md           # Best practices sviluppo
```

## Documenti Richiesti

### 1. README.md

Ogni tema deve avere un README.md completo che includa:

- **Panoramica**: Descrizione del tema e caratteristiche principali
- **Installazione**: Istruzioni per l'installazione e configurazione
- **Utilizzo**: Esempi base di utilizzo
- **Personalizzazione**: Guida per personalizzare il tema
- **Integrazione**: Come integrare il tema con i moduli

## Zero Theme Documentation

_Fonte: `theme-documentation.md`_

# Zero Theme Documentation

## Overview

The Zero theme is the foundational theme for the Laraxot ecosystem, providing a clean, minimal starting point for custom theme development.

## Purpose

This theme serves as:
- **Base Template**: Minimal structure for custom themes
- **Development Reference**: Implementation patterns for theme development
- **Production Ready**: Lightweight theme for simple applications

## Theme Structure

```
Themes/Zero/
├── resources/
│   ├── views/
│   │   ├── components/     # Reusable blade components
│   │   ├── layouts/        # Page layout templates
│   │   └── pages/          # Specific page templates
│   ├── css/               # Stylesheet files
│   ├── js/                # JavaScript files
│   └── assets/            # Static assets (images, fonts)
├── docs/                  # Theme documentation
└── theme.json            # Theme configuration
```

## Configuration
