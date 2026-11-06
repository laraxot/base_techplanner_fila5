<?php

declare(strict_types=1);

namespace Modules\TechPlanner\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Support\Carbon;
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
<<<<<<< .merge_file_YpVS9J
 * @property SchemalessAttributes $extra
=======
<<<<<<< HEAD
 * @property int $id
 * @property string $uuid
 * @property string|null $user_id
=======
 * @property string $id
 * @property string $user_id
>>>>>>> 6ed19256f (.)
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $fiscal_code
 * @property string|null $phone
 * @property string|null $email
 * @property string|null $notes
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property Carbon|null $deleted_at
 * @property string|null $deleted_by
 * @property string $credits
 * @property string|null $slug
 * @property SchemalessAttributes|null $extra
>>>>>>> .merge_file_GxJyMq
 * @property-read string $avatar
 * @property-read Profile|null $creator
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
 * @property-read Profile|null $updater
 * @property-read User|null $user
 * @property-read string|null $user_name
<<<<<<< HEAD
 *
<<<<<<< .merge_file_YpVS9J
 * @method static Builder<static>|Profile byUuid(string $uuid)
 * @method static Builder<static>|Profile childrenWith(array<string> $relations)
 * @method static Builder<static>|Profile childrenWithCount(array<string> $relations)
=======
=======
>>>>>>> 6ed19256f (.)
 * @method static ProfileFactory factory($count = null, $state = [])
>>>>>>> .merge_file_GxJyMq
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
 * @property int $id
 * @property string|null $user_id
 * @property string|null $type
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $address
 * @property string|null $birth_date
 * @property string|null $gender
 * @property string|null $bio
 * @property string|null $timezone
 * @property string|null $locale
 * @property array<array-key, mixed>|null $preferences
 * @property string|null $status
 * @property bool $is_active
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property string|null $deleted_by
 *
 * @method static Builder<static>|Profile whereAddress($value)
 * @method static Builder<static>|Profile whereAvatar($value)
 * @method static Builder<static>|Profile whereBio($value)
 * @method static Builder<static>|Profile whereBirthDate($value)
 * @method static Builder<static>|Profile whereCreatedAt($value)
 * @method static Builder<static>|Profile whereCreatedBy($value)
 * @method static Builder<static>|Profile whereDeletedAt($value)
 * @method static Builder<static>|Profile whereDeletedBy($value)
 * @method static Builder<static>|Profile whereEmail($value)
 * @method static Builder<static>|Profile whereExtra($value)
 * @method static Builder<static>|Profile whereFirstName($value)
 * @method static Builder<static>|Profile whereGender($value)
 * @method static Builder<static>|Profile whereId($value)
 * @method static Builder<static>|Profile whereIsActive($value)
 * @method static Builder<static>|Profile whereLastName($value)
 * @method static Builder<static>|Profile whereLocale($value)
 * @method static Builder<static>|Profile wherePhone($value)
 * @method static Builder<static>|Profile wherePreferences($value)
 * @method static Builder<static>|Profile whereStatus($value)
 * @method static Builder<static>|Profile whereTimezone($value)
 * @method static Builder<static>|Profile whereType($value)
 * @method static Builder<static>|Profile whereUpdatedAt($value)
 * @method static Builder<static>|Profile whereUpdatedBy($value)
 * @method static Builder<static>|Profile whereUserId($value)
<<<<<<< .merge_file_YpVS9J
 * @method static Builder<static>|Profile whereUserName($value)
=======
 * @method static Builder<static>|Profile withExtraAttributes()
 * @method static Builder<static>|Profile withoutPermission($permissions)
 * @method static Builder<static>|Profile withoutRole($roles, $guard = null)
<<<<<<< HEAD
 *
 * @property string|null $bio
 * @property-read Profile|null $deleter
 *
 * @method static Builder<static>|Profile whereBio($value)
>>>>>>> .merge_file_GxJyMq
 *
=======
 * @property string|null $bio
 * @property-read Profile|null $deleter
 * @method static Builder<static>|Profile whereBio($value)
>>>>>>> 6ed19256f (.)
 * @mixin \Eloquent
 */
class Profile extends BaseProfile {}
