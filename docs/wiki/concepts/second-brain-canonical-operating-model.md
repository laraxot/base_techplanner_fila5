# Second Brain Canonical Operating Model

## Definizione canonica

Nel repository, il **second brain** coincide con la LLM Wiki versionata:

- root: `docs/wiki/`
- moduli: `laravel/Modules/*/docs/wiki/`
- temi: `laravel/Themes/*/docs/wiki/`

Non e un sistema parallelo di note: e un sistema operativo della conoscenza.

## Modello minimo operativo

- **Capture**: cattura evidenze reali (errori, decisioni, fix verificati).
- **Organize**: salva nei layer corretti (root/modulo/tema) con confine owner.
- **Distill**: estrai regole riusabili (best/bad/false friends).
- **Express**: aggiorna index/log e rendi interrogabile via ingest locale.

## Best practices

- Root definisce regole trasversali; moduli/temi definiscono i boundary locali.
- Ogni nuova pagina concettuale aggiorna sempre `index.md` e `log.md`.
- Una regola, una fonte canonica: gli altri layer linkano, non duplicano.
- Le decisioni vanno legate a evidenza tecnica o runtime verificabile.

## Bad practices

- Creare documenti scollegati dall’indice.
- Lasciare la conoscenza solo in chat/story senza pagina wiki persistente.
- Mischiare regole di business logic modulo con regole di parity tema.

## False friends

- "Second brain = solo ricerca semantica": falso, serve anche compilazione e governance.
- "Basta la wiki root": falso, senza layer modulo/tema perdi i confini.
- "Più file = più qualità": falso, senza dedup e link è solo rumore.

## Link verificati

- [Building a Second Brain overview](https://praxis.fortelabs.co/basboverview/)
- [12 steps to build a second brain](https://fortelabs.co/blog/12-steps-to-build-a-second-brain)
- [PARA method](https://www.thesecondbrain.io/para-method)
- [Karpathy LLM Wiki](https://karpathy-wiki.lol/en)
