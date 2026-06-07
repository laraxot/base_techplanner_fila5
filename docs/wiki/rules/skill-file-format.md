# Skill File Format Rule

## YAML Frontmatter Required

**REGOLA**: Tutti i file `SKILL.md` DEVONO avere YAML frontmatter delimitato da `---`

## Formato Corretto

```markdown
---
name: skill-name
description: Brief description of the skill (single line or multiline)
---

# Skill Name

## Content here...
```

## Esempi

### ✅ CORRETTO - Single Line Description
```markdown
---
name: translation-management
description: Manage Laravel module translation files following Laraxot/Xot conventions and validate structure.
---

# Translation Management Skill
```

### ✅ CORRETTO - Multiline Description
```markdown
---
name: complex-skill
description: >
  Long description that spans
  multiple lines using YAML
  multiline syntax.
---

# Complex Skill
```

### ❌ WRONG - Missing Frontmatter
```markdown
# Skill Name

## Content without frontmatter
```

### ❌ WRONG - Missing Closing ---
```markdown
---
name: skill-name
description: Description

# Skill Name (missing closing ---)
```

## Validazione

```bash
# Verifica che tutti i SKILL.md abbiano frontmatter
find . -name "SKILL.md" -type f -exec sh -c '
  if ! head -1 "$1" | grep -q "^---$"; then
    echo "Missing frontmatter: $1"
  fi
' _ {} \;

# Verifica formato completo
for file in $(find . -name "SKILL.md" -type f); do
  if ! grep -q "^---$" "$file" | head -1 && grep -q "^---$" "$file" | head -6; then
    echo "Invalid format: $file"
  fi
done
```

## Campi Obbligatori

1. **name**: Nome dello skill (kebab-case)
2. **description**: Descrizione breve (1-3 righe)

## Campi Opzionali

- **version**: Versione dello skill
- **author**: Autore
- **tags**: Array di tag

## Related

- `.opencode/skills/*/SKILL.md` (formato simile)
- GitHub Issue: #20
