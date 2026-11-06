<<<<<<< .merge_file_eoWGho
---
issues: []
discussions: []
title: "Tenant Module: Documentation Index"
module: "Tenant"
type: concept
tags: [00, INDEX]
created: 2026-07-14
updated: 2026-07-14
qmd: "00 index"
related:
  - "./phpstan-corrections-january.md"
status: draft
---
# Tenant Module: Documentation Index
=======
<<<<<<< HEAD
# 📚 **Indice Documentazione Modulo Tenant**

**Last Update**: 31 Gennaio 2026
**Status**: ✅ PHPStan Level 10 Compliant
**Module Version**: 1.8.0

## 🎯 **Lettura Essenziale**
1. [README.md](./README.md) - Panoramica del sistema Multi-tenancy.
2. [roadmap.md](./roadmap.md) - Evoluzione 2026: Dinamismo estremo e performance.
3. [philosophy.md](./philosophy.md) - "Ognuno nel suo spazio": filosofia dell'isolamento.

## 🏗️ **Architettura & Logica**
- 🏛️ **[Modular Monolith](./modular-monolith-architecture.md)** - Come il Tenant abilita la modularità.
- ⚙️ **[Configuration Logic](./configuration-logic-analysis.md)** - Risoluzione gerarchica della configurazione.
- 📂 **[Database Population](./database-population.md)** - Strategie per il seeding e la migrazione dei Tenant.

## 🛠️ **Implementazione Tecnica**
- 🧬 **[Tenant Config Path](./tenant-config-path-philosophy-debate.md)** - Filosofia della gestione dei path configurazione.
- 🐚 **[Console Integration](./resolve-tenant-config-console-debate.md)** - Risoluzione del tenant nei comandi CLI.
- 🍣 **[Sushi to JSON](./sushi-traits-phpstan-fixes.md)** - Gestione dei dati statici e semi-statici dei Tenant.

## 🧪 **Qualità e Sviluppo**
- ✅ **[PHPStan Analysis](./phpstan-level10-fixes.md)** - Report di conformità Level 10.
- 🔬 **[Testing Guidelines](./testing.md)** - Verifica dell'isolamento dei dati tra tenant.
- 🧹 **[PHPMD Fixes](./cyclomatic-complexity-report.md)** - Analisi della complessità della logica di routing.
- 🐒 **[Chaos Monkey Tenant Isolation Checklist](./chaos-monkey-tenant-isolation-checklist.md)** - Checklist operativa per fault su multi-tenant/database.

## 🧹 **Manutenzione**
- 🗑️ **[Cleanup Plan](./duplicate-files-to-remove.md)** - Eliminazione dei file duplicati e obsoleti.

=======
>>>>>>> 6ed19256f (.)
# Tenant Module Documentation Index

**Last Update**: 18 Dicembre 2025
**Status**: ✅ PHPStan Level 10 Compliant
**Module Version**: 1.0

## 📚 Quick Navigation

### 🎯 Essential Reading
1. [README.md](./README.md) - Overview completo del modulo
2. [quality-analysis.md](./quality-analysis.md) - Quality metrics and analysis

### 🏗️ Architecture & Patterns
- [Multi-tenancy Implementation](./multi-tenancy-implementation.md) - Pattern multi-tenancy
- [Tenant Model Structure](./tenant-model-structure.md) - Struttura modelli Tenant
- [Database Isolation](./database-isolation.md) - Isolamento dati tra tenant

### 🧩 Core Components
- [Tenant Model](../../app/Models/Tenant.php) - Modello principale Tenant
- [Tenant Domain](../../app/Models/TenantDomain.php) - Modello dominio tenant
- [Tenant Setting](../../app/Models/TenantSetting.php) - Modello impostazioni tenant
- [Tenant Subscription](../../app/Models/TenantSubscription.php) - Modello abbonamenti tenant

### 🔧 Implementation Guides
- [Tenant Creation Process](./tenant-creation-process.md) - Processo creazione nuovo tenant
- [Tenant Switching](./tenant-switching.md) - Gestione cambio contesto tenant
- [Tenant Configuration](./tenant-configuration.md) - Configurazione tenant-specific

### 🧪 Testing
- [Test Suite](../../tests/) - Suite di test per il modulo Tenant
- [Feature Tests](../../tests/Feature/) - Test funzionali
- [Integration Tests](../../tests/Integration/) - Test di integrazione
- [Unit Tests](../../tests/Unit/) - Test unitari

### 🐛 Troubleshooting & Fixes
- [Common Issues](./common-issues.md) - Problemi comuni e soluzioni
- [Debugging Multi-tenancy](./debugging-multi-tenancy.md) - Debugging strategie
- [RunningInConsole Check Removal](./runninginconsole-check-removal-summary.md) - Rimozione check console
- [RunningInConsole Check Decision](./runninginconsole-check-decision.md) - Processo decisionale

### 📊 Code Quality
- [phpstan/](./phpstan/) - PHPStan analysis reports
- [Quality Analysis](./quality-analysis.md) - Metriche di qualità

### 🚀 Deployment
- [Multi-tenant Deployment](./deployment.md) - Linee guida per deploy
- [Environment Configuration](./environment-config.md) - Configurazione ambiente

## 📈 Module Statistics

- **Total Docs**: 5 files
- **PHPStan Compliance**: ✅ Level 10
- **Architecture**: XotBase compliant
- **Type Safety**: 100%
>>>>>>> .merge_file_Q4nQV3

**Path**: `laravel/Modules/Tenant/docs/`  
**Updated**: 2026-07-01  
**Status**: Multi-tenant core module

---

## 🎯 Quick Start

**Multi-tenancy 101**: [TenantIdentification.md](./wiki/tenantidentification.md): How tenants are identified and isolated  
**Architecture**: [Architecture.md](./wiki/architecture.md): System design and data flow  
**Configuration**: See **Multi-Tenant Config** section below ⬇️

---

## 📋 Hub Canonici (Core Files)

### Wiki (Sacred: Do Not Delete)
- **[wiki/index.md](./wiki/index.md)**: Operating manual for LLM agents
- **[wiki/Architecture.md](./wiki/architecture.md)**: Multi-tenant system design
- **[wiki/TenantIdentification.md](./wiki/tenantidentification.md)**: How tenants are identified
- **[wiki/ConfigurationDistribution.md](./wiki/configurationdistribution.md)**: Config per tenant
- **[wiki/schema.md](./wiki/schema.md)**: Database schema reference

### Roadmap
- **[roadmap/00-index.md](./roadmap/00-index.md)**: Q4 2025 roadmap and phases
- **[roadmap/vision.md](./roadmap/vision.md)**: Long-term vision
- **[roadmap/tenant-isolation.md](./roadmap/tenant-isolation.md)**: Data isolation strategy

### Product & Strategy
- **[PRD.md](./prd.md)**: Product requirements document
- **[philosophy.md](./philosophy.md)**: Core principles
- **[README.md](./README.md)**: Module overview and local knowledge map

---

## 🏗️ Multi-Tenant Configuration

### How Tenant Config Works

This project uses **environment-specific tenant configuration**:

```
laravel/config/
├── localhost/              # Local dev (all tenants, single DB)
├── com/geekpiu/            # GeeKPIU tenant (production)
├── eu/progetto corrente/             # progetto corrente EU tenant
└── net/futurely/           # Futurely tenant
```

**Each tenant context includes**:
- `app.php`: Locale, timezone, app name per tenant
- `database.php`: Separate DB connection per tenant
- `services.php`: API credentials per tenant
- `modules.php`: Active modules per tenant
- `modules_statuses.json`: Module status overrides
- `morph_map.php`: Model registry (CRITICAL: never delete)

### Why This Architecture

1. **Data Isolation**: Each tenant has own database or schema
2. **Environment Separation**: Different APIs/credentials per deployment
3. **Module Availability**: Different features per tenant
4. **Local Development**: `localhost/` provides isolated dev environment

### Related Memory Files

For deep understanding of multi-tenant configuration:
- **[config-architecture-multi-tenant](../../../../.claude/config_architecture_documentation.md)**: Detailed architecture guide
- **[error_config_deletion_2026_07_01](../../../../.claude/error_config_deletion_2026_07_01.md)**: Critical lessons learned

> **CRITICAL RULE**: Never delete files under `laravel/config/`. These are KNOWN tenant configurations, not speculative code. Always grep before deleting any config file.

---

## 🧠 Core Concepts

**Tenant Scoping**: All queries are scoped to current tenant automatically  
**Tenant Resolution**: Determined by domain/header/request context (see TenantIdentification.md)  
**Data Boundaries**: Foreign keys enforce tenant isolation at DB level  
**Config Hierarchy**: Environment-specific overrides per tenant

---

## 🛠️ Development Rules

| Rule | Source |
|------|--------|
| No Services: use Actions | [wiki/concepts/](./wiki/concepts/) |
| Tenant scoping automatic | [TenantIdentification.md](./wiki/tenantidentification.md) |
| Config per tenant required | [ConfigurationDistribution.md](./wiki/configurationdistribution.md) |
| No hardcoded credentials | Via `laravel/config/{tenant}/` |

---

## 📁 Archive & Legacy

**Note**: This module has ~360 documentation files accumulated over years. Only the canonical files above (wiki/, roadmap/, PRD, README) are actively maintained. Other files are:
- **Legacy**: Historical decisions no longer active
- **Duplicates**: Multiple versions of same content (ponytail cleanup deferred)
- **Task-specific**: Archived from past sprints

**Rule**: When documenting Tenant module features:
1. Update [wiki/](./wiki/) first (canonical source)
2. Link from 00-index.md (this file)
3. Archive old duplicates if found

---

<<<<<<< .merge_file_eoWGho
## 🔗 Related Modules
=======
*Documentazione conforme agli standard Laraxot - DRY + KISS + SOLID*
<<<<<<< HEAD
## 📦 **Pacchetti Composer**
- [Riferimento](../../../../docs/composer-packages-reference.md) | [Inventario 312 pacchetti](../../../../docs/architecture/composer-packages-full-inventory.md) - Nessuna dipendenza diretta; usa Xot
- [Package Dependency Chaos Map](./package-dependency-chaos-map.md)
>>>>>>> .merge_file_Q4nQV3

- **[User Module](../../User/docs/00-index.md)**: Authentication per tenant
- **[Xot Module](../../Xot/docs/00-INDEX.md)**: Base classes for tenant awareness
- **[Theme System](../../../Themes/)**: Theme per tenant support

---

**Next Step**: Read [wiki/TenantIdentification.md](./wiki/tenantidentification.md) to understand how the current request is associated with a tenant.

## Cosa manca per completare

<<<<<<< .merge_file_eoWGho
[completion-status.md](./completion-status.md): indicatori misurati, problemi noti e story aperte (2026-10-28).
=======
- [Dependency intelligence](dependency-intelligence.md)
=======
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_Q4nQV3
