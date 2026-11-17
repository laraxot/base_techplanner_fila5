---
<<<<<<< HEAD
title: "Notify: BMAD dossier"
=======
title: "Notify — BMAD dossier"
>>>>>>> laraxot/dev
type: bmad-dossier
module: Notify
updated: 2026-10-07
tags: [bmad, notify, delivery]
qmd: "Notify module product brief PRD architecture UX security epics gaps release"
issues: ["https://github.com/laraxot/base_fixcity_fila5/issues/383"]
discussions: ["https://github.com/laraxot/base_fixcity_fila5/discussions/392"]
<<<<<<< HEAD
status: draft
---
# Notify: BMAD dossier
=======
---
# Notify — BMAD dossier
>>>>>>> laraxot/dev
## Product brief / PRD
Deliver preference-aware mail/SMS/WhatsApp/Telegram/FCM messages with observable outcomes.
## Architecture / UX / security
Channel adapters consume common intent; Job dispatches after commit; secrets and verified destinations stay outside docs/logs.
## Epics and stories
Channel contract; templates/preferences; retry/failure/monitoring.
## Gaps / release
Worker/SMTP sandbox, failed jobs, push tokens, idempotency and provider fallback are not candidate-verified.
