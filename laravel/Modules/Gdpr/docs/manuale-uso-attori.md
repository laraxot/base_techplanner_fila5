---
title: "Gdpr — manuale d'uso per attori"
type: manual
---

# Scopo

Gdpr raccoglie i consensi e supporta la registrazione dell'utente. La
registrazione è front office; le policy dei modelli di consenso, trattamento,
profilo ed evento appartengono al backoffice.

## Attori e capacità effettive

| Attore | Dominio | Capacità verificata |
| --- | --- | --- |
| Ospite | Cittadino/front office | Può vedere il widget di registrazione e inviarlo se supera validazione e consensi. |
| Autenticato | Front office | Non vede il widget di registrazione: `canView()` è solo per ospiti. Nessuna ulteriore capacità cittadina è dichiarata qui. |
| Gruppo/ruolo con permessi | Backoffice | Può operare sui modelli solo con i permessi espliciti `consent.*`, `treatment.*`, `profile.*`, `event.*` corrispondenti all'abilità. |
| `gdpr::admin` | Backoffice | Bypass delle policy Gdpr. |
| `super-admin` | Backoffice | Bypass delle policy Gdpr. |
| Operatore/moderatore | — | N/A: il modulo non dichiara questi ruoli. |

È inoltre previsto il bypass per l'email configurata come
`XotData::make()->super_admin`; non è una capacità cittadina né un ruolo da
assegnare ordinariamente.

## Flussi

### Registrazione cittadina

L'ospite compila nome, cognome, email, password e conferma password, accetta
obbligatoriamente privacy e termini e, se vuole, il marketing. Il submit è
limitato per IP; dopo la validazione il modulo crea l'utente come
`customer_user`, salva i consensi e registra l'evento di registrazione.
L'email è inizialmente non verificata secondo il flusso di registrazione.

### Backoffice

Un utente autenticato del backoffice passa dalle policy del modello richiesto:
prima l'eventuale bypass `super-admin`/`gdpr::admin`, altrimenti il permesso
specifico dell'azione (`viewAny`, `view`, `create`, `update`, `delete`,
`restore`, `forceDelete`). Il modulo non prova qui una schermata o un ruolo
generico di moderazione.

## Prerequisiti e limiti

- Email unica, dati obbligatori validi e password conforme a
  `Password::defaults()`.
- Privacy e termini sono obbligatori; marketing è opzionale.
- Limite registrazione: 10 tentativi per IP ogni 600 secondi; conta anche un
  invio non valido.
- La visibilità del widget non è una protezione sufficiente per azioni
  backoffice: valgono le policy del modello.
- N/A: il modulo non concede accesso al pannello Fixcity né definisce ruoli
  PA o capacità Geo/Job/Lang.

## Riferimenti verificabili

- `app/Filament/Widgets/Auth/RegisterWidget.php:31-73,103-126` — attore
  ospite, campi, consensi e rate limit.
- `app/Filament/Widgets/Auth/RegisterWidget.php:128-162` — validazione,
  creazione utente, salvataggio consensi e log.
- `app/Models/Policies/GdprBasePolicy.php:11-27` — bypass e super-admin
  configurato.
- `app/Models/Policies/ConsentPolicy.php:15-68` — esempio della matrice di
  permessi `consent.*`; la stessa forma è nelle policy di trattamento,
  profilo ed evento.
- `tests/Feature/RegisterWidgetTest.php` e `tests/Feature/RegistrationTest.php`
  — verifiche del flusso di registrazione.
