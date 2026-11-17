# 🔴 MULTI-OUTCOME UNIVERSAL RULE

**Priority**: CRITICAL (BLOCKER)  
**Scope**: ALL (Modules, Themes, Database, Actions)  
**Last Updated**: 2026-03-25  
**Status**: ENFORCED

---

## 🎯 Core Principle

> **NEL NOSTRO PROGETTO: TUTTO È MULTI-RISPOSTA**
>
> - **SÌ/NO** = 2 outcome (caso particolare)
> - **MULTI-OUTCOME** = N outcome (caso generale)
> - **NON ESISTE** una dicotomia sì/no vs multi-outcome

---

## 📋 Rule Definition

### ✅ CORRECT: Universal Multi-Outcome Approach

```php
// ✅ CORRETTO: Tutti gli outcome sono trattati allo stesso modo
foreach ($outcomes as $outcome) {
    // Ogni outcome ha:
    // - id
    // - title
    // - probability (0-100)
    // - price (0-99)
    // - color
}

// SÌ/NO market: 2 outcomes
[outcome-1, outcome-2]

// F1 market: 6 outcomes
[verstappen, norris, leclerc, piastri, hamilton, russell]

// Political market: 10 outcomes
[candidate-1, candidate-2, ..., candidate-10]
```

### ❌ WRONG: Binary vs Multi-Outcome Dichotomy

```php
// ❌ SBAGLIATO: Trattare sì/no diversamente da multi-outcome
if ($predict->isBinary()) {
    // logica speciale per sì/no
} else {
    // logica per multi-outcome
}

// ❌ SBAGLIATO: Campi separati
$predict->yes_probability  // ❌
$predict->no_probability   // ❌

// ❌ SBAGLIATO: Tabelle separate
outcomes_yes_no      // ❌
outcomes_multi       // ❌
```

---

## 🏗️ Architecture Implications

### Database Schema

```sql
-- ✅ CORRETTO: Single outcomes table
CREATE TABLE ratings (
    id BIGINT PRIMARY KEY,
    title VARCHAR(255),      -- "SÌ", "NO", "Verstappen", "Biden", etc.
    color VARCHAR(7),        -- #FF0000
    value DECIMAL(5,4)       -- 0.2800 (28%)
);

CREATE TABLE rating_morphs (
    id BIGINT PRIMARY KEY,
    model_type VARCHAR(255),  -- "Modules\Predict\Models\Predict"
    model_id BIGINT,          -- predict_id
    rating_id BIGINT,         -- outcome_id
    percentage DECIMAL(5,2),  -- 28.00
    sum_credit_yes DECIMAL,
    sum_credit_no DECIMAL,
    count_credit_yes INT,
    count_credit_no INT
);

-- ❌ SBAGLIATO: Tabelle separate per binary/multi
CREATE TABLE binary_outcomes (...)  -- ❌
CREATE TABLE multi_outcomes (...)   -- ❌
```

### Action Classes

```php
// ✅ CORRETTO: BuildOutcomesAction universale
class BuildOutcomesAction
{
    public function execute(Predict $predict): array
    {
        // Restituisce SEMPRE array di outcomes
        // 2 outcomes per sì/no
        // N outcomes per multi-risposta
        
        return $outcomes; // Array di N elementi
    }
}

// ✅ CORRETTO: BuildOrderBookAction universale
class BuildOrderBookAction
{
    public function execute(Predict $predict): array
    {
        // Order book per TUTTI gli outcomes
        // Non c'è distinzione tra sì/no e multi
        
        return [
            'markets' => $markets, // Array di N mercati (uno per outcome)
            'bids' => $primaryMarket['bids'],
            'asks' => $primaryMarket['asks'],
        ];
    }
}
```

### Blade Components

```blade
{{-- ✅ CORRETTO: Componente universale per outcomes —}}
<x-predict-view.outcomes-grid :outcomes="$outcomes">
    {{-- Renderizza N outcomes, sia 2 che 30+ —}}
</x-predict-view.outcomes-grid>

{{-- ✅ CORRETTO: Loop universale —}}
@foreach ($outcomes as $outcome)
    <div class="outcome-card">
        <h3>{{ $outcome['title'] }}</h3>
        <p>{{ number_format($outcome['probability'], 1) }}%</p>
        <button>Scommetti</button>
    </div>
@endforeach

{{-- ❌ SBAGLIATO: Distinzione sì/no vs multi —}}
@if ($isBinary)
    {{-- logica per sì/no —}}
@else
    {{-- logica per multi-outcome —}}
@endif
```

---

## 📊 Examples

### Example 1: SÌ/NO Market (2 outcomes)

```php
$predict = Predict::find(1); // "Il governo cadrà nel 2026?"

$outcomes = [
    [
        'id' => 1,
        'title' => 'SÌ',
        'probability' => 65.0,
        'price' => 65,
        'color' => '#10B981',
    ],
    [
        'id' => 2,
        'title' => 'NO',
        'probability' => 35.0,
        'price' => 35,
        'color' => '#EF4444',
    ],
];

// ✅ 2 outcomes, stesso trattamento di 6 outcomes F1
```

### Example 2: F1 Market (6 outcomes)

```php
$predict = Predict::find(2); // "Chi vincerà F1 2026?"

$outcomes = [
    ['id' => 1, 'title' => 'Verstappen', 'probability' => 28.0, 'price' => 28],
    ['id' => 2, 'title' => 'Norris', 'probability' => 22.0, 'price' => 22],
    ['id' => 3, 'title' => 'Leclerc', 'probability' => 18.0, 'price' => 18],
    ['id' => 4, 'title' => 'Piastri', 'probability' => 16.0, 'price' => 16],
    ['id' => 5, 'title' => 'Hamilton', 'probability' => 10.0, 'price' => 10],
    ['id' => 6, 'title' => 'Russell', 'probability' => 6.0, 'price' => 6],
];

// ✅ 6 outcomes, stesso trattamento di 2 outcomes sì/no
```

### Example 3: Political Market (10+ outcomes)

```php
$predict = Predict::find(3); // "Chi vincerà le elezioni 2027?"

$outcomes = [
    ['id' => 1, 'title' => 'Partito A', 'probability' => 35.0],
    ['id' => 2, 'title' => 'Partito B', 'probability' => 28.0],
    ['id' => 3, 'title' => 'Partito C', 'probability' => 15.0],
    ['id' => 4, 'title' => 'Partito D', 'probability' => 10.0],
    ['id' => 5, 'title' => 'Partito E', 'probability' => 7.0],
    ['id' => 6, 'title' => 'Partito F', 'probability' => 5.0],
    // ... fino a 10+ outcomes
];

// ✅ 10+ outcomes, stesso trattamento
```

---

## 🔧 Implementation Checklist

### When Creating New Markets

- [ ] **NON** creare campi `is_binary` o `is_yes_no`
- [ ] **NON** creare tabelle separate per binary/multi
- [ ] **NON** creare logica condizionale `if ($isBinary)`
- [ ] **USARE** sempre `ratings` table per tutti gli outcomes
- [ ] **USARE** sempre `rating_morphs` per le relazioni
- [ ] **TRATTARE** tutti gli outcomes allo stesso modo

### When Building UI Components

- [ ] **LOOP** universale su `$outcomes` array
- [ ] **NO** condizioni `if ($isBinary)`
- [ ] **RESPONSIVE** grid (md:1, lg:2, xl:3 columns)
- [ ] **PROBABILITY** display grande (32px+)
- [ ] **COLOR** coding per outcome

### When Writing Actions

- [ ] **EXECUTE** restituisce array di outcomes
- [ ] **NO** distinzione binary vs multi nel return type
- [ ] **ORDER BOOK** per tutti gli outcomes
- [ ] **PRICE HISTORY** per tutti gli outcomes

---

## 🚫 Anti-Patterns (NEVER DO THIS)

### Anti-Pattern 1: Binary Flag

```php
// ❌ MAI FARE QUESTO
$predict->is_binary = true;
$predict->is_yes_no = true;

// ✅ FARE COSÌ
// Nessun flag, solo count outcomes
count($outcomes) === 2  // 2 outcomes (sì/no case)
count($outcomes) === 6  // 6 outcomes (F1 case)
```

### Anti-Pattern 2: Separate Tables

```sql
-- ❌ MAI FARE QUESTO
CREATE TABLE yes_no_outcomes (...);
CREATE TABLE multi_outcomes (...);

-- ✅ FARE COSÌ
CREATE TABLE ratings (...);  -- Tutti gli outcomes
```

### Anti-Pattern 3: Conditional Logic

```php
// ❌ MAI FARE QUESTO
if ($predict->isBinary()) {
    return $this->buildBinaryOutcomes();
} else {
    return $this->buildMultiOutcomes();
}

// ✅ FARE COSÌ
return $this->buildOutcomes();  // Universale
```

---

## 📈 Benefits

### Why This Approach is Better

| Benefit | Description |
|---------|-------------|
| **Simplicity** | Un solo modo di fare le cose |
| **Scalability** | Da 2 a 30+ outcomes senza refactoring |
| **Maintainability** | Meno codice, meno bug |
| **Consistency** | Stessa UX per tutti i mercati |
| **Flexibility** | Facile aggiungere nuovi tipi di mercato |

---

## 🔗 Related Rules

- [Actions Over Services](./actions-over-services.md)
- [Container Agnostic](./container-agnostic.md)
- [Translation Structure](./translation-structure.md)
- [Zen Architecture](./zen-architecture.md)

---

## 📚 References

### BMAD Method
- [BMAD Architecture](https://docs.bmad-method.org/architecture)
- [BMAD Best Practices](https://docs.bmad-method.org/best-practices)

### Project Docs
- [Predict Module](../../../laravel/Modules/Predict/docs/00-INDEX.md)
- [Database Schema](../../../laravel/Modules/Predict/docs/database-schema-and-migrations.md)
- [Actions Directory](../../../laravel/Modules/Predict/docs/actions-directory-structure.md)

### Competitor Analysis
- [Polymarket Analysis](../../../laravel/Modules/Predict/docs/competitive-analysis.md)
- [Kalshi Analysis](../../../laravel/Modules/Predict/docs/competitor-analysis.md)
- [Futuur.com Inspiration](https://futuur.com/)

---

**Enforced By**: AI Agents Team  
**Review Cycle**: Per-release  
**Next Review**: 2026-04-01  
**Violation Action**: BLOCK commit until fixed
