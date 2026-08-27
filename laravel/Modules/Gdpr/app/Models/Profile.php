<?php

declare(strict_types=1);

namespace Modules\Gdpr\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Modules\Media\Models\Media;
use Modules\User\Models\BaseProfile;
use Modules\User\Models\Device;
use Modules\User\Models\DeviceProfile;
use Modules\User\Models\DeviceUser;
use Modules\User\Models\Permission;
use Modules\User\Models\Role;
use Modules\User\Models\User;
use Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection;
use Spatie\SchemalessAttributes\SchemalessAttributes;

/**
 * Modules\Gdpr\Models\Profile.
 *
 * @property SchemalessAttributes $extra
 * @property-read string $avatar
 * @property-read \Modules\TechPlanner\Models\Profile|null $creator
 * @property-read Collection<int, DeviceUser> $deviceUsers
 * @property-read int|null $device_users_count
 * @property-read DeviceProfile|null $pivot
 * @property-read Collection<int, Device> $devices
 * @property-read int|null $devices_count
 * @property-read string|null $first_name
 * @property-read string|null $full_name
 * @property-read string|null $last_name
 * @property-read MediaCollection<int, Media> $media
 * @property-read int|null $media_count
 * @property-read Collection<int, DeviceUser> $mobileDeviceUsers
 * @property-read int|null $mobile_device_users_count
 * @property-read Collection<int, Device> $mobileDevices
 * @property-read int|null $mobile_devices_count
 * @property-read DatabaseNotificationCollection<int, DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read Collection<int, Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read Collection<int, Role> $roles
 * @property-read int|null $roles_count
 * @property-read \Modules\TechPlanner\Models\Profile|null $updater
 * @property-read User|null $user
 * @property-read string|null $user_name
 *
 * @method static Builder<static>|Profile byUuid(string $uuid)
 * @method static Builder<static>|Profile childrenWith(array<int|string, mixed> $relations)
 * @method static Builder<static>|Profile childrenWithCount(array<int|string, mixed> $relations)
 * @method static Builder<static>|Profile newModelQuery()
 * @method static Builder<static>|Profile newQuery()
 * @method static Builder<static>|Profile permission($permissions, bool $without = false)
 * @method static Builder<static>|Profile query()
 * @method static Builder<static>|Profile role($roles, ?string $guard = null, bool $without = false)
 * @method static Builder<static>|Profile team($teams, bool $without = false)
 * @method static Builder<static>|Profile withoutPermission($permissions)
 * @method static Builder<static>|Profile withoutRole($roles, ?string $guard = null)
 * @method static Builder<static>|Profile withoutTeam($teams)
 *
 * @mixin \Eloquent
 */
class Profile extends BaseProfile
{
    protected $connection = 'gdpr';
}
