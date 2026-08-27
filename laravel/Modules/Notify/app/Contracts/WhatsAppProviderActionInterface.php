<?php

declare(strict_types=1);

namespace Modules\Notify\Contracts;

use Modules\Notify\Datas\WhatsAppData;

/**
 * Interfaccia per le azioni dei provider WhatsApp.
 *
 * Questa interfaccia definisce il contratto che tutte le implementazioni
 * di provider WhatsApp devono rispettare.
 */
interface WhatsAppProviderActionInterface
{
    /**
     * Esegue l'invio del messaggio WhatsApp.
     *
     * @param  WhatsAppData  $whatsappData  I dati del messaggio WhatsApp
<<<<<<< .merge_file_HoSIqt
     *
=======
>>>>>>> .merge_file_B8cH8V
     * @return array<string, mixed> Risultato dell'operazione
     */
    public function execute(WhatsAppData $whatsappData): array;
}
