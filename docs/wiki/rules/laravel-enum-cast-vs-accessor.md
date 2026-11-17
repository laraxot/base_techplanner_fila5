# Laravel Enum Cast vs Accessor - Don't Wrap The Wrapper

**Canonical Rule:** `docs/wiki/rules/laravel-enum-cast-vs-accessor.md`  
**Module:** `laravel/Modules/Fixcity/docs/rules/no-enum-accessor-wrapper.md`

---

## The Anti-Pattern (CACCA PUZZOLENTE)

### ❌ WRONG - Creating accessor for enum method

```php
class Ticket extends Model
{
    protected function casts(): array
    {
        return [
            'type' => TicketTypeEnum::class,  // ← Already provides getLabel()
        ];
    }
    
    // MERDA: Wrapping a method that already exists
    protected function typeLabel(): Attribute
    {
        return Attribute::make(
            get: function (): string {
                $type = $this->getRawOriginal('type')
                    ?? $this->getRawOriginal('type_id');
                
                return $this->resolveTypeLabel($type);  // ← USELESS COMPLEXITY
            },
        );
    }
    
    private function resolveTypeLabel(mixed $type): string  // ← DEAD CODE
    {
        if ($type instanceof TicketTypeEnum) {
            return $type->getLabel();
        }
        // ... 15 lines of redundant logic
    }
}
```

**Why This Is Shit:**
1. **Double wrapping** - Cast already gives you enum with `getLabel()`
2. **Code bloat** - 30+ lines for what takes 0 lines
3. **Maintenance burden** - Now you maintain 2 code paths
4. **Confusion** - Other devs wonder "why not just use enum?"
5. **Performance** - Accessor overhead for zero benefit

---

## ✅ CORRECT - Just use the enum

```php
class Ticket extends Model
{
    protected function casts(): array
    {
        return [
            'type' => TicketTypeEnum::class,  // ← This is ALL you need
        ];
    }
    
    // NOTHING ELSE REQUIRED
}

// Usage anywhere:
$ticket->type->getLabel();  // ← Works natively!
$ticket->type->getColor();  // ← Works natively!
$ticket->type->value;       // ← Works natively!
```

---

## The Golden Rule

> **If you cast to Enum, don't create accessors for Enum methods.**  
> **The Enum IS the accessor.**

### Decision Matrix

| Situation | Solution | Example |
|-----------|----------|---------|
| Enum has method you need | Use enum directly | `$ticket->type->getLabel()` |
| Need computed value | Accessor with logic | `getFullTypeLabelAttribute()` |
| Need JSON serialization | Add to `$appends` | `'appends' => ['type_label']` |

---

## When TO Use Accessors

### ✅ Computed Properties (Not Enum Wrappers)

```php
// GOOD: Accessor adds NEW computed data
protected function fullTypeLabel(): Attribute
{
    return Attribute::make(
        get: fn (): string => sprintf(
            '%s - %s',
            $this->type->getLabel(),
            $this->created_at->format('Y')
        ),
    );
}
// Usage: $ticket->full_type_label → "Danno Stradale - 2026"
```

---

## Code Comparison

### The "Clever" Way (Stupid)
```php
// 35 lines, 3 methods, 2 properties, hours of debugging
protected function typeLabel(): Attribute { ... }
private function resolveTypeLabel(mixed $type): string { ... }
$ticket->type_label;  // Indirection hell
```

### The Smart Way (Obvious)
```php
// 0 lines, 0 methods, works immediately
$ticket->type->getLabel();  // Crystal clear
```

---

## Detection

```bash
# Find enum-wrapping accessors
grep -rn "protected function.*Label.*Attribute" --include="*.php" -B 5 | \
  grep -B 5 "Enum::class"

# Find redundant resolve* methods
grep -rn "private function resolve" --include="*.php"
```

---

## Related Rules

- `laravel-model-accessor-safe-access.md` - When you ACTUALLY need accessors
- `dry-principle.md` - Don't Repeat Yourself
- `kiss-principle.md` - Keep It Simple, Stupid

---

## Real-World Fix

**File:** `laravel/Modules/Fixcity/app/Models/Ticket.php`

**Before (35 lines of shit):**
```php
protected function typeLabel(): Attribute { ... }
private function resolveTypeLabel(mixed $type): string { ... }
```

**After (0 lines of zen):**
```php
// Nothing - cast does the job
```

**Usage in Blade:**
```blade
{{-- Before (indirection) --}}
{{ $ticket->type_label }}

{{-- After (clear) --}}
{{ $ticket->type->getLabel() }}
```

---

## The Lesson

**Don't wrap the wrapper.**  
**Don't abstract the abstraction.**  
**Just use the fucking enum.**

---

*Documented: May 27, 2026*  
*Inspiration: User's brutal honesty*  
*Philosophy: KISS > Clever*
