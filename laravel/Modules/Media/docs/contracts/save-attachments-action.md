---
title: "SaveAttachmentsAction — contratto"
type: contract
owner: Media
status: accepted
updated: 2026-11-24
action: "Modules\\Media\\Actions\\SaveAttachmentsAction"
qmd: "SaveAttachmentsAction salva allegati media library addMedia record update percorso relativo disco"
---

# SaveAttachmentsAction

Importa in media library gli allegati caricati su un disco temporaneo e salva sul record il percorso relativo di ciascun media. Codice: `app/Actions/SaveAttachmentsAction.php:26-70`.

## Input

- `HasMedia $record`: il modello destinatario.
- `array<int, string> $attachments`: nomi dei campi allegato.
- `array<string, mixed> $data`: dati del form; il valore di ogni allegato è un percorso sul disco.
- `string $disk = 'attachments'`: disco sorgente e destinazione.

## Output

- `void`.

## Invarianti

- **SAVE-ATTACHMENTS-INV-1** — Un allegato assente da `$data`, con percorso vuoto o inesistente sul disco viene saltato.
  Test: nessuno esplicito per il salto; `tests/Unit/Actions/SaveAttachmentsActionTest.php:51` copre solo la lista vuota.
- **SAVE-ATTACHMENTS-INV-2** — Il record è aggiornato con i percorsi dei media solo se almeno un allegato è stato importato.
  Test: nessuno esplicito.
- **SAVE-ATTACHMENTS-INV-3** — Il file temporaneo in `storage/framework/cache` è rimosso sempre (blocco `finally`).
  Test: nessuno.

## Effetti collaterali

- Per ogni allegato: scrittura di un file temporaneo, `addMedia()` con `toMediaCollection()` (righe media e file nel disco), cancellazione del temporaneo.
- Poi un `update()` del record con i percorsi.
- Nessuna transazione: un errore a metà lascia i media già importati.

## Errori

- `UnexpectedValueException` se il valore dell'allegato non è stringa o se il contenuto non è leggibile come stringa.
- Altre eccezioni di Media Library si propagano.

## Non fa

- Non cancella il file sorgente sul disco temporaneo dopo l'import.
- Non gestisce transazioni né rollback.
