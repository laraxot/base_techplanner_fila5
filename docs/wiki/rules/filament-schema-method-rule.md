---
title: "Filament Schema Method Rule"
type: rule
confidence: high
created: 2026-05-14
updated: 2026-05-14
tags: [filament, schema, arrays, string-keys, quality-gate]
related:
  - ./filament5-schemas-section.md
  - ./filament5-infolist-wizard-summary.md
  - ./ticketform-pattern-reference.md
---

# Filament Schema Method Rule

## Rule

**ALL `->schema()` calls in Filament Resources, Forms, Tables, Infolists, and Wizard steps MUST call a method that returns an array with STRING keys.**

## Why

- Ensures consistency with LangServiceProvider auto-label resolution
- Prevents integer-keyed arrays that break translation lookup
- Maintains DRY principles by centralizing schema definition
- Enables proper step/wizard functionality in XotBaseResourceForm
- Required for `getSteps()` to work correctly with string keys

## Forbidden

```php
// ❌ NEVER DO THIS - Integer keys break translations
->schema([
    0 => TextInput::make('name'),
    1 => TextInput::make('email'),
])

// ❌ NEVER DO THIS - Inline schema definition
->schema([
    TextInput::make('name'),
    TextInput::make('email'),
])

// ❌ NEVER DO THIS - Mixed key types
->schema([
    'name' => TextInput::make('name'),
    0 => TextInput::make('email'),
])

// ❌ NEVER DO THIS - Domain widget rebuilds steps manually
Step::make('data')->schema(TicketForm::getDataSchema())
```

## Required

```php
// ✅ CORRECT - Always call a method returning string-keyed array
->schema(static::getFormSchema())

// ✅ CORRECT - Method returns array with string keys
public static function getFormSchema(): array
{
    return [
        'name' => TextInput::make('name'),     // string key
        'email' => TextInput::make('email'),   // string key
        'type' => Select::make('type'),        // string key
    ];
}

// ✅ CORRECT - For wizard steps, delegate to the shared step factory
public static function getSteps(): array
{
    return [
        'privacy' => static::getStepByName('privacy'),
        'data' => static::getStepByName('data'),
        'summary' => static::getStepByName('summary'),
    ];
}

// ✅ CORRECT - the domain widget delegates, it does not rebuild steps
public function getSteps(): array
{
    return TicketForm::getSteps();
}
```

## Where Schemas Live

Schema methods should be placed in:
- `getFormSchema()` - main form schema
- `getStepByName('stepName')->schema()` - wizard step schemas
- `getSummarySchema()` - wizard summary schema
- `getInfolistSchema()` - infolist schema
- `getTableColumns()` - table columns (when applicable)

Do not put schema arrays inside page/widget flow-control methods such as `nextStep()`, `goToStep()`, or `form()->schema(match (...))`.

## Quality Gates

- **PHPStan**: Must pass without schema-related errors
- **Code Review**: Verify all `->schema()` calls reference methods
- **Visual Testing**: Ensure labels appear correctly from translation files
- **Functional Testing**: Wizard navigation and step visibility work correctly

## Related Rules

- [No label() Method Rule](./no-label-method-rule.md) - Never use `->label()`
- [Translation System Rules](../concepts/translation-system.md) - How labels are resolved
- [TicketForm Pattern Reference](../concepts/ticketform-pattern-reference.md) - Example implementation

## Enforcement

This rule is enforced through:
1. PHPStan rules checking for inline schema arrays
2. Code review checklists
3. Pre-commit hooks (when configured)
4. Quality gate validation after edits

---
