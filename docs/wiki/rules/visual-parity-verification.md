---
paths:
  - "laravel/Themes/**/*.css"
  - "laravel/Themes/**/*.js"
  - "laravel/Themes/**/*.blade.php"
  - "tests/Playwright/**/*.js"
  - "laravel/**/tests/Playwright/**/*.js"
---

# Visual Parity Verification Rule

## REGOLA PERMANENTE: Dopo OGNI modifica — verificare la pagina nel browser

### Vincolo assoluto

```
DOPO ogni modifica di file PHP, Blade, CSS o JS:
  1. Aprire la URL interessata nel browser (Playwright MCP o snapshot)
  2. Verificare visivamente che il fix funzioni
  3. Solo allora considerare il task "completato"

NON BASTA: correggere il codice senza verifica visuale
NON BASTA: fare phpstan/phpmd senza verificare il risultato nel browser
```

### Perché

Il fix a livello di codice può risolvere l'errore PHP ma non garantire che la pagina funzioni correttamente nel browser. Esempio: un signature mismatch fixato non garantisce che la pagina sia priva di altri errori, che la UI sia visivamente corretta, o che non ci siano regressioni silenti.

### Workflow

```
1. Modifica codice
2. npm run build + npm run copy (se CSS/JS)
3. Apri URL nel browser con Playwright MCP
4. Verifica il fix + regressioni path
5. Documenta come task completato
```

### URL di riferimento per segnalazione-crea

```
http://127.0.0.1:8000/it/tests/segnalazione-crea
http://127.0.0.1:8000/it/tests/segnalazione-crea?step=form.dati-della-segnalazione::data::wizard-step
```

### Se il browser non è disponibile

Se Playwright non è installato o il browser non è accessibile:
- Usare `php artisan serve` + curl per verificare l'assenza di errori 500
- In ogni caso, annotare che la verifica visuale è PENDINGA e segnalarlo all'utente

### Anti-pattern

- Modificare e non verificare → bug nascosti
- Considerare "finito" perché il codice compila → regressione visuale non vista
- Fix che risolve l'errore PHP ma rompe la UI → solo la verifica visuale lo cattura

### Documentazione

- Correlata a: `post-modifica-verifica-obbligatoria.md`
- Questa regola è più specifica: non basta static analysis, serve il browser
