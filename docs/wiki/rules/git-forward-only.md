---
title: "Git Forward-Only"
type: rule
confidence: high
created: 2026-05-14
updated: 2026-06-07
tags: [git, collaboration, forward-only, safety, branch]
related:
  - rules/agent-no-git-branch-creation.md
  - ../memories/git-forward-only-standing-rule.md
  - ../concepts/git-forward-only-discipline.md
  - ../how-to/git-merge-marker-sweep.md
---

# Git Forward-Only

## Regola

In questo repository **Git si va solo avanti sulla linea temporale utile al team**: leggere la history è obbligatorio per capire; **tornare indietro** (disc o branch) non è uno strumento di correzione per gli agent.

## Per gli agent IA (promemoria irrifiutabile)

- **Non riproporre** soluzioni del tipo «ripristina la versione di prima», «checkout del file da quel commit», «usa `git restore` per tornare com’era» salvo quando l’utente **nel messaggio preciso odierno** ti ordina quel comando distruttivo o di rollback.
- Se manca codice eliminato per errore: **reimplementa in avanti** (copiando dalla lettura della history dentro un file nuovo), non «torniamo allo snapshot git».
- In conversazione usa linguaggio tipo: *«studiamo la history (`show`/`blame`) e applichiamo una patch sullo stato corrente»* — mai *«ripristiniamo la vecchia versione»*.
- Anche rinominando spostamenti file: **`git revert`/`restore`/`reset`** come remediation **predefinita** resta vietata nella policy Laraxot; eccezione = istruzione esplicita umana.

## Consentito

- `git status`, `git diff`, `git show`, `git blame`, `git log` per capire origine e contesto di una regressione.
- Confrontare una versione precedente per ricostruire il contratto corretto.
- Applicare una nuova patch in avanti che preservi il lavoro valido presente nel working tree.

## Branch (agenti)

Creazione o cambio branch: vedi [`agent-no-git-branch-creation.md`](agent-no-git-branch-creation.md) — **non** confondere «forward-only sui file» con permesso di `git checkout -b`.

## Vietato

- `git restore`, `git checkout -- <file>`, `git reset --hard`, **`git revert <commit>`** come scorciatoia sistemica per sistemare regressioni degli agent senza briefing esplicito dell’utente.
- **`git checkout <commit> -- <path>`** e varianti (`git restore --source=<commit>`): anche se il commit è «pulito», è un ripristino operativo — **vietato** come remediation agent.
- Sostituire un file corrente con una copia storica senza integrare consapevolmente le modifiche valide successive.
- Usare la history per cancellare lavoro di altri agenti senza analisi.

### Conflitti merge / parse error

1. `git show <commit>:path/to/file.php` — **solo lettura**, per capire il contratto corretto.
2. `git diff`, `git blame` — contesto e autore della regressione.
3. **Patch manuale** sul file nello working tree attuale: unire marker `<<<<<<<` / `=======` / `>>>>>>>` scegliendo o combinando le parti valide.
4. Verificare con `php -l`, PHPStan, test — **mai** checkout del file da un commit precedente.

## Pattern Corretto

1. Leggere la versione corrente.
2. Studiare la history con comandi read-only.
3. Identificare il contratto architetturale stabile.
4. Applicare una patch forward-only.
5. Documentare la regressione e il contratto in `docs/chat/` e nella wiki owner.

## Caso Reale — conflitto ServiceProvider

File con marker Git o `php -l` fallito dopo merge: **non** `git checkout f5e4c0abb -- Modules/.../RouteServiceProvider.php`. Leggere la versione storica con `git show`, poi riscrivere in avanti la closure/metodo corrotto nel file attuale.

## Caso Reale — wizard

`CreateTicketWizardWidget` deve estendere `XotBaseWizardWidget`. Se una versione corrente lo trasforma in un wizard manuale, studiare la history per capire il contratto, poi correggere in avanti:

- niente `currentStep` manuale;
- niente `nextStep()` custom;
- niente `form()->schema(match (...))`;
- `getSteps()` deve delegare a `TicketForm::getSteps()`.

## Caso Reale — PHPStan / conflitti massivi (anti-pattern)

**Sbagliato:** `git checkout dev -- laravel/Modules`, loop `git show dev:path > path`, `git checkout HEAD -- laravel/Modules` per «reset» e ripartire.

**Corretto:**

1. `rg '^<<<<<<< ' laravel/Modules` — inventario.
2. Per ogni file: leggere working tree + `git show <ref>:path` (solo stdout, niente redirect).
3. Risolvere marker o reimplementare il contratto **nel file attuale**.
4. `./vendor/bin/phpstan analyse Modules` — zero errori senza aver mai spostato la HEAD indietro.

Cursor: `bashscripts/ai/.cursor/rules/git-forward-only.mdc` (`alwaysApply: true`).