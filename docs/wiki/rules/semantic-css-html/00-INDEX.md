# 🎨 Semantic CSS & HTML

**Priority**: 🔴 CRITICAL  
**Date**: 2026-03-26  
**Version**: 1.0  
**Status**: ✅ Active - **MANDATORY**

---

## 🎯 Fundamental Principles

> **Use semantic HTML elements and semantic class names**
>
> Semantic = Describe WHAT it IS, not HOW it LOOKS
>
> Maintainable CSS is built on semantic foundations.

---

## 📚 Core Principles

### 1. Semantic HTML Elements

**Use standard HTML tags for their intended purposes**:

```html
<!-- ✅ CORRECT - Semantic elements -->
<article>
  <header>
    <h1>Article Title</h1>
  </header>
  <p>Paragraph of text...</p>
  <a href="/link">Link text</a>
  <nav>Navigation links</nav>
  <table>Tabular data</table>
</article>

<!-- ❌ WRONG - Non-semantic elements -->
<div class="article">
  <div class="header">
    <div class="h1">Article Title</div>
  </div>
  <div class="paragraph">Paragraph of text...</div>
  <div class="link" onclick="navigate()">Link text</div>
  <div class="nav">Navigation links</div>
  <div class="table">Tabular data</div>
</div>
```

**Benefits**:
- ✅ Accessibility (screen readers understand structure)
- ✅ SEO (search engines understand content)
- ✅ Maintainability (clear intent)
- ✅ Less CSS (browser provides default styles)

---

### 2. Semantic Class Names

**Class names should describe the NATURE of content, not the PRESENTATION**:

```html
<!-- ✅ CORRECT - Semantic class names -->
<div class="product-card">
  <h2 class="product-title">Product Name</h2>
  <p class="product-description">Description...</p>
  <span class="product-price">$99</span>
  <button class="add-to-cart">Add to Cart</button>
</div>

<!-- ❌ WRONG - Visual/Presentational class names -->
<div class="red-box">
  <h2 class="big-bold-text">Product Name</h2>
  <p class="small-gray-text">Description...</p>
  <span class="green-text">$99</span>
  <button class="blue-button">Add to Cart</button>
</div>
```

**Why Semantic Classes**:
- ✅ **Responsive**: Class remains meaningful at all breakpoints
- ✅ **Maintainable**: Visual changes don't require HTML updates
- ✅ **Searchable**: Easy to find in codebase (`.product-title` vs `.text-lg`)
- ✅ **Accessible**: Clear purpose for assistive technologies
- ✅ **Testable**: Stable hooks for automated tests

---

## 🚫 What to Avoid

### 1. Visual/Atomic Classes

```html
<!-- ❌ WRONG - Visual classes -->
<div class="red pull-left pb3 mt4">Content</div>

<!-- ❌ WRONG - Atomic classes -->
<div class="flex items-center justify-between p-4 bg-white">
  <span class="text-lg font-bold text-gray-900">Title</span>
</div>

<!-- ✅ CORRECT - Semantic classes -->
<div class="card">
  <h2 class="card-title">Title</h2>
</div>
```

**Problems with Visual Classes**:
- ❌ Misleading at different breakpoints
- ❌ HTML needs updates when design changes
- ❌ Hard to understand purpose
- ❌ Large HTML footprint
- ❌ Hard to debug (many classes)

---

### 2. Grid System Classes in HTML

```html
<!-- ❌ WRONG - Grid classes in HTML -->
<div class="row">
  <div class="col-md-6 col-lg-4">Content</div>
  <div class="col-md-6 col-lg-8">Content</div>
</div>

<!-- ✅ CORRECT - Semantic wrapper -->
<div class="product-grid">
  <div class="product-card">Content</div>
  <div class="product-card">Content</div>
</div>
```

**CSS (semantic grid)**:
```css
.product-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  gap: 1rem;
}
```

---

### 3. Behavioral Classes

```html
<!-- ❌ WRONG - Behavioral class -->
<button class="submit-on-click">Submit</button>

<!-- ✅ CORRECT - Semantic class -->
<button class="submit-button" data-action="submit">Submit</button>
```

**JavaScript**:
```javascript
// ✅ CORRECT - Use data attributes for behavior
document.querySelectorAll('[data-action="submit"]')
  .forEach(btn => btn.addEventListener('click', handleSubmit));
```

---

## ✅ Best Practices

### 1. Module-Based Naming (BEM-inspired)

```html
<!-- ✅ CORRECT - Module-based semantic classes -->
<article class="product-card">
  <header class="product-card__header">
    <h2 class="product-card__title">Product Name</h2>
    <span class="product-card__price">$99</span>
  </header>
  <div class="product-card__body">
    <p class="product-card__description">Description...</p>
  </div>
  <footer class="product-card__footer">
    <button class="product-card__action">Add to Cart</button>
  </footer>
</article>
```

**Benefits**:
- ✅ Clear module boundaries
- ✅ No naming conflicts
- ✅ Easy to understand hierarchy
- ✅ Scoped styles

---

### 2. State Classes (is-* prefix)

```html
<!-- ✅ CORRECT - State classes -->
<button class="button is-disabled">Disabled</button>
<nav class="nav is-expanded">Navigation</nav>
<div class="modal is-visible">Modal</div>

<!-- ❌ WRONG - Visual state -->
<button class="button gray">Disabled</button>
```

**CSS**:
```css
.button { /* base styles */ }
.button.is-disabled { 
  opacity: 0.5; 
  pointer-events: none; 
}
```

---

### 3. Utility Classes (Sparingly)

**Only for layout/spacing, NEVER for content styling**:

```html
<!-- ✅ CORRECT - Layout utilities only -->
<div class="product-grid u-flex u-gap-4">
  <div class="product-card">Content</div>
</div>

<!-- ❌ WRONG - Content utilities -->
<div class="u-text-red u-font-bold u-text-lg">Title</div>

<!-- ✅ CORRECT - Semantic -->
<h2 class="product-title">Title</h2>
```

---

## 📊 Comparison Table

| Aspect | Semantic | Non-Semantic |
|--------|----------|--------------|
| **Class Names** | `.product-card`, `.hero-title` | `.red-box`, `.big-text` |
| **HTML Elements** | `<article>`, `<header>`, `<nav>` | `<div>` for everything |
| **Responsiveness** | Classes remain meaningful | Classes become misleading |
| **Maintenance** | HTML doesn't change with design | HTML needs constant updates |
| **Accessibility** | Screen readers understand | Requires ARIA fixes |
| **SEO** | Search engines understand | Poor content understanding |
| **Debugging** | One selector, easy to trace | Many atomic classes |
| **HTML Size** | Smaller (less classes) | Larger (many utility classes) |

---

## 🔧 Implementation Guide

### Step 1: Audit Existing Code

```bash
# Find non-semantic class names
grep -r "class=\".*\(red\|blue\|big\|small\|left\|right\)\"" resources/views/

# Find div soup
grep -r "<div class=" resources/views/ | wc -l
```

### Step 2: Refactor to Semantic

```html
<!-- BEFORE -->
<div class="flex items-center p-4 bg-white rounded-lg shadow">
  <div class="text-lg font-bold text-gray-900">Title</div>
  <div class="ml-4 text-sm text-gray-500">Subtitle</div>
</div>

<!-- AFTER -->
<article class="card">
  <header class="card__header">
    <h2 class="card__title">Title</h2>
    <p class="card__subtitle">Subtitle</p>
  </header>
</article>
```

### Step 3: Update CSS

```css
/* BEFORE - Utility classes */
.flex { display: flex; }
.items-center { align-items: center; }
.p-4 { padding: 1rem; }

/* AFTER - Semantic CSS */
.card {
  background: white;
  border-radius: 0.5rem;
  box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.card__header {
  display: flex;
  align-items: center;
  padding: 1rem;
}

.card__title {
  font-size: 1.25rem;
  font-weight: bold;
  color: #111827;
}

.card__subtitle {
  font-size: 0.875rem;
  color: #6B7280;
  margin-left: 1rem;
}
```

---

## 📋 Checklist

### HTML Semantics

- [ ] Using semantic elements (`<article>`, `<header>`, `<nav>`, etc.)
- [ ] NOT using `<div>` for everything
- [ ] Proper heading hierarchy (`<h1>` → `<h2>` → `<h3>`)
- [ ] Links use `<a>`, not `<div onclick>`
- [ ] Buttons use `<button>`, not `<div onclick>`
- [ ] Tables use `<table>` for tabular data

### CSS Semantics

- [ ] Class names describe content, not presentation
- [ ] NO visual classes (`.red`, `.big`, `.left`)
- [ ] NO atomic/utility classes for content
- [ ] Module-based naming (`.card`, `.card__title`)
- [ ] State classes use `is-*` prefix
- [ ] Data attributes for JavaScript behavior

### Accessibility

- [ ] Semantic elements provide structure
- [ ] ARIA labels where needed
- [ ] Alt text on images
- [ ] Proper form labels
- [ ] Keyboard navigation works

---

## 🔗 Related Documentation

- [Container Blade Agnostic](../container-blade/agnostic-rule.md)
- [Tailwind CSS Best Practices](../tailwindcss-development/README.md)
- [Accessibility Compliance](../accessibility-compliance/SKILL.md)

## 📚 References

- [Maintainable CSS - Semantics](https://maintainablecss.com/chapters/semantics/)
- [W3Schools - HTML5 Semantic Elements](https://www.w3schools.com/Html/html5_semantic_elements.asp)
- [CSS-Tricks - Semantic Class Names](https://css-tricks.com/semantic-class-names/)
- [Rob Dodson - CSS Semantics](https://robdodson.me/posts/css-semantics/)

---

**Maintained By**: AI Agents Team  
**Last Review**: 2026-03-26  
**Next Review**: 2026-04-02  
**Status**: ✅ Active - **MANDATORY**
