---
title: "gemini translation rules"
type: note
tags: [documentation]
created: 2026-09-26
updated: 2026-11-23
qmd: "gemini translation rules"
issues: []
discussions: []
---

# GEMINI Translation Rules

Regole gestione traduzioni.

## Regola Critica
### Chiavi Obbligatorie
### Esempio
### Perché Queste Chiavi?
### Rischio

## Translation Pattern

Tutte le traduzioni DEVONO avere **5 livelli**:

```
namespace::context.collection.element.type
```

### Esempio

```blade
✅ __('predict::home.hero.cta_learn.label')
❌ __('predict::fields.key')  // Missing type!
✅ __('forecast::home.hero.cta_learn.label')
❌ __('forecast::fields.key')  // Missing type!
```

### Eccezione

`predict::messages.*` - valore diretto, NO `.label`
`forecast::messages.*` - valore diretto, NO `.label`

---

## 🔗 Link

- [Indice GEMINI](./gemini-split-index.md)
- [translation-management skill available](../../.opencode/skills/translation-management/skill.md)
- [GEMINI.md originale](../../gemini.md)
- [Index principale](./index.md)
