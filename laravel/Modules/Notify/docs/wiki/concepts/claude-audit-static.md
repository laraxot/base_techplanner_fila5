---
<<<<<<< HEAD
title: "claude-audit static: modulo Notify"
=======
title: "claude-audit static — modulo Notify"
>>>>>>> laraxot/dev
type: concept
module: Notify
tags: [notify, quality, claude-audit, actions]
created: 2026-07-09
updated: 2026-07-12
qmd: "Notify claude-audit static 80 SendPushNotificationAction no app Support"
issues:
discussions:
related:
  - "./code-redundancy-notify.md"
  - "./composer-root-minimal-nwidart.md"
  - "./context-overflow-prevention.md"
  - "./enum-standards.md"
  - "./llm-wiki-governance.md"
  - "./method-name-homonyms.md"
  - "./module-root-uppercase-folders-archive.md"
  - "./no-app-support-queueable-actions.md"
<<<<<<< HEAD
status: draft
=======
>>>>>>> laraxot/dev
---

# claude-audit static (Notify)

## Comando

```bash
bash bashscripts/tools/run-claude-audit-module-static.sh Notify
```

## Fix applicati (80/0)

- `PushNotificationService` → `SendPushNotificationAction` + `PushNotificationPlatformDelivery` (da `app/Support/` eliminato → `app/Actions/`)
- Test model >500 LOC → split su confine `test()` (`split-notify-large-tests.py`)
<<<<<<< HEAD
- Lang `test_smtp.php`: header commenti ≥5%
=======
- Lang `test_smtp.php` — header commenti ≥5%
>>>>>>> laraxot/dev

## Report

`Modules/Notify/.claude-audit/audit-report.html`
