# Disciplina Git: Forward-Only (Sempre in Avanti)

## Panoramica

In questo progetto è adottata la disciplina operativa **"Forward-Only"** per la gestione della storia Git.

**Regola standing utente:** studiare la history sì; **ripristinare** file o directory da commit/branch precedenti **no** (`checkout --`, `restore --source`, `git show ref:path > path`). Si implementano nuove patch sul working tree attuale.

Canon operativo: [git-forward-only.md](../rules/git-forward-only.md) · Cursor: `bashscripts/ai/.cursor/rules/git-forward-only.mdc`

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

1. **Mai `git revert` / `git reset --hard`** come scorciatoia agent senza ordine utente.
2. **Mai `git checkout <ref> -- <path>`** né redirect da `git show` — solo lettura + patch manuale.
3. **Documenta il "Perché"** nel commit o in `docs/wiki/log.md` del modulo.
4. **Ingest continuo** nel second brain quando la policy si applica a un caso nuovo.

Memoria: [git-forward-only-standing-rule.md](../memories/git-forward-only-standing-rule.md)
