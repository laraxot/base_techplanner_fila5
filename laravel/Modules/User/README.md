<<<<<<< HEAD
# User Module

[![Laravel 12.x](https://img.shields.io/badge/Laravel-12.x-red.svg)](https://laravel.com/)
[![Filament 5.x](https://img.shields.io/badge/Filament-5.x-blue.svg)](https://filamentphp.com/)
[![PHPStan Level 10](https://img.shields.io/badge/PHPStan-Level%2010-brightgreen.svg)](https://phpstan.org/)
[![PHP 8.3+](https://img.shields.io/badge/PHP-8.3+-blue.svg)](https://php.net)
[![Models 42](https://img.shields.io/badge/Models-42-orange.svg)](#modelli)
[![Resources 26](https://img.shields.io/badge/Resources-26-purple.svg)](#filament)

> **Sistema completo di autenticazione e autorizzazione**: 42 modelli, 26 resource Filament, 8 widget, multi-auth (OAuth/SSO), RBAC con Spatie, team, tenant, device tracking e OTP.

---

## Cosa fa

Il modulo User gestisce l'intero ciclo di vita dell'utente: registrazione, autenticazione multi-metodo (password, OAuth, SSO, OTP), autorizzazione basata su ruoli e permessi (Spatie), organizzazione in team e tenant, tracciamento dispositivi e sessioni.

```php
// Autenticazione con device tracking
$user = User::authenticate($credentials);
app(GetCurrentDeviceAction::class)->execute($user, $request);

// RBAC con Spatie
$user->assignRole('admin');
$user->givePermissionTo('manage-surveys');

// Team e tenant
$user->teams()->attach($team);
$user->tenants()->attach($tenant);
```

---

## Modelli (42)

### Autenticazione

| Modello | Funzione |
|---------|----------|
| **User** | Utente base con traits HasRoles, Notifiable, HasApiTokens |
| **Profile** | Profilo esteso con dati personali |
| **Device** | Dispositivo con fingerprint e geolocalizzazione |
| **OauthClient / OauthToken** | Client e token OAuth (Passport) |
| **SocialiteUser** | Account social collegati |
| **PasswordHistory** | Storico password per policy di rinnovo |

### Autorizzazione (Spatie Permission)

| Modello | Funzione |
|---------|----------|
| **Role** | Ruoli utente (admin, editor, viewer...) |
| **Permission** | Permessi granulari (manage-surveys, view-reports...) |
| **ModelHasRole** | Pivot ruolo-modello |
| **ModelHasPermission** | Pivot permesso-modello |
| **RoleHasPermission** | Pivot ruolo-permesso |

### Organizzazione

| Modello | Funzione |
|---------|----------|
| **Team** | Gruppo di lavoro con membri |
| **TeamUser** | Pivot team-utente con ruolo nel team |
| **Tenant** | Tenant per multi-tenancy |
| **TenantUser** | Pivot tenant-utente |

---

## Azioni (4)

| Action | Funzione |
|--------|----------|
| **GetCurrentDeviceAction** | Identifica/registra dispositivo corrente |
| **ChangePasswordAction** | Cambio password con validazione policy |
| **AlwaysAskPasswordAction** | Forza richiesta password per operazioni sensibili |
| **SendOtpAction** | Invia OTP via email/SMS |

---

## Filament Integration (26 Resource + 8 Widget)

### Resource principali

| Resource | Funzione |
|----------|----------|
| **UserResource** | CRUD utenti completo |
| **RoleResource** | Gestione ruoli con permessi |
| **PermissionResource** | Gestione permessi granulari |
| **TeamResource** | Gestione team e membri |
| **TenantResource** | Gestione tenant |
| **DeviceResource** | Dispositivi registrati |
| **ProfileResource** | Profili utente |
| **OauthClientResource** | Client OAuth |
| + 18 resource aggiuntive per modelli correlati |

### Widget (8)

| Widget | Funzione |
|--------|----------|
| **LoginWidget** | Form di login |
| **LogoutWidget** | Azione logout |
| **RegistrationWidget** | Form registrazione |
| **PasswordExpiredWidget** | Notifica scadenza password |
| **EditUserWidget** | Editor profilo inline |
| **UserStatsChartWidget** | Grafico statistiche utenti |
| **RecentLoginsWidget** | Ultimi accessi |
| **UserOverviewWidget** | Overview utenti attivi |

---

## Autenticazione multi-metodo

| Metodo | Implementazione |
|--------|----------------|
| **Password** | bcrypt con policy complessita |
| **OAuth/SSO** | Laravel Passport, Socialite |
| **OTP** | Email/SMS one-time password |
| **Device Trust** | Fingerprint dispositivo |
| **Password Expiry** | Rinnovo obbligatorio periodico |

---

## Integrazione con altri moduli

```
User ──> Tenant     (multi-tenancy, isolamento dati)
User ──> Activity   (audit trail login/logout/CRUD)
User ──> Notify     (welcome email, reset password, OTP)
<<<<<<< .merge_file_wPAwQO
User ──> healthcare_app    (proprietari survey, accesso dashboard)
=======
<<<<<<< HEAD
User ──> ExternalProject    (proprietari survey, accesso dashboard)
=======
User ──> ModuloEsempio    (proprietari survey, accesso dashboard)
>>>>>>> f04e1ab44 (refactor: update project references from <nome progetto> to PTVX)
>>>>>>> .merge_file_wNthoA
User ──> Meetup     (organizzatori, partecipanti eventi)
User ──> Gdpr       (consensi, profilo privacy)
User ──> Lang       (preferenza lingua utente)
```

---

## Quick Start

```bash
php artisan module:enable User
php artisan migrate

# Crea utente admin
php artisan tinker
>>> $user = Modules\User\Models\User::factory()->create();
>>> $user->assignRole('admin');
```

---

## Metriche

| Metrica | Valore |
|---------|--------|
| **Modelli** | 42 |
| **Resource Filament** | 26 |
| **Widget Filament** | 8 |
| **Azioni** | 4 |
| **Metodi auth** | 5 (password, OAuth, SSO, OTP, device) |
| **PHPStan Level** | 10 |

---

**Module Type**: Authentication & Authorization
**Architecture**: Spatie Permission, Laravel Passport, multi-tenant RBAC
**Quality**: PHPStan Level 10, 42 modelli tipizzati

*Autenticazione, autorizzazione e organizzazione utenti: dal login all'RBAC, dal team al tenant.*
=======
# 👤 User

[![Domain-Auth](https://img.shields.io/badge/Domain-Auth%20%26%20Teams-1565C0.svg)](#)
[![Laravel 12](https://img.shields.io/badge/Laravel-12-red.svg)](https://laravel.com/)
[![Filament 5](https://img.shields.io/badge/Filament-5-ffab00.svg)](https://filamentphp.com/)
[![PHP 8.4+](https://img.shields.io/badge/PHP-8.4+-777BB4.svg)](https://php.net/)
[![PHPStan Level 10](https://img.shields.io/badge/PHPStan-Level%2010-brightgreen.svg)](https://phpstan.org/)
[![PSR-12](https://img.shields.io/badge/Code-PSR--12-blue.svg)](https://www.php-fig.org/psr/psr-12/)
[![Strict Types](https://img.shields.io/badge/PHP-strict__types-1-informational.svg)](#)
[![Laraxot Modules](https://img.shields.io/badge/Architecture-Modular-purple.svg)](#)
[![FixCity Platform](https://img.shields.io/badge/Platform-FixCity-008758.svg)](#)

> **Chi entra, cosa può fare, su quale team.** Auth AGID-ready, ruoli Spatie, profili — senza compromessi sicurezza.

---

## Perché esiste

Identità e autorizzazione per cittadini, operatori e multi-tenant.

## Superpoteri

- Login widget Filament + Folio/Volt
- Ruoli e permessi Spatie
- Team, inviti, profilo
- Integrazione GDPR e activity log

## Certificazioni

| Certificazione | Stato |
|----------------|-------|
| PHPStan livello 10 | Target progetto |
| `declare(strict_types=1)` | Su nuovo codice PHP |
| Filament 5 + XotBase | Admin enterprise |
| Test PHPUnit / Pest | Suite modulo |
| Documentazione wiki | Cartella `docs/` |

## Vuoi entrare nel team?

Security-minded dev? Qui si definisce **chi è autorizzato** su FixCity.

Stack frontoffice: **Tailwind · Alpine · Lit · DaisyUI · Flowbite · Filament v5** — vedi [STORY-133](../../../docs/stories/STORY-133-frontend-stack-religion-tailwind-alpine-lit.md).

---

## Documentazione

| Lingua | Link |
|--------|------|
| 🇮🇹 Presentazione | Questo file (`README.md`) |
| 🇬🇧 Business card | [docs/readme-en.md](./docs/readme-en.md) |
| 📚 Wiki tecnica | [./docs/wiki/](./docs/) |

---

**Modulo** `user` · **Laraxot** · **FixCity Platform** · PHPStan 10 · Filament 5
>>>>>>> origin/dev
