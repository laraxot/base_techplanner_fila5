# 📦 One Migration Per Model Rule

**Priority**: 🔴 CRITICAL  
**Date**: 2026-03-26  
**Version**: 1.0  
**Status**: ✅ Active - **MANDATORY**

---

## 🎯 Fundamental Rule

> **ONE MODEL = ONE MIGRATION**
>
> Each model should have exactly ONE migration file that creates its table.
> NEVER create separate migrations for adding columns to existing tables.

---

## 📋 Migration Naming Convention

### ✅ CORRECT Format

```
YYYY_MM_DD_ID_create_<table_name>_table.php
```

**Examples**:
```
2026_03_26_000001_create_ratings_table.php
2026_03_26_000002_create_predicts_table.php
2026_03_26_000003_create_transactions_table.php
```

### ❌ WRONG Format

```
YYYY_MM_DD_ID_add_<column>_to_<table>_table.php  ← WRONG!
YYYY_MM_DD_ID_update_<table>_table.php           ← WRONG!
YYYY_MM_DD_ID_modify_<table>_table.php           ← WRONG!
```

**Examples**:
```
2026_03_26_000004_add_value_to_ratings_table.php     ← WRONG!
2026_03_26_000005_update_ratings_table.php           ← WRONG!
2026_03_26_000006_modify_ratings_table.php           ← WRONG!
```

---

## 🚫 Why Separate Migrations Are Wrong

### Problem 1: Philosophy Violation

Our architecture follows **Domain-Driven Design**:
- One model = one aggregate root
- One table = one migration
- Clear ownership and boundaries

### Problem 2: Maintenance Nightmare

```php
// ❌ WRONG - Multiple migrations for same table
2026_03_26_000001_create_ratings_table.php
2026_03_26_000004_add_value_to_ratings_table.php
2026_03_26_000005_add_color_to_ratings_table.php
2026_03_26_000006_add_icon_to_ratings_table.php

// Result: 4 files to check for one table!
```

### Problem 3: Rollback Issues

```bash
# Rolling back one column means rolling back ALL columns added in that migration
php artisan migrate:rollback

# Which migration do I rollback to remove 'value' column?
# All of them? None of them?
```

### Problem 4: Schema Fragmentation

```php
// ❌ WRONG - Schema defined across multiple files
// File 1: create_ratings_table.php
Schema::create('ratings', function (Blueprint $table) {
    $table->id();
    $table->string('title');
    $table->string('color');
});

// File 2: add_value_to_ratings_table.php
Schema::table('ratings', function (Blueprint $table) {
    $table->decimal('value', 10, 2);  // ← Why is this in a different file?!
});
```

---

## ✅ Correct Approach

### Single Migration Per Model

```php
// ✅ CORRECT - All columns in ONE migration
// 2026_03_26_000001_create_ratings_table.php
Schema::create('ratings', function (Blueprint $table) {
    $table->id();
    $table->string('title');
    $table->string('color');
    $table->decimal('value', 10, 2);  // ← All columns together!
    $table->string('icon');
    $table->timestamps();
});
```

### If You Need to Add a Column

**Option 1: Update the original migration** (if not yet deployed)

```php
// ✅ CORRECT - Edit the original migration
// 2026_03_26_000001_create_ratings_table.php
Schema::create('ratings', function (Blueprint $table) {
    $table->id();
    $table->string('title');
    $table->string('color');
    $table->decimal('value', 10, 2);  // ← Added here!
    $table->timestamps();
});
```

**Option 2: Create new migration for production** (if already deployed)

```php
// ✅ ACCEPTABLE - Only for production hotfixes
// 2026_03_27_000001_add_value_to_ratings_table.php
// NOTE: This is ONLY acceptable for production hotfixes
// After deployment, merge into original migration

Schema::table('ratings', function (Blueprint $table) {
    $table->decimal('value', 10, 2);
});
```

**BUT THEN**: After deployment, merge all changes into the original migration and create a new migration for the next change.

---

## 🔧 Migration Workflow

### For New Models

1. Create model with migration:
   ```bash
   php artisan make:model Rating -m
   ```

2. Edit the single migration file:
   ```php
   // database/migrations/2026_03_26_000001_create_ratings_table.php
   Schema::create('ratings', function (Blueprint $table) {
       $table->id();
       $table->string('title');
       $table->string('color');
       $table->decimal('value', 10, 2);
       $table->timestamps();
   });
   ```

3. Run migration:
   ```bash
   php artisan migrate
   ```

### For Existing Models (Development)

1. **Edit the original migration** (NOT create new one):
   ```php
   // database/migrations/2026_03_26_000001_create_ratings_table.php
   Schema::create('ratings', function (Blueprint $table) {
       $table->id();
       $table->string('title');
       $table->string('color');
       $table->decimal('value', 10, 2);  // ← Added!
       $table->timestamps();
   });
   ```

2. Fresh migrate:
   ```bash
   php artisan migrate:fresh
   ```

### For Existing Models (Production)

1. Create temporary migration for hotfix:
   ```php
   // database/migrations/2026_03_27_000001_add_value_to_ratings_table.php
   Schema::table('ratings', function (Blueprint $table) {
       $table->decimal('value', 10, 2);
   });
   ```

2. Deploy and run migration:
   ```bash
   php artisan migrate
   ```

3. **IMPORTANT**: After deployment, merge into original migration:
   - Edit original migration to include new column
   - Delete the temporary migration
   - Create new migration for NEXT change

---

## 📊 Comparison Table

| Aspect | One Migration | Multiple Migrations |
|--------|---------------|---------------------|
| **Maintainability** | ✅ Easy - one file | ❌ Hard - multiple files |
| **Rollback** | ✅ Clear | ❌ Confusing |
| **Schema Understanding** | ✅ Complete in one place | ❌ Fragmented |
| **Code Review** | ✅ One file to review | ❌ Multiple files |
| **Git History** | ✅ Clear | ❌ Messy |
| **Philosophy** | ✅ DDD compliant | ❌ Violates boundaries |

---

## 📋 Checklist

Before committing migrations:

- [ ] Each model has ONE migration file
- [ ] Migration name follows `create_<table>_table` format
- [ ] NO `add_*_to_*_table` migrations
- [ ] NO `update_*_table` migrations
- [ ] All columns defined in single migration
- [ ] If production hotfix, plan to merge later
- [ ] Migration file in correct module directory

**If ANY check fails → DO NOT COMMIT**

---

## 🔗 Related Documentation

- [Laravel Migrations](https://laravel.com/docs/migrations)
- [Domain-Driven Design](../ddd/00-INDEX.md)
- [Model Architecture](../model-architecture/00-INDEX.md)

---

## 📝 Memory Aid

**Remember: ONE MODEL = ONE MIGRATION**

Like **ONE PERSON = ONE PASSPORT**
- Not multiple passports for different trips
- Not separate passports for different countries
- ONE passport with all stamps/visas

**Or: ONE MODEL = ONE MIGRATION = ONE TRUTH**

---

**Maintained By**: AI Agents Team  
**Last Review**: 2026-03-26  
**Next Review**: 2026-04-02  
**Status**: ✅ Active - **MANDATORY**
