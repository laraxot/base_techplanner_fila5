---
title: "Contratto — BuildRobotsTxtAction"
type: contract
action: "Modules\\Seo\\Actions\\Robots\\BuildRobotsTxtAction"
module: Seo
status: active
tags: [contract, action, seo, robots, noindex]
created: 2026-11-26
updated: 2026-11-26
related:
  - ../adr/0001-robots-disallow-subset-of-head-noindex.md
  - ../../app/Actions/Robots/BuildRobotsTxtAction.php
  - ../../app/Console/Commands/WriteRobotsTxtCommand.php
---

# BuildRobotsTxtAction

Contratto di comportamento (regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`). Perche': ADR [0001](../adr/0001-robots-disallow-subset-of-head-noindex.md).
Sorgente: `app/Actions/Robots/BuildRobotsTxtAction.php`. Rotta `seo.robots` (`GET /robots.txt`); il comando `seo:robots` (`WriteRobotsTxtCommand`) ne scrive l'output su disco.
Sola lettura, ma un `Disallow` sbagliato chiude ai motori una pagina pubblica o nasconde un `noindex`.

## Input

- Le lingue supportate (`LaravelLocalization::getSupportedLocales()`), le costanti `PRIVATE_SEGMENTS` e `url('/sitemap.xml')`.

## Output

- `execute()`: testo `robots.txt` che comincia con `User-agent: *`, ha una riga `Disallow: /{lang}/{segmento}` per ogni lingua e segmento riservato, `Disallow: /admin`, `Disallow: /*/admin` e termina con `Sitemap: <URL assoluto>` e un a capo.
- `__invoke()`: `Response` 200, `Content-Type: text/plain; charset=UTF-8`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| SEO-ROBOTS-INV-1 | Ogni segmento riservato (`auth`, `area-personale`, `dashboard`, `notifications`, `profile`) e' chiuso in ogni lingua supportata, e `/*/admin` e' chiuso. | `SEO-ROBOTS-INV-1` |
| SEO-ROBOTS-INV-2 | Il testo comincia con `User-agent: *`, dichiara la sitemap con URL assoluto e finisce con un a capo. | `SEO-ROBOTS-INV-2` |
| SEO-ROBOTS-INV-3 | La rotta risponde 200 in `text/plain`. | `SEO-ROBOTS-INV-3` |
| SEO-ROBOTS-INV-4 | Ogni segmento chiuso e' anche `noindex` nel `<head>` (`PRIVATE_SEGMENTS` ⊆ `ResolveRobotsPolicyAction::HIDDEN_SEGMENTS`): un `Disallow` non deve nascondere il `noindex` che toglie la pagina dall'indice. | `SEO-ROBOTS-INV-4` |
| SEO-ROBOTS-INV-5 | Il file scritto da `seo:robots` e' identico all'output dell'Action (e con `--dry-run` il comando non scrive). | `SEO-ROBOTS-INV-5` |

## Effetti collaterali

- Nessuno: l'Action costruisce testo. La scrittura su disco e' del comando `seo:robots` (`File::put` verso `public_path('robots.txt')` o `--path`).

## Errori

- Nessuna eccezione propria.

## Non fa

- Non decide cosa e' `noindex`: lo decide Cms (`ResolveRobotsPolicyAction`); qui si chiude solo un sottoinsieme.
- Non chiude `/api`, le pagine di prova (`/{lang}/tests`) ne' le aree di sviluppo: il file statico del progetto lo fa, l'Action no.
- Non garantisce che il web server serva il suo output: vedi «Limiti noti».
- Il test di INV-1 non controlla `Disallow: /admin` (senza lingua), che il codice scrive alla riga 41.

## Limiti noti

- **Nel progetto il file servito e' scritto a mano.** `public_html/robots.txt` ha 50 righe `Disallow`, non chiude `notifications` ne' `profile`, chiude `/api` e le aree di sviluppo, e `deploy.sh` non lancia `seo:robots` (`rg -n robots deploy.sh` e' vuoto). Le invarianti sopra valgono per l'Action; per il file statico vedi lo «Stato attuale» dell'ADR [0001](../adr/0001-robots-disallow-subset-of-head-noindex.md).
