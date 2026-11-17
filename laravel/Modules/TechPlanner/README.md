# TechPlanner

Modulo di dominio per la gestione e pianificazione tecnica delle attivita di aziende di servizi tecnici (verifiche e controlli su dispositivi, ad esempio in ambito sanitario): clienti, appuntamenti, dispositivi, controlli (RX, elettromedicali, intraorali, autorizzazioni sanitarie), uffici legali, rappresentanti legali, direttori sanitari, lavoratori, chiamate e messaggi di contatto. Include risorse Filament e un pannello amministrativo dedicato.

## Requisiti

- PHP ^8.3
- Laravel con Filament 5 e [nwidart/laravel-modules](https://github.com/nWidart/laravel-modules)
- Moduli: Xot, UI, User, Geo, Notify, Media, Lang; `tightenco/parental`

## Installazione

Il modulo vive in `laravel/Modules/TechPlanner` e viene caricato come modulo nwidart (`module.json`).
In alternativa, come pacchetto Composer:

```bash
composer require laraxot/module_techplanner_fila5
```

## Configurazione

Configurazione in `config/` (es. `config.php`, `contact.php`, `morph_map.php`).

## Test

```bash
composer test
```

## Documentazione

Vedi [docs/README.md](docs/README.md).

## Licenza

MIT, vedi [LICENSE](LICENSE).
