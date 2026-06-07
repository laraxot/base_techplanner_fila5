<?php

declare(strict_types=1);

namespace Modules\Notify\Services;

use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Modules\Notify\Actions\SendNotificationAction;
<<<<<<< HEAD
=======
use Modules\Notify\Models\Notification;
>>>>>>> dev
use Modules\Notify\Models\NotificationTemplate;

class NotificationManager
{
    /**
     * Invia una notifica a un destinatario.
     *
     * @param  Model  $recipient  Il destinatario della notifica
     * @param  string  $templateCode  Il codice del template da utilizzare
     * @param  array<string, mixed>  $data  I dati per compilare il template
     * @param  array<int, string>  $channels  I canali da utilizzare (opzionale)
     * @param  array<string, mixed>  $options  Opzioni aggiuntive per l'invio
<<<<<<< HEAD
     * @return array<string, mixed>
=======
>>>>>>> dev
     */
    public function send(
        Model $recipient,
        string $templateCode,
        array $data = [],
        array $channels = [],
        array $options = [],
<<<<<<< HEAD
    ): array {
        $template = $this->getTemplate($templateCode);

        if (! $template) {
=======
    ): ?Notification {
        $template = $this->getTemplate($templateCode);

        if (! $template instanceof NotificationTemplate) {
>>>>>>> dev
            throw new Exception("Template not found: {$templateCode}");
        }

        $action = app(SendNotificationAction::class);
<<<<<<< HEAD
        $action->execute($recipient, $templateCode, $data, $channels, $options);

        return [];
=======
        $notification = $action->handle($recipient, $templateCode, $data, $channels, $options);

        return $notification instanceof Notification ? $notification : null;
>>>>>>> dev
    }

    /**
     * Invia una notifica a più destinatari.
     *
     * @param  array<int, Model>  $recipients  I destinatari delle notifiche
     * @param  string  $templateCode  Il codice del template da utilizzare
     * @param  array<string, mixed>  $data  I dati per compilare il template
     * @param  array<int, string>  $channels  I canali da utilizzare (opzionale)
     * @param  array<string, mixed>  $options  Opzioni aggiuntive per l'invio
<<<<<<< HEAD
     * @return array<int, array<string, mixed>>
=======
     * @return list<Notification>
>>>>>>> dev
     */
    public function sendMultiple(
        array $recipients,
        string $templateCode,
        array $data = [],
        array $channels = [],
        array $options = [],
    ): array {
<<<<<<< HEAD
        /** @var array<int, array<string, mixed>> $logs */
        $logs = [];
=======
        $notifications = [];
>>>>>>> dev

        foreach ($recipients as $recipient) {
            if (! ($recipient instanceof Model)) {
                continue;
            }
<<<<<<< HEAD
            $logs[] = $this->send($recipient, $templateCode, $data, $channels, $options);
        }

        return $logs;
=======
            $notification = $this->send($recipient, $templateCode, $data, $channels, $options);

            if ($notification instanceof Notification) {
                $notifications[] = $notification;
            }
        }

        return $notifications;
>>>>>>> dev
    }

    /**
     * Recupera un template per codice.
     *
     * @param  string  $code  Il codice del template
     */
    public function getTemplate(string $code): ?NotificationTemplate
    {
        return NotificationTemplate::where('code', $code)->where('is_active', true)->first();
    }

    /**
     * Recupera i template per categoria.
     *
     * @param  string  $category  La categoria dei template
<<<<<<< HEAD
     * @return Collection<NotificationTemplate>
     */
    public function getTemplatesByCategory(string $category)
=======
     * @return Collection<int, NotificationTemplate>
     */
    public function getTemplatesByCategory(string $category): Collection
>>>>>>> dev
    {
        return NotificationTemplate::where('category', $category)->where('is_active', true)->get();
    }

    /**
     * Recupera i template per canale.
     *
     * @param  string  $channel  Il canale di notifica
<<<<<<< HEAD
     * @return Collection<NotificationTemplate>
     */
    public function getTemplatesByChannel(string $channel)
=======
     * @return Collection<int, NotificationTemplate>
     */
    public function getTemplatesByChannel(string $channel): Collection
>>>>>>> dev
    {
        return NotificationTemplate::forChannel($channel)->where('is_active', true)->get();
    }

    /**
     * Recupera le statistiche di invio per un template.
     *
     * @param  NotificationTemplate  $_template  Template delle notifiche Il template
     * @return array<string, mixed>
     */
    public function getTemplateStats(NotificationTemplate $_template): array
    {
        // $logs = $template->logs();

        // return [
        //     'total' => $logs->count(),
        //     'sent' => $logs->where('status', NotificationLog::STATUS_SENT)->count(),
        //     'delivered' => $logs->where('status', NotificationLog::STATUS_DELIVERED)->count(),
        //     'failed' => $logs->where('status', NotificationLog::STATUS_FAILED)->count(),
        //     'opened' => $logs->where('status', NotificationLog::STATUS_OPENED)->count(),
        //     'clicked' => $logs->where('status', NotificationLog::STATUS_CLICKED)->count(),
        // ];

        return [
            'total' => 0,
            'sent' => 0,
            'delivered' => 0,
            'failed' => 0,
            'opened' => 0,
            'clicked' => 0,
        ];
    }

    /**
     * Recupera le statistiche di invio per un destinatario.
     *
     * @param  Model  $_recipient  Il destinatario
     * @return array<string, mixed>
     */
    public function getRecipientStats(Model $_recipient): array
    {
        // $logs = NotificationLog::forNotifiable($recipient)->get();

        // return [
        //     'total' => $logs->count(),
        //     'sent' => $logs->where('status', NotificationLog::STATUS_SENT)->count(),
        //     'delivered' => $logs->where('status', NotificationLog::STATUS_DELIVERED)->count(),
        //     'failed' => $logs->where('status', NotificationLog::STATUS_FAILED)->count(),
        //     'opened' => $logs->where('status', NotificationLog::STATUS_OPENED)->count(),
        //     'clicked' => $logs->where('status', NotificationLog::STATUS_CLICKED)->count(),
        // ];

        return [
            'total' => 0,
            'sent' => 0,
            'delivered' => 0,
            'failed' => 0,
            'opened' => 0,
            'clicked' => 0,
        ];
    }
}
