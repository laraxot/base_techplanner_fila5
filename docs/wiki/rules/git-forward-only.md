---
title: "Git Forward-Only"
type: rule
confidence: high
created: 2026-05-14
updated: 2026-05-29
tags: [git, collaboration, forward-only, safety, branch]
related:
  - rules/agent-no-git-branch-creation.md
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
- Sostituire un file corrente con una copia storica senza integrare consapevolmente le modifiche valide successive.
- Usare la history per cancellare lavoro di altri agenti senza analisi.

## Pattern Corretto

1. Leggere la versione corrente.
2. Studiare la history con comandi read-only.
3. Identificare il contratto architetturale stabile.
4. Applicare una patch forward-only.
5. Documentare la regressione e il contratto in `docs/chat/` e nella wiki owner.

## Caso Reale

`CreateTicketWizardWidget` deve estendere `XotBaseWizardWidget`. Se una versione corrente lo trasforma in un wizard manuale, studiare la history per capire il contratto, poi correggere in avanti:

- niente `currentStep` manuale;
- niente `nextStep()` custom;
- niente `form()->schema(match (...))`;
- `getSteps()` deve delegare a `TicketForm::getSteps()`.
