---
title: English-only File Naming Rule
type: rule
tags: [naming, conventions, english-only, mandatory]
created: 2026-06-04
updated: 2026-06-04
---

# English-only File Naming Rule

## Regola
**Tutti i file (PHP, Blade, CSS, JS, Markdown, immagini) DEVONO usare nomi in inglese.**

### Vietato
- `segnalazione-parity.css` → `report-parity.css`
- `design-comuni-visual-fix.css` → `design-system-visual-fix.css`  
- `argomenti-parity.md` → `arguments-parity.md`
- `popup-segnalazione.js` → `popup-ticket.js`

### Consentito
- `ticket-form.php`
- `user-registration.css`
- `auth-widget.blade.php`
- `password-reset.md`

## Filosofia
- **DRY**: Evita ambiguità linguistica
- **KISS**: Nomina semplice, universalmente comprensibile
- **Consistency**: Collaborazione internazionale

## WCAG Compliance (Login/Register Forms)
- Password/confirm fields: sempre `columnSpanFull()` (uno sotto l'altro)
- Bottone submit: `bg-green-600` (verde istituzionale #007A52)
- Focus ring: `focus:ring-green-500`
- Label sempre associati a input (aria-label quando necessario)

## Riferimenti
- [Italia Design Comuni](https://github.com/italia/design-comuni-pagine-statiche)
- [WCAG 2.1 Guidelines](https://www.w3.org/WAI/WCAG21/quickref/)