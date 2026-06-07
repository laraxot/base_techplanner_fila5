# Case Sensitivity Rules - Gdpr Module

## Problema / Problem

**NON possono esistere file con lo stesso nome che differiscono solo per maiuscole/minuscole nella stessa directory.**

<<<<<<< HEAD
<<<<<<< HEAD
Riferimento completo: [Xot Module Case Sensitivity Rules](../../xot/docs/case-sensitivity-rules.md)
=======
Riferimento completo: [Xot Module Case Sensitivity Rules](../../Xot/docs/case-sensitivity-rules.md)
>>>>>>> 4b6b99016 (first commit)
=======
Riferimento completo: [Xot Module Case Sensitivity Rules](../../xot/docs/case-sensitivity-rules.md)
>>>>>>> dev

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
cd Modules/Gdpr
# See Xot/docs/case-sensitivity-rules.md for the verification script
```

## Update Log

<<<<<<< HEAD
<<<<<<< HEAD
- **[DATE]**: Removed `conflictresolutiontest.php` duplicate
=======
- **2025-11-04**: Removed `conflictresolutiontest.php` duplicate
>>>>>>> 4b6b99016 (first commit)
=======
- **[DATE]**: Removed `conflictresolutiontest.php` duplicate
>>>>>>> dev
