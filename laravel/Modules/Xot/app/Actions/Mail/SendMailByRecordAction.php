<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Mail;

use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
=======
use InvalidArgumentException;
>>>>>>> 6ed19256f (.)
use Modules\Notify\Datas\EmailData;
use Modules\Notify\Datas\SmtpData;
use Modules\Xot\Actions\Export\PdfByModelAction;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

class SendMailByRecordAction
{
    use QueueableAction;

    /**
     * Invia una mail utilizzando un record come dati.
     *
<<<<<<< HEAD
     * @param Model  $record    Il record da utilizzare come dati per la mail
     * @param string $mailClass La classe Mailable da utilizzare
=======
     * @param  Model  $record  Il record da utilizzare come dati per la mail
     * @param  string  $mailClass  La classe Mailable da utilizzare
>>>>>>> 6ed19256f (.)
     */
    public function execute(Model $record, string $mailClass): void
    {
        Assert::classExists($mailClass);
        // Expected an implementation of "Illuminate\Mail\Mailable". Got: "Modules\Performance\Mail\SchedaMail"
        // Assert::implementsInterface($mailClass, Mailable::class);

        // Utilizziamo il container per istanziare la classe Mailable
        // in modo che possa ricevere le dipendenze necessarie
        // @var Mailable $mail
        // $mail = app($mailClass, ['record' => $record]);
        // Mail::send($mail);
        // dddx(Mail::to($record)->send(new $mailClass($record)));
        // $res=Mail::to('marco.sottana@gmail.com')->send($mail);

        // Verifica che il model abbia le proprietà/metodi necessari
        if (($record->email ?? null) === null || empty($record->email)) {
<<<<<<< HEAD
            throw new \InvalidArgumentException('Model must have email property');
        }

        if (! method_exists($record, 'option')) {
            throw new \InvalidArgumentException('Model must implement option method');
        }

        if (! method_exists($record, 'myLogs')) {
            throw new \InvalidArgumentException('Model ['.$record::class.'] must implement myLogs method');
        }

        $to = $record->email;
        // $to = 'marco.sottana@gmail.com'; //4 debug non cancellare
=======
            throw new InvalidArgumentException('Model must have email property');
        }

        if (! method_exists($record, 'option')) {
            throw new InvalidArgumentException('Model must implement option method');
        }

        if (! method_exists($record, 'myLogs')) {
            throw new InvalidArgumentException('Model must implement myLogs method');
        }

        $to = $record->email;
>>>>>>> 6ed19256f (.)
        $subject = $record->option('mail_oggetto');
        $bodyHtml = $record->option('mail_testo');

        if (! is_string($to)) {
<<<<<<< HEAD
            throw new \InvalidArgumentException('Email must be a string');
=======
            throw new InvalidArgumentException('Email must be a string');
>>>>>>> 6ed19256f (.)
        }
        if (! is_string($subject)) {
            $subject = '';
        }
        if (! is_string($bodyHtml)) {
            $bodyHtml = '';
        }

        $emailData = new EmailData(
            recipient: $to,
            subject: $subject,
            body_html: $bodyHtml,
            attachments: [
                app(PdfByModelAction::class)->execute(
                    model: $record,
                    out: 'path',
                ),
            ],
        );
        SmtpData::make()->send($emailData);

        // myLogs è sempre disponibile su BaseModel
<<<<<<< HEAD
        $logs = $record->myLogs();
        if (! is_object($logs) || ! method_exists($logs, 'create')) {
            throw new \InvalidArgumentException('Model ['.$record::class.'] myLogs relation is invalid');
        }

        $logs->create([
=======
        /* @phpstan-ignore-next-line - Dynamic relationship method */
        $record->myLogs()->create([
>>>>>>> 6ed19256f (.)
            'act' => 'sendMail',
            'handle' => authId(),
        ]);
    }
}
