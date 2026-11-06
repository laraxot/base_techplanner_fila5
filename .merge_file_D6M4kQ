<?php

declare(strict_types=1);

namespace Modules\Notify\Actions;

use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
<<<<<<< HEAD
use Illuminate\Support\Facades\Notification as NotificationFacade;
use Modules\Notify\Models\Notification as NotificationModel;
=======
use Illuminate\Support\Facades\Notification;
>>>>>>> 6ed19256f (.)
use Modules\Notify\Models\NotificationTemplate;
use Modules\Notify\Notifications\GenericNotification;
use Spatie\QueueableAction\QueueableAction;

/**
 * Action per l'invio di notifiche multi-canale.
<<<<<<< HEAD
=======
 * Supporta l'invio via email, SMS e notifiche in-app.
>>>>>>> 6ed19256f (.)
 */
class SendNotificationAction
{
    use QueueableAction;

    /**
<<<<<<< HEAD
     * @param  array<string, mixed>  $data
     * @param  array<int, string>  $channels
     * @param  array<string, mixed>  $options
     *
     * @throws Exception
     */
    public function handle(
=======
     * Invia una notifica utilizzando un template.
     *
     * @param  Model  $recipient  Il destinatario della notifica
     * @param  string  $templateCode  Il codice del template da utilizzare
     * @param  array<string, mixed>  $data  I dati per compilare il template
     * @param  array<int, string>  $channels  I canali da utilizzare (opzionale, usa quelli del template se non specificati)
     * @param  array<string, mixed>  $options  Opzioni aggiuntive per l'invio
     *
     * @throws Exception Se il template non esiste o non è attivo
     */
    public function execute(
>>>>>>> 6ed19256f (.)
        Model $recipient,
        string $templateCode,
        array $data = [],
        array $channels = [],
        array $options = [],
<<<<<<< HEAD
    ): ?NotificationModel {
        $template = NotificationTemplate::query()
            ->where('code', $templateCode)
            ->where('is_active', true)
            ->first();

        if (! $template instanceof NotificationTemplate) {
            throw new Exception("Template {$templateCode} non trovato o non attivo");
        }

        if (! $template->shouldSend($data)) {
            return null;
        }

        /** @var array{subject: string, body_html: string|null, body_text: string|null} $compiled */
        $compiled = $template->compile($data);
        /** @var array<int, string> $templateChannels */
        $templateChannels = $template->channels;
        $channelsToUse = $channels !== [] ? $channels : $templateChannels;
        $storedNotification = null;

        foreach ($channelsToUse as $channel) {
            try {
                $notification = $this->sendViaChannel($recipient, $template, $channel, $compiled, $data, $options);

                if ($storedNotification === null && $notification instanceof NotificationModel) {
                    $storedNotification = $notification;
                }
            } catch (Exception $e) {
                Log::error("Errore invio notifica via {$channel}: ".$e->getMessage());
            }
        }

        return $storedNotification;
    }

    /**
     * @param  array{subject: string, body_html: string|null, body_text: string|null}  $compiled
     * @param  array<string, mixed>  $data
     * @param  array<string, mixed>  $options
     *
     * @throws Exception
     */
    protected function sendViaChannel(
        Model $recipient,
        NotificationTemplate $template,
        string $channel,
        array $compiled,
        array $data,
        array $options,
    ): ?NotificationModel {
        return match ($channel) {
            'mail' => $this->sendMail($recipient, $compiled, $options),
            'database' => $this->sendDatabase($recipient, $template, $compiled, $data, $options),
            'sms' => $this->sendSms($recipient, $compiled, $options),
            default => throw new Exception("Canale {$channel} non supportato"),
        };
    }

    /**
     * @param  array{subject: string, body_html: string|null, body_text: string|null}  $compiled
     * @param  array<string, mixed>  $options
     *
     * @throws Exception
     */
    protected function sendMail(Model $recipient, array $compiled, array $options): null
=======
    ): bool {
        // Recupera il template
        $template = NotificationTemplate::where('code', $templateCode)->where('is_active', true)->first();

        if (! $template) {
            throw new Exception("Template {$templateCode} non trovato o non attivo");
        }

        // Verifica condizioni di invio
        if (! $template->shouldSend($data)) {
            return false;
        }

        // Compila il template
        /** @var array{subject: string, body_html: string|null, body_text: string|null} $compiled */
        $compiled = $template->compile($data);

        // Usa i canali specificati o quelli del template
        /** @var array<int, string> $templateChannels */
        $templateChannels = $template->channels;
        /** @var array<int, string> $channelsToUse */
        $channelsToUse = ! empty($channels) ? $channels : $templateChannels;

        // Invia tramite ogni canale
        foreach ($channelsToUse as $channel) {
            if (! is_string($channel)) {
                continue;
            }
            try {
                $this->sendViaChannel($recipient, $channel, $compiled, $options);
            } catch (Exception $e) {
                // Log dell'errore ma continua con altri canali
                Log::error("Errore invio notifica via {$channel}: ".$e->getMessage());

                continue;
            }
        }

        return true;
    }

    /**
     * Invia la notifica attraverso un canale specifico.
     *
     * @param  array{subject: string, body_html: string|null, body_text: string|null}  $compiled
     * @param  array<string, mixed>  $options
     */
    protected function sendViaChannel(Model $recipient, string $channel, array $compiled, array $options): void
    {
        switch ($channel) {
            case 'mail':
                $this->sendMail($recipient, $compiled, $options);
                break;
            case 'database':
                $this->sendDatabase($recipient, $compiled, $options);
                break;
            case 'sms':
                $this->sendSms($recipient, $compiled, $options);
                break;
            default:
                throw new Exception("Canale {$channel} non supportato");
        }
    }

    /**
     * Invia una notifica via email.
     */
    protected function sendMail(Model $recipient, array $compiled, array $options): void
>>>>>>> 6ed19256f (.)
    {
        if (! method_exists($recipient, 'routeNotificationForMail')) {
            throw new Exception('Il destinatario non supporta le notifiche email');
        }

<<<<<<< HEAD
        /** @var mixed $email */
        $email = $recipient->routeNotificationForMail();
        if (! is_string($email) || $email === '') {
            throw new Exception('Email destinatario non disponibile');
        }

        $bodyHtml = $compiled['body_html'];
        $bodyText = $compiled['body_text'];
        $body = $bodyHtml ?? $bodyText ?? '';
        $subject = $compiled['subject'];
        $notificationData = array_merge($options, ['text_view' => $bodyText]);

        if (method_exists($recipient, 'notify')) {
            $recipient->notify(new GenericNotification($subject, $body, ['mail'], $notificationData));

            return null;
        }

        NotificationFacade::send($recipient, new GenericNotification($subject, $body, ['mail'], $notificationData));

        return null;
    }

    /**
     * @param  array{subject: string, body_html: string|null, body_text: string|null}  $compiled
     * @param  array<string, mixed>  $data
     * @param  array<string, mixed>  $options
     */
    protected function sendDatabase(
        Model $recipient,
        NotificationTemplate $template,
        array $compiled,
        array $data,
        array $options,
    ): NotificationModel {
        $bodyHtml = $compiled['body_html'];
        $message = $compiled['body_text'] ?? ($bodyHtml !== null ? strip_tags($bodyHtml) : '');
        $notification = new NotificationModel;
        $notification->forceFill([
            'type' => is_string($template->type) && $template->type !== '' ? $template->type : 'generic',
            'message' => $message,
            'notifiable_type' => $recipient->getMorphClass(),
            'notifiable_id' => $this->normalizeModelKey($recipient->getKey()),
            'user_id' => $this->normalizeModelKey($recipient->getAttribute('user_id')),
            'channels' => ['database'],
            'status' => 'sent',
            'sent_at' => now(),
            'data' => [
                'subject' => $compiled['subject'],
                'body_html' => $bodyHtml,
                'body_text' => $compiled['body_text'],
                'template_code' => $template->code,
                'template_id' => $template->getKey(),
                'payload' => $data,
                'options' => $options,
            ],
        ]);
        $notification->save();

        return $notification;
    }

    /**
     * @param  array{subject: string, body_html: string|null, body_text: string|null}  $compiled
     * @param  array<string, mixed>  $options
     *
     * @throws Exception
     */
    protected function sendSms(Model $recipient, array $compiled, array $options): null
=======
        $email = $recipient->routeNotificationForMail();
        if (! $email) {
            throw new Exception('Email destinatario non disponibile');
        }

        /** @var string|null $bodyHtml */
        $bodyHtml = $compiled['body_html'];
        /** @var string $body */
        $body = $bodyHtml ?? $compiled['body_text'] ?? '';
        /** @var string|null $bodyText */
        $bodyText = $compiled['body_text'];

        /** @var string $subject */
        $subject = $compiled['subject'];
        /** @var array<string, mixed> $notificationData */
        $notificationData = array_merge($options, [
            'text_view' => $bodyText,
        ]);

        // Usa il sistema di notifiche di Laravel
        if (method_exists($recipient, 'notify')) {
            $recipient->notify(new GenericNotification(
                $subject,
                $body,
                ['mail'],
                $notificationData,
            ));
        } else {
            // Fallback per modelli che non implementano Notifiable
            Notification::send($recipient, new GenericNotification(
                $subject,
                $body,
                ['mail'],
                $notificationData,
            ));
        }
    }

    /**
     * Invia una notifica nel database.
     *
     * @param  array{subject: string, body_html: string|null, body_text: string|null}  $compiled
     * @param  array<string, mixed>  $options
     */
    protected function sendDatabase(Model $recipient, array $compiled, array $options): void
    {
        /** @var string|null $bodyHtml */
        $bodyHtml = $compiled['body_html'];
        /** @var string $message */
        $message = $compiled['body_text'] ?? ($bodyHtml !== null ? strip_tags($bodyHtml) : '');
        /** @var string $subject */
        $subject = $compiled['subject'];
        /** @var array<string, mixed> $notificationOptions */
        $notificationOptions = $options;

        Notification::send($recipient, new GenericNotification(
            $subject,
            $message,
            ['database'],
            $notificationOptions,
        ));
    }

    /**
     * Invia una notifica via SMS.
     */
    protected function sendSms(Model $recipient, array $compiled, array $options): void
>>>>>>> 6ed19256f (.)
    {
        if (! method_exists($recipient, 'routeNotificationForSms')) {
            throw new Exception('Il destinatario non supporta le notifiche SMS');
        }

<<<<<<< HEAD
        /** @var mixed $phone */
        $phone = $recipient->routeNotificationForSms();
        if (! is_string($phone) || $phone === '') {
            throw new Exception('Numero di telefono destinatario non disponibile');
        }

        $bodyHtml = $compiled['body_html'];
        $message = $compiled['body_text'] ?? ($bodyHtml !== null ? strip_tags($bodyHtml) : '');
=======
        $phone = $recipient->routeNotificationForSms();
        if (! $phone) {
            throw new Exception('Numero di telefono destinatario non disponibile');
        }

        // Usa il testo plain o una versione senza HTML
        /** @var string|null $bodyHtml */
        $bodyHtml = $compiled['body_html'];
        /** @var string $message */
        $message = $compiled['body_text'] ?? ($bodyHtml !== null ? strip_tags($bodyHtml) : '');

        // Limita la lunghezza del messaggio SMS
>>>>>>> 6ed19256f (.)
        if (mb_strlen($message) > 320) {
            $message = mb_substr($message, 0, 317).'...';
        }

<<<<<<< HEAD
        $subject = $compiled['subject'];

        NotificationFacade::send($recipient, new GenericNotification($subject, $message, ['sms'], $options));

        return null;
    }

    protected function normalizeModelKey(mixed $value): ?int
    {
        if (is_int($value)) {
            return $value;
        }

        if (is_string($value) && is_numeric($value)) {
            return (int) $value;
        }

        return null;
=======
        /** @var string $subject */
        $subject = $compiled['subject'];
        /** @var array<string, mixed> $notificationOptions */
        $notificationOptions = $options;

        Notification::send($recipient, new GenericNotification(
            $subject,
            $message,
            ['sms'],
            $notificationOptions,
        ));
>>>>>>> 6ed19256f (.)
    }
}
