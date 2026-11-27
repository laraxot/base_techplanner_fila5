---
title: "Audit qualità modulo Notify — nomi docs, duplicati, codice morto"
type: story
module: Notify
status: review
created: 2026-11-19
updated: 2026-11-19
issues: ["https://github.com/laraxot/base_techplanner_fila5/issues/64"]
discussions: []
tags: [audit, qualita, docs, phpstan, bmad]
---

# Story: audit qualità modulo Notify

## Contesto

Audit parallelo dei moduli (issue #64). Ambito: `laravel/Modules/Notify`.
Ingresso documentazione: [../index.md](../index.md).

## Baseline e risultato

| Controllo | Prima | Dopo |
|-----------|-------|------|
| PHPStan `Modules/Notify` (livello max) | 0 errori | 0 errori |
| Pest `Modules/Notify/tests` | 818 passati, 69 falliti, 2 skipped | 818 passati, 69 falliti, 2 skipped (invariato) |
| `mixed` in `app/` | 348 | 336 |
| File `.md` nel modulo | ~4386 | ~3010 |

## Cosa è stato fatto

### Documentazione

- **Date nei nomi**: nessun file o cartella con date. I 23 file con data (`*-2025-10.md`, `*-2026-03.md`,
  `dry-kiss-analysis-2025-10-15.md`, `phpstan-fixes-2026-05-06.md`, `roadmap-2025.md`, `phpstan-fixes-gennaio-2025.md`, …)
  e i residui di rinomine precedenti (`*-.md`, `*.md.md`, `*-01.md`, `*-15.md`, `*-21.md`, `continuation-11.story.md`)
  sono stati ricondotti al nome pulito. Dove esisteva uno "stub di rinomina" che puntava a sé stesso,
  lo stub è stato sostituito dal contenuto reale; varianti con contenuto diverso sono state unite
  (sezione "Contenuto unito da …"). Data spostata in `created:`.
- **Duplicati esatti** (stesso corpo a meno del frontmatter, nome normalizzato uguale): ~1190 file rimossi —
  coppie `snake_case`/`kebab-case`, copie in `archive/`, `archive/historical/`, `raw/root-import/`, `root-md-files/`,
  `wiki/_integration/` e `-integration/` (cartella con nome errato, ora vuota e rimossa), varianti `-1.md`,
  `INDEX.md`/`index.md` nella stessa cartella. Tenuta la copia con nome migliore e più linkata.
- **Link**: ~430 riferimenti in 160 file riscritti verso il file tenuto (link markdown, `related:` nel frontmatter).
  Corretti i link alle docs Xot rinominate (`redundancy-audit`, `README.md`) e a `bmad/stories/module-bmad-audit.story.md`.
- **Indice**: `docs/index.md` riscritto come mappa delle aree. Il precedente puntava a ~50 file inesistenti.

### Codice

- Rimossi (grep di sola lettura su tutto `laravel/`: nessun riferimento in codice/config):
  - `app/Services/NotificationManager.php` — copia legacy dichiarata di `Actions/NotificationManager`;
    il suo test è stato **spostato**, non cancellato: `tests/Unit/Actions/NotificationManagerLookupTest.php`.
  - `app/Services/SmsService.php` — sostituito da `Actions/SMS/SendSmsAction` (vedi docblock dell'action).
  - `app/Services/MailEngines/MailtrapEngine.php` — mai usato (docblock copiato da `SmsService`).
  - 24 file `*.php.up` / `*.test` in `app/` (backup di vecchie versioni, mai caricati dall'autoload).

## Cosa resta

- `Services/PushNotificationService` + `Jobs/SendScheduledPushNotification`: coppia legacy già sostituita da
  `Actions/Push/SchedulePushNotificationAction` + `SendScheduledPushNotificationAction`. In produzione nessuno la usa,
  ma è coperta da test di copertura (`NotifyCoverage100ExtendedTest`, `NotifyGapAttackCoverageTest`, …): eliminarla
  richiede di rimuovere quei test, quindi serve un ok esplicito.
- `Helpers/ConfigHelper`: usato solo da `NotifyHighestMissCoverageTest`. Stessa situazione.
- I `mixed` rimasti sono quasi tutti mappe dati di template e payload di provider (`array<string, mixed>`): sono
  davvero eterogenei. Per ridurli servono Data object (Spatie Data) per i payload push/SMS/WhatsApp.
- `?mixed` nei `@method` generati di `NotificationTemplate` (PHPDoc non valido, generato da ide-helper).
- Restano ~3000 `.md`, molti sono report storici "completion/ultimate/final" che si contraddicono tra loro e con
  il codice. Vanno archiviati in blocco e la scelta è da concordare. Restano anche coppie `snake_case`/`kebab-case`
  con contenuto diverso.
- Link da fuori del modulo verso file rimossi non sono stati toccati (fuori ambito).
