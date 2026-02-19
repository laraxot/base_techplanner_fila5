# Report validazione W3C Nu Validator - Frontoffice

Ultima esecuzione script: 9 pagine (sottana.net).

## Risultati per pagina

| Pagina     | Errori | Warning |
|------------|--------|--------|
| home       | 1      | 1      |
| contatti   | 1      | 1      |
| servizi    | 1      | 1      |
| chi-siamo  | 0      | 0      |
| blog       | 1      | 1      |
| faq        | 1      | 1      |
| privacy    | 1      | 1      |
| termini    | 1      | 1      |
| cookie     | 1      | 1      |
| **Totali** | **8**  | **8**  |

(Il conteggio per pagina è quello stampato dallo script: 1 error + 1 warning per pagina con problemi; chi-siamo risulta pulita.)

## File generati

- `reports/validation/{slug}.html` — HTML scaricato per ogni URL.
- `reports/validation/{slug}-w3c.json` — Risposta JSON del Nu Validator per ogni pagina.

## Categorie di messaggi (sintesi)

- **Alpine.js**: `x-data`, `:class`, `@click`, `x-show`, `x-transition:*` — “not allowed” / “not serializable as XML 1.0”.
- **Livewire**: `wire:key`, `wire:snapshot`, `wire:effects`, `wire:id`, `wire:name` — “not allowed”.
- **Trailing slash**: void elements con `/>` — info.
- **iframe**: `width="100%"` / `height="100%"`; iframe dentro `<a>` — da correggere.
- **Duplicate `class`**: due attributi `class` sullo stesso elemento — da correggere.
- **Heading**: h4 dopo h2 senza h3 — da correggere.
- **`<style>` in body** — da correggere.

Dettaglio procedure e priorità: [validation-in-depth.md](../../laravel/Themes/Two/docs/validation-in-depth.md).

## Come rieseguire

Dalla root del progetto:

```bash
./bashscripts/validation/validate-frontoffice-w3c.sh
```

Elenco URL: `docs/pagespeed-frontoffice-urls.txt`.
