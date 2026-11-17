---
paths:
  - "laravel/Themes/Sixteen/resources/views/components/sections/header/**/*.blade.php"
  - "laravel/Themes/Sixteen/resources/views/components/sections/header/v1.blade.php"
---

## REGOLA PERMANENTE: Estrarre componenti riutilizzabili — header section

> Vedi regola generale: `blade-component-extraction.md`

### Regola specifica header

I partial locali dell'header vanno in `sections/header/partials/` (NON allo stesso livello di `v1.blade.php`).

```
CORRETTO: sections/header/partials/user-dropdown.blade.php
CORRETTO: sections/header/partials/personal-area-guest-cta.blade.php
CORRETTO: sections/header/partials/personal-area-guest-parity.blade.php
CORRETTO: sections/header/partials/language-switcher.blade.php
SBAGLIATO: sections/header/language-switcher.blade.php
```

Include in `v1.blade.php`:
```blade
@include('pub_theme::components.sections.header.partials.language-switcher')
@include('pub_theme::components.sections.header.partials.user-dropdown')
@include('pub_theme::components.sections.header.partials.personal-area-guest-cta')
```

`v1.blade.php` resta SSoT/orchestratore. Non spostare mai l'ownership.
