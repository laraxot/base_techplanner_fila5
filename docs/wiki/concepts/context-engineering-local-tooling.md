---
title: "Context Engineering Local Tooling"
type: concept
updated: 2026-05-06
tags: [context-engineering, skills, qmd, second-brain]
---

# Context Engineering Local Tooling

## Decisione

Il progetto usa context engineering come disciplina operativa, non come accumulo di
nuovi strumenti nel prompt. Il contesto deve restare piccolo, verificabile e
recuperabile just-in-time.

## Setup adottato

Installazione minimale del Context Engineering Kit:

```bash
npx skills add NeoLabHQ/context-engineering-kit \
  --skill context-engineering reflect memorize update-docs write-concisely \
  --agent codex \
  --copy \
  --yes
```

File installati:

- `.agents/skills/context-engineering/SKILL.md`
- `.agents/skills/reflect/SKILL.md`
- `.agents/skills/memorize/SKILL.md`
- `.agents/skills/update-docs/SKILL.md`
- `.agents/skills/write-concisely/SKILL.md`

`skills-lock.json` registra hash e source delle skill.

## Perche' solo queste skill

- `context-engineering`: regole su contesto finito, progressive disclosure e
  tool output ad alta densita'.
- `reflect` e `memorize`: ciclo "correggi, rifletti, salva lezione" dopo errori
  reali.
- `update-docs` e `write-concisely`: aggiornamento wiki/docs senza gonfiare i
  file con duplicazioni.

Non e' stato installato l'intero marketplace: 63 skill avrebbero aumentato
rumore, superficie manutentiva e rischio di context rot.

## Regole operative

1. Prima di modificare codice, leggere wiki root e wiki locale del modulo/tema.
2. Usare `qmd search` o `rg` mirati; evitare dump massivi di log, HTML o docs.
3. Dopo ogni fix PHPStan, salvare il pattern appreso nella wiki owner.
4. Non usare ignore, baseline o `@phpstan-ignore` per chiudere errori.
5. I gate tecnici restano fonte di verita': PHPStan, PHPMD phar, PHPInsights e,
   se il cambio tocca UI/runtime, Playwright/Puppeteer.

## Limiti noti

- `qmd status` funziona ma tenta il fallback CPU per assenza Vulkan/GPU.
- PHPInsights globale puo' andare in timeout sul `parallel-lint` interno; in quel
  caso eseguire PHPInsights mirato sul file modificato e registrare il blocker.
- PHPMD phar su PHP 8.3 puo' stampare deprecation interne Symfony pur uscendo con
  codice 0 e senza violation.
