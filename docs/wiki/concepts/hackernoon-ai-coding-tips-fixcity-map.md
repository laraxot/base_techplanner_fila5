---
title: "HackerNoon AI Coding Tips 001-022 → Fixcity Map"
type: concept
tags: [hackernoon, ai-coding-tips, second-brain, architecture, fixcity, map]
created: 2026-06-05
updated: 2026-06-05
qmd: "hackernoon ai coding tips 001 022 fixcity map distillato principles"
issues:
  - "https://github.com/laraxot/base_fixcity_fila5/issues/272"
discussions:
  - "https://github.com/laraxot/base_fixcity_fila5/discussions/273"
related:
  - ../bmad/architecture.md
  - ../../bashscripts/tools/prompts/llm-wiki.txt
  - ../rules/00-TRIGGER_MAP.md
  - ../rules/wiki-markdown-frontmatter-mandatory.md
  - ../../../laravel/Modules/Xot/docs/wiki/concepts/ai-harness-xot-discipline.md
  - ../../../laravel/Modules/Fixcity/docs/wiki/concepts/ai-harness-fixcity-discipline.md
  - ../../../laravel/Modules/User/docs/wiki/concepts/ai-harness-user-discipline.md
  - ../../../laravel/Modules/Geo/docs/wiki/concepts/ai-harness-geo-discipline.md
  - ../../../laravel/Modules/docs/wiki/concepts/ai-harness-module-discipline.md
  - ../../../laravel/Themes/docs/wiki/concepts/ai-harness-theme-discipline.md
---

# HackerNoon AI Coding Tips 001-022 → Fixcity Map

> **Autore:** Maxi Contieri @mcsee
> **Serie:** https://hackernoon.com/tagged/ai-coding
> **Adattamento:** FixCity codebase (BMAD v6 + Laraxot + Filament)

## Matrice di adattamento

| # | Tip | TL;DR | Applicazione FixCity |
|---|-----|-------|---------------------|
| 001 | Commit before prompt | Checkpoint git prima del prompt AI | Scope isolato: commit esplicito utente **oppure** patch forward-only su file owner; **no** `stash`/`reset` senza ordine ([git-forward-only](../rules/git-forward-only.md)) |
| 002 | Speak the model's native tongue | Prompt tecnico in inglese per codice | Identificatori/API in inglese; risposta utente italiano conciso (`AGENTS.md`) |
| 003 | Force read-only planning | Fase studio → piano → act | Task rischiosi: QMD + wiki prima di edit; poi implementa salvo ambiguità reale (`llm-wiki.txt` §2) |
| 004 | Use modular skills | Skills 20-50 righe con trigger | Già implementato: `docs/wiki/rules/00-TRIGGER_MAP.md` + `.opencode/skills/*/SKILL.md` |
| 005 | Keep context fresh | Nuova chat per micro-task | `docs/chat/<slug>.md` per ogni task. `acm_compact`/`qmd --limit 5` |
| 006 | Review every line | Self-review prima di chiudere | Diff riga-per-riga; PHPStan L10; workslop = Code Smell 313; CL piccole ([Google review](https://google.github.io/eng-practices/review/)) |
| 007 | Protect from malicious skills | Sandbox skills, mai eseguire setup cieco | Skills solo da fork fidato (`laraxot`). Code review prima di attivare |
| 008 | Spec-driven development | Allineamento su spec prima del codice | BMAD story + dev story = spec obbligatoria (`docs/stories/STORY-*.md`) |
| 009 | Compact your context | Riassumi e pota il contesto | `bashscripts/docs/llm-wiki-qmd.sh search "<topic>" -n 5 --files` sempre |
| 010 | Access all your code | Dai visibilità piena all'AI | `qmd`, `glob`, `grep` per esplorare codebase. Mai nascondere file all'agente |
| 011 | Initialize AGENTS.md | Stub on-demand per ogni tool | `AGENTS.md` ≤50 righe + `docs/wiki/rules/00-TRIGGER_MAP.md` per il dettaglio |
| 012 | Understand your code | Non mergiare ciò che non capisci | Tip 021 (comprehension debt). Ogni PR deve essere comprensibile |
| 013 | Progressive disclosure | Carica solo ciò che serve | Trigger map + on-demand: no dump di interi wiki in contesto |
| 014 | One AGENTS.md hurts | Split in file specializzati | `docs/wiki/` + `.opencode/skills/` + `.cursor/rules/` — mai un monolite |
| 015 | Force the AI to obey | Regole hard esplicite | §0 in `llm-wiki.txt` + religioni in `docs/wiki/bmad/architecture.md` |
| 016 | PRs teach next agent | PR strutturate come artefatti di apprendimento | Issue/Discussion su ogni repo coinvolto. Commit semantici |
| 017 | Ask for the analyst | Processo, non risultato | `/bmad:architecture` = analisi prima; grep/audit script invece di dump chat |
| 018 | Dictate prompts | Template predefiniti | Template in `docs/wiki/how-to/` e skills |
| 019 | Tell the AI why | Contesto prima del comando | Frontmatter YAML + `related:` + spiegazione del perché |
| 020 | Create a second brain | Obsidian + YAML + QMD = memoria persistente | `docs/wiki/` + `docs/chat/` + `qmd serve` = second brain FixCity |
| 021 | Comprehension debt | Mergiare codice sconosciuto = debito cognitivo | Workslop = Code Smell 313. Batch review obbligatoria |
| 022 | Give AI a harness | Struttura operativa per l'agente | `.opencode/rules/`, `bashscripts/quality-gates/`, `docs/wiki/rules/`, MCP stack |

## Code smell / code review extra

| Risorsa | Applicazione |
|---------|-------------|
| [Code Smell 313 — Workslop](https://hackernoon.com/code-smell-313-workslop-in-ai-assisted-programming) | Vietato generare codice non compreso. Ogni riga va capita e revisionata |
| [Code Smell 300 — Package hallucination](https://hackernoon.com/code-smell-300-package-hallucination) | `composer require` e `npm install` solo dopo verifica esistenza pacchetto |
| [State of AI vs Human Code Gen](https://www.coderabbit.ai/blog/state-of-ai-vs-human-code-generation-report) | AI genera 2x codice ma con più bug. Review umana obbligatoria |
| [Productivity Paradox](https://medium.com/@mozaman/the-productivity-paradox-of-ai-why-commits-and-prs-dont-tell-the-story-ceb68a453f54) | Metriche quantitative ingannevoli. Conta la qualità architetturale |
| [Google Code Review](https://google.github.io/eng-practices/review/) | CL < 200 righe. Reviewer = gatekeeper qualità |
| [Atlassian Code Review](https://www.atlassian.com/agile/software-development/code-reviews) | Review = conoscenza condivisa, non caccia ai bug |
| [Pragmatic Programmer](https://pragprog.com/titles/tpp20/the-pragmatic-programmer-20th-anniversary-edition/) | DRY, orthogonality, reversible decisions |
| [IEEE 1028-2008](https://standards.ieee.org/standard/1028-2008.html) | Standard formale per review tecniche |
| [Fowler Code Review](https://martinfowler.com/articles/code-review.html) | Review = dialogo, non ispezione |
| [O'Reilly Perform Code Reviews](https://learning.oreilly.com/library/view/perform-code-reviews/9781098172657/ch01.html) | Review strutturate come pratica quotidiana |

## Principi trasversali FixCity

1. **Commit-before-prompt** (Tip 001): checkpoint git o scope isolato — mai stash/reset impliciti
2. **Read-only planning** (Tip 003): analisi → piano breve → act (salvo ambiguità)
3. **Modular skills** (Tip 004): skill ≤50 righe con trigger map
4. **Fresh context** (Tip 005): nuova chat per micro-task, persistenza via `docs/chat/`
5. **Review-mandatory** (Tip 006 + 021): workslop vietato, ogni riga revisionata
6. **Spec-driven** (Tip 008): BMAD story + dev story prima del codice
7. **Progressive disclosure** (Tip 013): trigger map + QMD --limit 5
8. **Second brain** (Tip 020): LLM Wiki + QMD + Obsidian
9. **AI harness** (Tip 022): rules, quality-gates, MCP come gabbia operativa
10. **Tell the AI why** (Tip 019): frontmatter YAML + contesto nella richiesta

## Harness per owner (wiki locale)

| Owner | Pagina |
|-------|--------|
| Tutti i moduli | [ai-harness-module-discipline.md](../../../laravel/Modules/docs/wiki/concepts/ai-harness-module-discipline.md) |
| Tutti i temi | [ai-harness-theme-discipline.md](../../../laravel/Themes/docs/wiki/concepts/ai-harness-theme-discipline.md) |
| Xot (canon) | [ai-harness-xot-discipline.md](../../../laravel/Modules/Xot/docs/wiki/concepts/ai-harness-xot-discipline.md) · [second-brain-local-discipline.md](../../../laravel/Modules/Xot/docs/wiki/concepts/second-brain-local-discipline.md) |
| Fixcity | [ai-harness-fixcity-discipline.md](../../../laravel/Modules/Fixcity/docs/wiki/concepts/ai-harness-fixcity-discipline.md) |
| User | [ai-harness-user-discipline.md](../../../laravel/Modules/User/docs/wiki/concepts/ai-harness-user-discipline.md) |
| Geo | [ai-harness-geo-discipline.md](../../../laravel/Modules/Geo/docs/wiki/concepts/ai-harness-geo-discipline.md) |
| Sixteen | [ai-harness-theme-sixteen.md](../../../laravel/Themes/Sixteen/docs/wiki/concepts/ai-harness-theme-sixteen.md) |

## Bibliografia (fonti studiate)

Serie HackerNoon @mcsee — [tag ai-coding](https://hackernoon.com/tagged/ai-coding):

| # | URL |
|---|-----|
| 001 | https://hackernoon.com/ai-coding-tip-001-commit-your-code-before-asking-for-help-from-an-ai-assistant |
| 002 | https://hackernoon.com/ai-coding-tip-002-speak-the-models-native-tongue |
| 003 | https://hackernoon.com/ai-coding-tip-003-force-read-only-planning |
| 004 | https://hackernoon.com/ai-coding-tip-004-why-you-should-use-modular-skills |
| 005 | https://hackernoon.com/ai-coding-tip-005-how-to-keep-context-fresh |
| 006 | https://hackernoon.com/ai-coding-tip-006-review-every-line-before-commit |
| 007 | https://hackernoon.com/ai-coding-tip-007-protect-your-ai-agents-from-malicious-skills |
| 008 | https://hackernoon.com/ai-coding-tip-008-how-to-use-spec-driven-development-with-ai |
| 009 | https://hackernoon.com/ai-coding-tip-009-compact-your-context-and-stop-memory-rot |
| 010 | https://hackernoon.com/ai-coding-tip-010-access-all-your-code |
| 011 | https://hackernoon.com/ai-coding-tip-011-how-to-initialize-agentsmd |
| 012 | https://hackernoon.com/ai-coding-tip-012-understand-all-your-code |
| 013 | https://hackernoon.com/ai-coding-tip-013-stop-wasting-tokens-with-progressive-disclosure |
| 014 | https://hackernoon.com/ai-coding-tip-014-one-agentsmd-is-hurting-your-ai-coding-assistant |
| 015 | https://hackernoon.com/ai-coding-tip-015-force-the-ai-to-obey-you |
| 016 | https://hackernoon.com/ai-coding-tip-016-your-pull-requests-should-teach-your-next-ai-agent |
| 017 | https://hackernoon.com/ai-coding-tip-017-ask-for-the-analyst-not-the-analysis |
| 018 | https://hackernoon.com/ai-coding-tip-018-dictate-your-prompts-instead-of-typing-them |
| 019 | https://hackernoon.com/ai-coding-tip-019-tell-the-ai-why-not-just-what |
| 020 | https://hackernoon.com/ai-coding-tip-020-create-a-second-brain |
| 021 | https://hackernoon.com/ai-coding-tip-021-merging-code-you-dont-understand-creates-comprehension-debt |
| 022 | https://hackernoon.com/ai-coding-tip-022-give-ai-a-harness-to-work-with |

Code smell / review: [313 workslop](https://hackernoon.com/code-smell-313-workslop-in-ai-assisted-programming), [300 package hallucination](https://hackernoon.com/code-smell-300-package-hallucination), [stinky code](https://hackernoon.com/how-to-find-the-stinky-parts-of-your-code-part-xxxviii), [Fowler](https://martinfowler.com/articles/code-review.html), [Google](https://google.github.io/eng-practices/review/), [Atlassian](https://www.atlassian.com/agile/software-development/code-reviews), [IEEE 1028](https://standards.ieee.org/standard/1028-2008.html), [Pragmatic Programmer](https://pragprog.com/titles/tpp20/the-pragmatic-programmer-20th-anniversary-edition/), [CodeRabbit report](https://www.coderabbit.ai/blog/state-of-ai-vs-human-code-generation-report), [productivity paradox](https://medium.com/@mozaman/the-productivity-paradox-of-ai-why-commits-and-prs-dont-tell-the-story-ceb68a453f54).
