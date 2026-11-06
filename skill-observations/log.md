# Skill Observation Log

Observations captured during task-oriented work.

**Status key:** OPEN = not yet actioned | ACTIONED (YYYY-MM-DD) = skill updated/created | DECLINED (YYYY-MM-DD) = user decided not to pursue — resolved statuses always carry their resolution date

---

## 2026-08-27

### Observation 1: Preflight strutturale prima dei quality gate

**Status:** OPEN
**Date:** 2026-08-27
**Session context:** Recovery di repository modulari con migliaia di marker merge residui prima di PHPStan, PHPMD, PHPInsights e Pest.
**Skill:** New skill candidate: semantic-merge-recovery
**Type:** open-source
**Phase/Area:** Analysis e preflight

**Issue:** Avviare direttamente l'analizzatore statico ha prodotto un singolo parse error, mentre il tree conteneva migliaia di file corrotti e perfino manifest JSON non parsabili. Il primo errore del gate nascondeva quindi l'ampiezza reale del danno.

**Suggested improvement:** Definire un preflight obbligatorio e ordinato: inventario marker binary-safe, distinzione tra conflitti indicizzati e marker committati, parsing dei manifest/bootstrap, ownership Git dei repository annidati, quindi quality gate applicativi.

**Principle:** Prima di usare un quality gate semantico su un tree potenzialmente corrotto, verificare integrità strutturale, sintassi e confini di ownership; altrimenti il primo fatal error viene scambiato per la dimensione del problema.

### Observation 2: Le API di delega richiedono una matrice di compatibilità esplicita

**Status:** OPEN
**Date:** 2026-08-27
**Session context:** Lancio parallelo di agenti read-only su repository Git annidati.
**Skill:** task-observer
**Type:** open-source
**Phase/Area:** Subagent delegation

**Issue:** Due tentativi di delega sono falliti perché `working_dir` non è compatibile con agenti background e perché un valore nullo esplicito per l'isolamento non era accettato. Il lavoro è ripartito solo usando path assoluti nei prompt e omettendo i parametri incompatibili.

**Suggested improvement:** Aggiungere alla guida di delega una matrice minima valida: background con path assoluti nel prompt e senza `working_dir`; foreground con `working_dir`; isolamento solo quando viene realmente richiesto.

**Principle:** Le orchestrazioni parallele devono usare combinazioni di parametri note e minime; i path assoluti nel mandato sono il fallback più robusto quando l'esecuzione background non può essere ancorata a una directory.
