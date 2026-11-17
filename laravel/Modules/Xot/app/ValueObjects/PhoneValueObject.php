<?php

declare(strict_types=1);

namespace Modules\Xot\ValueObjects;

<<<<<<< HEAD
=======
use InvalidArgumentException;
>>>>>>> 6ed19256f (.)
use function Safe\preg_match;

/**
 * @see https://medium.com/@sliusarchyn/value-objects-in-laravel-use-it-12ba71b00281
 */
readonly class PhoneValueObject
{
    private function __construct(
        private string $phone,
    ) {
    }

    public static function fromString(string $phone): self
    {
<<<<<<< HEAD
        if (0 === preg_match('/^\+1\d{10}$/', $phone)) {
            throw new \InvalidArgumentException('It is not valid phone value');
=======
        if (preg_match('/^\+1\d{10}$/', $phone) === 0) {
            throw new InvalidArgumentException('It is not valid phone value');
>>>>>>> 6ed19256f (.)
        }

        return new self($phone);
    }

    public function toString(): string
    {
        return $this->phone;
    }
}
