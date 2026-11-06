---
title: "[DEV] Full PHPStan pass on all Modules"
type: dev-story
status: done
created: 2026-10-06
tags: [phpstan, swarm, lessons-learned]
---
# Dev Story — PHPStan 843 → 0

## Technical Plan
Swarm di 9 subagent su ambiti disgiunti (Xot app, Xot resto, Cms, Lang, User, Geo, Notify, 9 moduli piccoli, tema Sixteen), errori mescolati in ordine casuale (seed 20261006), brief unico con regole dure (scopo prima dell'errore, niente cancellazioni, git read-only, enum, BMAD, docs).

## Implementation Steps
1. [x] Baseline JSON, split per gruppo
2. [x] Brief condiviso + 9 agent in parallelo
3. [x] Controllo per modulo (cancellazioni, lint, mtime vs inizio sessione)
4. [x] Run globale a result-cache pulita → 0
5. [x] Docs/BMAD per modulo + questa storia

## Verification
```bash
cd laravel && ./vendor/bin/phpstan clear-result-cache && ./vendor/bin/phpstan analyse Modules --memory-limit=-1
./vendor/bin/pest Modules/Cms/tests Modules/Notify/tests Modules/User/tests   # in ambiente sqlite
```

## Lessons Learned
- `typeCoverage.constantTypeCoverage` (158) e `classConstant.nativeTypeNotSupported` si escludono a vicenda se PHPStan assume PHP 8.2: PHPStan legge `composer.json require.php`. Risolto da `phpVersion: 80400` in `phpstan.neon` (modifica umana, 21:21).
- Una variabile "mai letta" è spesso logica persa: `git log -p` sulla riga spiega l'intento (es. `morphToManyX`, fallback email Cms).
- `$_x` / `@phpstan-ignore` / `@var` bugiardi zittiscono senza correggere.
- Classi anonime nei test: PHPDoc non risolto + result-cache condivisa tra agent paralleli = errori fantasma. Fixture con nome in `tests/Fixtures`; `phpstan clear-result-cache` prima del conteggio finale.
- Moduli = repo git autonomi: controllare cancellazioni con `git -C <modulo> status`, non solo dal root; confrontare mtime con l'inizio sessione per distinguere lavoro altrui.
- Test di sola istanziazione (variabile non letta) = asserzione persa.

## Decisioni aperte (utente)
Vedi report di sessione: Job `Schedule.status` boolean vs enum string; Lang colonna `status` mancante; APNs/WebPush simulati; token device; duplicati orfani (Geo Bing, Cms PageSchemaBuilder, User listener, Notify enum); `Themes/Sixteen/src/` non autoloaded con conflitti di merge; `Modules/{AI,Employee}/Enums/` orfane.
