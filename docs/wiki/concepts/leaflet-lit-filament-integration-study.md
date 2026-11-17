# Studio Integrazione: Filament v5 + Lit + Leaflet

> Analisi comparativa tra inventage/leaflet-map, Filament v5 Custom Fields e documentazione Geo esistente.

## 📚 Fonti Analizzate

1. **[inventage/leaflet-map](https://github.com/inventage/leaflet-map)** - Componente Lit/Leaflet di riferimento
2. **[Filament v5 Custom Fields](https://filamentphp.com/docs/5.x/forms/custom-fields)** - Pattern ufficiale Filament
3. **Geo Module Docs** - MAP-PICKER-LIT.md, LIT-MAP-IMPLEMENTATION.md

---

## 🎯 Pattern Filament v5 Custom Fields (OBBLIGATORIO)

### Struttura Base
```php
use Filament\Forms\Components\Field;

class LocationPicker extends Field
{
    protected string $view = 'filament.forms.components.location-picker';
    protected ?float $zoom = null;

    // Fluent setter (chainable)
    public function zoom(?float $zoom): static
    {
        $this->zoom = $zoom;
        return $this;
    }

    // Getter per Blade
    public function getZoom(): ?float
    {
        return $this->zoom;
    }
}
```

### Uso in Blade
```blade
{{-- Magic method: $getZoom() chiama getZoom() sul field --}}
<x-dynamic-component :component="$getFieldWrapperView()" :field="$field">
    {{ $getZoom() ?? 13 }}
</x-dynamic-component>
```

### Utility Injection (Avanzato)
```php
protected float | Closure | null $zoom = null;

public function zoom(float | Closure | null $zoom): static
{
    $this->zoom = $zoom;
    return $this;
}

public function getZoom(): ?float
{
    return $this->evaluate($this->zoom); // Supporta Closure
}

// Uso con utility injection
LocationPicker::make('location')
    ->zoom(fn (Conference $record): float => $record->isGlobal() ? 1 : 0.5)
```

### Esportazione Metodi a JavaScript
```php
use Filament\Support\Components\Attributes\ExposedLivewireMethod;
use Livewire\Attributes\Renderless;

#[ExposedLivewireMethod]
#[Renderless] // Prevents re-render
public function geocodeAddress(string $address): array
{
    // ... logic
    return ['latitude' => $lat, 'longitude' => $lng];
}
```

### Chiamata da JavaScript (Alpine)
```javascript
// In Blade: @php $key = $getKey(); @endphp

await $wire.callSchemaComponentMethod(
    @js($key),
    'geocodeAddress',
    { address: this.address }
)
```

---

## 🗺️ Pattern inventage/leaflet-map (BEST PRACTICE)

### Decorators Lit Element
```typescript
import { css, html, state, LitElement, property } from 'lit-element';
import { Circle, Icon, LeafletEvent, LeafletMouseEvent, Map, Marker } from 'leaflet';

export class LeafletMap extends LitElement {
  // Reactive properties (trigger re-render)
  @property({ type: Number }) latitude = 47.38991;
  @property({ type: Number }) longitude = 8.51604;
  @property({ type: Number }) radius = 0;
  @property({ type: Boolean }) updateCenterOnClick = false;
  @property({ type: Boolean }) detectRetina = true;
  @property({ type: Number }) defaultZoom = 16;
  @property({ type: Number }) maxZoom = 19;

  // Internal state (not exposed as attribute)
  @state() markers: Array<MarkerInformation> = [];
  @state() selectedMarker: MarkerInformation | null = null;

  // Private properties
  private _map!: Map;
  private mapCenterMarker: Marker | null = null;
  private debouncedResize: () => unknown = () => false;
}
```

### Lifecycle Management
```typescript
async firstUpdated(_changedProperties: PropertyValues) {
  super.firstUpdated(_changedProperties);

  // 1. Get DOM reference
  const mapDomElement = this.renderRoot.querySelector('.map') as HTMLElement;
  if (!mapDomElement) return;

  // 2. Initialize Leaflet
  this._map = L.map(mapDomElement);

  // 3. Event handlers with debounce
  this._map.on('click', e => this._onMapClickDelayed(e));
  this._map.on('dblclick', () => this._clearMapClickDelayedTimeout());

  // 4. Fire ready event
  this.map.whenReady(() => this._onMapReady());

  // 5. Add tile layer
  const tiles = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    detectRetina: this.detectRetina,
    maxZoom: this.maxZoom,
    attribution: '...',
  }).addTo(this._map);

  // 6. Tiles loading event with Promise
  tiles.on('loading', () => {
    const promise = new Promise<void>(resolve => {
      tiles.on('load', resolve);
    });
    this.dispatchEvent(new CustomEvent('tiles-loading', {
      composed: true,
      bubbles: true,
      detail: { promise },
    }));
  });

  // 7. Add controls
  L.control.scale().addTo(this._map);

  // 8. Force resize after paint
  await new Promise(r => setTimeout(r, 0));
  window.dispatchEvent(new Event('resize'));
}

updated(_changedProperties: PropertyValues) {
  super.updated(_changedProperties);

  // Conditional updates (check changed properties)
  if (_changedProperties.has('latitude') || _changedProperties.has('longitude')) {
    this._updateMapCenterMarker();
  }
  if (_changedProperties.has('markers')) {
    this._updateMarkers();
  }
}

connectedCallback() {
  super.connectedCallback();
  // Debounced resize handler
  const [debounced] = debounce(() => this._handleResize(), 200);
  this.debouncedResize = debounced;
  window.addEventListener('resize', this.debouncedResize);
}

disconnectedCallback() {
  super.disconnectedCallback();
  window.removeEventListener('resize', this.debouncedResize);
  // Cleanup markers
  this.mapMarkers.forEach(marker => marker.remove());
}
```

### Render con CSS dinamico
```typescript
render() {
  return html`
    <link rel="stylesheet" href="https://unpkg.com/leaflet@${L.version}/dist/leaflet.css" />
    <div class="map"></div>
  `;
}

static get styles() {
  return css`
    :host {
      --leaflet-map-min-height: 50vh;
      display: block;
    }
    .map {
      width: 100%;
      height: 100%;
      min-height: var(--leaflet-map-min-height);
    }
  `;
}
```

### Event Dispatch Pattern
```typescript
// Center updated (user interaction)
_onMapClick(e: LeafletEvent) {
  if (!this.updateCenterOnClick) return;

  const { latlng: { lat, lng } } = e as LeafletMouseEvent;
  this.latitude = lat;
  this.longitude = lng;

  this.dispatchEvent(new CustomEvent('center-updated', {
    detail: { latitude: this.latitude, longitude: this.longitude },
  }));
}

// Map ready (initialization complete)
_onMapReady() {
  this.dispatchEvent(new CustomEvent('map-ready', {
    detail: { map: this.map },
  }));
}
```

### Debounce Pattern per Click
```typescript
private mapClickDelayedTimeout: number | null = null;

_onMapClickDelayed(e: LeafletEvent) {
  this._clearMapClickDelayedTimeout();
  this.mapClickDelayedTimeout = window.setTimeout(() => {
    this._onMapClick(e);
  }, 500); // 500ms delay to distinguish from dblclick
}

_clearMapClickDelayedTimeout() {
  if (!this.mapClickDelayedTimeout) return;
  clearTimeout(this.mapClickDelayedTimeout);
  this.mapClickDelayedTimeout = null;
}
```

---

## ⚡ Confronto: Geo MapPicker vs inventage/leaflet-map

| Aspetto | inventage/leaflet-map | Geo MapPicker (Attuale) | Raccomandazione |
|---------|----------------------|------------------------|-----------------|
| **Lit Version** | `lit-element` (legacy) | `@theme-lit` (Lit v2+) | ✅ Mantieni Lit v2+ |
| **Properties** | `@property` decorators | `static properties` object | ✅ Entrambi validi |
| **State** | `@state()` decorator | `static properties` | ⚠️ Separare `@state` da `@property` |
| **Shadow DOM** | Shadow DOM (default) | Light DOM (`createRenderRoot() { return this; }`) | ⚠️ Shadow DOM è best practice |
| **CSS** | `static get styles()` + CSS vars | Inline styles | 🔴 Usa `static styles` + `css` |
| **Leaflet CSS** | Dynamic `<link>` in render | Import in JS | ✅ Dynamic link più affidabile |
| **Events** | `center-updated`, `map-ready`, `tiles-loading` | `coords-changed` | ✅ Aggiungi `map-ready` |
| **Resize** | Debounced ResizeObserver | ResizeObserver | ✅ Ottimo |
| **Click Debounce** | 500ms delay | Non implementato | 🔴 Aggiungi per click vs dblclick |
| **Lifecycle** | Completo cleanup | Completo | ✅ Ottimo |

---

## 🎓 Lezioni Chiave per MapPicker

### 1. Separare Properties da State
```typescript
// ❌ Prima (tutto in properties)
static properties = {
  lat: { type: Number },
  lng: { type: Number },
  _map: { state: true }, // Non esporre come attribute
};

// ✅ Dopo (pattern corretto)
import { property, state } from 'lit';

@property({ type: Number }) lat = 41.9028;
@property({ type: Number }) lng = 12.4964;

@state() private _map: L.Map | null = null;
@state() private _marker: L.Marker | null = null;
```

### 2. CSS con CSSResult e CSS Variables
```typescript
import { css } from 'lit';

static styles = css`
  :host {
    --map-height: 400px;
    display: block;
  }
  #map {
    height: var(--map-height);
    width: 100%;
  }
`;
```

### 3. Eventi Standardizzati
```typescript
// Eventi che dovrebbe emettere MapPicker
interface MapPickerEvents {
  'coords-changed': { latitude: number; longitude: number; source: string };
  'map-ready': { map: L.Map };
  'tiles-loading': { promise: Promise<void> };
}
```

### 4. Debounce per Interazioni
```typescript
// Evita conflitti click vs dblclick
private _clickTimeout: number | null = null;

_onMapClickDelayed(e: L.LeafletMouseEvent) {
  this._clearClickTimeout();
  this._clickTimeout = window.setTimeout(() => {
    this._onMapClick(e);
  }, 300);
}
```

### 5. Public API Methods
```typescript
// Metodi pubblici per controllo esterno
setCoordinates(lat: number, lng: number, options?: { source?: string }) {
  this.lat = lat;
  this.lng = lng;
  this._updateMarker();
  if (!options?.source?.includes('silent')) {
    this._emitCoordsChanged(options?.source || 'external');
  }
}

getCenter(): [number, number] | null {
  return this._map ? [this.lat, this.lng] : null;
}

invalidateSize(): void {
  this._map?.invalidateSize();
}
```

---

## 🔗 Collegamenti

- [Filament v5 Custom Fields](https://filamentphp.com/docs/5.x/forms/custom-fields)
- [inventage/leaflet-map GitHub](https://github.com/inventage/leaflet-map)
- [MAP-PICKER-LIT.md](../../laravel/Modules/Geo/docs/MAP-PICKER-LIT.md)
- [LIT-MAP-IMPLEMENTATION.md](../../laravel/Modules/Geo/docs/LIT-MAP-IMPLEMENTATION.md)

---

## 📝 Action Items

1. **Refactor MapPicker Lit**: Separare `@property` da `@state`
2. **Aggiungi Debounce**: Per click vs dblclick (300-500ms)
3. **Standardizza CSS**: Usa `static styles` con CSS variables
4. **Eventi**: Aggiungi `map-ready` con reference alla mappa
5. **API Pubblica**: Espone `setCoordinates()`, `getCenter()`, `invalidateSize()`
6. **Cleanup**: Assicurati che `disconnectedCallback` rimuova tutti i listener

---

*Documento creato da BMAD Tech Writer - Analisi comparativa completata*
