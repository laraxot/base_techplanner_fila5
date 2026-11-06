---
id: zero-docs-stories-docs-temi-audit-organizzazione
slug: docs-temi-audit-organizzazione
title: "Audit e organizzazione delle docs dei temi"
description: "Audit della cartella docs di tutti i temi (esiste solo Zero), riordino non distruttivo, numeri prima e dopo, decisioni lasciate all'utente."
document_type: story
type: story
category: bmad-story
status: done
module: Zero
tags: [docs, temi, audit, indici, link, case-collision, bmad]
created: "2026-10-20"
updated: "2026-10-21"
qmd: "docs temi audit organizzazione zero indice archivio case collision readme agents scopo purpose operating-focus 00-index lowercase cms xot boy scout phpstan wave4 wave5 index maiuscola link rotti moduli inesistenti password chiaro md-filenames falso check paths cartella story nomi con data"
issues: []
discussions: []
related:
  - ./zero-docs-health.story.md
  - ../bmad/stories/theme-docs-dedup-frontmatter.story.md
  - ../README.md
  - ../inventory.md
---

# Audit e organizzazione delle docs dei temi

> **Aggiornamento 2026-10-21 (docs-temi).** Questa story resta valida per audit,
> segreti e moduli assenti. La scelta dell'indice è superata: `docs/index.md` è
> l'indice canonico, `README.md` l'ingresso umano e `index-pointer.md` un alias;
> `INDEX.md` è stato assorbito. `laravel/Themes` contiene anche One e Three
> (skeleton), non solo Zero. Esito e numeri finali:
> [bmad/stories/docs-organization.story.md](../bmad/stories/docs-organization.story.md).

Fase BMAD: Analisi, poi Build. Solo documentazione in `laravel/Themes/Zero/docs/`; nessun file PHP, Blade o JS toccato. Lane DOCS-TEMI di uno swarm: gli altri perimetri (moduli, prompt) non sono stati toccati.

## Richiesta

Regola permanente dell'utente: studiare, aggiornare, migliorare e organizzare di continuo le cartelle `docs` dentro moduli e temi, con BMAD e second brain, senza chiedere conferma. Questa story copre i temi.

## Perimetro e scelta del tema owner

`ls laravel/Themes` mostra un solo tema, `Zero` (repository git proprio, remote `laraxot`). Quindi non c'era scelta: l'audit e la story stanno qui. La story va in `docs/stories/` perche' e' la posizione della policy `bashscripts/docs/modular-bmad-story-policy.md` e quella di 5 delle 7 story gia' presenti (le altre 2 sono in `docs/bmad/stories/`, vedi decisioni aperte). Nessuna nuova cartella docs e niente `bmad-output/`.

## Convenzione attesa

Le regole lette: policy delle story, prompt 44 (docs di continuo), 52 (mappa di proprieta'), 55 (convenzioni markdown), 97 (front matter), `markdown-filename-conventions.md` e `bmad-docs-in-module.md` (tutti esistono). In sintesi per un tema: ingresso `README.md`, un indice per ogni cartella grande, `stories/` per le story, `_archive/` solo con `canonical:`, nomi kebab-case senza date ne' suffissi numerici, un solo front matter con `title` e `qmd`, mai cancellare o rinumerare, duplicati `superseded` con `superseded_by`. I moduli "ben tenuti" non sono un modello utile: `Xot/docs` ha 426 voci nella radice e nomi in maiuscolo e con underscore, quindi la convenzione e' quella scritta nelle regole, non quella vista nei moduli.

## Inventario prima e dopo

Misurato con `python3 -I`, `rg -P` e `find`, ogni zero confrontato con un caso positivo noto. Link: stesso script prima e dopo (conta solo link markdown relativi fuori dai blocchi di codice).

| Misura | Prima | Dopo |
|---|---:|---:|
| File `.md` in `docs/` | 211 | 213 (indice archivio e questa story) |
| Radice di `docs/` | 5 | 5 (`INDEX.md` diventato `index-pointer.md`; i due file nuovi sono in `_archive/` e `stories/`) |
| `bmad/` / `wiki/` / `_archive/` / `stories/` / `concepts/` / `skills/` | 125 / 55 / 19 / 5 / 1 / 1 | 125 / 55 / 20 / 6 / 1 / 1 |
| Coppie di nomi che differiscono solo per la maiuscola | 2 (`bmad/readme.md`, `index.md`) | 0 |
| Nomi con data nel nome (`md-filenames.py check`) | 5 (tutte story) | 0 |
| Marker di merge (`^(<{7}\|={7}\|>{7})( \|$)`) | 0 | 0 |
| File senza front matter o senza `qmd` | 0 | 0 |
| File con chiave duplicata nel front matter | 3 | 0 |
| File con un secondo blocco di front matter incollato nel corpo (veri) | 7 | 0 |
| File senza alcun link entrante da altre pagine | 22 | 0 |
| File di `wiki/` fuori da `wiki/index.md` | 9 | 1 (l'indice stesso) |
| Link relativi controllati / non risolti | 1.223 / 515 | 1.275 / 448 |
| Pagine con password in chiaro | 2 | 0 |
| Pagine non attive che citano moduli assenti dal repository, con nota di verifica | 0 su 10 | 10 su 10 |
| File con em dash / con emoji | 84 / 57 | 84 / 57 (non toccati) |

Nota sui "7 veri" del secondo front matter: l'audit ne segnalava 11 per `title` ripetuto e 7 per `qmd` ripetuto, ma 4 file (`pandoc-guide`, `ai-development-guide`, `schema`, `wiki/AGENTS`) contengono un esempio di front matter dentro un blocco di codice: sono falsi positivi e non sono stati toccati. I due file in `_archive/` con blocco ripetuto restano come sono (archivio immutabile).

## Cosa e' stato riordinato

1. **Nomi che collidono su filesystem case-insensitive.** `bmad/readme.md` (la panoramica lunga, 27 KB) e' diventato `bmad/theme-overview.md`, come proposto dalla story di salute della docs; `INDEX.md` e' diventato `index-pointer.md`. `md-filenames.py` non copre le collisioni di sola maiuscola, quindi per questi due ho usato una riscrittura mia, limitata ai riferimenti che risolvono esattamente al vecchio percorso (16 riferimenti per il primo, 1 per il secondo), prima in dry-run. Nessun file cancellato. `index.md` resta com'e': due file fuori dalla cartella lo citano per percorso.
2. **Cinque story con data nel nome**, rinominate con `md-filenames.py apply --only` (regola dell'utente 2026-10-15): `zero-docs-health`, `docs-theme-zero-audit`, `zero-conflict-markers-cleanup`, `auth-login-ui-ux-redesign`, `quality-gates-phpstan-swarm`, tutte `.story.md`. Il tool salta i file "sporchi" in git, quindi i riferimenti rimasti sono stati riscritti con `fixrefs --force` limitato ai soli file coinvolti (9 file nel tema piu' 1 riga in `docs/stories/continuation-2026-09-12.story.md`, fuori perimetro ma richiesta dal rename e protetta da lock). Nessun vecchio nome `.story.md` e' rimasto citato. Gli `id` delle story non cambiano; gli `slug` con la data sono stati allineati al nome nuovo. Nessuna rinumerazione.
3. **Indice dell'archivio.** Nuovo `_archive/README.md`: tabella copia archiviata e canonico vivo per tutti i 19 file (il vecchio `_archive/index.md` e' una copia dell'indice generale, non un indice). Verificato che i 12 canonici esistono.
4. **Indice della wiki.** `wiki/index.md` ora elenca `overviews/advanced-features`, `readme`, `schema`, `AGENTS`, `log`, `raw/readme` e i cinque sotto-indici.
5. **Front matter.** Tolti i blocchi incollati per errore da fusioni di nomi collidenti in `bmad/architecture`, `bmad/changelog`, `bmad/prd`, `bmad/phpstan` e `index.md` (con `docs-organizer.py frontmatter --fix` dove era sicuro, a mano per `architecture` e `phpstan`, riportando le parole di ricerca nel `qmd`); tolte le chiavi `updated` e `qmd` doppie in 3 file. Nessun testo del corpo cancellato oltre ai blocchi di metadati.
6. **Link.** `docs-organizer.py links --by-name --fix`: 89 link riparati dove il bersaglio esiste ed e' univoco (percorsi `../` di profondita' sbagliata, file nella cartella sorella). `_archive/` e `wiki/raw/` sono stati esclusi apposta.
7. **Docs che descrivono codice inesistente.** Verifica con `ls laravel/Modules` e `rg`: i moduli `Performance`, `Sigma`, `Ptv`, `Progressioni`, `Rating`, `IndennitaResponsabilita`, `IndennitaCondizioniLavoro` non esistono qui, e `Themes/Zero/app/` contiene solo `.gitkeep` senza alcun `ThemeServiceProvider`. Dieci pagine hanno ora una nota di verifica datata in testa, contenuto non riscritto: `bmad/accessor-delegation-pattern`, `filament-infolist-pattern`, `filament-resource-schemas-tables`, `performance-actions-reference`, `performance-calcolo-quota-troubleshooting`, `readonly-field-styling`, `schemaless-attributes`, `wiki/concepts/criteri-gg-theme-boundary-audit`, `gg-integ-params-no-asz-theme-boundary`, `method-name-homonyms`; piu' `bmad/architecture` per il service provider.
8. **Segreti.** `wiki/how-to/mysql-remote.md` e `bmad/env-development-configuration.md` riportavano la password `marco` in chiaro: sostituita da un segnaposto, con avviso nella pagina. Resta nella cronologia git del tema.
9. **Documenti guida.** `README.md`, `bmad/README.md` e `inventory.md` riscritti nelle parti false (marker "30 file" non piu' vero, gemello readme superato, regola sui nomi che escludeva le story).

## Verifica

Prima di credere a ogni "zero", un caso positivo noto.

- Nomi: `find laravel/Themes/Zero/docs -type f -name '*.md' -print0 | xargs -0 python3 -I bashscripts/tools/docs/md-filenames.py check --paths` stampa `0 file .md con nome non conforme` (prima: 5). Attenzione: `check --paths laravel/Themes/Zero/docs` con una **cartella** stampa lo stesso `0` ma non controlla niente, perche' il codice tiene solo gli argomenti che finiscono in `.md`. Controprova: sul file `zero-docs-health.story.md` il comando dava `VIETATO (data)`. Il prompt 55 invita a passare la cartella: va corretto (fuori dal mio perimetro, vedi decisioni).
- Marker di merge: `rg -nP '^(<{7}|={7}|>{7})( |$)' --glob '*.md' .` non stampa nulla; lo stesso pattern su un file di prova con tre marker restituisce 3.
- Case: `find . -type f | tr A-Z a-z | sort | uniq -d` non stampa nulla; prima stampava `./bmad/readme.md` e `./index.md`.
- Front matter: PyYAML legge tutti i file, nessuna chiave duplicata, nessun `id` duplicato.
- Link nei file nuovi e riscritti: `README.md`, `bmad/README.md`, `wiki/index.md`, `_archive/README.md`, `index-pointer.md`, `inventory.md` e questa story hanno 0 link locali non risolti.
- Backup della docs prima di iniziare: archivio nello scratchpad della sessione (nessun file cancellato comunque).

## Decisioni lasciate all'utente

1. **Ruotare la password del database** `marco` (utente `marco@%`, `ALL PRIVILEGES`, MariaDB aperto a tutti gli IP): e' ancora nella cronologia git del tema. La docs non la riporta piu'.
2. **Pagine su moduli che non esistono** (Performance, Sigma, Ptv, Progressioni, Rating, Indennita*): tenerle come riferimento con la nota, spostarle in `_archive/` con `canonical:`, o toglierle dal tema. Non l'ho deciso io. I 448 link che ancora non risolvono sono per la maggior parte verso queste pagine e verso `docs/` di root (132), moduli esistenti con pagina assente (120), moduli assenti (67).
3. **Em dash (84 file) ed emoji (57 file)** nei documenti esistenti: la regola li vieta nel contenuto nuovo; una sostituzione di massa potrebbe toccare esempi di codice. Procedo solo se me lo dici.
4. **Posizione delle story**: il gate `audit-module-docs.sh` chiede `docs/bmad/stories/` (etichetta `STORY-MISPLACED` per `docs/stories/`), la policy chiede `docs/stories/`. Il tema ha 6 story in `stories/` e 2 in `bmad/stories/`. Va allineato il gate o la policy.
5. **Correggere `md-filenames.py check --paths`** perche' accetti anche cartelle, e il prompt 55 che le cita: oggi da' un falso zero.
6. **Fuori perimetro, segnalati**: `laravel/Themes/Zero/CONFLICT_RESOLUTION_SUMMARY.md` e `conflict-resolution-summary.md` nella radice del tema (stessa dimensione, 4.412 byte, doppione); `id: quality-gates-phpstan-swarm-2026-09-23` identico in 4 story (Zero, Lang, Media, Activity); `contribution_analysis.json` in radice cita ancora i vecchi nomi delle story (file generato da 14 MB, non riscritto).
7. **Ancora aperti dalla story precedente**: le due versioni `f1-world-champion-2026-theme-analysis` e `f1-world-champion-theme-analysis` divergono; `bmad/phpstan-merge-conflicts.md` e `bmad/laravel-13-upgrade.md` sono quasi vuote; le guide citano Tailwind v4 e Livewire 4 mentre il tema usa Tailwind 3.4, Alpine e Flowbite.

## Aperto

- Reindicizzazione QMD (`bash bashscripts/docs/llm-wiki-qmd.sh update`): la fa il coordinatore dello swarm.
- Second brain: promuovere come memoria la trappola "falso zero di `md-filenames.py check --paths <cartella>`", e la regola "collisione di sola maiuscola: rinominare con riscrittura dei soli riferimenti esatti".
- Nota di verifica 2026-10-20, ripresa dopo il limite di sessione: nel repository del tema c'e' un merge in corso (`.git/MERGE_HEAD`) con 5 file non risolti: `README.md`, `_archive/README.md`, `wiki/index.md`, `wiki/AGENTS.md` (cancellato lato nostro, perche' un'altra sessione l'ha rinominato `wiki/agents.md`) e questa story. Non l'ho risolto: la sessione che ha lanciato il pull ne e' proprietaria. In tutti i conflitti il lato "nostro" (HEAD) e' il piu' recente (rinomine `agents.md`, `metodi-duplicati-analisi-name-legacy.md`, sezioni Wave 4-6 di altre sessioni) e il lato `MERGE_HEAD` e' la mia versione precedente: la risoluzione corretta e' tenere HEAD. Finche' non e' risolto, la riga "Marker di merge 0" della tabella vale per il commit, non per la copia di lavoro. Il numero di file nella radice di `docs/` della tabella era sbagliato (7): corretto a 5.

## Wave 4 (2026-10-20, boy scout post-zero)

Gate PHPStan Modules verificato a zero (json + `[OK]`). Il tema resta presentazione-only ([README](../README.md)): nessun PHP da tipizzare qui. Continua l'ordine permanente su docs Zero (indice canonico = questo README; `index.md` superseded). Hub qualita' moduli: [phpstan-modules-zero-wave3](../../../../Modules/Xot/docs/stories/phpstan-modules-zero-wave3.story.md).

## Wave 5 (2026-10-20, docs-guardian themes)

Ordine permanente docs continuous su `laravel/Themes/*/docs/` (unico tema: Zero).

| Azione | Esito |
|---|---|
| Inventario temi | Solo `Themes/Zero` |
| Indice canonico | Ingresso [`../README.md`](../README.md); BMAD [`../bmad/00-index.md`](../bmad/00-index.md) **minuscolo**. Nessun `00-INDEX.md` (HARD lowercase + anti-collisione) |
| UPPERCASE md | `wiki/AGENTS.md` → [`../wiki/agents.md`](../wiki/agents.md); `_archive/METODI_DUPLICATI_ANALISI.md` → [`../_archive/metodi-duplicati-analisi-name-legacy.md`](../_archive/metodi-duplicati-analisi-name-legacy.md) |
| Scopo / perche' | Riscritti [`../bmad/scopo.md`](../bmad/scopo.md), bridge [`../bmad/purpose.md`](../bmad/purpose.md), focus [`../wiki/concepts/theme-zero-operating-focus.md`](../wiki/concepts/theme-zero-operating-focus.md) sul codice reale Quaeris + link Cms/Xot/Lang |
| Stack in indice BMAD | Allineato a TW 3.4 / Alpine / Flowbite / Vite 6 (tolto Flux/TW4 come "stack del tema") |

Nessun commit. Nessuna cartella `docs/` nuova.

## Wave 6 (2026-10-20, docs-guardian post Modules-zero)

Boy scout **continua** dopo `phpstan analyse Modules` a zero: Zero non ha PHP in `app/`; il lavoro e' solo docs/viste/asset. Indice canonico = [README](../README.md). Hub gate: [phpstan-modules-zero-wave3](../../../../Modules/Xot/docs/stories/phpstan-modules-zero-wave3.story.md). Cross-link Cms KEEP FO `Page\Show`: [Xot inventory](../../../../Modules/Xot/docs/bmad/livewire-to-filament-widgets-inventory.md).

<!-- gateguard: supersedes niente (append a story gia' attiva); linked from README.md related + inventory; user: "Study, update, organize docs under laravel/Themes/*/docs/" + "Permanent order: docs continuous without waiting for confirmation" -->
