# 🎨 Semantic HTML & CSS Rule

**Status**: ✅ MANDATORY  
**Version**: 2.0 (Expanded)  
**Last Updated**: 2026-03-26  
**Sources**:  
- [MaintainableCSS - Semantics](https://maintainablecss.com/chapters/semantics/)
- [W3Schools - HTML5 Semantics](https://www.w3schools.com/Html/html5_semantic_elements.asp)
- [CSS-Tricks - Semantic Names](https://css-tricks.com/semantic-class-names/)
- [Rob Dodson - CSS Semantics](https://robdodson.me/posts/css-semantics/)

---

## 🎯 Core Rule

> **"Use semantic HTML elements to describe content meaning. Name CSS classes based on what an element *is*, not what it *looks like*."**

**Two Pillars**:
1. **Semantic HTML**: Use `<article>`, `<nav>`, `<main>`, `<header>`, `<footer>` instead of `<div>`
2. **Semantic CSS**: Use `.hero`, `.product` instead of `.blue`, `.left`

---

## 📋 Part 1: Semantic HTML5 Elements

### ✅ DO - Use Semantic Elements

```html
<!-- ✅ Structural semantics -->
<header>
  <nav aria-label="Main navigation">
    <ul>...</ul>
  </nav>
</header>

<main>
  <article>
    <header>
      <h1>Title</h1>
      <time datetime="2026-03-26">March 26, 2026</time>
    </header>
    
    <section>
      <h2>Section</h2>
      <p>Content...</p>
    </section>
    
    <aside>Related content</aside>
    
    <footer>Author info</footer>
  </article>
</main>

<footer>Copyright</footer>
```

### ❌ DON'T - Div Soup

```html
<!-- ❌ Non-semantic div soup -->
<div id="header">
  <div id="nav">
    <div class="nav-item">Home</div>
  </div>
</div>

<div id="main">
  <div class="article">
    <div class="title">Title</div>
    <div class="content">...</div>
  </div>
</div>

<div id="footer">
  <div class="copyright">© 2026</div>
</div>
```

### Key Elements Table

| Element | Usage | Don't Use For |
|---------|-------|---------------|
| `<header>` | Introductory content, navigational links | Generic container |
| `<nav>` | **Major** navigation blocks | All link groups |
| `<main>` | Main content (unique to page) | Sidebars, headers, footers |
| `<article>` | Independent, distributable content | Dependent content |
| `<section>` | Thematic grouping with heading | Generic wrapper |
| `<aside>` | Indirectly related content | Main content |
| `<footer>` | Document/section footer | Generic bottom area |

---

## 📋 Part 2: Semantic CSS Class Names

### ✅ DO - Purpose-Based Naming

```html
<!-- ✅ Describes purpose -->
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

### ❌ DON'T - Visual/Atomic Classes

```html
<!-- ❌ Presentational names -->
<div class="blue-gradient">
  <h1 class="big-white-text">Heading</h1>
  <p class="small-gray-text">Tagline</p>
</div>

<!-- ❌ Directional names -->
<div class="left-column">
  <div class="right-sidebar"></div>
</div>

<!-- ❌ Layout-specific -->
<div class="grid-12">
  <div class="span4"></div>
</div>

<!-- ❌ Utility classes (Tachyons/Tailwind) -->
<div class="red pull-left pb3">
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

## 📋 12 Principi Obbligatori

### HTML Semantics (1-4)

### 1. Use Semantic Elements ✅
- **DO**: `<header>`, `<nav>`, `<main>`, `<article>`, `<section>`, `<aside>`, `<footer>`
- **DON'T**: `<div id="header">`, `<div class="nav">`

### 2. Proper Nesting ✅
- **DO**: `<article>` can have its own `<header>` and `<footer>`
- **DON'T**: `<header>` inside `<footer>` or `<address>`

### 3. Accessibility Attributes ✅
- **DO**: Add `aria-label` to `<nav>`, `aria-labelledby` to sections
- **DON'T**: Rely only on visual structure

### 4. Time Formatting ✅
- **DO**: `<time datetime="2026-03-26">March 26, 2026</time>`
- **DON'T**: Plain text dates

### CSS Semantics (5-12)

### 5. Naming Based on Purpose ✅
- **DO**: `.hero`, `.product`, `.basket`, `.outcomes-grid`
- **DON'T**: `.red`, `.pull-left`, `.w-50`, `.black-70`

### 6. Module Encapsulation ✅
- **DO**: `.thing`, `.thing-thingA`, `.thing-thingB`
- **DON'T**: `.grid`, `.col`, `.row` (generici)

### 7. CSS-Driven Responsiveness ✅
- **DO**: Media queries nel CSS
- **DON'T**: `.pd20 .pd50-ns .fs2 .fs3` nell'HTML

### 8. Single Responsibility ✅
- **DO**: Una classe = uno scopo
- **DON'T**: Classi che descrivono colore + layout + dimensione

### 9. Test & JS Hooks ✅
- **DO**: Classi stabili per test e JavaScript
- **DON'T**: Classi che cambiano con il layout

### 10. No Atomic/Utility Classes ✅
- **DO**: Classi semantiche custom
- **DON'T**: Tailwind utilities dirette nei blade (`.pb3`, `.w-50-l`)

### 11. Readability ✅
- **DO**: Nomi leggibili e significativi
- **DON'T**: Abbreviazioni criptiche

### 12. Maintainability ✅
- **DO**: Cambiamenti solo nel CSS
- **DON'T**: Cambiamenti nell'HTML per cambi visivi

---

## 🚨 Violations & Fixes

### Violation 1: Non-Semantic HTML

```html
<!-- ❌ VIOLATION: Div soup -->
<div class="header">
  <div class="nav">
    <div class="nav-item">Home</div>
  </div>
</div>

<!-- ✅ FIX: Semantic HTML -->
<header>
  <nav aria-label="Main navigation">
    <ul>
      <li><a href="/">Home</a></li>
    </ul>
  </nav>
</header>
```

### Violation 2: Presentational Class Names

```html
<!-- ❌ VIOLATION: Visual naming -->
<div class="blue-bg large-text">

<!-- ✅ FIX: Semantic naming -->
<div class="hero">
/* CSS: .hero { background: blue; font-size: 1.5rem; } */
```

### Violation 3: Directional Names

```html
<!-- ❌ VIOLATION: Directional -->
<div class="left-column">
  <div class="right-sidebar">

<!-- ✅ FIX: Semantic -->
<div class="primary-content">
  <aside class="sidebar">
```

### Violation 4: Overusing `<nav>`

```html
<!-- ❌ VIOLATION: All links in nav -->
<nav>
  <a href="/prev">Previous</a>
  <a href="/next">Next</a>
</nav>

<!-- ✅ FIX: Only major navigation -->
<nav aria-label="Main navigation">
  <ul>
    <li><a href="/">Home</a></li>
    <li><a href="/about">About</a></li>
  </ul>
</nav>
```

### Violation 5: Utility Classes in Blade

```blade
{{-- ❌ VIOLATION: Tailwind utilities --}}
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
  @foreach($outcomes as $outcome)
    <div class="bg-white rounded-lg shadow p-4">
      {{ $outcome->title }}
    </div>
  @endforeach
</div>

{{-- ✅ FIX: Semantic component --}}
<div class="outcomes-grid">
  @foreach($outcomes as $outcome)
    <x-predict.outcome-card :outcome="$outcome" />
  @endforeach
</div>
```

---

## ✅ Enforcement Checklist

### HTML Semantics

- [ ] **Use semantic elements**: `<header>`, `<nav>`, `<main>`, `<article>`, `<section>`, `<aside>`, `<footer>`
- [ ] **Avoid div soup**: Replace generic `<div>` with semantic elements
- [ ] **Proper nesting**: `<article>` can have its own `<header>` and `<footer>`
- [ ] **Accessibility**: Add `aria-label` where appropriate
- [ ] **Time formatting**: Use `<time datetime="...">`
- [ ] **Major nav only**: `<nav>` only for major navigation blocks

### CSS Semantics

- [ ] **Purpose-based naming**: `.hero`, `.product`, `.outcomes-grid`
- [ ] **No colors in names**: Avoid `.blue`, `.red-bg`
- [ ] **No directions**: Avoid `.left`, `.right-column`
- [ ] **No sizes**: Avoid `.large`, `.small-text`
- [ ] **Responsive in CSS**: Media queries, not HTML classes
- [ ] **Module encapsulation**: `.thing`, `.thing-item`
- [ ] **No utility classes**: Avoid `.py-4`, `.grid-cols-2` in blade

---

## 📊 Benefits

| Benefit | Semantic HTML+CSS | Non-Semantic |
|---------|-------------------|--------------|
| **Accessibility** | ✅ Screen reader friendly | ❌ Poor support |
| **SEO** | ✅ Search engine friendly | ❌ Unclear structure |
| **Maintainability** | ✅ CSS-only updates | ❌ HTML + CSS updates |
| **Readability** | ✅ High | ❌ Low |
| **Performance** | ✅ Small HTML | ❌ Large HTML |
| **Debugging** | ✅ Easy | ❌ Hard |
| **Testing** | ✅ Stable hooks | ❌ Fragile hooks |
| **Flexibility** | ✅ Layout changes easy | ❌ Requires HTML changes |

---

## 📚 Related Documents

### Internal
- [Semantic HTML & CSS Complete](../../../Modules/Predict/docs/SEMANTIC_HTML_CSS_COMPLETE.md)
- [Semantic CSS Principles](../../../Modules/Predict/docs/SEMANTIC_CSS_PRINCIPLES.md)
- [TwentyOne Semantic CSS Guide](../../../Themes/TwentyOne/docs/SEMANTIC_CSS_GUIDE.md)
- [Blade Minimal Logic](../../../Modules/Predict/docs/BLADE_MINIMAL_LOGIC_BEST_PRACTICES.md)
- [Component-First Architecture](../../../Modules/Predict/docs/PHILOSOPHY_AND_VISION.md)

### External
- [MaintainableCSS - Semantics](https://maintainablecss.com/chapters/semantics/)
- [W3Schools - HTML5 Semantics](https://www.w3schools.com/Html/html5_semantic_elements.asp)
- [CSS-Tricks - Semantic Names](https://css-tricks.com/semantic-class-names/)
- [Rob Dodson - CSS Semantics](https://robdodson.me/posts/css-semantics/)
- [HTML5 Spec](https://html.spec.whatwg.org/multipage/semantics.html)
- [WCAG Accessibility](https://www.w3.org/WAI/WCAG21/quickref/)

---

## 📝 Changelog

### 2026-03-26 - Version 2.0 (Expanded)

- ✅ Added HTML5 semantic elements section
- ✅ Added accessibility implications
- ✅ Expanded to 12 principles (4 HTML + 8 CSS)
- ✅ Added comprehensive violations & fixes
- ✅ Updated benefits table

---

**Maintained By**: AI Agents Team  
**Last Review**: 2026-03-26  
**Next Review**: 2026-04-26  
**Enforcement**: MANDATORY
