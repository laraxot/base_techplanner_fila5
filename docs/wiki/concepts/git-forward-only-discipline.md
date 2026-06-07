# Disciplina Git: Forward-Only (Sempre in Avanti)

## Panoramica

In questo progetto è adottata la disciplina operativa **"Forward-Only"** per la gestione della storia Git. Non si ripristinano mai vecchie versioni del codice tramite comandi distruttivi (`revert`, `reset --hard`), ma si implementano nuove versioni che correggono o migliorano lo stato precedente.

---

## Razionale Tecnico e Collaborativo

### 1. Preservazione del Contesto AI
Gli agenti AI apprendono dalla storia degli errori e dai tentativi falliti. Cancellare un commit che ha portato a un bug rimuove i "segnali di pericolo" che aiutano l'AI a non ripetere lo stesso errore. Una storia lineare e completa è una risorsa di addestramento e contesto inestimabile.

### 2. Tracciabilità Totale (Audit Trail)
Ogni commit rappresenta un passo nell'evoluzione del progetto. Anche un commit errato è parte della storia. La correzione deve essere un nuovo commit esplicito (Roll-Forward) che spiega cosa è stato corretto e perché, mantenendo un registro onesto del debito tecnico e della sua risoluzione.

### 3. Sicurezza Collaborativa (Multi-Agent Safety)
In un ambiente dove più agenti e sviluppatori umani lavorano simultaneamente, i comandi di ripristino della storia creano conflitti di sincronizzazione difficili da risolvere. Il workflow forward-only garantisce che la storia sia sempre incrementale, facilitando il merge e la risoluzione dei conflitti.

---

## Linee Guida Operative

1. **Mai fare `git revert`**: Se un commit ha introdotto un bug, crea un nuovo commit con il fix.
2. **Mai fare `git reset --hard`** su branch condivisi: Studia la versione precedente per capire l'errore, ma scrivi il nuovo codice nel punto attuale della storia.
3. **Documenta il "Perché"**: Nel messaggio di commit del fix, riferisciti all'errore precedente per mantenere il collegamento logico.
4. **Ingest Continuo**: Quando incontri un errore di build o logico, documentalo nel `docs/wiki/log.md` del modulo prima di risolverlo.

---

*Ultimo aggiornamento: Aprile 2026*
