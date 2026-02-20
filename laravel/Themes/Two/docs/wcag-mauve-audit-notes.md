# Note audit MAUVE++ – Tema Two

Riferimento: report MAUVE++ su https://sottana.net (WCAG 2.1 AA, viewport desktop).

## Correzioni applicate nel tema

### F96 – Label in Name (2.5.3)
- **Header**: Pulsante lingua – `aria-label="Cambia lingua (attuale: {{ $currentLocale }})"` così il nome accessibile contiene il testo visibile (es. "it").
- **Footer**: Link social – `aria-label` che inizia con il nome piattaforma: "LinkedIn - ...", "Facebook - ...", "Instagram - ..." per comandi voice ("Click LinkedIn").
- Link mappa: `aria-label` con indirizzo e testo sr-only per H30.

### ARIA11 – Landmark
- Header: `role="banner"` (già in header v1).
- Footer: `role="contentinfo"` (già in footer v1).
- Contenuto principale: `role="main"` e `id="main-content"` in `layouts/app.blade.php` e in `components/layouts/main.blade.php` (con skip link "Vai al contenuto principale").

### G18 – Contrasto
- Override in `resources/css/app.css` per `.text-blue-200`, `.text-blue-100/*`, `.text-gray-200` su sfondo scuro.
- Footer v1: titolo "Normative" da `text-orange-400` a `text-orange-300`; barra bassa da `text-gray-300` a `text-white/90`.
- Override per `[role="contentinfo"] .text-orange-400` e `.text-gray-400`.

### H30 – Scopo link
- Link mappa footer: `aria-label` descrittivo + `<span class="sr-only">Apri mappa della nostra sede su OpenStreetMap</span>`.

### ARIA6 – aria-label e icone
- SVGs decorativi: `aria-hidden="true"` (già presente su logo, icone CTA, hamburger, social, contatti, back to top in header v1 e footer v1).

## Cookie consent (vendor)

Gli errori/warning su **cookie-consent** (F78, G195, C12, C21, G162) riguardano il pacchetto `vendor/cookie-consent`. Il tema Two non può modificarne il markup. Possibili azioni:
- Override CSS nel tema per focus visibile (`.lcc-button:focus-visible`) e font-size/line-height.
- Issue o PR al repository del pacchetto cookie-consent.
- Documentare in [wcag-compliance-plan.md](wcag-compliance-plan.md) come “esterno al tema”.

## Layout e landmark main

- **`resources/views/layouts/app.blade.php`**: `<main role="main" id="main-content">` attorno allo slot.
- **`resources/views/components/layouts/main.blade.php`**: già `<main id="main-content" role="main">` con skip link. Attenzione: se questo layout riceve come slot l’intero corpo (header + content + footer), il landmark main avvolge troppo; in quel caso la struttura andrebbe separata (header fuori da main, main solo sul contenuto centrale, footer fuori).

## PageSpeed Insights – correzioni applicate

Riferimento: report PageSpeed (mobile) su https://sottana.net/it.

### Accessibilità (contrasto)
- **Testo arancione su sfondo chiaro**: in `app.css` è stato aggiunto override per `#main-content .text-brand-orange` e `main .text-brand-orange` con `var(--color-brand-orange-dark)` (WCAG AA 4.5:1).
- **Sezione "Cosa Controlliamo?"**: il componente `what-we-do/checklist` usa già `h3` per "Perché è fondamentale?" e `text-brand-orange-dark` per il callout.

### Best practice – errori console
- **ReferenceError $isActive**: nel menu mobile (header v1) non viene usato alcun `:class` Alpine; le classi attivo/non attivo sono solo server-side (`class="{{ $isActive ? '...' : '...' }}"`). Dopo il deploy l’errore scompare.
- **404 immagini**: path hero e servizi/sectors aggiornati da `/themes/Two/resources/images/` e `/themes/Two/Main_files/images/` a `/themes/Two/images/`. Hero about usa `asset('themes/Two/images/hero-bg.jpg')` come default. I blocchi services/grid, content/split e sectors/split normalizzano gli URL che iniziano con `/themes/Two/` tramite `asset()` per la base corretta. **Deploy**: copiare le immagini (es. da `Main_files/images/` o `resources/images/`) in `public/themes/Two/images/` (hero-bg.jpg, medical-equipment.jpg, veterinary-radiology.jpg) perché siano servite.

### Link social e intestazioni
- Link social footer: già con `aria-label` univoci (LinkedIn, Facebook, Instagram). Contrasto footer gestito in app.css.
- Ordine intestazioni: checklist usa h2 (titolo sezione) → h3 (callout "Perché è fondamentale?") → h3 (titoli card).

## Verifica post-modifiche

Dopo deploy, rieseguire MAUVE++ su:
- Home
- Una pagina con form (contatti)
- Una pagina con footer completo (social, mappa)

e confrontare con [wcag-audit-checklist.md](wcag-audit-checklist.md).
