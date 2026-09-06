# Investigation: HasXotFactory Trait + PHPStan Generic Type Errors

## Symptom Summary

**Symptom:** PHPStan Level 10 reports 98+ errors across Modules when using `HasXotFactory` trait with generic type annotations.

**Trigger:** When models use `@use HasXotFactory<SomeFactory>` annotation, PHPStan reports `generics.notGeneric` because the trait is not declared as generic.

**Scope:** All modules using `HasXotFactory` trait.

**First Seen:** 2026-09-06

**Severity:** Medium - Quality gate failure, not runtime bug

---

## Evidence (Graded)

| Grade | Evidence | Source |
|-------|----------|--------|
| A | PHPStan reports `generics.notGeneric` when using `@use HasXotFactory<Factory>` | Direct output |
| A | Trait `HasXotFactory` is NOT declared as generic (`@template TFactory`) | Code inspection |
| A | Trait `HasXotFactory` returns `Factory<static>` in `newFactory()` method | Code inspection |
| B | PHPStan `level: max` in `phpstan.neon` | Config file |
| B | 98 remaining errors after removing `@use` annotations | PHPStan output |
| C | Model classes may need explicit factory return types | Hypothesis |

---

## Hypotheses

### H1: Make HasXotFactory Generic (Plausibility: HIGH)
**Statement:** Declare the trait as generic with `@template TFactory of Factory<*>` and keep `@use HasXotFactory<ConcreteFactory>` on models.

**Supporting:** [A: trait needs `@template` for `@use` to work]
**Contradicting:** [A: previous attempt with generic caused `missingType.generics` on all models]
**Verification:** Test if adding `@template TFactory of Factory<*>` to trait resolves without new errors.

### H2: Remove @use Annotations (Plausibility: MEDIUM)
**Statement:** Don't use `@use` annotation at all - the trait works without type parameters.

**Supporting:** [A: trait doc says "No type parameters needed"]
**Contradicting:** [B: may cause `missingType.generics` on `factory()` method calls]
**Verification:** Verify all factory() calls work without annotations.

### H3: Add Explicit Factory Return Type (Plausibility: LOW)
**Statement:** Add `public static function factory(): static` override on each model.

**Supporting:** [C: would provide type info to callers]
**Contradicting:** [C: many models affected, high effort]
**Verification:** Check if base `Factory` class already provides this.

---

## Suspected Components

| Component | Why Suspected | Blast Radius |
|-----------|---------------|--------------|
| `HasXotFactory` trait | Root cause of generic type issue | All 16 modules |
| `phpstan.neon` | Level max may be too strict | All modules |
| `XotBaseModel` | Base class using trait | All models |

---

## Recommended Action: Option A

Create a fix story to resolve the PHPStan generic type errors.

**Key Decision:** Use `@template TFactory of Factory<*>` on trait + keep model annotations.

**Testing Strategy:**
1. Add `@template TFactory of Factory<*>` to trait
2. Add `@use HasXotFactory<ConcreteFactory>` to each model  
3. Run PHPStan - expect 0 errors
4. Run PHPMD and PHPInsights on changed modules
5. Run Pest tests

---

## Decision Log Entry

```
## Investigation: HasXotFactory PHPStan Generics — 2026-09-06
- Symptom: 98+ PHPStan errors related to HasXotFactory trait generic types
- Primary hypothesis: Make trait generic with @template annotation
- Primary suspected component: HasXotFactory trait
- Case file: bmad-output/investigation-hasxotfactory-phpstan.md
- Recommended response: Option A - Create fix story
```
