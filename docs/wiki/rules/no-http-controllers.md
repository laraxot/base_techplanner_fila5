---
title: "NO HTTP Controllers — Folio + Actions Pattern"
type: rule
tags: [architecture, controllers, folio, actions, routing]
confidence: high
created: 2026-06-01
updated: 2026-06-01
---

# NO HTTP Controllers — Folio + Actions Pattern

## Regola d'oro

> **Zero controller in `app/Http/Controllers/` o `Modules/{Nome}/app/Http/Controllers/`**

---

## Principio

Laraxot/FixCity utilizza **Folio + Actions** invece dei controller Laravel tradizionali.

### Superfici di Routing

| Superficie | Meccanismo |
|------------|------------|
| Frontoffice HTML | Folio + blocchi CMS + Filament widget |
| Backoffice | Filament Resources / Pages |
| **API JSON leggere** | **Folio** + **Actions** |
| Endpoint esterni (Stripe, webhook, ecc.) | `routes/api.php` SOLO in casi speciali |

---

## Pattern canonici

### 1. API JSON → Folio + Action

```php
// ✗ SBAGLIATO: Modules/Rating/app/Http/Controllers/RatingController.php
// ✗ SBAGLIATO: app/Http/Controllers/RatingController.php

// ✓ CORRETTO: Modules/Rating/resources/views/pages/api/rating/store.blade.php
use function Laravel\Folio\{name, render};

name('api.rating.store');

render(function (): JsonResponse {
    // Validazione
    $data = request()->validate([
        'ticket_id' => ['required', 'exists:tickets,id'],
        'rating' => ['required', 'integer', 'min:1', 'max:5'],
        'comment' => ['nullable', 'string'],
    ]);
    
    // Logica in Action
    return response()->json(
        app(StoreRatingAction::class)->execute($data)
    );
});
```

### 2. Action

```php
// Modules/Rating/app/Actions/StoreRatingAction.php
class StoreRatingAction
{
    public function execute(array $data): array
    {
        // Logica di salvataggio rating
        return $ticket; // o JsonResponse compatible array
    }
}
```

---

## Quando SI può usare `routes/api.php`

Solo per:

- Webhook esterni (Stripe, PayPal, ecc.)
- API di terze parti che richiedono signature speciale
- Health check, sitemap.xml
- Integrazione legacy

```php
// routes/api.php - Limitato
Route::post('/webhook/stripe', Webhook\StripeController::class);
Route::get('/health', HealthController::class);
```

---

## Checklist agente

- [ ] Nuovo endpoint → file Folio in `resources/views/pages/api/`
- [ ] Logica in `app/Actions/` con costruttore iniettato
- [ ] Nessun file in `app/Http/Controllers/`
- [ ] `routes/api.php` usato SOLO per casi esterni
- [ ] Aggiornare `MODULE-BOUNDARY-PHILOSOPHY.md`

---

## Riferimenti

- [folio-api-no-controllers.md](../concepts/folio-api-no-controllers.md)
- [routing-architecture.md](../guidelines/routing-architecture.md)
- [Action Pattern - No Services](action-pattern.md)

---

## Incidenti storici

- `laravel/app/Http/Controllers/RatingController.php` — creato, poi **rimosso**. Usare `StoreRatingAction` + Folio.