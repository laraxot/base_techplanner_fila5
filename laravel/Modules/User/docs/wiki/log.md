---
title: "User wiki log"
type: log
tags: [user, teams, traits, spatie-permission]
created: 2026-06-06
updated: 2026-06-06
qmd: "user baseuser teams trait collision spatie permission laraxot"
issues:
  - "https://github.com/laraxot/base_techplanner_fila5/issues/21"
discussions:
  - "https://github.com/laraxot/base_techplanner_fila5/discussions/19"
---

# User wiki log

## 2026-06-06

- Resolved `BaseUser::teams()` trait collision explicitly: Laraxot `HasTeams::teams()` wins, Spatie permission teams remains available as `permissionTeams()`.
- Rule: when two imported traits define the same public method, resolve with `insteadof` and keep an alias only when the losing method still has domain value.
