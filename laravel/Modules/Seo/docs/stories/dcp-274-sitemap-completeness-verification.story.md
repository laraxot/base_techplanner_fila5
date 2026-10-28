---
id: dcp-274
title: "DCP-274: verifica copertura completa sitemap.xml (ticket + blog + eventi)"
type: story
epic: dc-parity-v2
status: ready
priority: P1
owner: module:Seo
module: Seo
created: 2026-10-26
updated: 2026-10-26
qmd: "verifica sitemap copertura completa ticket blog eventi folio generico dcp-166 dcp-273"
related: [dcp-166, dcp-273, dcp-272]
---

# DCP-274: Verifica copertura completa sitemap.xml

## Contesto
`dcp-166` ha implementato `sitemap.xml`, `canonical`, `hreflang`. `dcp-273` ha definito il contratto `SitemapPathsContract` per i dettagli (blog, eventi, ticket). Questo task verifica che **tutto** sia incluso nella pratica.

## Storia utente
Come motore di ricerca, voglio trovare in `sitemap.xml` **tutte** le pagine pubbliche (CMS, blog, eventi, ticket) così da indicizzarle correttamente.

## Criteri di accettazione
- [ ] `curl /sitemap.xml` → 200, XML valido
- [ ] Contiene almeno una URL `tickets/{id}` (es. `/it/tickets/35` se pubblico)
- [ ] Contiene almeno una URL `blog/{slug}` e `events/{slug}` (se articoli/eventi pubblicati)
- [ ] `robots.txt` cita `Sitemap: https://.../sitemap.xml` (DCP-155)
- [ ] `lg-design-scan.py` → 0 errori per sitemap, canonical, hreflang

## Verifica data-level (se fallisce AC sopra)
1. `php artisan tinker`:
   ```php
   $t = Ticket::find(35); echo $t->location ? 'ok' : 'NULL'; echo $t->status->value;
   ```
   Se `location` NULL o `status` non in `canViewByAll()` → ticket non pubblico, corretto che non sia in sitemap.
2. `ThemeArticleQueries::publishedPostSlugs()` → vuoto? Allora nessun post pubblicato, corretto.
3. `app()->tagged('seo.sitemap.paths')` include `ListPublicTicketPathsAction` e `ListPublishedArticlePathsAction`?

## Test esistenti
`Modules/Fixcity/tests/Feature/Pages/SeoLinksTest.php`:
- `test_sitemap_contains_public_ticket_details` (line 177)
- `test_sitemap_contains_blog_and_event_details` (line 260)
- `test_sitemap_urls_respond_200_with_content` (line 290)

## Note implementazione
Nessun nuovo codice. Solo verifica dati e conferma test verdi. Se dati non pubblici, creare contenuto di test o accettare che sitemap sia corretta per il dataset corrente.
