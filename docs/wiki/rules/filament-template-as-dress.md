---
paths:
  - "laravel/Modules/**/*.php"
  - "laravel/Modules/**/resources/views/**/*.blade.php"
  - "laravel/Themes/**/*.blade.php"
---

# Filament Widget + Template as Dress Rule

## REGOLA PERMANENTE: Il template è un vestito

### Vincolo architetturale assoluto

```
SEPARAZIONE OBBLIGATORIA:
  Widget PHP  = logica business (form schema, validazione, azioni, auth)
  Template Blade = vestito visivo (layout, stile, Design Comuni)
```

### Principio

Il **Filament Widget** contiene tutta la logica:
- `getFormSchema()` — definisce i campi del form
- `save()` / azioni — esegue le operazioni
- Validazione, errori, feedback

Il **template Blade** è solo il vestito visivo:
- Layout Bootstrap Italia / Design Comuni
- Presentazione, sezioni, colonne, cards
- La view è risolta da `XotBaseWidget::resolveView()` / `GetViewByClassAction`; `$view` si dichiara solo per override non convenzionali documentati

### Pattern applicato

```
Pagina Folio (Themes/Sixteen/resources/views/pages/*)
  └── @livewire(ContextWidget::class)         ← monta il widget
        ├── Widget PHP (extends XotBaseWidget)
        │     // $view auto-risolta: pub_theme::..., poi modulo::...
        │     getFormSchema(): array
        │     save(): void
        └── Template Blade (vestito)          ← solo presentazione
              {{ $this->form }}               ← renderizza form schema
              wire:submit.prevent="save"
```

### Regola `$view` nei widget Laraxot

Per i widget che estendono `XotBaseWidget` / `XotBaseWizardWidget`, non dichiarare `protected string $view` quando la classe segue la convenzione. Il costruttore chiama `GetViewByClassAction`, che prova prima la view del tema pubblico (`pub_theme::...`) e poi la view del modulo (`modulo::...`). Dichiarare `$view` nel widget blocca questo override del tema.

È ammesso lasciare nel PHP solo un commento con la view calcolata come promemoria, ad esempio:

```php
// View auto-resolved:
// pub_theme::filament.widgets.create-ticket-wizard, then fixcity::filament.widgets.create-ticket-wizard.
```

Dichiarare `$view` è una eccezione: va usata solo se il nome file è davvero fuori convenzione e il motivo è documentato.

### Convenzione naming

Per contesto "auth" nel modulo "user":
```
Widget:   Modules/User/app/Filament/Widgets/Auth/LoginWidget.php
Vestito:  Modules/User/resources/views/filament/widgets/auth/login.blade.php
Pagina:   Themes/Sixteen/resources/views/pages/auth/login.blade.php
```

Per ogni nuovo contesto:
```
Widget:   Modules/{Modulo}/app/Filament/Widgets/{Contesto}/{Nome}Widget.php
Vestito:  Modules/{Modulo}/resources/views/filament/widgets/{contesto}/{nome}.blade.php
Pagina:   Themes/Sixteen/resources/views/pages/{contesto}/{nome}.blade.php
```

### Cosa va dove

| Cosa | Widget PHP | Template Blade |
|------|-----------|---------------|
| Campi form (email, password) | ✅ `getFormSchema()` | ❌ MAI |
| Validazione required/rules | ✅ Filament validators | ❌ MAI |
| Autenticazione, redirect | ✅ `save()/login()` | ❌ MAI |
| Layout Bootstrap Italia | ❌ MAI | ✅ |
| Stile Design Comuni | ❌ MAI | ✅ |
| `{{ $this->form }}` | ❌ MAI | ✅ sempre presente |
| `wire:submit.prevent="save"` | ❌ MAI | ✅ sempre presente |
| Breadcrumb, titolo pagina | ❌ MAI | ✅ (nel template pagina) |
| Social login links | ❌ MAI | ✅ (nel vestito widget) |

### VIETATO

- Duplicare campi form in HTML dentro il vestito (si usa `{{ $this->form }}`)
- Mettere logica PHP inside il vestito Blade
- Fare `->label()`, `->placeholder()` — le traduzioni vengono da `lang/` automaticamente
- Creare widget che non estendono `XotBaseWidget`
- Dichiarare `protected string $view = ...` su widget convenzionali, perché impedisce al tema di sovrascrivere il vestito

### Story di riferimento

- Story 8-30: login page Design Comuni alignment + regola template-vestito
- Contesto: `Modules/User/Filament/Widgets/Auth/LoginWidget.php`
