---
title: "Audit TechPlanner 2026-11-05 — sintesi, confidenza e punteggi"
type: audit
status: review
created: 2026-11-05
updated: 2026-11-05
tags: [audit, executive-summary, confidenza, techplanner, roadmap]
qmd: "audit techplanner 2026-11-05 executive summary confidenza punteggi stato progetto pronto produzione"
related:
  - ./ARCHITECTURE.md
  - ./FUNCTIONAL_COVERAGE.md
  - ./BACKLOG_AND_ROADMAP.md
  - ./RELEASE.md
  - ./TEST_RESULTS.md
  - ../stories/project-audit.story.md
---

# Audit TechPlanner — 2026-11-05

**Sintesi.** TechPlanner è un gestionale per verificatori di apparecchi radiologici costruito su una base Laraxot
ampia (17 moduli). Il «PHPStan max, 0 errori» dichiarato nei docs non regge con il lock attuale: 10.121 errori, perché
Larastan è disattivato nella configurazione. Il prodotto vero, il modulo TechPlanner, era
la parte più fragile: fino a oggi **non si poteva registrare una verifica** — la funzione per cui esiste — e la
lista clienti andava in errore alla prima visita. Entrambi i difetti sono corretti in questa sessione, con 12 test
nuovi che falliscono sul codice originale (9 su 12) e passano dopo; la suite di TechPlanner passa per intero (48). Non è pronto per la produzione: mancano autorizzazioni per ruolo nel modulo, protezione dalla
cancellazione a cascata, la vista delle scadenze, una CI su `dev` e un deploy reversibile; restano aperti punti
di sicurezza che richiedono decisioni del proprietario (dettagli solo nel report riservato).

Questo audit parte da quello del 2026-10-29 (statico, 500 finding, `../stories/project-audit.story.md`), ne
riverifica i punti P0 sul HEAD `19909e62b` e aggiunge ciò che mancava: ricostruzione del prodotto, esecuzione
degli strumenti, correzioni con test.

## Documenti

| File | Contenuto |
|---|---|
| [ARCHITECTURE.md](./ARCHITECTURE.md) | Stack, strati, inventario dei 17 moduli, dipendenze e cicli, igiene del repo |
| [FUNCTIONAL_COVERAGE.md](./FUNCTIONAL_COVERAGE.md) | Cosa fa il prodotto, stato di ogni funzione, user journey |
| [BACKLOG_AND_ROADMAP.md](./BACKLOG_AND_ROADMAP.md) | Gap P0-P3 con criteri di accettazione, roadmap in 6 fasi, percorso critico; chiusi il 2026-11-10/11 |
| [RELEASE.md](./RELEASE.md) | Rilascio in produzione: azioni preliminari, procedura `deploy.sh`, ritorno indietro, novità per gli utenti |
| [TEST_RESULTS.md](./TEST_RESULTS.md) | Strumenti eseguiti, esiti, limiti dell'ambiente |
| Manuale d'uso | Documento «TechPlanner — Manuale d'uso» (Claude Docs) |
| Riservato | `bashscripts/docs/audit/reverification-2026-11-05.md` (stato dei P0 di sicurezza) |

## Area per area

| Area | Stato | Confidenza | Problemi critici aperti | Priorità |
|---|---|---|---|---|
| Prodotto TechPlanner | Parziale; verifiche e distanze ora funzionanti | Media-alta (codice letto per intero nelle parti chiave, test) | Nessuna policy; cancellazione a cascata | P1 |
| Sicurezza | Migliorata (P0 di Job/Xot/Notify chiusi) | Media (statico) | Materiale riservato ancora tracciato; endpoint nel docroot | P0 |
| Dati e migrazioni | Convenzione coerente, derive storiche | Media | FK verifiche corretta: serve conteggio in produzione | P0/P1 |
| Test | Molti test nei moduli base; TechPlanner 48 verdi; Geo 352 falliti per dipendenza da un altro progetto | Alta (eseguiti) | Serve PHP 8.4; test di Geo legati alla connessione `fixcity` | P1 |
| DevOps | Debole | Alta (script letti) | Deploy con `composer update` in produzione, nessuna CI su `dev` | P2 |
| Architettura | Buona nei pattern, cicli tra moduli base | Media | — | P3 |
| Frontend/UX pannello | Funzionale, nessuna dashboard | Bassa (nessuna prova nel browser) | — | P1 |
| Documentazione | Abbondante, poco affidabile | Alta | Istruzioni agenti con versioni errate | P3 |

## Punteggi motivati (0-100)

| Dimensione | Punti | Motivazione | Provvisorio? |
|---|---:|---|---|
| Completezza funzionale | 45 | Ciclo base (cliente → apparecchio → verifica → chiamata → appuntamento) ora chiuso; mancano scadenze, dashboard, tecnici | No |
| Correttezza | 60 | Due difetti bloccanti trovati e corretti; altri segnalati dall'audit precedente non riverificati | Sì |
| Sicurezza | 40 | Default aperto nel prodotto (0 policy), materiale riservato tracciato | Sì (nessun test dinamico) |
| Qualità del codice | 55 | Tipizzazione curata, ma 10.121 errori PHPStan senza Larastan (2.019 fuori dai test); duplicati e residui di altri progetti | No |
| Test | 40 | Prodotto: 48 test verdi (12 aggiunti oggi) su 260 file PHP; serve PHP 8.4 non dichiarato in `composer.json` | No |
| Operatività | 25 | Deploy non riproducibile, nessun backup/rollback documentato | No |
| Documentazione | 40 | Molta, spesso non verificata; ora esiste un manuale d'uso | No |

## Matrice conoscenza e confidenza

| Area | Conoscenza | Confidenza | Evidenze | Incognite | Per aumentare la confidenza |
|---|---:|---:|---|---|---|
| Modulo TechPlanner | 80% | 80% | Modelli, form, tabelle, migrazioni chiave letti; 48 test eseguiti, prova di regressione | Comportamento nel browser; dati reali | Prova nel pannello su copia del DB |
| Xot / convenzioni | 60% | 70% | XotBaseResource, Migration, PanelProvider letti; story recenti | Policy e Gate globali | Leggere `XotBasePolicy` e i provider |
| Geo (distanze) | 50% | 80% | Scope letto e corretto, test | Geocoder esterno | Test con geocoder finto |
| Sicurezza | 45% | 55% | Riverifica statica dei P0 | Produzione (vhost, `.env`) | Ispezione del server |
| Dati di produzione | 5% | 20% | Nessun accesso | Righe in `device_verifications`, colonne reali | Dump dello schema di produzione |
| Temi / front office | 15% | 40% | Solo audit precedente | Tutto | Audit dedicato con browser |

Percentuali stimate sulla quota di file rilevanti letti e sulla presenza di prove eseguite, non misurate da uno
strumento.

## Le 12 domande, in breve

1. **Che cos'è?** Un gestionale per verifiche periodiche di apparecchi radiologici presso clienti sanitari.
2. **Come funziona?** Pannello Filament `techplanner/admin` su moduli Laraxot; dati per cliente; distanze con Haversine in SQL (ARCHITECTURE).
3. **Livello di completamento?** Circa metà delle funzioni attese da un verificatore (FUNCTIONAL_COVERAGE).
4. **Cosa manca?** Policy, scadenze, dashboard, protezione cancellazioni, tecnici/agenda, deploy affidabile (BACKLOG).
5. **Cosa non funzionava?** Verifiche non salvabili, lista clienti in errore, km errati, appuntamenti/chiamate orfani: corretti oggi.
6. **Rischi nascosti?** Cascata di cancellazioni, materiale riservato tracciato, collisioni di maiuscole (1.113 percorsi), deploy con `composer update`.
7. **Cosa migliorare?** CI su `dev`, ambiente PHP 8.4, geocoding in coda, deduplica degli import.
8. **Massimo valore?** TPL-04 + TPL-03 (proteggono i dati), poi FUN-01 (scadenze: il motivo d'uso del prodotto).
9. **Ordine?** Percorso critico in BACKLOG_AND_ROADMAP.
10. **Per la produzione?** Fasi 1, 3 e 5 della roadmap.
11. **Cosa non abbiamo capito?** Requisiti reali (rapporti di verifica, ruolo dei tecnici), dati e server di produzione, temi.
12. **Come aumentare la confidenza?** Copia anonimizzata del DB, ambiente PHP 8.4, prova guidata nel pannello con un utente reale.

## Limiti di questo audit

PHP 8.4 compilato dai sorgenti in un container; dipendenze dal lock tramite clone git (Packagist non raggiungibile);
nessun database MySQL, nessun accesso alla produzione, nessun browser sull'applicazione; `composer audit` non eseguibile. Le conclusioni sulla produzione sono marcate come tali.
