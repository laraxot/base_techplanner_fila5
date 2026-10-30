---
title: "Audit mobile misurato del front-office Two (320-844 px) e correzioni verificate"
type: note
theme: Two
status: active
created: 2026-10-29
updated: 2026-10-29
tags: [docs, two, mobile, accessibility, wcag, axe, measured]
qmd: "two mobile audit misurato axe wcag 320 reflow aria-required contrast breadcrumb 404 immagini build"
related:
  - ./stories/mobile-ux-pass.story.md
  - ./wiki/concepts/mobile-navigation-contract.md
  - ./wcag-audit-checklist.md
  - ../../Sixteen/docs/mobile-live-audit.md
---

# Audit mobile misurato di Two

La story [mobile-ux-pass](./stories/mobile-ux-pass.story.md) e' una passata per lettura del codice (nessun server avviato). Questo
file registra cosa si vede davvero sul sito servito, e cosa e' stato corretto dopo averlo misurato.

## Dove si misura (errore da non ripetere)

Su questa macchina due progetti servono la stessa porta su indirizzi diversi:

| Indirizzo | Progetto | Tema | Titolo |
|---|---|---|---|
| `http://192.168.1.40:8000` | `base_techplanner_fila5` (questo) | **Two** | «SottanaLaravel» |
| `http://127.0.0.1:8000` | `base_fixcity_fila5` | Sixteen | «FixCity» |

La prima misura di questa sessione era finita su FixCity: vedi [Sixteen](../../Sixteen/docs/mobile-live-audit.md). Verifica
sempre `ss -ltnp | grep :8000` + `readlink /proc/<pid>/cwd` e `curl -s <url>/it | grep -o 'themes/[A-Za-z]*/assets'`.

## Metodo

- `AUDIT_BASE=http://192.168.1.40:8000 node bashscripts/tools/mobile-audit.mjs <cartella> 12` (Playwright headless, iPhone 390x844,
  solo GET, nessun login): overflow, target < 44 / < 24 px, campi < 16 px, `alt`, console, 4xx.
- axe-core (`wcag2a/aa`, `wcag21a/aa`, `wcag22aa`, `best-practice`) su 7 percorsi a 320 e 390 px **escludendo PhpDebugbar**
  (`.phpdebugbar`, `#phpdebugbar`): sul server di sviluppo la barra di debug falsa contrasto e landmark.
- Reflow e quota di schermo occupata da elementi fissi a 320x640, 360x740, 390x844, 768x1024 e 844x390.

## Risultato di base (12 pagine pubbliche, 390 px)

Tutte 200, `viewport` con `width=device-width, initial-scale=1`, nessun overflow, 0 immagini senza `alt`.

| Pagina | Target < 44 (< 24) | Campi < 16 px | Console / 4xx |
|---|---|---|---|
| `/it`, `/de`, `/en`, `/es`, `/it/faqs`, `/it/contacts`, `/it/contatti`, `/it/cookie-policy` | 5-11 (5-11) | 0 | 0 / 0 |
| `/it/about` | 11 (11) | 0 | 2 / 2 |
| `/it/services`, `/it/blog` | 9 (6-9) | 0 | 1 / 1 |
| `/it/auth/login` | 4 (3) | **2** | 0 / 0 |

Dei target piccoli, 1 e' il «Vai al contenuto» visivamente nascosto (1x1, normale), il logo e' 213x40, i link «Scopri di piu'»
sono 123x20 e «Leggi» 57x16.

## Reflow e spazio occupato

- **320 px: `/it/about` scorre in orizzontale** (`scrollWidth` 330). Tutte le altre pagine e larghezze: nessun overflow.
- Header fisso 112 px (`h-20` forzato) + barra cookie fissa (210 px a 320, 189 px a 390): **50% dello schermo a 320x640, 44% a
  360x740, 36% a 390x844**, 24% a 768x1024. In orizzontale (844x390) la barra cookie diventa statica e il header e' il 29%.
  Decisione di design, non toccata.

## Corretto e verificato

| # | File | Difetto (misurato) | Correzione | Verifica |
|---|---|---|---|---|
| 1 | `components/blocks/contact/form.blade.php` (6 campi) | axe **critico** `aria-valid-attr-value`: `{{ ... ? 'required aria-required="true"' : '' }}` passa dall'escape di Blade, le virgolette diventano `&quot;` e l'HTML e' `aria-required=""true""` | `@required($campo['required'] ?? false)`: emette solo `required`, gia' letto dai lettori di schermo | HTML servito: 0 attributi rotti, `required` presente su nome, email, messaggio e assente sugli opzionali; axe senza violazione |
| 2 | `hero/internal.blade.php`, `hero/contacts.blade.php` | axe serio `link-name`: il link «home» del breadcrumb contiene solo un'icona | `aria-label="Home"` (come il breadcrumb di Design Comuni) e `aria-hidden` sull'icona | axe su `/it/services`: violazione sparita |
| 3 | `blog/grid.blade.php` | axe serio `color-contrast`: badge arancione #E67E22 su #FFF7ED = **2,68:1**; verde #2D8659 su #F0FDF4 = **4,30:1** (serve 4,5:1) | testo `text-orange-700` (4,88:1) e `text-green-800` (6,81:1); il blu (6,52:1) era gia' a norma; il colore del brand resta nel bordo | axe su `/it/blog`: violazione sparita; classi gia' nel CSS compilato |
| 4 | `blocks/benefits.blade.php` | reflow 320 px: la card con «Dentistico/Veterinario» (parola non spezzabile) e' larga 314 px in una colonna da 288, bordo a 330 | `min-w-0` sulla card (elemento di griglia: il minimo automatico gli impediva di restringersi) | iniezione nel browser: `scrollWidth` 330 -> 320. **`overflow-wrap: break-word` non basta**, `anywhere` si'. Visibile dopo la ricompilazione (classe non ancora compilata) |

## Aperto

- **Bottone lingua mobile** (`header/v1.blade.php:278`): axe serio `label-content-name-mismatch` su ogni pagina, «il testo non e'
  incluso nel nome accessibile» (`aria-label="Cambia lingua (attuale: it)"`, testo visibile `it` in maiuscolo da CSS). File in
  modifica dall'altra sessione (DCP-121), non toccato. Proposta: far iniziare l'`aria-label` col testo visibile, es. `IT, cambia lingua`.
- **`/it/services`**: `heading-order`, dall'`h1` si passa a `h3` (card dei servizi senza `h2`). La correzione dipende dal fatto che il
  blocco abbia un titolo di sezione: non uniforme, da decidere.
- **Login** (`/it/auth/login`, widget Filament del modulo User, fuori dal tema): campi a 14 px (iOS zooma al focus) e alti 36 px,
  «ricordami» 16x16 (serve 24), nessun `h1` visibile su telefono e nessun `main`.
- **`/it/cookie-policy`**: nessun `h1` (contenuto del CMS/Gdpr).
- **Immagini 404**: `/themes/Two/images/hero-bg.jpg`, `medical-equipment.jpg` (`/it/about`, `/it/blog`) e
  `service-odontoiatria.jpg` (`/it/services`). Le immagini del tema SONO pubblicate, ma sotto un percorso annidato:
  `Themes/Two/public/themes/Two/images/` (14 file), servito come `/themes/Two/themes/Two/images/hero-bg.jpg` (200, 529.781 B) e
  `medical-equipment.jpg` (200, 537.086 B), mentre le viste e i JSON dei seed puntano a `/themes/Two/images/` (404). Lo stesso
  nome sotto `/images/` (`public_html/images/`) e' 200 ma pesa 3,6 MB (`hero-bg.jpg`) e 0,9 MB (`medical-equipment.jpg`), ed e' quello che
  carica davvero la home (LCP). `service-odontoiatria.jpg` esiste solo in `Themes/Two/resources/images/`, non in nessun percorso
  servito. Correzione: allineare il percorso (symlink `public_html/themes/Two` -> `Themes/Two/public`) e usare le versioni da ~530 KB.
- **Link CTA bassi** («Scopri di piu'» 20 px, «Leggi» 16 px: sotto i 24 px di WCAG 2.5.8 per link isolati) in `features/grid`,
  `services/cards|grid|cards-image`, `hero/about`, `blog/grid`. Non toccati: la fix e' padding/`min-h-11`, invisibile senza build.
- **Build mancante.** Nel CSS compilato servito (`app-BJ7f6w9d.css`) mancano `.w-11`, `.min-h-11`, `.min-w-11`, `.min-h-dvh`,
  `.min-w-0`, `.break-words`: le icone social del footer misurano 20x44 invece di 44x44 e tutta la story mobile-ux-pass resta
  invisibile. `npm run build` in `Themes/Two` (asset tracciati in git) e' decisione dell'utente.
- `region` (skip link fuori da un landmark): schema standard del link «Vai al contenuto», accettato.

## Ripetere

```bash
AUDIT_BASE=http://192.168.1.40:8000 node bashscripts/tools/mobile-audit.mjs /tmp/two-audit 12
```

Per axe: iniettare `axe.min.js` (in `~/.npm/_npx/*/node_modules/axe-core/`) con Playwright ed escludere `.phpdebugbar`.
