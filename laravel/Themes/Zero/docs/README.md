# Theme Documentation

<<<<<<< .merge_file_QftsjZ
[![Module](https://img.shields.io/badge/Module-Theme Documentation-8B0000.svg)]()
[![Laravel 12](https://img.shields.io/badge/Laravel-12-red.svg)](https://laravel.com/)
[![Filament 5](https://img.shields.io/badge/Filament-5-ffab00.svg)](https://filamentphp.com/)
[![PHP 8.4+](https://img.shields.io/badge/PHP-8.4+-777BB4.svg)](https://php.net/)
[![PHPStan Level 10](https://img.shields.io/badge/PHPStan-Level%2010-brightgreen.svg)](https://phpstan.org/)
[![PSR-12](https://img.shields.io/badge/Code-PSR--12-blue.svg)](https://www.php-fig.org/psr/psr-12/)
[![Architecture-Modular](https://img.shields.io/badge/Architecture-Modular-purple.svg)]()
[![FixCity Platform](https://img.shields.io/badge/Platform-FixCity-008758.svg)]()

> **Core module for the FixCity Platform.**

## Perché esiste

Core module for the FixCity Platform.

## Superpoteri

- Modular component with XotBase patterns
- Professional-grade implementation
- Integrated with FixCity Platform

## Documentazione

| Lingua | Link |
|--------|------|
| 🇮🇹 Presentazione | Questo file (`README.md`) |
| 🇬🇧 Business card | [docs/readme-en.md](./docs/readme-en.md) |
| 📚 Wiki tecnica | [./docs/wiki/](./docs/) |

---

**Modulo** `Zero` · **Laraxot** · **FixCity Platform** · PHPStan 10 · Filament 5
=======
This directory contains documentation for the theme.

## Structure

- **customization.md** - Theme customization
- **README.md** - This file

## Guidelines

Documentation should be:
- Clear and concise
- Updated with theme changes
- Use Markdown format (.md)
# Tema Zero - Documentazione


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
├── app/
│   ├── Http/
│   ├── View/
│   └── ...
├── config/
├── docs/
├── lang/
├── resources/
│   ├── views/
│   └── svg/
└── routes/
```

## Configurazione

### Regole Fondamentali

1. **PHPStan**: Configurazione centralizzata in `laravel/phpstan.neon`
2. **Output files**: `phpstan*.json` ignorati (NON committare)
3. **Namespace**: `Themes\Zero\`

## Repo indipendente

Path in `gitmodules.ini`: `laravel/Themes/Zero` → remote `laraxot/theme_zero_fila5`. Entrare con `cd`, non trattarlo come submodule della root. Protocollo: [17-gitmodules-path-iteration.md](../../../../bashscripts/tools/prompts/17-gitmodules-path-iteration.md).

## Collegamenti

- [PHPStan Docs](./phpstan.md)
- [Configurazione Root](../../../docs/THEME_ZERO.md)
- [Metodologia GSD](../../../../docs/project/gsd-methodology.md)
- [GSD templates locali](../../../../.gsd/README.md)

## Backlinks

- [Xot Module](../../Modules/Xot/docs/)
- [UI Module](../../Modules/UI/docs/)

## AI Workflows
- [AI Methodologies](./ai-methodologies.md)
>>>>>>> .merge_file_tSG2yl
