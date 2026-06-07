# LatitudeLongitudeInput Extends XotBaseField Rule

## REGOLA PERMANENTE: LatitudeLongitudeInput deve estendere XotBaseField, mai CoordinatePicker

### Vincolo assoluto

```
OBBLIGATORIO: LatitudeLongitudeInput estende Modules\Xot\Filament\Forms\Components\XotBaseField
VIETATO: LatitudeLongitudeInput estende CoordinatePicker (o qualsiasi altro picker della famiglia Geo)
```

### Gerarchia corretta

```
Filament\Forms\Components\Field
  └── Modules\Xot\Filament\Forms\Components\XotBaseField
        ├── Modules\Geo\Filament\Forms\Components\CoordinatePicker   (campo composito, dehydrated: false)
        ├── Modules\Geo\Filament\Forms\Components\MapPicker           (alias/wrapper per backward compat)
        ├── Modules\Geo\Filament\Forms\Components\PlacePicker         (extend opzionale per place search)
        └── Modules\Geo\Filament\Forms\Components\LatitudeLongitudeInput  (field diretto, non picker)
```

### Motivazione

`LatitudeLongitudeInput` è un field **diverso** da `CoordinatePicker`:
- Gestisce direttamente le due colonne `latitude` e `longitude` come campi separati visibili
- Non usa il contratto composito `{ latitude, longitude }` di CoordinatePicker
- Non ha la logica `dehydrated(false)` + `extractCoordinates()`
- Ha il proprio bridge Alpine e la propria view Blade

Ereditare da `CoordinatePicker` causerebbe:
- `afterStateHydrated()` errato (CoordinatePicker legge un solo campo composito)
- `dehydrated(false)` indesiderato applicato al field diretto
- Metodi come `extractCoordinates()` esposti quando non servono
- Breaking change silenzioso se CoordinatePicker evolve l'API

### Corollario: condivisione tramite composizione, non eredità

Il codice comune (es. il core UI del web component Lit `coordinate-picker-field.js`)
si condivide **tramite riuso del custom element**, non tramite estensione PHP:

```php
// LatitudeLongitudeInput può usare lo stesso web component Lit
// ma gestisce lat/lng come campi separati nel proprio Blade
protected string $view = 'geo::filament.forms.components.latitude-longitude-input';
```

### File coinvolti

- `laravel/Modules/Geo/app/Filament/Forms/Components/LatitudeLongitudeInput.php`
- `laravel/Modules/Geo/app/Filament/Forms/Components/CoordinatePicker.php`

### Documentazione

- Story: 8-20 (done), 8-39 (ready-for-dev)
- Wiki: `laravel/Modules/Geo/docs/wiki/concepts/geo-fields-family.md`
