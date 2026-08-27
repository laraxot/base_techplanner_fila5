<?php

declare(strict_types=1);

namespace Modules\Notify\Channels;

use Exception;
use Illuminate\Notifications\Notification;
use Modules\Notify\Actions\SMS\SendSmsFactorSMSAction;
use Modules\Notify\Datas\SmsData;

/**
 * Canale di notifica per l'invio di messaggi SMS.
 *
 * Questo canale utilizza il driver SMS configurato in config/sms.php
 * per inviare messaggi SMS attraverso il provider selezionato.
 */
class SmsChannel
{
    /**
     * Crea una nuova istanza del canale.
     */
<<<<<<< .merge_file_hKi5YS
    public function __construct(private readonly SendSmsFactorSMSAction $action)
    {
    }
=======
    public function __construct(private readonly SendSmsFactorSMSAction $action) {}
>>>>>>> .merge_file_WLwAD9

    /**
     * Invia la notifica attraverso il canale SMS.
     *
     * @param  Notification  $notification  Notifica da inviare
<<<<<<< .merge_file_hKi5YS
     *
     * @return array<string, mixed>|null Risultato dell'operazione o null in caso di errore
=======
     * @return array{status_code: int, status_txt: string} Risultato dell'invio restituito da SendSmsFactorSMSAction
>>>>>>> .merge_file_WLwAD9
     *
     * @throws Exception Se la notifica non ha il metodo toSms o il driver non è supportato
     */
    public function send(mixed $notifiable, Notification $notification): ?array
    {
        if (! method_exists($notification, 'toSms')) {
            throw new Exception('Notification does not have toSms method');
        }

        $smsData = $notification->toSms($notifiable);

        if (! ($smsData instanceof SmsData)) {
            throw new Exception('toSms method must return an instance of SmsData');
        }

        return $this->action->execute($smsData);
    }
}
