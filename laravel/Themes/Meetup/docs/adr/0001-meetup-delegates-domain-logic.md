---
title: "ADR — Meetup delega la logica ai moduli"
type: decision
status: accepted
theme: Meetup
created: 2026-11-27
updated: 2026-11-27
---

# Meetup delega la logica ai moduli

## Contesto

Meetup è un tema pubblico per eventi e community; la definizione dei contenuti e dei form appartiene ai moduli owner.

## Driver della decisione

- separare presentazione e dominio;
- riusare i widget e i contratti dei moduli;
- permettere la sostituzione del tema senza migrazioni di dominio.

## Alternative scartate

- aggiungere controller e form nel tema: duplica responsabilità;
- hardcodare pagine e contenuti nelle Blade: impedisce la configurazione tenant.

## Decisione

Meetup rende la presentazione e delega pagine, autenticazione e form ai moduli e al resolver CMS previsto.

## Conseguenze

Il tema resta sostituibile; ogni nuova integrazione deve avere un owner di modulo esplicito.

## Conferma

Verificare rotte, Blade e asset del tema, quindi eseguire i test del tema e PHPStan sul perimetro modificato.
