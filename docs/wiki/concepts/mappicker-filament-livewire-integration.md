---
title: "MapPicker Filament/Livewire Integration Patterns"
type: concept
sources:
  - "https://filamentphp.com/docs/5.x/forms/custom-fields"
  - "https://livewire.laravel.com/docs/properties"
  - "https://livewire.laravel.com/docs/javascript"
  - "https://lit.dev/docs/components/properties/"
  - "laravel/Modules/Geo/docs/MAP-PICKER-LIT.md"
confidence: high
created: 2026-04-17
updated: 2026-04-20
tags: [mappicker, filament, livewire, lit, integration, architecture]
related:
  - entities/mappicker.md
  - troubleshooting/map-picker-issues.md
---

# MapPicker Filament/Livewire Integration Patterns

## The Core Problem: Reactive Loop

When integrating Lit Web Components with Livewire/Filament, the most common issue is the **infinite re-render loop** caused by bidirectional state binding.

### What Causes the Loop

```
User drags marker
    ↓
Lit emits `coords-changed`
    ↓
Alpine catches event → updates @entangle property
    ↓
Livewire detects change → re-renders component
    ↓
Blade re-renders with new initial values
    ↓
Lit component re-initializes (or updates)
    ↓
Marker position updates → triggers another event
    ↓
LOOP!
```

### Why @entangle Causes Issues

```blade
{{-- PROBLEMATIC --}}
<div x-data="{
    lat: @entangle('data.latitude').live,  // ← Creates reactive binding
    lng: @entangle('data.longitude').live   // ← Any change triggers Livewire
}">
    <map-picker-lit
        :lat="lat"  // ← Bound to reactive property
        :lng="lng"
        @coords-changed="updateFromMap"
    ></map-picker-lit>
</div>
```

The problem: `@entangle` creates a two-way binding where:
- Lit updates → Alpine updates → Livewire re-renders
- Livewire re-render → Alpine updates → Lit updates

## The Solution: Decoupled One-Way Flow

### Architecture: Props Down, Events Up

```
┌─────────────────────────────────────────────────────────────────┐
│                        DATA FLOW                                │
├─────────────────────────────────────────────────────────────────┤
│                                                                 │
│  INITIAL LOAD (one-time)                                        │
│  ┌─────────────┐      ┌─────────────┐      ┌─────────────────┐   │
│  │  Livewire   │─────▶│   Blade     │─────▶│  Lit Component │   │
│  │   State     │      │  (initial)  │      │  (attributes)  │   │
│  │ lat: 41.9   │      │ lat="41.9"  │      │  initial setup │   │
│  └─────────────┘      └─────────────┘      └─────────────────┘   │
│                                                                 │
│  USER INTERACTION (events)                                      │
│  ┌─────────────────┐      ┌─────────────┐      ┌─────────────┐  │
│  │  Lit Component  │─────▶│  Alpine.js  │─────▶│  Livewire   │  │
│  │  drag marker    │      │ catches     │      │  $wire.set()│  │
│  │  emit event     │      │  event      │      │  (no render)│  │
│  └─────────────────┘      └─────────────┘      └─────────────┘  │
│                                                                 │
│  SERVER UPDATE (explicit)                                       │
│  ┌─────────────┐      ┌─────────────────┐                       │
│  │  Livewire   │─────▶│  Lit Component  │ (via setCoordinates)│
│  │  Method     │      │  update marker  │                       │
│  └─────────────┘      └─────────────────┘                       │
│                                                                 │
└─────────────────────────────────────────────────────────────────┘
```

### Implementation Pattern

```php
<?php

// MapPicker.php - Filament v5 Custom Field
namespace Modules\Geo\Filament\Forms\Components;

use Modules\Xot\Filament\Forms\Components\XotBaseField;
use Filament\Support\Components\Attributes\ExposedLivewireMethod;
use Livewire\Attributes\Renderless;

class MapPicker extends XotBaseField
{
    protected string $view = 'geo::filament.forms.components.map-picker';
    
    protected float $defaultLatitude = 41.9028;
    protected float $defaultLongitude = 12.4964;
    protected int $defaultZoom = 13;
    
    protected function setUp(): void
    {
        parent::setUp();
        
        // CRITICAL: Prevent automatic re-renders on property changes
        $this->dehydrated(false);
        
        // State path for form submission
        $this->statePath('location');
    }
    
    /**
     * Server-side geocoding - called from JavaScript
     * #[Renderless] prevents Livewire re-render
     */
    #[ExposedLivewireMethod]
    #[Renderless]
    public function geocodeAddress(string $address): array
    {
        // Use GoogleMaps or Nominatim service
        $result = app(\Modules\Geo\Actions\NominatimGeocodeAction::class)
            ->execute($address);
            
        return [
            'lat' => $result['lat'],
            'lng' => $result['lng'],
            'display_name' => $result['display_name'],
        ];
    }
    
    // ... getters
}
```

> Governance note: in Laraxot/Fixcity `MapPicker` must extend `XotBaseField`, not Filament `Field` directly.

> Governance note: in Laraxot/Fixcity `MapPicker` must extend `XotBaseField`, not Filament `Field` directly.

> Governance note: in Laraxot/Fixcity `MapPicker` must extend `XotBaseField`, not Filament `Field` directly.

```blade
{{-- map-picker.blade.php --}}
@php
$statePath = $getStatePath(); // e.g., 'data.location'
$latPath = $statePath . '.latitude';
$lngPath = $statePath . '.longitude';

// Get current values (null if not set)
$currentLat = $getRecord()?->latitude ?? $getDefaultLatitude();
$currentLng = $getRecord()?->longitude ?? $getDefaultLongitude();
@endphp

<x-dynamic-component :component="$getFieldWrapperView()" :field="$field">
    {{-- 
        CRITICAL: No @entangle on Lit props!
        Pass initial values as static attributes
    --}}
    <div x-data="mapPickerController({
        fieldKey: @js($getKey()),
        statePath: @js($statePath),
        wire: $wire, // Pass $wire explicitly
    })">
        {{-- Coordinate display inputs --}}
        <div class="grid grid-cols-2 gap-4 mb-3">
            <x-filament::input.wrapper>
                <x-filament::input
                    type="number"
                    x-model.number="displayLat"
                    @change="syncToLivewire()"
                />
            </x-filament::input.wrapper>
            <x-filament::input.wrapper>
                <x-filament::input
                    type="number"
                    x-model.number="displayLng"
                    @change="syncToLivewire()"
                />
            </x-filament::input.wrapper>
        </div>
        
        {{-- 
            Lit component receives INITIAL values only
            Attributes are NOT reactive - no x-bind
        --}}
        <map-picker-lit
            x-ref="mapPicker"
            initial-lat="{{ $currentLat }}"
            initial-lng="{{ $currentLng }}"
            zoom="{{ $getDefaultZoom() }}"
            height="340px"
            show-search="true"
            @coords-changed="onMapCoordsChanged"
        ></map-picker-lit>
        
        {{-- Search button using $wire --}}
        <div class="mt-2">
            <x-filament::button
                size="sm"
                type="button"
                x-on:click="searchAddress()"
            >
                Cerca Indirizzo
            </x-filament::button>
        </div>
    </div>
</x-dynamic-component>

<script>
function mapPickerController({ fieldKey, statePath, wire }) {
    return {
        displayLat: null,
        displayLng: null,
        
        init() {
            // Initialize from Livewire state (one-time)
            const state = wire.get(statePath);
            this.displayLat = state?.latitude ?? null;
            this.displayLng = state?.longitude ?? null;
        },
        
        onMapCoordsChanged(event) {
            const { lat, lng, source } = event.detail;
            
            // Update display (Alpine only, no Livewire)
            this.displayLat = lat;
            this.displayLng = lng;
            
            // Sync to Livewire state (doesn't trigger re-render if statePath is setup right)
            wire.set(`${statePath}.latitude`, lat, false); // false = defer network
            wire.set(`${statePath}.longitude`, lng, false);
            
            // Or use .sync() for immediate but without full re-render
            // wire.sync(`${statePath}.latitude`, lat);
        },
        
        syncToLivewire() {
            // When inputs change manually
            wire.set(`${statePath}.latitude`, this.displayLat, false);
            wire.set(`${statePath}.longitude`, this.displayLng, false);
        },
        
        async searchAddress() {
            const query = prompt('Inserisci indirizzo:');
            if (!query) return;
            
            // Call exposed Livewire method
            const result = await wire.callSchemaComponentMethod(
                fieldKey,
                'geocodeAddress',
                { address: query }
            );
            
            // Update map via component method
            this.$refs.mapPicker.setCoordinates(result.lat, result.lng);
            
            // Update display
            this.displayLat = result.lat;
            this.displayLng = result.lng;
        },
    };
}
</script>
```

```javascript
// map-picker-lit.js - Lit Component (dumb, props in, events out)
import { LitElement, html, css } from 'lit';
import L from 'leaflet';

export class MapPickerLit extends LitElement {
    // Reactive properties - ONLY for internal state
    static properties = {
        initialLat: { type: Number, attribute: 'initial-lat' },
        initialLng: { type: Number, attribute: 'initial-lng' },
        zoom: { type: Number },
        height: { type: String },
        showSearch: { type: Boolean, attribute: 'show-search' },
        
        // Internal state (not reflected)
        _map: { state: true },
        _marker: { state: true },
    };
    
    constructor() {
        super();
        this.initialLat = 41.9028;
        this.initialLng = 12.4964;
        this.zoom = 13;
        this.height = '340px';
        this.showSearch = true;
    }
    
    // Use Light DOM for Leaflet compatibility
    createRenderRoot() {
        return this;
    }
    
    firstUpdated() {
        // Initialize map with INITIAL values only
        this._initMap();
    }
    
    _initMap() {
        const mapEl = this.querySelector('#map');
        if (!mapEl) return;
        
        this._map = L.map(mapEl).setView(
            [this.initialLat, this.initialLng],
            this.zoom
        );
        
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png')
         .addTo(this._map);
        
        // Create marker at initial position
        this._marker = L.marker([this.initialLat, this.initialLng], {
            draggable: true
        }).addTo(this._map);
        
        // On drag end, emit event (don't update reactive props!)
        this._marker.on('dragend', () => {
            const pos = this._marker.getLatLng();
            this._emitCoords(pos.lat, pos.lng, 'drag');
        });
        
        // On map click
        this._map.on('click', (e) => {
            this._marker.setLatLng(e.latlng);
            this._emitCoords(e.latlng.lat, e.latlng.lng, 'click');
        });
    }
    
    _emitCoords(lat, lng, source) {
        // Emit event - let parent handle Livewire integration
        this.dispatchEvent(new CustomEvent('coords-changed', {
            detail: { lat, lng, source },
            bubbles: true,
            composed: true,
        }));
    }
    
    // Public API for external updates (from $wire)
    setCoordinates(lat, lng) {
        if (this._marker) {
            this._marker.setLatLng([lat, lng]);
            this._map.setView([lat, lng]);
        }
    }
    
    render() {
        return html`
            <div id="map" style="height: ${this.height};"></div>
            ${this.showSearch ? html`
                <div class="search-box">
                    <input type="text" id="search-input" placeholder="Cerca...">
                    <button @click="${this._search}">Cerca</button>
                </div>
            ` : ''}
        `;
    }
}
```

## Key Principles

### 1. Initial Values vs Reactive State

```javascript
// GOOD: Initial values as attributes (one-time)
<map-picker initial-lat="41.9" initial-lng="12.5">

// BAD: Reactive binding (causes loop)
<map-picker :lat="livewireLat" :lng="livewireLng">
```

### 2. Event Naming Convention

```javascript
// Component emits specific events
this.dispatchEvent(new CustomEvent('coords-changed', { ... }));
this.dispatchEvent(new CustomEvent('search-complete', { ... }));

// Parent handles integration
@coords-changed="onMapCoordsChanged"
@search-complete="onMapSearchComplete"
```

### 3. Renderless Operations

```php
#[ExposedLivewireMethod]
#[Renderless] // ← Critical for non-UI operations
public function geocodeAddress(string $address): array
{
    // This won't trigger Livewire re-render
    return $this->geocode($address);
}
```

### 4. Debouncing Updates

```javascript
// In Alpine controller
syncToLivewire() {
    clearTimeout(this._debounce);
    this._debounce = setTimeout(() => {
        wire.set('property', value, false);
    }, 150);
}
```

## Common Pitfalls

| Pitfall | Solution |
|---------|----------|
| `@entangle` with Lit | Use static attributes for initial values |
| Direct prop binding | Use events for communication |
| Calling `wire.set()` in loop | Debounce and use `false` for defer |
| Map re-initializing | Don't use reactive props for map state |
| Fullscreen issues | Use Light DOM (`createRenderRoot() { return this; }`) |

## Debugging Tips

1. **Add logging at each boundary:**
   ```javascript
   // In Lit: log all dispatched events
   _emitCoords(lat, lng, source) {
       console.log('[MapPicker] Emitting coords:', { lat, lng, source });
       // ... dispatch
   }
   
   // In Alpine: log all received events
   onMapCoordsChanged(e) {
       console.log('[Alpine] Received coords:', e.detail);
       // ... handle
   }
   ```

2. **Check re-render count:**
   ```javascript
   // In Blade
   <div x-data="{ init() { console.log('Alpine initialized'); } }">
   
   // In Lit
   connectedCallback() {
       console.log('Lit connected');
       super.connectedCallback();
   }
   ```

3. **Use Livewire DevTools** to inspect component state and re-renders.

## References

- [Filament v5 Custom Fields](https://filamentphp.com/docs/5.x/forms/custom-fields)
- [Livewire v3 JavaScript API](https://livewire.laravel.com/docs/javascript)
- [Lit Reactive Properties](https://lit.dev/docs/components/properties/)
- [Leaflet Event Handling](https://leafletjs.com/reference.html#evented)

## Related

- [Troubleshooting MapPicker Issues](troubleshooting/map-picker-issues.md)
- [MapPicker Entity Documentation](entities/mappicker.md)
