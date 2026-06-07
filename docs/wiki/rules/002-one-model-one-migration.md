# Rule 002: One Model = One Migration

**Status**: 🔴 CRITICAL  
**Priority**: MANDATORY  
**Created**: 2026-03-26  
**Updated**: 2026-03-26  
**Enforcement**: ZERO TOLERANCE

---

## 🚨 The Rule

> **EVERY model MUST have exactly ONE migration file. NO EXCEPTIONS.**

**Formula**: `1 Model = 1 Table = 1 Migration`

---

## ❌ Why Duplicates Are CRITICAL

Having multiple migrations for the same model/table causes:

| Problem | Impact |
|---------|--------|
| **Database Inconsistency** | Different migrations create different schemas |
| **Migration Conflicts** | Rollback/refresh becomes unpredictable |
| **Code Redundancy** | Violates DRY principle |
| **Maintenance Nightmare** | Which migration is the source of truth? |
| **Team Confusion** | Developers don't know which to use |
| **Testing Failures** | Fresh migrations produce inconsistent results |

---

## ✅ CORRECT Pattern

```
Modules/Rating/
├── app/Models/Rating.php
└── database/migrations/
    └── 2026_03_12_180000_create_ratings_table.php  ✅ ONE migration
```

---

## ❌ WRONG Pattern (DELETED)

```
Modules/Rating/
├── app/Models/Rating.php
└── database/migrations/
    ├── 2023_01_01_000000_create_ratings_table.php  ❌ DUPLICATE - DELETE
    └── 2026_03_12_180000_create_ratings_table.php  ✅ Keep newest
```

---

## 🔍 How to Check for Duplicates

```bash
# Find all migrations for a specific table
grep -r "create_ratings_table" Modules/Rating/database/migrations/

# Count migrations per model
find Modules/*/database/migrations -name "*_create_*_table.php" | \
  sed 's/.*create_\(.*\)_table.*/\1/' | sort | uniq -c | sort -rn
```

---

## 🛠️ Fix Protocol

If you find duplicate migrations:

1. **Identify the newest** migration (by timestamp in filename)
2. **Compare schemas** - ensure newest has all columns
3. **Delete the old** duplicate migration
4. **Update docs** - module index, roadmap
5. **Test** - `php artisan migrate:fresh --seed`
6. **Commit** - with clear message about deduplication

---

## 📋 Related Rules

- [Rule 001](001-no-commit-without-testing.md) - Quality gate before commit
- [Rule 003](003-container-blade-agnostic.md) - Theme-first architecture
- [Rule 005](005-filament-table-for-lists.md) - Filament table for lists

---

## 🎯 Philosophy

This rule enforces:

- ✅ **DRY** - Don't Repeat Yourself
- ✅ **KISS** - Keep It Simple, Stupid
- ✅ **Single Source of Truth** - One migration per model
- ✅ **Predictability** - Fresh migrations always work
- ✅ **Maintainability** - Clear ownership and responsibility

---

## 📚 References

- [Laravel Migration Best Practices](https://laravel.com/docs/migrations)
- [Modules/Rating/docs/](../../../../laravel/Modules/Rating/docs/00-INDEX.md)
- [Safe Migrations Skill](../skills/safe-migrations/)

---

**Last Review**: 2026-03-26  
**Next Review**: 2026-04-02  
**Violations Found**: 1 (Rating module - FIXED)  
**Violations Remaining**: 0
