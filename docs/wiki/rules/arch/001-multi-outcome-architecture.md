# 🎯 Rule 001: Multi-Outcome Architecture

**Priority**: CRITICAL  
**Category**: Architecture  
**Enforced**: Yes

---

## Rule Statement

> **ALL markets are multi-outcome by definition. YES/NO is just a special case with 2 outcomes.**

There is NO distinction between "binary market" and "multi-outcome market".  
**Every prediction market has N outcomes**, where N >= 2.

---

## Why This Rule Exists

### Problem

Previous implementations incorrectly treated SI/NO markets differently from multi-outcome markets:

```php
// ❌ WRONG - Type-based distinction
if ($market->type === 'binary') {
    // Handle SI/NO differently
    $this->handleBinaryMarket();
} else {
    // Handle multi-outcome
    $this->handleMultiOutcomeMarket();
}
```

This leads to:
1. Code duplication
2. Architectural inconsistency
3. Inability to scale from 2 to N outcomes
4. Database schema confusion

### Solution

Treat ALL markets uniformly as multi-outcome:

```php
// ✅ CORRECT - Uniform handling
$outcomes = BuildOutcomesAction::execute($predict);
foreach ($outcomes as $outcome) {
    $orderBook = BuildOrderBookForOutcomeAction::execute($outcome['id']);
    // Same logic for N=2 or N=20
}
```

---

## Examples

### Example 1: F1 Championship (6 outcomes)

```php
$market = [
    'title' => 'F1 World Champion 2026',
    'outcomes' => [
        ['id' => 1, 'title' => 'Verstappen', 'price' => 50, 'probability' => 0.50],
        ['id' => 2, 'title' => 'Hamilton', 'price' => 20, 'probability' => 0.20],
        ['id' => 3, 'title' => 'Leclerc', 'price' => 15, 'probability' => 0.15],
        ['id' => 4, 'title' => 'Norris', 'price' => 10, 'probability' => 0.10],
        ['id' => 5, 'title' => 'Alonso', 'price' => 5, 'probability' => 0.05],
    ],
    'outcomes_count' => 5,
];
```

### Example 2: Binary Market (2 outcomes - special case)

```php
$market = [
    'title' => 'Will interest rates rise?',
    'outcomes' => [
        ['id' => 1, 'title' => 'SÌ', 'price' => 67, 'probability' => 0.67],
        ['id' => 2, 'title' => 'NO', 'price' => 33, 'probability' => 0.33],
    ],
    'outcomes_count' => 2,  // Just a special case!
];
```

### Example 3: Election (10+ outcomes)

```php
$market = [
    'title' => 'US President 2028',
    'outcomes' => [
        ['id' => 1, 'title' => 'Candidate A', 'price' => 35],
        ['id' => 2, 'title' => 'Candidate B', 'price' => 30],
        ['id' => 3, 'title' => 'Candidate C', 'price' => 15],
        ['id' => 4, 'title' => 'Candidate D', 'price' => 10],
        ['id' => 5, 'title' => 'Candidate E', 'price' => 5],
        ['id' => 6, 'title' => 'Candidate F', 'price' => 3],
        ['id' => 7, 'title' => 'Candidate G', 'price' => 2],
        // ... more candidates
    ],
    'outcomes_count' => 15,
];
```

---

## Implementation Guidelines

### 1. Database Schema

```sql
-- Outcomes table (supports N outcomes)
ratings:
  - id
  - predict_id (FK)
  - title (JSON multi-language)
  - position (ordering)
  - description (optional)

-- NO "type" field! No "yes_price" or "no_price"!
```

### 2. Action Classes

```php
class BuildOutcomesAction
{
    public function execute(Predict $predict): array
    {
        // Load all outcomes (ratings)
        $ratings = $predict->ratings()->orderBy('position')->get();
        
        // Calculate price for EACH outcome
        $totalSum = $ratings->sum(fn($r) => $r->sum_credit ?? 0);
        
        return $ratings->map(fn($rating) => [
            'id' => $rating->id,
            'title' => $this->getLocalizedTitle($rating),
            'price' => $totalSum > 0 
                ? (int) round(($rating->sum_credit / $totalSum) * 100) 
                : 0,
            'probability' => $totalSum > 0 
                ? ($rating->sum_credit / $totalSum) 
                : 0,
        ])->values()->toArray();
    }
}
```

### 3. Order Book

```php
class BuildOrderBookAction
{
    public function execute(Predict $predict): array
    {
        $outcomes = BuildOutcomesAction::execute($predict);
        
        // Build order book for EACH outcome
        $markets = [];
        foreach ($outcomes as $outcome) {
            $markets[] = [
                'id' => $outcome['id'],
                'title' => $outcome['title'],
                'price' => $outcome['price'],
                'bids' => $this->buildBids($outcome['id']),
                'asks' => $this->buildAsks($outcome['id']),
                'spread' => $this->calculateSpread($outcome['id']),
            ];
        }
        
        return [
            'markets' => $markets,
            'outcomes_count' => count($markets),
        ];
    }
}
```

### 4. UI Components

```blade
{{-- Outcomes Grid - Works for N outcomes --}}
<div class="grid grid-cols-{{ $columns }}">
    @foreach($outcomes as $outcome)
        <div class="outcome-card">
            <h3>{{ $outcome['title'] }}</h3>
            <p class="price">{{ $outcome['price'] }}¢</p>
            <div class="probability-bar" style="width: {{ $outcome['probability'] * 100 }}%"></div>
            <button>Buy</button>
            <button>Sell</button>
        </div>
    @endforeach
</div>

{{-- Order Book - Tabs for N outcomes --}}
<div class="tabs">
    @foreach($orderBooks['markets'] as $market)
        <button>{{ $market['title'] }}</button>
    @endforeach
</div>

<div class="order-book-content">
    {{-- Show order book for selected outcome --}}
</div>
```

---

## Common Mistakes

### Mistake 1: Type Field

```php
// ❌ WRONG
$market->type = 'binary';  // NO!
$market->type = 'multi';   // NO!

// ✅ CORRECT
// No type field - all markets are multi-outcome
```

### Mistake 2: Yes/No Fields

```php
// ❌ WRONG
$market->yes_price = 67;
$market->no_price = 33;

// ✅ CORRECT
$market->outcomes = [
    ['title' => 'SÌ', 'price' => 67],
    ['title' => 'NO', 'price' => 33],
];
```

### Mistake 3: Special Case Logic

```php
// ❌ WRONG
if (count($outcomes) === 2) {
    // Handle "binary" differently
}

// ✅ CORRECT
// Same logic for all N outcomes
foreach ($outcomes as $outcome) {
    // Uniform handling
}
```

---

## Testing

### Test Case 1: 2 Outcomes (Binary)

```php
public function test_binary_market(): void
{
    $predict = Predict::factory()->create();
    $predict->ratings()->createMany([
        ['title' => ['en' => 'YES', 'it' => 'SÌ'], 'sum_credit' => 6700],
        ['title' => ['en' => 'NO', 'it' => 'NO'], 'sum_credit' => 3300],
    ]);
    
    $outcomes = BuildOutcomesAction::execute($predict);
    
    $this->assertCount(2, $outcomes);
    $this->assertEquals(67, $outcomes[0]['price']);
    $this->assertEquals(33, $outcomes[1]['price']);
}
```

### Test Case 2: 6 Outcomes (F1)

```php
public function test_f1_market(): void
{
    $predict = Predict::factory()->create(['title' => 'F1 Champion 2026']);
    $predict->ratings()->createMany([
        ['title' => 'Verstappen', 'sum_credit' => 5000],
        ['title' => 'Hamilton', 'sum_credit' => 2000],
        ['title' => 'Leclerc', 'sum_credit' => 1500],
        ['title' => 'Norris', 'sum_credit' => 1000],
        ['title' => 'Alonso', 'sum_credit' => 500],
    ]);
    
    $outcomes = BuildOutcomesAction::execute($predict);
    
    $this->assertCount(5, $outcomes);
    $this->assertEquals(50, $outcomes[0]['price']);
    $this->assertEquals(20, $outcomes[1]['price']);
}
```

### Test Case 3: 30+ Outcomes (Election)

```php
public function test_large_multi_outcome_market(): void
{
    $predict = Predict::factory()->create(['title' => 'US President 2028']);
    
    // Create 30 candidates
    for ($i = 1; $i <= 30; $i++) {
        $predict->ratings()->create([
            'title' => "Candidate $i",
            'sum_credit' => (31 - $i) * 100,  // Decreasing probability
        ]);
    }
    
    $outcomes = BuildOutcomesAction::execute($predict);
    
    $this->assertCount(30, $outcomes);
    
    // Verify prices sum to ~100
    $totalPrice = collect($outcomes)->sum('price');
    $this->assertEquals(100, $totalPrice);
}
```

---

## Legacy Fields Deprecation

### sum_credit_yes / sum_credit_no (DEPRECATED)

The fields `sum_credit_yes` and `sum_credit_no` in the `predicts` table are **DEPRECATED**.

**Use the `ratings` table instead**:
- Each rating (outcome) has its own `sum_credit`
- The `ratings` table is the source of truth
- Legacy fields are only for backward compatibility

```php
// ❌ WRONG - Using legacy fields
$sumYes = $predict->sum_credit_yes;
$sumNo = $predict->sum_credit_no;

// ✅ CORRECT - Using ratings
$ratings = $predict->ratings;
$totalVolume = $ratings->sum('sum_credit');
$perOutcome = $ratings->pluck('sum_credit', 'outcome');
```

### Migration Path

1. **Read**: Always prefer reading from `ratings` table
2. **Write**: Always write to `ratings.sum_credit`, not legacy fields
3. **Fallback**: Legacy fields can remain but are NOT source of truth
4. **Remove**: Future migration will remove legacy fields

---

## References

### Internal

- [Modules/Predict/docs/screenshots/f1-world-champion-2026-analysis.md](../../../laravel/Modules/Predict/docs/screenshots/f1-world-champion-2026-analysis.md) - F1 market example
- [Modules/Predict/docs/00-INDEX.md](../../../laravel/Modules/Predict/docs/00-INDEX.md) - Module index

### External

- [Futuur.com](https://futuur.com/) - Multi-outcome reference
- [Hanson - LMSR Paper](https://lance.fortnow.com/papers/files/scoring2d.pdf) - Mathematical foundation

---

## Changelog

- **2026-03-25**: Created rule 001 - Multi-outcome architecture
- **2026-03-25**: Added examples and test cases

---

**Enforced By**: AI Agents, Code Review  
**Violations**: 0 (must remain 0)  
**Last Review**: 2026-03-25
