<?php

declare(strict_types=1);

namespace Modules\Notify\Actions\Push;

use Modules\Notify\Datas\PushNotificationData;
use Spatie\QueueableAction\QueueableAction;

/**
 * Invia una notifica push a tutti i token attivi registrati.
 */
class SendPushToAllUsersAction
{
    use QueueableAction;

    /**
<<<<<<< .merge_file_v60N8B
     * @param  array<string, mixed>  $data
     * @return array<string, mixed>
=======
     * Due forme distinte: lo scarto senza token, e la mappa per piattaforma di
     * `SendPushToDevicesAction::execute()`.
     *
     * @param  array<string, mixed>  $data
     * @return array{success: bool, message: string}|array<string, array{success: bool, sent: int, failed: int, ...}>
>>>>>>> .merge_file_wFyWln
     */
    public function execute(PushNotificationData $notification, array $data = []): array
    {
        $tokens = $this->getAllActiveTokens();

        if ($tokens === []) {
            return [
                'success' => false,
                'message' => 'No active tokens found',
            ];
        }

        return app(SendPushToDevicesAction::class)->execute($tokens, $notification, $data);
    }

    /**
     * @return list<string>
     */
    private function getAllActiveTokens(): array
    {
        return [];
    }
}
