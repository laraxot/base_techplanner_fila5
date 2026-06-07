# Theme CSS Build Workflow Rule

## REGOLA PERMANENTE: Per fix UI nel tema Sixteen — HTML parity + CSS + build

### Vincolo assoluto

```
OBBLIGATORIO: per qualsiasi fix visivo nel tema Sixteen seguire questo ordine:
  1. HTML parity — correggere la struttura semantica nel Blade
  2. CSS — aggiornare laravel/Themes/Sixteen/resources/css/app.css
  3. npm run build — dalla cartella del tema
  4. npm run copy — dalla cartella del tema
```

### Perché

Il tema Sixteen usa Vite per compilare gli asset. Le modifiche CSS non sono visibili nel
browser finché non si fa build. Il comando `npm run copy` copia i file compilati nella
cartella pubblica corretta (`../public_html/`).

### Comandi corretti

```bash
cd laravel/Themes/Sixteen
npm run build
npm run copy
```

### HTML parity

Prima del CSS: assicurarsi che la struttura HTML sia semanticamente corretta e in linea
con il Design System Bootstrap Italia. La parity visuale si ottiene prima con il markup
corretto, poi con il CSS.

### Applica a

- Qualsiasi fix visuale su pagine del tema (spacing, colori, layout)
- Fix su wizard, form, header, footer
- Componenti Blade del tema

### Errori comuni

- Modificare solo il CSS senza fare `npm run build` → le modifiche non compaiono
- Dimenticare `npm run copy` → file vecchi serviti al browser
- Lavorare sul CSS prima di correggere la struttura HTML → accumulo di hack

### File CSS

- `laravel/Themes/Sixteen/resources/css/app.css` — source CSS da modificare
- `laravel/Themes/Sixteen/public/assets/app-*.css` — output compilato (non modificare)

### Design Comuni Pattern

Seguire il pattern delle pagine statiche di Design Comuni:
- **VIETATO**: CSS selettore di pagina tipo `.page-content[data-slug="tests.segnalazione-crea"]`
- **OBBLIGATORIO**: CSS globali applicabili a tutto il sito
- **ESEMPIO**: `.segnalazione-wizard-root .container { margin-bottom: 8px; }`

### Documentazione

- Wiki: `laravel/Themes/Sixteen/docs/wiki/concepts/css-build-workflow.md`