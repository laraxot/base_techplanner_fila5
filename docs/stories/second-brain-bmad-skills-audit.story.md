---
title: "Second Brain, BMAD e coordinamento persistente"
type: story
status: in_progress
scope: root
created: 2026-10-30
updated: 2026-10-30
qmd: "second brain bmad story handoff multi-agent coordination docs chat"
tags: [bmad, second-brain, coordination, handoff]
issues: []
discussions: []
---

# Story: Second Brain, BMAD e coordinamento persistente

## User story

Come agente che lavora in swarm, voglio usare una BMAD story come registro
persistente del task, così scope, decisioni, blocker, handoff ed evidenze restano
vicini al codice e non dipendono da una bacheca volatile.

## Decisione

La story BMAD canonica dell'owner sostituisce `docs/chat/` per il coordinamento
attivo. `docs/chat/` resta consultabile per la storia del progetto, ma non è più
la fonte di verità per claim, handoff o stato corrente.

## Perché

- la story segue l'owner git del codice e può essere riusata insieme al modulo o tema;
- acceptance criteria e Definition of Done rendono il lavoro verificabile;
- gli agenti paralleli aggiornano un artefatto unico, riducendo collisioni e duplicati;
- QMD/second brain indicizza una decisione strutturata invece di messaggi sparsi;
- lock, test e output dei quality gate diventano evidenze riproducibili.

## Acceptance criteria

- [x] AGENTS.md indica la story BMAD come artefatto canonico multi-agente.
- [x] Il bootstrap indirizza la story owner invece di `docs/chat`.
- [x] Il template BMAD descrive handoff, blocker ed evidenze nella story.
- [x] La convenzione degli scope documenta il nuovo flusso.
- [ ] Gli indici e le regole operative residue vengono migrati senza riscrivere lo storico.

## Definition of Done

PHPStan/Pest restano verdi per il codice toccato; la story contiene stato finale,
file coinvolti, decisioni e comandi di verifica. Nessun commit automatico.

## Audit documentale mirato

Il controllo del 2026-10-30 ha corretto solo istruzioni operative attive che
prescrivevano `docs/chat/` come coordinamento:

- `docs/wiki/index/llm-wiki.md` — indice del second brain;
- `laravel/Modules/Geo/AGENTS.md` — bootstrap operativo del modulo;
- `laravel/Modules/Job/docs/actions.md` — guida Actions con hub di coordinamento.

I riferimenti in `docs/chat/`, nei log, nei raw import e nelle story storiche non
sono stati riscritti: descrivono il contesto passato e restano archivio. I documenti
superseded o auto-generati non sono stati trattati come canonici attivi.

## Quality sweep — evidenze

Il primo miglioramento misurabile ha chiuso la regressione PHPStan introdotta nel
config del modulo TechPlanner:

- rimossi duplicati nelle mappe di configurazione (`app`, `exchanges`, `filesystems`,
  `xot`, `xra`);
- sostituiti gli accessi ambiente non riconosciuti dal controllo statico con l'API
  `Illuminate\Support\Env` nei file di configurazione del modulo;
- mantenuto il comportamento cache-safe e usato `url('/storage')` per la URL del
  filesystem pubblico, evitando concatenazioni su `mixed`;
- PHPStan mirato `Modules/TechPlanner/config`: **0 errori**;
- PHPStan completo `Modules`: **0 errori**;
- `php -l` su tutti i file PHP di `TechPlanner/config`: **verde**.

La correzione ha mantenuto il significato runtime delle configurazioni: non sono
stati aggiunti ignore, baseline, cast cosmetici o modifiche a `phpstan.neon`.

## Activity — audit cataloghi italiani

Il 2026-10-30 è stato verificato lo scope disgiunto del modulo Activity:

- `laravel/Modules/Activity/lang/it/.php` era un catalogo anonimo residuo, non
  referenziabile da una chiave di traduzione stabile. Il suo contenuto era il
  fallback generico (`Missing Label`, `Missing Group`, `empty1`) già documentato
  come artefatto da rimuovere negli audit di traduzione del progetto. È stato
  eliminato, senza toccare gli altri moduli.
- `laravel/Modules/Activity/lang/it/log_viewer.php` è il catalogo runtime usato
  da `LogViewer` tramite `activity::log_viewer.*`. Le sole action registrate dalla
  pagina sono `refresh` e `download`; le chiavi `profile`/`logout` e i metadati
  `icon`/`tooltip` erano duplicati senza consumer e sono stati rimossi.
- Il catalogo conserva le sezioni effettivamente consumate (`navigation`, `title`,
  `tree`, `fields`, `placeholders`, `window_option`, `actions`, `messages`) e
  resta allineato alla struttura inglese per le chiavi operative.

### Evidenze

- `php -l laravel/Modules/Activity/lang/it/log_viewer.php`: verde.
- `require` del catalogo prima della modifica: array con chiavi anonime di
  fallback; dopo la modifica il file residuo non esiste più.
- Ricerca dei consumer: `LogViewer::getHeaderActions()` usa soltanto
  `actions.refresh.label` e `actions.download.label`.
- Test mirato `Modules/Activity/tests/Feature/Filament/LogViewerPageTest.php`:
  verde.
