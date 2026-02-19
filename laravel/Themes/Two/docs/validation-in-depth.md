# Validazione frontoffice a fondo

Procedura completa per validare markup, performance, accessibilità e best practices del frontoffice, con uso di script, API, incolla HTML e MCP dove applicabile.

## Riepilogo strumenti

| Strumento | Cosa valida | Come | Automazione |
|-----------|-------------|------|-------------|
| **PageSpeed Insights** | Performance, Accessibility, Best Practices, SEO | Web manuale o Lighthouse CLI | Manuale; API con quota limitata |
| **W3C Nu Validator** | Markup HTML5 | URL, incolla HTML, o POST API | Script bash + API (senza quota su POST) |
| **axe-core CLI** | Accessibilità (WCAG) | URL o HTML salvato | `npx @axe-core/cli` |
| **Browser MCP** | Apertura pagine/siti validazione | Navigazione e snapshot | Limitato (snapshot non sempre adatto a form) |

---

## 1. PageSpeed Insights

- **Web**: [PageSpeed Insights](https://pagespeed.web.dev/) — incolla URL, clic **Analyze**.
- **Lighthouse CLI** (opzionale):
  ```bash
  npm install -g lighthouse
  lighthouse https://sottana.net/it --view --output=html --output-path=./reports/psi-it.html
  ```
- **Elenco URL**: `docs/pagespeed-frontoffice-urls.txt` (root progetto).
- Dettaglio: [pagespeed-frontoffice-validation.md](pagespeed-frontoffice-validation.md).

---

## 2. W3C Nu Validator (markup HTML)

### 2.1 Validazione per URL

- Sito: [https://validator.w3.org/nu/](https://validator.w3.org/nu/).
- Inserire l’URL (es. `https://sottana.net/it`) e avviare il check.

### 2.2 Validazione per incolla HTML (Direct Input)

Utile per una singola pagina senza passare da URL pubblico:

1. Aprire [https://validator.w3.org/nu/#textarea](https://validator.w3.org/nu/#textarea).
2. **Validate by Direct Input**: incollare l’HTML completo della pagina nel textarea.
3. Cliccare **Check**.

Per ottenere l’HTML:

- Dal browser: tasto destro → “Visualizza sorgente pagina” → seleziona tutto e copia.
- Da script: lo script sotto salva l’HTML in `reports/validation/{slug}.html`; aprire il file e incollare in Nu.

### 2.3 API (POST) e script automatico

Il validator accetta **HTML in POST** senza quota per URL:

- Endpoint: `https://validator.w3.org/nu/?out=json`
- Header: `Content-Type: text/html; charset=utf-8`
- Body: corpo della risposta HTML della pagina

**Script bash** (root progetto):

```bash
./bashscripts/validation/validate-frontoffice-w3c.sh
```

- Legge gli URL da `docs/pagespeed-frontoffice-urls.txt`.
- Per ogni URL: scarica l’HTML in `reports/validation/{slug}.html`, invia POST al Nu Validator, salva il report in `reports/validation/{slug}-w3c.json`.
- In console: conteggio errori e warning per pagina e totali.

Report aggregato degli ultimi risultati: [reports/validation/w3c-report.md](../../../reports/validation/w3c-report.md) (path dalla root progetto).

---

## 3. axe-core (accessibilità)

Oltre a PageSpeed (Accessibility), si può usare axe-core da riga di comando:

```bash
# Per URL
npx @axe-core/cli https://sottana.net/it

# Output in JSON
npx @axe-core/cli https://sottana.net/it --save axe-report.json
```

Installazione globale (opzionale): `npm install -g @axe-core/cli`.

---

## 4. Uso di MCP per la validazione

### 4.1 Cursor IDE Browser (cursor-ide-browser)

- **Cosa fa**: apre pagine nel browser, permette navigazione e snapshot del DOM.
- **Utilizzo possibile**:
  - Aprire PageSpeed Insights o validator.w3.org/nu e incollare URL manualmente.
  - Verificare che la pagina di risultati sia caricata (snapshot).
- **Limitazione**: l’automazione completa (compilare form, cliccare Analyze, estrarre punteggi) non è affidabile perché lo snapshot può restituire “Unsupported content type” o strutture non adatte al targeting degli input; l’uso è quindi **di supporto** (aprire il sito di validazione) più che fully automated.

### 4.2 Altri MCP

- **mcp_web_fetch**: utile per scaricare HTML di una pagina (es. per poi inviarlo al validator via POST o incollarlo in Nu).
- Nessun MCP dedicato “PageSpeed” o “W3C validator” è richiesto: il flusso principale resta script (W3C) + uso manuale o Lighthouse (PageSpeed) + axe-core.

---

## 5. Categorie di errori W3C (tema Two)

Dai report generati dallo script, le categorie ricorrenti sono:

| Categoria | Esempio | Note |
|-----------|---------|------|
| **Alpine.js** | `x-data`, `:class`, `@click`, `x-show`, `x-transition:*` “not allowed” / “not serializable as XML 1.0” | Il validator HTML5 non conosce i custom attribute; spesso accettabili per app Alpine. |
| **Livewire** | `wire:key`, `wire:snapshot`, `wire:effects`, `wire:id`, `wire:name` “not allowed” | Stesso motivo: markup runtime, accettabile in contesto Livewire. |
| **Trailing slash su void elements** | `/>` su `<link>`, `<input>` | Info; in HTML5 lo slash finale è opzionale. |
| **iframe** | `width="100%"` / `height="100%"` “Expected a digit” | In HTML5 strict alcuni validatori si aspettano numeri; in pratica `100%` è usato e supportato. |
| **iframe dentro `<a>`** | “iframe must not appear as descendant of a” | **Da correggere**: rimuovere il link che avvolge l’iframe o spostare il link. |
| **Duplicate attribute `class`** | Due `class` sullo stesso elemento (es. `class="..."` + `:class="..."` che diventa `class="..."` dopo Alpine) | **Da correggere**: unire in un solo attributo o gestire con Alpine senza duplicare `class`. |
| **Heading skip** | “h4 follows h2, skipping heading level” | **Da correggere**: usare h3 prima di h4 dove serve. |
| **`<style>` in body** | “Element style not allowed as child of body in this context” | **Da correggere**: spostare in `<head>` o caricare CSS esterno. |

Le voci “Da correggere” sono prioritarie per conformità markup; Alpine/Livewire/trailing slash possono restare documentate come scelta nota.

---

## 6. Checklist validazione pre-release

- [ ] PageSpeed: tutte le URL in `docs/pagespeed-frontoffice-urls.txt` verificate (manuale o Lighthouse).
- [ ] W3C: eseguito `./bashscripts/validation/validate-frontoffice-w3c.sh` e letti i totali; eventuale incolla HTML su [Nu #textarea](https://validator.w3.org/nu/#textarea) per pagine critiche.
- [ ] axe-core: almeno homepage e contatti con `npx @axe-core/cli <url>`.
- [ ] Errori W3C “Da correggere” (iframe in `<a>`, duplicate `class`, heading skip, `style` in body) affrontati e documentati.

---

## Collegamenti

- [PageSpeed frontoffice](pagespeed-frontoffice-validation.md)
- [Deployment e validazione](deployment-and-validation.md)
- [WCAG compliance plan](wcag-compliance-plan.md)
- [Report W3C aggregato](../../../reports/validation/w3c-report.md)
- [W3C Nu Validator](https://validator.w3.org/nu/)
- [PageSpeed Insights](https://pagespeed.web.dev/)
- [axe-core CLI](https://github.com/dequelabs/axe-core-npm/tree/develop/packages/cli)
