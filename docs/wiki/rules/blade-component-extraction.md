---
paths:
  - "laravel/Modules/**/*.blade.php"
  - "laravel/Themes/**/*.blade.php"
---

# Blade Component Extraction Rule

## REGOLA PERMANENTE: Estrarre componenti riusabili da tutte le Blade (DRY + KISS)

### Vincoli assoluti

```
OBBLIGATORIO: valutare estrazione ogni volta che un blocco si ripete, ha responsabilità autonoma o è leggibile come unità
VIETATO: mettere partial locali di una section allo stesso livello del file owner (v1.blade.php)
OBBLIGATORIO: partial locali di header → sections/header/partials/
VIETATO: creare componenti globali per blocchi che appartengono a una section specifica
```

### Classificazione componenti

| Tipo | Destinazione |
|------|-------------|
| Componente riusabile cross-section | `resources/views/components/<area>/<name>.blade.php` |
| Componente di sezione owner | `resources/views/components/sections/<section>/v*.blade.php` |
| Partial locale a una section | `resources/views/components/sections/<section>/partials/<name>.blade.php` |

### Regola specifica per header section

- **Owner/SSoT**: `laravel/Themes/Sixteen/resources/views/components/sections/header/v1.blade.php`
- **Partial locali**: `laravel/Themes/Sixteen/resources/views/components/sections/header/partials/`

```
CORRETTO:  sections/header/partials/language-switcher.blade.php
CORRETTO:  sections/header/partials/user-dropdown.blade.php
CORRETTO:  sections/header/partials/personal-area-guest-cta.blade.php
SBAGLIATO: sections/header/language-switcher.blade.php  ← stesso livello di v1
```

### Criteri per estrarre un blocco

Estrarre quando il blocco:
1. Si ripete in più posti → componente riusabile
2. Ha responsabilità autonoma e leggibile come unità → partial
3. Renderebbe il file owner più lungo di ~100 righe → partial locale

Non estrarre per moda. Non creare astrazioni premature.

### Come includere nel file owner

```blade
{{-- partial locale header --}}
@include('pub_theme::components.sections.header.partials.language-switcher')
@include('pub_theme::components.sections.header.partials.user-dropdown')
```

### Guardrails

- `v1.blade.php` resta sempre orchestratore SSoT dell'header
- Non spostare ownership fuori da `v1.blade.php`
- Non duplicare partial simili con nomi diversi
- Prima capire regola, logica e ownership; poi refactor

### Documentazione

- `laravel/Themes/Sixteen/docs/wiki/concepts/blade-component-extraction-rule.md`
- Story: 8-37
