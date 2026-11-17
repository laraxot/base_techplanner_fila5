---
title: "File Locking & Validation Protocol (FLVP)"
type: rule
confidence: high
created: 2026-05-20
updated: 2026-05-22
tags: [locking, quality-gate, github, phpstan, phpmd, pest, playwright, mandatory]
related:
  - agent-conduct-rules.md
  - quality-gate-after-edit.md
  - post-modifica-verifica-obbligatoria.md
  - git/github-agent-coordination.md
  - ../memories/agent-flvp-github-standing-rule.md
  - ../../stories/story-048-checklist-flvp-wiki.md
---

# File Locking & Validation Protocol (FLVP)

**Priorità assoluta:** questa regola vale **prima** di qualsiasi modifica a file e **dopo** ogni modifica, ad ogni turno di execution.

Repo canonica: `git remote -v` → `laraxot/base_fixcity_fila5` (`git@github.com:laraxot/base_fixcity_fila5.git`).

---

## 1. Pre-modifica — lock obbligatorio

Prima di modificare **qualsiasi** file:

1. **Check lock:** nella **stessa cartella** del file target, verifica se esiste `<nomefile>.lock`.
   - Esempio: per `TicketForm.php` → `TicketForm.php.lock` nella stessa directory.
2. **Se `.lock` esiste:** **non modificare** — passa ad altro task (altro file, docs, issue GitHub).
3. **Se `.lock` non esiste:** **crea** `<nomefile>.lock` (file vuoto) **prima** di `Write` / `StrReplace` / edit.
4. Procedi con le modifiche.

```
/path/to/MyClass.php          ← target
/path/to/MyClass.php.lock     ← creare prima; rimuovere dopo
```

**Multi-agente:** il lock locale coordina agenti sulla stessa macchina/workspace. Combinare con `docs/chat/INDEX.md` per scope dichiarato.

---

## 2. Post-modifica — unlock + quality gate

Dopo aver completato le modifiche sul file:

1. **Rimuovi** `<nomefile>.lock`.
2. **Esegui** la suite di verifica sul file/scope toccato (N/A solo con motivo esplicito nel riepilogo):

| # | Tool | Comando canonico |
|---|------|------------------|
| 1 | PHPStan | `cd laravel && ./vendor/bin/phpstan analyse <path> --memory-limit=-1` |
| 2 | PHPMD | `./tools/phpmd <path> text unusedcode,design,codesize` |
| 3 | PHPInsights | `cd laravel && php artisan insights <Namespace\\Scope>` |
| 4 | Pest | `cd laravel && ./vendor/bin/pest --filter=<TestName>` o scope modulo |
| 5 | Puppeteer | script E2E del progetto se la modifica impatta UI/runtime |
| 6 | Playwright | `npx playwright test <scope>` o MCP Playwright (`browser_snapshot` sulla URL) |

Ref dettagliata: [`quality-gate-after-edit.md`](quality-gate-after-edit.md), [`post-modifica-verifica-obbligatoria.md`](post-modifica-verifica-obbligatoria.md).

**Markdown / wiki (`.md` in `docs/` e in `Modules/*/docs`):** il lock vale **come per il codice** — stesso nome base + suffisso `.lock` nella **stessa cartella** del file (es. `guida.md` → `guida.md.lock`). Ordine obbligatorio: `touch` → modifiche → **`rm -f` lock** → poi controlli post-edit. **Vietato** lasciare `.lock` dopo aver dichiarato il task chiuso.

**Modifiche JS/CSS tema Sixteen / Geo:** aggiungere build Vite (`npm run build && npm run copy`) oltre al gate PHP/browser.

### Post-edit — gate minimo Markdown (solo file `.md` toccati)

Immediatamente dopo `rm` del `.lock`:

1. **Link relativi** introdotti o modificati: verificano un path esistente (script locale, IDE, o `readlink`-equivalent mentally — non assumption).
2. **Frontmatter YAML** se presente: chiavi chiuse, nessuna duplicazione involontaria di blocchi `---`.
3. Se il cambiamento cambia corpus wiki ingestibile da QMD: `bashscripts/docs/llm-wiki-qmd.sh update` sulla collezione pertinenti (motivare **N/A** se non si tocca knowledge base ingest).
4. **Riepilogo turno:** elencare esplicitamente «lock rimosso» + «controlli .md eseguiti» o **N/A motivato**.

**Non basta** scrivere `gate minimo = link/indici`; va **fatto il controllo** (almeno sui link del diff) prima del riepilogo all'utente.

**Modifiche solo docs (aggregato):** combinare lock per file + gate Markdown sopra; se in un turno si toccano molti file, verificare i link almeno sui path elencati nel riepilogo.

---

## 3. GitHub Issues — interazione costante

Durante **tutto** il lavoro, non solo a fine task:

1. Identifica repo: `git remote -v`
2. Consulta issue aperte: `gh issue list --state open --limit 30`
3. Dettaglio issue rilevante: `gh issue view <N>`
4. Commenta avanzamento: `gh issue comment <N> --body "..."`
5. Collega fix a issue (commento o `Closes #N` in commit **solo se l'utente chiede commit**)
6. Usa **gh CLI + MCP** (Playwright, claude-mem, QMD, GitHub MCP se disponibile) — non sostituire wiki con soli commenti issue.

Workflow coordinamento: [`git/github-agent-coordination.md`](git/github-agent-coordination.md).

```bash
# Sessione — prima di toccare codice
git remote -v
gh issue list --state open --limit 20
gh issue view 70   # es. wizard/CSS se scope correlato
```

---

## 4. Chat multi-agente — `./docs/chat/` (costante)

**OBBLIGATORIO** oltre a GitHub issue:

1. **Prima** di task non banale: leggere [`docs/chat/INDEX.md`](../../chat/INDEX.md)
2. **Presa in carico:** data, agente, file/aree rivendicate (evita conflitti con lock + chat)
3. **Durante:** blocker, progressi, handoff ad altri agenti AI
4. **Dopo:** riepilogo con quality gate eseguito e prossimo step

Regola canonica chat: [`agent-chat-directory.md`](agent-chat-directory.md).

**Ordine coordinamento:** `docs/chat/` (locale, immediato) + GitHub issue (repo, tracciabilità) + wiki log (conoscenza persistente).

---

## 5. Sequenza completa (copiabile)

```
[ ] docs/chat/INDEX.md — scope dichiarato, nessun altro agente sullo stesso file?
[ ] gh issue list — task allineato a issue esistente?
[ ] <file>.lock assente → creato
[ ] modifiche applicate
[ ] <file>.lock rimosso **per ogni** file modificato nella sessione (`rm -f path/to/Target.ext.lock`)
[ ] Markdown toccati: verifica link relativi sul diff (§2 gate minimo Markdown) → **esito** dichiarato
[ ] phpstan → phpmd (./tools) → phpinsights → pest → puppeteer → playwright (**N/A motivato** se zero PHP/JS runtime)
[ ] gh issue comment / aggiornamento stato
[ ] docs/chat/INDEX.md — riepilogo se non banale
[ ] docs/wiki/log.md (decisioni riusabili)
```

---

## 6. Vietato

- Modificare file con `.lock` presente *(lock altrui o dimenticanza rimozione precedente)*.
- **`touch`/edit/`rm`** incoerenti: applicare patch **senza** aver creato prima `<file>.lock` nella stessa cartella; o **chiudere** il turno senza aver eseguito `rm -f` sul lock creato per quel file.
- Lasciare `.lock` orfani dopo fine lavoro (eccetto crash — allora segnalare in chat)
- Chiudere task senza quality gate su codice PHP/Blade/JS toccato; **né** dichiarare chiusura su solo-Markdown **senza** controllo minimi §2 (link / frontmatter / N/A motivato).
- Lavorare in silos senza consultare/aggiornare GitHub issues della repo
- Duplicare questa regola altrove — linkare da skill/memorie/bootstrap

## Collegamenti

- [Agent conduct rules](agent-conduct-rules.md)
- [Skill Cursor second brain max](../skills/cursor-second-brain-max-workflow.md)
- [Memoria permanente FLVP + GitHub](../memories/agent-flvp-github-standing-rule.md)
