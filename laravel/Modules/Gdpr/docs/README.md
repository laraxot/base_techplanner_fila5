<<<<<<< .merge_file_AcgO3D
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
<<<<<<< HEAD
>>>>>>> .merge_file_V8eKP2
---
qmd: "README"
issues: []
discussions: []
title: "Gdpr Module Documentation"
type: documentation
tags: [module, documentation]
created: 2026-06-05
updated: 2026-10-14
status: active
---

# Modulo Gdpr

Ingresso della documentazione del modulo. Ogni affermazione qui sotto e' stata confrontata con il codice il 2026-10-14; dove non e' stata verificata e' scritto.

## Identita' e ownership

- Namespace `Modules\Gdpr`, alias `gdpr`, repository git separato (`laraxot/module_gdpr_fila5`).
- Provider in `module.json`: `GdprServiceProvider`, `Providers\Filament\AdminPanelProvider`. Il primo e' anche in `laravel/config/app.php`. Il modulo e' `true` in `laravel/modules_statuses.json` e in `laravel/config/local/fixcity/modules_statuses.json`.
- Dati su connessione `gdpr` (modelli `BaseModel` e `Profile`), tabelle `treatments`, `consents`, `gdpr_events`.
- Dipendenza Composer dichiarata: `statikbe/laravel-cookie-consent`; il codice usa classi di Xot, Tenant e User (`GetTenantConfigArrayAction`, `CreateUserAction`, `UserRegistered`).

## Cosa contiene davvero

| Area | Contenuto verificato | Percorso |
|---|---|---|
| Modelli | `Treatment`, `Consent`, `Event`, `Profile`; trait `HasGdpr` (`hasGivenConsent`, `giveConsent`, `revokeConsent`, `getMissingRequiredConsents`); enum `ConsentType` (14 casi) | `app/Models/`, `app/Enums/ConsentType.php` |
| Registrazione | widget Livewire `Filament\Widgets\Auth\RegisterWidget`, usato dal tema Sixteen (`Themes/Sixteen/resources/views/components/pages/auth-register.blade.php`) | `app/Filament/Widgets/Auth/` |
| Actions | `ValidateGdprConsentAction`, `ValidateUserDataAction`, `CollectGdprConsentsAction`, `SaveGdprConsentsAction`, `SaveRegistrationConsentsAction`, `UpdateGdprConsentsAction`, `HandleSuccessfulRegistrationAction`, `HandleRegistrationErrorAction` | `app/Actions/` |
| Listener | `SaveGdprConsents` (evento `Modules\User\Events\UserRegistered`); nessun codice di `app/`, `Modules/*/app` o `Themes` dispatcha quell'evento (grep del 2026-10-14), quindi la registrazione non raggiunge il listener: salva i consensi solo `RegisterWidget` | `app/Listeners/` |
| Admin Filament | 4 risorse (`Consent`, `Event`, `Profile`, `Treatment`) e un cluster `Profile`; 5 file di policy (una e' la base `GdprBasePolicy`) | `app/Filament/`, `app/Models/Policies/` |
| Cookie | middleware `CookieConsentMiddleware` aggiunto al gruppo `web` solo se `GdprData::make()->cookie_banner_on`. Il 2026-10-14 un'altra sessione sta aggiungendo `app/Actions/Cookie/`, `CookieData`, `CookieInventoryData`, `CookieCategory` e `resources/views/cookie-consent/` (non committati): questo ingresso non li descrive | `app/Providers/GdprServiceProvider.php` |
| Traduzioni | `it`, `en`, `de` per consensi e registrazione; `fr`, `es`, `ru` solo `register.php` e `new-keys.php` | `lang/` |
| Test | 256 chiamate `it()`/`test()` in 37 file; Pest ne ha eseguiti 254 il 2026-10-14 | `tests/` |

Tenant Fixcity: `laravel/config/local/fixcity/gdpr.php` e `Modules/Fixcity/config/gdpr.php` impostano `cookie_banner_on => false`, quindi il banner cookie e' spento.

## Cosa NON fornisce (limiti verificati)

1. Nessuna rotta applicativa e nessuna pagina pubblica: `routes/web.php` e `routes/api.php` sono vuoti e `php artisan route:list --json` (461 rotte totali) mostra 24 rotte del modulo, tutte del pannello Filament `gdpr/admin`. L'informativa privacy (art. 13) non e' servita da questo modulo: il testo del tenant e' letto da `Modules\Fixcity\Actions\GetPublishedPrivacyPolicyAction` e valutato da `AssessPrivacyPolicyAction` (DCP-130). La story `stories/12.1.gdpr-owns-legal-pages.story.md` prevede che Gdpr possieda Privacy e Termini, ma dice di non implementarlo.
2. I consensi di registrazione possono non essere salvati. `SaveGdprConsentsAction` e `SaveRegistrationConsentsAction` creano un `Consent` solo se esiste la riga `Treatment` con nome `privacy_policy`, `terms_conditions` o `marketing_consent`. Quelle righe nascono solo da `database/seeders/TreatmentsTableSeeder.php`, che `GdprDatabaseSeeder` non richiama. Misura del 2026-10-14 sul DB di sviluppo (tinker, sola lettura): `Treatment` 0, `Consent` 0. Tracciato in DCP-135.
3. Nessun export dei dati dell'utente, nessuna procedura per i diritti dell'interessato, nessun job di conservazione o anonimizzazione, nessun registro dei trattamenti utilizzabile (la tabella e' vuota). `app/Actions/` non contiene nulla di simile. `spatie/laravel-personal-data-export` e `spipu/html2pdf` sono nel `vendor/` del progetto ma nessun file di `app/` li usa. Vedi DCP-140, DCP-141, DCP-142.
4. `config/config.php` dichiara chiavi (`retention`, `processing_register`, `data_subject_rights`, `security_measures`, `dpo`) che nessun codice legge: `GdprData` legge solo `cookie_banner_on`. Contiene inoltre dati di un altro progetto (`insurance_consents` e `privacy_documents` con file di compagnie assicurative: `Informativa_Privacy_Generali.pdf`, `Informativa_Privacy_Oris_Broker.pdf`): non vanno usati per Fixcity.
5. `config/consent.php` usa nomi di trattamento (`gdpr.privacy`, `gdpr.marketing`) diversi da quelli letti dalle Actions; nessun file di `app/` legge `consent.treatments`.
6. `app/Filament/Widgets/Auth/RegisterWidget.php` ha nel docblock marcatori di merge irrisolti (`<<<<<<< HEAD`, `>>>>>>> 12e4ae8`): non e' un errore funzionale, ma il file va ripulito (DCP-135).

## Quick start

Sempre da `laravel/`.

```bash
# stato dei dati di consenso (sola lettura, verificato il 2026-10-14)
php artisan tinker --execute='echo \Modules\Gdpr\Models\Treatment::query()->count()." ".\Modules\Gdpr\Models\Consent::query()->count();'

# test su database usa-e-getta (mai sul DB di sviluppo); la variabile vuota serve perche' lo script
# fallisce con `unbound variable` se .env non definisce DB_DATABASE_LIMESURVEY
DB_DATABASE_LIMESURVEY= bash ../bashscripts/tools/pest-scratch-db.sh Modules/Gdpr/tests
```

Esito del secondo comando il 2026-10-14: 68 passati, 186 falliti; i Feature falliscono con `A facade root has not been set` (app Laravel non avviata nel test), quindi la suite non e' oggi una prova di regressione. Causa non indagata. Il seeder dei trattamenti non e' stato eseguito: scrive sul DB di sviluppo e la decisione e' in DCP-135. Registro della verifica: [wiki/log.md](./wiki/log.md).

## Mappa della documentazione

L'indice operativo e' [00-INDEX.md](./00-index.md); l'indice per argomento e' [index.md](./index.md). Le decisioni sono in [decision-log.md](./decision-log.md), il lavoro in corso nelle story di [stories/](./stories/), la memoria locale in [wiki/](./wiki/).

## AI Workflows
- [AI Methodologies](./ai-methodologies.md)

## Documentation

<<<<<<< .merge_file_AcgO3D
- [On-Demand Pattern](./ON-DEMAND-PATTERN.md): Pattern per caricamento efficiente
- [QMD Setup](./QMD-SETUP.md): Configurazione ricerca locale
- [Performance](./PERFORMANCE-OPTIMIZATION.md): Metriche e best practice
- [Project Structure](./PROJECT-STRUCTURE.md): Directory layout
=======
- [On-Demand Pattern](./ON-DEMAND-PATTERN.md) — Pattern per caricamento efficiente
- [QMD Setup](./QMD-SETUP.md) — Configurazione ricerca locale
- [Performance](./PERFORMANCE-OPTIMIZATION.md) — Metriche e best practice
- [Project Structure](./PROJECT-STRUCTURE.md) — Directory layout
=======
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_V8eKP2
