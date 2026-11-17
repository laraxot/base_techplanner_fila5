# 🚫 sum_credit_yes/sum_credit_no - DEPRECATED FOREVER

**Date**: 2026-03-26  
**Status**: ❌ **DEPRECATED - NEVER USE**  
**Replacement**: Use `transactions` table with `rating_morph`

---

## ⚰️ OBITUARY

**Fields**:
- `sum_credit_yes` - R.I.P.
- `sum_credit_no` - R.I.P.
- `count_credit_yes` - R.I.P.
- `count_credit_no` - R.I.P.

**Cause of Death**: Binary thinking in a multi-outcome world

**Survived by**: 
- `rating_morph` table (one row per outcome)
- `transactions` table (one row per trade)

---

## 🪦 WHY THEY DIED

These fields assumed a **binary world**:
- YES/NO markets only
- 2 outcomes per predict
- Simple aggregation

**But reality is MULTI-OUTCOME**:
- F1 Champion: 6 drivers
- Sanremo: 6 artists
- Top Scorers: 6 players
- Album Sales: 6 artists
- etc.

**Each outcome needs its own**:
- Volume (sum of credits)
- Participants (count of unique traders)
- Probability (percentage)

---

## 🔮 THE NEW WAY

### Volume Calculation

```php
// ❌ OLD (DEPRECATED)
$volume = $predict->sum_credit_yes + $predict->sum_credit_no;

// ✅ NEW (MULTI-OUTCOME)
$volume = DB::table('transactions')
    ->where('model_type', Predict::class)
    ->where('model_id', $predict->id)
    ->sum('credits');
```

### Participants Calculation

```php
// ❌ OLD (DEPRECATED)
$participants = $predict->count_credit_yes + $predict->count_credit_no;

// ✅ NEW (MULTI-OUTCOME)
$participants = DB::table('transactions')
    ->where('model_type', Predict::class)
    ->where('model_id', $predict->id)
    ->distinct('user_id')
    ->count('user_id');
```

### Per-Outcome Volume

```php
// ✅ NEW (MULTI-OUTCOME)
$outcomes = $predict->ratings; // Collection of outcomes
foreach ($outcomes as $outcome) {
    $volume = DB::table('transactions')
        ->where('model_type', Predict::class)
        ->where('model_id', $predict->id)
        ->where('rating_id', $outcome->id)
        ->sum('credits');
    
    echo $outcome->title . ': ' . $volume . ' credits';
}
```

---

## 📊 DATABASE SCHEMA

### OLD (Binary - DEAD)

```
predicts table:
├── id
├── slug
├── title
├── sum_credit_yes    ❌ DEPRECATED
├── sum_credit_no     ❌ DEPRECATED
├── count_credit_yes  ❌ DEPRECATED
└── count_credit_no   ❌ DEPRECATED
```

### NEW (Multi-Outcome - ALIVE)

```
predicts table:
├── id
├── slug
├── title
└── (NO sum_credit_*)

ratings table:
├── id
├── title (e.g., "Max Verstappen")
├── color (e.g., "#0600EF")
└── ...

rating_morph table (pivot):
├── id
├── model_type (Predict class)
├── model_id (Predict ID)
├── rating_id (Rating ID)
├── percentage (probability %)
├── sum_credit (volume for THIS outcome)
├── count_credit (trades for THIS outcome)
└── ...

transactions table:
├── id
├── model_type
├── model_id
├── user_id
├── rating_id (which outcome)
├── credits
├── stocks_count
├── stocks_value
└── ...
```

---

## 🔧 MIGRATION GUIDE

### For Widgets

```php
// ❌ OLD (DEPRECATED)
class FeaturedPredictsWidget extends XotBaseTableWidget
{
    protected const HOT_SORT = 'sum_credit_yes + sum_credit_no';
}

// ✅ NEW (MULTI-OUTCOME)
class FeaturedPredictsWidget extends XotBaseTableWidget
{
    protected const HOT_SCORE = '(
        (SELECT COALESCE(SUM(transactions.credits), 0) 
         FROM transactions 
         WHERE transactions.model_type = ? 
         AND transactions.model_id = predicts.id) +
        (SELECT COUNT(DISTINCT transactions.user_id) 
         FROM transactions 
         WHERE transactions.model_type = ? 
         AND transactions.model_id = predicts.id) * 10
    )';
}
```

### For Seeders

```php
// ❌ OLD (DEPRECATED)
RatingMorph::create([
    'sum_credit_yes' => 1000,  // ❌ DOES NOT EXIST
    'sum_credit_no' => 500,    // ❌ DOES NOT EXIST
]);

// ✅ NEW (MULTI-OUTCOME)
RatingMorph::create([
    'percentage' => 38.0,  // Probability for THIS outcome
    // Volume calculated from transactions table
]);

// Create transactions
DB::table('transactions')->insert([
    'model_type' => Predict::class,
    'model_id' => $predict->id,
    'rating_id' => $rating->id,  // Which outcome
    'user_id' => $user->id,
    'credits' => 100,
]);
```

---

## 📋 CHECKLIST

### Before Committing Code

- [ ] NO references to `sum_credit_yes`
- [ ] NO references to `sum_credit_no`
- [ ] NO references to `count_credit_yes`
- [ ] NO references to `count_credit_no`
- [ ] Volume calculated from `transactions` table
- [ ] Participants calculated from `transactions` table
- [ ] Per-outcome data from `rating_morph` table

### Before Running Seeder

- [ ] Seeder creates multi-outcome predicts (2-30+ outcomes)
- [ ] Seeder creates `transactions` for volume
- [ ] Seeder does NOT set `sum_credit_*` fields
- [ ] Seeder uses `rating_morph` for outcomes

---

## 🪦 GRAVEYARD

**Files Updated**:
- `Modules/Predict/Filament/Widgets/FeaturedPredictsWidget.php`
- `Modules/Predict/Filament/Widgets/OutcomesTableWidget.php`
- `Modules/Predict/database/seeders/HomepageRealDataSeeder.php`

**Files to Update**:
- [ ] Any widget using `sum_credit_*`
- [ ] Any seeder using `sum_credit_*`
- [ ] Any action using `sum_credit_*`
- [ ] Any blade using `sum_credit_*`

---

## 🔗 Related Documentation

- [Multi-Outcome Architecture](../multi-outcome/00-INDEX.md)
- [XotBase Zen Philosophy](../xotbase-zen/00-INDEX.md)
- [Filament Tables for Outcomes](../filament-tables-for-outcomes/00-INDEX.md)

---

**Rest in Peace**: `sum_credit_yes`, `sum_credit_no`  
**Born**: Unknown  
**Died**: 2026-03-26  
**Cause**: Binary thinking in multi-outcome world  
**Survived by**: `transactions`, `rating_morph`
