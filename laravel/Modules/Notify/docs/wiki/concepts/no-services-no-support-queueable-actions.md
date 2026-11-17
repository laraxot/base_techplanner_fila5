---
issues: []
discussions: []
<<<<<<< HEAD
title: "No Services / No Support: QueueableAction only"
=======
title: "No Services / No Support — QueueableAction only"
>>>>>>> laraxot/dev
type: concept
module: Notify
tags: [notify, services, support, actions, queueable-action, migration]
created: 2026-07-13
updated: 2026-07-13
qmd: "Notify module Services and Support banned use app Actions QueueableAction policy"
related:
  - "./claude-audit-static.md"
  - "./code-redundancy-notify.md"
  - "./composer-root-minimal-nwidart.md"
  - "./context-overflow-prevention.md"
  - "./enum-standards.md"
  - "./llm-wiki-governance.md"
  - "./method-name-homonyms.md"
  - "./module-root-uppercase-folders-archive.md"
<<<<<<< HEAD
status: draft
---

# Notify: Services/Support vietati: solo Actions
=======
---

# Notify — Services/Support vietati: solo Actions
>>>>>>> laraxot/dev

## Regola

- **Mai** creare file in `app/Services/` o `app/Support/`
- **Sempre** `app/Actions/{Contexto}/FooAction.php`
- **Trait**: `use Spatie\QueueableAction\QueueableAction;`
- **Entrypoint**: unico metodo `execute(...)`
- **Chiamata**: `app(FooAction::class)->execute(...)`
- **Gruppi**: sottocartelle per attore/contesto (es. `Actions/Mail/`, `Actions/PushNotification/`)

## Conversione

Vedi [notify-services-support-to-actions.md](notify-services-support-to-actions.md) per mapping dettagliato.
