---
id: dcp-289
title: "DCP-289: dati dell'ente in un'unica sorgente e blocchi che si nascondono se il dato manca"
type: story
epic: go-live-fo-audit
status: in-progress
priority: P0
owner: module:Tenant
module: Tenant
created: 2026-10-26
updated: 2026-10-26
qmd: "dcp 289 dati ente unica sorgente config ente.php EnteData GetEnteDataAction segnaposto numero verde 05 0505 tel:050505 Demo Name of the Region href diesis Seguici su Secondaria contatti footer DPO PEC social orari blocco si nasconde FO-1-02 FO-1-03 FO-1-04 FO-1-23 FO-1-27 FO-4-05 FO-4-07 FO-4-23 FO-4-27 FO-6-02 FO-2-29 B-03 B-09 B-20 DEC-01 DEC-03 DEC-06 DEC-16"
related: [dcp-198, dcp-200, dcp-186, dcp-130, dcp-286, dcp-288]
tags: [ente, tenant, config, front-office, segnaposto, numero-verde, contatti, dpo, social, tdd, bmad]
---

# DCP-289: dati dell'ente in un'unica sorgente e blocchi che si nascondono se il dato manca

Origine: audit front office del 2026-10-26, riscontri FO-1-02, FO-1-03, FO-1-04, FO-1-23, FO-1-27 (gruppo fo-1), FO-4-05, FO-4-07, FO-4-23,
FO-4-27 (fo-4), FO-6-02 (fo-6), FO-2-29 (fo-2) e gap B-03, B-09, B-20. Ogni affermazione dell'audit e' stata riverificata prima di toccare:
sotto, ogni fatto e' marcato MISURATO (eseguito da me, con l'output) o DEDOTTO (letto dal codice, non eseguito).

## Fase BMAD

Dev (TDD): story prima, poi test rosso, codice, test verde, misura nel browser su :8091 (istanza di prova con DB usa-e-getta).
La story sta nel modulo Tenant: vedi la decisione D1 (proprieta' per dominio e dipendenza, non per posizione del file).

## Stato

in-progress. Il codice e la config dei dati dell'ente sono scritti dall'ente stesso: qui si costruisce solo la sorgente, vuota, e i blocchi che
la leggono. Nessun dato e' stato inventato.

## Fatti misurati prima di toccare

Istanza `http://127.0.0.1:8091`, ospite, pagine scaricate con `curl` (script `scratchpad/dcp289/sweep.py`, 21 percorsi x 4 lingue) e con
Puppeteer (`scratchpad/dcp289/shots.mjs`, 1280 e 375 px).

| Fatto | Come | Esito |
| --- | --- | --- |
| MISURATO. Barra alta: "Demo" in it, "Name of the Region" in en, "Name der Region" in de, "Nombre de la Region" in es, su tutte le pagine provate (21 x 4) | sweep.py, colonne `Demo` e `Region` | 21 pagine it con `>Demo<`, 63 pagine en/de/es con il nome inglese, tedesco, spagnolo |
| MISURATO. `tel:050505` e "Chiama il numero verde 05 0505": /it/tickets, /{en,de,es}/tickets, /it/blog, /it/events (solo it), /it/tickets/confirmation (testo senza tel) | sweep.py, colonne `tel050505` e `05 0505` | 6 pagine con link `tel:`, 1 con il testo e `href="#"` |
| MISURATO. `href="#"`: 5 su /{lingua}/tickets/confirmation (1 ricevuta, 4 nel riquadro contatti) | sweep.py colonna `href#`; shots.mjs `hashLinks` | 5 per lingua |
| MISURATO. "Seguici su" con `<ul>` vuoto in due punti dell'intestazione (zona destra desktop e menu mobile) e landmark `Secondaria` con zero voci | measure-before.json: `socials` items 0, `secNav` items 0 | su tutte le pagine, in 4 lingue |
| MISURATO. Footer: colonna "Contatti" (h4) presente con soli FAQ, "Segnalazione disservizio" e i tre link legali; nessun indirizzo, PEC, telefono, orari | measure-before.json `footerH4` contiene `Contatti` | si |
| MISURATO. /{it,en,de,es}/contatti e /dpo rispondono 404 | sweep.py codice 404 | 8 su 8 |
| MISURATO. Nessun link interno del footer, dell'intestazione o dei riquadri contatti punta a una pagina inesistente (ospite) | linkcheck.py: unici non-200 sono `/contatti` e `/dpo` e provengono dalle pagine 404 stesse (selettore lingua) | i soli link morti sono `#` e `tel:050505` |
| MISURATO. Blog ed eventi in en/de/es: la scheda "Contatta il comune" e' un `cmp-contacts` con `card-body` vuoto | HTML /en/blog righe 800-810 | fascia grigia senza contenuto (FO-4-23) |
| MISURATO. La barra alta contiene anche selettore lingua e accesso all'area personale: `rightZoneLeft` 934, `slimWidth` 1256 (desktop) | measure-before.json | nascondere "tutta la barra" toglierebbe lingua e login (vedi D6) |
| MISURATO. 8 test esistenti rossi a monte (prima di toccare): `Themes/Sixteen/tests/Feature/Components/HeaderTenantFallbackTest.php` (3, prova la vista `header.v1` Tailwind che il layout reale non usa: "Failed asserting that ... contain FixCity") e `Modules/Cms/tests/Feature/HeaderNavJsonTest.php` (5, `Target class [config] does not exist`) | `baseline-tests.txt`: 8 failed, 46 passed | gia' rossi, non causati da questa story |
| DEDOTTO. Viste che il layout reale rende: `components/sections/header/design-comuni.blade.php`, `components/sections/footer/design-comuni.blade.php` (layout `components/layouts/app` e `design-comuni`), partial contatti `blocks/report-partials/contacts-card.blade.php` (ticket-list, report-area, report-step, report-list, wizard) e `blocks/partials/dc-contacts.blade.php` (blog, eventi, FAQ content-page, home e altri 18 blocchi) | `PATH` nelle viste compilate in `/tmp/scratch-auth-fixture-zorin/storage/framework/views`, `rg` degli `@include` | le altre varianti (`cmp-contacts`, `contacts-card` di bootstrap-italia, content, design-comuni, `contact-section`, `vertical-navigation`, header `slim`/`exact`/`top-bar`, `header-comune`, `footer-comune`) non sono incluse da nessun file: segnaposto non reso |

### Sorgenti dei dati gia' esistenti (riuso) e perche' nessuna basta

| Sorgente | Cosa contiene | Perche' non la riuso |
| --- | --- | --- |
| `laravel/config/comune.php` (gruppo `comune`) | nome, indirizzo, telefono, PEC, P.IVA con default finti ("Nome Comune", "000-0000000", "info@comune.it", "comune@pec.it", regione "Regione") | i default sembrano dati veri; letto solo da componenti non inclusi e da `RegionPortalLinkLabels` (ripiego su `comune.regione`, che a header.json vuoto stamperebbe "Regione"). Il ripiego viene tolto |
| `config/local/fixcity/metatag.php` (`nome_comune`, `nome_regione`) e `Modules/Xot/app/Datas/MetatagData` | due stringhe vuote | DEDOTTO: nessuna vista le stampa; sono dati SEO del sito, non i contatti dell'ente |
| `Modules/Gdpr/config/config.php` chiave `dpo` (name, email, phone) | DPO, vuoto | DEDOTTO: nessun codice la legge. Una sola voce di un gruppo da 12 campi. Resta come candidata a essere assorbita (D9) |
| `footer.json` `contact.{address,office,phone,email,office_url,details}` | slot vuoti letti dal footer | erano gia' il posto sbagliato (JSON del contenuto, non dati dell'ente): sostituiti dalla sorgente nuova |
| `header.json` `region.name` | "Demo", "Name of the Region", ... | e' il segnaposto stesso |

Conclusione: non esiste una sorgente unica dei dati dell'ente. Se ne crea una, minima.

## Causa

Il dato dell'ente non ha una casa. Header e footer lo leggono dal JSON del contenuto (con valori finti), i riquadri contatti lo ricevono da tre
posti diversi (JSON di pagina, `Themes/Sixteen/config/sixteen.php`, file lang) e un blade ha il numero scritto nel codice
(`ticket-list/design-comuni.blade.php`: `'url' => 'tel:050505'`). Dove il dato manca, i template non si nascondono: stampano il segnaposto
o un contenitore vuoto.

## Decisioni

- **D1. Proprieta' del modulo: Tenant.** Dominio: i recapiti e l'identita' dell'organizzazione titolare di un tenant sono contesto del tenant
  (la memoria `module-ownership-by-domain-and-dependency-not-file-location` e la mappa delle responsabilita': "Tenant il contesto"). Dipendenza,
  misurata: `Modules/Tenant/app` non referenzia Cms, Fixcity ne' Sixteen; Cms referenzia Tenant 19 volte; Sixteen referenzia Tenant 1 volta e
  Cms 35. La config per tenant si legge gia' con `Modules\Tenant\Actions\Config\*`. Mettere Data e Action in Cms avrebbe obbligato Fixcity
  (testi legali) e il tema a dipendere da Cms per un dato che Cms non possiede. Nessun ciclo nuovo. Il rendering (che cosa mostrare e come) resta
  nel tema Sixteen.
- **D2. Un solo file di config per tenant**: `laravel/config/local/fixcity/ente.php` (gruppo `config('ente')`, unito all'avvio da
  `TenantServiceProvider::mergeConfigs`). TUTTE le chiavi vuote: la riga di ogni dato e' l'ente a compilarla. Nessun `env()` (le chiavi non sono
  segreti e il file e' per tenant). Chiavi: `name`, `region_name`, `region_url`, `address`, `pec`, `email`, `phone` (URP), `toll_free`,
  `tax_code`, `vat`, `dpo_name`, `dpo_email`, `hours`, `social[]` (`network`, `url`, opzionale `label`). Ogni testo accetta una stringa o una
  mappa per lingua (`['it' => ..., 'en' => ...]`).
- **D3. Data tipizzato `Modules\Tenant\Datas\EnteData`** (cartella `Datas`, plurale) e **Action** `Modules\Tenant\Actions\Ente\GetEnteDataAction`
  (Spatie QueueableAction, `execute(?string $locale = null): EnteData`) che restituisce i valori gia' normalizzati: stringa tagliata; telefono
  valido solo se, tolti spazi, punti, trattini e parentesi, e' `+?` seguito da 3 a 15 cifre (altrimenti il campo e' considerato mancante); email e PEC
  con `filter_var`; URL solo `http`/`https` con host; social solo di una lista chiusa di reti con icona nello sprite Design Comuni (facebook,
  instagram, linkedin, mastodon, telegram, tiktok, twitter, whatsapp, youtube, rss) e URL valido. Un valore non valido vale "manca": non si mostra
  e non si linka mai. Nessuna tabella, nessuna migrazione.
- **D4. Regola unica: se il dato manca il blocco si nasconde.** Applicata a: nome della regione (solo l'elemento, vedi D6), "Seguici su" in
  intestazione (zona destra e menu mobile) e in footer, landmark `Secondaria` senza voci, colonna "Contatti" del footer (solo campi
  valorizzati, titolo nascosto se non ce n'e' nessuno), riquadro contatti (voce che dipende dall'ente nascosta, gruppo senza voci nascosto,
  fascia intera nascosta se non resta nulla), link `href="#"`.
- **D5. Riferimento alla sorgente nei contenuti.** Una voce dei riquadri contatti puo' dichiarare `"ente": "toll_free"` (o `phone`, `email`,
  `pec`) e un'etichetta con `:value`: link e testo vengono dalla sorgente, la voce sparisce se il dato manca. I JSON `blog/index`,
  `events/index`, `tickets/create`, `tickets/confirmation` e i file lang perdono il numero scritto a mano. Un test guardia fa fallire il
  ritorno di "05 0505", `tel:050505`, "Demo", "Name of the Region" nei JSON e nei lang del front office reale.
- **D6. Barra alta: si nasconde il nome, non la barra.** La consegna chiedeva che la barra intera sparisse senza nome. Misurato: la stessa barra
  ospita il selettore lingua e il pulsante di accesso all'area personale (FO-2, FO-3: senza accesso il cittadino non puo' segnalare). Nascondere
  tutta la barra toglierebbe lingua e login da ogni pagina. Si nasconde l'elemento del nome e la zona destra resta a destra (`ms-auto`).
  Proposta registrata come DA DECIDERE se si vuole davvero spostare lingua e accesso altrove.
- **D7. Pagine di prova `/{lingua}/tests/*`.** Sono repliche del riferimento Design Comuni e hanno i loro JSON con i valori del riferimento. Non
  sono front office reale e non si toccano. I partial condivisi con le repliche conservano il comportamento di prima solo per i `href="#"`
  (stesso criterio di `footer/design-comuni.blade.php`: `request()->segment(2) === 'tests'`), perche' togliere quelle voci cambierebbe l'HTML
  confrontato col riferimento. La regola "nessuna fascia vuota" vale ovunque.
- **D8. Esercizio dei diritti GDPR (FO-2-29).** Il pulsante "Vai ai contatti del Comune" punta a `#footer`, che oggi non contiene contatti.
  Nuovo: se la sorgente ha `dpo_email`, altrimenti `pec`, altrimenti `email`, il pulsante e' un `mailto:` con quell'indirizzo; se non ne ha
  nessuno il pulsante non c'e' e un testo onesto dice che i recapiti dell'ente non sono ancora pubblicati (chiave lang `how_missing` in it, en,
  de, es). Nessuna pagina `/contatti` o `/dpo` e nessun file di pagina nel tema: lo vieta la regola del progetto.
- **D9. Da non fare ora.** (a) La maschera di modifica "alla maniera Filament": pagina `Modules/Tenant/app/Filament/Pages/EntePage.php`
  (XotBasePage, come `Modules/Cms/app/Filament/Clusters/Appearance/Pages/Footer.php`) con `Section` "Ente" (name, region_name, region_url,
  tax_code, vat), `Section` "Recapiti" (address, phone con `->tel()`, toll_free con `->tel()`, email e pec con `->email()`, hours con `Textarea`),
  `Section` "Protezione dei dati" (dpo_name, dpo_email), `Section` "Social" con `Repeater` (`Select` network dalla lista chiusa, `TextInput` url con
  `->url()`), e salvataggio con `SaveTenantConfigAction::execute('ente', ...)` come fa il Footer di Cms. Non richiede tabelle. Resta da decidere
  se un'interfaccia web puo' scrivere sotto `config/` in produzione (permessi, `config:cache`). Slug proposto: `ente`. (b) Assorbire
  `gdpr.config.dpo` nel nuovo file: oggi nessun codice lo legge, quindi nessuna urgenza. (c) Portare le pagine `/contatti` e `/dpo`: vietato come
  file di pagina; se l'ente le vuole, si fanno con JSON CMS e un blocco che legge `EnteData`.
- **D10. Controllo da aggiungere al gate di go-live (proposta, non implementata, il gate non si tocca).** In
  `bashscripts/tools/release/go-live-gate.py`, gruppo "contatti dell'ente": esce rosso se `config('ente')` del tenant di produzione non ha almeno
  `name`, `region_name` (se si vuole la barra), `address`, `pec`, `dpo_email`, `phone` o `toll_free`; piu' un controllo sull'HTML reso (home e
  /it/tickets in 4 lingue) che non contenga "05 0505", "tel:050505", ">Demo<", "Name of the Region", "Nome della Regione", `href="#"`.

## Criteri di accettazione verificabili

1. Con `config('ente')` vuoto, in it, en, de, es: header, footer e riquadri contatti non contengono "05 0505", `tel:050505`, ">Demo<",
   "Name of the Region", "Name der Region", "Nombre de la Region", "Nome della Regione", `href="#"`, un `.it-socials` con `<ul>` vuoto, un
   `<nav aria-label="Secondaria">` con zero voci, un `cmp-contacts` con `card-body` vuoto.
2. Con la config valorizzata compaiono i campi, il numero verde diventa `tel:+...` valido e il PEC `mailto:`; i social solo se la rete e'
   ammessa e l'URL e' http/https.
3. Nessun valore e' stampato senza escape: `<script>` e `"><img ...>` nei campi escono come testo; `javascript:` in un URL o in un telefono
   lo fa scartare.
4. `/it/tickets/confirmation` non ha piu' `href="#"` nei riquadri contatti.
5. Il link dei diritti GDPR usa `dpo_email`, poi `pec`, poi `email`; senza dati non c'e' link e c'e' il testo onesto in 4 lingue.
6. PHPStan a zero sui file nuovi e toccati; test esistenti piu' vicini non peggiorano rispetto a `baseline-tests.txt`.

## Test

(da completare con i comandi e gli output a fine lavoro)

## Owned file scope

(elenco esatto dei file toccati, a fine lavoro)

## Fuori ambito

Search-modal, hamburger, metadati (DCP-288); wizard e conferma (DCP-286, salvo le voci telefono e aiuto nei due JSON); testi legali (decisione
del titolare); dettaglio blog/eventi e commenti; le repliche `/{lingua}/tests/*`; le tre varianti non incluse di header e footer elencate sopra
(codice morto: da ritirare in un giro a parte, non da correggere).

## Esito

(a fine lavoro, con output reali)
