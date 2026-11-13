---
title: "Theme Two public asset deployment"
type: concept
tags: [theme-two, vite, assets, deployment, public-html, symlink]
created: 2026-10-30
<<<<<<< .merge_file_dY3ESJ
updated: 2026-11-08
=======
updated: 2026-11-11
>>>>>>> .merge_file_TgS4qY
qmd: "theme two vite public assets deployment public_html symlink images"
issues:
  - https://github.com/laraxot/base_techplanner_fila5/issues/4
discussions:
  - https://github.com/laraxot/base_techplanner_fila5/discussions/47
---

# Theme Two public asset deployment

<<<<<<< .merge_file_dY3ESJ
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
=======
Dal 2026-11-11 Theme Two segue lo stesso schema di Zero e Sixteen: **symlink, niente copia**.

- Vite compila in `laravel/Themes/Two/public/` (`outDir: './public'`, `publicDir: false`).
- `npm run build` esegue anche `prepare-public`, che mette nella stessa cartella `images/`, `site.webmanifest` e
  `apple-touch-icon.png`.
- La document root vede il tema con il symlink versionato
  `public_html/themes/Two`, creato con `ln -s ../../laravel/Themes/Two/public` (uguale per Zero e Sixteen).
- `npm run copy` / `sync-public` non esistono più; la vecchia cartella `public/themes/Two` alla radice della repo è
  stata rimossa.

Il problema che aveva fatto scartare il symlink (immagini annidate in `/themes/Two/themes/Two/images/*`) non c'è più:
le immagini stanno in `public/images/`, quindi l'URL è `/themes/Two/images/...`, come nei componenti Blade e nei JSON
delle pagine. Verificato il 2026-11-11: tutte le immagini `themes/Two/...` citate dal tema e dai contenuti esistono.

Dopo una build:

```bash
cd laravel/Themes/Two && npm run build
test -f public/manifest.json
curl -I "$APP_URL/themes/Two/images/hero-bg.jpg"
```

Su un server dove `public_html/themes/Two` è ancora una cartella (vecchia copia), va tolta una volta prima del
`git pull`: `rm -rf public_html/themes/Two` (il pull crea il symlink).
>>>>>>> .merge_file_TgS4qY
