---
title: "Seo — coverage e gate"
type: report
updated: 2026-10-01
sources:
  - "../../Xot/docs/bmad/stories/5.258-prompts-execute-improve.story.md"
---

# Seo — coverage e gate

| Data | PHPStan (level max) | Pest | Coverage `app/` | phpmd | Fonte |
|---|---|---|---|---|---|
| 2026-10-01 00:40 | 19 errori | 47/47 | non misurato | 0 | baseline story 5.258 |
| 2026-10-01 10:50 | **0** | 47/47 (142 asserzioni) | **79,1 %** | 0 | G07 story 5.258 (prompt 03/11) |

Comandi (da `laravel/`): vedi `AGENTS.md` in root, sezione Comandi. Coverage:
`XDEBUG_MODE=coverage ./vendor/bin/pest --test-directory=Modules/Seo/tests Modules/Seo/tests --coverage --coverage-filter=Modules/Seo/app`
