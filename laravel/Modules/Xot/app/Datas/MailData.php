<?php

declare(strict_types=1);

namespace Modules\Xot\Datas;

use Spatie\LaravelData\Data;

/**
 * Class MailData - Gestisce la configurazione delle email per il framework Laraxot.
 * Utilizzato nel contesto dell'architettura Filament-first senza controller tradizionali.
 *
 * @phpstan-consistent-constructor
 */
final class MailData extends Data
{
    /**
     * @param string $driver Driver per l'invio delle email
     * @param array{
     *     host: string,
     *     port: int,
     *     encryption: string,
     *     username: string,
     *     password: string
     * } $smtpConfig Configurazione SMTP
     * @param array{address: string, name: string} $fromConfig Mittente predefinito
     * @param string|null $replyTo Indirizzo per le risposte
     * @param bool $verifyPeer Verifica certificato peer SSL
     */
    public function __construct(
        public readonly string $driver = 'smtp',
        public readonly array $smtpConfig = [
            'host' => 'smtp.mailtrap.io',
            'port' => 2525,
            'encryption' => 'tls',
            'username' => '',
            'password' => '',
        ],
        public readonly array $fromConfig = [
            'address' => 'no-reply@example.com',
            'name' => 'Laraxot App',
        ],
        public readonly ?string $replyTo = null,
        public readonly bool $verifyPeer = true,
    ) {
    }

    /**
     * Create a new instance of MailData with default values.
     */
    public static function make(): self
    {
        return new self();
    }
}
