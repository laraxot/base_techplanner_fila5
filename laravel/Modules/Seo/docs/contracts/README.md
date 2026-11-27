---
title: "Contratti del modulo Seo"
type: index
tags: [contracts, actions, seo, indexnow, sitemap, robots]
created: 2026-11-18
updated: 2026-11-26
---

# Contratti del modulo Seo

Cosa promettono le Action di Seo che parlano con i motori di ricerca: l'invio delle URL a IndexNow, il file pubblico della chiave che i motori scaricano per verificarlo, la sitemap (con `<lastmod>` e hreflang)
e il `robots.txt`. Le altre Action (metatag, URL, link social) costruiscono testo senza effetti collaterali e sono coperte dai loro test. Il JSON-LD (`Organization`, `sameAs`, meta di verifica) non e' in Seo:
sta in Xot (`MetatagData`) e Cms (`BuildHeadSchemaAction`) e va coperto li'.

Il sito non e' ancora indicizzato: nessun contratto qui promette che una pagina entri nell'indice. Dicono cosa viene inviato, cosa e' elencato e cosa e' escluso.

Leggili prima di chiamare o modificare l'invio a IndexNow, la rotta `/{chiave}.txt`, la sitemap o `robots.txt`. Le invarianti con group si
verificano con `cd laravel && vendor/bin/pest Modules/Seo/tests --group=<ID>`; `— (non dimostrato)` e' debito dichiarato.

Formato (sei sezioni, tabella invarianti con ID, `@contract` nel docblock):
ADR [0012 di Xot](../../../Xot/docs/adr/0012-behavioral-contract-governance.md) e [regola canonica](../../../Xot/docs/rules/action-behavioral-contract.md).

## Contratti

IndexNow:

- [SubmitIndexNowAction](submit-index-now-action.md) — invia a `api.indexnow.org` solo URL dell'host, una volta, a blocchi da 10.000; spenta senza chiave valida.
- [ServeIndexNowKeyAction](serve-index-now-key-action.md) — `/{chiave}.txt` risponde solo per la chiave configurata, 404 per tutto il resto.

Sitemap e robots:

- [BuildSitemapAction](build-sitemap-action.md) — `/sitemap.xml`: pagine CMS e percorsi dei moduli in ogni lingua, `<lastmod>` solo con date vere, hreflang.
- [BuildRobotsTxtAction](build-robots-txt-action.md) — `robots.txt` dell'Action: aree riservate chiuse in ogni lingua, solo se gia' `noindex` nel `<head>`.

## Stato di copertura

Aggiornato il 2026-11-26. 4 contratti, 24 invarianti: **17 dimostrate** da un test con group, 1 provata da test di Fixcity senza group, 6 promesse dal codice ma non dimostrate.

| Contratto | Invarianti | Dimostrate |
|---|---|---|
| SubmitIndexNowAction | 7 | 6 (manca INV-7, servizio irraggiungibile) |
| ServeIndexNowKeyAction | 3 | 2 (manca `SEO-INDEXNOW-KEY-INV-3`, `hash_equals`) |
| BuildSitemapAction | 9 | 4 (INV-6 provata in Fixcity senza group; INV-5, 7, 8, 9 no) |
| BuildRobotsTxtAction | 5 | 5 |

Il sito non e' indicizzato: «dimostrata» vuol dire che un test prova cosa l'Action produce, non che un motore la usi. Il file `robots.txt` servito in produzione e' quello statico di `public_html`, non l'output di `BuildRobotsTxtAction`:
vedi lo «Stato attuale» dell'[ADR 0001](../adr/0001-robots-disallow-subset-of-head-noindex.md).

## Backlog contract

Action del modulo senza contratto (nessuna scrive o chiama servizi esterni: lo script di audit ne conta 0):

| Action | Perche' |
|---|---|
| `Actions/Url/ResolvePathAliasAction.php`, `Actions/Url/NormalizeLocalizedPathAction.php` | Decidono i redirect 301 degli alias e quindi quale URL e' canonica (e quale entra in sitemap); hanno test unitari, nessun contratto. Candidate se gli alias si usano davvero. |
| `Actions/Metatag/*`, `Actions/GenerateSocialShareLinksAction.php` | Costruiscono testo/link senza effetti collaterali; i test unitari bastano. |
| JSON-LD (`Organization`, `sameAs`) | Non e' in Seo (Xot `MetatagData`, Cms `BuildHeadSchemaAction`): il contratto va scritto nel modulo proprietario. |

## Backlog test

| ID | Cosa servirebbe |
|---|---|
| SEO-INDEXNOW-INV-7 | `Http::fake(fn () => throw new ConnectionException('timeout'))`: `statuses === [0]`, nessuna eccezione, `Log::warning` scritto. |
| SEO-INDEXNOW-KEY-INV-3 | Un test sul sorgente (`hash_equals` presente in `ServeIndexNowKeyAction`); un test di tempo sarebbe instabile. Un test HTTP della rotta `/{chiave}.txt` completerebbe KEY-INV-1/2. |
| SEO-SITEMAP-INV-5 | Una fonte taggata senza `SitemapLastModifiedContract`: il suo `<url>` non ha `<lastmod>`. |
| SEO-SITEMAP-INV-6 | Aggiungere il group ai test di `Modules/Fixcity/tests/Feature/Pages/SeoLinksTest.php` (altro pacchetto); in Seo un test con pagina `auth.*`, alias e pagina `noindex`. |
| SEO-SITEMAP-INV-7, SEO-SITEMAP-INV-8, SEO-SITEMAP-INV-9 | Hreflang e `x-default` letti dal XML con una pagina scritta in due lingue; un percorso con `&`; ordine e `??=`. |
