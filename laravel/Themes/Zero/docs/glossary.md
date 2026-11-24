---
title: "Glossario di dominio Theme Zero"
type: glossary
owner: Zero
updated: 2026-11-24
qmd: "glossario Theme Zero layout blocchi Folio Vite Tailwind manifest symlink pub_theme"
---

# Glossario di dominio Theme Zero

Termini di presentazione verificati. Se glossario e codice divergono vale il codice. Percorsi relativi a `laravel/Themes/Zero/`. I termini di dominio (survey, contatto, Pulse) stanno nei glossari dei moduli.

| Termine | Significato | Nel codice |
|---|---|---|
| Tema pubblico (`pub_theme`) | Nome del tema usato dal front office; Zero è il valore in `config/local/ptvx/xra.php`. Le view si risolvono in `Themes/<pub_theme>/resources/views`. | `laravel/config/local/ptvx/xra.php:14`, `Modules/Xot/app/Datas/XotData.php:350` |
| `theme.json` | Descrittore del tema: nome, tipo `pub`, `active`, `order`. | `theme.json` |
| Layout | Shell Blade delle pagine: `app`, `auth`, `guest`, `main`. | `resources/views/components/layouts/` |
| Layout principale | Layout HTML completo con meta tag dinamici e Open Graph. | `resources/views/components/layouts/main.blade.php` |
| Blocco | Sezione di contenuto riusabile: hero, cta, features, stats, testimonials, links, navigation, sidebar. | `resources/views/components/blocks/` |
| Pagina Folio | Pagina routata da file; i segmenti `[container0]` e `[slug0]` sono parametri. | `resources/views/pages/`, `resources/views/pages/[container0]/[slug0]/index.blade.php` |
| Widget di login | Vista Filament del widget di accesso. | `resources/views/filament/widgets/auth/login.blade.php` |
| Namespace traduzioni `pub_theme::` | Chiavi di traduzione del tema (`layout`, `welcome`, `auth`, ...) in `lang/<locale>/`. | `resources/views/components/layouts/guest.blade.php:54`, `lang/it/layout.php` |
| Entry Vite | Sorgenti compilati: `resources/css/app.css` e `resources/js/app.js`. | `vite.config.js:8-11` |
| Build directory `themes/Zero` | Secondo argomento di `@vite`: cartella degli asset compilati sotto il document root. | `resources/views/components/layouts/main.blade.php:46` |
| Manifest | File che mappa i sorgenti agli asset con hash; scritto in `public/manifest.json`. | `vite.config.js:21`, `public/manifest.json` |
| Symlink del tema | `public_html/themes/Zero` verso `laravel/Themes/Zero/public`, creato da `xot:theme-link`. | `Modules/Xot/app/Console/Commands/ThemeLinkCommand.php:24` |
| Tailwind / Flowbite / Alpine | Stack front end del tema. | `package.json`, `tailwind.config.js`, `resources/js/app.js:1-3` |
| Layout email | Template HTML per le mail (`base`, `christmas-professional`). | `resources/mail-layouts/` |
