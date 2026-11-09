---
title: "Wiki Log — Two"
type: log
theme: Two
tags: [two, wiki, log]
created: 2026-07-06
updated: 2026-11-06
---

# Wiki Log — Two

## [2026-11-06] lint index

- Corretta tabella concepts in index.md: rimossi riferimenti a
  `filament-xotbase-boundary` e `json-content-religion` (file inesistenti),
  aggiunti `mobile-navigation-contract` e `public-asset-deployment`

## [2026-07-06] bootstrap wiki

- Creati index.md e log.md con frontmatter YAML standard
- Aggiunte cartelle mancanti: commands/, entities/, memories/, queries/, rules/, skills/, summaries/, troubleshooting/

## 2026-11-08 — Allineamento doc deployment asset + PageSpeed

- `public_html/themes/Two` è symlink a `laravel/Themes/Two/public`: documentato come contratto ufficiale (deploy git-pull-only) in `concepts/public-asset-deployment.md` — la versione precedente lo vietava (era pre-symlink)
- Corretta la causa reale dei 404 immagini: nesting `public/themes/Two/images` invece di `public/images`; `sync-public` ora copia anche in `public_html/themes/Two/images`
- Rimossi gli 8 `@import` CSS Filament da `resources/css/app.css` (non servono al pubblico): rebuild 994KB→395KB
- Rimossi `@filamentScripts`/`@livewire('notifications')` da tutti i layout (main/base/app/404)
- Ricompresse 36 immagini `resources/images` 62MB→13MB
- `vite.config.ts` eliminato (emptyOutDir:true su config morta)
- `docs/asset-management.md`: corretto outDir e sezione Filament CSS
