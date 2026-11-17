<<<<<<< HEAD
---
title: "Changelog - Modulo Notify"
type: note
status: draft
updated: 2026-10-21
tags: [docs, notify, bmad]
qmd: "changelog - modulo notify notify"
---
=======
>>>>>>> laraxot/dev
# Changelog - Modulo Notify

Tutte le modifiche significative al modulo Notify saranno documentate in questo file.

## [2025-06-04] - Fix PSR-4 Autoloading

### Fixed
- **SendScheduledPushNotification.php**: Corretto import con namespace errato
  - Prima: `use Modules\Notify\App\Services\PushNotificationService;`
  - Dopo: `use Modules\Notify\Services\PushNotificationService;`
<<<<<<< HEAD
  - Dettagli: [psr4-namespace-fix.md](../psr4-namespace-fix.md)
=======
  - Dettagli: [psr4-namespace-fix.md](./psr4-namespace-fix.md)
>>>>>>> laraxot/dev

### Documentation
- Aggiunta guida PSR-4 compliance per il modulo
- Regola Laraxot: MAI usare `\App\` nei namespace moduli

---

## Convenzioni

- Namespace modulo: `Modules\Notify\{Subdirectory}`
- NO: `Modules\Notify\App\{Subdirectory}`
- Cartella `app/` è organizzativa, non parte del namespace

