<?php

declare(strict_types=1);

namespace Modules\Notify\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TicketStatusChangedNotification extends Notification
{
    use Queueable;

    /**
     * @return void
     */
    public function __construct(
        public Model $ticket,
        public string $oldStatus,
        public string $newStatus
    ) {
    }

    /**
     * @return list<string>
     */
<<<<<<< .merge_file_xP93Dn
    public function via(mixed $notifiable): array
=======
    public function via(object $notifiable): array
>>>>>>> .merge_file_fI6aM7
    {
        return ['mail', 'database'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage())
            ->subject('Ticket Status Changed')
            ->line("Ticket status has changed from {$this->oldStatus} to {$this->newStatus}")
            ->action('View Ticket', url('/'));
    }

    /**
     * @return array{old_status: string, new_status: string}
     */
    public function toArray(object $notifiable): array
    {
        return [
            'old_status' => $this->oldStatus,
            'new_status' => $this->newStatus,
        ];
    }
}
