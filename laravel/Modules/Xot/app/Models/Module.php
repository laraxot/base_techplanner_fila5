<?php

declare(strict_types=1);

namespace Modules\Xot\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Nwidart\Modules\Facades\Module as ModuleFacade;
use Nwidart\Modules\Module as NModule;
use Sushi\Sushi;

use function Safe\json_encode;

/**
 * @property int $id
 * @property string|null $name
 * @property string|null $description
 * @property bool|null $status
 * @property int|null $priority
 * @property string|null $path
 * @property string|null $icon
 * @property array<array-key, mixed>|null $colors
 * @property string|null $slug
 * @property string|null $version
 * @property bool|null $enabled
 * @property array<array-key, mixed>|null $dependencies
 * @property \Carbon\Carbon|null $installation_date
 * @property \Carbon\Carbon|null $activation_date
 * @property \Carbon\Carbon|null $deactivation_date
 * @property array<array-key, mixed>|null $metadata
 * @property string|null $laravel_version
 * @property string|null $php_version
 * @property array<array-key, mixed>|null $permissions
 * @property array<array-key, mixed>|null $routes
 * @property array<array-key, mixed>|null $assets
 * @property array<array-key, mixed>|null $settings
 * @property array<array-key, mixed>|null $usage_statistics
 * @property array<array-key, mixed>|null $error_log
 * @property array<array-key, mixed>|null $update_history
 *
 * @method static Builder<static>|Module newModelQuery()
 * @method static Builder<static>|Module newQuery()
 * @method static Builder<static>|Module query()
 * @method static Builder<static>|Module whereColors($value)
 * @method static Builder<static>|Module whereDescription($value)
 * @method static Builder<static>|Module whereIcon($value)
 * @method static Builder<static>|Module whereId($value)
 * @method static Builder<static>|Module whereName($value)
 * @method static Builder<static>|Module wherePath($value)
 * @method static Builder<static>|Module wherePriority($value)
 * @method static Builder<static>|Module whereStatus($value)
 *
 * @mixin \Eloquent
 */
class Module extends Model
{
    use Sushi;

    protected $fillable = [
        'name',
        // 'alias',
        // 'description',
        'status',
        'priority',
        'path',
        'icon',
        'colors',
        'slug',
        'version',
        'enabled',
        'dependencies',
        'installation_date',
        'activation_date',
        'deactivation_date',
        'metadata',
        'laravel_version',
        'php_version',
        'permissions',
        'routes',
        'assets',
        'settings',
        'usage_statistics',
        'error_log',
        'update_history',
    ];

    /**
     * @return array<int, array<string, mixed>>
     */
    public function getRows(): array
    {
        $modules = ModuleFacade::all();
        $modules = Arr::map($modules, function (NModule $module): array {
            $config = config('tenant::config');
            if (! is_array($config)) {
                $config = [];
            }
            $colors = Arr::get($config, 'colors', []);

            return [
                'name' => $module->getName(),
                // 'alias' => $module->getAlias(),
                'description' => $module->getDescription(),
                'status' => $module->isEnabled(),
                'priority' => $module->get('priority'),
                'path' => $module->getPath(),
                'icon' => Arr::get($config, 'icon', 'heroicon-o-question-mark-circle'),
                'colors' => json_encode($colors),
            ];
        });

        /** @var array<int, array<string, mixed>> */
        return array_values($modules);
    }

    protected function casts(): array
    {
        return [
            'name' => 'string',
            'description' => 'string',
            'status' => 'boolean',

            'priority' => 'integer',
            'path' => 'string',
            'icon' => 'string',
            'colors' => 'array',
        ];
    }
}
