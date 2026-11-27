---
qmd: "README"
issues: ["https://github.com/laraxot/base_techplanner_fila5/issues/64"]
discussions: []
title: "Gdpr Module Documentation"
type: documentation
tags: [module, documentation, index]
created: 2026-06-05
updated: 2026-11-19
module: Gdpr
---

# Modulo Gdpr

Punto di ingresso della documentazione del modulo. L'elenco completo, file per file,
è in [index.md](./index.md); qui ci sono solo le aree principali.
Prova dei consensi, cookie banner, registrazione con consensi e cancellazione dell'account (GDPR artt. 7, 17 e 13-14) per i
progetti Laraxot. Pacchetto Composer `laraxot/module_gdpr_fila5`, namespace `Modules\Gdpr`, provider `GdprServiceProvider` e
`Providers\Filament\AdminPanelProvider` (pannello `gdpr::admin`).

Il modulo e' condiviso tra progetti: possiede i **meccanismi** (tabelle, Action, banner, form di registrazione), non i testi
legali, i recapiti del titolare o le scelte di conservazione, che sono del progetto ospite (config del tenant, traduzioni, tema).

## Cosa fa oggi (verificato sul codice)

Il modulo **Gdpr** gestisce la conformità privacy dell'ecosistema Laraxot:

- **Consensi** (`Models/Consent`, `Models/Treatment`, `Models/Event`): trattamenti, consensi
  dati/revocati, storico eventi; salvataggio tramite `Actions/SaveGdprConsentsAction` e
  `Actions/UpdateGdprConsentsAction` (listener `Listeners/SaveGdprConsents` sulla registrazione).
- **Cookie** (`Actions/Cookie`, `Datas/CookieData`, `Datas/CookieInventoryData`,
  `Enums/CookieCategory`): inventario cookie, banner e guardia sui cookie impostati.
- **Account** (`Actions/Account`): cancellazione account ed esportazione dati dell'interessato.
- **Pannello Filament** (`Filament/`): risorse per trattamenti, consensi ed eventi.

## Mappa della documentazione

| Area | Dove |
|------|------|
| Indice completo dei file | [index.md](./index.md) |
| Panoramica e business logic | [gdpr-module-overview.md](./gdpr-module-overview.md), [business-logic-overview.md](./business-logic-overview.md) |
| Architettura | [architecture.md](./architecture.md), [architecture-rules.md](./architecture-rules.md), [architecture/](./architecture/) |
| Consensi e cookie | [consents.md](./consents.md), [cookie-consent.md](./cookie-consent.md), [consent/](./consent/), [_integration/](./_integration/) |
| Pacchetti integrati | [packages/](./packages/) |
| Generazione PDF | [html2pdf/README.md](./html2pdf/README.md), [gdpr-pdf-reports.md](./gdpr-pdf-reports.md) |
| Modelli e migrazioni | [data-models.md](./data-models.md), [models/](./models/), [migrations.md](./migrations.md) |
| Test | [testing.md](./testing.md), [testing/](./testing/) |
| Qualità (PHPStan, DRY/KISS) | [phpstan-fixes.md](./phpstan-fixes.md), [analysis/](./analysis/), [code-quality-report.md](./code-quality-report.md) |
| Roadmap | [roadmap/README.md](./roadmap/README.md), [development/](./development/) |
| Story BMAD | [stories/](./stories/), [bmad/README.md](./bmad/README.md) — audit corrente: [stories/audit-qualita.story.md](./stories/audit-qualita.story.md) |
| Task | [tasks/](./tasks/) |
| Wiki / second brain | [wiki/README.md](./wiki/README.md), [llm-wiki/](./llm-wiki/) |
| Materiale importato (non canonico) | [raw/README.md](./raw/README.md), [root-md-files/](./root-md-files/) |

## Guide operative

- [Getting Started](./getting-started.md) — installazione e configurazione
- [Contributing](./contributing.md) — workflow di sviluppo e checklist
- [On-Demand Pattern](./ON-DEMAND-PATTERN.md) — caricamento efficiente della documentazione
- [QMD Setup](./QMD-SETUP.md) — ricerca locale
- [Performance](./PERFORMANCE-OPTIMIZATION.md) — metriche e best practice
- [Project Structure](./PROJECT-STRUCTURE.md) — layout delle cartelle
- [AI Methodologies](./ai-methodologies.md)
- Link di ricerca: [cloudflare](./cloudflare.md), [filament](./filament.md), [google-analytics](./google-analytics.md), [links](./links.md), [repo](./repo.md)

## Dipendenze

- [Xot](../../Xot/docs/README.md) — classi base XotBase
- [User](../../User/docs/README.md) — soggetti dei consensi
- [Activity](../../Activity/docs/README.md) — log attività

## Convenzioni dei nomi

Niente date nei nomi di file e cartelle (la data va nel frontmatter `created:`),
kebab-case minuscolo. Vedi [file-naming-rules.md](./file-naming-rules.md).
| Funzione | Dove | Pagina |
|---|---|---|
| Prova dei consensi: una riga `consents` per scelta, revoca con `revoked_at` | `Actions/SaveGdprConsentsAction`, `Actions/Consent/*`, trait `HasGdpr` | [consents.md](consents.md) |
| Registrazione con tre consensi (privacy, termini, marketing) | `Filament/Widgets/Auth/RegisterWidget` | [registration.md](registration.md), [register-widget-copy-ownership.md](register-widget-copy-ownership.md) |
| Cancellazione dell'account (soft delete + revoca) | `Actions/Account/DeleteAccountAction`, rotta `account.delete` | [account-deletion.md](account-deletion.md) |
| Banner cookie e inventario dei cookie | `GdprServiceProvider`, `Http/Middleware/InjectCookieBanner`, `Actions/Cookie/GetCookieInventoryAction` | [cookie-banner.md](cookie-banner.md) |
| Back office di trattamenti, consensi, eventi, profili | `Filament/Resources/*`, `Filament/Pages/SettingPage` | [admin-panel.md](admin-panel.md) |

Non c'e' ancora: export dei dati dell'interessato, registro delle richieste, job di purga, DPIA, procedura di violazione
(vedi [data-subject-rights.md](data-subject-rights.md) e [roadmap.md](roadmap.md)).

## Dipendenze

- Pacchetto: `statikbe/laravel-cookie-consent` (il modulo ne sostituisce traduzioni e vista del banner).
- Moduli: `Xot` (base: `XotBaseServiceProvider`, `XotBaseResource`, `XotBaseMigration`), `Tenant` (config per tenant),
  `User` (utente, `CreateUserAction`, token), `UI`. `Activity` e' opzionale (cancellazione dell'account).

## Dove leggere

- Mappa di tutti i documenti: [00-index.md](00-index.md).
- Perche' il codice e' fatto cosi': [adr/README.md](adr/README.md). Cosa promettono le Action: [contracts/README.md](contracts/README.md).
- Regole per chi tocca il modulo: [conventions.md](conventions.md). Debito noto: [code-quality.md](code-quality.md).
