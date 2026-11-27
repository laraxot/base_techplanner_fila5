---
title: "Indice degli ADR — Theme Zero"
type: index
theme: Zero
status: active
updated: 2026-11-27
qmd: "Theme Zero ADR index decisioni asset auth tema"
---

# Indice degli ADR — Theme Zero

| ADR | Stato | Perché | Conferma |
|---|---|---|---|
| [0001-auth-pages-render-module-widgets-with-panel-css](0001-auth-pages-render-module-widgets-with-panel-css.md) | accepted | Le pagine auth del front office rendono i widget Filament del modulo User e caricano il CSS compilato del pannello. | Sì: `tests/Unit/ThemeBoundariesTest.php` |
| [0002-theme-as-dress-no-php](0002-theme-as-dress-no-php.md) | accepted | Zero non contiene classi PHP: modelli, widget e logica stanno nei moduli. | Sì: `tests/Unit/ThemeBoundariesTest.php` («nessun file .php in app/ o src/») |
| [0003-theme-assets-are-built-in-theme-and-served-by-symlink](0003-theme-assets-are-built-in-theme-and-served-by-symlink.md) | accepted | Gli asset si compilano in `Themes/Zero/public` e si servono con il symlink `public_html/themes/Zero` (`xot:theme-link`). | Manuale: `npm run build` + `xot:theme-link --dry-run` (nessun test automatico) |

`0000-template.md` è il template MADR, non una decisione.

Formato e regole: [README](README.md).
