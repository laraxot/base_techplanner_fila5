# Regola Documentazione Agnostica - NO Riferimenti Progetto-Specifici

## Regola Fondamentale

**I file di documentazione (.md, .txt) DEVONO essere agnostici e NON devono contenere riferimenti a nomi di progetti specifici.**

## Riferimenti Vietati

- `healthcare_app` - Progetto esterno
- `Fila5` - Progetto esterno (se non è il progetto corrente)
- `healthcare_app` - Progetto esterno
- Qualsiasi altro nome progetto-specifico

## Pattern Corretto

```markdown
# Rating Module
Modulo agnostico per la gestione dei criteri di valutazione.
```

## Pattern Anti (VIETATO)

```markdown
# Rating Module
Modulo per gestione valutazioni in healthcare_app.
```

## Checklist

- [ ] Nessun nome progetto esterno
- [ ] Documentazione valida in qualsiasi progetto

---

**Data**: 2026-02-24
