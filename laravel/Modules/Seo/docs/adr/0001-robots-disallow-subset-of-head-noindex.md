---
title: "ADR — robots.txt chiude solo aree già noindex nel <head>: due elenchi, uno contenuto nell'altro"
type: decision
status: accepted
decision-makers: [team Laraxot]
module: Seo
tags: [adr, seo, robots, noindex, cms]
created: 2026-11-24
updated: 2026-11-26
related:
  - ../../app/Actions/Robots/BuildRobotsTxtAction.php
  - ../../../Cms/app/Actions/Head/ResolveRobotsPolicyAction.php
  - ../../tests/Unit/Actions/Robots/RobotsSegmentsMatchHeadPolicyTest.php
---

# ADR: `robots.txt` chiude solo aree che il `<head>` dichiara già `noindex`

## Contesto

- Un `Disallow` in `robots.txt` impedisce al crawler di **leggere** la pagina, quindi anche il suo `meta robots noindex`.
  Una pagina chiusa ma linkata da fuori finisce nell'indice come URL «senza descrizione».
- Il `Disallow` non vale per le copie con la lingua scritta diversamente e non toglie dall'indice una pagina già nota:
  l'esclusione vera è il `noindex` del `<head>`, deciso da Cms `ResolveRobotsPolicyAction` (`HIDDEN_SEGMENTS`).
- `BuildRobotsTxtAction::PRIVATE_SEGMENTS` (`auth`, `area-personale`, `dashboard`, `notifications`, `profile`) chiude in
  ogni lingua le aree riservate che non hanno nulla da indicizzare, più `/admin` e `/*/admin` dei pannelli Filament.

Domanda: unificare i due elenchi o tenerli separati?

## Driver della decisione

- Un `Disallow` impedisce di leggere il `meta robots noindex` della pagina: chiudere e nascondere la stessa pagina la lascia nell'indice come URL «senza descrizione».
- Le aree riservate che rispondono con un reindirizzamento al login non devono consumare scansioni.
- L'esclusione dall'indice ha un solo proprietario, il `<head>` (Cms `ResolveRobotsPolicyAction`); `robots.txt` (Seo) deve restarne un sottoinsieme, e la dipendenza Seo verso Cms e' ammessa da `SEO_ALLOWED_MODULES`.

## Decisione

- Due elenchi separati, con un vincolo: ogni segmento chiuso in `robots.txt` deve essere anche `noindex` nel `<head>`
  (`PRIVATE_SEGMENTS` ⊆ `HIDDEN_SEGMENTS`). Il `<head>` può nasconderne di più (`coming-soon`, `preview-content`) senza
  chiuderli ai crawler, così il `noindex` resta leggibile.
- `robots.txt` è dinamico (`BuildRobotsTxtAction`, rotta `seo.robots`) e chiude con `Sitemap: <url assoluto>`; il comando
  `seo:robots` (`WriteRobotsTxtCommand`, lanciato a ogni deploy) scrive lo stesso contenuto in `public/robots.txt`: con
  un server web che cerca prima il file statico e ricade su Laravel con `error_page 404`, la rotta arriverebbe con stato
  404 e Google ignorerebbe il file, sitemap compresa.

## Alternative scartate

- Un elenco unico usato da entrambi: le pagine `noindex` diventerebbero anche `Disallow`, e il crawler non leggerebbe più
  il `noindex` che le toglie dall'indice.
- Solo `noindex`, niente `Disallow`: i crawler sprecano scansioni su aree riservate che rispondono redirect al login.
- `robots.txt` statico scritto a mano nel `public/` del progetto: perde le lingue configurate e la sitemap col dominio
  giusto (il file in `public/` è generato dal comando, non scritto a mano).

## Conseguenze

- Pro: le aree riservate non si scansionano e non finiscono nell'indice come URL vuote.
- Contro: due costanti in due moduli (Seo e Cms) da tenere allineate a mano; il test lo impone in una direzione sola.

## Stato attuale

Misurato il 2026-11-26 leggendo il repository (nessun test eseguito):

- **Il comando non gira al deploy.** La Decisione dice che `seo:robots` e' «lanciato a ogni deploy»; `rg -n robots deploy.sh` dalla radice non trova nulla (nel deploy c'e' solo `seo:indexnow`, riga 229).
- **Il file servito dal sito e' scritto a mano.** `public_html/robots.txt` (ultima modifica in git `f80c98f980`, 2026-11-19) ha 50 righe `Disallow`, `Sitemap: https://fixcity.eu/sitemap.xml` alla riga 114 e non chiude `/{lang}/notifications` ne' `/{lang}/profile`,
  che `BuildRobotsTxtAction::PRIVATE_SEGMENTS` chiude. Chiude invece `/{lang}/tests`, `/{lang}/learn` e altre aree di sviluppo che l'Action non conosce.
  L'Action e la rotta `seo.robots` esistono, ma quale dei due arrivi a un crawler dipende dalla configurazione del web server, che il repository non contiene.
- **Quindi il vincolo `PRIVATE_SEGMENTS` ⊆ `HIDDEN_SEGMENTS` protegge l'output dell'Action, non il file in `public_html`.** Per il file statico esiste solo `Modules/Fixcity/tests/Feature/Pages/SeoLinksTest.php` (nessuna URL della sitemap bloccata dal file, stesse aree chiuse in ogni lingua).
- Decisione umana aperta: far scrivere il file al deploy (`php artisan seo:robots` con `--path` verso `public_html/robots.txt`) oppure dichiarare il file statico la sorgente e ridurre l'Action alla sola rotta di riserva.

## Conferma

- `cd laravel && vendor/bin/pest Modules/Seo/tests/Unit/Actions/Robots/RobotsSegmentsMatchHeadPolicyTest.php` (group `SEO-ROBOTS-INV-4`): fallisce se un segmento di `PRIVATE_SEGMENTS` non e' in `ResolveRobotsPolicyAction::HIDDEN_SEGMENTS`.
- `vendor/bin/pest Modules/Seo/tests/Unit/Actions/Robots/BuildRobotsTxtActionTest.php Modules/Seo/tests/Feature/WriteRobotsTxtCommandTest.php`:
  ogni area chiusa in ogni lingua, sitemap assoluta, file scritto uguale alla rotta (contratto [BuildRobotsTxtAction](../contracts/build-robots-txt-action.md)).
- `vendor/bin/pest Modules/Fixcity/tests/Feature/Pages/SeoLinksTest.php`: vale per il file statico di `public_html`.
- Non verificato da nessuna parte: che il deploy produca il file; vedi «Stato attuale».
