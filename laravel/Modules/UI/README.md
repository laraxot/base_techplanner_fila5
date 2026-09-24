---
id: module-ui-readme
title: "UI — Componenti Visuali Condivisi"
type: module-readme
category: module-documentation
module: UI
status: active
tags: [ui, blade, livewire, filament, accessibility]
created: 2026-09-14
updated: 2026-09-14
qmd: "ui blade livewire filament components accessibility module documentation"
issues:
  - "https://github.com/laraxot/module_ui_fila5/issues/33"
discussions:
  - "https://github.com/laraxot/module_ui_fila5/discussions/34"
related:
  - "./docs/"
sources: []
---

# 🎨 UI

<<<<<<< HEAD
> **Componenti visuali condivisi.**

=======
<<<<<<< HEAD
> **Componenti visuali condivisi.**
=======
>>>>>>> laraxot/dev
[![Domain-UI](https://img.shields.io/badge/Domain-UI%20Kit-7B1FA2.svg)](#)
[![Laravel 12](https://img.shields.io/badge/Laravel-12-red.svg)](https://laravel.com/)
[![Filament 5](https://img.shields.io/badge/Filament-5-ffab00.svg)](https://filamentphp.com/)
[![PHP 8.4+](https://img.shields.io/badge/PHP-8.4+-777BB4.svg)](https://php.net/)
[![PHPStan Level 10](https://img.shields.io/badge/PHPStan-Level%2010-brightgreen.svg)](https://phpstan.org/)
[![PSR-12](https://img.shields.io/badge/Code-PSR--12-blue.svg)](https://www.php-fig.org/psr/psr-12/)
[![Strict Types](https://img.shields.io/badge/PHP-strict__types-1-informational.svg)](#)
[![Laraxot Modules](https://img.shields.io/badge/Architecture-Modular-purple.svg)](#)
<<<<<<< HEAD
=======
<<<<<<< HEAD
[![FixCity Platform](https://img.shields.io/badge/Platform-FixCity-008758.svg)](#)
=======
<<<<<<< HEAD
<<<<<<< HEAD
=======
[![<nome progetto> Platform](https://img.shields.io/badge/Platform-<nome progetto>-008758.svg)](#)
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
[![Current Platform](https://img.shields.io/badge/Platform-progetto corrente-008758.svg)](#)
=======
[![<nome progetto> Platform](https://img.shields.io/badge/Platform-<nome progetto>-008758.svg)](#)
>>>>>>> f6fcbb6f (Fix merge conflict in .gitattributes by removing redundant lines and ensuring proper exclusion of image formats from text processing.)
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
>>>>>>> 92912795 (.)
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev

Vocabolario riusabile Blade, Livewire e Filament senza logica di dominio.

## Cosa offre

- **Blade/Livewire** – componenti riusabili
- **Filament XotBase** – base per admin
- **Accessibilità** – a11y conforme
- **Tailwind/DaisyUI** – design system

## Confini architetturali

This module publishes contracts usable by other modules. Logic lives in `Actions`; admin UI follows Laraxot/XotBase.

## Integrazione rapida

```bash
cd laravel
php artisan module:list
./vendor/bin/phpstan analyse Modules/UI
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

<<<<<<< HEAD
**Modulo** `ui` · **Laraxot ecosystem** · **Project-agnostic** · PHPStan 10 · Filament 5
=======
<<<<<<< HEAD
**Modulo** `ui` · **Laraxot ecosystem** · **Project-agnostic**
=======
<<<<<<< HEAD
**Modulo** `ui` · **Laraxot** · **FixCity Platform** · PHPStan 10 · Filament 5
=======
<<<<<<< HEAD
<<<<<<< HEAD
=======
**Modulo** `ui` · **Laraxot** · **<nome progetto> Platform** · PHPStan 10 · Filament 5
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
**Modulo** `ui` · **Laraxot** · **Current Platform** · PHPStan 10 · Filament 5
=======
**Modulo** `ui` · **Laraxot** · **<nome progetto> Platform** · PHPStan 10 · Filament 5
>>>>>>> f6fcbb6f (Fix merge conflict in .gitattributes by removing redundant lines and ensuring proper exclusion of image formats from text processing.)
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
>>>>>>> 92912795 (.)
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
