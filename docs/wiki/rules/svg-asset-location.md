---
paths:
  - "laravel/Modules/**/resources/svg/**/*.svg"
  - "laravel/Themes/**/resources/svg/**/*.svg"
  - "laravel/Modules/**/*.js"
  - "laravel/Themes/**/*.blade.php"
---

# SVG Asset Location Rule

## REGOLA PERMANENTE: SVG dentro resources/svg/

### Vincolo assoluto

```
OBBLIGATORIO: laravel/Modules/{NomeModulo}/resources/svg/
VIETATO: resources/img/svg/, resources/assets/svg/, public/images/, /public/svg/
```

Tutti gli SVG appartenenti a un modulo Laravel **devono** stare in:
```
laravel/Modules/{NomeModulo}/resources/svg/{nome-file}.svg
```

### Esempi corretti (già presenti nel progetto)

```
laravel/Modules/Activity/resources/svg/icon.svg
laravel/Modules/Activity/resources/svg/loading.svg
laravel/Modules/User/resources/svg/role.svg
laravel/Modules/User/resources/svg/user-profile.svg
```

### Applicazione al MapPicker / Geo

I marker SVG del MapPicker vanno in:
```
laravel/Modules/Geo/resources/svg/map-marker.svg
laravel/Modules/Geo/resources/svg/map-marker-active.svg
```

**Non** in:
- ~~`resources/img/markers/`~~
- ~~`public/images/markers/`~~
- ~~`public/vendor/geo/img/`~~

### Come vengono serviti

Gli SVG in `resources/svg/` possono essere:
1. **Usati inline** via `file_get_contents` o Blade `@svg()` helper
2. **Importati in JS/Lit** come stringa raw (con Vite `?raw`)
3. **Pubblicati** via `php artisan vendor:publish` se necessario

### Validazione

```bash
# Cerca SVG fuori dalla posizione corretta nei moduli
find laravel/Modules -name "*.svg" | grep -v "/resources/svg/" | grep -v "/public/"
# Deve ritornare 0 risultati per file SVG proprietari dei moduli
```

### Riferimenti

- Convenzione osservata in `Activity`, `User` e tutti i moduli principali
- Aggiornato in: `memory/feedback_svg_asset_location.md`, `Geo/docs/wiki/concepts/svg-asset-architecture.md`
