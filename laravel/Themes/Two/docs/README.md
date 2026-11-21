---
title: "Tema Two — indice della documentazione"
type: index
theme: Two
created: 2026-01-20
updated: 2026-11-19
issues:
  - https://github.com/laraxot/base_techplanner_fila5/issues/64
---

# Tema Two — documentazione

<<<<<<< .merge_file_QMZI2k
Tema del sito pubblico **sottana.com** (Sottana Service, radioprotezione per studi dentistici e veterinari).
Solo presentazione: pagine Folio in `resources/views/pages/`, componenti Blade in `resources/views/components/`,
asset Tailwind v4 + Vite. Nessun controller: `app/` contiene solo `ThemeServiceProvider`. I contenuti delle pagine
stanno nei JSON di `laravel/config/local/techplanner/database/content/` (non nel tema).
=======
- Ingresso e indice di tutta la docs (per argomento): [index.md](wiki/index.md). `00-index.md` / `00-INDEX.md` sono indici storici superati.
- Note operative (stack, build): [theme.md](./theme.md).
- Regole pagine Folio: [folio-page-file-rules.md](./folio-page-file-rules.md); mai estendere `Filament*`: [concepts/xotbase-never-extend-filament.md](./concepts/xotbase-never-extend-filament.md).
- Wiki interna: [wiki/index.md](./wiki/index.md).
- Audit mobile misurato sul sito servito (axe, reflow 320 px, correzioni verificate, build mancante): [mobile-live-audit.md](./mobile-live-audit.md).
>>>>>>> .merge_file_gjUOav

Questo file è l'**unico indice** della docs del tema (i vecchi `00-index.md` / `00-INDEX.md` sono stati uniti qui).

## Da leggere per primi

- [Deploy e validazione](./deployment-and-validation.md) — produzione, auto-deploy.
- [Deploy degli asset pubblici](./wiki/concepts/public-asset-deployment.md) — `npm run build` scrive in
  `Themes/Two/public/`, servito dal symlink `public_html/themes/Two`; nessuna copia manuale.
- [Regole file pagine Folio](./folio-page-file-rules.md) · [Routing Folio](./architecture-folio-routing.md) ·
  [Pagine data-driven (JSON)](./architecture-data-driven-pages.md) · [Filosofia routing CMS](./cms-routing-philosophy.md)
- [Dati contatto e brand](./contatti-sottana-service.md)

## Aree

| Area | Documenti principali |
|------|----------------------|
| Build e asset | [asset-management](./asset-management.md), [vite-build-guide](./vite-build-guide.md), [main-files-organization-rule](./main-files-organization-rule.md) |
| Componenti | [component-library](./component-library.md), [header-nav-spec](./header-nav-spec.md), [footer-rules](./footer-rules.md), [navigazione mobile](./wiki/concepts/mobile-navigation-contract.md) |
| Mappe | [map-free-rules](./map-free-rules.md) (solo servizi gratuiti), [map-integration](./map-integration.md) |
| SEO | [seo-multilingual-guide](./seo-multilingual-guide.md), [seo-implementation-plan](./seo-implementation-plan.md), [seo/posizionamento-google](./seo/posizionamento-google.md) |
| Accessibilità | [wcag-compliance-plan](./wcag-compliance-plan.md), [wcag-techniques-resolution](./wcag-techniques-resolution.md), [wcag-audit-checklist](./wcag-audit-checklist.md), [wcag-mauve-audit-notes](./wcag-mauve-audit-notes.md), [mobile-live-audit](./mobile-live-audit.md) |
| Validazione e performance | [pagespeed-frontoffice-validation](./pagespeed-frontoffice-validation.md), [validation-in-depth](./validation-in-depth.md), [frontoffice-validation-batch](./frontoffice-validation-batch.md) |
| Privacy | [gdpr-privacy](./gdpr-privacy.md) |
| Prodotto | [prd](./prd.md), [product-roadmap](./product-roadmap.md) |
| Qualità | [ponytail-audit-over-engineering](./ponytail-audit-over-engineering.md), [documentation-philosophy](./documentation-philosophy.md) |
| Story BMAD | cartella [stories/](./stories/) — ultima: [audit-qualita](./stories/audit-qualita.story.md) |
| Wiki LLM | [wiki/index.md](./wiki/index.md), [wiki/log.md](./wiki/log.md) |

Molti altri file nella cartella (report `*-complete*`, `replication-*`, `target-*`, `footer-*`) sono **storici**:
descrivono la replica iniziale del sito target e non vanno presi come stato attuale del codice.

## Riferimenti fuori dal tema

- [Modulo Cms](../../../Modules/Cms/docs/README.md) · [Modulo UI](../../../Modules/UI/docs/README.md) ·
  [Modulo Xot](../../../Modules/Xot/docs/README.md)
- Indice dei temi: [Themes/docs/README.md](../../docs/README.md)
