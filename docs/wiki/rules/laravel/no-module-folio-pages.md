# Rule: Modules Must Not Have Folio Pages for Front-Office Routes

## Applies to: All modules

## Rule

**Modules MUST NOT have Folio page files** (`resources/views/pages/`) for routes that are
handled by the theme's catch-all pages.

The theme (`Themes/TwentyOne/resources/views/pages/`) is the **sole owner** of front-office routing.

## Why

`FolioVoltServiceProvider` registers **both** the theme path and **all module** `resources/views/pages/`
paths as Folio roots. Folio resolves routes by **first match** — a module page like
`Modules/Predict/resources/views/pages/predicts/[slug].blade.php` wins over the theme's
`[container0]/[slug0]/index.blade.php`, bypassing the CMS block system entirely.

## Correct architecture

```
URL /it/predicts/{slug}
  → Folio: Themes/TwentyOne/pages/[container0]/[slug0]/index.blade.php  ✅
      → ResolvePageAction → CMS blocks → Filament Widgets
```

## Wrong

```
URL /it/predicts/{slug}
  → Folio: Modules/Predict/pages/predicts/[slug].blade.php  ❌
      → bypasses CMS, bypasses theme, bypasses Filament Widgets
```

## What modules CAN have in resources/views/pages/

Only pages that have **no theme equivalent** — e.g. module-specific admin utilities,
or pages registered under a unique prefix not covered by `[container0]/[slug0]`.

## Action when a module page conflicts

Rename the conflicting file to `.blade.php.old` to disable it from Folio routing.
Document the reason in the module's `docs/` directory.
