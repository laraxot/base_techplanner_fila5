# AVVISO IMPORTANTE (2025-05-13)
<<<<<<< HEAD
# AVVISO IMPORTANTE ([DATE])
=======
>>>>>>> 6ed19256f (.)

> **ATTENZIONE:** Tutti i componenti UI condivisi (come `logo.blade.php`) devono essere SEMPRE posizionati in `Modules/UI/resources/views/components/ui/` e MAI in `resources/views/components/`. Qualsiasi violazione di questa regola causa errori di rendering, override errati, problemi di modularità e manutenzione.
>
> **Errore riscontrato:** Il componente `logo.blade.php` era stato posizionato erroneamente in `resources/views/components/ui/` invece che in `Modules/UI/resources/views/components/ui/`.
>
> **Causa:** Dimenticanza della regola di modularità Laraxot: tutti i componenti Blade UI condivisi devono essere sempre nel modulo UI, mai nella root Laravel.
>
> **Soluzione:** Seguire SEMPRE la regola documentata qui sotto e aggiornata anche in README.md e nella root docs/links.md.

<<<<<<< HEAD
# Gestione dei Percorsi e degli Asset 

## Collegamenti correlati
- [README modulo UI](/laravel/modules/ui/docs/readme.md)
- [Architettura Modulare](/laravel/modules/ui/docs/architecture.md)
=======
>>>>>>> 6ed19256f (.)
# Gestione dei Percorsi e degli Asset

## Collegamenti correlati
- [README modulo UI](/laravel/Modules/UI/docs/README.md)
- [Architettura Modulare](/laravel/Modules/UI/docs/ARCHITECTURE.md)
- [Collegamenti Documentazione](/docs/collegamenti-documentazione.md)

## Percorsi Corretti per gli Asset

### Struttura delle Directory

, è fondamentale rispettare la struttura corretta delle directory per gli asset pubblici:

```
<<<<<<< HEAD
/var/www/html/saluteora/
/var/www/html/Quaeris/
=======
/var/www/html/_bases/base_techplanner_fila3_mono/
/var/www/html/saluteora/
/var/www/html/_bases/base_techplanner_fila3_mono/
/var/www/html/saluteora/
/var/www/html/_bases/base_techplanner_fila3_mono/
/var/www/html/saluteora/
>>>>>>> 6ed19256f (.)
├── laravel/                 # Applicazione Laravel (codice sorgente)
│   ├── Modules/             # Moduli dell'applicazione
│   ├── resources/           # Risorse non compilate
│   └── ...
└── public_html/             # Directory pubblica (web root)
    ├── images/              # Immagini pubbliche
    │   ├── avatars/         # Avatar utenti
    │   └── ...
    ├── css/                 # File CSS compilati
    ├── js/                  # File JavaScript compilati
    └── ...
```

### Percorsi Corretti vs Percorsi Errati

| Tipo di Asset | ✅ Percorso Corretto | ❌ Percorso Errato |
|---------------|---------------------|-------------------|
<<<<<<< HEAD
| Immagini | `public_html/images/` | `public/images/` |
| CSS | `public_html/css/` | `public/css/` |
| JavaScript | `public_html/js/` | `public/js/` |
| SVG | `public_html/images/` | `public/images/` |
| Immagini | `public_html/images/` | `public/images/` |
| CSS | `public_html/css/` | `public/css/` |
| JavaScript | `public_html/js/` | `public/js/` |
| SVG | `public_html/images/` | `public/images/` |
| Immagini | `/var/www/html/Quaeris/public_html/images/` | `/var/www/html/Quaeris/laravel/public/images/` |
| CSS | `/var/www/html/Quaeris/public_html/css/` | `/var/www/html/Quaeris/laravel/public/css/` |
| JavaScript | `/var/www/html/Quaeris/public_html/js/` | `/var/www/html/Quaeris/laravel/public/js/` |
| SVG | `/var/www/html/Quaeris/public_html/images/` | `/var/www/html/Quaeris/laravel/public/images/` |
=======
| Immagini | `/var/www/html/_bases/base_techplanner_fila3_mono/public_html/images/` | `/var/www/html/_bases/base_techplanner_fila3_mono/laravel/public/images/` |
| CSS | `/var/www/html/_bases/base_techplanner_fila3_mono/public_html/css/` | `/var/www/html/_bases/base_techplanner_fila3_mono/laravel/public/css/` |
| JavaScript | `/var/www/html/_bases/base_techplanner_fila3_mono/public_html/js/` | `/var/www/html/_bases/base_techplanner_fila3_mono/laravel/public/js/` |
| SVG | `/var/www/html/_bases/base_techplanner_fila3_mono/public_html/images/` | `/var/www/html/_bases/base_techplanner_fila3_mono/laravel/public/images/` |
| Immagini | `/var/www/html/saluteora/public_html/images/` | `/var/www/html/saluteora/laravel/public/images/` |
| CSS | `/var/www/html/saluteora/public_html/css/` | `/var/www/html/saluteora/laravel/public/css/` |
| JavaScript | `/var/www/html/saluteora/public_html/js/` | `/var/www/html/saluteora/laravel/public/js/` |
| SVG | `/var/www/html/saluteora/public_html/images/` | `/var/www/html/saluteora/laravel/public/images/` |
>>>>>>> 6ed19256f (.)

## Utilizzo degli Asset nei Componenti Blade

### Helper `asset()`

Quando si fa riferimento agli asset nei componenti Blade, utilizzare sempre l'helper `asset()` che punta automaticamente alla directory pubblica corretta:

```php
<img src="{{ asset('images/avatars/default-1.svg') }}" alt="Avatar">
```

### Gestione dei Fallback

Per garantire una buona esperienza utente, implementare sempre un fallback per le immagini che potrebbero non essere disponibili:

```php
<img
<<<<<<< HEAD
<img 
=======
>>>>>>> 6ed19256f (.)
    src="{{ asset('images/avatars/default-' . $avatarNumber . '.svg') }}"
    alt="{{ $user->name ?? 'User' }}"
    onerror="this.src='{{ asset('images/default-avatar.svg') }}'"
/>
```

## Componenti SVG

### SVG come Componenti Blade

Gli SVG utilizzati come icone o componenti UI dovrebbero essere implementati come componenti Blade in:

```
<<<<<<< HEAD
Themes/One/resources/views/components/ui/
Themes/One/resources/views/components/ui/
Themes/One/resources/views/components/ui/
Themes/One/resources/views/components/ui/
Themes/One/resources/views/components/ui/
Themes/One/resources/views/components/ui/
/var/www/html/Quaeris/laravel/Themes/One/resources/views/components/ui/
=======
/var/www/html/_bases/base_techplanner_fila3_mono/laravel/Themes/One/resources/views/components/ui/
/var/www/html/saluteora/laravel/Themes/One/resources/views/components/ui/
/var/www/html/_bases/base_techplanner_fila3_mono/laravel/Themes/One/resources/views/components/ui/
/var/www/html/saluteora/laravel/Themes/One/resources/views/components/ui/
/var/www/html/_bases/base_techplanner_fila3_mono/laravel/Themes/One/resources/views/components/ui/
/var/www/html/saluteora/laravel/Themes/One/resources/views/components/ui/
>>>>>>> 6ed19256f (.)
```

### SVG come Asset Pubblici

Gli SVG utilizzati come immagini (avatar, loghi, ecc.) dovrebbero essere posizionati in:

```
<<<<<<< HEAD
public_html/images/
public_html/images/
public_html/images/
public_html/images/
public_html/images/
public_html/images/
/var/www/html/Quaeris/public_html/images/
=======
/var/www/html/_bases/base_techplanner_fila3_mono/public_html/images/
/var/www/html/saluteora/public_html/images/
/var/www/html/_bases/base_techplanner_fila3_mono/public_html/images/
/var/www/html/saluteora/public_html/images/
/var/www/html/_bases/base_techplanner_fila3_mono/public_html/images/
/var/www/html/saluteora/public_html/images/
>>>>>>> 6ed19256f (.)
```

## Gestione dei Componenti UI

### Componente Avatar

Il componente avatar è implementato in:

```
<<<<<<< HEAD
Themes/One/resources/views/components/ui/avatar.blade.php
Themes/One/resources/views/components/ui/avatar.blade.php
Themes/One/resources/views/components/ui/avatar.blade.php
Themes/One/resources/views/components/ui/avatar.blade.php
Themes/One/resources/views/components/ui/avatar.blade.php
Themes/One/resources/views/components/ui/avatar.blade.php
/var/www/html/Quaeris/laravel/Themes/One/resources/views/components/ui/avatar.blade.php
=======
/var/www/html/_bases/base_techplanner_fila3_mono/laravel/Themes/One/resources/views/components/ui/avatar.blade.php
/var/www/html/saluteora/laravel/Themes/One/resources/views/components/ui/avatar.blade.php
/var/www/html/_bases/base_techplanner_fila3_mono/laravel/Themes/One/resources/views/components/ui/avatar.blade.php
/var/www/html/saluteora/laravel/Themes/One/resources/views/components/ui/avatar.blade.php
/var/www/html/_bases/base_techplanner_fila3_mono/laravel/Themes/One/resources/views/components/ui/avatar.blade.php
/var/www/html/saluteora/laravel/Themes/One/resources/views/components/ui/avatar.blade.php
>>>>>>> 6ed19256f (.)
```

E utilizza gli avatar SVG dalla directory pubblica:

```
<<<<<<< HEAD
public_html/images/avatars/
public_html/images/avatars/
public_html/images/avatars/
public_html/images/avatars/
public_html/images/avatars/
public_html/images/avatars/
/var/www/html/Quaeris/public_html/images/avatars/
=======
/var/www/html/_bases/base_techplanner_fila3_mono/public_html/images/avatars/
/var/www/html/saluteora/public_html/images/avatars/
/var/www/html/_bases/base_techplanner_fila3_mono/public_html/images/avatars/
/var/www/html/saluteora/public_html/images/avatars/
/var/www/html/_bases/base_techplanner_fila3_mono/public_html/images/avatars/
/var/www/html/saluteora/public_html/images/avatars/
>>>>>>> 6ed19256f (.)
```

### Componente Icon

Il componente icon è implementato in:

```
<<<<<<< HEAD
Themes/One/resources/views/components/ui/icon.blade.php
Themes/One/resources/views/components/ui/icon.blade.php
Themes/One/resources/views/components/ui/icon.blade.php
Themes/One/resources/views/components/ui/icon.blade.php
Themes/One/resources/views/components/ui/icon.blade.php
Themes/One/resources/views/components/ui/icon.blade.php
/var/www/html/Quaeris/laravel/Themes/One/resources/views/components/ui/icon.blade.php
=======
/var/www/html/_bases/base_techplanner_fila3_mono/laravel/Themes/One/resources/views/components/ui/icon.blade.php
/var/www/html/saluteora/laravel/Themes/One/resources/views/components/ui/icon.blade.php
/var/www/html/_bases/base_techplanner_fila3_mono/laravel/Themes/One/resources/views/components/ui/icon.blade.php
/var/www/html/saluteora/laravel/Themes/One/resources/views/components/ui/icon.blade.php
/var/www/html/_bases/base_techplanner_fila3_mono/laravel/Themes/One/resources/views/components/ui/icon.blade.php
/var/www/html/saluteora/laravel/Themes/One/resources/views/components/ui/icon.blade.php
>>>>>>> 6ed19256f (.)
```

E include le definizioni SVG direttamente nel componente.

## Regola sui Componenti Blade UI

> **IMPORTANTE:** Tutti i componenti Blade UI condivisi (es. logo, button, badge, ecc.) devono essere posizionati esclusivamente in:
>
<<<<<<< HEAD
> `Modules/UI/resources/views/components/ui/`
=======
>>>>>>> 6ed19256f (.)
> `/var/www/html/ptvx/laravel/Modules/UI/resources/views/components/ui/`
>
> **MAI** in `resources/views/components/ui/` della root Laravel.

### Motivazione
- Garantisce la modularità e la possibilità di override a livello di modulo
- Evita conflitti e duplicazioni tra moduli e root
- Permette una gestione centralizzata e documentata dei componenti UI
- Segue la filosofia Laraxot di separazione delle responsabilità

### Esempio di errore e correzione

**❌ Errato:**
```
/var/www/html/ptvx/laravel/resources/views/components/ui/logo.blade.php
```
**✅ Corretto:**
```
/var/www/html/ptvx/laravel/Modules/UI/resources/views/components/ui/logo.blade.php
<<<<<<< HEAD
resources/views/components/ui/logo.blade.php
```
**✅ Corretto:**
```
Modules/UI/resources/views/components/ui/logo.blade.php
=======
>>>>>>> 6ed19256f (.)
```

## Best Practices

1. **MAI utilizzare percorsi assoluti hardcoded** nei componenti Blade
2. **SEMPRE utilizzare l'helper `asset()`** per riferirsi agli asset pubblici
3. **Implementare fallback** per le immagini che potrebbero non essere disponibili
4. **Verificare l'esistenza delle directory** prima di salvare nuovi asset
5. **Seguire le convenzioni di naming** per mantenere la coerenza
6. **Documentare i percorsi corretti** per evitare confusione

## Errori Comuni

<<<<<<< HEAD
1. **Utilizzo del percorso Laravel public**: Utilizzare `public/` invece di `public_html/`
1. **Utilizzo del percorso Laravel public**: Utilizzare `public/` invece di `public_html/`
1. **Utilizzo del percorso Laravel public**: Utilizzare `public/` invece di `public_html/`
1. **Utilizzo del percorso Laravel public**: Utilizzare `public/` invece di `public_html/`
1. **Utilizzo del percorso Laravel public**: Utilizzare `public/` invece di `public_html/`
1. **Utilizzo del percorso Laravel public**: Utilizzare `public/` invece di `public_html/`
=======
1. **Utilizzo del percorso Laravel public**: Utilizzare `/var/www/html/_bases/base_techplanner_fila3_mono/laravel/public/` invece di `/var/www/html/_bases/base_techplanner_fila3_mono/public_html/`
1. **Utilizzo del percorso Laravel public**: Utilizzare `/var/www/html/saluteora/laravel/public/` invece di `/var/www/html/saluteora/public_html/`
1. **Utilizzo del percorso Laravel public**: Utilizzare `/var/www/html/_bases/base_techplanner_fila3_mono/laravel/public/` invece di `/var/www/html/_bases/base_techplanner_fila3_mono/public_html/`
1. **Utilizzo del percorso Laravel public**: Utilizzare `/var/www/html/saluteora/laravel/public/` invece di `/var/www/html/saluteora/public_html/`
1. **Utilizzo del percorso Laravel public**: Utilizzare `/var/www/html/_bases/base_techplanner_fila3_mono/laravel/public/` invece di `/var/www/html/_bases/base_techplanner_fila3_mono/public_html/`
1. **Utilizzo del percorso Laravel public**: Utilizzare `/var/www/html/saluteora/laravel/public/` invece di `/var/www/html/saluteora/public_html/`
>>>>>>> 6ed19256f (.)
2. **Riferimenti diretti ai file**: Utilizzare percorsi assoluti invece dell'helper `asset()`
3. **Mancanza di fallback**: Non fornire alternative quando un'immagine non è disponibile
4. **Inconsistenza nei nomi dei file**: Utilizzare convenzioni di naming diverse per file simili
# AVVISO IMPORTANTE (2025-05-13)

> **ATTENZIONE:** Tutti i componenti UI condivisi (come `logo.blade.php`) devono essere SEMPRE posizionati in `Modules/UI/resources/views/components/ui/` e MAI in `resources/views/components/`. Qualsiasi violazione di questa regola causa errori di rendering, override errati, problemi di modularità e manutenzione.
>
> **Errore riscontrato:** Il componente `logo.blade.php` era stato posizionato erroneamente in `resources/views/components/ui/` invece che in `Modules/UI/resources/views/components/ui/`.
>
> **Causa:** Dimenticanza della regola di modularità Laraxot: tutti i componenti Blade UI condivisi devono essere sempre nel modulo UI, mai nella root Laravel.
>
> **Soluzione:** Seguire SEMPRE la regola documentata qui sotto e aggiornata anche in README.md e nella root docs/links.md.

# Gestione dei Percorsi e degli Asset

## Collegamenti correlati
- [README modulo UI](/laravel/Modules/UI/docs/README.md)
- [Architettura Modulare](/laravel/Modules/UI/docs/ARCHITECTURE.md)
- [Collegamenti Documentazione](/docs/collegamenti-documentazione.md)

## Percorsi Corretti per gli Asset

### Struttura delle Directory

, è fondamentale rispettare la struttura corretta delle directory per gli asset pubblici:

```
<<<<<<< HEAD

=======
/var/www/html/<nome progetto>/
>>>>>>> 6ed19256f (.)
├── laravel/                 # Applicazione Laravel (codice sorgente)
│   ├── Modules/             # Moduli dell'applicazione
│   ├── resources/           # Risorse non compilate
│   └── ...
└── public_html/             # Directory pubblica (web root)
    ├── images/              # Immagini pubbliche
    │   ├── avatars/         # Avatar utenti
    │   └── ...
    ├── css/                 # File CSS compilati
    ├── js/                  # File JavaScript compilati
    └── ...
```

### Percorsi Corretti vs Percorsi Errati

| Tipo di Asset | ✅ Percorso Corretto | ❌ Percorso Errato |
|---------------|---------------------|-------------------|
<<<<<<< HEAD
| Immagini | `public_html/images/` | `public/images/` |
| CSS | `public_html/css/` | `public/css/` |
| JavaScript | `public_html/js/` | `public/js/` |
| SVG | `public_html/images/` | `public/images/` |
=======
| Immagini | `/var/www/html/<nome progetto>/public_html/images/` | `/var/www/html/<nome progetto>/laravel/public/images/` |
| CSS | `/var/www/html/<nome progetto>/public_html/css/` | `/var/www/html/<nome progetto>/laravel/public/css/` |
| JavaScript | `/var/www/html/<nome progetto>/public_html/js/` | `/var/www/html/<nome progetto>/laravel/public/js/` |
| SVG | `/var/www/html/<nome progetto>/public_html/images/` | `/var/www/html/<nome progetto>/laravel/public/images/` |
>>>>>>> 6ed19256f (.)

## Utilizzo degli Asset nei Componenti Blade

### Helper `asset()`

Quando si fa riferimento agli asset nei componenti Blade, utilizzare sempre l'helper `asset()` che punta automaticamente alla directory pubblica corretta:

```php
<img src="{{ asset('images/avatars/default-1.svg') }}" alt="Avatar">
```

### Gestione dei Fallback

Per garantire una buona esperienza utente, implementare sempre un fallback per le immagini che potrebbero non essere disponibili:

```php
<img
    src="{{ asset('images/avatars/default-' . $avatarNumber . '.svg') }}"
    alt="{{ $user->name ?? 'User' }}"
    onerror="this.src='{{ asset('images/default-avatar.svg') }}'"
/>
```

## Componenti SVG

### SVG come Componenti Blade

Gli SVG utilizzati come icone o componenti UI dovrebbero essere implementati come componenti Blade in:

```
<<<<<<< HEAD
Themes/One/resources/views/components/ui/
=======
/var/www/html/<nome progetto>/laravel/Themes/One/resources/views/components/ui/
>>>>>>> 6ed19256f (.)
```

### SVG come Asset Pubblici

Gli SVG utilizzati come immagini (avatar, loghi, ecc.) dovrebbero essere posizionati in:

```
<<<<<<< HEAD
public_html/images/
=======
/var/www/html/<nome progetto>/public_html/images/
>>>>>>> 6ed19256f (.)
```

## Gestione dei Componenti UI

### Componente Avatar

Il componente avatar è implementato in:

```
<<<<<<< HEAD
Themes/One/resources/views/components/ui/avatar.blade.php
=======
/var/www/html/<nome progetto>/laravel/Themes/One/resources/views/components/ui/avatar.blade.php
>>>>>>> 6ed19256f (.)
```

E utilizza gli avatar SVG dalla directory pubblica:

```
<<<<<<< HEAD
public_html/images/avatars/
=======
/var/www/html/<nome progetto>/public_html/images/avatars/
>>>>>>> 6ed19256f (.)
```

### Componente Icon

Il componente icon è implementato in:

```
<<<<<<< HEAD
Themes/One/resources/views/components/ui/icon.blade.php
=======
/var/www/html/<nome progetto>/laravel/Themes/One/resources/views/components/ui/icon.blade.php
>>>>>>> 6ed19256f (.)
```

E include le definizioni SVG direttamente nel componente.

## Regola sui Componenti Blade UI

> **IMPORTANTE:** Tutti i componenti Blade UI condivisi (es. logo, button, badge, ecc.) devono essere posizionati esclusivamente in:
>
<<<<<<< HEAD
> `Modules/UI/resources/views/components/ui/`
=======
> `/var/www/html/ptvx/laravel/Modules/UI/resources/views/components/ui/`
>>>>>>> 6ed19256f (.)
>
> **MAI** in `resources/views/components/ui/` della root Laravel.

### Motivazione
- Garantisce la modularità e la possibilità di override a livello di modulo
- Evita conflitti e duplicazioni tra moduli e root
- Permette una gestione centralizzata e documentata dei componenti UI
- Segue la filosofia Laraxot di separazione delle responsabilità

### Esempio di errore e correzione

**❌ Errato:**
```
<<<<<<< HEAD
resources/views/components/ui/logo.blade.php
```
**✅ Corretto:**
```
Modules/UI/resources/views/components/ui/logo.blade.php
=======
/var/www/html/ptvx/laravel/resources/views/components/ui/logo.blade.php
```
**✅ Corretto:**
```
/var/www/html/ptvx/laravel/Modules/UI/resources/views/components/ui/logo.blade.php
>>>>>>> 6ed19256f (.)
```

## Best Practices

1. **MAI utilizzare percorsi assoluti hardcoded** nei componenti Blade
2. **SEMPRE utilizzare l'helper `asset()`** per riferirsi agli asset pubblici
3. **Implementare fallback** per le immagini che potrebbero non essere disponibili
4. **Verificare l'esistenza delle directory** prima di salvare nuovi asset
5. **Seguire le convenzioni di naming** per mantenere la coerenza
6. **Documentare i percorsi corretti** per evitare confusione

## Errori Comuni

<<<<<<< HEAD
1. **Utilizzo del percorso Laravel public**: Utilizzare `public/` invece di `public_html/`
1. **Utilizzo del percorso Laravel public**: Utilizzare `/var/www/html/Quaeris/laravel/public/` invece di `/var/www/html/Quaeris/public_html/`
2. **Riferimenti diretti ai file**: Utilizzare percorsi assoluti invece dell'helper `asset()`
3. **Mancanza di fallback**: Non fornire alternative quando un'immagine non è disponibile
4. **Inconsistenza nei nomi dei file**: Utilizzare convenzioni di naming diverse per file simili
=======
1. **Utilizzo del percorso Laravel public**: Utilizzare `/var/www/html/<nome progetto>/laravel/public/` invece di `/var/www/html/<nome progetto>/public_html/`
2. **Riferimenti diretti ai file**: Utilizzare percorsi assoluti invece dell'helper `asset()`
3. **Mancanza di fallback**: Non fornire alternative quando un'immagine non è disponibile
4. **Inconsistenza nei nomi dei file**: Utilizzare convenzioni di naming diverse per file simili
>>>>>>> 6ed19256f (.)
