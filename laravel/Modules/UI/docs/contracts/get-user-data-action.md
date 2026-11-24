---
title: "GetUserDataAction — contratto"
type: contract
owner: UI
status: accepted
updated: 2026-11-24
action: "Modules\\UI\\Actions\\GetUserDataAction"
qmd: "GetUserDataAction utente autenticato UserData avatar ruolo permessi settings profile"
---

# GetUserDataAction

Costruisce il DTO `UserData` dell'utente autenticato per la UI. Codice: `app/Actions/GetUserDataAction.php:24-79`.

## Input

- Nessun parametro. Legge l'utente da `Auth::user()`.

## Output

- `?UserData`: `null` se non c'è un utente `UserContract`; altrimenti id, nome, email, avatar, primo ruolo, nomi dei permessi, settings.

## Invarianti

| ID | Regola | Prova nel codice | Test |
|---|---|---|---|
| `UI-USER-INV-1` | Nessun utente autenticato, o un utente che non è `UserContract`, produce `null`. | righe 28-29 | `tests/Unit/GetUserDataActionTest.php:68`, `:72` |
| `UI-USER-INV-2` | L'avatar è l'URL del profilo se il profilo è già caricato e l'URL non è vuoto; altrimenti `profile_photo_path` se stringa non vuota; altrimenti `null`. | righe 34-43 | `tests/Unit/GetUserDataActionTest.php:90`, `:99` |
| `UI-USER-INV-3` | Il ruolo è il primo dei ruoli dell'utente, non tutti; `null` se non ne ha. | righe 47-50 | `tests/Unit/GetUserDataActionTest.php:108`, `:117` |
| `UI-USER-INV-4` | `permissions` è l'elenco dei nomi di `getAllPermissions()` (permessi diretti e via ruolo, per semantica Spatie). | riga 65 | `tests/Unit/GetUserDataActionTest.php:126` |
| `UI-USER-INV-5` | `settings` è `profile.extra` se è un array, altrimenti `[]`. | righe 53-57 | Test: nessuno |

## Effetti collaterali

Nessuno sul dato: sola lettura. Il profilo è letto solo se già caricato (`relationLoaded`); `getRoleNames()` e `getAllPermissions()` possono eseguire query se Spatie non ha la cache. Nessuna scrittura, evento o coda.

## Errori

- Nessuna eccezione propria. Un utente non tipizzato non genera errore ma `null`.

## Non fa

- Non carica la relazione `profile`: se non è caricata l'avatar cade su `profile_photo_path`.
- Non filtra i permessi per guard o per team.
