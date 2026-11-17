---
title: "[STORY] Media: PHPStan a zero dopo il merge del daemon (af9cc1b0 / b6d05570)"
type: story
status: done
priority: high
created: 2026-10-28
updated: 2026-10-28
tags: [phpstan, quality, merge-conflict, media, bmad, swarm]
related:
  - ./02.Media-merge-conflict-resolution.story.md
  - ./phpstan-zero-errors-media.dev.md
  - ../phpstan-zero-errors.md
  - ../../../../../docs/stories/all-modules-phpstan-zero-errors.story.md
---

# Story: Media a zero errori PHPStan dopo il merge del daemon

## User Request
Swarm PHPStan sui moduli (baseline 1600 errori / 181 file): azzerare gli errori di `Modules/Media` risolvendo la causa,
non l'errore; codice migliore, DRY, KISS. `phpstan.neon` non si tocca, niente `@phpstan-ignore`, niente file cancellati, niente commit.

## Analysis
Baseline `phpstan analyse Modules/Media`: **292 errori in 34 file** (185 in `app/`, 107 in `tests/`).
Quasi tutti hanno una sola origine: il commit `af9cc1b0` (e il suo ritocco `b6d05570`), prodotto dal daemon di auto-commit
durante un merge con `laraxot/dev`. Stessa famiglia di [02.Media-merge-conflict-resolution](./02.Media-merge-conflict-resolution.story.md).
Il merge ha preso i corpi dal lato "theirs" e ha perso gli `use` e alcuni file del lato "ours".

| Causa radice | Errori | Scopo del codice | Soluzione |
|---|---|---|---|
| `use` persi (`Override`, `Config`, `Radio`, `TextInput`, `SelectFilter`, `Action*`, `Media`, `Assert`, `TestCase`, `XotBasePest`, `SafeIntCastAction`, `Mockery\*`, `Schema`, ...) | 194 | Nomi risolti nel namespace del file: PHPStan vede classi inesistenti e, a cascata, `mixed` (tutti i 60 `method.nonObject` / `property.nonObject`) | Ripristinati gli import, ordinati come il resto del modulo. Nessun cast |
| `Datas/AttachmentToSaveData` e `SaveAttachmentsData` cancellate da `af9cc1b0` | 28 | Oggetti tipizzati degli allegati (regola `prefer-spatie-data-over-array-params`), coperti da `GeneratorsAndAttachmentDataTest` | Ricreate dal commit `1e279198` (sola lettura). Nessun chiamante di produzione: `SaveAttachmentsAction` usa ancora gli array, come i suoi test |
| `tests/Fixtures/MediaColumn{File,PlainRecord,Record}Stub.php` e `subtitle.xml` cancellati | 12 (+ `subtitle.xml`, usato da 2 test) | Doppi di test per `MediaColumnsTest` e per i due test dei sottotitoli | Ricreati dal commit `1e279198` |
| `MediaConvertResource::getFormSchemaOld()` | 28 | Duplicato identico di `Schemas/MediaConvertForm::getFormSchema()`; il bridge `Old` di `XotBaseResource` e' solo transitorio | Metodo rimosso (DRY), restano `getRelations`/`getPages` |
| `CameraPhotoUpload extends XotBaseSpatieMediaLibraryFileUpload` | 11 | Campo foto da telefono con resize nel browser | La base **non esiste in `Modules/Xot`**: estende `Filament\...\SpatieMediaLibraryFileUpload` (il test verifica proprio quell'`instanceof`) |
| `MediaConvert::$format` / `Media::$creator` / `Media::$model` / `TemporaryUpload::factory()` | 6 | Colonna reale `format`; relazioni `creator`/`model` | PHPDoc allineato (`ProfileContract`, `Model`), import factory |
| `FileExtensionRule::validate()` | 2 | Parametro `$_attribute` usato come `$attribute` | Parametro rinominato come l'interfaccia `ValidationRule` |
| `ConvertVideoByConvertDataAction` | 1 | `onProgress` calcolava `$msg` e lo buttava; qui non c'e' un record da aggiornare | Chiamata `onProgress` rimossa |
| `tests/TestCase::mockExpectation()` mancante | 10 | Helper per i test delle policy | Reintrodotto (`shouldReceive`) |

## Result (verificato 2026-10-28)
`cd laravel && ./vendor/bin/phpstan analyse Modules/Media --memory-limit=-1 --no-progress` → **292 → 0 errori**. `php -l` pulito sui file toccati.
**Pest non eseguito** (`.env.testing` = MySQL).

## Acceptance Criteria
- [x] `phpstan analyse Modules/Media` = 0 errori, `phpstan.neon` intatto, nessun `@phpstan-ignore` aggiunto
- [x] Nessun file cancellato; 5 file PHP + 1 XML ricreati dopo la cancellazione del merge
- [x] Nessun cast cieco: i `mixed` sparivano da soli ripristinando gli import
- [ ] Pest in ambiente sqlite (non eseguito)
- [ ] Decisione utente sull'architettura dei test (vedi sotto)
- [ ] Issue/Discussion GitHub (`gh` non installato)

## Decisioni aperte
1. **Test: il merge ha riportato indietro l'architettura.** `tests/Pest.php` e `tests/TestCase.php` a `HEAD` sono le versioni *vecchie* (helper come funzioni libere in `Pest.php`,
   senza `setUp()` con skip DB). A `1e279198` il modulo aveva scelto l'opposto: `Pest.php` senza funzioni (non viene caricato da Pest, incidente del 2026-08-19)
   e helper come metodi statici di `TestCase`. In piu' il merge ha resuscitato `tests/feature`, `tests/unit/actions`, `tests/unit/models` (doppioni minuscoli) e cancellato 4 test
   `tests/Unit/Media*CoverageTest.php`. Qui e' stato scelto il minimo che passa PHPStan; ripristinare `1e279198` e' una decisione dell'utente (il rebase e' ancora in corso).
2. **`XotBaseSpatieMediaLibraryFileUpload` assente in Xot**: quando Xot lo avra', `CameraPhotoUpload` cambia genitore (una riga).
3. **`lang/it/*.php` cancellati dal merge** (`media_form`, `medias`, `add_attachment`, `convert`, ...): non causano errori PHPStan, mancano le traduzioni.
4. `@phpstan-ignore-next-line` gia' presenti in `ConvertVideoBy*Action` (non toccati).

## GitHub (tracciamento)
### Issues
- TODO (gh non installato su questa macchina)
### Discussions
- TODO

Owner: AI Agent (swarm PHPStan, modulo Media)
