---
title: "Gitmodules multi-repo sync coordination"
type: coordination
tags: [git, submodules, sync, multi-agent, quality]
created: 2026-07-16
updated: 2026-07-24
issues:
  - "https://github.com/laraxot/base_techplanner_fila5/issues/42"
discussions:
  - "https://github.com/laraxot/base_techplanner_fila5/discussions/43"
related:
  - ../../bashscripts/tools/prompts/17-gitmodules-path-iteration.md
  - ./handoff-prompts-nn-unique-merge.md
---

# Gitmodules multi-repo sync coordination

## Protocollo

- Ordine estratto casualmente da `gitmodules.ini` (prompt [17](../../bashscripts/tools/prompts/17-gitmodules-path-iteration.md)).
- Un solo owner per path; nessuna modifica a file già sporchi senza attribuzione.
- Sync forward-only; collisioni studiate tramite history e consumer prima della patch.
- Prima di lasciare un path: gate disponibili PHPStan, PHPMD, PHPInsights, Pest e Puppeteer.
- Report degli agenti in append sotto, con remote, branch, esito sync e gate.

## Assegnazioni

- Agent A: User, Gdpr, TechPlanner, Lang, Job, Notify.
- Agent B: Activity, Employee, UI, Two, Geo, Cms.
- Agent C: Xot, Tenant, Sixteen, Zero, Media.
- Root: bashscripts e verifica aggregata `laravel/Modules`.

## Report

### 2026-07-24 — Agent Composer (seed `20260724`)

| Path | Branch | Dirty | Ahead/Behind | Marker PHP | Note |
|------|--------|-------|--------------|------------|------|
| Tutti i 20 path | `dev` | 0 | vedi sotto | Modules+Themes **0** | Audit completo |
| Seo | `dev` | 0→fix | 0/0 | **risolti 7 file** | Canone `MetatagFacadeAdapter` |
| TechPlanner | `dev` | 0 | era `-/-` → upstream `laraxot/dev` | 0 | Doc `independent-repo-upstream.md` |
| Gdpr, UI | `dev` | 0 | ahead 1 | 0 | Push remoto non fatto (no rete / no richiesta) |
| Fetch GitHub | — | — | — | — | DNS/sandbox: fetch fallito |

Blocco Pest/PHPStan Seo: bootstrap Tenant → `Modules/Blog/Article` mancante (preesistente).

Prompt 17 riscritto v2 (DRY, anti-duplicazione, link parser/script).

