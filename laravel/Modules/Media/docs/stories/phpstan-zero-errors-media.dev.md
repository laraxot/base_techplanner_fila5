---
title: "[DEV] Media: PHPStan a zero dopo il merge del daemon"
type: dev-story
status: done
priority: high
created: 2026-10-28
updated: 2026-10-28
tags: [phpstan, dev, merge-conflict, media, bmad]
related:
  - ./phpstan-zero-errors-media.story.md
---

# Dev: Media a zero errori PHPStan

## Metodo
1. `phpstan analyse Modules/Media` → 292 errori; raggruppati per causa, non per riga (tabella in [story](./phpstan-zero-errors-media.story.md)).
2. `git -C Modules/Media log/show/diff 1e279198 HEAD` (sola lettura) per capire cosa ha tolto `af9cc1b0`: import, 2 classi `Datas`, 3 fixture, `subtitle.xml`, lang, test.
3. Contenuti ripristinati con `git show 1e279198:<path>` letto a video e riscritto con Write (nessun `git checkout`/`restore`, nessun `show > file`).
4. Dopo ogni gruppo: `php -l` + `phpstan analyse Modules/Media --memory-limit=-1 --no-progress --error-format=raw`.

## Cambi (file di codice)
- `app/Filament/Resources/MediaConvertResource.php`: tolto `getFormSchemaOld()` (copia di `MediaConvertForm`); resta `use Override`.
- `app/Filament/Resources/**/Tables/{MediaTable,MediaConvertsTable,TemporaryUploadsTable}.php`, `Pages/ViewMedia.php`, `TemporaryUploadResource.php`, `MediaResource.php`, due `MediaRelationManager.php`, `Clusters/Test/Pages/{AwsTest,S3Test}.php`: import ripristinati.
- `app/Filament/Forms/Components/CameraPhotoUpload.php`: genitore `Filament\Forms\Components\SpatieMediaLibraryFileUpload`.
- `app/Models/{Media,MediaConvert,TemporaryUpload}.php`: PHPDoc (`ProfileContract`, `Model`, `$format`) e import factory.
- `app/Rules/FileExtensionRule.php`: `$attribute` come da interfaccia.
- `app/Actions/Video/ConvertVideoByConvertDataAction.php`: tolta la chiamata `onProgress` che non faceva nulla.
- `app/Datas/{AttachmentToSaveData,SaveAttachmentsData}.php`, `tests/Fixtures/*`: ricreati da `1e279198`.
- `tests/{Pest,TestCase}.php` e 9 file di test: import, `mockExpectation()`, variabile inutilizzata in `AttachMediaActionTest`.

## Verifica
`phpstan analyse Modules/Media` → 0 errori (2026-10-28). Pest non eseguito: `.env.testing` punta a MySQL.

## Lezione
Un `class.notFound` con il nome nel namespace del file (`...\Pages\Config`, `...\Tables\Media`) e' un `use` mancante, non una classe da creare.
I `method.nonObject` che seguono sono lo stesso errore: scompaiono da soli.
