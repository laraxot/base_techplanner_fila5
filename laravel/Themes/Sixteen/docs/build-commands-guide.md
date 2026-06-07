<<<<<<< HEAD
# Guida ai Comandi di Build - Tema Sixteen

## Panoramica

Questa guida descrive i comandi necessari per buildare e pubblicare il tema Sixteen con supporto completo per Filament 4.x.

## Prerequisiti

### Dipendenze Richieste

- **Node.js**: 16+ (raccomandato 18+)
- **NPM**: 8+ (raccomandato 9+)
- **Composer**: 2.0+
- **PHP**: 8.1+

### Verifica Installazione

```bash
# Verificare versioni
node --version
npm --version
composer --version
php --version
```

## Comandi di Build

### 1. Preparazione Ambiente

```bash
# Navigare nella cartella del tema Sixteen
cd laravel/Themes/Sixteen

# Verificare struttura
ls -la
```

### 2. Installazione Dipendenze

```bash
# Installare dipendenze NPM
npm install

# Installare dipendenze Composer (se necessario)
composer install

# Verificare installazione
npm list --depth=0
composer show --installed
```

### 3. Build degli Asset

#### Build per Sviluppo

```bash
# Build con watch mode per sviluppo
npm run dev

# Build una tantum per sviluppo
npm run build
```

#### Build per Produzione

```bash
# Build ottimizzato per produzione
npm run build:production

# Build con analisi del bundle
npm run build:analyze

# Build con compressione
npm run build -- --minify
```

### 4. Pubblicazione Asset

```bash
# Copiare asset compilati nella directory pubblica
npm run copy

# Watch mode per sviluppo (copia automatica)
npm run copy:watch
```

## Configurazione Avanzata

### 1. Script NPM Personalizzati

Il tema Sixteen include script personalizzati per diverse esigenze:

```json
{
  "scripts": {
    "dev": "vite",
    "build": "vite build",
    "build:analyze": "vite build --mode analyze",
    "build:production": "vite build --mode production",
    "preview": "vite preview",
    "copy": "cp -r ./public/* ../../../public_html/themes/Sixteen/",
    "copy:watch": "nodemon --watch ./public --exec 'npm run copy'",
    "lint": "eslint resources/js/**/*.js",
    "lint:fix": "eslint resources/js/**/*.js --fix",
    "format": "prettier --write resources/**/*.{js,css,blade.php}",
    "test": "jest",
    "test:watch": "jest --watch",
    "analyze": "vite build --mode analyze",
    "analyze:serve": "npx serve dist",
    "bundle-report": "npm run analyze && open dist/stats.html"
=======
# Build Commands - Sixteen Theme

**Type**: Build & Deployment Documentation  
**Status**: ✅ Documented  
**Last Update**: 2026-05-26 - Added Canonical Auth Pattern Rule
**Related**: [[00-index]], [[layout-hierarchy]], [[vite-configuration-rules]]

---

## 🎯 Overview

The Sixteen theme uses **Vite** for building CSS and JavaScript assets.

---

## 🔑 Canonical Patterns

### Auth Pages — Use Filament Livewire Widgets (NOT raw Volt)

**✅ CORRECT:**
```blade
<x-layouts.app>
    <x-slot name="title">
        {{ __('user::auth.register.page.meta_title.label') }}
    </x-slot>
    @livewire(\Modules\User\Filament\Widgets\Auth\RegisterWidget::class)
</x-layouts.app>
```

**❌ WRONG:**
```blade
<x-layouts.guest>
    @volt('auth.register')
    <!-- manual form + validation -->
    @endvolt
</x-layouts.guest>
```

**Rule**: Auth forms must use `Modules\User\Filament\Widgets\Auth\*` widgets.
Never use raw Volt forms for authentication — you'll bypass validation, translation, and security.

---

## 📦 Build Process

### Step 1: Composer Dependencies
```bash
cd laravel/Themes/Sixteen
composer update -W
```

**What it does**:
- Updates PHP dependencies
- Ensures compatibility with Laravel packages
- Updates `composer.lock` file

**Expected output**:
```
Loading composer repositories with package information
Updating dependencies
Nothing to modify in lock file
Writing lock file
Installing dependencies from lock file
```

### Step 2: NPM Dependencies
```bash
npm install
```

**What it does**:
- Installs JavaScript dependencies
- Installs Tailwind CSS, Alpine.js, PostCSS
- Creates `node_modules/` directory

**Expected output**:
```
up to date, audited 540 packages in 3s
85 packages are looking for funding
```

### Step 3: Build Assets
```bash
npm run build
```

**What it does**:
- Compiles Tailwind CSS
- Bundles JavaScript with Alpine.js
- Generates `manifest.json`
- Outputs to `public/` directory

**Expected output**:
```
vite v7.3.1 building client environment for production...
✓ 3 modules transformed.
public/manifest.json              0.33 kB │ gzip:  0.17 kB
public/assets/app-C1huuq--.css  145.43 kB │ gzip: 21.50 kB
public/assets/app-DR9d2vyK.js    46.65 kB │ gzip: 16.76 kB
✓ built in 3.90s
```

**Files generated**:
- `public/manifest.json` - Vite manifest for asset versioning
- `public/assets/app-*.css` - Compiled CSS
- `public/assets/app-*.js` - Bundled JavaScript

### Step 4: Copy to Public Directory
```bash
npm run copy
```

**What it does**:
- Copies built assets from `public/` to `../../public_html/themes/Sixteen/`
- Makes assets accessible to Laravel

**Expected output**:
```
> sixteen@0.0.0 copy
> cp -r ./public/* ../../public_html/themes/Sixteen/
```

**Files copied**:
```
public_html/themes/Sixteen/
├── manifest.json          ← Vite manifest
├── assets/
│   ├── app-*.css         ← Compiled CSS
│   └── app-*.js          ← Bundled JS
├── dist/                  ← Additional assets
└── images/                ← Theme images
```

---

## 🔧 Complete Build Command (One-Liner)

```bash
cd laravel/Themes/Sixteen && composer update -W && npm install && npm run build && npm run copy
```

---

## 📁 File Structure

### Source Files
```
laravel/Themes/Sixteen/
├── resources/
│   ├── css/
│   │   └── app.css           ← Tailwind CSS source
│   └── js/
│       └── app.js            ← JavaScript source (Alpine.js)
├── public/                   ← Build output (temporary)
│   ├── manifest.json
│   └── assets/
└── package.json              ← NPM configuration
```

### Public Files (After Build)
```
public_html/themes/Sixteen/
├── manifest.json             ← Used by @vite() helper
├── assets/
│   ├── app-C1huuq--.css     ← Compiled CSS
│   └── app-DR9d2vyK.js      ← Bundled JS
├── dist/                     ← Additional assets
└── images/                   ← Theme images
```

---

## 🎯 Vite Configuration

### vite.config.js
```javascript
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { resolve } from 'path';

export default defineConfig({
    build: {
        outDir: 'public',
        emptyOutDir: false,
    },
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            publicDirectory: 'public',
            buildDirectory: 'assets',
        }),
    ],
});
```

### package.json Scripts
```json
{
    "scripts": {
        "dev": "vite",
        "build": "vite build",
        "copy": "cp -r ./public/* ../../public_html/themes/Sixteen/"
    }
}
```

---

## 🎨 Blade Usage

### In Layout Files
```blade
{{-- resources/views/layouts/main.blade.php --}}
<head>
    @filamentStyles
    @vite(['resources/css/app.css'], 'themes/Sixteen')
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/cookie-consent/css/cookie-consent.css') }}">
    @stack('styles')
</head>
<body>
    {{ $slot }}
    @yield('body')
    <livewire:toast />
    @livewire('notifications')
    @filamentScripts
    @vite(['resources/js/app.js'], 'themes/Sixteen')
    @stack('scripts')
</body>
```

### CRITICAL: No Inline Scripts or CDN Imports

**NEVER**:
```blade
<!-- ❌ NO inline JavaScript - violates CSP -->
<script>
    // This is legacy code - WIPE IT OUT
</script>

<!-- ❌ NO CDN imports - bootstrap-italia is local -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-italia@...">

<!-- ❌ NO separate Vite entry for theme JS -->
@vite(['resources/js/theme/header-mobile-nav.js'], 'themes/Sixteen')
```

**Why**:
- Vite compiles all JS into `resources/js/app.js` 
- `header-mobile-nav.js` is already imported in `app.js` line 16
- CDN imports break CSP and caching
- Inline scripts bypass Vite optimization

### How @vite() Works
1. Reads `public_html/themes/Sixteen/manifest.json`
2. Maps `resources/css/app.css` → `assets/app-C1huuq--.css`
3. Maps `resources/js/app.js` → `assets/app-DR9d2vyK.js`
4. Adds cache-busting hashes to filenames

---

## ⚠️ Common Issues

### Issue 1: Vite Manifest Not Found
**Error**: `Vite manifest not found at: public_html/themes/Sixteen/manifest.json`

**Solution**:
```bash
cd laravel/Themes/Sixteen
npm run build
npm run copy
```

**Why**: The manifest.json is generated during build and must be copied to the public directory.

### Issue 2: Assets Not Loading
**Error**: CSS/JS files return 404

**Solution**:
1. Check `npm run copy` was executed
2. Verify files exist in `public_html/themes/Sixteen/`
3. Clear Laravel cache: `php artisan cache:clear`

### Issue 3: CSS @import Order
**Warning**: `@import rules must precede all rules aside from @charset and @layer`

**Solution**: Move `@import` statements to top of `app.css`:
```css
/* ✅ CORRECT */
@import url('https://fonts.googleapis.com/css2?family=Titillium+Web&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap');
@import "tailwindcss";

/* Rest of CSS */
```

---

## 🧪 Verification Checklist

After build, verify:

- [ ] `public_html/themes/Sixteen/manifest.json` exists
- [ ] `public_html/themes/Sixteen/assets/*.css` exists
- [ ] `public_html/themes/Sixteen/assets/*.js` exists
- [ ] Page loads without Vite errors
- [ ] CSS styles are applied correctly
- [ ] JavaScript (Alpine.js) works
- [ ] No console errors in browser

---

## 🚀 Development vs Production

### Development (npm run dev)
```bash
npm run dev
```
- Hot Module Replacement (HMR)
- No manifest.json needed
- Direct file serving
- Faster rebuilds

### Production (npm run build)
```bash
npm run build && npm run copy
```
- Minified CSS/JS
- Cache-busting hashes
- manifest.json required
- Optimized for performance

---

## 📊 Build Output Example

### manifest.json
```json
{
  "resources/css/app.css": {
    "file": "assets/app-C1huuq--.css",
    "src": "resources/css/app.css",
    "isEntry": true
  },
  "resources/js/app.js": {
    "file": "assets/app-DR9d2vyK.js",
    "src": "resources/js/app.js",
    "isEntry": true
>>>>>>> dev
  }
}
```

<<<<<<< HEAD
### 2. Configurazione Vite

Il file `vite.config.js` è configurato per supportare Filament 4.x:

```javascript
import { defineConfig } from 'vite';
import laravel, { refreshPaths } from 'laravel-vite-plugin'

export default defineConfig({
    build: {
        outDir: './public',
        emptyOutDir: false,
        manifest: 'manifest.json',
    },
    ssr: {
        noExternal: ['chart.js/**']
    },
    plugins: [
        laravel({
            publicDirectory: '../../../public_html/',
            input: [
                __dirname + '/resources/css/app.css',
                __dirname + '/resources/js/app.js',
            ],
            refresh: [
                ...refreshPaths,
                'app/Livewire/**',
            ],
        }),
    ],
    resolve: {
        alias: {
            '@': '/resources',
        },
    },
});
```

### 3. Configurazione Tailwind

Il file `tailwind.config.js` include il preset Filament 4.x:

```javascript
import defaultTheme from 'tailwindcss/defaultTheme';
import preset from "./vendor/filament/support/tailwind.config.preset";

module.exports = {
    presets: [preset], // Preset Filament 4.x
    darkMode: 'class',
    theme: {
        extend: {
            // Configurazione personalizzata
        },
    },
    content: [
        // Paths Filament 4.x
        '../../app/Filament/**/*.php',
        '../../resources/views/**/*.blade.php',
        '../../vendor/filament/**/*.blade.php',
        // Paths tema Sixteen
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        // Paths moduli
        "../../Modules/**/Filament/**/*.php",
        "../../Modules/**/resources/views/**/*.blade.php",
        // Paths temi
        "../../Themes/**/resources/views/**/*.blade.php",
    ],
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
        require('daisyui'),
        require("flowbite/plugin"),
    ],
};
```

## Workflow di Sviluppo

### 1. Sviluppo Locale

```bash
# Avviare watch mode per sviluppo
npm run dev

# In un altro terminale, avviare watch mode per copia
npm run copy:watch
```

### 2. Test e Linting

```bash
# Eseguire linting
npm run lint

# Correggere errori di linting
npm run lint:fix

# Formattare codice
npm run format

# Eseguire test
npm run test

# Eseguire test in watch mode
npm run test:watch
```

### 3. Analisi Bundle

```bash
# Analizzare dimensioni bundle
npm run analyze

# Servire report di analisi
npm run analyze:serve

# Generare report completo
npm run bundle-report
```

## Troubleshooting

### 1. Errori di Build

#### Errore: "Cannot find module"

```bash
# Pulire node_modules e reinstallare
rm -rf node_modules package-lock.json
npm install
```

#### Errore: "Vite manifest not found"

```bash
# Verificare che il build sia stato eseguito
npm run build

# Verificare che il copy sia stato eseguito
npm run copy
```

#### Errore: "Tailwind CSS not found"

```bash
# Verificare configurazione Tailwind
npx tailwindcss --init

# Verificare che le dipendenze siano installate
npm install @tailwindcss/forms @tailwindcss/typography
```

### 2. Errori di Pubblicazione

#### Errore: "Permission denied"

```bash
# Verificare permessi directory
ls -la ../../../public_html/themes/

# Correggere permessi se necessario
chmod -R 755 ../../../public_html/themes/Sixteen/
```

#### Errore: "Directory not found"

```bash
# Creare directory se non esiste
mkdir -p ../../../public_html/themes/Sixteen/

# Verificare struttura
ls -la ../../../public_html/themes/
```

### 3. Errori di Configurazione

#### Errore: "Vite config not found"

```bash
# Verificare che il file esista
ls -la vite.config.js

# Verificare sintassi
node -c vite.config.js
```

#### Errore: "Tailwind config not found"

```bash
# Verificare che il file esista
ls -la tailwind.config.js

# Verificare sintassi
npx tailwindcss --config tailwind.config.js --input input.css --output output.css
```

## Best Practices

### 1. Ordine dei Comandi

Sempre eseguire i comandi in questo ordine:

1. `npm install` - Installare dipendenze
2. `npm run build` - Buildare asset
3. `npm run copy` - Pubblicare asset

### 2. Verifica Build

Dopo ogni build, verificare:

```bash
# Verificare che i file siano stati generati
ls -la public/

# Verificare che i file siano stati copiati
ls -la ../../../public_html/themes/Sixteen/

# Verificare che il manifest sia presente
cat public/manifest.json
```

### 3. Pulizia Cache

Se si verificano problemi, pulire le cache:

```bash
# Pulire cache Laravel
php artisan view:clear
php artisan config:clear
php artisan cache:clear

# Pulire cache Vite
rm -rf public/hot
rm -rf public/build
```

### 4. Monitoraggio Performance

```bash
# Monitorare dimensioni bundle
npm run build:analyze

# Verificare performance build
time npm run build

# Verificare dimensioni file finali
du -sh ../../../public_html/themes/Sixteen/
```

## Automazione

### 1. Script di Build Completo

Creare uno script `build.sh`:

```bash
#!/bin/bash

echo "🚀 Avvio build tema Sixteen..."

# Navigare nella cartella del tema
cd laravel/Themes/Sixteen

# Installare dipendenze
echo "📦 Installazione dipendenze..."
npm install

# Build asset
echo "🔨 Build asset..."
npm run build

# Pubblicare asset
echo "📤 Pubblicazione asset..."
npm run copy

echo "✅ Build completato!"
```

### 2. Script di Sviluppo

Creare uno script `dev.sh`:

```bash
#!/bin/bash

echo "🚀 Avvio sviluppo tema Sixteen..."

# Navigare nella cartella del tema
cd laravel/Themes/Sixteen

# Avviare watch mode
echo "👀 Avvio watch mode..."
npm run dev &

# Avviare watch mode per copia
echo "📤 Avvio watch mode per copia..."
npm run copy:watch &

echo "✅ Sviluppo avviato!"
echo "Premi Ctrl+C per fermare"
```

## Collegamenti

- [Configurazione Stili Filament 4.x](filament-4x-styles-configuration.md)
- [Regole Critiche](critical-rules.md)
- [Configurazione Vite](vite-configuration-rules.md)
- [Documentazione Vite](https://vitejs.dev/guide/)
- [Documentazione Tailwind CSS](https://tailwindcss.com/docs)

---

**Ultimo aggiornamento**: Gennaio 2025
**Versione**: 1.0
**Compatibilità**: Filament 4.x, Vite 6.x, Tailwind CSS 3.x
=======
### File Sizes
```
public/manifest.json              0.33 kB │ gzip:  0.17 kB
public/assets/app-C1huuq--.css  145.43 kB │ gzip: 21.50 kB
public/assets/app-DR9d2vyK.js    46.65 kB │ gzip: 16.76 kB
```

---

## 🔗 Related Documentation

### Internal
- [[00-index]] - Main documentation index
- [[layout-hierarchy]] - Layout architecture
- [[vite-configuration-guide]] - Vite configuration (WHY `outDir: './public'`)
- [[components-directory-structure]] - Component organization

### External
- [Vite Documentation](https://vitejs.dev/)
- [Laravel Vite Plugin](https://laravel.com/docs/vite)
- [Tailwind CSS](https://tailwindcss.com/docs)

---

## 📝 Changelog

| Date | Version | Change | Author |
|------|---------|--------|--------|
| 2026-04-01 | 1.0 | Initial documentation | AI Agent Team |
| 2026-04-01 | 1.1 | Added troubleshooting section | AI Agent Team |

---

*Documentation conforme agli standard Laraxot - DRY + KISS compliant*
>>>>>>> dev
