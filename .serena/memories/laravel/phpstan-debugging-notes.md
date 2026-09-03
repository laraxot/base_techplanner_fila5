# PHPStan Debugging Notes

## Parse Error: Malformed PHPDoc

### Symptom
PHPStan crashes with:
```
ParseError: syntax error, unexpected token "*", expecting "function"
in Modules/Xot/app/Filament/Traits/HasXotTable.php:129
```

### Root Cause
Docblock con `@phpstan-ignore` malformato. Pattern problematico:
```php
/** @phpstan-ignore deadCode.unreachable
 * Get table header actions.
 * ...
 * @return array<...>
 */
public function getTableHeaderActions(): array
```

Il `/** @phpstan-ignore TAG` apre un docblock, ma la riga successiva `* Get table...` viene vista come parte del docblock, e `*/` arriva solo alla fine del docblock originale. PHPStan si confonde.

### Soluzione
Usare `* @phpstan-ignore TAG` (riga interna al docblock) invece di `/** @phpstan-ignore TAG` (apertura). Esempio corretto:
```php
/**
 * @phpstan-ignore deadCode.unreachable
 * Get table header actions.
 * ...
 * @return array<...>
 */
public function getTableHeaderActions(): array
```

### Riferimento PHPStan Docs
Tutti gli stili di commento funzionano per `@phpstan-ignore`:
- `// @phpstan-ignore <id>`
- `/* @phpstan-ignore <id> */`
- `/** @phpstan-ignore <id> */`
- `// @phpstan-ignore-next-line`
- `/* @phpstan-ignore-next-line */`

### Note pratiche
- `git stash` prima di sperimentare per recuperare stato pulito
- Verificare sempre con `php -l` dopo modifiche bulk
- In questo progetto: file pulito in git HEAD, i problemi erano stati aggiunti come workaround parziali
- Tutti i moduli (Xot, AI, Cms, Activity, TechPlanner, ecc.) passano PHPStan con 0 errori

## Comandi utili

```bash
# Verificare sintassi
php -l file.php

# PHPStan singolo modulo
./vendor/bin/phpstan analyse Modules/Xot --no-progress --memory-limit=-1

# PHPStan tutti i moduli
./vendor/bin/phpstan analyse Modules --no-progress --memory-limit=-1

# Contare errori per tipo
./vendor/bin/phpstan analyse Modules --no-progress --memory-limit=-1 --error-format=raw 2>&1 | grep "identifier=" | sort | uniq -c | sort -rn
```
