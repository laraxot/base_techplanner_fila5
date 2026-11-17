# 🎯 Eloquent Models Over Raw Queries

**Priority**: 🔴 CRITICAL  
**Date**: 2026-03-26  
**Version**: 1.0  
**Status**: ✅ Active - **MANDATORY**

---

## 🎯 Fundamental Principle

> **ALWAYS use Eloquent models, NEVER DB::connection()->table()**
>
> Eloquent provides relationships, casting, mutators, and testability.
> Raw queries bypass all of these benefits.

---

## ❌ WRONG (NEVER DO THIS)

```php
// ❌ WRONG - Raw query with DB::connection()
use Illuminate\Support\Facades\DB;

$trades = DB::connection($predict->getConnectionName())
    ->table('bet_histories')
    ->whereIn('rating_id', $ratingIds)
    ->orderByDesc('created_at')
    ->limit($limit)
    ->get();

// ❌ WRONG - Manual relationship loading
foreach ($trades as $trade) {
    $rating = \Modules\Rating\Models\Rating::find($trade->rating_id);
    $user = \Modules\User\Models\User::find($trade->user_id);
}
```

**Problems**:
- ❌ No relationship loading
- ❌ No casting (dates, integers, floats)
- ❌ No mutators/accessors
- ❌ Hard to test
- ❌ Connection management manual
- ❌ N+1 queries

---

## ✅ CORRECT (ALWAYS DO THIS)

```php
// ✅ CORRECT - Eloquent model with relationships
use Modules\Predict\Models\BetHistory;

$trades = BetHistory::query()
    ->whereIn('rating_id', $ratingIds)
    ->with(['rating', 'user']) // Eager load relationships
    ->orderByDesc('created_at')
    ->limit($limit)
    ->get();

// ✅ CORRECT - Relationships auto-loaded
foreach ($trades as $trade) {
    $rating = $trade->rating; // Already loaded
    $user = $trade->user;     // Already loaded
    $createdAt = $trade->created_at->diffForHumans(); // Cast to Carbon
}
```

**Benefits**:
- ✅ Relationships loaded automatically
- ✅ Casting (dates, integers, floats)
- ✅ Mutators/accessors work
- ✅ Easy to test (mock models)
- ✅ Connection managed by model
- ✅ Eager loading prevents N+1

---

## 📋 Implementation Checklist

### Before Writing Query

- [ ] Does a Model exist for this table?
- [ ] Can I use `Model::query()` instead of `DB::table()`?
- [ ] Can I use `->with()` for relationships?
- [ ] Can I use model relationships instead of manual joins?

### After Writing Query

- [ ] Using Eloquent model (NOT DB::facade)
- [ ] Relationships eager loaded with `->with()`
- [ ] No manual connection management
- [ ] Casting works (dates, integers, floats)
- [ ] Testable (can mock model)

---

## 🔧 Migration Guide

### From Raw Query to Eloquent

```php
// BEFORE (Raw Query)
use Illuminate\Support\Facades\DB;

$records = DB::connection($model->getConnectionName())
    ->table('some_table')
    ->where('some_id', $id)
    ->get();

// AFTER (Eloquent)
use App\Models\SomeModel;

$records = SomeModel::query()
    ->where('some_id', $id)
    ->get();
```

### From Manual Joins to Relationships

```php
// BEFORE (Manual Join)
use Illuminate\Support\Facades\DB;

$records = DB::table('posts')
    ->join('users', 'posts.user_id', '=', 'users.id')
    ->select('posts.*', 'users.name as user_name')
    ->get();

// AFTER (Eloquent Relationship)
$records = Post::query()
    ->with(['user'])
    ->get();

foreach ($records as $post) {
    echo $post->user->name; // Relationship loaded
}
```

---

## 📊 Examples

### Example 1: Get Recent Trades

```php
// ❌ WRONG - Raw query
$trades = DB::connection($predict->getConnectionName())
    ->table('bet_histories')
    ->whereIn('rating_id', $ratingIds)
    ->orderByDesc('created_at')
    ->get();

foreach ($trades as $trade) {
    $rating = Rating::find($trade->rating_id); // N+1 query!
}

// ✅ CORRECT - Eloquent with relationships
$trades = BetHistory::query()
    ->whereIn('rating_id', $ratingIds)
    ->with(['rating']) // Eager load
    ->orderByDesc('created_at')
    ->get();

foreach ($trades as $trade) {
    $rating = $trade->rating; // Already loaded, no query
}
```

### Example 2: Get User Data

```php
// ❌ WRONG - Raw query
$user = DB::connection('user')
    ->table('users')
    ->where('id', $userId)
    ->first();

$name = $user->first_name . ' ' . $user->last_name;

// ✅ CORRECT - Eloquent model
$user = User::query()->find($userId);
$name = $user->full_name; // Accessor/mutator
```

### Example 3: Date Handling

```php
// ❌ WRONG - Manual parsing
$createdAt = $trade->created_at; // String
$carbon = Carbon::parse($createdAt); // Manual parsing
$diff = $carbon->diffForHumans();

// ✅ CORRECT - Eloquent casting
$createdAt = $trade->created_at; // Already Carbon instance
$diff = $createdAt->diffForHumans(); // Works immediately
```

---

## 🚫 Common Mistakes

### Mistake 1: Using DB Facade When Model Exists

```php
// ❌ WRONG
DB::table('users')->where('id', $id)->get();

// ✅ CORRECT
User::query()->where('id', $id)->get();
```

### Mistake 2: Manual Connection Management

```php
// ❌ WRONG
DB::connection($model->getConnectionName())->table(...);

// ✅ CORRECT
$model->newQuery()->where(...);
// OR
ModelClass::query()->where(...);
```

### Mistake 3: N+1 Queries

```php
// ❌ WRONG - N+1 queries
$trades = BetHistory::query()->get();
foreach ($trades as $trade) {
    echo $trade->rating->title; // Query per iteration!
}

// ✅ CORRECT - Eager loading
$trades = BetHistory::query()->with(['rating'])->get();
foreach ($trades as $trade) {
    echo $trade->rating->title; // No additional query
}
```

---

## 🔗 Related Documentation

- [Eloquent Best Practices](../../../laravel/docs/eloquent-best-practices.md)
- [Eloquent Relationships](https://laravel.com/docs/eloquent-relationships)
- [Eager Loading](https://laravel.com/docs/eloquent-relationships#eager-loading)
- [XotBase Zen Philosophy](../xotbase-zen/00-INDEX.md)

---

## ✅ Quality Checklist

Before committing code with database queries:

- [ ] Using Eloquent model (NOT DB::table)
- [ ] Relationships eager loaded with `->with()`
- [ ] No manual connection management
- [ ] Casting works (dates, integers, floats)
- [ ] No N+1 queries
- [ ] Testable (can mock model)

**If ANY check fails → DO NOT COMMIT**

---

**Maintained By**: AI Agents Team  
**Last Review**: 2026-03-26  
**Next Review**: 2026-04-02  
**Status**: ✅ Active - **MANDATORY**
