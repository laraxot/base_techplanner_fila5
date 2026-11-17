# Conflict resolution — theme two

## Scopo

Ripristinare il frontoffice Folio (`/it`) dopo collisioni Git senza `git checkout`/`restore`: patch manuale forward-only, allineata a `dev` come riferimento read-only.

## Catena errori tipica su `/it`

| Ordine | Sintomo log | Causa | Fix |
|--------|-------------|-------|-----|
| 1 | `ParseError: unexpected token "<<"` in `pages/index.blade.php` | Marker Git in Folio homepage | Pattern Laraxot: `name('home')` + `<x-page side="content" slug="home" />` |
| 2 | `Vite manifest not found` in `layouts/main.blade.php` | Layout corrotto dal merge (doppio HTML + `@vite` senza `themes/Two`) | Ricostruire `main`/`app`/`base` da riferimento `dev` |
| 3 | `MultipleRecordsFoundException: 2 records` in `HasBlocks::getBlocksBySlug` | Doppi JSON Sushi in `config/local/.../sections/` (`1.json` + `header.json`) | Tenere solo `header.json` / `footer.json`; eliminare stub `1.json` / `2.json` |
| 4 | JSON CMS invalido (`Expecting ',' delimiter`) | Due lati merge concatenati in un file | Ripristino contenuto valido da `dev` via patch (mai redirect `git show > file`) |

## File critici theme two

- `resources/views/pages/index.blade.php`
- `resources/views/components/layouts/{app,main,base}.blade.php`
- `src/ThemeServiceProvider.php`
- `vite.config.js`, `package.json`
- `config/local/techplanner/database/content/pages/home.json`
- `config/local/techplanner/database/content/sections/{header,footer}.json`

## Verifica

```bash
rg '^<<<<<<< ' laravel/Themes/Two
curl -sI http://127.0.0.1:8000/it | head -1
python3 -m json.tool laravel/config/local/techplanner/database/content/sections/header.json
cd laravel && php artisan view:clear
```

## Backlink

- [git merge marker sweep](../../../../docs/wiki/how-to/git-merge-marker-sweep.md)
- [git forward only](../../../../docs/wiki/rules/git-forward-only.md)
- [vite build guide](./vite-build-guide.md)
- [folio json dynamic pages](./folio-json-dynamic-pages-philosophy.md)