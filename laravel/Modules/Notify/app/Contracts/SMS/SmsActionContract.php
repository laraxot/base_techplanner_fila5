<?php

declare(strict_types=1);

namespace Modules\Notify\Contracts\SMS;

use Modules\Notify\Datas\SmsData;

/**
 * Interfaccia comune per tutte le azioni di invio SMS.
 * Ogni provider SMS deve implementare questa interfaccia.
 */
interface SmsActionContract
{
    /**
     * Invia un SMS utilizzando il provider specifico.
     *
     * @param  SmsData  $smsData  I dati del messaggio SMS
<<<<<<< .merge_file_L7sN3L
     *
=======
>>>>>>> .merge_file_sY09QJ
     * @return array<string, mixed> Risultato dell'operazione
     */
    public function execute(SmsData $smsData): array;
}
