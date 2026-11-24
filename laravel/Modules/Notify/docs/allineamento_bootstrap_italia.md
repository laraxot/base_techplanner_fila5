---
title: "allineamento bootstrap italia"
type: note
tags: [documentation]
created: 2026-09-26
updated: 2026-11-23
qmd: "allineamento bootstrap italia"
issues: []
discussions: []
---

# 🎯 Allineamento HTML con Bootstrap Italia

## Problema
I componenti blade usano classi Tailwind ma Bootstrap Italia richiede classi specifiche.

## Soluzione
Creare componenti compatibili Bootstrap Italia.

<<<<<<< .merge_file_BhLThp
=======
---
<<<<<<< .merge_file_lH9t8q
=======

title: "allineamento bootstrap italia"
type: note
tags: [documentation]
created: 2026-09-26
updated: 2026-09-26
qmd: "allineamento bootstrap italia"
issues: []
discussions: []
## Componenti da Fixare
>>>>>>> .merge_file_01Z2cP

title: "allineamento bootstrap italia"
type: note
tags: [documentation]
created: 2026-09-26
updated: 2026-09-26
qmd: "allineamento bootstrap italia"
issues: []
discussions: []
>>>>>>> .merge_file_0iQc4j
## Componenti da Fixare
### 1. Hero Homepage
### 2. Governance Cards
### 3. Events Calendar

## Piano d'Azione

### Fase 1: Mappatura Classi

| Tailwind | Bootstrap Italia |
|----------|------------------|
| `bg-white` | `card-bg` |
| `bg-gray-50` | `bg-light` |
| `text-blue-700` | `text-primary` |
| `container mx-auto` | `container` |
| `grid grid-cols-3` | `row g-4` |
| `col-lg-4` | `col-lg-4` |

### Fase 2: Fix Componenti

1. `components/blocks/hero/homepage.blade.php`
2. `components/blocks/governance/cards.blade.php`
3. `components/blocks/events/calendar.blade.php`
4. `components/blocks/topics/highlight.blade.php`

### Fase 3: Testing

```bash
curl http://fixcity.local/it/tests/homepage | grep -o '<section[^>]*>' | head -10
curl http://ptv.local/it/tests/homepage | grep -o '<section[^>]*>' | head -10
```

---

## Stato

- [x] Analisi completata
- [ ] Componenti fixati
- [ ] Testing eseguito
- [ ] Documentazione aggiornata
