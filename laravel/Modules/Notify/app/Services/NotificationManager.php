<?php

declare(strict_types=1);

namespace Modules\Notify\Services;

use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Modules\Notify\Actions\SendNotificationAction;
use Modules\Notify\Models\Notification;
use Modules\Notify\Models\NotificationTemplate;

/**
 * Facade legacy di orchestrazione notifiche.
 *
 * Debito: la religione del repo preferisce Actions+QueueableAction.
 * La copia canonica vive in {@see \Modules\Notify\Actions\NotificationManager}.
 * Questo Service resta parseable per caller/test legacy finché non migrati.
 */
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
     */
    public function send(
        Model $recipient,
        string $templateCode,
        array $data = [],
        array $channels = [],
        array $options = [],
    ): ?Notification {
        $template = $this->getTemplate($templateCode);

        if (! $template instanceof NotificationTemplate) {
            throw new Exception("Template not found: {$templateCode}");
        }

        $action = app(SendNotificationAction::class);
        $notification = $action->handle($recipient, $templateCode, $data, $channels, $options);

        return $notification instanceof Notification ? $notification : null;
    }

    /**
     * Invia una notifica a più destinatari.
     *
     * @param  array<int, Model>  $recipients  I destinatari delle notifiche
     * @param  string  $templateCode  Il codice del template da utilizzare
     * @param  array<string, mixed>  $data  I dati per compilare il template
     * @param  array<int, string>  $channels  I canali da utilizzare (opzionale)
     * @param  array<string, mixed>  $options  Opzioni aggiuntive per l'invio
     * @return list<Notification>
     */
    public function sendMultiple(
        array $recipients,
        string $templateCode,
        array $data = [],
        array $channels = [],
        array $options = [],
    ): array {
        $notifications = [];

        foreach ($recipients as $recipient) {
            if (! ($recipient instanceof Model)) {
                continue;
            }
            $notification = $this->send($recipient, $templateCode, $data, $channels, $options);

            if ($notification instanceof Notification) {
                $notifications[] = $notification;
            }
        }

        return $notifications;
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
     * @return Collection<int, NotificationTemplate>
     */
    public function getTemplatesByCategory(string $category): Collection
    {
        return NotificationTemplate::where('category', $category)->where('is_active', true)->get();
    }

    /**
     * Recupera i template per canale.
     *
     * @param  string  $channel  Il canale di notifica
     * @return Collection<int, NotificationTemplate>
     */
    public function getTemplatesByChannel(string $channel): Collection
    {
        return NotificationTemplate::forChannel($channel)->where('is_active', true)->get();
    }

    /**
     * Recupera le statistiche di invio per un template.
     *
     * @param  NotificationTemplate  $_template  Template delle notifiche Il template
     *
     * @return array<string, mixed>
     */
    public function getTemplateStats(NotificationTemplate $_template): array
    {
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
     *
     * @return array<string, mixed>
     */
    public function getRecipientStats(Model $_recipient): array
    {
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
