<?php

declare(strict_types=1);

namespace Themes\Sixteen\Models\Municipal;

use Carbon\Carbon;
 *
 * @property int $id
 * @property string $name
 * @property string|null $slug
 * @property string|null $description
 * @property string|null $short_description
 * @property string $type
 * @property int|null $parent_id
 * @property string|null $code
 * @property string|null $logo
 * @property string|null $image
 * @property string|null $website
 * @property string|null $email
 * @property string|null $pec
 * @property string|null $phone
 * @property string|null $address
 * @property array|null $office_hours
 * @property bool $is_active
 * @property bool $is_public
 * @property int $position
 * @property array|null $competences
 * @property array|null $services_provided
 * @property array|null $accessibility_info
 * @property array|null $metadata
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property-read self|null $parent
 * @property-read \Illuminate\Database\Eloquent\Collection<int, self> $children
 * @property-read \Illuminate\Database\Eloquent\Collection<int, ContactPoint> $contacts
 * @property-read \Illuminate\Database\Eloquent\Collection<int, self> $allChildren
 */
class OrganizationalUnit extends Model
{
    use HasFactory, SoftDeletes;

/**
     * Tipi di unità organizzative secondo AGID
     */
    public const TYPES = [
        'municipality' => 'Comune',
        'department' => 'Dipartimento',
        'sector' => 'Settore',
        'office' => 'Ufficio',
        'service' => 'Servizio',
        'area' => 'Area',
        'division' => 'Divisione',
        'unit' => 'Unità',
        'committee' => 'Commissione',
        'council' => 'Consiglio',
        'board' => 'Giunta',
        'authority' => 'Autorità',
        'agency' => 'Agenzia',
    ];
     * Ottiene le competenze formattate
     */
    public function getFormattedCompetences(): array
    {
        if (! $this->competences || ! is_array($this->competences)) {
            return [];
        }

        return collect($this->competences)
            ->map(function ($competence) {
                if (is_string($competence)) {
                    return ['title' => $competence];
                }

                return $competence;
            })
            ->toArray();
    }

    /**
     * Ottiene i servizi forniti formattati
     */
    public function getFormattedServices(): array
    {
        if (! $this->services_provided || ! is_array($this->services_provided)) {
            return [];
        }

        return collect($this->services_provided)
            ->map(function ($service) {
                if (is_string($service)) {
                    return ['name' => $service];
                }

                return $service;
            })
            ->toArray();
    }

    /**
     * Ottiene gli orari di apertura formattati
     */
    public function getFormattedOfficeHours(): array
    {
        if (! $this->office_hours || ! is_array($this->office_hours)) {
            return [];
        }

        $days = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];
        $dayNames = [
            'monday' => 'Lunedì',
            'tuesday' => 'Martedì',
            'wednesday' => 'Mercoledì',
            'thursday' => 'Giovedì',
            'friday' => 'Venerdì',
            'saturday' => 'Sabato',
            'sunday' => 'Domenica',
        ];

        return collect($days)
            ->mapWithKeys(function ($day) use ($dayNames) {
                $hours = $this->office_hours[$day] ?? null;

                return [$dayNames[$day] => $hours];
            })
            ->filter()
            ->toArray();
    }

    /**
     * Verifica se l'unità è aperta ora
     */
    public function isOpenNow(): bool
    {
        $now = now();
        $currentDay = strtolower($now->format('l'));
        $currentTime = $now->format('H:i');

        $todayHours = $this->office_hours[$currentDay] ?? null;

        if (! $todayHours || ! is_array($todayHours)) {
            return false;
        }

        foreach ($todayHours as $period) {
            if (isset($period['open']) && isset($period['close'])) {
                if ($currentTime >= $period['open'] && $currentTime <= $period['close']) {
                    return true;
                }
            }
        }

        return false;
    }

    /**
     * Ottiene tutti gli antenati
     */
    public function getAncestors(): Collection
    {
        $ancestors = collect();
        $current = $this->parent;

        while ($current) {
            $ancestors->prepend($current);
            $current = $current->parent;
        }

        return $ancestors;
    }

    /**
     * Ottiene tutti i discendenti (recursivo)
     */
    public function getAllDescendants(): Collection
    {
        $descendants = collect();

        foreach ($this->children as $child) {
            $descendants->push($child);
            $descendants = $descendants->merge($child->getAllDescendants());
        }

        return $descendants;
    }

    /**
     * Verifica se l'unità è antenata di un'altra
     */
    public function isAncestorOf(self $unit): bool
    {
        return $unit->getAncestors()->contains('id', $this->id);
    }

    /**
     * Verifica se l'unità è discendente di un'altra
     */
    public function isDescendantOf(self $unit): bool
    {
        return $this->getAncestors()->contains('id', $unit->id);
    }

    /**
* Accessor per il nome del tipo
     */
    protected function typeName(): Attribute
    {
        return Attribute::make(
            get: fn () => self::TYPES[$this->type] ?? $this->type
        );
    }

    /**
     * Accessor per il percorso gerarchico
     */
    protected function hierarchyPath(): Attribute
    {
        return Attribute::make(
            get: function () {
                $path = collect([$this->name]);
                $current = $this;

                while ($current->parent) {
                    $current = $current->parent;
                    $path->prepend($current->name);
                }

                return $path->implode(' › ');
            }
        );
    }

    /**
     * Accessor per verificare se ha figli
     */
    protected function hasChildren(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->children()->exists()
        );
    }

    /**
     * Accessor per il livello gerarchico
     */
    protected function level(): Attribute
    {
        return Attribute::make(
            get: function () {
                $level = 0;
                $current = $this;

                while ($current->parent) {
                    $level++;
                    $current = $current->parent;
                }

                return $level;
            }
        );
    }

    /**
     * Accessor per l'URL dell'unità
     */
    protected function url(): Attribute
    {
        return Attribute::make(
            get: fn () => route('municipal.organizational-units.show', $this->slug)
        );
    }

    /**
     * Mutator per il nome (genera automaticamente lo slug)
     */
    protected function name(): Attribute
    {
        return Attribute::make(
            set: function ($value) {
                $this->attributes['name'] = $value;
                if (empty($this->attributes['slug'])) {
                    $this->attributes['slug'] = Str::slug($value);
                }

                return $value;
            }
        );
    }

    /**
     * Boot del modello
     */
    protected static function boot(): void
    {
        parent::boot();

        // Auto-increment position nella stessa categoria
static::creating(function ($model): void {
            if (is_null($model->position)) {
                $model->position = static::where('parent_id', $model->parent_id)
                    ->where('type', $model->type)
                    ->max('position') + 1;
            }
        });

        // Genera slug se mancante
static::creating(function ($model): void {
            if (empty($model->slug)) {
                $model->slug = Str::slug($model->name);
            }
        });

        // Assicura unicità dello slug
static::creating(function ($model): void {
            $originalSlug = $model->slug;
            $counter = 1;

            while (static::where('slug', $model->slug)->exists()) {
                $model->slug = $originalSlug.'-'.$counter;
                $counter++;
            }
        });
    }
}
