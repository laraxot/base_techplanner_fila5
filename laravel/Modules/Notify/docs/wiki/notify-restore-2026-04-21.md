# Ripristino struttura Notify - 2026-04-21

## Problema

`laravel/Modules/Notify/laravel` conteneva una Laravel app completa annidata dentro il modulo Notify. La directory includeva `artisan`, `config`, `routes`, `storage`, `Themes`, `Modules` e copie di altri moduli. Questo contaminava scansioni, QMD, grep e validazioni statiche.

Inoltre `laravel/Modules/Notify/composer.json` descriveva erroneamente un modulo User/FixCity invece di Notify.

## Intervento

- Rimossa la directory annidata `laravel/Modules/Notify/laravel`.
- Ripristinato `laravel/Modules/Notify/composer.json` usando il composer corretto del modulo Notify.
- L'autoload ora punta a `Modules\\Notify\\` con path `app/`.

## Validazioni

- La directory annidata `laravel/Modules/Notify/laravel` non esiste piu' nel filesystem.
- `composer.json` e' JSON valido.
- PSR-4 contiene:
  - `Modules\\Notify\\` -> `app/`
  - `Modules\\Notify\\Database\\Factories\\` -> `database/factories/`
  - `Modules\\Notify\\Database\\Seeders\\` -> `database/seeders/`
<<<<<<< .merge_file_NPbnsJ
<<<<<<< .merge_file_sLkAdS
- Non restano riferimenti `fixcity/user-module` o `Modules\\User\\` nel composer del modulo.
=======
=======
<<<<<<< .merge_file_KVApmp
- Non restano riferimenti `fixcity/user-module` o `Modules\\User\\` nel composer del modulo.
=======
<<<<<<< .merge_file_sLkAdS
- Non restano riferimenti `fixcity/user-module` o `Modules\\User\\` nel composer del modulo.
=======
>>>>>>> .merge_file_fwgOlr
>>>>>>> .merge_file_niJMkz
- Non restano riferimenti `laraxot/user-module` o `Modules\\User\\` nel composer del modulo.
>>>>>>> .merge_file_HMv5zc

## Nota

Il modulo Notify diretto contiene ancora molti file non tracciati gia' presenti prima dell'intervento. Questo ripristino ha rimosso solo la Laravel app annidata errata e corretto il composer del modulo.
