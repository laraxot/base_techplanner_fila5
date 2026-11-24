---
title: "INDEX contratti — Theme Zero"
type: index
owner: Zero
updated: 2026-11-24
qmd: "Theme Zero contract INDEX backlog presentation-contract layout"
---

# INDEX contratti — Theme Zero

| Operazione | Contract | Classe | Invarianti | Copertura | Comando |
|---|---|---|---|---|---|
| — | Nessun contract (vedi [README](README.md)) | — | — | — | — |

Verifica: il tema non ha cartella `tests/` e `rg -n "group\('ZERO-" laravel/Themes/Zero` non dà risultati (2026-11-24).

## Backlog contract

Superfici di presentazione candidate, solo se diventano componenti con classe:

- Layout `resources/views/components/layouts/{app,auth,guest,main}.blade.php` (shell delle pagine; `guest` e `auth` esistono solo in Zero).
- Pagine di autenticazione `resources/views/pages/auth/{login,register}.blade.php` e widget `resources/views/filament/widgets/auth/login.blade.php`.

Totale Action di dominio: 0. Viste Blade del tema: 26 file `.blade.php`.
