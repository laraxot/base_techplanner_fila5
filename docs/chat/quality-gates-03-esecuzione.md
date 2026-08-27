---
title: "Esecuzione quality gates 03 — Composer"
type: handoff
status: in-progress
updated: 2026-08-27
related:
  - ../wiki/rules/post-edit-quality-gate.md
  - ../../bashscripts/docs/prompts/03-quality-gates.md
  - ../../laravel/Modules/Xot/docs/stories/5.43.phpstan-modules-bootstrap-and-ide-helper.story.md
---

# Quality gates 03 — sessione Composer

## Scope

- Migliorare `bashscripts/docs/prompts/03-quality-gates.md` (v3.19)
- Eseguire sequenza Pint → PHPStan → Pest → PHPMD → Insights → ide-helper

## Lock

Al bootstrap il file era lockato da `qwen-qg-*` (task gemello). Agente Composer attende age≥10m o unlock, poi applica patch.

## Note neon (stato reale 2026-08-27)

- `excludePaths: ./*/tests/*` è **commentato** → `analyse Modules` include i test
- Extension Pest: `Modules/Xot/phpstan/pest-internal-ignore.neon` (XOT-5.43) — verificare include in `phpstan.neon`
