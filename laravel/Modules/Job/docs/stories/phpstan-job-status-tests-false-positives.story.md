---
id: "227.2"
epic: 227
title: "Le 85 segnalazioni PHPStan di Job erano l'analizzatore senza l'estensione di Pest"
slug: phpstan-job-status-tests-false-positives
status: done
scope: module:Job
github:
  repository: https://github.com/laraxot/base_quaeris_fila5
  issues: https://github.com/laraxot/base_quaeris_fila5/issues/227
description: "Le 85 segnalazioni su Modules/Job stavano in 4 file e avevano una sola causa: pest-plugin-phpstan spento, quindi $this dentro le closure di Pest tipizzato come TestCall. La scrittura su .env da JobStatusWidget e' stata riletta e lasciata com'e': le sue guardie reggono."
document_type: story
category: bmad
created: 2026-11-19
updated: 2026-11-19
---

# 227.2 Job — 85 segnalazioni PHPStan, zero difetti

## Il numero

| Momento | Job | Activity |
|---------|-----|----------|
| Rilevazione iniziale | 85 | 183 |
| Dopo la correzione della configurazione | 0 | 0 |

Le 85 stavano in 4 file, 82 delle quali in due soli:
`JobStatusWidgetEnvWriteTest` (55) e `JobStatusAuthorizationTest` (27).

## La causa

La stessa di [Activity 227.1](../../../Activity/docs/stories/phpstan-log-tests-false-positives.story.md):
`pestphp/pest-plugin-phpstan` era spento perche' `phpstan/extension-installer` non aveva
mai generato la sua configurazione (da root, senza `COMPOSER_ALLOW_SUPERUSER=1`, Composer
disattiva i plugin). Senza quell'estensione, `$this` dentro `beforeEach()`/`it()` e'
`Pest\PendingCalls\TestCall`, quindi:

- `$this->jobContainer`, `$this->jobEnvFile`, `$this->jobPreviousContainer` →
  `property.notFound`, 45 volte;
- il loro valore diventa `mixed`, e passarlo a `jobEnvWidgetActAs(Application $container)`,
  a `jobEnvWidgetProbe(string $envFile)` o a `Safe\file_get_contents()` produce altre 36
  `argument.type`;
- `$this->artisan()` e `$this->assertDatabaseHasRow()` → `method.notFound`.

Le funzioni libere `jobEnvWidgetActAs()`, `jobStatusPageActAs()`, `jobEnvWidgetProbe()`
**erano gia' tipizzate correttamente**: erano loro a far emergere il `mixed` che arrivava
da `$this`. I test erano scritti bene; era l'analizzatore a non vedere Pest.

Verificato che nessuna `method.notFound` segnalasse una funzionalita' rimossa:
`artisan()` arriva da `Illuminate\Foundation\Testing\TestCase`,
`assertDatabaseHasRow()` e' dichiarata in `Modules\Job\Tests\TestCase`.

## Acceptance Criteria

1. [x] `phpstan analyse Modules/Job` esce con zero segnalazioni, con cache fredda.
2. [x] Nessun `@phpstan-ignore`, nessuna voce di baseline, nessun `mixed` aggiunto.
3. [x] `pest --test-directory=Modules/Job/tests` resta verde.
4. [x] Corretti i commenti in testa a `JobStatusWidgetEnvWriteTest` e a
       `JobStatusAuthorizationTest`: dichiaravano "nessun database, nessun TestCase del
       modulo", mentre entrambi i file fanno `uses(Modules\Job\Tests\TestCase::class)`, che
       porta `DatabaseTransactions`. Far credere che un test di sicurezza giri senza
       database e' peggio che non commentarlo.

## Sicurezza — la scrittura su `.env` dal widget

`JobStatusWidget::saveEnv()` scrive `QUEUE_CONNECTION` nel `.env`. E' stata riletta e
**non e' stata modificata**. Le guardie ci sono e i test le coprono:

- `authorizeSuperAdmin()` prima di qualunque lettura o scrittura del file, sia in
  `saveEnv()` sia in `updatedFormData()` (che e' il punto raggiungibile dal client
  Livewire: un metodo pubblico e' richiamabile anche se la vista non mostra il campo);
- il valore accettato deve essere una chiave di `config('queue.connections')` **e** fare
  solo `[A-Za-z0-9_-]+`, quindi non puo' contenere `\n`, `\r`, `=` o spazi e non puo'
  aggiungere righe al `.env`. Il test copre proprio l'iniezione di a capo, il CRLF, il
  `=`, lo spazio in coda e una chiave di configurazione malevola;
- `old_value` e' `#[Locked]`: il client non puo' riscriverlo per spostare la sostituzione
  su un'altra riga del file;
- i comandi Artisan passano da una allowlist e `queue:` e' aggiunto dal codice, non
  dall'utente.

Quello che resta discutibile non e' la sicurezza ma l'opportunita', e va deciso da una
persona, non da un agente:

- scrivere il `.env` a runtime non si propaga alle altre istanze dell'applicazione, non
  sopravvive a `config:cache` in modo prevedibile e cambia la configurazione di
  produzione da una pagina web;
- `Str::replace('QUEUE_CONNECTION='.$this->old_value, ...)` sostituisce **ogni**
  occorrenza, commenti compresi, e se `old_value` non compare nel file la scrittura non
  avviene e l'utente non riceve nessun avviso.

Nessuna delle due cose e' stata toccata: non erano nel perimetro della issue e cambiarle
e' una decisione di prodotto.

## Nota sul nome del modulo

Il modulo si chiama Job ma non introduce Job di Laravel: la logica sta nelle queueable
action di Spatie, come impone la guardia in CI. Qui si gestisce l'esecuzione schedulata.
