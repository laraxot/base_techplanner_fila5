<?php

declare(strict_types=1);

namespace Modules\Tenant\Models;

<<<<<<< .merge_file_XBOhey
=======
<<<<<<< HEAD
use Carbon\Carbon;
=======
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_SDgf2w
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Modules\Tenant\Models\Traits\TenantSubscriptionRelations;

/**
 * Subscription plan, limits and billing data of a tenant (`tenant_subscriptions`).
 *
 * The `tenant()` relation lives in {@see TenantSubscriptionRelations}.
 *
 * @property string|null $tenant_id
 * @property string|null $plan_name
 * @property string|null $status
 * @property int|null $max_users
 * @property int|null $current_users
 * @property int|null $max_storage_gb
 * @property int|null $current_storage_gb
 * @property string|null $billing_cycle
 * @property float|null $billing_amount
<<<<<<< HEAD
 * @property Carbon|null $next_billing_date
 * @property Carbon|null $expires_at
<<<<<<< .merge_file_XBOhey
 * @property-read Tenant|null $tenant
 *
 * @method static Builder<static>|TenantSubscription newModelQuery()
 * @method static Builder<static>|TenantSubscription newQuery()
 * @method static Builder<static>|TenantSubscription query()
=======
=======
 * @property string|null $next_billing_date
 * @property string|null $expires_at
>>>>>>> 6ed19256f (.)
 *
 * @method static Builder|TenantSubscription newModelQuery()
 * @method static Builder|TenantSubscription newQuery()
 * @method static Builder|TenantSubscription query()
 * @method static Builder|TenantSubscription whereId($value)
 * @method static Builder|TenantSubscription whereTenantId($value)
 * @method static Builder|TenantSubscription wherePlanName($value)
 * @method static Builder|TenantSubscription whereStatus($value)
 * @method static Builder|TenantSubscription whereMaxUsers($value)
 * @method static Builder|TenantSubscription whereCurrentUsers($value)
 * @method static Builder|TenantSubscription whereMaxStorageGb($value)
 * @method static Builder|TenantSubscription whereCurrentStorageGb($value)
 * @method static Builder|TenantSubscription whereBillingCycle($value)
 * @method static Builder|TenantSubscription whereBillingAmount($value)
 * @method static Builder|TenantSubscription whereNextBillingDate($value)
 * @method static Builder|TenantSubscription whereExpiresAt($value)
 *
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @property ProfileContract|null $deleter
 *
 * @method static TenantSubscriptionFactory factory($count = null, $state = [])
 *
<<<<<<< HEAD
 * @property-read Tenant|null $tenant
 *
=======
>>>>>>> 6ed19256f (.)
 * @mixin \Eloquent
>>>>>>> .merge_file_SDgf2w
 */
class TenantSubscription extends BaseModel
{
    use TenantSubscriptionRelations;

    /**
     * @var list<string>
     */
    protected $fillable = [
        'tenant_id',
        'plan_name',
        'status',
        'max_users',
        'current_users',
        'max_storage_gb',
        'current_storage_gb',
        'billing_cycle',
        'billing_amount',
        'next_billing_date',
        'expires_at',
    ];

<<<<<<< .merge_file_XBOhey
=======
    public function tenant(): BelongsTo
    {
        return $this->belongsTo(Tenant::class);
    }
<<<<<<< HEAD

>>>>>>> .merge_file_SDgf2w
    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return array_merge(parent::casts(), [
            'next_billing_date' => 'datetime',
            'expires_at' => 'datetime',
        ]);
    }
=======
>>>>>>> 6ed19256f (.)
}
