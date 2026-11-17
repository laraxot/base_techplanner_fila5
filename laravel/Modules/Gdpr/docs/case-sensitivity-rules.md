# Case Sensitivity Rules - Gdpr Module

## Problema / Problem

**NON possono esistere file con lo stesso nome che differiscono solo per maiuscole/minuscole nella stessa directory.**

Riferimento completo: [Xot Module Case Sensitivity Rules](../../Xot/docs/case-sensitivity-rules.md)
<<<<<<< HEAD
Riferimento completo: [Xot Module Case Sensitivity Rules](../../xot/docs/case-sensitivity-rules.md)
=======
>>>>>>> 6ed19256f (.)

## File Rimossi da Gdpr Module

I seguenti file sono stati eliminati perché violavano le regole:

```
✗ Removed: tests/Feature/conflictresolutiontest.php
✓ Kept:    tests/Feature/ConflictResolutionTest.php
```

## Convenzioni

### Test Files
- **Formato**: PascalCase
- **Esempio**: `ConflictResolutionTest.php`
- ❌ **Errato**: `conflictresolutiontest.php`

## Verifica / Check

Per verificare che non ci siano duplicati case-insensitive nel modulo:

```bash
<<<<<<< HEAD
cd Modules/Gdpr
=======
cd /var/www/_bases/base_ptvx_fila4_mono/laravel/Modules/Gdpr
>>>>>>> 6ed19256f (.)
# See Xot/docs/case-sensitivity-rules.md for the verification script
```

## Update Log

- **2025-11-04**: Removed `conflictresolutiontest.php` duplicate
<<<<<<< HEAD
- **[DATE]**: Removed `conflictresolutiontest.php` duplicate
=======
>>>>>>> 6ed19256f (.)
