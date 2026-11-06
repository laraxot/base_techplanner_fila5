<?php

declare(strict_types=1);

namespace Modules\Tenant\Models;

use Illuminate\Database\Eloquent\Builder;
use Modules\Tenant\Models\Traits\TenantSettingRelations;

/**
 * Key/value setting owned by a tenant (`tenant_settings`).
 *
 * The `tenant()` relation lives in {@see TenantSettingRelations}.
 *
 * @property string|null $tenant_id
 * @property string|null $key
 * @property string|null $value
 * @property string|null $type
<<<<<<< .merge_file_TSgvMu
 * @property-read Tenant|null $tenant
 *
 * @method static Builder<static>|TenantSetting newModelQuery()
 * @method static Builder<static>|TenantSetting newQuery()
 * @method static Builder<static>|TenantSetting query()
=======
 *
 * @method static Builder|TenantSetting newModelQuery()
 * @method static Builder|TenantSetting newQuery()
 * @method static Builder|TenantSetting query()
 * @method static Builder|TenantSetting whereId($value)
 * @method static Builder|TenantSetting whereTenantId($value)
 * @method static Builder|TenantSetting whereKey($value)
 * @method static Builder|TenantSetting whereValue($value)
 * @method static Builder|TenantSetting whereType($value)
 *
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @property ProfileContract|null $deleter
 *
 * @method static TenantSettingFactory factory($count = null, $state = [])
 *
<<<<<<< HEAD
 * @property-read Tenant|null $tenant
 *
=======
>>>>>>> 6ed19256f (.)
 * @mixin \Eloquent
>>>>>>> .merge_file_ZBhI5o
 */
class TenantSetting extends BaseModel
{
    use TenantSettingRelations;

    /**
     * @var list<string>
     */
    protected $fillable = [
        'tenant_id',
        'key',
        'value',
        'type',
    ];
}
