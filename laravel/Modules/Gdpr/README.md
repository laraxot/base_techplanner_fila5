<<<<<<< HEAD
<<<<<<< HEAD
# GDPR Module

[![Laravel 12.x](https://img.shields.io/badge/Laravel-12.x-red.svg)](https://laravel.com/)
[![Filament 5.x](https://img.shields.io/badge/Filament-5.x-blue.svg)](https://filamentphp.com/)
[![PHPStan Level 10](https://img.shields.io/badge/PHPStan-Level%2010-brightgreen.svg)](https://phpstan.org/)
[![PHP 8.3+](https://img.shields.io/badge/PHP-8.3+-blue.svg)](https://php.net)
[![Consent Types 14](https://img.shields.io/badge/Consent%20Types-14-purple.svg)](#enum)

> **Compliance GDPR strutturata**: gestione consensi, trattamenti dati, eventi di audit, profili privacy. UUID su tutte le tabelle, crittografia IP/payload, soft deletes per diritto all'oblio.

---

## Cosa fa

Il modulo GDPR gestisce il ciclo di vita della privacy utente: definisce i trattamenti dati (base giuridica, documenti), raccoglie i consensi (obbligatori e facoltativi), traccia ogni evento con IP e payload crittografati, e fornisce il trait `HasGdpr` per aggiungere il consenso a qualsiasi modello Eloquent.

```php
// Trait HasGdpr su qualsiasi modello
$user->giveConsent($treatment, ConsentType::PRIVACY_POLICY);
$user->hasGivenConsent($treatment); // true
$user->getMissingRequiredConsents(); // Collection vuota
$user->revokeConsent($treatment);

// Ogni azione genera un Event crittografato
// Event: { ip: encrypted, payload: encrypted, action: 'consent_given' }

// 14 tipi di consenso tipizzati
ConsentType::PRIVACY_POLICY;     // Obbligatorio
ConsentType::MARKETING_EMAIL;    // Facoltativo
ConsentType::PROFILING;          // Facoltativo
ConsentType::AUTOMATED_DECISION_MAKING; // Facoltativo
```

---

## Architettura

```
Utente/Modello (qualsiasi con HasGdpr trait)
    |
    +-- giveConsent() / revokeConsent()
    |     |
    |     v
    |   Consent (UUID, morphs user, treatment_id, accepted_at)
    |     |
    |     v
    |   Event (UUID, IP encrypted, payload encrypted, action)
    |
    +-- Treatment (base giuridica, documento, versione, peso)
    |
    +-- ConsentType Enum (14 tipi: required + optional)
    |
    v
  GdprData DTO (branding, cookie banner, configurazione tenant)
```

---

## Modelli (4)

| Modello | Funzione |
|---------|----------|
| **Treatment** | Trattamento dati con base giuridica, documento, versione, peso ordinamento |
| **Consent** | Consenso utente: UUID, relazione polimorfa, treatment_id, accepted_at |
| **Event** | Evento audit: IP crittografato, payload crittografato, azione, timestamps |
| **Profile** | Profilo privacy esteso da User module |

Tutti i modelli usano UUID come chiave primaria e soft deletes.

---

## ConsentType Enum (14 tipi)

```php
// Consensi obbligatori
ConsentType::PRIVACY_POLICY
ConsentType::TERMS_AND_CONDITIONS
ConsentType::AGE_VERIFICATION

// Consensi facoltativi
ConsentType::MARKETING_EMAIL
ConsentType::MARKETING_SMS
ConsentType::MARKETING_PHONE
ConsentType::COOKIES
ConsentType::ANALYTICS
ConsentType::PERSONALIZATION
ConsentType::THIRD_PARTY_SHARING
ConsentType::DATA_TRANSFER
ConsentType::RESEARCH
ConsentType::PROFILING
ConsentType::AUTOMATED_DECISION_MAKING
```

Ogni tipo implementa `HasColor`, `HasIcon`, `HasLabel` con traduzioni automatiche.

---

## Trait HasGdpr

```php
use Modules\Gdpr\Models\Traits\HasGdpr;

class User extends BaseModel
{
    use HasGdpr;
}

// API disponibile
$user->consents();                    // morphMany Consent
$user->activeConsents();              // Solo attivi
$user->treatments();                  // hasManyThrough
$user->hasGivenConsent($treatment);   // bool (con cache)
$user->giveConsent($treatment, $type); // Crea Consent + Event
$user->revokeConsent($treatment);     // Revoca + Event
$user->getMissingRequiredConsents();  // Collection
$user->hasAllRequiredConsents();      // bool
```

---

## Filament Integration

| Resource | Funzione |
|----------|----------|
| **ConsentResource** | CRUD consensi utente |
| **TreatmentResource** | Gestione trattamenti dati |
| **EventResource** | Audit trail eventi GDPR |
| **ProfileResource** | Profili privacy |

| Cluster | Funzione |
|---------|----------|
| **Profile** | Raggruppa Consent + Profile in un'unica sezione |

| Pagina | Funzione |
|--------|----------|
| **Dashboard** | Overview stato compliance |
| **EditProfile** | Editing profilo privacy |

---

## Sicurezza

| Feature | Implementazione |
|---------|-----------------|
| **Crittografia IP** | `$casts['ip'] = 'encrypted'` su Event |
| **Crittografia payload** | `$casts['payload'] = 'encrypted'` su Event |
| **UUID** | Tutte le tabelle usano UUID, non auto-increment |
| **Soft deletes** | Diritto all'oblio con `deleted_at` |
| **User tracking** | `created_by`, `updated_by`, `deleted_by` |
| **Policy-based auth** | GdprBasePolicy con super_admin bypass |
| **Cache consensi** | TTL giornaliero per check rapidi |

---

## Configurazione

```php
// config/config.php
'cookie_consent_lifetime' => 365,        // giorni
'retention_policies' => '5-10 years',    // conservazione dati
'dpo_contact' => 'dpo@example.com',      // Data Protection Officer
'security_measures' => [
    'encryption', 'access_control', 'logging'
],

// config/consent.php
'treatments' => [
    ['name' => 'Privacy Policy', 'required' => true, 'weight' => 0],
    ['name' => 'Marketing',      'required' => false, 'weight' => 1],
],
```

---

## Cookie Consent

Il `GdprServiceProvider` registra condizionalmente il `CookieConsentMiddleware` basandosi sulla configurazione `GdprData` del tenant. Il banner cookie si attiva automaticamente sulle rotte web.

---

## Integrazione con altri moduli

```
Gdpr ──> User     (HasGdpr trait su User, profili privacy)
Gdpr ──> Tenant   (configurazione per tenant, GdprData DTO)
Gdpr ──> Activity (audit trail eventi consenso)
Gdpr ──> Lang     (traduzioni ConsentType IT/EN/DE)
Gdpr ──> Notify   (notifiche cambio consenso)
```

---

## Quick Start

```bash
php artisan module:enable Gdpr
php artisan migrate

# Il trait HasGdpr e gia disponibile su User
# I trattamenti si configurano da Filament
```

---

## Metriche

| Metrica | Valore |
|---------|--------|
| **Modelli** | 4 |
| **Filament Resources** | 4 |
| **Filament Cluster** | 1 (Profile) |
| **Pagine standalone** | 2 |
| **Policy** | 5 |
| **Enum** | 1 (14 tipi consenso) |
| **Trait** | 1 (HasGdpr) |
| **DTO** | 1 (GdprData) |
| **Tabelle DB** | 3 (treatment, consent, event) |
| **PHPStan Level** | 10 |
=======
# 🔒 Gdpr

[![Domain-GDPR](https://img.shields.io/badge/Domain-GDPR%20Compliance-37474F.svg)](#)
[![Laravel 12](https://img.shields.io/badge/Laravel-12-red.svg)](https://laravel.com/)
[![Filament 5](https://img.shields.io/badge/Filament-5-ffab00.svg)](https://filamentphp.com/)
[![PHP 8.4+](https://img.shields.io/badge/PHP-8.4+-777BB4.svg)](https://php.net/)
[![PHPStan Level 10](https://img.shields.io/badge/PHPStan-Level%2010-brightgreen.svg)](https://phpstan.org/)
[![PSR-12](https://img.shields.io/badge/Code-PSR--12-blue.svg)](https://www.php-fig.org/psr/psr-12/)
[![Strict Types](https://img.shields.io/badge/PHP-strict__types-1-informational.svg)](#)
[![Laraxot Modules](https://img.shields.io/badge/Architecture-Modular-purple.svg)](#)
[![FixCity Platform](https://img.shields.io/badge/Platform-FixCity-008758.svg)](#)

> **Privacy non è un checkbox.** Consensi, diritti utente, policy — conformità che regge un audit PA.

---

## Perché esiste

Obbligatorio per servizi pubblici digitali e fiducia del cittadino.

## Superpoteri

- Gestione consensi e revoche
- Privacy policy e documentazione
- Integrazione User/Activity
- Filament per operatori

## Certificazioni

| Certificazione | Stato |
|----------------|-------|
| PHPStan livello 10 | Target progetto |
| `declare(strict_types=1)` | Su nuovo codice PHP |
| Filament 5 + XotBase | Admin enterprise |
| Test PHPUnit / Pest | Suite modulo |
| Documentazione wiki | Cartella `docs/` |

## Vuoi entrare nel team?

Proteggi i dati **per davvero** — con codice e processi.

Stack frontoffice: **Tailwind · Alpine · Lit · DaisyUI · Flowbite · Filament v5** — vedi [STORY-133](../../../docs/stories/STORY-133-frontend-stack-religion-tailwind-alpine-lit.md).
>>>>>>> dev

---

## Documentazione

<<<<<<< HEAD
| Guida | Link |
|-------|------|
| **Indice** | [docs/00-index.md](docs/00-index.md) |
| **Architettura** | [docs/architecture.md](docs/architecture.md) |
| **Compliance Roadmap** | [docs/gdpr-compliance-roadmap.md](docs/gdpr-compliance-roadmap.md) |
| **Sicurezza** | [docs/security.md](docs/security.md) |
| **Cookie Consent** | [docs/cookie-consent.md](docs/cookie-consent.md) |

---

**Module Type**: Privacy & Compliance
**Architecture**: UUID tables, encrypted events, HasGdpr trait, ConsentType enum
**Quality**: PHPStan Level 10

*Compliance GDPR by design: consensi tipizzati, eventi crittografati, trait riutilizzabile su qualsiasi modello.*
=======
# GDPR Module Fila3 🔒 Your All-in-One GDPR Compliance Solution for Laravel 🚀

[![Latest Release](https://img.shields.io/github/v/release/laraxot/module_gdpr_fila3)](https://github.com/laraxot/module_gdpr_fila3/releases)
[![Build Status](https://img.shields.io/travis/laraxot/module_gdpr_fila3/master)](https://travis-ci.org/laraxot/module_gdpr_fila3)
[![Code Coverage](https://img.shields.io/codecov/c/github/laraxot/module_gdpr_fila3)](https://codecov.io/gh/laraxot/module_gdpr_fila3)
[![License](https://img.shields.io/github/license/laraxot/module_gdpr_fila3)](LICENSE)

# Module Gdpr
[![Latest Version on Packagist](https://img.shields.io/packagist/v/laraxot/module_gdpr_fila3.svg?style=flat-square)](https://packagist.org/packages/laraxot/module_gdpr_fila3)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/laraxot/module_gdpr_fila3/run-tests?label=tests)](https://github.com/laraxot/module_gdpr_fila3/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/laraxot/module_gdpr_fila3/Check%20&%20fix%20styling?label=code%20style)](https://github.com/laraxot/module_gdpr_fila3/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/laraxot/module_gdpr_fila3.svg?style=flat-square)](https://packagist.org/packages/laraxot/module_gdpr_fila3)

The **GDPR Fila3** module is designed to help developers and businesses comply with GDPR regulations. It provides tools and features to manage users' personal data, ensuring that it is processed securely and transparently.

## Prerequisites
- php v8+
- laravel
- **[Xot Module](https://github.com/laraxot/module_xot_fila3.git)** (Required)
- **[Tenant Module](https://github.com/laraxot/module_tenant_fila3.git)** (Required)
- **[UI Module](https://github.com/laraxot/module_ui_fila3.git)** (Required)

## Add Module to the Project Base
Inside the `laravel/Modules` folder:

**Module GDPR Fila3** is the ultimate solution for integrating GDPR compliance into your Laravel project. With powerful features to manage user data, consent requests, and access requests, this module helps you ensure your project is fully compliant with GDPR regulations, saving you time and effort. 🛡️

---

### Key Features 🌟
- **User Data Management**: Collect, store, and process user data in compliance with GDPR.
- **Consent Requests**: Manage and record user consent for data processing seamlessly.
- **Data Access & Deletion**: Handle user data requests (access, modification, deletion) with ease.
- **Compliance Reporting**: Generate GDPR compliance reports to stay on top of regulations.
- **Automatic Logging**: Log all data access and processing activities for compliance.

---

### Installation Guide 💻

1. **Install the module:**
    ```bash
    git submodule add https://github.com/laraxot/module_gdpr_fila3.git Gdpr
    ```

2. **Run Migrations:**
    ```bash
    php artisan module:migrate Gdpr
    ```

3. **Enable the module:**
    ```bash
    php artisan module:enable Gdpr
    ```

4. **Check Active Modules:**
    ```bash
    php artisan module:list
    ```

---

### Console Commands 🚀

Manage GDPR features directly from the terminal:

- **List GDPR Requests:**
    ```bash
    php artisan gdpr:list
    ```
    _View all active GDPR requests from users._

- **Generate Compliance Report:**
    ```bash
    php artisan gdpr:report
    ```
    _Generate a report for your GDPR compliance efforts._

- **Log Data Processing Activities:**
    ```bash
    php artisan gdpr:log <activity>
    ```
    _Automatically log data processing activities to ensure transparency._

---

### Configuration 🔧

Customize the module to fit your app's GDPR needs. Update configurations via `module_gdpr_fila3.php` to adapt logging, consent handling, and more.

---

### FAQ ❓

- **Q: How do I manage consent requests?**
  A: Consent requests can be created and tracked within the module. You can set custom policies for consent renewal and updates.

- **Q: Is logging data access automatic?**
  A: Yes! All user data access and processing are automatically logged and can be reviewed at any time.

---

### Author 👨‍💻

Developed and maintained by [Marco Sottana](https://github.com/marco76tv)
📧 Email: marco.sottana@gmail.com

---

### License 📄

This package is open-sourced under the [MIT license](LICENSE).

---

Stay compliant and secure user trust with **Module GDPR Fila3**! 💥

## Verify the Module is Active
```bash
php artisan module:list
```
in caso abilitarlo
```bash
php artisan module:enable Gdpr
```

## Run the Migrations
```bash
php artisan module:migrate Gdpr
>>>>>>> 4b6b99016 (first commit)
=======
| Lingua | Link |
|--------|------|
| 🇮🇹 Presentazione | Questo file (`README.md`) |
| 🇬🇧 Business card | [docs/readme-en.md](./docs/readme-en.md) |
| 📚 Wiki tecnica | [./docs/wiki/](./docs/) |

---

**Modulo** `gdpr` · **Laraxot** · **FixCity Platform** · PHPStan 10 · Filament 5
>>>>>>> dev
