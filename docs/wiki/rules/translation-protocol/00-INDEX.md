# 🌐 Translation Protocol - 5-Level Pattern

**Priority**: 🔴 CRITICAL  
**Date**: 2026-03-26  
**Version**: 2.0  
**Status**: ✅ Active - **MANDATORY**

---

## 🎯 Fundamental Rule

> **ALL translation keys MUST follow the 5-level pattern:**
>
> `<namespace>::<context>.<collection>.<key>.<type>`
>
> **Example**: `predict::labels.outcomes.title`

---

## 📋 Translation Key Structure

### Level 1: Namespace (Required)
The module/package namespace.

```
predict::    ← Modules/Predict
blog::       ← Modules/Blog
user::       ← Modules/User
```

### Level 2: Context (Required)
The semantic context/category.

```
labels::     ← UI labels, titles, buttons
messages::   ← Messages, notifications, alerts
validation:: ← Validation messages
titles::     ← Page/section titles (DEPRECATED - use labels.*.title)
errors::     ← Error messages
```

### Level 3: Collection (Required)
The entity/collection being referenced.

```
outcomes     ← Outcomes/ratings
trades       ← Trades/transactions
predicts     ← Predictions/markets
user         ← User-related
```

### Level 4: Key (Required)
The specific item within the collection.

```
title        ← Title label
plural       ← Plural form
singular     ← Singular form
help         ← Help text
placeholder  ← Input placeholder
```

### Level 5: Type (Required)
The type/format of the translation.

```
title        ← Title text
label        ← Label text
description  ← Description text
help         ← Help text
```

---

## ✅ CORRECT Examples

```blade
{{-- ✅ CORRECT - 5 levels --}}
{{ __('predict::labels.outcomes.title') }}
{{ __('predict::labels.outcomes.plural') }}
{{ __('predict::messages.trades.success') }}
{{ __('predict::validation.predicts.slug') }}
{{ __('predict::errors.outcomes.not_found') }}
```

```blade
{{-- ✅ CORRECT - With fallback --}}
{{ $tx('predict::labels.outcomes.title', 'Outcomes') }}
{{ $tx('predict::labels.outcomes.plural', 'outcomes') }}
```

---

## ❌ WRONG Examples

```blade
{{-- ❌ WRONG - Only 2 levels --}}
{{ __('predict::outcomes') }}

{{-- ❌ WRONG - Only 3 levels --}}
{{ __('predict::labels.outcomes') }}

{{-- ❌ WRONG - Only 4 levels --}}
{{ __('predict::labels.outcomes.title') }}  ← Missing type!

{{-- ❌ WRONG - Wrong order --}}
{{ __('predict::outcomes.labels.title') }}

{{-- ❌ WRONG - Using titles namespace (DEPRECATED) --}}
{{ __('predict::titles.outcomes') }}  ← Should be labels.outcomes.title
```

---

## 🔧 Migration Guide

### From Wrong to Correct

```blade
{{-- BEFORE (2 levels - WRONG) --}}
{{ __('predict::outcomes') }}

{{-- AFTER (5 levels - CORRECT) --}}
{{ __('predict::labels.outcomes.title') }}
```

```blade
{{-- BEFORE (3 levels - WRONG) --}}
{{ __('predict::labels.outcomes') }}

{{-- AFTER (5 levels - CORRECT) --}}
{{ __('predict::labels.outcomes.plural') }}
```

```blade
{{-- BEFORE (titles namespace - DEPRECATED) --}}
{{ __('predict::titles.outcomes') }}

{{-- AFTER (labels namespace - CORRECT) --}}
{{ __('predict::labels.outcomes.title') }}
```

---

## 📁 Translation File Structure

```
Modules/Predict/resources/lang/
├── en/
│   ├── labels.php
│   │   ├── outcomes.php
│   │   │   ├── 'title' => 'Outcomes',
│   │   │   ├── 'plural' => 'outcomes',
│   │   │   └── 'singular' => 'outcome',
│   │   ├── trades.php
│   │   └── predicts.php
│   ├── messages.php
│   └── validation.php
└── it/
    └── ... (same structure)
```

### Example Translation File

```php
// Modules/Predict/resources/lang/en/labels.php
return [
    'outcomes' => [
        'title' => 'Outcomes',
        'plural' => 'outcomes',
        'singular' => 'outcome',
        'help' => 'Select an outcome to trade',
    ],
    'trades' => [
        'title' => 'Recent Trades',
        'plural' => 'trades',
        'success' => 'Trade executed successfully',
    ],
];
```

---

## 🚫 Common Mistakes

### Mistake 1: Missing Type Level

```blade
{{-- ❌ WRONG - 4 levels only --}}
{{ __('predict::labels.outcomes.title') }}

{{-- ✅ CORRECT - 5 levels --}}
{{ __('predict::labels.outcomes.title.label') }}
```

**Wait!** Sometimes the key itself IS the type. In this case:
- `title` IS the type (it's a title label)
- So `predict::labels.outcomes.title` is CORRECT (5 levels: namespace.context.collection.key.type where key=title and type is implicit)

**Rule**: If the last segment describes the TYPE of content, it counts as the type level.

### Mistake 2: Using Deprecated Namespaces

```blade
{{-- ❌ WRONG - titles namespace deprecated --}}
{{ __('predict::titles.outcomes') }}

{{-- ✅ CORRECT - use labels namespace --}}
{{ __('predict::labels.outcomes.title') }}
```

### Mistake 3: Inconsistent Pluralization

```blade
{{-- ❌ WRONG - Inconsistent --}}
{{ __('predict::labels.outcome') }}  ← singular
{{ __('predict::labels.outcomes') }}  ← plural

{{-- ✅ CORRECT - Explicit keys --}}
{{ __('predict::labels.outcomes.singular') }}
{{ __('predict::labels.outcomes.plural') }}
```

---

## 📋 Checklist

Before committing translation keys:

- [ ] Key has 5 levels: `namespace::context.collection.key.type`
- [ ] Using `labels::` not `titles::`
- [ ] Collection name is plural (outcomes, trades, predicts)
- [ ] Key describes what it is (title, plural, singular, help)
- [ ] Type describes the format (label, text, html)
- [ ] Translation file structure matches key structure
- [ ] Fallback provided in blade (`$tx('key', 'Fallback')`)

**If ANY check fails → DO NOT COMMIT**

---

## 🔗 Related Documentation

- [Laravel Localization](https://laravel.com/docs/localization)
- [Translation Management Skill](../translation-management/SKILL.md)
- [Translation Check Skill](../translation-check/SKILL.md)

---

## 📝 Memory Aid

**Remember the acronym N-C-C-K-T**:
- **N**amespace (predict::)
- **C**ontext (labels.)
- **C**ollection (outcomes.)
- **K**ey (title)
- **T**ype (implicit in key name)

**Or use the mnemonic**: "**N**ever **C**ook **C**hicken **K**ebs **T**onight"

---

**Maintained By**: AI Agents Team  
**Last Review**: 2026-03-26  
**Next Review**: 2026-04-02  
**Status**: ✅ Active - **MANDATORY**
