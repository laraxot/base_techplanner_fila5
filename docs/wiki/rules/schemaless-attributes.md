# Spatie Laravel Schemaless Attributes - Regole Windsurf

## Regola CRITICA: Query su Schemaless Attributes

### Pattern CORRETTO

Usare **SEMPRE** Laravel's native JSON where syntax per query su schemaless attributes:

```php
// ✅ CORRETTO: Uso diretto di where() con JSON path
Rating::where('extra_attributes->anno', $anno)->get();
Rating::where('extra_attributes->type', 'valutazione')->get();

// ✅ CORRETTO: Con operatori
Rating::where('extra_attributes->anno', '>=', 2023)->get();

// ✅ CORRETTO: Nested attributes
Rating::where('extra_attributes->config->enabled', true)->get();
```

### Pattern da EVITARE

```php
// ❌ ERRATO: withExtraAttributes() vuoto seguito da where()
Rating::query()->withExtraAttributes()->where('extra_attributes->anno', $anno)->get();

// ❌ ERRATO: Commenti che dicono "filtra record con extra_attributes non null"
// Il scope NON filtra per null/non-null!

// ❌ ERRATO: withExtraAttributes() con parametri (problemi PHPStan)
Rating::withExtraAttributes('anno', $anno)->get();
```

## Implementazione nel Modello

### Scope Definition (CORRETTO)

```php
/**
 * @property \Spatie\SchemalessAttributes\SchemalessAttributes $extra_attributes
 * @method static Builder withExtraAttributes()
 */
class Rating extends BaseModel
{
    // Usare il metodo casts(), NON la proprietà $casts
    public function casts(): array
    {
        return array_merge(parent::casts(), [
            'extra_attributes' => SchemalessAttributes::class,
        ]);
    }

    // Scope SENZA parametri
    public function scopeWithExtraAttributes(): Builder
    {
        return $this->extra_attributes->modelScope();
    }
}
```

## Lettura e Scrittura Attributi

```php
// Scrittura
$model->extra_attributes->anno = 2025;
$model->extra_attributes->set('config.enabled', true);

// Lettura
$anno = $model->extra_attributes->anno;
$enabled = $model->extra_attributes->get('config.enabled', false);

// SEMPRE chiamare save() per persistere
$model->save();
```

## Errori Comuni e Soluzioni

| Errore | Soluzione |
|--------|-----------|
| `withExtraAttributes() invoked with 2 parameters, 0 required` | Usare `where('extra_attributes->key', $value)` invece |
| `Access level to casts() must be public` | Dichiarare `public function casts()` nel modello |
| Commenti errati su "filtra non null" | Rimuovere commenti errati, lo scope non filtra null |

## Documentazione Correlata

- [Modules/Xot/docs/spatie-schemaless-attributes.md](/laravel/Modules/Xot/docs/spatie-schemaless-attributes.md)
- [GitHub: spatie/laravel-schemaless-attributes](https://github.com/spatie/laravel-schemaless-attributes)

---

