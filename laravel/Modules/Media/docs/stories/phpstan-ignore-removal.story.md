---
title: "Modulo Media: rimozione di @phpstan-ignore dalla causa radice"
type: story
module: Media
status: review
created: 2026-10-30
updated: 2026-10-30
tags: [phpstan, qualita, intervention-image, filament, ffmpeg]
qmd: "phpstan-ignore Media Merge S3Test TemporaryUpload ConvertVideo"
---

# Modulo Media: rimozione di @phpstan-ignore dalla causa radice

La regola del progetto e' «mai `@phpstan-ignore`, mai baseline». In `Modules/Media/app` c'erano 14 annotazioni in 5 file. Ne sono state tolte 12 correggendo la causa; 2 restano (vedi sotto).

## Esito

| File | Prima | Dopo | Correzione |
|---|---|---|---|
| `Actions/Image/Merge.php` | 6 | 0 | Le chiamate `read()`, `create()`, `place()` sono l'API di Intervention Image v3. La versione installata e' la 4.4.0, dove quei metodi non esistono: l'annotazione nascondeva un errore che avrebbe fatto fallire l'azione a runtime. Ora usa `decodePath()`, `createImage()`, `insert($img, $x, $y, $allineamento)`. Tolti anche i `@var` inline, ora inutili perche' i metodi sono tipizzati. |
| `Filament/Clusters/Test/Pages/S3Test.php` | 5 | 0 | `$this->form` e' una proprieta' magica di Filament. Dichiarata con `@property Schema $form` nel docblock di classe, come in Cms `Breadcrumb`, `Footer`, `Headernav`. |
| `Models/TemporaryUpload.php` | 1 | 0 | `config('media-library.media_model')` e' una `string` e non permette `::query()` tipizzato. Aggiunto `Assert::isAOf($mediaModelClass, Media::class)`, che restringe a `class-string<Media>`. Tolto il `@var` inline. |
| `Actions/Video/ConvertVideoByConvertDataAction.php` | 1 | 1 | Non rimosso, vedi sotto. |
| `Actions/Video/ConvertVideoByMediaConvertAction.php` | 1 | 1 | Non rimosso, vedi sotto. |

Totale: 14 prima, 2 dopo.

Verifica per file: `./vendor/bin/phpstan analyse <file> --memory-limit=-1 --no-progress` ha dato `[OK] No errors` su `Merge.php`, `S3Test.php` e `TemporaryUpload.php`. Gli altri due file sono tornati allo stato originale.

## Non rimosso (con motivo)

`ConvertVideoByConvertDataAction.php:47` e `ConvertVideoByMediaConvertAction.php:55`, identificatore `method.notFound`.

- Il pacchetto `protonemedia/laravel-ffmpeg` dichiara `@mixin PHPFFMpeg` su `MediaExporter`. `addFilter()` e' un metodo del driver con ritorno `self`, quindi PHPStan vede il tipo del driver e non trova `save()`. A runtime `__call` restituisce l'exporter.
- Separare `addFilter()` dalla catena (`$exporter->addFilter(...); $exporter->save(...)`) risolve `method.notFound`, ma porta alla luce l'errore vero: `MediaExporter::save(?string $path = null)` accetta un solo argomento, mentre il codice passa anche `$formatInstance`. Quel secondo argomento viene ignorato, quindi il formato WebM non e' mai applicato (l'exporter usa `NullFormat`).
- Le due correzioni possibili cambiano il comportamento: usare `->inFormat($formatInstance)` cambia il comando ffmpeg; togliere l'argomento lascia `$format` e `$formatInstance` come codice morto e nasconde il difetto. In piu' `new $format` crea un'istanza nuova con i codec predefiniti e perde bitrate e codec di `ConvertData::getFFMpegFormat()`.
- Serve una decisione di prodotto: quale formato deve ricevere la conversione. Poi si applica `inFormat()` con l'istanza di `getFFMpegFormat()` e si tolgono le due annotazioni.

## Non verificato

- Nessun test Pest eseguito (il database di test contiene dati reali), nessuna conversione immagine o video, nessuna chiamata a S3.
- `Merge::handle()` e `Merge::execute()` non sono stati eseguiti con immagini vere: il passaggio da `place()` a `insert()` e' stato verificato leggendo la firma di Intervention 4.4.0 (stessi punto di ancoraggio e offset, argomenti in ordine diverso).
- `Assert::isAOf` in `TemporaryUpload::findByMediaUuid()` lancia un'eccezione se la configurazione indica una classe che non e' un `Media`. Con la configurazione attuale (`Modules\Media\Models\Media`) non cambia nulla.
- `Modules/Media/composer.json` richiede `intervention/image: *`: con una v3 reinstallata `Merge.php` andrebbe riadattato.
- Non e' stato lanciato PHPStan sull'intero modulo (lo fa il coordinatore).
