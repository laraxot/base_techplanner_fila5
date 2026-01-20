<<<<<<< HEAD
# Modulo Geo - Filosofia, Religione, Politica, Zen

## 🎯 Panoramica

Il modulo Geo è il sistema di geolocalizzazione e gestione indirizzi per l'architettura Laraxot, responsabile della gestione di indirizzi, coordinate geografiche e integrazione con servizi di mappatura. La sua filosofia è incentrata sulla **standardizzazione Schema.org, la flessibilità polimorfa e la type safety**, garantendo che gli indirizzi siano sempre strutturati, validati e compatibili con standard web.

## 🏛️ Filosofia: Indirizzi Standardizzati e Flessibili

### Principio: Ogni Indirizzo Segue Schema.org, Ogni Entità Può Avere Indirizzi

La filosofia di Geo si basa sull'idea che gli indirizzi debbano seguire lo standard Schema.org `PostalAddress`, garantendo compatibilità con servizi esterni e SEO, mentre permettendo relazioni polimorfe per massima flessibilità.

- **Schema.org Compliance**: Il modello `Address` implementa lo standard Schema.org `PostalAddress`, garantendo compatibilità con Google, OpenStreetMap e altri servizi.
- **Polymorphic Relationships**: Gli indirizzi sono collegati ai modelli attraverso relazioni polimorfe (`morphTo`), permettendo a qualsiasi entità di avere indirizzi.
- **Multi-Address Support**: Supporto per indirizzi multipli per entità, con identificazione del tipo (`AddressTypeEnum`) e indirizzo primario.
- **Geocoding Integration**: Integrazione con servizi di geocoding (Google Maps) per conversione automatica indirizzo → coordinate.

## 📜 Religione: La Sacra Standardizzazione Schema.org

### Principio: Schema.org è la Bibbia degli Indirizzi

La "religione" di Geo si manifesta nella rigorosa aderenza allo standard Schema.org `PostalAddress`. Ogni campo dell'indirizzo deve corrispondere a uno standard Schema.org, e ogni indirizzo deve essere convertibile in formato Schema.org.

- **Field Mapping Schema.org**: Ogni campo del modello `Address` corrisponde a un campo Schema.org (`streetAddress`, `addressLocality`, `addressRegion`, `postalCode`, ecc.).
- **Method `toSchemaOrg()`**: Ogni indirizzo può essere convertito in formato Schema.org JSON-LD per SEO e compatibilità.
- **Formatted Address**: L'indirizzo formattato segue standard internazionali, con supporto per formati specifici per paese.
- **Place ID Integration**: Supporto per Google Places ID per identificazione univoca dei luoghi.

### Esempio: Schema.org Compliance

```php
// Modules/Geo/app/Models/Address.php
namespace Modules\Geo\Models;

class Address extends BaseModel
{
    /**
     * Restituisce i dati in formato Schema.org PostalAddress.
     *
     * @return array<string, mixed>
     */
    public function toSchemaOrg(): array
    {
        return [
            '@context' => 'https://schema.org',
            '@type' => 'PostalAddress',
            'name' => $this->name,
            'description' => $this->description,
            'streetAddress' => $this->getStreetAddressAttribute(),
            'addressLocality' => $this->locality,
            'addressSubregion' => $this->administrative_area_level_3, // Provincia
            'addressRegion' => $this->administrative_area_level_2, // Regione
            'addressCountry' => $this->country,
            'postalCode' => $this->postal_code,
        ];
    }

    /**
     * Getter per l'indirizzo completo in formato italiano.
     */
    public function getFullAddressAttribute(): string
    {
        $parts = array_filter([
            $this->route.($this->street_number ? ' '.$this->street_number : ''),
            $this->locality,
            $this->administrative_area_level_3, // Provincia
            $this->administrative_area_level_2, // Regione
            $this->postal_code,
            $this->country,
        ]);
        return implode(', ', $parts);
    }
}
```
Questa implementazione garantisce che ogni indirizzo sia sempre compatibile con Schema.org, un pilastro della "religione" di Geo.

## ⚖️ Politica: Type Safety e Validazione Geografica (PHPStan Livello 10)

### Principio: Ogni Coordinate è Validata, Ogni Indirizzo è Type-Safe

La "politica" di Geo è l'applicazione rigorosa della type safety e della validazione geografica, specialmente nella gestione delle coordinate e nella ricerca geografica. Ogni coordinate deve essere validata e ogni query geografica deve essere type-safe.

- **PHPStan Livello 10**: Tutti i componenti del modulo Geo devono passare l'analisi statica al livello massimo.
- **Coordinate Type Safety**: Le coordinate (`latitude`, `longitude`) sono sempre tipizzate come `float` e validate.
- **Geographic Queries**: Le query geografiche (es. `nearby`) utilizzano formule matematiche validate (Haversine formula) per calcoli di distanza.
- **Address Type Enum**: Il tipo di indirizzo è gestito attraverso `AddressTypeEnum` per type safety.

### Esempio: Geographic Queries e Type Safety

```php
// Modules/Geo/app/Models/Address.php
class Address extends BaseModel
{
    /**
     * Scope per cercare indirizzi nelle vicinanze.
     * Utilizza la formula di Haversine per calcolare la distanza.
     */
    public function scopeNearby(
        Builder $query,
        float $latitude,
        float $longitude,
        float $radiusKm = 10
    ): Builder {
        return $query
            ->selectRaw('
                *,
                (6371 * acos(
                    cos(radians(?)) * cos(radians(latitude)) * 
                    cos(radians(longitude) - radians(?)) + 
                    sin(radians(?)) * sin(radians(latitude))
                )) AS distance
            ', [$latitude, $longitude, $latitude])
            ->having('distance', '<', $radiusKm)
            ->orderBy('distance');
    }

    /**
     * Get the attributes that should be cast.
     */
    #[Override]
    protected function casts(): array
    {
        return [
            'latitude' => 'float',
            'longitude' => 'float',
            'is_primary' => 'boolean',
            'extra_data' => 'array',
            'type' => AddressTypeEnum::class,
        ];
    }
}
```
Questo approccio garantisce che le query geografiche siano sempre accurate e type-safe, un aspetto cruciale della "politica" di Geo.

## 🧘 Zen: Semplicità e Auto-Formattazione

### Principio: L'Indirizzo si Formatta da Solo

Lo "zen" di Geo si manifesta nella preferenza per l'auto-formattazione e le convenzioni rispetto alla configurazione esplicita. Il modulo mira a rendere la gestione degli indirizzi il più trasparente possibile.

- **Auto-Formatting**: Gli indirizzi sono formattati automaticamente in base al paese e alle convenzioni locali.
- **JSON Data Caching**: I dati geografici statici (comuni, province, regioni) sono caricati da JSON e cachati per performance.
- **GeoJsonModel Abstraction**: Astrazione per modelli geografici readonly basati su JSON (`GeoJsonModel`).
- **Service Abstraction**: Servizi geografici (`GeoService`, `GeoDataService`) nascondono la complessità delle operazioni geografiche.

### Esempio: Auto-Formattazione e JSON Caching

```php
// Modules/Geo/app/Models/GeoJsonModel.php
abstract class GeoJsonModel
{
    protected static string $jsonFile = 'resources/json/comuni.json';

    /**
     * Carica e cache-izza i dati dal file json.
     */
    protected static function loadData(): Collection
    {
        $path = module_path('Geo', static::$jsonFile);
        $cacheKey = 'geo_comuni_json_'.md5($path);
        $data = cache()->rememberForever($cacheKey, fn () => 
            json_decode(file_get_contents($path), true)
        );
        return collect($data);
    }
}

// Modules/Geo/app/Services/GeoDataService.php
class GeoDataService
{
    private const CACHE_KEY_REGIONS = 'geo.regions';
    private const CACHE_TTL = 86400; // 24 ore

    /**
     * Ottiene tutte le regioni (con cache).
     */
    public function getRegions(): Collection
    {
        return Cache::remember(
            self::CACHE_KEY_REGIONS,
            self::CACHE_TTL,
            fn (): Collection => $this->loadData()->pluck('name', 'code')
        );
    }
}
```
Questo approccio incarna lo zen della semplicità, nascondendo la complessità della gestione geografica dietro un'interfaccia semplice e performante.

## 📚 Riferimenti Interni

- [Documentazione Master del Progetto](../../../docs/project-master-analysis.md)
- [Filosofia Completa Laraxot](../../xot/docs/philosophy-complete.md)
- [Regole Critiche di Architettura](../../xot/docs/critical-architecture-rules.md)
- [Documentazione Geo README](./readme.md)

=======
# Geo Module: Philosophy, Purpose, and Design Principles

**Date:** December 23, 2025

## 🎯 Purpose and Core Responsibilities

The `Geo` module is the dedicated component for managing all geographical data and location-based functionalities within the application. Its core purpose is to provide a standardized and reliable infrastructure for handling anything related to countries, regions, cities, addresses, and coordinates. Given the minimalist nature of its `ServiceProvider`, the module is designed to:

1.  **Encapsulate Geographical Domain Logic:** Serve as the dedicated container for all models, actions, services, and Filament resources directly pertaining to geographical data.
2.  **Module Registration:** Register itself with the application, allowing its resources (models, views, migrations, Filament components) to be discovered and utilized.
3.  **Leverage `Xot` Base Functionality:** By extending `XotBaseServiceProvider`, it implicitly inherits and utilizes the foundational bootstrapping, configuration, and architectural patterns provided by the `Xot` module. This ensures consistency and reduces boilerplate code within the `Geo` module itself, allowing it to focus purely on its domain.

## 💡 Philosophy & Zen (Guiding Principles)

The `Geo` module, while concise in its service provider, embodies several key design principles:

*   **Domain-Driven Design Focus:** The existence of a dedicated `Geo` module reinforces a design philosophy where distinct business domains are encapsulated into separate, manageable units. This approach enhances clarity, reduces complexity, and promotes reusability for geographical concerns.
*   **Lean and Focused Implementation:** The minimalist `GeoServiceProvider` indicates an intention for the module to be lean, with its core logic residing closer to its specific geographical domain (models, actions, Filament resources) rather than in complex service provider bootstrapping. This promotes efficiency and minimizes overhead.
*   **Architectural Conformity and Consistency (`Xot` Alignment):** The module's adherence to `XotBaseServiceProvider` signifies its commitment to the project's overarching modular architecture. It operates in harmony with other modules, benefiting from `Xot`'s established patterns without needing to redefine them.
*   **"Politics" (Location-Awareness as a Standard):** The "politics" of this module dictate that the application should be location-aware and location-intelligent wherever necessary. It asserts that geographical context is a vital component for enriching user experiences, informing business processes, and ensuring data accuracy.
*   **"Religion" (The Importance of Precise Location Data):** The "religion" here is a fundamental belief in the critical importance and accuracy of location data. The module is built on the principle that structured, validated geographical information is essential for everything from user targeting and logistics to data analysis and compliance.
*   **"Zen" (Effortless Geographical Integration):** The "zen" of the `Geo` module is to provide an effortless, reliable, and precise system for integrating geographical data. It aims for a state where location-based information is seamlessly accessible, consistently managed, and intuitively utilized across the application, leading to clear insights and enhancing the application's ability to operate effectively within the real world.

## 🤝 Business Logic (Core Geographical Data Management)

The `Geo` module is designed to hold the core business logic related to **geographical data management**. This would typically include functionalities such as:

*   **Geographical Data Storage:** Managing models for countries, administrative divisions (regions, provinces), cities, and specific addresses.
*   **Geocoding and Reverse Geocoding:** Converting addresses to coordinates and vice-versa, potentially integrating with external mapping APIs.
*   **Location-Based Services:** Providing capabilities for proximity searches, calculating distances, or defining geographical boundaries.
*   **Data Validation:** Ensuring the accuracy and consistency of geographical information.
*   **UI Integration:** Facilitating the integration of maps, address autocomplete fields, and location pickers within the application's user interfaces.

Thus, the `Geo` module is a fundamental building block for any application features that require an understanding or interaction with the physical world.

## 🤖 Integration with Model Context Protocol (MCP)

The `Geo` module, as the guardian of geographical data, can significantly benefit from integration with Model Context Protocol (MCP) servers. MCPs offer enhanced capabilities for inspecting, managing, and debugging location-based information, aligning perfectly with `Geo`'s philosophy of effortless geographical integration and precise data.

### Alignment with `Geo`'s Philosophy:

*   **Precise Location Data:** MCPs provide tools to inspect and validate geographical data models, ensuring accuracy and consistency. Laravel Boost can query location records directly, helping to verify data integrity and relationships.
*   **Effortless Geographical Integration:** By providing intelligent access to geographical data and related services (e.g., geocoding results), MCPs can accelerate the development and debugging of location-based features.
*   **Developer Experience (DX) Enhancement:** For developers building location-aware features, quickly querying address data, inspecting geocoding results, or validating geographical boundaries via Laravel Boost can significantly accelerate development and debugging cycles.
*   **"Zen" (Effortless Geographical Integration):** MCPs contribute to this zen by making geographical data more transparent, verifiable, and manageable, leading to a calmer and more confident development and operational environment for location-based services.

### Key MCPs for `Geo`'s Operations:

1.  **Laravel Boost (MCP)**: Invaluable for querying geographical models (Countries, Regions, Addresses), inspecting coordinate data, and validating relationships between location entities. It can help debug geocoding results and location-based queries.
2.  **Filesystem (MCP)**: Useful for inspecting configuration files related to mapping APIs (e.g., Google Maps API keys) or geographical data seeders.
3.  **Memory (MCP)**: Can store and retrieve best practices for geographical data modeling, common geocoding challenges, and architectural decisions related to location services, enhancing knowledge transfer and consistency.
4.  **Git (MCP)**: Aids in reviewing changes to geographical data models, geocoding logic, or mapping integrations, ensuring data accuracy and proper functionality.
5.  **Sequential Thinking (MCP)**: Crucial for analyzing complex geo-spatial queries or geocoding workflows, helping to break down and understand intricate location-based processes.

By leveraging these MCPs, the `Geo` module can ensure its critical role in managing geographical data is more efficient, verifiable, and transparent, ultimately contributing to more accurate and reliable location-aware applications.
>>>>>>> 4b6b99016 (first commit)
