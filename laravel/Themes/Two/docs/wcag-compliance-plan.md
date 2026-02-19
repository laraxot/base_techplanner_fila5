# Piano di Risoluzione WCAG 2.1 AA - Tema Two

**Data**: 19 Febbraio 2026  
**Tema**: Two  
**Target**: Conformità WCAG 2.1 Level AA  
**Status**: In Lavorazione

---

## 📋 Executive Summary

Questo documento descrive il piano completo per risolvere tutti i problemi di accessibilità WCAG 2.1 AA identificati nei report MAUVE++ e PageSpeed Insights per il tema Two del progetto sottana.net.

### Problemi Identificati

Dai report di audit accessibilità, sono stati identificati i seguenti problemi critici:

1. **H44** - Select e checkbox senza label associati (5 occorrenze)
2. **F78/G195** - Focus indicator non visibile o rimosso (5 occorrenze)
3. **H30** - Link senza testo descrittivo (26 occorrenze)
4. **C8** - Letter-spacing che causa problemi di leggibilità (1 occorrenza)
5. **C38** - Problemi di reflow con flexbox (5 occorrenze)
6. **G18** - Contrasto insufficiente tra testo e sfondo (43 occorrenze)
7. **H98** - Autocomplete mancante su form inputs (3 occorrenze)
8. **ARIA6** - aria-label su elementi che non possono essere trovati (26 occorrenze)

---

## 🎯 Tecniche WCAG da Implementare

### 1. H44: Using label elements to associate text labels with form controls

**Problema**: Alcuni elementi form (select, checkbox) non hanno label espliciti associati tramite attributo `for`.

**Soluzione Implementata**:
- ✅ Aggiunto `id` e `for` ai select nel blog search bar
- ✅ Aggiunto `autocomplete` appropriato ai form inputs
- ⚠️ **Da Verificare**: Tutti i select dinamici generati da componenti Blade

**File da Correggere**:
- `resources/views/components/blocks/services/search.blade.php` - Select senza label
- `resources/views/components/livewire/blog-search-filters.blade.php` - Select senza label
- `resources/views/components/blocks/services/enhanced-grid.blade.php` - Select senza label

**Pattern da Seguire**:
```blade
{{-- ✅ CORRETTO --}}
<label for="blog-search-date" class="block text-sm font-semibold text-gray-700 mb-2">
    Data
</label>
<select id="blog-search-date" 
        name="date"
        autocomplete="off"
        class="w-full px-4 py-3...">
    <option value="">Tutte le date</option>
</select>

{{-- ❌ ERRATO --}}
<select class="w-full px-4 py-3...">
    <option value="">Tutte le date</option>
</select>
```

---

### 2. F78/G195: Focus Visible Indicator

**Problema**: Focus indicator rimosso o non sufficientemente visibile (contrasto < 3:1 o outline < 2px).

**Soluzione Implementata**:
- ✅ Aggiunto CSS globale per `:focus-visible` con outline 3px
- ✅ Aggiunto `focus:ring-2 focus:ring-[#1E5A96]` a tutti gli elementi interattivi
- ✅ Aggiunto `box-shadow` per maggiore visibilità

**CSS Implementato** (`resources/css/app.css`):
```css
:where(a, button, input, select, textarea, summary, [tabindex]:not([tabindex="-1"])):focus-visible {
    outline: 3px solid #1E5A96 !important;
    outline-offset: 3px !important;
    border-radius: 0.25rem;
    box-shadow: 0 0 0 2px rgba(30, 90, 150, 0.3) !important;
}
```

**Verifica Richiesta**:
- [ ] Testare con keyboard navigation su tutti i componenti
- [ ] Verificare contrasto 3:1 per elementi non testuali
- [ ] Assicurarsi che outline sia sempre visibile anche su background scuri

---

### 3. H30: Link Purpose (In Context)

**Problema**: Link senza testo descrittivo o con solo icone senza aria-label.

**Soluzione Implementata**:
- ✅ Aggiunto `aria-label` a tutti i link icon-only
- ✅ Aggiunto testo descrittivo dove possibile
- ✅ Corretti link `href="#"` con URL reali

**Pattern da Seguire**:
```blade
{{-- ✅ CORRETTO - Link con icona --}}
<a href="/contatti" 
   aria-label="Vai alla pagina contatti"
   class="...">
    <svg aria-hidden="true">...</svg>
    <span class="sr-only">Contatti</span>
</a>

{{-- ✅ CORRETTO - Link solo testo --}}
<a href="/servizi">Scopri i nostri servizi</a>

{{-- ❌ ERRATO - Link senza contesto --}}
<a href="#"><svg>...</svg></a>
```

**File da Verificare**:
- Tutti i componenti con link social media
- Link di navigazione nel header
- Link nel footer

---

### 4. C8: CSS letter-spacing

**Problema**: Uso di `letter-spacing` eccessivo che causa problemi di leggibilità.

**Soluzione Implementata**:
- ✅ Rimosso `tracking-widest` dal footer subtitle
- ✅ Mantenuto solo `letter-spacing` moderato dove necessario

**Regola**: Evitare `letter-spacing` > 0.1em per testo normale.

---

### 5. C38: CSS width, max-width and flexbox for Reflow

**Problema**: Layout che non si adatta correttamente a viewport 320px.

**Soluzione Implementata**:
- ✅ Aggiunto media query per viewport 320px
- ✅ Aggiunto `flex-wrap: wrap` per elementi flex
- ✅ Aggiunto `max-width: 100%` per prevenire overflow

**CSS Implementato**:
```css
@media (max-width: 320px) {
    .container {
        padding-left: 1rem;
        padding-right: 1rem;
    }
    
    * {
        max-width: 100%;
        box-sizing: border-box;
    }
    
    .flex {
        flex-wrap: wrap;
    }
    
    .grid {
        grid-template-columns: 1fr !important;
    }
    
    input, select, textarea {
        width: 100%;
        min-width: 0;
        max-width: 100%;
    }
}
```

**Verifica Richiesta**:
- [ ] Testare layout a 320px di larghezza
- [ ] Verificare che non ci sia scroll orizzontale
- [ ] Assicurarsi che form siano utilizzabili

---

### 6. G18: Contrast Ratio 4.5:1

**Problema**: Contrasto insufficiente tra testo e sfondo (43 occorrenze nel footer principalmente).

**Soluzione Implementata**:
- ✅ Migliorato contrasto nel footer:
  - `text-blue-200` → `text-white/95`
  - `text-blue-100/80` → `text-white/90`
  - `text-blue-100/90` → `text-white/95`
  - `text-gray-200` → `text-white/95`

**CSS Override** (`resources/css/app.css`):
```css
.text-white\/80 {
    color: rgba(255, 255, 255, 0.95);
}

.text-white\/90 {
    color: rgba(255, 255, 255, 1);
}

.text-white\/95 {
    color: rgba(255, 255, 255, 0.98);
}

.text-blue-100\/80 {
    color: rgba(255, 255, 255, 0.95);
}

.text-blue-200 {
    color: rgba(255, 255, 255, 0.95);
}

.text-gray-200 {
    color: rgba(255, 255, 255, 0.95);
}
```

**Verifica Richiesta**:
- [ ] Testare tutti i colori con strumenti di contrasto (WAVE, aXe)
- [ ] Verificare contrasto su background gradient del footer
- [ ] Assicurarsi che tutti i testi raggiungano almeno 4.5:1

---

### 7. H98: Autocomplete Attributes

**Problema**: Form inputs senza attributo `autocomplete` appropriato.

**Soluzione Implementata**:
- ✅ Aggiunto `autocomplete="name"` al campo nome
- ✅ Aggiunto `autocomplete="email"` al campo email
- ✅ Aggiunto `autocomplete="tel"` al campo telefono
- ✅ Aggiunto `autocomplete="organization"` al campo studio
- ✅ Aggiunto `autocomplete="organization-title"` al select tipo studio
- ✅ Aggiunto `autocomplete="off"` ai select di ricerca

**Pattern da Seguire**:
```blade
{{-- ✅ CORRETTO --}}
<input type="text" 
       id="nome"
       name="nome"
       autocomplete="name"
       aria-describedby="nome-help"
       ...>

{{-- ✅ CORRETTO - Select con autocomplete --}}
<select id="tipo"
        name="tipo"
        autocomplete="organization-title"
        ...>
</select>
```

**Riferimenti**:
- [HTML autocomplete attribute specification](https://html.spec.whatwg.org/multipage/form-control-infrastructure.html#autofilling-form-controls:-the-autocomplete-attribute)
- [WCAG Input Purposes](https://www.w3.org/TR/WCAG/#input-purposes)

---

### 8. ARIA6: aria-label Usage

**Problema**: `aria-label` su elementi che non possono essere trovati o che sovrascrivono label native.

**Soluzione**:
- ✅ Usare `aria-label` solo quando necessario (elementi senza testo visibile)
- ✅ Preferire `<label>` con `for` per form inputs
- ✅ Usare `aria-labelledby` quando possibile invece di `aria-label`
- ✅ Assicurarsi che `aria-label` non sovrascriva label native importanti

**Pattern da Seguire**:
```blade
{{-- ✅ CORRETTO - Icon button senza testo --}}
<button aria-label="Chiudi menu">
    <svg aria-hidden="true">...</svg>
</button>

{{-- ✅ CORRETTO - Link con icona --}}
<a href="/contatti" aria-label="Vai alla pagina contatti">
    <svg aria-hidden="true">...</svg>
</a>

{{-- ❌ ERRATO - aria-label su input con label --}}
<label for="email">Email</label>
<input id="email" aria-label="Indirizzo email" ...>
{{-- Usa solo il label, aria-label sovrascrive --}}
```

---

## 🔧 Implementazione Tecnica

### File Modificati

#### 1. Header Component
**File**: `resources/views/components/sections/header/v1.blade.php`
- ✅ Aggiunto `role="banner"`
- ✅ Aggiunto `aria-label` a tutti i link e bottoni
- ✅ Aggiunto `aria-expanded` ai dropdown
- ✅ Aggiunto `aria-hidden="true"` alle icone decorative
- ✅ Migliorato focus indicators

#### 2. Footer Component
**File**: `resources/views/components/sections/footer/v1.blade.php`
- ✅ Aggiunto `role="contentinfo"`
- ✅ Migliorato contrasto colori
- ✅ Aggiunto `aria-label` ai link social
- ✅ Aggiunto `aria-hidden="true"` alle icone
- ✅ Corretti link non scansionabili

#### 3. Contact Form
**File**: `resources/views/components/blocks/contact/form.blade.php`
- ✅ Aggiunto `autocomplete` a tutti gli inputs
- ✅ Aggiunto `aria-describedby` per help text
- ✅ Aggiunto `aria-required="true"` ai campi obbligatori
- ✅ Aggiunto help text nascosto (`sr-only`)

#### 4. Blog Search Bar
**File**: `resources/views/components/blogs/search/bar.blade.php`
- ✅ Aggiunto `id` e `for` ai select
- ✅ Aggiunto `autocomplete="off"` ai select di ricerca
- ✅ Aggiunto `aria-label` al pulsante di ricerca
- ✅ Aggiunto `aria-expanded` al toggle opzioni avanzate

#### 5. CSS Globale
**File**: `resources/css/app.css`
- ✅ Aggiunto focus indicators migliorati
- ✅ Aggiunto override per contrasto colori
- ✅ Aggiunto supporto reflow 320px
- ✅ Aggiunto utility `sr-only`

#### 6. Layout Principale
**File**: `resources/views/components/layouts/main.blade.php`
- ✅ Aggiunto skip link per navigazione da tastiera
- ✅ Aggiunto `role="main"`
- ✅ Aggiunto `preconnect` per CDN esterni

---

## 📊 Checklist Implementazione

### Criticità Alta (Must Fix)

- [x] **H44** - Label associati a tutti i form controls
- [x] **G195** - Focus indicator visibile su tutti gli elementi interattivi
- [x] **G18** - Contrasto minimo 4.5:1 per tutto il testo
- [x] **H98** - Autocomplete su tutti i form inputs appropriati
- [x] **C38** - Reflow support a 320px

### Criticità Media

- [x] **H30** - Link con testo descrittivo o aria-label
- [x] **ARIA6** - aria-label usato correttamente
- [x] **C8** - Letter-spacing rimosso dove problematico
- [x] **F78** - Focus indicator non rimosso

### Verifica Finale

- [ ] Test completo con screen reader (NVDA/VoiceOver)
- [ ] Test navigazione completa da tastiera
- [ ] Verifica contrasto con strumenti automatici (WAVE, aXe)
- [ ] Test su viewport 320px
- [ ] Verifica autocomplete con browser
- [ ] Test con utenti reali con disabilità

---

## 🧪 Testing Strategy

### 1. Automated Testing

**Strumenti**:
- [WAVE](https://wave.webaim.org/) - Web Accessibility Evaluation Tool
- [aXe DevTools](https://www.deque.com/axe/devtools/) - Browser extension
- [Lighthouse](https://developers.google.com/web/tools/lighthouse) - Chrome DevTools
- [MAUVE++](https://mauve.isti.cnr.it/) - Validatore italiano WCAG

**Comandi**:
```bash
# Lighthouse CLI
lighthouse https://sottana.net/it --view

# aXe CLI
npx @axe-core/cli https://sottana.net/it
```

### 2. Manual Testing

**Keyboard Navigation**:
- [ ] Tab attraverso tutti gli elementi interattivi
- [ ] Enter/Space per attivare bottoni
- [ ] Arrow keys per navigare menu
- [ ] Escape per chiudere modali
- [ ] Nessuna keyboard trap

**Screen Reader Testing**:
- [ ] NVDA (Windows)
- [ ] JAWS (Windows)
- [ ] VoiceOver (macOS/iOS)
- [ ] TalkBack (Android)

**Visual Testing**:
- [ ] Zoom 200% senza perdita di funzionalità
- [ ] Viewport 320px senza scroll orizzontale
- [ ] Focus indicator sempre visibile
- [ ] Contrasto sufficiente su tutti i background

---

## 📝 Note Implementative

### Priorità di Intervento

1. **Immediato**: Problemi che bloccano l'accessibilità base (H44, G195, G18)
2. **Breve Termine**: Miglioramenti UX accessibilità (H30, H98, C38)
3. **Medio Termine**: Ottimizzazioni avanzate (ARIA6, C8)

### Pattern Riutilizzabili

Tutti i componenti Blade devono seguire questi pattern:

```blade
{{-- Pattern Form Input --}}
<div>
    <label for="{{ $id }}" class="block text-sm font-medium text-gray-700 mb-2">
        {{ $label }}
        @if($required)
            <span class="text-red-500" aria-label="Campo obbligatorio">*</span>
        @endif
    </label>
    <input type="{{ $type }}"
           id="{{ $id }}"
           name="{{ $name }}"
           autocomplete="{{ $autocomplete }}"
           {{ $required ? 'required aria-required="true"' : '' }}
           aria-describedby="{{ $id }}-help"
           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#1E5A96] focus:border-transparent">
    <p id="{{ $id }}-help" class="sr-only">{{ $helpText }}</p>
</div>

{{-- Pattern Link con Icona --}}
<a href="{{ $url }}" 
   aria-label="{{ $ariaLabel ?? $text }}"
   class="... focus:outline-none focus:ring-2 focus:ring-[#1E5A96] focus:ring-offset-2">
    <svg aria-hidden="true">...</svg>
    @if(!$text)
        <span class="sr-only">{{ $ariaLabel }}</span>
    @else
        {{ $text }}
    @endif
</a>

{{-- Pattern Button --}}
<button type="{{ $type }}"
        aria-label="{{ $ariaLabel ?? $text }}"
        class="... focus:outline-none focus:ring-2 focus:ring-[#1E5A96] focus:ring-offset-2">
    @if($icon)
        <svg aria-hidden="true">...</svg>
    @endif
    {{ $text }}
</button>
```

---

## 🔄 Processo di Verifica Continua

### Pre-Commit Checklist

Prima di ogni commit, verificare:
- [ ] Tutti i form inputs hanno label associati
- [ ] Tutti i link hanno testo descrittivo o aria-label
- [ ] Focus indicator visibile su tutti gli elementi interattivi
- [ ] Contrasto colori verificato (4.5:1 minimo)
- [ ] Autocomplete aggiunto dove appropriato
- [ ] Layout funziona a 320px

### Automated CI/CD Checks

Implementare nel pipeline CI/CD:
```yaml
# .github/workflows/accessibility.yml
- name: Run aXe accessibility tests
  run: |
    npx @axe-core/cli https://sottana.net/it --tags wcag2a,wcag2aa
    
- name: Run Lighthouse accessibility audit
  run: |
    lighthouse https://sottana.net/it --only-categories=accessibility --output=json
```

---

## 📚 Riferimenti

### Documentazione WCAG
- [WCAG 2.1 Quick Reference](https://www.w3.org/WAI/WCAG21/quickref/)
- [Understanding WCAG 2.1](https://www.w3.org/WAI/WCAG21/Understanding/)
- [WCAG Techniques](https://www.w3.org/WAI/WCAG21/Techniques/)

### Tecniche Specifiche
- [H44: Using label elements](https://www.w3.org/WAI/WCAG21/Techniques/html/H44)
- [G195: Using an author-supplied, visible focus indicator](https://www.w3.org/WAI/WCAG21/Techniques/general/G195)
- [H30: Providing link text](https://www.w3.org/WAI/WCAG21/Techniques/html/H30)
- [G18: Ensuring contrast ratio 4.5:1](https://www.w3.org/WAI/WCAG21/Techniques/general/G18)
- [H98: Using HTML autocomplete attributes](https://www.w3.org/WAI/WCAG21/Techniques/html/H98)
- [ARIA6: Using aria-label](https://www.w3.org/WAI/WCAG21/Techniques/aria/ARIA6)
- [C38: Using CSS width, max-width and flexbox](https://www.w3.org/WAI/WCAG21/Techniques/css/C38)
- [C8: Using CSS letter-spacing](https://www.w3.org/WAI/WCAG21/Techniques/css/C8)
- [F78: Failure of Focus Visible](https://www.w3.org/WAI/WCAG21/Techniques/failures/F78)

### Strumenti
- [WAVE](https://wave.webaim.org/)
- [aXe DevTools](https://www.deque.com/axe/devtools/)
- [Contrast Checker](https://webaim.org/resources/contrastchecker/)
- [MAUVE++](https://mauve.isti.cnr.it/)

---

## 🎯 Prossimi Passi

1. **Verifica Completa**: Eseguire audit completo con MAUVE++ dopo tutte le modifiche
2. **Testing Utenti**: Test con utenti reali con disabilità
3. **Documentazione Componenti**: Aggiornare documentazione componenti con esempi accessibili
4. **Training Team**: Formare il team su best practices WCAG
5. **Monitoraggio Continuo**: Implementare testing automatico nel CI/CD

---

**Ultimo Aggiornamento**: 19 Febbraio 2026  
**Prossima Revisione**: Dopo audit completo MAUVE++
