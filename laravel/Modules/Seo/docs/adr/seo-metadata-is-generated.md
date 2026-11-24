---
status: accepted
module: Seo
---

# SEO genera metadati dal contenuto owner

## Contesto

Canonical URL, sitemap e robots devono riflettere stato, locale e contenuto effettivamente pubblicato.

## Driver della decisione

- Evitare URL e metadati divergenti dal dominio applicativo.

## Decisione

Seo genera la presenza nei motori di ricerca dai contenuti e dalle configurazioni owner; il tema non hardcoda sitemap o canonical.

## Alternative scartate

- Mantenere una sitemap statica nel tema.
- Generare URL ignorando locale e stato di pubblicazione.

## Conseguenze

La presenza è coerente con CMS e routing; le modifiche SEO devono verificare URL localizzati e crawler.

## Conferma

Verificare Actions SEO, route pubbliche, sitemap e test di canonical/robots.
