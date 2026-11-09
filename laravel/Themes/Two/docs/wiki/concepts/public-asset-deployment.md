---
title: "Theme Two public asset deployment"
type: concept
tags: [theme-two, vite, assets, deployment, public-html, symlink]
created: 2026-10-30
updated: 2026-11-08
qmd: "theme two vite public assets deployment public_html symlink images"
issues:
  - https://github.com/laraxot/base_techplanner_fila5/issues/4
discussions:
  - https://github.com/laraxot/base_techplanner_fila5/discussions/47
---

# Theme Two public asset deployment

## Il contratto attuale (verificato 2026-11-08)

Il docroot HTTP è `public_html/` (`App\Application::publicPath()`). Per il tema
Two vale:

```
public_html/themes/Two  ->  laravel/Themes/Two/public   (symlink)
```

**Perché il symlink**: deploy git-pull-only. Tutto ciò che è committato in
`Themes/Two/public/` (theme repo) è servito immediatamente sotto
`/themes/Two/*` senza step di copia sul server (Hostinger condiviso, niente
build rsync). URL e filesystem coincidono: `asset('themes/Two/images/x.jpg')`
→ `public_html/themes/Two/images/x.jpg` → `Themes/Two/public/images/x.jpg`.

**Conseguenza operativa**: i file in `Themes/Two/public/` devono essere
**committati nel theme repo** — è l'unico modo con cui arrivano in produzione.

## Pipeline di build

1. `vite build` (in `Themes/Two`) → outDir `<repo>/public/themes/Two/`
   (`vite.config.js`, `emptyOutDir: false`)
2. `resources/images/` → copiate in `Themes/Two/public/images/` (publicDir di
   Vite: URL stabili per il CMS JSON, non hashati)
3. `npm run sync-public` copia l'albero outDir in `public_html/themes/Two/`
   — `cp` attraversa il symlink e atterra in `Themes/Two/public/`

`vite.config.ts` è stato eliminato: era una configurazione morta con
`emptyOutDir: true` che, se usata, avrebbe svuotato l'albero pubblicato.

## Regole

- **Mai nidificare** `themes/Two/` dentro `Themes/Two/public/` — genera URL
  `/themes/Two/themes/Two/images/*` e 404 (bug storico, corretto 2026-11-08).
- Immagini: sorgente `resources/images/` (git), copia servita
  `public/images/` (git, publicDir). Ricompressre alla fonte, poi `npm run build`.
- `manifest.json` in `public/` è il build index di Vite, non il Web App
  Manifest (quello è `site.webmanifest`).
- Vecchi hash `app-*.css` si accumulano in `public/assets/` per le pagine
  cacheate — non cancellare a mano.

## Verifica post-build

```bash
cd laravel/Themes/Two && npm run build
curl -I "https://sottana.com/themes/Two/images/hero-bg.jpg"   # 200 image/jpeg
curl -s https://sottana.com/it | grep -o 'themes/Two/assets/app-[^"]*'
```
