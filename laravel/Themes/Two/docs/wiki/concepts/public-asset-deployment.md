---
title: "Theme Two public asset deployment"
type: concept
tags: [theme-two, vite, assets, deployment, public-html, symlink]
created: 2026-10-30
updated: 2026-11-11
qmd: "theme two vite public assets deployment public_html symlink images"
issues:
  - https://github.com/laraxot/base_techplanner_fila5/issues/4
discussions:
  - https://github.com/laraxot/base_techplanner_fila5/discussions/47
---

# Theme Two public asset deployment

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
