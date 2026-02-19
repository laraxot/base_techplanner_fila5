# 📚 Documentazione Tema Two - TechPlanner

## 🎯 Panoramica

Il Tema Two è un tema moderno e responsive per TechPlanner, progettato con le seguenti caratteristiche:
- **Design Minimalista**: Pulito, professionale e focalizzato sull'usabilità
- **Responsive First**: Ottimizzato per mobile con progressive enhancement
- **Performance Oriented**: Ottimizzato per velocità e SEO
- **Accessibility Ready**: Conforme WCAG 2.1 AA
- **Multi-lingua**: Supporto completo per italiano, inglese e tedesco
- **SEO Ottimizzato**: Struttura markup semantica e meta tag
- **Brand Gradient**: Nuovo sistema di colori con gradient brand (#667eea → #764ba2)

---

**Versione**: 2.1.0
**Ultimo Aggiornamento**: 6 Febbraio 2026
**Stato**: Attivo in Sviluppo

---

## 🏗️ Architettura Componenti

### Sistema a Blocchi

Il tema utilizza un sistema di blocchi basato su JSON per gestire i contenuti dinamicamente:

```json
{
  "content_blocks": {
    "it": [
      {
        "type": "hero",
        "slug": "hero-section",
        "data": {
          "view": "pub_theme::components.blocks.hero.main",
          "title": "Benvenuto in TechPlanner",
          "subtitle": "Sistema avanzato di gestione tecnica",
          // ... altri dati
        }
      }
    ]
  }
}
```

### Componenti Disponibili

#### 1. Hero Section (`blocks/hero/main.blade.php`)
Componente principale per le hero section con:
- Background image supportato
- Overlay per leggibilità
- Call-to-action buttons multi-stile
- Stats bar opzionale
- Responsive design

**Props disponibili**:
```php
@props([
    'title' => '',           // Titolo principale
    'subtitle' => '',        // Sottotitolo descrittivo
    'description' => '',     // Descrizione dettagliata
    'backgroundImage' => '',  // URL immagine sfondo
    'ctaPrimary' => [],      // Bottone primario ['label', 'url', 'style']
    'ctaSecondary' => [],    // Bottone secondario ['label', 'url', 'style']
])
```

#### 2. Features Grid (`blocks/features/grid.blade.php`)
Griglia per funzionalità con:
- Layout responsive a 3 colonne su desktop
- Icone animate e colorate
- Hover effects smooth
- Titoli e descrizioni personalizzabili

**Props disponibili**:
```php
@props([
    'title' => '',        // Titolo sezione
    'description' => '',  // Descrizione introduttiva
    'features' => [],     // Array features con icon, title, description, url, color
])
```

#### 3. Stats Overview (`blocks/stats/overview.blade.php`)
Sezione statistiche con:
- Layout responsive a 4 colonne
- Card animate e interattive
- Numeri grandi e labels chiari
- Background colorabile

**Props disponibili**:
```php
@props([
    'title' => '',           // Titolo sezione
    'backgroundColor' => '',  // Colore sfondo (bg-gray-50, bg-blue-50, etc.)
    'stats' => [],          // Array stats con number, label, description
])
```

---

## 🎨 Design System

### Palette Colori

#### Colori Primari
- **Blu Tech**: `rgb(59, 130, 246)` → `#3B82F6`
- **Indigo**: `rgb(99, 102, 241)` → `#6366F1`
- **Grigio Neutral**: `rgb(243, 244, 246)` → `#F3F4F6`

#### Colori Funzionali
- **Success**: `rgb(34, 197, 94)` → `#22C55E`
- **Warning**: `rgb(245, 158, 11)` → `#F59E0B`
- **Error**: `rgb(239, 68, 68)` → `#EF4444`

### Tipografia

#### Gerarchia Font
```css
/* Heading hierarchy */
.hero-title { font-size: clamp(2rem, 4rem, 6rem); font-weight: 800; }
.section-title { font-size: clamp(1.5rem, 2rem, 3rem); font-weight: 700; }
.feature-title { font-size: 1.25rem; font-weight: 600; }
.body-text { font-size: 1rem; font-weight: 400; }
.small-text { font-size: 0.875rem; font-weight: 400; }
```

#### Spaziatura
```css
/* Spacing system */
.hero-spacing { padding: clamp(4rem, 6rem, 8rem) 0; }
.section-spacing { padding: 5rem 0; }
.card-spacing { padding: 2rem; }
.element-spacing { margin: 1rem; }
```

---

## 📱 Responsive Breakpoints

### Breakpoint System
```css
/* Mobile-first responsive design */
/* Mobile: default (no media query) */

/* Tablet: 768px and up */
@media (min-width: 768px) {
  .grid-cols-1 { @apply grid-cols-2; }
  .text-4xl { @apply text-5xl; }
}

/* Desktop: 1024px and up */
@media (min-width: 1024px) {
  .grid-cols-2 { @apply grid-cols-3; }
  .text-5xl { @apply text-6xl; }
}

/* Large Desktop: 1280px and up */
@media (min-width: 1280px) {
  .max-w-4xl { @apply max-w-6xl; }
  .text-6xl { @apply text-7xl; }
}
```

### Componenti Responsive

#### Hero Responsive
- **Mobile**: Titolo `text-4xl`, padding `px-4`, bottoni full-width
- **Tablet**: Titolo `text-5xl`, padding `px-6`, bottoni side-by-side
- **Desktop**: Titolo `text-6xl`, padding `px-8`, layout ottimizzato

#### Features Grid Responsive
- **Mobile**: 1 colonna, card stacked
- **Tablet**: 2 colonne, card medi
- **Desktop**: 3 colonne, card complete

---

## 🚀 Performance Optimizzazione

### CSS Architecture
```css
/* Critical CSS inlined */
.critical-above-fold {
  /* CSS critico per above-the-fold content */
}

/* Non-critical CSS loaded async */
.non-critical {
  content: '';
  display: block;
  height: 0;
  clear: both;
}
```

### Bundle Optimization
```javascript
// Vite configuration ottimizzato
export default defineConfig({
  build: {
    rollupOptions: {
      output: {
        manualChunks: {
          'critical': ['src/critical.js'],
          'vendor': ['src/vendor.js'],
        }
      }
    }
  }
});
```

### Lazy Loading
```php
// Lazy loading component images
@props(['image', 'alt', 'loading' => 'lazy'])
<div>
    <img 
        src="{{ $loading === 'lazy' ? 'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7' : $image }}" 
        data-src="{{ $image }}"
        alt="{{ $alt }}"
        class="lazy-image {{ $loading === 'lazy' ? 'lazy' : 'loaded' }}"
        loading="lazy"
    />
</div>
```

---

## ♿ Accessibilità

### WCAG 2.1 AA Compliance

**📋 Documentazione Completa**: Vedi [WCAG Compliance Plan](wcag-compliance-plan.md) per il piano dettagliato di risoluzione di tutti i problemi di accessibilità.

#### Focus Management
```css
/* High visibility focus styles - WCAG 2.1 AA compliant */
:where(a, button, input, select, textarea, summary, [tabindex]:not([tabindex="-1"])):focus-visible {
    outline: 3px solid #1E5A96 !important;
    outline-offset: 3px !important;
    box-shadow: 0 0 0 2px rgba(30, 90, 150, 0.3) !important;
}

.skip-link {
  @apply absolute -top-full left-0 transform -translate-y-full;
  @apply p-2 bg-[#1E5A96] text-white rounded;
  @apply focus:outline-none focus:ring-2 focus:ring-[#1E5A96];
}
```

#### Screen Reader Support
```php
// Screen reader only content
@if($srOnly)
    <div class="sr-only" aria-hidden="{{ !$srOnly }}">
        {{ $slot }}
    </div>
@endif
```

#### Color Contrast
- WCAG AA contrast ratio minimo 4.5:1 per testo normale
- WCAG AA contrast ratio minimo 3:1 per elementi non testuali
- Tutti i testi hanno contrasto verificato e migliorato
- Indicatori di stato usano colori e icone con contrasto sufficiente

#### Form Accessibility
- Tutti i form inputs hanno label associati tramite `for` e `id`
- Autocomplete appropriato su tutti gli inputs
- `aria-describedby` per help text
- `aria-required="true"` per campi obbligatori

#### Link Accessibility
- Tutti i link hanno testo descrittivo o `aria-label`
- Link icon-only hanno sempre `aria-label` descrittivo
- Link esterni hanno `rel="noopener noreferrer"`

#### Reflow Support
- Layout funziona correttamente a 320px di larghezza
- Nessuno scroll orizzontale su viewport piccoli
- Form elements si adattano correttamente con flexbox

---

## 🔧 Customizzazione

### Variabili Tema

```php
// Variabili configurabili da config/techplanner/xra.php
$heroHeight = config('techplanner.hero_height', '85vh');
$primaryColor = config('techplanner.primary_color', 'blue');
$borderRadius = config('techplanner.border_radius', 'lg');
```

### Override Componenti

```php
// Personalizza hero component
<x-hero.main 
    :title="$customTitle"
    :background-image="$customBgImage"
    :cta-primary="['label' => 'Scopri Ora', 'url' => '/admin']"
/>
```

### Layout Variants

```php
// Layout compatto per contenuti densi
@if($compactLayout)
    <div class="max-w-4xl px-4">
        {{ $slot }}
    </div>
@else
    <div class="max-w-7xl px-6 lg:px-8">
        {{ $slot }}
    </div>
@endif
```

---

## 📋 Esempi Pratici

### Hero Section
```php
<!-- Hero completo con background e CTA -->
<x-hero.main 
    title="Gestione Tecnica Avanzata"
    subtitle="TechPlanner: La soluzione definitiva per la tua azienda"
    description="Gestisci dipendenti, progetti e risorse in modo efficiente"
    background-image="/images/hero-tech-bg.jpg"
    :cta-primary="['label' => 'Accedi al Sistema', 'url' => '/admin', 'style' => 'primary']"
    :cta-secondary="['label' => 'Scopri le Funzionalità', 'url' => '#features', 'style' => 'secondary']"
/>
```

### Features Grid
```php
<!-- Griglia funzionalità complete -->
<x-features.grid 
    title="Funzionalità Principali"
    description="Tutto quello che ti serve per gestire la tua azienda"
    :features="[
        [
            'icon' => 'heroicon-o-users',
            'title' => 'Gestione Dipendenti',
            'description' => 'Gestisci il personale, presenze e performance',
            'url' => '/employee/admin',
            'color' => 'blue'
        ],
        [
            'icon' => 'heroicon-o-chart-bar',
            'title' => 'Analytics & Report',
            'description' => 'Statistiche dettagliate e report personalizzati',
            'url' => '/chart/admin',
            'color' => 'green'
        ]
    ]"
/>
```

### Stats Overview
```php
<!-- Sezione statistiche aziendali -->
<x-stats.overview 
    title="TechPlanner in Numeri"
    background-color="bg-gray-50"
    :stats="[
        ['number' => '500+', 'label' => 'Aziende Attive', 'description' => 'Utilizzano TechPlanner quotidianamente'],
        ['number' => '15.000+', 'label' => 'Dipendenti Gestiti', 'description' => 'Attraverso la nostra piattaforma']
    ]"
/>
```

---

## 🔨 Sviluppo Guidelines

### Coding Standards
1. **Strict Typing**: Tutti i file PHP devono avere `declare(strict_types=1);`
2. **PSR-4 Autoloading**: Organizzazione classi standard
3. **Component-Based Architecture**: Componenti riutilizzabili
4. **Mobile-First Development**: Progressive enhancement
5. **Performance-First**: Ottimizzazione caricamento

### Testing Requirements
1. **Cross-Browser Testing**: Chrome, Firefox, Safari, Edge
2. **Device Testing**: Mobile, Tablet, Desktop
3. **Accessibility Testing**: Screen readers, keyboard navigation
4. **Performance Testing**: Lighthouse 90+ score

### Git Workflow
```bash
# Feature branch development
git checkout -b feature/new-component
git add .
git commit -m "feat: add hero component with responsive design"
git push origin feature/new-component

# Pull request con template
git checkout main
git merge feature/new-component
git push origin main
```

---

## 🚀 Deploy e Publishing

### Build Process
```bash
# Development build
npm run dev

# Production build
npm run build

# Copy to public directory
npm run copy
```

### Version Control
```json
// theme.json
{
  "name": "Two",
  "version": "2.0.0",
  "description": "Tema responsive e moderno per TechPlanner",
  "author": "TechPlanner Team",
  "homepage": "https://techplanner.local",
  "repository": "https://github.com/quaeris/fila5-mono",
  "keywords": ["laravel", "filament", "theme", "responsive", "techplanner"],
  "license": "MIT"
}
```

---

## 🔍 Troubleshooting

### Problemi Comuni

#### Vite Manifest Not Found
**Errore**: `Vite manifest not found at: public_html/themes/Two/dist/manifest.json`
**Soluzione**: 
```bash
cd laravel/Themes/Two
npm run build
npm run copy
```

#### Component Not Rendering
**Errore**: Componente Blade non visualizzato
**Soluzione**:
1. Verifica percorso component in `home.json`
2. Controlla sintassi Blade
3. Clear cache: `php artisan cache:clear`

#### Styles Not Loading
**Errore**: CSS Tailwind non applicato
**Soluzione**:
```bash
# Clear Vite cache
rm -rf node_modules/.vite
npm run build

# Clear Laravel cache
php artisan cache:clear
php artisan view:clear
```

---

## 📚 Documentazione Intera

### Documentazione del Tema
- **[📋 README](README.md)** - Questa guida principale del tema Two
- **[✅ Final Completion Report](final-completion-report.md)** - Report finale: 100% completamento della replica del sito target (6 Febbraio 2026)
- **[🔍 Website Differences Analysis](website-differences-analysis-and-fixes.md)** - Analisi dettagliata delle differenze e correzioni applicate
- **[🎯 Improvement Plan](improvement-plan.md)** - Piano completo di miglioramento per rendere TechPlanner ancora più bello del sito target
- **[🔍 Target Website Analysis](target-website-analysis.md)** - Analisi dettagliata del sito target e raccomandazioni di implementazione
- **[📖 Component Library](component-library.md)** - Libreria completa di tutti i componenti Blade disponibili
- **[🌐 SEO & Multilingual Guide](seo-multilingual-guide.md)** - Guida completa per SEO e ottimizzazione multilingua
- **[Modern UI Overhaul](modern-ui-overhaul.md)**
- **[MCP Integration Status](mcp-integration.md)**
- **[UI/UX Research](mcp-ui-ux.md)**
- **💰 AdSense Integration Guide](adsense-integration-guide.md)** - Guida per integrazione Google AdSense e monetizzazione

### Documentazione Esterna
- [Filament v5 Documentation](https://filamentphp.com/docs/5.x)
- [Tailwind CSS v4](https://tailwindcss.com/docs)
- [Laravel 12 Blade Components](https://laravel.com/docs/12.x/blade)
- [WCAG 2.1 Guidelines](https://www.w3.org/WAI/WCAG21/quickref/)

### Strumenti
- [Lighthouse](https://developer.chrome.com/docs/lighthouse)
- [Chrome DevTools](https://developer.chrome.com/docs/devtools)
- [Screen Reader Emulator](https://web.dev/browser)

---

## 🤝 Supporto

Per supporto o domande sul tema Two:
- **Documentazione**: Consulta questa guida
- **Issue Tracker**: Apri issue su GitHub
- **Community**: Partecipa alle discussioni sul progetto

---

*Questa documentazione è mantenuta attivamente dal team TechPlanner per garantire sempre informazioni aggiornate e precise.*