---
title: "🏛️ Architecture Zen Philosophy"
type: concept
tags: [architecture, zen]
created: 2026-07-14
updated: 2026-07-14
qmd: "03-architecture-zen 🏛️ architecture zen philosophy"
issues: ["https://github.com/provtv/base_ptv_fila5/issues/124"]
discussions: ["https://github.com/provtv/base_ptv_fila5/discussions/1"]
related:
  - "./00-index.md"
  - "./01-gsd-workflow.md"
  - "./02-bmad-workflow.md"
  - "./04-filament-philosophy.md"
  - "./05-front-office-audit.md"
  - "./06-cinematic-effects.md"
  - "./07-mcp-tailwind-ui.md"
  - "./08-verified-commit-governance.md"
---

# 🏛️ Architecture Zen Philosophy

**Part of**: [00-index-1.md](00-index-1.md) — AI Agents Coordination  
**Related**: [04-filament-philosophy.md](04-filament-philosophy.md) — Filament Widgets

---

## 🔴 Fundamental Rules

### 1. **NO Themes/*/Http/Livewire/**

**Philosophy**: Theme is the DRESS, not the LOGIC.

```
❌ WRONG
Themes/TwentyOne/Http/Livewire/
Themes/Sixteen/Http/Livewire/

✅ CORRECT
<<<<<<< .merge_file_Om8m95
Modules/Predict/app/Filament/Widgets/
=======
<<<<<<< .merge_file_GwcBF1
Modules/Predict/app/Filament/Widgets/
=======
>>>>>>> .merge_file_JX9Ijy
Modules/Forecast/app/Filament/Widgets/
>>>>>>> .merge_file_iUcyM6
Modules/UI/app/Filament/Widgets/
```

**Why**:
- **Modules** = Business logic (agnostic, reusable)
- **Themes** = Dress (aesthetics, layout, CSS)
- **Filament Widgets** = UI components (back office + front office)
- **NO Livewire in theme** = Separation of concerns

---

### 2. **NO laravel/docs/**

**Philosophy**: Documentation distributed, close to code.

```
❌ WRONG
laravel/docs/
  ├── COMPOSER_RULE.md
  └── FILAMENT_RULE.md

✅ CORRECT
docs/                          # Only CROSS-MODULE documents
  ├── ARCHITECTURE_ZEN.md
  └── MULTI_AGENT_COORDINATION.md

<<<<<<< .merge_file_Om8m95
Modules/Predict/docs/          # Predict-specific docs
=======
<<<<<<< .merge_file_GwcBF1
Modules/Predict/docs/          # Predict-specific docs
=======
>>>>>>> .merge_file_JX9Ijy
Modules/Forecast/docs/          # Forecast-specific docs
>>>>>>> .merge_file_iUcyM6
  ├── PHILOSOPHY.md
  ├── WIDGETS.md
  └── SEEDERS.md

Themes/TwentyOne/docs/         # Theme-specific docs
  ├── DESIGN_SYSTEM.md
  └── KINETIC_WEB_DESIGN.md
```

**Why**:
- **Documentation close to code** = Easier to maintain
- **docs/ root** = Only cross-module documents
- **Module docs** = Module-specific documentation
- **Theme docs** = Theme-specific design system

---

### 3. **NO foreach in blade for lists**

**Philosophy**: Filament Tables does everything.

```blade
❌ WRONG
<<<<<<< .merge_file_GwcBF1
@foreach($predicts as $predict)
    <div class="card">{{ $predict->title }}</div>
@endforeach

✅ CORRECT
<x-page side="content" slug="predicts.index" />

// JSON: predicts.index.json
{
  "type": "widget",
  "data": {
    "view": "pub_theme::filament.widgets.predict-table",
    "widget": "Modules\\Predict\\Filament\\Widgets\\PredictTableWidget"
=======
@foreach($forecasts as $forecast)
    <div class="card">{{ $forecast->title }}</div>
@endforeach

✅ CORRECT
<x-page side="content" slug="forecasts.index" />

// JSON: forecasts.index.json
{
  "type": "widget",
  "data": {
    "view": "pub_theme::filament.widgets.forecast-table",
    "widget": "Modules\\Forecast\\Filament\\Widgets\\ForecastTableWidget"
>>>>>>> .merge_file_iUcyM6
  }
}
```

**Why**:
- **Filament Table** = Search, filters, sorting, pagination (automatic)
- **NO foreach** = NO logic in blade
- **Widget** = Reusable, testable, maintainable

---

### 4. **NO Blade Logic**

**Philosophy**: Blade is presentation only.

```blade
❌ WRONG
@php
<<<<<<< .merge_file_Om8m95
    $probability = $predict->transactions()->sum('amount');
    $participants = $predict->transactions()->distinct('user_id')->count();
=======
<<<<<<< .merge_file_GwcBF1
    $probability = $predict->transactions()->sum('amount');
    $participants = $predict->transactions()->distinct('user_id')->count();
=======
>>>>>>> .merge_file_JX9Ijy
    $probability = $forecast->transactions()->sum('amount');
    $participants = $forecast->transactions()->distinct('user_id')->count();
>>>>>>> .merge_file_iUcyM6
@endphp

✅ CORRECT
// Action class
<<<<<<< .merge_file_Om8m95
=======
<<<<<<< .merge_file_GwcBF1
>>>>>>> .merge_file_JX9Ijy
class CalculatePredictStatsAction {
    public function execute(Predict $predict): array {
        return [
            'probability' => $predict->transactions()->sum('amount'),
            'participants' => $predict->transactions()->distinct('user_id')->count(),
<<<<<<< .merge_file_Om8m95
=======
=======
>>>>>>> .merge_file_JX9Ijy
class CalculateForecastStatsAction {
    public function execute(Forecast $forecast): array {
        return [
            'probability' => $forecast->transactions()->sum('amount'),
            'participants' => $forecast->transactions()->distinct('user_id')->count(),
>>>>>>> .merge_file_iUcyM6
        ];
    }
}

// Blade
{{ $stats['probability'] }}
```

**Why**:
- **Blade** = Presentation only (HTML, CSS classes)
- **Actions** = Business logic
- **Components** = Complex presentation logic

---

## 🧠 Zen Philosophy

### Theme is the Dress

> **"Module is the body, theme is the dress"**

**Module (Body)**:
- ✅ Business logic
- ✅ Data models
- ✅ Filament Widgets
- ✅ Actions, Services
- ✅ Seeders, Migrations

**Theme (Clothing)**:
- ✅ Layout (app.blade.php)
- ✅ CSS (Tailwind)
- ✅ Aesthetic components
- ✅ Folio pages (routing)
- ❌ NO business logic
- ❌ NO Livewire
- ❌ NO Models

---

### Filament Widgets are Universal

> **"One widget for all themes"**

```
<<<<<<< .merge_file_Om8m95
=======
<<<<<<< .merge_file_GwcBF1
>>>>>>> .merge_file_JX9Ijy
Modules/Predict/app/Filament/Widgets/PredictTableWidget.php
    ↓
pub_theme::filament.widgets.predict-table (view namespace)
    ↓
Themes/TwentyOne/resources/views/filament/widgets/predict-table.blade.php
<<<<<<< .merge_file_Om8m95
=======
=======
>>>>>>> .merge_file_JX9Ijy
Modules/Forecast/app/Filament/Widgets/ForecastTableWidget.php
    ↓
pub_theme::filament.widgets.forecast-table (view namespace)
    ↓
Themes/TwentyOne/resources/views/filament/widgets/forecast-table.blade.php
>>>>>>> .merge_file_iUcyM6
```

**Benefits**:
- ✅ Widget written ONCE
- ✅ Used in ALL themes
- ✅ Theme customizes only view
- ✅ Logic ALWAYS in module

---

### Documentation is Treasure Map

> **"Documentation close to code = Treasure found"**

```
<<<<<<< .merge_file_Om8m95
Modules/Predict/
=======
<<<<<<< .merge_file_GwcBF1
Modules/Predict/
=======
>>>>>>> .merge_file_JX9Ijy
Modules/Forecast/
>>>>>>> .merge_file_iUcyM6
├── app/
│   ├── Models/
│   ├── Filament/
│   └── Actions/
<<<<<<< .merge_file_Om8m95
├── docs/              ← Treasure map of Predict
=======
<<<<<<< .merge_file_GwcBF1
├── docs/              ← Treasure map of Predict
=======
>>>>>>> .merge_file_JX9Ijy
├── docs/              ← Treasure map of Forecast
>>>>>>> .merge_file_iUcyM6
│   ├── PHILOSOPHY.md
│   ├── WIDGETS.md
│   └── SEEDERS.md
└── database/
    └── seeders/
```

**Rule**:
- **docs/ root** = Only cross-module documents
- **Module docs** = Module-specific
- **Theme docs** = Design system, CSS

---

## 🚨 Common Mistakes

### 1. ❌ Livewire in Theme

```
Themes/TwentyOne/Http/Livewire/
```

**✅ CORRECT**:
```
<<<<<<< .merge_file_Om8m95
Modules/Predict/app/Filament/Widgets/
=======
<<<<<<< .merge_file_GwcBF1
Modules/Predict/app/Filament/Widgets/
=======
>>>>>>> .merge_file_JX9Ijy
Modules/Forecast/app/Filament/Widgets/
>>>>>>> .merge_file_iUcyM6
```

---

### 2. ❌ Documentation in root

```
laravel/docs/
  └── FILAMENT_RULE.md
```

**✅ CORRECT**:
```
docs/
  └── ARCHITECTURE_ZEN.md

<<<<<<< .merge_file_Om8m95
Modules/Predict/docs/
=======
<<<<<<< .merge_file_GwcBF1
Modules/Predict/docs/
=======
>>>>>>> .merge_file_JX9Ijy
Modules/Forecast/docs/
>>>>>>> .merge_file_iUcyM6
  └── WIDGETS.md
```

---

### 3. ❌ Foreach in blade

```blade
<<<<<<< .merge_file_Om8m95
@foreach($predicts as $predict)
    <x-predict.card :predict="$predict"/>
=======
<<<<<<< .merge_file_GwcBF1
@foreach($predicts as $predict)
    <x-predict.card :predict="$predict"/>
=======
>>>>>>> .merge_file_JX9Ijy
@foreach($forecasts as $forecast)
    <x-forecast.card :forecast="$forecast"/>
>>>>>>> .merge_file_iUcyM6
@endforeach
```

**✅ CORRECT**:
```blade
<<<<<<< .merge_file_Om8m95
<x-page side="content" slug="predicts.index" />
=======
<<<<<<< .merge_file_GwcBF1
<x-page side="content" slug="predicts.index" />
=======
>>>>>>> .merge_file_JX9Ijy
<x-page side="content" slug="forecasts.index" />
>>>>>>> .merge_file_iUcyM6

// JSON
{
  "type": "widget",
<<<<<<< .merge_file_Om8m95
  "widget": "Modules\\Predict\\Filament\\Widgets\\PredictTableWidget"
=======
<<<<<<< .merge_file_GwcBF1
  "widget": "Modules\\Predict\\Filament\\Widgets\\PredictTableWidget"
=======
>>>>>>> .merge_file_JX9Ijy
  "widget": "Modules\\Forecast\\Filament\\Widgets\\ForecastTableWidget"
>>>>>>> .merge_file_iUcyM6
}
```

---

### 4. ❌ Logic in blade

```blade
@php
<<<<<<< .merge_file_Om8m95
    $volume = $predict->transactions()->sum('amount');
=======
<<<<<<< .merge_file_GwcBF1
    $volume = $predict->transactions()->sum('amount');
=======
>>>>>>> .merge_file_JX9Ijy
    $volume = $forecast->transactions()->sum('amount');
>>>>>>> .merge_file_iUcyM6
@endphp
```

**✅ CORRECT**:
```php
// Action
class CalculateVolumeAction {
<<<<<<< .merge_file_Om8m95
    public function execute(Predict $predict) {
        return $predict->transactions()->sum('amount');
=======
<<<<<<< .merge_file_GwcBF1
    public function execute(Predict $predict) {
        return $predict->transactions()->sum('amount');
=======
>>>>>>> .merge_file_JX9Ijy
    public function execute(Forecast $forecast) {
        return $forecast->transactions()->sum('amount');
>>>>>>> .merge_file_iUcyM6
    }
}

// Blade
{{ $volume }}
```

---

## ✅ Code Review Checklist

Before committing:

### Architecture
- [ ] ✅ NO `Themes/*/Http/Livewire/`
- [ ] ✅ Widgets in `Modules/*/Filament/Widgets/`
- [ ] ✅ NO `laravel/docs/` (use `docs/` or `Modules/*/docs/`)
- [ ] ✅ NO foreach in blade for lists (use Filament Table)
- [ ] ✅ NO logic in blade (use Actions)

### Documentation
- [ ] ✅ Documentation close to code
- [ ] ✅ docs/ root = only cross-module
- [ ] ✅ Module docs = module-specific
- [ ] ✅ Theme docs = design system, CSS

### Enforcement
- [ ] ✅ PHPStan: NO errors
- [ ] ✅ PHPMD: NO warnings
- [ ] ✅ Code Review: Architecture check
- [ ] ✅ Pre-commit hook: Architecture validation

---

## 🔗 Related Documentation

- **Filament Philosophy**: [04-filament-philosophy.md](04-filament-philosophy.md)
- **Front Office Audit**: [05-front-office-audit.md](05-front-office-audit.md)
- **External**: https://github.com/nWidart/laravel-modules

---

**Last Updated**: 2026-03-20  
**Status**: ✅ Mandatory  
**Enforcement**: PHPStan + Code Review + Pre-commit Hook
<<<<<<< .merge_file_GwcBF1
=======

---

<!-- Merged from 03-ARCHITECTURE-ZEN.md, which collided with this file on case-insensitive filesystems. -->

# 🏛️ Architecture Zen Philosophy

**Part of**: [00-index.md](00-index.md) — AI Agents Coordination  
**Related**: [04-FILAMENT-PHILOSOPHY.md](04-filament-philosophy.md) — Filament Widgets

---

## 🔴 Fundamental Rules

### 1. **NO Themes/*/Http/Livewire/**

**Philosophy**: Theme is the DRESS, not the LOGIC.

```
❌ WRONG
Themes/TwentyOne/Http/Livewire/
Themes/Sixteen/Http/Livewire/

✅ CORRECT
Modules/Forecast/app/Filament/Widgets/
Modules/UI/app/Filament/Widgets/
```

**Why**:
- **Modules** = Business logic (agnostic, reusable)
- **Themes** = Dress (aesthetics, layout, CSS)
- **Filament Widgets** = UI components (back office + front office)
- **NO Livewire in theme** = Separation of concerns

---

### 2. **NO laravel/docs/**

**Philosophy**: Documentation distributed, close to code.

```
❌ WRONG
laravel/docs/
  ├── COMPOSER_RULE.md
  └── FILAMENT_RULE.md

✅ CORRECT
docs/                          # Only CROSS-MODULE documents
  ├── ARCHITECTURE_ZEN.md
  └── MULTI_AGENT_COORDINATION.md

Modules/Forecast/docs/          # Forecast-specific docs
  ├── PHILOSOPHY.md
  ├── WIDGETS.md
  └── SEEDERS.md

Themes/TwentyOne/docs/         # Theme-specific docs
  ├── DESIGN_SYSTEM.md
  └── KINETIC_WEB_DESIGN.md
```

**Why**:
- **Documentation close to code** = Easier to maintain
- **docs/ root** = Only cross-module documents
- **Module docs** = Module-specific documentation
- **Theme docs** = Theme-specific design system

---

### 3. **NO foreach in blade for lists**

**Philosophy**: Filament Tables does everything.

```blade
❌ WRONG
@foreach($forecasts as $forecast)
    <div class="card">{{ $forecast->title }}</div>
@endforeach

✅ CORRECT
<x-page side="content" slug="forecasts.index" />

// JSON: forecasts.index.json
{
  "type": "widget",
  "data": {
    "view": "pub_theme::filament.widgets.forecast-table",
    "widget": "Modules\\Forecast\\Filament\\Widgets\\ForecastTableWidget"
  }
}
```

**Why**:
- **Filament Table** = Search, filters, sorting, pagination (automatic)
- **NO foreach** = NO logic in blade
- **Widget** = Reusable, testable, maintainable

---

### 4. **NO Blade Logic**

**Philosophy**: Blade is presentation only.

```blade
❌ WRONG
@php
    $probability = $forecast->transactions()->sum('amount');
    $participants = $forecast->transactions()->distinct('user_id')->count();
@endphp

✅ CORRECT
// Action class
class CalculateForecastStatsAction {
    public function execute(Forecast $forecast): array {
        return [
            'probability' => $forecast->transactions()->sum('amount'),
            'participants' => $forecast->transactions()->distinct('user_id')->count(),
        ];
    }
}

// Blade
{{ $stats['probability'] }}
```

**Why**:
- **Blade** = Presentation only (HTML, CSS classes)
- **Actions** = Business logic
- **Components** = Complex presentation logic

---

## 🧠 Zen Philosophy

### Theme is the Dress

> **"Module is the body, theme is the dress"**

**Module (Body)**:
- ✅ Business logic
- ✅ Data models
- ✅ Filament Widgets
- ✅ Actions, Services
- ✅ Seeders, Migrations

**Theme (Clothing)**:
- ✅ Layout (app.blade.php)
- ✅ CSS (Tailwind)
- ✅ Aesthetic components
- ✅ Folio pages (routing)
- ❌ NO business logic
- ❌ NO Livewire
- ❌ NO Models

---

### Filament Widgets are Universal

> **"One widget for all themes"**

```
Modules/Forecast/app/Filament/Widgets/ForecastTableWidget.php
    ↓
pub_theme::filament.widgets.forecast-table (view namespace)
    ↓
Themes/TwentyOne/resources/views/filament/widgets/forecast-table.blade.php
```

**Benefits**:
- ✅ Widget written ONCE
- ✅ Used in ALL themes
- ✅ Theme customizes only view
- ✅ Logic ALWAYS in module

---

### Documentation is Treasure Map

> **"Documentation close to code = Treasure found"**

```
Modules/Forecast/
├── app/
│   ├── Models/
│   ├── Filament/
│   └── Actions/
├── docs/              ← Treasure map of Forecast
│   ├── PHILOSOPHY.md
│   ├── WIDGETS.md
│   └── SEEDERS.md
└── database/
    └── seeders/
```

**Rule**:
- **docs/ root** = Only cross-module documents
- **Module docs** = Module-specific
- **Theme docs** = Design system, CSS

---

## 🚨 Common Mistakes

### 1. ❌ Livewire in Theme

```
Themes/TwentyOne/Http/Livewire/
```

**✅ CORRECT**:
```
Modules/Forecast/app/Filament/Widgets/
```

---

### 2. ❌ Documentation in root

```
laravel/docs/
  └── FILAMENT_RULE.md
```

**✅ CORRECT**:
```
docs/
  └── ARCHITECTURE_ZEN.md

Modules/Forecast/docs/
  └── WIDGETS.md
```

---

### 3. ❌ Foreach in blade

```blade
@foreach($forecasts as $forecast)
    <x-forecast.card :forecast="$forecast"/>
@endforeach
```

**✅ CORRECT**:
```blade
<x-page side="content" slug="forecasts.index" />

// JSON
{
  "type": "widget",
  "widget": "Modules\\Forecast\\Filament\\Widgets\\ForecastTableWidget"
}
```

---

### 4. ❌ Logic in blade

```blade
@php
    $volume = $forecast->transactions()->sum('amount');
@endphp
```

**✅ CORRECT**:
```php
// Action
class CalculateVolumeAction {
    public function execute(Forecast $forecast) {
        return $forecast->transactions()->sum('amount');
    }
}

// Blade
{{ $volume }}
```

---

## ✅ Code Review Checklist

Before committing:

### Architecture
- [ ] ✅ NO `Themes/*/Http/Livewire/`
- [ ] ✅ Widgets in `Modules/*/Filament/Widgets/`
- [ ] ✅ NO `laravel/docs/` (use `docs/` or `Modules/*/docs/`)
- [ ] ✅ NO foreach in blade for lists (use Filament Table)
- [ ] ✅ NO logic in blade (use Actions)

### Documentation
- [ ] ✅ Documentation close to code
- [ ] ✅ docs/ root = only cross-module
- [ ] ✅ Module docs = module-specific
- [ ] ✅ Theme docs = design system, CSS

### Enforcement
- [ ] ✅ PHPStan: NO errors
- [ ] ✅ PHPMD: NO warnings
- [ ] ✅ Code Review: Architecture check
- [ ] ✅ Pre-commit hook: Architecture validation

---

## 🔗 Related Documentation

- **Filament Philosophy**: [04-FILAMENT-PHILOSOPHY.md](04-filament-philosophy.md)
- **Front Office Audit**: [05-FRONT-OFFICE-AUDIT.md](05-front-office-audit.md)
- **External**: https://github.com/nWidart/laravel-modules

---

**Last Updated**: 2026-03-20  
**Status**: ✅ Mandatory  
**Enforcement**: PHPStan + Code Review + Pre-commit Hook
>>>>>>> .merge_file_iUcyM6
