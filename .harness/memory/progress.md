---
title: "Progress — stato sessione harness"
type: memory
created: 2026-11-27
updated: 2026-11-27
related:
  - ./lessons.md
  - ./facts.md
---

# Progress

Stato corrente del lavoro sull'harness. Una sessione nuova riprende da qui.

## Stato 2026-11-27 (fine sessione)

- Standard applicato a root + 19 moduli + 6 temi: dedup ADR (gemelli
  `NNNN-` canonici), `index.md`/`INDEX.md`/`_template.md` allineati.
- Commit `Refs #64` in ogni repo toccato; root: `50c90a42b5` + README
  `99f1a73574`. Push eseguito sui repo con upstream aggiornato.
- Fix link: `agent-bootstrap-compact.md` consolidato in
  `agents-harness-tooling.md#agent-bootstrap-compact` (AGENTS/CLAUDE/laravel).
- `AgentInstructionLinksResolveTest` e `InstructionReferencesExistTest` verdi;
  `composer harness:check` 41/41 verdi.

## In corso

- Rebase+push residuo su repo il cui remote ha commit "reconcile" paralleli
  (base_ptvx_fila5#15): AI, Job, Lang, Media, Notify, Rating, Tenant, UI,
  User, Xot, Themes/Zero — risoluzione conflitti preservando sezioni
  "Harness minimo"/"Riconciliazione documentale" del remote ed eliminando
  sezioni "da riconciliare" con link morti. Themes/Meetup e TwentyOne non
  hanno remote configurato: commit locali only.
- Test Docs ancora rossi (pre-esistenti, non di questa lane):
  BmadStoriesAreMadrFormat, StoryNumbersAreUnique, ActorManuals,
  NoDocsArchiveFolders, ModuleCodeIsProjectAgnostic, PackagesHaveGithubReadme,
  DocsChatIsReadOnlyArchive, ContractInvariantsAreProven (group orfani).

## Conflicts incontrati

- Repo con `.git` separati ma files tracciati ANCHE nel repo root: ogni
  modifica docs va committata nel repo modulo E rispecchiata nel root.
- Remote parallelo (altro agente, issue ptvx #15) ha risolto gli stessi
  merge marker `.merge_file_*` e aggiunto note di riconciliazione: in rebase
  la versione remota è un soprasieme dei nostri file contratto.

## Note

- Le decisioni architetturali non si scrivono qui: vanno in `docs/adr/` del
  pacchetto owner o in `docs/adr/` di root per quelle trasversali.
- Le lezioni (fallimenti → controlli) vanno in `lessons.md`.
