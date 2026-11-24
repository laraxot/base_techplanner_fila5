---
title: "qwen critical rules"
type: note
tags: [documentation]
created: 2026-09-26
updated: 2026-11-23
qmd: "qwen critical rules"
issues: []
discussions: []
---

# QWEN Critical Rules

Regole critiche del progetto Base Predict.
Regole critiche del progetto Base Forecast.

<<<<<<< .merge_file_yEWWnU
=======
---
<<<<<<< .merge_file_8X6l3P
=======

title: "qwen critical rules"
type: note
tags: [documentation]
created: 2026-09-26
updated: 2026-09-26
qmd: "qwen critical rules"
issues: []
discussions: []
## 🔴 REGOLA 1: FILAMENT WIDGETS FOR LISTS
>>>>>>> .merge_file_tsHwzA

title: "qwen critical rules"
type: note
tags: [documentation]
created: 2026-09-26
updated: 2026-09-26
qmd: "qwen critical rules"
issues: []
discussions: []
>>>>>>> .merge_file_cojruM
## 🔴 REGOLA 1: FILAMENT WIDGETS FOR LISTS
### Principio Core
### ❌ MAI Fare
### ✅ SEMPRE Fare
### Feature Automatiche

## 🔴 REGOLA 2: COMPOSER DEPENDENCY ARCHITECTURE

### Root composer.json = SOLO Core Infrastructure

```json
{
  "require": {
    "php": "^8.2",
    "filament/filament": "^5.0",
    "laravel/framework": "^12.0",
    "livewire/livewire": "^3.0 || ^4.0",
    "nwidart/laravel-modules": "*",
    "wikimedia/composer-merge-plugin": "^2.1"
  }
}
```

### Best Practices

1. **Versioni Esplicite**: `^13.0`, MAI `*`
2. **Merge Plugin**: Unisce automaticamente i moduli
3. **Service Providers**: Dichiarare in `extra.laravel.providers`
4. **Autoload PSR-4**: Ogni modulo gestisce il proprio

---

## 🔴 REGOLA 3: ROUTING MULTILINGUA

### Homepage & Link

```blade
{{-- ✅ CORRETTO --}}
<x-page side="content" slug="home" />

{{-- ❌ SBAGLIATO --}}
@include('pub_theme::home')
```

### Link Localizzati

```blade
{{-- ✅ CORRETTO --}}
<a href="{{ url(app()->getLocale().'/forecasts') }}">Mercati</a>

{{-- ❌ SBAGLIATO --}}
<a href="/forecasts">Mercati</a>
```

---

## 🔴 REGOLA 4: NEVER POLLUTE CONTAINER BLADE

**File**: `Themes/TwentyOne/resources/views/pages/[container0]/[slug0]/index.blade.php`

### ❌ MAI Fare

```php
// In generic container blade
public function getMarketData(): array { ... }
public function loadPriceHistory(): array { ... }
public function buildOrderBook(): array { ... }
```

### ✅ CORRETTO

La logica specifica va in:
1. **Filament Widgets**: `Modules/Predict/Filament/Widgets/`
2. **Actions**: `Modules/Predict/Actions/`
3. **CMS Blocks**: `Modules/Predict/resources/views/components/blocks/`
1. **Filament Widgets**: `Modules/Forecast/Filament/Widgets/`
2. **Actions**: `Modules/Forecast/Actions/`
3. **CMS Blocks**: `Modules/Forecast/resources/views/components/blocks/`

---

## 🔴 REGOLA 5: Translation Structure

**Tutte le traduzioni DEVONO avere 5 elementi**:

```
namespace::context.collection.element.type
```

```blade
✅ __('predict::user.fields.first_name.label')
❌ __('predict::fields.key')  // Missing type!
✅ __('forecast::user.fields.first_name.label')
❌ __('forecast::fields.key')  // Missing type!
```

---

## 🔗 Link

- [Indice QWEN](./qwen-split-index.md)
- [critical-rules.md](./critical-rules.md)
<<<<<<< .merge_file_8X6l3P
<<<<<<< .merge_file_yEWWnU
- [QWEN.md originale](../../qwen.md)
=======
- [qwen.md originale](../../qwen.md)
>>>>>>> .merge_file_cojruM
=======
- [qwen.md originale](../../qwen.md)
>>>>>>> .merge_file_tsHwzA
- [Index principale](./index.md)
