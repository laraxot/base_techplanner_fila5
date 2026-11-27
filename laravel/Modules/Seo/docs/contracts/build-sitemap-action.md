---
title: "Contratto — BuildSitemapAction"
type: contract
action: "Modules\\Seo\\Actions\\Sitemap\\BuildSitemapAction"
module: Seo
status: active
tags: [contract, action, seo, sitemap, lastmod, hreflang]
created: 2026-11-26
updated: 2026-11-26
related:
  - ../adr/0003-sitemap-built-in-seo-fed-by-tagged-sources.md
  - ../adr/0002-search-engine-presence.md
  - ../../app/Actions/Sitemap/BuildSitemapAction.php
  - ../../routes/web.php
---

# BuildSitemapAction

Contratto di comportamento (regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`). Perche': ADR [0003](../adr/0003-sitemap-built-in-seo-fed-by-tagged-sources.md) (chi costruisce la sitemap)
e [0002](../adr/0002-search-engine-presence.md) (`<lastmod>` e IndexNow). Sorgente: `app/Actions/Sitemap/BuildSitemapAction.php`. Rotta `seo.sitemap` (`GET /sitemap.xml`, `routes/web.php` riga 12);
chiamanti: la rotta (`__invoke()`) e il comando `seo:indexnow`, che legge la stessa sitemap per sapere quali URL inviare (`SubmitIndexNowCommand` riga 109).
Sola lettura, ma e' l'elenco che i motori di ricerca ricevono: se sbaglia, il sito non e' indicizzato o espone pagine che non deve.

Il sito non e' ancora indicizzato: nessuna invariante qui dice che una pagina entrera' nell'indice. Dicono cosa la sitemap contiene e cosa promette di non contenere.

## Input

- Le pagine CMS (`Modules\Cms\Models\Page`, righe dei JSON del tenant), le lingue supportate (`LaravelLocalization`), gli alias di percorso del tenant (`SeoConfigData::pathAliases()`).
- Le fonti registrate sotto `SitemapPathsContract::TAG` (`Blog`: post ed eventi; `Fixcity`: segnalazioni pubbliche) e, se la fonte implementa `SitemapLastModifiedContract`, le loro date.

## Output

- `execute()`: stringa XML `<urlset>` con, per ogni pagina e ogni lingua in cui esiste, un `<url>` con `<loc>` assoluto, `<lastmod>` solo se c'e' una data e i link `xhtml:link` (`hreflang` per ogni lingua della pagina, piu' `x-default` verso la lingua predefinita).
- `__invoke()`: `Response` 200 con `Content-Type: application/xml; charset=UTF-8`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| SEO-SITEMAP-INV-1 | `GET /sitemap.xml` risponde 200 con un XML che si legge come sitemap e contiene almeno una URL. | `SEO-SITEMAP-INV-1` |
| SEO-SITEMAP-INV-2 | I modelli di dettaglio senza record (`/{lang}/blog/view`, `/events/view`, `/services/view`) non compaiono mai: sono pagine vuote. | `SEO-SITEMAP-INV-2` |
| SEO-SITEMAP-INV-3 | Ogni percorso di una fonte taggata compare per ogni lingua supportata (il test controlla it ed en). Se cade, un contenuto di un modulo e' indicizzabile in una lingua sola. | `SEO-SITEMAP-INV-3` |
| SEO-SITEMAP-INV-4 | Una fonte taggata che implementa `SitemapLastModifiedContract` porta in sitemap la sua data di ultima modifica come `<lastmod>`: una pagina inviata dopo quella data non e' ripresentata a IndexNow, una inviata prima si'. Il test non controlla il formato ATOM del testo. | `SEO-SITEMAP-INV-4` |
| SEO-SITEMAP-INV-5 | Un percorso senza data vera non ha `<lastmod>`: mai una data inventata o uguale per tutti. | — (non dimostrato) |
| SEO-SITEMAP-INV-6 | Restano fuori: pagine di prova (`tests/`), `auth.*`, pagine dietro `auth`, pagine che hanno senso solo con un parametro, alias che reindirizzano (si elenca l'URL finale), URL `noindex` secondo Cms `ResolveRobotsPolicyAction`. Se cade, la sitemap elenca URL che il `<head>` o il redirect smentiscono. | — (non dimostrato nel pacchetto; provato, senza group, da `Modules/Fixcity/tests/Feature/Pages/SeoLinksTest.php`: test «serves a valid sitemap with the public pages in every language and nothing private», «lists only final urls, never one that redirects», «lists no url that robots.txt blocks») |
| SEO-SITEMAP-INV-7 | Con piu' lingue per una pagina, ogni `<url>` porta un `hreflang` per ciascuna delle sue lingue (per le pagine CMS: quelle in cui e' scritta; per le fonti taggate: tutte) e un `x-default` verso la lingua predefinita se presente. | — (non dimostrato: i test di Cms controllano gli hreflang del `<head>`, non quelli della sitemap) |
| SEO-SITEMAP-INV-8 | Ogni URL e' escapata come XML (`htmlspecialchars` con `ENT_XML1`, riga 170): un percorso con `&` o `'` non rompe il documento. | — (non dimostrato) |
| SEO-SITEMAP-INV-9 | L'ordine e' deterministico (per percorso, `ksort`) e una pagina CMS gia' vista conserva le sue lingue anche se una fonte taggata elenca lo stesso percorso (`??=`). | — (non dimostrato) |

## Effetti collaterali

- Nessuna scrittura, nessun evento, nessuna cache: ogni richiesta (e ogni `seo:indexnow`, a ogni deploy) rilegge i JSON delle pagine e interroga ogni fonte taggata.
- Per ogni fonte taggata: le query della fonte (per Blog, quattro `SELECT` su `articles`, vedi [ListPublishedArticlePathsAction](../../../Blog/docs/contracts/list-published-article-paths-action.md)).

## Errori

- Nessuna eccezione propria. Una data `updated_at` di pagina non leggibile diventa «nessuna `<lastmod>`» (`catch \Throwable`, riga 153); gli errori di una fonte taggata risalgono e fanno rispondere 500 a `/sitemap.xml`.

## Non fa

- Non conosce i modelli dei moduli: solo `SitemapPathsContract` e `SitemapLastModifiedContract` (ADR 0003).
- Non invia nulla ai motori: lo fa [SubmitIndexNowAction](submit-index-now-action.md); per Google conta la sitemap inviata da Search Console.
- Non decide cosa e' `noindex`: lo decide Cms `ResolveRobotsPolicyAction`; qui lo si applica.
- Non spezza la sitemap: il protocollo ammette 50.000 URL per file e la classe non ha un controllo (`rg 50000 Modules/Seo/app` e' vuoto). Con 4 lingue e un numero crescente di articoli e segnalazioni il limite e' raggiungibile; oggi non e' monitorato.

## Limiti noti

- **Il docblock della classe e' indietro**: dice «Niente `lastmod`», ma `lastModified(Page)` (riga 143) scrive `Y-m-d` da `updated_at` della pagina. Solo la home ha `updated_at` al primo livello tra le pagine indicizzabili (vedi «Stato attuale» dell'ADR 0002), con una data (2026-10-23) piu' vecchia dell'ultima modifica del file (2026-11-12): `<lastmod>` della home e' probabilmente falsa. Letto, non misurato.
- La prova di INV-3 si ferma a due lingue su quattro e viene saltata (`markTestSkipped`) se Blog non e' installato o se nessun modulo registra il tag; il commento che dice «questo progetto non lo fa per Blog» non e' piu' vero (`BlogServiceProvider.php` riga 32).
- Un modulo che si dimentica il tag non compare in sitemap e non c'e' alcun errore (conseguenza dichiarata nell'ADR 0003).
