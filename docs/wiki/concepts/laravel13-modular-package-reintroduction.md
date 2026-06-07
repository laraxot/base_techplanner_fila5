# Laravel 13 Modular Package Reintroduction

## Scopo

Stabilire una regola unica per la reintroduzione pacchetti dopo upgrade framework: approccio modulare si, ma solo con compatibilita' verificata su lock reale.

## Decisione

- Reintrodurre subito solo i pacchetti compatibili con `Laravel 13` e `PHP 8.3`.
- Mantenere fuori lock i pacchetti incompatibili, documentando il perche'.
- Riesaminare periodicamente i pacchetti bloccati quando cambia il runtime.

## Stato corrente

- **gia' presente e valido**: `fruitcake/laravel-debugbar` in `Modules/Xot` (`require-dev`), risolto nel lock root come `v4.2.8` e compatibile con `Laravel 13` + `PHP 8.3`.
- **bloccati**:
  - `spatie/laravel-responsecache` (latest `8.3.x` richiede `php ^8.4`; la linea `7.7.2` supporta solo `Laravel 10|11|12`);
  - `aaronfrancis/fast-paginate` (supporto stable fino a `illuminate ^12`);
  - `fidum/laravel-eloquent-morph-to-one` (supporto stable fino a `illuminate ^12`);
  - `spatie/laravel-model-states` (latest `2.13.1` supporta `Laravel 12|13` ma richiede `php ^8.4`; la linea `2.12.1` supporta solo `Laravel 10|11|12`).

## Ownership canonica per modulo

- `aaronfrancis/fast-paginate`: owner `Modules/Xot`, perche' `fastPaginate()` e' usato in `Modules/Xot/Filament/Resources/Pages/XotBaseListRecords.php`.
- `fidum/laravel-eloquent-morph-to-one`: owner `Modules/Xot`, perche' il tipo `MorphToOne` e' usato nelle action `Store/Update/MorphToOneAction`.
- `spatie/laravel-model-states`: ownership condivisa `Modules/UI` + `Modules/Xot`; il modulo UI espone componenti Filament che tipizzano `State`/`HasStatesContract`, mentre Xot definisce i base state/transition.
- `spatie/laravel-responsecache`: nessun owner runtime confermato nel codice applicativo corrente; non si reinstalla per analogia o per documentazione storica.
- `fruitcake/laravel-debugbar`: dev-tool cross-app, governato da `Modules/Xot` come supporto trasversale, non da singoli moduli dominio.

## Perche' questa scelta

- Evita regressioni su `composer update -W`.
- Mantiene il framework su `laravel/framework 13.x`.
- Protegge DRY/KISS: niente workaround locali fragili o branch `dev-*` in produzione.

## False friends

- "Se il pacchetto e' citato nei docs del modulo, allora va reinstallato": falso. I docs storici contengono anche stack precedenti e note speculative.
- "Se supporta Laravel 13, allora entra": falso. Il runtime reale include anche il vincolo `PHP 8.3.6`.
- "Se il progetto e' modulare, ogni dipendenza va sparsa nei moduli": falso. I dev-tool e i package cross-app hanno un owner tecnico unico.

## Collegamenti

- [xot compatibility matrix](../../../laravel/Modules/Xot/docs/wiki/concepts/laravel13-modular-package-compatibility-matrix.md)
- [theme boundary](../../../laravel/Themes/Sixteen/docs/wiki/concepts/laravel13-package-boundary-for-themes.md)
