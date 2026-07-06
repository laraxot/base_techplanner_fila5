---
title: "Module Root Cleanup Rules"
type: rule
tags: [module, structure, cleanup, naming]
created: 2026-01-21
updated: 2026-07-06
qmd: module root no txt files no uppercase folders only readme nwidart sacred manifest never delete
issues:
  - "https://github.com/laraxot/base_techplanner_fila5/issues/39"
discussions:
  - "https://github.com/laraxot/base_techplanner_fila5/discussions/12"
related:
  - ../../../../../../docs/wiki/rules/module-root-cleanup-rules.md
  - ../../../../../../docs/wiki/concepts/nwidart-module-skeleton-contract.md
  - ../../../../../../docs/wiki/memories/nwidart-sacred-manifests-incident.md
---

# Module Root Cleanup Rules

## Regole obbligatorie per la root dei moduli

### File .txt
- **VIETATO**: Nessun file `.txt` nella root del modulo
- Tutti i file `.txt` devono essere rimossi o convertiti in `.md` e spostati in `docs/`

### File .md
- **OBBLIGATORIO**: Solo `README.md` nella root del modulo
- Tutti gli altri file `.md` devono essere:
  1. Studiati e valutati
  2. Sistematizzati (aggiunto frontmatter se necessario)
  3. Spostati in `docs/` (preferibilmente `docs/wiki/` per documentazione conoscenza)

### Cartelle con caratteri maiuscoli
- **VIETATO**: Nessuna cartella con caratteri maiuscoli nella root del modulo
- Tutte le cartelle devono essere lowercase con underscore o dash (es. `app/`, `database/`, `config/`)
- Cartelle con maiuscole devono essere eliminate o rinominate in lowercase

## Mai toccare (nwidart)

`composer.json`, `module.json`, `package.json`, `vite.config.js`, `.github/` — vedi [nwidart-module-skeleton-contract.md](../../../../../../docs/wiki/concepts/nwidart-module-skeleton-contract.md).

```bash
bash bashscripts/tools/guard-nwidart-module-skeleton.sh
bash bashscripts/tools/audit-module-sacred-artifacts.sh
```

## Azione di cleanup

Per ogni modulo:

```bash
cd Modules/<Modulo>

# 1. Trova file .txt nella root
find . -maxdepth 1 -name "*.txt" -type f

# 2. Trova file .md nella root (escluso README.md)
find . -maxdepth 1 -name "*.md" -type f | grep -v README.md

# 3. Trova cartelle con maiuscoli nella root
find . -maxdepth 1 -type d | grep -E "[A-Z]"
```

## Stato Xot 2026-07-06

Le cartelle `Datas/`, `_docs/`, `claude-code-bmad-skills/`, `Filament/`, `Providers/` non esistono nella root di `Modules/Xot`. La root Xot contiene solo `README.md` come markdown e nessun `.txt`.

## Canon

- Questa regola deve essere applicata a tutti i moduli
- Check periodico prima di commit
