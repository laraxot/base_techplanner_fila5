# Regola: Solo Servizi Mappe Gratuiti

## Regola Critica per Tema Two

**🚨 MAI usare Google Maps API, Mapbox API o altri servizi a pagamento per mappe.**

**SEMPRE usare solo servizi gratuiti e open source.**

## Implementazione Corrente

### Mappa Statica Pagina Contatti

**Componente:** `pub_theme::components.blocks.map.static-clickable`

**Servizi Utilizzati:**
- ✅ OpenStreetMap Export API (per mappa statica)
- ✅ OpenStreetMap (apertura pagina con marker/search)

**Servizi NON Utilizzati:**
- ❌ Google Maps Static API
- ❌ Google Maps JavaScript API
- ❌ Mapbox API

## Pattern Implementazione

### Mappa Statica

```php
// Usare OpenStreetMap Export API (gratuito)
$bbox = 'min_lon,min_lat,max_lon,max_lat';
$imageUrl = "https://render.openstreetmap.org/cgi-bin/export?bbox={$bbox}&scale=10000&format=png";
```

### Link Destinazione

```php
// Link OpenStreetMap (gratuito)
$mapUrl = "https://www.openstreetmap.org/search?query={$address}";
```

## Verifica

Prima di ogni commit, verificare:
- [ ] Nessuna chiamata a Google Maps API
- [ ] Nessuna chiamata a Mapbox API
- [ ] Solo OpenStreetMap per mappe statiche
- [ ] Link destinazione solo OpenStreetMap

## Documentazione Correlata

- [Regola Cursor](../../../../.cursor/rules/free-maps-only.mdc)
- [Modulo GEO: Mappe Solo Gratuite](../../Modules/Geo/docs/mappe-solo-gratuite.md)
- [Implementazione Completa](./mappa-statica-implementazione-completa.md)
