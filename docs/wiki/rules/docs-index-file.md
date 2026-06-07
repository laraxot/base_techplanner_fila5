# Docs INDEX.md Rule

## REGOLA PERMANENTE: Ogni directory docs/ deve avere un file INDEX.md

### Vincolo assoluto

```
OBBLIGATORIO: docs/INDEX.md in ogni modulo e tema
OBBLIGATORIO: docs/docs/INDEX.md in ogni sottodirectory docs
OBBLIGATORIO: Elenco puntato dei file .md disponibili
```

### Forma corretta

```markdown
# Documentation Index

Modulo: Geo

## File disponibili

<!-- auto-generato: elencare i file .md presenti -->
- [CoordinatePicker](concepts/coordinate-picker.md)
- [Geo Fields](concepts/geo-fields-family.md)
- [Map Runtime](concepts/map-picker-runtime-asset-governance.md)
```

### Struttura consigliata docs/

```
docs/
├── INDEX.md                    # Obbligatorio
├── README.md                   # Obbligatorio
├── BEST_PRACTICES.md           # Consigliato
├── BAD_PRACTICES.md            # Consigliato
├── FALSE_FRIENDS.md            # Consigliato
└── concepts/
    └── ...                     # Sottodirectory per argomenti
```

### Pattern nome file

- ✅ CORRETTO: `-kebab-case.md`
- ❌ SBAGLIATO: `_underscore_docs.md`, `PascalCase.md`, `with date 2025-01-01.md`

### Verifica rapida

```bash
find laravel/Modules -type d -name "docs" | xargs -I{} sh -c 'echo "DIR: {}"; grep -l "Documentation Index" {}/INDEX.md 2>/dev/null || echo "  ❌ Manca INDEX.md"'
```

### Documentazione

- Story: 8-37 (cleanup docs)
- Reference: `bashscripts/docs-cleanup/`
