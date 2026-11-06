---
title: "BMAD stories come fonte operativa"
type: story
status: in-progress
priority: high
tags: [bmad, stories, second-brain, swarm, coordination, governance]
qmd: "BMAD stories source of truth handoff coordination docs chat legacy archive"
related:
  - ../../bashscripts/ai/wiki/concepts/second-brain-operational-contract.md
  - ../../bashscripts/ai/wiki/concepts/architectural-invariants.md
  - ../../bashscripts/ai/wiki/concepts/agent-bootstrap-compact.md
---

# BMAD stories come fonte operativa

## Scopo

Come agente o maintainer, voglio che ogni task materiale, handoff, claim e risultato
viva nella BMAD story del relativo owner, così il lavoro è versionato, verificabile,
assegnabile e riprendibile senza ricostruire lo stato da una conversazione.

## Perché

`docs/chat/` era utile come diario append-only e bacheca veloce, ma separava contesto,
criteri di accettazione, ownership e verifica. La story BMAD unisce questi elementi:
descrive lo scopo, delimita i file, espone i criteri misurabili, registra il lavoro
degli agenti e chiude con prove reali. Questo riduce duplicati, collisioni e falsi
handoff; Second Brain indicizza la story invece di creare una seconda fonte.

## Regola operativa

- Story cross-project: `docs/stories/`.
- Story di modulo: `laravel/Modules/<Nome>/docs/bmad/stories/` oppure la cartella
  `docs/stories/` già adottata dal modulo.
- Story di tema: `laravel/Themes/<Nome>/docs/stories/`.
- Story di tooling trasversale: `bashscripts/docs/bmad/stories/`.
- `docs/chat/` resta read-only per la storia pregressa; non si creano nuovi handoff,
  claim o coordinamenti lì.

## Acceptance criteria

- [x] Bootstrap, Trigger Map e contratto Second Brain indicano la story come fonte
      operativa.
- [x] AGENTS.md vieta nuovi handoff operativi in `docs/chat/`.
- [x] Le skill e gli script che scrivono nuovi handoff vengono aggiornati per creare
      o aggiornare la story owner. Fatto per regole, how-to, prompt di avvio e ponti
      degli agenti (vedi Stato); restano esclusi gli script che *leggono* dati storici
      da `docs/chat/` (badge PHPStan, corpi di issue gia' scritti).
- [x] I riferimenti storici a `docs/chat/` sono marcati come legacy senza riscrivere
      la cronologia: i tre handoff ancora `active` sono `superseded` con rimando alla story,
      `docs/chat/INDEX.md` e' intestato come archivio, nessun file e' stato cancellato o rinominato.
- [ ] La story contiene file scope, owner, criteri verificabili, comandi e risultato.

## Protocollo di esecuzione

1. Cercare una story esistente prima di crearne una nuova.
2. Dichiarare owner e file scope; usare lock per lane disgiunte.
3. Aggiornare Tasks, Dev Agent Record, File List e Change Log nella story.
4. Eseguire i gate proporzionati e riportare exit code e risultati.
5. Scrivere nel Second Brain solo conoscenza durevole; la story resta il registro
   operativo della modifica.

## Stato

Le regole, i prompt di avvio e i ponti per gli agenti non indicano piu' `docs/chat/`
come canale: indicano la story dell'owner (`## Claim`, `## Esito`, `## Ripartenza`) e
`python3 -I bashscripts/tools/claims-open.py`, che legge gia' `docs/stories`,
`Modules/*/docs/stories`, `Themes/*/docs/stories` e le cartelle `bmad/stories`.

### Perche' era rimasta viva

I prompt di avvio in `bashscripts/tools/prompts` e `bashscripts/docs/prompts` ripetevano
le istruzioni `docs/chat` (due righe di boilerplate, 197 volte ciascuna, sparse nei
prompt delle due cartelle): ogni sessione nuova le rileggeva e riproduceva la vecchia pratica anche dopo il
congelamento del 2026-09-09. Correggere solo le regole non bastava.

### Fatto (repo privato `bashscripts`, salvo dove indicato)

- Regola `agent-chat-directory` riscritta come superata, con il perche' e la tabella
  vecchio passo -> sezione della story; how-to `multi-agent-coordination-discipline`,
  regola `agent-confidence-protocol`, `file-locking-validation-protocol` §4, skill
  `cursor-second-brain-max-workflow`, memoria `docs-chat-slug-per-topic`.
- 95 file distinti aggiornati con sostituzioni di frasi esatte (ripetibili, con backup e
  controllo dei lock): 84 prompt in `tools/prompts` e `docs/prompts`, 2 pagine del wiki,
  9 ponti per gli agenti (`.opencode` e' un link a `bashscripts/ai/.agents`). Un secondo
  giro non cambia nulla.
  Escluso `SOURCE-ORIGINAL.md`, che riporta parola per parola istruzioni dell'utente.
- Il template `COORD=docs/chat/${DATE}-...-lock.md` (che scriveva in `docs/chat/` con la
  data nel nome) ora usa un file temporaneo e termina con `cat`, da incollare nella `## Claim`.
- Root (pubblico): `docs/chat/INDEX.md` con la sezione «Dove si scrive ora»; cinque handoff
  migrati alle loro story (Xot `idcolumn-record-anchor-return-to`, root
  `git-collision-detection-resolution-system` per collisioni git e `.gitattributes`, Sixteen
  `data-attribute-parity`, root `all-modules-phpstan-zero-errors`).

### Resta

- Nessun handoff e' piu' `corrente` in `docs/chat/INDEX.md` tranne l'audit completo
  (`docs/audits/project-complete-audit.md`, che non e' un handoff operativo). I cinque
  handoff operativi sono `superseded` con rimando alla loro story.
- Script che leggono dati da `docs/chat/` (badge PHPStan dei README dei moduli leggono
  `docs/chat/phpstan-modules-live.json`; script `gh-*` leggono corpi di issue): non sono
  coordinamento, ma il file di dati andrebbe spostato altrove con una decisione sul formato.
- `tools/rename-md-remove-dates.mjs` scrive ancora un log in `docs/chat/`: strumento a uso singolo.
- Riferimenti storici a `docs/chat/` nelle `docs/` di moduli e temi (sono cronologia, non si riscrivono).
- Criterio 5: la story riporta file scope, owner e comandi; l'esito su una sessione nuova
  (un agente che parte dai prompt aggiornati e non scrive in `docs/chat/`) non e' stato osservato.

## Dev Agent Record

| Chi | Scope | Stato |
|---|---|---|
| sessione 56da8100 | passaggio da `docs/chat` alle story: regole, prompt di avvio, ponti, tre handoff migrati | rilasciato |
