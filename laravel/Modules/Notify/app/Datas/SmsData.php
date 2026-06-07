<?php

declare(strict_types=1);

namespace Modules\Notify\Datas;

use Modules\Xot\Actions\Cast\SafeStringCastAction;

<<<<<<< HEAD
class SmsData
{
    public string $from;

    public string $recipient;

    public string $body;
=======
/**
 * @property string $from
 * @property string $recipient
 * @property string $body
 */
final class SmsData
{
    private string $from = '';

    private string $recipient = '';

    private string $body = '';
>>>>>>> dev

    /**
     * Create a new SmsData instance.
     *
<<<<<<< HEAD
     * @param  array<string, mixed>  $data
=======
     * @param  array<string, string>  $data
>>>>>>> dev
     */
    public function __construct(array $data = [])
    {
        $this->from = SafeStringCastAction::cast($data['from'] ?? '');
<<<<<<< HEAD
        $this->recipient = SafeStringCastAction::cast($data['recipient'] ?? '');
=======
        $this->recipient = SafeStringCastAction::cast(
            $data['recipient'] ?? ''
        );
>>>>>>> dev
        $this->body = SafeStringCastAction::cast($data['body'] ?? '');
    }

    /**
     * Named constructor for convenience.
     *
<<<<<<< HEAD
     * @param  array<string, mixed>  $data
     */
    public static function from(array $data): static
    {
        return new static($data);
=======
     * @param  array<string, string>  $data
     */
    public static function from(array $data): self
    {
        return new self($data);
    }

    public function getFrom(): string
    {
        return $this->from;
    }

    public function getRecipient(): string
    {
        return $this->recipient;
    }

    public function getBody(): string
    {
        return $this->body;
    }

    public function __get(string $name): string
    {
        return match ($name) {
            'from' => $this->from,
            'recipient' => $this->recipient,
            'body' => $this->body,
            default => '',
        };
    }

    public function __set(string $name, mixed $value): void
    {
        if (is_string($value)) {
            match ($name) {
                'from' => $this->from = $value,
                'recipient' => $this->recipient = $value,
                'body' => $this->body = $value,
                default => null,
            };
        }
>>>>>>> dev
    }
}
