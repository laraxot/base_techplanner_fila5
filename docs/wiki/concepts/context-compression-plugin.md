Titolo: Context-Compression Plugin (concetto e guida rapida)

Sommario

Il "context-compression plugin" è una componente che riduce la lunghezza del contesto inviato a un LLM comprimendo o sintetizzando documenti lunghi prima dell'invio. Questo evita errori di tipo "maximum context length" e permette di inviare l'essenziale mantenendo il significato.

Scopo

- Ridurre token count di payload LLM
- Preservare segnali critici per la generazione
- Integrarsi nella pipeline di ingestione LLM-wiki e nei client che inviano prompt

Principio operativo (breve)

- Tecniche: riepilogo modello-driven, estrazione di estratti rilevanti, hashing + store/retrieve (recall) pattern, compressione semantica.
- Implementazioni tipiche: librerie Node o Python che offrono funzioni di compressione/summarization e utilities per contare token.

Installazione (placeholder)

- Nota: se il repository ha accesso a npm o PyPI, sostituire i placeholder con le referenze ufficiali.

Esempio (Node, placeholder):

1. npm install @context-compression/plugin
2. Configurare pipeline: require('@context-compression/plugin').compress(input, {model: 'gpt-5-mini'})

Esempio (Python, placeholder):

1. pip install context-compression
2. from context_compression import compress
   compressed = compress(text, model='gpt-5-mini')

Verifica

- Usare strumenti di tokenization per misurare token prima/dopo (p.es. tiktoken o alternative)
- Eseguire test con documenti di grandi dimensioni e confermare che il payload compresso è sotto la soglia (es. 131072 tokens)

Integrazione con LLM Wiki

- Aggiungere questo documento alla lista di ingest (docs/wiki/ingest-manifest-context-compression.md)
- Indicare dove sono gli script di compressione e come eseguire la pipeline di ingest

Linee guida DRY + KISS

- Creare una singola fonte di verità in docs/wiki/concepts e linkare moduli/temi a questo file
- Non duplicare le istruzioni; i moduli/temi devono aggiungere solo note contestuali

Nota pratica: evitare dump di HTML e report nel contesto

- Evitare di includere nel contesto LLM HTML completo di pagine 500 o output lunghi di tool (phpstan/curl/log).
- Best practice: salvare su file (es. `/tmp/phpstan.json`) e lavorare per estrazione + sintesi wiki.

Placeholder Link

- [Link autoritativo: TBD]

Note per i manutentori

- Quando la connettività ritorna, sostituire i placeholder con link GitHub/PyPI/NPM e aggiungere snippet reali.
- Aggiungere script di test in /scripts e report in /reports/context-compression/

Autore: Copilot CLI
