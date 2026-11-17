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
- 2026-11-09 — Fix login FO: @filamentScripts(withCore:true) ri-aggiunto in components/layouts/base (rimosso per errore: senza, Alpine filamentSchema/passwordReveal non definiti → password in chiaro). CSS: @filamentStyles non copre le FO (nessun panel) → ogni widget auth User pusha @push(head) link a /css/filament/filament/app.css (auto-provisioning). Verificato headless: 0 errori console, type=password→text al toggle, wrapper fi-input-wrp 8px/bianco, label IT.
