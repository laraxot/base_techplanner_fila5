---
title: "Git Collision Detection and Resolution System"
type: story
tags: [git, conflicts, collision, detection, resolution, automation, bmad, second-brain]
created: 2026-09-03
updated: 2026-09-03
qmd: "git collision detection resolution automation systematic bmad second brain forward-only"
issues:
  - "https://github.com/laraxot/base_techplanner_fila5/issues/TBD"
discussions:
  - "https://github.com/laraxot/base_techplanner_fila5/discussions/TBD"
epic: "Git Operations Automation"
status: "planned"
priority: "high"
effort: "medium"
---

# Git Collision Detection and Resolution System

## Summary

Sviluppare un sistema sistematico per la rilevazione e risoluzione delle collisioni Git nel progetto Laraxot, migliorando il second brain con pattern automatizzati e conformi alla disciplina forward-only.

## Problem Statement

Attualmente le collisioni Git vengono gestite in modo non sistematico:
- Marker di conflitto (`<<<<<<<`, `=======`, `>>>>>>>`) trovati in 115 file documentazione (2026-05-26)
- Mancanza di detection automatizzata per collisioni sistemiche
- Confusione tra script di risoluzione esistenti (`resolve-conflicts-keep-incoming.sh`)
- Violazioni occasionali della disciplina forward-only (`git reset` forbidden)

## User Story

**As a** developer  
**I want** un sistema automatizzato per rilevare e risolvere le collisioni Git  
**So that** posso mantenere l'integrità del repository e seguire la disciplina forward-only

## Acceptance Criteria

### AC1: Detection System
- [ ] Script bash per rilevare marker di conflitto in tutto il repository
- [ ] Report per tipo di file (PHP, MD, SH, JSON)
- [ ] Detection per collisioni remote wrong-base (pattern Tenant module)
- [ ] Integrazione con lock system per multi-agent coordination

### AC2: Resolution Patterns
- [ ] Documentazione pattern risoluzione deterministica (non vuoto, superset, metadata)
- [ ] Script per risoluzione keep-incoming con backup .bak
- [ ] Script per risoluzione keep-head con backup .bak
- [ ] Script per risoluzione manuale assistita

### AC3: Second Brain Integration
- [ ] Aggiornamento wiki con pattern di collision detection
- [ ] Documentazione `docs/wiki/rules/git-collision-detection-resolution.md`
- [ ] Junction con bashscripts/ai/wiki skills
- [ ] Frontmatter GitHub obbligatorio su tutti i file wiki

### AC4: Forward-Only Enforcement
- [ ] Hook pre-commit per prevenire `git reset`
- [ ] Detection automatica di operazioni distruttive
- [ ] Report violazioni con forward alternatives
- [ ] Integrazione con quality gates

### AC5: Multi-Agent Coordination
- [ ] Protocollo per dichiarazione intent su file in conflitto
- [ ] System di lock per prevenire modifiche concorrenti
- [ ] Chat coordination in `docs/chat/` per conflitti complessi
- [ ] GitHub issue/discussion tracking per conflitti persistenti

## Technical Approach

### Phase 1: Detection Infrastructure
```bash
# Script principale
bashscripts/git/detect-git-conflicts.sh
  - Scan per marker: <<<<<<<, =======, >>>>>>>
  - Filter per estensione file
  - Report JSON + Markdown
  - Integrazione con QMD per pattern matching
```

### Phase 2: Resolution Scripts
```bash
# Pattern esistenti migliorati
bashscripts/git/resolve-conflicts-keep-incoming.sh --validate
bashscripts/git/resolve-conflicts-keep-head.sh --validate
bashscripts/git/resolve-conflicts-manual.sh --interactive
```

### Phase 3: Documentation & Second Brain
```markdown
docs/wiki/rules/git-collision-detection-resolution.md
  - Pattern detection
  - Strategy matrix (keep-head vs keep-incoming vs manual)
  - Forward-only alternatives table
  - Multi-agent coordination protocol
```

### Phase 4: Quality Gates
```bash
# Pre-commit hook
.githooks/pre-commit
  - Check per marker di conflitto
  - Blocco operazioni distruttive (reset, checkout --force)
  - Report forward alternatives
```

## Dependencies

- Bash scripts organization: `bashscripts/git/`
- QMD integration per second brain queries
- Lock system: `bashscripts/lock/`
- Git forward-only discipline: existing rules
- Multi-agent coordination: existing protocol

## Out of Scope

- Automatic merge resolution (usare sempre approccio manuale/documentato)
- Git reset recovery (forbidden by policy)
- LFS/binari handling (LFS vietato nel progetto)
- Branch management automation (scope separato)

## Implementation Plan

### Step 1: Create Detection Script
- Write `bashscripts/git/detect-git-conflicts.sh`
- Test su repository corrente
- Generate report baseline

### Step 2: Document Resolution Patterns
- Create `docs/wiki/rules/git-collision-detection-resolution.md`
- Integrate existing scripts documentation
- Add forward-only alternatives

### Step 3: Update Second Brain
- Add QMD queries per git conflicts
- Create junction skills
- Update trigger map

### Step 4: Multi-Agent Protocol
- Define lock coordination
- Create chat protocol
- Update multi-agent coordination docs

### Step 5: Quality Gates
- Implement pre-commit hook
- Add to quality gate script
- Test with deliberate violations

## Testing Strategy

### Unit Tests
- Test detection script su vari tipi di file
- Test resolution scripts su conflitti sintetici
- Test hook con operazioni permesse/vietate

### Integration Tests
- Test detection su repository reale
- Test multi-agent coordination con lock
- Test quality gate integration

### Manual Tests
- Test risoluzione manuale conflitto reale
- Test forward-only enforcement
- Test second brain queries

## Definition of Done

- [ ] Tutti gli acceptance criteria completati
- [ ] Test passanti (unit + integration)
- [ ] Documentazione aggiornata (wiki + second brain)
- [ ] Frontmatter GitHub su tutti i file wiki
- [ ] Issue/discussion GitHub create per tracking
- [ ] PHPStan level 10 compliant (se codice PHP coinvolto)
- [ ] Quality gates verdi
- [ ] Multi-agent coordination testato

## GitHub Tracking

### Issue
- TBD: Create issue in appropriate module repo

### Discussion
- TBD: Create discussion for architectural decisions

## Related Work

- Existing: `bashscripts/git/resolve-conflicts-keep-incoming.sh`
- Existing: `brain/sources/git-collision-docs-cleanup-report.md`
- Existing: `bashscripts/ai/ai/wiki/rules/10-git/git-reset-forbidden-use-forward-alternatives.md`
- Existing: `laraxot-git-conflicts` skill

## Risk Mitigation

| Risk | Mitigation |
|------|------------|
| Detection false positives | Configurable filters + manual review |
| Resolution data loss | Mandatory .bak backups + validation |
| Forward-only violations | Pre-commit hook + code review enforcement |
| Multi-agent conflicts | Lock system + chat coordination protocol |

## Success Metrics

- Zero marker di conflitto in commit
- Zero violazioni forward-only post-deployment
- < 5 min per detection scan full repository
- 100% compliance con lock system multi-agent
- Second brain recall > 90% per git conflict queries

## Notes

- Seguire disciplina BMAD per planning e execution
- Integrare con existing `laraxot-git-conflicts` skill
- Maintain ponytail lazy dev principles
- Use graphify per codebase analysis pre-implementation
- Headroom integration per context optimization

---

**Generated with Devin**  
**BMAD Story Approach**  
**Visionary Eccentric Programmer Mode: ON**

## Incidente 2026-10-28: marker committati da rebase aperti

- **Fatto:** 10 moduli con `rebase-merge` aperto e Xot con `MERGE_HEAD`; i marker erano dentro commit `.` (nessun file `unmerged`, per questo `ls-files -u` non li vedeva).
- **Causa:** `dummy_push()` in `bashscripts/lib/custom.sh` fa `git add -A` + `git commit -am "."` + push senza controllare se c'è un rebase o merge aperto.
- **Correzione:** guardia in `dummy_push` (`return 0` con `rebase-merge`, `rebase-apply`, `MERGE_HEAD`, `CHERRY_PICK_HEAD` o `REVERT_HEAD` aperti), provata su un repo fixture.
- **Esito (17:15):** un'altra sessione ha chiuso rebase e merge; i marker rigiocati sono scesi da 208 a 15 `.md` (Activity, blocchi con contenuto diverso), risolti con `bashscripts/tools/resolve_merge_blocks.py` e, per i `REVIEW`, da un agent per modulo.
- **Nuovo controllo:** `bashscripts/tools/docs/frontmatter-check.py` (`check`, `dedupe`, `selftest`). Un'unione di righe produce chiavi YAML duplicate e frontmatter invalidi che nessun gate vedeva: 172 file, 121 corretti con `dedupe`. Va lanciato dopo ogni bonifica di marker (`check --since 60 laravel docs`); è il candidato naturale per l'AC4 (quality gate).
- **Aperto:** la logica `pull --rebase --strategy-option=ours` dei sync; più composer concorrenti su `laravel/vendor` (visti alle 17:11). Stato, decisioni e ripartenza: sezioni seguenti (l'handoff `docs/chat/handoff-git-collisions-rebase-markers.md` e' archivio e non si aggiorna piu').

### Stato (verificato il 2026-10-28, da riverificare sul checkout corrente)

- 10 moduli avevano un `rebase-merge` aperto di `dev` su `laraxot/dev` (Activity 1/5, AI 1/5, Cms 3/5, Gdpr 1/5, Job 1/5, Lang 1/6, Media 1/2, Seo 1/2, TechPlanner 1/1, UI 1/16) e Xot un `MERGE_HEAD`; alle 17:03 un'altra sessione li ha chiusi. Nessun file `unmerged`: i marker erano dentro commit con messaggio `.`.
- Controllo dello stato: `git -C <modulo> rev-parse --absolute-git-dir`, poi `ls` di `rebase-merge` e `MERGE_HEAD` in quella cartella. Un `.git` relativo da' "nessuna operazione" anche quando c'e'.
- Marker nel working tree: `python3 -I bashscripts/tools/resolve_merge_blocks.py <root>`.
- La guardia di `dummy_push` ritorna `0` (non `1`: i chiamanti hanno `set -euo pipefail`), quindi finche' un merge e' aperto il sync non committa: va concluso da chi lo ha lanciato.
- Non toccato: `git pull --rebase --depth=1 --strategy-option=ours` dei sync, che ha gia' riscritto il remoto laraxot su provtv (`bashscripts/ai/wiki/memories/incident-sync-script-rewrote-laraxot-remote-to-provtv.md`).

### Recupero del contenuto

Un'altra sessione ha tolto i marker alle 16:34, spesso tenendo il lato upstream. Nove agent (uno per modulo) hanno confrontato 96 file con 4 o piu' righe perse: i lati scartati erano quasi sempre stub, link rotti o classi inesistenti. Recuperate circa 30 righe (intestazione `Canon:` dei `.gitattributes`, voci dei `.gitignore`, sezioni di docs in Activity, Media, Lang e Xot).

### Nomi `.md`

`md-filenames.py apply` su Notify, User e `docs/` radice: 250 rinomine, 41 copie contenute rinominate `.old`, 1626 riferimenti riscritti; violazioni da 534 a 243. 283 riferimenti saltati perche' in file sporchi o occupati: ripetere `python3 -I bashscripts/tools/docs/md-filenames.py links` e correggerli a mano. Eseguire sempre `apply ... --map-out FILE`: senza, `fixrefs` non puo' riscrivere i riferimenti dei file che erano sporchi (915 saltati in un giro, ricostruiti dalla storia git e ridotti a 15). Il tool ora salta `/wiki/skills/` e `/.agents/skills/` e tiene i numeri dopo `to`, `session`, `laravel`, `filament`, dopo che aveva rinominato 27 file di skill vendorizzate richiamate per nome (rimessi al nome originale). Restano circa 50 nomi non conformi: collisioni (due file datati sullo stesso nome pulito, serve sceglierne uno o unirli), `.agents/memories`, `.agents/docs`, file occupati.

### Decisioni aperte (spettano all'utente)

1. Verificare che `dev` di ogni modulo contenga il lavoro locale (`git -C <modulo> log --oneline -5`) e che non restino marker.
2. `Xot/app/Models/Traits/TypedHasRecursiveRelationships.php` e' stato cancellato e committato dal sync: era l'unico errore PHPStan, ma era una scelta di design da fare.
3. Da scegliere la copia canonica: `Activity/docs/module.md` (stub di 14 righe contro 318 scartate), `Activity/docs/module-analysis.md`, `Lang/docs/00-index.md` contro `00-INDEX.md`, stile del README di Gdpr e Job, impostazioni IDE nei `_*.code-workspace`.
4. Emerso dagli agent di docs, non toccato da nessuno:
   - `mixed`: `00-master-prompt.md`, `25-services-to-actions.md` e il README dicono «ultima spiaggia» (come l'utente); valgono i prompt, il brief che diceva «mai» era sbagliato.
   - `@phpstan-ignore`: 80 nel codice di `Modules/*/app` contro la regola il 2026-10-28, 7 il 2026-10-30; il debito residuo e' in [all-modules-phpstan-zero-errors](./all-modules-phpstan-zero-errors.story.md).
   - Duplicati esatti: Employee 66 gruppi (68 copie), Geo 41 gruppi (88 file), 43 coppie `.md`/`.txt` nei prompt. Trasformarli in rimandi di 1-2 righe richiede di decidere quale copia e' canonica.
   - Docs di altri progetti dentro i moduli: User cita Fixcity (58 file), SaluteOra (86), Patient (82); Geo e Sixteen citano Fixcity; Zero, Cms e Quaeris.
   - Issue e URL: una issue di `base_fixcity_fila5` citata da un file di Activity; User ha 792 `issues:` boilerplate verso `provtv/base_ptv_fila5#124` e 403 `canonical:` verso `Themes/docs/shared-components/`, che non esiste.
   - Migrazioni nei test: `Modules/Xot/tests/TestCase.php` dice di migrare a mano, `XotBaseTestCase::createApplication()` non migra; `Activity/tests/TestCase.php` ha `$connectionsToTransact = ['sqlite','activity','user']` mentre la sua doc dice `mysql`; User ha 5 migrazioni che creano `model_has_roles`/`model_has_role`, contro «una migrazione per modello».
5. `bashscripts/lib/deploy.sh` ha operazioni distruttive e di permessi: leggerlo prima di lanciarlo. Non committare `composer.lock` (983 righe aggiunte e 1508 tolte, Filament 5.10 -> 5.11 e altri) senza rieseguire PHPStan e Pest.

### Filoni collegati, con la loro story

- UI/UX mobile: [mobile-ui-ux-pass](./mobile-ui-ux-pass.story.md).
- Parita' HTML di Sixteen e attributi `data-*`: [data-attribute-parity](../../laravel/Themes/Sixteen/docs/stories/data-attribute-parity.story.md).
- Autorizzazione delle assenze: [absence-request-authorization](../../laravel/Modules/Employee/docs/stories/absence-request-authorization.story.md).
- Tenant `SushiToJsons` (una sola sorgente per le righe): [sushi-model-pitfalls](../../laravel/Modules/Tenant/docs/bmad/sushi-model-pitfalls.md).

### `.gitattributes` senza Git LFS (portato qui da `docs/chat/handoff-gitattributes-no-lfs.md`)

Perche': gli asset piccoli restano blob Git normali, per evitare pointer orfani e asset rotti.

- Verificato al momento dell'handoff: tutti i `.gitattributes` versionati fuori da `laravel/vendor/` normalizzati; nessun marker `<<<<<<<`, `=======`, `>>>>>>>` negli attributi; nessuna regola attiva `filter=lfs`, `diff=lfs`, `merge=lfs`; i binari usano `binary !filter`, restano le regole `text`, `diff` ed `export-ignore` utili; la sezione LFS locale del repo root e' stata rimossa, la configurazione di sistema no.
- Controllo da ripetere sul checkout corrente:

```bash
git ls-files | rg '(^|/)\.gitattributes$' | rg -v '^laravel/vendor/' | xargs -r rg -n -i 'filter=lfs|diff=lfs|merge=lfs|^<<<<<<<|^=======|^>>>>>>>'
git check-attr --all -- laravel/Modules/AI/.gitattributes laravel/Themes/Zero/.gitattributes
git diff --check -- '*.gitattributes'
```

- Fuori scope: `HEAD` storico contiene pointer LFS in asset documentali di Geo; working tree e indice hanno asset reali. Convertire o riscrivere la storia e' una migrazione separata (e riscrivere la storia dei repo remoti spetta all'utente).
- Non verificato in questa sessione: i tre comandi non sono stati rieseguiti dopo il 2026-10-28.

### Ripartenza

1. Leggere questa story e `docs/wiki/rules/git-forward-only.md`.
2. `ps -eo pid,etimes,args | grep -E "claude|codex|pi|kilo|opencode|merge_remote|sync_remote"` e stato del rebase o merge di ogni modulo: se un merge e' in corso, non e' di chi legge.
3. Mai provare funzioni distruttive su repo veri.
4. Nessun commit senza richiesta dell'utente: il sync li fa gia', e solo se non c'e' un rebase o merge aperto.
5. Lo stesso messaggio utente puo' arrivare a due sessioni insieme: controllare `git status` e `mtime` e rileggere prima di ogni Edit.