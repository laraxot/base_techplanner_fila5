<?php

declare(strict_types=1);

namespace Modules\Notify\Contracts;

use Modules\Notify\Datas\SmsData;

/**
 * Interfaccia comune per tutte le azioni di invio SMS.
 * Ogni provider SMS deve implementare questa interfaccia.
 */
interface SmsProviderContract
{
    /**
     * Invia un SMS utilizzando il provider specifico.
     *
     * @param  SmsData  $smsData  I dati del messaggio SMS
<<<<<<< .merge_file_NotQCW
     * @return array<string, mixed> Risultato dell'operazione
=======
<<<<<<< HEAD
=======
     *
>>>>>>> 6ed19256f (.)
     * @return array Risultato dell'operazione
>>>>>>> .merge_file_PH7jf4
     */
    public function execute(SmsData $smsData): array;
}
