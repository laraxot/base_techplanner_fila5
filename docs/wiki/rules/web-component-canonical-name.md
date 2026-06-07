# Web Component Canonical Naming Rule

REGOLA: un componente Lit = un solo custom element name canonico. Quando un custom element non si registra → fixare l'**import**, NON il **nome**.

## Vincoli

- OBBLIGATORIO usare il nome canonico nei Blade, MAI alias o varianti
- VIETATO creare `<my-X>`, `<old-X>`, `<X-final>`, `<X-new>` per "compatibilità"
- VIETATO rinominare il tag nel Blade quando il browser non riconosce il custom element

## Workflow debug "custom element non registrato"

1. DevTools: `customElements.get('<name>')`
   - `undefined` → import mancante
   - classe → bug interno, non naming
2. Verifica import in `Themes/<Name>/resources/js/app.js`:
   `import '@modules/<Module>/resources/js/components/<name>.js';`
3. Build+copy: `cd laravel/Themes/<Name> && npm run build && npm run copy`
4. Cache: `cd laravel && php artisan optimize:clear`
5. Hard reload: `Ctrl+Shift+R`

MAI: rinominare il tag nel Blade come "fix".

## 1 file = 1 custom element

```js
class MapLit extends LitElement { ... }
customElements.define('map-lit', MapLit);   // UNICA registrazione
```

Per varianti usare **attribute** sullo stesso tag (`<map-lit mode="readonly">`), NON creare nuovi tag.

## Anti-pattern

| Pattern | Perché sbagliato |
|---|---|
| File alias proliferati (`-final.js`, `-new.js`, `.bak.js`) | Sincronizzazione manuale impossibile |
| Tag duplicati (`<my-map-lit>`, `<ticket-map-lit>`) | Bundle deve registrare N nomi per stesso comportamento |
| Cross-module Vite `Vite::asset()` per asset di altro modulo | Rompe single-bundle theme |
| Compat layer che importa `<old-X>` + `<new-X>` | `Custom element already defined` runtime error |

## Caso documentato `<map-lit>` (story 8-133)

- Canonical: `<map-lit>` da `Modules/Geo/resources/js/components/map-lit.js`
- Deprecated: `<geo-map-lit>`, `<my-map-lit>`, `<ticket-map-lit>`
- **Vietato fork tema:** `geo-map-lit-local.js` in Sixteen — vedi [no-theme-map-lit-fork.md](./no-theme-map-lit-fork.md)

Ref: `docs/wiki/concepts/web-component-canonical-naming.md` · `laravel/Modules/Geo/docs/wiki/concepts/map-lit-canonical-name.md`
