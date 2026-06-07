<?php

declare(strict_types=1);

namespace Modules\Notify\Datas;

use Modules\Xot\Actions\Cast\SafeStringCastAction;

/**
 * @property string|null $from
 * @property string|null $recipient
 * @property string|null $body
 */
final class SmsData
{
    private string $from = '';

    private string $recipient = '';

    private string $body = '';

    /**
     * Create a new SmsData instance.
     *
     * @param  array<string, string>  $data
     */
    public function __construct(array $data = [])
    {
        $this->from = SafeStringCastAction::cast($data['from'] ?? '');
        $this->recipient = SafeStringCastAction::cast(
            $data['recipient'] ?? ''
        );
        $this->body = SafeStringCastAction::cast($data['body'] ?? '');
    }

    /**
     * Named constructor for convenience.
     *
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
    }
}
