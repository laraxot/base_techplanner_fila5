# LitElement Placement Rule

## REGOLA PERMANENTE: Il codice LitElement deve risiedere esclusivamente nei file JavaScript dei componenti, non nelle Blade view.

### Vincoli assoluti

- **VIETATO** inserire definizioni di classi `LitElement` o import `lit` direttamente nei file Blade (`*.blade.php`).
- **OBBLIGATORIO** posizionare tutti i componenti web basati su LitElement in `Modules/<Modulo>/resources/js/components/` e registrarli con `customElements.define`.
- **OBBLIGATORIO** includere il file JS compilato via Vite nel layout con `<script type="module" src="{{ asset('js/<module>/components/<component>.js') }}" defer></script>`.

### Motivazione
- Mantiene la **separazione tra logica di presentazione** (Blade) e **logica UI interattiva** (Web Component).
- Evita errori di risoluzione dei moduli (es. `@lit/reactive-element`) e garantisce che il bundler gestisca correttamente le dipendenze.
- Favorisce **mobile‑first** e **responsività**, poiché i componenti Lit gestiscono il rendering dinamico.

### Applicazione pratica
```blade
{{-- Blade view --}}
<x-dynamic-component :component="$getFieldWrapperView()" :field="$field">
    <div x-data="() => ({ latitude: null, longitude: null })">
        <map-picker-lit
            :latitude="latitude"
            :longitude="longitude"
            height="340px"
            @coords-changed="({detail}) => { latitude = detail.latitude; longitude = detail.longitude; }"
        ></map-picker-lit>
    </div>
</x-dynamic-component>
```
```js
// Modules/Geo/resources/js/components/map-picker-lit.js
import { LitElement, html, css } from 'lit';
import L from 'leaflet';
// ... resto del componente ...
customElements.define('map-picker-lit', MapPickerLit);
```

### Controlli di verifica
```bash
# Verifica che non esistano import di lit in Blade
grep -R "import .*lit" laravel/Modules/**/resources/views/**/*.blade.php || echo "Nessun import lit in Blade"
```

### Documentazione
- Aggiornare `Modules/Geo/docs/wiki/concepts/map-picker-component.md` con esempi di utilizzo.
- Aggiornare la **LLM‑Wiki** per indicizzare questa regola.
