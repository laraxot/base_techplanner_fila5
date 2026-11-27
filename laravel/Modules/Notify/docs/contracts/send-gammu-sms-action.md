---
title: "Contratto — SendGammuSMSAction"
type: contract
action: "Modules\\Notify\\Actions\\SMS\\SendGammuSMSAction"
module: Notify
status: accepted
tags: [contract, action, notify, sms, gammu, process]
created: 2026-11-26
updated: 2026-11-26
---

# SendGammuSMSAction

Contratto di comportamento (regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`).
Sorgente: `app/Actions/SMS/SendGammuSMSAction.php`. Invio SMS via Gammu CLI
(`gammu-smsd-inject`-style: `sendsms TEXT`) eseguito come `Process` locale.

## Input

- `SmsData $smsData`: `recipient`, `body`.
- Costruttore richiede `GammuData::make()` con `path` e `config` configurati
  (`sms.php`), piu' `sms.from`, `sms.debug`, `sms.timeout`.

## Output

- `array{status_code: int|null, status_txt: string}`: exit code del processo e output.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| NOTIFY-GAMMU-INV-1 | `path` o `config` Gammu mancanti → `Exception` nel costruttore (l'Action non si costruisce). | — (non dimostrato) |
| NOTIFY-GAMMU-INV-2 | Il numero e' normalizzato a `+39...`/`+...` (stessa regola di NetfunSendAction: `00`→`+39`, senza `+`→`+39`). | — (non dimostrato) |
| NOTIFY-GAMMU-INV-3 | Il body e' scritto in un file temporaneo (`tempnam(sys_get_temp_dir(),'sms_')`) passato come `-text`: mai sulla riga di comando. | — (non dimostrato) |
| NOTIFY-GAMMU-INV-4 | Il file temporaneo e' sempre cancellato (`unlink`) sia in successo sia in errore. | — (non dimostrato) |
| NOTIFY-GAMMU-INV-5 | `Process::isSuccessful()` falso → `Exception('Gammu error: ...')` con stderr. | — (non dimostrato) |

## Effetti collaterali

- File temporaneo in `sys_get_temp_dir()` (cancellato dopo).
- Processo OS `gammu` con `-c <config> sendsms TEXT <numero> -text <file>`.
- Invio SMS reale tramite il modem Gammu configurato.

## Errori

- `Exception`: config mancante, processo fallito, eccezione interna (con file temp ripulito).

## Non fa

- Non usa HTTP: e' l'unico provider "locale" (SIM/modem).
- Non valida il contenuto oltre a scriverlo nel file.
