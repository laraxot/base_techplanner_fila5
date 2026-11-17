<?php

declare(strict_types=1);

namespace Modules\Notify\Channels;

use Exception;
use Illuminate\Notifications\Notification;
use Modules\Notify\Actions\SMS\SendNetfunSMSAction;
use Modules\Notify\Datas\SmsData;

class NetfunChannel
{
    protected SendNetfunSMSAction $sendSMSAction;

    public function __construct(SendNetfunSMSAction $sendSMSAction)
    {
        $this->sendSMSAction = $sendSMSAction;
    }

    /**
     * Invia la notifica tramite Netfun SMS
<<<<<<< HEAD
     */
    public function send(mixed $notifiable, Notification $notification): ?array
=======
     *
     * @param  mixed  $notifiable
     *
     * @return array|null
     */
    public function send($notifiable, Notification $notification)
>>>>>>> 6ed19256f (.)
    {
        // Ottieni il numero di telefono dal Notifiable
        if (! is_object($notifiable) || ! method_exists($notifiable, 'routeNotificationForNetfun')) {
            return null;
        }

        $recipient = $notifiable->routeNotificationForNetfun($notification);
<<<<<<< HEAD
        if (! is_string($recipient) || $recipient === '') {
=======
        if (! $recipient) {
>>>>>>> 6ed19256f (.)
            return null;
        }

        // Ottieni il messaggio dalla notifica
        if (! method_exists($notification, 'toNetfun')) {
            throw new Exception('Il metodo toNetfun() non è implementato nella notifica');
        }

        $message = $notification->toNetfun($notifiable);

        // Crea i dati SMS
<<<<<<< HEAD
        $body = is_string($message)
            ? $message
            : (string) (is_object($message) && method_exists($message, 'getContent') ? $message->getContent() : '');
        $smsData = SmsData::from([
            'recipient' => (string) $recipient,
            'body' => $body,
=======
        $smsData = SmsData::from([
            'recipient' => $recipient,
            'body' => is_string($message)
                ? $message
                : (is_object($message) && method_exists($message, 'getContent') ? $message->getContent() : ''),
>>>>>>> 6ed19256f (.)
            'from' => '',
        ]);

        // Esegui l'invio tramite la Queueable Action
        // L'esecuzione avverrà in modo asincrono (in background)
<<<<<<< HEAD
        $result = $this->sendSMSAction->onQueue('sms')->execute($smsData);

        return is_array($result) ? $result : null;
=======
        return $this->sendSMSAction->onQueue('sms')->execute($smsData); // Esegui sulla coda 'sms'
>>>>>>> 6ed19256f (.)
    }
}
