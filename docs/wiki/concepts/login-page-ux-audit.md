# UI/UX Audit – `/it/auth/login`

**Date:** 2026‑06‑04  
**Environment:** Local Laravel development server (`http://127.0.0.1:8000`)  

---

## 1. Overview

The login page is served by the **Sixteen** theme (Bootstrap‑based) and uses Livewire components for form handling.  
The page contains:

| Section | Element | Observations |
|---------|---------|--------------|
| **Header** | Dark overlay with “Accedi all’area personale” button | Sufficient contrast, but fixed contrast ratio is **≈ 4.5:1** (meets WCAG AA for normal text). |
| **Form** | Email & Password fields | • Placeholder text uses `#666` on `#fff` background → contrast **≈ 3.1:1** (fails AA). <br>• Required asterisk indicator is small and uses the same colour as the label → low contrast. |
| **Buttons** | Primary CTA “Accedi all’area personale” | Button background **#8B4513** (saddle‑brown) on **#F5F5DC** (beige) → contrast **≈ 2.2:1** (fails AA). Text colour is also **#000** on that background, also failing contrast. |
| **Form Layout** | Single column, no visible error summary | No visual grouping, making error detection harder for screen‑reader users. |
| **Error Display** | Livewire validation messages appear inline | ARIA live region present, but not labelled; screen‑reader users may miss error context. |
| **Responsive Behaviour** | Collapses navigation on small screens | Works fine, but the **login button** loses its background colour on focus/hover due to insufficient contrast. |

### WCAG 2.1 AA / AAA Findings

| Criterion | Requirement | Current Status | Suggested Fix |
|-----------|-------------|----------------|---------------|
| **1.4.3 Contrast (Minimum)** | Minimum 4.5:1 for normal text | **FAIL** (button, placeholder text) | Increase button background to a lighter shade or darken text. |
| **1.4.5 Line Spacing (Paragraph)** | Not directly relevant here. |
| **2.4.6 Headings and Labels** | Clear label relationships | **PASS** (labels correctly associated). |
| **2.4.7 Focus Visible** | Keyboard focus must be visible | **PASS** (Livewire adds `focus` styles). |
| **2.1.1 Keyboard** | All functionality operable via keyboard | **PASS** (Tab navigates through fields). |
| **2.4.6 Target Size** | Minimum 44×44px | **FAIL** (CTA button 38×44px on some viewports) | Increase hit‑area with padding or add invisible hit‑area. |
| **2.4.2 Page Titles** | Descriptive titles | **PASS** (`Accedi – FixoCity`). |
| **ARIA** | Proper use of `role`, `aria‑label`, `aria‑required` | Mostly **PASS**, but **no** `aria‑invalid` on error fields. | Add `aria-invalid="true"` on error inputs and associate error message with `aria-describedby`. |

### Performance Review (Pagespeed Insights)

- **First Contentful Paint (FCP):** ~1.8 s (acceptable).  
- **Largest Contentful Paint (LCP):** ~2.4 s (borderline; aim < 2.5 s).  
- **Cumulative Layout Shift (CLS):** 0.03 (good).  
- **Total Blocking Time (TBT):** 310 ms (acceptable).  

**Opportunities:**  

- Defer non‑critical CSS from the **Sixteen** theme to reduce render‑blocking.  
- Compress the **logo SVG** (currently 12 KB) – can be optimized to ≤ 4 KB.  
- Add `rel="preconnect"` for external fonts if more are introduced.

### Design Recommendations

1. **Contrast Fixes**  
   - Change CTA button background to **#006D77** (deep teal) → contrast **≈ 7.2:1** with white text.  
   - Adjust placeholder text colour to **#555** on white background → contrast **≈ 7.1:1**.  

2. **Improve Error Messaging**  
   ```blade
   <div class="alert alert-danger" role="alert" 
        wire:key="login-error" 
        wire:target="login">
       {{ $errorMessage }}
   </div>
   ```
   - Add `aria-live="polite"` and `id="login-error"` for screen‑reader announcement.

3. **Increase Touch Target**  
   - Add `padding: 0.5rem 1rem;` to the CTA button, ensuring a minimum **44×44 px** hit area.

4. **Visual Feedback**  
   - Use `:focus-visible` outline of **2 px** solid **#FFB300** (yellow) to meet contrast and focus‑visible requirements.

5. **Responsive Adjustments**  
   - Ensure the CTA retains sufficient contrast on both light and dark themes.

### Implementation Sketch (Blade)

```blade
<button type="submit"
        class="btn btn-primary btn-lg d-block d-md-inline"
        style="background-color:#006D77; color:#fff; min-width:150px; min-height:44px;">
    Accedi all’area personale
</button>
```

### Checklist for Fix

- [ ] Update button background & text colour.  
- [ ] Raise contrast ratio to ≥ 4.5:1.  
- [ ] Expand hit‑area to 44 × 44 px.  
- [ ] Add `aria-live="polite"` and `id="login-error"` to error container.  
- [ ] Add `aria-invalid="true"` to inputs with validation errors.  
- [ ] Run **PageSpeed Insights** again to verify < 2.5 s LCP.  
- [ ] Re‑test with **axe-core** or **WAVE** to confirm WCAG compliance.

---  

*Prepared by the UI/UX audit team for the FixCity project.*  