---
title: "Lezioni dell'harness — ogni fallimento diventa un controllo"
type: index
created: 2026-11-19
updated: 2026-11-24
related:
  - ../../laravel/Modules/Xot/docs/adr/agent-harness.md
  - ../bin/guard
---

# Lezioni

Ogni voce: un fallimento osservato (o una regola del progetto già violata altrove), il pezzo di harness che lo
impedisce, quando toglierlo. Un pezzo senza lezione è peso morto; una lezione senza pezzo è solo un ricordo.
"Ultima volta che è scattato": `grep '"rule":"<id>"' .harness/runs/trace.jsonl | tail -1`.

## L-001 — Segreti letti o riscritti da un agente

- **Fallimento prevenuto**: un agente legge `.env` per "capire la configurazione" e ne copia valori in un log, un
  commit o un servizio esterno. Regola del progetto: mai segreti né `.env` nei commit (AGENTS.md → Critical).
- **Pezzo**: guard `secrets.env` (Read/Edit/Write/Bash su `.env*`, esclusi `.env.example` e `.env.testing`).
- **Rimuovere quando**: i segreti non stanno più in file nel checkout (vault/secret manager).

## L-002 — Migrazioni distruttive

- **Fallimento prevenuto**: `dropColumn`/`change()`/`renameColumn` in una migrazione cancellano dati di produzione;
  qui lo schema evolve solo in modo additivo con `XotBaseMigration::tableUpdate()` e `hasColumn`.
- **Pezzo**: guard `migration.destructive` (contenuto scritto in `*/database/migrations/*`).
- **Rimuovere quando**: un test arch su tutte le migrazioni fa lo stesso controllo in CI bloccante.

## L-003 — Database azzerato

- **Fallimento prevenuto**: test e comandi che azzerano il DB (`RefreshDatabase`, `migrate:fresh`) sul database
  configurato invece che su quello di test. Parente osservato (2026-11-19): un test che cancellava `lang/en`.
  Regola: i dati sono sacri, test solo con `.env.testing`.
- **Pezzo**: guard `db.fresh` (comandi `migrate:fresh|reset|rollback|refresh`, `db:wipe`, `migrate --force`;
  `RefreshDatabase` scritto in un file PHP).
- **Rimuovere quando**: mai, finché i test girano sulla stessa macchina dei dati veri.

## L-004 — Storia git riscritta o lavoro altrui cancellato

- **Fallimento osservato** (2026-11-19): un merge di sync committato con 2.424 file con marker di conflitto; più
  agenti e una sync lavorano sullo stesso checkout, e un `checkout`/`restore`/`reset --hard` cancella il lavoro di un
  altro senza traccia. Regola: git forward-only.
- **Pezzo**: guard `git.rewind` (`reset --hard`, `checkout`, `switch`, `restore` di file, `clean -f`,
  `stash drop|clear`, `push --force`/`+refspec`).
- **Rimuovere quando**: ogni agente lavora in un worktree proprio e la sync non scrive sul checkout condiviso.

## L-005 — Sensori che dipendono dall'app che controllano

- **Fallimento osservato** (2026-11-24): l'autoload punta a `Modules/Comment/packages/spatie/laravel-comments`, che
  manca; ogni test che fa il bootstrap di Laravel fallisce prima di controllare qualcosa, compreso il test del guard.
- **Pezzo**: i test dell'harness (`Modules/Xot/tests/Unit/Harness/GuardTest.php`, `Modules/Xot/tests/Unit/Docs/*`) sono
  source-level: niente `TestCase`, niente app. Il guard stesso è PHP puro.
- **Rimuovere quando**: mai; è il motivo per cui il sensore esiste.

## L-006 — Documentazione che sembra esserci ma non dice niente

- **Fallimento osservato** (2026-11-24): 12 moduli con `docs/adr/README.md` identico byte per byte e nessun ADR; un ADR
  di Xot copiato dal workshop con classi che qui non esistono (`RefundService`, `OrderPolicy`); 4 ADR senza le sezioni
  richieste, con il test rosso e nessuno che se ne accorgeva.
- **Pezzo**: `PackagesHaveContractsAndAdrTest` (frontmatter, cinque sezioni con `## Verifica`, README che elenca ogni
  file) e `ActionContractsAreCompleteTest` (Action esistente, `@contract` nel docblock, ID invarianti, group Pest reali).
- **Rimuovere quando**: mai; si rafforza quando una nuova forma di documentazione vuota passa il test.

## L-007 — Marcatori di conflitto committati nel codice

- **Fallimento osservato** (2026-11-24): il commit di sync `2e839e13a7` conteneva marcatori `<<<<<<<`/`>>>>>>>` in 10 file
  PHP: `Modules/Cms/app/View/Components/Head.php` (il `<head>` delle pagine pubbliche) e `BuildHeadSchemaAction` non
  compilavano, `Modules/Seo/.../BuildSitemapAction.php` nemmeno, `Modules/Geo/vite.config.js` rompeva la build; nei modelli di Blog e Rating i docblock avevano tipi doppi;
  3 copie morte di Blade in `Themes/Sixteen/{layouts,components}`. Nessun test lo segnalava: i test di Cms non partivano.
- **Pezzo**: `Modules/Xot/tests/Unit/Harness/NoConflictMarkersInCodeTest.php` (source-level, in `composer harness:check`).
  Risoluzione fatta unendo le due parti dove erano funzionalità complementari (schema `business` + `description/sameAs`;
  `lastmod` stringa + `DateTimeInterface`), con test.
- **Rimuovere quando**: la sync rifiuta di committare file con marcatori (hook pre-commit che fallisce).
