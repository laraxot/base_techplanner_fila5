![TechPlanner](https://banners.beyondco.de/TechPlanner.png?theme=light&packageManager=composer+install&packageName=base_techplanner_fila5&pattern=charlieBrown&style=style_1&description=Modular+Laravel+platform+for+planning%2C+operations%2C+and+tenancy&md=1&showWatermark=0&fontSize=86px&images=calendar&widths=200&heights=auto)

# TechPlanner

[![PHP 8.4+](https://img.shields.io/badge/PHP-8.4%2B-777BB4.svg)](https://www.php.net/)
[![Laravel 13](https://img.shields.io/badge/Laravel-13-FF2D20.svg)](https://laravel.com/)
[![Filament 5](https://img.shields.io/badge/Filament-5-F59E0B.svg)](https://filamentphp.com/)
[![PHPStan level 10](https://img.shields.io/badge/PHPStan-level%2010-4CAF50.svg)](https://phpstan.org/)
[![Architecture](https://img.shields.io/badge/Architecture-Laraxot%20modular-6F42C1.svg)](#architecture)

TechPlanner è una piattaforma Laravel modulare per pianificazione operativa,
gestione tenant, persone, attività, notifiche, contenuti e integrazioni AI.
Il codice applicativo vive in `laravel/`; moduli e temi sono pacchetti autonomi,
con documentazione, ADR e contratti locali.

## Per iniziare

```bash
cd laravel
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan module:list
```

Per lo sviluppo completo:

```bash
composer dev
```

Non leggere `.env` negli strumenti o nei log: usa `.env.example` e la
configurazione pubblica in `config/`.

## Architecture

| Area | Responsabilità |
| --- | --- |
| `laravel/Modules/Xot` | Fondazioni Laraxot, XotBase, convenzioni e infrastruttura condivisa |
| `laravel/Modules/User` | Identità, autenticazione, ruoli e profili |
| `laravel/Modules/Tenant` | Isolamento e configurazione dei tenant |
| `laravel/Modules/TechPlanner` | Dominio principale della piattaforma |
| `laravel/Modules/Activity` | Audit e tracciamento delle attività |
| `laravel/Modules/Geo` | Geografia, indirizzi e geocoding |
| `laravel/Modules/AI` | Agenti, provider LLM e proposte assistite |
| `laravel/Themes/*` | Front office e asset dei temi |

I moduli possiedono il proprio codice e la propria documentazione. Le pagine
front office usano Folio/Volt; l’amministrazione usa Filament tramite le classi
base XotBase/LangBase. Non si estendono direttamente le classi Filament.

## Qualità e verifica

Prima di chiudere una modifica:

```bash
cd laravel
./vendor/bin/phpstan analyse Modules --memory-limit=-1
composer harness:check
vendor/bin/pest Modules/<Modulo>/tests
```

Il controllo harness verifica ADR, contratti comportamentali, guardie e marker
nel codice. Le Action con effetti collaterali dichiarano il contratto nel
docblock con `@contract docs/contracts/<azione>.md`.

## Documentazione

- [Indice della documentazione](docs/README.md)
- [Wiki on-demand e Second Brain](docs/wiki/index.md)
- [Regole per gli agenti](AGENTS.md)
- [Laravel AGENTS](laravel/AGENTS.md)
- [ADR di progetto](docs/adr/README.md)
- [Contratti di progetto](docs/contracts/README.md)
- [Report degli oggetti Git](docs/git-repositories-object-report.md)

Ogni modulo e tema attivo mantiene:

```text
<package>/README.md
<package>/docs/README.md
<package>/docs/adr/README.md
<package>/docs/contracts/README.md
```

Gli ADR spiegano il perché delle decisioni; i contratti descrivono ciò che
un’Action promette. Un fatto ha un solo proprietario documentale: gli altri
README devono collegarlo, non duplicarlo.

## Harness operativo

L’harness locale adotta il modello del Laravel Day workshop: ogni modifica a
codice o configurazione sensibile deve avere un Task Contract approvato, scope
esplicito, guardie per segreti/migrazioni/dipendenze e una verifica finale con
receipt. La memoria persistente resta nel Second Brain e nelle pagine ADR,
non in prompt duplicati.

## Licenza

Vedi [LICENSE](LICENSE).
