# Zero: il tema che trasforma complessita in vantaggio operativo

Zero theme for Laraxot PTVX: frontend theme with Tailwind, Vite, Flowbite and Alpine.js integration.

## Perche guardarlo adesso

- Riduce attrito operativo con convenzioni Laraxot gia pronte.
- Porta documentazione, release e changelog nello stesso flusso verificabile.
- Aiuta team e agenti AI a capire subito scopo, confini e prossime mosse.
- E pensato per crescere: semantic versioning, auto release e changelog automatico sono gia configurati.

## Cosa promette

Questo tema non e solo codice: e una vetrina operativa. Mostra dove intervenire, cosa leggere, come rilasciare e come mantenere alta la confidenza tecnica.

## Release automation

- Workflow: [Semantic Release](./.github/workflows/semantic-release.yml)
- Config: [.releaserc.json](./.releaserc.json)
- Changelog: [changelog.md](./changelog.md)

## Documentazione tecnica

- [Indice docs](./docs/README.md) — mappa knowledge base locale (wiki, audit, regole)

## Documentazione essenziale

- [Second brain locale](./docs/wiki/index.md)
- [Audit ridondanza](./docs/code-redundancy-audit.md)
- [Protocollo confidenza](./docs/agent-confidence-protocol.md)
- [Disciplina agenti](./docs/agent-edit-discipline.md)
- [00 Index](./docs/00-index.md)
- [Conflict Resolution Summary](./docs/conflict-resolution-summary.md)
- [Accessor Delegation Pattern](./docs/accessor-delegation-pattern.md)
- [Ai Development Guide](./docs/ai-development-guide.md)
- [Ai Handoff](./docs/ai-handoff.md)
- [Analisi Completa Tema](./docs/analisi-completa-tema.md)

## Scopo e confini

Zero è il guscio pubblico del portale: il markup di pagina, i token di stile e la
pipeline che li compila. È l'unico dei tre temi con una build vera (`vite.config.js`,
`tailwind.config.js`, `postcss.config.js`, `package.json`) ed è quello che gli host di
produzione selezionano (`pub_theme` e `adm_theme` = `Zero` in
`config/local/tv/prov/personale2022/xra.php` e `personale2019`). Non contiene PHP:
`app/` ha solo `.gitkeep`. Due confini rotti misurati il 2026-09-02: gli asset
compilati finiscono in `Themes/Zero/public/` e nessuno li copia in
`public_html/themes/Zero`, che infatti non esiste; e le tre pagine sotto
`resources/views/pages/` non sono montate da alcun `Folio::path`.

Misure e cinque mosse concrete: [`docs/scopo.md`](./docs/scopo.md).

## Filosofia

Scopo prima del codice. DRY prima dell'orgoglio. KISS prima dell'astrazione. La release automatica non sostituisce il giudizio: lo rende tracciabile.
