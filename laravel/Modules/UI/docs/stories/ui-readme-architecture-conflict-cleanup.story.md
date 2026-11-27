---
qmd: "ui stories ui readme architecture conflict cleanup story md"
title: Risolve conflitti README + consolida docs/architecture case-dupes
slug: ui-readme-architecture-conflict-cleanup
status: done-partial
scope: module:UI
---

# Risolve conflitti README + consolida docs/architecture case-dupes

## Contesto

Continuazione di un cleanup igiene-root del modulo (max 1 `.code-workspace`, max 5 `.md`
in root) che aveva spostato `architecture.md`/`testing.md`/`GETTING_STARTED.md`/`PHILOSOPHY.md`
dalla root a `docs/root-md-files/`, segnalando ma non risolvendo due problemi fuori scope
in quel momento: marker di conflitto non risolti in `README.md` di root e una famiglia di
file case/name-duplicati sotto `docs/architecture*`.

Root cause nota (non ri-derivata, gia' documentata): `docs/sprint-status.yaml` story
`5.122-gitmodules-sync-2026-09-15-safe-subset` (done-partial) — un daemon locale di
auto-commit ("Marco Xot", msg ".") a volte fa merge col remote divergente e COMMITTA
marker di conflitto non risolti; UI era stata esplicitamente deferred in quella sessione
("marker fleet-wide troppo grandi/contesi"). Story precedenti sullo stesso tema, gia'
`done` ma evidentemente regredite: `5.12-ui-merge-markers-regressione`,
`5.13-collisioni-case-e-phpstan-zero` (entrambe in `docs/sprint-status.yaml` root, non
duplicate qui — solo referenziate).

## Lavoro svolto

1. **`README.md` (root modulo)**: 47 righe di marker (`     verso `Themes/docs/shared-components/architecture.md` (path inesistente).
   - `docs/architecture-2025.md` (7 righe) — stub redirect pulito ma verso lo stesso path

     inesistente; gia' elencato in `docs/.gitignore` come da rimuovere (mai completato).
   - `docs/architecture_2025.md` (11 righe) — due frontmatter concatenati, stesso path
     inesistente.
   Non toccata: `docs/architecture/` (sottocartella legittima con
   `component-registration.md`, `filament-pages-structure.md`,
   `filament-resources-structure.md`, `structure.md` — argomento diverso).
4. **Riferimenti aggiornati** (solo nei file senza altri conflitti estranei, verificato
   riga per riga): `docs/philosophy-dev-rules.md`, `docs/root-md-files/philosophy.md`
   (sezione "See Also"), `docs/project-structure.md` (albero directory),
   `docs/PHILOSOPHY.md` (albero root modulo + sezione "References and Links").
5. **`docs/architecture-patterns.md`**: 4 marker annidati in una sola sezione
   "Backlinks & References", auto-contenuti e sullo stesso tema (variante
   `architecture.md`/`architecture.md`/`index.md`/`index.md` ripetuta 8 volte) —
   risolti collassando alla forma canonica minuscola.
6. **`docs/purpose.md`**: aggiunto link a `./architecture.md` tra i "Collegamenti"
   (mancava un puntatore diretto dal purpose all'architettura tecnica).

## Deliberatamente non toccato (fuori scope, gia' noto/deferred)

Trovata, durante l'audit, una corruzione molto piu' estesa di quanto stimato dal task
originale (~13 righe attese in README, in realta' 47; "4 file" architecture attesi, in
realta' 6 + 1 sottocartella legittima). File con marker non risolti **non** toccati
perche' troppo grandi/estranei al tema architecture o gia' noti come deferred fleet-wide
(story 5.122): `docs/project-structure.md` (7 conflitti, solo 1 sul tema), `docs/paths-and-assets.md`
(140 conflitti), `docs/paths_and_assets.md` (64 conflitti), `docs/index.md`, `docs/index.md`,
`docs/00-index.md`, `docs/README.md` (distinto dal root, 20 conflitti, liste di file
fantasma tipo `architecture-1.md` mai esistiti), `docs/testing.md` (16 righe, da
verificare), `docs/testing.md` (21 marker, corruzione analoga a README). `docs/redundancy-audit.md`
ha un conflitto di frontmatter (`related:` con 3 URL issue candidate, nessuna verificabile
contro i remote reali `laraxot/module_ui_fila5` / `provtv/module_ui_fila5`) lasciato
irrisolto per non inventare un numero di issue/repo; il corpo del file (non in conflitto)
gia' documenta correttamente il problema case-dupe risolto qui.

**Raccomandazione**: la corruzione fleet-wide (centinaia di file, root cause nota — daemon
di auto-commit) merita un'epic/story dedicata a livello di monorepo, non un fix modulo per
modulo opportunistico; riferimento: `docs/sprint-status.yaml` story `5.122-gitmodules-sync-2026-09-15-safe-subset`.

## Verifica

```bash
cd laravel/Modules/UI
grep -c '^  anche `docs/architecture.md` e `docs/architecture-.md`, non elencati ma scoperti con

  `git ls-files docs | grep -i architecture`.
- Un file senza marker `<<<<<<<` non e' automaticamente pulito: `docs/architecture.md`
  e `docs/architecture_2025.md` erano "risolti" per concatenazione cieca di entrambi i
  lati, non per scelta — stesso difetto del merge originale, solo senza i marker visibili.
