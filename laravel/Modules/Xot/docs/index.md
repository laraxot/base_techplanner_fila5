<<<<<<< HEAD
# 📚 Index of Xot Module Documentation

## 🎯 Quick Start
- [**README.md**](README.md) - General overview
- [**Architecture**](architecture/architecture.md) - System architecture
- [**Best Practices**](best-practices/best-practices.md) - Development guidelines
- [**README.md**](readme.md) - General overview
- [**Architecture**](architecture/architecture.md) - System architecture
- [**Best Practices**](best-practices/best-practices.md) - Development guidelines
- Docs-first governance: before editing code, study and improve local module docs and the active theme docs, then align global `docs/*` and evaluate GitHub Issue/Discussion tracking.
- Post-edit PHP quality gate: after changing a PHP file, run `phpstan`, `phpmd`, `phpinsights`, then review/create the associated Pest test when the behavior is testable.

## 📖 Documentation by Category

### 🏗️ Architecture & Design
- [Architecture Overview](architecture/architecture.md)
- [Architecture Best Practices](architecture/architecture-best-practices.md)
- [Violations and Fixes (XotData Pattern)](architecture/architecture-violations-and-fixes.md)
- [Structure Guide](architecture/structure.md)

### 🔧 Development & Implementation
- [Best Practices Consolidated](best-practices/best-practices-consolidated.md)
- [General Best Practices](best-practices/best-practices.md)
- [Module Development Guide](module-development/module-configuration-best-practices.md)
- [Queueable Actions](module-development/queueable-actions.md)
- [Data Objects](module-development/data-objects.md)

### 🎨 Filament & UI
- [Theme Vite Configuration](./vite-configuration.md)
- [Theme Assets Workflow](./theme-assets-workflow.md)
- [Filament Best Practices](filament/filament-best-practices.md)
- [Filament Resource Rules](filament/filament-resource-rules.md)
- [Filament Tables Guide](filament/filament-tables.md)
- [XotBase Resource Corrections](filament/filament-xotbase-resource-corrections.md)

### 🗄️ Database & Migrations
- [Migration Standards](database/migration-standards.md)
- [Migration Guidelines](database/migration-guidelines.md)
- [Consolidated Migrations](database/migrations-consolidated.md)
- [Model Casting Rules](database/model-casting-rules.md)

### 🧪 Testing & Quality
- [Testing Best Practices](testing/testing-best-practices.md)
- [Testing Strategy](testing/testing-strategy.md)
- [Complete Testing Guide](testing/testing.md)
- [PHPStan Complete Guide](phpstan/phpstan-complete-guide.md)
- [PHPStan Runtime Governance](phpstan-runtime-governance.md)

### 🌐 Translations & Localization
- [Translation System](translations/translation-system.md)
- [Translations Best Practices](translations/translations-best-practices.md)
- [Localization Guide](translations/localization-guide.md)

### 🛠️ Bash Scripts & Automation
- [BashScripts Organization](bashscripts/bashscripts-organization.md)

### 🤖 AI & Development Tools
- [Claude Context (Laravel)](../../../claude.md)
- [AI Agents Guide](../../../../agents.md)
- [Cursor Rules & Skills](../../../../.cursor/readme.md)
- [Skills di progetto](../../../../.cursor/skills/)

### 🚨 Troubleshooting
- [**CCR DeepSeek Fix**](troubleshooting/ccr-deepseek-fix.md) - Resolve 400 API error
- [General Troubleshooting](troubleshooting.md)

---
*Last update: January 2025*
=======
# 📚 **Indice Documentazione Modulo Xot**

## 🎯 **Quick Start**

### **Per Sviluppatori**
- [**README.md**](README.md) - Inizia qui per una panoramica completa
- [**Architettura**](architecture.md) - Comprendi l'architettura del modulo
- [**Best Practices**](best-practices.md) - Segui le linee guida di sviluppo

### **Per Amministratori**
- [**README.md**](README.md) - Panoramica del sistema
- [**Troubleshooting**](troubleshooting.md) - Risoluzione problemi comuni

### **Per Integratori**
- [**Esempi**](examples.md) - Casi d'uso pratici
- [**Best Practices**](best-practices.md) - Standard di implementazione

## 📖 **Documentazione per Argomento**

### **🏗️ Architettura e Design**
- [**Architettura**](architecture.md) - Struttura e componenti del modulo
- [**README.md**](README.md) - Panoramica architetturale completa

### **🔧 Implementazione e Sviluppo**
- [**Best Practices**](best-practices.md) - Linee guida per lo sviluppo
- [**Esempi**](examples.md) - Esempi pratici e casi d'uso
- [**README.md**](README.md) - Guida all'implementazione

### **🎨 Filament e UI**
- [**Best Practices**](best-practices.md) - Sezione Filament Resources
- [**Esempi**](examples.md) - Esempi di risorse Filament complete

### **🗄️ Database e Migrazioni**
- [**Best Practices**](best-practices.md) - Sezione migrazioni
- [**Esempi**](examples.md) - Esempi di migrazioni e modelli

### **🧪 Testing e Qualità**
- [**Best Practices**](best-practices.md) - Sezione testing
- [**Esempi**](examples.md) - Esempi di test completi

### **🔒 Sicurezza e Validazione**
- [**Best Practices**](best-practices.md) - Sezione sicurezza
- [**Troubleshooting**](troubleshooting.md) - Problemi di autorizzazione

### **📈 Performance e Ottimizzazione**
- [**Best Practices**](best-practices.md) - Sezione performance
- [**Architettura**](architecture.md) - Pattern di ottimizzazione

## 📊 **Livelli di Competenza**

### **🟢 Principiante**
- [**README.md**](README.md) - Inizia con la panoramica
- [**Esempi**](examples.md) - Studia i casi base
- [**Best Practices**](best-practices.md) - Sezioni fondamentali

### **🟡 Intermedio**
- [**Architettura**](architecture.md) - Approfondisci la struttura
- [**Best Practices**](best-practices.md) - Pattern avanzati
- [**Troubleshooting**](troubleshooting.md) - Risoluzione problemi

### **🔴 Esperto**
- [**Architettura**](architecture.md) - Estensibilità e personalizzazione
- [**Best Practices**](best-practices.md) - Anti-pattern e ottimizzazioni
- [**Esempi**](examples.md) - Casi d'uso complessi

## 🔍 **Ricerca per Parole Chiave**

### **Modelli e Database**
- **BaseModel**: [Best Practices](best-practices.md#implementazione-modelli)
- **Migrazioni**: [Best Practices](best-practices.md#implementazione-migrazioni)
- **Relazioni**: [Esempi](examples.md#esempi-di-modelli)
- **Campi Extra**: [Esempi](examples.md#modello-con-campi-extra)

### **Filament e UI**
- **XotBaseResource**: [Best Practices](best-practices.md#implementazione-risorse-filament)
- **Form Schema**: [Esempi](examples.md#risorsa-base-completa)
- **Table Columns**: [Esempi](examples.md#risorsa-base-completa)
- **Azioni Personalizzate**: [Esempi](examples.md#risorsa-con-azioni-personalizzate)

### **Service Provider e Configurazione**
- **XotBaseServiceProvider**: [Best Practices](best-practices.md#implementazione-service-provider)
- **Registrazione Componenti**: [Esempi](examples.md#service-provider-base)
- **Configurazione**: [Esempi](examples.md#service-provider-con-configurazione)

### **Testing e Qualità**
- **XotBaseTestCase**: [Best Practices](best-practices.md#testing-best-practices)
- **Test Modelli**: [Esempi](examples.md#test-base)
- **Test Relazioni**: [Esempi](examples.md#test-di-relazioni)

## 🛠️ **Comandi Artisan Utili**

### **Sviluppo**
```bash
# Verifica autoload
composer dump-autoload

# Esegui migrazioni
php artisan migrate

# Verifica stato migrazioni
php artisan migrate:status

# Pulisci cache
php artisan cache:clear
php artisan config:clear
php artisan view:clear
```

### **Testing**
```bash
# Esegui tutti i test
php artisan test

# Test modulo specifico
php artisan test --testsuite=Example

# Test specifico
php artisan test --filter=ExampleTest
```

### **PHPStan**
```bash
# Analisi completa
./vendor/bin/phpstan analyse --level=10

# Analisi modulo specifico
./vendor/bin/phpstan analyse Modules/Xot --level=10
```

## 📋 **Checklist Implementazione**

### **✅ Setup Base**
- [ ] Modulo creato con struttura corretta
- [ ] Service Provider estende XotBaseServiceProvider
- [ ] Modelli estendono BaseModel
- [ ] Risorse Filament estendono XotBaseResource
- [ ] Migrazioni estendono XotBaseMigration

### **✅ Funzionalità Core**
- [ ] Modelli con PHPDoc completo
- [ ] Relazioni definite correttamente
- [ ] Casting implementato con metodo casts()
- [ ] Campi extra gestiti correttamente
- [ ] Scope e metodi helper implementati

### **✅ Filament Integration**
- [ ] Form schema completo
- [ ] Table columns configurate
- [ ] Filtri implementati
- [ ] Azioni personalizzate
- [ ] Bulk actions configurate

### **✅ Testing**
- [ ] Test case estende XotBaseTestCase
- [ ] Test per CRUD operations
- [ ] Test per relazioni
- [ ] Test per metodi custom
- [ ] Factory implementate

### **✅ Qualità e Sicurezza**
- [ ] PHPStan livello 10 superato
- [ ] Policy implementate
- [ ] Validazione completa
- [ ] Gestione errori
- [ ] Logging appropriato

## 🚨 **Problemi Comuni**

### **Errori Critici**
- **Classe Base Non Trovata**: [Troubleshooting](troubleshooting.md#1-classe-base-non-trovata)
- **Traduzioni Non Caricate**: [Troubleshooting](troubleshooting.md#2-traduzioni-non-caricate)
- **Errori PHPStan**: [Troubleshooting](troubleshooting.md#3-errori-phpstan-livello-10)

### **Problemi Specifici**
- **Ereditarietà**: [Troubleshooting](troubleshooting.md#1-problemi-di-ereditarietà)
- **Service Provider**: [Troubleshooting](troubleshooting.md#2-problemi-di-service-provider)
- **Migrazioni**: [Troubleshooting](troubleshooting.md#3-problemi-di-migrazioni)

### **Testing e Debug**
- **Test Non Eseguibili**: [Troubleshooting](troubleshooting.md#1-test-non-eseguibili)
- **Problemi Database**: [Troubleshooting](troubleshooting.md#2-problemi-di-database-nei-test)
- **Debug e Diagnostica**: [Troubleshooting](troubleshooting.md#debug-e-diagnostica)

## 🔗 **Riferimenti Esterni**

### **Documentazione Ufficiale**
- [Laravel Documentation](https://laravel.com/docs)
- [Filament Documentation](https://filamentphp.com/docs)
- [PHPStan Documentation](https://phpstan.org/user-guide)

### **Best Practices Generali**
- [PSR Standards](https://www.php-fig.org/psr/)
- [SOLID Principles](https://en.wikipedia.org/wiki/SOLID)
- [DRY Principle](https://en.wikipedia.org/wiki/Don%27t_repeat_yourself)

## 📞 **Supporto e Contributi**

### **Come Ottenere Aiuto**
1. **Leggi la documentazione**: Inizia sempre dal README.md
2. **Controlla il troubleshooting**: Molti problemi hanno soluzioni documentate
3. **Studia gli esempi**: I casi d'uso pratici sono la migliore guida
4. **Verifica PHPStan**: Gli errori di analisi statica forniscono indizi utili

### **Come Contribuire**
1. **Segui le best practices**: Rispetta sempre i principi DRY, KISS, SOLID
2. **Mantieni la documentazione aggiornata**: Aggiorna i file docs quando modifichi il codice
3. **Aggiungi test**: Ogni nuova funzionalità deve essere testata
4. **Rispetta i livelli PHPStan**: Mantieni sempre il livello 10

---

*Ultimo aggiornamento: giugno 2025 - Versione 2.0.0*
>>>>>>> 6ed19256f (.)
