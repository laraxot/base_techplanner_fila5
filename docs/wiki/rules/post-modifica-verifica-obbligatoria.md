# Post-Modifica Verifica Obbligatoria

## REGOLA PERMANENTE: Dopo OGNI modifica PHP/Blade — verifica con strumenti di qualità

### Vincolo assoluto

```
DOPO ogni modifica di file PHP o Blade:
  1. phpstan analyse <file-modificato> --level=max
  2. phpmd <file-modificato> text unusedcode,design,codesize
  3. phpinsights analyse <directory> --fix   (se ha fix automatici)
  4. APRIRE LA URL NEL BROWSER → verificare il fix funziona (Playwright MCP o manuale)
  5. Verifica visual parity con browser/screenshot
```

### Strumenti installati

| Tool | Tipo | Path |
|------|------|------|
| **PHPStan** | Analisi statica | `/home/zorin/.local/bin/phpstan.phar` (standalone) |
| **PHPMD** | Mess detection | `/home/zorin/.local/bin/phpmd.phar` (standalone) |
| **PHPInsights** | Code quality | `laravel/vendor/bin/phpinsights` (composer) |
| **Visual Parity** | Browser test | Playwright / browser snapshot |

### Come eseguire

```bash
# PHPStan su singolo file
phpstan analyse laravel/Modules/Fixcity/app/Filament/Widgets/CreateTicketWizardWidget.php --level=max

# PHPMD - unused code, design, codesize
phpmd laravel/Modules/Fixcity/app/Filament/Widgets/CreateTicketWizardWidget.php text unusedcode,design,codesize

# PHPInsights su directory modulo
cd laravel && php artisan insights Modules\\Fixcity

# Visual parity - aprire URL in browser e confrontare con reference Design Comuni
```

### Perché

| Strumento | Cosa Catta |
|-----------|-----------|
| **PHPStan** | type errors, null dereference, signature mismatch, missing return types |
| **PHPMD** | unused imports, God classes, complexity eccessiva, NPATH violations |
| **PHPInsights** | coding standard violations, struttura, fix automatici |
| **Visual Parity** | regressioni silenti non catturate da static analysis |

### Verifica browser obbligatoria — regola suprema

```
VIETATO: dichiarare un fix "completato" senza aver aperto la URL nel browser
VIETATO: usare solo curl per verificare HTTP 200
OBBLIGATORIO: usare Playwright MCP (browser_snapshot o screenshot) sulla URL dell'utente
OBBLIGATORIO: l'agente esegue direttamente i controlli visual parity con Playwright/Puppeteer; non li delega all'utente

URL di riferimento per segnalazione-crea:
  http://127.0.0.1:8000/it/tests/segnalazione-crea
  http://127.0.0.1:8000/it/tests/segnalazione-crea?step=form.dati-della-segnalazione::data::wizard-step

Se il browser è down → segnalarlo esplicitamente come VERIFICA PENDINGA.
```

### Playwright MCP Fixcity

Comando verificato su questa macchina il 2026-06-02:

```bash
npx @playwright/mcp@latest --headless --browser chromium --output-dir /tmp/playwright-mcp
```

Note:

- `npx playwright install chromium` installa il browser Playwright gestito in user cache.
- `--browser chrome` e il default senza browser possono fallire per assenza di `/opt/google/chrome/chrome`.
- Non configurare `--executable-path` con build numerate come `chromium-1217`: diventano obsolete.

### Anti-pattern

- Modificare e non verificare → bug nascosti
- Fare affidamento SOLO su vendor phpstan → vendor può essere rimosso/aggiornato
- Saltare visual parity → regressioni silenti
- Dire "fixed" senza aver aperto il browser → FIX NON VALIDATO

### Documentazione

- `docs/wiki/concepts/post-modifica-verifica-obbligatoria.md`
- Memory: `memory/feedback_post_modifica_verifica.md`
