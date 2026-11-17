---
name: header-external-components-rule
description: Rule for external components in the header (language switcher, user dropdown, etc.)
---

## REGOLA PERMANENTE: Componenti esterni nel header

### Vincoli assoluti
- **VIETATO** inserire direttamente markup o logica dei componenti come il language switcher, il dropdown utente o altri widget al largo del file `sections/header/v1.blade.php`.
- **OBBLIGATORIO** includere tali componenti tramite Blade `@include` o componenti Blade dedicati, così da mantenere separazione tra layout e logica dei widget.

### Motivazione
- Centralizza la gestione dei componenti riutilizzabili.
- Evita duplicazione di markup e facilita aggiornamenti UI.
- Consente al tema di mantenere coerenza con Design Comuni.

### Applicazione
```blade
{{-- Language switcher – external component --}}
@include('pub_theme::components.sections.header.language-switcher')

{{-- User dropdown – external component --}}
@include('pub_theme::components.sections.header.user-dropdown')
```

- Qualunque nuovo widget da inserire nel header deve seguire lo stesso pattern.
- Aggiornare la documentazione in `docs/wiki/concepts/header-external-components.md`.
