<?php

declare(strict_types=1);

namespace Modules\Tenant\Models;

<<<<<<< .merge_file_5cOWwF
=======
<<<<<<< HEAD
use Carbon\Carbon;
=======
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_HQp0kh
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Modules\Tenant\Actions\Domains\GetDomainsArrayAction;
use Sushi\Sushi;

/**
<<<<<<< .merge_file_5cOWwF
 * @property string|null $id
 * @property string|null $tenant_id
=======
 * @property int|null $id
<<<<<<< HEAD
 * @property string|int|null $tenant_id
=======
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_HQp0kh
 * @property string|null $name
 * @property string|null $domain
 * @property bool $is_primary
 * @property string|null $status
 * @property string|null $verification_token
<<<<<<< HEAD
 * @property Carbon|null $verified_at
=======
 * @property string|null $verified_at
>>>>>>> 6ed19256f (.)
 *
 * @method static Builder<static>|TenantDomain newModelQuery()
 * @method static Builder<static>|TenantDomain newQuery()
 * @method static Builder<static>|TenantDomain query()
 * @method static Builder<static>|TenantDomain whereId($value)
 * @method static Builder<static>|TenantDomain whereName($value)
 *
 */
class TenantDomain extends BaseModel
{
    use Sushi;

    protected $fillable = [
<<<<<<< HEAD
        'tenant_id',
=======
>>>>>>> 6ed19256f (.)
        'name',
        'domain',
        'is_primary',
        'status',
        'verification_token',
        'verified_at',
    ];

    /**
     * Model Rows.
     *
     * @return array<int, array<string, string>>
     */
    public function getRows(): array
    {
        return app(GetDomainsArrayAction::class)->execute();
    }
}
