---
title: "PHPStan modules a zero errori: slice UI"
type: story
module: UI
status: done
created: 2026-11-26
updated: 2026-11-26
qmd: "phpstan modules zero remediation UI pest.expectation.redundant phpstan.path file does not exist archive docs-legacy"
tags: [phpstan, pest, remediation, docs-reorg]
---

## Scopo

Portare a zero gli errori `phpstan analyse Modules` nella fetta UI (con Lang, Media e Notify, stessa lane dello swarm di remediation), correggendo la sorgente e non il messaggio.

## Causa alla sorgente

1. `pest.expectation.redundant` in `tests/Unit/Views/FilamentLayoutDirectivesTest.php`: `Safe\glob()` restituisce `list<string>`, quindi dentro il `foreach` `$layout` e' sempre `string`. L'asserzione `expect($layout)->toBeString()` e la guardia `if (! is_string($layout)) { continue; }` erano codice morto: non potevano mai fallire.
2. `phpstan.path` ("File ... does not exist") su `ResolveLocalizedBlockDataAction.php`: non e' un difetto di tipo. Il file e' stato rinominato da un altro processo in `GetLocalizedBlockDataAction.php` (nel working tree: ` D` per il vecchio nome, `??` per il nuovo, e `GetAllBlocksAction.php` modificato) mentre PHPStan girava. La cache dei risultati puntava ancora al vecchio percorso. Dopo `phpstan clear-result-cache` il finding non si ripresenta.
3. Stesso meccanismo (corsa con la riorganizzazione documentale) per i `phpstan.path` di Lang e Media sotto `archive/docs-legacy/...`: i `.php` tracciati stanno in `Modules/<M>/docs/` (esclusa da `excludePaths: ./*/docs/*`); la riorganizzazione li ha spostati per un momento in `archive/docs-legacy/`, che non e' escluso, PHPStan li ha scoperti e poi la cartella e' sparita. `git log --all` non ha mai tracciato `Lang/archive` ne' `Media/archive`.
4. `generics.notGeneric` su `Notify\Models\NotificationTemplate`: risolto a monte dalla lane Xot rendendo generico `HasCommonScopes` (`@template TModel of Model`). Nessuna modifica in UI.

## Cosa e' cambiato

- `Modules/UI/tests/Unit/Views/FilamentLayoutDirectivesTest.php`: tolte l'asserzione ridondante e la guardia `is_string` morta. Il comportamento del test e' identico: continua a verificare che nessun layout in `resources/views/components/layouts/*.blade.php` nomini `cms::` o `Modules\Cms` fuori dai commenti Blade.

## Verifica

- `./vendor/bin/phpstan analyse Modules/UI/tests/Unit/Views/FilamentLayoutDirectivesTest.php`: `[OK] No errors`.
- `php -l` pulito, `pint` passed.
- `./vendor/bin/phpstan analyse Modules/{Lang,Media,UI,Notify}` (uno alla volta, dopo `clear-result-cache`): `[OK] No errors` per tutti e quattro.
- Pest non eseguibile qui (`.env.testing` senza DB_USERNAME): comportamento provato per lettura, la rimozione riguarda solo codice irraggiungibile per tipo.

## Aperto

- Raccomandazione (solo proposta, nessun file toccato): la riorganizzazione documentale dovrebbe spostare i `.php` fuori da `docs/` solo in cartelle gia' coperte da `excludePaths`, oppure lo scaffolding `archive/docs-legacy/` va aggiunto a `excludePaths` di `laravel/phpstan.neon` (file non modificabile da questa lane). Altrimenti ogni passaggio di PHPStan durante una riorganizzazione produce falsi `phpstan.path`.
- Ogni run PHPStan concorrente durante rinomine/spostamenti puo' ripresentare i `phpstan.path`: la cura e' `phpstan clear-result-cache` e rilancio a riorganizzazione ferma.

## GitHub (tracciamento)

- Issue https://github.com/festionali/base_restaurant_fila5/issues/79
- Discussion https://github.com/festionali/base_restaurant_fila5/discussions/80
