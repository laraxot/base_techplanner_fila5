# Translation Namespace Rule

## 🔴 REGOLA PERMANENTE — Translation Keys

**Chiave di traduzione = namespace + dominio.**

| Namespace | Quando usarlo |
|-----------|---------------|
| `fixcity::ticket.*` | Views/components relativi ai **ticket** (elenco, dettaglio, mappa) |
| `fixcity::segnalazione.*` | **SOLO** wizard di creazione segnalazione (passi, form) |

### Perché è importante

- `segnalazioni` = traduzione di `ticket`
- View Blade in `ticket/` devono usare `fixcity::ticket`
- View Blade in `segnalazioni/` devono usare `fixcity::segnalazione`

### Controllo automatico

Prima di ogni modifica:
```bash
grep -r "fixcity::segnalazione" laravel/Themes/Sixteen/resources/views/components/blocks/ticket/
```

Se trova risultati, è un BUG.

### File this rule protects

- `laravel/Themes/Sixteen/resources/views/components/blocks/ticket/*.blade.php`
- `laravel/Modules/Fixcity/lang/{it,en}/ticket.php`