<<<<<<< HEAD
<<<<<<< HEAD
# Guida ai Componenti UI

## Layout

### Frontoffice
- Utilizzare `x-layouts.main` come layout principale
- Struttura standard:
  ```blade
  <x-layouts.main>
      <x-slot name="title">
          {{ __('Page Title') }}
      </x-slot>

      <div class="container mx-auto px-4">
          <!-- Contenuto della pagina -->
      </div>
  </x-layouts.main>
  ```

### Backoffice
- Utilizzare i layout Filament
- Non utilizzare i layout Filament nel frontoffice

## Componenti Filament

### Dropdown
Il componente dropdown di Filament offre una soluzione completa per i menu a tendina con le seguenti funzionalità:

```blade
<x-filament::dropdown>
    <x-slot name="trigger">
        <x-filament::button>
            {{ __('More actions') }}
        </x-filament::button>
    </x-slot>
    
    <x-filament::dropdown.list>
        <x-filament::dropdown.list.item>
            {{ __('View') }}
        </x-filament::dropdown.list.item>
    </x-filament::dropdown.list>
</x-filament::dropdown>
```

#### Caratteristiche Principali:
- **Trigger Personalizzabile**: Usa lo slot `trigger` per personalizzare il pulsante
- **Posizionamento**: Controlla il posizionamento con `placement` (top-start, top-end, bottom-start, bottom-end)
- **Larghezza**: Imposta la larghezza con `width` (xs, sm, md, lg, xl, 2xl, 3xl, 4xl, 5xl, 6xl, 7xl)
- **Altezza Massima**: Controlla l'altezza massima con `max-height`
- **Colori**: Supporto per colori (danger, info, primary, success, warning)
- **Icone**: Aggiungi icone con l'attributo `icon`
- **Badge**: Aggiungi badge con lo slot `badge`
- **Link**: Converti in link con `tag="a"` e `href`

### Avatar
Il componente avatar di Filament gestisce le immagini profilo con:

```blade
<x-filament::avatar
    src="{{ $user->profile_photo_url }}"
    alt="{{ $user->name }}"
    size="md"
/>
```

#### Caratteristiche:
- **Dimensioni**: sm, md, lg o classi personalizzate
- **Forma**: Controlla la forma con `:circular="true/false"`
- **Fallback**: Gestione automatica delle immagini mancanti

### Loading Indicator
Il componente loading indicator di Filament mostra lo stato di caricamento:

```blade
<x-filament::loading-indicator />
```

#### Caratteristiche:
- **Dimensioni**: sm, md, lg
- **Colori**: Personalizzabili
- **Animazione**: Smooth e responsive

## Best Practices

### Layout
- Mantenere la separazione tra frontoffice e backoffice
- Utilizzare i layout appropriati per ogni contesto
- Seguire la struttura standard dei layout
- Supportare il tema scuro

### Componenti
- Utilizzare i componenti Filament quando disponibili
- Personalizzare i componenti solo quando necessario
- Documentare i componenti personalizzati
- Testare in entrambi i temi

### Cosa NON fare
- ❌ Utilizzare layout Filament nel frontoffice
- ❌ Mischiare componenti tra frontoffice e backoffice
- ❌ Duplicare funzionalità già presenti in Filament
- ❌ Ignorare il supporto per il tema scuro

### Cosa fare
- ✅ Utilizzare `x-layouts.main` per il frontoffice
- ✅ Utilizzare i componenti Filament quando disponibili
- ✅ Seguire le convenzioni di naming
- ✅ Documentare i componenti personalizzati
- ✅ Testare in entrambi i temi

## Esempi di Implementazione

### Dropdown Utente
```blade
<x-filament::dropdown>
    <x-slot name="trigger">
        <button class="flex items-center">
            <x-filament::avatar
                src="{{ $user->profile_photo_url }}"
                alt="{{ $user->name }}"
                size="md"
            />
            <x-filament::icon
                name="heroicon-o-chevron-down"
                class="ml-1 h-4 w-4"
            />
        </button>
    </x-slot>

    <x-filament::dropdown.list>
        <x-filament::dropdown.list.item
            icon="heroicon-o-user"
            href="{{ route('profile.show') }}"
            tag="a"
        >
            {{ __('Profile') }}
        </x-filament::dropdown.list.item>

        <x-filament::dropdown.list.item
            icon="heroicon-o-cog-6-tooth"
            href="{{ route('settings') }}"
            tag="a"
        >
            {{ __('Settings') }}
        </x-filament::dropdown.list.item>

        <x-filament::dropdown.list.item
            icon="heroicon-o-arrow-right-on-rectangle"
            color="danger"
            wire:click="logout"
        >
            {{ __('Log Out') }}
        </x-filament::dropdown.list.item>
    </x-filament::dropdown.list>
</x-filament::dropdown>
```

### Loading State
```blade
<div>
    <x-filament::loading-indicator wire:loading />
    <div wire:loading.remove>
        {{ $content }}
    </div>
</div>
```

## Collegamenti Correlati
- [Documentazione Dropdown Filament](https://filamentphp.com/docs/3.x/support/blade-components/dropdown)
- [Documentazione Avatar Filament](https://filamentphp.com/docs/3.x/support/blade-components/avatar)
- [Documentazione Loading Indicator Filament](https://filamentphp.com/docs/3.x/support/blade-components/loading-indicator)

## Volt e Folio

### Componenti Volt
- Utilizzare la direttiva `@volt` per i componenti Volt
- Struttura standard:
  ```blade
  @volt('component.name')
  <?php
  use function Livewire\Volt\{state, mount};
  
  state([
      'property' => null,
  ]);
  
  $action = function () {
      // Logica dell'azione
  };
  ?>
  
  <div>
      <!-- Template del componente -->
  </div>
  @endvolt
  ```

### Pagine Folio
- Utilizzare Folio per le pagine del frontoffice
- Struttura standard:
  ```blade
  <?php
  use function Laravel\Folio\{middleware, name};
  use function Livewire\Volt\{state, mount};
  
  middleware(['auth']);
  name('page.name');
  
  state([
      'property' => null,
  ]);
  ?>
  
  <x-layouts.main>
      <!-- Contenuto della pagina -->
  </x-layouts.main>
  ```

### Gestione dello Stato
- Utilizzare `state()` per definire le proprietà
- Utilizzare `mount()` per l'inizializzazione
- Gestire gli errori con try/catch
- Implementare stati di loading

### Esempi

#### Componente Volt
```blade
@volt('auth.logout')
<?php
use function Livewire\Volt\{state, mount};

state([
    'isLoggingOut' => false,
    'success' => false,
    'error' => false,
]);

$logout = function () {
    try {
        $this->isLoggingOut = true;
        // Logica di logout
        $this->success = true;
    } catch (\Exception $e) {
        $this->error = true;
    }
    $this->isLoggingOut = false;
};
?>

<div>
    @if($success)
        <!-- Success state -->
    @elseif($error)
        <!-- Error state -->
    @else
        <!-- Default state -->
    @endif
    
    @if($isLoggingOut)
        <x-filament::loading-indicator />
    @endif
</div>
@endvolt
```

#### Pagina Folio
```blade
<?php
use function Laravel\Folio\{middleware, name};
use function Livewire\Volt\{state, mount};

middleware(['auth']);
name('auth.logout');

state([
    'isLoggingOut' => false,
    'success' => false,
    'error' => false,
]);

$logout = function () {
    try {
        $this->isLoggingOut = true;
        // Logica di logout
        $this->success = true;
    } catch (\Exception $e) {
        $this->error = true;
    }
    $this->isLoggingOut = false;
};
?>

<x-layouts.main>
    <x-slot name="title">
        {{ __('auth.logout.title') }}
    </x-slot>

    <div>
        @if($success)
            <!-- Success state -->
        @elseif($error)
            <!-- Error state -->
        @else
            <!-- Default state -->
        @endif
        
        @if($isLoggingOut)
            <x-filament::loading-indicator />
        @endif
    </div>
</x-layouts.main>
```

### Best Practices

#### Gestione dello Stato
- Mantenere gli stati semplici e chiari
- Documentare gli stati e le loro transizioni
- Gestire correttamente gli errori
- Implementare stati di loading

#### Componenti
- Utilizzare la direttiva `@volt` per i componenti Volt
- Seguire la struttura standard
- Mantenere la separazione tra logica e presentazione
- Testare i componenti in isolamento

#### Cosa NON fare
- ❌ Omettere la direttiva `@volt` nei componenti Volt
- ❌ Mischiare logica di business con la presentazione
- ❌ Duplicare stati tra componenti
- ❌ Ignorare la gestione degli errori

#### Cosa fare
- ✅ Utilizzare la direttiva `@volt` per i componenti Volt
- ✅ Seguire la struttura standard per i componenti
- ✅ Gestire correttamente gli stati e le azioni
- ✅ Implementare la gestione degli errori
- ✅ Testare i componenti

## Componenti di Autenticazione

### User Dropdown
- Utilizzare `x-blocks.navigation.user-dropdown` per utenti autenticati
- Struttura standard:
  ```blade
  <x-blocks.navigation.user-dropdown :user="auth()->user()">
      <x-slot name="trigger">
          <x-filament::avatar
              src="{{ $user->profile_photo_url }}"
              alt="{{ $user->name }}"
          />
      </x-slot>
  </x-blocks.navigation.user-dropdown>
  ```

### Login Buttons
- Utilizzare `x-blocks.navigation.login-buttons` per utenti non autenticati
- Struttura standard:
  ```blade
  <x-blocks.navigation.login-buttons>
      <x-ui.button
          href="{{ route('login') }}"
          color="primary"
      >
          {{ __('auth.login.link') }}
      </x-ui.button>

      <x-ui.button
          href="{{ route('register') }}"
          color="secondary"
      >
          {{ __('auth.register.link') }}
      </x-ui.button>
  </x-blocks.navigation.login-buttons>
  ```

### Gestione dello Stato
- Utilizzare `@auth` e `@else` per gestire gli stati
- Esempio:
  ```blade
  @auth
      <x-blocks.navigation.user-dropdown :user="auth()->user()" />
  @else
      <x-blocks.navigation.login-buttons />
  @endauth
  ```

### Traduzioni
- Utilizzare il namespace `auth.` per le traduzioni
- Struttura standard:
  ```php
  return [
      'login' => [
          'title' => 'Login',
          'email' => 'Email',
          'password' => 'Password',
          'remember_me' => 'Remember me',
          'forgot_password' => 'Forgot password?',
          'submit' => 'Login',
          'link' => 'Login',
      ],
      'register' => [
          'title' => 'Register',
          'email' => 'Email',
          'password' => 'Password',
          'confirm_password' => 'Confirm password',
          'submit' => 'Register',
          'link' => 'Register',
      ],
      'logout' => [
          'title' => 'Logout',
          'confirm_message' => 'Are you sure you want to log out?',
          'success_title' => 'Logged out successfully',
          'success_message' => 'You have been logged out.',
          'error_title' => 'Error',
          'error_message' => 'An error occurred while logging out.',
          'confirm_button' => 'Logout',
          'cancel_button' => 'Cancel',
          'back_to_home' => 'Back to home',
          'try_again' => 'Try again',
      ],
      'user_dropdown' => [
          'manage_account' => 'Manage Account',
          'profile' => 'Profile',
          'settings' => 'Settings',
          'logout' => 'Logout',
      ],
  ];
  ```

### Best Practices

#### Componenti
- Mantenere la separazione tra stati autenticati e non
- Utilizzare i componenti appropriati
- Gestire correttamente le traduzioni
- Supportare il tema scuro

#### Traduzioni
- Utilizzare chiavi semantiche
- Mantenere la coerenza nella struttura
- Documentare le traduzioni
- Testare in tutte le lingue

#### Cosa NON fare
- ❌ Mischiare stati autenticati e non
- ❌ Duplicare logica di autenticazione
- ❌ Ignorare le traduzioni
- ❌ Ignorare il supporto per il tema scuro

#### Cosa fare
- ✅ Utilizzare i componenti appropriati
- ✅ Seguire la struttura standard
- ✅ Gestire correttamente le traduzioni
- ✅ Testare in entrambi gli stati
=======
# Componenti UI

## Componenti Form Avanzati

### InlineDatePicker

Componente Filament Form per la selezione di date con calendario inline sempre visibile e controllo granulare delle date selezionabili.

#### Utilizzo Base
```php
use Modules\UI\Filament\Forms\Components\InlineDatePicker;

InlineDatePicker::make('appointment_date')
    ->enabledDates(['2025-06-05', '2025-06-21'])
    ->highlightColor('bg-indigo-600 text-white')
    ->compactMode()
    ->required();
```

#### Caratteristiche
- **Design Inline**: Calendario sempre visibile senza popup
- **Date Selettive**: Solo date specifiche sono cliccabili e evidenziate
- **Tema Coerente**: Basato sul design One theme con Tailwind CSS
- **Alpine.js**: Interattività fluida senza page reload
- **Accessibilità**: Supporto completo keyboard navigation e screen reader

#### Metodi Principali
```php
// Date abilitate (array o Closure dinamica)
->enabledDates(['2025-06-05', '2025-06-21'])
->enabledDates(fn () => $this->getAvailableDates())

// Personalizzazione colori
->highlightColor('bg-green-600 text-white')

// Layout compatto
->compactMode()

// Controlli navigazione
->showNavigation(false)
```

#### Integrazione con Wizard
```php
InlineDatePicker::make('date')
    ->enabledDates(fn () => $this->getDoctorAvailableDates())
    ->live()
    ->afterStateUpdated(fn ($state) => $this->loadTimeSlots($state))
```

[**📖 Documentazione Completa**](./components/inline-date-picker.md)

### StudioCardSelector

Componente Filament Form per la selezione di studi medici attraverso interfaccia card visuale.

#### Utilizzo Base
```php
use Modules\UI\Forms\Components\StudioCardSelector;

StudioCardSelector::make('selected_studio')
    ->studios(fn (Get $get) => $this->getStudiosForLocation($get))
    ->required();
```

#### Caratteristiche
- **Layout Responsive**: Card stack verticali su mobile, orizzontali su desktop
- **Accessibilità**: Supporto completo keyboard navigation e screen reader
- **Personalizzazione**: Varianti compact/default/detailed
- **Interattività**: Selezione radio con feedback visivo
- **Alpine.js**: Interazioni fluide senza page reload

#### Varianti Layout
```php
// Layout compatto
StudioCardSelector::make('studio')->compact();

// Layout dettagliato con info extra
StudioCardSelector::make('studio')
    ->detailed()
    ->showDistance()
    ->showSpecializations()
    ->showPhone();
```

#### Features Opzionali
- `showDistance()`: Badge distanza con icona mappa
- `showSpecializations()`: Tag specializzazioni mediche
- `showPhone()`: Numero telefono con icona

[**📖 Documentazione Completa**](./studio-card-selector-implementation.md)

## Componenti Form Filament

### RadioCollection

Componente per la selezione mutuamente esclusiva con interfaccia card personalizzabile.

#### Utilizzo Base
```php
use Modules\UI\Filament\Forms\Components\RadioCollection;

RadioCollection::make('selection')
    ->options(collect([
        (object)['id' => 1, 'name' => 'Opzione 1', 'description' => 'Descrizione 1'],
        (object)['id' => 2, 'name' => 'Opzione 2', 'description' => 'Descrizione 2'],
    ]))
    ->valueKey('id')
    ->itemView('custom.item-template')
    ->required();
```

#### Caratteristiche Avanzate
- **Type Safety**: Comparazione type-safe tra valori per evitare problemi di type coercion
- **Accessibilità**: Supporto completo per screen reader e navigazione keyboard
- **Reattività**: Alpine.js + Livewire per feedback immediato
- **Personalizzazione**: Template item completamente personalizzabile

#### Features Filosofiche
- **Fisica Quantistica**: Ogni opzione esiste in superposizione fino alla selezione
- **Fenomenologia**: Interfaccia progettata per minimizzare interruzioni cognitive
- **Gestalt**: Rispetta principi di prossimità, somiglianza e chiusura
- **Zen**: Design minimalista che riduce all'essenziale

[**📖 Documentazione Filosofica Completa**](./components/radio-collection-component.md)

### LocationSelector

Componente per la selezione gerarchica di dati geografici (Regione → Provincia → CAP).

#### Utilizzo
```php
use Modules\UI\Filament\Forms\Components\LocationSelector;

LocationSelector::make()
    ->regionField('region')
    ->provinceField('province')
    ->capField('cap')
    ->required()
    ->searchable()
```

#### Caratteristiche
- Selezione gerarchica con dipendenze automatiche
- Integrazione con modulo Geo
- Live updates tra i campi
- Validazione cascata
- Gestione errori con logging

## Componenti Blade UI

### StudioSelector

Componente semplificato per la selezione di uno studio odontoiatrico tramite pulsanti radio-style.

#### Utilizzo
```blade
<x-ui::ui.studio-selector
    :studios="$studios"
    :selected-studio="$selectedStudioId"
    target-field="selected_studio"
/>
```

#### Caratteristiche
- Pulsanti radio-style per selezione singola
- Visual feedback per stato selezionato
- Informazioni compatte (nome, indirizzo, contatti)
- Empty states integrati
- Integrazione Livewire automatica
- Layout responsive

### StudioCard (Completa)

Componente avanzato per la visualizzazione dettagliata di uno studio (per liste, dashboard, dettagli).

#### Utilizzo
```blade
<x-ui::ui.studio-card
    :studio="$studio"
    :show-distance="true"
    :show-rating="true"
    :show-services="true"
    :actions="['book', 'details', 'contact']"
/>
```

#### Caratteristiche
- Layout responsive completo
- Rating con stelle
- Informazioni di contatto estese
- Servizi offerti
- Azioni personalizzabili
- Orari di apertura

## Componenti SVG

### Bandiere (Flags)

I componenti SVG per le bandiere sono registrati automaticamente e possono essere utilizzati con il prefisso `ui-flags`.

#### Utilizzo
```blade
{{-- Bandiera italiana --}}
<x-ui-flags.it class="w-6 h-4" />

{{-- Bandiera inglese --}}
<x-ui-flags.gb class="w-6 h-4" />
```

#### Caratteristiche
- Registrazione automatica dei componenti
- Supporto per tutte le bandiere del mondo
- Dimensioni ottimizzate
- Colori ufficiali
- ViewBox corretto per il mantenimento delle proporzioni

#### Best Practices
1. **Dimensioni**
   - Utilizzare classi Tailwind per le dimensioni
   - Mantenere le proporzioni originali (3:2)
   - Esempio: `class="w-6 h-4"`

2. **Accessibilità**
   - Aggiungere attributi `aria-label` quando necessario
   - Fornire testo alternativo per screen reader
   - Esempio:
     ```blade
     <x-ui-flags.it class="w-6 h-4" aria-label="Bandiera italiana" />
     ```

3. **Performance**
   - Gli SVG sono ottimizzati
   - Non richiedono richieste HTTP aggiuntive
   - Caching automatico

4. **Personalizzazione**
   - Possibilità di modificare i colori via CSS
   - Supporto per classi Tailwind
   - Esempio:
     ```blade
     <x-ui-flags.it class="w-6 h-4 text-primary-600" />
     ```

## Collegamenti Correlati
- [Documentazione SVG](./SVG.md)
- [Best Practices UI](./UI_BEST_PRACTICES.md)
- [Guida Componenti](./COMPONENTS_GUIDE.md)

# Componenti UI - Documentazione Generale

Questo documento descrive i componenti UI disponibili nel modulo UI e le loro funzionalità principali.

## Componenti Form

### RadioCollection - Selettori Radio Personalizzabili

Il componente `RadioCollection` offre un'alternativa avanzata ai radio button standard di Filament, permettendo visualizzazioni ricche e personalizzabili per ogni opzione.

#### Caratteristiche Principali
- **Template Personalizzabili**: Ogni opzione può avere un template visivo personalizzato
- **Accessibilità Completa**: Supporto completo per screen reader e navigazione da tastiera
- **Alpine.js Integration**: Feedback visivo immediato con Alpine.js
- **Performance Ottimizzate**: Rendering efficiente anche con molte opzioni
- **Type Safety**: Comparazione type-safe per evitare problemi di type coercion

#### Utilizzo Base
```php
use Modules\UI\Filament\Forms\Components\RadioCollection;

RadioCollection::make('selection')
    ->options(collect([
        (object)['id' => 1, 'name' => 'Opzione 1', 'description' => 'Descrizione 1'],
        (object)['id' => 2, 'name' => 'Opzione 2', 'description' => 'Descrizione 2'],
    ]))
    ->valueKey('id')
    ->itemView('custom.item-template')
    ->required();
```

#### Personalizzazione Template
```php
// Template item personalizzato: resources/views/custom/item-template.blade.php
<div class="space-y-1">
    <h4 class="font-medium text-gray-900 dark:text-gray-100">
        {{ $item->name }}
    </h4>
    <p class="text-sm text-gray-500 dark:text-gray-400">
        {{ $item->description }}
    </p>
</div>
```

#### API Methods
- `options(Collection $options)` - Imposta la collezione di opzioni
- `valueKey(string $key)` - Imposta la chiave da usare come valore (default: 'id')
- `itemView(string $view)` - Imposta il template personalizzato per ogni item

#### Features Filosofiche
- **Fisica Quantistica**: Ogni opzione esiste in superposizione fino alla selezione
- **Fenomenologia**: Interfaccia progettata per minimizzare interruzioni cognitive
- **Gestalt**: Rispetta principi di prossimità, somiglianza e chiusura
- **Zen**: Design minimalista che riduce all'essenziale

[**📖 Documentazione Filosofica Completa**](./components/radio-collection-component.md)

## Componenti Form Filament

### RadioCollection

Componente per la selezione mutuamente esclusiva con interfaccia card personalizzabile.

#### Utilizzo Base
```php
use Modules\UI\Filament\Forms\Components\RadioCollection;

RadioCollection::make('selection')
    ->options(collect([
        (object)['id' => 1, 'name' => 'Opzione 1', 'description' => 'Descrizione 1'],
        (object)['id' => 2, 'name' => 'Opzione 2', 'description' => 'Descrizione 2'],
    ]))
    ->valueKey('id')
    ->itemView('custom.item-template')
    ->required();
```

#### Caratteristiche Avanzate
- **Type Safety**: Comparazione type-safe tra valori per evitare problemi di type coercion
- **Accessibilità**: Supporto completo per screen reader e navigazione keyboard
- **Reattività**: Alpine.js + Livewire per feedback immediato
- **Personalizzazione**: Template item completamente personalizzabile

#### Features Filosofiche
- **Fisica Quantistica**: Ogni opzione esiste in superposizione fino alla selezione
- **Fenomenologia**: Interfaccia progettata per minimizzare interruzioni cognitive
- **Gestalt**: Rispetta principi di prossimità, somiglianza e chiusura
- **Zen**: Design minimalista che riduce all'essenziale

[**📖 Documentazione Filosofica Completa**](./components/radio-collection-component.md)

### LocationSelector

Il componente `LocationSelector` facilita la selezione di posizioni geografiche con supporto per autocompletamento e validazione.

#### Caratteristiche
- Autocompletamento integrato
- Validazione coordinate
- Supporto mappe integrate
- Geocoding automatico

#### Esempi di Utilizzo
```php
LocationSelector::make('address')
    ->enableMap()
    ->required();
```

## Best Practice

1. **Riutilizzabilità**: Progettare componenti modulari e riutilizzabili
2. **Accessibilità**: Seguire sempre le linee guida WCAG 2.1
3. **Performance**: Ottimizzare il rendering e la reattività
4. **Documentazione**: Mantenere documentazione aggiornata con esempi

## Struttura File

```
Modules/UI/resources/views/components/ui/
├── buttons/
├── cards/
├── forms/
└── layout/
```

Tutti i componenti UI condivisi devono essere posizionati in `Modules/UI/resources/views/components/ui/` seguendo la struttura modulare.

## Collegamenti

- [RadioCollection Debugging](./components/radio-collection-debugging.md)
- [RadioCollection Examples](./components/radio-collection-usage-examples.md)
- [UI Components Architecture](../README.md)

*Documentazione aggiornata: Dicembre 2024*
>>>>>>> 4b6b99016 (first commit)
=======
---
module: theme
topic: components
canonical: ../../../Themes/docs/shared-components/components-guide.md
---

See canonical documentation: ../../../Themes/docs/shared-components/components-guide.md
>>>>>>> dev
