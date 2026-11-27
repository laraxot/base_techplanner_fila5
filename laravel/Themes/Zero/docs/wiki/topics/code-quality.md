---
title: "Topic code-quality"
type: digest
status: active
qmd: "digest ceiling 100 code-quality"
---

# Topic code-quality

Sintesi automatica di 4 documenti (chiave `code-quality`).

## Code Quality Improvement Report — Zero

_Fonte: `bmad/code-quality-improvement-report.md`_

# Code Quality Improvement Report — Zero

> Baseline statica riproducibile per orientare il miglioramento. I conteggi sono segnali, non sostituiscono PHPStan, Pest o la review del flusso reale.


## GitHub (repo del componente)

```bash
cd laravel/Themes/Zero && git remote -v
# atteso: laraxot/theme_zero_fila5
```

**Lezione grave:** in un conflitto Git, *entrambe* le parti possono essere sbagliate (`base_techplanner_*` vs `base_<nome progetto>_*`). Non scegliere a caso: `git remote -v` nella cartella del modulo/tema.
**Lezione grave:** in un conflitto Git, *entrambe* le parti possono essere sbagliate (`base_ptvx_*` vs `base_<nome progetto>_*`). Non scegliere a caso: `git remote -v` nella cartella del modulo/tema.

## Baseline

| Indicatore | Valore |
|---|---:|
| File PHP applicativi/database/route | 0 |
| File di test PHP | 0 |
| Rapporto test/file PHP | n/a |
| Candidati senza strict types | 0 |
| Marker TODO/FIXME/HACK/XXX | 0 |
| Estensioni Filament potenzialmente dirette | 0 |
| Controller da classificare FO/BO | 0 |
| Classi in app/Services o app/Support | 0 |
| Priorità iniziale | **bassa** |

## Code Quality Improvements - Zero Theme

_Fonte: `bmad/code-quality-improvements.md`_

# Code Quality Improvements - Zero Theme

## Overview
This document summarizes the code quality improvements made to the Zero theme, focusing on PHPStan level 10 compliance, PHPMD, and PHPInsights improvements.

## PHPStan Level 10 Compliance Achievements

### Safe Function Usage
- Ensured all unsafe functions are properly wrapped with Safe variants
- Added missing Safe function imports to theme files
- Fixed mixed type access issues in theme extras

### Fixed Files

#### Theme Extras
1. **add_multiple_contact_VivaServizi_manager_healthcare_app_it.php**
1. **add_multiple_contact_VivaServizi_manager_ptvx_it.php**
1. **add_multiple_contact_VivaServizi_manager_healthcare_app_it.php**
   - Added Safe imports for curl functions (curl_init, curl_setopt, curl_exec, curl_close, curl_setopt_array)
   - Added Safe import for json_decode
   - Added Safe import for ini_set

2. **add_contact_healthcare_appf3_local.php**
2. **add_contact_ptvxf3_local.php**
2. **add_contact_healthcare_appf3_local.php**
   - Added Safe imports for curl functions
   - Added Safe import for json_decode
   - Added Safe import for ini_set

## Code quality — tema Zero

_Fonte: `bmad/code-quality-report.md`_

# Code quality — tema Zero

Report locale (2026-07-17). Metodo: `phpstan analyse` (sweep repo-wide, incluso nei Themes), `phpmd` (codesize+unusedcode), grep mirati (TODO/FIXME, dd()/dump() nei .blade.php, facade dirette in app/Actions).

## Numeri

- File PHP applicativi (`app/`): 0
- File Blade: 23
- File con TODO/FIXME/@deprecated: 0
- `dd()`/`dump()`/`var_dump()` residui in Blade: 0
- Violazioni PHPMD (codesize+unusedcode): 15
- Facade Laravel dirette in `app/Actions/` (violazione pattern QueueableAction): 0
- PHPStan: incluso nello sweep repo-wide, 0 errori residui noti

## Azioni consigliate

- La qualità delle view Blade/Volt (duplicazione, componenti riusabili) non è stata misurata quantitativamente in questo giro — possibile follow-up con un audit dedicato ai componenti.


## Come migliorare — modifiche effettive da fare

## Code Quality Improvements - Zero Theme

_Fonte: `code-quality-improvements.md`_

# Code Quality Improvements - Zero Theme

## Overview
This document summarizes the code quality improvements made to the Zero theme, focusing on PHPStan level 10 compliance, PHPMD, and PHPInsights improvements.

## PHPStan Level 10 Compliance Achievements

### Safe Function Usage
- Ensured all unsafe functions are properly wrapped with Safe variants
- Added missing Safe function imports to theme files
- Fixed mixed type access issues in theme extras

### Fixed Files

#### Theme Extras
1. **add_multiple_contact_VivaServizi_manager_healthcare_app_it.php**
   - Added Safe imports for curl functions (curl_init, curl_setopt, curl_exec, curl_close, curl_setopt_array)
   - Added Safe import for json_decode
   - Added Safe import for ini_set

2. **add_contact_healthcare_appf3_local.php**
   - Added Safe imports for curl functions
   - Added Safe import for json_decode
   - Added Safe import for ini_set

3. **add_multiple_contact_ATS_manager_healthcare_app_it.php**
   - Added Safe imports for curl functions
   - Added Safe import for json_decode
   - Added Safe import for ini_set
