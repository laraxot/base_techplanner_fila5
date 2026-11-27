---
title: "ADR del tema Barthelemy"
type: index
tags: [adr, decisioni, barthelemy]
created: 2026-11-24
updated: 2026-11-24
---

# ADR del tema Barthelemy

Barthelemy e' uno **stub**: `theme.json` lo dichiara `active: false` e il pacchetto contiene solo configurazioni di build
(`package.json`, `vite.config.js`, `tailwind.config.js`) e documentazione; nessuna vista, nessun codice PHP. L'unica
decisione registrata e' che il tema resta inattivo finche' non c'e' un requisito reale (ADR 0001); le prossime scelte
difficili da invertire (a quale tipo di sito serve, da quale tema parte, come si serve la build) meritano un ADR ciascuna.

**Quando scriverne uno:** alla prima decisione reale (a quale tipo di sito serve, da quale tema parte, come si serve la
build). Formato: [regola del canon](../../../../Modules/Xot/docs/rules/action-behavioral-contract.md). Finche' il tema e'
vuoto, le decisioni valide per tutti i temi sono negli ADR di Xot (es. asset via symlink
`public_html/themes/<Tema>`, `Modules/Xot/docs/wiki/rules/theme-public-symlink.md`).

## Decisioni

- [0001 — Barthelemy resta uno stub inattivo](0001-barthelemy-remains-inactive-stub.md): il tema resta `active: false` finche' non esiste un requisito concreto e un'architettura di presentazione approvata.

L'indice completo e' in [index.md](index.md).

## Harness minimo: ownership, evidenza e recupero (2026-11-27)

Questo indice appartiene a **theme_barthelemy_fila5**: ogni decisione su codice, dominio o tema va nell'ADR del package owner; il root registra soltanto i vincoli di composizione. Un ADR richiede una scelta reale con alternative e conseguenze, più una **Conferma** ripetibile (oppure la dichiarazione esplicita che manca). Non creare ADR fittizi per riempire un indice.

- [Confine LaravelDay/harness Xot](https://github.com/laraxot/module_xot_fila5/blob/dev/docs/adr/0042-laravel-day-harness-adoption-boundary.md); [ownership root](https://github.com/laraxot/base_ptvx_fila5/blob/dev/docs/adr/0001-harness-minimo-e-ownership.md).
- **BMAD**: la story owner-local conserva `scope`, `must_not_change`, `evidence`, `approval_required` nei cambi rischiosi.
- **ECC**: nessun marker di merge; distinguere la prova eseguita dal semplice riferimento a un test; se la conferma non è disponibile segnare `non eseguita`.
- **Second Brain**: QMD/Graphify e `.harness/memory/{facts,lessons}.md` sono puntatori a evidenza datata, non copie degli ADR. [Runbook](https://github.com/laraxot/base_ptvx_fila5/blob/dev/docs/harness/README.md) · [Rollout #15](https://github.com/laraxot/base_ptvx_fila5/issues/15).
