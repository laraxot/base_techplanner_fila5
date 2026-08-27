<?php

declare(strict_types=1);

namespace Modules\Notify\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Modules\Xot\Actions\Cast\SafeEloquentCastAction;

/**
 * Notifica generica configurabile per il sistema il progetto.
 * Supporta l'invio tramite email, SMS (Twilio) e database.
 */
class GenericNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * @var string Il titolo della notifica
     */
    protected string $title;

    /**
     * @var string Il contenuto della notifica
     */
    protected string $message;

    /**
     * @var array<int, string> I canali da utilizzare per la notifica
     */
    protected array $channels;

    /**
     * @var array<string, mixed> Dati aggiuntivi per la notifica
     */
    protected array $data;

    /**
     * Crea una nuova istanza della notifica.
     *
     * @param  string  $title  Il titolo della notifica
     * @param  string  $message  Il contenuto della notifica
     * @param  array<int, string>  $channels  I canali da utilizzare ('mail', 'sms', 'database')
     * @param  array<string, mixed>  $data  Dati aggiuntivi per la notifica
     */
    public function __construct(string $title, string $message, array $channels = ['mail'], array $data = [])
    {
        $this->title = $title;
        $this->message = $message;
        $this->channels = $channels;
        $this->data = $data;
    }

    /**
     * Ottiene i canali di consegna della notifica.
     *
<<<<<<< .merge_file_z5gUav
     * @param  object  $_notifiable  L'entità da notificare (oggetto che riceverà la notifica)
=======
<<<<<<< .merge_file_HGWK3J
     * @param  mixed  $_notifiable  L'entità da notificare (oggetto che riceverà la notifica)
     *
=======
>>>>>>> .merge_file_1qGXf2
>>>>>>> .merge_file_J37nad
     * @return array<int, string>
     */
    public function via(object $_notifiable): array
    {
        return $this->channels;
    }

    /**
     * Ottiene la rappresentazione mail della notifica.
     */
<<<<<<< .merge_file_HGWK3J
    public function toMail(mixed $notifiable): MailMessage
=======
    public function toMail(object $notifiable): MailMessage
>>>>>>> .merge_file_1qGXf2
    {
        $mail = (new MailMessage())
            ->subject($this->title)
            ->greeting('Gentile '.$this->getRecipientName($notifiable))
            ->line($this->message);

        // Aggiungi eventuali azioni se specificate nei dati
        if (isset($this->data['action_text'], $this->data['action_url'])) {
<<<<<<< .merge_file_HGWK3J
            $mail->action((string) $this->data['action_text'], (string) $this->data['action_url']);
=======
            $actionText = $this->data['action_text'];
            $actionUrl = $this->data['action_url'];
            $mail->action(
                is_scalar($actionText) ? (string) $actionText : '',
                is_scalar($actionUrl) ? (string) $actionUrl : ''
            );
>>>>>>> .merge_file_1qGXf2
        }

        // Aggiungi eventuali linee aggiuntive
        if (isset($this->data['additional_lines']) && is_array($this->data['additional_lines'])) {
            foreach ($this->data['additional_lines'] as $line) {
                $mail->line($line);
            }
        }

        return $mail->salutation('Cordiali saluti,')->line('Team il progetto');
    }

    /**
     * Ottiene la rappresentazione SMS della notifica.
     *
<<<<<<< .merge_file_HGWK3J
     * @return array<string, mixed>
     */
    public function toTwilio(mixed $notifiable): array
=======
     * @return array{content: string, to: string}
     */
    public function toTwilio(object $notifiable): array
>>>>>>> .merge_file_1qGXf2
    {
        $content = "il progetto: {$this->title}\n{$this->message}";

        // Limita la lunghezza del messaggio SMS
        if (mb_strlen($content) > 320) {
            $content = mb_substr($content, 0, 317).'...';
        }

        // TODO: Implementare TwilioSmsMessage quando disponibile
        $to = '';
        if (method_exists($notifiable, 'routeNotificationForTwilio')) {
            $routeResult = $notifiable->routeNotificationForTwilio($this);
            $to = is_scalar($routeResult) ? (string) $routeResult : '';
        }

        return [
            'content' => $content,
            'to' => $to,
        ];
    }

    /**
     * Ottiene la rappresentazione database della notifica.
     *
<<<<<<< .merge_file_HGWK3J
     * @return array<string, mixed>
     */
    public function toDatabase(mixed $notifiable): array
=======
     * @return array{title: string, message: string, data: array<string, mixed>, created_at: string}
     */
    public function toDatabase(object $notifiable): array
>>>>>>> .merge_file_1qGXf2
    {
        return [
            'title' => $this->title,
            'message' => $this->message,
            'data' => $this->data,
            'created_at' => now()->toIso8601String(),
        ];
    }

    /**
     * Ottiene il nome del destinatario per il saluto personalizzato.
     */
<<<<<<< .merge_file_HGWK3J
    protected function getRecipientName(mixed $notifiable): string
=======
    protected function getRecipientName(object $notifiable): string
>>>>>>> .merge_file_1qGXf2
    {
        // Tenta di ottenere il nome dal destinatario in vari modi
        if (method_exists($notifiable, 'getFullName')) {
            $fullName = $notifiable->getFullName();
            if (is_string($fullName)) {
                return $fullName;
            }

            return 'Utente';
        }

        if ($notifiable instanceof Model) {
            if (app(SafeEloquentCastAction::class)->hasNonEmptyAttribute($notifiable, 'full_name')) {
                return app(SafeEloquentCastAction::class)->getStringAttribute($notifiable, 'full_name', 'Utente');
            }

            if (app(SafeEloquentCastAction::class)->hasNonEmptyAttribute($notifiable, 'first_name')) {
                return app(SafeEloquentCastAction::class)->getStringAttribute($notifiable, 'first_name', 'Utente');
            }

            if (app(SafeEloquentCastAction::class)->hasNonEmptyAttribute($notifiable, 'name')) {
                return app(SafeEloquentCastAction::class)->getStringAttribute($notifiable, 'name', 'Utente');
            }
        }

        return 'Utente';
    }
}
