---
paths:
  - "laravel/Themes/**/*.css"
  - "laravel/Themes/**/*.scss"
  - "laravel/Themes/**/*.blade.php"
---

# No Page-Specific CSS Rule

## REGOLA PERMANENTE: Nessun selettore CSS per pagina o widget specifico

### Vincolo assoluto

```
VIETATO: .ticket-wizard-root { ... }
VIETATO: .page-content[data-slug="tests.segnalazione-crea"] { ... }
VIETATO: [data-page="wizard"] .map-container { ... }
VIETATO: qualsiasi selector CSS che isola stili a una singola pagina o widget

OBBLIGATORIO: CSS globale per componenti riutilizzabili
OBBLIGATORIO: il componente porta il suo stile — stile = parte del componente, non della pagina
```

### Perché

Il Design System Design Comuni (italia.github.io/design-comuni-pagine-statiche/) non contiene
CSS per pagina. Ha CSS per **componenti**: `.it-header-slim-wrapper`, `.it-hero-wrapper`,
`.it-page-sections-container`. Ogni componente porta il suo stile.

Un wizard non è "la pagina segnalazione-crea". È un **componente** usato lì. Il suo CSS
deve funzionare ovunque venga montato, senza scoping per pagina.

### Pattern corretto

```css
/* app.css — CSS globale per componenti */

/* ✅ CORRETTO: stile del componente wizard (funziona ovunque) */
.filament-wizard-step { ... }
.filament-wizard-step.active { ... }
coordinate-picker-lit { display: block; width: 100%; }

/* ✅ CORRETTO: stile Bootstrap Italia globale per l'intera app */
.it-page-sections-container .section-muted { ... }

/* ❌ SBAGLIATO: CSS per pagina specifica */
.ticket-wizard-root .map-container { ... }
.page-content[data-slug="tests.segnalazione-crea"] .wizard { ... }
[data-livewire-component="create-ticket-wizard"] .step { ... }
```

### Come risolvere quando CSS "diverge" tra pagine

Se un componente ha comportamento visuale diverso in contesti diversi:
1. Il componente deve avere varianti tramite **props/attributi** (es. `size="compact"`)
2. Oppure usare **container queries** (`@container`) se il contesto è lo spazio fisico
3. MAI usare il path URL o il nome della pagina come discriminante CSS

### Riferimento

- Design Comuni: https://italia.github.io/design-comuni-pagine-statiche/sito/segnalazione-02-dati.html
  → Ispeziona: nessun `[data-slug]`, nessuna classe per-pagina. Solo `.it-*` globali.

### File coinvolti

- `laravel/Themes/Sixteen/resources/css/app.css` — fonte CSS del tema

### Documentazione

- Sixteen wiki: `laravel/Themes/Sixteen/docs/wiki/concepts/no-page-specific-css.md`
- Root wiki: `docs/wiki/concepts/no-page-specific-css.md`
