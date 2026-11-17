# NO CONTROLLERS Religion

## Regola Permanente

**Mai usare controller in questo progetto.**

## Motivazione

Il progetto segue un'architettura **controller-less** per:

1. **Semplicità**: Ridurre la complessità e il numero di file da gestire
2. **Component-based**: Ogni funzionalità è un componente Livewire/Blade autonomo
3. **Manutenibilità**: Meno routing, meno dipendenze
4. **Velocità**: Niente overhead di routing e middleware

## Cosa è VIETATO

### File vietate:
- `laravel/app/Http/Controllers/*.php`
- `laravel/Modules/*/app/Http/Controllers/*.php`
- `laravel/Modules/*/Http/Controllers/*.php`
- `Modules/*/app/Http/Controllers/*.php`

### Pattern vietati:
- `Route::get('/...', [XController::class, 'method'])`
- `Route::post('/...', [XController::class, 'method'])`
- `app('Illuminate\Http\Controller')` o simili

## Cosa È AUTOMATmente Consentito

### Alternative valide:
1. **Livewire Components** (`app/Http/Livewire/` o `app/Models/`)
2. **Filament Components** (`app/Filament/`)
3. **View/Components** (`resources/views/components/`)
4. **Modal Components** (`app/Filament/Components/Modal/`)
5. **Page Components** (`app/Filament/Pages/`)
6. **Widgets** (`app/Filament/Widgets/`)

## Perché i Controller sono Proibiti

1. **Storicamente**: Il progetto è nato con un'architettura basata su componenti
2. **Filament**: Il CMS utilizza i componenti come entità prime
3. **Reversibility**: Ogni controller può essere convertito in un componente Livewire
4. **Performance**: Livewire gestisce lo stato in modo più efficiente

## Esempi Pratici

### ❌ Controller (VIETO ASSOLUTO)
```php
// app/Http/Controllers/TicketController.php
class TicketController extends Controller
{
    public function index() { ... }
    public function store() { ... }
    public function show() { ... }
}
```

### ✅ Livewire Component (CORRETTO)
```php
// app/Http/Livewire/TicketList.php
class TicketList extends Component
{
    public function render() { ... }
    public function sortBy($field) { ... }
}
```

### ✅ Blade Component (CORRETTO)
```php
// resources/views/components/blocks/ticket/layout.blade.php
<x-blocks.ticket.layout :tickets="$tickets" />
```

## Aggiornamenti Recenti

**2026-06-01**: Regola definitivamente vietata dopo analisi architetturale.

## Riferimenti

- Architettura: `docs/wiki/architecture/controller-less-architecture.md`
- Componenti: `docs/wiki/patterns/livewire-components.md`
- Filament: `docs/wiki/filament/component-patterns.md`

---

**Ultimo aggiornamento**: 2026-06-01  
**Stato**: 🔒 Attivo (vieta assoluta)