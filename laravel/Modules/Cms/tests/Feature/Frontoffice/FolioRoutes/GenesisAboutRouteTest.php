<?php

declare(strict_types=1);

it('GET /it/genesis/about acceptable', function (): void {
<<<<<<< .merge_file_cuWx98
    $res = $this->get('/it/genesis/about');
    expect($res->getStatusCode())->toBeIn([200, 204, 301, 302, 303, 307, 308]);
=======
<<<<<<< HEAD
=======
    /** @phpstan-ignore-next-line property.notFound */
    $res = $this->get('/it/genesis/about');
    expect($res->getStatusCode())->toBeIn([200, 204, 301, 302, 303, 307, 308]);
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_qfOXO2
});
