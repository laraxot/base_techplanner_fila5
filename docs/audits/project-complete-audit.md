---
title: "Audit completo progetto, moduli e temi"
type: audit
status: open
created: 2026-10-29
updated: 2026-10-29
scope: "Sito, Laravel, moduli, temi, quality gates, sicurezza, frontend e documentazione"
---

# Audit completo progetto, moduli e temi

## Esito esecutivo

Audit statico/read-only eseguito sul repository completo, con verifiche locali e sei
lane parallele disgiunte (architettura, temi, quality gates, sicurezza, docs e hygiene).
Il worktree era già sporco: nessuna modifica dell’audit deve essere attribuita alle
modifiche presenti.

| Area | Esito |
|---|---|
| PHPStan `Modules` | PASS — 7.739 file, 0 errori |
| Marker conflitto Git | PASS — nessun marker nei file tracciati |
| LFS | PASS — nessun puntatore o regola `filter/diff/merge=lfs` |
| Pest globale | FAIL — collisione di binding `Cms`/`Notify` |
| NPM lock | FAIL — `laravel/package-lock.json` non valido |
| Sicurezza | FAIL — file `.env*` con valori non vuoti tracciati |
| Docs | DEBITO ALTO — naming, frontmatter, duplicati e link da triagiare |
| Tema runtime | RISCHIO ALTO — `pub_theme` duplicato; prevale `Two` |
| Browser/DOM reale | NON ESEGUITO — serve runtime URL/Playwright disponibile |

## Priorità P0/P1

### P0 — sicurezza e continuità

1. **Segreti tracciati:** verificare e ruotare immediatamente i valori non vuoti in
   `laravel/.env.latest`, `laravel/.env.testing` e `laravel/.env.testing.bak`.
   Non riportare mai i valori nel report o nei log. Dopo la rotazione, rimuovere i
   file dal tracking secondo una decisione esplicita di repository.
2. **Lock npm non parsabile:** `laravel/package-lock.json` contiene chiavi duplicate
   (`devDependencies`) e pacchetti duplicati. Finché non viene rigenerato in modo
   controllato, install/build/audit frontend non sono affidabili.
3. **Pest discovery bloccata:** `tests/Unit/CmsHasBlocksFixTest.php` viene associato
   sia a `Modules\\Cms\\Tests\\TestCase` sia a `Modules\\Notify\\Tests\\TestCase`.
   Isolare il binding per directory o correggere la configurazione Pest prima di
   usare la suite globale come gate.

### P1 — architettura e produzione

1. **Tema effettivo ambiguo:**
   `laravel/config/local/techplanner/xra.php:10-12` e `xot.php:10-12` dichiarano
   tre volte `pub_theme`; in PHP l’ultimo valore è `Two`. Sixteen deve mantenere
   la parity Design Comuni, ma non è il tema attualmente deterministico del tenant.
2. **Routing Sixteen sospetto:** `laravel/Themes/Sixteen/routes/web.php:1-8` non
   inizia con `<?php` e il provider non lo carica come le altre route. Verificare
   prima di esporre qualunque pagina.
3. **Pipeline asset divergente:** Two ha configurazioni Vite JS/TS e manifest in
   percorsi differenti; Sixteen ha più manifest/entry. Definire una sola sorgente
   di build e un solo percorso runtime per tema.
4. **Meetup carica asset Sixteen:** i layout guest/auth di Meetup referenziano
   asset `themes/Sixteen`; verificare se è fallback intenzionale o errore.
5. **Provider incoerenti:** AI dichiara provider diversamente tra `module.json` e
   `composer.json`; Seo presenta il problema inverso. Allineare discovery e merge.
6. **Schema con owner duplicati:** Activity ha più migrazioni per `activity_log`;
   User ha più owner apparenti per `users`, `profiles`, ruoli e pivot. Non rimuovere
   migrazioni senza ricostruire il grafo dello schema e verificare database nuovi/
   esistenti.
7. **Dipendenze modulo non dichiarate:** Employee e TechPlanner importano moduli
   ulteriori rispetto a quelli dichiarati nei manifest. Il riuso/installazione
   parziale è quindi fragile.
8. **Case collisions:** 1.117 gruppi casefold nei file tracciati, inclusi 123 gruppi
   nel codice, 112 PHP e 59 view. Priorità a `Components/components` e
   `TimeClockPage/TimeclockPage`; procedere solo per gruppi verificati.

## Moduli — inventario e focus

| Modulo | PHP | Modelli | Migrazioni | Test | Docs | Focus audit |
|---|---:|---:|---:|---:|---:|---|
| AI | 48 | 4 | 0 | 16 | 252 | provider/discovery e API commentata |
| Activity | 88 | 10 | 16 | 143 | 710 | owner `activity_log`, duplicazioni schema |
| Cms | 133 | 21 | 3 | 161 | 940 | collisione binding Pest e view casefold |
| Employee | 66 | 10 | 7 | 18 | 311 | dipendenze non dichiarate, controller CRUD no-op |
| Gdpr | 83 | 13 | 8 | 45 | 413 | policy/super-admin e docs legacy |
| Geo | 246 | 32 | 7 | 152 | 2.049 | asset generati duplicati, docs sovraccariche |
| Job | 154 | 34 | 14 | 50 | 465 | policy `create()` sempre true |
| Lang | 59 | 14 | 6 | 50 | 1.008 | duplicati e naming docs |
| Media | 123 | 8 | 5 | 55 | 557 | controller/Filament diretto da verificare |
| Notify | 239 | 30 | 30 | 163 | 3.635 | binding Pest, TLS/URL credenziali, docs |
| Seo | 21 | 0 | 0 | 20 | 197 | provider manifest/composer |
| TechPlanner | 114 | 15 | 13 | 7 | 94 | dipendenze, BaseModel, copertura bassa |
| Tenant | 53 | 18 | 3 | 75 | 542 | source tenant/Sushi e configurazione tema |
| UI | 118 | 5 | 3 | 83 | 466 | duplicati UI e naming docs |
| User | 677 | 106 | 84 | 215 | 2.137 | migrazioni owner, policy side-effect |
| Xot | 587 | 44 | 10 | 300 | 1.566 | infrastruttura base, collisioni legacy |

`Modules/test` è una cartella tecnica, non un modulo nwidart: manca `module.json`.

## Temi — inventario e focus

| Tema | PHP | Blade/HTML | CSS | JS | Test | Docs | Focus audit |
|---|---:|---:|---:|---:|---:|---:|---|
| Meetup | 172 | 137 | 5 | 10 | 0 | 376 | asset Sixteen nei layout |
| Sixteen | 1.364 | 1.082 | 101 | 25 | 76 | 2.054 | parity, legacy, manifest, routing |
| TwentyOne | 271 | 258 | 12 | 15 | 1 | 217 | accessibilità e legacy |
| Two | 290 | 210 | 2 | 6 | 0 | 208 | tema runtime e Vite duplicato |
| Zero | 29 | 23 | 1 | 3 | 0 | 218 | stato alternativo poco esplicito |

### Convenzione Design Comuni

Sixteen deve essere il renderer ad alta HTML parity con Design Comuni. Il renderer
canonico usa gli attributi ufficiali `data-bs-*`; non va trasformato in un tema
mobile custom. Le varianti legacy Sixteen usano ancora hook come
`data-mobile-nav-target` e placeholder `href="#"`: vanno trattate come debito
separato, senza introdurre `data-sixteen-mobile-nav`.

Il tema pubblico attivo del tenant è però `Two` per la duplicazione di configurazione.
Questa distinzione deve restare esplicita in ogni successiva modifica UI/UX.

## Sicurezza, configurazione e dipendenze

- `APP_DEBUG` default false, cookie HttpOnly e SameSite Lax: evidenze positive.
- `symfony/mime` lockato a una versione segnalata da advisory: pianificare update
  verificato.
- Dipendenza npm Puppeteer segnalata con vulnerabilità alte/critica: aggiornare
  valutando breaking changes, non usare `npm audit fix --force` alla cieca.
- Vincoli non deterministici come `nwidart/laravel-modules:*` e `minimum-stability:
  dev` aumentano il rischio di drift.
- CORS config assente: decidere se l’assenza è intenzionale per il perimetro API.
- `UserPermissionBasePolicy::before()` crea permessi come side effect durante
  autorizzazione: separare provisioning e decisione.
- Esendex disabilita TLS e passa credenziali in query string: P1 di sicurezza da
  correggere con client/configurazione sicuri.
- `RegisterController` usa input completo request: usare allow-list validata.

## Quality, test e anti-pattern

- PHPStan: comando canonico `cd laravel && ./vendor/bin/phpstan analyse Modules
  --memory-limit=-1`; risultato 0 errori.
- Marker conflitto tracciati: 0; entry Git unmerged: 0.
- `mixed`: 167 file; distinguere boundary legittimi da tipi impoveriti.
- Classi PHPUnit legacy: circa 34; convergere a Pest dove la convenzione lo richiede.
- PHPMD root non eseguibile per ruleset mancante; diagnostico Geo segnala
  complessità/import/nomi brevi.
- PHP Insights fallisce su carattere non valido in `iconv_strlen`; rendere il gate
  riproducibile o documentare l’input/processor responsabile.
- Controllers presenti nel codice non sono automaticamente errori: per il front
  office vale la regola Folio/Volt; verificare ogni route, non cancellare per grep.
- Alcune classi Filament concrete bypassano XotBase/LangBase: verificare per classe,
  escludendo l’infrastruttura Xot che deve usare Filament direttamente.

## Docs e second brain

Risultati quantitativi (inclusi legacy, raw, archivi e materiale generato; quindi da
triagiare, non da cancellare automaticamente):

- 21 alberi docs;
- circa 18.409 Markdown analizzati nelle lane docs;
- 4.298 nomi non conformi al naming convenuto;
- 76 nomi con anni/date e 2 con timestamp;
- 980 file senza frontmatter;
- 222 gruppi di duplicati esatti, 535 file coinvolti;
- 788 collisioni divergenti nella stessa directory;
- 34.148 candidati link rotti su corpus storico/consolidato;
- 60 handoff chat, 23 indicizzati;
- healthcheck second brain PASS, ma wrapper QMD segnala collection
  `techplanner-wiki` inesistente.

La standardizzazione deve procedere per indici canonici e ownership, non con rename
massivi: prima separare operativo, raw, archive, snapshot e template; poi correggere
link e nomi in lane modulo/tema.

## Git hygiene e asset

- Nessun LFS pointer; policy no-LFS coerente con blob Git normali.
- La policy `.gitattributes` è però duplicata: 24 file, 17 contenuti distinti.
  Va definito un template canonico e sincronizzato, senza introdurre LFS.
- 118 lock-like file tracciati e circa 89 con marker `LOCKED at`; esiste un lock
  ECC preesistente su `Themes/Sixteen/resources/js/app.js.lock`, da non rimuovere
  forzatamente.
- 574 file e 13 directory di backup; non eliminare senza classificazione e rispetto
  dei lock.
- Asset generati proliferano in `public/assets`; prima di deduplicare identificare
  sorgente Vite, manifest e percorso di deploy canonico.
- `.phpstorm.meta.php` supera 10 MB: candidato di repository hygiene, non LFS.

## Piano di remediation ordinato

1. Mettere in sicurezza `.env*` e ruotare le credenziali.
2. Ripristinare la validità di `laravel/package-lock.json` e rieseguire audit npm.
3. Correggere il binding Pest globale e rieseguire la suite completa.
4. Decidere esplicitamente il tema tenant (`Two` o `Sixteen`) e rimuovere la
   duplicazione di `pub_theme` con test di configurazione.
5. Stabilizzare routing/asset/manifest di ogni tema, partendo da Two e Sixteen.
6. Costruire il grafo dipendenze moduli e allineare `module.json`/Composer.
7. Consolidare migrazioni solo dopo inventario schema e backup verificato.
8. Correggere policy e integrazioni sicurezza (Job, User, Esendex, registration).
9. Triage case collisions, lock, backup e duplicati con lane disgiunte.
10. Standardizzare docs/wiki e link dagli indici canonici verso il basso.
11. Aggiungere CI gate per PHPStan, Pest discovery, lock validation, security audit,
    conflict scan e build frontend.
12. Eseguire audit browser reale con viewport mobile/desktop, axe/Lighthouse e
    test navigazione tastiera quando l’app è avviabile.

## Limiti

Questo audit non ha eseguito penetration test, browser reale, build frontend,
verifica database di produzione o cancellazioni/rename. Le euristiche su duplicati,
link, `mixed`, backup e accessibilità includono materiale storico e generato; ogni
remediation deve verificare ownership, route discovery, container binding e uso
runtime prima di modificare.

## Verifiche riproducibili

```bash
cd laravel && ./vendor/bin/phpstan analyse Modules --memory-limit=-1
php artisan test --compact
git diff --check
bash bashscripts/tools/check-conflict-markers.sh
find laravel/Modules laravel/Themes -type f -iname '*.md'
```

## Remediation eseguita nella continuazione

- Corretto il bootstrap Pest: i percorsi `in()` ora sono assoluti; rimosso il
  bootstrap lowercase duplicato di Cms e i binding espliciti confliggenti nei test
  Cms/Notify. La discovery globale ora parte e non produce più `TestCaseAlreadyInUse`.
- Corretto il test reflection `CmsHasBlocksFixTest` con `ReflectionNamedType`, senza
  ignore PHPStan o cast fittizi.
- Rigenerato `laravel/package-lock.json` dalla sorgente `package.json`; il JSON è ora
  parsabile (`lockfileVersion: 3`, 169 package entries).
- PHPStan `Modules` rieseguito dopo le modifiche: **0 errori**.
- Il test `CmsHasBlocksFixTest` isolato passa: **2 test, 8 asserzioni**.

Restano bloccanti ambientali/funzionali distinti: i test CMS che usano il database
`techplanner_data_test` falliscono se il database MySQL non è disponibile; i test
Notify richiedono la connessione `fixcity`; `ContentIntegrityGuardTest` ha un data
provider vuoto nel checkout corrente. La suite globale quindi non è ancora verde.
