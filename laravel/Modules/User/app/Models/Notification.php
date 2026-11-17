<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\DatabaseNotification as BaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
<<<<<<< HEAD
=======
use Modules\User\Database\Factories\NotificationFactory;
>>>>>>> 6ed19256f (.)
use Modules\Xot\Models\Traits\HasXotFactory;

/**
 * @property Model|\Eloquent $notifiable
 *
 * @method static DatabaseNotificationCollection<int, static> all($columns = ['*'])
 * @method static DatabaseNotificationCollection<int, static> get($columns = ['*'])
 * @method static Builder|Notification                        newModelQuery()
 * @method static Builder|Notification                        newQuery()
 * @method static Builder|Notification                        query()
 * @method static Builder|Notification                        read()
 * @method static Builder|Notification                        unread()
 * @method static DatabaseNotificationCollection<int, static> all($columns = ['*'])
 * @method static DatabaseNotificationCollection<int, static> get($columns = ['*'])
 * @method static DatabaseNotificationCollection<int, static> all($columns = ['*'])
 * @method static DatabaseNotificationCollection<int, static> get($columns = ['*'])
 *
 * @mixin IdeHelperNotification
 *
<<<<<<< HEAD
 * @method static \Modules\User\Database\Factories\NotificationFactory factory($count = null, $state = [])
=======
 * @method static NotificationFactory factory($count = null, $state = [])
>>>>>>> 6ed19256f (.)
 *
 * @mixin \Eloquent
 */
class Notification extends BaseNotification
{
    use HasXotFactory;

<<<<<<< HEAD
=======
    /** @var string */
>>>>>>> 6ed19256f (.)
    protected $connection = 'user';

    // protected $fillable = ['id', 'user_id', 'client_id', 'name', 'scopes', 'revoked', 'expires_at'];
}
