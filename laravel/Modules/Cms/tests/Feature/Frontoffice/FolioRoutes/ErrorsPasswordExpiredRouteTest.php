<?php

declare(strict_types=1);

it('GET /it/errors/password-expired acceptable', function (): void {
<<<<<<< .merge_file_FuCPS7
    $res = $this->get('/it/errors/password-expired');
    expect($res->getStatusCode())->toBeIn([200, 204, 301, 302, 303, 307, 308, 401, 403]);
=======
<<<<<<< HEAD
=======
    /** @phpstan-ignore-next-line property.notFound */
    $res = $this->get('/it/errors/password-expired');
    expect($res->getStatusCode())->toBeIn([200, 204, 301, 302, 303, 307, 308, 401, 403]);
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_6el40h
});
