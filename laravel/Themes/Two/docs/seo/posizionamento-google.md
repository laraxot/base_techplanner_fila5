---
title: "sottana.com: piano per il primo posto su Google"
type: plan
status: active
created: 2026-11-19
updated: 2026-11-19
tags: [seo, google, local-seo, sottana.com, tema-two, techplanner]
qmd: "sottana.com seo google primo posto ricerca locale radioprotezione elettromedicali Treviso"
related:
  - ../../../../config/local/techplanner/metatag.php
  - ../../../../Modules/Cms/app/Actions/Head/BuildHeadSchemaAction.php
  - ../../../../Modules/Seo/app/Console/Commands/WriteRobotsTxtCommand.php
---

# sottana.com: piano per il primo posto su Google

Sito di **Sottana Service** (radioprotezione, verifiche elettromedicali e autorizzazioni sanitarie per studi dentistici
e cliniche veterinarie, Mogliano Veneto). Tenant `config/local/techplanner`, tema Two.

Nessuno può garantire il primo posto: Google decide da sé. In questa nicchia però la concorrenza locale è debole
(per «radioprotezione studi dentistici Treviso» oggi escono soprattutto tesi universitarie e PDF), quindi con il sito
indicizzato, la scheda Google Business Profile e qualche recensione il primo posto per le ricerche locali è realistico.

## Ricerche da presidiare

| Ricerca | Pagina che deve uscire |
|---|---|
| Sottana Service, sottana.com | home |
| radioprotezione studio dentistico Treviso / Venezia / Padova / Veneto | `/it/services/radioprotezione` |
| esperto di radioprotezione studio dentistico Treviso | `/it/services/radioprotezione` |
| verifiche elettromedicali studio dentistico Treviso, CEI EN 62353 | `/it/services/elettromedicali` |
| autorizzazione sanitaria studio dentistico Veneto | `/it/services/documentazione` |
| radioprotezione clinica veterinaria Veneto | `/it/services/radioprotezione` |

## Audit del 2026-11-19 (sito in produzione)

| Problema | Effetto | Stato |
|---|---|---|
| `robots.txt` con contenuto giusto ma stato **404** (nginx `location = /robots.txt` cerca il file) | Google lo ignora, compresa la riga `Sitemap:` | Corretto: `php artisan seo:robots` scrive il file a ogni rilascio (`deploy.sh`) |
| Dati strutturati solo `Organization` (nome e logo) | Google non lega il sito a indirizzo, telefono e zona | Corretto: `ProfessionalService` con indirizzo, telefono, P.IVA, zona servita, servizi, profili social |
| Titoli generici («Elettromedicali — Sottana Service») | Nessuna parola cercata nel titolo | Corretto: servizio + norma/zona nel titolo |
| Pagine servizi con circa 100 parole | Troppo poco per posizionarsi | Corretto: 400–650 parole, obblighi di legge, periodicità, domande frequenti |
| Indirizzo scritto in tre modi | Segnale locale incoerente | Corretto: ovunque «Via Augusto Vanzo 86 A, 31021 Mogliano Veneto (TV)» |
| Stili del testo CMS mai caricati (`@stack('styles')` assente) | Privacy, termini, articoli e servizi senza titoli né elenchi formattati | Corretto in `cms::components.head` |
| Sitemap senza `lastmod` | Google non sa quando ripassare | Corretto: data da `updated_at` della pagina |
| Home: redirect `/` → `/it` con 302 | — | Corretto così: per la scelta della lingua Google raccomanda 302 + `x-default` |
| Pagine inglesi dei servizi senza testo | — | Già `noindex` e fuori dalla sitemap: va bene |

## Cosa deve fare Marco (fuori dal codice), in ordine di impatto

1. **Google Business Profile** (business.google.com): categoria principale «Consulente per la sicurezza» o
   «Servizio di consulenza», secondarie pertinenti; nome **Sottana Service**, indirizzo e telefono identici al sito;
   zona servita (province di Treviso, Venezia, Padova); servizi con le stesse parole delle pagine; link a
   `https://sottana.com/it`. È il fattore più forte per le ricerche «servizio + città».
2. **Google Search Console**: verificare il dominio, inviare `https://sottana.com/sitemap.xml`, chiedere
   l'indicizzazione di home e pagine servizi. Ripetere su **Bing Webmaster Tools** (importa da Search Console).
3. **Recensioni**: chiedere ai clienti soddisfatti una recensione su Google, con il link diretto della scheda.
4. **Citazioni coerenti**: stessa ragione sociale, indirizzo e telefono su PagineGialle, Europages, LinkedIn (pagina
   aziendale), Facebook, eventuali elenchi di associazioni di categoria.
5. **Link da siti del settore**: fornitori di apparecchi, ordini/associazioni, studi clienti che citano il servizio.
6. **Rilascio**: dopo il deploy controllare `curl -I https://sottana.com/robots.txt` (atteso `200`) e il test dei
   risultati multimediali di Google sulla home (deve riconoscere `ProfessionalService`).

## Contenuti da scrivere (uno al mese, in italiano)

Articoli nel blog, ciascuno con link alla pagina servizio collegata:

- Ogni quanto fare le verifiche elettromedicali nello studio dentistico (CEI EN 62353).
- Esperto di radioprotezione: quando serve e cosa fa nello studio dentistico.
- Controlli di qualità sugli apparecchi RX dopo il D.Lgs 203/2022.
- Aprire uno studio dentistico in Veneto: autorizzazione all'esercizio (L.R. 22/2002) passo per passo.
- Radioprotezione nella clinica veterinaria: obblighi e controlli.

Fonti usate per i testi delle pagine servizi: D.Lgs 101/2020 art. 130 (sorveglianza fisica almeno annuale),
Allegato XXVIII come modificato dal D.Lgs 203/2022 (controlli di qualità «di norma annuali»), artt. 110–111
(formazione almeno quinquennale), CEI EN 62353 (intervallo 6–36 mesi; guida CEI: almeno biennale per locali di
gruppo 1), L.R. Veneto 16 agosto 2002 n. 22.

## Come si verifica

```bash
cd laravel
php artisan seo:robots --dry-run                  # contenuto di robots.txt
./vendor/bin/pest Modules/Cms/tests/Unit/Actions/Head Modules/Seo/tests/Feature/WriteRobotsTxtCommandTest.php
./vendor/bin/pest Modules/TechPlanner/tests       # contratto dei contenuti, link senza prefisso di lingua
```

Misura dei risultati: Search Console → Rendimento (query e posizione media) e Google Business Profile → Rendimento,
una volta al mese.
