<<<<<<< .merge_file_U7C4TZ
---
title: "index"
type: note
tags: [documentation]
created: 2026-09-26
updated: 2026-09-26
qmd: "index"
issues: []
discussions: []
status: stale
---

> Nota 2026-10-14 (docs-audit): Indice del progetto PTVX, non del modulo Geo: dei suoi link relativi 41 non hanno bersaglio in questa cartella (installation.md, themes/, ../laravel/Modules/Performance/docs e altri). L'ingresso del modulo e' README.md. Contenuto non riscritto, verificare prima di usarlo.

# PTVX - Documentazione Completa

> Sistema Modulare per la Gestione della Pubblica Amministrazione

## 🚀 Quick Start

- **[Introduzione](./README.md)** - Panoramica del progetto
- **[Getting Started](./getting-started/)** - Setup e primi passi
- **[Installation](./installation.md)** - Guida installazione completa

## 🏗️ Architettura

### Fondamenti
- **[Architecture Overview](./architecture/)** - Architettura generale del sistema
- **[Directory Structure](./raw/history/directory-structure.md)** - Struttura cartelle e organizzazione
- **[Module System](./development/module-development.md)** - Sistema modulare
- **[Dependency Management](./dependencies.md)** - Gestione dipendenze

### Moduli Core
- **[Xot Module](../../Xot/docs/README.md)** - Framework base
- **[User Module](../../User/docs/README.md)** - Autenticazione e autorizzazione
- **[UI Module](../../UI/docs/README.md)** - Componenti interfaccia
- **[Tenant Module](../../Tenant/docs/README.md)** - Multi-tenancy
- **[Lang Module](../../Lang/docs/README.md)** - Gestione traduzioni

### Design Patterns
- **[Service Providers](./raw/history/service-provider-best-practices.md)** - Pattern service providers
- **[Data Transfer Objects](./best-practices/dto-pattern.md)** - DTO con Spatie Laravel Data
- **[Actions Pattern](./raw/history/actions.md)** - Spatie QueueableActions
- **[Event Sourcing](../../Activity/docs/event-sourcing.md)** - Event sourcing pattern

## 💻 Sviluppo

### Guide per Sviluppatori
- **[Development Guide](./development/)** - Guida completa sviluppo
- **[Module Development](./development/module-development.md)** - Creare nuovi moduli
- **[Coding Conventions](./conventions/)** - Convenzioni di codice
- **[Best Practices](./best-practices/)** - Best practices raccomandate

### Framework e Stack
- **[Laravel](./patterns/laravel.md)** - Framework Laravel
- **[Filament](./filament/)** - Admin panel Filament
- **[Livewire](./features/livewire.md)** - Componenti reattivi
- **[Blade Components](./raw/history/blade-components.md)** - Componenti Blade

### Database
- **[Migrations](./raw/history/database-migrations.md)** - Sistema migrazioni
- **[Models](./architecture/models.md)** - Eloquent models
- **[Repositories](./raw/history/repositories.md)** - Pattern repository
- **[EAV System](./raw/history/eav-system.md)** - Entity-Attribute-Value

## 🎨 Frontend

### UI/UX
- **[UI Components](./ui_components/)** - Componenti UI custom
- **[Theme System](./themes/)** - Sistema di temi
- **[Blade Components](./raw/history/blade-components.md)** - Componenti Blade
- **[Forms](./features/forms.md)** - Form builder

### Filament
- **[Resources](./filament/resources.md)** - Filament Resources
- **[Pages](./filament/pages.md)** - Custom pages
- **[Widgets](./filament/widgets.md)** - Dashboard widgets
- **[Actions](./raw/history/actions.md)** - Custom actions
- **[Relation Managers](./filament/relation-managers.md)** - Gestione relazioni

## 🔒 Sicurezza

### Autenticazione e Autorizzazione
- **[Authentication](./core/authentication.md)** - Sistema autenticazione
- **[Authorization](./raw/history/authorization.md)** - Autorizzazione e permessi
- **[Roles & Permissions](../../User/docs/roles-permissions.md)** - Gestione ruoli
- **[Teams](./raw/history/teams.md)** - Gestione team

### Sicurezza Dati
- **[Security Best Practices](./security.md)** - Sicurezza applicazione
- **[GDPR Compliance](./raw/history/gdpr-compliance.md)** - Conformità GDPR
- **[Audit Log](../../Activity/docs/README.md)** - Logging attività

## 🧪 Testing

### Strategia di Testing
- **[Testing Strategy](./testing/)** - Strategia generale
- **[Unit Testing](./testing/unit-testing.md)** - Test unitari
- **[Feature Testing](./testing/feature-testing.md)** - Test funzionali
- **[Integration Testing](./testing/integration-testing.md)** - Test di integrazione

### Qualità del Codice
- **[PHPStan](./best-practices/phpstan.md)** - Analisi statica
- **[Code Quality](./best-practices/code-quality.md)** - Qualità del codice
- **[Testing Guidelines](./claude/architecture/guidelines.md)** - Linee guida testing

## 📊 Performance
=======
# 📚 Indice Documentazione - Progetto <nome progetto>
# 📚 Indice Documentazione - Progetto <nome progetto>

## 🏥 Business Logic e Architettura

### Documentazione Consolidata
- [**Business Logic Consolidata**](business-logic-consolidated.md) - Analisi completa della business logic del sistema sanitario
- [**Factory e Seeder Consolidati**](factory-seeder-consolidated.md) - Stato completo di factory e seeder per tutti i moduli
- [**Business Logic Analysis**](business-logic-analysis.md) - Analisi dettagliata della business logic
- [**Laraxot Architecture Principles**](laraxot-architecture-principles.md) - Principi architetturali del framework

### Analisi Moduli
- [**Analisi Moduli e Ottimizzazioni**](analisi-moduli-ottimizzazioni.md) - Analisi completa dei moduli esistenti
- [**Modules Optimization Summary**](modules-optimization-summary.md) - Riepilogo delle ottimizzazioni implementate
- [**Anti-patterns**](anti-patterns.md) - Pattern da evitare nel progetto

## 🧪 Testing e Qualità

### Strategie di Testing
- [**Testing Supreme Index**](testing-supreme-index.md) - Indice completo delle strategie di testing
- [**Testing Strategy Modules**](testing-strategy-modules.md) - Strategie di testing per moduli
- [**Testing Implementation Complete**](testing-implementation-complete.md) - Implementazione completa del testing
- [**Testing Principles**](testing-principles.md) - Principi fondamentali del testing
- [**Testing Priority Rule**](testing-priority-rule.md) - Regole di priorità per il testing
- [**Testing Business Behavior Supreme Rule**](testing-business-behavior-supreme-rule.md) - Regole supreme per testing business logic

### Guide e Best Practices
- [**Testing Guide**](testing-guide.md) - Guida completa al testing
- [**Testing Guidelines**](testing-guidelines.md) - Linee guida per il testing
- [**Testing PSR4 Standards**](testing-psr4-standards.md) - Standard PSR4 per il testing
- [**Model Testing Philosophy**](model-testing-philosophy.md) - Filosofia del testing dei modelli

### Errori e Risoluzioni
- [**Common Testing Errors**](common-testing-errors.md) - Errori comuni nel testing
- [**Test Failures**](test-failures/) - Directory con analisi dei fallimenti dei test

## 🔧 Factory e Seeder

### Best Practices
- [**Factory Best Practices**](factory-best-practices.md) - Best practices per factory e seeder
- [**Database Seeding**](database-seeding.md) - Guida al seeding del database
- [**Modules Factory Seeder Analysis**](modules-factory-seeder-analysis.md) - Analisi factory e seeder per moduli

### Audit e Analisi
- [**Factory Email Rule**](factory-email-rule.md) - Regole per email nelle factory
- [**Factory Email Rules**](factory-email-rules.md) - Regole complete per email
- [**Cast Actions Centralized**](cast-actions-centralized.md) - Centralizzazione delle azioni di cast
- [**Cast Actions Usage**](cast-actions-usage.md) - Utilizzo delle azioni di cast

## 📊 PHPStan e Qualità Codice

### Analisi e Risoluzioni
- [**PHPStan Critical Rule**](phpstan-critical-rule.md) - Regole critiche per PHPStan
- [**PHPStan Analysis Business Logic**](phpstan-analysis-business-logic.md) - Analisi PHPStan della business logic
- [**PHPStan Fixes <nome progetto>**](phpstan-fixes-<nome progetto>.md) - Fix PHPStan per il modulo <nome progetto>
- [**PHPStan Fixes <nome progetto>**](phpstan-fixes-<nome progetto>.md) - Fix PHPStan per il modulo <nome progetto>
- [**PHPStan Array Types Fixes**](phpstan-array-types-fixes.md) - Fix per tipi array in PHPStan
- [**PHPStan Error Resolution**](phpstan-error-resolution.md) - Risoluzione errori PHPStan
- [**PHPStan Level 10 Fixes**](phpstan-level10-fixes.md) - Fix per PHPStan livello 10

### Fixes Specifici
- [**PHPStan Covariance Resolution Summary**](phpstan-covariance-resolution-summary.md) - Risoluzione problemi di covarianza
- [**PHPStan Relationship Covariance Fix**](phpstan-relationship-covariance-fix.md) - Fix per covarianza nelle relazioni
- [**PHPStan Return Type Errors**](phpstan-return-type-errors.md) - Errori di tipo di ritorno

## 🏗️ Architettura e Pattern

### Pattern e Implementazioni
- [**Model Context Protocol**](model_context_protocol.md) - Protocollo per il contesto dei modelli
- [**MCP Implementation Guide**](mcp_implementation_guide.md) - Guida all'implementazione MCP
- [**MCP Errors and Lessons**](mcp_errors_and_lessons.md) - Errori e lezioni apprese con MCP
- [**Laraxot Conventions**](laraxot_conventions.md) - Convenzioni Laraxot
- [**Laraxot Framework**](laraxot-framework.md) - Framework Laraxot

### Organizzazione e Struttura
- [**Script Organization**](script-organization.md) - Organizzazione degli script
- [**Boy Scout Rule**](boy-scout-rule.md) - Regola del boy scout
- [**Boy Scout Rule Implementation**](boy-scout-rule-implementation.md) - Implementazione della regola

## 📁 Directory Testing

### Test Specifici
- [**Testing Directory**](testing/) - Directory con test e analisi specifiche

## 🔗 Collegamenti Moduli

### Documentazione Moduli
- [**<nome progetto>**](../modules/<nome progetto>/docs/readme.md) - Documentazione modulo core sanitario
- [**<nome progetto>**](../modules/<nome progetto>/docs/readme.md) - Documentazione modulo core sanitario
- [**User**](../modules/user/docs/readme.md) - Documentazione modulo gestione utenti
- [**Geo**](../modules/geo/docs/readme.md) - Documentazione modulo dati geografici
- [**Media**](../modules/media/docs/readme.md) - Documentazione modulo gestione media
- [**UI**](../modules/ui/docs/readme.md) - Documentazione modulo componenti UI
- [**Xot**](../modules/xot/docs/readme.md) - Documentazione modulo base
- [**<nome progetto>**](../Modules/<nome progetto>/docs/README.md) - Documentazione modulo core sanitario
- [**<nome progetto>**](../Modules/<nome progetto>/docs/README.md) - Documentazione modulo core sanitario
- [**User**](../Modules/User/docs/README.md) - Documentazione modulo gestione utenti
- [**Geo**](../Modules/Geo/docs/README.md) - Documentazione modulo dati geografici
- [**Media**](../Modules/Media/docs/README.md) - Documentazione modulo gestione media
- [**UI**](../Modules/UI/docs/README.md) - Documentazione modulo componenti UI
- [**Xot**](../Modules/Xot/docs/README.md) - Documentazione modulo base

<<<<<<< HEAD
>>>>>>> .merge_file_D3ff4e
## 🗺️ Geo Filament Components

### Filosofia e Regole
- [**Filament Geo Pickers Philosophy**](filament-geo-pickers-philosophy.md) - Filosofia, visione e regole per i componenti Geo picker
- [**Map Picker Prompt**](/prompts/map-picker.txt) - Prompt per implementazione MapPicker

### Pickers Components
- CoordinatePicker - Il maestro Zen
- MapPicker / LocationPicker - Alias backward-compatible
- LatitudeLongitudeInput - Le viscere grezze
- PlacePicker - La guida al specifico
- MapPositioner - Il righello di prospettiva
- MapLocationInput - Input nascosto sincronizzato
- LeafletMarkerMapInput - L'amarker con memoria
- GeopointPicker - Il punto geografico puro

=======
>>>>>>> 6ed19256f (.)
## 📋 Convenzioni e Standard

### Ottimizzazione
- **[Performance Optimization](./performance-optimization.md)** - Ottimizzazione generale
- **[Cache Management](./raw/history/cache-management.md)** - Gestione cache
- **[Queue Management](./raw/history/queue-management.md)** - Code e job
- **[Database Optimization](./performance/database.md)** - Ottimizzazione DB

### Monitoring
- **[Metrics Dashboard](./raw/history/metrics-dashboard.md)** - Dashboard metriche
- **[Performance Monitoring](./roadmap/monitoring.md)** - Monitoraggio performance

## 🌐 Internazionalizzazione

### Traduzioni
- **[Lang Service](../../Lang/docs/README.md)** - Sistema traduzioni
- **[Translation Guidelines](./conventions/translations.md)** - Linee guida traduzioni
- **[Multi-language Support](./core/i18n.md)** - Supporto multilingua

## 🔧 Configurazione

### Setup e Configurazione
- **[Environment Setup](./getting-started/environment.md)** - Setup ambiente
- **[Configuration Files](./core/configuration.md)** - File di configurazione
- **[Module Configuration](./development/module-configuration.md)** - Configurazione moduli

## 🐛 Troubleshooting

### Risoluzione Problemi
- **[Common Errors](./common-errors.md)** - Errori comuni
- **[Debugging Guide](./troubleshooting/debugging.md)** - Guida al debugging
- **[Conflicts Resolution](./conflicts-resolution.md)** - Risoluzione conflitti
- **[Git Conflicts](./git-conflict-resolution.md)** - Conflitti Git

## 🚢 Deploy e Produzione

### Deployment
- **[Deployment Guide](./deployment/)** - Guida al deployment
- **[Server Configuration](./deployment/server.md)** - Configurazione server
- **[CI/CD](./deployment/ci-cd.md)** - Continuous Integration/Deployment

## 📚 Riferimenti

### API e Integrazioni
- **[API Development](./raw/history/api-development.md)** - Sviluppo API
- **[External Integrations](./integrations/)** - Integrazioni esterne
- **[OAuth](./oauth/)** - Autenticazione OAuth

### Moduli Specifici PA
- **[Performance Module](../laravel/Modules/Performance/docs/README.md)** - Valutazioni
- **[Presenze Assenze](../laravel/Modules/PresenzeAssenze/docs/README.md)** - Timbrature
- **[Progressioni](../laravel/Modules/Progressioni/docs/README.md)** - Carriere
- **[Indennità](../laravel/Modules/IndennitaCondizioniLavoro/docs/README.md)** - Indennità

## 🗺️ Roadmap

### Sviluppo Futuro
- **[Project Roadmap](./raw/history/project-roadmap.md)** - Roadmap generale
- **[Filament 4 Upgrade](./raw/history/filament-4-upgrade-guide.md)** - Upgrade Filament 4
- **[Laravel 11 Migration](./core/laravel-11-migration.md)** - Migrazione Laravel 11

## 📝 Convenzioni e Standard

### Naming e Style
- **[Documentation Conventions](./documentation-conventions.md)** - Convenzioni documentazione
- **[Naming Conventions](./conventions/naming.md)** - Convenzioni naming
- **[Code Style](./conventions/code-style.md)** - Stile del codice

### Regole Cursor/Windsurf
- **[Cursor Rules](../.cursor/rules/)** - Regole Cursor AI
- **[Windsurf Rules](../.windsurf/rules/)** - Regole Windsurf AI

## 🤝 Contribuire

### Come Contribuire
- **[Contributing Guide](./contributing/)** - Guida per contribuire
- **[Code of Conduct](./code-of-conduct.md)** - Codice di condotta
- **[Pull Request Process](./contributing/pr-process.md)** - Processo PR

## 📖 Risorse Aggiuntive

### Learning Resources
- **[Laravel Documentation](https://laravel.com/docs)** - Docs Laravel ufficiale
- **[Filament Documentation](https://filamentphp.com/docs)** - Docs Filament ufficiale
- **[PHPStan Documentation](https://phpstan.org/user-guide/)** - Guida PHPStan

### Community
- **GitHub Discussions**: [Link discussions]
- **Issues Tracker**: [Link issues]
- **Wiki**: [Link wiki]

---
## 🔍 Cerca nella Documentazione

Usa Ctrl/Cmd + F per cercare in questa pagina, oppure:
- [Cerca nei moduli](../..)
- [Cerca nelle regole AI](../.cursor/rules/)
- [Cerca negli script](../../../../bashscripts)

## 📧 Supporto

- **Email**: marco.sottana@gmail.com
- **Issues**: [GitHub Issues](link-issues)
- **Discussions**: [GitHub Discussions](link-discussions)

---

**Ultima Revisione**: 2025-01-29  
**Versione Documentazione**: 1.0.0  
**Responsabile Documentazione**: AI Assistant

**Versione**: 3.0
**Autore**: AI Assistant
**Stato**: Consolidata e Aggiornata
