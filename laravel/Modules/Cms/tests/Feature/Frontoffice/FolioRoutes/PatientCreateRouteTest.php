<?php

declare(strict_types=1);

use Modules\Cms\Tests\TestCase;

uses(TestCase::class);

<<<<<<< HEAD

        return;
    }

    expect(in_array($status, [200, 204, 301, 302, 303, 307, 308, 401, 403, 404], true))->toBeTrue();
=======
it('GET /it/patient/create acceptable', function (): void {
    /** @phpstan-ignore-next-line property.notFound */
    $res = $this->get('/it/patient/create');
    expect($res->getStatusCode())->toBeIn([200, 204, 301, 302, 303, 307, 308, 401, 403]);
>>>>>>> 6ed19256f (.)
});
