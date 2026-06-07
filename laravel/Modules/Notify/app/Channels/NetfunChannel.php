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
     *
     * @param  mixed  $notifiable
     * @return array|null
     */
    public function send($notifiable, Notification $notification)
=======
     */
    public function send(mixed $notifiable, Notification $notification): ?array
>>>>>>> dev
    {
        // Ottieni il numero di telefono dal Notifiable
        if (! is_object($notifiable) || ! method_exists($notifiable, 'routeNotificationForNetfun')) {
            return null;
        }

        $recipient = $notifiable->routeNotificationForNetfun($notification);
<<<<<<< HEAD
        if (! $recipient) {
=======
        if (! is_string($recipient) || $recipient === '') {
>>>>>>> dev
            return null;
        }

        // Ottieni il messaggio dalla notifica
        if (! method_exists($notification, 'toNetfun')) {
            throw new Exception('Il metodo toNetfun() non è implementato nella notifica');
        }

        $message = $notification->toNetfun($notifiable);

        // Crea i dati SMS
<<<<<<< HEAD
        $smsData = SmsData::from([
            'recipient' => $recipient,
            'body' => is_string($message)
                ? $message
                : (is_object($message) && method_exists($message, 'getContent') ? $message->getContent() : ''),
=======
        $body = is_string($message)
            ? $message
            : (string) (is_object($message) && method_exists($message, 'getContent') ? $message->getContent() : '');
        $smsData = SmsData::from([
            'recipient' => (string) $recipient,
            'body' => $body,
>>>>>>> dev
            'from' => '',
        ]);

        // Esegui l'invio tramite la Queueable Action
        // L'esecuzione avverrà in modo asincrono (in background)
<<<<<<< HEAD
        return $this->sendSMSAction->onQueue('sms')->execute($smsData); // Esegui sulla coda 'sms'
=======
        $result = $this->sendSMSAction->onQueue('sms')->execute($smsData);

        return is_array($result) ? $result : null;
>>>>>>> dev
    }
}
