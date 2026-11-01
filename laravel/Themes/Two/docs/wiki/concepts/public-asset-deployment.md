---
title: "Theme Two public asset deployment"
type: concept
tags: [theme-two, vite, assets, deployment, public-html]
created: 2026-10-30
updated: 2026-10-30
qmd: "theme two vite public assets deployment public_html sync images"
issues:
  - https://github.com/laraxot/base_techplanner_fila5/issues/4
discussions:
  - https://github.com/laraxot/base_techplanner_fila5/discussions/47
---

# Theme Two public asset deployment

Theme Two has one source-of-truth web tree: `laravel/public/themes/Two/`. The
runtime web root is `public_html/`, so deployment synchronizes that tree into
`public_html/themes/Two/`.

The theme must not use a symlink from `public_html/themes/Two` to
`Themes/Two/public`: that layout makes Vite assets available while nesting
static images at `/themes/Two/themes/Two/images/*`, which contradicts the URLs
emitted by the Blade components and page JSON.

The contract is encoded in `package.json`:

1. Vite builds into `../../../public/themes/Two`.
2. `resources/images/` is synchronized into the canonical public image folder.
3. The theme Web App Manifest and Apple touch icon are synchronized; Vite's
   `manifest.json` remains only a build index and is never advertised as a
   browser Web App Manifest.
4. `sync-public` copies the complete canonical tree to `public_html`.

After a build, verify both the manifest and a representative image:

```bash
npm run build
test -f ../../../public/themes/Two/manifest.json
curl -I "$APP_URL/themes/Two/images/hero-bg.jpg"
```

This keeps `@vite(..., 'themes/Two')`, `asset('themes/Two/images/...')`, and
the deployed filesystem on the same path contract.
