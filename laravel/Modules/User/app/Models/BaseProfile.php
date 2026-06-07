<?php

declare(strict_types=1);

namespace Modules\User\Models;

<<<<<<< HEAD
<<<<<<< HEAD
// // use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
=======
// use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
>>>>>>> 4b6b99016 (first commit)
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Notifications\Notifiable;
<<<<<<< HEAD
use Illuminate\Support\Str;
=======
>>>>>>> 4b6b99016 (first commit)
=======
// // use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
>>>>>>> dev
use Modules\Media\Models\Media;
use Modules\User\Models\Traits\IsProfileTrait;
use Modules\Xot\Contracts\ProfileContract;
use Modules\Xot\Contracts\UserContract;
use Parental\HasChildren;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection;
use Spatie\Permission\Traits\HasRoles;
use Spatie\SchemalessAttributes\Casts\SchemalessAttributes;
use Spatie\SchemalessAttributes\SchemalessAttributesTrait;

/**
<<<<<<< HEAD
<<<<<<< HEAD
 * @property int                                                       $id
 * @property string                                                    $uuid
=======
>>>>>>> 4b6b99016 (first commit)
=======
 * @property int                                                       $id
 * @property string                                                    $uuid
>>>>>>> dev
 * @property \Spatie\SchemalessAttributes\SchemalessAttributes         $extra
 * @property string                                                    $avatar
 * @property Collection<int, DeviceUser>                               $deviceUsers
 * @property int|null                                                  $device_users_count
 * @property Collection<int, Device>                                   $devices
 * @property int|null                                                  $devices_count
 * @property string|null                                               $first_name
 * @property string|null                                               $full_name
 * @property string|null                                               $last_name
 * @property string|null                                               $lang
 * @property MediaCollection<int, Media>                               $media
 * @property int|null                                                  $media_count
 * @property Collection<int, DeviceUser>                               $mobileDeviceUsers
 * @property int|null                                                  $mobile_device_users_count
 * @property Collection<int, Device>                                   $mobileDevices
 * @property int|null                                                  $mobile_devices_count
 * @property DatabaseNotificationCollection<int, DatabaseNotification> $notifications
 * @property int|null                                                  $notifications_count
 * @property Collection<int, Permission>                               $permissions
 * @property int|null                                                  $permissions_count
 * @property Collection<int, Role>                                     $roles
 * @property int|null                                                  $roles_count
 * @property UserContract|null                                         $user
 * @property string|null                                               $user_name
 *
 * @method static Builder|ProfileContract newModelQuery()
 * @method static Builder|ProfileContract newQuery()
 * @method static Builder|ProfileContract permission($permissions, $without = false)
 * @method static Builder|ProfileContract query()
 * @method static Builder|ProfileContract role($roles, $guard = null, $without = false)
<<<<<<< HEAD
<<<<<<< HEAD
 * @method static Builder|ProfileContract byUuid(string $uuid)
=======
>>>>>>> 4b6b99016 (first commit)
=======
 * @method static Builder|ProfileContract byUuid(string $uuid)
>>>>>>> dev
 * @method static Builder|BaseProfile     withExtraAttributes()
 * @method static Builder|ProfileContract withoutPermission($permissions)
 * @method static Builder|ProfileContract withoutRole($roles, $guard = null)
 *
 * @mixin \Eloquent
 */
<<<<<<< HEAD
<<<<<<< HEAD
// @see Modules/Xot/docs/spatie-schemaless-attributes.md
=======
>>>>>>> 4b6b99016 (first commit)
=======
// @see Modules/Xot/docs/spatie-schemaless-attributes.md
>>>>>>> dev
abstract class BaseProfile extends BaseModel implements ProfileContract
{
    use HasChildren;
    use HasRoles;
<<<<<<< HEAD
<<<<<<< HEAD
    // use HasUuids;
=======
    use HasUuids;
>>>>>>> 4b6b99016 (first commit)
=======

    // use HasUuids;
>>>>>>> dev
    use InteractsWithMedia;
    use IsProfileTrait;
    use Notifiable;
    use SchemalessAttributesTrait;
<<<<<<< HEAD
<<<<<<< HEAD
    // use SoftDeletes;

    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        static::creating(static function (self $model): void {
            if (empty($model->uuid)) {
                $model->uuid = (string) Str::uuid();
            }
        });
    }

    /**
     * Scope per lookup da API/Android/Postgres (usa uuid, non id).
     */
    public function scopeByUuid(Builder $query, string $uuid): Builder
    {
        return $query->where('uuid', $uuid);
    }
=======
    use SoftDeletes;
>>>>>>> 4b6b99016 (first commit)
=======
>>>>>>> dev

    /**
     * Undocumented variable.
     * Property Modules\Xot\Models\Profile::$guard_name is never read, only written.
     */
    // private string $guard_name = 'web';

    /** @var list<string> */
    protected $fillable = [
<<<<<<< HEAD
<<<<<<< HEAD
=======
        'id',
>>>>>>> 4b6b99016 (first commit)
=======
>>>>>>> dev
        'uuid',
        'user_id',
        'type',
        'first_name',
        'last_name',
        'phone',
        'address',
        'birth_date',
        'gender',
        'email',
        'bio',
        'avatar',
        'timezone',
        'locale',
        'preferences',
        'status',
        'is_active',
        'extra',
    ];

    /** @var list<string> */
    protected $appends = [
        'full_name',
    ];

    /** @var list<string> */
    protected $with = [
        'user',
    ];

<<<<<<< HEAD
    /** @var array */
    protected $formlessAttributes = [
        'extra',
    ];

=======
    /** @var list<string> */
    protected array $formlessAttributes = [
        'extra',
    ];

    /**
     * Scope per lookup da API/Android/Postgres (usa uuid, non id).
     */
    public function scopeByUuid(Builder $query, string $uuid): Builder
    {
        return $query->where('uuid', $uuid);
    }

>>>>>>> dev
    // ✅ CORRETTO: NON implementare scopeWithExtraAttributes() manualmente
    // Il trait SchemalessAttributesTrait lo fornisce automaticamente!
    // NOTA: BaseProfile ha attributo 'extra' diretto, non relazione 'extra'

    /**
     * Ottiene l'URL dell'avatar dell'utente.
     *
     * @return string L'URL dell'avatar
     */
    public function getAvatarUrl(): string
    {
        $avatar = $this->getFirstMediaUrl('avatar');
        if ('' !== $avatar) {
            return $avatar;
        }

        // Corretto il controllo errato su $this
        $email = trim((string) $this->email);
        // 'MyEmailAddress@example.com'
        $email = mb_strtolower($email);
        // 'myemailaddress@example.com'
        $hash = hash('sha256', $email);

        return 'https://gravatar.com/avatar/'.$hash.'?s=64';

        // https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80
        // in caso eseguire php artisan module:publish
        // dddx($this);
        // dddx(asset('blog/img/no_user.webp'));
        //    return asset('modules/blog/img/no_user.webp');
        // }
        // return $this->getFirstMediaUrl();
    }

    /**
     * Ottiene la lingua dell'utente.
     *
     * @return string Il codice della lingua
     */
    public function getUserLang(): string
    {
        $locale = config('app.locale');
        $defaultLocale = 'it';

        if (null === $locale || ! is_string($locale)) {
            $locale = $defaultLocale;
        }

        $userLang = $this->lang;

        if (null === $userLang || ! is_string($userLang)) {
            return $locale;
        }

        return $userLang;
    }
<<<<<<< HEAD
=======
    // use SoftDeletes;

    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        static::creating(static function (self $model): void {
            if (empty($model->uuid)) {
                $model->uuid = (string) Str::uuid();
            }
        });
    }
>>>>>>> dev

    /** @return array<string, string> */
    #[\Override]
    protected function casts(): array
    {
        return [
<<<<<<< HEAD
<<<<<<< HEAD
            'id' => 'integer',
=======
            'id' => 'string',
>>>>>>> 4b6b99016 (first commit)
=======
            'id' => 'integer',
>>>>>>> dev
            'uuid' => 'string',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'deleted_at' => 'datetime',
            'updated_by' => 'string',
            'created_by' => 'string',
            'deleted_by' => 'string',
            'is_active' => 'boolean',
            'preferences' => 'json',
            'extra' => SchemalessAttributes::class,
        ];
    }
}
