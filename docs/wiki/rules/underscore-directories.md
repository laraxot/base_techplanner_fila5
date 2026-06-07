# Rule: Underscore Directories

## Quick Reference

**REGOLA**: Mai tracciare cartelle con `_` iniziale in Git

## Checklist

- [ ] Verificare assenza cartelle `_docs/`, `_temp/`, `_backup/`
- [ ] Aggiungere `_docs/` a `.gitignore` di ogni modulo
- [ ] Usare `docs/` per documentazione ufficiale
- [ ] Eseguire cleanup se trovate cartelle temporanee

## Commands

```bash
# Find all _directories
find laravel -type d -name "_*"

# Add to .gitignore
find laravel/Modules -name ".gitignore" -exec sh -c 'echo "_docs/\n_temp/\n_backup/" >> "$1"' _ {} \;

# Remove
find laravel -type d -name "_docs" -exec rm -rf {} \;
```

## Related

- Issue: #19
- Skill: `.opencode/skills/underscore-directories/SKILL.md`
- Memory: `.opencode/memories/underscore-docs-cleanup.md`
- Docs: `Modules/Xot/docs/UNDERSCORE_DOCS_RULE.md`
