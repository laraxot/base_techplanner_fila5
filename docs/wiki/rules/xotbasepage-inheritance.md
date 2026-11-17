---
paths:
  - "laravel/Modules/**/*.php"
---

# XotBasePage Inheritance Rule

## REGOLA PERMANENTE: Non ridefinire proprietà ereditate da XotBasePage

### Vincoli assoluti

- **VIETATO**: ridefinire `$view`, `$navigationIcon`, `$navigationGroup`, `$navigationSort` o altri attributi già gestiti da `Modules\Xot\Filament\Pages\XotBasePage` nei widget o pagine personalizzate.
- **OBBLIGATORIO**: affidarsi alle impostazioni ereditate; se serve modificare il comportamento, usare i metodi forniti da `XotBasePage` (es. `getNavigationLabel()`, `getTitle()`).

### Perché

`XotBasePage` centralizza la logica di navigazione e view handling per garantire coerenza in tutti i moduli. Ridefinire queste proprietà rompe l'ereditarietà, genera errori di dichiarazione (`Cannot redeclare non static … as static`) e complica il mantenimento.

### Come applicare

1. Rimuovere le dichiarazioni di proprietà ridondanti.
2. Utilizzare metodi e configurazioni di `XotBasePage`.
3. Aggiornare la documentazione dei moduli per indicare che la view è ereditata.

### Esempio corretto
```php
class SocialiteProviderSettingsPage extends XotBasePage
{
    // Nessuna proprietà $view o navigation qui – ereditate da XotBasePage
    // ... resto della classe ...
}
```
