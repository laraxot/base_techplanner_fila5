<?php

declare(strict_types=1);

/**
 * @see HusamTariq\FilamentDatabaseSchedule
 */

namespace Modules\Job\Rules;

use Closure;
use Cron\CronExpression;
use Illuminate\Contracts\Validation\ValidationRule;

class Corn implements ValidationRule
{
    /**
     * Run the validation rule.
     */
    public function validate(string $_attribute, mixed $value, Closure $fail): void
    {
        if (! is_string($value)) {
<<<<<<< HEAD
            $msg = 'value is not a string ['.__LINE__.']['.class_basename($this).']';
=======
            $msg = 'value is not a string [' . __LINE__ . '][' . class_basename($this) . ']';
>>>>>>> 6ed19256f (.)
            $fail($msg);

            return;
        }
        if (! CronExpression::isValidExpression($value)) {
            $msg = trans('job::schedule.validation.cron');
            if (! is_string($msg)) {
<<<<<<< HEAD
                $msg = 'WIP ['.__LINE__.']['.class_basename($this).']';
=======
                $msg = 'WIP [' . __LINE__ . '][' . class_basename($this) . ']';
>>>>>>> 6ed19256f (.)
            }
            $fail($msg);
        }
    }
}
