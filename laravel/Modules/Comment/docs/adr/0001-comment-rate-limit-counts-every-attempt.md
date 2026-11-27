---
title: "ADR — Il freno ai commenti conta ogni invio, per utente o IP, prima della validazione"
type: decision
module: Comment
tags: [adr, comment, rate-limit, spam, sicurezza]
created: 2026-11-24
updated: 2026-11-26
status: accepted
decision-makers: [team Laraxot]
related:
  - ../../app/Actions/Comment/EnsureCommentRateLimitAction.php
  - ../contracts/ensure-comment-rate-limit-action.md
---

# ADR: il freno ai commenti conta ogni invio, per utente o IP, prima della validazione

## Contesto

- I widget del front office (`Filament/Widgets/Commentable/CommentsWidget`, `Filament/Widgets/Comment/CommentWidget`) sono
  componenti Livewire: chiunque puo' chiamare `comment()`, `reply()` o `edit()` in un ciclo, senza passare dal form.
- Un commento approvato in automatico compare subito nella pagina pubblica; uno in attesa manda una mail ai moderatori
  (`SendNotificationsForPendingCommentAction`): ogni invio in piu' costa spazio pubblico o caselle di posta (CMT-022).
- Il login ha gia' un freno con messaggio "riprova tra N secondi" (G-07).

Domanda: dove e come limitare gli invii, e cosa contare?

## Driver della decisione

- Il freno deve valere anche per chi chiama i metodi Livewire a mano, saltando il form: il punto di controllo e' il
  metodo del widget, non l'interfaccia.
- Un invio rifiutato dalla validazione costa quanto uno valido (carico, sonda della validazione): va contato lo stesso.
- Un solo numero da regolare e un solo punto da ricordare quando si aggiunge un nuovo invio pubblico.
- Il messaggio deve dire quanto aspettare, come il login (G-07), non essere una pagina 429.

## Decisione

- Un'unica Action, `EnsureCommentRateLimitAction`, chiamata da tutti i punti di invio del front office **dopo**
  l'autorizzazione e **prima** di leggere e validare il form.
- Chiave `comment-submit:<id utente>` o, senza utente, `comment-submit:<ip>`; `MAX_ATTEMPTS = 5` in `DECAY_SECONDS = 60`.
  Nuovo commento, risposta e modifica condividono il contatore.
- Oltre il limite: `ValidationException` sul campo del testo con i secondi di attesa (`comment::txt.throttle`), come il login.

## Alternative scartate

- Middleware `throttle` sulla rotta: Livewire passa tutto da `/livewire/update`, un limite li' colpirebbe ogni interazione
  di ogni componente, non i soli invii di commenti.
- Contare solo gli invii validi: chi prova cento testi rifiutati genera lo stesso carico e sonda la validazione gratis.
- Un contatore per tipo di azione (commento, risposta, modifica): triplica il limite reale senza un motivo d'uso.
- CAPTCHA: un terzo nella pagina (privacy) e attrito per tutti, anche per chi scrive un commento al giorno.

## Conseguenze

- Pro: un solo numero da cambiare; il messaggio e' un errore di campo, non una pagina 429.
- Contro: utenti dietro lo stesso IP condividono il limite solo se non autenticati (i widget richiedono comunque la policy
  `create`, quindi in pratica il limite e' per utente).
- I commenti creati da codice (`HasComments::comment()`, seeder) non sono limitati: chi aggiunge un nuovo punto di invio
  pubblico deve chiamare l'Action.

## Stato attuale

La premessa del Contesto «uno in attesa manda una mail ai moderatori» non e' piu' vera nel codice: `SendNotificationsForPendingCommentAction` non ha chiamanti
in produzione e `HasComments::comment()` (`app/Models/Concerns/HasComments.php` righe 73-101) non avvisa nessuno ([contratto](../contracts/send-notifications-for-pending-comment-action.md),
«Limiti noti»). La decisione sul freno resta valida: il costo dei commenti approvati in automatico (tutte le config hanno `automatically_approve_all_comments = true`) e' lo spazio pubblico.

## Conferma

- `Modules/Comment/tests/Feature/Widgets/CommentsWidgetFrontOfficeTest.php`: «throttles a user who posts more than the
  allowed number of comments per window» (group `COMMENT-THROTTLE-INV-1`).
- Nessuna conferma automatica per il resto (conteggio dei soli invii rifiutati, chiave condivisa tra commento, risposta e
  modifica: `COMMENT-THROTTLE-INV-2` e `-3` del [contratto](../contracts/ensure-comment-rate-limit-action.md) restano
  «non dimostrate»; proposta: due test Pest sul widget).
- Regola di review: ogni metodo pubblico di widget che salva un commento chiama `EnsureCommentRateLimitAction` (oggi
  `CommentsWidget::comment()` riga 205, `CommentWidget::reply()` riga 94 e `edit()` riga 124).
