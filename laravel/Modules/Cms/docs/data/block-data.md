# Sistema BlockData

## Introduzione

<<<<<<< HEAD
La classe `Modules\Cms\Datas\BlockData` è il cuore del sistema di rendering agnostico del modulo CMS. Si occupa di gestire automaticamente la validazione delle viste, i fallback e la conversione dei dati JSON in oggetti tipizzati.
=======
La classe `Modules\Cms\Datas\BlockData` è il cuore del sistema di rendering agnostico del modulo CMS. Si occupa di validare la view da renderizzare, opzionalmente idratare i dati via query dinamica, e convertire i blocchi JSON in oggetti tipizzati.
>>>>>>> dev

## Caratteristiche Principali

- **Validazione Automatica**: Controlla se `view()->exists($view)` durante la costruzione
<<<<<<< HEAD
- **Fallback Sicuro**: Se la vista non esiste, usa automaticamente `ui::empty`
- **Gestione Eccezioni**: Cattura le eccezioni e fornisce fallback sicuri
=======
- **Query Dinamiche (Block hydration)**: se `data.query` è presente, risolve i dati tramite `ResolveBlockQueryAction` e li merge-a nel `data`
- **Rilevamento Volt/Livewire**: determina se la view è un componente Volt (leggendo l'header del file) e normalizza il nome componente
>>>>>>> dev
- **Tipizzazione**: Utilizza Spatie Laravel Data per la tipizzazione completa
- **Wireable**: Supporta Livewire per componenti reattivi

## Struttura della Classe

```php
<?php

namespace Modules\Cms\Datas;

use Spatie\LaravelData\Data;
use Livewire\Wireable;

class BlockData extends Data implements Wireable
{
    public string $type;
    public array $data;
    public string $view;

    public function __construct(string $type, array $data)
    {
        $this->type = $type;
        $this->data = $data;

        // Estrae la vista dai dati o usa fallback
        $view = Arr::get($data, 'view', 'ui::empty');

        // Valida che la vista esista
        if(!view()->exists($view)){
            throw new \Exception('view not found: '.$view);
        }

        $this->view = $view;
    }
}
```

<<<<<<< HEAD
## Metodo fromArray()

Il metodo statico `fromArray()` gestisce la conversione di array di blocchi in collezioni di `BlockData`:

```php
public static function fromArray(array $blocks): Collection
{
    return collect($blocks)->map(function ($block) {
        if (!is_array($block)) {
            return null;
        }

        $type = Arr::get($block, 'type', 'unknown');
        $data = Arr::get($block, 'data', []);

        try {
            return new self($type, $data);
        } catch (\Exception $e) {
            // Se la vista non esiste, usa una vista di fallback
            $data['view'] = 'ui::empty';
            return new self($type, $data);
        }
    })->filter();
}
```

## Gestione dei Fallback

### Fallback Automatico

Quando una vista non viene trovata, `BlockData` automaticamente:

1. **Cattura l'eccezione** nel metodo `fromArray()`
2. **Imposta il fallback** `$data['view'] = 'ui::empty'`
3. **Crea un nuovo oggetto** `BlockData` con la vista di fallback
4. **Continua il rendering** senza interrompere l'applicazione

### Vista di Fallback

La vista di fallback `ui::empty` deve esistere in:
```
laravel/Modules/UI/resources/views/empty.blade.php
```

Esempio di contenuto:
```blade
{{-- Vista di fallback per blocchi con viste non trovate --}}
<div class="block-fallback" style="display: none;">
    {{-- Contenuto vuoto per fallback silenzioso --}}
</div>
```
=======
> Nota: la documentazione storica in alcune sezioni menziona un fallback automatico a `ui::empty`.
> **Nel runtime attuale** `BlockData` lancia eccezione se `view()->exists($view)` è `false`.
> Questo è un punto intenzionale di “fail-fast” (e un chaos target), non un fallback silenzioso.

## Conversione array -> BlockData (dove avviene davvero)

Nel runtime attuale la conversione avviene dentro `Modules\\Cms\\Models\\Traits\\HasBlocks::getBlocks()`.
Questo è **critico** perché i blocchi vengono istanziati manualmente con `new BlockData(...)` (non con `BlockData::collect()`), così il costruttore viene eseguito e può:

1. Risolvere `data.query`
2. Validare la view
3. Determinare se la view è Volt/Livewire

## Gestione errori e fallback

- Se una view non esiste, viene sollevata un'eccezione `view not found: ...` in fase di costruzione del blocco.
- Il fallback `ui::empty` è usato **solo** come default quando `data.view` non è presente nel JSON.
- Per introdurre un fallback “silenzioso”, deve essere una decisione esplicita e implementata nel runtime (non assunta dalla documentazione).
>>>>>>> dev

## Esempi di Utilizzo

### Struttura JSON Tipica

```json
{
  "type": "predict_list",
  "data": {
    "view": "predict::components.blocks.predict_list.lmsr",
    "method": "getActivePredictsLmsr",
    "title": "Mercati Attivi",
    "limit": 10
  }
}
```

### Conversione in BlockData

```php
$jsonBlocks = [
    [
        'type' => 'predict_list',
        'data' => [
            'view' => 'predict::components.blocks.predict_list.lmsr',
            'method' => 'getActivePredictsLmsr',
            'title' => 'Mercati Attivi'
        ]
    ],
    [
        'type' => 'hero',
        'data' => [
            'view' => 'ui::blocks.hero.simple',
            'title' => 'Benvenuto',
            'subtitle' => 'Nel nostro sito'
        ]
    ]
];

$blockDataCollection = BlockData::fromArray($jsonBlocks);
```

### Utilizzo nel Componente Page

```blade
@foreach($blocks as $block)
    @php
        $blockData = (array) ($block->data ?? []);
    @endphp

    {{-- Include la vista specificata nel blocco --}}
    @include($block->view, $blockData)
@endforeach
```

## View Resolution

### Esempi di Risoluzione

| Vista Specificata | Percorso Risolto |
<<<<<<< HEAD
|------------------|------------------|
=======
| ---------------- | ---------------- |
>>>>>>> dev
| `predict::components.blocks.predict_list.lmsr` | `laravel/Modules/Predict/resources/views/components/blocks/predict_list/lmsr.blade.php` |
| `ui::blocks.hero.simple` | `laravel/Modules/UI/resources/views/blocks/hero/simple.blade.php` |
| `cms::blocks.content.text` | `laravel/Modules/Cms/resources/views/blocks/content/text.blade.php` |
| `ui::empty` (fallback) | `laravel/Modules/UI/resources/views/empty.blade.php` |

### Sintassi View Resolution

Laravel utilizza la sintassi `modulo::percorso.vista` dove:
<<<<<<< HEAD
=======

>>>>>>> dev
- `modulo`: Nome del modulo (predict, ui, cms, etc.)
- `percorso.vista`: Percorso relativo nella cartella `resources/views/` del modulo

## Best Practices

### 1. Specificare Sempre la Vista

```json
{
  "type": "hero",
  "data": {
    "view": "ui::blocks.hero.simple",
    "title": "Titolo"
  }
}
```

### 2. Creare Viste di Fallback

<<<<<<< HEAD
Assicurarsi che esista sempre `ui::empty` per i fallback automatici.

### 3. Gestire Errori Gracefully

Non fare affidamento su viste che potrebbero non esistere. `BlockData` gestisce automaticamente i fallback.
=======
Assicurarsi che esista sempre `ui::empty` come vista di default quando `data.view` non è presente.

### 3. Gestire Errori Gracefully

Non fare affidamento su viste che potrebbero non esistere: nel runtime attuale `BlockData` è fail-fast quando la view non esiste.
>>>>>>> dev

### 4. Mantenere Coerenza nei Nomi

Utilizzare convenzioni coerenti per i nomi delle viste:
<<<<<<< HEAD
=======

>>>>>>> dev
- `modulo::components.blocks.tipo.variante`
- `modulo::blocks.categoria.nome`

## Anti-Pattern da Evitare

### ❌ Controlli Ridondanti

```blade
{{-- ERRATO: BlockData ha già validato la vista --}}
@if($blockView && view()->exists($blockView))
    @include($blockView, $blockData)
@endif
```

### ❌ Hardcoding delle Viste

```php
// ERRATO: Hardcoding nel CMS
if ($type === 'predict_list') {
    $view = 'predict::components.blocks.predict_list.lmsr';
}
```

### ✅ Approccio Corretto

```blade
{{-- CORRETTO: Fiducia in BlockData --}}
@include($block->view, $blockData)
```

## Risoluzione dei Problemi

### Vista Non Trovata

Se una vista non viene trovata:
<<<<<<< HEAD
1. `BlockData` cattura automaticamente l'eccezione
2. Imposta `ui::empty` come fallback
3. Il rendering continua senza errori
=======

1. `BlockData` lancia eccezione se `view()->exists($view)` è `false`.
2. La vista deve esistere nel percorso specificato.
>>>>>>> dev

### Dati Mancanti

Se i dati del blocco sono incompleti:
<<<<<<< HEAD
=======

>>>>>>> dev
1. `BlockData` usa valori di default
2. La vista riceve un array vuoto se necessario
3. Le viste devono gestire dati mancanti gracefully

### Debug

Per debuggare problemi con `BlockData`:
<<<<<<< HEAD
1. Verificare che la vista specificata esista
2. Controllare che `ui::empty` esista per i fallback
3. Verificare la struttura JSON dei blocchi
=======

1. Verificare che la vista specificata esista
2. Verificare la struttura JSON dei blocchi
3. Se il blocco usa `data.query`, verificare schema e modello (classe esistente, scope opzionali)
>>>>>>> dev

## Collegamenti Correlati

- [Componente Page](../components/page.md)
- [Architettura CMS Agnostica](../components.md)
- [Best Practices per il Rendering](../best-practices/page-rendering.md)
- [View Resolution Laravel](https://laravel.com/docs/views)
