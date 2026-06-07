<<<<<<< HEAD
<<<<<<< HEAD
# 🛡️ **Gdpr Module** - Privacy, Compliance & Data Sovereignty

[![Laravel 12.x](https://img.shields.io/badge/Laravel-12.x-red.svg)](https://laravel.com/)
[![PHPStan level 10](https://img.shields.io/badge/PHPStan-Level%2010-brightgreen.svg)](https://phpstan.org/)
[![Compliance](https://img.shields.io/badge/GDPR-Fully%20Compliant-blue.svg)](https://gdpr-info.eu/)

> **🚀 Modulo Gdpr**: L'armatura legale ed etica dell'applicazione. Fornisce un framework robusto per la gestione dei trattamenti dati, la registrazione dei consensi e la produzione di audit trail immutabili in conformità con il Regolamento (UE) 2016/679.

## 📋 **Panoramica**

Il modulo **Gdpr** integra la "Privacy by Design" nel cuore dell'architettura Laraxot.

- 📜 **Trattamenti Granulari**: Definizione di finalità, basi giuridiche e periodi di conservazione.
- 🗳️ **Consenso Esplicito**: Tracciamento UUID-based dei consensi prestati dagli utenti (o profili anonimi).
- 🕒 **Audit Immutabile**: Registrazione di ogni evento di privacy (accesso, rettifica, opposizione).
- 📄 **Compliance Reporting**: Export automatico di report PDF per dimostrare la conformità ai sensi dell'Art. 30 GDPR.
- 🍪 **Cookie Sovereignty**: Sistema di gestione cookie integrato con controllo dinamico degli script.

## ⚡ **Funzionalità Core**

### 🧩 **UUID-First Privacy**
Ogni record relativo alla privacy utilizza UUID per evitare l'esposizione di ID sequenziali e garantire l'anonimizzazione in fase di analisi.

### 🧘 **Philosophical Design**
Il dato appartiene all'individuo. Il sistema ne è solo il custode temporaneo per finalità specifiche e documentate.

## 🚀 **Quick Start**

### 📦 **Verifica Consenso**
```php
if ($user->hasGivenConsent('marketing')) {
    // Invia comunicazioni promozionali
}
```

### ⚙️ **Registrazione Evento Privacy**
```php
app(LogPrivacyEventAction::class)->execute($user, 'data_access', 'Visualizzazione cartella clinica');
```

## 📚 **Documentazione Centrale**

- 📖 **[Indice Documentazione](./00-index.md)** - Mappa di navigazione completa.
- 🙏 **[Filosofia Privacy](./philosophy.md)** - I comandamenti della sovranità digitale.
- 🗺️ **[Compliance Roadmap](./gdpr-compliance-roadmap.md)** - Evoluzione normativa del modulo.
- 🔬 **[Testing Guidelines](./testing.md)** - Come verifichiamo la tenuta legale dei log.

---

**🔄 Ultimo aggiornamento**: 31 Gennaio 2026
**📦 Versione**: 2.3.0
**✅ PHPStan level 10**: Compliance nativa garantita

## 🚀 Release su GitHub
Le release sono basate su tag Git e possono includere release notes generate automaticamente.
Workflow locale: `.github/workflows/release.yml`.


## 📄 License & Authors

**Authors:**
- Marco Sottana <marco.sottana@gmail.com>

**License:** MIT
=======
# Modulo Gdpr - Documentazione

## Panoramica

Il modulo Gdpr gestisce il sistema completo di compliance GDPR per l'applicazione Laraxot PTVX. Implementa la gestione dei consensi, dei trattamenti dati e degli eventi di privacy in conformità con il Regolamento Generale sulla Protezione dei Dati (GDPR).

## Business Logic

### Sistema di Consensi
Il modulo implementa un sistema completo per la gestione dei consensi:

#### 1. Trattamenti (Treatments)
- **Definizione Trattamenti**: Configurazione dei diversi tipi di trattamento dati
- **Documentazione**: Versioni documenti e URL per informativa privacy
- **Ponderazione**: Sistema di pesi per priorità dei trattamenti
- **Stati**: Attivo/Inattivo e Obbligatorio/Opzionale

#### 2. Consensi (Consents)
- **Tracciamento Consensi**: Registrazione esplicita dei consensi per trattamento
- **Soggetti**: Collegamento a utenti o profili anonimi
- **Audit Trail**: Tracciamento completo data/ora e operatore
- **UUID Based**: Sistema UUID per identificazione univoca

#### 3. Eventi Privacy (Events)
- **Eventi di Privacy**: Registrazione di tutti gli eventi privacy rilevanti
- **Categorizzazione**: Diversi tipi di eventi (accesso, modifica, cancellazione)
- **Contesto**: Dettagli completi su cosa, quando, chi

#### 4. Profili (Profiles)
- **Gestione Profili**: Dati anagrafici per soggetti non utenti del sistema
- **Privacy by Design**: Architettura orientata alla privacy

## Componenti Principali

### Modelli Core
- **Treatment**: Definizione e configurazione dei trattamenti dati
- **Consent**: Registrazione consensi specifici per trattamento
- **Event**: Eventi di privacy e audit trail
- **Profile**: Gestione profili per privacy

### Filament Resources
Il modulo espone 4 risorse Filament per la gestione completa:

- **TreatmentResource**: Gestione definizioni trattamenti
- **ConsentResource**: Registrazione e gestione consensi
- **EventResource**: Visualizzazione eventi privacy
- **ProfileResource**: Gestione profili privacy

### Base Architecture
- **BaseModel**: Estensione Model con trait Xot (Updater)
- **BasePivot/BaseMorphPivot**: Relazioni pivot per consensi
- **UUID System**: Identificazione univoca per tutti i record
- **Soft Deletes**: Cancellazione logica per audit trail

## Architettura Tecnica

### Pattern Implementati
- **Repository Pattern**: Per gestione dati strutturata
- **Policy Pattern**: Per controllo accessi granulare
- **Observer Pattern**: Per audit automatico eventi
- **Factory Pattern**: Per generazione dati di test

### Integrazione con Altri Moduli
- **User**: Collegamento a utenti del sistema
- **Activity**: Tracciamento completo modifiche
- **Lang**: Sistema traduzioni completo
- **Xot**: Estensione classi base

### Database Architecture
- **Connessione Dedicata**: Usa connessione `user` per dati sensibili
- **UUID Primary Keys**: Identificazione univoca senza sequenzialità
- **Audit Fields**: Tracciamento created_by, updated_by, deleted_by
- **Soft Deletes**: Cancellazione logica per compliance

## Configurazione

### File di Configurazione
- `config/gdpr.php`: Configurazioni principali
- Variabili ambiente per parametri privacy

### Traduzioni
Struttura completa in:
- `lang/it/`: Italiano (principale)
- `lang/en/`: Inglese
- `lang/de/`: Tedesco

Supporto completo per:
- Label e placeholder per tutti i campi
- Messaggi di validazione privacy
- Azioni e operazioni GDPR
- Notifiche e feedback compliance

## Funzionalità Avanzate

### Compliance GDPR
- **Consenso Esplicito**: Registrazione consensi per ogni trattamento
- **Diritto all'Oblio**: Cancellazione dati con audit trail
- **Portabilità Dati**: Export dati in formato strutturato
- **Limitazione Trattamento**: Gestione limitazioni specifiche

### Audit Trail
- **Eventi Automatici**: Registrazione automatica di tutti gli eventi
- **Contesto Completo**: Dettagli su operazioni effettuate
- **Storico Immutabile**: Tracciamento modifiche nel tempo
- **Report Compliance**: Generazione report per verifiche

### Gestione Documenti
- **Versionamento**: Controllo versioni documenti privacy
- **URL Esterne**: Collegamento a documenti informativa
- **Validazione**: Verifica validità documenti
- **Archiviazione**: Storage sicuro documenti

## Testing

### Test Coverage
- Unit test per logica privacy
- Feature test per flussi GDPR
- Test policy e autorizzazioni
- Test audit trail e eventi

### Comandi Test
```bash
php artisan test --filter=Gdpr
php artisan test --filter=ConsentTest
php artisan test --filter=TreatmentTest
php artisan test --filter=PrivacyTest
```

## Collegamenti

### Documentazione Interna
- [Privacy Policy Implementation](./privacy-policy.md)
- [GDPR Compliance Guide](./gdpr-compliance.md)
- [Audit Trail System](./audit-trail.md)
- [Consent Management](./consent-management.md)

### Documentazione Moduli Correlati
- [Modulo Xot Service Provider Architecture](../xot/docs/service-provider-architecture.md)
- [Modulo User Authentication System](../user/docs/README.md)
- [Modulo Activity Audit Trail](../activity/docs/README.md)
- [Modulo Lang Translation System](../lang/docs/README.md)

### Documentazione Esterna
- [GDPR Official Website](https://gdpr.eu/)
- [Laravel Privacy Package](https://github.com/spatie/laravel-permission)
- [Filament GDPR Resources](https://filamentphp.com/plugins/filament-gdpr)

*Ultimo aggiornamento: Sistema di documentazione automatica*
>>>>>>> 4b6b99016 (first commit)
=======
---
title: "Gdpr Module Documentation"
type: documentation
tags: [module, documentation]
created: 2026-06-05
updated: 2026-06-05
---

# Modulo Gdpr

## Overview

Il modulo **Gdpr** fa parte dell'ecosistema Laraxot PTVX.

## Scopo

Gestisce le funzionalità specifiche del dominio Gdpr.

## Struttura

```
Gdpr/
├── app/
│   ├── Models/
│   ├── Filament/
│   └── ...
├── docs/
├── lang/
└── resources/
```

## Dipendenze

- [Xot Base](../Xot/docs/)
- [User Module](../User/docs/)

## Collegamenti

- [Documentazione Root](../../../docs/GDPR_MODULE.md)

## Backlinks

- [Moduli correlati](../README.md)

## AI Workflows
- [AI Methodologies](./ai-methodologies.md)

## Documentation

- [On-Demand Pattern](./ON-DEMAND-PATTERN.md) — Pattern per caricamento efficiente
- [QMD Setup](./QMD-SETUP.md) — Configurazione ricerca locale
- [Performance](./PERFORMANCE-OPTIMIZATION.md) — Metriche e best practice
- [Project Structure](./PROJECT-STRUCTURE.md) — Directory layout
>>>>>>> dev
