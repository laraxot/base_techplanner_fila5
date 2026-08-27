<?php

declare(strict_types=1);

namespace Modules\User\Actions\Socialite;

use Modules\User\Exceptions\ProviderNotConfigured;
use Spatie\QueueableAction\QueueableAction;

class ValidateProviderAction
{
    use QueueableAction;

    public function execute(string $provider): void
    {
        $hasConfig = config()->has('services.'.$provider);
        if (! $hasConfig) {
<<<<<<< .merge_file_9wJubK
            $ex = new ProviderNotConfigured();
=======
            $ex = new ProviderNotConfigured;
>>>>>>> .merge_file_zoJepw
            throw $ex->make($provider);
        }
    }
}
