---
qmd: "qmd setup"
issues: []
discussions: []
<<<<<<< HEAD
title: "QMD Setup: Module Notify"
=======
title: "QMD Setup — Module Notify"
>>>>>>> laraxot/dev
type: documentation
created: 2026-05-11
updated: 2026-05-11
tags: [qmd, search, docs, performance]
related:
  - ../../docs/wiki/concepts/llm-wiki-operational-discipline.md
<<<<<<< HEAD
  - ../../../../docs/wiki/concepts/llm-wiki-operational-discipline.md
status: draft
=======
>>>>>>> laraxot/dev
---

# QMD Setup per Module **Notify**

## Configurazione QMD per Questo Module

### Collection Configuration

Il progetto usa una collection QMD centralizzata in `.qmd/index.yml` che include tutti i moduli.

### Ricerca Locale vs Globale

**Ricerca locale** (solo questo modulo):
\`\`\`bash
qmd search "<topic>" -c notify
# Cerca solo in ./laravel/Modules/Notify/docs/wiki/
\`\`\`

**Ricerca globale** (tutto il progetto):
\`\`\`bash
qmd search "<topic>"
# Cerca in docs/wiki/ + tutti i moduli
\`\`\`

### Cache Location

- **Cache path**: ${HOME}/.cache/qmd-cache/
<<<<<<< HEAD
- **Fuori dal repo**: ✅ OK: non committata
=======
- **Fuori dal repo**: ✅ OK — non committata
>>>>>>> laraxot/dev
- **Pulizia cache**: `rm -rf ~/.cache/qmd-cache/`

### Performance Tips

1. **Rebuild index dopo modifiche**:
\`\`\`bash
qmd index rebuild --force
\`\`\`

2. **Usa -c per limitare scope**:
\`\`\`bash
qmd search "form" -c notify  # Solo questo modulo
\`\`\`

<<<<<<< HEAD
3. **Evita query troppo generiche**: più specifico = risultati migliori
=======
3. **Evita query troppo generiche** — più specifico = risultati migliori
>>>>>>> laraxot/dev

## Integrazione con l'On-Demand Pattern

## Troubleshooting

| Problema | Soluzione |
|----------|-----------|
| Risultati non aggiornati | `qmd index rebuild --force` |
| Ricerca lenta | Limita con `-c notify` |
| Cache corrotta | `rm -rf ~/.cache/qmd-cache/` |

## Riferimenti

- [Global QMD Config](../qmd.md) (root docs)
- [Operational Discipline](../../docs/wiki/concepts/llm-wiki-operational-discipline.md)
<<<<<<< HEAD
- [Operational Discipline](../../../../docs/wiki/concepts/llm-wiki-operational-discipline.md)
=======
>>>>>>> laraxot/dev
- [On-Demand Pattern](./ON-DEMAND-PATTERN.md)

---
*Cache: ~/.cache/qmd-cache/ | Index: ~/.cache/qmd-cache/index*
