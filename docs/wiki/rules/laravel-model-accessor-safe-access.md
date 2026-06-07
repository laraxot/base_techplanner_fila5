# Laravel Model Accessor Safe Access Rule

**Canonical Rule:** `docs/wiki/rules/laravel-model-accessor-safe-access.md`  
**Module Rule:** `laravel/Modules/Fixcity/docs/rules/model-accessor-anti-pattern.md`

---

## Quick Reference

| Wrong | Right |
|-------|-------|
| `$this->type` in accessor | `$this->getRawOriginal('type')` |
| `$this->relation` | `$this->attributes['relation_id']` |
| Complex logic in accessor | Delegate to private method |

---

## The Golden Rule

> **Never access `$this->property` inside an Attribute accessor/mutator.**  
> **Always use `getRawOriginal('property')` or `$this->attributes['property']`.**

---

## Why This Matters

### 1. Infinite Loop Prevention

```php
// BAD: type accessor calls type accessor... calls type accessor...
$type = $this->type;  // 🔥 Stack overflow
```

### 2. N+1 Query Prevention

```php
// BAD: Every access lazy-loads relations
$author = $this->author;  // SELECT * FROM users WHERE...
```

### 3. Side-Effect Isolation

```php
// BAD: Mutators run unexpectedly
$this->status;  // Triggers status mutator side effects
```

---

## Pattern Detection

```bash
# Auto-detect violations
./vendor/bin/phpstan analyse --configuration=phpstan.model.rules.neon

# Manual check
grep -rn "protected function.*Attribute" --include="*.php" -A 10 | \
  grep -E "\$this->(?!getRawOriginal|attributes)"
```

---

## Examples

### ❌ Anti-Pattern (DANGEROUS)

```php
// Modules/Fixcity/app/Models/Ticket.php
protected function typeLabel(): Attribute
{
    return Attribute::make(
        get: function (): string {
            // CRIME: Accessing type triggers type's accessor
            $type = $this->type ?? $this->type_id;
            
            if ($type instanceof TicketTypeEnum) {
                return $type->getLabel();
            }
            
            if (\is_string($type)) {
                return TicketTypeEnum::from($type)->getLabel();
            }
            
            return '';
        },
    );
}
```

### ✅ Correct Pattern

```php
protected function typeLabel(): Attribute
{
    return Attribute::make(
        get: function (): string {
            // SAFE: Raw DB value, no accessor chain
            $type = $this->getRawOriginal('type') 
                  ?? $this->getRawOriginal('type_id');
            
            return $this->resolveTypeLabel($type);
        },
    );
}

private function resolveTypeLabel(mixed $type): string
{
    return match(true) {
        $type instanceof TicketTypeEnum => $type->getLabel(),
        \is_string($type) && $type !== '' => 
            TicketTypeEnum::tryFrom($type)?->getLabel() ?? $type,
        default => '',
    };
}
```

---

## Enforcement

### PHPStan Custom Rule

```neon
# phpstan.neon
rules:
    - App\PHPStan\Rules\NoPropertyAccessInAccessorRule
```

### Pre-Commit Hook

```bash
#!/bin/bash
# .git/hooks/pre-commit
if grep -rn "protected function.*Attribute" --include="*.php" -A 10 | \
   grep -qE "\$this->(?!getRawOriginal|attributes)\\w+"; then
    echo "ERROR: Unsafe property access in accessor detected"
    exit 1
fi
```

---

## Related Rules

- `docs/wiki/rules/dry-principle.md` - Logic extraction
- `docs/wiki/rules/single-responsibility.md` - Accessor scope
- `docs/wiki/rules/performance-n+1.md` - Query optimization

---

*Version: 1.0*  
*Last Updated: 2026-05-27*  
*Author: Cascade AI*
