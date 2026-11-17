---
<<<<<<< HEAD
title: "Notify Module: Document"
=======
title: "Notify Module — Document"
>>>>>>> laraxot/dev
type: docs/bmad
status: active
module: Notify
scope: documentation
bmad_version: 1.0
updated: 2026-10-06
<<<<<<< HEAD
tags: [docs, notify, wiki]
qmd: "notifica   fix blade preview (scopo: anteprima mail notifica) notify"
---

# Notifica: Fix Blade preview (scopo: anteprima mail notifica)
=======
---

# Notifica — Fix Blade preview (scopo: anteprima mail notifica)
>>>>>>> laraxot/dev
- Funzionalità: preview HTML/Text della mail notifica (`preview-mail-template.blade.php`).
- Errore: residuo `{cat << 'EOF' ...` (tentativo generazione logo.svg inline).
- Correzione: rimosso residuo, ripristinato `{!! $this->record->body_html !!}`.
- Lezione (BMAD): mai mescolare generazione shell (cat <<) con Blade.
