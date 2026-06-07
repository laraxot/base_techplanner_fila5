---
title: "Theme Two homepage collision fix"
type: memory
tags: [theme-two, git, merge, folio, sushi, vite, second-brain]
related:
  - ../how-to/git-merge-marker-sweep.md
  - ../rules/git-forward-only.md
  - ../../../laravel/Themes/Two/docs/conflict-resolution.md
---

# Theme Two homepage collision fix

## Esito

`http://127.0.0.1:8000/it` torna **HTTP 200** dopo sweep marker + repair layout + dedup JSON Sushi.

## Lezioni

1. **ParseError `<<`** — marker in Blade Folio, non PHPStan.
2. **Vite manifest** — layout merge produce `@vite` senza secondo argomento `themes/Two` o HTML duplicato.
3. **MultipleRecordsFoundException** — duplicati Sushi: `sections/1.json` + `sections/header.json` con stesso slug; su `dev` esistono solo `header.json` e `footer.json`.
4. **Sweep automatico** — `resolve-conflict-markers.py` risolve ~4k file; verificare sempre layout e JSON CMS a mano.
5. **Forward-only** — `git show dev:path` per studio; scrittura con patch/Python, mai `git checkout --`.

## Checklist post-fix

```bash
rg '^<<<<<<< ' laravel --glob '*.{php,blade.php,json}'
curl -sI http://127.0.0.1:8000/it | head -1
python3 -m json.tool laravel/config/local/techplanner/database/content/pages/home.json
```
