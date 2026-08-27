# 🔴 TRANSLATION STRUCTURE - 5 LEVELS REQUIRED

**Path**: `.agents/docs/rules/translation-structure-5-levels.md`  
**Last Updated**: 2026-03-26  
**Status**: ✅ CRITICAL RULE  
**Priority**: BLOCKER

---

## 🎯 The Rule

> **SEMPRE** usare traduzioni a **5 LIVELLI**:
> `__('namespace::context.collection.element.type')`

**Example**:
```php
// ✅ CORRETTO - 5 livelli
<<<<<<< .merge_file_eAry5S
=======
<<<<<<< .merge_file_rsi3Gt
>>>>>>> .merge_file_kCpdXV
__('predict::user.fields.first_name.label')
__('predict::fields.outcome.title.label')
__('predict::labels.market.status.label')

// ❌ SBAGLIATO - MENO di 5 livelli
__('predict::titles.outcomes')           // ❌ SOLO 2 livelli!
__('predict::labels.volume')             // ❌ SOLO 2 livelli!
__('predict::messages.success')          // ❌ SOLO 2 livelli!
<<<<<<< .merge_file_eAry5S
=======
=======
>>>>>>> .merge_file_kCpdXV
__('forecast::user.fields.first_name.label')
__('forecast::fields.outcome.title.label')
__('forecast::labels.market.status.label')

// ❌ SBAGLIATO - MENO di 5 livelli
__('forecast::titles.outcomes')           // ❌ SOLO 2 livelli!
__('forecast::labels.volume')             // ❌ SOLO 2 livelli!
__('forecast::messages.success')          // ❌ SOLO 2 livelli!
>>>>>>> .merge_file_ygh3Ky
```

---

## 📚 Translation Structure

### Level 1: Namespace
```
<<<<<<< .merge_file_eAry5S
=======
<<<<<<< .merge_file_rsi3Gt
>>>>>>> .merge_file_kCpdXV
predict::
```
Il namespace del modulo (predict, blog, user, etc.)

### Level 2: Context
```
predict::user.
predict::fields.
predict::labels.
predict::messages.
predict::titles.
predict::actions.
predict::validation.
<<<<<<< .merge_file_eAry5S
=======
=======
>>>>>>> .merge_file_kCpdXV
forecast::
```
Il namespace del modulo (forecast, blog, user, etc.)

### Level 2: Context
```
forecast::user.
forecast::fields.
forecast::labels.
forecast::messages.
forecast::titles.
forecast::actions.
forecast::validation.
>>>>>>> .merge_file_ygh3Ky
```
Il **CONTESTO** della traduzione.

### Level 3: Collection
```
<<<<<<< .merge_file_eAry5S
=======
<<<<<<< .merge_file_rsi3Gt
>>>>>>> .merge_file_kCpdXV
predict::user.fields.
predict::fields.outcome.
predict::labels.market.
predict::messages.bet.
<<<<<<< .merge_file_eAry5S
=======
=======
>>>>>>> .merge_file_kCpdXV
forecast::user.fields.
forecast::fields.outcome.
forecast::labels.market.
forecast::messages.bet.
>>>>>>> .merge_file_ygh3Ky
```
La **COLLEZIONE** di elementi.

### Level 4: Element
```
<<<<<<< .merge_file_eAry5S
predict::user.fields.first_name.
predict::fields.outcome.title.
predict::labels.market.status.
=======
<<<<<<< .merge_file_rsi3Gt
predict::user.fields.first_name.
predict::fields.outcome.title.
predict::labels.market.status.
=======
>>>>>>> .merge_file_kCpdXV
forecast::user.fields.first_name.
forecast::fields.outcome.title.
forecast::labels.market.status.
>>>>>>> .merge_file_ygh3Ky
```
L'**ELEMENTO** specifico.

### Level 5: Type
```
<<<<<<< .merge_file_eAry5S
=======
<<<<<<< .merge_file_rsi3Gt
>>>>>>> .merge_file_kCpdXV
predict::user.fields.first_name.label
predict::fields.outcome.title.label
predict::labels.market.status.label
predict::messages.bet.success.message
<<<<<<< .merge_file_eAry5S
=======
=======
>>>>>>> .merge_file_kCpdXV
forecast::user.fields.first_name.label
forecast::fields.outcome.title.label
forecast::labels.market.status.label
forecast::messages.bet.success.message
>>>>>>> .merge_file_ygh3Ky
```
Il **TIPO** (label, placeholder, helper, message, etc.)

---

## 🔍 Examples

### Correct Examples ✅

```php
// User fields
<<<<<<< .merge_file_eAry5S
=======
<<<<<<< .merge_file_rsi3Gt
>>>>>>> .merge_file_kCpdXV
__('predict::user.fields.first_name.label')
__('predict::user.fields.last_name.label')
__('predict::user.fields.email.placeholder')
__('predict::user.fields.email.helper')

// Fields
__('predict::fields.outcome.title.label')
__('predict::fields.outcome.probability.label')
__('predict::fields.predict.ends_at.label')

// Labels
__('predict::labels.market.status.label')
__('predict::labels.market.volume.label')
__('predict::labels.outcome.probability.label')

// Messages
__('predict::messages.bet.success.message')
__('predict::messages.bet.error.message')

// Titles
__('predict::titles.outcome.title.label')
__('predict::titles.market.title.label')

// Actions
__('predict::actions.bet.submit.label')
__('predict::actions.bet.cancel.label')

// Validation
__('predict::validation.outcome.required')
__('predict::validation.predict.ends_at.after')
<<<<<<< .merge_file_eAry5S
=======
=======
>>>>>>> .merge_file_kCpdXV
__('forecast::user.fields.first_name.label')
__('forecast::user.fields.last_name.label')
__('forecast::user.fields.email.placeholder')
__('forecast::user.fields.email.helper')

// Fields
__('forecast::fields.outcome.title.label')
__('forecast::fields.outcome.probability.label')
__('forecast::fields.forecast.ends_at.label')

// Labels
__('forecast::labels.market.status.label')
__('forecast::labels.market.volume.label')
__('forecast::labels.outcome.probability.label')

// Messages
__('forecast::messages.bet.success.message')
__('forecast::messages.bet.error.message')

// Titles
__('forecast::titles.outcome.title.label')
__('forecast::titles.market.title.label')

// Actions
__('forecast::actions.bet.submit.label')
__('forecast::actions.bet.cancel.label')

// Validation
__('forecast::validation.outcome.required')
__('forecast::validation.forecast.ends_at.after')
>>>>>>> .merge_file_ygh3Ky
```

### Wrong Examples ❌

```php
// ❌ MENO di 5 livelli
<<<<<<< .merge_file_eAry5S
=======
<<<<<<< .merge_file_rsi3Gt
>>>>>>> .merge_file_kCpdXV
__('predict::titles.outcomes')           // ❌ SOLO 2!
__('predict::labels.volume')             // ❌ SOLO 2!
__('predict::messages.success')          // ❌ SOLO 2!
__('predict::fields.title')              // ❌ SOLO 2!
__('predict::user.first_name')           // ❌ SOLO 2!

// ❌ SOLO 3 livelli
__('predict::fields.outcome.title')      // ❌ SOLO 3!
__('predict::labels.market.status')      // ❌ SOLO 3!
__('predict::messages.bet.success')      // ❌ SOLO 3!

// ❌ SOLO 4 livelli
__('predict::fields.outcome.title')      // ❌ SOLO 4! (manca .label)
__('predict::labels.market.status')      // ❌ SOLO 4! (manca .label)
<<<<<<< .merge_file_eAry5S
=======
=======
>>>>>>> .merge_file_kCpdXV
__('forecast::titles.outcomes')           // ❌ SOLO 2!
__('forecast::labels.volume')             // ❌ SOLO 2!
__('forecast::messages.success')          // ❌ SOLO 2!
__('forecast::fields.title')              // ❌ SOLO 2!
__('forecast::user.first_name')           // ❌ SOLO 2!

// ❌ SOLO 3 livelli
__('forecast::fields.outcome.title')      // ❌ SOLO 3!
__('forecast::labels.market.status')      // ❌ SOLO 3!
__('forecast::messages.bet.success')      // ❌ SOLO 3!

// ❌ SOLO 4 livelli
__('forecast::fields.outcome.title')      // ❌ SOLO 4! (manca .label)
__('forecast::labels.market.status')      // ❌ SOLO 4! (manca .label)
>>>>>>> .merge_file_ygh3Ky
```

---

## 🧠 The WHY (5 Levels)

### Level 1: Organization
```
<<<<<<< .merge_file_eAry5S
predict::  → Modulo Predict
=======
<<<<<<< .merge_file_rsi3Gt
predict::  → Modulo Predict
=======
>>>>>>> .merge_file_kCpdXV
forecast::  → Modulo Forecast
>>>>>>> .merge_file_ygh3Ky
blog::     → Modulo Blog
user::     → Modulo User
```
**Why**: Separare moduli diversi.

### Level 2: Context
```
fields::   → Campi database
labels::   → Etichette UI
messages:: → Messaggi
titles::   → Titoli
```
**Why**: Separare contesti diversi.

### Level 3: Collection
```
outcome::  → Collezione outcome
<<<<<<< .merge_file_eAry5S
predict::  → Collezione predict
=======
<<<<<<< .merge_file_rsi3Gt
predict::  → Collezione predict
=======
>>>>>>> .merge_file_kCpdXV
forecast::  → Collezione forecast
>>>>>>> .merge_file_ygh3Ky
market::   → Collezione market
```
**Why**: Raggruppare elementi correlati.

### Level 4: Element
```
first_name:: → Elemento first_name
title::      → Elemento title
status::     → Elemento status
```
**Why**: Identificare elemento specifico.

### Level 5: Type
```
.label      → Etichetta
.placeholder → Placeholder
.helper     → Helper text
.message    → Messaggio
```
**Why**: Specificare tipo di traduzione.

---

## 📋 Checklist

**BEFORE** committing translations:

- [ ] Contare i livelli: `namespace::context.collection.element.type`
- [ ] **ESATTAMENTE** 5 livelli (separati da `.`)
- [ ] **SEMPRE** `::` dopo namespace
- [ ] **SEMPRE** `.label` per etichette (5° livello)
- [ ] **MAI** meno di 5 livelli
- [ ] **MAI** più di 5 livelli

**IF** meno di 5 livelli → **FIX IMMEDIATE!**

---

## 🔍 How to Spot the Violation

### Red Flag 🚩

```php
// 🚩 RED FLAG: MENO di 5 livelli
<<<<<<< .merge_file_eAry5S
__('predict::titles.outcomes')      // 🚩 SOLO 2!
__('predict::labels.volume')        // 🚩 SOLO 2!
__('predict::fields.title')         // 🚩 SOLO 2!
=======
<<<<<<< .merge_file_rsi3Gt
__('predict::titles.outcomes')      // 🚩 SOLO 2!
__('predict::labels.volume')        // 🚩 SOLO 2!
__('predict::fields.title')         // 🚩 SOLO 2!
=======
>>>>>>> .merge_file_kCpdXV
__('forecast::titles.outcomes')      // 🚩 SOLO 2!
__('forecast::labels.volume')        // 🚩 SOLO 2!
__('forecast::fields.title')         // 🚩 SOLO 2!
>>>>>>> .merge_file_ygh3Ky
```

**Immediate Fix**:
```php
// ✅ CORRETTO: 5 livelli
<<<<<<< .merge_file_eAry5S
__('predict::titles.outcome.title.label')
__('predict::labels.market.volume.label')
__('predict::fields.predict.title.label')
=======
<<<<<<< .merge_file_rsi3Gt
__('predict::titles.outcome.title.label')
__('predict::labels.market.volume.label')
__('predict::fields.predict.title.label')
=======
>>>>>>> .merge_file_kCpdXV
__('forecast::titles.outcome.title.label')
__('forecast::labels.market.volume.label')
__('forecast::fields.forecast.title.label')
>>>>>>> .merge_file_ygh3Ky
```

---

## 📊 Migration Guide

### Before (Wrong) ❌

```php
// ❌ 2 livelli
<<<<<<< .merge_file_eAry5S
=======
<<<<<<< .merge_file_rsi3Gt
>>>>>>> .merge_file_kCpdXV
__('predict::titles.outcomes')
__('predict::labels.volume')
__('predict::messages.success')

// ❌ 3 livelli
__('predict::fields.outcome.title')
__('predict::labels.market.volume')

// ❌ 4 livelli
__('predict::fields.outcome.title')  // manca .label
<<<<<<< .merge_file_eAry5S
=======
=======
>>>>>>> .merge_file_kCpdXV
__('forecast::titles.outcomes')
__('forecast::labels.volume')
__('forecast::messages.success')

// ❌ 3 livelli
__('forecast::fields.outcome.title')
__('forecast::labels.market.volume')

// ❌ 4 livelli
__('forecast::fields.outcome.title')  // manca .label
>>>>>>> .merge_file_ygh3Ky
```

### After (Correct) ✅

```php
// ✅ 5 livelli
<<<<<<< .merge_file_eAry5S
=======
<<<<<<< .merge_file_rsi3Gt
>>>>>>> .merge_file_kCpdXV
__('predict::titles.outcome.title.label')
__('predict::labels.market.volume.label')
__('predict::messages.bet.success.message')

// ✅ 5 livelli
__('predict::fields.outcome.title.label')
__('predict::labels.market.volume.label')

// ✅ 5 livelli
__('predict::fields.outcome.title.label')  // aggiunto .label
<<<<<<< .merge_file_eAry5S
=======
=======
>>>>>>> .merge_file_kCpdXV
__('forecast::titles.outcome.title.label')
__('forecast::labels.market.volume.label')
__('forecast::messages.bet.success.message')

// ✅ 5 livelli
__('forecast::fields.outcome.title.label')
__('forecast::labels.market.volume.label')

// ✅ 5 livelli
__('forecast::fields.outcome.title.label')  // aggiunto .label
>>>>>>> .merge_file_ygh3Ky
```

---

## 🔗 Related Documentation

### AI Agents Docs
<<<<<<< .merge_file_eAry5S
- **[Rules Index](00-INDEX.md)** - All rules
=======
<<<<<<< .merge_file_rsi3Gt
- **[Rules Index](00-INDEX.md)** - All rules
=======
>>>>>>> .merge_file_kCpdXV
- **[Rules Index](00-index.md)** - All rules
>>>>>>> .merge_file_ygh3Ky
- **[Multi-Outcome Universal](multi-outcome-universal.md)** - Core principle
- **[Use Models Not DB::Table](use-models-not-db-table.md)** - Model usage

### Module Docs
<<<<<<< .merge_file_eAry5S
- **[Translation Structure](../../laravel/Modules/Predict/docs/translation-structure.md)** - Translation guide
- **[ADR-003 Deprecate Binary Fields](../../laravel/Modules/Predict/docs/ADR-003_DEPRECATE_BINARY_CREDIT_FIELDS.md)** - Deprecation plan
=======
<<<<<<< .merge_file_rsi3Gt
- **[Translation Structure](../../laravel/Modules/Predict/docs/translation-structure.md)** - Translation guide
- **[ADR-003 Deprecate Binary Fields](../../laravel/Modules/Predict/docs/ADR-003_DEPRECATE_BINARY_CREDIT_FIELDS.md)** - Deprecation plan
=======
>>>>>>> .merge_file_kCpdXV
- **[Translation Structure](../../laravel/Modules/Forecast/docs/translation-structure.md)** - Translation guide
- **[ADR-003 Deprecate Binary Fields](../../laravel/Modules/Forecast/docs/ADR-003_DEPRECATE_BINARY_CREDIT_FIELDS.md)** - Deprecation plan
>>>>>>> .merge_file_ygh3Ky

---

## 📝 Changelog

### 2026-03-26 - CRITICAL RULE ADDED (AGAIN!)
- ✅ Added "5 LEVELS REQUIRED" rule
- ✅ Documented 5 levels structure
- ✅ Examples (CORRECT vs WRONG)
- ✅ Migration guide
- ✅ Checklist

**NOTE**: Questa regola è stata scritta **MILLE VOLTE**.
**ORA È PERMANENTE**. **MAI PIÙ** violazioni!

---

**Maintained By**: AI Agents Team  
**Review Cycle**: Per-release  
**Next Review**: 2026-04-02  
**Enforcement**: 🔴 CRITICAL (violation = code review failure)
