---
title: "Copertura funzionale di TechPlanner (audit 2026-11-05)"
type: audit
status: review
created: 2026-11-05
updated: 2026-11-05
tags: [audit, prodotto, funzionalita, user-journey, techplanner]
qmd: "copertura funzionale techplanner clienti apparecchi verifiche chiamate appuntamenti distanza import user journey completezza"
related:
  - ./README.md
  - ./ARCHITECTURE.md
  - ./BACKLOG_AND_ROADMAP.md
  - ../../laravel/Modules/TechPlanner/docs/stories/device-verifications-fix.story.md
---

# Copertura funzionale di TechPlanner

**Che cos'è il prodotto.** Un gestionale per chi esegue verifiche periodiche su apparecchi radiologici presso
clienti (studi dentistici, ambulatori): anagrafica clienti con ASL/ULSS competente, direttore sanitario,
rappresentante e sede legale; apparecchi con kV, mA e matricole di tubo e cuffia; storico delle verifiche con
scadenza della successiva; telefonate e appuntamenti; ordinamento dei clienti per distanza per organizzare i giri.
Lo si ricava dai modelli (`Device`: `headset_serial`, `tube_serial`, `kv`, `ma`), dagli import (colonne dell'archivio
Access: `az_ulss_competente`, `DataPrimaVerifica`) e dai comandi `ImportAccessDataCommand`/`AnalyzeMdbCommand`.
Non esiste un documento di requisiti: tutto ciò che segue è ricostruito dal codice.

Manuale d'uso per gli operatori: documento «TechPlanner — Manuale d'uso» (Claude Docs, 2026-11-05).

## Stato delle funzionalità

Legenda: **V** completa e verificata da test · **I** implementata, non verificata a runtime · **P** parziale ·
**D** presente ma difettosa · **N** progettata, non implementata · **?** da validare con i requisiti.

| Funzionalità | Stato | Evidenza | Gap |
|---|---|---|---|
| Elenco clienti, ricerca, filtri Cessato/Attività | I | `ListClients::getTableFilters`, `ClientsTable` | — |
| Colonna Distanza senza punto di partenza | **V** (corretta il 2026-11-05) | `ClientDistanceTest`; prima: `LogicException` alla prima visita (TPL-01) | — |
| Ordina per distanza da un cliente | **V** (corretta il 2026-11-05) | `GeoTrait::scopeWithDistance`; prima: km × 1,1515 e clienti senza coordinate in cima | — |
| Aggiorna coordinate (tutti / selezione) | I | `ListClients::populateAllCoordinates`, `UpdateCoordinatesBulkAction` | Chiamate sincrone al geocoder dentro la richiesta HTTP (PERF-01) |
| Creazione/modifica cliente | I | `ClientForm` (sezioni azienda, indirizzo, contatti) | Nessuna validazione di P.IVA/CF (FUN-05) |
| Import clienti / apparecchi / direttori sanitari | I | `Filament/Imports/*` | Ogni riga crea un record: reimport = duplicati (FUN-04) |
| Apparecchi: anagrafica | I | `DeviceForm`, `DevicesTable` | — |
| **Verifiche periodiche** | **V** (corretta il 2026-11-05) | `DeviceVerificationTest`; prima: impossibile salvare (relazione inesistente, campo obbligatorio senza input, colonne sbagliate) | Nessuna vista «apparecchi in scadenza» (FUN-01) |
| Stato «da verificare» dell'apparecchio | **V** | `Device::needs_verification`, test | Non mostrato in nessuna tabella (FUN-01) |
| Telefonate | I → **P** | `PhoneCallForm`; cliente selezionabile e relazione `client()` aggiunti il 2026-11-05 | Esito della chiamata non strutturato (solo note) |
| Appuntamenti | **P** | `AppointmentForm`; cliente selezionabile aggiunto il 2026-11-05 | Nessun tecnico assegnato, nessuno stato, nessun calendario (FUN-02) |
| Referenti: direttori sanitari, rappresentanti e sedi legali | I | Resource e relation manager | — |
| Modelli e-mail, invio notifiche a una selezione di clienti | I/? | `MailTemplateResource`, `SendRecordsNotificationBulkAction` | L'audit del 2026-10-29 segnala invii non effettivi (NTF-01, non riverificato) |
| Dashboard del pannello | N | `Dashboard extends XotBaseDashboard {}` | Nessun indicatore: scadenze, appuntamenti di oggi (FUN-03) |
| Mappa clienti | ? | `ClientMapWidget`, `MapWidget`, `CoordinatesWidget` presenti; `getHeaderWidgets()` di ListClients è vuoto | Non raggiungibili dall'interfaccia |
| Form contatti del sito | I | `Actions/Contact/*`, 2 file di test | — |
| Tecnici (`Worker`) e assegnazione cliente (`assigned_worker_id`) | N | Modello e colonna presenti, nessuna UI | Da validare con i requisiti |
| Rapporto di verifica (PDF/documento per il cliente) | ? | Nessun codice | Probabile requisito di un verificatore: da validare |
| Cancellazione cliente | **D** | FK `onDelete('cascade')` su apparecchi, chiamate, appuntamenti, referenti; nessun `SoftDeletes` | Perdita irreversibile dello storico (TPL-03) |
| Autorizzazione per ruolo | **D** | 0 policy nel modulo | Chiunque acceda al pannello vede e modifica tutto (TPL-04) |

## User journey end-to-end

| # | Journey | Completabile oggi? | Blocco |
|---|---|---|---|
| J1 | Importare l'archivio clienti e apparecchi | Sì, con rischio duplicati | FUN-04 |
| J2 | Registrare la verifica di un apparecchio e sapere quando tornare | **Sì dal 2026-11-05** (prima: no) | Manca la lista delle scadenze (FUN-01) |
| J3 | Trovare gli apparecchi in scadenza nel mese | **No** | FUN-01 |
| J4 | Chiamare il cliente, annotare, fissare l'appuntamento | Sì | Nessun esito strutturato |
| J5 | Organizzare il giro per vicinanza | **Sì dal 2026-11-05** (prima: errore alla prima visita, km errati) | — |
| J6 | Assegnare il giro a un tecnico e vederlo in agenda | **No** | FUN-02 |
| J7 | Consegnare al cliente il rapporto della verifica | **No** (da validare) | — |
| J8 | Limitare cosa vede un operatore rispetto a un amministratore | **No** | TPL-04 |
