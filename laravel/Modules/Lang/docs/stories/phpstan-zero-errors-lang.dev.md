---
title: "[DEV] PHPStan zero errors nel modulo Lang"
type: dev-story
status: review
created: 2026-10-28
updated: 2026-10-28
tags: [phpstan, lang, rebase-regression, lessons-learned]
---
# Dev Story — Lang 213 → 0

## Technical Plan
1. Raggruppare per causa: 3 famiglie (fixture sparite, import persi, script `docs/*.php`), non 213 righe.
2. Per ogni classe "non trovata": `git log --all --diff-filter=D` + `git show <commit>^:path` → capire se cancellata per scelta o per errore.
3. Verificare i lineage: `b3d8baa2` (upstream) e `7fb93059` (merge) hanno le 19 fixture; `d8c78ba7` ne ha 2. Cancellazione per errore → ripristino verbatim.

## Implementation Steps
1. [x] Diagnosi `d8c78ba7` = replay di `ceaed311` con marcatori di conflitto committati
2. [x] Fixture ripristinate (17), commenti che giustificano i `mixed` riportati
3. [x] Import persi reinseriti; `buildAdminLanguageUrl` di nuovo `public`
4. [x] `schemaFromRecord()` estratto; `putTranslationFile()` normalizzato
5. [x] Script `docs/*.php`: `Safe\`, shape, narrowing su `glob()`
6. [x] `phpstan analyse Modules/Lang` → exit 0; `php -l` pulito

## Verification
```bash
cd laravel && ./vendor/bin/phpstan analyse Modules/Lang --memory-limit=-1 --no-progress   # exit 0
git -C Modules/Lang status --short | grep -E '^ ?D'                                       # nessuna cancellazione
# Pest: NON eseguito (MySQL in .env.testing). Da lanciare su replica *_test / sqlite.
```

## Lessons Learned
- Un commit di rebase con marcatori di conflitto non e' un cambio voluto: `git show <c> --stat` con 600+ file e fixture sparite = replay di un commit vecchio. Confrontare con l'ultimo merge coerente prima di "correggere" i test.
- Le fixture in `tests/Fixtures` sono parte della specifica dei test: cancellarle senza cancellare i test che le importano produce ~100 errori a valanga da una causa sola.
- Un metodo che i test chiamano direttamente e' API pubblica: se diventa `private`, ripristinare la visibilita' invece di testarlo via reflection.
- Stub che sovrascrivono metodi inesistenti nel genitore non danno errore PHPStan (niente `#[Override]`) ma i test non coprono nulla: serve `#[\Override]` sugli stub per scoprirli (vedi LANG-17.4).
- `glob()` ritorna `list<string>|false`: con `Safe\glob` il tipo e' gia' stretto; `foreach` su ogni elemento con `is_string` solo se la sorgente resta `mixed`.

## Decisioni aperte
Vedi `phpstan-zero-errors-lang.story.md` (resto del replay `d8c78ba7`, seam morti, colonna `status`, doc `*-1.md`).
