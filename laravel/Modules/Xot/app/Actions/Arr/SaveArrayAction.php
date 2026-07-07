<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Arr;

<<<<<<< HEAD
=======
use InvalidArgumentException;
>>>>>>> 6ed19256f (.)
use Spatie\QueueableAction\QueueableAction;

class SaveArrayAction
{
    use QueueableAction;

    public function execute(array $data, string $filename, string $format = 'php'): bool
    {
        return match ($format) {
            'json' => app(SaveJsonArrayAction::class)->execute($data, $filename),
            'php' => app(SavePhpArrayAction::class)->execute($data, $filename),
<<<<<<< HEAD
            default => throw new \InvalidArgumentException("Formato non supportato: {$format}"),
=======
            default => throw new InvalidArgumentException("Formato non supportato: {$format}"),
>>>>>>> 6ed19256f (.)
        };
    }
}
