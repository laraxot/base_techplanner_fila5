<?php

declare(strict_types=1);

namespace Modules\Notify\Notifications\Channels;

use Modules\Notify\Actions\SMS\SendSmsFactorSMSAction;
use Modules\Notify\Contracts\CanThemeNotificationContract;
use Modules\Notify\Notifications\ThemeNotification;

class NetfunChannel
{
    /**
     * Send the given notification.
     */
    public function send(CanThemeNotificationContract $notifiable, ThemeNotification $themeNotification): void
    {
        $smsData = $themeNotification->toSms($notifiable);

        $action = app(SendSmsFactorSMSAction::class);

<<<<<<< .merge_file_Tx9mOY
        /** @var array<string, mixed> $data */
=======
>>>>>>> .merge_file_oDyYBI
        $data = $action->execute($smsData);

        $notifiable->increase('sms', $data);
    }
}
