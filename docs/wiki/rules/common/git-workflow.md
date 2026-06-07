# Git Workflow

## Regola Prima di Tutto

`git commit` e `git push` NON sono step automatici di fine task.
Sono consentiti solo dopo quality gate completi, test pertinenti, runtime verificato e docs allineati.

## Pre-Commit Gate

Prima di commit:
- eseguire `phpstan` sul perimetro toccato
- eseguire `phpmd` sul perimetro toccato
- eseguire `phpinsights` sul perimetro toccato o sul progetto se richiesto
- eseguire test pertinenti
- verificare i flussi o le URL toccate
- aggiornare docs e indici

Se anche uno solo di questi punti manca, il commit va rimandato.

## Commit Message Format
```text
<type>: <description>

<optional body>
```

Types: feat, fix, refactor, docs, test, chore, perf, ci

Note: Attribution disabled globally via ~/.claude/settings.json.

## Trovare il repository remoto

SEMPRE usare `git remote -v` per trovare l URL del repo prima di aprire issue, PR, o discussion GitHub.
Non indovinare mai l URL del repository.

## GitHub Workflows Sync Rule (MANDATORY)

ALWAYS mirror `.github/workflows/` changes to `bashscripts/ai/.github/workflows/`.

After editing any file under `.github/`:
```bash
cp .github/workflows/changed-file.yml bashscripts/ai/.github/workflows/changed-file.yml
```
Commit both files together only after the full verification gate.

## Pull Request Workflow

When creating PRs:
1. Analyze full commit history (not just latest commit)
2. Use `git diff [base-branch]...HEAD` to see all changes
3. Draft comprehensive PR summary
4. Include test plan with executed checks and residual TODOs
5. Push with `-u` only when the branch is truly ready

> For the full development process before git operations,
> see [development-workflow.md](./development-workflow.md).
