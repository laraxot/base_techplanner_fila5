---
title: "Confine di compatibilità dell'harness"
type: decision
status: accepted
created: 2026-11-27
updated: 2026-11-27
---

# Confine di compatibilità dell'harness

## Contesto

`laravelday-harness-workshop` separa configurazione e policy in `.harness/config.php`
e `.harness/rules/guard.php`, caricandole tramite un pre-tool con payload tipizzato.
Questo repository possiede invece `.harness/bin/guard`, un guard PHP autonomo con un
payload JSON e regole inline già in uso.

## Driver della decisione

- non introdurre policy dichiarative che nessun eseguibile legge;
- conservare il comportamento e il formato d'ingresso del guard esistente;
- mantenere la possibilità di un porting futuro verificabile;
- lasciare separati fatti, decisioni e lezioni dell'harness.

## Alternative considerate

1. Copiare subito `config.php` e `rules/guard.php` dal workshop: scartata, perché il
   guard locale non li carica.
2. Sostituire `.harness/bin/guard` con l'impianto upstream: scartata, perché amplia la
   superficie di compatibilità e cambia il comportamento fail-open corrente.
3. Documentare il confine e portare il runtime solo con un adapter e test dedicati:
   scelta adottata.

## Decisione

Il guard locale resta il punto esecutivo canonico. Il confronto upstream vive in
`.harness/memory/laravelday-workshop-comparison.md`; nessun `config.php` o file sotto
`.harness/rules/` viene introdotto come policy inattiva.

## Conseguenze

L'harness non eredita ancora i checkpoint, i Task Contract e il payload tipizzato del
workshop. In compenso non esistono due policy concorrenti e `.harness/bin/guard` resta
compatibile con i chiamanti attuali.

## Verifica

- `php -l .harness/bin/guard`
- test harness esistente in `laravel/Modules/Xot/tests/Unit/Harness`
- confronto manuale con il repository upstream indicato nella memoria collegata.
