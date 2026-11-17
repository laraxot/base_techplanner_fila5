---
title: "Agent Conduct Rules"
type: rule
confidence: high
created: 2026-05-13
updated: 2026-05-29
tags: [agents, conduct, docs-chat, second-brain, qmd, quality-gate, flvp, github, ingest, git, branch]
related:
  - rules/agent-no-git-branch-creation.md
  - rules/agent-chat-directory.md
  - rules/pre-edit-docs-first.md
  - rules/post-modifica-verifica-obbligatoria.md
  - rules/quality-gate-after-edit.md
  - rules/file-locking-validation-protocol.md
  - rules/git-forward-only.md
  - rules/git/github-agent-coordination.md
  - concepts/llm-wiki-operational-discipline.md
  - memories/agent-conduct-rules.md
  - memories/agent-complete-conduct-standing-rule.md
  - memories/agent-flvp-github-standing-rule.md
  - memories/agent-github-issue-mandatory-cycle.md
  - bmad-story-github-links-mandatory.md
  - memories/bmad-story-github-links-mandatory.md
  - rules/agent-model-guards.md
---

# Agent Conduct Rules

**Regola permanente e innegociabile** per ogni agente AI in questo repository — inclusa **l’istanza che sta rispondendo adesso**: le regole valgono per te in sessione, non solo come testo depositato per futuri agenti.

Repo: confermare sempre con **`git remote -v`** prima di parlare di issue `#N`; `origin` atteso su questo branch principale è `laraxot/base_fixcity_fila5`.

## Git forward-only — obbligo operativo agenti

È vietato proporre rollback Git (restore/checkout/revert/reset sulla working tree senza comando esplicito dell’utente nello **stesso** messaggio utente che lo richiede) come modo per «sistemare» regressioni delle sessioni agent.

- **Canonico**: [`git-forward-only.md`](git-forward-only.md) · history **solo lettura**, correzione sempre con **patch in avanti** su HEAD corrente.
- **Linguaggio vietato nei consigli**: «ripristina la versione vecchia», «torna al commit».

## Git branch — vietata creazione e cambio branch (agenti)

**L’agente non crea mai branch e non fa checkout/switch su un altro branch.** Solo l’utente.

| Vietato | Consentito |
|---------|------------|
| `git checkout -b`, `git switch -c`, `git branch <nome>` | `git status`, `git diff`, `git log`, `git branch --show-current` |
| `git checkout <branch>`, `git switch <branch>` | Commit sul branch **già attivo** (se l’utente chiede commit) |
| Branch «pulito» per PR creato dall’agente | Push/PR solo su branch esistente indicato dall’utente |

- **Canonico**: [`agent-no-git-branch-creation.md`](agent-no-git-branch-creation.md)
- **Memoria**: [`agent-no-git-branch-creation.md`](../memories/agent-no-git-branch-creation.md)
- **Cursor**: `.cursor/rules/agent-no-git-branch-creation.mdc` (`alwaysApply: true`)

Se serve isolamento: chiedere all’utente di creare/spostarsi sul branch, poi riprendere sul branch corrente.

## GitHub sempre (anti-silenzio)

**Obbligo personale dell’agente:** non dichiarare un task governance/documentazione/policy «completato» se in quella sessione non hai eseguito almeno un comando **`gh …`** sulla repo corretta (salvo impossibilità tecnica dichiarata, es. CLI assente).

Senza **`gh` + backlog GitHub osservabile** il second brain rimane incompleto: la wiki/`docs/chat/` non bastano perché perdono storico/issue label assegnatari/reminder pubblici.

1. Ad **inizio** di ogni lavoro non banale sulla working tree locale: **`git remote -v`** poi almeno un comando **`gh`** utile allo scope (`issue list …`, `issue view …`, `issue comment/create …`) — sempre con `--repo <owner>/<repo>` negli script se la cwd dubbia (vedi [`git/github-agent-coordination.md`](git/github-agent-coordination.md)).
2. Se nessuna issue esistente copre l’argomento, **crea tu la issue con `gh issue create` senza chiedere conferma**; poi commenta/aggiorna chat e wiki usando quel numero.
3. Annota sempre issue rilevanti in **`docs/chat/INDEX.md`** quando tocchi governance, policy wiki o refactor che altri agent già pianificano.
3. **Nuovo tema sul backlog:** dopo una ricerca veloce issue (`gh … --search`/liste), se **non** esiste ancora una issue che copra il caso, **`gh issue create`** senza chiedere all’utente se «è permesso». Non duplicare issue gemelle: al limite **`gh issue comment`** su quella esistente ([#83](https://github.com/laraxot/base_fixcity_fila5/issues/83)).
4. Persistenza comportamentale anche on-demand dalla memoria [`agent-github-issue-mandatory-cycle.md`](../memories/agent-github-issue-mandatory-cycle.md) e dall’[**issue tracker #80**](https://github.com/laraxot/base_fixcity_fila5/issues/80).

---

## Protocollo operativo (ordine)

1. **Repo + backlog GitHub (prima delle altre operazioni quando tocchi codebase, wiki policy o refactor cross-agent):** **`git remote -v`**; almeno un comando **`gh …`** sulla repo risolta da `origin` (`issue list` / `issue view` / `issue comment` / `issue create`; negli script ripetibili usa sempre `--repo owner/repo`). Se manca una issue pertinente, crearla proattivamente senza chiedere conferma.
2. **Chat multi-agente:** leggere [`docs/chat/INDEX.md`](../../chat/INDEX.md) prima di lavoro non banale o coordinato con altri agenti AI.
3. **Documentazione:** studiare `docs/` root + modulo/tema owner **prima** di modificare codice; aggiornare docs quando nasce conoscenza riusabile.
4. **FLVP pre-edit:** nella stessa cartella del file — se `<file>.lock` esiste → altro task; altrimenti crea lock → modifica.
5. **FLVP post-edit:** rimuovi lock → quality gate (§ sotto) → cross-ref chat + issue → log wiki.
6. **Ingest:** dopo nuovi documenti wiki/modulo/tema → `bashscripts/docs/llm-wiki-qmd.sh update`.
7. **Moduli nwidart / BMAD:** nuove classi solo sotto `Modules/{Mod}/app/` (verificare `composer.json`); per `/bmad-*` caricare [`bmad-laraxot-implementation-guardrails.md`](../concepts/bmad-laraxot-implementation-guardrails.md).
8. **Story BMAD (`docs/stories/STORY-*.md`):** sezione `## GitHub (tracciamento)` con **≥1 issue + ≥1 discussion** URL; creare/commentare su GitHub se mancano — [`bmad-story-github-links-mandatory.md`](bmad-story-github-links-mandatory.md); verifica `bashscripts/ai/verify-bmad-story-github-links.sh`.

---

## Cross-ref chat â GitHub Issue (audit)

Entrambe le tracce servono per coordinamento e audit:

| Azione | Obbligo |
|--------|---------|
| Presa in carico in `docs/chat/` | Citare issue `#N` se correlata |
| Apertura/modifica issue GitHub | Nota in `docs/chat/INDEX.md` con numero, link, scope file |
| Chiusura task | Riepilogo in chat **e** commento issue |
| Argomento senza issue esistente | **`gh issue create`** (non chiedere conferma all'utente) |

Ref: [`agent-chat-directory.md`](agent-chat-directory.md), [`git/github-agent-coordination.md`](git/github-agent-coordination.md).

---

## FLVP — lock file

Regola canonica: [`file-locking-validation-protocol.md`](file-locking-validation-protocol.md).

```
/path/to/File.php
/path/to/File.php.lock   â creare prima; rimuovere dopo edit
```

- Lock esistente → **non modificare**, passa ad altro
- Memoria: [`agent-flvp-github-standing-rule.md`](../memories/agent-flvp-github-standing-rule.md)

---

## Quality gate post-modifica (codice)

Dopo ogni modifica a PHP/Blade/JS/CSS/runtime, **in ordine**:

```bash
cd laravel && ./vendor/bin/phpstan analyse <scope>
./tools/phpmd <scope> text unusedcode,design,codesize
cd laravel && php artisan insights <scope>
cd laravel && ./vendor/bin/pest <scope>
# puppeteer — script E2E progetto se UI/runtime
# playwright — npx playwright test <scope> o MCP browser_snapshot
```

Ref: [`quality-gate-after-edit.md`](quality-gate-after-edit.md).

**Solo documentazione:** gate minimo = no conflitti/marker, link/indici OK, `llm-wiki-qmd.sh update` se corpus cambiato. Dichiarare `N/A` tool non applicabili con motivo.

**PHPMD:** `./tools/phpmd` (PHAR standalone, non Composer vendor).

---

## Documentazione moduli e temi

- Root progetto: `docs/wiki/` — cross-cutting
- **Goal progetto:** `docs/goal/` — **append-only** (solo nuovi `.md`; mai modificare file esistenti) → [`docs-goal-append-only-rule.md`](docs-goal-append-only-rule.md)
- Modulo: `laravel/Modules/<Nome>/docs/` + `docs/wiki/`
- Tema: `laravel/Themes/<Nome>/docs/` + `docs/wiki/`
- Focus: business logic, scopo, perche' — DRY + KISS
- Filename `.md`: lowercase-kebab-case (ecc. README.md)

---

## Second brain (persistenza)

Non duplicare regole lunghe in bootstrap. Stub brevi → link a:

- [`agent-conduct-rules.md`](agent-conduct-rules.md) (questa pagina)
- [`memories/agent-complete-conduct-standing-rule.md`](../memories/agent-complete-conduct-standing-rule.md)
- [`00-TRIGGER_MAP.md`](00-TRIGGER_MAP.md)
- [`concepts/llm-wiki-operational-discipline.md`](../concepts/llm-wiki-operational-discipline.md)
