# Rule: Agnostic Documentation

**Status**: CRITICAL
**Created**: 2026-03-30
**Priority**: MANDATORY

---

## The Rule

> **Le cartelle `docs/` dentro i moduli (`Modules/*/docs/`) e dentro i temi (`Themes/*/docs/`)
> DEVONO essere agnostiche. NON possono contenere riferimenti a un progetto specifico
> (es. "FixCity", "PTVX", "Dental", paths hardcoded).**

---

## Cosa Significa Agnostico

La documentazione descrive il MODULO o il TEMA, non il progetto che lo usa.

### Corretto (agnostico)
```markdown
# Modulo CMS - Content Management System
Il modulo CMS gestisce i contenuti del sistema...
```

### Sbagliato (progetto-specifico)
```markdown
# Modulo CMS per FixCity
Il modulo CMS gestisce i contenuti della piattaforma FixCity...
```

---

## Cosa NON Può Essere nei Docs dei Moduli/Temi

1. **Nomi progetto**: "FixCity", "PTVX", "Dental"
2. **Paths hardcoded**: `/var/www/html/ptvx/`, `base_fixcity_fila5/`
3. **Domini hardcoded**: `fixcity.local`, `images.ptvx.local`
4. **GitHub repo names**: `base_fixcity_fila5`, `laraxot/fixcity-module`
5. **Email progetto-specifiche**: `fixcity@laraxot.com`
6. **Database names**: `ptvx_data`, `fixcity_db`
7. **Config paths**: `config/local/fixcity/`
8. **Namespace progetto**: `Modules\Fixcity\`

---

## Dove Va la Documentazione Progetto-Specifica

La documentazione progetto-specifica va in:
- `docs/` (root del progetto)
- `docs/project/`
- `.planning/`
- `.ralph/`

NON nei `docs/` dentro moduli o temi.

---

## Checklist Pre-Commit

- [ ] Nessun riferimento a nomi progetto nei docs di moduli/temi
- [ ] Nessun path hardcoded
- [ ] Nessun dominio hardcoded
- [ ] Documentazione descrive il modulo/tema, non il progetto

---

**Enforced By**: AI Agents, Code Review
**Violations**: ~90 files (da pulire)
