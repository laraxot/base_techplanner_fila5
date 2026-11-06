<?php

declare(strict_types=1);

namespace Modules\Tenant\Models;

// use Modules\Patient\Models\Patient; // Module not available
// use Modules\Dental\Models\Appointment; // Module not available
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;
use Modules\Tenant\Models\Traits\TenantMutators;
use Modules\Tenant\Models\Traits\TenantRelations;
use Modules\Xot\Contracts\UserContract;

/**
 * Modello Tenant per la gestione multi-tenant dell'applicazione.
 *
 * @property string|null $name
 * @property string|null $domain
 * @property string|null $database
 * @property string|null $slug
 * @property array<array-key, mixed>|null $settings
 * @property bool $is_active
 * @property Carbon|null $last_activity_at
 * @property string|null $logo
<<<<<<< .merge_file_JW2SA6
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $address
 * @property string|null $city
 * @property string|null $postal_code
 * @property string|null $province
 * @property string|null $country
 * @property string|null $tax_code
 * @property string|null $vat_number
=======
<<<<<<< HEAD
 * @property \Carbon\Carbon|null $last_activity_at
=======
 *
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_7jMFeg
 * @property-read string $url
 * @property-read Collection<int, Model&UserContract> $users
 * @property-read int|null $users_count
 *
 * @method static \Modules\Tenant\Database\Factories\TenantFactory factory($count = null, $state = [])
 * @method static Builder<static>|Tenant newModelQuery()
 * @method static Builder<static>|Tenant newQuery()
 * @method static Builder<static>|Tenant query()
 *
<<<<<<< .merge_file_JW2SA6
=======
 * @property string $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @property ProfileContract|null $deleter
 *
 * @method static Builder<static>|Tenant whereCreatedAt($value)
 * @method static Builder<static>|Tenant whereDatabase($value)
 * @method static Builder<static>|Tenant whereDeletedAt($value)
 * @method static Builder<static>|Tenant whereDomain($value)
 * @method static Builder<static>|Tenant whereId($value)
 * @method static Builder<static>|Tenant whereIsActive($value)
 * @method static Builder<static>|Tenant whereName($value)
 * @method static Builder<static>|Tenant whereSlug($value)
 * @method static Builder<static>|Tenant whereUpdatedAt($value)
<<<<<<< HEAD
 * @method static Builder<static>|Tenant whereSettings($value)
=======
>>>>>>> 6ed19256f (.)
 *
 * @mixin \Eloquent
>>>>>>> .merge_file_7jMFeg
 */
class Tenant extends BaseModel
{
    use TenantMutators;
    use TenantRelations;

    /**
     * Gli attributi che sono mass assignable.
     */
    protected $fillable = [
        'name',
        'domain',
        'database',
        'slug',
        'settings',
        'is_active',
        'logo',
        'email',
        'phone',
        'address',
        'city',
        'postal_code',
        'province',
        'country',
        'tax_code',
        'vat_number',
<<<<<<< HEAD
        'last_activity_at',
=======
>>>>>>> 6ed19256f (.)
    ];

    // Commented out - Patient and Dental modules not available
    // /**
    //  * Relazione con i pazienti associati al tenant.
    //  */
    // public function patients(): HasMany
    // {
    //     return $this->hasMany(Patient::class);
    // }

    // /**
    //  * Relazione con gli appuntamenti associati al tenant.
    //  */
    // public function appointments(): HasMany
    // {
    //     return $this->hasMany(Appointment::class);
    // }

    /**
     * Verifica se il tenant è attivo.
     */
    public function isActive(): bool
    {
        $isActive = $this->attributes['is_active'] ?? false;

        return (bool) $isActive;
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'settings' => 'array',
            'is_active' => 'boolean',
<<<<<<< HEAD
            'last_activity_at' => 'datetime',
=======
>>>>>>> 6ed19256f (.)
        ];
    }
}
