<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\String;

<<<<<<< HEAD
=======
use Exception;
>>>>>>> 6ed19256f (.)
use Spatie\QueueableAction\QueueableAction;

class GetStrBetweenStartsWithAction
{
    use QueueableAction;

    public function execute(string $body, string $start, string $open, string $close): string
    {
        $pos = mb_strpos($body, $start);
<<<<<<< HEAD
        if (false === $pos) {
            throw new \Exception("Cannot find {$start} in {$body} [".__LINE__.']['.__FILE__.']');
=======
        if ($pos === false) {
            throw new Exception("Cannot find {$start} in {$body} [".__LINE__.']['.__FILE__.']');
>>>>>>> 6ed19256f (.)
        }
        $pos1 = mb_strpos($body, $close, $pos);

        $length = $pos1 - $pos;
        do {
            $body1 = mb_substr($body, $pos, $length);
            $open_count = mb_substr_count($body1, $open);
            $close_count = mb_substr_count($body1, $close);
<<<<<<< HEAD
            ++$length;
=======
            $length++;
>>>>>>> 6ed19256f (.)
        } while ($open_count !== $close_count);

        return $body1;
    }
}
