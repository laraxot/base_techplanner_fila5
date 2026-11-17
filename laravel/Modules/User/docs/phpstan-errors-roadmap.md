<<<<<<< HEAD
- [Filament Class Extension Rules](../../Xot/docs/filament-class-extension-rules.md)
- [PHPStan Code Quality Guide](../../Xot/docs/phpstan-code-quality-guide.md)
- [Property Exists vs Isset](../../Xot/docs/phpstan-code-quality-guide.md#5-property-access-su-mixed-eloquent---regola-critica)

---

## 🎯 Strategia

**Approccio**: Analisi approfondita - errori diversi richiedono comprensione business logic  
**Priorità**: Media (13 errori, alcuni richiedono verifica modelli)  
**Tempo stimato**: 45 minuti
---
module: theme
topic: phpstan-errors-roadmap
canonical: ../../../Themes/docs/shared-components/phpstan-errors-roadmap.md
---

See canonical documentation: ../../../Themes/docs/shared-components/phpstan-errors-roadmap.md
=======
# PHPStan Level Max Errors Roadmap - User Module

**Date**: 2026-01-12
**Module**: User
**PHPStan Level**: max (Level 10)
**Status**: 🚧 **IN PROGRESS**
**Environment**: ✅ **STABLE** (Tests use `testing.sqlite`, shared connections worked)

---

## 📊 Status Update

### ✅ Completed Items
1. **Merge Conflicts Resolved**:
   - `SocialiteUserResource.php`: Fixed.
   - `TeamInvitationResource.php`: Fixed.
   - `BaseUser.php`: Fixed (Critical model restored).
   - `Passport/Client.php`: Fixed.
2. **Test Environment Fixed**:
   - `TestCase.php` rewritten to use persistent `tests/testing.sqlite` to resolve SQLite `:memory:` isolation issues between multiple connections (`user`, `mysql`, `default`).
   - `TenantTest`: **PASSING**.
3. **Syntax Errors Fixed**:
   - `HasTeams.php`: Fixed `switchTeam` return type and syntax error.
   - `TestCase.php`: Fixed syntax and structure.

### 🚨 Current Challenges
- **Total PHPStan Errors**: 534 (down from initial merge conflict state).
- **Categories**:
    1. **Type Mismatches**: `Contract` vs `Model` checks (e.g. `HasTeams` trait).
    2. **Missing Methods**: `Call to an undefined method` on generic traits/mixins.
    3. **Missing Files**: References to pages/resources that might be missing or misnamed.

---

## 🗺️ Roadmap: 534 Errors Resolution

### Phase 1: High Impact Traits (HasTeams, HasProfile)
- **Goal**: Resolve type errors in core traits used by `BaseUser`.
- **Strategy**: 
    - Use `assert($this instanceof Model)` or strict type checks where PHPStan loses context.
    - Fix generic `@return` types for relationships (e.g. `BelongsToMany`).

### Phase 2: Missing Files & Resources
- **Goal**: Resolve "Internal error: Could not read file" or class not found.
- **Acions**:
    - Verify `ClientResource` pages existence.
    - If missing, create stub classes or remove references.

### Phase 3: Generic Type Narrowing
- **Goal**: Fix `mixed` type errors.
- **Strategy**:
    - Add `@var` annotations where necessary.
    - Use strict return types.

---

## 📝 Recent Fixes Log

- **Fix `TenantTest`**: Switched to file-based sqlite to handle `shared` connection logic correctly.
- **Fix `HasTeams::switchTeam`**: Added return `bool` type casting and fixed brace syntax.
- **Fix `BaseUser`**: Resolved critical merge conflicts restoring the model integrity.

**Next Step**: Run `phpstan analyse Modules/User` and start Phase 1.
>>>>>>> 6ed19256f (.)
