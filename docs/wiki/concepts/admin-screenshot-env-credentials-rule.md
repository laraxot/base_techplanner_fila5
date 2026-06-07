---
name: admin-screenshot-env-credentials-rule
description: Le credenziali locali per screenshot/admin automation vanno lette da variabili dedicate nel file laravel/.env, mai hardcodate negli script
type: concept
---

# Admin Screenshot Env Credentials Rule

Per automazione locale, login admin e screenshot devono leggere credenziali da variabili dedicate nel file `laravel/.env`.

## Variabili canoniche

- `FIXCITY_ADMIN_EMAIL`
- `FIXCITY_ADMIN_PASSWORD`

## Regola

- usare solo queste chiavi negli script di login/admin screenshot;
- non duplicare credenziali in script, test o documentazione;
- nei documenti wiki citare i nomi delle variabili, non i valori.
