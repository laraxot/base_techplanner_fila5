# Rule: Filament Standard for Enums (HasLabel, HasColor, HasIcon)

## Intent
Enforce strict adherence to Filament's naming conventions for Enum metadata methods. Standardizing on `getLabel()`, `getColor()`, and `getIcon()` ensures native compatibility with Filament components (Tables, Forms, Infolists) and eliminates architectural noise.

## The Doctrine
- **Filament Native**: Filament expects `getLabel()`, `getColor()`, and `getIcon()` as defined in its contracts (`HasLabel`, `HasColor`, `HasIcon`).
- **No Redundancy**: Methods like `label()`, `color()`, or `icon()` are non-standard, redundant, and must be eliminated.
- **Trait-Powered**: All these methods are provided by `Modules\Xot\Traits\EnumTrait`. Do not implement them manually unless custom logic is required (and even then, use the `get` prefix).

## Mandatory Requirements
1. **Always Use**: `getLabel()`, `getColor()`, `getIcon()`, `getDescription()`.
2. **Never Use**: `label()`, `color()`, `icon()`, `description()` as methods in Enums.
3. **Migration Rule**: Existing Blade files or code using `->label()`, `->color()`, `->icon()` must be refactored to use the `get` prefix counterparts.
4. **Second Brain Alignment**: This rule supersedes any previous local convention that used shorter method names.

## Example Refactoring (Blade)
**Bad:**
```blade
<x-badge :color="$status->color()">{{ $status->label() }}</x-badge>
```

**Good:**
```blade
<x-badge :color="$status->getColor()">{{ $status->getLabel() }}</x-badge>
```
