---
tags: [documentation]
created: 2026-09-26
updated: 2026-09-26
qmd: "livewire widget architecture"
issues: []
discussions: []
<<<<<<< HEAD
title: "Architecture: Notify"
=======
title: "Architecture — Notify"
>>>>>>> laraxot/dev
type: architecture
module: Notify
related:
  - ./livewire-inventory.md
  - ./livewire-widget-prd.md
<<<<<<< HEAD
status: draft
=======
>>>>>>> laraxot/dev
---

# Architecture Notify

```
XotData.disable_database_notifications (default true, XotData.php:61)
  └─ false → trigger + polling(60s) + hook panels::user-menu.before
                 └─ @livewire(Filament\Notifications\Livewire\DatabaseNotifications::class)
                      (già FQCN in AdminPanelProvider.php:37)
```

<<<<<<< HEAD
ADR: vendor resta vendor. Il riferimento è **già** tipizzato: nessun PHP da toccare. Verdetto: [livewire-inventory.md](./livewire-inventory.md).
=======
ADR: vendor resta vendor. Il riferimento è **già** tipizzato — nessun PHP da toccare. Verdetto: [livewire-inventory.md](./livewire-inventory.md).
>>>>>>> laraxot/dev
