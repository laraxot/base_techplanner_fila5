---
title: "StripImageMetadataAction — contratto"
type: contract
owner: Media
status: accepted
action: "Modules\\Media\\Actions\\Image\\StripImageMetadataAction"
tags: [contract, action, immagini, exif, gps, privacy]
created: 2026-11-24
updated: 2026-11-24
qmd: "contract StripImageMetadataAction media exif gps privacy immagine MEDIA-STRIP-INV"
---

# StripImageMetadataAction

Riscrive l'originale JPEG o PNG di un media senza metadati (EXIF, posizione GPS, fotocamera, XMP, chunk di testo).

> Nel codice `app/` non risultano chiamanti (`rg StripImageMetadataAction app`: solo la definizione): l'Action non e' collegata a nessun flusso di upload; i test la esercitano direttamente.

## Input

- `Spatie\MediaLibrary\MediaCollections\Models\Media $media`: usa `mime_type`, `disk`, `getPathRelativeToRoot()`.

## Output

- `void`.

## Invarianti

- **MEDIA-STRIP-INV-1** — Per `image/jpeg` e `image/png` il file e' ricodificato con `strip: true`: GPS ed EXIF spariscono, l'orientamento EXIF e' applicato prima (la foto non ruota) e `size` del record e' aggiornato.
  Verifica non marcata: `Modules/Media/tests/Unit/Actions/Image/StripImageMetadataActionTest.php:157` e `:191`; nessun `->group('MEDIA-STRIP-INV-1')`.
- **MEDIA-STRIP-INV-2** — Per ogni altro `mime_type` (es. PDF) il file e il record restano invariati.
  Stessa verifica non marcata (`:213`).
- **MEDIA-STRIP-INV-3** — Se il file non e' leggibile dal disco (`get()` restituisce `null`) l'Action esce senza modificare nulla.
  Non coperto.

## Effetti collaterali

- Sovrascrive l'originale sul disco del media (`put`): l'operazione e' irreversibile, i metadati originali non sono conservati.
- `save()` del record con la nuova `size`.
- Qualita' JPEG fissa a 90: la ricodifica e' con perdita.

## Errori

- Le eccezioni di Intervention Image (file corrotto) e del disco si propagano.
- L'Action decide dal `mime_type` registrato, non dal contenuto: un JPEG registrato con altro mime mantiene il GPS (lo documenta il test `:225`).

## Non fa

- Non tocca conversioni o immagini responsive gia' generate.
- Non elimina metadati da PDF o altri formati.
- Non e' invocata automaticamente al caricamento.
