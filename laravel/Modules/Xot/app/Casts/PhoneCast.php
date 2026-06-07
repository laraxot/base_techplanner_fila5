<?php

declare(strict_types=1);

namespace Modules\Xot\Casts;

<<<<<<< HEAD
use Exception;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use InvalidArgumentException;
=======
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
>>>>>>> dev
use Modules\Xot\ValueObjects\PhoneValueObject;

class PhoneCast implements CastsAttributes
{
    /**
     * Cast the given value.
     *
<<<<<<< HEAD
     * @param  mixed  $_model  The Eloquent model instance
     * @param  string  $_key  The attribute key
     * @param  mixed  $value  The raw value from database
     * @param  array<string, mixed>  $_attributes  All model attributes
=======
     * @param mixed                $_model      The Eloquent model instance
     * @param string               $_key        The attribute key
     * @param mixed                $value       The raw value from database
     * @param array<string, mixed> $_attributes All model attributes
>>>>>>> dev
     */
    public function get(mixed $_model, string $_key, mixed $value, array $_attributes): PhoneValueObject
    {
        if (! is_string($value)) {
<<<<<<< HEAD
            throw new Exception('['.__LINE__.']['.class_basename($this).']');
=======
            throw new \Exception('['.__LINE__.']['.class_basename($this).']');
>>>>>>> dev
        }

        return PhoneValueObject::fromString($value);
    }

    /**
     * Prepare the given value for storage.
     *
<<<<<<< HEAD
     * @param  mixed  $_model  The Eloquent model instance
     * @param  string  $_key  The attribute key
     * @param  mixed  $value  The value to be stored
     * @param  array<string, mixed>  $_attributes  All model attributes
     */
    public function set(mixed $_model, string $_key, mixed $value, array $_attributes): string
    {
        if (! ($value instanceof PhoneValueObject)) {
            throw new InvalidArgumentException('The given value is not an Phone instance.');
=======
     * @param mixed                $_model      The Eloquent model instance
     * @param string               $_key        The attribute key
     * @param mixed                $value       The value to be stored
     * @param array<string, mixed> $_attributes All model attributes
     */
    public function set(mixed $_model, string $_key, mixed $value, array $_attributes): string
    {
        if (! $value instanceof PhoneValueObject) {
            throw new \InvalidArgumentException('The given value is not an Phone instance.');
>>>>>>> dev
        }

        return $value->toString();
    }
}
