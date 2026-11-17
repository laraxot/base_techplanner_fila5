<<<<<<< HEAD
# PHPStan Level 10 Fixes Roadmap - Modulo Geo

**Data Creazione**: 2025-01-27  
**Data Creazione**: [DATE]  
**Errori Totali**: 1 errore  
**Status**: 🟡 In Progress

## Panoramica

Il modulo Geo ha **1 errore PHPStan** che deve essere risolto per raggiungere la conformità Level 10.

## Errore Dettagliato

### File: `app/Actions/Bing/GetAddressFromBingMapsAction.php`

#### Linea 185 - Return Type Issue
**Errore**: `Method extractLocationFromResponse() should return array<string, mixed> but returns array`

**Causa**: Il metodo ha PHPDoc `@return array<string, mixed>` ma il return type dichiarato è solo `array` senza generics

**Soluzione**:
```php
/**
 * Extract location from Bing Maps API response.
 *
 * @param array<string, mixed> $response
 *
 * @throws InvalidLocationException
 *
 * @return array<string, mixed>
 */
private function extractLocationFromResponse(array $response): array
{
    // ... codice esistente ...
    
    /** @var array<string, mixed> $location */
    return $location;
}
```

**Alternativa (se PHPStan richiede type più specifico)**:
Se PHPStan continua a segnalare l'errore, possiamo usare un array shape più specifico:

```php
/**
 * @return array{
 *     address: array<string, mixed>,
 *     point?: array{coordinates: array{0: float, 1: float}},
 *     bbox?: array{0: float, 1: float, 2: float, 3: float}
 * }
 */
private function extractLocationFromResponse(array $response): array
{
    // ... codice esistente ...
    
    return $location;
}
```

## Piano di Implementazione

### Fase 1: Verifica Type Hint (Priorità Alta)
- [ ] Verificare che il PHPDoc `@return array<string, mixed>` sia presente
- [ ] Verificare che il return type sia `array` (non `mixed`)
- [ ] Aggiungere `@var array<string, mixed> $location` prima del return se mancante

### Fase 2: Test PHPStan
- [ ] Eseguire PHPStan Level 10 sul file
- [ ] Se l'errore persiste, considerare array shape più specifico

### Fase 3: Verifica Funzionale
- [ ] Testare che l'azione funzioni correttamente dopo le modifiche
- [ ] Verificare che i dati estratti siano corretti

### Fase 4: Documentazione
- [ ] Aggiornare questa roadmap con status ✅
- [ ] Documentare pattern utilizzato

## Note Tecniche

- Il metodo estrae dati da una risposta API di Bing Maps
- I dati possono variare in struttura, quindi `array<string, mixed>` è appropriato
- Se necessario, possiamo creare un DTO specifico per la location

## Riferimenti

- [PHPStan Array Types](https://phpstan.org/writing-php-code/phpdoc-types#array-types)
- [Array Shapes in PHPStan](https://phpstan.org/writing-php-code/phpdoc-types#array-shapes)
=======
# PHPStan Fixes Roadmap - Geo Module

This document outlines the plan to fix the PHPStan errors found in the Geo module.

## Files with Errors

*   **app/Actions/Bing/GetAddressFromBingMapsAction.php**
    *   Error: `Method Modules\Geo\Actions\Bing\GetAddressFromBingMapsAction::extractLocationFromResponse() should return array<string, mixed> but returns array.`
*   **app/Datas/UpdateCoordinatesResult.php**
    *   Error: `Method Modules\Geo\Datas\UpdateCoordinatesResult::getErrorMessages() should return array<int, string> but returns array.`
*   **app/Models/ComuneJson.php**
    *   Error: `Method Modules\Geo\Models\ComuneJson::byRegion() should return Illuminate\Support\Collection<int, array{nome: string, codice: string, regione: array{codice: string, nome: string}, provincia: array{codice: string, nome: string}, cap: array<int, string>, codiceCatastale: string, popolazione: int}> but returns mixed.`
    *   Error: `Method Modules\Geo\Models\ComuneJson::byProvince() should return Illuminate\Support\Collection<int, array{nome: string, codice: string, regione: array{codice: string, nome: string}, provincia: array{codice: string, nome: string}, cap: array<int, string>, codiceCatastale: string, popolazione: int}> but returns mixed.`
    *   Error: `Method Modules\Geo\Models\ComuneJson::searchByName() should return Illuminate\Support\Collection<int, array{nome: string, codice: string, regione: array{codice: string, nome: string}, provincia: array{codice: string, nome: string}, cap: array<int, string>, codiceCatastale: string, popolazione: int}> but returns mixed.`
    *   Error: `Method Modules\Geo\Models\ComuneJson::getGerarchia() should return array{regione: array{codice: string, nome: string}|null, provincia: array{codice: string, nome: string}|null, comune: array{nome: string, codice: string|null, codiceCatastale: string|null, popolazione: int|null}, cap: array<int, string>}|null but returns mixed.`
*   **app/Services/GeoDataService.php**
    *   Error: `Method Modules\Geo\Services\GeoDataService::getRegions() should return Illuminate\Support\Collection<int, array{name: string, code: string}> but returns mixed.`
    *   Error: `Method Modules\Geo\Services\GeoDataService::getProvinces() should return Illuminate\Support\Collection<int, array{name: string, code: string}> but returns mixed.`
    *   Error: `Method Modules\Geo\Services\GeoDataService::getCities() should return Illuminate\Support\Collection<int, array{name: string, code: string}> but returns mixed.`
    *   Error: `Method Modules\Geo\Services\GeoDataService::getCap() should return string|null but returns mixed.`
    *   Error: `Method Modules\Geo\Services\GeoDataService::loadData() should return Illuminate\Support\Collection<int, array<string, mixed>> but returns Illuminate\Support\Collection<(int|string), mixed>.`
*   **app/Services/GeoDataValidator.php**
    *   Error: `Method Modules\Geo\Services\GeoDataValidator::getErrors() should return array<string, array<int, string>> but returns array.`
>>>>>>> 6ed19256f (.)
