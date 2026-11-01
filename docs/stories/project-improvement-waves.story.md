---
title: "Ondate di miglioramento del progetto guidate dall'audit (esecuzione del piano di correzione)"
type: story
status: in-progress
priority: high
created: 2026-11-01
updated: 2026-11-01
tags: [miglioramento, ottimizzazione, audit, seo, prestazioni, documentazione, crescita, bmad, ecc, second-brain]
qmd: "ondate miglioramento progetto piano correzione audit seo prestazioni documentazione dipendenze origine url sitemap robots hero lcp condivisione crescita"
related:
  - ./project-audit.story.md
  - ./seo-head-maximum-schema-org-hreflang.story.md
  - ../wiki/rules/git-forward-only.md
---

# Ondate di miglioramento del progetto

## Richiesta

L'utente (2026-11-01), in due messaggi successivi:

- «aggiorna, otimizza e migliora ogni aspetto del progetto , fa tutto con ecc + bmad + second brain + filament blueprint»
- «fa tutto quello che serve per rendere virale il progetto ,  fa tutto con ecc + bmad + second brain + filament blueprint»

Segue l'audit approfondito del `<head>` e del SEO di Two e il piano di correzione globale (fasi 0-5) di [project-audit](./project-audit.story.md).

## Metodo e limiti

- **ECC** per le revisioni indipendenti in sola lettura (codice, sicurezza, documentazione) prima di correggere; **BMAD** per questa storia (backlog, claim, esito per voce); **second brain** per la memoria di sessione e la pagina iniziativa.
- **Filament Blueprint non e' installato** (e' a pagamento): non lo si usa e non lo si simula. Le parti Filament restano sotto le regole XotBase del progetto.
- Il database di test non esiste e i test Pest non si eseguono: ogni voce si verifica con GET sul sito servito, PHPStan e Pint. I test scritti e non eseguiti sono dichiarati tali.
- Una cosa alla volta, in ordine di rapporto rischio/sforzo. Nessun commit, nessuna cancellazione di file (copie al posto di sostituzioni), nessun comando che tocchi dati.
- Niente che dipenda da produzione o dall'utente (credenziali, host, testi, scelte di dominio) viene deciso qui: va in «Decisioni dell'utente».
- **Dove si scrive:** audit, misure, brand e decisioni di questo sito vanno nei docs del modulo/tema owner (`laravel/Modules/TechPlanner/docs/wiki/audits/`, `laravel/Themes/Two/docs/`), non in `bashscripts/` (condiviso da molti progetti: solo procedure) e non nei moduli condivisi (`Seo`, `Cms`) se valgono solo per questo sito. I repo di root, moduli e temi sono pubblici: niente dettagli sfruttabili in nessun doc condiviso, la causa si descrive in termini neutri.
- **Fixcity:** per questo progetto il modulo `Modules/Fixcity` non dovrebbe servire (oggi `Disabled` in `module:list`). Non lo si usa come dipendenza ne' come riferimento; non lo si modifica ne' lo si cancella da qui.
- **«Virale» non si puo' garantire ne' costruire con il codice**: dipende da pubblico e contenuti. Si costruiscono le condizioni vere (pagine facili da condividere, contenuti utili, piano di crescita su fatti reali). Non si inventano dati, recensioni o numeri, non si pubblica nulla all'esterno, non si aggiungono script di terzi che violino il consenso cookie.

## Onde

| ID | Voce | Onda | Stato | Verifica |
|---|---|---|---|---|
| IMP-01 | Origine degli URL assoluti (canonical, hreflang, JSON-LD, sitemap, robots) fissata da configurazione in produzione | 1 | da fare | PHPStan, GET, test scritto |
| IMP-02 | `/sitemap.xml` e `/robots.txt` senza sessione e con cache pubblica | 1 | bloccato da IMP-01 | intestazioni via GET |
| IMP-03 | Immagine hero: copia ottimizzata e preload per abbassare l'LCP | 1 | fatto (copia); preload alla corsia A | peso, LCP via Playwright |
| IMP-04 | Correzione dei documenti dell'area SEO (GitHub, Claim, link, numeri, stati) | 1 | in corso | controllo link e confronto col sito |
| IMP-05 | Dipendenze con advisory (solo aggiornamenti compatibili) | 1 | composer pulito; npm = decisione | `composer audit`, `npm audit`, sito 200 |
| IMP-06 | Rilievi della revisione del codice e dell'audit WCAG | 1 | WCAG in parte; codice alla corsia A | PHPStan, Pint, WCAG |
| IMP-07 | Contenuti che portano a pagine inesistenti o nella lingua sbagliata | 2 | dati da fornire | scansione dei link |
| IMP-08 | Fasi 1-5 del piano globale (sicurezza, correttezza, quality gate, dominio, ridondanza) | 3+ | da pianificare per area | per area, in storie separate |
| IMP-09 | Condivisibilita' e crescita: piano su fatti veri, pagine condivisibili senza script di terzi | 1-2 | da fare | GET, WCAG, link |

## Claim

| Voce | Agente | Stato |
|---|---|---|
| IMP-01..09 | claude (sessione 97f16a39) | in corso |

## Decisioni dell'utente

Rotazione delle credenziali tracciate e distacco dei file dal tracciamento; host attendibili di produzione; aggiornamenti di versione maggiore; testi da fornire (intestazione in spagnolo, articolo inglese, logo raster); quale indirizzo email dello studio e' quello vero (`.com` nel footer di ogni pagina e in `faq.json`, `.net` nelle pagine contatti) e la fonte delle cifre «150+», «98%», «100+»; alias duplicati; esecuzione di `npm run build`; canali e budget di crescita, nomi e dati dell'azienda da usare in pubblico; cosa fare dei riferimenti residui a Fixcity fuori dal modulo (chiavi `fixcity::` in Geo, User e nei temi Sixteen/TwentyOne, `pratiche.blade.php` di User che importa classi di Fixcity, base dei test di Seo con il file `fixcity_data.sqlite`). Dettagli sfruttabili non si scrivono in nessun doc condiviso.

## Esito

Si aggiorna riga per riga a fine di ogni voce, con la misura prima/dopo.

- **IMP-01 e IMP-02 (bloccati):** fissare l'origine da `config('app.url')` richiede il valore di produzione (oggi `APP_URL` e' un host locale, quindi cambierebbe canonical e hreflang del sito di sviluppo). Senza di esso togliere la sessione e dare cache pubblica a sitemap e robots significherebbe cachare URL con l'origine della richiesta. Decisione dell'utente: host di produzione.
- **IMP-03 (2026-11-01):** creata la copia `public_html/images/hero-bg-2000.jpg` (2000x2000, JPEG progressivo q72) accanto all'originale 4800x4800, che non e' stato toccato. Le pagine home, contatti, profilo, chi-siamo, radioprotezione (contenuti in entrambe le cartelle, ancora identiche) e il valore predefinito di `hero/about.blade.php` di Two puntano ora alla copia. Misura sulla home: immagine trasferita **3532 KB -> 370 KB**, durata del download 0.7-1.0 s, LCP desktop 1.3-1.7 s (prima 1.5-3.0 s, server di sviluppo rumoroso, tre prove). Resta il preload dell'immagine nell'`<head>` (corsia A, componente `Head`) e l'LCP mobile da rimisurare. L'originale e le copie in `public_html/themes/Two/images/` restano: toglierli e' una decisione sugli asset. Il file nuovo e' in una cartella tracciata dal repo root: non e' stato fatto alcun commit.
- **IMP-05 (2026-11-01):** `composer audit` ora non segnala advisory (quello su `symfony/mime` non c'e' piu'). `npm audit` in Two: 7 voci (1 critica, 2 moderate, 4 basse), **tutte con correzione di versione maggiore**, quindi non applicate. La critica e' `swiper` (prototype pollution, GHSA-hmx5-qpq5-p643, versioni `>=6.5.1 <12.1.2`): e' dichiarata in `package.json` ma **nessun file di `resources/` la importa**, quindi il codice vulnerabile non e' nel bundle. Decisione dell'utente: togliere la dipendenza non usata oppure portarla a `>=12.1.2`; `package.json` e' in modifica da un'altra sessione, quindi non l'ho toccato.
- **IMP-06 WCAG (2026-11-01):** login `/it/auth/login` a 390 e 1280: **0 violazioni axe** (prima `p-as-heading` su 2 nodi: i badge «ISO 9001» e «GDPR» erano `<p>` e ora sono `<div>`). I 9 rilievi sull'accordion della FAQ sono **falsi positivi dell'audit**: provato da tastiera, Enter e Space aprono e chiudono ogni voce (il primo e' aperto di partenza, quindi Enter lo chiude) e il pattern APG non richiede Esc. Il «font al 200%» sborda solo a 390 px con testo al 200% (parole lunghe nei titoli grandi: «Apparecchiature», «Documentazione», «Conformità»); a 320 px con testo normale non c'e' overflow, quindi non e' un fallimento AA, e una correzione vera e' una regola CSS di base che richiede `npm run build`. Restano: bersagli sotto 44 px (criterio AAA) e un contrasto in hover su «Scopri i Servizi».
- **IMP-06 codice:** i rilievi della revisione (rilevamento di `auth:guard`, `try/catch` che non copre il validatore, origine dell'URL costruita in quattro modi) toccano `Head.php` e le Action di Cms, della corsia A; non li ho modificati.
- **IMP-04 (in corso):** aggiunta la sezione `## GitHub (tracciamento)` a cinque story SEO (hub, Cms, Seo, due di Two) riusando issue #18 e discussion #54 del repo base, senza crearne di nuove; corretti tre link relativi rotti in `Modules/Seo/docs` e gli URL e il marchio di `Themes/Two/docs/header-multilingual-implementation.md`; spostate da `Modules/Seo` a TechPlanner le misure specifiche del sito. Restano: Claim e GitHub nella story radice `seo-head-component.story.md` (in modifica da un'altra sessione), link rotti dell'indice di Cms, `wiki/log.md`, cifre superate nelle checklist del wiki.

## GitHub (tracciamento)

- Issue: #18 (repo base)
- Discussion: #54
