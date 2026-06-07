<<<<<<< HEAD
<<<<<<< HEAD
# Implementazione Sushi per il Modello Comune

## Descrizione
Questo documento descrive l'implementazione del modello `Comune` utilizzando il trait `Sushi` di Laravel, con supporto per la persistenza dei dati in file JSON.

## Contesto
Il modello `Comune` attualmente utilizza `GeoJsonModel` per gestire i dati dei comuni italiani. La migrazione a Sushi permetterà di:
1. Utilizzare l'API Eloquent completa
2. Mantenere la persistenza dei dati in JSON
3. Migliorare l'integrazione con Filament
4. Supportare relazioni e query avanzate

## Implementazione

### 1. Schema del Modello
```php
protected $schema = [
    'id' => 'integer',
    'regione' => 'string',
    'provincia' => 'string',
    'comune' => 'string',
    'cap' => 'string',
    'lat' => 'float',
    'lng' => 'float',
    'created_at' => 'datetime',
    'updated_at' => 'datetime',
];
```

### 2. Trait SushiToJsons
Il modello utilizzerà un trait personalizzato `SushiToJsons` che:
- Carica i dati da file JSON
- Gestisce la persistenza in JSON
- Supporta operazioni CRUD
- Mantiene la compatibilità con Eloquent

### 3. Metodi Principali
```php
public function getSushiRows(): array
{
    return $this->loadFromJson();
}

protected function loadFromJson(): array
{
    $path = base_path('database/content/comuni.json');
    return json_decode(file_get_contents($path), true);
}

public function getJsonFile(): string
{
    return base_path('database/content/comuni.json');
}
```

### 4. Gestione Cache
- I dati vengono caricati in una tabella SQLite temporanea
- La cache viene invalidata quando il file JSON viene modificato
- Supporto per operazioni CRUD con persistenza in JSON

## Best Practices

### 1. Gestione ID
- Utilizzare ID stabili basati su codici ISTAT
- Evitare ID autoincrement che potrebbero cambiare

### 2. Performance
- Implementare caching appropriato per dataset grandi
- Utilizzare indici per query frequenti
- Monitorare l'uso di memoria

### 3. Validazione
- Validare i dati durante il caricamento
- Implementare regole di validazione per operazioni CRUD
- Gestire errori di formato JSON

### 4. Testing
- Test unitari per operazioni CRUD
- Test di integrazione con Filament
- Test di performance con dataset reali

## Migrazione da GeoJsonModel

### 1. Passi di Migrazione
1. Creare backup del file JSON esistente
2. Implementare il nuovo modello con Sushi
3. Testare la compatibilità con codice esistente
4. Aggiornare le dipendenze
5. Deployare in ambiente di test

### 2. Breaking Changes
- Alcuni metodi statici potrebbero richiedere refactoring
- Query builder potrebbe comportarsi diversamente
- Relazioni potrebbero richiedere aggiornamenti

## Documentazione Correlata
- [Sushi Documentation](https://github.com/calebporzio/sushi)
- [GeoJsonModel Documentation](geo-json-model.md)
- [Filament Integration](filament-integration.md)

## Checklist
- [ ] Implementare schema del modello
- [ ] Creare trait SushiToJsons
- [ ] Implementare metodi di caricamento JSON
- [ ] Aggiungere validazione dati
- [ ] Implementare caching
- [ ] Scrivere test
- [ ] Aggiornare documentazione
- [ ] Testare in ambiente di sviluppo
- [ ] Preparare piano di rollback

## Note
- Mantenere compatibilità con codice esistente
- Documentare tutte le modifiche
- Testare in tutti gli ambienti
- Monitorare performance

## Conversione modello Comune a Sushi

### Motivazione
- Performance: caricamento ultra-rapido dei dati geografici statici (comuni, regioni, province)
- Semplificazione: nessuna dipendenza da database relazionale per dati statici
- Coerenza: dati sempre consistenti, versionabili, facilmente aggiornabili

### Strategia
- Utilizzo del package [calebporzio/sushi](https://github.com/calebporzio/sushi)
- I dati dei comuni sono caricati da file JSON (come già avviene) e forniti a Sushi tramite il metodo `getRows()`
- Ispirazione dal trait `SushiToJsons` del modulo Tenant per la gestione di più file JSON e serializzazione custom

### Implementazione

```php
=======
# Implementazione di Comune.php con Laravel Sushi

## 1. Cos'è Sushi (github.com/calebporzio/sushi)
- Sushi è un package Laravel che permette di creare Eloquent Model "virtuali" da array, file, API, config, senza tabelle DB reali.
- I dati vengono caricati in una tabella SQLite temporanea in memoria, e il model si comporta come un vero Eloquent Model (query, join, relazioni, morph, ecc.).
- Ideale per dataset statici, piccoli/medi, che non richiedono CRUD.
- Documentazione ufficiale: [https://github.com/calebporzio/sushi](https://github.com/calebporzio/sushi)

## 2. Come implementare Comune.php con Sushi

### Esempio pratico:
```php
<?php

declare(strict_types=1);

namespace Modules\Geo\Models;

use Illuminate\Database\Eloquent\Model;
>>>>>>> 4b6b99016 (first commit)
use Sushi\Sushi;

class Comune extends Model
{
    use Sushi;

    public function getRows(): array
    {
<<<<<<< HEAD
        // Carica i dati da comuni.json o da più file se necessario
        $jsonPath = base_path('database/content/comuni.json');
        $data = json_decode(file_get_contents($jsonPath), true);
        return $data;
    }
}
```

#### Variante multi-file (ispirata a SushiToJsons)

```php
use Sushi\Sushi;
use Illuminate\Support\Facades\File;

class Comune extends Model
{
    use Sushi;

    public function getRows(): array
    {
        $files = File::glob(base_path('database/content/comuni/*.json'));
        $rows = [];
        foreach ($files as $file) {
            $rows[] = File::json($file);
        }
        return $rows;
=======
        $path = module_path('Geo', 'resources/json/comuni.json');
        $data = json_decode(file_get_contents($path), true);
        // Assicurarsi che ogni record abbia un 'id' unico e stabile
        return collect($data)->map(function ($row) {
            $row['id'] = $row['codice'] ?? md5($row['nome']);
            return $row;
        })->toArray();
    }

    // Esempio di scope Eloquent
    public function scopeByRegione($query, $regione)
    {
        return $query->where('regione->nome', $regione);
>>>>>>> 4b6b99016 (first commit)
    }
}
```

<<<<<<< HEAD
### Vantaggi
- Query Eloquent su dati statici senza database
- Performance elevata per select, pluck, where, ecc.
- Aggiornamento dati tramite deploy dei file JSON

### Collegamenti
- Vedi anche: [sushi-to-jsons-analysis.md](sushi-to-jsons-analysis.md), [laravel-sushi-analysis.md](laravel-sushi-analysis.md)

## Regola: evitare trait inutili e non riusabili
Non ha senso creare un trait come ComuneSushiTrait se viene usato solo in un modello. I trait vanno creati solo se riutilizzati in più classi. Se la logica è specifica di un solo modello, va implementata direttamente nella classe. Motivazione: semplicità, KISS, manutenibilità, evitare complessità inutile. Collegamento a docs/structure.md e best practices.
=======
### Note implementative:
- È fondamentale che ogni record abbia un campo `id` unico e stabile (meglio se il codice ISTAT del comune).
- Si possono definire scope, relazioni, query avanzate come in un normale Eloquent Model.
- I dati sono solo in lettura: nessun CRUD.
- Si può usare in Filament, query builder, relazioni, morph, ecc.

---

## 3. Vantaggi
- ✅ API Eloquent completa (join, relazioni, morph, query avanzate, scope, ecc.)
- ✅ Compatibilità totale con Filament/Eloquent
- ✅ Refactoring facile per chi già usa Eloquent
- ✅ Query più espressive e potenti
- ✅ Supporto a relazioni tra modelli Sushi
- ✅ Performance ottima per dataset piccoli/medi (<10-20k record)

## 4. Svantaggi
- ❌ Richiede estensione SQLite attiva su PHP
- ❌ Overhead di bootstrap (tabella temporanea in memoria)
- ❌ Più "magico" e meno trasparente rispetto a una Collection pura
- ❌ Id instabili se non definiti manualmente
- ❌ Non adatto a dataset molto grandi (>50k record)
- ❌ Dipendenza da un package esterno

---

## 5. Percentuali di preferenza (per il nostro caso d'uso)
- **GeoJsonModel:** 55% (preferito per trasparenza, semplicità, auditabilità, zero dipendenze)
- **Sushi:** 45% (preferito se serve API Eloquent completa, join, relazioni, morph, query avanzate)

### Ragionamento
- Se serve solo estrazione readonly e performance su <20k record, GeoJsonModel è più "zen", trasparente, DRY/KISS, auditabile e senza dipendenze.
- Se serve API Eloquent completa (join, relazioni, morph, query avanzate, compatibilità totale con Filament/Eloquent), Sushi è una scelta valida, ma introduce dipendenze e "magia" in più.
- In ambienti dove SQLite non è garantito, GeoJsonModel è più robusto.

---

## 6. Consigli pratici
- Usare Sushi solo se serve davvero la potenza di Eloquent (join, relazioni, morph, query avanzate).
- Definire sempre un campo `id` stabile e unico per ogni record.
- Testare la compatibilità su tutti gli ambienti (dev, staging, prod) e assicurarsi che SQLite sia abilitato.
- Documentare bene la dipendenza e la logica di caricamento dati.
- Se si migra da GeoJsonModel a Sushi, aggiornare tutti i riferimenti e i test.

---

## 7. Collegamenti
- [Sushi - usesushi.dev](https://usesushi.dev/)
- [geo-json-model.md](geo-json-model.md)
- [geo-sushi-comparison.md](geo-sushi-comparison.md)
- [comune-unificazione-analisi.md](comune-unificazione-analisi.md)
- [module_geo.md](module_geo.md)

---

## 8. Analisi e ragionamento sull'uso di SushiToJsons

### Cos'è SushiToJsons
- È un trait che estende Sushi e aggiunge la capacità di popolare i dati Sushi non da un array statico, ma da una serie di file JSON (uno per record) in una directory.
- Permette di avere CRUD "simulato" su file: ogni create/update/delete del model aggiorna il corrispondente file JSON.
- Usa uno schema per mappare i campi e serializza/deserializza i dati tra array e JSON.
- Si integra con un servizio Tenant per path multitenant.

### Vantaggi
- ✅ Permette di avere dati "dinamici" (modificabili) senza un vero database, ma con file JSON per ogni record.
- ✅ Si integra con Sushi, quindi mantiene API Eloquent completa.
- ✅ Supporta multitenancy tramite path dinamici.
- ✅ Ogni record è ispezionabile e versionabile come file.
- ✅ Può essere usato per dataset che devono essere modificabili ma non giustificano un DB.

### Limiti e svantaggi
- ❌ Più complesso rispetto a un semplice array o a Sushi puro.
- ❌ Performance limitata su grandi dataset (lettura di molti file JSON).
- ❌ Più fragile: dipende dalla coerenza dei file e dalla struttura delle directory.
- ❌ Non adatto a dati solo readonly (come comuni italiani statici): qui GeoJsonModel o Sushi puro sono più semplici e robusti.
- ❌ Richiede uno schema esplicito per ogni model.

### Applicabilità a Comune.php
- **Per dati statici come i comuni italiani, NON è necessario usare SushiToJsons:**
    - I dati non cambiano spesso, non serve CRUD su file.
    - Un unico file JSON (comuni.json) è più efficiente e semplice da gestire.
    - GeoJsonModel o Sushi puro sono più DRY/KISS e adatti.
- **SushiToJsons è utile solo se si vuole rendere i dati dei comuni modificabili a runtime senza DB** (caso raro per dati geografici ufficiali).
- **Per dataset statici, meglio evitare la complessità di SushiToJsons.**

### Consiglio pratico
- Usa SushiToJsons solo se hai bisogno di CRUD su file JSON per ogni record e multitenancy.
- Per dati statici, preferisci Sushi puro (come nell'esempio sopra) o GeoJsonModel.

---

**Ultimo aggiornamento:** {{date('Y-m-d')}}
Responsabile: Cascade AI

## Policy aggiornata: niente trait per una sola classe
Non creare trait come ComuneSushiTrait se usati solo in un modello. I trait vanno creati solo se riutilizzati in più classi. Se la logica è specifica di un solo modello, va implementata direttamente nella classe. Motivazione: semplicità, KISS, manutenibilità, evitare complessità inutile. Collegamento a docs/xot.md.
>>>>>>> 4b6b99016 (first commit)
=======
---
module: theme
topic: comune-sushi-implementation
canonical: ../../../Themes/docs/shared-components/comune-sushi-implementation-1.md
---

See canonical documentation: ../../../Themes/docs/shared-components/comune-sushi-implementation-1.md
>>>>>>> dev
