# Quality Tools Report - PHPStan, PHPMD, PHP Insights

## Data: 2025-01-02

## Riepilogo Risultati

### PHPStan Level 10
**Status**: ✅ **COMPLETATO - 0 errori in tutti i moduli!**

- Modulo User: 0 errori (da ~221 iniziali)
- Tutti i moduli: 0 errori
- Conformità: 100% PHPStan Level 10

#### Correzioni Finali
1. **ClientResource.php**: Corretto return type da `Component` a `Field` (classe base corretta per Filament 4)
   - Aggiunte chiavi stringhe all'array `getFormSchema()`
   - Corretto PHPDoc: `array<string, \Filament\Forms\Components\Field>`

### PHPMD (PHP Mess Detector)
**Status**: ⚠️ **1 warning risolto**

#### Problemi Risolti
1. **Collisione trait method `trans`** in `CreateSchedule.php`
   - **Causa**: `NavigationPageLabelTrait` già include `TransTrait`, ma `CreateSchedule` lo ridichiarava
   - **Soluzione**: Rimosso `use TransTrait;` da `CreateSchedule` (già incluso tramite `NavigationPageLabelTrait`)
   - **File**: `laravel/Modules/Job/app/Filament/Resources/ScheduleResource/Pages/CreateSchedule.php`

#### Note
- I file `.php-cs-fixer.*` causano errori di parsing in PHPMD (sono file di configurazione, non codice PHP)
- I warning su `StaticAccess` per `Assert` e `DB` sono accettabili (librerie di utilità progettate per uso statico)

### PHP Insights
**Status**: ⚠️ **Miglioramenti necessari**

#### Score Attuali
- **Code**: 64.1% (minimo richiesto: 90%)
- **Complexity**: 93.0% ✅ (minimo richiesto: 85%)
- **Architecture**: 47.1% (minimo richiesto: 90%)
- **Style**: 60.2% (minimo richiesto: 90%)

#### Problemi Principali Identificati

1. **Ordered Imports** (Stile)
   - Molti file hanno import non ordinati secondo PSR-12
   - **Soluzione**: Eseguire PHP CS Fixer per ordinare automaticamente gli import
   - **File interessati**: ~200+ file

2. **Forbidden Setters** (Code Quality)
   - Setter non permessi in:
     - `Xot/app/Models/Traits/HasExtraTrait.php:78`
     - `Xot/app/Services/ModuleService.php:50`
     - `Xot/app/Services/ThemeService.php:23`
   - **Soluzione**: Convertire a constructor injection o behavior naming

3. **Property Declaration** (Code Quality)
   - Proprietà con prefisso underscore (non conforme):
---
module: theme
topic: quality-tools-report
canonical: ../../../Themes/docs/shared-components/quality-tools-report.md
---

See canonical documentation: ../../../Themes/docs/shared-components/quality-tools-report.md
