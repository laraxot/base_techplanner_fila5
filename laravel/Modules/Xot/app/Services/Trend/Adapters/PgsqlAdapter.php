<?php

declare(strict_types=1);

namespace Modules\Xot\Services\Trend\Adapters;

<<<<<<< HEAD
class PgsqlAdapter extends AbstractAdapter
{
    #[\Override]
=======
use Error;
use Override;

class PgsqlAdapter extends AbstractAdapter
{
    #[Override]
>>>>>>> 6ed19256f (.)
    public function format(string $column, string $interval): string
    {
        $format = match ($interval) {
            'minute' => 'YYYY-MM-DD HH24:MI:00',
            'hour' => 'YYYY-MM-DD HH24:00:00',
            'day' => 'YYYY-MM-DD',
            'month' => 'YYYY-MM',
            'year' => 'YYYY',
<<<<<<< HEAD
            default => throw new \Error('Invalid interval.'),
=======
            default => throw new Error('Invalid interval.'),
>>>>>>> 6ed19256f (.)
        };

        return sprintf("to_char(%s, '%s')", $column, $format);
    }
}
