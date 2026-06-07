<<<<<<< HEAD
<<<<<<< HEAD
# Analisi PHPStan per Moduli Laravel

Questa documentazione spiega come utilizzare gli script forniti per analizzare i moduli Laravel con PHPStan.

## Cos'è PHPStan?

PHPStan è uno strumento di analisi statica per PHP che consente di rilevare errori di programmazione senza eseguire il codice. Supporta diversi livelli di analisi, da 0 (più permissivo) a 9 (più restrittivo).

## Script disponibili

Nel progetto sono disponibili due script per eseguire l'analisi PHPStan su tutti i moduli:

1. `analyze_modules_phpstan.php` - Script PHP che esegue l'analisi e genera file JSON e MD con i risultati
2. `analyze_modules_phpstan.sh` - Wrapper Bash per lo script PHP che fornisce un'interfaccia più user-friendly

## Prerequisiti

- PHP 8.1 o superiore
- PHPStan già installato (incluso nelle dipendenze Composer)
- Permessi di scrittura nelle directory dei moduli

## Come eseguire l'analisi

### Metodo 1: Utilizzando lo script Bash

1. Navigare alla directory principale di Laravel
2. Eseguire lo script bash:

```bash
cd /path/to/laravel
./analyze_modules_phpstan.sh
```

### Metodo 2: Utilizzando lo script PHP direttamente

1. Navigare alla directory principale di Laravel
2. Eseguire lo script PHP:

```bash
cd /path/to/laravel
php analyze_modules_phpstan.php
```

## Output dell'analisi

Per ogni modulo, gli script generano:

- File JSON con i risultati dell'analisi: `Modules/[ModuleName]/project_docs/phpstan/level_[1-9].json`
- File Markdown con suggerimenti per le correzioni: `Modules/[ModuleName]/project_docs/phpstan/correction.md`

## Livelli di analisi

Lo script analizza ogni modulo con livelli di PHPStan incrementali da 1 fino a 9. Se l'analisi fallisce a un determinato livello, l'elaborazione per quel modulo si ferma e viene generato un report.

Descrizione dei livelli:
- **Livello 1**: Controlli di base (chiamate a funzioni/metodi non esistenti)
- **Livello 2**: Controlli di tipo
- **Livello 3**: Controlli su proprietà e metodi non esistenti
- **Livello 4**: Type juggling e controlli più rigidi
- **Livello 5**: Controlli sui dead code e sulle firme dei metodi
- **Livello 6**: Controlli sulla compatibilità delle firme
- **Livello 7**: Controlli sulle dichiarazioni di proprietà
- **Livello 8**: Controlli più avanzati sui tipi di ritorno
- **Livello 9**: Controlli più avanzati su array e parametri variadic

## Come interpretare i risultati

I file JSON contengono gli errori dettagliati rilevati da PHPStan, mentre i file Markdown (`correction.md`) forniscono suggerimenti per correggere gli errori.

Per ogni errore, lo script suggerisce una possibile soluzione in base al tipo di problema rilevato.

## Personalizzazione

Se necessario, è possibile modificare gli script per:

- Cambiare il livello massimo di analisi
- Aggiungere ulteriori suggerimenti per tipi specifici di errori
- Personalizzare il formato dell'output

## Risoluzione problemi

### PHPStan non trovato

Assicurarsi che PHPStan sia correttamente installato eseguendo:

```bash
composer require --dev phpstan/phpstan
```

### Permessi di scrittura

Se lo script non riesce a creare le directory o i file di output, verificare i permessi:

```bash
chmod -R 775 Modules/*/docs
```

### Memoria insufficiente

Se PHPStan esaurisce la memoria durante l'analisi, è possibile aumentare il limite di memoria PHP:

```bash
php -d memory_limit=1G analyze_modules_phpstan.php
=======
# 🏗️ **Xot Module** - Il Cuore del Framework Laraxot

[![Laravel 12.x](https://img.shields.io/badge/Laravel-12.x-red.svg)](https://laravel.com/)
[![Filament 4.x](https://img.shields.io/badge/Filament-4.x-blue.svg)](https://filamentphp.com/)
[![PHP 8.3](https://img.shields.io/badge/PHP-8.3-blueviolet.svg)](https://www.php.net/)
[![PHPStan Level 10](https://img.shields.io/badge/PHPStan-Level%2010-brightgreen.svg)](https://phpstan.org/)
[![Modular Architecture](https://img.shields.io/badge/Architecture-Modular%20Monolith-yellow.svg)](https://martinfowler.com/articles/modular-monolith.html)

> **🚀 Modulo Xot**: Framework base e cuore architetturale di Laraxot - fornisce classi base, traits, convenzioni e infrastruttura core per tutti i moduli dell'ecosistema.

## 📋 **Panoramica**

Il modulo **Xot** è il **framework base** di Laraxot PTVX, un ecosistema modulare basato su **Laravel 12** e **Filament 4**, progettato per applicazioni enterprise. Fornisce gli strumenti fondamentali e i pattern architetturali per garantire coerenza, estensibilità e manutenibilità in tutto il progetto.

### Principi Fondamentali
- **Modularità**: Ogni funzionalità è organizzata in moduli indipendenti e autoconsistenti.
- **Coerenza**: Adozione di una struttura uniforme, convenzioni di naming e best practice standardizzate.
- **Estensibilità**: Progettato per facilitare l'aggiunta di nuovi moduli e l'espansione delle funzionalità esistenti.
- **Manutenibilità**: Codice pulito, ben documentato e supportato da strumenti di analisi statica.

## ⚡ **Architettura Core**

### 🏗️ **Base Classes Pattern**
Tutti i componenti principali dei moduli devono estendere le classi base fornite da Xot per ereditare funzionalità comuni e garantire coerenza.

```php
// Esempio di una Resource Filament
use Modules\Xot\Filament\Resources\XotBaseResource;

class UserResource extends XotBaseResource
{
    protected static ?string $model = User::class;

    // Il metodo table() e form() NON devono essere sovrascritti
    // se non per aggiungere logica specifica, ma la base
    // è già fornita da XotBaseResource.
}
```

### 🔧 **Traits Ecosystem**
Xot fornisce un ricco ecosistema di Trait per aggiungere funzionalità comuni ai modelli e ad altre classi.
- **HasXotTable**: Aggiunge funzionalità avanzate alle tabelle Filament.
- **HasUuid**: Gestisce automaticamente UUID come chiavi primarie.
- **HasMedia**: Integra Spatie Media Library con convenzioni standard.
- **HasStates**: Fornisce una gestione degli stati per i modelli.
- **TransTrait**: Semplifica le traduzioni dinamiche.

### 📦 **Service Provider Pattern**
I Service Provider di ogni modulo estendono `XotBaseServiceProvider`, che automatizza la registrazione di:
- Migrations, Views, Translations, e Config
- Routes (web.php, api.php)
- Filament Resources, Pages, e Widgets
- Comandi Artisan e Policies

## 🎯 **Funzionalità Principali**

### ⚡ **Actions Framework**
Un pattern standardizzato per incapsulare la business logic in classi riutilizzabili e testabili.
```php
use Modules\Xot\Actions\XotBaseAction;

class CreateUserAction extends XotBaseAction
{
    public function execute(array $data): User
    {
        $user = User::create($data);
        $this->logActivity('user.created', $user); // Logging automatico
        event(new UserCreated($user)); // Dispatching eventi
        return $user;
    }
}
```

### 🏷️ **Enums System**
Le Enum di Xot implementano `XotBaseEnum`, che fornisce traduzioni automatiche e altri helper.
```php
use Modules\Xot\Enums\XotBaseEnum;

enum UserStatus: string implements XotBaseEnum
{
    case ACTIVE = 'active';
    case INACTIVE = 'inactive';

    public function getLabel(): string
    {
        // Traduzione gestita centralmente
        return __('xot::enums.user_status.'.$this->value);
    }
}
```

## 🛠️ **Sviluppo e Qualità**

### Convenzioni
- **Namespace**: I namespace dei moduli **NON** devono includere il segmento `app`.
- **Tipizzazione Forte**: Utilizzo di `declare(strict_types=1);` e type hints rigorosi in tutto il codice.
- **File di Traduzione**: Seguire la struttura espansa `['label' => '...', 'tooltip' => '...']`.

### Strumenti di Qualità
- **PHPStan**: Livello 10. La configurazione è in `phpstan.neon`.
- **Pest**: Utilizzato per i test della business logic nei moduli core.
- **Laravel Pint**: Formattazione del codice secondo lo standard PSR-12 e le convenzioni Laraxot.

Esegui i controlli di qualità dalla root del progetto Laravel:
```bash
./vendor/bin/phpstan analyse Modules/Xot --level=max
./vendor/bin/pest Modules/Xot/tests
./vendor/bin/pint
>>>>>>> 4b6b99016 (first commit)
```

### 🏆 PHPStan Level 10 Compliance (Dicembre 2025)

**Status**: ✅ **0 Errori** (16 → 0)
**Approccio**: Fix, Don't Ignore
**Baseline**: Nessuno

Il modulo Xot ha raggiunto la piena conformità PHPStan Level 10 senza compromessi:
- Zero baseline entries
- Nessuna modifica a phpstan.neon
- Solo correzioni reali del codice
- Type safety al 100%

**Documentazione dettagliata**:
- [PHPStan Patterns Dec 2025](./phpstan-patterns-dec-2025.md)
- [PHPStan Level 10 Success](../../../docs/phpstan-level-10-success.md)

## 🗺️ **Roadmap**
1.  **Consolidamento Documentazione**: Unificare e semplificare la documentazione di tutti i moduli (obiettivo: 500 → 120 file).
2.  **Automazione Script di Merge**: Creare script per la gestione automatica dei conflitti comuni e la validazione pre-commit.
3.  **Aumento Test Coverage**: Portare la copertura dei test per i moduli core sopra il 90%.
4.  **Dashboard Health Check**: Introdurre una dashboard per monitorare lo stato di salute e la compliance di tutti i moduli.

## 🔗 **Link Utili**
<<<<<<< HEAD
- [CHANGELOG](./changelog.md)
- [Guida alla Risoluzione dei Conflitti Git](../../../bashscripts/docs/git-conflict-resolution-guide.md)
- [Convenzioni sui Namespace](./namespace_conventions.md)
- [Linee Guida per il Testing](./testing.md)

## 🤖 **AI Development Tools & Skills**
- [Claude Context (Laravel)](../../../claude.md)
- [AI Agents Guide](../../../../agents.md)
- [Cursor Rules & Skills](../../../../.cursor/readme.md)
- [Skills di progetto](../../../../.cursor/skills/)

## 🔁 **CI & Semantic Versioning**
- Workflow locale del modulo: `.github/workflows/semantic-versioning.yml`
- Scopo: tagging semantico del modulo quando serve rilasciare
 - Attestazione build provenance: step `actions/attest-build-provenance@v3`
 - Workflow root progetto: `/.github/workflows/*.yml`

## 🚀 Release su GitHub
Le release sono basate su tag Git e possono includere release notes generate automaticamente.
Workflow locale: `.github/workflows/release.yml`.


## 📄 License & Authors

**Authors:**
- marco sottana <marco.sottana@gmail.com>

**License:** MIT
=======
- [CHANGELOG](./CHANGELOG.md)
- [Guida alla Risoluzione dei Conflitti Git](../../../bashscripts/docs/git-conflict-resolution-guide.md)
- [Convenzioni sui Namespace](./namespace_conventions.md)
- [Linee Guida per il Testing](./testing.md)
>>>>>>> 4b6b99016 (first commit)
=======
---
title: "Xot Module Documentation"
type: documentation
tags: [module, documentation]
created: 2026-06-05
updated: 2026-06-05
---

# Modulo Xot - Documentazione

## Overview

Il modulo **Xot** è il nucleo fondativo dell'intero progetto [PROJECT_NAME] platform. Fornisce classi base, trait, servizi e configurazioni condivise da tutti gli altri moduli.

## Architettura

### Classi Base Principali

| Classe | Scopo | Estende |
|--------|-------|---------|
| `XotBaseModel` | Modello base per tutti i moduli | `Illuminate\Database\Eloquent\Model` |
| `XotBaseMigration` | Migrazioni anonime standardizzate | `Illuminate\Database\Migrations\Migration` |
| `XotBaseResource` | Risorse Filament base | `Filament\Resources\Resource` |
| `XotBaseServiceProvider` | ServiceProvider modulare | `Illuminate\Support\ServiceProvider` |
| `XotBaseWidget` | Widget Filament base | `Filament\Widgets\Widget` |
| `XotBaseWizardWidget` | Widget con form wizard multi-step (Filament `Wizard` / `Step`) | `XotBaseWidget` |

### Trait Fondamentali

- `HasXotTable`: Gestione tabelle Filament centralizzata
- `InteractsWithForms`: Gestione form nei widget
- `RelationX`: Relazioni many-to-many estese

## Collegamenti
- [Installazione stack LAMP / PHP 8.4 (Debian, repo Sury)](./lamp/install.txt)
- [Vite Configuration](./vite-configuration.md)
- [Theme Assets Workflow](./theme-assets-workflow.md)
- [BMAD Method (progetto)](../../../docs/bmad/setup-guide.md) — processo AI/agile e artefatti `_bmad-output/`

- [Documentazione Root](../../../docs/XOT_MODULE.md)
- [Regole Architettura](./architecture/)
- [PHPStan Configuration](./phpstan/)

## Regole Critiche

1. **MAI estendere direttamente classi Laravel/Filament** - Usare sempre wrapper Xot
2. **Configurazione PHPStan solo in `laravel/phpstan.neon`**
3. **Tutte le migrazioni devono usare classi anonime**

## Backlinks

- [User Module](../User/docs/)
- [UI Module](../UI/docs/)
- [Tenant Module](../Tenant/docs/)

## LLM Wiki Workflow

- Canonical wiki layer: [../../../../docs/wiki/README.md](../../../../docs/wiki/README.md)
- Governance page: [../../../../docs/wiki/concepts/llm-wiki-governance.md](../../../../docs/wiki/concepts/llm-wiki-governance.md)


## Standard Rules & Workflow

- [[BMAD Method](../../../../docs/wiki/concepts/bmad-method.md)]
- [[Context Engineering](../../../../docs/wiki/concepts/context-engineering.md)]
- [[LLM Wiki Governance](../../../../docs/wiki/concepts/llm-wiki-governance.md)]
>>>>>>> dev
