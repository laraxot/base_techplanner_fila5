---
title: "Trigger map"
type: rule
tags: [rules, trigger-map, agent]
created: 2026-06-06
updated: 2026-06-06
qmd: "trigger map agent rules laravel runtime bootstrap"
issues:
  - "https://github.com/laraxot/base_techplanner_fila5/issues/21"
discussions:
  - "https://github.com/laraxot/base_techplanner_fila5/discussions/19"
---

# Trigger map

- Runtime 500 before page render: use [runtime bootstrap failure prevention](../concepts/runtime-bootstrap-failure-prevention.md).
- Missing view under `pub_theme`: inspect tenant theme resolution and clear compiled views.
- GitHub CI failure: inspect Action logs before editing.
- Wiki/documentation edit: include YAML frontmatter with issue and discussion links.
