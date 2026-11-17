---
paths:
  - "laravel/Modules/Geo/resources/js/**/*.js"
  - "laravel/Modules/Geo/docs/**/*.md"
  - "laravel/Themes/Sixteen/resources/**/*.css"
  - "laravel/Themes/Sixteen/resources/**/*.blade.php"
---

# Map Interaction Transparency Rule

## REGOLA PERMANENTE: UI della mappa deve essere pienamente visibile e interattiva

### Vincolo assoluto
- **VIETATO**: sovrapporre trasparenza (opacity, background-color con alpha, CSS filter) sul container della mappa che nasconde pulsanti fullscreen, zoom, switch layer e ricerca indirizzo
- **OBBLIGATORIO**: assicurare `pointer-events: auto` su elementi interattivi della mappa (container, marker, dropdown)
- **OBBLIGATORIO**: mantenere `z-index` dei dropdown > z-index della mappa per evitare occlusione
- **OBBLIGATORIO**: fornire icone SVG con `icon-white` per controlli su sfondo chiaro

### Perché
- Gli utenti segnalazione-crea hanno segnalato che i controlli della mappa sono invisibili in modalità "fullscreen" o "zoom"
- La trasparenza si verifica quando il wrapper della mappa eredita classi `.bg-gray-900` senza colore di sfondo adeguato
- I dropdown Alpine (`x-show`) vengono ocultati da CSS `.dropdown-menu [display: none]` generato dal tema

### Implementazione corretta

1. **Wrapper trasparenza fix**
   ```blade
   @if($isSegnalazioneCrea)
       <div class="map-wrapper bg-white">
   @else
       <div class="map-wrapper">
   @endif
   ```
   - `bg-white` garantisce sfondo opaco quando necessario
   - Rimuovi `bg-gray-900` o `bg-black` sul wrapper nella versione guest

2. **Pointer Events**
   ```css
   .map-wrapper, .map-wrapper svg {
       pointer-events: auto;
   }
   .map-wrapper .dropdown-menu {
       display: block !important; /* sovrascrive Tailwind di default */
   }
   ```

3. **Z-Index Management**
   ```css
   .map-wrapper .dropdown-menu {
       position: relative;
       z-index: 1050; /* > .bg-gray-900 (z-index 1000) */
   }
   ```

4. **Address Search Behavior**
   ```js
   // coordPickerField.js
   export async function onSearch(address) {
       const {lat, lng} = await geocode(address);
       mapRef.current.setView([lat, lng], 13);
       markerRef.current.setLatLng([lat, lng]);
   }
   ```

5. **Fullscreen / Zoom Buttons**
   - Utilizzare le icone Blade `@vite('resources/js/components/map-picker-lit.js')` con `class="w-6 h-6"`
   - Forza visibilità con `!important` su colore `text-gray-900`

### Regola "Mario Rossi" (CRITICA)

- **Visibilità controlli**: deve essere possibile cliccare i pulsanti fullscreen, zoom, layer switcher senza passare il mouse sopra per far apparire l'outline
- **Indicatore di stato**: il pulsante fullscreen deve mostrare sempre lo stesso colore/icons (bianco su sfondo chiaro)
- **Test di regressione**: ogni deploy deve includere test manuale:
  1. Apri `/it/tests/segnalazione-crea?step=dati-della-segnalazione:wizard-step`
  2. Clicca "Fullscreen" → verifica che la mappa entri in modalità fullscreen e i pulsanti rimangano cliccabili
  3. Usa zoom in/out → verifica che l'icona cambi correttamente
  4. Scrivi un indirizzo → verifica che la mappa si centra e il marker venga posizionato

### Anti-pattern da evitare
- Nascondere i controlli dietro `opacity: 0` o `visibility: hidden`
- Usare `pointer-events: none` su `.map-wrapper`
- Impostare `background-color: transparent` sul wrapper senza fallback opaco
- Eseguire refactor senza verificare `z-index` dei dropdown

### Documentazione correlata
- `docs/wiki/concepts/map-picker-runtime-asset-governance.md`
- `bashscripts/ai/.claude/rules/svg-asset-location.md`
- `bashscripts/ai/.claude/rules/map-marker-custom-asset.md`
- Story `8-27` (fix visibilità marker su URL runtime reale)
