---
title: "Node.js node_modules — policy root-only"
type: concept
created: 2026-05-04
updated: 2026-05-04
tags: [node, npm, tooling, ai-agents, policy]
related:
  - "../../../_bmad-output/implementation-artifacts/8-84-agents-node-modules-consolidation-root.md"
---

# Policy: `node_modules/` solo alla root

## Regola

> **Un solo `node_modules/`** alla root del progetto (`/var/www/_bases/base_fixcity_fila5/node_modules/`).
> Nessuna sottodirectory deve avere il proprio `node_modules/` eccetto i temi Vite.

## Motivazione

Node.js risolve `require('pacchetto')` risalendo l'albero delle directory:
1. `./node_modules/pacchetto`
2. `../node_modules/pacchetto`
3. `../../node_modules/pacchetto`
4. …fino alla root del filesystem

Quindi qualsiasi script in `bashscripts/ai/.agents/` **trova già** i pacchetti installati in
`/var/www/_bases/base_fixcity_fila5/node_modules/` senza bisogno di una copia locale.

## Caso concreto — `.agents/node_modules/`

`bashscripts/ai/.agents/package.json` conteneva:
```json
{
  "@kilocode/plugin": "7.2.25",
  "@opencode-ai/plugin": "1.14.28",
  "playwright": "^1.59.1",
  "puppeteer": "^24.40.0"
}
```

Questo creava una cartella `node_modules/` da **128 MB** che:
- Duplicava `playwright` e `puppeteer` già presenti alla root
- Aggiungeva `@kilocode/plugin` e `@opencode-ai/plugin` solo lì

**Fix applicato (story 8-84)**:
- `@kilocode/plugin` e `@opencode-ai/plugin` spostati nel root `package.json`
- `bashscripts/ai/.agents/package.json` sostituito con un file stub `_note`
- `bashscripts/ai/.agents/node_modules/` eliminato

## Eccezioni ammesse

| Percorso | Motivo |
|----------|--------|
| `laravel/Themes/Sixteen/node_modules/` | Vite build richiede `node_modules` locale per resolve dei plugin CSS/JS |
| `laravel/Themes/TwentyOne/node_modules/` | Stessa ragione |
| Altri temi con `vite.config.js` | Stessa ragione |

## Cosa NON fare

- `npm install` dentro `bashscripts/ai/.agents/`
- `npm install` dentro `bashscripts/ai/inactive-skills/`
- `npm install` dentro qualsiasi cartella sotto `bashscripts/` che non sia un tema Vite
- Aggiungere dipendenze JS in `package.json` di sottodirectory quando il pacchetto è già (o può essere) nella root

## Come aggiungere una nuova dipendenza AI-tool

```bash
# Dalla root del progetto:
cd /var/www/_bases/base_fixcity_fila5
npm install --save @nome/plugin
# poi testare:
node -e "require('@nome/plugin')"
```

## Guardrail automatico

Se un AI tool ricrea `package.json` in `.agents/`:
1. Non eseguire `npm install` in quella directory
2. Aggiungere le dipendenze alla root `package.json` 
3. Usare il file stub `_note` in `.agents/package.json`
