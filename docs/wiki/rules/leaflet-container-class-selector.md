# Leaflet Container Class Selector Rule

## REGOLA PERMANENTE: Leaflet si collega al container tramite classi locali, mai tramite ID globali

### Vincolo assoluto

```
VIETATO: agganciare la mappa Leaflet tramite un id globale (es. document.getElementById('map'))
OBBLIGATORIO: trovare il container tramite class locale (es. this.querySelector('.coordinate-picker-map'))
```

### Motivazione

Gli ID HTML devono essere unici nella pagina. In un Filament Wizard o in una pagina con
più istanze dello stesso field (o più tab con lo stesso componente), usare un ID crea
conflitti di inizializzazione: Leaflet aggancia la prima occorrenza trovata per ID e ignora
le altre, oppure lancia errori di re-inizializzazione su container già inizializzato.

Le classi locali non hanno questo problema: `this.querySelector('.coordinate-picker-map')`
all'interno del LitElement trova il div **del componente corrente**, non un elemento globale.

### Applicazione pratica

```javascript
// LitElement (Lit 3) — coordinate-picker-field.js
firstUpdated() {
    const container = this.querySelector('.coordinate-picker-map');
    if (!container) return;
    this._map = L.map(container, { ... });
}
```

```html
<!-- Blade / Lit template -->
<div class="coordinate-picker-map" style="height: 340px;"></div>
```

### Anti-pattern vietato

```javascript
// VIETATO — id globale
this._map = L.map('my-map-id', { ... });

// VIETATO — anche se dinamico con interpolazione
this._map = L.map(`map-${this.fieldKey}`, { ... });
```

### File coinvolti

- `laravel/Modules/Geo/resources/js/components/coordinate-picker-field.js`
- `laravel/Modules/Geo/resources/js/components/map-picker-lit.js`
- Qualunque futuro componente Lit che integri Leaflet nel modulo Geo

### Documentazione

- Story: 8-21 (done), 8-39 (ready-for-dev)
- Wiki: `laravel/Modules/Geo/docs/wiki/concepts/leaflet-container-binding.md`
