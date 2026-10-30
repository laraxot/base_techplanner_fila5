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

## Passata 2026-10-30 (sessione 97f16a39, progetto techplanner / tema Two)

In questo progetto `/sitemap.xml` rispondeva 404: la rotta stava nel modulo Fixcity (assente da questa copia) e `Modules/Xot/routes/web_seo.php` ha il `@require` commentato.
Cause trovate e corrette in Seo:

- `SeoServiceProvider` non ridefiniva `$module_dir` e `$module_ns` (lo fanno Cms, User, Notify e altri): `XotBaseServiceProvider` registrava il `RouteServiceProvider` di Xot e non quello di Seo, quindi `Modules/Seo/routes/web.php` (vuoto) non veniva mai caricato. Aggiunte le due proprieta' a `SeoServiceProvider` e a `Seo\Providers\RouteServiceProvider`. Il modulo non ha migrazioni e `api.php` e' vuoto: nessun effetto sul database.
- `routes/web.php` ora registra `GET /sitemap.xml` (`seo.sitemap`) e `GET /robots.txt` (`seo.robots`) con la sintassi ad array `[Classe::class, '__invoke']`: la sola classe, dentro il gruppo con `namespace()` del provider, viene prefissata e lancia «Invalid route action» (errore reale commesso e corretto in questa sessione, vedi sotto).
- Nuovo `Actions/Robots/BuildRobotsTxtAction` (aree riservate chiuse in ogni lingua, `Disallow: /*/admin`, riga `Sitemap:`). Test `tests/Unit/Actions/Robots/BuildRobotsTxtActionTest.php`: scritto, **non eseguito** (Pest vietato: database di test inesistente).

Esito misurato (GET su Two, 2026-10-30): `/sitemap.xml` 200 `application/xml`, XML ben formato, 76 URL distinti in 4 lingue con `hreflang` reciproco e `x-default`; le 19 URL in `it` rispondono tutte 200. `/robots.txt` 200 `text/plain`. PHPStan `Modules/Seo`: nessun errore.

Cose che la sitemap mostra e che non sono state toccate (dati del CMS, non codice):
- `/it/profile` e' in sitemap ma e' una pagina riservata (da ospite reindirizza al login): va esclusa o resa `noindex` dalla politica robots della corsia B.
- Coppie di alias con lo stesso contenuto: `cookie`/`cookies`, `faq`/`faqs`, `contacts`/`contatti`, `about`/`chi-siamo`: rischio di contenuto duplicato, serve un canonical o un solo URL.
- Non verificato: contenuto delle URL di dettaglio di blog e servizi oltre lo stato 200; AC di `dcp-274` sui ticket (modulo Fixcity assente in questa copia).

Errore di questa sessione: con la prima versione delle rotte (classe senza array) `/sitemap.xml` e `/robots.txt` hanno risposto 500 «Invalid route action», lanciato dal gruppo di rotte del provider mentre si registrano le rotte. Per come e' fatto l'errore e' probabile che abbia colpito anche le altre pagine del sito di sviluppo per qualche minuto; non l'ho misurato in quel momento. Dopo la correzione `/it` e `/en` rispondono 200.
