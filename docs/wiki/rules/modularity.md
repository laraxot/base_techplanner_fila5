# Regola Modularità - Moduli Agnostici

## Regola Fondamentale

**Ogni modulo deve essere agnostico e riutilizzabile in qualsiasi progetto Laravel, senza dipendenze hardcoded da moduli specifici.**

## Perché

1. **Riutilizzabilità**: Un modulo come `Rating` può essere usato in progetti diversi
2. **Separazione**: Ogni modulo ha un compito specifico, non conosce altri moduli
3. **Manutenibilità**: Moduli accoppiati sono difficili da modificare
4. **Testabilità**: Più facile testare in isolamento

## Pattern Corretto

```php
// ✅ Modulo agnostico espone trait
namespace Modules\Rating\Models\Traits;

trait HasRatingsTrait
{
    public function ratings()
    {
        return $this->morphToMany(Rating::class, 'ratingable');
    }
}

// Altri moduli USANO il trait
namespace Modules\IndennitaResponsabilita\Models;

use Modules\Rating\Models\Traits\HasRatingsTrait;

class IndennitaResponsabilita extends BaseModel
{
    use HasRatingsTrait;  // ✅ USA il trait generico
}
```

## Pattern Anti (VIETATO)

```php
// ❌ Hardcoded dependency
class Rating extends BaseModel
{
    public function indennitaResponsabilita()
    {
        return $this->belongsTo(\Modules\IndennitaResponsabilita\Models\IndennitaResponsabilita::class);
    }
}

// ❌ Riferimenti in docs
"Modulo per integrazione con IndennitaResponsabilita e Ptv"
```

## Checklist

- [ ] Nessun riferimento a moduli business-specifici nel codice
- [ ] Nessun riferimento in documentazione
- [ ] Usa relazioni polimorfiche
- [ ] Espone interfacce/trait per estensibilità

---

**Data**: 2026-02-24
