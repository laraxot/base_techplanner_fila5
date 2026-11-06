<?php

declare(strict_types=1);

it('GET /it/auth/register/thank-you acceptable', function (): void {
<<<<<<< HEAD
=======
    /** @phpstan-ignore-next-line property.notFound */
>>>>>>> 6ed19256f (.)
    $res = $this->get('/it/auth/register/thank-you');
    expect($res->getStatusCode())->toBeIn([200, 204, 301, 302, 303, 307, 308]);
});
