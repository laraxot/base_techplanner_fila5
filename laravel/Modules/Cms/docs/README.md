<<<<<<< HEAD
# Module Documentation

This directory contains the documentation for the Cms module.

## Purpose

The purpose of this documentation is to provide comprehensive information about the Cms's functionality, architecture, and usage. It aims to:
- Explain key features and their implementation details.
- Guide developers on how to use, extend, and maintain the module.
- Ensure consistency with Laraxot architectural principles and coding standards.

## Structure

- `README.md`: This overview file.
- Other Markdown files will detail specific aspects of the module, such as:
    - `installation.md`
    - `usage.md`
    - `architecture.md`
    - `troubleshooting.md`

## Contribution

Developers are encouraged to contribute to this documentation to keep it accurate and up-to-date.
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
>>>>>>> 4b6b99016 (first commit)
