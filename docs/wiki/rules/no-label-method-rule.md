---
title: "No label() Method Rule"
type: rule
confidence: high
created: 2026-05-11
updated: 2026-05-11
tags: [filament, forms, labels, langserviceprovider, forbidden]
related:
  - ./filament-no-label-rule.md
  - ./langserviceprovider-labels.md
  - ../concepts/translation-system.md
---

# No label() Method Rule

## Rule

**NEVER use `->label()` method in Filament Resources, Forms, or Components.**

## Why

Labels are automatically handled by `LangServiceProvider` via the translation system:
- `Modules/{Name}/lang/{locale}/filament.php`
- Pattern: `'{resource}.{field}'` or `'{field}'`

Using `->label()` breaks the centralized translation management and creates maintenance debt.

## Forbidden

```php
// ❌ NEVER DO THIS
TextInput::make('name')->label('Nome')
Select::make('status')->label('Stato')
TextColumn::make('email')->label('Email Address')
```

## Required

```php
// ✅ CORRECT - Let LangServiceProvider handle it
TextInput::make('name')        // Auto-label from filament.php
Select::make('status')         // Auto-label from filament.php
TextColumn::make('email')      // Auto-label from filament.php
```

## Where Labels Live

```php
// Modules/YourModule/lang/it/filament.php
return [
    'user.fields.name' => 'Nome',
    'user.fields.email' => 'Email',
    'user.fields.status' => 'Stato',
    
    // Or simpler pattern
    'name' => 'Nome',
    'email' => 'Email',
    'status' => 'Stato',
];
```

## Also Forbidden

| Forbidden | Correct |
|-----------|---------|
| `->label()` | Let auto-translation handle it |
| `->placeholder()` with hardcoded text | Use translation keys |
| `->helperText()` with hardcoded text | Use translation keys |
| `$navigationLabel` property | Remove it |
| `$modelLabel` property | Remove it |
| `$navigationIcon` property | Remove it |

## Exception

Only if **absolutely necessary** and **documented with reason**:

```php
// With explanatory comment
TextInput::make('custom_field')
    ->label(__('exceptions.custom.label')) // Only for non-standard fields
```

## Related Rules

- `filament-no-label-rule.md` - Overview of label management
- `langserviceprovider-labels.md` - How LangServiceProvider works
- `auto-label-action.md` - Automatic label resolution

## Enforcement

- PHPStan: Check for `->label(` in Filament Resources
- Code Review: Verify no hardcoded labels
- CI: Fail if labels found in resources

---
**Applies to**: Filament v4/v5, all Resources, Forms, Tables, Infolists
**Enforcement**: Strict - no exceptions without documented justification
