# Modulo Geo — metodi con parametro `array`

[← Torna all'indice](../array-parameters-census.md)

Totale metodi trovati: **83**

---

## `Modules/Geo/app/Actions/Bing/GetAddressFromBingMapsAction.php`

Namespace: `Modules\Geo\Actions\Bing`

### `private function parseResponse(...)` — class `GetAddressFromBingMapsAction` (linea 97)

```php
function parseResponse(array $response)
```

**Parametri array:**
- `array $response`

### `private function extractLocationFromResponse(...)` — class `GetAddressFromBingMapsAction` (linea 162)

```php
function extractLocationFromResponse(array $response)
```

**Parametri array:**
- `array $response`

### `private function extractCoordinatesFromLocation(...)` — class `GetAddressFromBingMapsAction` (linea 212)

```php
function extractCoordinatesFromLocation(array $location)
```

**Parametri array:**
- `array $location`

### `private function extractStringField(...)` — class `GetAddressFromBingMapsAction` (linea 240)

```php
function extractStringField(array $data, string $key)
```

**Parametri array:**
- `array $data`

---

## `Modules/Geo/app/Actions/ClusterLocationsAction.php`

Namespace: `Modules\Geo\Actions`

### `public function execute(...)` — class `ClusterLocationsAction` (linea 31)

```php
function execute(array $locations, float $maxDistance = 1.0)
```

**Parametri array:**
- `array $locations`

---

## `Modules/Geo/app/Actions/FilterCoordinatesAction.php`

Namespace: `Modules\Geo\Actions`

### `public function execute(...)` — class `FilterCoordinatesAction` (linea 30)

```php
function execute(array $coordinates, float $centerLat, float $centerLng, float $radiusKm)
```

**Parametri array:**
- `array $coordinates`

---

## `Modules/Geo/app/Actions/FilterCoordinatesInRadiusAction.php`

Namespace: `Modules\Geo\Actions`

### `public function execute(...)` — class `FilterCoordinatesInRadiusAction` (linea 32)

```php
function execute(float $centerLatitude, float $centerLongitude, array $coordinates, int $radius)
```

**Parametri array:**
- `array $coordinates`

---

## `Modules/Geo/app/Actions/Geo/Support/GeoMapDatasetAction.php`

Namespace: `Modules\Geo\Actions\Geo\Support`

### `private function normalizeFeatureCollection(...)` — class `GeoMapDatasetAction` (linea 139)

```php
function normalizeFeatureCollection(array $decoded)
```

**Parametri array:**
- `array $decoded`

### `private function normalizeFeature(...)` — class `GeoMapDatasetAction` (linea 170)

```php
function normalizeFeature(array $feature)
```

**Parametri array:**
- `array $feature`

### `private function normalizeProperties(...)` — class `GeoMapDatasetAction` (linea 208)

```php
function normalizeProperties(array $properties)
```

**Parametri array:**
- `array $properties`

---

## `Modules/Geo/app/Actions/GeoData/CheckGeoDataIntegrityAction.php`

Namespace: `Modules\Geo\Actions\GeoData`

### `public function execute(...)` — class `CheckGeoDataIntegrityAction` (linea 16)

```php
function execute(array $data)
```

**Parametri array:**
- `array $data`

### `private function isValidRegionWithUniqueCode(...)` — class `CheckGeoDataIntegrityAction` (linea 46)

```php
function isValidRegionWithUniqueCode(array $region, array &$regionCodes)
```

**Parametri array:**
- `array $region`

### `private function isValidProvinceWithUniqueCode(...)` — class `CheckGeoDataIntegrityAction` (linea 79)

```php
function isValidProvinceWithUniqueCode(array $province, array &$provinceCodes)
```

**Parametri array:**
- `array $province`

### `private function isValidCityWithUniqueCode(...)` — class `CheckGeoDataIntegrityAction` (linea 121)

```php
function isValidCityWithUniqueCode(array $city, array &$cityCodes)
```

**Parametri array:**
- `array $city`

---

## `Modules/Geo/app/Actions/GeoData/GetGeoDataValidationErrorsAction.php`

Namespace: `Modules\Geo\Actions\GeoData`

### `public function execute(...)` — class `GetGeoDataValidationErrorsAction` (linea 19)

```php
function execute(array $data)
```

**Parametri array:**
- `array $data`

---

## `Modules/Geo/app/Actions/GeoData/ValidateGeoDataAction.php`

Namespace: `Modules\Geo\Actions\GeoData`

### `public function execute(...)` — class `ValidateGeoDataAction` (linea 17)

```php
function execute(array $data)
```

**Parametri array:**
- `array $data`

---

## `Modules/Geo/app/Actions/GeoData/ValidateGeoDataIntegrityAction.php`

Namespace: `Modules\Geo\Actions\GeoData`

### `public function execute(...)` — class `ValidateGeoDataIntegrityAction` (linea 35)

```php
function execute(array $data)
```

**Parametri array:**
- `array $data`

### `public function getErrors(...)` — class `ValidateGeoDataIntegrityAction` (linea 64)

```php
function getErrors(array $data)
```

**Parametri array:**
- `array $data`

### `private function validate(...)` — class `ValidateGeoDataIntegrityAction` (linea 77)

```php
function validate(array $data)
```

**Parametri array:**
- `array $data`

### `private function isValidRegionWithUniqueCode(...)` — class `ValidateGeoDataIntegrityAction` (linea 90)

```php
function isValidRegionWithUniqueCode(array $region, array &$regionCodes)
```

**Parametri array:**
- `array $region`

### `private function isValidProvinceWithUniqueCode(...)` — class `ValidateGeoDataIntegrityAction` (linea 123)

```php
function isValidProvinceWithUniqueCode(array $province, array &$provinceCodes)
```

**Parametri array:**
- `array $province`

### `private function isValidCityWithUniqueCode(...)` — class `ValidateGeoDataIntegrityAction` (linea 165)

```php
function isValidCityWithUniqueCode(array $city, array &$cityCodes)
```

**Parametri array:**
- `array $city`

---

## `Modules/Geo/app/Actions/GetCoordinatesByAddressAction.php`

Namespace: `Modules\Geo\Actions`

### `private function makeHttpRequest(...)` — class `GetCoordinatesByAddressAction` (linea 118)

```php
function makeHttpRequest(string $url, array $params)
```

**Parametri array:**
- `array $params`

### `private function extractBingCoordinates(...)` — class `GetCoordinatesByAddressAction` (linea 149)

```php
function extractBingCoordinates(array $data)
```

**Parametri array:**
- `array $data`

---

## `Modules/Geo/app/Actions/GoogleMaps/GetAddressFromGoogleMapsAction.php`

Namespace: `Modules\Geo\Actions\GoogleMaps`

### `private function getComponent(...)` — class `GetAddressFromGoogleMapsAction` (linea 120)

```php
function getComponent(DataCollection $components, array $types, bool $short = false)
```

**Parametri array:**
- `array $types`

---

## `Modules/Geo/app/Actions/GoogleMaps/GoogleMapsHttpAction.php`

Namespace: `Modules\Geo\Actions\GoogleMaps`

### `public function executeDistanceMatrix(...)` — class `GoogleMapsHttpAction` (linea 56)

```php
function executeDistanceMatrix(array $origins, array $destinations)
```

**Parametri array:**
- `array $origins`
- `array $destinations`

### `private function makeRequest(...)` — class `GoogleMapsHttpAction` (linea 105)

```php
function makeRequest(string $method, string $url, array $params = [], bool $useCache = true)
```

**Parametri array:**
- `array $params = []`

### `private function getCacheKey(...)` — class `GoogleMapsHttpAction` (linea 173)

```php
function getCacheKey(string $method, string $url, array $params)
```

**Parametri array:**
- `array $params`

---

## `Modules/Geo/app/Actions/GoogleMaps/OptimizeRouteAction.php`

Namespace: `Modules\Geo\Actions\GoogleMaps`

### `public function execute(...)` — class `OptimizeRouteAction` (linea 39)

```php
function execute(array $locations, LocationData $origin, LocationData $destination, string $mode = 'driving', string $optimize = 'distance',)
```

**Parametri array:**
- `array $locations`

### `private function formatWaypoints(...)` — class `OptimizeRouteAction` (linea 91)

```php
function formatWaypoints(array $locations)
```

**Parametri array:**
- `array $locations`

### `private function parseRoutes(...)` — class `OptimizeRouteAction` (linea 131)

```php
function parseRoutes(array $routes, Collection $originalLocations)
```

**Parametri array:**
- `array $routes`

---

## `Modules/Geo/app/Actions/GoogleMapsAction.php`

Namespace: `Modules\Geo\Actions`

### `private function makeRequest(...)` — class `GoogleMapsAction` (linea 45)

```php
function makeRequest(string $method, string $url, array $params = [], bool $useCache = true)
```

**Parametri array:**
- `array $params = []`

### `private function getCacheKey(...)` — class `GoogleMapsAction` (linea 116)

```php
function getCacheKey(string $method, string $url, array $params)
```

**Parametri array:**
- `array $params`

### `public function getDistanceMatrix(...)` — class `GoogleMapsAction` (linea 151)

```php
function getDistanceMatrix(array $origins, array $destinations)
```

**Parametri array:**
- `array $origins`
- `array $destinations`

---

## `Modules/Geo/app/Actions/Map/ExportMapDataAction.php`

Namespace: `Modules\Geo\Actions\Map`

### `public function execute(...)` — class `ExportMapDataAction` (linea 21)

```php
function execute(array $filters = [], string $format = 'json')
```

**Parametri array:**
- `array $filters = []`

---

## `Modules/Geo/app/Actions/Map/GetMapMarkersAction.php`

Namespace: `Modules\Geo\Actions\Map`

### `public function execute(...)` — class `GetMapMarkersAction` (linea 23)

```php
function execute(array $filters = [])
```

**Parametri array:**
- `array $filters = []`

---

## `Modules/Geo/app/Actions/Map/GetMapStatsAction.php`

Namespace: `Modules\Geo\Actions\Map`

### `public function execute(...)` — class `GetMapStatsAction` (linea 23)

```php
function execute(array $filters = [])
```

**Parametri array:**
- `array $filters = []`

---

## `Modules/Geo/app/Actions/Mapbox/GetAddressFromMapboxLatLngAction.php`

Namespace: `Modules\Geo\Actions\Mapbox`

### `private function parseResponse(...)` — class `GetAddressFromMapboxLatLngAction` (linea 95)

```php
function parseResponse(array $response)
```

**Parametri array:**
- `array $response`

---

## `Modules/Geo/app/Actions/Maps/LoadGeoMapDatasetAction.php`

Namespace: `Modules\Geo\Actions\Maps`

### `private function normalizeFeatureCollection(...)` — class `LoadGeoMapDatasetAction` (linea 64)

```php
function normalizeFeatureCollection(array $decoded)
```

**Parametri array:**
- `array $decoded`

### `private function normalizeFeature(...)` — class `LoadGeoMapDatasetAction` (linea 95)

```php
function normalizeFeature(array $feature)
```

**Parametri array:**
- `array $feature`

### `private function normalizeProperties(...)` — class `LoadGeoMapDatasetAction` (linea 133)

```php
function normalizeProperties(array $properties)
```

**Parametri array:**
- `array $properties`

---

## `Modules/Geo/app/Actions/Polygon/IsPointInPolygonAction.php`

Namespace: `Modules\Geo\Actions\Polygon`

### `public function execute(...)` — class `IsPointInPolygonAction` (linea 21)

```php
function execute(float $latitude, float $longitude, array $polygon)
```

**Parametri array:**
- `array $polygon`

---

## `Modules/Geo/app/Adapters/GeoHttpClientBase.php`

Namespace: `Modules\Geo\Adapters`

### `protected function makeRequest(...)` — class `GeoHttpClientBase` (linea 42)

```php
function makeRequest(string $method, string $url, array $params = [], bool $useCache = true)
```

**Parametri array:**
- `array $params = []`

### `protected function getCacheKey(...)` — class `GeoHttpClientBase` (linea 115)

```php
function getCacheKey(string $method, string $url, array $params)
```

**Parametri array:**
- `array $params`

---

## `Modules/Geo/app/Adapters/GoogleMapsClient.php`

Namespace: `Modules\Geo\Adapters`

### `public function getDistanceMatrix(...)` — class `GoogleMapsClient` (linea 46)

```php
function getDistanceMatrix(array $origins, array $destinations)
```

**Parametri array:**
- `array $origins`
- `array $destinations`

---

## `Modules/Geo/app/Console/Commands/SushiCommand.php`

Namespace: `Modules\Geo\Console\Commands`

### `protected function isValidComuneData(...)` — class `SushiCommand` (linea 135)

```php
function isValidComuneData(array $comune)
```

**Parametri array:**
- `array $comune`

---

## `Modules/Geo/app/Datas/Geocoding/GeocodingData.php`

Namespace: `Modules\Geo\Datas\Geocoding`

### `public static function fromGoogleResponse(...)` — class `GeocodingData` (linea 69)

```php
function fromGoogleResponse(array $response)
```

**Parametri array:**
- `array $response`

### `private static function extractAddressComponents(...)` — class `GeocodingData` (linea 109)

```php
function extractAddressComponents(array $components)
```

**Parametri array:**
- `array $components`

---

## `Modules/Geo/app/Datas/Geocoding/PlaceData.php`

Namespace: `Modules\Geo\Datas\Geocoding`

### `public static function fromNominatim(...)` — class `PlaceData` (linea 44)

```php
function fromNominatim(array $data)
```

**Parametri array:**
- `array $data`

---

## `Modules/Geo/app/Datas/LocationData.php`

Namespace: `Modules\Geo\Datas`

### `public static function fromArray(...)` — class `LocationData` (linea 58)

```php
function fromArray(array $data)
```

**Parametri array:**
- `array $data`

---

## `Modules/Geo/app/Datas/Photon/PhotonAddressData.php`

Namespace: `Modules\Geo\Datas\Photon`

### `public static function fromPhotonFeature(...)` — class `PhotonAddressData` (linea 32)

```php
function fromPhotonFeature(array $feature)
```

**Parametri array:**
- `array $feature`

---

## `Modules/Geo/app/Datas/PlaceData.php`

Namespace: `Modules\Geo\Datas`

### `public static function fromNominatim(...)` — class `PlaceData` (linea 44)

```php
function fromNominatim(array $data)
```

**Parametri array:**
- `array $data`

---

## `Modules/Geo/app/Datas/Routing/TravelTimeData.php`

Namespace: `Modules\Geo\Datas\Routing`

### `public static function fromGoogleResponse(...)` — class `TravelTimeData` (linea 61)

```php
function fromGoogleResponse(array $response)
```

**Parametri array:**
- `array $response`

---

## `Modules/Geo/app/Datas/TimeZoneData.php`

Namespace: `Modules\Geo\Datas`

### `public static function fromGoogleMaps(...)` — class `TimeZoneData` (linea 40)

```php
function fromGoogleMaps(array $data)
```

**Parametri array:**
- `array $data`

---

## `Modules/Geo/app/Datas/TravelTimeData.php`

Namespace: `Modules\Geo\Datas`

### `public static function fromGoogleResponse(...)` — class `TravelTimeData` (linea 61)

```php
function fromGoogleResponse(array $response)
```

**Parametri array:**
- `array $response`

---

## `Modules/Geo/app/Filament/Forms/Components/AddressField.php`

Namespace: `Modules\Geo\Filament\Forms\Components`

### `protected function removeReactivityFromSchema(...)` — class `AddressField` (linea 61)

```php
function removeReactivityFromSchema(array $schema)
```

**Parametri array:**
- `array $schema`

---

## `Modules/Geo/app/Filament/Forms/Components/AddressesField.php`

Namespace: `Modules\Geo\Filament\Forms\Components`

### `private static function normalizeAddressRow(...)` — class `AddressesField` (linea 67)

```php
function normalizeAddressRow(array $address)
```

**Parametri array:**
- `array $address`

---

## `Modules/Geo/app/Filament/Forms/Components/Support/CoordinatePickerHelpers.php`

Namespace: `Modules\Geo\Filament\Forms\Components\Support`

### `public static function resolveCenterLatitude(...)` — class `CoordinatePickerHelpers` (linea 21)

```php
function resolveCenterLatitude(array $center, float $default)
```

**Parametri array:**
- `array $center`

### `public static function resolveCenterLongitude(...)` — class `CoordinatePickerHelpers` (linea 31)

```php
function resolveCenterLongitude(array $center, float $default)
```

**Parametri array:**
- `array $center`

### `public static function extractCoordinates(...)` — class `CoordinatePickerHelpers` (linea 167)

```php
function extractCoordinates(array $data, string $field = 'coordinates', string $latColumn = 'latitude', string $lngColumn = 'longitude')
```

**Parametri array:**
- `array $data`

### `private static function firstString(...)` — class `CoordinatePickerHelpers` (linea 191)

```php
function firstString(array $data, array $keys)
```

**Parametri array:**
- `array $data`
- `array $keys`

---

## `Modules/Geo/app/Filament/Forms/Components/Traits/HasCoordinatePicker.php`

Namespace: `Modules\Geo\Filament\Forms\Components\Traits`

### `public function center(...)` — trait `HasCoordinatePicker` (linea 97)

```php
function center(float|array $latitude, ?float $longitude = null)
```

**Parametri array:**
- `float|array $latitude`

### `private static function firstString(...)` — trait `HasCoordinatePicker` (linea 343)

```php
function firstString(array $data, array $keys)
```

**Parametri array:**
- `array $data`
- `array $keys`

### `public static function extractCoordinates(...)` — trait `HasCoordinatePicker` (linea 360)

```php
function extractCoordinates(array $data, string $field = 'coordinates', string $latColumn = 'latitude', string $lngColumn = 'longitude')
```

**Parametri array:**
- `array $data`

---

## `Modules/Geo/app/Filament/Forms/Components/XotBaseCoordinateField.php`

Namespace: `Modules\Geo\Filament\Forms\Components`

### `public function center(...)` — class `XotBaseCoordinateField` (linea 93)

```php
function center(float|array $latitude, ?float $longitude = null)
```

**Parametri array:**
- `float|array $latitude`

### `public static function extractCoordinates(...)` — class `XotBaseCoordinateField` (linea 226)

```php
function extractCoordinates(array $data, string $field = 'coordinates', string $latColumn = 'latitude', string $lngColumn = 'longitude')
```

**Parametri array:**
- `array $data`

---

## `Modules/Geo/app/Filament/Widgets/GeoMapWidget.php`

Namespace: `Modules\Geo\Filament\Widgets`

### `private function encodeJson(...)` — class `GeoMapWidget` (linea 120)

```php
function encodeJson(array $payload, string $message)
```

**Parametri array:**
- `array $payload`

---

## `Modules/Geo/app/Forms/Components/CoordinatePicker.php`

Namespace: `Modules\Geo\Forms\Components`

### `protected function mutateState(...)` — class `CoordinatePicker` (linea 106)

```php
function mutateState(array $input)
```

**Parametri array:**
- `array $input`

### `public function handleCoordsChanged(...)` — class `CoordinatePicker` (linea 116)

```php
function handleCoordsChanged(array $coords)
```

**Parametri array:**
- `array $coords`

### `public static function extractCoordinates(...)` — class `CoordinatePicker` (linea 172)

```php
function extractCoordinates(array $data, string $fieldName = 'coordinates', string $latitudeColumn = 'latitude', string $longitudeColumn = 'longitude')
```

**Parametri array:**
- `array $data`

---

## `Modules/Geo/app/Models/ComuneJson.php`

Namespace: `Modules\Geo\Models`

### `private static function getComuneName(...)` — class `ComuneJson` (linea 212)

```php
function getComuneName(array $item)
```

**Parametri array:**
- `array $item`

### `private static function getCapList(...)` — class `ComuneJson` (linea 224)

```php
function getCapList(array $item)
```

**Parametri array:**
- `array $item`

---

## `Modules/Geo/app/Models/Traits/HasAddress.php`

Namespace: `Modules\Geo\Models\Traits`

### `public function addAddress(...)` — trait `HasAddress` (linea 215)

```php
function addAddress(array $data, bool $setPrimary = false)
```

**Parametri array:**
- `array $data`

### `public function updatePrimaryAddress(...)` — trait `HasAddress` (linea 237)

```php
function updatePrimaryAddress(array $data)
```

**Parametri array:**
- `array $data`

---

## `Modules/Geo/app/Models/Traits/SushiToJsons.php`

Namespace: `Modules\Geo\Models\Traits`

### `public function saveToJson(...)` — trait `SushiToJsons` (linea 43)

```php
function saveToJson(array $data)
```

**Parametri array:**
- `array $data`

### `public function create(...)` — trait `SushiToJsons` (linea 64)

```php
function create(array $attributes = [])
```

**Parametri array:**
- `array $attributes = []`

### `public function update(...)` — trait `SushiToJsons` (linea 85)

```php
function update(array $attributes = [], array $options = [])
```

**Parametri array:**
- `array $attributes = []`
- `array $options = []`

---

## `Modules/Geo/app/Traits/HasAddresses.php`

Namespace: `Modules\Geo\Traits`

### `public function addAddress(...)` — trait `HasAddresses` (linea 79)

```php
function addAddress(array $data, bool $isPrimary = false)
```

**Parametri array:**
- `array $data`

---

## `Modules/Geo/database/seeders/SushiSeeder.php`

Namespace: `Modules\Geo\Database\Seeders`

### `private function isValidComuneData(...)` — class `SushiSeeder` (linea 67)

```php
function isValidComuneData(array $comune)
```

**Parametri array:**
- `array $comune`

---

## `Modules/Geo/tests/Feature/AddressIntegrationTest.php`

Namespace: `Modules\Geo\Tests\Feature`

### `function makeAddress(...)` — class `makeAddress` (linea 25)

```php
function makeAddress(array $overrides = [])
```

**Parametri array:**
- `array $overrides = []`

### `function formatFullAddress(...)` — _(funzione globale / closure con nome)_ (linea 58)

```php
function formatFullAddress(array $address)
```

**Parametri array:**
- `array $address`

---

## `Modules/Geo/tests/Pest.php`

### `function createRegion(...)` — _(funzione globale / closure con nome)_ (linea 25)

```php
function createRegion(array $attributes = [])
```

**Parametri array:**
- `array $attributes = []`

### `function createComune(...)` — _(funzione globale / closure con nome)_ (linea 33)

```php
function createComune(array $attributes = [])
```

**Parametri array:**
- `array $attributes = []`

