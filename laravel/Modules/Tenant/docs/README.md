<<<<<<< HEAD
<<<<<<< HEAD
# 🏢 **Tenant Module** - Multi-Tenancy & Isolamento Dati

[![Laravel 12.x](https://img.shields.io/badge/Laravel-12.x-red.svg)](https://laravel.com/)
[![PHPStan level 10](https://img.shields.io/badge/PHPStan-Level%2010-brightgreen.svg)](https://phpstan.org/)
[![Multi-Tenancy](https://img.shields.io/badge/Multi--Tenancy-Domain%20%7C%20Connection-blue.svg)](https://tenancyforlaravel.com/)

> **🚀 Modulo Tenant**: L'architrave del multi-tenancy nell'ecosistema Laraxot. Garantisce la "Sovranità Digitale" ad ogni organizzazione tramite un isolamento strutturale basato su connessioni database e domini dedicati.

## 📋 **Panoramica**

Il modulo **Tenant** permette di gestire multiple istanze applicative (Tenant) su un unico codebase, assicurando che i dati rimangano rigorosamente separati e sicuri.

- 🛡️ **Isolation by Connection**: Ogni query utilizza automaticamente la connessione `tenant`, eliminando il rischio di data leakage.
- 🌐 **Domain-Based Identification**: I tenant vengono identificati automaticamente tramite il dominio (es. `acme.ptvx.it`).
- ⚙️ **Tenant-Specific Config**: Supporto per override delle configurazioni Laravel per singolo tenant via `config/{tenant_name}/`.
- 🍣 **Sushi Models**: Uso di modelli in-memory per configurazioni statiche e domini, garantendo performance e controllo versione.

## ⚡ **Funzionalità Core**

### 🧩 **Tenant & Domain Management**
Gestione completa delle organizzazioni e dei relativi domini tramite Filament UI. Supporto per domini multipli puntanti allo stesso tenant.

### 🧘 **Philosophical Isolation**
Seguiamo il principio dell'invisibilità: se lo sviluppatore deve pensare al tenant mentre scrive logica business, l'architettura ha fallito. L'isolamento è gestito a livello di `BaseModel`.

## 🚀 **Quick Start**

### 📦 **Abilitazione Connessione**
Assicurarsi che i modelli business estendano la logica corretta per l'isolamento:
```php
class MyModel extends BaseModel {
    protected $connection = 'tenant';
}
```

### ⚙️ **Identificazione Tenant**
L'identificazione avviene automaticamente via middleware, ma è possibile recuperare il tenant corrente via:
```php
$tenant = app(TenantService::class)->getCurrent();
```

## 📚 **Documentazione Completa**

- 📖 **[Indice Documentazione](./00-index.md)** - Mappa completa di tutti i documenti.
- 🗺️ **[Roadmap](./roadmap.md)** - Visione e obiettivi futuri.
- 🙏 **[Filosofia](./philosophy.md)** - I dogmi della sovranità digitale distribuita.
- 🏗️ **[Business Logic Deep Dive](./business-logic-deep-dive.md)** - Analisi tecnica del funzionamento interno.

---

**🔄 Ultimo aggiornamento**: 31 Gennaio 2026
**📦 Versione**: 1.2.0
**✅ PHPStan level 10**: Compliance verificata (0 errori)

## 🚀 Release su GitHub
Le release sono basate su tag Git e possono includere release notes generate automaticamente.
Workflow locale: `.github/workflows/release.yml`.


## 📄 License & Authors

**Authors:**
- Marco Xot <marco.sottana@gmail.com>

**License:** MIT
=======
# Modulo Tenant - Multi-Tenancy Support

## 📋 Panoramica

Il modulo **Tenant** fornisce supporto completo per **multi-tenancy** nel framework Laraxot, permettendo l'isolamento completo dei dati tra diverse organizzazioni/tenant.

## 🎯 Funzionalità Principali

### 1. Isolamento Dati
- Separazione completa dati tra tenant
- Database scoping automatico
- Context switching tra tenant

### 2. Domain Management
- Gestione domini per tenant
- Routing multi-tenant
- Subdomain support

### 3. Tenant-Aware Policies
- Authorization basata su tenant
- Permission scoping
- Role isolation per tenant

## 🏗️ Architettura

### Modelli Principali
- **Tenant**: Rappresenta un'organizzazione/cliente
- **Domain**: Domini associati ai tenant
- **TenantUser**: Relazione utenti-tenant

### Service Provider
- **TenantServiceProvider**: Registrazione automatica tenant features
- **TenantService**: Logica business per gestione tenant

## 📊 Stato Qualità

- **PHPStan Level**: 10 ✅
- **Errori PHPStan**: 0 ✅ (da 17 → 0, -100%)
- **Type Safety**: Completa ✅
- **Data Correzione**: 5 Novembre 2025

## 🔗 Collegamenti

- [User Module](../../User/docs/README.md) - Integrazione autenticazione
- [Xot Module](../../Xot/docs/README.md) - Framework base
- [Multi-Tenancy Docs](https://tenancyforlaravel.com/)

---

**Ultimo Aggiornamento**: 5 Novembre 2025
**Status**: PHPStan Fixes In Progress
>>>>>>> 4b6b99016 (first commit)
=======
---
title: "Tenant Module Documentation"
type: documentation
tags: [module, documentation]
created: 2026-06-05
updated: 2026-06-05
---

# Modulo Tenant - Multi-Tenancy

## Overview

Il modulo **Tenant** implementa l'architettura multi-tenant per isolamento completo dei dati tra diversi tenant/organizzazioni.

## Architettura Multi-Tenant

### Approccio: Database-per-Tenant

Ogni tenant ha il proprio database isolato con naming convenzioni standardizzate.

### Modelli Principali

```php
// Tenant model
Modules\Tenant\Models\Tenant

// TenantUser pivot
Modules\Tenant\Models\TenantUser

// BaseModel con scope tenant
Modules\Tenant\Models\BaseModel extends XotBaseModel
```

## Configurazione Database

### Connessioni Dinamiche

```php
// TenantServiceProvider gestisce switch automatico
Tenant::configureConnection($tenantId);
```

### Migrations

- Migrations tenant-specifiche in `database/migrations/tenant/`
- Override `XotBaseMigration` per context switching

## Filament Integration

```php
class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->tenant(Tenant::class)
            ->tenantRoutePrefix('admin');
    }
}
```

## Trait HasTenants

```php
use Modules\User\Models\Traits\HasTenants;

class User extends Authenticatable
{
    use HasTenants;
}
```

## Collegamenti

- [Xot Base](../Xot/docs/)
- [User Module](../User/docs/)
- [Database Switching](./database-switching.md)

## Backlinks

- [Configurazione Root](../../../docs/TENANT_MODULE.md)


## Standard Rules & Workflow

- [[BMAD Method](../../../../docs/wiki/concepts/bmad-method.md)]
- [[Context Engineering](../../../../docs/wiki/concepts/context-engineering.md)]
- [[LLM Wiki Governance](../../../../docs/wiki/concepts/llm-wiki-governance.md)]

## Documentation

- [On-Demand Pattern](./ON-DEMAND-PATTERN.md) — Pattern per caricamento efficiente
- [QMD Setup](./QMD-SETUP.md) — Configurazione ricerca locale
- [Performance](./PERFORMANCE-OPTIMIZATION.md) — Metriche e best practice
- [Project Structure](./PROJECT-STRUCTURE.md) — Directory layout
>>>>>>> dev
