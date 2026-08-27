# 🔴 TRANSLATION STRUCTURE - 5 LEVELS MANDATORY

**Path**: `.agents/docs/rules/translation-structure-5-levels-mandatory.md`  
**Last Updated**: 2026-03-26  
**Status**: ✅ CRITICAL RULE  
**Priority**: BLOCKER

---

## 🎯 The Rule

> **SEMPRE** usare traduzioni a **5 LIVELLI** con `__()`:
> `__('namespace::context.collection.element.type')`

**MAI** usare `$tx()` o traduzioni con meno di 5 livelli!

---

## ❌ WRONG Examples (NEVER DO THIS)

```blade
// ❌ SBAGLIATO: $tx() helper (VIETATO!)
<<<<<<< .merge_file_D3vAz9
=======
<<<<<<< .merge_file_qhusgj
>>>>>>> .merge_file_LrmNcN
{{ $tx('predict::labels.outcomes.title', 'Outcomes') }}
{{ $tx('predict::labels.volume', 'Volume') }}
{{ $tx('predict::messages.loading', 'Loading...') }}

// ❌ SBAGLIATO: MENO di 5 livelli
{{ __('predict::labels.volume') }}              // ❌ SOLO 2 livelli!
{{ __('predict::messages.loading') }}           // ❌ SOLO 2 livelli!
{{ __('predict::titles.order.book') }}          // ❌ SOLO 3 livelli!
{{ __('predict::labels.market.status') }}       // ❌ SOLO 3 livelli!
{{ __('predict::fields.outcome.title') }}       // ❌ SOLO 3 livelli!

// ❌ SBAGLIATO: Fallback inline
{{ __('predict::labels.volume', 'Volume') }}    // ❌ Fallback VIETATO!
<<<<<<< .merge_file_D3vAz9
=======
=======
>>>>>>> .merge_file_LrmNcN
{{ $tx('forecast::labels.outcomes.title', 'Outcomes') }}
{{ $tx('forecast::labels.volume', 'Volume') }}
{{ $tx('forecast::messages.loading', 'Loading...') }}

// ❌ SBAGLIATO: MENO di 5 livelli
{{ __('forecast::labels.volume') }}              // ❌ SOLO 2 livelli!
{{ __('forecast::messages.loading') }}           // ❌ SOLO 2 livelli!
{{ __('forecast::titles.order.book') }}          // ❌ SOLO 3 livelli!
{{ __('forecast::labels.market.status') }}       // ❌ SOLO 3 livelli!
{{ __('forecast::fields.outcome.title') }}       // ❌ SOLO 3 livelli!

// ❌ SBAGLIATO: Fallback inline
{{ __('forecast::labels.volume', 'Volume') }}    // ❌ Fallback VIETATO!
>>>>>>> .merge_file_PHXuwo
```

---

## ✅ CORRECT Examples (ALWAYS DO THIS)

```blade
// ✅ CORRETTO: 5 livelli con __()
<<<<<<< .merge_file_D3vAz9
=======
<<<<<<< .merge_file_qhusgj
>>>>>>> .merge_file_LrmNcN
{{ __('predict::labels.market.volume.label') }}
{{ __('predict::messages.bet.loading.message') }}
{{ __('predict::titles.order.book.title.label') }}
{{ __('predict::labels.market.status.label') }}
{{ __('predict::fields.outcome.title.label') }}

// ✅ CORRETTO: Strutture comuni
{{ __('predict::labels.{entity}.{attribute}.label') }}
{{ __('predict::messages.{action}.{type}.message') }}
{{ __('predict::titles.{section}.{element}.label') }}
{{ __('predict::fields.{entity}.{attribute}.label') }}
{{ __('predict::actions.{action}.{target}.label') }}
<<<<<<< .merge_file_D3vAz9
=======
=======
>>>>>>> .merge_file_LrmNcN
{{ __('forecast::labels.market.volume.label') }}
{{ __('forecast::messages.bet.loading.message') }}
{{ __('forecast::titles.order.book.title.label') }}
{{ __('forecast::labels.market.status.label') }}
{{ __('forecast::fields.outcome.title.label') }}

// ✅ CORRETTO: Strutture comuni
{{ __('forecast::labels.{entity}.{attribute}.label') }}
{{ __('forecast::messages.{action}.{type}.message') }}
{{ __('forecast::titles.{section}.{element}.label') }}
{{ __('forecast::fields.{entity}.{attribute}.label') }}
{{ __('forecast::actions.{action}.{target}.label') }}
>>>>>>> .merge_file_PHXuwo
```

---

## 📚 Translation Structure

### Level 1: Namespace
```
<<<<<<< .merge_file_qhusgj
predict::
```
Il modulo (predict, blog, user, etc.)
=======
forecast::
```
Il modulo (forecast, blog, user, etc.)
>>>>>>> .merge_file_PHXuwo

### Level 2: Context
```
labels::     → Etichette UI
messages::   → Messaggi
titles::     → Titoli
fields::     → Campi
actions::    → Azioni
validation:: → Validazioni
```

### Level 3: Collection
```
labels.market.     → Etichette mercato
messages.bet.      → Messaggi scommesse
titles.order.      → Titoli order
fields.outcome.    → Campi outcome
actions.trade.     → Azioni trade
```

### Level 4: Element
```
labels.market.volume.     → Volume mercato
messages.bet.loading.     → Caricamento scommessa
titles.order.book.        → Titolo order book
fields.outcome.title.     → Titolo outcome
actions.trade.market.     → Azione trade mercato
```

### Level 5: Type
```
labels.market.volume.label      → Etichetta volume
messages.bet.loading.message    → Messaggio caricamento
titles.order.book.title.label   → Etichetta titolo order book
fields.outcome.title.label      → Etichetta titolo outcome
actions.trade.market.label      → Etichetta azione trade
```

---

## 🔍 How to Spot the Violation

### Red Flag 🚩

```blade
// 🚩 RED FLAG: $tx() helper
<<<<<<< .merge_file_qhusgj
{{ $tx('predict::labels.volume', 'Volume') }}

// 🚩 RED FLAG: Meno di 5 livelli
{{ __('predict::labels.volume') }}
{{ __('predict::messages.loading') }}

// 🚩 RED FLAG: Fallback inline
{{ __('predict::labels.volume', 'Volume') }}
=======
{{ $tx('forecast::labels.volume', 'Volume') }}

// 🚩 RED FLAG: Meno di 5 livelli
{{ __('forecast::labels.volume') }}
{{ __('forecast::messages.loading') }}

// 🚩 RED FLAG: Fallback inline
{{ __('forecast::labels.volume', 'Volume') }}
>>>>>>> .merge_file_PHXuwo
```

**Immediate Fix**:
```blade
// ✅ CORRETTO: 5 livelli con __()
<<<<<<< .merge_file_D3vAz9
{{ __('predict::labels.market.volume.label') }}
{{ __('predict::messages.bet.loading.message') }}
=======
<<<<<<< .merge_file_qhusgj
{{ __('predict::labels.market.volume.label') }}
{{ __('predict::messages.bet.loading.message') }}
=======
>>>>>>> .merge_file_LrmNcN
{{ __('forecast::labels.market.volume.label') }}
{{ __('forecast::messages.bet.loading.message') }}
>>>>>>> .merge_file_PHXuwo
```

---

## 📋 Checklist

**BEFORE** committing blade files:

- [ ] **ZERO** `$tx()` calls
- [ ] **SOLO** `__('')` calls
- [ ] **ESATTAMENTE** 5 livelli in ogni traduzione
- [ ] **ZERO** fallback inline
- [ ] **STRUTTURA**: namespace::context.collection.element.type

**IF** violazione → **FIX IMMEDIATE!**

---

## 🔗 Related Documentation

### AI Agents Docs
<<<<<<< .merge_file_qhusgj
- **[Rules Index](00-INDEX.md)** - All rules
- **[Translation Structure](translation-structure-5-levels.md)** - Original rule

### Module Docs
- **[Translation Files](../../laravel/Modules/Predict/lang/)** - Translation files
- **[Blade Components](../../laravel/Modules/Predict/resources/views/components/)** - Blade components
=======
- **[Rules Index](00-index.md)** - All rules
- **[Translation Structure](translation-structure-5-levels.md)** - Original rule

### Module Docs
- **[Translation Files](../../laravel/Modules/Forecast/lang/)** - Translation files
- **[Blade Components](../../laravel/Modules/Forecast/resources/views/components/)** - Blade components
>>>>>>> .merge_file_PHXuwo

---

## 📝 Changelog

### 2026-03-26 - CRITICAL RULE ADDED
- ✅ Added "5 LEVELS MANDATORY" rule
- ✅ Banned $tx() helper
- ✅ Examples (CORRECT vs WRONG)
- ✅ Checklist

**NOTE**: Questa regola è **ASSOLUTA**.
**MAI** `$tx()`, **SEMPRE** `__('')` con 5 livelli.
**ORA È PERMANENTE**.

---

**Maintained By**: AI Agents Team  
**Review Cycle**: Per-release  
**Next Review**: 2026-04-02  
**Enforcement**: 🔴 CRITICAL (violation = code review failure)
