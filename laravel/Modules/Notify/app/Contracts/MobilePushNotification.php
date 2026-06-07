<?php

declare(strict_types=1);

namespace Modules\Notify\Contracts;

use Kreait\Firebase\Messaging\Message;

/**
<<<<<<< HEAD
 * phpstan-require-extends Model
 * Interface Modules\Notify\Contracts\MobilePushNotification requires
 * implementing class to extend Illuminate\Database\Eloquent\Model,
 * but Modules\Notify\Notifications\FirebaseAndroidNotification does not.
=======
 * Contract for mobile push notifications (Firebase FCM, etc.).
 * Implementations may use Kreait Firebase or other providers.
>>>>>>> dev
 */
interface MobilePushNotification
{
    /**
<<<<<<< HEAD
     * Retrieves the payload to be sent to FCM service,
     * properly encapsulated as Message instance.
     */
    public function toCloudMessage(): Message;

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(?object $notifiable): array;
=======
     * Get the array representation of the notification.
     *
     * @param  object|null  $notifiable  The entity to be notified
     * @return array<string, mixed>
     */
    public function toArray(?object $notifiable): array;

    /**
     * Convert to a cloud message (Firebase CloudMessage or compatible).
     *
     * @return Message|array<string, mixed>
     */
    public function toCloudMessage(): Message|array;
>>>>>>> dev
}
