---
title: "Wiki Markdown — frontmatter YAML obbligatorio"
type: rule
tags: [wiki, markdown, frontmatter, github, qmd, obsidian, bmad]
created: 2026-06-05
updated: 2026-06-05
qmd: "wiki markdown frontmatter yaml github issue discussion qmd tags mandatory agent"
issues:
  - "https://github.com/laraxot/base_techplanner_fila5/issues/11"
discussions:
  - "https://github.com/laraxot/base_techplanner_fila5/discussions/12"
related:
  - ../bmad/story-github-links-mandatory.md
  - ../bmad/architecture-wiki-frontmatter-github.md
  - ../../.schema/WIKI_SCHEMA.md
---

# Frontmatter obbligatorio su ogni `.md` wiki

## Regola

**Ogni** file `.md` creato o modificato in `docs/wiki/`, `Modules/*/docs/`, `Themes/*/docs/`, `bashscripts/docs/wiki/` deve iniziare con blocco YAML `---` … `---`.

## Template migliorato (canon — **sempre** prima riga del file)

```yaml
---
title: "BMAD Architecture — titolo leggibile"
type: index
tags: [bmad, architecture, migrations, data, frontmatter, github]
module: Fixcity
created: 2026-06-05
updated: 2026-06-05
qmd: "frase densa per llm-wiki-qmd search — keyword obbligatorie"
story: STORY-140
issues:
  - "https://github.com/laraxot/base_fixcity_fila5/issues/248"
discussions:
  - "https://github.com/laraxot/base_fixcity_fila5/discussions/262"
related:
  - ../bmad/architecture.md
  - ../rules/data-sacred-no-destructive-db.md
sources: []
---
```

## Regola topic-specific sui link GitHub

`issues:` e `discussions:` non sono campi decorativi: devono puntare a thread GitHub reali che parlano dello stesso argomento del file.

Vietato nel frontmatter reale:

- URL base senza numero, ad esempio `https://github.com/laraxot/base_fixcity_fila5/issues/`;
- placeholder `N`, `<repo>`, `OWNER/REPO`;
- issue/discussion di un altro tema non collegato al contenuto.

Se non trovi un thread pertinente, crealo prima nel repo owner e poi incolla il link numerato.

## Riferimenti esterni (standard de-facto)

- GitHub Docs: [Using YAML frontmatter](https://docs.github.com/en/contributing/writing-for-github-docs/using-yaml-frontmatter)

Nota: noi non usiamo la **stessa** schema GitHub Docs (es. `versions`), ma adottiamo lo **stesso principio**: frontmatter YAML come metadati validabili e consistenti.

| Campo | Obbligatorio | Note |
|-------|:------------:|------|
| `title` | ✓ | Allinea H1 |
| `type` | ✓ | `index`, `architecture`, `concept`, `rule`, `memory`, `skill`, `how-to` |
| `tags` | ✓ | Array, lowercase |
| `created` / `updated` | ✓ | ISO `YYYY-MM-DD` — **non** nel filename |
| `qmd` | ✓ | Memoria LLM wiki |
| `issues` | ✓ | ≥1 URL **completo** `.../issues/<N>` **sull'argomento del file** |
| `discussions` | ✓ | ≥1 URL **completo** `.../discussions/<N>` pertinente |
| `story` | consigliato | `STORY-NNN` |
| `module` | consigliato | Owner modulo/tema |
| `related` | consigliato | Backlink relativi (DRY) |

Validazione: `bashscripts/tools/validate-wiki-frontmatter.sh path/to/file.md`  
Ingest: `bashscripts/docs/llm-wiki-qmd.sh update`

## Validazione YAML (extra, quando serve)

Se devi controllare **solo** la sintassi YAML (prima di validare lo schema progetto):

- `https://onlineyamltools.com/validate-yaml`
- `https://www.yamllint.com/`

## Campi obbligatori

| Campo | Scopo |
|-------|--------|
| `title` | Nome umano + Obsidian graph |
| `type` | Routing indici e Dataview |
| `tags` | QMD + grep semantico |
| `created` / `updated` | Storia documento (ISO date) |
| `qmd` | **Memoria LLM** — frase ricerca per `llm-wiki-qmd.sh search` |
| `issues` | ≥1 URL issue **specifica** (non `.../issues/` senza numero) — stesso argomento del file |
| `discussions` | ≥1 URL discussion **specifica** — creare se manca |

## Campi consigliati

- `story` — `STORY-NNN` quando esiste tracciamento BMAD
- `module` — `Fixcity`, `Sixteen`, `Xot`, …
- `related` — backlink relativi (DRY, no duplicati concetto)
- `sources` — citazione `docs/raw/`

## GitHub (perché)

| Livello | Intent |
|---------|--------|
| **Politica** | Doc senza issue = lavoro invisibile al team |
| **Zen** | Il file wiki è seme; issue/discussion è radice sociale |
| **BMAD** | Stesso spirito di `## GitHub (tracciamento)` nelle story |

Se non esiste issue: `gh issue create` sul repo owner **prima** di considerare la pagina completa.

## Vietato

- `.md` wiki senza frontmatter
- URL bare `https://github.com/.../issues/` o `.../discussions/` **senza numero**
- Issue/discussion **non pertinenti** all'argomento del file (link “a caso”)
- Solo «vedi issue #N» nel body **senza** URL in `issues:` / `discussions:`
- Date nel **filename** (eccetto `README.md`)

## Workflow link (se mancano)

1. `gh issue list --repo <owner>/<repo> --search "<topic>"`
2. Se vuoto → `gh issue create` sul repo owner
3. Discussion pertinente → crea o collega thread esistente
4. Inserisci URL nel frontmatter **prima** di considerare il file completo

Memoria: [frontmatter-github-links-mandatory-standing.md](../memories/frontmatter-github-links-mandatory-standing.md)

## Validazione

```bash
bashscripts/tools/validate-wiki-frontmatter.sh docs/wiki/bmad/architecture.md
```

## Collegamenti

- [architecture-wiki-frontmatter-github.md](../bmad/architecture-wiki-frontmatter-github.md)
- [story-github-links-mandatory.md](../bmad/story-github-links-mandatory.md)
- [WIKI_SCHEMA.md](../../.schema/WIKI_SCHEMA.md)
