# Second Brain Methodology per LLM Wiki

## Introduzione
Questo progetto adotta i principi del **"Second Brain"** (ideato da Tiago Forte) adattandoli all'Intelligenza Artificiale, nello specifico attraverso il pattern della **LLM Wiki** di Andrej Karpathy. Il "Second Brain" serve come sistema di gestione della conoscenza (PKM - Personal Knowledge Management) progettato per scaricare il carico cognitivo dell'agente IA e degli sviluppatori umani, centralizzando l'informazione in un formato facilmente ricercabile e contestualizzabile.

La filosofia di base è: *"La tua mente serve per farsi venire delle idee, non per immagazzinarle"*.

## Il framework C.O.D.E. per l'Agente AI

Il ciclo vitale dell'informazione all'interno dei Moduli e Temi di Laraxot segue il framework C.O.D.E.:

1. **Capture (Catturare):** L'agente AI raccoglie output da comandi falliti, log di errore e sessioni di debug (es. gli errori PTY di Artisan o FK mismatch nei database). I dati grezzi finiscono in log operativi o directory `raw/`.
2. **Organize (Organizzare):** L'informazione viene posizionata nei giusti moduli seguendo la regola `zero-tolerance` per le cartelle ambigue (niente `docs.old`, niente `_docs`). Ogni modulo e tema ha la sua directory canonica `docs/wiki/` (es. `Modules/User/docs/wiki/`).
3. **Distill (Distillare):** Estrarre il succo. Invece di conservare transcript infiniti, l'agente deve sintetizzare l'informazione sotto forma di **Best Practices, Bad Practices e False Friends**, scrivendo file markdown concisi.
4. **Express (Esprimere):** L'informazione viene riutilizzata tramite l'indicizzazione QMD per guidare decisioni architetturali future. Prima di modificare un file, l'agente "scarica" il contesto dal Second Brain.

## Il Metodo P.A.R.A. mappato su Laraxot

La struttura dei file e delle directory (`docs/`) si conforma al metodo P.A.R.A.:

- **Projects (Progetti):** I task attuali, tracciati tramite le user story nel framework BMAD (`/bmad-create-story`). Sono effort a breve termine (es. implementare la login auth).
- **Areas (Aree di responsabilità):** I Moduli (es. `Modules/Fixcity/docs/wiki`) e i Temi (es. `Themes/Sixteen/docs/wiki`). Sono aree che necessitano manutenzione continua e standard architetturali permanenti (es. Design Comuni).
- **Resources (Risorse):** Il root globale `docs/wiki/` che contiene regole generali del sistema, pattern e boilerplate (es. come usare QMD o Laravel Boost MCP).
- **Archives (Archivi):** Elementi obsoleti spostati rigorosamente all'interno di `docs/wiki/_archive/` (assolutamente vietate cartelle esterne come `docs.old` o `docs/archive`).

## Studio delle cartelle Docs nei Moduli e Temi
Lo studio della struttura nei vari moduli (Fixcity, Geo, Cms, User, ecc.) e temi conferma l'adozione del Second Brain. Ogni volta che si invoca `/bmad-create-story`, la procedura deve obbligatoriamente fare `ingest` e studio preliminare del proprio modulo/area di competenza prima di procedere, applicando attivamente i concetti C.O.D.E. per garantire che il codice generato sia in linea con il framework globale (DRY, KISS, Cleancode).
