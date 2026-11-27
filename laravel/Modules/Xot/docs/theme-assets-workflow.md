---
title: "Theme assets workflow — CSS e JavaScript frontend"
type: note
status: active
updated: 2026-11-26
tags: [docs, xot, assets, themes, symlink, deploy]
qmd: "theme assets workflow css js frontend build symlink public_html vite"
related:
  - ../app/Console/Commands/ThemeLinkCommand.php
  - ../app/Console/Commands/ModuleLinkCommand.php
---

# Asset dei temi: build nel tema, symlink verso la document root

CSS e JavaScript del front office si modificano in
`laravel/Themes/<Tema>/resources`, si compilano nella cartella del tema e
producono asset in `laravel/Themes/<Tema>/public`. `public_html` è la document
root e non va cancellata né usata come destinazione di copie.

## Struttura

```text
laravel/Themes/<Tema>/resources  -> sorgenti
laravel/Themes/<Tema>/public     -> output Vite versionato
public_html/themes/<Tema>        -> ../../laravel/Themes/<Tema>/public
public_html/assets/<modulo>      -> ../../laravel/Modules/<Modulo>/public
```

I link sono relativi e si creano con `deploy.sh`,
`php artisan xot:theme-link` o `php artisan xot:module-link` (`--dry-run` per
controllare prima). Una cartella vera al posto del link viene preservata e
spostata nella directory di backup prevista dal deploy; non viene cancellata.

## Processo

```bash
cd laravel/Themes/<Tema>
npm install             # solo la prima volta
npm run dev             # sviluppo
npm run build           # produzione: scrive in ./public
```

`@vite([...], 'themes/<Tema>')` legge il manifest sotto
`public_html/themes/<Tema>/manifest.json`. Per i moduli, l'output pubblico vive
sempre in `Modules/<Modulo>/public`; `AssetAction` restituisce l'URL sotto
`/assets/<modulo>` e non copia file da `resources`.

## Non fare

- Non modificare a mano `public_html/`, `public/css/` o `public/js/`.
- Non eseguire `npm run build` dalla root Laravel per gli asset di un tema.
- Non sostituire i symlink con copie e non aggiungere un comando `copy` ai
  `package.json` dei temi.
- Non cancellare `public_html`: è la document root.

## Verifica

```bash
ls -la public_html/themes public_html/assets
test -L public_html/themes/<Tema>
test -f laravel/Themes/<Tema>/public/manifest.json
```

Per un modulo nuovo: creare `Modules/<Modulo>/public`, aggiungere il nome del
link al `.gitignore` di `public_html/assets`, poi eseguire il comando di link.

## Problemi comuni

| Sintomo | Controllo |
|---|---|
| `ViteManifestNotFoundException` | symlink e `public/manifest.json`, poi `npm run build` nel tema |
| modifiche non visibili | verificare che `public_html/themes/<Tema>` sia un symlink e svuotare la cache browser |
| CSS vecchio | build del tema non eseguita o output non versionato |
| asset modulo mancanti | `public_html/assets/<modulo>` e `Modules/<Modulo>/public` |

Il test `Modules/Xot/tests/Unit/Deploy/ModulePublicAssetsLinksTest.php` controlla
che i moduli con `public/` siano rappresentati nei link di deploy.
