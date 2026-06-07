---
description: Charting libraries policy (Chart.js + JpGraph) and alternatives
---

# Charting libraries policy (Chart.js + JpGraph) and alternatives

## 🚨 CRITICAL: Chart.js Datalabels Positioning (Vertical vs Horizontal)

### For VERTICAL bars (default, no indexAxis)

- `anchor: 'end'` = TOP of the bar
- `align: 'bottom'` positions label INSIDE the bar ❌ WRONG!
- **SOLUTION**: Use OFFSET to stack labels above the bar:
  - Label 1: `anchor: 'end'`, `align: 'top'`, `offset: 4` (close to bar)
  - Label 2: `anchor: 'end'`, `align: 'top'`, `offset: 28` (stacked above)

### For HORIZONTAL bars (indexAxis: 'y')

- `anchor: 'end'` = RIGHT end of the bar
- `align: 'top'` = above the right end ✅
- `align: 'bottom'` = below the right end ✅
- NO offset needed - plugin handles spacing

### Formatter Best Practices

```javascript
// ✅ CORRECT - Primary value
formatter: function(v, ctx) {
    var value = Number(v) || 0;
    return value > 0 ? value.toLocaleString('it-IT') : '';
}

// ✅ CORRECT - Secondary value from custom property
formatter: function(v, ctx) {
    var votes = ctx.dataset.voteCounts?.[ctx.dataIndex] || 0;
    return votes > 0 ? votes.toLocaleString('it-IT') + ' voti' : '';
}

// ❌ WRONG - Hardcoded data access causes issues
formatter: function(v, ctx) {
    var value = ctx.dataset.data[ctx.dataIndex] || 0; // AVOID
    return value;
}
```

### RawJs Pattern (MANDATORY)

```php
// ✅ CORRECT - getOptions() returns ARRAY, RawJs only for formatters
protected function getOptions(): array
{
    return [
        'plugins' => [
            'datalabels' => [
                'formatter' => RawJs::make(<<<'JS'
                    function(v, ctx) { return Number(v).toLocaleString('it-IT'); }
                JS),
            ],
        ],
    ];
}

// ❌ WRONG - getOptions() returning RawJs breaks Livewire instantiation!
protected function getOptions(): RawJs
{
    return RawJs::make(<<<'JS'
    { plugins: { ... } }
    JS);
}
```

**WHY**: Livewire Factory instantiates widgets with `new $class()`. The base ChartWidget expects `getOptions()` to return `array`. Returning `RawJs` causes "Cannot call constructor" errors.

## Scope

This rule applies to:

- All modules under `laravel/Modules/*`
- All themes under `laravel/Themes/*`
- All Filament panels

## Default strategy in this codebase

- **Interactive charts in Filament UI:** use **Filament ChartWidgets (Chart.js)**.
- **Static charts for PDFs / server-side rendering:** use **JpGraph** via the existing actions/DTO pipeline in `Modules/Chart`.

## Critical architecture rule: Chart.js assets are centralized

- **Chart.js plugins and JS/CSS assets MUST be registered only in `Modules/Chart`.**
- Other modules and themes **MUST NOT** register Chart.js plugins via `FilamentAsset::register()`.
- Other modules and themes **MAY** only configure per-widget `getOptions()` (or equivalent) to *use* already-registered plugins.

Rationale:

- Avoid duplicated registrations and runtime conflicts.
- Keep a single source of truth for Vite inputs and Filament asset registration.

## Filament v5 plugin registration rule

With Filament v5:

- Use `window.filamentChartJsPlugins` (inline plugins) or `window.filamentChartJsGlobalPlugins` (global plugins).
- Do **not** rely on `Chart.register()` in application code.

## JpGraph: licensing (MUST READ)

JpGraph is dual-licensed:

- **Non-commercial usage:** QPL-1.0 ("Qt"/"QPL")
- **Commercial usage:** requires a **JpGraph Professional License**

Commercial usage includes (not exhaustive):

- Using it as part of a paid product/service
- Using it as a paid web service
- Using it internally for a commercial company/intranet above the vendor’s thresholds

**Policy:** before adopting or expanding JpGraph usage, validate the target deployment scenario against JpGraph licensing terms.

## When to use which library

### Use Chart.js (Filament) when

- You need interactivity (tooltips, hover, filters).
- You need responsive rendering in the browser.
- The chart is part of a Filament dashboard or page.

### Use JpGraph when

- You need server-side PNG generation for PDF embedding.
- You need deterministic rendering without a browser.
- You can accept static (non-interactive) charts.

### Prefer headless Chart.js export when

- You need the same visual style as the interactive dashboard.
- You already have complex Chart.js configuration that you want to reuse.
- You can depend on a headless browser pipeline (e.g., Browsershot) already used in the project.

## Alternatives to JpGraph / Chart.js (evaluation checklist)

Before introducing a new charting library, evaluate:

- **License compatibility** (commercial usage, redistribution).
- **Maintenance status** (active releases).
- **Rendering mode** (server-side image vs client-side JS).
- **PDF embedding friendliness** (PNG/SVG quality, font handling).
- **Operational complexity** (external binaries, Node runtime, SaaS dependency).

### Server-side (PHP) image generation alternatives

- **pChart** (GPL): good capabilities, but GPL may be incompatible depending on distribution model.
- **PHPlot** (server-side images): simpler; evaluate license/maintenance.
- **Libchart**: historically simple, but commonly considered **discontinued**.
- **Image-Charts** (SaaS): generates image charts from URLs; introduces external dependency and potential data/privacy constraints.

### Client-side (JS) alternatives

- **Apache ECharts** (Apache-2.0): feature-rich, good for large datasets.
- **Plotly.js** (MIT for OSS package): powerful but heavier.
- **Vega-Lite** (BSD-3-Clause): declarative grammar, strong for data-driven charts.
- **Highcharts** (commercial for business use): strong but licensing usually paid.

## Documentation requirements

- Update module docs in `Modules/Chart/docs/` for any change to chart pipelines.
- Update theme docs in `Themes/*/docs/` only for theme-level styling/layout concerns.
- Use lowercase kebab-case filenames (except `README.md` and `CHANGELOG.md`).
- Use relative links (no absolute filesystem paths).
