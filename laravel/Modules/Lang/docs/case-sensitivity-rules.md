# Case Sensitivity Rules - Lang Module

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

## File/Directory Rimossi da Lang Module

I seguenti file/directory sono stati eliminati perché violavano le regole:

```
✗ Removed: database/Migrations/ (entire directory)
✓ Kept:    database/migrations/
```

## Convenzioni

### Directory Structure
- **Formato**: lowercase
- **Esempio**: `database/migrations/`
- ❌ **Errato**: `database/Migrations/`, `Database/Migrations/`

### Motivazione

Laravel usa la convenzione `database/migrations/` (lowercase) per:
1. Compatibilità con filesystem Unix/Linux
2. Standard della community
3. Compatibilità con Artisan commands (`php artisan make:migration`)

## Update Log

<<<<<<< HEAD
<<<<<<< HEAD
- **[DATE]**: Removed `database/Migrations/` uppercase directory
=======
- **2025-11-04**: Removed `database/Migrations/` uppercase directory
>>>>>>> 4b6b99016 (first commit)
=======
- **[DATE]**: Removed `database/Migrations/` uppercase directory
>>>>>>> dev
