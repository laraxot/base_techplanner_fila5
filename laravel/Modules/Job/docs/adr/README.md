---
title: "ADR del modulo Job"
type: index
module: Job
status: active
tags: [adr, decisioni, job]
created: 2026-11-18
updated: 2026-11-26
qmd: "Job adr architecture decision records madr formato"
---

# ADR del modulo Job

Le scelte di Job che sembrano eccessive o strane finché non si vede il rischio: comandi Artisan e `.env` scritti dal
pannello, una riga di shell passata a `exec()`, una tabella che il pannello non deve poter scrivere.

Un ADR registra una scelta difficile da invertire, sorprendente o frutto di un trade-off reale, e il suo perche'.
Non e' un diario ne' una spiegazione retroattiva: se la decisione non e' dimostrabile dal codice o da una story/doc del repo, non si scrive.
Il nome del file e' `NNNN-<argomento>.md` in kebab-case, senza date (la data sta nella frontmatter).

**Quando leggerli**: prima di aggiungere un pulsante che lancia un comando, un campo alle impostazioni del worker, o
una pagina a `JobResource`; e prima di "semplificare" un controllo di autorizzazione che sembra doppio.

**Quando leggerli**: prima di aggiungere un pulsante che lancia un comando, un campo alle impostazioni del worker, o
una pagina a `JobResource`; e prima di "semplificare" un controllo di autorizzazione che sembra doppio.

Sei titoli, in quest'ordine: `## Contesto`, `## Driver della decisione`, `## Alternative scartate`, `## Decisione`,
`## Conseguenze`, `## Conferma`. La Conferma è un test (percorso e `--group` se c'è), un comando eseguibile da `laravel/`
o una regola di review; se non esiste una conferma automatica si scrive «Nessuna conferma automatica oggi; proposta: …».
Se il codice contraddice la decisione, prima della Conferma c'è `## Stato attuale`. Frontmatter: `title`, `type: decision`,
`status`, `created`, `updated`, `module`, `decision-makers`.

Template condiviso: `laravel/Modules/Xot/docs/adr/0000-template.md` (copia locale: [0000-template.md](0000-template.md)).
Guard: `Modules/Xot/tests/Unit/Docs/PackagesHaveContractsAndAdrTest.php`.
Chi cambia una decisione scrive un nuovo ADR e segna il precedente `superseded by <file>`.

## Decisioni

| ADR | Stato | Perché | Conferma |
|---|---|---|---|
| [0001-artisan-commands-from-ui-exact-match-allowlist](0001-artisan-commands-from-ui-exact-match-allowlist.md) | accepted | Comandi Artisan dalla UI: solo super-admin, match esatto con i pulsanti, controllo ripetuto nel metodo Livewire. | Sì: `JobStatusAuthorizationTest.php`, `--group=JOB-ARTISAN-INV-1` |
| [0002-jobs-table-read-only-in-admin](0002-jobs-table-read-only-in-admin.md) | accepted | La tabella `jobs` nel pannello è in sola lettura: niente create/edit su `JobResource`. | No: il test esiste ma è stale (Stato attuale) |
| [0003-queue-worker-flags-from-tenant-settings](0003-queue-worker-flags-from-tenant-settings.md) | accepted | Flag del worker dalle impostazioni del tenant, solo interi nella riga di shell. | Sì: `JobConfigDataTest.php`, `--group=JOB-WORKER-CMD-INV-1`, `JOB-WORKER-CMD-INV-2` |

Elenco con stato: [index.md](index.md).

## Stato di copertura

ADR: 3. Con conferma automatica (test o comando eseguibile da `laravel/`): 2. ADR 0002 ha una sezione «Stato attuale»: il codice registra solo `index` e il test si aspetta anche `board`.

## Backlog

- Correggere l'attesa di `tests/Unit/Filament/Resources/JobResourceReadOnlyTest.php` da `['index', 'board']` a `['index']`.
- Allineare `ScheduleStatusWidget` e `JobStatusWidget` all'ADR 0001 (debito dichiarato nelle Conseguenze).
- `0000-template.md` è il modello, non una decisione.
