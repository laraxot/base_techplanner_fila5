---
title: "[STORY] Audit completo del progetto: moduli, temi, sito (sintesi pubblica)"
type: story
status: in-progress
priority: high
created: 2026-10-29
updated: 2026-10-29
tags: [audit, qualita, autorizzazione, test, docs, bmad, second-brain]
qmd: "audit completo progetto moduli temi sito cause radice autorizzazione test documentazione piano priorita"
related:
  - ./mobile-ui-ux-pass.story.md
  - ../wiki/rules/git-forward-only.md
---

# Audit completo del progetto

Richiesta dell'utente (2026-10-29): «fa un audit completo molto approfondito di tutto il sito , di tutto il progetto, di modulo per modulo , di tema per tema».

> **Sintesi pubblica.** Questo repository è pubblico: qui stanno solo conteggi e cause radice in forma astratta. Le evidenze (`file:riga`, percorsi, azioni da fare) stanno nel report riservato del repo annidato `bashscripts` (`bashscripts/docs/audit/project-audit.md`, `findings-index.md`, `by-area/`), ignorato dal repo root. Non copiare qui i dettagli.

## Metodo

- Metriche meccaniche uguali per 22 aree (moduli e temi) + 5 audit già presenti in `bashscripts/tools/`.
- 23 revisori indipendenti in **sola lettura**: 14 su moduli, 4 su temi, 5 trasversali (sito/config, segreti/dipendenze, schema DB, test/qualità, tooling/governance).
- Verifica diretta nel codice di 12 dei finding più gravi.
- Solo analisi statica: nessun test, PHPStan, browser o accesso al database.

## Risultato

**500 finding grezzi:** 14 CRITICAL, 104 HIGH, 247 MEDIUM, 135 LOW. Sono grezzi: la stessa causa compare in più report. Le cause radice distinte sono 10.

| # | Causa radice (astratta) |
|---|---|
| RC1 | Autorizzazione di default aperta: `XotBasePolicy` definisce poco; Filament consente i metodi assenti e non chiama `before()`. Stesso difetto già chiuso in Employee. |
| RC2 | Materiale riservato tracciato nei repository (dettagli solo nel report riservato). |
| RC3 | Web root con codice eseguibile e upload senza filtro sul tipo. |
| RC4 | Strumenti di amministrazione raggiungibili senza controllo di accesso. |
| RC5 | Docs e test come dichiarazioni non verificate (story `done` false, test tautologici, «0 errori» PHPStan limitato a `Modules/`). |
| RC6 | Deriva dello schema dati (tipi UUID/interi, migrazioni cancellate ma ancora usate, `down()` distruttivo). |
| RC7 | Strascichi delle collisioni git (residui `f7ac8eda (.)` in Blade di Sixteen, script deprecati ancora eseguibili). |
| RC8 | TechPlanner (il prodotto) è l'area meno protetta: nessuna policy, test quasi assenti, bug nei flussi principali. |
| RC9 | Frontend: CSS compilato di Two senza la passata mobile, parity Sixteen, a11y. |
| RC10 | Codice dormiente o di altri progetti (AI, Meetup, TwentyOne, modelli «Municipal»). |

## Voti più bassi

TechPlanner e Two: test **E**. Sicurezza **E**: segreti e dipendenze. Il resto è tra B e D.

## Punti di forza da proteggere

PHPStan a livello massimo senza baseline né `ignoreErrors`; policy test veri in Employee e User; middleware di pagina fail-closed in Cms; login con rate limit; template Notify protetti da SSTI.

## Decisioni aperte (spettano all'utente)

Rimedio unico per RC1 (`Gate::before` strict in Xot o policy per modulo); chi è il «responsabile» delle assenze; quale tema servire (`pub_theme` è triplicato nel tenant); sorte di `config/{com,eu,net}` e di `Modules/test`; codice dormiente; monorepo vs repo annidati; azioni su segreti e storia dei repo (rotazione, riscrittura): **solo dell'utente**.

## Non verificato

Comportamento a runtime, validità delle credenziali, stato di produzione, schema reale del DB, resa su telefono, link `.md` rotti per singola area (44.478 nel totale).

## Prossimi passi

1. L'utente decide su RC1 e sulle azioni riservate.
2. Correzioni per priorità (P0 → P3) in story separate, con test. L'audit in sé non ha modificato codice; il primo blocco di P0 è descritto in «Correzioni P0» qui sotto.
3. Stabilizzare i gate Pest/lock/npm prima di `npm run build`; risoluzione dei 49 residui `f7ac8eda (.)` in Sixteen.

## Continuazione verificata

- Discovery Pest sbloccata correggendo i binding relativi e i duplicati Cms/Notify.
- `laravel/package-lock.json` rigenerato da `package.json` e validato come JSON.
- PHPStan Modules confermato a 0 errori.
- La suite completa ora esegue i test ma resta non verde per database di test assenti,
  data provider vuoto e test legacy dipendenti da Fixcity; dettagli nel report tecnico.

## Correzioni P0 (autorizzazione delle azioni di amministrazione)

Stessa causa radice di Employee: Filament apre ciò che non viene negato. Un solo trait,
`Modules\Xot\Filament\Traits\SuperAdminOnlyTrait` (`canAccess()` solo per `super-admin`), è applicato alle
pagine che eseguono Artisan o toccano `.env`, con il controllo ripetuto nei metodi Livewire pubblici.

| Modulo | Cosa è stato chiuso | Story |
|---|---|---|
| Xot | pagine operative (Artisan, `.env`, health), `EnvWidget`; scrittura di `.env` con escape e solo chiavi dichiarate | `Xot/docs/stories/superadmin-only-operational-pages.story.md` |
| Job | pagina di stato code e widget: comandi Artisan solo da allowlist, accesso super-admin | `Job/docs/stories/job-admin-authorization.story.md` |
| User | password, verifica email, disattiva e assegnazione ruoli passano dalla policy; `super-admin` non assegnabile da chi non lo è | `User/docs/stories/user-actions-authorization.story.md` |
| Notify | cluster `Test` e `SettingPage`: solo super-admin | `Notify/docs/stories/test-cluster-authorization.story.md` |
| Geo | `SettingPage`: solo super-admin | `Xot/docs/stories/superadmin-only-operational-pages.story.md` |

Verifica: PHPStan su `Modules` exit 0. Test Pest scritti ma **non eseguiti** (`.env.testing` punta a MySQL).
Non committato. Regola: i repo dei moduli sono pubblici, quindi le story dei moduli non elencano debolezze
ancora aperte; quelle stanno nel report riservato (repo `bashscripts`).
