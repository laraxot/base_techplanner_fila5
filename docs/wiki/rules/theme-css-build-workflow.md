---
paths:
  - "laravel/Themes/Sixteen/resources/**/*.css"
  - "laravel/Themes/Sixteen/resources/**/*.js"
  - "laravel/Themes/Sixteen/resources/**/*.blade.php"
  - "laravel/Themes/Sixteen/package.json"
---

# Theme CSS Build Workflow Rule

## REGOLA PERMANENTE: Per fix UI nel tema Sixteen — HTML parity + CSS + build

### Vincolo assoluto

1. HTML parity — correggere la struttura semantica nel Blade.
2. CSS — aggiornare `laravel/Themes/Sixteen/resources/css/app.css`.
3. Pubblicazione assets — dalla cartella tema eseguire **`npm run build:with-webroot`**, oppure **`npm run build`** poi **`npm run copy`**.

### Perché

Il tema Sixteen usa Vite per compilare gli asset. Le modifiche CSS non sono visibili nel
browser finché non si fa build. Il comando `npm run copy` copia i file compilati nella
cartella pubblica corretta (`../public_html/`).

### Comandi corretti

```bash
cd laravel/Themes/Sixteen
npm run build:with-webroot
```

Equivalente esplicito (due passaggi):

```bash
cd laravel/Themes/Sixteen
npm run build
npm run copy
```

### HTML parity

Prima del CSS: assicurarsi che la struttura HTML sia semanticamente corretta e in linea
con il Design System Bootstrap Italia. La parity visuale si ottiene prima con il markup
corretto, poi con il CSS.

### Applica a

- Qualsiasi fix visuale su pagine del tema (spacing, colori, layout)
- Fix su wizard, form, header, footer
- Componenti Blade del tema

### Errori comuni

- Modificare solo il CSS senza fare `npm run build` → le modifiche non compaiono
- Dimenticare `npm run copy` dopo `vite build` (o non usare `build:with-webroot`) → Laravel legge **`public_html/themes/Sixteen/manifest.json`**: gli hash restano vecchi mentre la build nel tema è nuova ([memoria vite/public_html](../memories/sixteen-vite-public-path-alpine-livewire-order.md))
- Lavorare sul CSS prima di correggere la struttura HTML → accumulo di hack

### File CSS

- `laravel/Themes/Sixteen/resources/css/app.css` — source CSS da modificare
- `laravel/Themes/Sixteen/public/assets/app-*.css` — output compilato (non modificare)

### Documentazione

- Wiki: `laravel/Themes/Sixteen/docs/wiki/concepts/css-build-workflow.md`
- Vite pubblicazione + alpine/Livewire: [memorie/sixteen-vite-public-path-alpine-livewire-order.md](../memories/sixteen-vite-public-path-alpine-livewire-order.md)
