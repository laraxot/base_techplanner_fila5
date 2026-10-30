# Theme Two Documentation

Tema attivo per Sottana Service: presentazione only (pagine Folio in `resources/views/pages/`, componenti Blade in `resources/views/components/`, asset Tailwind v4 + Vite). Nessun Controller: `app/` contiene solo `ThemeServiceProvider`.

- Ingresso e indice di tutta la docs (per argomento): [index.md](./index.md). `00-index.md` / `00-INDEX.md` sono indici storici superati.
- Note operative (stack, build): [theme.md](./theme.md).
- Regole pagine Folio: [folio-page-file-rules.md](./folio-page-file-rules.md); mai estendere `Filament*`: [concepts/xotbase-never-extend-filament.md](./concepts/xotbase-never-extend-filament.md).
- Wiki interna: [wiki/index.md](./wiki/index.md).
- Audit mobile misurato sul sito servito (axe, reflow 320 px, correzioni verificate, build mancante): [mobile-live-audit.md](./mobile-live-audit.md).

## Aggiornamenti
- Brand: Sottana Service
- Header: logo elefante e nome Sottana Service (`resources/views/components/sections/header/v1.blade.php`).
- Footer: nuovo brand e contatti (`resources/views/components/sections/footer/v2.blade.php`).
