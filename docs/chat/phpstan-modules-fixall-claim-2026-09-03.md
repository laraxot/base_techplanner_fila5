# Claim: PHPStan analyse Modules — fix all findings

Data: 2026-09-03
Agente: claude-sonnet-5 (sessione interattiva utente)

## Scope
`cd laravel && ./vendor/bin/phpstan analyse Modules --memory-limit=-1` riportava 1546 errori
(livello configurato in phpstan.neon, invariato).

Distribuzione per modulo:

| Modulo | Errori |
|---|---|
| Notify | 721 |
| Xot | 671 |
| UI | 65 |
| User | 31 |
| Tenant | 21 |
| Activity | 14 |
| Lang | 8 |
| Cms | 5 |
| Geo | 4 |
| Employee | 2 |
| Job | 2 |
| Media | 1 |
| Seo | 1 |

## Piano
1. Xot (base module, altri moduli dipendono dai suoi trait) — fix diretto/fork.
2. Notify — fix diretto/fork, in parallelo (repo git separato, nessuna dipendenza da Xot per il fix stesso).
3. Batch moduli minori (UI, User, Tenant / Activity, Lang, Cms, Geo, Employee, Job, Media, Seo) dopo che Xot e' verde, per evitare di rincorrere errori che cambiano quando Xot cambia.
4. Verifica finale `phpstan analyse Modules` a 0, aggiornamento memoria second-brain.

Nessun tocco a `phpstan.neon` (regola ferma, vedi memoria `feedback_phpstan-neon-user-only`).
Nessun baseline, nessun `@phpstan-ignore`, nessun cast/assert per silenziare — solo fix reali.

Chiusura per modulo: phpstan + phpmd + phpinsights + pest, coverage.md aggiornato, commit + push su tutti i remote del modulo (repo indipendente).
