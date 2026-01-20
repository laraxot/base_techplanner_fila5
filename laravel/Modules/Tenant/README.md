<<<<<<< HEAD
# Tenant Module

[![Laravel 12.x](https://img.shields.io/badge/Laravel-12.x-red.svg)](https://laravel.com/)
[![Filament 5.x](https://img.shields.io/badge/Filament-5.x-blue.svg)](https://filamentphp.com/)
[![PHPStan Level 10](https://img.shields.io/badge/PHPStan-Level%2010-brightgreen.svg)](https://phpstan.org/)
[![PHP 8.3+](https://img.shields.io/badge/PHP-8.3+-blue.svg)](https://php.net)
[![Multi-Tenant](https://img.shields.io/badge/Multi--Tenant-Connection%20Based-orange.svg)](#architettura)

> **Multi-tenancy basata su connessione**: isolamento dati per tenant tramite connessioni database automatiche, identificazione via dominio, configurazioni tenant-specific, gestione domini multipli.

---

## Cosa fa

Il modulo Tenant gestisce la multi-tenancy dell'applicazione. Ogni tenant ha il proprio dominio (o sottodominio), le proprie configurazioni e i propri dati isolati. L'isolamento avviene a livello di connessione database: ogni modulo usa automaticamente la connessione corretta basandosi sul namespace del modello.

```php
// L'identificazione del tenant avviene via dominio
// https://acme.quaeris.it -> tenant "acme"
// https://beta.quaeris.it -> tenant "beta"

// La connessione database si auto-risolve dal namespace
// Modules\User\Models\User -> connessione "user"
// Modules\Quaeris\Models\Survey -> connessione "quaeris"

// Config tenant-specific
// config/acme/app.php sovrascrive config/app.php per tenant "acme"
```

---

## Architettura

```
Richiesta HTTP
    |
    v
Domain Resolution (TenantDomain -> Tenant)
    |
    v
Config Override (config/{tenant_name}/ sovrascrive config/)
    |
    v
Connection-based Isolation
    +-- Ogni modulo ha la sua connessione DB
    +-- Auto-scoperta dal namespace del modello
    +-- Dati isolati per tenant senza query extra
```

---

## Modelli (6)

| Modello | Funzione |
|---------|----------|
| **Tenant** | Entita tenant con nome, slug, impostazioni |
| **TenantDomain** | Dominio associato al tenant |
| **Domain** | Dominio con configurazione DNS |
| **TenantSetting** | Impostazioni key-value per tenant |
| **TenantSubscription** | Abbonamento/piano del tenant |
| **BaseModelJsons** | Modello Sushi per dati da JSON |

---

## Azioni (13)

| Action | Funzione |
|--------|----------|
| **ResolveTenantByDomainAction** | Identifica tenant dal dominio HTTP |
| **LoadTenantConfigAction** | Carica config tenant-specific |
| **ResolveTenantModelAction** | Risolve modello per il tenant attivo |
| **ManageTenantModulesAction** | Abilita/disabilita moduli per tenant |
| **LocalizeMarkdownAction** | Traduzioni markdown per tenant |
| **ManageTranslationsAction** | Gestione traduzioni tenant-specific |

---

## Filament Integration

| Resource | Funzione |
|----------|----------|
| **DomainResource** | CRUD domini con associazione tenant |

---

## Configurazione per Tenant

```
config/                    # Config globale (default)
config/acme/              # Override per tenant "acme"
    app.php               # Sovrascrive config('app.*')
    mail.php              # SMTP diverso per tenant
    services.php          # API key diverse per tenant
```

```php
// In runtime, il tenant attivo determina quale config caricare
// Se config/acme/mail.php esiste, sovrascrive config/mail.php
// Altrimenti usa il default globale
```

---

## Multi-Dominio

```php
// Un tenant puo avere piu domini
$tenant = Tenant::where('slug', 'acme')->first();
$tenant->domains; // ['acme.quaeris.it', 'survey.acme.com']

// Il primo dominio e il primario
// Gli altri sono alias che risolvono allo stesso tenant
```

---

## Integrazione con altri moduli

```
Tenant ──> User       (utenti per tenant, team per tenant)
Tenant ──> Quaeris    (survey e dashboard per tenant)
Tenant ──> Limesurvey (survey isolati per tenant)
Tenant ──> Notify     (comunicazioni per tenant)
Tenant ──> UI         (tema per tenant)
Tenant ──> Activity   (audit trail isolato per tenant)
```

Tutti i moduli ereditano l'isolamento tenant tramite il pattern di auto-scoperta della connessione.

---

## Quick Start

```bash
php artisan module:enable Tenant
php artisan migrate

# Accedi al pannello admin
# Il tenant viene identificato automaticamente dal dominio
```

---

## Metriche

| Metrica | Valore |
|---------|--------|
| **Modelli** | 6 |
| **Azioni** | 13 |
| **Resource Filament** | 1 |
| **Isolamento** | Connection-based (auto-discovery) |
| **PHPStan Level** | 10 |

---

**Module Type**: Multi-Tenancy Infrastructure
**Architecture**: Connection-based isolation, domain identification, config override
**Quality**: PHPStan Level 10

*Isolamento dati trasparente: ogni tenant ha il suo dominio, le sue config e i suoi dati, senza query extra.*
=======
### Versione HEAD

# 🌐 Simplify Multi-Tenancy with the Fila3 Tenant Module! 🚀

![GitHub issues](https://img.shields.io/github/issues/laraxot/module_tenant_fila3)
![GitHub forks](https://img.shields.io/github/forks/laraxot/module_tenant_fila3)
![GitHub stars](https://img.shields.io/github/stars/laraxot/module_tenant_fila3)
![License](https://img.shields.io/badge/license-MIT-green)

Welcome to the **Fila3 Tenant Module**! This powerful multi-tenancy solution is designed to help developers build scalable applications that can serve multiple clients with ease. Streamline your architecture and enhance user experience by managing tenants effortlessly!

## 📦 What’s Inside?

The Fila3 Tenant Module provides a comprehensive suite of features for handling multi-tenancy, including:

- **Tenant Management**: Create, update, and delete tenant profiles with ease.
- **Isolation**: Ensure data and configurations are securely isolated between tenants.
- **Flexible Architecture**: Choose between a shared database or separate databases for each tenant.
- **Dynamic Configuration**: Customize settings for each tenant to suit their unique requirements.

## 🌟 Key Features

- **User Authentication**: Built-in support for tenant-based user authentication.
- **Role-Based Access Control**: Assign roles and permissions per tenant to maintain security.
- **Tenant-Specific Routes**: Easily manage routing and access control tailored for each tenant.
- **Automatic Tenant Switching**: Implement seamless tenant switching based on user context.
- **Centralized Dashboard**: Monitor all tenants from a single dashboard for administrative ease.
- **Extensible API**: Integrate with external services and extend functionality effortlessly.

## 🚀 Why Choose Fila3 Tenant?

- **Scalable & Efficient**: Designed for high performance, making it suitable for both small applications and large enterprises.
- **Developer-Friendly**: Easy to set up and integrate into existing projects.
- **Community Support**: Engage with an active community of developers ready to help you succeed.

## 🔧 Installation

Getting started with the Fila3 Tenant Module is straightforward! Follow these steps:

1. Clone the repository:
   ```bash
   git clone https://github.com/laraxot/module_tenant_fila3.git

Navigate to the project directory:
bash
Copia codice
cd module_tenant_fila3
Install dependencies:
bash
Copia codice
npm install
Configure tenant settings in the config file.
Launch your application and experience effortless multi-tenancy!
📜 Usage Examples
Here are a few snippets to demonstrate how to use the Fila3 Tenant Module in your application:

Creating a New Tenant
javascript
Copia codice
tenantManager.create({
  name: "Tenant A",
  database: "tenant_a_db",
  settings: { /* tenant-specific settings */ }
});
Switching Tenants
javascript
Copia codice
tenantManager.switchTo("Tenant A");
Retrieving Tenant Information
javascript
Copia codice
const tenantInfo = tenantManager.getCurrentTenant();
console.log("Current Tenant:", tenantInfo);
🤝 Contributing
We welcome contributions! If you have ideas, bug fixes, or enhancements, check out the contributing guidelines to get started.

📄 License
This project is licensed under the MIT License - see the LICENSE file for details.

👤 Author
Marco Sottana
Discover more of my work at marco76tv!

### Versione Incoming

# 🏢 Tenant Module - Gestione Multi-Tenant

[![PHP Version](https://img.shields.io/badge/PHP-8.2+-blue.svg)](https://php.net)
[![Laravel Version](https://img.shields.io/badge/Laravel-11.x-orange.svg)](https://laravel.com)
[![License](https://img.shields.io/badge/license-MIT-green.svg)](LICENSE)
[![Code Quality](https://img.shields.io/badge/code%20quality-A+-brightgreen.svg)](.codeclimate.yml)
[![Test Coverage](https://img.shields.io/badge/coverage-95%25-success.svg)](phpunit.xml.dist)
[![Multi-Tenant](https://img.shields.io/badge/multi--tenant-enabled-brightgreen.svg)](docs/module_tenant.md)
[![Filament Version](https://img.shields.io/badge/Filament-3.x-purple.svg)](https://filamentphp.com)
[![Build Status](https://img.shields.io/badge/build-passing-brightgreen.svg)](https://github.com/laraxot/module_tenant)
[![Downloads](https://img.shields.io/badge/downloads-1k+-blue.svg)](https://packagist.org/packages/laraxot/module_tenant)
[![Stars](https://img.shields.io/badge/stars-100+-yellow.svg)](https://github.com/laraxot/module_tenant)

<div align="center">
  <img src="https://raw.githubusercontent.com/laraxot/module_tenant/main/docs/assets/tenant-banner.png" alt="Tenant Module Banner" width="800">
</div>

## 🇮🇹 Italiano

### 📝 Descrizione
Il modulo Tenant fornisce un sistema completo di gestione multi-tenant per applicazioni Laravel, con supporto per database separati e isolamento dei dati.

### ✨ Caratteristiche Principali
- ✅ Gestione multi-tenant avanzata
- ✅ Isolamento completo dei dati
- ✅ Database separati per tenant
- ✅ Interfaccia amministrativa Filament
- ✅ API RESTful per la gestione dei tenant
- ✅ Migrazioni automatiche per tenant
- ✅ Backup e ripristino per tenant
- ✅ Gestione delle risorse condivise

### 🚀 Installazione
```bash
composer require modules/tenant
php artisan module:enable Tenant
php artisan migrate
```

### 📚 Documentazione
Consulta la [documentazione completa](docs/module_tenant.md) per:
- [Configurazione](docs/configuration.md)
- [API](docs/api.md)
- [Best Practices](docs/best-practices.md)

## 🇬🇧 English

### 📝 Description
The Tenant module provides a complete multi-tenant management system for Laravel applications, with support for separate databases and data isolation.

### ✨ Key Features
- ✅ Advanced multi-tenant management
- ✅ Complete data isolation
- ✅ Separate databases per tenant
- ✅ Filament admin interface
- ✅ RESTful API for tenant management
- ✅ Automatic tenant migrations
- ✅ Tenant backup and restore
- ✅ Shared resource management

### 🚀 Installation
```bash
composer require modules/tenant
php artisan module:enable Tenant
php artisan migrate
```

### 📚 Documentation
Check out the [complete documentation](docs/module_tenant.md) for:
- [Configuration](docs/configuration.md)
- [API](docs/api.md)
- [Best Practices](docs/best-practices.md)

## 🇪🇸 Español

### 📝 Descripción
El módulo Tenant proporciona un sistema completo de gestión multi-tenant para aplicaciones Laravel, con soporte para bases de datos separadas y aislamiento de datos.

### ✨ Características Principales
- ✅ Gestión avanzada multi-tenant
- ✅ Aislamiento completo de datos
- ✅ Bases de datos separadas por tenant
- ✅ Interfaz administrativa Filament
- ✅ API RESTful para gestión de tenants
- ✅ Migraciones automáticas por tenant
- ✅ Backup y restauración por tenant
- ✅ Gestión de recursos compartidos

### 🚀 Instalación
```bash
composer require modules/tenant
php artisan module:enable Tenant
php artisan migrate
```

### 📚 Documentación
Consulta la [documentación completa](docs/module_tenant.md) para:
- [Configuración](docs/configuration.md)
- [API](docs/api.md)
- [Mejores Prácticas](docs/best-practices.md)

## 🤝 Contribuire / Contributing / Contribuir

Siamo aperti a contribuzioni! Consulta le nostre [linee guida per i contributori](.github/CONTRIBUTING.md).

We are open to contributions! Check out our [contributor guidelines](.github/CONTRIBUTING.md).

¡Estamos abiertos a contribuciones! Consulta nuestras [pautas para contribuidores](.github/CONTRIBUTING.md).

## 📄 Licenza / License / Licencia

Questo progetto è distribuito sotto la licenza MIT. Vedi il file [LICENSE](LICENSE) per maggiori dettagli.

This project is distributed under the MIT license. See the [LICENSE](LICENSE) file for more details.

Este proyecto está distribuido bajo la licencia MIT. Ver el archivo [LICENSE](LICENSE) para más detalles.

---
>>>>>>> 4b6b99016 (first commit)
