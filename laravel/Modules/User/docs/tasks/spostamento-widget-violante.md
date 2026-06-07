# Task: Spostamento Widget Violante

**Modulo**: User  
**Fase**: 1 - Correzione Violazioni Architetturali  
**Priorità**: Critica  
**Stima**: 2-3 ore

## Obiettivo

<<<<<<< HEAD
Spostare `UserTypeRegistrationsChartWidget` dal modulo User al modulo appropriato (es. Quaeris). User non può dipendere da moduli business specifici.
=======
Spostare `UserTypeRegistrationsChartWidget` dal modulo User al modulo appropriato (es. ExternalProject). User non può dipendere da moduli business specifici.
>>>>>>> dev

## Sottotask

- [ ] Identificare widget `UserTypeRegistrationsChartWidget` e sue dipendenze
<<<<<<< HEAD
- [ ] Analizzare dove collocarlo (Quaeris o altro modulo)
=======
- [ ] Analizzare dove collocarlo (ExternalProject o altro modulo)
>>>>>>> dev
- [ ] Spostare widget e aggiornare namespace
- [ ] Rimuovere file originale da User
- [ ] Verificare con script controllo dipendenze
- [ ] Test di regressione
- [ ] Aggiornare documentazione

## Dipendenze

Nessuna.

## Collegamenti

- [Roadmap User](../roadmap.md)
- [Indice task User](tasks-index.md)
- [Modular Architecture Dependency Rules](../../cms/docs/modular-architecture-dependency-rules.md)
