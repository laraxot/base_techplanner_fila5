# Mappa Statica Cliccabile - Implementazione

## Obiettivo
Implementare una mappa statica (immagine PNG) che, al click, apre Google Maps con l'indirizzo/coordinate di destinazione (link gratuito, NON API). Questo approccio è preferibile rispetto a mappe interattive embedded per:
- Performance migliori (nessun JavaScript pesante)
- Caricamento più veloce
- Esperienza utente semplice e diretta
- Nessuna dipendenza da API esterne in runtime

## Indirizzo Target
**Via Vanzo 86/A, 31021 Mogliano Veneto TV**
- Coordinate: 45.5633, 12.2506 (calcolate con Nominatim/OpenStreetMap)
- Zoom consigliato: 15-16

## 🚨 Regola Critica: Solo Servizi Gratuiti

**MAI usare Google Maps API, Mapbox API o altri servizi a pagamento.**

**SEMPRE usare solo servizi gratuiti e open source.**

## Soluzioni Disponibili

### 1. Screenshot manuale (consigliato)
**Vantaggi:**
- Nessuna API key
- Nessuna dipendenza runtime
- Massima fedeltà visiva (se screenshot da Google Maps UI)

**Svantaggi:**
- Va rigenerata manualmente se cambia l’indirizzo o lo zoom

**Nota:** usare screenshot dalla UI (Google Maps o OpenStreetMap) senza chiamare API.

## Implementazione Scelta

**Soluzione: PNG statica salvata localmente + link Google Maps**

**🚨 REGOLA CRITICA:** MAI usare Google Maps API, Mapbox API o servizi a pagamento. Solo OpenStreetMap o servizi gratuiti.

### Fase 1: Generazione Mappa Statica
1. Generare la PNG tramite screenshot manuale (UI)
2. Salvare PNG in `public/modules/techplanner/images/map-via-vanzo.png`
3. Verificare che l'indirizzo sia chiaramente visibile

### Fase 2: Componente Blade
Creare componente `pub_theme::components.blocks.map.static-clickable` che:
- Mostra l'immagine PNG statica
- Al click, apre Google Maps con link diretto all'indirizzo/coordinate (link gratuito, NON API)
- Supporta responsive design
- Include attributi accessibilità

### Fase 3: Link Google Maps
**Pattern URL Google Maps (search):**

```
https://www.google.com/maps/search/?api=1&query=Via+Vanzo+86%2FA%2C+31021+Mogliano+Veneto+TV
```

Oppure con coordinate:

```
https://www.google.com/maps?q=45.5633,12.2506
```

## Struttura File

```
laravel/
├── Modules/
│   ├── Geo/
│   │   └── docs/
│   │       └── static-map-clickable-implementation.md (questo file)
│   └── TechPlanner/
│       └── resources/
│           └── images/
│               └── map-via-vanzo.png (mappa statica salvata)
└── Themes/
    └── Two/
        └── resources/
            └── views/
                └── components/
                    └── blocks/
                        └── map/
                            └── static-clickable.blade.php (nuovo componente)
```

## Componente Blade - Specifiche

### Props
- `image_path`: Path relativo all'immagine PNG
- `address`: Indirizzo completo per Google Maps
- `coordinates`: Array con `lat` e `lng` (opzionale, per link diretto coordinate)
- `title`: Titolo sezione (default: "Dove Siamo")
- `alt`: Testo alternativo immagine (default: "Mappa ubicazione")

### Comportamento
- Immagine responsive (max-width: 100%, height: auto)
- Cursor pointer al hover
- Link esterno con `target="_blank"` e `rel="noopener noreferrer"`
- Stile hover per indicare interattività

## Best Practices

1. **Accessibilità:**
   - Alt text descrittivo
   - Link con aria-label
   - Focus visible per navigazione tastiera

2. **Performance:**
   - Immagine ottimizzata (compressione PNG)
   - Lazy loading se necessario
   - Dimensioni appropriate (max 1200x800px)

3. **UX:**
   - Indicazione visiva che è cliccabile (hover effect)
   - Messaggio chiaro "Clicca per aprire Google Maps"
   - Link diretto funzionante anche su mobile

## Integrazione con Modulo GEO

Il modulo GEO gestisce:
- Geocoding (conversione indirizzo → coordinate)
- Componenti mappe interattive (Leaflet/Vue)
- Gestione coordinate e bounding box

Per mappe statiche cliccabili:
- Il componente può essere nel tema (più semplice)
- Oppure nel modulo GEO se serve riutilizzabilità cross-tema
- La logica di geocoding può essere nel modulo GEO se serve

## Note Tecniche

### Coordinate Via Vanzo 86/A
- Lat: 45.5633
- Lng: 12.2506
- Bounding box per zoom 15: ~0.01 gradi di offset

### Dimensioni Immagine Consigliate
- Desktop: 800x600px o 1200x800px
- Mobile: 600x400px (responsive)
- Formato: PNG con trasparenza opzionale

## Riferimenti

- [OpenStreetMap Export Image API](https://wiki.openstreetmap.org/wiki/Export_image_api)
- [OpenStreetMap Tile Usage Policy](https://operations.osmfoundation.org/policies/tiles/)
- [Google Maps URL Parameters](https://developers.google.com/maps/documentation/urls/get-started) - Solo per link navigazione (non API)

## ⚠️ Regola Critica Progetto

**MAI usare servizi a pagamento per mappe:**
- ❌ Google Maps API (Static, JavaScript, Geocoding)
- ❌ Mapbox API (qualsiasi tipo)
- ❌ Altri servizi che richiedono API key a pagamento

**SEMPRE usare solo:**
- ✅ OpenStreetMap Export API (gratuito)
- ✅ OpenStreetMap Nominatim (gratuito)
- ✅ OpenStreetMap Tile Servers (gratuito)
- ✅ Link Google Maps per navigazione (gratuito, non è API)


## Aggiornamento 2026
L'indirizzo è stato confermato come **Via Vanzo 86, Mogliano Veneto**. La mappa è stata implementata come PNG statico in `Modules/TechPlanner/resources/images/map-via-vanzo.png`.
