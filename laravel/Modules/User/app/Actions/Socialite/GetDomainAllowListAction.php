<?php

/**
 * @see https://github.com/DutchCodingCompany/filament-socialite
 */

declare(strict_types=1);

namespace Modules\User\Actions\Socialite;

use Illuminate\Support\Arr;
use Spatie\QueueableAction\QueueableAction;

class GetDomainAllowListAction
{
    use QueueableAction;

<<<<<<< HEAD
    public function __construct(
        private readonly Arr $arrHelper,
    ) {
    }

=======
>>>>>>> 6ed19256f (.)
    /**
     * Execute the action.
     */
    public function execute(): array
    {
        $res = config('filament-socialite.domain_allowlist');
        if (\is_string($res)) {
<<<<<<< HEAD
            return $this->arrHelper->wrap($res);
=======
            return Arr::wrap($res);
>>>>>>> 6ed19256f (.)
        }

        if (\is_array($res)) {
            return $res;
        }

        throw new \Exception('check config filament-socialite.domain_allowlist');
    }
}
