## [2026-06-06] migrate | activity_log causer_id index idempotente

- Fix: `2024_01_01_000002_create_activity_table.php` — no re-create index se già presente
- GitHub: [#21](https://github.com/laraxot/base_techplanner_fila5/issues/21) · handoff: [docs/chat/handoff-artisan-migrate-2026-06-06.md](../../../../../docs/chat/handoff-artisan-migrate-2026-06-06.md)

## [2026-06-06] composer | spatie/laravel-activitylog owner Activity — verifica BMAD

- Require in `Modules/Activity/composer.json`; **assente** da root
- Canon: [spatie-activitylog-module-dependency.md](concepts/spatie-activitylog-module-dependency.md)
- Guard: `bashscripts/tools/check-composer-module-dependency-owners.sh`

## [2026-06-05] docs | HackerNoon harness — tips 001-022 in wiki locale

- Stub/checklist: second-brain → canon Xot, ai-harness, [hackernoon map](../../../../../docs/wiki/concepts/hackernoon-ai-coding-tips-fixcity-map.md), [llm-wiki.txt](../../../../../bashscripts/tools/prompts/llm-wiki.txt)
- GitHub: [#272](https://github.com/laraxot/base_fixcity_fila5/issues/272) / [D#273](https://github.com/laraxot/base_fixcity_fila5/discussions/273)

---
title: "Activity Log"
module: "Activity"
---

# Activity Log — Activity

> **Purpose:** Append-only chronological activity record tracking ingests, queries, and lint passes.

## Log Entries

### Format

```text
[YYYY-MM-DD HH:MM:SS UTC] [OPERATION] Description
```

**Operations:**

- `INGEST` — Added raw document to wiki
- `QUERY` — Answered question from wiki
- `LINT` — Maintained wiki quality
- `UPDATE` — Modified existing wiki page

---

[2026-05-12 08:19:00 UTC] [UPDATE] Aggiornati `index.md`, `rules/INDEX.md` e `skills/INDEX.md` per esporre davvero pattern XotBase, sorgenti core e skill condivise caricabili on-demand.

**Last Activity:** 2026-05-12 08:19:00 UTC  
**Total Operations:** 1
