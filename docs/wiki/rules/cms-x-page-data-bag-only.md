# Rule: `<x-page>` — solo data bag

Mirror di `.cursor/rules/cms-x-page-data-bag-only.mdc` per agenti bashscripts/QMD.

## Canon

```blade
<x-page side="content" :slug="$pageSlug" :data="$data" />
```

Contesto route (`container0`, `slug0`, …) **solo** in `$data` preparato in Volt `mount()`.

## Vietato

`:container0`, `:slug0`, o qualsiasi segmento come prop di `<x-page>`.

## SSoT

- [docs/wiki/decisions/cms-x-page-opaque-data-bag.md](../../docs/wiki/decisions/cms-x-page-opaque-data-bag.md)
- [docs/wiki/architecture/cms-page-shell-data-bag.md](../../docs/wiki/architecture/cms-page-shell-data-bag.md)
