# Rule: Design Comuni HTML Match

**Status**: CRITICAL
**Created**: 2026-03-30
**Priority**: MANDATORY

---

## The Rule

> **L'HTML dentro `<body>` (esclusi gli `<script>`) delle pagine fixcity
> DEVE essere uguale all'HTML dentro `<body>` delle corrispondenti pagine
> https://italia.github.io/design-comuni-pagine-statiche/sito/**
>
> **I `<script>` vengono sostituiti da Alpine.js + Livewire.**
> **Il CSS viene sostituito da Tailwind CSS utility classes definite in `app.css`.**

---

## Reference Pages

| URL Reference | URL Fixcity | Slug |
|---------------|-------------|------|
| `homepage.html` | `/it/` o `/it/homepage` | `homepage` |
| `argomenti.html` | `/it/tests/argomenti` | `tests.argomenti` |
| `argomento.html` | `/it/tests/argomento` | `tests.argomento` |
| `amministrazione.html` | `/it/amministrazione` | `amministrazione` |
| `novita.html` | `/it/novita` | `novita` |
| `servizi.html` | `/it/servizi` | `servizi` |
| `eventi.html` | `/it/eventi` | `eventi` |
| `documenti-e-dati.html` | `/it/documenti` | `documenti` |

---

## Come Verificare

### 1. Salvare reference body HTML
```bash
curl -s 'https://italia.github.io/design-comuni-pagine-statiche/sito/ARGOMENTO.html' | \
  sed -n '/<body/,/<\/body>/p' | \
  sed 's/<script[^>]*>.*<\/script>//g' > /tmp/reference_body.html
```

### 2. Salvare fixcity body HTML
Usare `curl` o Playwright per salvare l'HTML renderizzato.

### 3. Comparare
```bash
diff /tmp/reference_body.html /tmp/fixcity_body.html
```

---

## Struttura Header (uguale per tutte le pagine)

```html
<div class="skiplink">...</div>
<header class="it-header-wrapper">
  <div class="it-header-slim-wrapper">...</div>
  <div class="it-nav-wrapper">
    <div class="it-header-center-wrapper">...</div>
    <div class="it-header-navbar-wrapper">...</div>
  </div>
</header>
```

## Struttura Footer (uguale per tutte le pagine)

```html
<footer class="it-footer" id="footer">
  <div class="it-footer-main">
    Logo + Brand
    4 colonne: Amministrazione, Servizi, Novità, Contatti
    Social links
    Footer bottom (Media policy, Mappa sito)
  </div>
</footer>
```

---

## Build Process

Dopo ogni modifica ai CSS/JS del tema:

```bash
cd laravel/Themes/Sixteen
npm run build    # Compila CSS/JS con Vite
npm run copy     # Copia in public_html/themes/Sixteen/
```

---

## Documentazione

Le analisi e screenshots vanno salvati in:
- `Themes/Sixteen/docs/design-comuni/` - Analisi confronto
- `Themes/Sixteen/docs/screenshots/` - Screenshots
- `Modules/Cms/docs/blocks/` - Documentazione blocchi
- `Modules/Cms/docs/screenshots/` - Screenshots blocchi

Ogni analisi deve avere:
1. Screenshot della reference
2. Screenshot della nostra implementazione
3. Analisi delle differenze
4. Piano di correzione dettagliato

---

**Enforced By**: AI Agents, Code Review
**Violations**: Multiple pages (in progress)
