<?php

declare(strict_types=1);

namespace Modules\Xot\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

/**
<<<<<<< HEAD
 * Class RecordMail.
=======
 * Class RecordMail
>>>>>>> 6ed19256f (.)
 *
 * Mailable per l'invio di dati di record via email.
 */
class RecordMail extends Mailable
{
<<<<<<< HEAD
    use Queueable;
    use SerializesModels;
=======
    use Queueable, SerializesModels;
>>>>>>> 6ed19256f (.)

    /**
     * @var array<string, mixed>
     */
    public array $recordData;

    /**
     * Crea una nuova istanza del mailable.
     *
<<<<<<< HEAD
     * @param array<string, mixed> $data I dati del record
=======
     * @param  array<string, mixed>  $data  I dati del record
>>>>>>> 6ed19256f (.)
     */
    public function __construct(array $data)
    {
        $this->recordData = $data;
    }

    /**
     * Costruisce il messaggio.
     *
     * @return $this
     */
    public function build(): self
    {
        return $this->view('xot::emails.record')->with(['data' => $this->recordData]);
    }
}
