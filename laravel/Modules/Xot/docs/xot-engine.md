# 🚀 XOT - IL MOTORE FONDAMENTALE DI LARAXOT

## 📋 INDICE
1. [Filosofia Xot](#-filosofia-xot)
2. [Architettura Core](#-architettura-core)
3. [Classi Fondamentali](#-classi-fondamentali)
4. [Pattern Implementativi](#-pattern-implementativi)
5. [Estensioni Future](#-estensioni-future)

---

## 🧠 FILOSOFIA XOT (The Engine Philosophy)

### **Principio Fondamentale: Xot è il Motore, non il Veicolo**
Xot non contiene logica di business, fornisce i **mattoni** per costruirla:
- **50+ Classi Base**: Le fondamenta per ogni pattern
- **20+ Service Provider**: L'iniezione di dipendenze core
- **15+ Trait**: Funzionalità trasversali riutilizzabili
- **Type System**: Garanzia di qualità assoluta

### **DNA Xot: Qualità by Design**
```php
// Dogma Xot: Qualità non è opzionale, è DNA
abstract class XotBaseModel extends Model {
    use HasXotFactory;    // Factory pattern
    use Updater;          // Audit automatico
    use RelationX;        // Relazioni advanced
    // ... 20+ funzionalità standard
}
```

---

## 🏗️ ARCHITETTURA CORE (Core Architecture)

### **1. Layer Model Base**
```
XotBaseModel (Motore)
    ↓
BaseModel (Modulo)
    ↓
Model Specifico (Business)
```

### **2. Service Provider Architecture**
```php
// XotServiceProvider: Il cuore dell'iniezione
class XotServiceProvider extends ServiceProvider {
    public function register(): void {
        $this->app->singleton(CacheManager::class);
        $this->app->singleton(QueryOptimizer::class);
        $this->app->singleton(ApiResponseService::class);
        // ... 20+ servizi core
    }
}
```

### **3. Trait System**
```php
// Traits come "mattoncini" componibili
trait HasExtraTrait {       // Campi extra dinamici
trait HasCaching {          // Caching intelligente
trait DispatchesDomainEvents { // Eventi di dominio
trait HasQueryOptimization {   // Query ottimizzate
```

---

## 🏛️ CLASSI FONDAMENTALI (Foundation Classes)

### **XotBaseModel: Il Modello Perfetto**
```php
<?php

declare(strict_types=1);

namespace Modules\Xot\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Xot\Models\Traits\HasXotFactory;
use Modules\Xot\Traits\Updater;

/**
 * XotBaseModel: Il DNA di ogni modello Laraxot
 *
 * Fornisce AUTOMATICAMENTE:
 * - Factory pattern con HasXotFactory
 * - Audit trail con Updater (created_by, updated_by)
 * - Relazioni advanced con RelationX
 * - Soft deletes (commentato, attivabile)
 * - 20+ proprietà standard configurate
 * - Type hints completi per PHPStan Level 10
 */
abstract class XotBaseModel extends Model
{
    use HasXotFactory;
    use Traits\RelationX;
    use Updater;
    // use SoftDeletes;  // Decommenta quando necessario

    /**
     * Snake attributes per compatibilità database
     * @see https://laravel-news.com/6-eloquent-secrets
     */
    public static $snakeAttributes = true;

    /** @var bool Auto-increment ID */
    public $incrementing = true;

    /** @var bool Timestamps automatici */
    public $timestamps = true;

    /** @var int Pagination default */
    protected $perPage = 30;

    /** @var string Connection di default */
    protected $connection = 'user';

    /** @var list<string> Append automatici */
    protected $appends = [];

    /** @var string Primary key standard */
    protected $primaryKey = 'id';

    /** @var string Key type */
    protected $keyType = 'string';

    /** @var list<string> Campi hidden standard */
    protected $hidden = [];

    /** @var list<string> Campi fillable di base */
    protected $fillable = ['id'];

    /**
     * Boot method per configurazioni automatiche
     * Ogni modello eredita queste configurazioni SENZA scrivere codice
     */
    protected static function boot(): void
    {
        parent::boot();

        // Event listeners automatici
        static::creating(function ($model) {
            // Logica pre-creazione automatica
        });

        static::updating(function ($model) {
            // Logica pre-aggiornamento automatica
        });
    }
}
```

### **XotBaseController: Il Controller Perfetto**
```php
<?php

declare(strict_types=1);

namespace Modules\Xot\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;

/**
 * XotBaseController: Il DNA di ogni controller Laraxot
 *
 * Fornisce AUTOMATICAMENTE:
 * - Authorization con AuthorizesRequests
 * - Job dispatch con DispatchesJobs
 * - Validation con ValidatesRequests
 * - Base methods comuni
 * - Error handling standardizzato
 */
abstract class XotBaseController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Response JSON standardizzato
     */
    protected function jsonResponse($data, int $status = 200): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'data' => $data,
            'status' => $status,
            'timestamp' => now()->toISOString(),
        ], $status);
    }

    /**
     * Error response standardizzato
     */
    protected function errorResponse(string $message, int $status = 400): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'error' => $message,
            'status' => $status,
            'timestamp' => now()->toISOString(),
        ], $status);
    }
}
```

### **XotBaseResource: La Risorsa Filament Perfetta**
```php
<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources;

use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Datas\XotData;

/**
 * XotBaseResource: Il DNA di ogni risorsa Filament
 *
 * Fornisce AUTOMATICAMENTE:
 * - Form schema standard
 * - Table schema standard
 * - Base configuration
 * - Multi-tenant support
 * - Navigation setup
 */
abstract class XotBaseResource extends Resource
{
    /**
     * Get form schema con validation automatica
     */
    public static function getFormSchema(): array
    {
        return [
            // Schema base automatico
            // I moduli sovrascrivono solo le specificità
        ];
    }

    /**
     * Get table schema con columns automatiche
     */
    public static function getTableSchema(): array
    {
        return [
            // Colonne base automatiche
            // I moduli aggiungono solo le specifiche
        ];
    }

    /**
     * Multi-tenant configuration
     */
    public static function getTenant(): ?string
    {
        return XotData::make()->getTenantClass();
    }
}
```

---

## 🎯 PATTERN IMPLEMENTATIVI (Implementation Patterns)

### **1. BaseModel Pattern: Eredità Controllata**
```php
// Ogni modulo DEVE avere il proprio BaseModel
abstract class BaseModel extends XotBaseModel {
---
module: theme
topic: xot-engine
canonical: ../../../Themes/docs/shared-components/xot-engine-complete-guide.md
---

See canonical documentation: ../../../Themes/docs/shared-components/xot-engine-complete-guide.md
