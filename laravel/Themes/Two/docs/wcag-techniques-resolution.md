# Risoluzione WCAG – Tecniche W3C e piano Theme Two

Documento di riferimento per le tecniche WCAG 2.1 studiate e per come il **tema Two** intende risolverle. Pensato per allineare più agenti sullo stesso piano di intervento.

**Riferimento operativo**: [wcag-compliance-plan.md](wcag-compliance-plan.md) (checklist, file da modificare, pattern già implementati).

---

## Tecniche W3C di riferimento

| Tecnica | Titolo | Criteri | Ruolo |
|--------|--------|---------|--------|
| [H44](https://www.w3.org/WAI/WCAG21/Techniques/html/H44) | Using label elements to associate text labels with form controls | 1.1.1, 1.3.1, 3.3.2, 4.1.2 | Sufficient |
| [F78](https://www.w3.org/WAI/WCAG21/Techniques/failures/F78) | Failure: styling outlines/borders that remove or hide focus indicator | 2.4.7, 1.4.11 | Failure |
| [G195](https://www.w3.org/WAI/WCAG21/Techniques/general/G195) | Using an author-supplied, visible focus indicator | 2.4.7, 1.4.11 | Sufficient |
| [H30](https://www.w3.org/WAI/WCAG21/Techniques/html/H30) | Providing link text that describes the purpose of a link | 2.4.4, 2.4.9, 1.1.1 | Sufficient |
| [C8](https://www.w3.org/WAI/WCAG21/Techniques/css/C8) | Using CSS letter-spacing to control spacing within a word | 1.4.12, 1.3.2 | Advisory |
| [C38](https://www.w3.org/WAI/WCAG21/Techniques/css/C38) | Using CSS width, max-width and flexbox to fit labels and inputs | 1.4.10 Reflow | Sufficient |
| [G18](https://www.w3.org/WAI/WCAG21/Techniques/general/G18) | Ensuring contrast ratio ≥ 4.5:1 (text/images of text vs background) | 1.4.3, 1.4.6 | Sufficient |
| [H98](https://www.w3.org/WAI/WCAG21/Techniques/html/H98) | Using HTML autocomplete attributes | 1.3.5 Identify Input Purpose | Sufficient |
| [ARIA6](https://www.w3.org/WAI/WCAG21/Techniques/aria/ARIA6) | Using aria-label to provide labels for objects | 1.1.1 Non-text Content | Sufficient |

---

## Come il tema Two risolve ogni tecnica

### H44 – Label associati ai controlli

- **Regola**: `<label for="id">` con `id` univoco su input/select/textarea; per checkbox/radio il `<label>` va **dopo** l’input; label visibile per 3.3.2.
- **Theme Two**: Pattern in [wcag-compliance-plan.md](wcag-compliance-plan.md) § H44. File: blog search bar, contact form, select in blocchi servizi. Verificare tutti i select/checkbox generati da Blade/Livewire.

### F78 / G195 – Focus visibile

- **F78 (da evitare)**: No `:focus { outline: none }`, no outline uguale al focus, no bordo spesso stesso colore del focus che lo nasconde.
- **G195 (da applicare)**: Indicatore di focus visibile (contrasto ≥ 3:1, spessore ≥ 2px, area almeno 1px intorno al componente).
- **Theme Two**: CSS globale in `resources/css/app.css` con `:focus-visible` (outline 3px, offset, box-shadow). Dettaglio in [wcag-compliance-plan.md](wcag-compliance-plan.md) § F78/G195. Verifica: navigazione da tastiera su header, footer, form, link.

### H30 – Scopo del link

- **Regola**: Testo del link (o `alt` dell’immagine se è l’unico contenuto del link) che descrive la destinazione; se link ha testo + immagine e il testo basta, `alt` può essere vuoto.
- **Theme Two**: Link icon-only con `aria-label`; link con testo descrittivo; no `href="#"` senza scopo. Pattern e file in [wcag-compliance-plan.md](wcag-compliance-plan.md) § H30. Controllare header, footer, social, CTA.

### C8 – Letter-spacing

- **Regola**: Usare `letter-spacing` CSS invece di caratteri spazio per distanziare parole; evitare valori eccessivi che peggiorano la leggibilità.
- **Theme Two**: Rimosso `tracking-widest` dal footer; mantenere `letter-spacing` moderato. [wcag-compliance-plan.md](wcag-compliance-plan.md) § C8.

### C38 – Reflow (label e input)

- **Regola**: Label e input che si adattano senza scroll orizzontale a 320px e zoom 400%; flexbox, `width`/`max-width`, wrap.
- **Theme Two**: Media query 320px, `flex-wrap`, `max-width: 100%` su input/select/textarea in `app.css`. [wcag-compliance-plan.md](wcag-compliance-plan.md) § C38. Test: viewport 320px e zoom 400%.

### G18 – Contrasto

- **Regola**: Contrasto ≥ 4.5:1 per testo normale (≥ 3:1 per testo grande); formula luminance WCAG.
- **Theme Two**: Override in `app.css` per classi footer (`text-white/95` ecc.); sostituzioni da `text-blue-200` a bianco. [wcag-compliance-plan.md](wcag-compliance-plan.md) § G18. Verificare con strumenti (WAVE, axe, CCA).

### H98 – Autocomplete

- **Regola**: Attributo `autocomplete` con token standard (given-name, family-name, email, tel, ecc.) sui campi che raccolgono dati dell’utente.
- **Theme Two**: Contact form e altri form con `autocomplete` appropriato; select di ricerca con `autocomplete="off"`. [wcag-compliance-plan.md](wcag-compliance-plan.md) § H98. Estendere a tutti i form che chiedono dati utente.

### ARIA6 – aria-label

- **Regola**: `aria-label` per dare un nome a oggetti (pulsanti, landmark) quando non c’è testo visibile; non usarlo dove già esiste un label nativo appropriato (es. `<label for>`).
- **Theme Two**: `aria-label` su bottoni solo icona e link solo icona; `aria-hidden="true"` su icone decorative; preferire `<label for>` sugli input. [wcag-compliance-plan.md](wcag-compliance-plan.md) § ARIA6.

---

## Ordine di intervento suggerito (multi‑agente)

Per evitare sovrapposizioni se più agenti lavorano sullo stesso prompt:

1. **H44 + H98**: form (label + autocomplete) – stesso insieme di file (contact form, search bar, altri form).
2. **G18 + C8**: CSS e classi colore/spacing – `app.css` e componenti footer/header.
3. **F78/G195**: focus – `app.css` e componenti interattivi (header, footer, bottoni, link).
4. **H30 + ARIA6**: link e aria – header, footer, social, CTA (testo link e aria-label).
5. **C38**: reflow – media query e layout form; verifiche a 320px e 400% zoom.

Ogni agente può dichiarare nel commit o nell’issue su quale tecnica/insieme di file sta lavorando.

---

## Collegamenti

- [Piano WCAG Theme Two](wcag-compliance-plan.md)
- [Validazione accessibilità](validation-in-depth.md)
- [W3C WCAG 2.1 Techniques](https://www.w3.org/WAI/WCAG21/Techniques/)
- [Understanding WCAG](https://www.w3.org/WAI/WCAG21/Understanding/)
