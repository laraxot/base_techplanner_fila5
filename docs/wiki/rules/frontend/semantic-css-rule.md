# 🎨 Semantic CSS Rule

**Status**: ✅ MANDATORY  
**Version**: 1.0  
**Last Updated**: 2026-03-26  
**Source**: [MaintainableCSS Chapter 2](https://maintainablecss.com/chapters/semantics/)

---

## 🎯 Core Rule

> **"Name classes based on what an element *is*, not what it *looks like*."**

**Tutte le classi CSS devono descrivere lo scopo dell'elemento, non il suo aspetto visivo.**

---

## ✅ DO - Classi Semantiche

```html
<!-- ✅ Componenti semantici -->
<div class="hero">
  <h1 class="hero-title">Heading</h1>
  <p class="hero-tagline">Tagline</p>
</div>

<div class="product">
  <div class="product-image"></div>
  <div class="product-details"></div>
  <div class="product-price"></div>
</div>

<div class="outcomes-grid">
  <x-predict.outcome-card />
</div>
```

```blade
{{-- ✅ Blade components semantici --}}
<x-hero :title="$title" :tagline="$tagline" />
<x-predict.outcomes-grid :outcomes="$outcomes" />
<x-filament-widget.outcomes-table />
```

---

## ❌ DON'T - Classi Visive/Atomiche

```html
<!-- ❌ Classi visive (Tachyons/Tailwind utilities) -->
<div class="red pull-left pb3">
<div class="grid row">
<div class="col-xs-4">
<div class="pb3 pb4-ns pt4 pt5-ns mt4 black-70 fl-l w-50-l">
```

```blade
{{-- ❌ Utility classes nei blade --}}
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
  <div class="bg-white rounded-lg shadow p-4">
    {{ $outcome->title }}
  </div>
</div>
```

---

## 📋 10 Principi Obbligatori

### 1. Naming Based on Purpose ✅
- **DO**: `.hero`, `.product`, `.basket`, `.outcomes-grid`
- **DON'T**: `.red`, `.pull-left`, `.w-50`, `.black-70`

### 2. Module Encapsulation ✅
- **DO**: `.thing`, `.thing-thingA`, `.thing-thingB`
- **DON'T**: `.grid`, `.col`, `.row` (generici)

### 3. CSS-Driven Responsiveness ✅
- **DO**: Media queries nel CSS
- **DON'T**: `.pd20 .pd50-ns .fs2 .fs3` nell'HTML

### 4. Single Responsibility ✅
- **DO**: Una classe = uno scopo
- **DON'T**: Classi che descrivono colore + layout + dimensione

### 5. Test & JS Hooks ✅
- **DO**: Classi stabili per test e JavaScript
- **DON'T**: Classi che cambiano con il layout

### 6. No Atomic/Utility Classes ✅
- **DO**: Classi semantiche custom
- **DON'T**: Tailwind utilities dirette nei blade (`.pb3`, `.w-50-l`)

### 7. Readability ✅
- **DO**: Nomi leggibili e significativi
- **DON'T**: Abbreviazioni criptiche

### 8. Maintainability ✅
- **DO**: Cambiamenti solo nel CSS
- **DON'T**: Cambiamenti nell'HTML per cambi visivi

### 9. Searchability ✅
- **DO**: Classi specifiche per search
- **DON'T**: Classi generiche con migliaia di match

### 10. Performance ✅
- **DO**: HTML footprint piccolo
- **DON'T**: HTML con decine di classi utility

---

## 🔧 Application to Laraxot

### Blade Components

```blade
{{-- ✅ CORRETTO --}}
@props(['outcomes'])

<div class="outcomes-grid">
  @foreach($outcomes as $outcome)
    <x-predict.outcome-card :outcome="$outcome" />
  @endforeach
</div>

{{-- ❌ SBAGLIATO --}}
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
  @foreach($outcomes as $outcome)
    <div class="bg-white rounded-lg shadow p-4">
      {{ $outcome->title }}
    </div>
  @endforeach
</div>
```

### Filament Widgets

```php
// ✅ CORRETTO: Filament Table Widget (Rule 005)
class OutcomesTableWidget extends XotBaseTableWidget
{
    public function table(Table $table): Table
    {
        return $table->searchable()->filters([...])->columns([...]);
    }
}

// ❌ SBAGLIATO: Custom Blade con utility classes
```

---

## 🚨 Violations Examples

### Violation 1: Visual Naming
```html
<!-- ❌ VIOLATION -->
<div class="black-70 pull-left w-50-l">

<!-- ✅ FIX -->
<div class="hero">
```

### Violation 2: Atomic Classes
```html
<!-- ❌ VIOLATION -->
<div class="pd20 pd50-ns fs2 fs3">

<!-- ✅ FIX -->
<div class="product-card">
```

### Violation 3: Responsive in HTML
```html
<!-- ❌ VIOLATION -->
<div class="pb3 pb4-ns pt4 pt5-ns">

<!-- ✅ FIX -->
<div class="hero">
/* CSS: .hero { padding: 1rem; } @media (min-width: 768px) { .hero { padding: 2rem; } } */
```

---

## 📊 Benefits

| Benefit | Semantic CSS | Atomic CSS |
|---------|--------------|------------|
| **Maintainability** | ✅ CSS-only updates | ❌ HTML + CSS updates |
| **Readability** | ✅ High | ❌ Low |
| **Performance** | ✅ Small HTML | ❌ Large HTML |
| **Debugging** | ✅ Easy | ❌ Hard |
| **Testing** | ✅ Stable hooks | ❌ Fragile hooks |

---

## 📚 Related Documents

- [Semantic CSS Principles](../../../Modules/Predict/docs/SEMANTIC_CSS_PRINCIPLES.md)
- [Rule 005: Filament Table for Lists](./005-filament-table-for-lists.md)
- [Blade Minimal Logic](../../../Modules/Predict/docs/BLADE_MINIMAL_LOGIC_BEST_PRACTICES.md)
- [Component-First Architecture](../../../Modules/Predict/docs/PHILOSOPHY_AND_VISION.md)

---

## ✅ Enforcement Checklist

- [ ] **Code Review**: Verifica classi semantiche
- [ ] **Linting**: Configura regole per utility classes
- [ ] **Documentation**: Aggiungi esempi ai docs
- [ ] **Training**: Condividi con il team

---

**Maintained By**: AI Agents Team  
**Last Review**: 2026-03-26  
**Next Review**: 2026-04-26  
**Enforcement**: MANDATORY
