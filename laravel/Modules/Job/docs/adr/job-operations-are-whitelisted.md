---
status: accepted
module: Job
---

# Le operazioni tecniche Job sono in whitelist

## Contesto

Il pannello di stato espone comandi di coda con impatto operativo elevato.

## Decisione

Job consente soltanto comandi esplicitamente ammessi e ripete l'autorizzazione anche nelle chiamate Livewire.

## Driver della decisione

- Limitare l'impatto delle operazioni infrastrutturali.

## Alternative scartate

- Accettare un comando arbitrario dal pannello.
- Proteggere solo il pulsante visualizzato.

## Conseguenze

La superficie è più sicura e prevedibile; ogni nuovo comando richiede revisione della whitelist e dei test.

## Conferma

Verificare whitelist e autorizzazione Livewire nella pagina e nel widget Job.
