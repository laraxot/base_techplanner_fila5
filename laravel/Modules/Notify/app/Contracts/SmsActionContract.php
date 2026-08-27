<?php

declare(strict_types=1);

namespace Modules\Notify\Contracts;

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
<<<<<<< .merge_file_ZkHGSY
     *
=======
<<<<<<< .merge_file_Swsh9o
     *
=======
>>>>>>> .merge_file_YPGRXU
>>>>>>> .merge_file_fYPWxc
     * @return array<string, mixed> Risultato dell'operazione
     */
    public function execute(SmsData $smsData): array;
}
