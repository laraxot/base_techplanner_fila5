# Laravel Sushi: Analisi Approfondita

## Cos'è Laravel Sushi

Laravel Sushi è un pacchetto creato da Caleb Porzio che consente di trasformare array PHP in modelli Eloquent completi, senza la necessità di un database fisico. Sushi crea automaticamente un database SQLite in memoria (o su file se possibile) per fornire tutte le funzionalità di Eloquent su dati statici o provenienti da fonti esterne.

### Caratteristiche principali

1. **Modelli Eloquent da array**: Trasforma array PHP in modelli Eloquent completi
2. **SQLite in memoria**: Crea un database SQLite in memoria o su file
3. **API Eloquent completa**: Supporta query builder, relazioni, eager loading, ecc.
4. **Caching integrato**: Offre meccanismi per il caching dei dati tra le richieste
5. **Schema personalizzabile**: Permette di definire manualmente lo schema delle tabelle
6. **Supporto per le relazioni**: Consente di definire relazioni con altri modelli Eloquent

### Requisiti

- Estensione PHP `pdo-sqlite`
- Laravel 5.8 o superiore

### Installazione

```bash
composer require calebporzio/sushi
```

## Come funziona Laravel Sushi

### Meccanismo interno

1. **Creazione del database**: Crea un database SQLite in memoria o su file (se il caching è abilitato)
2. **Migrazione automatica**: Genera uno schema basato sui dati forniti o su uno schema personalizzato
3. **Popolamento dati**: Inserisce i dati forniti tramite `$rows` o `getRows()`
4. **Proxy delle query**: Redirige tutte le query Eloquent al database SQLite

### Opzioni di configurazione

| Opzione | Descrizione | Default |
|---------|-------------|---------|
| `$rows` | Array di dati per il modello | `[]` |
| `$schema` | Definizione manuale dello schema | `null` |
| `$sushiInsertChunkSize` | Dimensione dei chunk per l'inserimento | `100` |
| `$incrementing` | Se la chiave primaria è incrementale | `true` |
| `$keyType` | Tipo della chiave primaria | `'int'` |

### Metodi personalizzabili

1. `getRows()`: Alternativa dinamica a `$rows` per generare dati a runtime
2. `sushiShouldCache()`: Determina se i dati devono essere memorizzati nella cache
3. `sushiCacheReferencePath()`: File da monitorare per invalidare la cache
4. `afterMigrate(Blueprint $table)`: Personalizza la tabella dopo la migrazione

## Implementazione di Comune con Laravel Sushi

Analizziamo come potrebbe essere implementato il modello `Comune` utilizzando Laravel Sushi, con un focus sui vantaggi, svantaggi e considerazioni specifiche per il nostro caso d'uso.

### Implementazione proposta

```php
<?php

declare(strict_types=1);

namespace Modules\Geo\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Sushi\Sushi;

class Comune extends Model
{
    use Sushi;
<<<<<<< HEAD
<<<<<<< HEAD
    
=======

>>>>>>> 4b6b99016 (first commit)
=======
    
>>>>>>> dev
    /**
     * Indica a Sushi di non utilizzare timestamps
     */
    public $timestamps = false;
<<<<<<< HEAD
<<<<<<< HEAD
    
=======

>>>>>>> 4b6b99016 (first commit)
=======
    
>>>>>>> dev
    /**
     * Dimensione dei chunk per l'inserimento (ottimizzato per SQLite)
     */
    public $sushiInsertChunkSize = 50;
<<<<<<< HEAD
<<<<<<< HEAD
    
=======

>>>>>>> 4b6b99016 (first commit)
=======
    
>>>>>>> dev
    /**
     * Cache duration in seconds (1 week)
     */
    protected const CACHE_TTL = 604800;
<<<<<<< HEAD
<<<<<<< HEAD
    
=======

>>>>>>> 4b6b99016 (first commit)
=======
    
>>>>>>> dev
    /**
     * Definisce le colonne del modello con i rispettivi tipi
     */
    protected $schema = [
        'codice' => 'string',
        'nome' => 'string',
        'regione' => 'json',
        'provincia' => 'json',
        'cap' => 'json',
        'codiceCatastale' => 'string',
        'popolazione' => 'integer'
    ];
<<<<<<< HEAD
<<<<<<< HEAD
    
=======

>>>>>>> 4b6b99016 (first commit)
=======
    
>>>>>>> dev
    /**
     * Definisce i cast per le colonne JSON
     */
    protected $casts = [
        'regione' => 'array',
        'provincia' => 'array',
        'cap' => 'array',
    ];
<<<<<<< HEAD
<<<<<<< HEAD
    
=======

>>>>>>> 4b6b99016 (first commit)
=======
    
>>>>>>> dev
    /**
     * Ottiene i dati dal file JSON con caching
     */
    public function getRows()
    {
        $path = module_path('Geo', 'resources/json/comuni.json');
        $cacheKey = 'geo_comuni_json_' . md5($path);
<<<<<<< HEAD
<<<<<<< HEAD
        
=======

>>>>>>> 4b6b99016 (first commit)
=======
        
>>>>>>> dev
        return Cache::rememberForever($cacheKey, function () use ($path) {
            return json_decode(file_get_contents($path), true);
        });
    }
<<<<<<< HEAD
<<<<<<< HEAD
    
=======

>>>>>>> 4b6b99016 (first commit)
=======
    
>>>>>>> dev
    /**
     * Indica a Sushi di memorizzare i dati nella cache
     */
    protected function sushiShouldCache()
    {
        return true;
    }
<<<<<<< HEAD
<<<<<<< HEAD
    
=======

>>>>>>> 4b6b99016 (first commit)
=======
    
>>>>>>> dev
    /**
     * File di riferimento per invalidare la cache
     */
    protected function sushiCacheReferencePath()
    {
        return module_path('Geo', 'resources/json/comuni.json');
    }
<<<<<<< HEAD
<<<<<<< HEAD
    
=======

>>>>>>> 4b6b99016 (first commit)
=======
    
>>>>>>> dev
    /**
     * Personalizza la tabella dopo la migrazione
     */
    protected function afterMigrate(\Illuminate\Database\Schema\Blueprint $table)
    {
        $table->index('nome');
        $table->index(['regione->codice', 'provincia->codice']);
    }
<<<<<<< HEAD
<<<<<<< HEAD
    
=======

>>>>>>> 4b6b99016 (first commit)
=======
    
>>>>>>> dev
    /**
     * Scope per filtrare per regione
     */
    public function scopeByRegion($query, string $regionCode): Builder
    {
        return $query->where('regione->codice', $regionCode)
                     ->orderBy('nome');
    }
<<<<<<< HEAD
<<<<<<< HEAD
    
=======

>>>>>>> 4b6b99016 (first commit)
=======
    
>>>>>>> dev
    /**
     * Scope per filtrare per provincia
     */
    public function scopeByProvince($query, string $provinceCode): Builder
    {
        return $query->where('provincia->codice', $provinceCode)
                     ->orderBy('nome');
    }
<<<<<<< HEAD
<<<<<<< HEAD
    
=======

>>>>>>> 4b6b99016 (first commit)
=======
    
>>>>>>> dev
    /**
     * Scope per cercare per nome
     */
    public function scopeSearchByName($query, string $name, int $limit = 0): Builder
    {
        $query = $query->where('nome', 'like', '%' . $name . '%')
                       ->orderBy('nome');
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> dev
                       
        if ($limit > 0) {
            $query->limit($limit);
        }
        
        return $query;
    }
    
<<<<<<< HEAD
=======

        if ($limit > 0) {
            $query->limit($limit);
        }

        return $query;
    }

>>>>>>> 4b6b99016 (first commit)
=======
>>>>>>> dev
    /**
     * Scope per filtrare per CAP
     */
    public function scopeByCap($query, string $cap): Builder
    {
        return $query->whereJsonContains('cap', $cap);
    }
<<<<<<< HEAD
<<<<<<< HEAD
    
=======

>>>>>>> 4b6b99016 (first commit)
=======
    
>>>>>>> dev
    /**
     * Verifica se il CAP è valido
     */
    public static function isValidCap(string $cap): bool
    {
        $cacheKey = 'geo_valid_cap_' . md5($cap);
<<<<<<< HEAD
<<<<<<< HEAD
        
=======

>>>>>>> 4b6b99016 (first commit)
=======
        
>>>>>>> dev
        return Cache::remember($cacheKey, self::CACHE_TTL, function () use ($cap) {
            return static::byCap($cap)->exists();
        });
    }
<<<<<<< HEAD
<<<<<<< HEAD
    
=======

>>>>>>> 4b6b99016 (first commit)
=======
    
>>>>>>> dev
    /**
     * Ottiene la gerarchia completa di un comune
     */
    public static function getGerarchia(string $cap = null, string $comune = null): ?array
    {
        if (!$cap && !$comune) {
            return null;
        }
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> dev
        
        $cacheKey = 'geo_gerarchia_' . md5((string)$cap . (string)$comune);
        
        return Cache::remember($cacheKey, self::CACHE_TTL, function () use ($cap, $comune) {
            $query = static::query();
            
            if ($cap) {
                $query->byCap($cap);
            }
            
            if ($comune) {
                $query->where('nome', 'like', '%' . $comune . '%');
            }
            
            $result = $query->first();
            
            if (!$result) {
                return null;
            }
            
<<<<<<< HEAD
=======

        $cacheKey = 'geo_gerarchia_' . md5((string)$cap . (string)$comune);

        return Cache::remember($cacheKey, self::CACHE_TTL, function () use ($cap, $comune) {
            $query = static::query();

            if ($cap) {
                $query->byCap($cap);
            }

            if ($comune) {
                $query->where('nome', 'like', '%' . $comune . '%');
            }

            $result = $query->first();

            if (!$result) {
                return null;
            }

>>>>>>> 4b6b99016 (first commit)
=======
>>>>>>> dev
            return [
                'regione' => $result->regione,
                'provincia' => $result->provincia,
                'comune' => $result->nome,
                'cap' => $result->cap,
            ];
        });
    }
<<<<<<< HEAD
<<<<<<< HEAD
    
=======

>>>>>>> 4b6b99016 (first commit)
=======
    
>>>>>>> dev
    /**
     * Restituisce le regole di validazione per i form
     */
    public static function getValidationRules(): array
    {
        return [
            'regione' => ['required', 'string', 'exists:' . __CLASS__ . ',regione->codice'],
            'provincia' => ['required', 'string', 'exists:' . __CLASS__ . ',provincia->codice'],
            'comune' => ['required', 'string', 'exists:' . __CLASS__ . ',nome'],
            'cap' => ['required', 'string', function ($attribute, $value, $fail) {
                if (!static::isValidCap($value)) {
                    $fail('Il CAP inserito non è valido.');
                }
            }],
        ];
    }
<<<<<<< HEAD
<<<<<<< HEAD
    
=======

>>>>>>> 4b6b99016 (first commit)
=======
    
>>>>>>> dev
    /**
     * Pulisce tutta la cache
     */
    public static function clearCache(): array
    {
        $clearedKeys = [];
<<<<<<< HEAD
<<<<<<< HEAD
        
=======

>>>>>>> 4b6b99016 (first commit)
=======
        
>>>>>>> dev
        // Pulisci la cache dei dati JSON
        $jsonCacheKey = 'geo_comuni_json_' . md5(module_path('Geo', 'resources/json/comuni.json'));
        Cache::forget($jsonCacheKey);
        $clearedKeys[] = $jsonCacheKey;
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> dev
        
        // Pulisci la cache di Sushi
        static::clearSushiCache();
        $clearedKeys[] = 'sushi_cache';
        
<<<<<<< HEAD
=======

        // Pulisci la cache di Sushi
        static::clearSushiCache();
        $clearedKeys[] = 'sushi_cache';

>>>>>>> 4b6b99016 (first commit)
=======
>>>>>>> dev
        // Pulisci le chiavi di cache specifiche
        $searchPatterns = [
            'geo_search_',
            'geo_valid_cap_',
            'geo_gerarchia_',
            'geo_region_',
            'geo_province_',
        ];
<<<<<<< HEAD
<<<<<<< HEAD
        
=======

>>>>>>> 4b6b99016 (first commit)
=======
        
>>>>>>> dev
        foreach ($searchPatterns as $pattern) {
            for ($i = 0; $i < 10; $i++) {
                $testKey = $pattern . md5((string)$i);
                Cache::forget($testKey);
            }
        }
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> dev
        
        return $clearedKeys;
    }
    
<<<<<<< HEAD
=======

        return $clearedKeys;
    }

>>>>>>> 4b6b99016 (first commit)
=======
>>>>>>> dev
    /**
     * Restituisce tutte le regioni
     */
    public static function getRegioni(): Collection
    {
        $cacheKey = 'geo_regioni_all';
<<<<<<< HEAD
<<<<<<< HEAD
        
=======

>>>>>>> 4b6b99016 (first commit)
=======
        
>>>>>>> dev
        return Cache::remember($cacheKey, self::CACHE_TTL, function () {
            return static::query()
                ->get(['regione'])
                ->pluck('regione')
                ->unique('codice')
                ->values();
        });
    }
<<<<<<< HEAD
<<<<<<< HEAD
    
=======

>>>>>>> 4b6b99016 (first commit)
=======
    
>>>>>>> dev
    /**
     * Restituisce tutte le province di una regione
     */
    public static function getProvinceByRegione(string $regioneCode): Collection
    {
        $cacheKey = 'geo_province_by_regione_' . $regioneCode;
<<<<<<< HEAD
<<<<<<< HEAD
        
=======

>>>>>>> 4b6b99016 (first commit)
=======
        
>>>>>>> dev
        return Cache::remember($cacheKey, self::CACHE_TTL, function () use ($regioneCode) {
            return static::byRegion($regioneCode)
                ->get(['provincia'])
                ->pluck('provincia')
                ->unique('codice')
                ->values();
        });
    }
<<<<<<< HEAD
<<<<<<< HEAD
    
=======

>>>>>>> 4b6b99016 (first commit)
=======
    
>>>>>>> dev
    /**
     * Restituisce tutti i comuni di una provincia
     */
    public static function getCittaByProvincia(string $provinciaCode): Collection
    {
        $cacheKey = 'geo_citta_by_provincia_' . $provinciaCode;
<<<<<<< HEAD
<<<<<<< HEAD
        
=======

>>>>>>> 4b6b99016 (first commit)
=======
        
>>>>>>> dev
        return Cache::remember($cacheKey, self::CACHE_TTL, function () use ($provinciaCode) {
            return static::byProvince($provinciaCode)
                ->get(['nome'])
                ->pluck('nome')
                ->unique()
                ->values();
        });
    }
<<<<<<< HEAD
<<<<<<< HEAD
    
=======

>>>>>>> 4b6b99016 (first commit)
=======
    
>>>>>>> dev
    /**
     * Restituisce tutti i CAP di una città
     */
    public static function getCapByCitta(string $citta): Collection
    {
        $cacheKey = 'geo_cap_by_citta_' . md5($citta);
<<<<<<< HEAD
<<<<<<< HEAD
        
=======

>>>>>>> 4b6b99016 (first commit)
=======
        
>>>>>>> dev
        return Cache::remember($cacheKey, self::CACHE_TTL, function () use ($citta) {
            return static::where('nome', $citta)
                ->get(['cap'])
                ->pluck('cap')
                ->flatten()
                ->unique()
                ->values();
        });
    }
}
```

## Analisi Dettagliata dell'Implementazione Sushi

Analizziamo ora vantaggi, svantaggi e considerazioni specifiche per l'implementazione del modello `Comune` utilizzando Laravel Sushi.

### Vantaggi dell'Implementazione con Sushi (78% pro)

1. **API Eloquent completa (95%)**
   - Accesso a tutti i metodi nativi di Eloquent (`where`, `whereIn`, `orderBy`, ecc.)
   - Supporto completo per query builder e metodi di aggregazione
   - Query più leggibili e manutenibili rispetto alle manipolazioni di Collection

2. **Integrazione con l'ecosistema Laravel (90%)**
   - Compatibilità nativa con componenti Laravel (Form Request, Validazione, ecc.)
   - Integrazione ottimale con Filament, Livewire e altri pacchetti
   - Supporto per Eloquent API Resources e JSON:API

3. **Supporto per relazioni (88%)**
   - Possibilità di definire relazioni tra modelli geografici e altri modelli
   - Supporto per eager loading e lazy loading delle relazioni
   - Capacità di definire modelli per Regione, Provincia, ecc. con relazioni bidirezionali

4. **Schema e indici definiti (85%)**
   - Possibilità di definire indici per ottimizzare le query più comuni
   - Controllo preciso sui tipi di dati tramite `$schema` e `$casts`
   - Personalizzazione della struttura della tabella con `afterMigrate()`

5. **Performance per query complesse (82%)**
   - Prestazioni ottimali per query con clausole WHERE complesse
   - Migliore efficienza per ordinamenti e filtri su colonne JSON
   - Ottimizzazione automatica tramite indici SQLite

6. **Caching a più livelli (80%)**
   - Caching del database SQLite tramite `sushiShouldCache()`
   - Caching delle query più frequenti tramite Cache Facade
   - Invalidazione intelligente basata su file con `sushiCacheReferencePath()`

7. **Meno codice custom (75%)**
   - Eliminazione della necessità di implementare metodi di filtro personalizzati
   - Utilizzo di metodi standard di Eloquent anziché logica personalizzata
   - Semplificazione della manutenzione a lungo termine

8. **Supporto per la validazione (72%)**
   - Utilizzo diretto della regola `exists` con il namespace completo del modello
   - Validazione semplificata per form geografici
   - Messaggi di errore più precisi e contestuali

### Svantaggi dell'Implementazione con Sushi (22% contro)

1. **Overhead di memoria (95%)**
   - Creazione di un database SQLite in memoria, con consumo aggiuntivo
   - Duplicazione dei dati (array JSON originale + database SQLite)
   - Utilizzo di memoria proporzionale alla dimensione del dataset

2. **Complessità aggiunta (88%)**
   - Dipendenza da un pacchetto esterno (Sushi)
   - Necessità di comprendere il funzionamento interno di Sushi
   - Possibili problemi di debug in caso di errori

3. **Tempi di avvio (85%)**
   - Inizializzazione più lenta al primo utilizzo (creazione database SQLite)
   - Overhead per la migrazione e l'inserimento dei dati
   - Possibile impatto sulle prestazioni in ambienti con molte richieste

4. **Possibili limitazioni con SQLite (80%)**
   - Potenziali problemi con dataset molto grandi (> 10.000 righe)
   - Limitazioni nelle funzionalità avanzate di query su JSON
   - Problemi di performance per operazioni batch molto grandi

5. **Difficoltà con aggiornamenti dinamici (75%)**
   - Complessità nel gestire aggiornamenti al file JSON durante l'esecuzione
   - Necessità di invalidare la cache in modo esplicito
   - Possibili inconsistenze temporanee tra cache e dati reali

6. **Debugging più complesso (70%)**
   - Difficoltà nel diagnosticare problemi specifici di Sushi
   - Stack trace più complessi a causa dell'astrazione aggiuntiva
   - Limitazioni negli strumenti di debug per database SQLite in memoria

### Considerazioni Specifiche per il Modello Comune

1. **Gestione dati JSON annidate (85% sfida)**
   - Necessità di utilizzare `whereJsonContains` per cercare nei campi JSON come `cap`
   - Complessità nell'indicizzare campi JSON per ottimizzare le performance
   - Possibili limitazioni nelle performance per query complesse su campi JSON

2. **Caching intelligente (90% cruciale)**
   - Combinazione di caching Sushi (database SQLite) e caching Laravel (query)
   - Strategie di invalidazione cache specifiche per tipo di query
   - Equilibrio tra freschezza dei dati e performance

3. **Compatibilità API esistente (95% priorità)**
   - Mantenimento dei metodi statici esistenti per retrocompatibilità
   - Implementazione parallela di API Eloquent (scope) e API legacy
   - Documentazione chiara per facilitare la migrazione graduale

4. **Ottimizzazione performance (88% importante)**
   - Configurazione ottimale di `$sushiInsertChunkSize` per il dataset specifico
   - Definizione strategica degli indici per le query più frequenti
   - Bilanciamento tra caching e consumo di memoria

## Approccio Implementativo Raccomandato (85% favorevole)

Basandoci sull'analisi precedente, raccomandiamo un **approccio ibrido** che combini i vantaggi di Laravel Sushi con strategie di ottimizzazione specifiche per il modello `Comune`:

1. **Implementazione Sushi con caching avanzato**:
   - Utilizzo di Sushi per la gestione del database in memoria
   - Caching a due livelli: Sushi (SQLite) + Laravel (query)
   - Invalidazione intelligente basata sul file JSON sorgente

2. **API duale per la transizione**:
   - Mantenimento dei metodi statici esistenti per retrocompatibilità
   - Implementazione parallela di scope Eloquent per nuovo codice
   - Documentazione dettagliata per facilitare la migrazione

3. **Ottimizzazione per dati geografici**:
   - Indici ottimizzati per query comuni (regione, provincia, nome)
   - Gestione speciale per campi JSON (cap, regione, provincia)
   - Configurazione del chunk size ottimale per l'inserimento

4. **Strategia di roll-out graduale**:
   - Fase 1: Implementazione parallela (`ComuneSushi` accanto a `Comune`)
   - Fase 2: Test di performance e compatibilità
   - Fase 3: Migrazione graduale del codice client
   - Fase 4: Sostituzione completa una volta verificata la stabilità

## Conclusione e Raccomandazione Finale

Dopo un'analisi approfondita, raccomandiamo l'**implementazione ibrida di Laravel Sushi** per il modello `Comune` con un punteggio complessivo di **85% favorevole**. Questa soluzione offre il miglior equilibrio tra:

1. **Funzionalità Eloquent avanzate** (query builder, relazioni, eager loading)
2. **Compatibilità con l'ecosistema Laravel** (validazione, risorse, Filament)
3. **Performance ottimizzate** tramite strategie di caching a più livelli
4. **Transizione graduale** con mantenimento della compatibilità API

Per procedere, si consiglia di:

1. Implementare il modello `ComuneSushi` come proof of concept
2. Eseguire benchmark comparativi con il modello attuale
3. Documentare API, pattern di utilizzo e considerazioni di performance
4. Predisporre un piano di migrazione graduale per il codice client

---

<<<<<<< HEAD
<<<<<<< HEAD
*Documento creato il: 28/05/2025*  
=======
*Documento creato il: 28/05/2025*
>>>>>>> 4b6b99016 (first commit)
=======
*Documento creato il: 28/05/2025*  
>>>>>>> dev
*Autore: Team <main module>*
