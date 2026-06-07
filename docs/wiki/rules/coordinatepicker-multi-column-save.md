# CoordinatePicker Multi-Column Save Rule

REGOLA: salvare lat/lng su colonne separate richiede fix a 2 livelli — `dehydrateStateUsing()` nel trait Filament + Eloquent `Attribute::make()` nel model.

## Livello 1 — trait Filament

In `HasCoordinatePicker::setUpCoordinatePicker()`:

```php
$this->dehydrateStateUsing(static function (self $component, mixed $state): ?array {
    if (! is_array($state)) return null;
    return [
        'latitude'  => isset($state['latitude'])  && is_numeric($state['latitude'])  ? (string) $state['latitude']  : null,
        'longitude' => isset($state['longitude']) && is_numeric($state['longitude']) ? (string) $state['longitude'] : null,
    ];
});
```

VIETATO: `dehydrated(false)` — blocca completamente l'invio al model (root cause story 8-65).

## Livello 2 — Eloquent Attribute

Nel model (colonne `latitude`, `longitude`):

```php
protected function location(): Attribute
{
    return Attribute::make(
        get: fn ($value, array $attributes): array => [
            'latitude'  => $attributes['latitude']  ?? null,
            'longitude' => $attributes['longitude'] ?? null,
        ],
        set: function ($value): array {
            if (! is_array($value)) return [];
            return [
                'latitude'  => isset($value['latitude'])  && is_numeric($value['latitude'])  ? (string) $value['latitude']  : null,
                'longitude' => isset($value['longitude']) && is_numeric($value['longitude']) ? (string) $value['longitude'] : null,
            ];
        },
    );
}
```

VIETATO: cast `'location' => 'array'` — tenta di scrivere in colonna `location` inesistente.
VIETATO: duplicare logica in `mutateFormDataBeforeCreate/Save` — il mutator copre tutti i contesti.

## File

- `laravel/Modules/Geo/app/Filament/Forms/Components/Traits/HasCoordinatePicker.php`
- `laravel/Modules/Fixcity/app/Models/Ticket.php` (story 8-65)

Ref: `laravel/Modules/Geo/docs/wiki/concepts/coordinate-picker-filament5-save-pattern.md` · <https://filamentphp.com/docs/5.x/forms/custom-fields>
