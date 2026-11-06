---
title: "Audit ownership della documentazione condivisa"
type: audit
status: open
scope: "Separazione tra bashscripts condiviso e documentazione del progetto"
tags: [documentation, ownership, second-brain, bashscripts, modules, themes]
related:
  - ../wiki/concepts/second-brain-canonical-operating-model.md
  - ../wiki/rules/module-documentation-pattern.md
  - ../../laravel/Modules/TechPlanner/docs/wiki/audits/seo-head-deep-verification.md
---

# Audit ownership della documentazione condivisa

## Regola

`bashscripts` è una superficie condivisa tra più progetti. Può contenere procedure,
template, regole generiche e strumenti; non deve contenere brand, host, tenant,
misurazioni runtime o decisioni appartenenti a un singolo progetto.

La conoscenza specifica deve vivere nel relativo owner:

- progetto trasversale: `docs/`;
- modulo: `laravel/Modules/<Module>/docs/`;
- tema: `laravel/Themes/<Theme>/docs/`.

## Correzione applicata

`seo-head-deep-verification.md` è stato trasferito da
`bashscripts/ai/wiki/audits/` a
`laravel/Modules/TechPlanner/docs/wiki/audits/`, perché contiene dati di
Sottana Service, Theme Two, TechPlanner e dell'ambiente runtime locale.

## Candidati da classificare

La scansione ha trovato altri report nella directory condivisa che contengono
indicatori del progetto corrente (`Sottana Service`, `TechPlanner`, host locali,
`config/local/techplanner` o riferimenti a FixCity):

- audit live e audit completo del progetto;
- audit sicurezza/infrastruttura;
- audit del modulo TechPlanner e degli altri moduli presenti in questo workspace;
- audit del tema Two e degli altri temi presenti nel workspace;
- audit di internazionalizzazione con percorsi e contenuti locali.

## Mappa owner proposta

| Sorgente condivisa | Owner corretto |
| --- | --- |
| `audits/site-live-audit.md` | `docs/audits/site-live-audit.md` |
| `audits/project-audit.md` | `docs/audits/project-audit.md` oppure consolidamento in `project-complete-audit.md` |
| `audits/security-infra-audit.md` | `docs/audits/security-infra-audit.md` |
| `audits/units/module-techplanner-audit.md` | `laravel/Modules/TechPlanner/docs/wiki/audits/` |
| `audits/units/module-seo-audit.md` | `laravel/Modules/Seo/docs/wiki/audits/` |
| `audits/units/theme-two-audit.md` | `laravel/Themes/Two/docs/wiki/audits/` |
| `audits/units/theme-*-audit.md` | `laravel/Themes/<Theme>/docs/wiki/audits/` |
| `audits/units/module-*-audit.md` | `laravel/Modules/<Module>/docs/wiki/audits/` |

`project-audit.md` e `project-complete-audit.md` sono candidati al consolidamento:
non vanno mantenute due fonti equivalenti dopo la migrazione.

Questi file non vengono rinominati o cancellati automaticamente: prima va assegnato
ogni report al suo owner, aggiornato l'indice e verificati i riferimenti entranti.
La migrazione deve essere forward-only e mantenere una sola fonte canonica.

## Gate di prevenzione

Prima di aggiungere un documento a `bashscripts/ai/wiki/` verificare:

1. può essere riutilizzato senza cambiare brand, host, modulo o tema?
2. contiene solo procedure e non risultati di una scansione concreta?
3. tutti i path e gli esempi sono portabili tra progetti?

Se una risposta è negativa, il documento appartiene al progetto, modulo o tema
owner e deve usare frontmatter, indice e naming `lowercase-kebab-case.md` locali.
