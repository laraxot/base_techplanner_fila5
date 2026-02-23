# Header Login Button - Decisione e Implementazione

## Problema

Nella navigazione header del tema Two (`pub_theme::components.sections.header.v1`):
- ✅ Utenti loggati: hanno avatar dropdown con Dashboard, Profilo, Logout
- ✅ Pulsante CTA: "Richiedi Consulenza"
- ❌ Utenti NON loggati: nessun modo per accedere!

## Soluzione Proposta

Aggiungere un pulsante di login per gli utenti non autenticati, posizionato accanto al pulsante CTA.

### Posizionamento

```
[Brand] [Nav Links] ... [Lang] [Login] [CTA]
```

Il login button sarà posizionato:
- Tra language switcher e CTA button
- Stesso stile del pulsante CTA (border white/transparent)
- Testo: "Accedi" con icon user

### Comportamento

| Stato | Contenuto Header Destro |
|-------|------------------------|
| Guest | [Lang] [Accedi] [CTA] |
| Auth  | [Lang] [User Avatar] [CTA] |

### Implementazione

Modificare `Themes/Two/resources/views/components/sections/header.v1`:

1. Aggiungere blocco `@guest` prima del pulsante CTA (riga 241)
2. Mostrare pulsante "Accedi" con link a `/auth/login`
3. Mantenere stile coerente con design esistente

### File da Modificare

- `laravel/Themes/Two/resources/views/components/sections/header.v1`

### Test

- Verificare che utente non loggato veda pulsante "Accedi"
- Verificare che utente loggato veda avatar dropdown
- Verificare accessibilità (aria-label, focus states)
- Verificare responsività su mobile

### Traduzioni

Aggiungere chiavi mancanti in `Modules/Lang/resources/lang/it/auth.php`:
- `header.login` = "Accedi"

## Note UX

Il pulsante di login è standard per siti che offrono:
- Area personale
- Servizi autenticati
- Consulenze riservate

La posizione (accanto al CTA) è coerente con pattern Bootstrap Italia.
