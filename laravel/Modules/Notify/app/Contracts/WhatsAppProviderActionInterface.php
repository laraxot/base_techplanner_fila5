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
<<<<<<< .merge_file_sDnsKC
     * @return array<string, mixed> Risultato dell'operazione
=======
<<<<<<< HEAD
=======
     *
>>>>>>> 6ed19256f (.)
     * @return array Risultato dell'operazione
>>>>>>> .merge_file_tZRxEj
     */
    public function execute(WhatsAppData $whatsappData): array;
}
