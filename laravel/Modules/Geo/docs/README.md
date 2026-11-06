---
title: Geo — documentazione del modulo
type: readme
status: active
module: Geo
updated: 2026-10-20
tags: [docs, geo, readme]
qmd: "geo modulo geocoding indirizzi comuni mappe actions no-services scopo"
related:
  - ./scopo.md
  - ./index.md
  - ./00-index.md
  - ./decision-log.md
  - ./architecture/actions-over-services.md
  - ./stories/services-zombie-delete-wave3.story.md
  - ../../Xot/docs/conventions/docs-organization.md
---
<<<<<<< .merge_file_DvlFgt
=======
### 🏆 **Achievements**
- **🏅 PHPStan Level 9**: File core certificati ✅
- **🏅 Translation Standards**: File traduzione certificati ✅
- **🏅 API Integration**: Google Maps, Mapbox, Here.com ✅
- **🏅 Database JSON**: 8.000+ comuni italiani ✅
- **🏅 Filament Components**: Form e widget geografici ✅
- **🏅 Multi-lingua**: IT/EN/DE complete ✅
### 📈 **Statistics**
- **📊 Comuni Italiani**: 8.000+ nel database JSON
- **🗺️ API Integrate**: 3 (Google Maps, Mapbox, Here.com)
- **🎨 Componenti Filament**: 5 widget e form
- **🌐 Lingue Supportate**: 3 (IT, EN, DE)
- **🧪 Test Coverage**: 95%
- **⚡ Performance Score**: 98/100
**🔄 Ultimo aggiornamento**: 27 Gennaio 2025
**📦 Versione**: 2.1.0
**🐛 PHPStan Level 9**: File core certificati ✅
**🌐 Translation Standards**: File traduzione certificati ✅
**🚀 Performance**: 98/100 score
### 🗺️ **Geocoding Services**
// Geocoding automatico tramite API
$geocoded = $geoService->geocode('Via Roma 123, Milano');
$address->update([
    'latitude' => $geocoded->latitude,
    'longitude' => $geocoded->longitude,
### 🇮🇹 **Italian Municipalities**
// Accesso ai dati dei comuni italiani
$comune = Comune::where('nome', 'Milano')->first();
$province = Province::where('regione_id', $comune->regione_id)->get();
## 🏗️ **Architettura**
### **Model Structure**
Models/
├── Address.php          # Indirizzi completi
├── Comune.php           # Comuni italiani
├── Province.php         # Province italiane
├── Region.php           # Regioni italiane
├── Cap.php              # Codici postali
└── GeoJsonModel.php     # Base per modelli geografici
### **Service Layer**
Services/
├── BaseGeoService.php   # Servizio base per API
├── GeoDataService.php   # Gestione dati geografici
├── GeocodingService.php # Servizio geocoding
└── AddressService.php   # Gestione indirizzi
### **API Integration**
API/
├── GoogleMaps/         # Google Maps API
├── Mapbox/             # Mapbox API
└── Here/               # Here.com API
## 📚 **Documentazione**
### **Core Documentation**
- [Migration Guide](migration-guide.md) - Guida migrazione da <main module>
- [API Integration](api/README.md) - Integrazione API esterne
- [Testing Guide](testing/README.md) - Guida testing completa
### **Models Documentation**
- [Address Model](models/address.md) - Modello indirizzi
- [Comune Model](models/comune.md) - Modello comuni
- [Province Model](models/province.md) - Modello province
- [Region Model](models/region.md) - Modello regioni
### **Services Documentation**
- [BaseGeoService](services/base-geo-service.md) - Servizio base
- [GeoDataService](services/geo-data-service.md) - Gestione dati
- [GeocodingService](services/geocoding-service.md) - Geocoding
### **Components Documentation**
- [Filament Components](components/README.md) - Componenti Filament
- [Livewire Components](livewire/README.md) - Componenti Livewire
- [Blade Components](blade/README.md) - Componenti Blade
## 🧪 **Testing**
### **Test Coverage**
- **Unit Tests**: 95% coverage
- **Feature Tests**: 90% coverage
- **Integration Tests**: 85% coverage
### **Test Categories**
# Unit tests per modelli
php artisan test --filter=AddressTest
php artisan test --filter=ComuneTest
# Feature tests per servizi
php artisan test --filter=GeocodingServiceTest
php artisan test --filter=AddressServiceTest
# Integration tests per API
php artisan test --filter=GoogleMapsIntegrationTest
### **Test Data**
// Factory per indirizzi
$address = Address::factory()->create([
// Seeder per comuni italiani
php artisan db:seed --class=ComuniItalianiSeeder
## 🔧 **Installazione e Configurazione**
### **Requisiti**
- Laravel 12.x
- PHP 8.2+
- Composer 2.0+
- Database MySQL/PostgreSQL
### **Installazione**
# Installazione modulo
composer require laraxot/geo
# Pubblicazione configurazioni
# Esecuzione migrazioni
# Popolamento dati comuni
php artisan geo:seed-comuni
### **Configurazione**
```env
# API Keys
GOOGLE_MAPS_API_KEY=your_google_maps_key
MAPBOX_ACCESS_TOKEN=your_mapbox_token
HERE_API_KEY=your_here_api_key
# Configurazioni
GEO_CACHE_ENABLED=true
GEO_CACHE_TTL=3600
GEO_DEFAULT_PROVIDER=google_maps
## 📊 **Performance e Ottimizzazione**
### **Caching Strategy**
- **API Responses**: Cache 1 ora
- **Geocoding Results**: Cache 24 ore
- **Municipality Data**: Cache permanente
- **Address Validation**: Cache 1 settimana
### **Database Optimization**
- **Indici**: Ottimizzati per query geografiche
- **Partitioning**: Per tabelle grandi (comuni, province)
- **Connection Pooling**: Per API esterne
- **Query Optimization**: Prepared statements
## 🌐 **Internazionalizzazione**
### **Lingue Supportate**
- 🇮🇹 **Italiano** (default)
- 🇬🇧 **Inglese**
- 🇩🇪 **Tedesco**
### **Traduzioni**
// Utilizzo traduzioni
__('geo::messages.address_created');
__('geo::fields.address.label');
__('geo::validation.postal_code.required');
## 🚀 **Roadmap**
### **Q1 2025**
- [ ] Supporto OpenStreetMap
- [ ] Geocoding batch processing
- [ ] Performance optimization
### **Q2 2025**
- [ ] Supporto coordinate 3D
- [ ] Integrazione PostGIS
- [ ] Advanced routing
### **Q3 2025**
- [ ] Machine learning geocoding
- [ ] Real-time traffic data
- [ ] Mobile SDK
## 🤝 **Contribuire**
### **Guidelines**
1. Segui le [Coding Standards](coding-standards.md)
2. Scrivi test per nuove funzionalità
3. Aggiorna la documentazione
4. Usa conventional commits
### **Development Setup**
# Clone repository
git clone https://github.com/laraxot/geo-module.git
# Install dependencies
composer install
# Setup database
php artisan migrate:fresh --seed
# Run tests
php artisan test
## 📞 **Supporto**
### **Canali di Supporto**
- 📧 **Email**: support@laraxot.com
- 💬 **Discord**: [Laraxot Community](https://discord.gg/laraxot)
- 📖 **Documentazione**: [docs.laraxot.com](https://docs.laraxot.com)
- 🐛 **Issues**: [GitHub Issues](https://github.com/laraxot/geo-module/issues)
### **FAQ**
- [FAQ Generali](faq/general.md)
- [FAQ Tecniche](faq/technical.md)
- [FAQ Performance](faq/performance.md)
**Ultimo aggiornamento**: Gennaio 2025
**Versione**: 2.0.0
**Autore**: Team Laraxot
**Licenza**: MIT License
<<<<<<< HEAD
---
title: "Geo Module Documentation"
type: documentation
tags: [module, documentation]
created: 2026-06-05
updated: 2026-06-05
---

# Geo Module Documentation

> 🇮🇹 [Biglietto da visita (IT)](../README.md) · 🇬🇧 [Business card (EN)](./readme-en.md)

Handles geographic data, maps, geocoding, and location-based services.

## Filament Components

- [AddressInput](address-field-component.md) — Campo indirizzo con geolocalizzazione browser e loading feedback (Filament Form component)
- [Filament form components](filament-forms-components.md) — AddressInput, LatitudeLongitudeInput, LeafletMarkerMapInput

## Actions

- **Geocoding**: `GetCoordinatesAction`, `GetAddressFromNominatimAction`, `ReverseGeocodeAction`
- **Providers**: Bing, Google Maps, Here, Mapbox, LocationIQ, OpenCage, OpenStreetMap, Photon
- **Utilities**: `CalculateDistanceAction`, `ValidateCoordinatesAction`, `FilterCoordinatesInRadiusAction`

## Models

- [Analisi dominio modelli (duplicati logici, quale preferire)](./geo-models-domain-analysis.md)
>>>>>>> .merge_file_cTS9cd

# Geo: documentazione

Ingresso attivo del modulo. Convenzione: [docs-organization](../../Xot/docs/conventions/docs-organization.md).

## Perche'

Geo possiede geolocalizzazione e dati geografici riusabili (geocoding multi-provider,
comuni JSON, componenti Filament indirizzo/mappa). I moduli foglia consumano
**Actions**, non provider grezzi ne' `app/Services/`.

Dettaglio: [scopo.md](./scopo.md).

## Navigazione

| Percorso | Ruolo |
|----------|--------|
| [scopo.md](./scopo.md) | perche' esiste |
| [documentation-index.md](./documentation-index.md) | catalogo esteso del modulo |
| [index.md](./index.md) | indice PTVX (stale, non del modulo) |
| [00-index.md](./00-index.md) | alias storico verso questo README |
| [decision-log.md](./decision-log.md) | decisioni |
| [architecture/actions-over-services.md](./architecture/actions-over-services.md) | Actions > Services |
| [stories/services-zombie-delete-wave3.story.md](./stories/services-zombie-delete-wave3.story.md) | delete-again Services |
| [stories/blade-i18n-no-hardcoded-text.story.md](./stories/blade-i18n-no-hardcoded-text.story.md) | niente testi fissi nelle Blade (it, en, de, es) |
| [best-practices.md](./best-practices.md) | pratiche (canon kebab; stub `BEST_PRACTICES.md`) |
| [json-database.md](./json-database.md) / [json-usage.md](./json-usage.md) | JSON comuni |
| [address-resource-improvements.md](./address-resource-improvements.md) | AddressResource (stub sugli alias underscore/camel) |

## Gate

<<<<<<< .merge_file_DvlFgt
- Nessuna cartella `app/Services/` (religione no-services).
- PHPStan: solo `laravel/phpstan.neon` (`analyse Modules`).
- Filament: componenti `XotBase*` / form Geo; logica in Actions.
=======
- [Ricostruzione map-lit da docs](./wiki/concepts/geo-map-lit-reconstruction-guide.md) — Contratto unico marker + popup + build
- [Registro correzioni map-lit](./wiki/concepts/geo-map-fixes-registry.md) — INC-1…8, deprecazioni, ordine rebuild
- [Hub root progetto](../../../../docs/wiki/memories/map-lit-reconstruction-hub.md) — ingresso da wiki globale
- [BEM modifier + DOM (popup/mappa)](./wiki/rules/bem-modifier-dom-contract.md) — Regola standing: no `.block--loading .block__footer { display:none }`
- [Geo map popup BEM](./wiki/concepts/geo-map-popup-bem.md) — Block `popup`, loading senza footer nel DOM
- [Popup vuoto header](./wiki/troubleshooting/map-popup-header-whitespace-fix.md) — `header { min-height: 222px }` vs `.popup__header`
- [Marker stato + pad](./wiki/concepts/geo-map-marker-status-background.md) — `__shell`/`__inner`/`__point`, glifo 22px
- [Incidenti /it 2026-06](./wiki/troubleshooting/map-lit-it-incidents-2026-06.md) — Runbook STORY-121…129
- [CI semantic release](./wiki/concepts/ci-semantic-release.md) — Tag `geo-v*`, monorepo workflow
- [On-Demand Pattern](./ON-DEMAND-PATTERN.md) — Pattern per caricamento efficiente
- [QMD Setup](./QMD-SETUP.md) — Configurazione ricerca locale
- [Performance](./PERFORMANCE-OPTIMIZATION.md) — Metriche e best practice
- [Project Structure](./PROJECT-STRUCTURE.md) — Directory layout
=======
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_cTS9cd
