---
title: "Ignorare e rimuovere gli artefatti generati nei pacchetti"
type: story
module: Xot
status: blocked
created: 2026-11-24
updated: 2026-11-24
tags: [bmad, ecc, second-brain, coverage, docs, gitignore, modules, themes]
qmd: "coverage artifacts docs archive screenshots gitignore modules themes cleanup"
---

# Story — artefatti generati fuori dai repository dei pacchetti

## Perché

I report `tests/coverage-*.*`, gli archivi legacy in `docs/archive/` e le immagini in `docs/screenshots/` non appartengono alla superficie mantenuta dei pacchetti. Se restano tracciati aumentano il rumore nei diff, diventano obsoleti e mescolano evidenze temporanee con sorgenti e documentazione canonica.

## GitHub (tracciamento)

- Issue: DA CREARE (`gh` non autenticato in sessione).

## Acceptance criteria

- [x] Ogni modulo con `module.json` ignora esattamente `tests/coverage-*.*` nel proprio `.gitignore`.
- [x] Ogni modulo e tema ignora `docs/archive/` e `docs/screenshots/` nel proprio `.gitignore`.
- [x] Nessun file coperto dai tre pattern resta nel working tree o nell'indice dei pacchetti.
- [x] La regola è verificata con `git check-ignore` e una scansione filesystem/index.
- [ ] I cambiamenti sono committati e pubblicati su `dev` con issue GitHub citata nel messaggio.

## Scope e coordinamento

| File | Proprietario | Stato |
|---|---|---|
| `Modules/*/.gitignore` | `codex-root` | verificato |
| `Modules/User/tests/coverage-*.*` | `codex-root` | rimossi |
| `Modules/*/docs/{archive,screenshots}/` | `codex-root` | rimossi |
| `Themes/*/.gitignore`, `Themes/*/docs/{archive,screenshots}/` | `codex-root` | verificato/rimossi |

## Evidenze

- Second Brain healthcheck eseguito; sorgenti wiki presenti. QMD disponibile in `~/.npm-global/bin` ma assente dal `PATH` iniziale, quindi richiamato con `PATH` esplicito.
- Censiti 19 moduli reali (`module.json`); `Modules/DbForge` escluso perché directory Git vuota senza manifest di modulo.
- Prima della modifica: pattern assente in 19/19; sette XML corrispondenti presenti e tracciati nel modulo User.
- Verifica finale: 25 pacchetti, zero errori; tutte le sonde sono ignorate e scansione filesystem/index vuota.
- `cd laravel && composer harness:check`: 42 test, 63 assertion, tutti verdi.

## Blocco

`gh auth status` riporta che nessun host GitHub è autenticato. La policy del repository vieta commit degli agenti senza
issue puntuale (e ogni pacchetto ha un repository autonomo), quindi commit e push su `dev` restano in attesa di
autenticazione GitHub. I file sono modificati e verificati, ma non pubblicati.
