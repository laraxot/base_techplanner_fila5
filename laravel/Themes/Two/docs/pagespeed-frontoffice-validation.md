# Validazione PageSpeed Insights - Frontoffice

## Strumento

- **Web**: [PageSpeed Insights](https://pagespeed.web.dev/)
- Inserire l’URL della pagina e avviare l’analisi (Mobile e Desktop).

## Elenco pagine frontoffice da validare

Verificare **ogni** URL su [https://pagespeed.web.dev/](https://pagespeed.web.dev/):

| # | Pagina        | URL |
|---|----------------|-----|
| 1 | Home           | https://sottana.net/it |
| 2 | Contatti       | https://sottana.net/it/contatti |
| 3 | Servizi        | https://sottana.net/it/servizi |
| 4 | Chi siamo      | https://sottana.net/it/chi-siamo |
| 5 | Blog           | https://sottana.net/it/blog |
| 6 | FAQ            | https://sottana.net/it/faq |
| 7 | Privacy        | https://sottana.net/it/privacy |
| 8 | Termini        | https://sottana.net/it/termini |
| 9 | Cookie         | https://sottana.net/it/cookie |

## Come validare

1. Aprire [https://pagespeed.web.dev/](https://pagespeed.web.dev/).
2. Incollare un URL dalla tabella (es. `https://sottana.net/it/contatti`).
3. Cliccare **Analyze**.
4. Controllare i punteggi (Performance, Accessibility, Best Practices, SEO) per **Mobile** e **Desktop**.
5. Ripetere per tutte le pagine dell’elenco.

## Automazione (opzionale)

### Lighthouse CLI

Da terminale (una pagina per volta):

```bash
# Esempio: homepage
lighthouse https://sottana.net/it --view --output=html --output-path=./reports/psi-it.html

# Contatti
lighthouse https://sottana.net/it/contatti --view --output=html --output-path=./reports/psi-contatti.html
```

Installazione: `npm install -g lighthouse`

### Script batch (elenco URL)

Il file `laravel/docs/pagespeed-frontoffice-urls.txt` contiene un URL per riga. Si può usare per script batch con Lighthouse / axe / W3C.

## Categorie e obiettivi

- **Performance**: obiettivo ≥ 90 (verde).
- **Accessibility**: obiettivo 100; riferirsi anche al [piano WCAG](./wcag-compliance-plan.md).
- **Best Practices**: obiettivo ≥ 90.
- **SEO**: obiettivo ≥ 90.

## Validazione a fondo

Per markup (W3C), incolla HTML, script automatico, axe-core e uso MCP: [Validazione frontoffice a fondo](validation-in-depth.md).

## Collegamenti

- [Validazione a fondo (W3C, axe, MCP)](validation-in-depth.md)
- [Deployment e validazione](./deployment-and-validation.md)
- [Validazione batch (Lighthouse, axe, W3C)](frontoffice-validation-batch.md)
- [WCAG compliance plan](./wcag-compliance-plan.md)
- [Validazione MAUVE](./mauve-accessibility-validation.md)
- [PageSpeed Insights](https://pagespeed.web.dev/)
