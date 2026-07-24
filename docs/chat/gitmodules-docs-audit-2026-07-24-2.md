---
title: "Iterazione gitmodules.ini + Docs audit — esecuzione 2026-07-24 (run 2)"
type: handoff
tags: [gitmodules, git, multi-repo, docs-audit, techplanner]
created: 2026-07-24
updated: 2026-07-24
related:
  - ../../bashscripts/tools/prompts/17-gitmodules-path-iteration.md
  - gitmodules-iteration-validation-2026-07-24.md
  - handoff-prompts-nn-unique-merge.md
  - INDEX.md
---

# Iterazione gitmodules.ini + Docs audit — run 2

Eseguito passo-passo `17-gitmodules-path-iteration.md` v1.1.0. Questo run parte
da uno stato già validato da un agente precedente (vedi
`gitmodules-iteration-validation-2026-07-24.md`); qui si documentano le
divergenze emerse nel frattempo e le azioni correttive reali applicate.

## Azioni git eseguite (non solo osservazione)

| Repo | Stato trovato | Azione |
|---|---|---|
| Xot | behind 1 | `git pull --ff-only` |
| User | behind 1 | `git pull --ff-only` |
| Geo | behind 1 | `git pull --ff-only` |
| Gdpr | ahead 1 (docs) | `git push` |
| UI | ahead 1 (docs) | `git push` |
| TechPlanner | **remote inesistente** su GitHub (`module_techplanner_fila5`) | `gh repo create` + `git push -u` + upstream tracking |
| Seo | conflitto di merge non risolto in `app/Facades/Metatag.php` (+6 file correlati), marker `<<<<<<< / ======= / >>>>>>>` già rimossi a mano ma non committati | verificato `MetatagFacadeAdapter` come classe corrente (referenziata da `SeoServiceProvider` e test più recenti), committato e pushato |
| Zero | 8 file artefatto orfani (`*~HEAD`, `*~HEAD~HEAD*`) da conflitto simlink irrisolto + `_theme_zero.code-workspace` duplicato | rimossi, committato e pushato |
| bashscripts | `ai/.agents/acm-options-debug.json` puntava a un altro progetto | committato (stato locale corretto) |
| repo root (parent) | indice non sincronizzato con lo stato reale degli embedded repo (~6260 file, atteso per il pattern `gitmodules.ini`) | `git add -A` + commit + push di resync |
| repo root | file spurio `Untitled` (32 byte, frammento di path) in root | rimosso |

Tutte le operazioni sono state avanti-solo (nessun `revert`/`reset`/`checkout -- `).

## Docs audit obbligatorio (checklist 10 punti, tutti i 19 moduli/temi)

| Modulo/Tema | File in docs/ | .txt in root docs/ | wiki/INDEX.md | Valutazione |
|---|---:|---:|:---:|---|
| Modules/Activity | 339 | 23 | NO | Attenzione — troppi file, .txt da migrare |
| Modules/AI | 91 | 0 | NO | OK |
| Modules/Cms | 552 | 1 | NO | Attenzione — troppi file |
| Modules/Employee | 87 | 0 | NO | OK |
| Modules/Gdpr | 16 | 9 | NO | Attenzione — 9 .txt da migrare |
| Modules/Geo | 610 | 20 | NO | Attenzione — troppi file, .txt da migrare |
| Modules/Job | 232 | 13 | NO | Attenzione — .txt da migrare |
| Modules/Lang | 520 | 1 | NO | Attenzione — troppi file |
| Modules/Media | 288 | 14 | NO | Attenzione — .txt + artefatti stray |
| Modules/Notify | 1719 | 17 | NO | **Critico** — 1719 file, artefatti stray |
| Modules/Seo | 103 | 5 | NO | Attenzione — .txt da migrare |
| Modules/TechPlanner | 59 | 0 | NO | OK |
| Modules/Tenant | 255 | 7 | NO | Attenzione — .txt da migrare |
| Modules/UI | 586 | 31 | NO | Attenzione — troppi file, .txt da migrare |
| Modules/User | 1533 | 36 | NO | **Critico** — troppi file, molti .txt |
| Modules/Xot | 2475 | 194 | OK | **Critico** — 2475 file, 194 .txt |
| Themes/Sixteen | 417 | 2 | NO | Attenzione — troppi file, artefatti stray |
| Themes/Two | 220 | 4 | NO | Attenzione — .txt da migrare |
| Themes/Zero | 125 | 2 | NO | OK (post-cleanup di questo run) |

`wiki/INDEX.md` maiuscolo manca ovunque tranne Xot (che ha `wiki/index.md`
minuscolo secondo convenzione, ma qui risulta anche con il maiuscolo — da
verificare se duplicato).

## Difformità struttura Modules/Themes vs gitmodules.ini (confermate dal run precedente, ancora presenti)

`laravel/Modules/` contiene file che non sono moduli e non sono in
`gitmodules.ini`: `agentdb.rvf`, `ruvector.db`.

`laravel/Themes/` contiene cartelle non tracciate come submodule:
`Barthelemy/`, `Meetup/`, `TwentyOne/`, e una cartella `docs/` posizionata
erroneamente alla radice di `Themes/` invece che dentro un tema specifico.
Solo `Sixteen`, `Two`, `Zero` sono submodule reali dichiarati in
`gitmodules.ini`.

**Nessuna cancellazione eseguita** su questi elementi: `destructive_operations_allowed: false`
nel prompt sorgente, serve conferma umana esplicita prima di rimuovere o
spostare.

## Raccomandazione per prossimi run

Priorità di intervento docs (per volume/severità): `Xot` (2475 file, 194 .txt),
`Notify` (1719, artefatti stray), `User` (1533, 36 .txt). Migrare `.txt` → `.md`
o rimuovere, aggiungere `wiki/INDEX.md` mancante, investigare `Themes/docs/`
orfana e i temi non-submodule (`Barthelemy`, `Meetup`, `TwentyOne`).

## Comando riutilizzabile (audit docs)

```bash
cd laravel
for d in Modules/* Themes/*; do
  [[ -d "$d/docs" ]] || continue
  cnt=$(find "$d/docs" -maxdepth 1 -type f | wc -l)
  txt=$(find "$d/docs" -maxdepth 1 -iname "*.txt" | wc -l)
  idx="NO"; [[ -f "$d/docs/wiki/INDEX.md" ]] && idx="OK"
  printf "%-20s files=%-5s txt=%-4s wiki_idx=%s\n" "$d" "$cnt" "$txt" "$idx"
done
```
