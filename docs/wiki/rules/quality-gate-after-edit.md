# Quality Gate — After Edit (PHP/Blade/JS/CSS)

REGOLA: dopo ogni modifica, eseguire static analysis + verifica visuale nel browser. NO "fixed" senza browser check.

## JavaScript / Lit / Geo (`Modules/Geo` + tema Sixteen)

Dopo modifiche a `laravel/Modules/Geo/resources/js/**` o asset consumati dal tema:

1. `cd laravel/Themes/Sixteen && npm run build` — **obbligatorio** prima di considerare la modifica valida; senza questo non si può affermare che la bundler pipeline sia OK.
2. Se il flusso di deploy usa anche `npm run copy`, eseguirlo secondo la convenzione del progetto (vedi [map-js-module-naming-rule](../../../laravel/Modules/Geo/docs/wiki/concepts/map-js-module-naming-rule.md#build-e-verifica)).

## Sequenza obbligatoria (PHP / Blade)

1. `phpstan analyse <file> --level=max` (`/home/zorin/.local/bin/phpstan.phar`)
2. `phpmd <file> text unusedcode,design,codesize` (`/home/zorin/.local/bin/phpmd.phar`)
3. `cd laravel && php artisan insights Modules\\<Name>` (fix auto)
4. **APRIRE LA URL NEL BROWSER** via Playwright MCP (`browser_snapshot` o `browser_take_screenshot`) — verificare il fix funziona
5. Visual parity confronto con reference Design Comuni

## Playwright MCP operativo

Per i check browser gli agenti devono usare una sessione MCP realmente funzionante, non solo dichiarare che Playwright e' configurato.

Configurazione locale verificata il 2026-06-02:

```json
{
  "command": "npx",
  "args": ["-y", "@playwright/mcp@latest", "--headless", "--browser", "chromium", "--output-dir", "/tmp/playwright-mcp"]
}
```

Regole operative:

- Eseguire almeno `browser_navigate` + `browser_snapshot` o `browser_take_screenshot` sulla URL del task.
- Se serve standalone HTTP, avviare `npx @playwright/mcp@latest --headless --browser chromium --port 8934` e usare `http://localhost:8934/mcp`.
- Non usare `--executable-path` hardcoded verso una build Chromium numerata.
- In questo ambiente `--browser chrome` fallisce se Chrome di sistema non e' installato; usare Chromium Playwright gestito.

## Cosa catta quale tool

| Tool | Cattura |
|------|---------|
| PHPStan | type errors, null dereference, signature mismatch, missing return |
| PHPMD | unused imports, God classes, NPATH, complessità |
| PHPInsights | coding standard, struttura, fix automatici |
| Browser (Playwright) | regressioni visuali, layout, interazione (zoom/fullscreen/dropdown) |

## Vincoli

- VIETATO `curl` solo per verificare HTTP 200 → richiede browser snapshot
- VIETATO dichiarare "completato" senza aver aperto la URL
- VIETATO modificare e non verificare → bug nascosti
- OBBLIGATORIO browser check; se browser down → segnalare "VERIFICA PENDING"

## URL riferimento segnalazione-crea

```
http://127.0.0.1:8000/it/tests/segnalazione-crea
http://127.0.0.1:8000/it/tests/segnalazione-crea?step=form.dati-della-segnalazione::data::wizard-step
```

Ref: `docs/wiki/concepts/post-modifica-verifica-obbligatoria.md`
